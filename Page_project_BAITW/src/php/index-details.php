<?php

  require './Conexiones/config.php';
  require './Conexiones/database.php';
  $db = new Database();
  $con = $db->conectar();

    $id = isset($_GET['id']) ? $_GET['id']  : '';
    $token = isset($_GET['token']) ? $_GET['token']  : '';

    if($id == ''  ||  $token == ''){
        echo '
          <script>
            alert("Error al precesar");
            window.location.href = "./index_bycle.php";
          </script>
        ';
        exit;
    } else {
        
      $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);
        if($token == $token_tmp){
          $sql = $con->Prepare("SELECT count(id) FROM products WHERE id=? AND activo=1");
          $sql->execute([$id]);
            if($sql->fetchColumn() > 0){ 
              $sql = $con->Prepare("SELECT nombres, descrip, precio, descuento FROM products WHERE id=? AND activo=1 LIMIT 1");
              $sql->execute([$id]);
              $row = $sql->fetch(PDO::FETCH_ASSOC);
              $nombres = $row['nombres'];
              $descrip = $row['descrip'];
              $precio = $row['precio'];
              $descuento = $row['descuento'];
              $precio_desc = $precio - (($precio * $descuento) / 100);
              $dir_images = '../img/productos/'. $id .'/';
                
              $rutaImg = $dir_images . 'index.jpg';

                if(!file_exists($rutaImg)){
                    $rutaImg = '../img/no-photo.jpg';
                }

                $imagenes = array();
                  if(file_exists($dir_images)){
                      $dir = dir($dir_images);
        
                      while(($archivo = $dir->read()) != false){
                        if($archivo != 'index.jpg' && (strpos($archivo,'jpg') || strpos($archivo, 'jpeg'))){
                          $imagenes[] = $dir_images . $archivo;
                        }
                      }
                      $dir->close();
                    }
            }
            
        } else {
          echo '
            <script>
              alert("Error al precesar");
              window.location.href = "./index_bycle.php";
            </script>
          ';
          exit;
        }
    }  
?>

<!DOCTYPE html>
<html lang="en-es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B A I A T W  | Detalles </title>
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
    <?php include'./pag/nav/nav-details.php'; ?>    
  <!-- /Nav -->

  <!--  Cont page  -->
    <main>
      <div class="container-fluid pt-3">
        <a href="./index_bycle.php" style="color: black; text-decoration:none;">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
            <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
          </svg>
          Regresar
        </a>
      </div>
      <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-1">
          <div id="carouselImages" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="<?php echo $rutaImg; ?>" class="d-block w-100">
                  </div>
                  <?php foreach($imagenes as $img) { ?>
                    <div class="carousel-item">
                      <img src="<?php echo $img; ?>" class="d-block w-100">
                    </div>
                  <?php } ?>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-6 order-md-2">
          <h2><?php echo $nombres; ?></h2>
          <p class="lead"><?php echo $descrip; ?></p>

          <?php if($descuento > 0)  { ?>
              <p class="text-end"><del><?php echo MONEDA . number_format($precio, 3, ',', '.'); ?></del></p>
              <h2 class="text-end">
                  <?php echo MONEDA . number_format($precio_desc, 3, ',', '.'); ?>
                  <small class="text-success">-<?php echo $descuento; ?>% <b>Descuento</b></small>
              </h2>
          <?php }else { ?>

              <h2 class="text-end"><?php echo MONEDA . number_format($precio, 3, ',', '.'); ?></h2>

          <?php } ?>
          <div class="d-grid gap-3 col-10 mx-auto pb-4 pt-3">
            <button class="btn btn-primary" type="button">Comprar ahora</button>
            <button class="btn btn-outline-primary" onclick="addProducto(<?php echo $id; ?>, '<?php echo $token_tmp; ?>' )">Agregar al carrito</button>
          </div>
        </div>
      </div>
    </main>
  <!-- /Cont page -->

  <!-- footer --> 
    <?php include'./pag/footer/footer-all-dentro.php'; ?>
  <!-- /Footer -->

  <!-- Javascript -->
    <script src="../js/app-carritoCompras.js"></script>
    <script src="../js/app-loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>