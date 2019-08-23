<?php  
	include "../../../php/connect.php";
	$cdFichaRuido = $_GET["cdFichaRuido"];
	$sql = "DELETE FROM tbficharuido WHERE cdFichaRuido = '".$cdFichaRuido."'";
	if(mysqli_query($link, $sql)){
		echo "<p>Ficha Ruido deletada com sucesso!</p>";
	}else{
		echo "Erro ao deletar Ficha Ruido".mysqli_error($link);
	}
?>