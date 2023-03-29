<!DOCTYPE html>
<html lang="en-es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B A I T W  | inicio</title>
    <!--  Styles  -->
    <link rel="stylesheet" href="./src/css/style_index.css">
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
    <!--  Nav  -->
    <nav class="navbar navbar-expand-md fondo-all" id="backgronud-all">
        <div class="container-fluid">
            <a href="#" class="navbar-brand text-dark" style="cursor: default;">
                <i class="bi bi-bicycle "class="d-inline-block align-text-top"></i>
                <span>B A I T W</span>
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
                    <li class="nav-item"><a href="#" class="me-auto nav-link active color-dark">Replace</a></li>
                    <li class="nav-item"><a href="#" class="me-auto nav-link active color-dark">Bikes</a></li>
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
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
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
      </div>
     </main>
    <!-- /Carousel -->

    <!--  Cont page cambiar mas adelante -->
    
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

    <!-- footer --> 
    <footer class="footer-all footer-end">
      <div class="container-fluid footer_all">
        <div class="row">
          <div class="col-lg-3 col-sm-6">
            <div class="single-box">
              <div class="baitw-font">
                <i class="bi bi-bicycle "class="d-inline-block align-text-top"></i>
                <span>B A I T W</span>
              </div>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, reprehenderit.</p>
              <h3>We Accept</h3>
              <div class="card-area">
                <i class="fa-brands fa-cc-visa"></i>
                <i class="fa-brands fa-cc-mastercard"></i>
                <i class="fa-solid fa-credit-card"></i>
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
    </footer>
    <!-- /Footer -->


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>