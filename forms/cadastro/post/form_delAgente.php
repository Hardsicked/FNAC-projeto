<?php
	include "../../../php/connect.php";
	$cdAgente = $_GET["c"];
	$sql = "DELETE FROM tbagente WHERE cdAgente = '".$cdAgente."'";
	if(mysqli_query($link, $sql)){
		echo "Agente deletado com Sucesso!";
	}else{
		echo "Erro ao deletar Agente".mysql_error($link);
	}
?>