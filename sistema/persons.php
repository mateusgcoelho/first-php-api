<?php
    require_once("../conexao.php");

    $name = isset($_GET["name"]) ? $_GET["name"] : null;
    $post = isset($_POST) ? $_POST["teste"] : null;

    if ($post) {
        exit(json_encode($_POST));
    } else {
        $sql = $name == null ? "SELECT * FROM persons" : "SELECT * FROM persons WHERE FirstName = '$name'";

        $result = $conexao->query($sql);

        $persons = array();

        if ($result) {

            if ($result->num_rows > 1) {
                $retorno["quantity"] = $result->num_rows;
            }

            while($listPersons = $result->fetch_assoc()) {
                array_push($persons, $listPersons);
            }

            $retorno["persons"] = $persons;
        } else {
            $retorno["persons"] = [];
        }

        $json = json_encode($retorno);

        exit($json);
    }
    