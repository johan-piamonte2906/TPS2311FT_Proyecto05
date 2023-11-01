<?php

require_once '../Conexiones/config.php';
require_once 'index_funciones.php';

$datos = [];

$db = new Database();
$con = $db->conectar();

if(isset($_POST['action'])){
    $action = $_POST['action'];
    if ($action == 'existeUsuario') {
        $datos['ok'] = usuarioExiste($_POST['usuario'], $con);
    }elseif ($action = 'emailExiste') {
        $datos ['ok'] = emailExiste($_POST['email'], $con);
    }
}

echo json_encode($datos);