<?php

class Ciudades{
 
    private $nombreCiudad;
    private $cantidadVisitas;
    private $ipVisitas;

    function getNombreCiudad(){
        return $this->nombreCiudad;
    }

    function getCantidadVisitas(){
        return $this->cantidadVisitas;
    }

    function getIpVisitas(){
        return $this->ipVisitas;
    }

    function setNombreCiudad($nombreCiudad){
        $this->nombreCiudad =$nombreCiudad;
    }

    function setCantidadVisitas($cantidadVisitas){
        $this->cantidadVisitas = $cantidadVisitas;
    }

    function setIpVisitas($ipVisitas){
        $this->ipVisitas = $ipVisitas;
    }

}
?>