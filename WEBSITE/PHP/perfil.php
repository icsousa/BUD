<?php 
    session_start(); 

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['pass']) == true)) {
        unset($_SESSION['email']);
        unset($_SESSION['pass']);
        header('Location: singin_up.php');
    }

    $singin = $_SESSION['email'];
?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style(perfil).css">
    <title>BUD - PERFIL</title>
</head>
<body>
    <header>
        <nav>
            <ul class="navlinks">
                <li class="select"><a href="perfil.php">Perfil</a></li>
                <li><a href="home.php"> <img src="logo.png"></a></li>
                <li><a href="pistas.php">Pistas</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="form__container">

            <div class="title">
                <h1>Ivo Costa Sousa</h1>
                <button onclick="window.location.href='singout.php'">Terminar sessão</button>
            </div>

            <div>
                <p>Email: ivoo.c.sousa@gmail.com</p>
                <input type="password" placeholder="Password" />
            </div>

        </div>
    </div>

</body>
</html>