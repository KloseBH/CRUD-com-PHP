<?php
    require_once './models/Contact.php';

    class ContactController{
        private $contactModel;

        public function __construct($connection)
        {
            $this->contactModel = new Contact($connection);
        }

        public function create($nome, $email, $telefone){
            $this->contactModel->create($nome, $email, $telefone);
            header('Location /CRUD-COM-PHP/views/index.php');
            exit();
        }

        public function read(){
            return $this->contactModel->read();
        }

        public function readOne($id){
            return $this->contactModel->readOne($id);
        }

        public function update($nome, $email, $telefone, $id){
            $this->contactModel->update($nome, $email, $telefone, $id);
            header('Location /CRUD-COM-PHP/views/index.php');
            exit();
        }

        public function delete($id){
            $this->contactModel->delete($id);
            header('Location /CRUD-COM-PHP/views/index.php');
            exit();
        }
    }
?>