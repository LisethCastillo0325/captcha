<?php

class Model {

    function __construct()
    {
        
    }

    public function obtenerJson($archivoJson){
        $datos = file_get_contents($archivoJson);
        $json  = json_decode($datos, true);
        return $json;
    }

    public function actulizarDataJson($arrayJson, $archivoJson){
        $json_string = json_encode($arrayJson);
        file_put_contents($archivoJson, $json_string);
    }

}

?>