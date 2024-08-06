<?php

    class UsuarioModel{
        
        public $id, $nome, $dataNascimento, $telefone, $endereco, $cidade, $uf;
        
        public $rows;
        
        public function salvar(){
            
            include 'DAO/UsuarioDAO.php';
            
            $dao = new UsuarioDAO();
            
            if(empty($this->id)){
                $dao->cadastrar($this);
            }else{
                $dao->atualizar($this);
            }
            
        }
        
        public function pegarTodasLinhas(){
            include 'DAO/UsuarioDAO.php';
            
            $dao = new UsuarioDAO();
            
            $this->rows = $dao->listar();
        }
        
        public function pegarId(int $id){
            include 'DAO/UsuarioDAO.php';
            
            $dao = new UsuarioDAO();
            
            $obj = $dao->listarPorID($id);
            
            return $obj ? $obj : new UsuarioModel();
        }
        
        public function deletar(int $id){
            include 'DAO/UsuarioDAO.php';
            
            $dao = new UsuarioDAO();
            $dao->deletar($id);
        }
        
        public function setDataNascimento($dataNascimento){
            $this->dataNascimento = $dataNascimento;
        }
        
        public function getDataNascimento(){
            return $this->dataNascimento;
        }
        
    }

?>