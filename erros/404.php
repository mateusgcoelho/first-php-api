<?php

    $response["status"] = 404;
    $response["message"] = "Page not found!";

    $json = json_encode($response);

    exit($json);