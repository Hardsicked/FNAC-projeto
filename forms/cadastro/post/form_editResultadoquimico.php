<?php 
	include "../../../php/connect.php";
	$cresult = $_POST["cdresultado"];
	$cdRisco = $_POST["cdRisco"];
	$dataaval = $_POST["dataaval"];
	$rastreio = $_POST["rastreio"];
	$resultado = $_POST["resultado"];
	$sio2 = $_POST["sio2"];
	$obs = $_POST["obs"];
	if($_POST["imprimir"] == 1){
		$imprimir = 1;
	}else{
		$imprimir = 0;
	} 
	$GFIP = $_POST["gfip"];
	$sql = "UPDATE tbresultado_quim SET 
	cdRisco = '".$cdRisco."',
	codigoRastreio = '".$rastreio."',
	dataAvaliacao = '".$dataaval."',
	concentracaomg = '".$resultado."',
	prcntgSio2 = '".$sio2."',
	imprimirSio2 = '".$imprimir."',
	GFIP = '".$GFIP."',
	obs = '".$obs."'
	WHERE cdQuim = ".$cresult;
	if(mysqli_query($link, $sql)){
		echo "<script>alert('Resultado Químico Modificado com Sucesso.'); window.close();</script>";
	}else{
		echo "Erro ao cadastrar resultado".mysqli_error($link);
	}
?>