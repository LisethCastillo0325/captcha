<?php
require_once 'links.php';
require_once 'paisesVisitas.php';

class Captcha{
 
    private $titulo;
    private $codigo;
    private $fechaCreacion;
    private $cantidadVisitas;
    private $cantidadPaises;
    private $links;
    private $paisesVisitas;

    function getTitulo(){
        return $this->titulo;
    }

    function getCodigo(){
        return $this->codigo;
    }

    function getFechaCreacion(){
        return $this->fechaCreacion;
    }

    function getCantidadVisitas(){
        return $this->cantidadVisitas;
    }

    function getCantidadPaises(){
        return $this->cantidadPaises;
    }

    function getLinks(){
        return $this->links;
    }

    function getPaisesVisitas(){
        return $this->paisesVisitas;
    }

    function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    function setFechaCreacion($fechaCreacion){
        $this->fechaCreacion = $fechaCreacion;
    }

    function setCantidadVisitas($cantidadVisitas){
        $this->cantidadVisitas = $cantidadVisitas;
    }

    function setCantidadPaises($cantidadPaises){
        $this->cantidadPaises = $cantidadPaises;
    }

    function setLinks($links){
        $this->links = $links;
    }

    function setPaisesVisitas($paisesVisitas){
        $this->paisesVisitas = $paisesVisitas;
    }

}
?>