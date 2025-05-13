<?php
    session_start();
    include_once('config.php');

    if (isset($_SESSION['email'])) {
        header('Location: index.php');
        exit();
    }

    if (!isset($_POST['submit'])) {
        header('Location: index.php');
        exit();
    }

    if (empty($_POST['email']) || empty($_POST['password'])) {
        $_SESSION['erro'] = "Preencha todos os campos!";
        header('Location: singin_up.php');
        exit();
    }

    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string($_POST['password']);

    $sql_code = "SELECT * FROM utilizador WHERE email='$email' LIMIT 1";
    $sql_exec = $mysqli->query($sql_code);

    $utilizador = $sql_exec->fetch_assoc();

    if (!$utilizador) {
        $_SESSION['erro'] = "E-mail ou Palavra-Passe incorretos. Por favor, tente novamente.";
        header('Location: singin_up.php');
        exit();
    }

    // Verifica a senha
    if (password_verify($password, $utilizador['Pass'])) {
        $_SESSION['email'] = $email;
        unset($_SESSION['success']);
        unset($_SESSION['erro']);
        header('Location: index.php');
        exit();
    } else {
        $_SESSION['erro'] = "E-mail ou Palavra-Passe incorretos. Por favor, tente novamente.";
        header('Location: singin_up.php');
        exit();
    }
?>
