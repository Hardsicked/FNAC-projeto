<?php
	include "../../../php/connect.php";
	$cargo = $_GET["c"];
	$sql = "DELETE FROM tbcargos WHERE cdCargos = '".$cargo."'";
	if(mysqli_query($link, $sql)){
		echo "Cargo deletado com Sucesso!";
	}else{
		echo "Erro ao deletar Cargo".mysql_error($link);
	}
?>