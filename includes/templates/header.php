<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" />
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/all.min.css">
<!-- esta parte del codigo esta mal estoy llamando 2 veces la misma css pero solo la recibe en el primer if-->
  <?php
  $archivo = basename($_SERVER['PHP_SELF']);
  $pagina = str_replace (".php", "", $archivo);
  if($pagina == 'invitados' || $pagina = 'index'){
    echo '<link rel="stylesheet" href="css/colorbox.css">';
    echo '<link rel="stylesheet" href="css/lightbox.css">';
  }else if ($pagina == 'conferencias' && $pagina ='index' ) {
    echo '<link rel="stylesheet" href="css/lightbox.css">';
  }
?>


  
  

  
 <link rel="stylesheet" type="text/css" href="css/main.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />

  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans&display=swap" rel="stylesheet">
 
  <meta name="theme-color" content="#fafafa">
</head>

<body>
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

    <header class ="site-header">
      <div class= "hero">
       <div class="contenido-header">
          <nav class ="redes-sociales">
            <a href="#"><i class="fab fa-facebook-square"aria-hidden="true"></i></a>
            <a href="#"><i class="fab fa-twitter-square"aria-hidden="true"></i></a>
            <a href="#"><i class="fab fa-youtube"aria-hidden="true"></i></a>
            <a href="#"><i class="fab fa-instagram"aria-hidden="true"></i></a>
          </nav>
        <div class ="informacion-evento">
<div class="clearfix">
    <p class="fecha"><i class="fas fa-calendar" aria-hidden="true"></i> 10-12 dic</p>
    <p class="ciudad"><i class="fas fa-thumbtack" aria-hidden="true"></i> Gudalajara,MX</p>
</div>
        <h1 class="nombre-sitio">CUCEI</h1>
        <p class="slogan"> Conferencias <span>CUCEI</span></p>  
      </div>
    </div> 
  </div>
</header>

<div class="barra">
  <div class="contenedor clearfix">
    <div class="logo">
    <a href="index.php">
      <img src="img/logo.svg" alt="logo CUCEI">
      </a>
    </div>
    <div class="menu-movil">
      <span></span>
      <span></span>
      <span></span>
    </div>

  <nav class="navegacion-principal clearfix">
    <a href="conferencias.php">Conferencia</a>
    <a href="calendario.php">Calendario</a>
    <a href="invitados.php">Invitados</a>
    <a href="registro.php">Reservaciones</a>
    </nav>
  </div><!--contenedor-->
</div><!--,barra-->
