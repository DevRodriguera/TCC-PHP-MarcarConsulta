<?php
  session_start();
  if(!isset($_SESSION['cpf']) && !isset($_SESSION['senha'])){header('location:index.php');}

  include '../model/Paciente.php';
  $paciente = new Paciente();

  $dadosPaciente     = $paciente->exibirDadosPaciente($_SESSION['cpf']);
  $dadosPosto        = $paciente->exibirDadosPosto($_SESSION['posto']);
  $dadosProfissional = $paciente->exibirDadosProfissional($_SESSION['posto']);
  $_SESSION['id']    = $dadosPaciente['pac_id'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>SRS Saúde</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
  <link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
  <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
  <link rel="stylesheet" type="text/css" href="../styles/main_styles.css">
  <link rel="stylesheet" type="text/css" href="../styles/responsive.css">
</head>
<body>
  <div class="super_container">
    <?php include 'header.php';?>
    	<div class="home">
		    <div class="home_slider_container">
          <div class="owl-carousel owl-theme home_slider">
				    <div class="owl-item">
              <div class="home_slider_background" style="background-image:url(../images/home_background_1.jpg)"></div>
					    <div class="home_content">
						    <div class="container">
							    <div class="row">
								    <div class="col">
									    <div class="home_content_inner">
                        <div class="home_title"><h1>SRS Saúde</h1></div>
										    <div class="home_text">
											    <p>Sistema de Agendamento de consultas em postos de  <br> saúde em Itapeva-SP.</p>
										    </div>
									    </div>
								    </div>
							    </div>
                </div>  
              </div>
				    </div>
			    </div>
			    <div class="home_slider_progress"></div>
        </div>
      </div>

	<div class="boxes">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-4 box_col">
					<div class="box working_hours">
						<div class="box_icon d-flex flex-column align-items-start justify-content-center"><div style="width:29px; height:29px;"><img src="../../images/alarm-clock.svg" alt=""></div></div>
						<div class="box_title">Horário de Funcionamento</div>
						<div class="working_hours_list">
							<ul>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div>Segunda – Quinta - Feira</div>
									<div class="ml-auto">8:00 – 18:00</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div>Sexta - Feira</div>
									<div class="ml-auto">9.30 – 17.00</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div>Fim de semana e Feriados</div>
									<div class="ml-auto">Fechado</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Box -->
				<div class="col-lg-4 box_col">
					<div class="box box_emergency">
						<div class="box_icon d-flex flex-column align-items-start justify-content-center"><div style="width: 29px; height:29px;"><img src="../images/phone-call.svg" alt=""></div></div>
						<div class="box_title">Telefone</div>
						<div class="box_phone"><?php echo $dadosPosto['posto_telefone']?></div>
					</div>
				</div>

				<!-- Box -->
				<div class="col-lg-4 box_col">
					<div class="box box_appointments">
						<div class="box_icon d-flex flex-column align-items-start justify-content-center"><div style="width: 37px; height:37px; margin-left:-4px;"><img src="../images/bell.svg" alt=""></div></div>
						<div class="box_title">Sobre nós</div>
						<div class="box_text">O SRS saúde é um site onde visa a melhoria da acessibilidade de vocês usuários com os postos de saúde. Através do site é possível agendar a sua consulta, no dia e hora que vc desejar, e com os profissionais que deseja passar.</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- About -->

	<div class="about">
		<div class="container">
			<div class="row row-lg-eq-height">
				
				<!-- About Content -->
				<div class="col-lg-7">
					<div class="about_content">
						<div class="section_title"><h2>Conheça um pouco mais sobre o site!!</h2></div>
						<div class="about_text">
							<p>Para ter acesso a essa área foi necessário ter feito o login no respectivo posto em que pertence, 
              agora você poderá agendar suas consultas no dia e hora que você desejar e nos dias que houver disponibilidade, 
              com o(a) médico(a), com o(a) enfermeiro(a) ou com o(a) dentista, ver as informações referente ao seu posto, 
              visualizar suas consultas agendadas, conferir os seus dados cadastrais e até mesmo alterá-los. 
              Tudo isso nesta mesma plataforma, sem mesmo ter que sair de casa ou do trabalho para isso fazer.</p>
            </div>
						<div class="button about_button">
							<a href="#">Voltar ao início</a>
						</div>
					</div>
				</div>

				<!-- About Image -->
				<div class="col-lg-5">
					<div class="about_image"><img src="../images/about.png" alt=""></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Departments -->

	<div class="departments">
		<div class="departments_background parallax-window" data-parallax="scroll" data-image-src="../images/departments.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title section_title_light"><h2>Nossos Departamentos Médicos</h2></div>
				</div>
			</div>
			<div class="row departments_row row-md-eq-height">
				
				<!-- Department -->
				<div class="col-lg-3 col-md-6 dept_col">
					<div class="dept">
						<div class="dept_image"><img src="../images/dept_1.jpg" alt=""></div>
						<div class="dept_content text-center">
							<div class="dept_title"><?php echo $dadosProfissional['pro_funcao']?></div>
							<div class="dept_subtitle"><?php echo $dadosProfissional['pro_nome']?></div>
						</div>
					</div>
				</div>

				<!-- Department -->
				<div class="col-lg-3 col-md-6 dept_col">
					<div class="dept">
						<div class="dept_image"><img src="../images/dept_2.jpg" alt=""></div>
						<div class="dept_content text-center">
							<div class="dept_title"><?php echo $dadosProfissional['pro_funcao']?></div>
							<div class="dept_subtitle"><?php echo $dadosProfissional['pro_nome']?></div>
						</div>
					</div>
				</div>

				<!-- Department -->
				<div class="col-lg-3 col-md-6 dept_col">
					<div class="dept">
						<div class="dept_image"><img src="../images/dept_3.jpg" alt=""></div>
						<div class="dept_content text-center">
							<div class="dept_title"><?php echo $dadosProfissional['pro_funcao']?></div>
							<div class="dept_subtitle"><?php echo $dadosProfissional['pro_nome']?></div>
						</div>   
					</div>
				</div>

				<div class="col-lg-3 col-md-6 dept_col">
					<div class="dept">
						<div class="dept_text">
							<p>Esses são os profissionais disponíveis no posto de saúde, na qual você pode agendar sua consulta com eles.
              <br><br>Clique agora no botão abaixo e agende já!!</p>
            </div>
						<div class="button dept_button"><a href="#">Agendar Consulta</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Call to action -->
  <?php include 'footer.php';?>
</div>

<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../styles/bootstrap4/popper.js"></script>
<script src="../styles/bootstrap4/bootstrap.min.js"></script>
<script src="../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../plugins/easing/easing.js"></script>
<script src="../plugins/parallax-js-master/parallax.min.js"></script>
<script src="../js/custom.js"></script>
</body>
</html>