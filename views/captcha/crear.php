<?php include 'views/header.php';
$datos = $this->resultado['captchas'];

?>

</script>
<style>
    .table td {
        border-top: none;
    }
</style>

        <h3 class="titulo-tabla">Generación de Captcha </h3>

        <hr>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- Contenido -->
                <div class="form-group">
                    <form id="frm-crear-captcha" name="fcaptcha">
                        <input type="hidden" id="url" value="<?php echo constant('URL') ?>" class="form-control form-control-sm" >

                         <div class="row mb-2">
                                <div class="col d-flex justify-content-end">
                                    <label>Titulo</label>
                                </div>
                                <div class="col">
                                        <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $datos['titulo'] ?>" >
                                </div>
                                <div class="col">
                                </div>
                            </div>

                        <div id="dynamic_field_1">
                            <div class="row mb-2">
                                <div class="col d-flex justify-content-end">
                                    <label>Link 1</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="link_1" placeholder="Ingrese Dirección Url" class="form-control name_list" />
                                </div>
                                <div class="col">
                                    <button type="button" name="add_1" id="add_1" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Agregar Más">+</button>
                                </div>
                            </div>
                        
                            <div class="row mb-2">
                                <div class="col">
                                </div>
                                <div class="col">
                                    <input type="text" name="link_1" placeholder="Ingrese Dirección Url" class="form-control name_list" />
                                </div>
                                <div class="col">
                                </div>
                            </div>  
                            <div class="row mb-2">
                                <div class="col">
                                </div>
                                <div class="col">
                                    <input type="text" name="link_1" placeholder="Ingrese Dirección Url" class="form-control name_list" />
                                </div>
                                <div class="col">
                                </div>
                            </div>  
                        </div>

                        <div id="dynamic_field_2">
                            <div class="row mb-2">
                                <div class="col d-flex justify-content-end">
                                    <label>Link 2</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="link_2" placeholder="Ingrese Dirección Url" class="form-control name_list" />
                                </div>
                                <div class="col">
                                    <button type="button" name="add_2" id="add_2" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Agregar Más">+</button>
                                </div>
                            </div>
                        
                            <div class="row mb-2">
                                <div class="col">
                                </div>
                                <div class="col">
                                    <input type="text" name="link_2" placeholder="Ingrese Dirección Url" class="form-control name_list" />
                                </div>
                                <div class="col">
                                </div>
                            </div>  
                            <div class="row mb-2">
                                <div class="col">
                                </div>
                                <div class="col">
                                    <input type="text" name="link_2" placeholder="Ingrese Dirección Url" class="form-control name_list" />
                                </div>
                                <div class="col">
                                </div>
                            </div>  
                        </div>
                            
                        <div id="dynamic_field_3">
                            <div class="row mb-2">
                                <div class="col d-flex justify-content-end">
                                    <label>Link 3</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="link_3" placeholder="Ingrese Dirección Url" class="form-control name_list" />
                                </div>
                                <div class="col">
                                    <button type="button" name="add_3" id="add_3" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Agregar Más">+</button>
                                </div>
                            </div>
                        
                            <div class="row mb-2">
                                <div class="col">
                                </div>
                                <div class="col">
                                    <input type="text" name="link_3" placeholder="Ingrese Dirección Url" class="form-control name_list" />
                                </div>
                                <div class="col">
                                </div>
                            </div>  
                            <div class="row mb-2">
                                <div class="col">
                                </div>
                                <div class="col">
                                    <input type="text" name="link_3" placeholder="Ingrese Dirección Url" class="form-control name_list" />
                                </div>
                                <div class="col">
                                </div>
                            </div>  
                        </div>

                        <div class="row justify-content-center mt-3">
                            <div class="col-md-4">
                                <button type="button" class="btn btn-primary btn-block" onclick="generarCaptcha()">Generar Capcha</button>
                            </div>
                        </div>

                    </form>

                    <hr>

                    <div class="row mt-2 mb-3 justify-content-center">

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text"  class="form-control "  value="https://localhost/5463-8746-HTDR">
                                <p style="display:none" id="url_captcha"> https://localhost/5463-8746-HTDR</p>
                                <div class="input-group-prepend">
                                    <button  class="btn btn-primary " onclick="copiarAlPortapapeles('url_captcha')">Copiar Url Capcha</button>
                                </div>
                                <div class="input-group-prepend boder-1 ml-1">
                                    <a href="" target="_blank" class="btn btn-primary ">Ver Capcha </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row mt-2 mb-3 justify-content-center">

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div id="alerta" class="alert invisible"></div>
                            </div>
                         </div>

                    </div>
                </div>
            </div>
        </div>





<script src="<?php echo constant('URL') ?>public/js/general.js" type="text/javascript"></script>

<?php include 'views/footer.php'; ?>