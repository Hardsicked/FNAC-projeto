<?php
	include "../../../php/connect.php";
	$cdAgente = $_GET["c"];
	$sql = "DELETE FROM tbrisco WHERE cdRisco = '".$cdAgente."'";
	if(mysqli_query($link, $sql)){
		echo "<script>alert('Risco deletado com sucesso!')</script>";
	}else{
		echo "<script>alert('Risco nao foi deletado: ".mysql_error($link)."')</script>";
	}
?>