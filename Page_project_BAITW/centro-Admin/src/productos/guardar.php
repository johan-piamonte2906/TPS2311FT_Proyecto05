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

$nombre = $_POST['nombres'];
$descrip = $_POST['descrip'];
$precio = $_POST['precio'];
$descuento = $_POST['descuento'];
$stock = $_POST['stock'];
$categoria = $_POST['categoria'];

$sql = "INSERT INTO products (nombres, descrip, precio, descuento, stock, id_categoria, activo) VALUES (?, ?, ?, ?, ?, ?, 1) ";
$stm = $con->prepare($sql);
if($stm->execute([$nombre, $descrip, $precio, $descuento, $stock, $categoria])){
    $id = $con->lastInsertId();
    
    // subir img
    if($_FILES['imagen_principal']['error'] == UPLOAD_ERR_OK){
        $dir = '../../../src/img/productos/'. $id . '/';
        $permitidos = ['jpeg', 'jpg'];
        $arregloImagen = explode('.', $_FILES['imagen_principal']['name']);
        $extencion = strtolower(end($arregloImagen));
        if(in_array($extencion, $permitidos)){
            if(!file_exists($dir)){
                mkdir($dir, 0777, true);
            }
            $ruta_img = $dir . 'index.' . $extencion;
            if(move_uploaded_file($_FILES['imagen_principal']['tmp_name'], $ruta_img)){
                echo 'El archivo se cargo correctamente';
            }else{
                echo 'Error al cargar el archivo';
            }
        }else{
            echo "Archivo No permitido";
        }
    }else{
        echo 'No cargaste Ningun Archivo';
    }

    // Subir otras imgs
    if(isset($_FILES['imagenes_opcionales'])){
        $dir = '../../../src/img/productos/'. $id . '/';
        $permitidos = ['jpeg', 'jpg'];
        if(!file_exists($dir)){
            mkdir($dir, 0777, true);
        }
        $contador = 1;
        foreach($_FILES['imagenes_opcionales']['tmp_name'] as $key => $tmp_name){
            $filename = $_FILES['imagenes_opcionales']['name'][$key];
            $arregloImagen = explode('.', $filename);
            $extencion = strtolower(end($arregloImagen));
            if(in_array($extencion, $permitidos)){
                $ruta_img = $dir . $contador . '.' . $extencion;
                if(move_uploaded_file($tmp_name, $ruta_img)){
                    echo 'El archivo se cargo correctamente';
                    $contador++;
                }else{
                    echo 'Error al cargar el archivo';
                }
            }
        }
    }
}

Header('Location: index.php');
?>