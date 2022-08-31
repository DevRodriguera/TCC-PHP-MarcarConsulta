<?php 
  session_start();

  include '../model/Administrador.php';

  $adm = new Administrador();
  $dadosPosto = $adm->postoPegarDados($_SESSION['posto']);

  if(!isset($_SESSION['usuario']) && !isset($_SESSION['senha'])){ header('location:index.php'); }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Exibir Pacientes</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/swiper.min.css">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../mstyle.css">

</head>
<body class="single-page">
  <?php include "navBar.php";?>
    <div class="container">
      <div class="row">
        <div class="col-12">
        <h1>Pacientes <br> Cadastrados</h1>

          <div class="breadcrumbs">
            <ul class="d-flex flex-wrap align-items-center p-0 m-0">
              <li><a href="home.php">Home</a></li>
              <li>Exibir Pacientes</li>
            </ul>
          </div><!-- .breadcrumbs -->

        </div>
      </div>
    </div><!-- .container -->

    <img class="header-img" src="../images/about-bg.png" alt="">
  </header><!-- .site-header -->

  <div class="med-history">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <?php echo $adm->pacienteExibirDados($_SESSION['posto']); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-6">
          <?php echo $adm->agendamentosDia($_SESSION['posto']);?>
        </div>
        <div class="col-12 col-md-6">
          <?php echo $adm->agendamentosMes($_SESSION['posto']);?>
        </div>
      </div>
    </div>
  </div>

  <?php include_once 'footer.php';?>

  <script type='text/javascript' src='../js/jquery.js'></script>
  <script type='text/javascript' src='../js/jquery.collapsible.min.js'></script>
  <script type='text/javascript' src='../js/swiper.min.js'></script>
  <script type='text/javascript' src='../js/jquery.countdown.min.js'></script>
  <script type='text/javascript' src='../js/circle-progress.min.js'></script>
  <script type='text/javascript' src='../js/jquery.countTo.min.js'></script>
  <script type='text/javascript' src='../js/jquery.barfiller.js'></script>
  <script type='text/javascript' src='../js/custom.js'></script>
</body>
</html>