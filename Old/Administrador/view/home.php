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
  <title>SRS Saúde</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" >
  <link rel="stylesheet" href="../css/swiper.min.css">
  <link rel="stylesheet" href="../style.css">

  <script src="../js/custom.js"></script>

</head>
<body>
  <?php include 'navBarHome.php'; ?>
  <div class="homepage-boxes">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
          <div class="opening-hours">
            <h2 class="d-flex align-items-center">Horários de Funcionamento</h2>

            <ul class="p-0 m-0">
                <li>Segunda - Sexta <span>8:00 - 18:00</span></li>
                <li>Finais de semana e feriado <span>Não abrimos</span></li>
            </ul>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4 mt-5 mt-md-0">
          <div class="emergency-box">
            <h2 class="d-flex align-items-center">Telefones</h2>

            <div class="call-btn button gradient-bg">
              <a class="d-flex justify-content-center align-items-center" href="#"><img src="../images/emergency-call.png"><?php echo $dadosPosto['posto_telefone']?></a>
            </div><br>
          </div>
        </div>
      </div>
    </div>
  </div><!--homepage-boxes-->
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