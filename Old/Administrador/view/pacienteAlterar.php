<?php
  session_start();

  include '../controller/validar.php';
  include '../model/Administrador.php';

  $id = $_GET['id'];

  $adm = new Administrador();
  $dadosPosto = $adm->postoPegarDados($_SESSION['posto']);
  $dados = $adm->pacientePegarDados($id);

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
  <?php include 'navBar.php';?>
    <div class="container">
      <div class="row">
        <div class="col-12">
        <h1>Alterar Dados de <br></h1><h2><?php echo $dados['pac_nome'];?></h2>

          <div class="breadcrumbs">
            <ul class="d-flex flex-wrap align-items-center p-0 m-0">
              <li><a href="home.php">Home</a></li>
              <li>Alterar Dados</li>
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
            <h5 class="card-header gradient-bg text-center py-4">Dados do Paciente: <?php echo $dados['pac_nome'];?></h5>
              <div class="card-body px-lg-5 ">

              <form class="needs-validation" action="../controller/sistema.php" method="post" novalidate>
                <input type="hidden" name="tipo" value="pacienteAlterar">

                  <div class="row">
                    <div class="col">

                      <label for="validationCustom01">ID:</label>
                      <input type="text" value="<?php echo $dados['pac_id']; ?>" name="codigo" class="form-control" readonly required>

                      <label for="validationCustom01">Nome:</label>
                      <input type="text" value="<?php echo utf8_encode($dados['pac_nome']); ?>" name="nome" class="form-control" required>
                        <div class="invalid-feedback">
                          Informe o nome !
                        </div>

                      <label for="validationCustom01">Sexo:</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="sexo" id="exampleRadios1" value="m" checked>
                        <label class="form-check-label" for="exampleRadios1">
                          Masculino
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="sexo" id="exampleRadios2" value="f">
                        <label class="form-check-label" for="exampleRadios2">
                          Feminino
                        </label>
                      </div>
                        <div class="invalid-feedback">
                          Informe seu sexo!
                        </div>
                    
                      <label for="validationCustom03">Data de Nascimento</label>
                      <input type="date" name="data_nasc" class="form-control"  value="<?php echo $dados['pac_data_nasc']; ?>" id="validationCustom03" required>
                        <div class="invalid-feedback">
                          Infome sua data de nascimento!
                        </div>

                      <label for="validationCustom01">CPF</label>
                      <input type="text" name="cpf" value="<?php echo $dados['pac_cpf']; ?>"  class="form-control" placeholder="000.000.000-00" required>
                        <div class="invalid-feedback">
                          Informe o CPF !
                        </div>
                    
                      <label for="validationCustom01">Celular</label>
                      <input type="text" name="celular" value="<?php echo $dados['pac_celular']; ?>" class="form-control" placeholder="(00)00000-0000" required>
                        <div class="invalid-feedback">
                          Informe seu telefone de contato !
                        </div>
                    
                      <label for="validationCustom01">E-mail</label>
                      <input type="email" name="email" value="<?php echo $dados['pac_email']; ?>" class="form-control" placeholder="user@host.com" required>
                        <div class="invalid-feedback">
                          Informe o email !
                        </div>
                    
                      <label for="validationCustom01">Senha</label>
                      <input type="password" name="senha" value="<?php echo $dados['pac_senha']; ?>" class="form-control" placeholder="**********" required>
                        <div class="invalid-feedback">
                          Informe a senha !
                        </div>
                  </div>
                  <div class="col">
                      <label for="validationCustom01">CEP:</label>
                      <input type="text" name="cep" value="<?php echo $dados['pac_cep']; ?>" class="form-control" placeholder="12345-67" required>
                        <div class="invalid-feedback">
                          Informe o CEP !
                        </div>


                      <label for="validationCustom03">Estado</label>
                      <?php echo $adm->selectEstado($dados['pac_estado']);?>
                        <div class="invalid-feedback">
                          Infome sua data de nascimento!
                        </div>
                    
                      <label for="validationCustom01">Cidade</label>
                      <input type="text" name="cidade" value="<?php echo $dados['pac_cidade']; ?>" class="form-control" placeholder="Itapeva, Sorocaba..." required>
                        <div class="invalid-feedback">
                          Informe a cidade !
                        </div>
                    
                      <label for="validationCustom01">Bairro</label>
                      <input type="text" name="bairro" alue="<?php echo $dados['pac_bairro']; ?>" class="form-control" placeholder="Jd. Brasil, América..." required>
                        <div class="invalid-feedback">
                          Informe o bairro !
                        </div>

                      <label for="validationCustom01">Rua</label>
                      <input type="text" name="rua" value="<?php echo utf8_encode($dados['pac_rua']); ?>"  class="form-control" placeholder="José Rodrigues Jardim..." required>
                        <div class="invalid-feedback">
                          Informe a rua !
                        </div>

                      <label for="validationCustom01">Número da casa</label>
                      <input type="number" name="numero_casa" value="<?php echo $dados['pac_numeroCasa']; ?>" class="form-control" placeholder="1000" required>
                        <div class="invalid-feedback">
                          Informe o número da casa!
                        </div>
                  
                      <label for="validationCustom01">Complemento</label>
                      <input type="text" name="complemento"  value="<?php echo $dados['pac_complemento']; ?>" class="form-control" placeholder="2º andar...">
                    </div>
                  </div>
                <button class="btn button gradient-bg btn-block" type="submit" value="pacienteCadastrar">Alterar Dados</button>
                <button class="btn button bg-danger text-white  btn-block">Cancelar</button>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  <?php include 'footer.php';?>
</body>