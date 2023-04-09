<?php

define("CLIENT_ID", "AR5Eg-wA-i9iTLxYVYS7M9LGrO1vVKsC7VjgvqKDFpJS1QtFz_34aJvfILL5oG-sDR0yd4ZfwPxNn6wb");
define("CURRENCY", "COP");
define("KEY_TOKEN", "JoHaN-2022*");
define("MONEDA", "$");

session_start();

$num_cart = 0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
}

?>