<?php
include_once('../databases/connectToBD.php');
require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

$archivo =  'datos.xlsx';
$doc = IOFactory::load($archivo);
$pestañas = $doc->getSheetCount();

// for( $i =0; $i<$pestañas; $i++){


$actual = $doc->getSheet(0);
$filasdoc = $actual->getHighestDataRow();
$letra = $actual->getHighestDataColumn();
$numeroletra = Coordinate::columnIndexFromString($letra);

for ($i = 1; $i <= $filasdoc; $i++) {
    for ($j = 1; $j <= $numeroletra; $j++) {
        $val = $actual->getCellByColumnAndRow($j, $i);
        echo $i. '  '. $val;
    }
    echo '<br>';
}


// if (strlen($_POST['nombre-list']) == 0  || strlen($_POST['semestre']) == 0) {
//     echo '<h5 class="text-danger">&#x2718; Por favor complete todos los campos</h5>';
// } else {

//     $_nombre = trim($_POST['nombre-list']);
//     $_semestre = trim($_POST['semestre']);
//     $_fecha = date('d/m/y');

//     $consulta = "SELECT * from listas WHERE nombre = ?  AND semestre = ?";
//     $sentencia = $mbd->prepare($consulta);
//     $sentencia->bindParam(1, $_nombre);
//     $sentencia->bindParam(2, $_semestre);
//     $sentencia->execute();
//     $fila = $sentencia->rowCount();

//     if ($fila < 1) {

//         $consultainsert = "INSERT INTO listas( nombre, semestre, fecha) VALUES(?,?,?)";
//         $sentenciainsert = $mbd->prepare($consultainsert);
//         $sentenciainsert->execute(array($_nombre, $_semestre, $_fecha));
//         $filas = $sentenciainsert->rowCount();
//         if ($filas > 0) {
//             $idlista = $mbd->lastInsertID();

           
//             // }

//         } else {
//             echo '<h5 class="text-danger mt-2">&#x2718; Erron en la consulta</h5>';
//         }
//     } else {
//         echo '<h5 class="text-danger mt-2">&#x2718; Ya esta lista existe</h5>';
//     }
// }
