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

    /**
     * Busca en el array la información del captcha que corresponda al IS
     * @param string $id
     * @return array
     */
    public function obtenerCaptchaPorID($id){
        foreach ($this->arrayJson['captchas'] as $key => $captcha) {
            $resultado = array_search($id, $captcha);
            if($resultado !== false){
                return $captcha;
            }
        }
        return array();
    } 


    public function editar(){

    }

}


?>