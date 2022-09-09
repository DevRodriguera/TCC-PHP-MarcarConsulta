<?php
    include '../Model/Administrator.php';

    $typeReq = $_POST['typeReq'];
    $adm = new Administrator();

    switch($typeReq){
        case 'admLogin':
            $admUsername = $_POST['admUsername'];
            $admPassword = $_POST['admPassword'];
            if($adm->admLogin($admUsername,$admPassword)){
                header('location: ../view/home.php');
            }else{
                header('location: ../view/home.php');
            }
        break;
    }


?>