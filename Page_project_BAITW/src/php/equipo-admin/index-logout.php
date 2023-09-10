<?php

require '../Conexiones/config.php';

session_destroy();

header("Location: ../../../index.php");