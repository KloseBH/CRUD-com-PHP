<?php
require_once './controllers/ContactController.php';
require_once './config/database.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $controller = new ContactController($connection);
    $controller->create($_POST['nome'], $_POST['email'], $_POST['telefone']);
}
?>