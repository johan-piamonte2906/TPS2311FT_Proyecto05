<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        echo'
            <script>
                alert("Por favor inicia sesión");
                window.location = "../php/index-user.php";
            </script>        
        ';
        session_destroy();
        die(); 
    }
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strategy and skill in web design</title>
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="../styles/mains.css ">
    <link rel="stylesheet" href="../styles/mains_users.css">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="../img/Favicon1.png" type="image/x-icon">
    <!-- Oswald -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400&display=swap" rel="stylesheet">
</head>
<body>
  <!-- Navegación -->  
    <div class="container">
        <nav class="nav-main">
            <img src="../img/logo 4.jpg" alt="logo SSWD" class="nav-brand">
            <ul>
                <li>
                    <a href="../php/index-welcome.php">Inicio</a>
                </li>
                <li>
                    <a href="../php/index-M-V.php">Misión y Vición</a>
                </li>
                <li>
                    <a href="../php/index-informacion.php">Informacion</a>
                </li>
            </ul>
            <ul class="nav-menu-right">
                <li>
                    <a href="../php/cerrar_sesion.php"><i class="fas fa-user-times"></i></a>
                </li>
            </ul>
        </nav>
    </div>
    <hr>
  <!-- contenido -->

  <div class="contenido__adentro">
    <div class="contenido__intermedio">
        <div class="contenido__perfil">
            <img src="../img/tarjeta_perfil_user.png" alt="Fondo-perfil">
            <h3>Nombres completos</h3>
            <h3>Correo</h3>
            <h3>Numero de celular</h3>
        </div>
        <center><div class="redes_sociales">
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <a href=""><i class="fa-brands fa-whatsapp"></i></a>
        </div></center>
    </div>
  </div>

  <div class="cont__mantenimiento">
    <h1>En mantenimiento</h1>
    <p>En estos momentos estamos en mantenimiento</p>
    <img src="../img/Mantenimiento.jpg" alt="">
  </div>
  
</body>
</html>