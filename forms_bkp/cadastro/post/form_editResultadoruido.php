<?php 
	include "../../../php/connect.php";
	$cdresult = $_GET["c"];
	$ghe = $_POST["ghe"];
	$risco = $_POST["risco"]
	$rastreio = $_POST["rastreio"];
	$dataaval = $_POST["dataaval"];
	$resultado = $_POST["resultado"];
	$nan = $_POST["nen"];
	$does = $_POST["dose"];
	$sql = "UPDATE tbresultado_ruido
	SET (
	cdGHE = '".$ghe."',
	cdRisco = '".$risco."',
	codRastreio = '".$rastreio."',
	dataAvaliacao = '".$dataaval."',
	concentracao = '".$resultado."',
	nen = '".$nan."',
	doseProjetada = '".$dose."'
	WHERE cdResultado = ".$cdresult;
	if(mysqli_query($link, $sql)){
		echo "<script>alert('Resultado de Ruído Cadastrado com Sucesso.'); window.location='../../../syst.php';</script>";
	}else{
		echo "Erro ao cadastrar resultado".mysqli_error($link);
	}
?>