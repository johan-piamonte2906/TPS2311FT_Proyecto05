<?php

  require_once '../Conexiones/config.php';
  require '../../mercado_pago/vendor/autoload.php';

  MercadoPago\SDK::setAccessToken(TOKEN_MP);

  $preference = new MercadoPago\preference();
  $producto_mp = array();

  $db = new Database();
  $con = $db->conectar();

  $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

  $lista_carrito = array();

    if($productos != null){
      foreach($productos as $clave => $cantidad){
        $sql = $con->Prepare("SELECT id, nombres, precio, descuento, $cantidad AS cantidad FROM products WHERE id=? AND activo=1");
        $sql->execute([$clave]);
        $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
      }
    }else{
      header("location: ../index_checkout.php");
      exit;
    }



?>

<!DOCTYPE html>
<html lang="en-es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B A I A T W  | Pagos </title>
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
    <!-- api Paypal solo se puede en EU, MXN etc, No para colombia -->
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>"></script>
    <!-- Mercado Pago -->
    <script src="https://sdk.mercadopago.com/js/v2"></script>
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
    <nav class="navbar navbar-expand-md fondo-all sticky-top" id="backgronud-all">
      <div class="container-fluid">
        <a class="navbar-brand text-dark">
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
                          <li><a class="dropdown-item" href="../equipo-admin/index-logout.php">Cerrar Sesion</a></li>
                        </ul>
                      </div>
                    <?php } else{ ?>
                      <a href="./inicio-sesion/index-login.php" type="button" class="btn btn-dark position-relative me-5 d-md-none d-xl-block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                          <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                        </svg>
                      </a>
                    <?php }  ?>
                  </form>
                </div>
              </nav>
            </li>
            <li class="nav-item"><a href="../index_checkout.php" class="me-auto nav-link active color-dark">Regresar</a></li>
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
                    <li><a class="dropdown-item" href="../equipo-admin/index-logout.php">Cerrar Sesion</a></li>
                  </ul>
                </div>
              <?php } else{ ?>
              <a href="../inicio-sesion/index-login.php" type="button" class="btn btn-dark position-relative me-2 d-md-none d-xl-block">
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

  <!--  Cont page  -->
    <center><h2 class="pt-4">Detalles de productos</h2></center>
      <main>
        <div class="container pt-5 pb-5 mt-4 mb-4">
          <div class="row">
              <div class="col-6">
                <div class="row">
                  <div class="col-12">
                    <div class="" id="paypal-button-container"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="checkout-btn"></div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                  <div class="table-responsive">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>Producto</th>
                                  <th>Subtotal</th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php if($lista_carrito == 0){
                                  echo '<tr><td colspan="5" class="text-center"><b><div class="alert alert-success" role="alert">
                                  El Carrito Esta vacio <a href="./index_bycle.php" class="alert-link">Agrega cosas</a>, Para continuar
                              </div></b></td></tr>';
                              }else {
                                  $total = 0;
                                  foreach($lista_carrito as $producto){
                                      $_id = $producto['id'];
                                      $nombre = $producto['nombres'];
                                      $precio = $producto['precio'];
                                      $descuento = $producto['descuento'];
                                      $cantidad = $producto['cantidad'];
                                      $precio_desc = $precio - (($precio * $descuento) / 100);
                                      $subtotal = $cantidad * $precio_desc;
                                      $total += $subtotal;

                                      $item = new MercadoPago\item();
                                      $item->id = $_id;
                                      $item->title = $nombre;
                                      $item->quantity = $cantidad;
                                      $item->unit_price = $precio_desc;
                                      $item->currency_id = "COP";

                                      array_push($producto_mp, $item);
                                      unset($item);
                                  ?>
                                  <tr>
                                      <td><?php echo $nombre?></td>                                    
                                      <td>
                                          <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal, 3, '.', ','); ?></div>
                                      </td>                                    
                                  </tr>
                                  <?php }?>
                                  <tr>                                    
                                      <td colspan="5">
                                          <p class="h3 text-center" id="total"><?php echo MONEDA . number_format($total, 3, '.', ','); ?></p>
                                      </td>
                                  </tr>
                          </tbody>
                          <?php } ?>
                      </table>
                  </div>
              </div>
          </div>
        </div>
      </main>
    <?php

    $preference->items = $producto_mp;

    ?>
  <!-- /Cont page -->

  <!-- footer --> 
    <?php include'../pag/footer/footer-all-ev-ma.php'; ?>
  <!-- /Footer -->


  <!-- javascript -->
    <script>
      paypal.Buttons({
        style:{
          color:'blue',
          shape: 'pill',
          label: 'pay'
        },
        crateOrder: function(data, actions){
          return actions.order.create({
            purchase_units:[{
              amount:{
                value: <?php echo $total; ?>
              }, 
            }]
          });
        },
        onApprove: function(data, action){
          action.order.capture().then(function(detalles){
            console.log(detalles)
            let url = '../carrito-compras/index-captura.php';
            return fetch(url,{
              method: 'post',
              headers: {
                'content-type': 'application/json'
              },
              body: JSON.stringify({
                detalles: detalles
              })
            }).then(function(response){
              location.reload();
            })
          });
        },
        onCancel: function(data){
          alert("Tu orden ah sido cancelada ha sido cancelada")
          console.log(data)
        }
      }).render('#paypal-button-container');
    </script>
    <!-- <script>
       const mp = new MercadoPago('TEST-349f510c-3863-4580-8ea2-eeeecc8ff295',{
            locale: 'es-CO' 
        });

        mp.checkout({
            preference: {
                id: '<?php echo $preference->id; ?>'
            },
            render: {
                container: '.checkout-btn',
                label: 'pagar con MP'
            }
        })
    </script> -->
    <script src="../../js/app-loader.js"></script>
    <!-- <script src="../../js/app-carritoCompras.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>