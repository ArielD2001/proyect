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
                                                    <?php echo (isset($_SESSION['admin']) ? '<th>Profesor</th>' : '') ?>

                                                    <?php echo (isset($_SESSION['id']) ? '<th>estudiantes</th>' : '') ?>


                                                    <th>Fecha de añadido</th>
                                                    <?php echo (isset($_SESSION['admin']) ? '<th>Opciones</th>' : '') ?>

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
                                                    <?php if(isset($_SESSION['admin'])){?>
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

                                                    <?php }?>



                                                    <?php if(isset($_SESSION['id'])){?>
                                                        <td class="text-center">
                                                         <?php
                                                            $cantidad = 'SELECT * from estudiantes WHERE id_lista = ? ';
                                                            $sentenciacantidad = $mbd->prepare($cantidad);
                                                            $sentenciacantidad->bindParam(1, $dato['id']);
                                                            $sentenciacantidad->execute();
                                                            $filascantidad = $sentenciacantidad->rowCount();
                                                            echo $filascantidad;
                                                        ?>
                                                     </td>

                                                    <?php }?>
                                                    <td>
                                                        <?php echo $dato['fecha']; ?>
                                                    </td>
                                                    <?php if(isset($_SESSION['admin'])){ ?>
                                                        <td>
                                                        <a href="list=<?php echo base64_encode($dato['id']) ?>"
                                                            id="button-delete-list"
                                                            class="text-danger btn border eliminar-btn"><i
                                                                class="mdi mdi-delete"></i></a>
                                                    </td>
                                                    <?php } ?>

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
    
 
</div>
<?php } ?>