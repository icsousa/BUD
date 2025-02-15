<?php

    $hostname = "localhost";
    $db = "buddies";
    $user = "root";
    $pass = "";

    $mysqli = new mysqli($hostname, $user, $pass, $db);
    if ($mysqli->connect_errno) {
        echo "Falha ao ligar: (" . $mysqli->connect_errno . ")" . $mysqli->connect_errno;
    }

?>