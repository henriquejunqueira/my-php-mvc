<?php

    class UsuarioController{
        
        public static function index(){
            
            include 'Model/UsuarioModel.php';
            
            $model = new UsuarioModel(new DateTime());
            $model->pegarTodasLinhas();
            
            include 'View/modules/Usuario/ListaUsuarios.php';
            
        }
        
        public static function form(){
            include 'Model/UsuarioModel.php';
            
            $model = new UsuarioModel();
            
            if(isset($_GET['id'])){
                $model = $model->pegarId((int) $_GET['id']);
            }else{
                $model = new UsuarioModel(new DateTime());
            }
            
            $ufs = ["MG", "SP", "RJ", "ES", "DF"];
            
            include 'View/modules/Usuario/FormUsuario.php';
        }
        
        public static function salvar(){
            include 'Model/UsuarioModel.php';
            
            if(!isset($_POST['dataNascimento'])){
                echo "Data de nascimento não fornecida";
                return;
            }
            
            $model = new UsuarioModel();
            
            $model->setDataNascimento($_POST['dataNascimento']);

            $model->id = $_POST['id'] ?? null;
            $model->nome = $_POST['nome'];
            
            $model->telefone = $_POST['telefone'];
            $model->endereco = $_POST['endereco'];
            $model->cidade = $_POST['cidade'];
            $model->uf = $_POST['uf'];
            
            $model->salvar();
            
            header("Location: /usuario");
        }
        
        public static function deletar(){
            include 'Model/UsuarioModel.php';
            
            $model = new UsuarioModel();
            
            $model->deletar((int) $_GET['id']);
            header("Location: /usuario");
        }
        
    }

?>