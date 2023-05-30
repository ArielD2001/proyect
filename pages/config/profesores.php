<?php
$rol = 'PROFESOR';
$estado = 'activo';
$consultapr = 'SELECT * FROM usuarios WHERE rol = ? AND estado = ?';
$sentenciapr = $mbd->prepare($consultapr);
$sentenciapr->bindParam(1, $rol);
$sentenciapr->bindParam(2, $estado);
$sentenciapr->execute();
$profesores = $sentenciapr->fetchAll();
?>