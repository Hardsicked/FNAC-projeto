<?php  
	include "../../../php/connect.php";
	error_reporting(E_ALL);
	$numAgentes = 0;
	$contAgente = 0;
	$ghe = $_POST["GHE"];
	$tipoFicha = $_POST["tipo"];
	$drn = $_POST["drn"];
	$numAmos = $_POST["numAmos"];
	$codRastreio = $_POST["codRastreio"];
	$dataaval = $_POST["dataaval"];
	$concMed = $_POST["concMedicao"];
	$sio2 = $_POST["sio2"];
		$agente1 = $_POST["cdAgente1"];
	$agente2 = $_POST["cdAgente2"];
	$agente3 = $_POST["cdAgente3"];
	$agente4 = $_POST["cdAgente4"];
	$agente5 = $_POST["cdAgente5"];
	$agente6 = $_POST["cdAgente6"];
	$agente7 = $_POST["cdAgente7"];
	$agente8 = $_POST["cdAgente8"];
	$agente9 = $_POST["cdAgente9"];
	$agente10 = $_POST["cdAgente10"];
	$sql = "INSERT INTO tbficha_campo(cdGHE,tipo,DR,numAmostrador,codRastreio,dataAval,concMedicao,sio2,cdAgente1,cdAgente2,cdAgente3,cdAgente4,cdAgente5,cdAgente6,cdAgente7,cdAgente8,cdAgente9,cdAgente10,) VALUES('".$ghe."','".$tipoFicha."','".$numAmos."','".$codRastreio."','".$dataaval."','".$concMed."','".$sio2."','".$agente1."','".$agente2."',	'".$agente3."',	'".$agente4."',	'".$agente5."',	'".$agente6."',	'".$agente7."',	'".$agente8."',	'".$agente9."',	'".$agente10."',)";
		if(mysqli_query($link, $sql)){
			echo "1";

		}
	
?>