<?php
class LoginController extends Controller{

    function __construct()
    {
        parent::__construct();
        $this->loadModel('login');
    }

    public function validar(){
        $usuario = $this->model->existeUsuario($_POST['email'], $_POST['password']);
        if(count($usuario) > 0){
            UserSession::setCurrentUser($usuario['usuario']);
        }
        return $usuario;
    }

    public function cerrarSesion(){
        UserSession::closeSession();
        return null;
    }


}


?>