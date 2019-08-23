<?php 
	include "../../../php/connect.php";
	$cresult = $_POST["cdresultado"];
	$cdRisco = $_POST["cdRisco"];
	$dataaval = $_POST["dataaval"];
	$resultado = $_POST["texto"];
	$epia = $_POST["epia"];
	$obs = $_POST["obs"];
	$GFIP = $_POST["gfip"];
	$sql = "INSERT tbresultado_qual SET
	cdRisco = '".$cdRisco."',
	dataAval = '".$dataaval."',
	texto = '".$resultado."',
	epiAdequada = '".$epia."',
	obs = '".$obs."',
	GFIP = '".$GFIP."'
	WHERE cdQualitativo = ".$cresult;
	if(mysqli_query($link, $sql)){
		echo "<script>alert('Resultado Qualitativo Modificado com Sucesso.'); window.close();</script>";
	}else{
		echo "Erro ao modificar resultado".mysqli_error($link);
	}
?>