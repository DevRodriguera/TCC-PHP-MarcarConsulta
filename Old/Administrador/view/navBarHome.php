<?php
if(!isset($_SESSION['usuario']) && !isset($_SESSION['senha'])){ header('location:index.php'); }
?>
<header class="site-header">
  <div class="nav-bar">
    <div class="container">
      <div class="row">
        <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
          <div class="site-branding d-flex align-items-center">
            <a class="d-block" href="home.php" rel="home"><img class="d-block" src="../images/logo.png" alt="logo"></a>
            </div><!-- .site-branding -->

              <nav class="site-navigation d-flex justify-content-end align-items-center">
                <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-items-center">
                  <li class="current-menu-item"><a href="home.php">  Home</a></li>
                  <li><a href="pacienteExibir.php">                  Exibir Pacientes</a></li>
                  <li><a href="pacienteCadastrar.php">               Cadastrar Paciente</a></li>
                  <li><a href="pacienteAgendar.php">                 Agendar Consultas</a></li>
                  <li><a href="participantes.php">                   Fechar</a></li>
                  <li><a href="../controller/sair.php">              Sair</a></li>
                </ul>
              </nav><!-- .site-navigation -->

            <div class="hamburger-menu d-lg-none">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
          </div><!-- .hamburger-menu -->
        </div><!-- .col -->
      </div><!-- .row -->
    </div><!-- .container -->
  </div><!-- .nav-bar -->

  <div class="swiper-container hero-slider">
    <div class="swiper-wrapper">
      <div class="swiper-slide hero-content-wrap" style="background-image: url('../images/hero.jpg')">
        <div class="hero-content-overlay position-absolute w-100 h-100">
          <div class="container h-100">
            <div class="row h-100">
              <div class="col-12 col-lg-6 d-flex flex-column justify-content-center align-items-start">
                <header class="entry-header">
                  <h1>SRS Saúde</h1>
                </header><!-- .entry-header -->

                <div class="entry-content mt-4">
                  <p>Sistema de Agendamento de consultas em postos de saúde de Itapeva-SP.</p>
                </div><!-- .entry-content -->
              </div><!-- .col -->
            </div><!-- .row -->
          </div><!-- .container -->
        </div><!-- .hero-content-overlay -->
      </div><!-- .hero-content-wrap -->

  <div class="swiper-slide hero-content-wrap" style="background-image: url('../images/hero.jpg')">
    <div class="hero-content-overlay position-absolute w-100 h-100">
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-12 col-lg-6 d-flex flex-column justify-content-center align-items-start">
            
            <header class="entry-header">
              <h1>SRS Saúde</h1>
            </header><!-- .entry-header -->

            <div class="entry-content mt-4">
              <p>O SRS saúde é um site onde visa a melhoria da 
                  acessibilidade de vocês usuários com os postos de 
                  saúde. Através do nosso site é possível realizar seu 
                  login, seu cadastro e também agendar a sua consulta,
                  no dia e hora que vc desejar, você pode acessar o site em 
                  qualquer aparelho digital ou desktop.</p>
            </div><!-- .entry-content -->

          </div><!-- .col -->
        </div><!-- .row -->
      </div><!-- .container -->
    </div><!-- .hero-content-overlay -->
  </div><!-- .hero-content-wrap -->

  <div class="swiper-slide hero-content-wrap" style="background-image: url('../images/hero.jpg')">
    <div class="hero-content-overlay position-absolute w-100 h-100">
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-12 col-lg-6 d-flex flex-column justify-content-center align-items-start">
            
            <header class="entry-header">
                <h1>SRS Saúde</h1>
            </header><!-- .entry-header -->

              <div class="entry-content mt-4">
                  <p>Para efetuar o agendamento de sua consulta faça 
                      seu cadastro e em seguida o login para ter acesso 
                      aos seus dados no sistema, caso queira fazer alguma 
                      alteração clique em "ALTERAR DADOS", ou então agende 
                      sua consulta e clique em "AGENDAR", após isso poderá 
                      sair do sistema clicando no botão "SAIR".</p>
              </div><!-- .entry-content -->
            </div><!-- .col -->
          </div><!-- .row -->
        </div><!-- .container -->
      </div><!-- .hero-content-overlay -->
    </div><!-- .hero-content-wrap -->
  </div><!-- .swiper-wrapper -->

  <div class="pagination-wrap position-absolute w-100">
    <div class="swiper-pagination d-flex flex-row flex-md-column"></div>
    </div><!-- .pagination-wrap -->
  </div><!-- .hero-slider -->
</header><!-- .site-header -->