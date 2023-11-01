<?php

require '../Conexiones/config.php';

    if(isset($_POST['action'])){
        
        $action = $_POST['action'];
        $id = isset($_POST['id']) ? $_POST['id'] : 0 ;

        if($action == 'agregar'){
            $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0 ;
            $respuesta = agregar($id, $cantidad);
    
            if($respuesta > 0){
                $datos['ok'] = true;
            }else{
                $datos['ok'] = false;
            }
            
            $datos['sub'] = MONEDA . number_format($respuesta, 3, '.', ','); 
            
        }else if($action == 'eliminar'){
            $datos['ok'] = eliminar($id);
        } else{
            $datos['ok'] = false;
        }
    }else{
        $datos['ok'] = false;
    }

echo json_encode($datos);

function agregar($id, $cantidad){

    $res = 0;
    if($id > 0 && $cantidad > 0 && is_numeric(($cantidad))){
        if(isset($_SESSION['carrito']['productos'][$id])){
            $_SESSION['carrito']['productos'][$id] = $cantidad;

            $db = new Database();
            $con = $db->conectar();
            $sql = $con->Prepare("SELECT precio, descuento FROM products WHERE id=? AND activo=1");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $precio = $row['precio'];
            $descuento = $row['descuento'];
            $precio_desc = $precio - (($precio * $descuento) / 100);
            $res = $cantidad * $precio_desc;

            return $res;
        }
    }else{
        return $res;
    }
}

function eliminar($id){
    if($id > null){
        if(isset($_SESSION['carrito']['productos'][$id])){
            unset($_SESSION['carrito']['productos'][$id]);
            return true;
        }else{
            return false;
        }
    }
}