<?php

require_once '../Conexiones/config.php';
require_once '../equipo-admin/index_funciones.php';

  $user_id = $_GET['id'] ?? $_POST['user_id'] ?? '';
  $token = $_GET['token'] ?? $_POST['token'] ?? '';
  if($user_id == '' || $token == ''){
    header("Location: ../../../index.php");
    exit;;
  }

  $db = new Database();
  $con = $db->conectar();

  $errors=[];

  if (!verificaTokenRequest($user_id, $token, $con)) {
    echo "No se Pudo Verificar la Informacion";
    header("Location: ../inicio-sesion/index-login.php");
    exit;
  }

  if(!empty($_POST)){

    $password = trim($_POST['password']);
    $repassword = trim($_POST['repassword']);

    if(esNulo([$user_id, $token,$password, $repassword])){
        $errors[] = "Debe llenar todos los campos!";
    }

    if(!validaPassword($password, $repassword)){
        $errors[] = "Las contraseñas no coinciden";
    }

    if(count($errors) == 0){
        $pass_hash = password_hash($password, PASSWORD_DEFAULT);
        if(actualizaPassword($user_id, $pass_hash, $con)){
            echo '<script>alert("Cambio de Contraseña Exitoso"); location = "../inicio-sesion/index-login.php";</script>';
            exit;
        }else{
            $errors[] = 'Error Al actualizar La Contraseña, Intentalo Nuevamente';
        }
    }

  }

?>

<!DOCTYPE html>
<html lang="en-es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B A I A T W  | Recupera Contraseña </title>
    <!--  Styles  -->
    <link rel="stylesheet" href="../../css/style_index.css">
    <link rel="stylesheet" href="../../css/style-login.css">
    <link rel="stylesheet" href="../../css/style-preloader.css">
    <!--  Bootstrap 5  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--  Icons Bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!--  Fav-icon  -->
    <link rel="shortcut icon" href="../../img/fav-icons/favicon-bicycle.png" type="image/m-icon">
    <!-- FONT AWEASOME -->
	  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

  <!-- loader -->
    <div class="lds-ring loader" id="loader">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  <!-- /loader -->

  <!--  Nav  -->
    <nav class="navbar navbar-expand-md fondo-all sticky-top" id="backgronud-all">
      <div class="container-fluid">
        <a class="navbar-brand text-dark">
          <i class="bi bi-bicycle "class="d-inline-block align-text-top"></i>
          <span>B A I A T W</span>
        </a>
      </div>
    </nav>
  <!-- /Nav -->

  <!--  Cont page  -->
    <main class="form-login m-auto pt-5">
        <h3 class="pt-5 pb-5 text-center">Restablecer Contraseña</h3>

        <?php mostrarMensaje($errors); ?>

        <form action="index_reset-password.php" method="post" class="row g-3" autocomplete="off">
            <input type="hidden" name="user_id" id="user_id" value="<?= $user_id ?>"/>
            <input type="hidden" name="token" id="token" value="<?= $token ?>"/>
            
            <div class="form-floating mb-2">
            <input class="form-control" type="password" name="password" id="password" placeholder="Nueva Contraseña" require>
            <label for="password">Nueva Contraseña</label>
            </div>
            
            <div class="form-floating">
            <input class="form-control" type="password" name="repassword" id="repassword" placeholder="Confirma Contraseña" require>
            <label for="password">Confirmar Contraseña</label>
            </div>
            
            <div class="d-grid gap-3 col-12 pt-4">
            <button type="submit" class="btn btn-primary" >Continuar</button>
            </div>
        </form>
    </main>
  <!-- /Cont page -->


  <!-- javascript -->
    <script src="../../js/app-loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>