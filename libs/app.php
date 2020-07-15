<?php
include 'controllers/errors.controller.php';

class App{

    function __construct(){
        if($_POST){
            $this->manejadorPOST();
        }else{
            $this->manejadorGET();
        }
    }

    public function manejadorPOST(){
        $url = isset($_REQUEST['url']) ? $_REQUEST['url']: 'main';
        $url = rtrim($url, "/");
        $url = explode('/', $url);
        $nombreController  = $url[0].'.controller';
        $archivoController = 'controllers/'.$nombreController.'.php';

        if(! file_exists($archivoController) ){
            echo json_encode(array('OK'=>false, 'mensaje'=>'recurso no encontrado', 'data'=>null, 'error' => 404));
        }else{
            require_once($archivoController);
            $nombreController = ucwords(str_replace(".", "", $nombreController));
            $nombreFunction   = $url[1];
            $controller       = new $nombreController();

            if(! ($controller instanceof MainController)  && !isset($nombreFunction)) {
                echo json_encode(array('OK'=>false, 'mensaje'=>'recurso no encontrado', 'data'=>null, 'error' => 404));
            }else{
                if(isset($nombreFunction)){
                
                    if(! method_exists($controller, $nombreFunction)){
                        echo json_encode(array('OK'=>false, 'mensaje'=>'recurso no encontrado', 'data'=>null, 'error' => 404));
                    }else{
                      
                        if(isset($_REQUEST['idcaptcha']) ){
                            $idCaptcha = $_REQUEST['idcaptcha'];
                            $data = $controller->$nombreFunction($idCaptcha);
                            echo json_encode(array('OK'=>true, 'mensaje'=>'', 'data'=>$data));
                        }else{
                            $data = $controller->$nombreFunction();
                            echo json_encode(array('OK'=>true, 'mensaje'=>'', 'data'=>$data));
                        }
                    }
                }
            }
        }
    }

    public function manejadorGET(){

        $url = isset($_REQUEST['url']) ? $_REQUEST['url']: 'main';
        $url = rtrim($url, "/");
        $url = explode('/', $url);
    
        $nombreController  = $url[0].'.controller';
        $archivoController = 'controllers/'.$nombreController.'.php';

        if(! file_exists($archivoController) ){
            return new ErrorsController();
        }else{
            require_once($archivoController);
            $nombreController = ucwords(str_replace(".", "", $nombreController));
            $nombreFunction   = $url[1];
            $controller       = new $nombreController();

            if(! ($controller instanceof MainController)  && !isset($nombreFunction)) {
                return new ErrorsController();
            }else{
                if(isset($nombreFunction)){
                
                    if(! method_exists($controller, $nombreFunction)){
                        return new ErrorsController();
                    }else{
                        if(!in_array($nombreFunction, array('crear', 'listar'))){
                            if(! isset($url[2]) ){
                                return new ErrorsController();
                            }else{
                                $idCaptcha = $url[2];
                                $controller->$nombreFunction($idCaptcha);
                            }
                        }else{
                            $controller->$nombreFunction();
                        }
                    }
                }
            }
        }
    }
}


?>