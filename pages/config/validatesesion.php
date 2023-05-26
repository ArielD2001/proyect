<?php

//sesion activa
session_start();

//Se valida que exista la palabra sesion
if (isset($_SESSION['id'])) {


  //Si existe la sesion se toman los datos del usuario
    $idglobal = $_SESSION['id'];
    $consulta = "SELECT * from usuarios WHERE id = ?";
    $sentencia = $mbd->prepare($consulta);
    $sentencia->bindParam(1, $idglobal);
    $sentencia->execute();
    $filas = $sentencia->rowCount();


    $resultado = $sentencia->fetch();
    $nombre  = $resultado['nombre'];
    $apellido  = $resultado['apellido'];

    if($resultado['estado'] != 'activo'){
    header('Location:./config/singout.php');

    }
    
} else if(isset($_SESSION['admin'])){

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
 
     if($resultado['estado'] != 'activo'){
     header('Location:./config/singout.php');
 
     }

}else{
    header('Location:../index');

}
?>