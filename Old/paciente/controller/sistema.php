<?php
  session_start();

  include '../model/Paciente.php';

  $tipo = $_POST['tipo'];
  $paciente = new Paciente();

  switch($tipo){

    case 'logar':

      $cpf      = $_POST['cpf'];
      $senha    = $_POST['senha'];
      $posto    = $_POST['posto'];

      $verificar = $paciente->pacienteLogar($cpf,$senha,$posto);

      if ($verificar){

        $_SESSION['cpf']      = $cpf;
        $_SESSION['senha']    = $senha;
        $_SESSION['posto']    = $posto;
  
        header('Location:../view/home.php');
  
      }else{
        header('location:../view/index.php');
      }

    break;

    case 'cadastrar':

      $nome         = $_POST['nome'];
      $sexo         = $_POST['sexo'];
      $data_nasc    = $_POST['data_nasc'];
      $cpf          = $_POST['cpf'];
      $celular      = $_POST['celular'];
      $email        = $_POST['email'];
      $senha        = $_POST['senha'];
      $cep          = $_POST['cep'];  
      $estado       = $_POST['estado'];
      $cidade       = $_POST['cidade'];
      $bairro       = $_POST['bairro'];
      $rua          = $_POST['rua'];
      $numeroCasa   = $_POST['numero_casa'];
      $complemento  = $_POST['complemento'];
      $posto        = $_POST['posto'];

      $verificar = $paciente->validarCPF($cpf);

      if($verificar){
        
        $paciente->pacienteCadastrar($nome, $sexo, $data_nasc, $cpf, $celular, $email, $senha, $cep, $estado, $cidade, $bairro, $rua, $numeroCasa, $complemento, $posto);
        header('location: ../view/index.php?sucesso="sucesso"');
      }else{
        header('location: ../view/cadastrar.php?cpf="cpfErr"');
      }
    break;

    case 'alterar':

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
      $numeroCasa 	= $_POST['numero_casa'];
      $complemento 	= $_POST['complemento'];

      $msg = $paciente->pacienteAlterar($codigo , $nome , $sexo , $data_nasc , $cpf , $celular , $email , $senha , $cep , $estado , $cidade , $bairro , $rua , $numeroCasa , $complemento);

      header("location: dados.php");

    break;

    case 'agendar':

      $horaI        = $_POST['horaInicio'];
      $horaF        = $_POST['horaFim'];
      $data         = $_POST['data'];
      $profissional = $_POST['profissional'];
      $pacienteId   = $_SESSION['id'];
      $posto        = $_SESSION['posto'];

      date('H:i', strtotime($horaF));
      date('H:i', strtotime($horaI));

      if($horaI < $horaF){
        if($horaI != $horaF){
          $verificar = $paciente->verificarAgenda($data, $horaI, $horaF, $posto, $pacienteId, $profissional);
          if($verificar == true){
            header("location: ../view/agendarConsulta.php?agendado");
          }else{
            $paciente->pacienteAgendar($data, $horaI, $horaF, $posto, $pacienteId, $profissional);
            header("location: ../view/agendarConsulta.php?sucesso");
          }
        }else{
          header("location: ../view/agendarConsulta.php?igual");
        }
      }else{
        header("location: ../view/agendarConsulta.php?maior");
      }
    break;

  }
?>