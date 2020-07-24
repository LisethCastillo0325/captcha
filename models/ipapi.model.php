<?php
class IpapiModel extends Model {

    private $_arrayJsonIpapi;
    private $fileJsonIpapi;

    function __construct()
    {
        parent::__construct();
        $this->fileJsonIpapi = "data/ipapi.json";
        $this->_arrayJsonIpapi = $this->obtenerJson($this->fileJsonIpapi);
    }

    /**
     * @return array
     */
    public function obtenerTodosLosIpapi(){
        return $this->_arrayJsonIpapi;
    }

    public function obtenerIpapiSeleccionado(){
        foreach($this->_arrayJsonIpapi['api'] as $key => $ipapi){
            if($ipapi['seleccionado'] === true) {
               return $ipapi;
            }
        }
        return null;
    }


    public function modificarSeleccionIpapi($idIpapi){
        $modificado = null;
        foreach($this->_arrayJsonIpapi['api'] as $key => $ipapi){
            if($ipapi['id'] == $idIpapi) {
               $this->_arrayJsonIpapi['api'][$key]['seleccionado'] = true;
               $modificado = $ipapi;
            }
        }

        if(! is_null($modificado)){
            foreach($this->_arrayJsonIpapi['api'] as $key => $ipapi){
                if($ipapi['id'] != $idIpapi) {
                   $this->_arrayJsonIpapi['api'][$key]['seleccionado'] = false;
                }
            }
        }
        $this->actulizarDataJson($this->_arrayJsonIpapi, $this->fileJsonIpapi);
        return $ipapi;
    }

}

?>