<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captcha</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css'>
    <link rel="stylesheet" href="<?=constant('URL')?>public/css/login-stilos.css">
</head>
<body>
<input type="hidden" id="url" value="<?=constant('URL')?>">
<div class="wrapper fadeInDown">
  <div id="formContent" class="pt-5">
    <div class="fadeIn first">
      <h3>Inicio de sesión</h3>
    </div>
    <!-- Login Form -->
    <form id="frm-login" onsubmit="return validarLogin();" >
      <input type="text" name="email" id="login" class="fadeIn second" placeholder="Email" required>
      <input type="password" name="password" id="password" class="fadeIn third" placeholder="Contraseña" required>
      <input type="submit" class="fadeIn fourth" value="INICIAR SESIÓN">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Olvidó la contraseña?</a>
    </div>

  </div>
</div>
</body>
<script src="<?php echo constant('URL') ?>public/js/login.js" type="text/javascript"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.min.js'></script>
</html>