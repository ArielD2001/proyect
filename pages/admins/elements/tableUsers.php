<?php
    include('./databases/connectToBD.php');
    $consulta = 'SELECT * FROM usuarios  WHERE rol = ?';
    $sentencia = $mbd->prepare($consulta);
    $sentencia->bindParam(1, $rol);
    $sentencia->execute();
    $filas = $sentencia->rowCount();
    $usuarios = $sentencia->fetchAll();
    ?>


<table class="table table-striped " id="<?php echo $tabla ?>">
    <thead class="bg-dark text-white ">
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <!-- <th>Contraseña</th> -->
            <th class="text-center">No. identificacion </th>
            <th class="text-center">Listas</th>
            <th class="text-center">Activo</th>
            <th class="text-center">opciones</th>
        </tr>
    </thead>
    <tbody>
        <?Php 
                    foreach($usuarios as $usuario){
                    ?>
        <tr class="p-0">
            <td  class="fw-bold text-info"><?php echo ucwords($usuario['nombre']).' '.ucwords($usuario['apellido']) ?></td>
            <td ><?php echo $usuario['correo'] ?></td>
            <!-- <td ><input type="password" readonly class="border-0 bg-transparent" value="<?php echo $usuario['clave'] ?>"></td> -->
            <td  class="text-center"><?php echo $usuario['documento'] ?></td>
            <td  class="text-center"><?php 
                $consultal = 'SELECT * FROM listas  WHERE id_usuario = ?';
                $sentencial = $mbd->prepare($consultal);
                $sentencial->bindParam(1, $usuario['id']);
                $sentencial->execute();
                $filas = $sentencial->rowCount();

                echo $filas
            ?></td>
            <td >
                <div class="form-check form-switch  m-0 d-flex justify-content-center">
                    <input class="form-check-input m-0 bg-ligth" type="checkbox" data-id="<?php echo $usuario['id'] ?>" role="switch" id="flexSwitchCheckDefault"
                        <?php echo ($usuario['estado'] == 'activo' ? 'checked' : '') ?> <?php echo ($usuario['id'] == $_SESSION['admin'] && $usuario['rol'] == 'ADMIN' ? 'disabled' : '') ?> >
                </div>
            </td>
            <td  class="text-center">
            <?php echo ($usuario['id'] == $_SESSION['admin'] && $usuario['rol'] == 'ADMIN' ? '' : '  <button  id="button-delete-user" class="text-danger p-0 m-0 h4 border-0 bg-transparent "><i class="mdi mdi-delete"></i></button>') ?>
          
            </td>
        </tr>
        <?php 
                    }
                    ?>
    </tbody>
</table>