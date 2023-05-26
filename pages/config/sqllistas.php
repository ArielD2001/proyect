<?php
if (isset($_SESSION['id'])){

    $sqllistas = "SELECT * from listas WHERE id_usuario = ? ORDER BY id ASC ";
$sentencialistas = $mbd->prepare($sqllistas);
$sentencialistas->bindParam(1, $idglobal);
$sentencialistas->execute();
$filas2 = $sentencialistas->rowCount();
}else{
$sqllistas = "SELECT * from listas ORDER BY id ASC ";
$sentencialistas = $mbd->prepare($sqllistas);
$sentencialistas->execute();
$filas2 = $sentencialistas->rowCount();
}
?>



