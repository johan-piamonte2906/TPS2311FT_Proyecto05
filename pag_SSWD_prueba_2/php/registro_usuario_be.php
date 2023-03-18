<?php

    include '../php/conexion_be.php';

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];


    $query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena)
              VALUES('$nombre_completo','$correo','$usuario','$contrasena')";

//Para que no se repita en base de datos
//Vereficar correo  
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo'
            <script>
                alert("El correo que intentas ingresar ya se encuentra en registrado, Intenta de Nuevo");
                window.location = "index-user.php";
            </script>    
        ';
        exit();
    }
//Vereficar usuario  
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario'");

    if(mysqli_num_rows($verificar_usuario) > 0){
        echo'
            <script>
                alert("El usuario que intentas ingresar ya se encuentra en registrado, Intenta de Nuevo");
                window.location = "index-user.php";
            </script>    
        ';
    exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo'

            <script>
                alert("Usuario registrado correctamente");
                window.location = "index-user.php";
            </script>

        ';
    }else{
        echo'

        <script>
            alert("Intentalo de Nuevo");
            window.location = "index-user.php";
        </script>

    ';
    }

                                   

?>