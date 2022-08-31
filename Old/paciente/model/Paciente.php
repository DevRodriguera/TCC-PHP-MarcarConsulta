<?php
  class Paciente{
    private $con;
    private $id;
    private $cpf;
    private $posto;
    private $retorno;

    public function __construct(){
    }
  
    public function conectar(){
      $this->con = mysqli_connect("localhost","root","","bd_tcc");
      if (!$this->con){
        die("Problemas com a conexão");
      }
    }
      
    public function desconectar(){
      $this->con->close();
    }

    function pacienteLogar($cpf, $senha, $posto){
      
      $this->conectar();

      $sql = null;

      $retorno = null;

      $sql = "SELECT * FROM paciente WHERE pac_cpf = '$cpf' AND pac_senha = '$senha' AND FK_posto = '$posto'";

      $retorno = $this->con->query($sql);

      if ($retorno->num_rows > 0) {
        return true;
      }
      return false;
    }

    function pacienteCadastrar($nome, $sexo, $data_nasc, $cpf, $celular, $email, $senha, $cep, $estado, $cidade, $bairro, $rua, $numeroCasa, $complemento, $posto){
      
      $this->conectar();

      $sql = "INSERT INTO paciente VALUES(NULL , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? )";
      
      $stm = $this->con->prepare($sql);
      
      $stm->bind_param("ssssssssssssisi",$nome, $sexo, $data_nasc, $cpf, $celular, $email, $senha, $cep, $estado, $cidade, $bairro, $rua, $numeroCasa, $complemento,$posto);
      $stm->execute();
      $stm->close();
      
      $this->desconectar();
    }

    function pacienteAlterar($codigo , $nome , $sexo , $data_nasc , $cpf , $celular , $email , $senha , $cep , $estado , $cidade , $bairro , $rua , $numeroCasa , $complemento){
      $this->conectar();

      $sql = "UPDATE paciente SET pac_nome = ?, pac_sexo = ?, pac_data_nasc = ?, pac_cpf = ? , pac_celular = ? , pac_email = ? , pac_senha = ? , pac_cep = ?, pac_estado = ?, pac_cidade = ?, pac_bairro = ?, pac_rua = ?, pac_numeroCasa = ?, pac_complemento = ? where pac_id = '$codigo'";

      $stm = $this->con->prepare($sql);

      $stm->bind_param("ssssssssssssis", $nome , $sexo , $data_nasc , $cpf , $celular , $email , $senha , $cep , $estado , $cidade , $bairro , $rua , $numeroCasa , $complemento);
      $stm->execute();
      $stm->close();

      $this->desconectar();
    }

    function pacienteAgendar($data, $horaI, $horaF, $posto, $paciente, $profissional){

      $this->conectar();
    
      $retorno = null;

      $sql = null;

      $sql = "INSERT INTO agendamento VALUES (?, ? , ? , ? , ? , ?)";

      /*$stm = $this->con->prepare($sql);
      $stm->bind_param("sssiii",$data, $horaI, $horaF, $posto, $paciente, $profissional);
      $stm->execute();
      $stm->close();*/
      $sql = "INSERT INTO agendamento VALUES (NULL, '$data', '$horaI', '$horaF', $posto, $paciente, $profissional)";
      $this->con->query($sql);
      $this->desconectar();
    }

    function exibirDadosPaciente($cpf){
      
      $this->conectar();

      $retorno = null;

      $sql   = null;

      $sql = $this->con->query("SELECT * FROM paciente WHERE pac_cpf = '$cpf'");

      $retorno = mysqli_fetch_assoc($sql);

      return $retorno;
    }

    function exibirDadosPosto($posto){
      
      $this->conectar();
      
      $sql     = null;
      
      $retorno = null;

      $sql = $this->con->query("SELECT * FROM posto WHERE posto_id = $posto");

      $retorno = mysqli_fetch_assoc($sql);

      $this->desconectar();

      return $retorno;
    }

    function exibirDadosProfissional($posto){
      
      $this->conectar();
      
      $sql     = null;
      
      $retorno = null;

      $sql = $this->con->query("SELECT * FROM profissional WHERE FK_posto = $posto");

      $retorno = mysqli_fetch_assoc($sql);

      $this->desconectar();

      return $retorno;
    }

    function exibirConsultas($id){

      $this->conectar();

      $sql     = null;
      
      $retorno = null;

      $sql = "SELECT * FROM agendamento WHERE FK_paciente = $id AND YEAR(age_data) = YEAR(CURDATE()) AND MONTH(age_data) = MONTH(CURDATE())";

      $dados = $this->con->query($sql);

      if($dados->num_rows > 0){
        while($agenda = $dados->fetch_object())
        $retorno .= "<div class='pt-3'>
                      <b>Profissional</b> : ".$agenda->FK_profissional.
                      "<br> Dia : "    .$agenda->age_data.
                      "<br> Início: "  .$agenda->age_horaInicio.
                    "</div>";
      }

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

    function selectPosto(){

      $this->conectar();
    
      $sql     = null;

      $retorno = null;

      $options = null;
      
      $sql = "SELECT posto_nome AS nome, posto_id AS id FROM posto";

      $retorno = $this->con->query($sql);

      if($retorno->num_rows > 0){

        $options = '<select name="posto" class="form-control">';
        
        $options .= '<option>Selecione</option>';

        while($posto = $retorno->fetch_object())
        {
          $options .= "<option value=".$posto->id."> ".$posto->nome."</option>";
        }
        
        $options .= '</select>';

      $retorno = $options;
      }

      return $retorno;

      $this->desconectar();
    }

    function selectProfissional($posto){

      $this->conectar();

      $sql     = null;

      $retorno = null;
      
      $sql = "SELECT pro_id AS id, pro_nome AS nome, pro_funcao AS funcao
              FROM profissional 
              WHERE FK_posto = $posto";

      $retorno = $this->con->query($sql);

      $options = null;

      if($retorno->num_rows > 0){

        $options = '<select name="profissional" class="form-control" required"><option selected disabled>Selecione o profissional</option>';
        while($profissional = $retorno->fetch_object())
        {
          $options .= "<option value=".$profissional->id."> ".$profissional->funcao. " - " .$profissional->nome."</option>";
        }
        $options .= '</select>';
      }else{
        $options = '<select class="form-control" required" name="profissional"><option selected disabled>Não há profissionais</option></select>';
      }
      
      $this->desconectar();
      
      return $options;
    }

    function selectEstado($meuEstado){

      $options = ' <select id="uf" name="estado" class="form-control"><option value="">Selecione';
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
          $selected  = $uf == $meuEstado ?"selected":"";
          $options  .= "<option $selected value=\"$uf\">$estado</option>";
        }

      $options .= "</select>"; 
  
      $retorno = $options;

      return $retorno;
    }

    function verificarAgenda($data, $horaI, $horaF, $posto, $paciente, $profissional){
      
      $this->conectar();

      $retorno = null;

      $sql = null;

      $sql = "SELECT * FROM agendamento
              WHERE age_data = $data  AND FK_profissional = $profissional AND FK_posto = $posto AND age_horaInicio = ";

      $dados = $this->con->query($sql);

      if($dados->num_rows > 0){
        $retorno = true;
      }
      $retorno = false;

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