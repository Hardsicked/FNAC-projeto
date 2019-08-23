<?php 
	include "../../../php/connect.php";
	$cdRisco = $_POST["cdRisco"];
	$dataaval = $_POST["dataaval"];
	$resultado = $_POST["texto"];
	$epia = $_POST["epia"];
	$obs = $_POST["obs"];
	$GFIP = $_POST["gfip"];
	$sql = "INSERT INTO tbresultado_qual(cdRisco,dataAval,texto,epiAdequada,obs,GFIP) VALUES('".$cdRisco."', '".$dataaval."', '".$resultado."', '".$epia."', '".$obs."',  '".$GFIP."')";
	if(mysqli_query($link, $sql)){
		echo "<script>alert('Resultado Qualitativo Cadastrado com Sucesso.'); window.close();</script>";
	}else{
		echo "Erro ao cadastrar resultado".mysqli_error($link);
	}
?>