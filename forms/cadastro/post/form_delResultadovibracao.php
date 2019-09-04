<?php
	include "../../../php/connect.php";
	$cd = $_GET["c"];
	$sql = "DELETE FROM tbresultado_vibr WHERE cdVibracao = ".$cd;
	if(mysqli_query($link, $sql)){
		echo "<script>alert('Resultado de Vibração deletado com sucesso!'); location.reload();</script>";
	}else{
		echo "<script>alert('Erro ao deletar Resultado de Vibração: ".mysqli_error($link)."')</script>";
	}
?>