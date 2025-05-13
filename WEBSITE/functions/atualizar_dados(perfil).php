<?php

    session_start();
    include_once('config.php');

    $email = $_SESSION['email'];

    if (isset($_POST['submit'])) {

        $nome = !empty($_POST['nome']) ? $mysqli->real_escape_string($_POST['nome']) : null;
        $peso = !empty($_POST['peso']) ? $mysqli->real_escape_string($_POST['peso']) : null;
        $altura = !empty($_POST['altura']) ? $mysqli->real_escape_string($_POST['altura']) : null;
        $data_nasc = !empty($_POST['data_nasc']) ? $mysqli->real_escape_string($_POST['data_nasc']) : null;

        $updates = [];
        $params = [];
        $types = "";

        if ($nome !== null) {
            $updates[] = "Nome = ?";
            $params[] = $nome;
            $types .= "s";
        }
        if ($peso !== null) {
            $updates[] = "Peso = ?";
            $params[] = $peso;
            $types .= "s"; 
        }
        if ($altura !== null) {
            $updates[] = "Altura = ?";
            $params[] = $altura;
            $types .= "s";
        }
        if ($data_nasc !== null) {
            $updates[] = "Data_nasc = ?";
            $params[] = $data_nasc;
            $types .= "s";
        }

        if (!empty($updates)) {
            $sql = "UPDATE utilizador SET " . implode(", ", $updates) . " WHERE email = ?";
            $params[] = $email;
            $types .= "s";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param($types, ...$params);
            $stmt->execute();
            $stmt->close();
        }
        header('Location: perfil.php');
        exit();
    }

    header('Location: index.php');
    exit();

?>