<?php
    require_once '../controllers/ContactController.php';
    require_once '../config/database.php';

    $controller = new ContactController($connection);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $controller->update($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['id']);
    }

    $ContatoID = $_GET['id'];
    $contato = $controller->readOne($ContatoID);
    if(!$contato){
        echo('Contato não encontrado na base de dados');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <title>Contato</title>
    <style>
        .gradient-bg {
            background: linear-gradient(to right, #007bff, #00bcd4);
            height: 100vh;
        }
        label{
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100 gradient-bg">
        <div class="col-md-4 shadow-lg bg-light">
            <h1 class="text-center bg-dark text-light">EDITAR <?= htmlspecialchars(strtoupper($contato['nome'])) ?></h1>
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?= $contato['id'] ?>">
                <div class="form-group m-2">
                    <label>NOME</label><br>
                    <input type="text" name="nome" placeholder="Nome" class="form-control" value="<?= htmlspecialchars($contato['nome']) ?>">
                </div>
                <div class="form-group m-2">
                    <label>EMAIL</label><br>
                    <input type="email" name="email" placeholder="Email" class="form-control" value="<?= htmlspecialchars($contato['email']) ?>">
                </div>
                <div class="form-group m-2">
                    <label>TELEFONE</label><br>
                    <input type="text" name="telefone" placeholder="Telefone" class="form-control" value="<?= htmlspecialchars($contato['telefone']) ?>">
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-success m-2">ALTERAR</button>  
                </div>
            </form>
        </div>
    </div>
</body>
</html>
