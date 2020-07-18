<?php include 'views/header.php';

    $datos = $this->resultado;
    $links = $datos['links'][0];

?>
    <style>
        .table td {
            border-top: none;
        }
    </style>

<a class="btn btn-outline-secondary mt-3" href="<?php echo constant('URL') ?>captcha/listar"><i class="fa fa-chevron-left" aria-hidden="true"></i> Regresar</a>

<div class="card mt-5 mb-5 " >
    <div class="card-body ">
        <h3 class="card-title">Modificar Captcha : <?php echo $datos['captcha'] ?></h3>
        <h6 class="card-subtitle mb-2 text-muted">
            Formulario para modificar un captcha, recuerde ingresar las direcciones URL con los protocolos https:// o http:// 
        </h6>
        <hr class="mb-3">
    
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- Contenido -->
                <div class="form-group">
                    <form id="frm-crear-captcha" name="fcaptcha">
                        <input type="hidden" id="url" value="<?php echo constant('URL') ?>" class="form-control form-control-sm" >
                        <input type="hidden" id="captcha" value="<?php echo $datos['captcha'] ?>" class="form-control form-control-sm" >

                        <div class="row mb-1">
                            <div class="col d-flex justify-content-end">
                                <label>Titulo</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $datos['titulo'] ?>" >
                            </div>
                            <div class="col">
                            </div>
                        </div>

                        <!-- INICIO DIV LINK 1 -->

                        <div id="dynamic_field_1">

                            <?php
                            /* Si el link no tiene urls asociadas se muestra el primer campola fila*/

                            if(sizeof($links['linkUno']) == 0 || $links['linkUno']==''){ ?>

                                <div class="row mb-1">
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


                            <?php }else{
                                /*Si el link tiene urls asociada se iteran*/
                                for($i=0; $i< sizeof($links['linkUno']); $i++){
                                    if($i==0){
                                        ?>

                                        <div class="row mb-1" >
                                            <div class="col d-flex justify-content-end">
                                                <label>Link 1</label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="link_1" value="<?php echo $links['linkUno'][$i] ?>" placeholder="Ingrese Dirección Url" class="form-control name_list" />
                                            </div>
                                            <div class="col">
                                                <button type="button" name="add_1" id="add_1" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Agregar Más">+</button>
                                            </div>
                                        </div>

                                        <?php
                                    }else{
                                        ?>

                                        <div class="row mb-1" id="row_1_<?php echo $i ?>">
                                            <div class="col">
                                            </div>
                                            <div class="col">
                                                <input type="text" name="link_1" value="<?php echo $links['linkUno'][$i] ?>" placeholder="Ingrese Dirección Url" class="form-control name_list" />
                                            </div>
                                            <div class="col">
                                                <button type="button" name="remove" id="<?php echo $i ?>" class="btn btn-danger btn_remove" data-toggle="tooltip" data-placement="right" title="Quitar">X</button>
                                            </div>
                                        </div>


                                    <?php } ?>

                                <?php }
                            }?>
                        </div>
                        <!-- FIN DIV LINK 1 -->

                        <!-- INICIO DIV LINK 2 -->

                        <div id="dynamic_field_2">
                            <?php
                            /* Si el link no tiene urls asociadas se muestra el primer campola fila*/

                            if(sizeof($links['linkDos']) == 0 || $links['linkDos']==''){ ?>

                                <div class="row mt-2">
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


                            <?php }else{
                                /*Si el link tiene urls asociada se iteran*/
                                for($i=0; $i< sizeof($links['linkDos']); $i++){
                                    if($i==0){
                                        ?>

                                        <div class="row mt-2" >
                                            <div class="col d-flex justify-content-end">
                                                <label>Link 2</label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="link_2" value="<?php echo $links['linkDos'][$i] ?>" placeholder="Ingrese Dirección Url" class="form-control name_list" />
                                            </div>
                                            <div class="col">
                                                <button type="button" name="add_2" id="add_2" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Agregar Más">+</button>
                                            </div>
                                        </div>

                                        <?php
                                    }else{
                                        ?>

                                        <div class="row mt-1" id="row_2_<?php echo $i ?>">
                                            <div class="col">
                                            </div>
                                            <div class="col">
                                                <input type="text" name="link_2" value="<?php echo $links['linkDos'][$i] ?>" placeholder="Ingrese Dirección Url" class="form-control name_list" />
                                            </div>
                                            <div class="col">
                                                <button type="button" name="remove" id="<?php echo $i ?>" class="btn btn-danger btn_remove_2" data-toggle="tooltip" data-placement="right" title="Quitar">X</button>
                                            </div>
                                        </div>


                                    <?php } ?>

                                <?php }
                            }?>
                        </div>
                        <!-- FIN DIV LINK 2 -->

                        <!-- INICIO DIV LINK 3 -->

                        <div id="dynamic_field_3">
                            <?php
                            /* Si el link no tiene urls asociadas se muestra el primer campola fila*/

                            if(sizeof($links['linkTres']) == 0 || $links['linkTres']==''){ ?>

                                <div class="row mt-2">
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


                            <?php }else{
                                /*Si el link tiene urls asociada se iteran*/
                                for($i=0; $i< sizeof($links['linkTres']); $i++){
                                    if($i==0){
                                        ?>

                                        <div class="row mt-2" >
                                            <div class="col d-flex justify-content-end">
                                                <label>Link 3</label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="link_3" value="<?php echo $links['linkTres'][$i] ?>" placeholder="Ingrese Dirección Url" class="form-control name_list" />
                                            </div>
                                            <div class="col">
                                                <button type="button" name="add_3" id="add_3" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Agregar Más">+</button>
                                            </div>
                                        </div>

                                        <?php
                                    }else{
                                        ?>

                                        <div class="row mt-1" id="row_3_<?php echo $i ?>">
                                            <div class="col">
                                            </div>
                                            <div class="col">
                                                <input type="text" name="link_3" value="<?php echo $links['linkTres'][$i] ?>" placeholder="Ingrese Dirección Url" class="form-control name_list" />
                                            </div>
                                            <div class="col">
                                                <button type="button" name="remove" id="<?php echo $i ?>" class="btn btn-danger btn_remove_3" data-toggle="tooltip" data-placement="right" title="Quitar">X</button>
                                            </div>
                                        </div>


                                    <?php } ?>

                                <?php }
                            }?>
                        </div>
                        <!-- FIN DIV LINK 3 -->

                        <div class="row justify-content-center mt-3">
                            <div class="col-md-4">
                                <button type="button" class="btn btn-primary btn-block" onclick="modificarCaptcha()">Guardar</button>
                            </div>
                        </div>

                    </form>

                    <hr>

                </div>
            </div>
        </div>
    </div>
</div>


    <script src="<?php echo constant('URL') ?>public/js/general.js" type="text/javascript"></script>

<?php include 'views/footer.php'; ?>