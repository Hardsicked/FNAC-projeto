<?php 
	include "../../../php/connect.php";
	$ghe = $_POST["ghe"];
	$risco = $_POST["risco"];
	$rastreio = $_POST["rastreio"];
	$dataaval = $_POST["dataaval"];
	$resultado = $_POST["resultado"];
	$nan = $_POST["nen"];
	$dose = $_POST["dose"];
	$sql = "INSERT INTO tbresultado_ruido(cdGHE,cdRisco,codRastreio,dataAvaliacao,concentracao,nen,doseProjetada) VALUES('".$ghe."','".$risco."', '".$rastreio."', '".$dataaval."', '".$resultado."', '".$nan."', '".$dose."')";
	if(mysqli_query($link, $sql)){
		echo "<script>alert('Resultado de Ruído Cadastrado com Sucesso.'); window.close();</script>";
	}else{
		echo "Erro ao cadastrar resultado".mysqli_error($link);
	}
?>