<?php
	include "../../../php/connect.php";
	$cdGHE = $_GET["c"];
	$cdContrato = $_POST["cdContrato"];
	$codGHE = $_POST["codGHE"];
	$nomeGHE = $_POST["nomeGHE"];
	$numEmpregados = $_POST["numEmpregados"];
	$jornadaTrab = $_POST["jornadaTrab"];
	$setor = $_POST["cdSetor"];
	$descTrab = $_POST["descTrab"];
	$tipoCont = $_POST["tipoCont"];
	$descAtiv = $_POST["descAtiv"];
	$cargosGHE = $_POST["cargosGHE"];
	$sql = "UPDATE tbghe SET cdContrato='".$cdContrato."', codGHE='".$codGHE."', cdSetor='".$setor."', nomeGHE='".$nomeGHE."', numEmpregados='".$numEmpregados."', jornadaTrab='".$jornadaTrab."', descTrab='".$descTrab."', tipoCont='".$tipoCont."' WHERE cdGHE=".$cdGHE;
	if(mysqli_query($link, $sql)){
		echo "<script>alert('GHE modificado com sucesso!.'); window.location='../../../syst.php';</script>";
	}else{
		echo "Erro ao editar GHE".mysqli_error($link);
	}
?>