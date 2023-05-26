<?php

//Loader
include('../assets/loader.html');

//Conexion a base de datos
include_once('databases/connectToBD.php');

//Verificacion de Sesion
include('config/validatesesion.php');
$home = true;
?>


<!DOCTYPE html>
<html lang="es">

<head>

    <?php include('config/config-header.php') ?>
    <link rel="shortcut icon" href="../assets/images/logo_sm.png">
    <title>Home</title>
   
</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <div class="wrapper">

        <!-- ========== sidebar =========-->
        <?php include "templates/plantilla-sidebar.php"; ?>
        <!-- ========= end sidebar ========= -->



        <div class="content-page">

            <!-- ========= header ========= -->
            <?php include "templates/plantilla-header.php"; ?>
            <!-- ========= end header ========= -->

            <!-- ========= contenido ========= -->

          
            <div class="content container">
                <div class="contenedor">
                    <div class="row   px-3 mt-3">
                        <div class="col-6  ">
                            <h4>Bienvenido <?php echo  ucwords(strtolower($nombre)). ' '. ucwords(strtolower($apellido)) ?></h4>
                        </div>
                        <div class="col-6 justify-content-end  d-flex align-items-center">
                            <span class="h6"><?php echo date('d/m/y') . ' - ' ?>
                                <div class="hora_hoy" style="display: inline;">00:00:00</div>
                            </span>
                        </div>

                    </div>
                </div>
            </div>
            <!-- ========= end contenido ========= -->

            <!-- ========= footer =========-->
            <?php include "templates/plantilla-footer.php"; ?>
            <!-- ========= end footer ========= -->

        </div>

        <!-- ========= aside ========= -->
        <?php include "templates/plantilla-aside.php"; ?>
        <!-- ========= end aside ========= -->

    </div>


    <?php include('config/config-footer.php'); ?>
</body>

</html>