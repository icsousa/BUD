<?php 

    session_start();
    include_once('config.php');
    
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
    
        $queryemail = "SELECT * FROM utilizador WHERE Email = ?";
        $stmt = $mysqli->prepare($queryemail);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $temp_password = bin2hex(random_bytes(4)); // Gera senha temporária
            $hash = password_hash($temp_password, PASSWORD_DEFAULT);
    
            // Configuração do e-mail
            $subject = "Palavra-Passe Provisória";
            $message = "A sua Palavra-Passe Provisória é: " . $temp_password;
            $headers = "From: support@racingbud.com\r\n";
            $headers .= "Reply-To: support@racingbud.com\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();
    
            if (mail($email, $subject, $message, $headers)) {
                // Atualiza a senha no banco de dados
                $sql = "UPDATE utilizador SET Pass = ? WHERE Email = ?";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("ss", $hash, $email);
                $stmt->execute();
                $stmt->close();
    
                unset($_SESSION['erro']);
                $_SESSION['success'] = "A palavra-passe provisória foi enviada para o seu email.";
                header('Location: singin_up.php');
                exit();
            } else {
                $_SESSION['erro'] = "Falha ao enviar o e-mail.";
            }
        } else {
            $_SESSION['erro'] = "Este endereço de e-mail não está registado.";
        }
    
        header('Location: forgetpassword.php');
        exit();
    }
    
    header('Location: index.php');
    exit();
?>
