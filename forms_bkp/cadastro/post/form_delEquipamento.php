<?php 
	include "../../../php/connect.php";
	$cdEquipamento = $_GET["cdEquipamento"];
	$sql = "DELETE FROM tbequipamento WHERE cdEquipamento='".$cdEquipamento."'";
	if(mysqli_query($link, $sql)){
		echo "Equipamento deletado com sucesso!";
	}else{
		echo "Erro ao deletar equipamento".mysqli_error($link);
	}
?>