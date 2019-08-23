<?php  
	include "../../../php/connect.php";
	$cdGHE = $_GET["cdGHE"];
	$sql = "DELETE FROM tbfotos WHERE cdGHE='".$cdGHE."'";
	if(mysqli_query($link, $sql)){
		echo "Fotos do GHE deletadas com sucesso!";
	}else{
		echo "Erro ao deletar fotos do GHE".mysqli_error($link);
	}
?>