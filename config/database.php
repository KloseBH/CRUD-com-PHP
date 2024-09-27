<?php
    $hostname = "localhost";
    $port = "5432";
    $dbname = "ContatosDB";
    $user = "postgre";
    $password = "123";

    $conn_string = "host=$hostname port=$port dbname=$dbname user=$user password=$password";
    
    $connection = pg_connect($conn_string);
    
    if (!$connection) {
        echo "Erro na conexão: " . pg_last_error();
    } else {
        echo "Conexão bem-sucedida!";
    }
?>
