
<?php include 'views/header.php'; ?>


<a class="btn btn-outline-secondary mt-3" href="<?php echo constant('URL') ?>captcha/listar"><i class="fa fa-chevron-left" aria-hidden="true"></i> Regresar</a>

<div class="card mt-5 mb-5">
    <div class="card-body">
        <h5 class="card-title">Detalle del Captcha: <?=$this->captcha['captcha'];?></h5>
        <h6 class="card-subtitle mb-2 text-muted">
            Título : <?= $this->captcha['titulo']; ?> | Fecha: <?= $this->captcha['fechaCreacion']; ?>
        </h6>
        <hr class="mb-5">
        <div class="accordion" id="accordionExample">
            <?php
            $id_tabla = 0;
            foreach ($this->captcha['paisesVisitas'] as $datoPais){?>

                <div class="card">
                    <div class="card-header" id="headingTable_<?=$id_tabla;?>">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTable_<?=$id_tabla;?>" aria-expanded="true" aria-controls="collapseTable_<?=$id_tabla;?>">
                            <?php echo $datoPais['nombrePais']; ?>
                            </button>
                        </h5>
                    </div>
                    <?php ($id_tabla == 0) ? $class_show = "show" : $class_show = "";  ?>

                    <div id="collapseTable_<?=$id_tabla;?>" class="collapse <?=$class_show?> justify-content-left" aria-labelledby="headingTable_<?=$id_tabla;?>" data-parent="#accordionExample">
                        <div class="card-body">
                            <table class="table table-striped table-bordered tabla-detalle-captcha" style="width:100%">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="text-center">País</th>
                                    <th scope="col" class="text-center">Región</th>
                                    <th scope="col" class="text-center">Ciudad</th>
                                    <th scope="col" class="text-center">Cant. Visitas</th>
                                    <th scope="col" class="text-center">Dirección Ip</th>

                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $id=0;
                                foreach ($datoPais['regiones'] as $datoRegion){?>
                                    <?php foreach ($datoRegion['ciudades'] as $datoCiudad){?>

                                    <tr>
                                            <td class="text-center"><?php echo $datoPais['nombrePais']; ?></td>
                                            <td class="text-center"><?php echo $datoRegion['nombreRegion']; ?></td>
                                            <td class="text-center"><?php echo $datoCiudad['nombreCiudad']; ?></td>
                                            <td class="text-center"><?php echo $datoCiudad['cantidadVisitas']; ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ipModal_<?php echo $id_tabla;?>_<?php echo $id; ?>">
                                                    Ver Ip
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="ipModal_<?php echo $id_tabla;?>_<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="ipModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ipModalLabel">Direcciones Ip de <?php echo $datoCiudad['nombreCiudad']; ?> </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <table class="table table-striped table-bordered tabla-detalle-ip-captcha">
                                                                    <thead class="thead-dark">
                                                                    <tr>
                                                                        <th scope="col" class="text-center">Id</th>
                                                                        <th scope="col" class="text-center">Dirección Ip</th>
                                                                        <th scope="col" class="text-center">Fecha - Hora</th>

                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php

                                                                    $id_ip=1;
                                                                    foreach ($datoCiudad['ipVisitas'] as $datoIp) {?>
                                                                        <tr>
                                                                        <td class="text-center"><?php echo $id_ip; ?></td>
                                                                        <td class="text-center"><?php echo $datoIp['ip']; ?> </td>
                                                                        <td class="text-center"><?php echo $datoIp['fechaVisita']; ?> </td>
                                                                        </tr>
                                                                    <?php $id_ip++; } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </td>
                                    </tr>
                                    <?php $id++; }?>

                                <?php  $id_tabla++; }?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</div>
<?php include 'views/footer.php'; ?>