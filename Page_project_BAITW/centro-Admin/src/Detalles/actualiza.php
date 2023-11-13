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
$total = $_POST['total'];

$sql = "UPDATE compra SET total=? WHERE id = ? ";
$stm = $con->prepare($sql);
$stm->execute([$total, $id]);
    

Header('Location: index.php');
?>