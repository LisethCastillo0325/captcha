<?php include 'views/header.php'; ?>

<div  class="mt-5 md-3 mb-3 justify-content-center">
    <div class="jumbotron">
    <h1 class="display-4">Bienvenido <?=$_SESSION['nombre']?></h1>
    <p class="lead">Aquí podras administrar la información de tus captchas</p>
    <hr class="my-4">
    <p class="lead">

        <a class="btn btn-primary btn-lg" href="<?php echo constant('URL') ?>captcha/crear">Crear Captcha</a>
        <a class="btn btn-primary btn-lg" href="<?php echo constant('URL') ?>captcha/listar">Listado de Captchas</a>
    </p>
    </div>
</div>




<?php include 'views/footer.php'; ?>
