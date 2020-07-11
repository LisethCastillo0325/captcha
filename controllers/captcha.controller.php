<?php
class CaptchaController extends Controller{

    function __construct()
    {
        parent::__construct();
        $this->view->render('captcha/index');
    }

    public function listar(){
        echo "<br><b>funcion listar</b>";
    }

    public function crear(){
        echo "<br><b>funcion crear</b>";
    }

}


?>