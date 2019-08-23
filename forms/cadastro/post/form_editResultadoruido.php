<?php 
	include "../../../php/connect.php";
	$cdresult = $_GET["c"];
	$ghe = $_POST["ghe"];
	$risco = $_POST["risco"];
	$rastreio = $_POST["rastreio"];
	$dataaval = $_POST["dataaval"];
	$resultado = $_POST["resultado"];
	$nan = $_POST["nen"];
	$dose = $_POST["dose"];
	$GFIP = $_POST["gfip"];
	$obs = $_POST["obs"];
	$sql = "UPDATE tbresultado_ruido
	SET
	cdGHE = '".$ghe."',
	cdRisco = '".$risco."',
	codRastreio = '".$rastreio."',
	dataAvaliacao = '".$dataaval."',
	concentracao = '".$resultado."',
	nen = '".$nan."',
	doseProjetada = '".$dose."',
	GFIP = '".$GFIP."',
	obs = '".$obs."'
	WHERE cdResultado = '".$cdresult."'";
	if(mysqli_query($link, $sql)){
		echo "<script>alert('Resultado de Ruído Modificado com Sucesso.'); window.close();</script>";
	}else{
	echo'Erro ao modificar Resultado!'.mysqli_error($link);
		echo "<script>alert('Erro ao modificar Resultado!".mysqli_error($link)."'); window.close();</script>";
	}
?>