<?php

require_once './src/php/Conexiones/database.php';
require_once './src/php/Conexiones/config.php';

?>
<!DOCTYPE html>
<html lang="en-es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B A I A T W  | Inicio </title>
    <!--  Styles  -->
    <link rel="stylesheet" href="./src/css/style_index.css">
    <link rel="stylesheet" href="./src/css/style-preloader.css">
    <!--  Bootstrap 5  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--  Icons Bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!--  Fav-icon  -->
    <link rel="shortcut icon" href="./src/img/fav-icons/favicon-bicycle.png" type="image/m-icon">
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
    <?php include'./src/php/pag/nav/nav-index.php'; ?>
  <!-- /Nav -->

  <!--  Carousel  -->
   <main id="main">
      <div id="carouselExampleDark" class="carousel carousel-dark slide carousel-fad" data-bs-ride="carousel" data-pause="false">
          <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
              <img src="./src/img/Carousel/image.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
              <img src="./src/img/Carousel/image-2.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="./src/img/Carousel/image-3.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
          </div>
          <div class="overlay">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-md-6 offset-md-6 text-center">
                  <h1>
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bicycle" viewBox="0 0 16 16">
                      <path d="M4 4.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1v.5h4.14l.386-1.158A.5.5 0 0 1 11 4h1a.5.5 0 0 1 0 1h-.64l-.311.935.807 1.29a3 3 0 1 1-.848.53l-.508-.812-2.076 3.322A.5.5 0 0 1 8 10.5H5.959a3 3 0 1 1-1.815-3.274L5 5.856V5h-.5a.5.5 0 0 1-.5-.5zm1.5 2.443-.508.814c.5.444.85 1.054.967 1.743h1.139L5.5 6.943zM8 9.057 9.598 6.5H6.402L8 9.057zM4.937 9.5a1.997 1.997 0 0 0-.487-.877l-.548.877h1.035zM3.603 8.092A2 2 0 1 0 4.937 10.5H3a.5.5 0 0 1-.424-.765l1.027-1.643zm7.947.53a2 2 0 1 0 .848-.53l1.026 1.643a.5.5 0 1 1-.848.53L11.55 8.623z"/>
                    </svg>
                    B A I A T W
                  </h1>
                  <span>Bicycle Association Industry Around the World</span>
                </div>
              </div>
            </div>
          </div>
      </div>
   </main>
  <!-- /Carousel -->

  <!--  Cont page  -->    
    <div class="container pb-5 mb-5" id="contenido">
        <div class="row" id="centro-de-caja">
            <div class="container d-auto col-xl-4 col-md-6">
              <div class="container pb-2" id="imagen1">
                <center><img id="confiable" src="src/img/img-index/compra_segura.jpg" alt="compras 100% segura"></center>
              </div>
              <div class="container">
                <h2 class="text-center pb-3">Compra Segura</h2>
              </div>
              <span>En Bicycle Association Industry Around the World, entendemos la importancia de brindar a nuestros clientes una experiencia de compra en línea sin preocupaciones. Nos comprometemos a ofrecer un entorno seguro y confiable para que realices tus compras con total <b>tranquilidad</b>.</span>
            </div>
            <div class="container d-auto col-xl-4 col-md-6">
              <div class="container pb-2" id="imagen2">
               <center> <img id="envios" src="src/img/img-index/envios.jpg" alt="envios confiebles" ></center>
              </div>
              <div class="comtainer">
                <h2 class="text-center pb-3">Envios a toda colombia</h2>
              </div>
              <span>En Bicycle Association Industry Around the World, no solo ofrecemos productos excepcionales, sino también una experiencia de compra que se extiende a cada rincón de Colombia. Queremos que disfrutes de la tranquilidad de saber que tu pedido está en buenas manos, desde el clic hasta la entrega, <b>Cobertura completa</b>,<b>Seguridad en Cada Paquete</b>,<b>Soporte Nacional 24/7</b> y Mucho Más.</span>
            </div>
            <div class="container d-auto col-xl-4 col-md-6">
              <div class="container pb-2" id="imagen3">
                <center><img id="compra-en-linea" src="src/img/img-index/logo-compra-en-linea.png" alt=""></center>
              </div>
              <div class="container">
                <h2 class="text-center pb-3">Compra en linea</h2>
              </div>
              <span>En Bicycle Association Industry Around the World, la comodidad de comprar en línea se combina con la confianza de recibir productos de calidad, sin importar en qué parte de Colombia te encuentres. Explora nuestro catálogo desde la comodidad de tu hogar y deja que tus productos favoritos lleguen directamente a tu puerta.</span>
            </div>
        </div>
    </div>
  <!-- /Cont page -->

  <!-- footer --> 
    <?php include'./src/php/pag/footer/footer-index.php'; ?>
  <!-- /Footer -->

  <!-- Javascript -->
    <script src="./src/js/app-loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>