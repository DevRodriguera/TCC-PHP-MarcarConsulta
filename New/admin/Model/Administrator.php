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
        $this->conDatabase = mysqli_connect("localhost","root","","bdHealthCenter");
        if(!$this->con){
            die("Connection problems");
        }
    }

    public function descDatabase(){
        $this->conDatabase->close();
    }

    public function admLogin(){

    }

}


?>