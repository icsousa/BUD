<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nr']) && isset($_POST['campo']) && isset($_POST['valor'])) {
        $nr = intval($_POST['nr']);
        $campo = $_POST['campo'];
        $novoValor = trim($_POST['valor']);

        // Atualizar no banco
        $queryUpdate = "UPDATE utilizador SET $campo = ? WHERE nr = ?";
        $stmt = $mysqli->prepare($queryUpdate);
        $stmt->bind_param("si", $novoValor, $nr);

    }
?>