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

$id = $_GET['id'];

$sql = $con->prepare("SELECT id, id_transaccion, fecha, status, email, total  FROM compra WHERE id = ?");
$sql->execute([$id]);
$Usuario = $sql->fetch(PDO::FETCH_ASSOC);

?>


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-3">Modificar Total</h1>
        <hr>
        <form action="actualiza.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <input type="hidden" name="id" value="<?php echo $Usuario['id']; ?>">
            <div class="row">
                <div class="col mb-3">
                    <label for="total" class="form-label">Precio Producto</label>
                    <input class="form-control" type="text" name="total" id="total" value="<?php echo $Usuario['total']; ?>" required >
                </div>
            </div> 
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</main>



<?php include '../footer.php'; ?>