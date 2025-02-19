<?php

    session_start();
    include_once('config.php');

    if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email = $mysqli->real_escape_string($email);
        $password = $mysqli->real_escape_string($password);

        $sql = "SELECT * FROM utilizador WHERE email='$email' AND pass='$password'";
        $result = $mysqli->query($sql);

        if (!$result) {
            $_SESSION['erro'] = "Erro ao consultar a base de dados.";
            header('Location: singin_up.php');
            exit();
        }

        if ($result->num_rows < 1) {
            $_SESSION['erro'] = "E-mail ou Password incorretos. Por favor, tente novamente.";
            header('Location: singin_up.php');
            exit();
        } else {
            $_SESSION['email'] = $email;
            unset($_SESSION['erro']);
            header('Location: home.php');
            exit();
        }
    } else {
        $_SESSION['erro'] = "Preencha todos os campos!";
        header('Location: singin_up.php');
        exit();
    }
?>