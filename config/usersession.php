<?php

class UserSession{

    public function __construct(){
        session_start();
    }

    public static function setCurrentUser($user){
        $_SESSION['user'] = $user;
    }

    public static function getCurrentUser(){
        return $_SESSION['user'];
    }

    public static function closeSession(){
        session_unset();
        session_destroy();
    }
}

?>