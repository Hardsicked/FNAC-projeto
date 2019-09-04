<?php
	include ("../../../php/connect.php");
	$cdEmpresa = $_GET["c"];
	$sql = "DELETE FROM tbempresa WHERE cdEmpresa = ".$cdEmpresa;
	if(mysqli_query($link, $sql)){
		echo "<p>Empresa deletada com Sucesso!</p>";
	}else{
		echo "<p>Erro ao deletar Empresa</p>";
		echo "<p>".mysqli_error($link)."</p>";
	}
?>