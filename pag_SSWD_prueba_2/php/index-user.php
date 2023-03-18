<?php

    session_start();

    if(isset($_SESSION['usuario'])){
        header("location: ../index.php");
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
    <link rel="stylesheet" href="../styles/mains.css">
    <link rel="stylesheet" href="../styles/estilos-login-register.css">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="../img/Favicon1.png" type="image/x-icon">
    <!-- Oswald -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400&display=swap" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <nav class="nav-main">
            <img src="../img/logo 4.jpg" alt="logo SSWD" class="nav-brand">
            <ul>
                <li>
                    <a href="../index.html">Inicio</a>
                </li>
                <li>
                    <a href="../html/index-M-V.html">Misión y Vición</a>
                </li>
                <li>
                    <a href="../html/index-Informacion.html">Informacion</a>
                </li>
            </ul>
            <ul class="nav-menu-right">
                <li>
                    <a href="../php/index-user.php"><i class="fas fa-user"></i></a>
                </li>
            </ul>
        </nav>
    </div>
    <hr>

    <main>

        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Regístrarse</button>
                </div>
            </div>
            <!--Formulario de Login y registro-->
            <div class="contenedor__login-register">
                <!--Login-->
                <form action="login_usuario_be.php" method="POST" class="formulario__login" required>
                    <h2>Iniciar Sesión</h2>
                    <input type="text" placeholder="Correo Electronico" name="correo" required>
                    <input type="password" placeholder="Contraseña" name="contrasena" required>
                    <button>Entrar</button>
                </form>
                <!--Register-->
                <form action="registro_usuario_be.php" method="POST" class="formulario__register" required>
                    <h2>Regístrarse</h2>
                    <input type="text" placeholder="Nombre completo" name="nombre_completo" required>
                    <input type="text" placeholder="Correo Electronico" name="correo" required>
                    <input type="text" placeholder="Usuario" name="usuario" required>
                    <input type="password" placeholder="Contraseña" name="contrasena" required>

                    <button>Regístrarse</button>
                </form>
            </div>
        </div>

    </main>

    <script src="../js/funtions.js"></script>

</body>
</html>



