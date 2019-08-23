<?php
	include "../../../php/connect.php";
	$cdAgente = $_GET["cdAgente"];
	$tpAgente = $_POST["tpAgente"];
	$subGrupo = $_POST["subGrupo"];
	$nmAgente = $_POST["nmAgente"];
	$codigoAgente = $_POST["codigoAgente"];
	$codigoESocial = $_POST["codigoESocial"];
	$unidadeMedida = join(", ", $_POST["unidadeMedida"]);
	$divisor = $_POST["divisor"];
	$constante = $_POST["constante"];
	$nivelAcao = $_POST["nivelAcao"];
	$limiteExposicao = $_POST["limiteExposicao"];
	$limiteExposicaoMaxima = $_POST["limiteExposicaoMaxima"];
	$nivelAcaoACGIH = $_POST["nivelAcaoACGIH"];
	$metodoMedicao = $_POST["metodoMedicao"];
	$aparelhagem = $_POST["aparelhagem"];
	$danoSaude = null;
	$meioPropagacao = $_POST["meioPropagacao"];
	$sql = "UPDATE tbagente SET tipoAgente='".$tpAgente."', subGrupo='".$subGrupo."', nomeAgente='".$nmAgente."', codigoAgente='".$codigoAgente."', codigoESocial='".$codigoESocial."', unidadeMedida='".$unidadeMedida."', divisor='".$divisor."', constante='".$constante."', nivelAcao='".$nivelAcao."', limiteExposicao='".$limiteExposicao."', limiteExposicaoMaxima='".$limiteExposicaoMaxima."', nivelAcaoACGIH='".$nivelAcaoACGIH."', metodoMedicao='".$metodoMedicao."', aparelhagem='".$aparelhagem."', danoSaude='".$danoSaude."', meioPropagacao='".$meioPropagacao."' WHERE cdAgente='".$cdAgente."'";
	if(mysqli_query($link, $sql)){
		echo "<script>alert('Agente editado com Sucesso'); window.location='../../../syst.php';</script>";
	}else{
		echo "Erro ao editar Agente".mysql_error($link);
	}
?>