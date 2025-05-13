<?php 

    session_start();
    include_once('config.php');

    if (isset($_POST['submit'])) {

        $nome = $mysqli->real_escape_string($_POST['nome']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $pass = $mysqli->real_escape_string($_POST['password']);
        $cpass = $mysqli->real_escape_string($_POST['cpassword']);

        if ($pass != $cpass) {
            unset($_SESSION['success']);
            $_SESSION['erro'] = "Erro ao registar! Confirme a sua Palavra-Passe corretamente!";
            header('Location: singin_up.php');
            exit();
        }

        $checkEmail = "SELECT * FROM utilizador WHERE email = '$email' LIMIT 1";
        $resultCheck = $mysqli->query($checkEmail);

        if ($resultCheck->num_rows > 0) {
            unset($_SESSION['success']);
            $_SESSION['erro'] = "Erro ao registar! Este email já está em uso.";
            header('Location: singin_up.php');
            exit();
        }

        $hash = password_hash($pass, PASSWORD_DEFAULT);

        $queryUser = "INSERT INTO utilizador(nome, email, pass) VALUES ('$nome', '$email', '$hash')";
        $result = $mysqli->query($queryUser);

        if ($result) {
            unset($_SESSION['erro']);
            $_SESSION['success'] = "Sucesso! Conta registada.";

        } else {
            unset($_SESSION['success']);
            $_SESSION['erro'] = "Erro ao registar! Tente novamente.";
        }

        header('Location: singin_up.php');
        exit();
    } else {
        unset($_SESSION['success']);
        unset($_SESSION['erro']);
        header('Location: index.php');
        exit();
    }

?>