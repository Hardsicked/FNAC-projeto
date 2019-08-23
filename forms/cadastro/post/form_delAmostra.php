<?php  
	include "../../../php/connect.php";
	$cdAmostra = $_GET["cdAmostra"];
	$sql = "DELETE FROM tbamostra WHERE cdAmostra='".$cdAmostra."'";
	if(mysqli_query($link, $sql)){
		echo "Amostra deletada com sucesso!";
	}else{
		echo "Erro ao deletar amostra".mysqli_error($link);
	}
?>