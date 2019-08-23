<?php
	include "../../../php/connect.php";
	$cdContrato = $_GET["cd"];
	$sql = "DELETE FROM tbcontrato WHERE cdContrato ='".$cdContrato."'";
	if(mysqli_query($link, $sql)){
		echo "<h3>Contrato deletado com sucesso!<h3>";
	}else{
		echo "Erro ao deletar Contrato".mysqli_error($link);
	}
?>