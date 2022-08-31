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
	<title>Seus Dados</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
  <link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
  <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
  <link rel="stylesheet" type="text/css" href="../styles/services.css">
  <link rel="stylesheet" type="text/css" href="../styles/services_responsive.css">
</head>
<body>
  <div class="super_container">
  <?php include 'header.php';?>
    <div class="home">
      <div class="home_background parallax-window" data-parallax="scroll" data-image-src="../images/services.jpg" data-speed="0.8"></div>
      <div class="home_container">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="home_content">
                <div class="home_title"><span><?php echo $dadosPaciente['pac_nome']?></span></div>
                <div class="breadcrumbs">
                  <ul>
                    <li><a href="#">Home</a></li>
                    <li>Dados pessoais</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container pt-5 pb-5">
      <div class="row">
        <div class="col-lg-7 col-sm-12">
          <div class="section_title"><h2>Paciente: <?php echo $dadosPaciente['pac_nome'];?></h2>
          </div>
          <div class="card">
          <h3 class="card-header bg-info text-center text-white py-2">Dados Pessoais</h3>
            <div class="card-body px-5">
              <?php
                $dadosPaciente['pac_sexo'] == 'M'? $sexo = "Masculino": $sexo = "Feminino";
                echo "<div><b>Data de Nascimento:</b>".$dadosPaciente['pac_data_nasc']. "</div>";
                echo "<div><b>Sexo:</b>"              .$sexo."</div>";
                echo "<div><b>CPF:</b>"               .$dadosPaciente['pac_cpf'].       "</div>";
                echo "<div><b>Celular:</b>"           .$dadosPaciente['pac_celular'].   "</div>";
                echo "<div><b>E-mail:</b>"            .$dadosPaciente['pac_email'].     "</div>";
              ?>
            </div>
          </div><br>
          <div class="card">
          <h3 class="card-header bg-info text-center text-white py-2">Dados Residenciais</h3>
            <div class="card-body px-5">
              <?php
                echo "<div><b>CEP:</b>"               .$dadosPaciente['pac_cep'].        "</div>";
                echo "<div><b>Estado:</b>"            .$dadosPaciente['pac_estado'].     "</div>";
                echo "<div><b>Cidade:</b>"            .$dadosPaciente['pac_cidade'].     "</div>";
                echo "<div><b>Bairro:</b>"            .$dadosPaciente['pac_bairro'].     "</div>";
                echo "<div><b>Rua:</b>"               .$dadosPaciente['pac_rua'].        "</div>";
                echo "<div><b>Número da Casa:</b>"    .$dadosPaciente['pac_numeroCasa']. "</div> ";
                echo "<div><b>Complemento:</b>"    	  .$dadosPaciente['pac_complemento']."</div>";
              ?>
            </div>
          </div><br>
          <div class="button">
            <a href="pacienteAlterar.php">Alterar dados</a>
          </div>
        </div><!--.col-->
        <div class="col-lg-5 col-sm-12">
          <div class="card">
            <h3 class="card-header bg-primary text-center text-white py-2">Consultas Agendadas</h3>
              <div class="card-body px-5">
                <?php
                  echo $paciente->exibirConsultas($_SESSION['id']);
                ?>
              </div>
            </div><br>
        </div>
      </div><!--.row-->
    </div><!--container-->


	<?php include 'footer.php';?>
	</div>

	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../styles/bootstrap4/popper.js"></script>
	<script src="../styles/bootstrap4/bootstrap.min.js"></script>
	<script src="../plugins/easing/easing.js"></script>
	<script src="../plugins/parallax-js-master/parallax.min.js"></script>
	<script src="../js/services.js"></script>
</body>
</html>