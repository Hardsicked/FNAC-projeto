<?php  
	include "../../../php/connect.php";
	$cdSuperIntendencia = $_GET["cdSuperIntendencia"];
	$cdEmpresa = $_POST["cdEmpresa"];
	$superintendencia = $_POST["superintendencia"];
	$sql = "UPDATE tbsuperintendencia SET cdEmpresa='".$cdEmpresa."', superintendencia='".$superintendencia."' WHERE cdSuperIntendencia='".$cdSuperIntendencia."'";
	if(mysqli_query($link, $sql)){
		echo "Superintendencia editada com sucesso!";
	}else{
		echo "Erro ao editar superintendencia".mysqli_error($link);
	}
?>