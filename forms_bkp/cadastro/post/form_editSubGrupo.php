<?php
include "../../../php/connect.php";
	$cdSubGrupo = $_GET['c'];
	$grupo = $_POST["cdTipoAgente"];
	$nome = $_POST["nomeSubGrupo"];
	$sql = "UPDATE tbsubgrupoagente SET nome ='".$nome."', cdTipoAgente ='".$grupo."' WHERE cdSubGrupo = ".$cdSubGrupo;
		$insert = mysqli_query($link, $sql);
		if($insert){
			echo "<script>alert('Sub Grupo Modificado com Sucesso.');  window.location='../../../syst.php';</script>";
		}else{
			echo "<script>alert('Erro ao Modificar Sub Grupo".mysqli_error($link)."');</script>";
		}
?>