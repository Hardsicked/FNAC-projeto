<?php  
	include "../../../php/connect.php";
	error_reporting(E_ALL);
	$ghe = $_POST["GHE"];
	$tipoFicha = $_POST["tipo"];
	$DR = $_POST["drn"];
	$numAmos = $_POST["numAmos"];
	$codRastreio = $_POST["codRastreio"];
	$dataAval = $_POST["dataAval"];
	$concMed = $_POST["concMedicao"];
	$sio2 = $_POST["sio2"];
	
	$cdAgente1 = $_POST["cdAgente1"];
	$cdAgente2 = $_POST["cdAgente2"];
	$cdAgente3 = $_POST["cdAgente3"];
	$cdAgente4 = $_POST["cdAgente4"];
	$cdAgente5 = $_POST["cdAgente5"];
	$cdAgente6 = $_POST["cdAgente6"];
	$cdAgente7 = $_POST["cdAgente7"];
	$cdAgente8 = $_POST["cdAgente8"];
	$cdAgente9 = $_POST["cdAgente9"];
	$cdAgente10 = $_POST["cdAgente10"]; 

	$sql = "INSERT INTO tbficha_campo(
			cdFicha,
			cdGHE,
			tipo,
			DR,
			numAmostrador,
			codRastreio,
			dataAval,
			concMedicao,
			sio2,
			cdAgente1,
			cdAgente2,
			cdAgente3,
			cdAgente4,
			cdAgente5,
			cdAgente6,
			cdAgente7,
			cdAgente8,
			cdAgente9,
			cdAgente10
		) VALUES(
			NULL,
			$ghe,
			$tipoFicha,
			$DR,
			$numAmos,
			$codRastreio,
			'$dataAval',
			$concMed,
			$sio2,
			$cdAgente1,
			$cdAgente2,
			$cdAgente3,
			$cdAgente4,
			$cdAgente5,
			$cdAgente6,
			$cdAgente7,
			$cdAgente8,
			$cdAgente9,
			$cdAgente10
		)";
	
		if(mysqli_query($link, $sql)){
			echo "<script>alert('Ficha Cadastrada com Sucesso.'); window.location=./../../syst.php';</script>";
		}else{
			echo "Erro ao Cadastrar Ficha".mysqli_error($link);
		}
	
?>