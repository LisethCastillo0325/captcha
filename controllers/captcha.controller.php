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

    public function ver($id){
        $captcha = $this->model->obtenerCaptchaPorID($id);
        if(count($captcha) == 0){
            new ErrorsController('404');
        }else{
            //var_dump($captcha['links']);
            $this->view->captcha = $captcha;
            $this->view->render('captcha/ver');
        }

    }

    public function apiObtenerLinksCaptcha($id){
        $captcha = $this->model->obtenerCaptchaPorID($id);
        if(count($captcha) == 0){
            return null;
        }else{
            return $captcha['links'];
        }
    }

    public function eliminar($id){

         return $this->model->eliminarCaptcha($id);
    }


}


?>