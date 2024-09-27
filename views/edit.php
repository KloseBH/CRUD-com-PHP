<?php
    require_once './controllers/ContactController.php';
    require_once './config/database.php';

    $controller = new ContactController($connection);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $controller->update($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['id']);
    }

    $ContatoID = $_GET['id'];
    $contato = $controller->readOne($ContatoID);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
</head>
<body>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $contato['id']?>">
            <input type="text" name="nome" placeholder="Nome" value="<?= $contato['nome']?>">
            <input type="email" name="email" placeholder="Email" value="<?= $contato['email']?>">
            <input type="text" name="telefone" placeholder="Telefone" value="<?= $contato['telefone']?>">
            <button type="submit">adicionar</button>  
        </form>
</body>
</html>
