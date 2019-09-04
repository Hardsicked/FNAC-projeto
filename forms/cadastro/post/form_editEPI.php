<?php
	include "../../../php/connect.php";
	$cdEPI = $_GET["cdEPI"];
	$tpEPI = $_POST["tpEPI"];
	$nmEPI = $_POST["nmEPI"];
	$fabricante = $_POST["fabricante"];
	$modelo = $_POST["modelo"];
	$ca = $_POST["ca"];
	$nivelProtecao = $_POST["nivelProtecao"];
	$sql = "UPDATE tbepi SET tipoEPI='".$tpEPI."', nome='".$nmEPI."', fabricante='".$fabricante."', modelo='".$modelo."', ca='".$ca."', nivelProtecao='".$nivelProtecao."' WHERE cdEPI = ".$cdEPI;
	if(mysqli_query($link, $sql)){
		echo "EPI Editado com Sucesso";
	}else{
		echo "Erro ao editar EPI".mysqli_error($link);
	}
?>