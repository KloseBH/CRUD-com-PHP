<?php
    class Contact{
        private $connection;

        public function __construct($connection) {
            $this->connection = $connection;
        }

        public function create($nome, $email, $telefone){
            $stmt = $this->connection->prepare("INSERT INTO contatos (nome, email, telefone) VALUES (:nome, :email, :telefone)");
            $stmt->execute(['nome'=>$nome, 'email' => $email, 'telefone' => $telefone]);
        }

        public function read(){
            $stmt = $this->connection->prepare("SELECT * FROM contatos ORDER BY nome");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function readOne($id){
            $stmt = $this->connection->prepare("SELECT * FROM contatos WHERE id = :id");
            $stmt->execute(['id'=>$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function update($nome, $email, $telefone, $id){
            $stmt = $this->connection->prepare("UPDATE contatos SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id");
            $stmt->execute(['nome'=>$nome, 'email'=>$email, 'telefone'=>$telefone,'id'=>$id]);
        }

        public function delete($id){
            $stmt = $this->connection->prepare("DELETE FROM contatos WHERE id=:id");
            $stmt->execute(['id'=>$id]);
        }
    }
?>