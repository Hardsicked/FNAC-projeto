<?php
include "../../../php/connect.php";
	$grupo = $_POST["grupo"];
	$nome = $_POST["nomeSubGrupo"];
	$sql = "INSERT INTO tbsubgrupoagente(cdTipoAgente,nome) VALUES('".$grupo."','".$nome."')";
		if(mysqli_query($link, $sql)){
			echo "<script>alert('Sub Grupo Cadastrado com Sucesso.'); window.location='../../../syst.php';</script>";
		}else{
			echo "Erro ao cadastrar Sub Grupo".mysqli_error($link);
		}
?>