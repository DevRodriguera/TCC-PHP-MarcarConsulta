<?php
    include '../Model/Administrator.php';

    $typeReq = $_POST['typeReq'];
    $adm = new Administrator();

    switch($typeReq){
        case 'admLogin':
            $admEmail = $_POST['admEmail'];
            $admPassword = $_POST['admPassword'];
            if($adm->admLogin($admEmail,$admPassword)){
                header('location: ../view/home.php');
            }else{
                header('location: ../view/index.php?errData="Dados incorretos!"');
            }
        break;
    }


?>