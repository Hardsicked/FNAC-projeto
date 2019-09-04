<?php
	include "../../../php/connect.php";
	$cd = $_GET["c"];
	$sql = "DELETE FROM tbresultado_calor WHERE cdCalor = ".$cd;
	if(mysqli_query($link, $sql)){
		echo "<script>alert('Resultado de Calor deletado com sucesso!'); location.reload();</script>";
	}else{
		echo "<script>alert('Erro ao deletar Resultado de Calor: ".mysqli_error($link)."')</script>";
	}
?>