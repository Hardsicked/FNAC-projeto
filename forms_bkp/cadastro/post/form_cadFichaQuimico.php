<?php
	include "../../../php/connect.php";
	$codFicha = $_POST["codFicha"];
	$cdGHE = $_POST["cdGHE"];
	$dataAvaliacao = $_POST["dataAvaliacao"];
	$cdInstrumento = $_POST["cdInstrumento"];
	$cdCalibrador = $_POST["cdCalibrador"];
	$cdAmostra = $_POST["cdAmostra"];
	$cdEPI = $_POST["cdEPI"];
	$EPC = $_POST["EPC"];
	$descAtividades = $_POST["descAtividades"];
	$local = $_POST["local"];
	$horaInicial = $_POST["horaInicial"];
	$horaFinal = $_POST["horaFinal"];
	$valHoraInicial = $_POST["valHoraInicial"];
	$valIntervaloInicial = $_POST["valIntervaloInicial"];
	$valIntervaloFinal = $_POST["valIntervaloFinal"];
	$valHoraFinal = $_POST["valHoraFinal"];
	$vazaoInicial = $_POST["vazaoInicial"];
	$vazaoFinal = $_POST["vazaoFinal"];
	$vazaoMedia = $_POST["vazaoMedia"];
	$varVazao = $_POST["varVazao"];
	$volumeTotal = $_POST["volumeTotal"];
	$temperatura = $_POST["temperatura"];
	$uraInicial = $_POST["uraInicial"];
	$uraFinal = $_POST["uraFinal"];
	$cdMetodo = $_POST["cdMetodo"];
	$diaTipico = $_POST["diaTipico"];
	$amostraValida = $_POST["amostraValida"];
	$colabAval = $_POST["colabAval"];
	$matricColabAval = $_POST["matricColabAval"];
	$supervImediato = $_POST["supervImediato"];
	$matricSuperv = $_POST["matricSuperv"];
	$avaliador = $_POST["avaliador"];
	$matricAval = $_POST["matricAval"];
	$sql = "INSERT INTO tbfichaquimic(codFicha,cdGHE,dataAvaliacao,cdInstrumento,cdCalibrador,cdAmostra,cdEPI,EPC,descAtividades,local,horaInicial,horaFinal,valHoraInicial,valIntervaloInicial,valIntervaloFinal,valHoraFinal,vazaoInicial,vazaoFinal,vazaoMedia,varVazao,volumeTotal,temperatura,uraInicial,uraFinal,cdMetodo,diaTipico,amostraValida,colabAval,matricColabAval,supervImediato, matricSuperv, avaliador, matricAval) VALUES('".$codFicha."', '".$cdGHE."'. '".$dataAvaliacao."', '".$cdInstrumento."', '".$cdCalibrador."', '".$cdAmostra."', '".$cdEPI."', '".$EPC."', '".$descAtividades."', '".$local."', '".$horaInicial."', '".$horaFinal."', '".$valHoraInicial."', '".$valIntervaloInicial."', '".$valIntervaloFinal."', '".$valHoraFinal."', '".$vazaoInicial."', '".$vazaoFinal."', '".$vazaoMedia."', '".$varVazao."', '".$volumeTotal."', '".$temperatura."', '".$uraInicial."', '".$uraFinal."', '".$cdMetodo."', '".$diaTipico."', '".$amostraValida."', '".$colabAval."', '".$matricColabAval."', '".$supervImediato."', '".$matricSuperv."', '".$avaliador."', '".$matricAval."')";
	if(isset($_POST["btnSave"])){
		if(mysqli_query($link, $sql)){
			echo "<p>Ficha Quimica cadastrada com sucesso!</p>";
		}else{
			echo "Erro ao cadastrar Ficha Quimica".mysqli_error($link);
		}
	}
?>