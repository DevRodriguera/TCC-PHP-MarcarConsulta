<?php
Class Administrator{

  private $admId;
  private $admUsername;
  private $admPassword;
  private $admUserPrivileges;
  private $admName;
  private $admHealthCenter;
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

  public function admLogin(){
    $this->conDatabase();
    $sql = "SELECT * FROM ProfessionalAccess";
    $sqlReturn = $this->conDatabase->query($sql);

    if($sqlReturn->num_rows > 0){
      return true;
    }else{
      return false;
    }
    $this->descDatabase();
  }

  public function regAdminstrator(){
    $this->conDatabase();
  }
}

?>