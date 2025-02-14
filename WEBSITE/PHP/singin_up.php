<?php
  include("config.php");
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
      <form>
        <h1>Cria uma conta</h1>
        <input class="input" type="text" placeholder="Nome" />
        <input class="input" type="email" placeholder="Email" />
        <input class="input" type="password" placeholder="Password" />
        <input class="inputSubmit" type="submit" value="Sign Up">
      </form>
    </div>
    <div class="form-container sign-in">
      <form>
        <img src="fulllogo.png" class="logo">
        <input class="input" type="email" placeholder="Email" />
        <input class="input" type="password" placeholder="Password" />
        <!-- <a href="#">Forget Your Password?</a> -->
        <input class="inputSubmit" type="submit" value="Sign In">
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