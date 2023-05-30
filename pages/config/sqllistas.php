<?php

if(isset($_SESSION['id'])){
$sqllistas = isset($idmodulo) ? 'SELECT * FROM listas WHERE id_modulo = ? AND id_usuario = ? ORDER BY id ASC ' : "SELECT * from listas WHERE id_usuario = ? ORDER BY id ASC ";
}else{
    $sqllistas = isset($idmodulo) ? 'SELECT * FROM listas WHERE id_modulo = ? ORDER BY id ASC ' : "SELECT * from listas ORDER BY id ASC ";

}
$sentencialistas = $mbd->prepare($sqllistas);
if (isset($_SESSION['id'])){

    if(isset($idmodulo)){
        $sentencialistas->bindParam(1, $idmodulo);
        $sentencialistas->bindParam(2, $idglobal);
    }else{
        $sentencialistas->bindParam(1, $idglobal);

    }
}else{
    if(isset($idmodulo)){
        $sentencialistas->bindParam(1, $idmodulo);

    }
}
$sentencialistas->execute();
$filas2 = $sentencialistas->rowCount();
if(isset($idmodulo)){
    $datos = $sentencialistas->fetchAll();
}
?>



