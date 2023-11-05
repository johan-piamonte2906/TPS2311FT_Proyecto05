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

$sql = "SELECT id, nombres, descrip, precio, descuento, stock, id_categoria FROM products WHERE activo = 1";
$resultado = $con->query($sql);
$productos = $resultado->fetchAll(PDO::FETCH_ASSOC);

?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4 pb-3">Productos</h1>
        <center>
            <a href="nuevo.php" class="btn btn-primary pt-2">Nuevo Producto</a>
        </center>
        <hr class="mb-5">
        <div class="table-responsive">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>                        
                        <th scope="col">Nombre</th>                        
                        <th scope="col">precio</th>
                        <th scope="col">Stock</th>                        
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($productos as $producto) {?>
                        <tr>
                            <td>
                                <?php echo $producto['nombres']; ?>
                            </td>
                            <td>
                                <?php echo $producto['precio']; ?>
                            </td>
                            <td>
                                <?php echo $producto['stock']; ?>
                            </td>
                            <td>
                                <a href="edita.php?id=<?php echo $producto['id'] ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>        
                            </td>
                            <td>
                              <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalEliminar" data-bs-id="<?php echo $producto['id']; ?>">
                                <i class="bi bi-trash"></i>
                              </button>                                
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        
    </div>
</main>

<div class="modal fade" id="modalEliminar" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Confirmar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Deseas Eliminar el producto?
            </div>
            <div class="modal-footer">
                <form action="elimina.php" method="post">
                    <input type="hidden" name="id">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="../js/modal.js"></script>

<?php include '../footer.php'; ?>