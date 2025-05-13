<?php

    $hostname = "localhost";
    $db = "u843228185_buddies";
    $user = "u843228185_admin";
    $pass = "/9OAO+Ehl9cX";

    $mysqli = new mysqli($hostname, $user, $pass, $db);
    if ($mysqli->connect_errno) {
        echo "Falha ao ligar: (" . $mysqli->connect_errno . ")" . $mysqli->connect_errno;
    }

?>