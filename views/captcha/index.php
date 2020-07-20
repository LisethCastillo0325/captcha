
<?php
    include 'views/header.php';
    $datos = $this->resultado['captchas'];
?>
<!-- <style>
    /* @font-face {
        font-family: "texto tabla";
        src: url("../../public/fonts/TABLA.ttf");
    }

    .textoTabla {
        font-family: "texto tabla";
    } */
</style> -->
<a class="btn btn-success mt-3" href="" onclick="refrescarPagina()"><i class="fa fa-refresh" aria-hidden="true"></i> Refrescar Pagina</a>

<div class="card mt-5 mb-5">
    <div class="card-body">
        <h3 class=" text-center textoTabla">Listado  de Captcha Generados</h3>
        <hr class="mb-3">
        <div class="row">

            <div class="col-12 textoTabla" >
                <div class="table-responsive">
                    <table id="ejemplo" class="table table-striped table-bordered " style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-center ">Fecha</th>
                            <th class="text-center ">Título</th>
                            <th class="text-center ">Captcha</th>
                            <th class="text-center ">Url</th>
                            <th class="text-center ">Visitas</th>
                            <th class="text-center ">Visitas Por País</th>
                            <th class="text-center ">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <input type="hidden" id="url" value="<?php echo constant('URL') ?>" class="form-control form-control-sm" >

                        <?php foreach ($datos as $dato){ ?>

                            <tr>
                                <td  style="width:100px;"><?php echo $dato['fechaCreacion'];?></td>
                                <td><?php echo $dato['titulo'];?></td>
                                <td style="width:140px;"><?php echo $dato['captcha'];?></td>
                                <td>
                                    <a href="<?php echo $dato['urlOrigen'];?>" target="_blank"  data-toggle="tooltip" title="Ver captcha" class="btn btn-sm btn-default"> <?php echo $dato['urlOrigen'];?> </a>
                                </td>
                                <!--<td><?=constant('URL_VERCAPTCHA').$dato['captcha']?></td>-->
                                <td class="text-center"><?php echo $dato['cantidadVisitas'];?></td>
                                <td class="text-center">
                                    <a href="<?=constant('URL') ?>captcha/detalle/<?=$dato['captcha']?>" target="_blank"  data-toggle="tooltip" title="Ver captcha" class="btn btn-sm btn-default"> <?php echo $dato['cantidadPaises'];?> </a>
                                </td>
                                <td style="width:100px;">
                                    <a href="<?=constant('URL_VERCAPTCHA').$dato['captcha']?>" target="_blank"  data-toggle="tooltip" title="Ver captcha" class="btn btn-sm btn-primary"> <i class="fa fa-eye"></i> </a>
                                    <a href="<?=constant('URL')?>captcha/editar/<?=$dato['captcha']?>"  data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-info"> <i class="fa fa-pencil"></i> </a>
                                    <a href="#" id="<?=$dato['captcha']?>" onclick="confirmDelete('<?=$dato['captcha']?>')"  class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>

                        <?php } ?>

                        </tbody>
                        <!--<tfoot>
                        <tr>
                            <th>Fecha</th>
                            <th>Titulo</th>
                            <th>Captcha</th>
                            <th>Url</th>
                            <th>Cant. Visitas</th>
                            <th>Cant. Paises</th>
                            <th>Acciones</th>
                        </tr>
                        </tfoot>-->
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="<?php echo constant('URL') ?>public/js/general.js" type="text/javascript"></script>

<?php include 'views/footer.php'; ?>