<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Captcha</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                <a class="nav-link" href="<?php echo constant('URL') ?>captcha/listar">Tabla</a>
            </li>
        </ul>
        <?php
            require_once('controllers/ipapi.controller.php');
            $ipapi = new IpapiController();
            $this->resultadoIpApi = $ipapi->apiObtenerTodosLosIpapi();
        ?>
        <div class="row mr-1">
            <div class="col">
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Api Visitas</span>
                    </div>
                    <select name="ipapi" id="ipapi" class="form-control" onchange="modificarIpapi()">
                        <?php
                            foreach ($this->resultadoIpApi['api'] as $key => $ipapidatos) {
                                if($ipapidatos['seleccionado']){
                                    echo "<option value='{$ipapidatos['id']}' selected>{$ipapidatos['nombre']}</option>";
                                }else{
                                    echo "<option value='{$ipapidatos['id']}'>{$ipapidatos['nombre']}</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <input type="hidden" id="url" value="<?=constant('URL')?>" >
        <input type="hidden" id="urlVercaptcha" value="<?=constant('URL_VERCAPTCHA')?>" >
        <form  id="frm-login" onsubmit="return cerrarSesion();">
            <input type="hidden" name="cerrarsesion" value="cerrarsesion"> 
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Cerrar Sesión</button>
        </form>
    </div>
</nav>
