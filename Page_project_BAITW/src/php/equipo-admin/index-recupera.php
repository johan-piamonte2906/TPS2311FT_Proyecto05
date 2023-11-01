<?php

require_once '../Conexiones/config.php';
require_once '../equipo-admin/index_funciones.php';


  $db = new Database();
  $con = $db->conectar();

  $errors=[];

  if(!empty($_POST)){

    $email = trim($_POST['email']);

    if(esNulo([$email])){
        $errors[] = "Debe llenar todos los campos";
    }

    if(!esEmail($email)){
        $errors[] = "La direccion de correo no es valida";
    }

    if (count($errors) == 0){
      if(emailExiste($email, $con)){
        $sql = $con->prepare("SELECT usuarios.id, clientes.nombres FROM usuarios INNER JOIN clientes ON usuarios.id_cliente=clientes.id WHERE clientes.email LIKE ? LIMIT 1");
        $sql->execute([$email]);
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $user_id = $row['id'];
        $nombres = $row['nombres'];
        $apellidos = $row['apellidos'];

        $token = solicitaPassword($user_id, $con);
        if($token !==null){
            require 'index-Mailer.php';
            $mailer = new Mailer();
            $url = SITE_URL . '/index_reset-password.php?id='. $user_id .'&token='. $token;
            $asunto = "Recupera Contraseña - Bici Bikers Association Industry Around the World ";
            $cuerpo = "Estimad@: $nombres $apellidos, <br> Si has solicitado el cambio de tu contraseña da click en el siguiente link<br><br><a href='$url'>Recuperar Contraseña</a> <br><br> De lo contrario omite este mensaje.";
            if($mailer->enviarEmail($email, $asunto, $cuerpo)){
                echo '<p><b>Correo Enviado exitosamente</b></p>';
                echo "<p>Hemos Enviado al Correo $email, Para restablecer tu contraseña</p>";
                header("Location: ../inicio-sesion/index-login.php");
                exit;
              }

        }
      }else{
        $errors[] = "Lo sentimos Parece que no hay ninguna cuenta asociada al correo <b> $email </b> ";
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
    <title>B A I A T W  | Recupera Contraseña</title>
    <!--  Styles  -->
    <link rel="stylesheet" href="../../css/style_index.css">
    <link rel="stylesheet" href="../../css/style-preloader.css">
    <link rel="stylesheet" href="../../css/style-login.css">
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
        <a href="../../../index.php" class="navbar-brand text-dark">
          <i class="bi bi-bicycle "class="d-inline-block align-text-top"></i>
          <span>B A I A T W</span>
        </a>
            <!--  Button  -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="border: 1px solid black;">
              <!-- <span class="navbar-toggler-icon bg-secondary"></span> -->
              <i class="navbar-toggle-icon bi bi-list"></i>
        </button>

        <div class="collapse navbar-collapse" id="menu">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <nav class="navbar d-md-none sticky-md">
                <div class="container-fluid">
                  <form class="d-flex">
                    <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
                  </form>
                </div>
              </nav>
            </li>
            <li class="nav-item"><a href="../inicio-sesion/index-login.php" class="me-auto nav-link active color-dark">Regresar</a></li>
          </ul>
        </div>

        <nav class="navbar d-none d-md-block">
          <div class="container-fluid">
            <form class="d-flex">
              <a href="../index_checkout.php" type="button" class="btn btn-dark position-relative me-4 d-md-none d-xl-block">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>                  
                <span id="num_cart" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">        
                  <?php echo $num_cart; ?>
                <span class="visually-hidden">numero de articulos</span>
                </span>
              </a>
            </form>
          </div>
        </nav>
      </div>
    </nav>
  <!-- /Nav -->

  <!--  Cont page  -->
    <main class="form-login m-auto pt-5 pb-5">
      <h3 class="pt-5 pb-4 text-center">Recuperar Contraseña</h3>

      <?php mostrarMensaje($errors); ?>

      <form action="index-recupera.php" method="post" class="row g-3" autocomplete="off">
        <div class="form-floating">
          <input class="form-control" type="email" name="email" id="email" placeholder="Correo Electronico" require>
          <label for="email">Correo Electronico</label>
        </div>
        <div class="d-grid gap-3 pt-2 pb-3 col-12">
          <button type="submit" class="btn btn-primary" >Continuar</button>
        </div>
        <hr>
        <div class="col-12">
          ¿No tienes Cuenta? <a href="../equipo-admin/index_registro.php">Registrate Aquí</a>
        </div>
      </form>
    </main>
  <!-- /Cont page -->

  <!-- footer -->
    <?php include'../pag/footer/footer-all-ev-ma.php'; ?>
  <!-- /footer -->

  <!-- javascript -->
    <script src="../../js/app-loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>