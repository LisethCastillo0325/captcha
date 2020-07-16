<?php


class Usuario {

    private $nombreUsuario;

    public function setNombre($nombre){
        $this->nombreUsuario = $nombre;
    }

    public function getNombreUsuario(){
        return $this->nombreUsuario;
    }
}

?>