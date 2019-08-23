<?php  
	include "../../../php/connect.php";
	$cdGerencia = $_GET["cdGerencia"];
	$cdSuperIntendencia = $_POST["cdSuperIntendencia"];
	$gerencia = $_POST["gerencia"];
	$sql = "UPDATE tbgerencia SET cdSuperIntendencia='".$cdSuperIntendencia."', gerencia='".$gerencia."' WHERE cdGerencia='".$cdGerencia."'";
	if(mysqli_query($link, $sql)){
		echo "Gerencia editada com sucesso!";
	}else{
		echo "Erro ao editar gerencia".mysqli_error($link);
	}
?>