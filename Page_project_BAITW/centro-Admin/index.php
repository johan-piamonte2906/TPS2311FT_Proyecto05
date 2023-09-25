<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B A I A T W | Administracion inicio sesion</title>
    <!-- Estilos -->
    <link rel="stylesheet" href="css/style-inicio.css">
    <!-- Fav-Icon -->
    <link rel="shortcut icon" href="./img/favicon-bicycle.png" type="image/x-icon">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body id="body" class="d-xxs">
    <div class="box">
        <span class="borderline"></span>
        <form action="index.php" method="POST" autocomplete="off">
            <h2>Inicia Sesion</h2>
            <div class="inputbox d-xs">
                <input type="text" name="username" required>
                <span>Username</span>
                <i></i>
            </div>
            <div class="inputbox d-xs">
                <input type="password" name="password" required>
                <span>Contraseña</span>
                <i></i>
            </div>
            <div class="links">
                <a href="#">¿Olvidaste tu contraseña?</a>
            </div>
            <input type="submit" value="Ingresar">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>