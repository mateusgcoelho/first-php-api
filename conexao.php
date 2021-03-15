<?php

    $host = "localhost";
    $user = "root";
    $password = "";

    $banco = "php";
    $conexao = new mysqli($host, $user, $password, $banco);

    if (mysqli_connect_error()) {
        trigger_error((mysqli_connect_error()));
        exit();
    }

    mysqli_set_charset($conexao, "utf8");