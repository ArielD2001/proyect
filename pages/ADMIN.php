<?php
session_start();
include('../assets/loader.html');
//Conexion a base de datos
include_once('databases/connectToBD.php');
//Se valida que exista la palabra sesion
if (!isset($_SESSION)) {
    //Se redirecciona a l login
    header('Location:../index');
   
} else {

    if (isset($_SESSION['id'])) {
        //Se redirecciona a l login
        header('Location:./home');
       die();
    }           
    //Si existe la sesion se toman los datos del usuario
    $idglobal = $_SESSION['admin'];
    $consulta = "SELECT * from usuarios WHERE id = ?";
    $sentencia = $mbd->prepare($consulta);
    $sentencia->bindParam(1, $idglobal);
    $sentencia->execute();
    $filas = $sentencia->rowCount();


    $resultado = $sentencia->fetch();
    $nombre  = $resultado['nombre'];
    $apellido  = $resultado['apellido'];
    // $avatar    = $resultado['avatar'];
}
if(!$_GET){
    $admin = true;
}else{
    if(isset($_GET['u'])){
        $u = true;

        if($_GET['u'] != 1){
            include('admins/config/table-user.php');
        }
    }else if(isset($_GET['p'])){
        $p = true;
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include "config/config-header.php" ?>
    <link rel="stylesheet" href="../assets/css/admin.css">
    <title>Administracion</title>
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
            <div class="content container" id="app">
                <div class="contenedor">
                    <div class="row   px-3 my-3">
                        <div class="col-6  ">
                            <h3><?php echo (!$_GET ? 'Administración' : (isset($_GET['u']) ? 'Administración de Usuarios' : 'Administración de Periodos') )?></h3>
                        </div>
                        <div class="col-6 justify-content-end  d-flex align-items-center">
                            <span class="h6"><?php echo date('d/m/y') . ' - ' ?>
                                <div class="hora_hoy" style="display: inline;">00:00:00</div>
                            </span>
                        </div>
                        <?php 
                        if(isset($_GET['u'])){
                            if($_GET['u'] != 1){
                                ?>
                                     <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item active"><a href="ADMIN.php?u=1">Usuarios</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <?php echo ucwords($usuario['nombre']).' '.ucwords($usuario['apellido']) ?></li>
                    
                                </ol>
                            </nav>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                   
                                <?php  (!$_GET ? include('admins/home.php') : 
                                        (isset($_GET['u']) ? include('admins/usuarios.php') : include('admins/periodos.php') ) )?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- ========= footer =========-->
                <?php include "templates/plantilla-footer.php"; ?>
                <!-- ========= end footer ========= -->
            </div>
            <!-- ========= end contenido ========= -->


        </div>

        <!-- ========= aside ========= -->
        <?php include "templates/plantilla-aside.php"; ?>
        <!-- ========= end aside ========= -->

    </div>
    <?php include "config/config-footer.php" ?>
    <script src="../assets/js/admin.js"></script>
    <?php 
    if($filas > 10){
        ?>
        <script>
        $(document).ready(function() {
            $('#tabla1').DataTable({
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

        $('#tabla2').DataTable({
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
        <?php
    }
    ?>
</body>

</html>