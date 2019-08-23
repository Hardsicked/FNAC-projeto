<?php
	include "../../../php/connect.php";
	$tpEPI = $_POST["tpEPI"];
	$nmEPI = $_POST["nmEPI"];
	$fabricante = $_POST["fabricante"];
	$modelo = $_POST["modelo"];
	$ca = $_POST["ca"];
	$nivelProtecao = $_POST["nivelProtecao"];
	if(isset($_POST["btnSave"])){
		$sql = "INSERT INTO tbepi(tipoEPI,nome,fabricante,modelo,ca,nivelProtecao) VALUES('".$tpEPI."', '".$nmEPI."', '".$fabricante."', '".$modelo."', '".$ca."', '".$nivelProtecao."')";
		if(mysqli_query($link, $sql)){
			echo "<script>alert('EPI Cadastrada com Sucesso.'); window.location='../../../syst.php';</script>";
		}else{
			echo "Erro ao Cadastrar EPI".mysqli_error($link);
		}
	}
?>