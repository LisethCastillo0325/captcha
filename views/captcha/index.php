
<?php
    include 'views/header.php';
    $datos = $this->resultado['captchas'];
?>

<div class="card mt-5 mb-5">
    <div class="card-body">
        <h3 class="card-title ">Listado  de Captcha Generados</h3>
        <hr class="mb-3">
        <div class="row">

            <div class="col-12" >
                <div class="table-responsive">
                    <table id="ejemplo" class="table table-striped table-bordered table-responsive" style="width:100%">
                        <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Título</th>
                            <th>Captcha</th>
                            <th>Url Captcha</th>
                            <th>Cant. Visitas</th>
                            <th>Cant. Visitas Por País</th>
                            <th>Acciones</th>

                        </tr>
                        </thead>
                        <tbody>
                        <input type="hidden" id="url" value="<?php echo constant('URL') ?>" class="form-control form-control-sm" >

                        <?php foreach ($datos as $dato){ ?>

                            <tr>
                                <td><?php echo $dato['fechaCreacion'];?></td>
                                <td><?php echo $dato['titulo'];?></td>
                                <td><?php echo $dato['captcha'];?></td>
                                <td><?=constant('URL_VERCAPTCHA').$dato['captcha']?></td>
                                <td class="text-center"><?php echo $dato['cantidadVisitas'];?></td>
                                <td class="text-center">
                                    <a href="<?=constant('URL') ?>captcha/detalle/<?=$dato['captcha']?>"   data-toggle="tooltip" title="Ver captcha" class="btn btn-sm btn-default"> <?php echo $dato['cantidadPaises'];?> </a>
                                </td>
                                <td>
                                    <a href="<?=constant('URL_VERCAPTCHA').$dato['captcha']?>" target="_blank"  data-toggle="tooltip" title="Ver captcha" class="btn btn-sm btn-primary"> <i class="fa fa-eye"></i> </a>
                                    <a href="<?=constant('URL')?>captcha/editar/<?=$dato['captcha']?>"   data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-info"> <i class="fa fa-pencil"></i> </a>
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