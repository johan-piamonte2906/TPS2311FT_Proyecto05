<?php
require '../config/database.php';
require '../config/config.php';
require '../header.php';
require '../clases/index-cifrado.php';

$db = new Database();
$con = $db->conectar();

$smtp = $_POST['smtp'];
$puerto = $_POST['puerto'];
$email = $_POST['email'];
$password = cifrar($_POST['password']);

$sql = $con->prepare("UPDATE configuracion SET valor= ? WHERE nombre = ?");
$sql->execute([$smtp,'correo_smtp']);
$sql->execute([$puerto,'correo_puerto']);
$sql->execute([$email,'correo_email']);
$sql->execute([$password,'correo_password']);

?>
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4"> Configuracion Actualizada</h2>
        <div class="alert alert-success d-sm" role="alert">
            Cambios Guardados Exitosamente
        </div>
        <a href="index.php" class="btn btn-secondary">Regresar</a>
    </div>
</main>

<?php include'../footer.php'; ?>