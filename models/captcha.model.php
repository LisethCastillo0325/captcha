<?php
class CaptchaModel extends Model {

    public $arrayJson;
    private $fileJson;

    function __construct()
    {
        parent::__construct();
        //
        $this->fileJson = "data/data.json";
        $this->obtenerJson();
    }

    public function obtenerJson(){

        $datos_captcha = file_get_contents($this->fileJson);
        $json_captcha = json_decode($datos_captcha, true);

        $this->arrayJson = $json_captcha;
    }
    /**
     * @return array
     */
    public function obtenerTodosLosCaptchas(){
      return  $this->arrayJson;
    }

    /**
     * Busca en el array la información del captcha que corresponda al ID
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

    public function obtenerCaptchaPosicionPorID($id){
        foreach ($this->arrayJson['captchas'] as $key => $captcha) {
            if($captcha['captcha'] === $id){
                return array("index"=>$key, "captcha"=>$captcha);
            }
        }
        return array("key"=>null, "captcha"=>null);
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

        $this->actulizarDataJson($this->arrayJson);
    }

    public function apiAgregarVisita($_captcha, $_pais, $_region, $_ciudad, $_ip){

        $arrayTotalCaptchas = $this->obtenerTodosLosCaptchas();
        $datosCaptcha = $this->obtenerCaptchaPosicionPorID($_captcha);

        $indexCa = $datosCaptcha['index'];
        $captcha = $datosCaptcha['captcha'];
        $paises  = $captcha['paisesVisitas'];

        // validar si existe el pais
        $existePaisIndex = $this->existePaisEnCaptcha($captcha, $_pais);
        if($existePaisIndex >= 0){
            // si existe el pais, validar si existe la region
            $existeRegionIndex = $this->existeRegionEnCaptcha($captcha, $_region, $existePaisIndex);
            if($existeRegionIndex >= 0){
                // si exite la region, validar si exite la ciudad
                $existeCiudadIndex = $this->existeCiudadEnCaptcha($captcha, $_ciudad, $existeRegionIndex, $existePaisIndex);
               
                if($existeCiudadIndex >= 0){
                    // se agrega una visita a la ciudad y se agrega la info de ip
                    $paises[$existePaisIndex]['regiones'][$existeRegionIndex]['ciudades'][$existeCiudadIndex]['cantidadVisitas'] += 1;
                    $paises[$existePaisIndex]['regiones'][$existeRegionIndex]['ciudades'][$existeCiudadIndex]['ipVisitas'][] = $this->obtenerArrayIpVisitas($_ip);
                   
                }else{
                     // agregar nueva ciudad
                     $paises[$existePaisIndex]['regiones'][$existeRegionIndex]['ciudades'][] = $this->obtenerArrayCiudad($_ciudad, $_ip);
                }
            }else{
                // agregar nueva region
                $paises[$existePaisIndex]['regiones'][] = $this->obtenerArrayRegion($_region, $_ciudad, $_ip);
            }
        }else{
            // agregar nuevo pais
            $paises[] = $this->obtenerArrayPais($_pais, $_region, $_ciudad, $_ip);
            $captcha['cantidadPaises'] += 1;
        }
        // actualizar el captcha con la nueva informacion 
        $captcha['cantidadVisitas'] += 1;
        $captcha['paisesVisitas'] = $paises;
        $arrayTotalCaptchas['captchas'][$indexCa] = $captcha;

        $this->actulizarDataJson($arrayTotalCaptchas);
        
        return $arrayTotalCaptchas['captchas'][$indexCa];
    }

    /**
     * @param array $captcha
     * @param string $_pais
     * @return int
     */
    public function existePaisEnCaptcha($captcha, $_pais){
        $paises  = $captcha['paisesVisitas'];
        $existePaisIndex = -1;
        foreach ($paises as $key => $value) {
            if( strtolower(trim($value['nombrePais'])) === strtolower($_pais)){
                $existePaisIndex = $key;
                break;
            }
        }
        return $existePaisIndex;
    }

    /**
     * @param array $captcha
     * @param string $_region
     * @return int
     */
    public function existeRegionEnCaptcha($captcha, $_region, $paisIndex=-1){
        $paises  = $captcha['paisesVisitas'];
        $existeRegionIndex = -1;

        if($paisIndex >= 0){
            foreach ($paises[$paisIndex]['regiones'] as $key => $value) {
                if( strtolower(trim($value['nombreRegion'])) === strtolower($_region)){
                    $existeRegionIndex = $key;
                    break;
                }
            }
        }else{
            foreach ($paises as $key1 => $valuePais) {
                foreach ($valuePais['regiones'] as $key2 => $value) {
                    if( strtolower(trim($value['nombreRegion'])) === strtolower($_region)){
                        $existeRegionIndex = $key2;
                        break;
                    }
                }
            }
        }
        return $existeRegionIndex;
    }

    /**
     * @param array $captcha
     * @param string $_ciudad
     * @return int
     */
    public function existeCiudadEnCaptcha($captcha, $_ciudad, $regionIndex=-1, $paisIndex=-1){
        $paises  = $captcha['paisesVisitas'];
        $existeCiudadIndex = -1;
        if($regionIndex >= 0 && $paisIndex >= 0) {
            foreach ($paises[$paisIndex]['regiones'][$regionIndex]['ciudades'] as $key => $value) {
                if( strtolower(trim($value['nombreCiudad'])) === strtolower($_ciudad)){
                    $existeCiudadIndex = $key;
                    break;
                }
            }
        }else{
            foreach ($paises as $key1 => $valuePais) {
                foreach ($valuePais['regiones'] as $key2 => $valueRegion) {
                    foreach ($valueRegion['ciudades'] as $key3 => $value) {
                        if( strtolower(trim($value['nombreCiudad'])) === strtolower($_ciudad)){
                            $existeCiudadIndex = $key3;
                            break;
                        }
                    } 
                }
            }
        }
        return $existeCiudadIndex;
    }


    private function obtenerArrayIpVisitas($ip){
        return [
            "ip" => $ip,
            "fechaVisita" => date('Y-m-d h:m:s')
        ];
    }

    private function obtenerArrayCiudad($ciudad, $ip){
        return [
            "nombreCiudad" => $ciudad,
            "cantidadVisitas" => 1,
            "ipVisitas" => array(
                $this->obtenerArrayIpVisitas($ip)
            )
        ];
    }

    private function obtenerArrayRegion($region, $ciudad, $ip){
        return [
            "nombreRegion" => $region,
            "ciudades" => array(
                $this->obtenerArrayCiudad($ciudad, $ip)
            )
        ];
    }

    private function obtenerArrayPais($pais, $region, $ciudad, $ip){
        return [
            "nombrePais" => $pais,
            "regiones" => array(
                $this->obtenerArrayRegion($region, $ciudad, $ip)
            )
        ];
    }

    public function actulizarDataJson($arrayJson){
        $json_string = json_encode($arrayJson);
        file_put_contents($this->fileJson, $json_string);
    }

}


?>