<?php 
	require "../../php/connect.php";
	session_start();
	$contrato = $_GET['c'];
	$sql_info_ghe = "SELECT * FROM tbghe WHERE cdContrato = ".$contrato;
	$qry_info_ghe = mysqli_query($link,$sql_info_ghe);
	$sql_epi = "SELECT * FROM tbepi WHERE tipoEPI = 4";
	$qry_epi = mysqli_query($link,$sql_epi);
	$sql_inst = "SELECT * FROM tbequipamento WHERE tipoEquipamento = 0";
	$qry_inst = mysqli_query($link,$sql_inst);
	$sql_calb = "SELECT * FROM tbequipamento WHERE tipoEquipamento = 1";
	$qry_calb = mysqli_query($link,$sql_calb);
	$sql_agent = "SELECT * FROM tbsubgrupoagente WHERE cdTipoAgente = 9";
	$qry_agent = mysqli_query($link,$sql_agent);

?>
<head>
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
		<link rel="stylesheet" href="../../css/fnac.css">
		
		<!-- Custom styles for this template -->
		<link href="../../css/scrolling-nav.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../../css/jquery.fancybox.min.css">
		<!-- Bootstrap core JavaScript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="../../js/bootstrap.min.js"></script>

		<!-- Plugin JavaScript -->
		<!--<script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

		<!-- Custom JavaScript for this theme -->
		<script src="../../js/scrolling-nav.js"></script>
		<script src="../../js/jquery.fancybox.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#newlocal").hide(0);
				$("#newresp").hide(0);
				$("#post2").hide(0);
				$("#post3").hide(0);
				$("#confirmar").click(function(){
					$("#post1").hide(0);
					$("#post3").hide(0);
					$("#post2").show(10);
				});
				$("#confirmar2").click(function(){
					$("#post1").hide(0);
					$("#post2").hide(0);
					$("#post3").show(10);
				});
			});
		</script>
</head>
<body>
	<div class="container">
		<div class="row">
			<form id="cadastro" class="" action="/fnac/forms/cadastro/post/form_cadEmpresa.php" method="POST"  enctype="multipart/form-data">
				<table class="table table-dark" id="post1">
					<thead class="thead-light">
						<tr>
							<th class="text-center" colspan="3">Nova Empresa</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><h5>Logo da empresa:</h5></td>
							<td><b><input type="file" name="fileUpload" required></b></td>
						</tr>
						<tr>
							<td colspan="2"><h5>Nome da Empresa:</h5></td>
							<td><input type="text" id="" class="" name="nmEmpresa" placeholder="Nome da Empresa" required></td>
						</tr>
						<tr>
							<td colspan="2"><h5>Endereço:</h5></td>
							<td><input type="text" id="" class="" name="endereco" placeholder="Endereço" required></td>
						</tr>
						<tr>
							<td colspan="2"><h5>Razão Social:</h5></td>
							<td><input type="text" id="" class="" name="razaoSocial" placeholder="Razão Social" cols="15" rows="2" required></td>
						</tr>
						<tr>
							<td colspan="2"><h5>Nome Fantasia:</h5></td>
							<td><input type="text" id="" class="" name="nmFantasia" placeholder="Nome Fantasia" cols="15" rows="2" required></td>
						</tr>
						<tr>
							<td colspan="2"><h5>CNPJ: </h5></td>
							<td><input type="text" id="cnpj" class="" name="cnpj"  placeholder="CNPJ" required ></td>
						</tr>
						<tr>
							<td colspan="2"><h5>CEP: </h5></td>
							<td><input type="text" id="cnpj" class="" name="cep"  placeholder="CEP" required ></td>
						</tr>
						<tr>
							<td><div class="novobotao text-center" id="confirmar" style="margin-top: 8px; background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Próximo</b></div></td>
							<td></td>
							<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
						</tr>
					</tbody>
				</table>
				<table class="table table-dark" id="post2" style="width: 800px;">
					<thead class="thead-light">
						<tr>
							<th class="text-center" colspan="3">Novo Local de Prestação de Serviço</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="2"><h5>Razão Social:</h5></td>
							<td><input type="text" id="" class="" name="nmlocal" placeholder="Razão Social do Local de Prestação de Serviço" required></td>
						</tr>
						<tr>
							<td colspan="2"><h5>Unidade:</h5></td>
							<td><input type="text" id="" class="" name="undlocal" placeholder="Unidade" required></td>
						</tr>
						<tr>
							<td colspan="2"><h5>Endereço:</h5></td>
							<td><input type="text" id="" class="" name="endlocal" placeholder="Endereço" required></td>
						</tr>
						<tr>
							<td colspan="2"><h5>CNPJ: </h5></td>
							<td><input type="text" class="" name="cnpjlocal"  placeholder="CNPJ" required ></td>
						</tr>
						<tr>
							<td><div class="novobotao text-center" id="confirmar2" style="margin-top: 8px; background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Próximo</b></div></td>
							<td></td>
							<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
						</tr>
					</tbody>
				</table>
				<table class="table table-dark" id="post3" style="width: 800px;">
					<thead class="thead-light">
						<tr>
							<th class="text-center" colspan="3">Nova Empresa Responsável pelo Estudo</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="2"><h5>Razão Social:</h5></td>
							<td><input type="text" id="" class="" name="nmresp" placeholder="Razão Social da Empresa Responsável pelo Estudo" required></td>
						</tr>
						<tr>
							<td colspan="2"><h5>Unidade:</h5></td>
							<td><input type="text" id="" class="" name="undresp" placeholder="Unidade" required></td>
						</tr>
						<tr>
							<td colspan="2"><h5>Endereço:</h5></td>
							<td><input type="text" id="" class="" name="endresp" placeholder="Endereço" required></td>
						</tr>
						<tr>
							<td colspan="2"><h5>CNPJ: </h5></td>
							<td><input type="text" class="" name="cnpjresp"  placeholder="CNPJ" required ></td>
						</tr>
						<tr>
							<td><input type="submit" id="confirmar3" class="" name="btnSave" value="Confirmar Cadastro"></td>
							<td></td>
							<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>
<body>