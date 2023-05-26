<?php 
require_once('../databases/connectToBD.php');
session_start();
        $usuario = isset($_SESSION['id']) ? $_SESSION['id'] : $_SESSION['admin'];
    if(strlen($_GET['periodo'])>0){
        
        $consultal = 'SELECT * FROM listas WHERE id_periodo = ? AND id_usuario =?';
        $sentencialistas = $mbd->prepare($consultal);
        $sentencialistas->bindParam(1, $_GET['periodo']);
        $sentencialistas->bindParam(2, $usuario);
        $sentencialistas->execute();
        $datos = $sentencialistas->fetchAll();
  
  }else{
    $consultal = 'SELECT * FROM listas WHERE  id_usuario =?';
    $sentencialistas = $mbd->prepare($consultal);
    $sentencialistas->bindParam(1, $usuario);
    $sentencialistas->execute();
    $datos = $sentencialistas->fetchAll();
  }
  ?>

<table class="table table-sm table-centered mb-5 py-3 w-100"
    <?php $sentencialistas->rowCount() > 10 ? 'id="tablas"' : '' ?>>
    <thead class="text-center bg-dark text-white">
        <tr>
            <th class="text-start ps-3">Nombre</th>
            <th class="text-start"> Modulo</th>
            <th class="text-start"> Periodo</th>
            <th>Semestre</th>
            <th> Estudiantes</th>
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

            <td>
                <?php echo $dato['fecha']; ?>
            </td>
            <td>
                <a href="list=<?php echo base64_encode($dato['id']) ?>" id="button-delete-list"
                    class="text-danger btn border eliminar-btn"><i class="mdi mdi-delete"></i></a>
            </td>

        </tr>



        <?php
         } ?>
    </tbody>

</table>

