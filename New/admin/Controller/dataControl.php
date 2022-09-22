<?php
    include '../Model/Administrator.php';

    $typeReq = $_POST['typeReq'];
    $adm = new Administrator();

    switch($typeReq){
        case 'admLogin':
            $admEmail = $_POST['admEmail'];
            $admPassword = $_POST['admPassword'];
            if($admEmail != null && $admPassword != null){
                if($adm->admLogin($admEmail,$admPassword)){
                    header('location: ../view/home.php');
                }else{
                    header('Location: ../view/index.php?errData');
                }
            }else{
                header('location: ../view/index.php?err');
            }
        break;
    }
?>