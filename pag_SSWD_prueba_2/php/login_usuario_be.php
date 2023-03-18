<?php 

    session_start();

    include '../php/conexion_be.php';

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' 
    and contrasena='$contrasena'");

    if (mysqli_num_rows($validar_login) > 0){
        $_SESSION['usuario'] = $correo;
        header("location:index-welcome.php");
        exit;
    }else{
        echo'
            <script>
                alert("usuario no existe");
                window.location = "../php/index-user.php";
            </script>    
        ';
        exit;
    }

?>