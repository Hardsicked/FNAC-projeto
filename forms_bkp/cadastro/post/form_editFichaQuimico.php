<?php
	include "../../../php/connect.php";
	$cdFichaQuim = $_GET["cdFichaQuim"];
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
	$sql "UPDATE tbfichaquimic SET codFicha='".$codFicha."', cdGHE='".$cdGHE."', dataAvaliacao='".$dataAvaliacao."', cdInstrumento='".$cdInstrumento."', cdCalibrador='".$cdCalibrador."', cdAmostra='".$cdAmostra."', cdEPI='".$cdEPI."', EPC='".$EPC."', descAtividades='".$descAtividades."', local='".$local."', horaInicial='".$horaInicial."', horaFinal='".$horaFinal."', valHoraInicial='".$valHoraInicial."', valIntervaloInicial='".$valIntervaloInicial."', valIntervaloFinal='".$valIntervaloFinal."', valHoraFinal='".$valHoraFinal."', vazaoInicial='".$vazaoInicial."', vazaoFinal='".$vazaoFinal."', vazaoMedia='".$vazaoMedia."', varVazao='".$varVazao."', volumeTotal='".$volumeTotal."', temperatura='".$temperatura."', uraInicial='".$uraInicial."', uraFinal='".$uraFinal."', cdMetodo='".$cdMetodo."', diaTipico='".$diaTipico."', amostraValida='".$amostraValida."', colabAval='".$colabAval."', matricColabAval='".$matricColabAval."', supervImediato='".$supervImediato."', matricSuperv='".$matricSuperv."', avaliador='".$avaliador."', matricAval='".$matricAval."' WHERE cdFichaQuim='".$cdFichaQuim."'";
	if(mysqli_query($link, $sql)){
		echo "<p>Ficha Quimica editada com sucesso!</p>";
	}else{
		echo "Erro ao editar Ficha Quimica".mysqli_error($link);
	}
?>