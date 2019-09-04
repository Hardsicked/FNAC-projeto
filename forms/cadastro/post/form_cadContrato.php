<?php
	include "../../../php/connect.php";
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
	if(isset($_POST["btnSave"])){
		$sql = "INSERT INTO tbcontrato(cdEmpresa,CNAE,risco_empresa,unidade,responsavelEmpresa,v_data_inicial,v_data_final,desc_contrato,valor,exec_data_inicial,exec_data_final,equipe_envolv,LTCAT,PPRA_quant,PPRA_direta,PPRA_qualit,gestao,med_ambient,resumo) VALUES('".$cdEmpresa."', '".$cnae."', '".$riscoEmpresa."', '".$unidade."', '".$responsavelEmpresa."', '".$vDataInicial."', '".$vDataFinal."', '".$descContrato."', '".$valor."', '".$execDataInicial."', '".$execDataFinal."', '".$equipeEnvolvida."', '".$ltcat."', '".$PPRA_quant."', '".$PPRA_direta."', '".$PPRA_qualit."', '".$gestao."', '".$med_ambient."', '".$resumoAtividade."')";
		if(mysqli_query($link, $sql)){
			echo "<script>alert('Contrato Cadastrado com Sucesso.') ; window.location('../../../syst.php');</script>";
		}else{
			echo "<script>alert('Erro ao cadastrar Contrato.".mysqli_error($link)."')</script>";
		}
	}
?>