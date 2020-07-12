<?php
include 'controllers/errors.controller.php';

class App{

    function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url']: 'main';
        $url = rtrim($url, "/");
        $url = explode('/', $url);
       
        $nombreController = $url[0].'.controller';
        $archivoController = 'controllers/'.$nombreController.'.php';
      
        if(file_exists($archivoController)){
            require_once($archivoController);
            $nombreController = ucwords(str_replace(".", "", $nombreController));
            $controller = new $nombreController();


            if(isset($url[1])){
                $nombreFunction = $url[1];
                $idCaptcha      = $url[2];

                if(method_exists($controller, $nombreFunction)){

                    if($nombreFunction == 'editar'){
                        $controller->$nombreFunction($idCaptcha);
                    }else{
                        $controller->$nombreFunction();
                    }
                }else{
                    $controller = new ErrorsController();
                }
            }
            
        }else{
            $controller = new ErrorsController();
        }

    }

}


?>