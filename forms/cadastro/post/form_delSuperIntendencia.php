<?php  
	include "../../../php/connect.php";
	$cdSuperIntendencia = $_GET["cdSuperIntendencia"];
	$sql = "DELETE FROM tbsuperintendencia WHERE cdSuperIntendencia='".$cdSuperIntendencia."'";
	if(mysqli_query($link, $sql)){
		echo "Superintendencia deletada com sucesso!";
	}else{
		echo "Erro ao deletar superintendencia".mysqli_error($link);
	}
?>