<?php
	session_start();
	include '../model/Paciente.php';
	include '../controller/validar.php';
	
	$paciente = new Paciente();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastrar-se</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
	<link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
	<link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="../styles/about.css">
	<link rel="stylesheet" type="text/css" href="../styles/about_responsive.css">
</head>
<body>
	<div class="container pt-5 pb-5">
    <div class="row">
      <div class="col-12">

      <?php
        if(isset($_GET['cpf']) == 'cpfErr'){
          echo '<div class="alert alert-danger" role="alert">
                  Informe um CPF válido !
                </div>';
        }
        if(isset($_GET['err']) == 'HoraIgual'){
          echo '<div class="alert alert-danger" role="alert">
                  Ahora inicial não pode ser igual a finals
                </div>';
                echo $_GET['err'];
        }
      ?>

        <div class="card">
          <h3 class="card-header bg-primary text-white text-center py-4">Cadastre-se</h3>
            <div class="card-body px-lg-5 ">

            <form action="../controller/sistema.php" method="post">
              <input type="hidden" name="tipo" value="cadastrar">

                <div class="row">
                  <div class="col-6">

                    <div class="row">
                      <div class="col-12">

                        <label>Nome:</label>
                        <input type="text" name="nome" class="form-control" required>

                      </div><!--.col-12-->
                    </div><!--.row-->
                    <div class="row">
                      <div class="col-6">

                        <label>Sexo:</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="sexo" value="m" checked>
                          <label class="form-check-label">
                            Masculino
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="sexo" value="f">
                          <label class="form-check-label">
                            Feminino
                          </label>
                        </div>

                      </div><!--.col-6-->
                      <div class="col-6">
                  
                        <label>Data de Nascimento</label>
                        <input type="date" name="data_nasc" class="form-control" required>

                      </div><!--.col-6-->
                    </div><!--.row-->
                    <div class="row">
                      <div class="col-6">

                        <label>CPF</label>
                        <input type="text" name="cpf" class="form-control" placeholder="000.000.000-00" id="cpf" maxlength="14" onkeypress="this.value = FormataCpf(event)" onpaste="return false;" required>

                      </div><!--.col-6-->
                      <div class="col-6">

                        <label>Celular</label>
                        <input type="text" name="celular" class="form-control" placeholder="(00)00000-0000" id="celular" maxlength="15" onkeypress="this.value = FormataCelular(event)" onpaste="return false;" required>

                      </div><!--.col-6-->
                    </div><!--.row-->
                    <div class="row">
                      <div class="col-6">
                  
                        <label>E-mail</label>
                        <input type="email" name="email" class="form-control" placeholder="user@host.com" required>
                      </div><!--.col-6-->
                      <div class="col-6">
                  
                        <label>Senha</label>
                        <input type="password" name="senha" class="form-control" placeholder="**********" required>

                      </div><!--.col-6-->
                    </div><!--.row-->

                  </div><!--.col-6-->
                  <div class="col-6">

                    <div class="row">
                      <div class="col-6">
                        <label>CEP:</label>
                        <input type="text" name="cep" class="form-control" placeholder="12345-67" id="cep" maxlength="9" onkeypress="this.value = FormataCep(event)" onpaste="return false;" required>
                          <div class="invalid-feedback">
                            Informe o CEP !
                          </div>
                      </div><!--.col-6-->
                      <div class="col-6">

                        <label>Estado</label>
                        <?php echo $paciente->selectEstado("SP");?>
                          <div class="invalid-feedback">
                            Infome sua data de nascimento!
                          </div>

                      </div><!--.col-6-->
                    </div><!--.row-->
                    <div class="row">
                      <div class="col-6">

                        <label>Cidade</label>
                        <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Itapeva, Sorocaba..." required>
                          <div class="invalid-feedback">
                            Informe a cidade !
                          </div>

                      </div><!--.col-6-->
                      <div class="col-6">

                        <label>Bairro</label>
                        <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Jd. Brasil, América..." required>
                          <div class="invalid-feedback">
                            Informe o bairro !
                          </div>

                      </div><!--.col-6-->
                    </div><!--.row-->
                    <div class="row">
                      <div class="col-12">

                        <label>Rua</label>
                        <input type="text" name="rua" id="rua" class="form-control" placeholder="José Rodrigues Jardim..." required>
                          <div class="invalid-feedback">
                            Informe a rua !
                          </div>

                      </div><!--.col-12-->
                    </div><!--.row-->
                    <div class="row">
                      <div class="col-6">

                        <label>Número da casa</label>
                        <input type="number" name="numero_casa" class="form-control" placeholder="1000" required>
                          <div class="invalid-feedback">
                            Informe o número da casa!
                          </div>

                      </div><!--.col-6-->
                      <div class="col-6">

                        <label>Posto de saúde</label>
                        <?php echo $paciente->selectPosto();?>
                      </div>
                    </div>
                  
                    <div class="row">
                      <div class="col-12">
                        <label>Complemento</label>
                        <input type="text" name="complemento" class="form-control" placeholder="2º andar...">
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              </div><!--.row-->
              <div class="row">
                <div class="col-6">
                  <button class="btn btn-block bg-success text-white" type="submit" value="cadastrar">Cadastrar</button>
                </div>
                <div class="col-6">
                  <a href="index.php" class="btn btn-block btn-danger " role="button" aria-pressed="true">Cancelar</a>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

    <footer class="footer">
      <div class="footer_container">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 footer_col">
              <div class="footer_about">
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="styles/bootstrap4/popper.js"></script>
  <script src="styles/bootstrap4/bootstrap.min.js"></script>
  <script src="plugins/greensock/TweenMax.min.js"></script>
  <script src="plugins/greensock/TimelineMax.min.js"></script>
  <script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
  <script src="plugins/greensock/animation.gsap.min.js"></script>
  <script src="plugins/greensock/ScrollToPlugin.min.js"></script>
  <script src="plugins/progressbar/progressbar.min.js"></script>
  <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
  <script src="plugins/easing/easing.js"></script>
  <script src="plugins/parallax-js-master/parallax.min.js"></script>
  <script src="js/about.js"></script>
</body>
</html>