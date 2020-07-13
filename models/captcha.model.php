<?php
class CaptchaModel extends Model {

    public $arrayJson;

    function __construct()
    {
        parent::__construct();
        //

         $this->obtenerJson();
    }

    public function obtenerJson(){

        $datos_captcha = file_get_contents("data/data.json");
        $json_captcha = json_decode($datos_captcha, true);

        $this->arrayJson = $json_captcha;
    }

    public function listarTodos(){
      return  $this->arrayJson;
    }


    public function editar(){

    }

}


?>