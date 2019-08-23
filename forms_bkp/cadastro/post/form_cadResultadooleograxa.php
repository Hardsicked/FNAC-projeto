<?php 
	include "../../../php/connect.php";
	$cdGHE = $_POST["ghe"];
	$rastreio = $_POST["rastreio"];
	$dataaval = $_POST["dataaval"];
	$agente = $_POST["agentequal"];
	$descAtiv = $_POST["descativClass"];
	$descTaref = $_POST["descTaref"];
	if($_POST["utilizacaoadeq"] == true){
		$utilizacaoAdeq = 1;
	}else{
		$utilizacaoAdeq = 0;
	}
	$GFIP = $_POST["gfip"];
	$sql = "INSERT INTO tbresultado_olgr(
	cdGHE,
	codigoRastreio,
	dataAvaliacao,
	agenteQualitativo,
	descAtiv,
	descTaref,
	utilizacaoAdeq,
	GFIP
	) VALUES(
	'".$cdGHE."',
	'".$rastreio."',
	'".$dataaval."',
	'".$agente."',
	'".$descAtiv."',
	'".$descTaref."',
	'".$utilizacaoAdeq."',
	'".$GFIP."'
	)";
	if(mysqli_query($link, $sql)){
		echo "<script>alert('Resultado Qualitativo Cadastrado com Sucesso.'); window.close();</script>";
	}else{
		echo "Erro ao cadastrar resultado".mysqli_error($link);
	}
?>