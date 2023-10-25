<?php

require_once '../Conexiones/config.php';

unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
unset($_SESSION['user_cliente']);

header("Location: ../../../index.php");