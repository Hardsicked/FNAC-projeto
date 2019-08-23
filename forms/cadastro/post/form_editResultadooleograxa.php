<?php 
	include "../../../php/connect.php";
	$qualitativo = $_GET["c"];
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
	$sql = "UPDATE tbresultado_olgr SET
	cdGHE = '".$cdGHE."',
	codigoRastreio = '".$rastreio."',
	dataAvaliacao = '".$dataaval."',
	agenteQualitativo = '".$agente."',
	descAtiv = '".$descAtiv."',
	descTaref = '".$descTaref."',
	utilizacaoAdeq = '".$utilizacaoAdeq."',
	GFIP = '".$GFIP."'
	WHERE cdOleoGraxa =".$qualitativo;
	if(mysqli_query($link, $sql)){
		echo "<script>alert('Resultado Qualitativo Modificado com Sucesso.'); window.close();</script>";
	}else{
		echo "Erro ao cadastrar resultado".mysqli_error($link);
	}
?>