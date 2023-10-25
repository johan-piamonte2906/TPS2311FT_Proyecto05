<?php

require_once '../config/database.php';
require_once '../config/config.php';

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

$id = $_POST['id'];
$nombre = $_POST['nombres'];
$descrip = $_POST['descrip'];
$precio = $_POST['precio'];
$descuento = $_POST['descuento'];
$activo = $_POST['activo'];

$sql = $con->prepare("UPDATE products SET nombres = ?, descrip = ?, precio = ?, descuento = ?, activo = ? WHERE id = ?");
$sql->execute([$nombre, $descrip, $precio, $descuento, $activo, $id]);

Header('Location: index.php');
?>