<?php 
    session_start();
    unset($_SESSION['erro']);
    unset($_SESSION['success']);
    header('Location: singin_up.php');
?>