<?php
Class Administrator{

  private $conDatabase;

  public function __construct(){
  }

  public function conDatabase(){
    $this->conDatabase = mysqli_connect("localhost","root","R0driguera","dbHealthCenter");
    if(!$this->conDatabase){
      die("Connection problems");
    }
  }

  public function descDatabase(){
    $this->conDatabase->close();
  }

  public function admLogin($admEmail,$admPassword){
    $this->conDatabase();
    $sql = "SELECT * FROM Administrator WHERE admEmail = '$admEmail' AND admPassword = '$admPassword'";
    $sqlReturn = $this->conDatabase->query($sql);
    if($sqlReturn->num_rows > 0){
      while($dataAdm = mysqli_fetch_array($sqlReturn)){
        $_SESSION = $dataAdm['idAdm'];
      }
      return true;
    }else{
      return false;
    }
    $this->descDatabase();
  }

  /*INSERT INTO `dbhealthcenter`.`administrator`
  (`idAdm`,`admName`,`admLastname`,`admEmail`,`admPassword`,`admFunction`,`admSex`,`admBirth`,`admCPF`,`admPostalCode`,
  `admUF`,`admCity`,`admDistrict`,`admStreet`,`admNumber`,`admComplement`,`admPhone`)VALUES(null,"Rodrigo",
  0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);*/

  public function admRegister(){
    $this->conDatabase();
  }

  public function admShow(){
    $this->conDatabase();
    $sql = "SELECT * FROM administrator";
    $sqlReturn = $this->conDatabase->query($sql);
    $table = 0;
    $return = 0;

    if($sqlReturn->num_rows > 0){
      $table = '
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
          </tr>
        </thead>';
      while($dataAdm = $sqlReturn->fetch_array()){
        $table .= '
          <tbody>
            <tr>
              <th scope="row">'.$dataAdm['idAdm'].'</th>
              <td>'.$dataAdm['admName'].'</td>
              <td>'.$dataAdm['admEmail'].'</td>
            </tr>
          </tbody>';
      }
      $table .= '</table>';
      $this->descDatabase();
      return $table;
    }else{
      return '
      <table class="table text-center">
        <thead>
          <tr>
            <th scope="col">Usuarios</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Nenhum usuario cadastrado !</th>
          </tr>
        </tbody>
      </table>';
    }
  }

  public function admFunctionShow(){

  }

  public function selectPatient(){
    $this->conDatabase();
    $sql = "SELECT * FROM patient";
    $sqlReturn = $this->conDatabase->query($sql);
    $selectPatient = 0;

    if($sqlReturn->num_rows > 0){
      $selectPatient = '
        <div class="form-floating mb-4">
          <select class="form-select" name="" id="" aria-label="Select">';
      while($dataAdm = $sqlReturn->fetch_array()){
        $selectPatient .= '<option value="'.$dataAdm['paName'].'">'.$dataAdm['paName'].'</option>';
      }
      $selectPatient .= '
          </select>
          <label for="floatingSelect">Paciente</label>
        </div>';
      $this->descDatabase();
      return $selectPatient;
    }else{
      $this->descDatabase();
      $selectPatient ='
      <div class="form-floating mb-4">
        <select class="form-select" name="" id="" aria-label="Select" disabled>
          <option value="0">Nenhum paciente cadastrado</option>
        </select>
        <label for="floatingSelect">Paciente</label>
      </div>';
      return $selectPatient;
    }
  }

  public function selectProfessional(){
    $this->conDatabase();
    $sql = "SELECT * FROM administrator";
    $sqlReturn = $this->conDatabase->query($sql);
    $selectProfessional = 0;

    if($sqlReturn->num_rows > 0){
      $selectProfessional = '
        <div class="form-floating mb-4">
          <select class="form-select" name="" id="" aria-label="Select">';
      while($dataAdm = $sqlReturn->fetch_array()){
        $selectProfessional .= '<option value="">'.$dataAdm['admName'].'</option>';
      }
      $selectProfessional .= '
            </select>
          <label for="floatingSelect">Profissional</label>
        </div>';
      $this->descDatabase();
      return $selectProfessional;
    }else{
      $this->descDatabase();
      $selectProfessional ='
      <div class="form-floating mb-4">
        <select class="form-select" name="" id="" aria-label="Select" disabled>
          <option value="0">Nenhum profissional cadastrado</option>
        </select>
        <label for="floatingSelect">Profissional</label>
      </div>';
      return $selectProfessional;
    }
  }

}

?>