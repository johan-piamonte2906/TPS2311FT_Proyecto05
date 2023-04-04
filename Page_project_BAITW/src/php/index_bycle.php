<?php

  require './Conexiones/config.php';
  require './Conexiones/database.php';

  $db = new Database();
  $con = $db->conectar();

  $sql = $con->Prepare("SELECT id, nombres, precio FROM products WHERE activo=1");
  $sql->execute();
  $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

  print_r($_SESSION);

?>

<!DOCTYPE html>
<html lang="en-es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B A I A T W  | Bikes </title>
    <!--  Styles  -->
    <link rel="stylesheet" href="../css/style_index.css">
    <link rel="stylesheet" href="../css/style_products.css">
    <link rel="stylesheet" href="../css/style-preloader.css">
    <!--  Bootstrap 5  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--  Icons Bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!--  Fav-icon  -->
    <link rel="shortcut icon" href="../img/fav-icons/favicon-bicycle.png" type="image/m-icon">
    <!-- FONT AWEASOME -->
	  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

  <!-- Loader -->
    <div class="lds-ring loader" id="loader">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  <!-- /Loader -->

  <!--  Nav  -->
    <nav class="navbar navbar-expand-md fondo-all" id="backgronud-all">
      <div class="container-fluid">
        <a href="../../index.php" class="navbar-brand text-dark">
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
                                    <input class="form-control me-2 d-flex p-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div>
                        </nav>
                    </li>
                    <li class="nav-item"><a href="#" class="me-auto nav-link active color-dark">Events</a></li>
                    <li class="nav-item"><a href="#" class="me-auto nav-link active color-dark">Maintenance</a></li>
                    <li class="nav-item"><a href="#" class="me-auto nav-link active color-dark">Accessories</a></li>
                    <li class="nav-item"><a href="#" class="me-auto nav-link active color-dark">Replace</a></li>
                    <li class="nav-item"><a href="./index_bycle.php" class="me-auto nav-link active color-dark">Bikes</a></li>
                </ul>
        </div>

        <nav class="navbar d-none d-md-block">
          <div class="container-fluid">
            <form class="d-flex">
              <a href="./index_checkout.php" type="button" class="btn btn-dark position-relative me-4 d-md-none d-xl-block">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>                  
                <span id="num_cart" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">        
                  <?php echo $num_cart; ?>
                <span class="visually-hidden">numero de articulos</span>
                </span>
              </a>
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-light" type="submit"><i class="bi bi-search color-white"></i></button>
            </form>
          </div>
        </nav>
      </div>
    </nav>
  <!-- /Nav -->

  <!--  Cont page  -->
    <main>
      <div class="container pt-4 pb-3">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 pb-4">
          <?php foreach ($resultado as $row) { ?>
            <div class="col">
              <div class="card shadow-sm">
                <?php
                  $id = $row['id'];
                  $imagen = "../img/productos/". $id . "/index.jpg"; 

                  if(!file_exists($imagen)){
                    $imagen = "../img/no-photo.jpg";
                  }
                ?>
                <a href=""></a>
                <img class="d-block w-100" src=" <?php echo $imagen; ?> ">
                <div class="card-body">
                  <h5 class="card-title"> <?php echo $row['nombres']; ?> </h5>
                  <p class="card-text">$<?php echo number_format($row['precio'],3, '.', ','); ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="./index-details.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>" class="btn btn-primary">Detalles</a>
                    </div>
                    <button class="btn btn-outline-primary" onclick="addProducto(<?php echo $row['id']; ?>, '<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>' )">Agregar al carrito</button>
                  </div>
                </div>
              </div>  
            </div>
          <?php } ?>
        </div>
      </div>
    </main>
  <!-- /Cont page -->

  <!-- footer --> 
    <footer class="footer-all footer-end pt-5 pb-4">
      <div class="container footer_all">
        <div class="row">
          <div class="col-lg-3 col-sm-6">
            <div class="single-box">
              <div class="baitw-font pb-5">
                <i class="bi bi-bicycle "class="d-inline-block align-text-top"></i>
                <span>B A I A T W</span>
              </div>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, reprehenderit.</p>
              <h3 class="pt-4">We Accept</h3>
              <div class="card-area">
                <i class="fa-brands fa-cc-visa"></i>
                <i class="fa-brands fa-cc-mastercard"></i>
                <i class="fa-solid fa-credit-card"></i>
                <i class="fa-brands fa-cc-paypal"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="single-box">
              <h2>cards</h2>
              <ul>
                <li><a href="#">cards</a></li>
                <li><a href="#">cards</a></li>
                <li><a href="#">cards</a></li>
                <li><a href="#">cards</a></li>
                <li><a href="#">cards</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="single-box">
              <h2>cards</h2>
              <ul>
                <li><a href="#">cards</a></li>
                <li><a href="#">cards</a></li>
                <li><a href="#">cards</a></li>
                <li><a href="#">cards</a></li>
                <li><a href="#">cards</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="single-box">
              <h2>News</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, reiciendis recusandae natus eius enim saepe cumque doloremque at sit dolore!</p>
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Enter Your Email..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                <span class="input-group-text" id="basic-addon2"><i class="bi bi-envelope"></i></span>
              </div>
              <h2>Follow</h2>
              <p class="socials">
                <i class="fa-brands fa-square-facebook"></i>
                <i class="fa-brands fa-square-twitter"></i>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="container text-center pt-5">
        <p style="color:white;">Copyright© <b> S S W D | B A I A T W </b></p>
      </div>
    </footer>
  <!-- /Footer -->

  <!-- javascript -->
    <script src="../js/app-loader.js"></script>
    <script src="../js/app-carritoCompras.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>