<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo constant('URL') ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="<?php echo constant('URL') ?>captcha/crear">Crear</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo constant('URL') ?>captcha/listar">Listar</a>
            </li>
        </ul>
        <input type="hidden" id="urlApp" value="<?=constant('URL')?>" >
        <form  id="frm-login" onsubmit="return cerrarSesion();">
            <input type="hidden" name="cerrarsesion" value="cerrarsesion"> 
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Cerrar Sesión</button>
        </form>
    </div>
</nav>
