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

include('config/profesores.php');




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
    $p = null;
    $u = null;

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
                                                <?php
                                                include('config/filtro.php');
                                                ?>

                                                <div class="col 3">
                                                    <button type="button" class="btn btn-success"
                                                        data-bs-toggle="modal" data-bs-target="#centermodal"> + Agregar
                                                        nueva lista</button>
                                                    </div>
                                            </div>
                                            <?php include('./config/modal-add.php'); ?>
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
                                     <?php include('config/table-modulo.php') ;?>
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