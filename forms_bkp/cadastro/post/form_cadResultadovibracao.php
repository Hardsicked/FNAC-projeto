<?php 
	include "../../../php/connect.php";
	$cdGHE = $_POST["ghe"];
	$rastreio = $_POST["rastreio"];
	$dataaval = $_POST["dataaval"];
	$tempoEfetivo = $_POST["tempoefetivo"];
	$equipamento = $_POST["equipamento"];
	$aream2 = $_POST["area"];
	$vdvrms175 = $_POST["vdvr"];
	$GFIP = $_POST["gfip"];
	$sql = "INSERT INTO tbresultado_vibr(
	cdGHE,
	codigoRastreio,
	dataAvaliacao,
	tempoEfetivo,
	equipamento,
	aream2,
	vdvrms175,
	GFIP
	) VALUES(
	'".$cdGHE."',
	'".$rastreio."',
	'".$dataaval."',
	'".$tempoEfetivo."',
	'".$equipamento."',
	'".$aream2."',
	'".$vdvrms175."',
	'".$GFIP."'
	)";
	if(mysqli_query($link, $sql)){
		echo "<script>alert('Resultado de Vibração Cadastrado com Sucesso.'); window.close();</script>";
	}else{
		echo "Erro ao cadastrar resultado".mysqli_error($link);
	}
?>