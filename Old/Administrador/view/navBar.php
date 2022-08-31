<?php if(!isset($_SESSION['usuario']) && !isset($_SESSION['senha'])){ header('location:index.php'); } ?>
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