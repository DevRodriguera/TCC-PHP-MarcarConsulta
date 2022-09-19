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
    $sql = "SELECT * FROM Administrator WHERE admEmail = '$admEmail' AND paPassword = '$admPassword'";
    $sqlReturn = $this->conDatabase->query($sql);
    if($sqlReturn->num_rows > 0){
      return true;
    }else{
      return false;
    }
    $this->descDatabase();
  }

  /*INSERT INTO `dbhealthcenter`.`administrator`
(`idAdm`,
`admName`,
`admLastname`,
`admEmail`,
`admPassword`,
`admFunction`,
`admSex`,
`admBirth`,
`admCPF`,
`admPostalCode`,
`admUF`,
`admCity`,
`admDistrict`,
`admStreet`,
`admNumber`,
`admComplement`,
`admPhone`)
VALUES
(null,
"Rodrigo",
0,
0,
0,
0,
0,
0,
0,
0,
0,
0,
0,
0,
0,
0,
0);
*/

  public function regAdminstrator(){
    $this->conDatabase();
  }
}

?>