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
	$cdagente = $_GET["c"];
	$sqlb = "SELECT * FROM tbagente WHERE cdAgente = ".$cdagente;
	$qryb = mysqli_query($link,$sqlb);
	$sql1 = "SELECT * FROM tbgruposagente";
	$qry1 = mysqli_query($link,$sql1);
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
</head>
	<body>
		<div class="container">
			<div class="col-12">
				<form id="" class="" action="/fnac/forms/cadastro/edit/edit_agenteaux.php" method="POST">
					<table class="table-sm table table-responsive-xl table-light">
						<thead class="thead-light">
							<th class="text-center" colspan="2"><a id="abc"></a>Modificar Agente</th>
						</thead>
						<tbody>
							<tr>
								<td>Grupo Agente</td>
								<td><input type="text" name="cdAgente" value="<?php echo $cdagente ?>" hidden></input>
									<select id="select" class="" name="c">
										<?php
											if($qryb->num_rows > 0){
												while ($rowb = mysqli_fetch_assoc($qryb)){
													$sqlb2 = "SELECT * FROM tbsubgrupoagente WHERE cdSubGrupo = ".$rowb["cdsubGrupo"];
													$qryb2 = mysqli_query($link,$sqlb2);
													while ($rowb2 = mysqli_fetch_assoc($qryb2)){
														$sql1 = "SELECT * FROM tbgruposagente";
														$qry1 = mysqli_query($link,$sql1);
														while ($row1 = mysqli_fetch_assoc($qry1)){
															if ($row1["cdTipoAgente"] == $rowb2["cdTipoAgente"]){
																echo'<option id="" class="" value="'.$row1["cdTipoAgente"].'" selected>'.$row1["tipoAgente"].'</option>';
															}else{
																echo'<option id="" class="" value="'.$row1["cdTipoAgente"].'">'.$row1["tipoAgente"].'</option>';
															}
														}
													}
												}
											}else{
													echo'<option id="" class="">Nenhum Grupo Cadastrado</option>';
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td><input type="submit"></td>
							</tr>
						
	</body>