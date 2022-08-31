<?php
  session_start();

  include "../model/Paciente.php";
  include "../controller/validar.php";
  $paciente = new Paciente();

  if(isset($_SESSION['cpf']) && isset($_SESSION['senha'])){
      header('location:home.php'); 
  }

?>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" id="bootstrap-css">
  <link rel="stylesheet" href="../styles/index.css" id="bootstrap-css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</body>
<html>
  <div class="container register">
    <div class="row">
      <div class="col-3 register-left">
        <img src="../images/logo.png" alt=""/>
        <h3>SRS Saúde</h3>
        <p>Faça seu login e tenha acesso a plataforma!</p>
      </div><!--.col-3-->
      <div class="col-9 register-right">
        <h3 class="register-heading">Login</h3>
          <div class="row d-flex justify-content-center">

            <form action="../controller/sistema.php" method="post">
            <input type="hidden" name="tipo" value="logar">

              <div class="col-sm-12">
                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>                  
                  </div>
                  <input type="text" name="cpf" class="form-control" placeholder="Digite o CPF" maxlength="14" onkeypress="this.value = FormataCpf(event)" required>
                </div>

                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                  </div>
                  <input type="password" name="senha" class="form-control" placeholder="Digite a senha" required>
                </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-home"></i></span>
                      </div>
                      <?php echo $paciente->selectPosto();?>
                    </div>
                      <p><a href="cadastrar.php">Não possuo cadastro!</a></p>
                      <button class="btn gradient-bg btn-block" type="submit" value="logar">Entrar</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</html>