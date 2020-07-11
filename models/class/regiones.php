<?php
require_once 'ciudades.php';

class Regiones{
 
    private $nombreRegion;
    private $ciudades;

    function getNombreRegion(){
        return $this->nombreRegion;
    }

    function getCiudades(){
        return $this->ciudades;
    }

    function setNombreRegion($nombreRegion){
        $this->nombreRegion = $nombreRegion;
    }

    function setCiudades($ciudades){
        $this->ciudades = $ciudades;
    }

}
?>