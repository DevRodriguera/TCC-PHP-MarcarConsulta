<?php
  session_start();

  include '../model/Administrador.php';
  $typeReq = $_POST['typeReq'];

  $adm = new Administrador();

  switch($typeReq){

    case 'pacienteCadastrar':

      $nome 			  = $_POST['nome'];
      $sexo 			  = $_POST['sexo'];
      $data_nasc 	  = $_POST['data_nasc'];
      $cpf 			    = $_POST['cpf'];	
      $celular 		  = $_POST['celular'];
      $email 			  = $_POST['email'];
      $senha 			  = $_POST['senha']; 
      $cep 			    = $_POST['cep'];	
      $estado 		  = $_POST['estado'];
      $cidade			  = $_POST['cidade'];
      $bairro		 	  = $_POST['bairro'];
      $rua 			    = $_POST['rua'];
      $numeroCasa 	= $_POST['numero_casa'];
      $complemento 	= $_POST['complemento'];
      $posto        = $_SESSION['posto'];
    
      $adm->pacienteCadastrar($nome, $sexo, $data_nasc, $cpf, $celular, $email, $senha, $cep, $estado, $cidade, $bairro, $rua, $numeroCasa, $complemento, $_SESSION['posto']);

      header('location: ../view/pacienteExibir.php');
    
    break;

    case 'PacienteAlterar':

      $codigo       = $_POST['codigo'];
      $nome 			  = $_POST['nome'];
  		$sexo 			  = $_POST['sexo'];
  		$data_nasc 	  = $_POST['data_nasc'];
      $cpf          = $_POST['cpf'];  
  		$celular 		  = $_POST['celular'];
  		$email 			  = $_POST['email'];
  		$senha 			  = $_POST['senha']; 
  		$cep 			    = $_POST['cep'];	
  		$estado 		  = $_POST['estado'];
  		$cidade			  = $_POST['cidade'];
  		$bairro		 	  = $_POST['bairro'];
  		$rua 			    = $_POST['rua'];
  		$numeroCasa 	= $_POST['numeroCasa'];
      $complemento 	= $_POST['complemento'];

      $msg = $adm->alterar($codigo , $nome , $sexo , $data_nasc , $cpf , $celular , $email , $senha , $cep , $estado , $cidade , $bairro , $rua , $numeroCasa , $complemento)?"Alteração realizada com sucesso!":"Erro ao alterar";

      header("location: ../view/pacienteExibir.php");
    break;
    
    case 'AdministradorLogar':

      $usuario  = $_POST['usuario'];
      $senha    = $_POST['senha'];
      $posto    = $_POST['posto'];

      $verificarLogin = $adm->administradorLogar($usuario,$senha,$posto);

      if ($verificarLogin){

        session_start();
        $_SESSION['usuario']  = $usuario;
        $_SESSION['senha']    = $senha;
        $_SESSION['posto']    = $posto;
        header('Location: ../view/home.php');

      }else{
        header('location:index.php');
      }
    break;


  }
?>