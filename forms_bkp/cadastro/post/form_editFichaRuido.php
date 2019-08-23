<?php  
	include "../../../php/connect.php";
	$cdFichaRuido = $_GET["cdFichaRuido"];
	$codFicha = $_POST["codFicha"];
	$cdGHE = $_POST["cdGHE"];
	$dataAvaliacao = $_POST["dataAvaliacao"];
	$cdInstrumento = $_POST["cdInstrumento"];
	$cdCalibrador = $_POST["cdCalibrador"];
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
	$diaTipico = $_POST["diaTipico"];
	$amostraValida = $_POST["amostraValida"];
	$colabAval = $_POST["colabAval"];
	$matricColabAval = $_POST["matricColabAval"];
	$supervImediato = $_POST["supervImediato"];
	$matricSuperv = $_POST["matricSuperv"];
	$avaliador = $_POST["avaliador"];
	$matricAval = $_POST["matricAval"];
	$sql = "UPDATE tbficharuido SET codFicha='".$codFicha."', cdGHE='".$cdGHE."', dataAvaliacao='".$dataAvaliacao."', cdInstrumento='".$cdInstrumento."', cdCalibrador='".$cdCalibrador."', cdEPI='".$cdEPI."', EPC='".$EPC."', descAtividades='".$descAtividades."', local='".$local."', horaInicial='".$horaInicial."', horaFinal='".$horaFinal."', valHoraInicial='".$valHoraInicial."', valIntervaloInicial='".$valIntervaloInicial."', valIntervaloFinal='".$valIntervaloFinal."', valHoraFinal='".$valHoraFinal."', diaTipico='".$diaTipico."', amostraValida='".$amostraValida."', colabAval='".$colabAval."', matricColabAval='".$matricColabAval."', supervImediato='".$supervImediato."', matricSuperv='".$matricSuperv."', avaliador='".$avaliador."', matricAval='".$matricAval."' WHERE cdFichaRuido='".$cdFichaRuido."'";
	if(mysqli_query($link, $sql)){
		echo "<p>Ficha Ruido editada com sucesso!</p>";
	}else{
		echo "Erro ao editar ficha ruido".mysqli_error($link);
	}
?>