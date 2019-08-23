<?php 
	include "../../../php/connect.php";
	$cdVibr = $_POST["cdresultado"];
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
	$sql = "UPDATE tbresultado_vibr SET
	cdGHE = '".$cdGHE."',
	cdRisco = '".$cdRisco."',
	codigoRastreio = '".$rastreio."',
	dataAvaliacao = '".$dataaval."',
	tempoEfetivo = '".$tempoEfetivo."',
	equipamento = '".$equipamento."',
	aren = '".$aren."',
	vdvrms175 = '".$vdvrms175."',
	GFIP = '".$GFIP."',
	tipoVibracao = '".$tipo."',
	obs = '".$obs."'
	WHERE cdVibracao =".$cdVibr;
	if(mysqli_query($link, $sql)){
		echo "<script>alert('Resultado de Vibração Modificado com Sucesso.'); window.close();</script>";
	}else{
		echo "Erro ao cadastrar resultado".mysqli_error($link);
	}
?>