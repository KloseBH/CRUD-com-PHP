<?php
    $hostname = "localhost";
    $port = "5432";
    $dbname = "ContatosDB";
    $user = "postgres";
    $password = "123";

    try {
        $dsn = "pgsql:host=$hostname;port=$port;dbname=$dbname;";
        $connection = new PDO($dsn, $user, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
    }
?>
