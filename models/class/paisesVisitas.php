<?php
require_once 'regiones.php';
class PaisesVisitas{
 
    private $nombrePais, $regiones;

    function __construct()
    {
        
    }

    function getNombrePais(){
        return $this->nombrePais;
    }

    function getregiones(){
        return $this->regiones;
    }

    function setNombrePais($nombrePais){
        $this->nombrePais = $nombrePais;
    }

    function setRegiones($regiones){
        $this->regiones = $regiones;
    }
}
?>