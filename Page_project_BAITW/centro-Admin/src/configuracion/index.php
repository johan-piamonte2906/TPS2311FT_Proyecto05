<?php

require_once '../config/database.php';
require_once '../config/config.php';
require_once '../header.php';
require_once '../clases/index-cifrado.php';

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

$sql = "SELECT nombre, valor FROM configuracion";
$result = $con->query($sql);
$datos = $result->fetchAll(PDO::FETCH_ASSOC);

$config = [];

foreach ($datos as $dato) {
    $config[$dato['nombre']] = $dato['valor'];
}

?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Configuracion</h1>
        <form action="guarda.php" method="post">
            <div class="row">
                <div class="col-6">
                    <label for="smtp">SMTP</label>
                    <input class="form-control" type="text" name="smtp" id="smtp" value="<?php echo $config['correo_smtp']; ?>">
                </div>
                <div class="col-6">
                    <label for="puerto">Puerto</label>
                    <input class="form-control" type="text" name="puerto" id="puerto" value="<?php echo $config['correo_puerto']; ?>">
                </div>
                <div class="col-6">
                    <label for="email">Correo electrónico</label>
                    <input class="form-control" type="text" name="email" id="email" value="<?php echo $config['correo_email']; ?>">
                </div>
                <div class="col-6">
                    <label for="password">Contraseña</label>
                    <input class="form-control" type="password" name="password" id="password" value="<?php echo $config['correo_password']; ?>">
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

<?php include '../footer.php'; ?>