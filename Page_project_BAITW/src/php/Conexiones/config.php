<?php

$path = dirname(__FILE__);

require_once $path . '/database.php';
require_once $path . '/../../../centro-Admin/src/clases/index-cifrado.php' ;

$db = new Database();
$con = $db->conectar();

$sql = "SELECT nombre, valor FROM configuracion";
$result = $con->query($sql);
$datos = $result->fetchAll(PDO::FETCH_ASSOC);

$config = [];

foreach ($datos as $dato) {
    $config[$dato['nombre']] = $dato['valor'];
}


define("SITE_URL", "http://localhost/TPS2311FT_Proyecto05/Page_project_BAITW/src/php/equipo-admin");
define("CLIENT_ID", "AR5Eg-wA-i9iTLxYVYS7M9LGrO1vVKsC7VjgvqKDFpJS1QtFz_34aJvfILL5oG-sDR0yd4ZfwPxNn6wb");
define("TOKEN_MP", "TEST-6509425968746122-060820-746f077cd7683e634b2c407faa478c1e-529804460");
define("CURRENCY", "CO");
define("KEY_TOKEN", "JoHaN-2022*");
define("MONEDA", "$");

// correo

// define("MAIL_HOST","smtp.gmail.com");
// define("MAIL_USER","projectbaitw.05@gmail.com");
// define("MAIL_PASS","cmxfazhcagklruxl");
// define("MAIL_PORT","465");

define("MAIL_HOST", $config['correo_smtp'] );
define("MAIL_USER", $config['correo_email'] );
define("MAIL_PASS", descifrar($config['correo_password']) );
define("MAIL_PORT", $config['correo_puerto'] );



session_start();

$num_cart = 0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
}

?>