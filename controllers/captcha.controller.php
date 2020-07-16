<?php
class CaptchaController extends Controller{

    function __construct()
    {
        parent::__construct();
        $this->loadModel('captcha');
    }

    public function listar(){
        $resultado = $this->model->listarTodos();
        $this->view->resultado = $resultado;
        $this->view->render('captcha/index');
    }

    public function crear(){
        $resultado = $this->model->listarTodos();
        $this->view->resultado = $resultado;
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
            $this->view->captcha = $captcha;
            $this->view->render('captcha/ver');
        }
    }

    public function apiObtenerCaptcha($id){
        $captcha = $this->model->obtenerCaptchaPorID($id);
        if(count($captcha) == 0){
            return null;
        }else{
            return $captcha;
        }
    }

    public function eliminar($id){

         return $this->model->eliminarCaptcha($id);
    }

    public function apiObtenerJsonCaptcha(){
        $resultado = $this->model->listarTodos();
       return $resultado;
    }

    public function generarCaptcha($id){

        return $this->model->generarCaptcha($id);
    }


}


?>