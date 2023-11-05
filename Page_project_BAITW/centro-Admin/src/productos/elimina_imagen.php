<?php

require_once '../config/config.php';

if(!isset($_SESSION['user_type'])){
    header('Location: ../../index.php');
    exit;
}

if($_SESSION['user_type'] != 'admin'){
    header('Location: ../../../index.php');
    exit;
}

$urlImagen = $_POST['urlImagen'] ?? '';

if($urlImagen !== '' && file_exists($urlImagen)){
    unlink($urlImagen);
}