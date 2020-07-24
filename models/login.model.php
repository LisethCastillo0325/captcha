<?php
class LoginModel extends Model {

    private $arrayJson;
    
    function __construct()
    {
        parent::__construct();
        $this->arrayJson = $this->obtenerJson("data/login.json");
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