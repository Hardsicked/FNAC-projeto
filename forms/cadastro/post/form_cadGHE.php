<?php
	include "../../../php/connect.php";
	$cdContrato = $_POST["cdContrato"];
	$cdSetor = $_POST["cdSetor"];
	$codGHE = $_POST["codGHE"];
	$codEmpresa = $_POST["cdEmpresa"];
	$nomeGHE = $_POST["nomeGHE"];
	$numEmpregados = $_POST["numEmpregados"];
	$jornadaTrab = $_POST["jornadaTrab"];
	$descTrab = $_POST["descTrab"];
	$tipoCont = $_POST["tipoGHE"];
	$sql = "INSERT INTO tbghe (cdContrato,cdEmpresa,cdSetor,codGHE,nomeGHE,numEmpregados,jornadaTrab,descTrab,tipoCont) VALUES('".$cdContrato."','".$codEmpresa."','".$cdSetor."','".$codGHE."','".$nomeGHE."','".$numEmpregados."','".$jornadaTrab."','".$descTrab."','".$tipoCont."')";
		if(mysqli_query($link, $sql)){
			echo "<script>alert('GHE Cadastrada com Sucesso.'); window.close();</script>";
		}else{
		echo "GHE Não Cadastrada  ".mysqli_error($link);
			echo "<script>alert(); </script>";
		}
?>