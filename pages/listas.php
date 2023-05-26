<?php

//Loader
include('../assets/loader.html');

//Conexion a base de datos
include_once('databases/connectToBD.php');

//Verificacion de Sesion
include('config/validatesesion.php');

//Modulos
include('config/sqlmodulos.php');

//Listas
include('config/sqllistas.php');

//periodos

include('config/periodos.php');


//INFORMACION De las listas
if (isset($_GET['lista'])) {
    $consultal = "SELECT * from listas WHERE id = ? ";
    $sentencial = $mbd->prepare($consultal);
    $idlistae = base64_decode(base64_decode($_GET['lista']));
    $sentencial->bindParam(1, $idlistae);
    $sentencial->execute();
    $datal = $sentencial->fetch();
    $idm = $datal['id_modulo'];

    $sqlList = 'SELECT * FROM modulos WHERE id = ?';
    $sentenciaList = $mbd->prepare($sqlList);
    $sentenciaList->bindParam(1, $idm);
    $sentenciaList->execute();
    $modulo = $sentenciaList->fetch();

} else {
    $listactive = true;
   

}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include "config/config-header.php" ?>
    <title>Listas</title>
</head>
<style>

</style>

<body class="loading"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <div class="wrapper">

        <!-- ========== sidebar =========-->
        <?php include "templates/plantilla-sidebar.php"; ?>
        <!-- ========= end sidebar ========= -->



        <div class="content-page">

            <!-- ========= header ========= -->
            <?php include "templates/plantilla-header.php"; ?>
            <!-- ========= end header ========= -->




            <!-- ========= contenido ========= -->
            <div class="content container-md">
                <div class="contenedor ">






                    <div class="row   px-3 my-3">
                        <div class="col-6  ">
                            <?php
                            if (!isset($_GET['lista'])) {
                            ?>
                            <h3>Listas</h3>
                            <?php
                            } else {
                            ?>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item active">Listas</li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <?php echo $modulo['nombre'] ?></li>
                                    <li class="breadcrumb-item text-primary" aria-current="page">
                                        <?php echo $datal['nombre'] ?></li>
                                </ol>
                            </nav>
                            <?php
                            }
                            ?>

                        </div>
                        <div class="col-6 justify-content-end  d-flex align-items-center">
                            <span class="h6"><?php echo date('d/m/y') . ' - ' ?>
                                <div class="hora_hoy" style="display: inline;">00:00:00</div>
                            </span>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-12" id="app">
                            <div class="card ">

                                <div class="card-body " id="card-body">
                                    <?php
                                    if (isset($_GET['lista'])) {
                                        include('config/estudiantes-list.php');
                                    } else {
                                    ?>
                                    <div class="row ">
                                        <div class="col-12 text-end">
                                            <div
                                                class="d-flex row justify-content-between align-items-center container">
                                                <div class="col-3">

                                                    <select class="form-select " aria-label="Default select example" id="select-periodo">
                                                        <option selected value="">Todos los periodos</option>
                                                        <?php 
                                                    foreach($periodos as $periodo){
                                                        ?>
                                                        <option value="<?php echo $periodo['id']; ?>">
                                                            <?php echo $periodo['nombre']; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                    </select>
                                                </div>

                                                <div class="col 3"><button type="button" class="btn btn-success"
                                                        data-bs-toggle="modal" data-bs-target="#centermodal"> + Agregar
                                                        nueva lista</button></div>
                                            </div>
                                            <div class="modal fade" id="centermodal" tabindex="-1" role="dialog"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered text-start ">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myCenterModalLabel"> Agregar
                                                                nueva lista</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-hidden="true"></button>
                                                        </div>
                                                        <div class="modal-body ">

                                                            <div class="container">
                                                                <div class="row border p-3 rounded">
                                                                    <form method="post" accept=".xls,.xlsx"
                                                                        id="formulario-list"
                                                                        enctype="multipart/form-data"
                                                                        data-plugin="dropzone"
                                                                        data-previews-container="#file-previews"
                                                                        data-upload-preview-template="#uploadPreviewTemplate"
                                                                        accept=".xlsx">
                                                                        <div class="row ">
                                                                            <div class="col-12">
                                                                                <label class="form-label"
                                                                                    for="nombre">Nombre:</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="nombre-list"
                                                                                    placeholder="Nombre de lista"
                                                                                    name="nombre-list" />
                                                                                <input type="hidden" name="idglobal"
                                                                                    value="<?php echo $idglobal ?>" />
                                                                            </div>
                                                                            <div class="col-12 mt-2">
                                                                                <label class="form-label"
                                                                                    for="modulo-list">Modulo:</label>
                                                                                <select name="modulo-list"
                                                                                    class="form-select"
                                                                                    id="modulo-list">
                                                                                    <option selected value="">
                                                                                        Seleccionar modulo</option>
                                                                                    <?php foreach ($modulos as $modulo) : ?>
                                                                                    <option
                                                                                        value="<?php echo $modulo['id'] ?>">
                                                                                        <?php echo $modulo['nombre'] ?>
                                                                                    </option>
                                                                                    <?php endforeach ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-6 mt-2">
                                                                                <label class="form-label"
                                                                                    for="semestre">Semestre:</label>
                                                                                <select name="semestre"
                                                                                    class="form-select"
                                                                                    id="semestre-list">
                                                                                    <option selected value="">
                                                                                        Seleccionar semestre</option>
                                                                                    <option value="I (Primero)"> I
                                                                                        (Primero) </option>
                                                                                    <option value="II (Segundo)"> II
                                                                                        (Segundo) </option>
                                                                                    <option value="III (Tercero)"> III
                                                                                        (Tercero) </option>
                                                                                    <option value="IV (Cuarto)"> IV
                                                                                        (Cuarto) </option>
                                                                                    <option value="V (Quinto)"> V
                                                                                        (Quinto) </option>
                                                                                    <option value="VI (Sexto)"> VI
                                                                                        (Sexto) </option>
                                                                                    <option value="VII (Septimo)"> VII
                                                                                        (Septimo) </option>
                                                                                    <option value="VIII (Octavo)">VIII
                                                                                        (Octavo) </option>
                                                                                    <option value="IX (Noveno)"> IX
                                                                                        (Noveno) </option>
                                                                                    <option value="X (Decimo)"> X
                                                                                        (Decimo) </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-6 mt-2">
                                                                                <label for="periodo" class="form-label">Periodo:</label>
                                                                                <select class="form-select "
                                                                                    aria-label="Default select example" name="periodo">
                                                                                    <option selected value="">Periodo</option>
                                                                                    <?php 
                                                                                        foreach($periodos as $periodo){
                                                                                    ?>
                                                                                    <option
                                                                                        value="<?php echo $periodo['id']; ?>">
                                                                                        <?php echo $periodo['nombre']; ?>
                                                                                    </option>
                                                                                    <?php
                                                    }
                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-12 mt-2">
                                                                                <label class="form-label"
                                                                                    for="adjunto">Lista</label>
                                                                                <input type="file" class="form-control"
                                                                                    id="adjunto" name="adjunto" />
                                                                            </div>
                                                                            <div class="col-6 pt-1">
                                                                                <button type="button"
                                                                                    name="agregar-list"
                                                                                    class="w-100 col-6 btn btn-success mt-4"
                                                                                    id="agregar-list">Subir
                                                                                    Lista</button>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 mt-1" id="resultado-list">

                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </div>
                                    <?php
                                        if ($filas2 < 1) {
                                        ?>

                                    <div class="col-12 d-flex flex-column align-items-center">
                                        <img src="../assets/images/layouts/not-found.png" draggable="false"
                                            width="200px" alt="No hay ningun registro!" style="opacity: .8;">
                                        <span class="h4">No se encontraron Listas</span>
                                    </div>
                                    <?php
                                        } else {
                                            $datos = $sentencialistas->fetchAll();
                                        ?>
                                    <div id="tabla-list"
                                        class=" flex-wrap d-flex justify-content-center align-items-center mt-3">
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
                                    <?php
                                        }
                                        ?>
                                </div>
                                <?php
                                    }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "templates/plantilla-footer.php"; ?>
    </div>
    <!-- ========= end contenido ========= -->


    </div>

    <!-- ========= aside ========= -->
    <?php include "templates/plantilla-aside.php"; ?>
    <!-- ========= end aside ========= -->

    <!-- ========= footer =========-->
    <!-- ========= end footer ========= -->
    </div>
    <?php include "config/config-footer.php" ?>
    <script>
    $(document).ready(function() {
        $('#tablas').DataTable({
            scrollCollapse: true,
            ordering: false,
            paging: true,
            columnDefs: [{
                targets: "_all",
                searchable: true
            }],
            fixedColumns: {
                leftColumns: 3
            }
        });
    });

 
    </script>

</body>