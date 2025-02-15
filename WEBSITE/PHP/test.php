<?php 

    session_start();

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password'])) {

        include_once('config.php');
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM utilizador WHERE email='$email' and pass='$password'";

        $result = $mysqli->query($sql);

        if(mysqli_num_rows($result)<1) {
            unset($_SESSION['email']);
            unset($_SESSION['pass']);
            header('Location: singin_up.php');
        }
        else {
            $_SESSION['email'] = $email;
            $_SESSION['pass'] = $password;

            header('Location: home.php');
        }

    }
    else {
        header('Location: singin_up.php');
    }



?>