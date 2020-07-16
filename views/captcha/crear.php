<?php include 'views/header.php';
$datos = $this->resultado['captchas'];

?>

    <div class="container">


        <div class="row">

            <div class="col-12" >
                <h3 class="titulo-tabla">Generación de Captcha </h3>

                    <form id="frm-crear-captcha" name="fcaptcha" onsubmit="return generarCaptcha();" autocomplete="off">
                        <div class="row mb-4">

                        <div class="col-md-4 ">

                            <label>Link 1 <input type="button" class="btn btn-success btn-sm" id="add_btn_1" value="adicionar" onclick="adiccionarCamposLinkUno()">
                            </label>
                            <input type="hidden" id="url" value="<?php echo constant('URL') ?>" class="form-control form-control-sm" >

                            <div id="link_1">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" name="link_1" >
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" name="link_1">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm"  name="link_1">
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4 ">

                            <label>Link 2 <input type="button" id="add_btn_2" value="adicionar" onclick="adiccionarCamposLinkDos()">
                            </label>

                            <div id="link_2">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" name="link_2" >
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" name="link_2">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" name="link_2">
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4 ">

                            <label>Link 3 <a href="#" id="add_btn_3" class="btn btn-success  btn-sm" onclick="adiccionarCamposLinkTres()"><i class="fa fa-plus"></i></a>
                            </label>

                            <div id="link_3">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" name="link_3">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm"  name="link_3">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" name="link_3">
                                </div>
                            </div>

                        </div>


                        <button type="button" class="btn btn-primary offset-5" onclick="generarCaptcha()">Generar Capcha</button>
                           <!-- <input type="submit" class="btn btn-primary offset-5" value="Generar Capcha">-->


                        </div>
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
                        <button type="submit" class="btn btn-primary offset-7">Copiar Url Capcha</button>
                    </div>

                    <div class="col-md-6 ">
                        <a href="" target="_blank" class="btn btn-primary offset-2">Ver Capcha </a>
                    </div>

                </div>

            </div>
        </div>
</div>
<script src="<?php echo constant('URL') ?>public/js/general.js" type="text/javascript"></script>

<?php include 'views/footer.php'; ?>