<?php
  session_start();
  if(!isset($_SESSION['cpf']) && !isset($_SESSION['senha'])){header('location:index.php');}

  include '../model/Paciente.php';
  $paciente = new Paciente();

  $dadosPaciente     = $paciente->exibirDadosPaciente($_SESSION['cpf']);
  $dadosPosto        = $paciente->exibirDadosPosto($_SESSION['posto']);
  $dadosProfissional = $paciente->exibirDadosProfissional($_SESSION['posto']);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Agendar Consulta</title>
  <meta charset="utf-8">
  <meta charset="iso">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
  <link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
  <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
  <link rel="stylesheet" type="text/css" href="../styles/news.css">
  <link rel="stylesheet" type="text/css" href="../styles/news_responsive.css">
</head>
<body>
  <div class="super_container">
  <?php include 'header.php';?>
	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="../images/news.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<div class="home_title"><span><?php echo $dadosPaciente['pac_nome']?></span></div>
							<div class="breadcrumbs">
								<ul>
									<li><a href="#">Home</a></li>
									<li>Agendar Consulta</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="news">

		<div class="container">
      <?php
        if(isset($_GET['err']) == 'horaMaior'){
          echo '<div class="alert alert-danger" role="alert">
                  A hora inicial não pode ser menor que a hora final do agendamento
                </div>';
        }else if(isset($_GET['err']) == 'HoraIgual'){
          echo '<div class="alert alert-danger" role="alert">
                  Ahora inicial não pode ser igual a finals
                </div>';
                echo $_GET['err'];
        }
      ?>

			<div class="card">
				<h3 class="card-header bg-info text-center text-white py-4">Agendar Consultas</h3>
					<div class="card-body px-lg-5">

						<form action="../controller/sistema.php" method="post">
						<input type="hidden" name="tipo" value="agendar">

							<div class="form-row">
								<div class="col-md-3 mb-3">
								
									<label>Hora de Início</label>
									<input type="time" name="horaInicio" class="form-control" min="08:00" max="17:30" required>
										<div class="invalid-feedback">
											Informe a hora inicial !
										</div>

								</div>
								<div class="col-md-3 mb-3">

									<label>Hora de Fim</label>
									<input type="time" name="horaFim" class="form-control" min="08:00" max="17:30" required>
										<div class="invalid-feedback">
											Infome a hora final!
										</div>

								</div>
								<div class="col-md-6 mb-3">

									<label>Data da consulta:</label>
									<input type="date" name="data" class="form-control"  min="<?php echo date('Y-m-d');?>" required>
										<div class="invalid-feedback">
										</div>

								</div>
							</div>

							<div class="form-row">

								<div class="col-md-12 mb-3">
									<label>Profissional</label>
									<?php echo $paciente->selectProfissional($_SESSION['posto']);?>
										<div class="invalid-feedback">
											Informe o profissional !
										</div>
								</div>

							</div>
						<button class="btn bg-info btn-block text-white " type="submit" value="agendar">Agendar</button>
					</form>
				</div>
			</div>
		</div>

	</div>
	<?php include 'footer.php';?>
</div>

<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../styles/bootstrap4/popper.js"></script>
<script src="../styles/bootstrap4/bootstrap.min.js"></script>
<script src="../plugins/easing/easing.js"></script>
<script src="../plugins/parallax-js-master/parallax.min.js"></script>
<script src="../js/news.js"></script>
</body>
</html>