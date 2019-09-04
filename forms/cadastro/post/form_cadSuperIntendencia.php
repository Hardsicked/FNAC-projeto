<?php  
	include "../../../php/connect.php";
	$cdEmpresa = $_POST["cdEmpresa"];
	$superintendencia = $_POST["superintendencia"];
	$sql = "INSERT INTO tbsuperintendencia(cdEmpresa,superintendencia) VALUES('".$cdEmpresa."','".$superintendencia."')";
	if(isset($_POST["btnSave"]){
		if(mysqli_query($link, $sql)){
			echo "Superintendencia cadastrada com sucesso!";
		}else{
			echo "Erro ao cadastrar superintendencia".mysqli_error($link);
		}
	}
?>