<footer class="site-footer">
  <div class="footer-widgets">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
          <div class="foot-about">
            <h2><a href="#"><img src="../images/logo.jpeg" alt=""></a></h2>

            <p>O projeto foi desenvolvido com o objetivo de facilitar o agendamento
              de consultas em Unidades Básicas de Saúde, além de informar o paciente
              de seus próprios dados.
            </p>
          </div><!-- .foot-about -->
        </div><!-- .col -->

        <div class="col-12 col-md-6 col-lg-4 mt-5 mt-md-0">
          <div class="foot-contact">
            <h2>Informações do Posto</h2>

            <ul class="p-0 m-0">
              <li><span>Endereço:</span>  <?php echo utf8_encode($dadosPosto['posto_endereco'] ." , ". $dadosPosto['posto_numero'] ." <br>". $dadosPosto['posto_bairro']);?></li>
              <li><span>Telefone:</span>  <?php echo $dadosPosto['posto_telefone'];?></li>
              <li><span>Posto:</span>     <?php echo utf8_encode($dadosPosto['posto_nome']);?></li>
            </ul>
          </div>
        </div><!-- .col -->

        <div class="col-12 col-md-6 col-lg-4 mt-5 mt-md-0">
          <div class="foot-links">
            <h2>Outros Links</h2>

            <ul class="p-0 m-0">
              <li><a href="home.php">             Home</a></li>
              <li><a href="pacientesExibir.php">  Exibir Pacientes</a></li>
              <li><a href="pacienteCadastrar.php">Cadastrar Paciente</a></li>
              <li><a href="pacienteAgendar.php">  Agendamento de Consultas</a></li>
            </ul>
          </div><!-- .foot-links -->
        </div><!-- .col -->
      </div><!-- .row -->
    </div><!-- .container -->
  </div><!-- .footer-widgets -->
</footer><!-- .site-footer -->