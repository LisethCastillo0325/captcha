<?php
class IpapiController extends Controller{

    function __construct()
    {
        parent::__construct();
        $this->loadModel('ipapi');
    }


    public function apiModificarSeleccionIpapi(){

        $_id = trim($_POST['id']);
        
        return $this->model->modificarSeleccionIpapi($_id);
    }

    public function apiObtenerTodosLosIpapi(){
        return $this->model->obtenerTodosLosIpapi();
    }

    public function apiObtenerIpapiSeleccionado(){
        return $this->model->obtenerIpapiSeleccionado();
    }

   
}


?>