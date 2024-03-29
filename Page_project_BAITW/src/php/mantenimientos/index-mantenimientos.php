<?php

require_once '../Conexiones/config.php';

?>
<!DOCTYPE html>
<html lang="en-es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B A I A T W  | Mantenimiento </title>
    <!--  Styles  -->
    <link rel="stylesheet" href="../../css/style_index.css">
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

  <!-- loader -->
    <div class="lds-ring loader" id="loader">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  <!-- /loader -->

  <!--  Nav  -->
    <?php include'../pag/nav/nav-mantenimientos.php'; ?>
  <!-- /Nav -->

  <!-- contenido pg -->
    <div class="container mb-5 pt-5 pb-5">
      <h2 class="text-center pb-5">
        <b>Agenda tu Cita de Mantenimiento para tu Bicicleta</b>
      </h2>
      <div class="row">
        <div class="col-xl-8">
          ¿Tu bicicleta necesita un mantenimiento para seguir rodando de manera óptima? Estamos aquí para asegurarnos de que esté en perfectas condiciones. Agendar una cita es fácil: 
          <br>
          <br>
          <b>Fecha y Hora</b>: Elige la fecha y hora que más te convenga. 
          <br>
          <br>
          <b>Ubicación</b>: Puedes optar por traer tu bicicleta a nuestro taller o solicitar mantenimiento a domicilio. 
          <br>
          <br>
          <b>Detalles del Mantenimiento</b>: Cuéntanos qué servicios necesitas, como ajustes, lubricación, reparaciones, etc. 
          <br>
          <br>
          <br>
          Nuestro compromiso es mantener tu bicicleta en excelente estado para que puedas disfrutar de tus paseos sin preocupaciones. Si tienes preguntas o necesitas más información, no dudes en contactarnos. <br>

          ¡Gracias por elegirnos para el cuidado de tu bicicleta!
        </div>
        <div class="col-xl-4 mt-md-3">
          <a href="https://w.app/BicycleAssociationIndustryAroundtheWorld">
            <img src="../../img/BOTON-WHATSAPP.png" alt="">
          </a>
        </div>
      </div>
    </div>
  <!-- /contenido pg -->
  
  <!-- footer --> 
    <?php include'../pag/footer/footer-all-ev-ma.php'; ?>
  <!-- /Footer -->

  <!-- Javascript -->
    <script src="../../js/app-loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>