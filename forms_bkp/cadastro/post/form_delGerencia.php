<?php  
	include "../../../php/connect.php";
	$cdGerencia = $_GET["cdGerencia"];
	$sql = "DELETE FROM tbgerencia WHERE cdGerencia ='".$cdGerencia."'";
	if(mysqli_query($link, $sql)){
		echo "Gerencia deletada com sucesso!";
	}else{
		echo "Erro ao deletar gerencia".mysqli_error($link);
	}
?>