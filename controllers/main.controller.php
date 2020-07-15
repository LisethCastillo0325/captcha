<?php
class MainController extends Controller{

    function __construct()
    {
        parent::__construct();
        $this->obtenerPaginaPorDefecto();
    }


    public function obtenerPaginaPorDefecto(){
        if(isset($_SESSION['user'])){
            $this->view->render('main/index');
        }else{
            $this->view->render('login/login');
        }
    }

}


?>