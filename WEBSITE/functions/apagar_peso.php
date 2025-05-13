<?php
    session_start();

    include_once('config.php');

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['pass']) == true)) {
        unset($_SESSION['email']);
        unset($_SESSION['pass']);
        header('Location: index.php');
        exit();
    }

    $email = $_SESSION['email'];
    
    $sql_delete = "UPDATE utilizador SET Peso = NULL WHERE email = ?";
    $stmt_delete = $mysqli->prepare($sql_delete);
    $stmt_delete->bind_param("s", $email);
    $stmt_delete->execute();
        
    header("Location: perfil.php");
    exit();
    
?>
