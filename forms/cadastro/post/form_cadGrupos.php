<?php
include "../../../php/connect.php";
	$nome = $_POST["nomeGrupo"];
	$sql = "INSERT INTO tbgruposagente(tipoAgente) VALUES('".$nome."')";
		$insert = mysqli_query($link, $sql);
		if($insert){
			echo "<script>alert('Grupo Cadastrado com Sucesso.'); window.location='../../../syst.php';</script>";
		}else{
			echo "Erro ao cadastrar Grupo".mysqli_error($link);
		}
?>