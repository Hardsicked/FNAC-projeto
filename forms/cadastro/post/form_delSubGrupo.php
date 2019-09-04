<?php
	include "../../../php/connect.php";
	$cdSGrupo = $_GET["cd"];
	$sql = "DELETE FROM tbsubgrupoagente WHERE cdSubGrupo='".$cdSGrupo."'";
	if(mysqli_query($link, $sql)){
		echo "<p>Sub Grupo deletado com sucesso!</p>";
	}else{
		echo "<p>Erro ao deletar Sub Grupo" . mysqli_error($link) . "</p>";
	}
?>