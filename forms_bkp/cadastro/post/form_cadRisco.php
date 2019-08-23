<?php
	include "../../../php/connect.php";
	$ghe = $_POST["ghe"];
	$epi = $_POST["epi"];
	$agente = $_POST["agente"];
	$fonte = $_POST["fontes"];
	$controle = $_POST["controle"];
	$expo = $_POST["expo"];
	$sql = "INSERT INTO tbrisco(cdGHE,cdAgente,cdEPI,fonte,controle,exposicao) VALUES('".$ghe."','".$agente."','".$epi."', '".$fonte."', '".$controle."', '".$expo."')";
		if(mysqli_query($link, $sql)){
			echo "<script>alert('Risco Cadastrado com Sucesso.'); window.close();</script>";
		}else{
			echo "<script>alert('Erro ao cadastrar Risco".mysqli_error($link)."'); window.location='../../../syst.php';</script>";
		}
?>