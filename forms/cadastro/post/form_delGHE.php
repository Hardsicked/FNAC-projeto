<?php
	include "../../../php/connect.php";
	$cdGHE = $_GET["cd"];
	$sql = "DELETE FROM tbghe WHERE cdGHE = ".$cdGHE;
	if(mysqli_query($link, $sql)){
		echo "<script>alert('GHE deletado com sucesso!')</script>; location.reload();";
	}else{
		echo "<script>alert('Erro ao deletar GHE')</script>".mysqli_error($link);
	}
?>