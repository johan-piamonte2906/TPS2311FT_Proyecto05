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

$sql = "SELECT id, id_transaccion, fecha, status, email, total FROM compra";
$resultado = $con->query($sql);
$detalles = $resultado->fetchAll(PDO::FETCH_ASSOC);


?>

<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4 pb-3">Detalles Compras Ususarios</h2>
        <div class="table-resposive">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>id transaccion</th>
                        <th>Correo Electronico</th>
                        <th>fecha</th>
                        <th>Estado compra</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($detalles as $detalle) {?>
                        <tr>
                            <td><?php echo $detalle['id']; ?></td>                                
                            <td><?php echo $detalle['id_transaccion']; ?></td>                                
                            <td><?php echo $detalle['email']; ?></td>                                
                            <td><?php echo $detalle['fecha']; ?></td>                                
                            <td><?php echo $detalle['status']; ?></td>                                
                            <td><?php echo number_format($detalle['total'],3, '.', ','); ?></td>
                            <td>
                                <a href="edita.php?id=<?php echo $detalle['id'] ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>

            </table>
        </div>
    </div>
</main>


<?php include '../footer.php'; ?>