<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="A BUD é uma plataforma para entusiastas das corridas de karts, onde você pode registar os seus tempos, visualizar rankings e conectar-se com outros corredores.">
    <meta name="keywords" content="corrida, ranking, karting, tempos">
    <meta name="author" content="Ivo Costa Sousa">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <link rel="stylesheet" href="style(forgetpassword).css" />
  <link rel="icon" type="image/png" href="favicon.png">
  <title>BUD</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form__container">
            <div class="tittle__container">
                <div class="logo">
                    <a href="index.php"><img src="logo.png"></a>
                    <div class="sombra"></div>
                </div>
                <h1>ESQUECEU-SE DA PALAVRA-PASSE?</h1>
            </div>
            <p class="text">"Para receber uma palavra-passe provisória para acessar o nosso site, insira o seu email no campo abaixo."</p>
            <form action="sendpass.php" method="POST">
                <input class="input" type="email" name="email" placeholder="Email" required/>
                <button class="inputSubmit" type="submit" name="submit">Enviar</button>
            </form>
            <div class="login__container">
                <a class="login" href="back.php">Voltar para a página de acesso à <b>BUD</b></a>
            </div>
            <?php if (isset($_SESSION['erro'])): ?>
            <div class="erro">
                <p class="error__message"><?php echo htmlspecialchars($_SESSION['erro']); ?></p>
            </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['success'])): ?>
            <div class="success">
                <p class="success__message"><?php echo htmlspecialchars($_SESSION['success']); ?></p>
            </div>
            <?php endif; ?>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="script(forgetpassword).js"></script>

</body>
</html>