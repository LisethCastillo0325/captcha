<?php include 'views/header.php'; ?>

<div  class="row mt-5 md-3 mb-3 justify-content-center">
    <div class="col-md-6">
        <h1 class="text-center mb-4">Bienvenido</h1>

        <a class="btn btn-primary btn-block" href="<?php echo constant('URL') ?>captcha/crear">Crear Captcha</a>
        <a class="btn btn-primary btn-block" href="<?php echo constant('URL') ?>captcha/listar">Listado Captcha</a>
    </div>
</div>

<?php include 'views/footer.php'; ?>
