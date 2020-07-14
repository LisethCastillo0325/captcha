<?php
class MainController extends Controller{

    function __construct()
    {
        parent::__construct();
        $this->view->render('main/index');
    }

    public function listar(){
        echo "<br>funcion listar";
    }

    public function crear(){
        echo "<br>funcion crear";
    }

}


?>