<?php
    session_start();

    include_once('config.php');

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['pass']) == true)) {
        unset($_SESSION['email']);
        unset($_SESSION['pass']);
        header('Location: singin_up.php');
        exit();
    }

    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    if ($id === 0) {
        header("Location: pistas.php");
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

    $NovoTempo = '00:01:32.75'; // ir buscar ao form

    $sql_check = "SELECT MelhorTempo FROM corrida WHERE Nr = ? AND id = ?";
    $stmt_check = $mysqli->prepare($sql_check);
    $stmt_check->bind_param("ii", $nr, $id);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($row = $result->fetch_assoc()) {
        
        if ($row['MelhorTempo'] === NULL || $NovoTempo < $row['MelhorTempo']) {
            $sql_update = "UPDATE corrida SET MelhorTempo = ? WHERE Nr = ? AND id = ?";
            $stmt_update = $mysqli->prepare($sql_update);
            $stmt_update->bind_param("sii", $NovoTempo, $nr, $id);
            $stmt_update->execute();
        } 

    } else {
        $sql_insert = "INSERT INTO corrida (Nr, id, MelhorTempo) VALUES (?, ?, ?)";
        $stmt_insert = $mysqli->prepare($sql_insert);
        $stmt_insert->bind_param("iis", $Nr, $id, $NovoTempo);
        $stmt_insert->execute();
        
    }

    header("Location: pista.php?id=" . $id);
    exit();

?>