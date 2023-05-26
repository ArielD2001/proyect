<?php if ($filas2 != 0) { ?>
<div id="tabla-list" class=" flex-wrap d-flex justify-content-center align-items-center mt-3">
    <table class="table table-sm mt-3 table-centered mb-5">
        <thead class="text-center bg-dark text-white">
            <tr>
                <th>Lista</th>
                <th> Modulo</th>
                <th>Semestre</th>
                <th> Estudiantes</th>
                <?php echo (isset($_SESSION['admin'])? '<th> Profesor</th>' : '') ?>
                <th>Fecha de añadido</th>
            </tr>
        </thead>

        <tbody class="text-center border-bottom">
            <?php
                                                    foreach ($listas as $dato) {
                                                    ?>
            <tr>
                <td class="fw-bold fs-5 text-start ps-3 ">
                    <a href="listas?lista=<?php echo base64_encode(base64_encode($dato['id'])); ?>"
                        class="text-info"><?php echo ucwords(strtolower($dato['nombre'])); ?></a>
                </td>

                <td>
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
                    <?php echo $dato['semestre']; ?>
                </td>

                <td>
                    <?php
                                                                $cantidad = 'SELECT * from estudiantes WHERE id_lista = ? ';
                                                                $sentenciacantidad = $mbd->prepare($cantidad);
                                                                $sentenciacantidad->bindParam(1, $dato['id']);
                                                                $sentenciacantidad->execute();
                                                                $filascantidad = $sentenciacantidad->rowCount();
                                                                echo $filascantidad;
                                                                ?>
                </td>
                <td class="text-start">
                    <?php
                                                            $profesor = 'SELECT * from usuarios WHERE id = ? ';
                                                            $sentenciaprofesor = $mbd->prepare($profesor);
                                                            $sentenciaprofesor->bindParam(1, $dato['id_usuario']);
                                                            $sentenciaprofesor->execute();
                                                            $nombrep =  $sentenciaprofesor->fetch();
                                                            echo $nombrep['nombre'].' '.$nombrep['apellido'];
                                                        ?>
                </td>
                <td>
                    <?php echo $dato['fecha']; ?>
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
    <h4>No hay listas en este modulo</h4>
    <?php echo (isset($_SESSION['id']) ? '<p>Agregue una nueva en la pagina de Listas</p>' : '<p>Ningun profesor a subido una lista a este modulo</p>') ;?>

    <?php echo (isset($_SESSION['id']) ? '<a href="listas" class="btn btn-success">Agregar</a>' : '') ?>
</div>
<?php } ?>