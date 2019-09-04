<?php  
	include "../../../php/connect.php";
	$ficha = $_GET["c"];
	$sql = "DELETE FROM tbficha_ruido WHERE cdFicha = '".$ficha."'";
	if(mysqli_query($link, $sql)){
		echo "<script>alert('Ficha Ruido deletada com sucesso!')</script>";
	}else{
		echo "<script>alert('Erro ao deletar a ficha ruído: ".mysqli_error($link)."')</script>";
	}
?>