<?php

require_once '../Conexiones/config.php';
require_once '../equipo-admin/index_funciones.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($id == '' || $token == '') {
    header("Location: ../inicio-sesion/index-login.php");
    exit;
}
header("Location: ../inicio-sesion/index-login.php");

$db = new Database();
$con = $db->conectar();

echo validaToken($id, $token, $con);

?>