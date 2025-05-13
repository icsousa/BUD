<?php 
    session_start(); 

    include_once('config.php');

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['pass']) == true)) {
        unset($_SESSION['email']);
        unset($_SESSION['pass']);
        header('Location: singin_up.php');
    }

    unset($_SESSION['id']);

    $singin = $_SESSION['email'];

    $queryUser = "SELECT * FROM utilizador WHERE Email = ?";
    $stmt = $mysqli->prepare($queryUser);
    $stmt->bind_param("s", $singin);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $nr = $user['Nr'];
    $nome = $user['Nome'];
    $email = $user['Email'];
    $peso = $user['Peso'];
    $altura = $user['Altura'];
    $data_nasc = $user['Data_nasc'];

    if (!empty($peso)) {
        $SHOWpeso = $peso . 'kg';
    } else {
        $SHOWpeso = '(Opcional)';
    }


    if (!empty($altura)) {
        $SHOWaltura = $altura . 'm';
    } else {
        $SHOWaltura = '(Opcional)';
    }

    if (!empty($data_nasc)) {
        $SHOWdata_nasc = $data_nasc;
    } else {
        $SHOWdata_nasc = '(Opcional)';
    }

?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A BUD é uma plataforma para entusiastas das corridas de karts, onde você pode registar os seus tempos, visualizar rankings e conectar-se com outros corredores.">
    <meta name="keywords" content="corrida, ranking, karting, tempos">
    <meta name="author" content="Ivo Costa Sousa">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <link rel="stylesheet" href="style(perfil).css">
    <link rel="icon" type="image/png" href="favicon.png">
    <title>BUD - Perfil</title>
</head>
<body>
    <header>
        <nav id="navbar">
            <ul class="navlinks">
                <li class="select logo">
                    <div class="sombra"></div>
                    <a href="index.php"><img src="logo.png"></a>
                </li>
            </ul>
            <div class="menu-items">
                <a href="index.php#pistas"><i class="fa-solid fa-flag-checkered"></i></a>
                <a href="index.php#com"><i class="fa-solid fa-comments"></i></a>
                <a href="perfil.php"><i class="fa-solid fa-user"></i></a>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="perfil__menu">
                <div class="tittle">
                    <h1>PERFIL</h1>
                </div>
                <div class="menu__content">
                    <a href="#dados">Dados</a>
                    <a href="#email">Email</a>
                    <a href="#palavrapasse">Palavra-Passe</a>
                    <a href="singout.php" class="terminar">Terminar Sessão</a>
                </div>
            </div>
            <div class="perfil__data">
                <div class="spacer" id="dados"></div>
                <div class="dados">
                    <h1>DADOS</h1>
                    <form class="green__flag__form" action="atualizar_dados(perfil).php" method="POST">
                        <div class="input__container">
                            <div class="nome">
                                <label for="nome">Nome:</label>
                                <input class="input" type="text" id="nome" name="nome" placeholder="<?php echo htmlspecialchars($nome); ?>"/>
                            </div>
                            <div class="peso">
                                <label for="peso">Peso:</label>
                                <input class="input" type="text" id="peso" name="peso"placeholder="<?php echo htmlspecialchars($SHOWpeso); ?>"/>
                                <button class="trash__data" type="button" onclick="window.location.href='apagar_peso.php'">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                            <div class="altura">
                                <label for="altura">Altura:</label>
                                <input class="input" type="text" id="altura" name="altura"placeholder="<?php echo htmlspecialchars($SHOWaltura); ?>"/>
                                <button class="trash__data" type="button" onclick="window.location.href='apagar_altura.php'">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                            <div class="data_nascimento">
                                <label for="data_nascimento">Data de Nascimento:</label>
                                <input type="text" id="data_nasc"name="data_nasc"placeholder="<?php echo htmlspecialchars($SHOWdata_nasc); ?>" onfocus="this.type='date'" onblur="if(!this.value) this.type='text'">
                                <button class="trash__data" type="button" onclick="window.location.href='apagar_data-nasc.php'">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="green__submit">
                            <button class="inputSubmit" type="submit" name="submit">Atualizar</button>
                        </div>
                    </form>
                </div>
                <div class="spacer" id="email"></div>
                <div class="email__container" >
                    <h1>EMAIL</h1>
                    <form class="yellow__flag__form" action="atualizar_dados(perfil)YL.php" method="POST">
                        <div class="input__container2">
                            <div class="email">
                            <label for="email">Email:</label>
                            <input class="input" type="email" id="newemail" name="newemail"placeholder="<?php echo htmlspecialchars($email); ?>"/>
                            </div>
                        </div>
                        <div class="yellow__submit">
                            <input class="input" type="password" id="password" name="password" placeholder="Palavra-Passe"/>
                            <button class="inputSubmit" type="submit" name="submit">Atualizar</button>
                        </div>
                    </form>
                    <?php if (isset($_SESSION['erro'])): ?>
                    <div class="erro">
                        <p class="error__message"><?php echo htmlspecialchars($_SESSION['erro']); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="spacer" id="palavrapasse"></div>
                <div class="palavrapasse" >
                    <h1>PALAVRA-PASSE</h1>
                    <form class="yellow__flag__form" action="atualizar_dados(perfil)YL.php" method="POST">
                        <div class="input__container2">
                            <div class="novapalavra">
                                <label for="novapalavra">Nova Palavra-Passe:</label>
                                <input class="input" type="password" id="newpassword" name="newpassword" placeholder="Nova Palavra-Passe"/>
                                <input class="input" type="password" id="newcpassword" name="newcpassword" placeholder="Confirma a Palavra-Passe"/>
                            </div>
                        </div>
                        <div class="yellow__submit">
                            <input class="input" type="password" id="password" name="password" placeholder="Palavra-Passe"/>
                            <button class="inputSubmit" type="submit" name="submit">Atualizar</button>
                        </div>
                    </form>
                    <?php if (isset($_SESSION['erro'])): ?>
                    <div class="erro">
                        <p class="error__message"><?php echo htmlspecialchars($_SESSION['erro']); ?></p>
                    </div>
                    <?php endif; ?>
                </div> 
                <div class="spacer"></div>
            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="script(perfil).js"></script>

</body>
</html>