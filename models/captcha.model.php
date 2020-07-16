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
            if($captcha['captcha'] === $id){
                return $captcha;
            }
        }
        return array();
    } 


    public function editar(){

    }

    public function eliminarCaptcha($idCaptcha){

        foreach($this->arrayJson['captchas'] as $key => $captcha)
        {
            if($captcha['captcha']==$idCaptcha)
            {
              unset($this->arrayJson['captchas'][$key]);
            }
        }


        $json_string = json_encode($this->arrayJson);
        $file = "data/data.json";
        file_put_contents($file, $json_string);
    }

    public function generarCaptcha($idCaptcha){


        $flag = false;
        $x=0;
        $num=1;


        while ($x<$num) {
            $nuevoCaptcha = $this->generarIdCaptcha();
            if (!in_array($nuevoCaptcha,$this->arrayJson['captchas'])) {
                $flag = true;
                $x++;
            }
        }

        /*foreach($this->arrayJson['captchas'] as $key => $captcha)
        {
            if($captcha['captcha']==$idCaptcha)
            {
                $flag = false;
            }
        }*/

        $fecha =  date("Y-m-d");


        /* si el captcha es unico crea el registro nuevo*/
        if($flag){

            $newdata =  array (
                'titulo' => $idCaptcha['titulo'],
                'captcha' => $nuevoCaptcha,
                'fechaCreacion' => $fecha,
                'cantidadVisitas' => 0,
                'cantidadPaises' => 0,
                'urlCliente' => 'wwww.youtube.com',
                'links' => [$idCaptcha['links']],
                'paisesVisitas' =>''
            );// for recipe
           // return "ingrese controlados---".$idCaptcha."----".$newdata;

            $this->arrayJson['captchas'][] = $newdata;

        }

        //return $this->generarIdCaptcha();

        $json_string = json_encode($this->arrayJson);
        $file = "data/data.json";
        file_put_contents($file, $json_string);

        return "Registro Generado";
    }

    public function generarIdCaptcha(){

        $captcha1 = substr(str_shuffle("0123456789"), 0, 4);
        $captcha2 = substr(str_shuffle("0123456789"), 0, 4);
        $captcha3 = substr(str_shuffle("HRXYZWK"), 0, 4);

        return $captchaCompleto = $captcha1."-".$captcha2."-".$captcha3;


    }
}


?>