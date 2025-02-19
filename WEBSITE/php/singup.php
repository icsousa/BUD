<?php 

    include_once('config.php');

    if (isset($_POST['submit'])) {

        $nome = $mysqli->real_escape_string($_POST['nome']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $pass = $mysqli->real_escape_string($_POST['password']);

        $queryUser = "INSERT INTO utilizador(nome, email, pass) VALUES ('$nome', '$email', '$pass')";
        $result = $mysqli->query($queryUser);
        header('Location: singin_up.php');
        exit();

    }
    else {
        header('Location: singin_up.php');
        exit();
    }


?>