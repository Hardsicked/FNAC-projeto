<?php
	include "../../../php/connect.php";
	$cdEquipamento = $_GET["cdEquipamento"];
	$tpEquipamento = $_POST["tpEquipamento"];
	$nmEquipamento = $_POST["nmEquipamento"];
	$numero = $_POST["numero"];
	$numeroSerie = $_POST["numeroSerie"];
	$certCalibracao = $_POST["certCalibracao"];
	$dataValidacao = $_POST["dataValidacao"];
	$sql = "UPDATE tbequipamento SET tipoEquipamento='".$tpEquipamento."', nome='".$nmEquipamento."', numero='".$numero."', numeroSerie='".$numeroSerie."', certCalibracao='".$certCalibracao."', dataValidade='".$dataValidacao."' WHERE cdEquipamento='".$cdEquipamento."'";
	if(mysqli_query($link, $sql)){
		echo "Equipamento editado com sucesso!";
	}else{
		echo "Erro ao editar equipamento".mysqli_error($link);
	}
?>