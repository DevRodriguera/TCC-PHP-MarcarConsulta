<?php 
session_start();

include_once 'Administrador.php';

$adm = new Administrador();
$dadosPosto = $adm->postoPegarDados($_SESSION['posto']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>SRSaúde</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/swiper.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="mstyle.css">
  <script>
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      var forms = document.getElementsByClassName('needs-validation');
      var validation = Array.prototype.filter.call(forms, function(form) {

        form.addEventListener('submit', function(event) {

          if (form.checkValidity() === false) {

            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>
</head>
<body class="single-page blog-page">
  <?php include 'navBar.php'; ?>
    <div class="container">
      <div class="row">
        <div class="col-12">
        <h1>Agendar Consultas</h1>

          <div class="breadcrumbs">
            <ul class="d-flex flex-wrap align-items-center p-0 m-0">
              <li><a href="home.php">Home</a></li>
              <li>Agendamento de Consultas</li>
            </ul>
          </div><!-- .breadcrumbs -->

        </div>
      </div>
    </div><!-- .container -->

    <img class="header-img" src="images/about-bg.png" alt="">
  </header><!-- .site-header -->

  <div class="container">
    <div class="med-history">
      <div class="card">
        <h5 class="card-header gradient-bg text-center py-4">Agendamento de Consultas</h5>
          <div class="card-body px-lg-5 ">

            <form action="" method="post">
              <div class="form-row">

                <div class="col-md-6 mb-3">
                  <label for="validationCustom01">Paciente</label>
                  <?php echo $adm->pacienteSelect($_SESSION['posto']);?>
                    <div class="invalid-feedback">
                      Informe qual paciente !
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="validationCustom02">Hora de Início</label>
                  <input type="time" name="age_horaInicio" class="form-control" id="age_horaInicio"  min="08:00" max="17:30"  required>
                    <div class="invalid-feedback">
                      Informe a hora inicial !
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="validationCustom03">Hora de Fim</label>
                  <input type="time" name="age_horaFim" class="form-control"id="age_horaFim" min="08:00:00" max="17:30:00" required>
                    <div class="invalid-feedback">
                      Infome a hora final!
                    </div>
                </div>
              </div>

              <div class="form-row">

                <div class="col-md-6 mb-3">
                  <label for="validationCustom04">Profissional</label>
                  <?php echo $adm->profissionalSelect($_SESSION['posto']);?>
                    <div class="invalid-feedback">
                      Informe o profissional !
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationCustom05">Data da consulta:</label>
                  <input type="date" name="age_data" class="form-control" id="age_data" min="<?php echo date('Y-m-d');?>" required>
                    <div class="invalid-feedback">
                      Informe a data correta da consulta!
                    </div>
                </div>
              </div>
            <button class="btn button gradient-bg btn-block" type="submit" value="agendarConsulta">Cadastrar Consulta</button>
          </form>
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