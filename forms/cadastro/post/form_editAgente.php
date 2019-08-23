<?php
	include "../../../php/connect.php";
	$cdAgente = $_GET["c"];
	$subGrupo = $_POST["subGrupo"];
	$nmAgente = $_POST["nmAgente"];
	$codigoAgente = $_POST["codigoAgente"];
	$codigoESocial = $_POST["codigoESocial"];
	$unidadeMedida = $_POST["unidadeMedida"];
	$divisor = $_POST["divisor"];
	$constante = $_POST["constante"];
	$nivelAcao = $_POST["nivelAcao"];
	$limiteExposicao = $_POST["limiteExposicao"];
	$limiteExposicaoMaxima = $_POST["limiteExposicaoMaxima"];
	$nivelAcaoACGIH = $_POST["nivelAcaoACGIH"];
	$limiteACGIH = $_POST["limiteacgih"];
	$metodoMedicao = $_POST["metodoMedicao"];
	$aparelhagem = $_POST["aparelhagem"];
	$danoSaude = $_POST["danoSaude"];
	$meioPropagacao = $_POST["meioPropagacao"];
	$regulamentacao = $_POST["regulamentacao"];
		$sql = "UPDATE tbagente SET
		cdsubGrupo ='".$subGrupo."',
		nomeAgente ='".$nmAgente."',
		codigoAgente ='".$codigoAgente."',
		codigoESocial ='".$codigoESocial."',
		unidadeMedida ='".$unidadeMedida."',
		divisor ='".$divisor."',
		constante ='".$constante."',
		nivelAcao ='".$nivelAcao."',
		limiteExposicao ='".$limiteExposicao."',
		limiteExposicaoMaxima ='".$limiteExposicaoMaxima."',
		nivelAcaoACGIH ='".$nivelAcaoACGIH."',
		limiteACGIH ='".$limiteACGIH."',
		metodoMedicao ='".$metodoMedicao."',
		aparelhagem ='".$aparelhagem."',
		danoSaude ='".$danoSaude."',
		meioPropagacao ='".$meioPropagacao."',
		regulamentacao ='".$regulamentacao."'
		WHERE cdAgente = '".$cdAgente."'";
	if(mysqli_query($link, $sql)){
		echo "<script>alert('Agente editado com Sucesso'); window.location='../../../syst.php';</script>";
	}else{
		echo "Erro ao editar Agente".mysqli_error($link);
	}
?>