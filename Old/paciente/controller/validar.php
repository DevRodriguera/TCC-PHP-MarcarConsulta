<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
	function verificaNumero(e){
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			return false;
		}
	}

	$(document).ready(function() {
		$("#cpf").keypress(verificaNumero);
		$("#celular").keypress(verificaNumero);
		$("#cep").keypress(verificaNumero);		    		
	});

	function FormataCpf(evt){
		vr = (navigator.appName == 'Netscape') ?evt.target.value : evt.srcElement.value;
		if(vr.length == 3) vr = vr+".";
		if(vr.length == 7) vr = vr+".";
		if(vr.length == 11) vr = vr+"-";
		return vr;
	}

	function FormataCelular(evt){
		vr = (navigator.appName == 'Netscape') ?evt.target.value : evt.srcElement.value;
		if(vr.length == 0) vr = vr+"(";
		if(vr.length == 3) vr = vr+") ";
		if(vr.length == 10) vr = vr+"-";
		return vr;
	}

	function FormataCep(evt){
		vr = (navigator.appName == 'Netscape') ?evt.target.value : evt.srcElement.value;
		if(vr.length == 5) vr = vr+"-";
		return vr;
	}

	$(document).ready(function() {

	function limpa_formulário_cep() {
		$("#rua").val("");
		$("#bairro").val("");
		$("#cidade").val("");
		$("#uf").val("");
		$("#ibge").val("");
	}
			
	$("#cep").blur(function() {
		var cep = $(this).val().replace(/\D/g, '');

		if (cep != "") {
			var validacep = /^[0-9]{8}$/;

			if(validacep.test(cep)) {
				$("#rua").val("...");
				$("#bairro").val("...");
				$("#cidade").val("...");
				$("#uf").val("...");
				$("#ibge").val("...");

					$.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

						if (!("erro" in dados)) {
							$("#rua").val(dados.logradouro);
							$("#bairro").val(dados.bairro);
							$("#cidade").val(dados.localidade);
							$("#uf").val(dados.uf);
							$("#ibge").val(dados.ibge);
						} 
						else {
						limpa_formulário_cep();
						alert("CEP não encontrado.");
						}
					});
			}
			else {
				limpa_formulário_cep();
				alert("Formato de CEP inválido.");
			}
		} 
		else {
			limpa_formulário_cep();
		}
	});
	});
	</script>