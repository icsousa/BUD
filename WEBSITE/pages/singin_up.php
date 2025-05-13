<?php
  session_start();
  unset($_SESSION['email']);
  unset($_SESSION['pass']);

  include ("config.php");

  $erro = isset($_SESSION['erro']) ? $_SESSION['erro'] : null;
  $success = isset($_SESSION['success']) ? $_SESSION['success'] : null;
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
  <link rel="stylesheet" href="style(singin_up).css" />
  <link rel="icon" type="image/png" href="favicon.png">
  <title>BUD</title>
</head>

<body>
  <main>
    <div class="container" id="container">
      <div class="form-container sign-up">
        <div class="tittle__container">
          <div class="logo">
            <a href="index.php"><img src="logo.png"></a>
            <div class="sombra"></div>
          </div>
          <h1>REGISTAR</h1>
        </div>
        <form action="singup.php" method="POST">
          <input class="input" type="text" name="nome"placeholder="Nome" required/>
          <input class="input" type="email" name="email" placeholder="Email" required/>
          <input class="input" type="password" name="password" placeholder="Palavra-Passe" required/>
          <input class="input" type="password" name="cpassword" placeholder="Confirma a Palavra-Passe" required/>
          <button class="inputSubmit" type="submit" name="submit">Registar</button>
        </form>
      </div>
      <div class="form-container sign-in">
        <div class="tittle__container">
          <div class="logo">
            <a href="index.php"><img src="logo.png"></a>
            <div class="sombra"></div>
          </div>
          <h1>ENTRAR</h1>
        </div>
        <form action="singin.php" method="POST">
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
          <input class="input" type="email" name="email" placeholder="Email" />
          <input class="input" type="password" name="password" placeholder="Palavra-Passe" />
          <a class="forget" href="forgetpassword.php">Esqueceu-se da sua palavra-passe?</a>
          <button class="inputSubmit" type="submit" name="submit">Entrar</button>
        </form>
      </div>
      <div class="toggle-container">
        <div class="toggle">
          <div class="toggle-panel toggle-left">
            <h1>BEM-VINDO!</h1>
            <p>"Já tem conta? Aceda à sua conta para continuar!"</p>
            <button class="hidden" id="login">Entrar</button>
          </div>
          <div class="toggle-panel toggle-right">
            <h1>OLÁ!</h1>
            <p>"Caso ainda não tenha uma conta, convidamo-lo(a) a fazer o registo!"</p>
            <button class="hidden" id="register">Registar</button>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
  <script src="script(singin_up).js"></script>

</body>
</html>