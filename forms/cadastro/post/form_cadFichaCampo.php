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
	$sql = "INSERT INTO tbficha_campo(cdGHE,tipo,DR,numAmostrador,codRastreio,dataAval,concMedicao,sio2) VALUES('".$ghe."','".$tipoFicha."','".$numAmos."','".$codRastreio."','".$dataaval."','".$concMed."','".$sio2."')";
		if(mysqli_query($link, $sql)){
			$cdFicha = $link->lastInsertId();
			foreach ($_POST['agentes'] as $formAgente){
				$numAgentes++;
				$sql_agente = "INSERT INTO tbficha_agente (cdFicha,cdAgente) VALUES ('".$cdFicha."','".$cdAgente."')";
				if(mysqli_query($link, $sql_agente)){
					$contAgente++;
				}
			}
			if($numAgentes == $contAgente){
				echo "1";
			}

		}
	
?>