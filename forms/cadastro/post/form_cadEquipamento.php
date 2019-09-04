<?php 
	include "../../../php/connect.php";
	$tpEquipamento = $_POST["tpEquipamento"];
	$nmEquipamento = $_POST["nmEquipamento"];
	$numero = $_POST["numero"];
	$numeroSerie = $_POST["numeroSerie"];
	$certCalibracao = $_POST["certCalibracao"];
	$dataValidacao = $_POST["dataValidacao"];
	if(isset($_POST["btnSave"])){
		$sql = "INSERT INTO tbequipamento(tipoEquipamento,nome,numero,numeroSerie,certCalibracao,dataValidade) VALUES('".$tpEquipamento."', '".$nmEquipamento."', '".$numero."', '".$numeroSerie."', '".$certCalibracao."', '".$dataValidacao."')";
		if(mysqli_query($link, $sql)){
			echo "<script>alert('Equipamento Cadastrado com Sucesso.'); window.location='../../../syst.php';</script>";
		}else{
			echo "Erro ao cadastrar Equipamento".mysqli_error($link);
		}
	}
?>