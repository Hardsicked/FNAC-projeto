<?php
include "../../../php/connect.php";
	$cdGrupo = $_GET['c'];
	$nome = $_POST["nomeGrupo"];
	$sql = "UPDATE tbgruposagente SET tipoAgente ='".$nome."' WHERE cdTipoAgente = ".$cdGrupo;
		$insert = mysqli_query($link, $sql);
		if($insert){
			echo "<script>alert('Grupo Modificado com Sucesso.');  window.location='../../../syst.php';</script>";
		}else{
			echo "<script>alert('Erro ao modificar Grupo".mysqli_error($link)."');</script>";
		}
?>