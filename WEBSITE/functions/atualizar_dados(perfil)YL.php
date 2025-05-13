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

    if (isset($_POST['submit']) && !empty($_POST['password'])) {

        $password = $_POST['password'];

        $sql_code = "SELECT * FROM utilizador WHERE email='$email' LIMIT 1";
        $sql_exec = $mysqli->query($sql_code);

        $utilizador = $sql_exec->fetch_assoc();

        if(!password_verify($password, $utilizador['Pass'])) {
            $_SESSION['erro'] = "Palavra-Passe incorreta!";
            header('Location: perfil.php');
            exit(); 
        }

        $newemail = !empty($_POST['newemail']) ? $mysqli->real_escape_string($_POST['newemail']) : null;
        $newpassword = !empty($_POST['newpassword']) ? $mysqli->real_escape_string($_POST['newpassword']) : null;
        $newcpassword = !empty($_POST['newcpassword']) ? $mysqli->real_escape_string($_POST['newcpassword']) : null;

        $queryemail = "SELECT * FROM utilizador WHERE Email = ?";
        $stmt = $mysqli->prepare($queryemail);
        $stmt->bind_param("s", $newemail);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $_SESSION['erro'] = "Este endereço de e-mail já está registado! Por favor, insira outro endereço.";
            header('Location: perfil.php#email');
            exit();
        }

        if ($newpassword !== $newcpassword) {
            $_SESSION['erro'] = "Confirme a sua nova Palavra-Passe corretamente!";
            header('Location: perfil.php#palavrapasse');
            exit();
        }

        $hash = password_hash($newpassword, PASSWORD_DEFAULT);

        $updates = [];
        $params = [];
        $types = "";

        if ($newemail !== null) {
            $updates[] = "Email = ?";
            $params[] = $newemail;
            $types .= "s";
            $_SESSION['success'] = "Email atualizado com sucesso!";
        }
        if ($newpassword !== null) {
            $updates[] = "Pass = ?";
            $params[] = $hash;
            $types .= "s";
            $_SESSION['success'] .= "Palavra-Passe atualizada com sucesso!";
        }

        if (!empty($updates)) {
            $sql = "UPDATE utilizador SET " . implode(", ", $updates) . " WHERE Nr = ?";
            $params[] = $nr;
            $types .= "i";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param($types, ...$params);
            $stmt->execute();
            $stmt->close();
            unset($_SESSION['erro']);
            header('Location: singin_up.php');
            exit();
        }
    }

    header('Location: perfil.php');

?>