<?php
if(isset($_SESSION['id'])){
    $sqllistas = "SELECT * from listas WHERE id_modulo = ? AND id_usuario = ? ORDER BY id DESC ";
$sentencialistas = $mbd->prepare($sqllistas);
$sentencialistas->bindParam(1, $idmodulo);
$sentencialistas->bindParam(2, $idglobal);
$sentencialistas->execute();
$filas2 = $sentencialistas->rowCount();
$listas = $sentencialistas->fetchAll();
}else{
    $sqllistas = "SELECT * from listas WHERE id_modulo = ?  ORDER BY id DESC ";
$sentencialistas = $mbd->prepare($sqllistas);
$sentencialistas->bindParam(1, $idmodulo);
$sentencialistas->execute();
$filas2 = $sentencialistas->rowCount();
$listas = $sentencialistas->fetchAll();

}
?>