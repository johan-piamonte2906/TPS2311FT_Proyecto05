<?php

  require '../Conexiones/config.php';
  require '../Conexiones/database.php';
  require '../equipo-admin/index_funciones.php';


  $db = new Database();
  $con = $db->conectar();

  $errors=[];

  if(!empty($_POST)){

    $nombres = trim($_POST['nombres']);
    $apellidos = trim($_POST['apellidos']);
    $email = trim($_POST['email']);
    $telefono = trim($_POST['telefono']);
    $identificacion = trim($_POST['identificacion']);
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);
    $repassword = trim($_POST['repassword']);

    if(esNulo([$nombres, $apellidos, $email, $telefono, $identificacion, $usuario, $password, $repassword])){
        $errors[] = "debe llenar todos los campos";
    }

    if(!esEmail($email)){
        $errors[] = "La direccion de correo no es valida";
    }

    if(!validaPassword($password, $repassword)){
        $errors[] = "Las contraseñas no coincide";
    }

    if(usuarioExiste($usuario, $con)){
        $errors[] = " El nombre de usuario $usuario ya existe";
    }
    if(emailExiste($email, $con)){
        $errors[] = " El Correo electronico $email ya existe";
    }

    if(count($errors) == 0){
        $id = registraCliente([$nombres, $apellidos, $email, $telefono, $identificacion], $con);
        if($id > 0){

            require 'index-Mailer.php';
            $mailer = new Mailer();
            $token = generaToken();
            $pass_hash = password_hash($password, PASSWORD_DEFAULT);

            $idUsuario = registraUsuario([$usuario, $pass_hash, $token, $id], $con);
            if($idUsuario > 0){
                $url = SITE_URL . '/index_activa_cliente.php?id='. $idUsuario .'&token='. $token;
                $asunto = "Activa Tu cuenta - Bici Bikers Association Industry Around the World ";
                $cuerpo = "Estimad@: $nombres $apellidos <br> Es importante para nosotros tenerte en nuestra familia, Para Continuar <a href='$url'> Activa tu cuenta</a> y disfruta de nuestrs beneficios.";
                //http://localhost/TPS2311FT_Proyecto05/Page_project_BAITW/src/php/equipo-admin/index_activa_cliente.php?id=1&token=d59468261685632d4e030049062d2205

              if($mailer->enviarEmail($email, $asunto, $cuerpo)){
                echo "Para continuar Con el proceso de registro le enviamos un correo de activacion al $email para continuar su registro ";
                header("Location: ../inicio-sesion/index-login.php");
                exit;
              }
            }else{
              $errors[] = "error al registrar usuario";
            }
        }else{
            $errors[] = "error al registrar cliente";
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
    <title>B A I A T W  | Bikes </title>
    <!--  Styles  -->
    <link rel="stylesheet" href="../../css/style_index.css">
    <link rel="stylesheet" href="../../css/style_products.css">
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


  <!--  Nav  -->
    <nav class="navbar navbar-expand-md fondo-all sticky-top" id="backgronud-all">
      <div class="container-fluid">
        <a href="../../../index.php" class="navbar-brand text-dark">
          <i class="bi bi-bicycle "class="d-inline-block align-text-top"></i>
          <span>B A I A T W</span>
        </a>
      </div>

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
                    <input class="form-control me-2 d-flex p-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
                  </form>
                </div>
              </nav>
            </li>
            <li class="nav-item"><a href="../inicio-sesion/index-login.php" class="me-auto nav-link active color-dark">Regresar</a></li>
          </ul>
        </div>
    </nav>
  <!-- /Nav -->

  <!--  Cont page  -->
    <main>
      <div class="container pt-4 pb-3">
        <h2 class="mt-3 mb-5 pt-5 pb-4 text-center">Registro Cliente</h2>

        <?php mostrarMensaje($errors); ?>

        <form class="row g-3" action="index_registro.php" method="post">
            <div class="col-md-6">
                <label for="nombres"><span class="text-danger">*</span>Nombres</label>
                <input class="form-control" type="text" name="nombres" id="nombres" requireda>
            </div>
            <div class="col-md-6">
                <label for="apellidos"><span class="text-danger">*</span>Apellidos</label>
                <input class="form-control" type="text" name="apellidos" id="apellidos" requireda>
            </div>
            <div class="col-md-6">
                <label for="email"><span class="text-danger">*</span>Correo Electronico</label>
                <input class="form-control" type="email" name="email" id="email" requireda>
                <span id="validaEmail" class="text-danger"></span>
            </div>
            <div class="col-md-6">
                <label for="telefono"><span class="text-danger">*</span>Telefono</label>
                <input class="form-control" type="tel" name="telefono" id="telefono" requireda>
            </div>
            <div class="col-md-6">
                <label for="identificacion"><span class="text-danger">*</span>Numero de identificacion (cc)</label>
                <input class="form-control" type="text" name="identificacion" id="identificacion" requireda>
            </div>
            <div class="col-md-6">
                <label for="usuario"><span class="text-danger">*</span>Nombre Usuario</label>
                <input class="form-control" type="text" name="usuario" id="usuario" requireda>
                <span id="validaUsuario" class="text-danger"></span>
            </div>
            <div class="col-md-6">
                <label for="password"><span class="text-danger">*</span>Contraseña</label>
                <input class="form-control" type="password" name="password" id="password" requireda>
            </div>
            <div class="col-md-6">
                <label for="repassword"><span class="text-danger">*</span>Repetir Contraseña</label>
                <input class="form-control" type="password" name="repassword" id="repassword" requireda>
            </div>

            <i><b>Nota:</b> Los Campos son Obligatorios</i>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </form>
      </div>
    </main>
  <!-- /Cont page -->


  <!-- javascript -->
    <script >
        
    // si existe el Usuario
        let txtUsuario = document.getElementById('usuario')
        txtUsuario.addEventListener("blur", function(){
        existeUsuario(txtUsuario.value)
        }, false)

    // usuario
        function existeUsuario(usuario){
        let url = "index_clienteAjax.php"
        let formData = new FormData()
        formData.append("action", "existeUsuario")
        formData.append("usuario", usuario)

        fetch(url,{
            method: 'POST',
            body: formData
        }).then(response => response.json()).then(data =>{
            if(data.ok){
                document.getElementById('usuario').value = ''
                document.getElementById('validaUsuario').innerHTML = 'Usuario No Esta Disponible'
            }else{
                document.getElementById('validaUsuario').innerHTML = ''
            }
        })
        }
    //si existe el correo
        let txtEmail = document.getElementById('email')
        txtEmail.addEventListener("blur", function(){
        existeEmail(txtEmail.value)
        }, false)

    // correo    
        function existeEmail(email){
        let url = "index_clienteAjax.php"
        let formData = new FormData()
        formData.append("action", "existeEmail")
        formData.append("email", email)

        fetch(url,{
            method: 'POST',
            body: formData
        }).then(response => response.json()).then(data =>{
            if(data.ok){
                document.getElementById('email').value = ''
                document.getElementById('validaEmail').innerHTML = 'El Correo Ya Existe'
            }else{
                document.getElementById('validaEmail').innerHTML = ''
            }
        })
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>