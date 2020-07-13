<?php
class CaptchaController extends Controller{

    function __construct()
    {
        parent::__construct();
        //
        $this->loadModel('captcha');
    }

    public function listar(){

        $resultado = $this->model->listarTodos();
        $this->view->resultado = $resultado;

        $this->view->render('captcha/index');
    }

    public function crear(){
        $this->view->render('captcha/crear');
    }

    public function editar($id){
        $this->view->render('captcha/editar');
    }

    public function detalle($id){
        $resultado = $this->model->listarTodos();
        $this->view->resultado = $resultado;
        $this->view->captcha   = $id;

        $this->view->render('captcha/detalle');
    }

}


?>