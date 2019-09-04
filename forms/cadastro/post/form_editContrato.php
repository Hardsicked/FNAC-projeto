<?php
	include "../../../php/connect.php";
	$cdContrato = $_GET["p"];
	$cdEmpresa = $_POST["cdEmpresa"];
	$cnae = $_POST["cnae"];
	$riscoEmpresa = $_POST["riscoEmpresa"];
	$unidade = $_POST["unidade"];
	$responsavelEmpresa = $_POST["responsavelEmpresa"];
	$vDataInicial = $_POST["vDataInicial"];
	$vDataFinal = $_POST["vDataFinal"];
	$descContrato = $_POST["descContrato"];
	$valor = $_POST["valor"];
	$execDataInicial = $_POST["execDataInicial"];
	$execDataFinal = $_POST["execDataFinal"];
	$equipeEnvolvida = $_POST["equipeEnvolvida"];
	$ltcat = $_POST["ltcat"];
	$PPRA_quant = $_POST["PPRA_quant"];
	$PPRA_direta = $_POST["PPRA_direta"];
	$PPRA_qualit = $_POST["PPRA_qualit"];
	$gestao = $_POST["gestao"];
	$med_ambient = $_POST["med_ambient"];
	$resumoAtividade = $_POST["resumoAtividade"];
	$sql = "UPDATE tbcontrato SET CNAE='".$cnae."', risco_empresa='".$riscoEmpresa."', unidade='".$unidade."', responsavelEmpresa='".$responsavelEmpresa."', v_data_inicial='".$vDataInicial."', v_data_final='".$vDataFinal."', desc_contrato='".$descContrato."', valor='".$valor."', exec_data_inicial='".$execDataInicial."', exec_data_final='".$execDataFinal."', equipe_envolv='".$equipeEnvolvida."', LTCAT='".$ltcat."', PPRA_quant='".$PPRA_quant."', PPRA_direta='".$PPRA_direta."', PPRA_qualit='".$PPRA_qualit."', gestao='".$gestao."', med_ambient='".$med_ambient."', resumo='".$resumoAtividade."' WHERE cdContrato ='".$cdContrato."'";
	if(mysqli_query($link, $sql)){
		echo "Contrato editado com Sucesso!";
	}else{
		echo "Erro ao editar Contrato".mysqli_error($link);
	}
?>