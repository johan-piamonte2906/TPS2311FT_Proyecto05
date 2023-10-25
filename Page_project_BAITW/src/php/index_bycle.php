<?php

  require_once './Conexiones/config.php';
  require_once './Conexiones/database.php';

  $db = new Database();
  $con = $db->conectar();

  $sql = $con->Prepare("SELECT id, nombres, precio FROM products WHERE activo=1");
  $sql->execute();
  $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

 // print_r($_SESSION);

?>

<!DOCTYPE html>
<html lang="en-es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B A I A T W  | Bicicletas </title>
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

  <!-- nav -->
    <?php include'./pag/nav/nav-bycle.php'; ?>
  <!-- /nav -->

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
                  <p class="card-text">$ <b><?php echo number_format($row['precio'],3, '.', ','); ?></b></p>
                  <hr>
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
    <?php include'./pag/footer/footer-all-dentro.php'; ?>
  <!-- /Footer -->

  <!-- javascript -->
    <script src="../js/app-loader.js"></script>
    <script src="../js/app-carritoCompras.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>