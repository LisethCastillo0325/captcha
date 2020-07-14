<?php include 'views/header.php'; ?>

    <div class="container">


        <div class="row">

            <div class="col-12" >
                <h3 class="titulo-tabla">Generación de Captcha </h3>

                    <form>
                        <div class="row mb-4">

                        <div class="col-md-4 ">

                            <label>Link 1 <input type="button" class="btn btn-success btn-sm" id="add_btn_1" value="adicionar" onclick="adiccionarCamposLinkUno()">
                            </label>

                            <div id="link_1">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" >
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" >
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" >
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4 ">

                            <label>Link 2 <input type="button" id="add_btn_2" value="adicionar" onclick="adiccionarCamposLinkDos()">
                            </label>

                            <div id="link_2">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" >
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" >
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" >
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4 ">

                            <label>Link 3 <a href="#" id="add_btn_3" class="btn btn-success  btn-sm" onclick="adiccionarCamposLinkTres()"><i class="fa fa-plus"></i></a>
                            </label>

                            <div id="link_3">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" >
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" >
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" >
                                </div>
                            </div>

                        </div>


                        <button type="submit" class="btn btn-primary offset-5">Generar Capcha</button>
                        </div>
                    </form>
            </div>
        </div>
</div>
<script src="<?php echo constant('URL') ?>public/js/vercaptcha.js" type="text/javascript"></script>

<?php include 'views/footer.php'; ?>