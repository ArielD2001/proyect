<?php
$consultap = 'SELECT * FROM periodos';
$sentenciap = $mbd->prepare($consultap);
$sentenciap->execute();
$periodos = $sentenciap->fetchAll();
?>