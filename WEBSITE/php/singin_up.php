<?php
  session_start();

  include ("config.php");

  $erro = isset($_SESSION['erro']) ? $_SESSION['erro'] : null;

  

?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style(singin_up).css" />
  <title>BUD</title>
</head>

<body>

  <div class="container" id="container">
    <div class="form-container sign-up">
      <form action="singup.php" method="POST">
        <h1>Cria uma conta</h1>
        <input class="input" type="text" name="nome"placeholder="Nome" required/>
        <input class="input" type="email" name="email" placeholder="Email" required/>
        <input class="input" type="password" name="password" placeholder="Password" required/>
        <input class="inputSubmit" type="submit" name="submit" value="Sign Up">
      </form>
    </div>
    <div class="form-container sign-in">
      <form action="singin.php" method="POST">
        <img src="fulllogo.png" class="logo">
        <input class="input" type="email" name="email" placeholder="Email" />
        <input class="input" type="password" name="password" placeholder="Password" />
        <!-- <a href="#">Forget Your Password?</a> -->
        <input class="inputSubmit" type="submit" name="submit" value="Sign In">
        <?php if (isset($_SESSION['erro'])): ?>
          <p class="error-message"><?php echo htmlspecialchars($_SESSION['erro']); ?></p>
        <?php endif; ?>
      </form>
    </div>
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h1>Bem-Vindo!</h1>
          <p>Já tens conta?</p>
          <button class="hidden" id="login">Sign In</button>
        </div>
        <div class="toggle-panel toggle-right">
          <h1>Olá!</h1>
          <p>Se não tens conta, regista-te já!</p>
          <button class="hidden" id="register">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

  <script src="script(singin_up).js"></script>

</body>
</html>