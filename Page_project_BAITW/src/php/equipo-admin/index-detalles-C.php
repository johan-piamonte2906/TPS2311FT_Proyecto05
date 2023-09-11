<?php

  require '../Conexiones/config.php';
  require '../Conexiones/database.php';
  require '../equipo-admin/index_funciones.php';

  $token_session = $_SESSION['token'];
  $order = $_GET['order']  ?? null;
  $token = $_GET['token']  ?? null;

  if ($order == null || $token == null || $token != $token_session) {
    header("Location: index-compras.php");
    exit;
  }
  
  $db = new Database();
  $con = $db->conectar();

  $sqlCompra = $con->prepare("SELECT id, id_transaccion, fecha, total FROM compra WHERE id_transaccion = ? LIMIT 1");
  $sqlCompra->execute([$order]);
  $rowCompra = $sqlCompra->fetch(PDO::FETCH_ASSOC);
  $idCompra = $rowCompra['id'];

  $fecha = new DateTime($rowCompra['fecha']);
  $fecha = $fecha->format('d-m-Y  H:i');
  
  $sqlDetalle = $con->prepare("SELECT id, nombre, precio, cantidad FROM detalle_compra WHERE id_compra = ?");
  $sqlDetalle->execute([$idCompra]);
  
?>

<!DOCTYPE html>
<html lang="en-es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B A I A T W  | Detalles de Compra </title>
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
                  <?php if(isset($_SESSION['user_id'])){ ?>
                    <div class="dropdown">
                      <button class="btn btn-dark dropdown-toggle me-3" type="button" id="btn-cerrar-sesion" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                          <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                        </svg> <?php echo $_SESSION['user_name']; ?>
                      </button>
                      <ul class="dropdown-menu bg-secondary" aria-labelledby="btn-cerrar-sesion">
                        <li><a class="dropdown-item" href="index-logout.php">Cerrar Sesion</a></li>
                      </ul>
                    </div>                    
                  <?php } ?>
                  </form>
                </div>
              </nav>
            </li>
            <li class="nav-item"><a href="../Eventos/index_eventos.php" class="me-auto nav-link active color-dark">Eventos</a></li>
            <li class="nav-item"><a href="../mantenimientos/index-mantenimientos.php" class="me-auto nav-link active color-dark">Maintenimientos</a></li>
            <li class="nav-item"><a href="../index_bycle.php" class="me-auto nav-link active color-dark">Bicicletas Repuestos y Más</a></li>
          </ul>
        </div>

        <nav class="navbar d-none d-md-block">
          <div class="container-fluid">
            <form class="d-flex">              
              <?php if(isset($_SESSION['user_id'])){ ?>
                <div class="dropdown">
                  <button class="btn btn-dark dropdown-toggle me-3" type="button" id="btn-cerrar-sesion" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                    </svg> <?php echo $_SESSION['user_name']; ?>
                  </button>
                  <ul class="dropdown-menu bg-secondary" aria-labelledby="btn-cerrar-sesion">                
                    <li><a class="dropdown-item" href="index-logout.php">Cerrar Sesion</a></li>
                  </ul>
                </div>
              <?php } ?>
            </form>
          </div>
        </nav>
      </div>
    </nav>
  <!-- /Nav -->

  <!--  Cont page  -->
    <main>
      <div class="container-fluid pt-3">
        <a href="index-compras.php" class="text-decoration-none text-dark"><i class="bi bi-arrow-left-short">Regresar</i></a>
      </div>
      <div class="container pt-5">
        <div class="row">
          <div class="col-12 col-md-4">
            <div class="card mb-3">
              <div class="card-header">
                <strong>Detalles De La Compra</strong>
              </div>
              <div class="card-body">
                <p><strong>Fecha:</strong> <?php echo $fecha; ?></p>
                <p><strong>Orden:</strong> <?php echo $rowCompra['id_transaccion']; ?></p>
                <p><strong>Total:</strong> <?php echo MONEDA, ' ' . number_format($rowCompra['total'], 3, '.' , ','); ?></p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-8">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>SubTotal</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($row = $sqlDetalle->fetch(PDO::FETCH_ASSOC)){
                      $precio = $row['precio'];
                      $cantidad = $row['cantidad'];
                      $subtotal = $precio * $cantidad;
                   ?>
                    <tr>
                      <td>
                        <?php echo $row['nombre']; ?>
                      </td>
                      <td>
                        <?php echo number_format($precio, 3, '.', ','); ?>
                      </td>
                      <td>
                        <?php echo $cantidad; ?>
                      </td>
                      <td>
                        <?php echo number_format($subtotal, 3, '.', ','); ?>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
  <!-- /Cont page -->


  <!-- javascript -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <!-- /javascript -->
</body>
</html>