<?php
	include "../../../php/connect.php";
	$cdEPI = $_GET["cd"];
	$sql = "DELETE FROM tbepi WHERE cdEPI='".$cdEPI."'";
	if(mysqli_query($link, $sql)){
		echo "<p>EPI deletado com Sucesso!</p>";
	}else{
		echo "<p>Erro ao deletar EPI" . mysqli_error($link) . "</p>";
	}
?>