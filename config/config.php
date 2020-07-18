<?php
    require_once 'utils/utils.php';
    define('NOMBRE_PROYECTO_VERCAPTCHA', 'vercaptcha');
    define('NOMBRE_PROYECTO','admin-captcha'); //nombre del directorio
    define('URL', Utils::obtenerUrlCompleta($_SERVER));
    define('URL_ORIGEN', Utils::obtenerUrlOrigen($_SERVER));
    define('URL_VERCAPTCHA', Utils::obtenerUrlCompletaVercaptcha($_SERVER));

?>