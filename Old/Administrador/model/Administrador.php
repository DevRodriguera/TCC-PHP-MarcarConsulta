<?php
Class Administrador{

  private $usuario;
  private $senha;
  private $posto;
  private $con;
  private $nome;

  public function __construct(){
  }

	public function conectar(){
		$this->con = mysqli_connect("localhost","root","","bd_tcc");
		if (!$this->con){
			//Caso ocorra um erro, exibe uma mensagem com o erro
			die("Problemas com a conexão");
		}
  }
    
  public function desconectar(){
		$this->con->close();
  }

  public function pacienteCadastrar($nome , $sexo , $data_nasc , $cpf , $celular , $email , $senha , $cep , $estado , $cidade , $bairro , $rua , $numeroCasa , $complemento , $posto){

    $this->conectar();

    $sql = "INSERT INTO paciente VALUES(NULL , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? )";
    
    $stm = $this->con->prepare($sql);
    
    $stm->bind_param("ssssssssssssisi",$nome, $sexo, $data_nasc, $cpf, $celular, $email, $senha, $cep, $estado, $cidade, $bairro, $rua, $numeroCasa, $complemento,$posto);
    $stm->execute();
    $stm->close();
    
    $this->desconectar();
  }

  public function pacienteAlterar($codigo , $nome , $sexo , $data_nasc , $cpf , $celular , $email , $senha , $cep , $estado , $cidade , $bairro , $rua , $numeroCasa , $complemento){
    
    $retorno = null;
    
    $this->conectar();

    $stm=$this->con->prepare("UPDATE paciente SET nome = ?, sexo = ?, data_nasc = ?, cpf = ?, celular = ?, email = ?, senha = ?, cep = ?, estado = ?, cidade = ?, bairro = ?, rua = ?, numeroCasa = ?, complemento = ? WHERE id = $codigo");

    $stm->bind_param("ssssssssssssis" , $nome , $sexo , $data_nasc , $cpf , $celular , $email , $senha , $cep , $estado , $cidade , $bairro , $rua , $numeroCasa , $complemento);

    $stm->execute();

    $stm->close();

    $this->desconectar();

  }

  public function pacienteExibirDados($posto){

    $this->conectar();

    $sql = "SELECT * FROM paciente WHERE FK_posto = $posto";

    $dados = $this->con->query($sql);

    $retorno = null;

    if ($dados->num_rows > 0){
      $tabela = '<table class="table table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
                  <tr>
                    <thead class="gradient-bg">
                      <th scope="col">Nome</th>
                      <th scope="col">CPF</th>
                      <th scope="col">Nº Celular</th>
                      <th scope="col">CEP</th>
                      <th scope="col">Alterar dados</th>
                    </thead>
                  <tr/>';
      while($adm = $dados->fetch_object()){
        $tabela .="<tr class='table-light'>
                    <td>$adm->pac_nome</td>
                    <td>$adm->pac_cpf</td>
                    <td>$adm->pac_celular</td>
                    <td>$adm->pac_cep</td>
                    <td><a href='PacienteAlterar.php?id=$adm->pac_id'>Alterar</a></td>
                  </tr>";
      }
      $tabela .='</table>';

      $dados->close();

      $retorno = $tabela;
    }else{
      $retorno='<table class="table table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl" >
                  <tr>
                    <thead class="gradient-bg">
                      <th scope="col">Pacientes Cadastrados</th>
                    </thead>
                  </tr>
                  <tr class="table-light">
                    <td><h4  class="text-danger">Não há pacientes cadastrados</h4></td>
                  </tr>
                </table>';
    }

    $this->desconectar();

    return $retorno;
  }

  public function pacientePegarDados($id){

    $retorno = null;

		$this->conectar();

		$sql = $this->con->query("SELECT * FROM paciente WHERE pac_id = $id");

    $retorno = mysqli_fetch_assoc($sql);
    
    $this->desconectar();

		return $retorno;
  }

  public function agendarConsulta($data, $horaI, $horaF, $posto, $paciente,$profissional){

			$this->conectar();

      $sql = "INSERT INTO paciente VALUES(NULL , ? , ? , ? , ? , ? , ?)";
      
      $stm = $this->con->prepare($sql);
      
			$stm->bind_param("ssssss", $data, $horaI, $horaF, $posto, $paciente,$profissional);
			$stm->execute();
      $stm->close();
      
			$this->desconectar();
  }

  public function AdministradorLogar($usuario,$senha,$posto){

    $this->conectar();

    $sql = "SELECT * FROM administradorLogin
            WHERE adm_usuario = '$usuario' AND adm_senha = '$senha' AND FK_posto = '$posto'";

    $retorno = $this->con->query($sql);

      if ($retorno->num_rows > 0) {
        return true;
      }
      return false;
  }


  public function postoPegarDados($id){

    $retorno = null;

		$this->conectar();

		$sql = $this->con->query("SELECT * FROM posto WHERE posto_id = $id");

    $retorno = mysqli_fetch_assoc($sql);
    
    $this->desconectar();

		return $retorno;
  }


  public function selectPaciente($posto){
    
    $this->conectar();

    $sql = "SELECT pac_id AS id , pac_nome AS nome
            FROM paciente 
            WHERE FK_posto = '$posto'";

    $dados = $this->con->query($sql);

    $options = null;

    if($dados->num_rows > 0){

      $options = '<select name="pacientes" class="form-control">';
      
      $options .= '<option selected disabled>Selecione</option>';

      while($paciente = $dados->fetch_object())
      {
        $options .= "<option value=".$paciente->id."> ".$paciente->nome."</option>";
      }
      
      $options .= '</select>';
    
    }else{
      $options = '
      <select class="form-control">
        <option selected disabled>Não há pacientes</option>
      </select>
      ';
    }
    return $options;
  }

  function selectPosto(){

		$this->conectar();
		
    $sql = "SELECT posto_id AS id, posto_nome AS nome
            FROM posto";

    $dados = $this->con->query($sql);

    $options = null;

    if($dados->num_rows > 0){

      $options = '<select name="posto" class="form-control">';
      
      $options .= '<option>Selecione</option>';

			while($posto = $dados->fetch_object())
			{
        $options .= "<option value=".$posto->id."> ".$posto->nome."</option>";
      }
      
      $options .= '</select>';
    }else{
      $options = '
      <select class="form-control">
        <option selected disabled>Não há postos</option>
      </select>
      ';
    }
    return $options;
  }

  function selectProfissional($posto){

		$this->conectar();
		
    $sql = "SELECT pro_id AS id, pro_nome AS nome
            FROM profissional WHERE FK_posto = $posto";

    $dados = $this->con->query($sql);

    $options = null;

    if($dados->num_rows > 0){

      $options = '<select name="profissional" class="form-control" id="validationCustom01" required">
                    <option selected disabled>Selecione o profissional</option>';

			while($profissional = $dados->fetch_object())
			{
        $options .= "<option value=".$profissional->id."> ".$profissional->nome."</option>";
      }
      
      $options .= '</select>';
    
    }else{
      $options = '
      <select class="form-control" id="validationCustom01" required">
        <option selected disabled>Não há profissionais</option>
      </select>
      ';
    }
    
    return $options;
  }

  function selectEstado($myUF = ""){
    $options = ' <select id="uf" name="estado" class="form-control">
    <option value="">Selecione';

      $estadosBrasileiros = array(
                      'AC'=>'Acre',
                      'AL'=>'Alagoas',
                      'AP'=>'Amapá',
                      'AM'=>'Amazonas',
                      'BA'=>'Bahia',
                      'CE'=>'Ceará',
                      'DF'=>'Distrito Federal',
                      'ES'=>'Espírito Santo',
                      'GO'=>'Goiás',
                      'MA'=>'Maranhão',
                      'MT'=>'Mato Grosso',
                      'MS'=>'Mato Grosso do Sul',
                      'MG'=>'Minas Gerais',
                      'PA'=>'Pará',
                      'PB'=>'Paraíba',
                      'PR'=>'Paraná',
                      'PE'=>'Pernambuco',
                      'PI'=>'Piauí',
                      'RJ'=>'Rio de Janeiro',
                      'RN'=>'Rio Grande do Norte',
                      'RS'=>'Rio Grande do Sul',
                      'RO'=>'Rondônia',
                      'RR'=>'Roraima',
                      'SC'=>'Santa Catarina',
                      'SP'=>'São Paulo',
                      'SE'=>'Sergipe',
                      'TO'=>'Tocantins'
                    );
    foreach ($estadosBrasileiros as $uf => $estado) {
      $selected  = $uf == $myUF ?"selected":"";
      $options  .= "<option $selected value=\"$uf\">$estado</option>";
    }

	  $options .= "</select>"; 
	
	  return $options;
  }


  function agendamentosDia($posto){

    $this->conectar();
  
    $sql = "SELECT * FROM agendamento
            WHERE FK_posto = $posto
            AND DAY(age_data) = DAY(CURDATE()) AND MONTH(age_data) = MONTH(CURDATE()) AND YEAR(age_data) = YEAR(CURDATE())";

    $dados = $this->con->query($sql);

    $retorno = null;

    if ($dados->num_rows > 0){
      $tabela = '<br><table class="table table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl" >
                  <tr>
                    <thead class="gradient-bg">
                      <th scope="col">Consultas Agendadas Hoje</th>
                    </thead>
                  <tr/>';
    while($adm = $dados->fetch_array()){
      $tabela .='<tr class="table-light">
                  <td>Profissional : ' .$adm['FK_profissional']. '</td>
                  <td>Data: '         .date('d/m/Y', strtotime($adm['age_data'])).'</td>
                  <td>Hora: '         .$adm['age_horaInicio'].'</td>
                </tr>';
    }
    $tabela .="</table>";

    $dados->close();

    $retorno = $tabela;
    }
    else
    {
      $retorno='<br><table class="table table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl" >
                  <tr>
                    <thead class="gradient-bg">
                      <th scope="col">Consultas Agendadas Hoje</th>
                    </thead>
                  </tr>
                  <tr class="table-light">
                    <td><h4 class="text-danger">Não há consultas agendadas para hoje</h4></td>
                  </tr>
                </table>';
    }
    $this->desconectar();
    
    return $retorno;
  }

  function agendamentosMes($posto){

    $this->conectar();
  
    $sql = "SELECT * FROM agendamento
            WHERE FK_posto = $posto
            AND MONTH(age_data) = MONTH(CURDATE()) AND YEAR(age_data) = YEAR(CURDATE())";

    $dados = $this->con->query($sql);

    $retorno = null;

    if ($dados->num_rows > 0){
      $tabela = '<br><table class="table table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl" >
                  <tr>
                    <thead class="gradient-bg">
                      <th style="width: 300px;">Consultas Agendadas Neste Mês</th>
                    </thead>
                  <tr/>';
    while($adm = $dados->fetch_array()){
      $tabela .='<tr class="table-light">
                  <td>Profissional : ' .$adm['FK_profissional']. '</td>
                  <td>Data: '         .date('d/m/Y', strtotime($adm['age_data'])).'</td>
                  <td>Hora: '         .$adm['age_horaInicio'].'</td>
                </tr>';
    }
    $tabela .="</table>";

    $dados->close();

    $retorno = $tabela;
    }
    else
    {
      $retorno='<br><table class="table table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl" >
                  <tr>
                    <thead class="gradient-bg">
                    <th scope="col">Consultas Agendadas Neste Mês</th>
                    </thead>
                  </tr>
                  <tr class="table-light">
                    <td><h4  class="text-danger">Não há consultas agendadas neste mês</h4></td>
                  </tr>
                </table>';
    }
    $this->desconectar();
    
    return $retorno;
  }

  function postoTelefones(){
    
    $retorno = null;

    $sql = "SELECT posto_nome AS nome , posto_telefone AS telefone FROM posto";

    $dados = $this->con->query($sql);

    if($dados->num_rows > 0){
      while($adm = $dados->fetch_object())
      $retorno .= "Posto : ".$adm->nome.
                  "<br>Telefone : ".$adm->telefone."<br><br>";
    }
    return $retorno;
  }

  function validarCPF($cpf) {
 
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }
    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }
    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf{$c} * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf{$c} != $d) {
            return false;
        }
    }
    return true;
  }
}
?>