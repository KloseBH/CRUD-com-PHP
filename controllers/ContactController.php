<?php
    require_once '../models/Contact.php';
    require_once '../config/database.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
        $controller = new ContactController($connection);
        
        if ($_GET['action'] === 'delete' && isset($_GET['id'])) {
            $controller->delete($_GET['id']);
        }
    }

    class ContactController{
        private $contactModel;

        public function __construct($connection)
        {
            $this->contactModel = new Contact($connection);
        }

        public function create($nome, $email, $telefone){
            $this->contactModel->create($nome, $email, $telefone);
            header('Location: ../views/index.php');
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
            header('Location: ../views/index.php');
            exit();
        }

        public function delete($id){;
            $this->contactModel->delete($id);
            header('Location: ../views/index.php');
            exit();
        }
    }
?>