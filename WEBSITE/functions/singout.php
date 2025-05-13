<?php
    session_start();
    unset($_SESSION['erro']);
    unset($_SESSION['success']);
    unset($_SESSION['email']);
    unset($_SESSION['pass']);
    header('Location: index.php');
?>