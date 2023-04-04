<?php

define("CLIENT_ID", "AewO6IkM1TGOn9R02-uj5YI1eGsp0DitGhO9ASNpop7_7Aw_lr4G13VwFg4SEoGFZKOLy-7ZINS2RQhn");
define("CURRENCY", "COP");
define("KEY_TOKEN", "JoHaN-2022*");
define("MONEDA", "$");

session_start();

$num_cart = 0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
}

?>