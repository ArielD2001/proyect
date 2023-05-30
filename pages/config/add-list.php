<?php


require_once('../databases/connectToBD.php');
require_once('../../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;





// Se verifica que existan el archivo adjunto
if (isset($_FILES['adjunto'])) {

    //Se toman los valores del archivo adjunto
    $adjuntoName =   $_FILES['adjunto']['name'];
    $tipo = pathinfo($adjuntoName, PATHINFO_EXTENSION);
    $tmp =   $_FILES['adjunto']['tmp_name'];
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($tmp);
    $lista = $spreadsheet->getActiveSheet()->toArray();



    //Se le asigna una variable a los datos enviados por metodo POST
    parse_str($_POST["data"], $data);

    if(isset($data['profesor-list'])){
        //Se validan que los campos NO esten vacios
    if (strlen($data['profesor-list']) == 0 || strlen($data['nombre-list']) == 0  || strlen($data['semestre']) == 0 || strlen($data['periodo']) == 0 || strlen($data['modulo-list']) == 0) {


        //mensaje de error
        echo 'campos vacios';
    } else {

        //Se valida el tipo de fichero que se va a enviar 
        if ($tipo == 'xls' || $tipo == 'xlsx') {

            //Al ser un fichero valido se toman las variables enviadas
            $profesor = $data['profesor-list'];
            $nombre = $data['nombre-list'];
            $modulo = $data['modulo-list'];
            $semestre = $data['semestre'];
            $semestre = $data['periodo'];
            $fecha = date('d/m/y');

            //Se verifica que la lista a insertar ya no este registrada
            $consulta = "SELECT * from listas WHERE nombre = ?  AND semestre = ?  AND id_modulo = ? AND periodo = ? AND id_usuario = ?" ;
            $sentencia = $mbd->prepare($consulta);
            $sentencia->bindParam(1, $nombre);
            $sentencia->bindParam(2, $semestre);
            $sentencia->bindParam(3, $modulo);
            $sentencia->bindParam(4, $periodo);
            $sentencia->bindParam(5, $profesor);
            $sentencia->execute();
            $fila = $sentencia->rowCount();

            //Se valida
            if ($fila < 1) {

                //Al validar que la lista no se encuentra registrada se registra
                $consultainsert = "INSERT INTO listas(id_modulo, nombre, semestre, fecha, id_usuario, id_periodo) VALUES(?,?,?,?,?,?)";
                $sentenciainsert = $mbd->prepare($consultainsert);
                $sentenciainsert->execute(array($modulo, $nombre, $semestre, $fecha, $profesor, $periodo));
                $filas = $sentenciainsert->rowCount();

                //Se verifica que la fila se inserto
                if ($filas > 0) {


                    // Se toma el id de la lista insertada
                    $idlist = $mbd->lastInsertId();

                
                    $indice = 0;

                    //Se recorre el documento excel y sus casillas
                    foreach ($lista as $item) {

                        //se indica que la insercion no empiece por la fila 0 osea la cabecera
                        if ($indice > 0) {

                            // se toman los valores de las celdas
                            $nombre_estudiante = $item[0];
                            $documento = $item[1];


                            //se realiza la consulta
                            $consulta_estudiante = 'INSERT INTO estudiantes(nombre, documento, id_lista, fecha) VALUES(?,?,?,?)';
                            $sentencia_estudiante = $mbd->prepare($consulta_estudiante);
                            $sentencia_estudiante->bindParam(1, $nombre_estudiante);
                            $sentencia_estudiante->bindParam(2, $documento);
                            $sentencia_estudiante->bindParam(3, $idlist);
                            $sentencia_estudiante->bindParam(4, $fecha);
                            $sentencia_estudiante->execute();
                        } else {

                            //Se le suma 1 al indice para que entre en la primera condicional
                            $indice = 1;
                        }
                    }
                    echo 'ok';
                } else {
                    //Mensaje de error
                    echo 'error - consulta';
                }
            } else {

                // Mensaje de error
                echo 'error - existente';
            }
        } else {

            //Mensaje de error
            echo 'error - tipo';
        }
    }
    }else{


        //Se validan que los campos NO esten vacios
    if (strlen($data['nombre-list']) == 0  || strlen($data['semestre']) == 0 || strlen($data['periodo']) == 0 || strlen($data['modulo-list']) == 0) {


        //mensaje de error
        echo 'campos vacios';
    } else {

        //Se valida el tipo de fichero que se va a enviar 
        if ($tipo == 'xls' || $tipo == 'xlsx') {

            //Al ser un fichero valido se toman las variables enviadas
            $nombre = $data['nombre-list'];
            $modulo = $data['modulo-list'];
            $semestre = $data['semestre'];
            $semestre = $data['periodo'];
            $idglobal = $data['idglobal'];
            $fecha = date('d/m/y');

            //Se verifica que la lista a insertar ya no este registrada
            $consulta = "SELECT * from listas WHERE nombre = ?  AND semestre = ?  AND id_modulo = ? AND periodo = ? AND id_usuario = ?" ;
            $sentencia = $mbd->prepare($consulta);
            $sentencia->bindParam(1, $nombre);
            $sentencia->bindParam(2, $semestre);
            $sentencia->bindParam(3, $modulo);
            $sentencia->bindParam(4, $periodo);
            $sentencia->bindParam(5, $idglobal);
            $sentencia->execute();
            $fila = $sentencia->rowCount();

            //Se valida
            if ($fila < 1) {

                //Al validar que la lista no se encuentra registrada se registra
                $consultainsert = "INSERT INTO listas(id_modulo, nombre, semestre, fecha, id_usuario, id_periodo) VALUES(?,?,?,?,?,?)";
                $sentenciainsert = $mbd->prepare($consultainsert);
                $sentenciainsert->execute(array($modulo, $nombre, $semestre, $fecha, $idglobal, $periodo));
                $filas = $sentenciainsert->rowCount();

                //Se verifica que la fila se inserto
                if ($filas > 0) {


                    // Se toma el id de la lista insertada
                    $idlist = $mbd->lastInsertId();

                
                    $indice = 0;

                    //Se recorre el documento excel y sus casillas
                    foreach ($lista as $item) {

                        //se indica que la insercion no empiece por la fila 0 osea la cabecera
                        if ($indice > 0) {

                            // se toman los valores de las celdas
                            $nombre_estudiante = $item[0];
                            $documento = $item[1];


                            //se realiza la consulta
                            $consulta_estudiante = 'INSERT INTO estudiantes(nombre, documento, id_lista, fecha) VALUES(?,?,?,?)';
                            $sentencia_estudiante = $mbd->prepare($consulta_estudiante);
                            $sentencia_estudiante->bindParam(1, $nombre_estudiante);
                            $sentencia_estudiante->bindParam(2, $documento);
                            $sentencia_estudiante->bindParam(3, $idlist);
                            $sentencia_estudiante->bindParam(4, $fecha);
                            $sentencia_estudiante->execute();
                        } else {

                            //Se le suma 1 al indice para que entre en la primera condicional
                            $indice = 1;
                        }
                    }
                    echo 'ok';
                } else {
                    //Mensaje de error
                    echo 'error - consulta';
                }
            } else {

                // Mensaje de error
                echo 'error - existente';
            }
        } else {

            //Mensaje de error
            echo 'error - tipo';
        }
    }
    }
    
} else {
    //Mensaje de error
    echo 'campos vacios';
}
