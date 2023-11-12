<?php

require './src/config/config.php';
require './src/config/database.php';
require './src/clases/Admin-funciones.php';

$db = new Database();
$con = $db->conectar();

/*
$password = password_hash('JohanpiamonteAdmin', PASSWORD_DEFAULT); == Usuario Johan
$password = password_hash('AlvarezricoAdmin', PASSWORD_DEFAULT); == Usuario Karen
$sql = "INSERT INTO admin (usuario, password, nombre, email, activo, fecha_alta) VALUES ('Johanpiamonte','$password','Administrador','projectbaitw.05@gmail.com','1',NOW())";
$sql = "INSERT INTO admin (usuario, password, nombre, email, activo, fecha_alta) VALUES ('KarenSofia','$password','Administrador','projectbaitw.05@gmail.com','1',NOW())";
$con->query($sql);
*/
$errors = [];

if(!empty($_POST)){
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);

    if(esNulo([$usuario, $password])){
        $errors[] = "Debe llenar todos los campos";
    }

    if(count($errors) == 0){
        $errors[] = login($usuario, $password, $con);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B A I A T W | Administracion inicio sesion</title>
    <!-- Estilos -->
    <link rel="stylesheet" href="./src/css/style-inicio.css">
    <!-- Fav-Icon -->
    <link rel="shortcut icon" href="./src/img/favicon-bicycle.png" type="image/x-icon">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- javascript -->
    <script src="./src/js/loader.js"></script>
</head>
<body id="body" class="d-xxs">
    <!-- loader -->
    <div class="lds-ring loader" id="loader">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  <!-- /loader -->
  <!-- cont pag -->
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="box">
                    <span class="borderline"></span>
                    <form action="index.php" method="POST" autocomplete="off">
                        <h2>Inicia Sesion</h2>
                        <div class="inputbox d-xs">
                            <input type="text" name="usuario" id="usuario" requireda>
                            <span>Username</span>
                            <i></i>
                        </div>
                        <div class="inputbox d-xs">
                            <input type="password" name="password" id="password" requireda>
                            <span>Contraseña</span>
                            <i></i>
                        </div>
                        <div class="links">
                            <a href="#">¿Olvidaste tu contraseña?</a>
                        </div>
                        <button type="submit" value="Ingresar">Ingresar</button>
                    </form>
                </div>
            </div>
            <div class="col-6">
                <?php mostrarMensaje($errors); ?>
            </div>
        </div>
    </div>
  <!-- /cont pag -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>