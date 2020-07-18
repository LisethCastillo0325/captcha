<?php
class LoginModel extends Model {

    public $arrayJson;

    function __construct()
    {
        parent::__construct();
        $this->obtenerJson();
    }

    public function obtenerJson(){
        $datos_login = file_get_contents("data/login.json");
        $json_login = json_decode($datos_login, true);
        $this->arrayJson = $json_login;
    }

    public function obtenerArray(){
        return $this->arrayJson;
    }

    public function existeUsuario($loginusuario, $loginclave){
       
        foreach ($this->arrayJson['usuarios'] as $key => $usuario) {
            if((trim($usuario['usuario']) == trim($loginusuario)) && (trim($usuario['clave']) == trim($loginclave))){
                return array("usuario" => $usuario['usuario'], "nombre"=>$usuario['nombre']);
            }
        }
        return array();
    }
}

?>