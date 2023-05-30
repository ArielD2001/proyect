<?php

$sqllistas = "SELECT * from listas WHERE id_modulo = ?  ORDER BY id DESC ";
$sentencialistas = $mbd->prepare($sqllistas);
$sentencialistas->bindParam(1, $idmodulo);
$sentencialistas->execute();
$filas2 = $sentencialistas->rowCount();
$listas = $sentencialistas->fetchAll();


?>