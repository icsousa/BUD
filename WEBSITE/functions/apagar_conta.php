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

    $queryUser = "SELECT * FROM utilizador WHERE Email = ?";
    $stmt = $mysqli->prepare($queryUser);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $nr = $user['Nr'];

    $sql_delete_corrida = "DELETE FROM corrida WHERE Nr = ?";
    $stmt_delete_corrida = $mysqli->prepare($sql_delete_corrida);
    $stmt_delete_corrida->bind_param("i", $nr);
    $stmt_delete_corrida->execute();
    $stmt_delete_corrida->close();

    $sql_delete_utilizador = "DELETE FROM utilizador WHERE Nr = ?";
    $stmt_delete_utilizador = $mysqli->prepare($sql_delete_utilizador);
    $stmt_delete_utilizador->bind_param("i", $nr);
    $stmt_delete_utilizador->execute();
    $stmt_delete_utilizador->close();
        
    $_SESSION['success'] .= "Conta excluida com sucesso!";
    header("Location: singin_up.php");
    exit();
    
?>
