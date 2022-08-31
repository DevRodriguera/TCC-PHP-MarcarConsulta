<header class="header trans_200">
  <div class="top_bar">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
            <div class="emergencies  d-flex flex-row align-items-center justify-content-start ml-auto">Telefone: <?php echo $dadosPosto['posto_telefone'];?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="header_container">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="header_content d-flex flex-row align-items-center justify-content-start">
            <nav class="main_nav ml-auto">
              <ul>
                <li><a href="home.php">              Home</a></li>
                <li><a href="dados.php">             Exibir Dados</a></li>
                <li><a href="agendarConsulta.php">   Agendar Consulta</a></li>
                <li><a href="../controllersair.php"> Sair</a></li>
              </ul>
            </nav>
            <div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="logo_container_outer">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="logo_container">
            <a href="#">
              <div class="logo_content d-flex flex-column align-items-start justify-content-center">
                <div class="logo_line"></div>
                <div class="logo d-flex flex-row align-items-center justify-content-center">
                <img src="../images/logo.png">
                </div>
                <div class="logo_sub">SRS Saúde</div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>	
  </div>
</header>

<div class="menu_container menu_mm">

<div class="menu_close_container">
  <div class="menu_close"></div>
</div>

<div class="menu_inner menu_mm">
  <div class="menu menu_mm">
    <ul class="menu_list menu_mm">
      <li class="menu_item menu_mm"><a href="home.php">           Home</a></li>
      <li class="menu_item menu_mm"><a href="dados.php">          Exibir Dados</a></li>
      <li class="menu_item menu_mm"><a href="agendarConsulta.php">Agendar Consulta</a></li>
      <li class="menu_item menu_mm"><a href="sair.php">           Sair</a></li>
    </ul>
  </div>
  <div class="menu_extra">
    <div class="menu_appointment"><a href="#">Telefones</a></div>
    <div class="menu_emergencies"><?php echo $dadosPosto['posto_telefone']?></div>
  </div>

</div>

</div>