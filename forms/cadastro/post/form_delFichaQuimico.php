<?php
	include "../../../php/connect.php";
	$cdFichaQuim = $_GET["cdFichaQuim"];
	$sql = "DELETE FROM tbfichaquimic WHERE cdFichaQuim='".$cdFichaQuim."'";
	if(mysqli_query($link, $sql)){
		echo "<p>Ficha Quimica deletada com sucesso!</p>";
	}else{
		echo "Erro ao deletar Ficha Quimica".mysqli_error($link);
	}
?>