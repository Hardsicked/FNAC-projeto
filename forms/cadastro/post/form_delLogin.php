<?php  
	include "../../../php/connect.php";
	$cdLogin = $_GET["cdLogin"];
	$sql = "DELETE FROM tblogin WHERE cdLogin='".$cdLogin."'";
	if(mysqli_query($link, $sql)){
		echo "Login deletado com sucesso!";
	}else{
		echo "Erro ao deletar login".mysqli_error();
	}
?>