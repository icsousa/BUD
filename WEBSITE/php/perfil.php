<?php 
    session_start(); 

    include_once('config.php');

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['pass']) == true)) {
        unset($_SESSION['email']);
        unset($_SESSION['pass']);
        header('Location: singin_up.php');
    }

    $singin = $_SESSION['email'];

    $queryUser = "SELECT Nr, Nome, Email FROM utilizador WHERE Email = ?";
    $stmt = $mysqli->prepare($queryUser);
    $stmt->bind_param("s", $singin);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $nr = $user['Nr'];
    $nome = $user['Nome'];
    $email = $user['Email'];
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
                <h1>
                    <?php echo htmlspecialchars($nome); ?>
                </h1>
                <button onclick="window.location.href='singout.php'">Terminar sessão</button>
            </div>

            <div>
                <p>Para editar os seus dados, apenas precisa de clicar sobre eles, rápido e eficaz.</p>
            </div>
            
            <div>
                <h3>NOME:</h3>
                <span id="Nome" onclick="tornarEditavel('Nome', 'text')">
                    <?php echo htmlspecialchars($nome); ?>
                </span>
            </div>
            
            <div>
                <h3>EMAIL:</h3>
                <span id="Email" onclick="tornarEditavel('Email', 'email')">
                    <?php echo htmlspecialchars($email); ?>
                </span>
            </div>

        </div>
    </div>

    <script src="script(perfil).js"></script>

</body>
</html>