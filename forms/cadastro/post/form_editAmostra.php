<?php  
	include "../../../php/connect.php";
	$cdAmostra = $_GET["cdAmostra"];
	$cdFichaQuim = $_POST["cdFichaQuim"];
	$amostra = $_POST["amostra"];
	$sql = "UPDATE tbamostra SET cdFichaQuim='".$cdFichaQuim."', amostra='".$amostra."' WHERE cdAmostra='".$cdAmostra."'";
	if(mysqli_query($link, $sql)){
		echo "Amostra editada com sucesso!";
	}else{
		echo "Erro ao editar amostra".mysqli_error($link);
	}
?>