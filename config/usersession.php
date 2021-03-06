<?php

class UserSession{

    public function __construct(){
        session_start();
    }

    public static function setCurrentUser($user){
        $_SESSION['usuario'] = $user['usuario'];
        $_SESSION['nombre'] = $user['nombre'];
    }

    public static function getCurrentUser(){
        return $_SESSION['usuario'];
    }

    public static function closeSession(){
        session_unset();
        session_destroy();
    }
}

?>