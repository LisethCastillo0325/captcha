
<?php
    //$datos = $this->resultado['captchas']['captcha'];
     $datos   = $this->resultado['captchas'];
     $captcha = $this->captcha;

     $datoCaptcha = "";

    foreach ($datos as $dato){

        if($dato['captcha'] == $captcha){
            $datoCaptcha = $dato;
           break;
        }
    }

?>
<div class="container">


    <div class="row">

        <div class="col-md-12" >

            <h3 class="titulo-tabla">Detalle Captcha</h3>


            <div class="col-6">
                <h4 class="titulo-tabla">Titulo : <?php echo $datoCaptcha['titulo']; ?></h4>
            </div>
            <div class="col-6">
                <h4 class="titulo-tabla">Captcha : : <?php echo $datoCaptcha['captcha']; ?> </h4>
            </div>

            <?php
            $id_tabla = 0;
            foreach ($datoCaptcha['paisesVisitas'] as $datoPais){?>

                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">Pais</th>
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

                                                    <table class="table">
                                                        <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col" class="text-center">Id</th>
                                                            <th scope="col" class="text-center">Direccion Ip</th>
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
                        <?php

                            echo "dddd--".$id;

                            $id++;}?>

                    <?php   echo "---idssss--".$id_tabla;
                        $id_tabla++; }?>

                    </tbody>
                </table>
                <br>

           <?php }?>


        </div>
    </div>

    <!-- VENTANA MODAL -->
    <?php //include('modal.php'); ?>



</div>