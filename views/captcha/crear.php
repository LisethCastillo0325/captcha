<?php include 'views/header.php';
$datos = $this->resultado['captchas'];

?>

    <div class="container">


        <h3 class="titulo-tabla">Generación de Captcha </h3>

        <hr>
        <div class="row">
            <div class="col-12 col-md-12">
                <!-- Contenido -->
                <div class="container">
                    <br />
                    <div class="col-md-12">
                        <div class="form-group">
                            <form id="frm-crear-captcha" name="fcaptcha">
                                <input type="hidden" id="url" value="<?php echo constant('URL') ?>" class="form-control form-control-sm" >


                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dynamic_field_1">
                                        <tr>
                                            <td><label>Link 1</label></td>
                                            <td><input type="text" name="link_1" placeholder="Ingrese Dirección Url" class="form-control name_list" /></td>
                                            <td><button type="button" name="add_1" id="add_1" class="btn btn-success">Agregar Más</button></td>
                                        </tr>
                                        <tr>
                                            <td><label></label></td>
                                            <td><input type="text" name="link_1" placeholder="Ingrese Dirección Url" class="form-control name_list" /></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><label></label></td>
                                            <td><input type="text" name="link_1" placeholder="Ingrese Dirección Url" class="form-control name_list" /></td>
                                            <td></td>
                                        </tr>
                                    </table>

                                    <table class="table table-bordered" id="dynamic_field_2">
                                        <tr>
                                            <td><label>Link 2</label></td>
                                            <td><input type="text" name="link_2" placeholder="Ingrese Dirección Url" class="form-control name_list" /></td>
                                            <td><button type="button" name="add_2" id="add_2" class="btn btn-success">Agregar Más</button></td>
                                        </tr>
                                        <tr>
                                            <td><label></label></td>
                                            <td><input type="text" name="link_2" placeholder="Ingrese Dirección Url" class="form-control name_list" /></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><label></label></td>
                                            <td><input type="text" name="link_2" placeholder="Ingrese Dirección Url" class="form-control name_list" /></td>
                                            <td></td>
                                        </tr>
                                    </table>

                                    <table class="table table-bordered" id="dynamic_field_3">
                                        <tr>
                                            <td><label>Link 3</label></td>
                                            <td><input type="text" name="link_3" placeholder="Ingrese Dirección Url" class="form-control name_list" /></td>
                                            <td><button type="button" name="add_3" id="add_3" class="btn btn-success">Agregar Más</button></td>
                                        </tr>
                                        <tr>
                                            <td><label></label></td>
                                            <td><input type="text" name="link_3" placeholder="Ingrese Dirección Url" class="form-control name_list" /></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><label></label></td>
                                            <td><input type="text" name="link_3" placeholder="Ingrese Dirección Url" class="form-control name_list" /></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                                <button type="button" class="btn btn-primary offset-5" onclick="generarCaptcha()">Generar Captcha</button>

                            </form>

                            <div class="row mt-2 mb-3">
                                <div class="col-md-4 ">
                                </div>
                                <div class="col-md-4 ">
                                    <input type="text" class="form-control form-control-sm "  value="https://localhost/5463-8746-HTDR">
                                </div>
                                <div class="col-md-4 ">
                                </div>
                            </div>
                            <div class="row mt-4 mb-4">
                                <div class="col-md-6 ">
                                    <button type="submit" class="btn btn-primary offset-7">Copiar Url Captcha</button>
                                </div>

                                <div class="col-md-6 ">
                                    <a href="" target="_blank" class="btn btn-primary offset-2">Ver Captcha </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>




<script src="<?php echo constant('URL') ?>public/js/general.js" type="text/javascript"></script>

<?php include 'views/footer.php'; ?>