<!--  Nav  -->
<nav class="navbar navbar-expand-md fondo-all sticky-top" id="backgronud-all">
      <div class="container-fluid">
        <a href="index.php" class="navbar-brand text-dark">
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
                  <a href="./src/php/index_checkout.php" type="button" class="btn btn-dark position-relative me-4 d-md-none d-xl-block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                      <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>                  
                    <span id="num_cart" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">        
                      <?php echo $num_cart; ?>
                    <span class="visually-hidden">numero de articulos</span>
                    </span>
                  </a>
                  <?php if(isset($_SESSION['user_id'])){ ?>
                    <div class="dropdown">
                      <button class="btn btn-dark dropdown-toggle me-3" type="button" id="btn-cerrar-sesion" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                          <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                        </svg> <?php echo $_SESSION['user_name']; ?>
                      </button>
                      <ul class="dropdown-menu bg-secondary" aria-labelledby="btn-cerrar-sesion">
                        <li><a class="dropdown-item" href="./src/php/equipo-admin/index-compras.php">Mis Compras</a></li>
                        <li><a class="dropdown-item" href="./src/php/equipo-admin/index-logout.php">Cerrar Sesion</a></li>
                      </ul>
                    </div>                    
                  <?php } else{ ?>
                    <a href="./src/php/inicio-sesion/index-login.php" type="button" class="btn btn-dark position-relative me-5 d-md-none d-xl-block">
                      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                      </svg>
                    </a>
                  <?php }  ?>
                  </form>
                </div>
              </nav>
            </li>
            <li class="nav-item"><a href="./src/php/Eventos/index_eventos.php" class="me-auto nav-link active color-dark">Eventos</a></li>
            <li class="nav-item"><a href="./src/php/mantenimientos/index-mantenimientos.php" class="me-auto nav-link active color-dark">Maintenimientos</a></li>
            <li class="nav-item"><a href="./src/php/index_bycle.php" class="me-auto nav-link active color-dark">Bicicletas Repuestos y Más</a></li>
          </ul>
        </div>

        <nav class="navbar d-none d-md-block">
          <div class="container-fluid">
            <form class="d-flex">
              <a href="./src/php/index_checkout.php" type="button" class="btn btn-dark position-relative me-3 d-md-none d-xl-block">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>                  
                <span id="num_cart" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">        
                  <?php echo $num_cart; ?>
                <span class="visually-hidden">numero de articulos</span>
                </span>
              </a>
              <?php if(isset($_SESSION['user_id'])){ ?>
                <div class="dropdown">
                  <button class="btn btn-dark dropdown-toggle me-3" type="button" id="btn-cerrar-sesion" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                    </svg> <?php echo $_SESSION['user_name']; ?>
                  </button>
                  <ul class="dropdown-menu bg-secondary" aria-labelledby="btn-cerrar-sesion">
                  <li><a class="dropdown-item" href="./src/php/equipo-admin/index-compras.php">Mis Compras</a></li>
                    <li><a class="dropdown-item" href="./src/php/equipo-admin/index-logout.php">Cerrar Sesion</a></li>
                  </ul>
                </div>
              <?php } else{ ?>
                 <a href="./src/php/inicio-sesion/index-login.php" type="button" class="btn btn-dark position-relative me-2 d-md-none d-xl-block">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                  </svg>
                </a>
              <?php }  ?>
            </form>
          </div>
        </nav>
      </div>
    </nav>
  <!-- /Nav -->