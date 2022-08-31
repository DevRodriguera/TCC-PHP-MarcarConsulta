<?php
  session_start();

  include '../controller/validar.php';
  include '../model/Administrador.php';

  $adm = new Administrador();
  $dadosPosto = $adm->postoPegarDados($_SESSION['posto']);

  if(!isset($_SESSION['usuario']) && !isset($_SESSION['senha'])){ header('location:index.php'); }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>SRSaúde</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../css/swiper.min.css">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../mstyle.css">

</head>
<body class="single-page">
  <?php include_once "navBar.php";?>
    <div class="container">
      <div class="row">
        <div class="col-12">
        <h1>Cadastrar Paciente</h1>

          <div class="breadcrumbs">
            <ul class="d-flex flex-wrap align-items-center p-0 m-0">
              <li><a href="home.php">Home</a></li>
              <li>Cadastrar Paciente</li>
            </ul>
          </div><!-- .breadcrumbs -->

        </div>
      </div>
    </div><!-- .container -->

    <img class="header-img" src="../images/about-bg.png" alt="">
  </header><!-- .site-header -->

  <div class="container">
    <div class="row">
      <div class="col">
        <div class="med-history">
          <div class="card">
            <h5 class="card-header gradient-bg text-center py-4">Cadastro de Paciente</h5>
              <div class="card-body px-lg-5 ">

                <form class="needs-validation" action="../controller/sistema.php" method="post" novalidate>
                <input type="hidden" name="tipo" value="pacienteCadastrar">
                <div class="row">
                  <div class="col-6">

                    <div class="row">
                      <div class="col-12">

                        <label>Nome:</label>
                        <input type="text" name="nome" class="form-control" required>
                          <div class="invalid-feedback">
                            Informe o nome !
                          </div>

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
                          <div class="invalid-feedback">
                            Informe seu sexo!
                          </div>

                      </div><!--.col-6-->
                      <div class="col-6">
                  
                        <label>Data de Nascimento</label>
                        <input type="date" name="data_nasc" class="form-control" required>
                          <div class="invalid-feedback">
                            Infome sua data de nascimento!
                          </div>

                      </div><!--.col-6-->
                    </div><!--.row-->
                    <div class="row">
                      <div class="col-6">

                        <label>CPF</label>
                        <input type="text" name="cpf" class="form-control" placeholder="000.000.000-00" id="cpf" maxlength="14" onkeypress="this.value = FormataCpf(event)" onpaste="return false;" required>
                          <div class="invalid-feedback">
                            Informe o CPF !
                          </div>

                      </div><!--.col-6-->
                      <div class="col-6">

                        <label>Celular</label>
                        <input type="text" name="celular" class="form-control" placeholder="(00)00000-0000" id="celular" maxlength="15" onkeypress="this.value = FormataCelular(event)" onpaste="return false;" required>
                          <div class="invalid-feedback">
                            Informe seu telefone de contato !
                          </div>

                      </div><!--.col-6-->
                    </div><!--.row-->
                    <div class="row">
                      <div class="col-6">
                  
                        <label>E-mail</label>
                        <input type="email" name="email" class="form-control" placeholder="user@host.com" required>
                          <div class="invalid-feedback">
                            Informe o email !
                          </div>
                      </div><!--.col-6-->
                      <div class="col-6">
                  
                        <label>Senha</label>
                        <input type="password" name="senha" class="form-control" placeholder="**********" required>
                          <div class="invalid-feedback">
                            Informe a senha !
                          </div>
                      </div><!--.col-6-->
                    </div><!--.row-->

                  </div><!--.col-->
                  <div class="col-sm-6">

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
                        <?php echo $adm->selectEstado("SP");?>
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
                      <div class="col-8">

                        <label>Rua</label>
                        <input type="text" name="rua" id="rua" class="form-control" placeholder="José Rodrigues Jardim..." required>
                          <div class="invalid-feedback">
                            Informe a rua !
                          </div>

                      </div><!--.col-8-->
                      <div class="col-4">

                        <label>Número da casa</label>
                        <input type="number" name="numero_casa" class="form-control" placeholder="1000" required>
                          <div class="invalid-feedback">
                            Informe o número da casa!
                          </div>
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
                <button class="btn button gradient-bg btn-block" type="submit" value="pacienteCadastrar">Cadastrar</button>
              </form>

            </div>
          </div>
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