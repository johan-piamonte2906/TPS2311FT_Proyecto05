<?php

require_once '../config/database.php';
require_once '../config/config.php';
require_once '../header.php';

if(!isset($_SESSION['user_type'])){
    header('Location: ../../index.php');
    exit;
}

if($_SESSION['user_type'] != 'admin'){
    header('Location: ../../../index.php');
    exit;
}

$db = new Database();
$con = $db->conectar();

$sql = "SELECT id, nombres, apellidos, email, telefono, identificacion, fecha_alta FROM clientes WHERE estatus = 1";
$resultado = $con->query($sql);
$usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);

?>

<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4 pb-3">Usuarios Registrados</h2>
        <div class="table-resposive">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Telefono</th>
                        <th>Correo Electronico</th>
                        <th>Cedula Ciudadania</th>
                        <th>Fecha Creacion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($usuarios as $usuario) {?>
                        <tr>
                            <td><?php echo $usuario['id']; ?></td>
                            <td><?php echo $usuario['nombres']; ?></td>
                            <td><?php echo $usuario['apellidos']; ?></td>
                            <td><?php echo $usuario['telefono']; ?></td>
                            <td><?php echo $usuario['email']; ?></td>
                            <td><?php echo $usuario['identificacion']; ?></td>
                            <td><?php echo $usuario['fecha_alta']; ?></td>
                            
                        </tr>
                    <?php }?>
                </tbody>

            </table>
        </div>
    </div>
</main>


<?php include '../footer.php'; ?>