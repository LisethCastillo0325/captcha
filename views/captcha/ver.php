<?php include 'views/header.php'; ?>

<div class="row mt-3 md-3 mb-3 justify-content-center">
    <div class="col-md-6">
        <div class="card" >
            <div class="card-body">
                <h2 class="card-title text-center">Resolver Captcha</h2>
                <hr>
                <div class="jumbotron jumbotron-fluid bg-info text-white text-center">
                    <div class="container">
                        <h1 class="display-8"><?=$this->captcha['captcha']?></h1>
                        <input id="idcaptcha" hidden value="<?=$this->captcha['captcha']?>" />
                    </div>
                </div>
                <form>
                    <div class="input-group mb-3">
                        <input type="text" id="valorUno" class="form-control">
                        <div class="input-group-prepend">
                            <span class="input-group-text">-</span>
                        </div>
                        <input type="text" id="valorDos" class="form-control">
                        <div class="input-group-prepend">
                            <span class="input-group-text">-</span>
                        </div>
                        <input type="text" id="valorTres" class="form-control">
                    </div>
                    <button type="button" onclick="validarCaptcha()" class="btn btn-primary btn-block">Validar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="<?php echo constant('URL') ?>public/js/vercaptcha.js" type="text/javascript"></script>

<br><br><br>

<?php include 'views/footer.php'; ?>