<footer class="footer">
  <div class="footer_container">
    <div class="container">
      <div class="row">
        
        <!-- Footer - About -->
        <div class="col-lg-4 footer_col">
          <div class="footer_about">
            <div class="footer_logo_container">
              <a href="#" class="d-flex flex-column align-items-center justify-content-center">
                <div class="logo_content">
                  <div class="logo d-flex flex-row align-items-center justify-content-center">
                    <img src="../images/logo.png">
                  </div>
                  <div class="logo_sub">SRS Saúde</div>
                </div>
              </a>
            </div>
            <div class="footer_about_text">
              <p>Informações sobre o posto</p>
            </div>
            <ul class="footer_about_list">
              <li><div class="footer_about_icon"><img src="../images/phone-call.svg" alt=""></div><span><?php echo $dadosPosto['posto_telefone']?></span></li>
              <li><div class="footer_about_icon"><img src="../images/placeholder.svg" alt=""></div><span><?php echo "Bairro : ". $dadosPosto['posto_bairro'] ." - ".$dadosPosto['posto_endereco']. " , número ". $dadosPosto['posto_numero']?></span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="copyright">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="copyright_content d-flex flex-lg-row flex-column align-items-lg-center justify-content-start">
            <div class="cr">
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with
              <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
          </div>
        </div>
      </div>
    </div>			
  </div>
</footer>