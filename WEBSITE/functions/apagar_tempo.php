<?php
    session_start();

    include_once('config.php');

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['pass']) == true)) {
        unset($_SESSION['email']);
        unset($_SESSION['pass']);
        header('Location: index.php');
        exit();
    }

    $singin = $_SESSION['email'];

    $queryUser = "SELECT Nr FROM utilizador WHERE Email = ?";
    $stmt = $mysqli->prepare($queryUser);
    $stmt->bind_param("s", $singin);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $nr = $user['Nr'];

    $id = $_SESSION['id'];
    
    $sql_delete = "DELETE FROM corrida WHERE Nr = ? AND id = ?";
    $stmt_delete = $mysqli->prepare($sql_delete);
    $stmt_delete->bind_param("ii", $nr, $id);
        
    if ($stmt_delete->execute()) {
        header("Location: pista.php?id=" . $id);
        exit();
    }
    
?>