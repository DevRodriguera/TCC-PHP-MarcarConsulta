<?php 
session_start();

include_once 'navBar.php';
include_once 'Administrador.php';

$adm = new Administrador();
$dadosPosto = $adm->postoPegarDados($_SESSION['posto']);

if(!isset($_SESSION['usuario']) && !isset($_SESSION['senha'])){ header('location:index.php');}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Participantes</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/swiper.min.css">
  <link rel="stylesheet" href="style.css">
    
</head>
<body class="single-page">
  <?php include_once "navBar.php"?>
    <div class="container">
      <div class="row">
        <div class="col-12">
        <h1>Desenvolvedores</h1>

          <div class="breadcrumbs">
            <ul class="d-flex flex-wrap align-items-center p-0 m-0">
              <li><a href="home.php">Home</a></li>
              <li>Desenvolvedores</li>
            </ul>
          </div><!-- .breadcrumbs -->

        </div>
      </div>
    </div><!-- .container -->

    <img class="header-img" src="images/contact-bg.png" alt="">
  </header><!-- .site-header -->

    <div class="medical-team">
    <div class="container">
      <div class="row">
        <div class="col-12">
        </div>

        <div class="col-12 col-md-6 col-lg-3">
          <div class="medical-team-wrap">
            <img src="images/participante-1.jpeg" alt="">

            <h4>Rodrigo Souza Fogaça</h4>
            <h5>Desenvolvedor</h5>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0">
          <div class="medical-team-wrap">
            <img src="images/participante-2.jpg" alt="">

            <h4>Sara Carvalho</h4>
            <h5>Designer</h5>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3 mt-5 mt-lg-0">
          <div class="medical-team-wrap">
            <img src="images/participante-3.jpg" alt="">

            <h4>Steffany</h4>
            <h5>Analista/Documentação</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include_once 'footer.php';?>

    <script type='text/javascript' src='js/jquery.js'></script>
    <script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
    <script type='text/javascript' src='js/swiper.min.js'></script>
    <script type='text/javascript' src='js/jquery.countdown.min.js'></script>
    <script type='text/javascript' src='js/circle-progress.min.js'></script>
    <script type='text/javascript' src='js/jquery.countTo.min.js'></script>
    <script type='text/javascript' src='js/jquery.barfiller.js'></script>
    <script type='text/javascript' src='js/custom.js'></script>
</body>
</html>