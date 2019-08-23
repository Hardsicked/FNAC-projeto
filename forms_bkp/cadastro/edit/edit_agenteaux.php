<!DOCTYPE html>
<html lang="en">
<?php
	error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE ^ E_WARNING);
	$_SERVER['DOCUMENT_ROOT'] = dirname(__FILE__);
	header ('Content-type: text/html; charset=UTF-8');
	include "../../../php/connect.php";
	if (!isset($_SESSION)) session_start();
	if (!isset($_SESSION["cdLogin"])) {
		//Destrói a sessão por segurança
		session_destroy();
		//Redireciona o visitante de volta pro login
		header("Location: index.php"); exit;
	}
	if (!isset($_SESSION['cdcontrato'])){
		header ("Location: sel.php");
	}
	$cdLogin = $_SESSION["cdLogin"];
	$LNome = $_SESSION["nome"];
	$_SESSION['cd'] = $_SESSION['cdempresa'];
	$contrato = $_SESSION['cdcontrato'];
	$cdtipoagente = $_POST['c'];
	$cdagente = $_POST['cdAgente'];
	$sqlag = "SELECT * FROM tbAgente WHERE cdAgente =".$cdagente;
	$qryag = mysqli_query($link,$sqlag);
?>
<head>
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="../../../css/bootstrap.min.css">
	<link rel="stylesheet" href="../../../css/fnac.css">
	
	<!-- Custom styles for this template -->
	<link href="../../../css/scrolling-nav.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../../../css/jquery.fancybox.min.css">
	<!-- Bootstrap core JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="../../../js/bootstrap.min.js"></script>

	<!-- Plugin JavaScript -->
	<!--<script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

	<!-- Custom JavaScript for this theme -->
	<script src="../../../js/scrolling-nav.js"></script>
	<script src="../../../js/jquery.fancybox.min.js"></script>
<script>
	
</script>
</head>
	<body>
		<div class="container">
			<div class="col-12">
				<form id="" class="" action="/fnac/forms/cadastro/post/form_editAgente.php" method="POST">
					<table class="table-sm table table-responsive-xl table-light">
						<?php while($rowag = mysqli_fetch_assoc($qryag)){
							echo '
						<thead class="thead-light">
							<th class="text-center" colspan="2"><a id="abc"></a>Modificar Agente</th>
						</thead>
						<tbody>
							<tr>
								<td>Sub-Grupo(Família)</td>
								<td>';
									$sql2 = "SELECT * FROM tbsubgrupoagente WHERE cdTipoAgente = ".$cdtipoagente;
									$qry2 = mysqli_query($link,$sql2);
									echo '.<select id="" class="" name="subGrupo">';
									if($qry2->num_rows > 0){
											while ($row2 = mysqli_fetch_assoc($qry2)){
												echo '<option id="" class="" value="'.$row2["cdSubGrupo"].'">'.$row2["nome"].'</option>';
											}
									}else{
										echo '
												<option id="" class="">Nenhum Sub Grupo cadastrado</option>
											';
									}
							echo '
									</select><br>
								</td>
							</tr>
							<tr>
								<td>Nome do Agente</td>
								<td><input type="text" id="" class="" name="nmAgente" placeholder="Nome do Agente" value="'.$rowag["nomeAgente"].'" required></td>
							</tr>
							<tr>
								<td>Código do Agente</td>
								<td><input type="text" id="" class="" name="codigoAgente" placeholder="Código do Agente" value="'.$rowag["codigoAgente"].'" required></td>
							</tr>
							<tr>
								<td>Código E-Social</td>
								<td><input type="text" id="" class="" name="codigoESocial" placeholder="Código E-Social" value="'.$rowag["codigoESocial"].'" required></td>
							</tr>
							<tr>
								<td>Unidade de Medida</td>
								<td><input type="text" id="" class="" name="unidadeMedida" placeholder="Unidade de Medida" value="'.$rowag["unidadeMedida"].'" required></td>
							</tr>
							<tr>
								<td>Divisor</td>
								<td><input type="text" id="" class="" name="divisor" placeholder="Divisor" value="'.$rowag["divisor"].'" required></td>
							</tr>
							<tr>
								<td>Constante</td>
								<td><input type="text" id="" class="" name="constante" placeholder="Constante" value="'.$rowag["constante"].'" required></td>
							</tr>
							<tr>
								<td>Nível de Ação</td>
								<td><input type="text" id="" class="" name="nivelAcao" placeholder="Nível de Ação" value="'.$rowag["nivelAcao"].'" required></td>
							</tr>
							<tr>
								<td>Limite de Exposição</td>
								<td><input type="text" id="" class="" name="limiteExposicao" placeholder="Limite de Exposição" value="'.$rowag["limiteExposicao"].'" required></td>
							</tr>
							<tr>
								<td>Limite de Exposição Máxima</td>
								<td><input type="text" id="" class="" name="limiteExposicaoMaxima" placeholder="Limite de Exposição Máxima" value="'.$rowag["limiteExposicaoMaxima"].'" required></td>
							</tr>
							<tr>
								<td>Nível de Ação ACGIH</td>
								<td><input type="text" id="" class="" name="nivelAcaoACGIH" placeholder="Nível de Ação ACGIH" value="'.$rowag["nivelAcaoACGIH"].'"></td>
							</tr>
							<tr>
								<td>Limite de Exposição ACGIH</td>
								<td><input type="text" id="" class="" name="limiteacgih" placeholder="Limite de Exposição ACGIH" value="'.$rowag["limiteACGIH"].'" required></td>
								
							</tr>
							<tr>
								<td>Método de Medição</td>
								<td><input type="text" id="" class="" name="metodoMedicao" placeholder="Método de Medição" value="'.$rowag["metodoMedicao"].'" required></td>
							</tr>
							<tr>
								<td>Aparelhagem</td>
								<td><input type="text" id="" class="" name="aparelhagem" placeholder="Aparelhagem" value="'.$rowag["aparelhagem"].'" required></td>
							</tr>
							<tr>
								<td>Meios de Propagação</td>
								<td><input type="text" id="" class="" name="meioPropagacao" placeholder="Meios de Propagação" value="'.$rowag["meioPropagacao"].'" required></td>
							</tr>
							<tr>
								<td>Danos à saúde</td>
								<td><textarea cols="40" rows="10" id="" class="" action="" name="danoSaude" value="Danos à saúde" required>'.$rowag["danoSaude"].'</textarea></td>
							</tr>
							<tr>
								<td>Regulamentação Legal</td>
								<td><textarea cols="40" rows="10" id="" class="" action="" name="regulamentacao" value="Regulamentação Legal" required>'.$rowag["regulamentacao"].'</textarea>></td>
							</tr>
							<tr>				
								<td><input type="submit" id="" class="" name="" value="Confirmar Cadastro"></td>
								<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
							</tr>
						</tbody>
						';
					}?>
					</table>
				</form>
			<div class="col-12">
		</div>