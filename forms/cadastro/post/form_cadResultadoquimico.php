<?php 
	include "../../../php/connect.php";
	$cdRisco = $_POST["cdRisco"];
	$dataaval = $_POST["dataaval"];
	$rastreio = $_POST["rastreio"];
	$resultado = $_POST["resultado"];
	$sio2 = $_POST["sio2"];
	$imprimir = $_POST["imprimir"];

	if($imprimir != 1){
		$imprimir = 0;
	}
	
	$GFIP = $_POST["gfip"];
	$obs = $_POST["obs"];

	$sql = "INSERT INTO tbresultado_quim(
		cdRisco,
		codigoRastreio,
		dataAvaliacao,
		concentracaomg,
		prcntgSio2,
		imprimirSio2,
		GFIP,
		obs
	) VALUES(
		$cdRisco,
		$rastreio,
		'$dataaval',
		$resultado,
		$sio2,
		$imprimir,
		$GFIP,
		$obs
	)";
	
	if(mysqli_query($link, $sql)){
		echo "<script>alert('Resultado Químico Cadastrado com Sucesso.'); window.close();</script>";
	}else{
		echo "Erro ao cadastrar resultado".mysqli_error($link);
		//var_dump($_POST);
	}
?>