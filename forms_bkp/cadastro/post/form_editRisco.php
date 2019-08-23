<?php
	include "../../../php/connect.php";
	$risco = $_POST["cdRisco"];
	$ghe = $_POST["ghe"];
	$epi = $_POST["epi"];
	$agente = $_POST["agente"];
	$fonte = $_POST["fontes"];
	$controle = $_POST["controle"];
	$expo = $_POST["expo"];
	$sql = "UPDATE tbrisco SET cdGHE = '".$ghe."', cdAgente = '".$agente."',cdEpi = '".$epi."',fonte = '".$fonte."',controle = '".$controle."',exposicao = '".$expo."' WHERE cdrisco = ".$risco;
		if(mysqli_query($link, $sql)){
			echo "<script>alert('Risco Modificado com Sucesso.'); window.close();</script>";
		}else{
			echo "<script>alert('Erro ao cadastrar Risco".mysqli_error($link)."'); window.close();</script>";
		}
?>