<?php
	include "../../../php/connect.php";
	$cdGrupo = $_GET["cd"];
	$sql = "DELETE FROM tbgruposagente WHERE cdTipoAgente='".$cdGrupo."'";
	if(mysqli_query($link, $sql)){
		echo "<p>Grupo deletado com sucesso!</p>";
	}else{
		echo "<p>Erro ao deletar Grupo" . mysqli_error($link) . "</p>";
	}
?>