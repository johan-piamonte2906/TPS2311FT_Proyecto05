<!DOCTYPE html>
<html lang="en-es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B A I A T W  | inicio</title>
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
    <nav class="navbar navbar-expand-md fondo-all pt-2 pb-2" id="backgronud-all">
      <div class="container-fluid">
        <a href="./index.php" class="navbar-brand text-dark">
          <i class="bi bi-bicycle "class="d-inline-block align-text-top"></i>
          <span>B A I A T W</span>
        </a>
        <!--  Button  -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <li class="nav-item"><a href="#" class="me-auto nav-link active color-dark">Spares</a></li>
            <li class="nav-item"><a href="./src/php/index_bycle.php" class="me-auto nav-link active color-dark">Bikes</a></li>
          </ul>
        </div>
        <nav class="navbar d-none d-md-inline-block">
          <div class="container-fluid">
            <form class="d-flex" >
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-light" type="submit"><i class="bi bi-search color-white"></i></button>
            </form>
          </div>
        </nav>
      </div>
    </nav>
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
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-6">
              <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste animi veritatis dolor illo repudiandae quo saepe autem facere deserunt officia!</span>
            </div>
            <div class="col-xl-4 col-md-6">
              <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, nemo asperiores inventore pariatur numquam excepturi delectus alias saepe eligendi aspernatur!</span>
            </div>
            <div class="col-xl-4 col-md-6">
              <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit incidunt unde eum ipsum error, numquam dolore odio debitis ratione dicta?</span>
            </div>
        </div>
    </div>
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
        <p style="color:white;">Copyright© <b>S S W D | B A I A T W</b></p>
      </div>
    </footer>
  <!-- /Footer -->

  <!-- Javascript -->
    <script src="./src/js/app-loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>