<?php if ($filas2 != 0) { ?>
<div id="tabla-list" class=" flex-wrap d-flex justify-content-center align-items-center mt-3">
<table class="table table-sm table-centered mb-5 py-3 w-100"
                                            <?php $sentencialistas->rowCount() > 10 ? 'id="tablas"' : '' ?>>
                                            <thead class="text-center bg-dark text-white">
                                                <tr>
                                                    <th class="text-start ps-3">Nombre</th>
                                                    <th class="text-start"> Módulo</th>
                                                    <th class="text-start"> Periodo</th>
                                                    <th>Semestre</th>
                                                    <th>Profesor</th>
                                                    <th>Fecha de añadido</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>

                                            <tbody class="text-center border">
                                                <?php
                                                        foreach ($datos as $dato) {
                                                        ?>
                                                <tr>
                                                    <td class="fw-bold fs-5 text-start ps-3">
                                                        <a href="listas?lista=<?php echo base64_encode(base64_encode($dato['id'])); ?>"
                                                            class="text-info"><?php echo ucwords(strtolower($dato['nombre'])); ?></a>
                                                    </td>

                                                    <td class="text-start">
                                                        <?php
                                                                    $modulo = 'SELECT * from modulos WHERE id = ? ';
                                                                    $nmodulo = $mbd->prepare($modulo);
                                                                    $nmodulo->bindParam(1, $dato['id_modulo']);
                                                                    $nmodulo->execute();
                                                                    $nombre = $nmodulo->fetch();
                                                                    echo $nombre['nombre'];
                                                                    // var_dump($resultadocantidad);
                                                                    ?>
                                                    </td>

                                                    

                                                    <td>
                                                        
                                                        <?php 
                                                        $cperiodo = 'SELECT * FROM periodos WHERE id = ? ';
                                                        $nperiodo = $mbd->prepare($cperiodo);
                                                        $nperiodo->bindParam(1, $dato['id_periodo']);
                                                        $nperiodo->execute();
                                                        $nombre = $nperiodo->fetch();
                                                        echo $nombre['nombre'];
                                                        // var_dump($resultadocantidad);
                                                             ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $dato['semestre']; ?>
                                                    </td>
                                                    <td class="text-start">
                    <?php
                                                            $profesor = 'SELECT * from usuarios WHERE id = ? ';
                                                            $sentenciaprofesor = $mbd->prepare($profesor);
                                                            $sentenciaprofesor->bindParam(1, $dato['id_usuario']);
                                                            $sentenciaprofesor->execute();
                                                            $nombrep =  $sentenciaprofesor->fetch();
                                                            echo ucwords($nombrep['nombre']).' '.ucwords($nombrep['apellido']);
                                                        ?>
                </td>

                                                    <td>
                                                        <?php echo $dato['fecha']; ?>
                                                    </td>
                                                    <td>
                                                        <a href="list=<?php echo base64_encode($dato['id']) ?>"
                                                            id="button-delete-list"
                                                            class="text-danger btn border eliminar-btn"><i
                                                                class="mdi mdi-delete"></i></a>
                                                    </td>

                                                </tr>



                                                <?php
                                                        } ?>
                                            </tbody>

                                        </table>

</div>
<?php } else { ?>
<div class="w-100 text-center">
    <img src="../assets/images/layouts/not-found.png" width="200" alt="">
    <h4>No hay listas en este módulo</h4>
    
    <?php //echo (isset($_SESSION['id']) ? '<p>Agregue una nueva en la pagina de Listas</p>' : '<p>Ningun profesor a subido una lista a este modulo</p>') ;?>

    <?php //echo (isset($_SESSION['id']) ? '<a href="listas" class="btn btn-success">Agregar</a>' : '') ?>
</div>
<?php } ?>