<?php
    require_once("../conexao.php");

    $name = isset($_GET["name"]) ? $_GET["name"] : null;

    $sql = $name == null ? "SELECT * FROM persons" : "SELECT * FROM persons WHERE FirstName = '$name'";

    $result = $conexao->query($sql);

    $persons = array();

    if ($result) {
        $retorno["quantity"] = $result->num_rows;

        while($listPersons = $result->fetch_assoc()) {
            array_push($persons, $listPersons);
        }

        $retorno["persons"] = $persons;
    } else {
        $retorno["quantity"] = 0;
        $retorno["persons"] = [];
    }

    $json = json_encode($retorno);

    exit($json);
    