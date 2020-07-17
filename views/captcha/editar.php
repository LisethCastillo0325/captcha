<?php include 'views/header.php';
    $datos = $this->resultado['captchas'];
    $links = $datos[0]['links'][0];

?>

    <div class="container">


        <h3 class="titulo-tabla">Editar Captcha </h3>

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

                                <!-- INICIO TABLA LINK 1 -->
                                    <table class="table table-bordered" id="dynamic_field_1">

                                        <?php
                                        /* Si el link no tiene urls asociadas se muestra el primer campola fila*/
                                        if(sizeof($links['linkUno']) == 0){ ?>

                                            <tr >
                                                <td><label>Link 1</label></td>
                                                <td><input type="text" name="link_1"  placeholder="Ingrese Dirección Url" class="form-control name_list" /></td>
                                                <td><button type="button" name="add_1" id="add_1" class="btn btn-success">Agregar Más</button></td>
                                            </tr>


                                        <?php }else{
                                          /*Si el link tiene urls asociada se iteran*/
                                           for($i=0; $i< sizeof($links['linkUno']); $i++){
                                                if($i==0){
                                        ?>

                                                <tr >
                                                    <td><label>Link 1</label></td>
                                                    <td><input type="text" name="link_1" value="<?php echo $links['linkUno'][$i] ?>" placeholder="Ingrese Dirección Url" class="form-control name_list" /></td>
                                                    <td><button type="button" name="add_1" id="add_1" class="btn btn-success">Agregar Más</button></td>
                                                </tr>

                                            <?php
                                            }else{
                                                ?>

                                                <tr id="row_1<?php echo $i ?>">
                                                    <td><label></label></td>
                                                    <td><input type="text" name="link_1" value="<?php echo $links['linkUno'][$i] ?>" placeholder="Ingrese Dirección Url" class="form-control name_list" /></td>
                                                    <td><button type="button" name="remove" id="<?php echo $i ?>" class="btn btn-danger btn_remove">X</button></td>
                                                </tr>


                                            <?php } ?>

                                        <?php }
                                        }?>

                                    </table>
                                    <!-- FIN TABLA LINK 1 -->




                                    <!-- INICIO TABLA LINK 2 -->

                                    <table class="table table-bordered" id="dynamic_field_2">
                                        <?php
                                        /* Si el link no tiene urls asociadas se muestra el primer campola fila*/
                                        if(sizeof($links['linkDos']) == 0){ ?>

                                            <tr >
                                                <td><label>Link 1</label></td>
                                                <td><input type="text" name="link_2"  placeholder="Ingrese Dirección Url" class="form-control name_list" /></td>
                                                <td><button type="button" name="add_2" id="add_2" class="btn btn-success">Agregar Más</button></td>
                                            </tr>


                                        <?php }else{

                                        for($i=0; $i< sizeof($links['linkDos']); $i++){
                                            if($i==0){

                                                ?>

                                                <tr>
                                                    <td><label>Link 1</label></td>
                                                    <td><input type="text" name="link_1" value="<?php echo $links['linkDos'][$i] ?>" placeholder="Ingrese Dirección Url" class="form-control name_list" /></td>
                                                    <td><button type="button" name="add_2" id="add_2" class="btn btn-success">Agregar Más</button></td>
                                                </tr>

                                                <?php
                                            }else{
                                                ?>

                                                <tr id="row_2<?php echo $i ?>">
                                                    <td><label></label></td>
                                                    <td><input type="text" name="link_2" value="<?php echo $links['linkDos'][$i] ?>" placeholder="Ingrese Dirección Url" class="form-control name_list" /></td>
                                                    <td><button type="button" name="remove" id="<?php echo $i ?>" class="btn btn-danger btn_remove_2">X</button></td>
                                                </tr>


                                            <?php } ?>
                                        <?php }
                                        }?>

                                    </table>
                                    <!-- FIN TABLA LINK 2 -->



                              <!-- INICIO TABLA LINK 3 -->
                                    <table class="table table-bordered" id="dynamic_field_3">
                                        <?php
                                        /* Si el link no tiene urls asociadas se muestra el primer campola fila*/
                                        if(sizeof($links['linkTres']) == 0){ ?>

                                            <tr >
                                                <td><label>Link 1</label></td>
                                                <td><input type="text" name="link_3"  placeholder="Ingrese Dirección Url" class="form-control name_list" /></td>
                                                <td><button type="button" name="add_3" id="add_3" class="btn btn-success">Agregar Más</button></td>
                                            </tr>


                                        <?php }else{

                                        for($i=0; $i< sizeof($links['linkTres']); $i++){
                                            if($i==0){
                                                ?>

                                                <tr>
                                                    <td><label>Link 1</label></td>
                                                    <td><input type="text" name="link_3" value="<?php echo $links['linkTres'][$i] ?>" placeholder="Ingrese Dirección Url" class="form-control name_list" /></td>
                                                    <td><button type="button" name="add_3" id="add_3" class="btn btn-success">Agregar Más</button></td>
                                                </tr>

                                           <?php
                                             }else{
                                            ?>

                                                <tr id="row_3<?php echo $i ?>">
                                                    <td><label></label></td>
                                                    <td><input type="text" name="link_3" value="<?php echo $links['linkTres'][$i] ?>" placeholder="Ingrese Dirección Url" class="form-control name_list" /></td>
                                                    <td><button type="button" name="remove" id="<?php echo $i ?>" class="btn btn-danger btn_remove_3">X</button></td>
                                                </tr>


                                            <?php } ?>
                                        <?php }
                                        }?>

                                    </table>

                           <!-- FIN TABLA LINK 3 -->

                                </div>
                                <button type="button" class="btn btn-primary offset-5" onclick="modificarCaptcha()">Guardar</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>




    <script src="<?php echo constant('URL') ?>public/js/general.js" type="text/javascript"></script>

<?php include 'views/footer.php'; ?>



<?php include 'views/footer.php'; ?>