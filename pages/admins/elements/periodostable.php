<?php
     include('./databases/connectToBD.php');
     $consulta = 'SELECT * FROM periodos';
     $sentencia = $mbd->prepare($consulta);
     $sentencia->execute();
     $filas = $sentencia->rowCount();
     $periodos = $sentencia->fetchAll();

    
     ?>

    <ul>
        <?php 
        foreach($periodos as $periodo){
            ?>
                <li><a href="ADMIN.php?periodo=<?php echo base64_encode($periodo['id']) ?>"><?php echo $periodo['nombre'] ; ?></a></li>
            <?php
        }
        
        ?>
    </ul>

     
 
