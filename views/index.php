<?php
require_once "../controllers/ContactController.php";
require_once "../config/database.php";

$controller = new ContactController($connection);
$contatos = $controller->read();
$linha = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <style>
        .gradient-bg {
            background: linear-gradient(to right, #007bff, #00bcd4);
            height: 100vh;
        }
        label{
            font-family: 'Montserrat', sans-serif;
        }
    </style>
    <title>Agenda de Contatos</title>
</head>

<body class="gradient-bg vh-100">
    <header class="navbar navbar-expand-lg bg-dark mb-4">
        <div class="container-fluid text-center text-light justify-content-md-center">
            <h1><b>MEUS CONTATOS<b></h1>
        </div>
    </header>

    <main>
        <div class="container mb-5 rounded">
            <div class="row justify-content-center">
                <div class="col-md-4 shadow-lg bg-white">
                    <div class="row bg-dark text-light">
                        <h1>NOVO CONTATO</h1>
                    </div>
                    <div class="row">
                        <form action="/views/create.php" method="POST">
                            <div class="form-group m-2">
                                <label>NOME</label><br>
                                <input class="form-control" type="text" name="nome" placeholder="Nome" required>
                            </div>
                            <div class="form-group m-2">
                                <label>EMAIL</label><br>
                                <input class="form-control" type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group m-2 ">
                                <label>TELEFONE</label><br>
                                <input class="form-control" type="text" name="telefone" placeholder="Telefone" required>
                            </div>
                            <button type="submit" class='btn btn-success m-2'>ADICIONAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <?php if ($linha % 2 == 0): ?>
                <div class="row justify-content-center">
                <?php endif; ?>
                <?php foreach ($contatos as $contato):
                    $linha++;
                ?>
                    <div class="card col-md-5 shadow-lg m-2 rounded p-0 bg-dark">
                        <h4 class="card-title p-2 text-light mb-1 text-center"><?= htmlspecialchars($contato['nome']) ?></h4>
                        <div class="card-body bg-light">
                            <h5 class="card-text text-secondary p-2">
                                EMAIL: <?= htmlspecialchars($contato['email']) ?><br>
                                TELEFONE: <?= htmlspecialchars($contato['telefone']) ?>
                            </h5>
                            <div class="row justify-content-md-end">
                                <div class="col-md-2">
                                    <a href="./edit.php?id=<?= $contato['id'] ?>" class="btn btn-warning mb-1 mt-1">EDITAR</a>
                                </div>
                                <div class="col-md-2">
                                    <a href="/controllers/ContactController.php?action=delete&id=<?= $contato['id'] ?>" class="btn btn-danger mb-1 mt-1">excluir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if ($linha % 2 == 1): ?>
                </div>
            <?php endif; ?>
        </div>
        </div>
    </main>

</body>

</html>