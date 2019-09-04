<?php
		include "../../../php/connect.php";
		$ghe = $_POST['ghe'];
		$risco = $_POST['risco'];
		$ciclo = $_POST['ciclo'];
		$amostra = $_POST['amostragem'];
		$SQL = "INSERT INTO tbresultado_caloraux ( 
			cdGHE,
			cdRisco,
			ciclo,
			cdAmostragem
			) VALUES (
			'".$ghe."',
			'".$risco."',
			'".$ciclo."',
			'".$amostra."')";
		if(mysqli_query($link,$SQL)){
			echo "<script>alert('Informações do resultado de Calor Cadastrado com Sucesso.');</script>";
		}else{
			echo "<script>alert('Cadastro do resultado falhou: ".mysqli_error($link)."');</script>";
		}
?>