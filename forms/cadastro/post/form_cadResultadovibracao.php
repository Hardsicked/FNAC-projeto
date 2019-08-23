<?php 
	include "../../../php/connect.php";
	$cdGHE = $_POST["ghe"];
	$cdRisco = $_POST["risco"];
	$rastreio = $_POST["rastreio"];
	$dataaval = $_POST["dataaval"];
	$tempoEfetivo = $_POST["tempoefetivo"];
	$equipamento = $_POST["equipamento"];
	$aren = $_POST["area"];
	$vdvrms175 = $_POST["vdvr"];
	$GFIP = $_POST["gfip"];
	$tipo = $_POST["tipo"];
	$obs = $_POST["obs"];
	$sql = "INSERT INTO tbresultado_vibr(
	cdGHE,
	cdRisco,
	codigoRastreio,
	dataAvaliacao,
	tempoEfetivo,
	equipamento,
	aren,
	vdvrms175,
	GFIP,
	tipoVibracao,
	obs
	) VALUES(
	'".$cdGHE."',
	'".$cdRisco."',
	'".$rastreio."',
	'".$dataaval."',
	'".$tempoEfetivo."',
	'".$equipamento."',
	'".$aren."',
	'".$vdvrms175."',
	'".$GFIP."',
	'".$tipo."',
	'".$obs."'
	)";
	if(mysqli_query($link, $sql)){
		echo "<script>alert('Resultado de Vibração Cadastrado com Sucesso.'); window.close();</script>";
	}else{
		echo "Erro ao cadastrar resultado".mysqli_error($link);
	}
?>