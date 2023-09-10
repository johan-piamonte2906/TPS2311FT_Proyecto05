<?php

require '../Conexiones/config.php';
require '../Conexiones/database.php';
$db = new Database();
$con = $db->conectar();

$json = file_get_contents('php://input');
$datos = json_decode($json, true);

// echo '<pre>';
// print_r($datos);
// echo '</pre>';

if(is_array($datos)){
    $id_client = $_SESSION['user_cliente'];
    $sql = $con->Prepare("SELECT email FROM clientes WHERE id=? AND estatus=1");
    $sql->execute([$id_client]);
    $row_cliente = $sql->fetch(PDO::FETCH_ASSOC);
    $id_transaccion = $datos['detalles']['id'];
    $total = $datos['detalles']['purchase_units'][0]['amount']['value'];
    $status = $datos['detalles']['status'];
    $fecha = $datos['detalles']['update_time'];
    $fecha_new = date('Y-m-d H:i:s', strtotime($fecha));
    // $email = $datos['detalles']['payer']['email_address'];
    $email = $row_cliente['email'];
    // $id_client = $datos['detalles']['payer']['payer_id'];

    $sql = $con-> prepare("INSERT INTO compra (id_transaccion, fecha, status, email, id_cliente, Total) VALUES (?,?,?,?,?,?)");
    $sql->execute([$id_transaccion, $fecha_new, $status, $email, $id_client, $total]);
    $id = $con->lastInsertId();

    if($id > 0){
        $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;
        if($productos != null){
            foreach($productos as $clave => $cantidad){
              $sql = $con->Prepare("SELECT id, nombres, precio, descuento FROM products WHERE id=? AND activo=1");
              $sql->execute([$clave]);
              $row_prod = $sql->fetch(PDO::FETCH_ASSOC);
              
              $precio = $row_prod['precio'];
              $descuento = $row_prod['descuento'];
              $precio_desc = $precio - (($precio * $descuento) / 100);

              $sql_insert = $con->prepare("INSERT INTO detalle_compra (id_compra, id_productos, nombre, precio, cantidad) VALUE (?,?,?,?,?)");
              $sql_insert->execute([$id, $clave, $row_prod['nombres'], $precio_desc, $cantidad]);
            }
            require '../equipo-admin/index-Mailer.php';

            $asunto = "Detalles de su Compra";
            $cuerpo = '<h3>Gracias Por Tu Compra</h3>';
            $cuerpo .= '<p>El ID De Su Compra Es <b>'. $id_transaccion . '</b></p>' ;

            $mailer = new Mailer();
            $mailer->enviarEmail($email, $asunto, $cuerpo);
        }
        unset($_SESSION['carrito']);
    }
}