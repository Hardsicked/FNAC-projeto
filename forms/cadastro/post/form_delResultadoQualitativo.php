<?php
	include "../../../php/connect.php";
	$cdqual = $_GET["c"];
	$sql = "DELETE FROM tbresultado_qual WHERE cdQualitativo = ".$cdqual;
	if(mysqli_query($link, $sql)){
		echo "<script>alert('Resultado Qualitativo deletado com sucesso!'); location.reload();</script>";
	}else{
		echo "<script>alert('Erro ao deletar Resultado Qualitativo: ".mysqli_error($link)."')</script>";
	}
?>