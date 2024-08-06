<?php

    class UsuarioDAO{
        
        private $conexao;
        
        public function __construct(){
            
            try{
                $dsn = "mysql:dbname=crud;host=localhost";
                $dbuser = "henrique";
                $dbpass = "ti_2henrique";
                $this->conexao = new PDO($dsn, $dbuser, $dbpass);
                
            }catch(PDOException $erro){
                echo "Falha na conexão: " . $erro->getMessage();
            }
            
        }
        
        public function cadastrar(UsuarioModel $model){
            $sql = "INSERT INTO usuarios (nome, dataNascimento, telefone, endereco, cidade, uf) VALUES (?, ?, ?, ?, ?, ?)";
            
            $stmt = $this->conexao->prepare($sql);
            
            if($model->getDataNascimento()){
                $dataNascimento = $model->getDataNascimento();
            }else{
                throw new Exception("Data inválida!");
            }
            
            $stmt->bindValue(1, $model->nome);
            $stmt->bindValue(2, $dataNascimento);
            $stmt->bindValue(3, $model->telefone);
            $stmt->bindValue(4, $model->endereco);
            $stmt->bindValue(5, $model->cidade);
            $stmt->bindValue(6, $model->uf);
            
            $stmt->execute();
        }
        
        public function atualizar(UsuarioModel $model){
            
            $sql = "UPDATE usuarios SET nome=?, dataNascimento=?,  telefone=?, endereco=?, cidade=?, uf=? WHERE id=?";
            
            $stmt = $this->conexao->prepare($sql);
            
            if($model->getDataNascimento()){
                $dataNascimento = $model->getDataNascimento();
            }else{
                throw new Exception("Data inválida!");
            }
            
            $stmt->bindValue(1, $model->nome);
            $stmt->bindValue(2, $dataNascimento);
            $stmt->bindValue(3, $model->telefone);
            $stmt->bindValue(4, $model->endereco);
            $stmt->bindValue(5, $model->cidade);
            $stmt->bindValue(6, $model->uf);
            $stmt->bindValue(7, $model->id);
            
            $stmt->execute();
        }
        
        public function listar(){
            
            $sql = "SELECT * FROM usuarios";
            
            $stmt = $this->conexao->prepare($sql);
            
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }
        
        public function listarPorID(int $id){
            
            include_once 'Model/UsuarioModel.php';
            
            $sql = "SELECT * FROM usuarios WHERE id = ?";
            
            $stmt = $this->conexao->prepare($sql);
            
            $stmt->bindValue(1, $id);
            
            $stmt->execute();
            
            return $stmt->fetchObject("UsuarioModel");
            
        }
        
        public function deletar(int $id){
            $sql = "DELETE FROM usuarios WHERE id= ?";
            
            $stmt = $this->conexao->prepare($sql);
            
            $stmt->bindValue(1, $id);
            
            $stmt->execute();
        }
        
    }

?>