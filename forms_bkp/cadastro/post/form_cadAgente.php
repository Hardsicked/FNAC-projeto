<?php
	include "../../../php/connect.php";
	$subGrupo = $_POST["subGrupo"];
	$nmAgente = $_POST["nmAgente"];
	$codigoAgente = $_POST["codigoAgente"];
	$codigoESocial = $_POST["codigoESocial"];
	$unidadeMedida = $_POST["unidadeMedida"];
	$divisor = $_POST["divisor"];
	$constante = $_POST["constante"];
	$nivelAcao = $_POST["nivelAcao"];
	$limiteExposicao = $_POST["limiteExposicao"];
	$limiteExposicaoMaxima = $_POST["limiteExposicaoMaxima"];
	$nivelAcaoACGIH = $_POST["nivelAcaoACGIH"];
	$limiteACGIH = $_POST["limiteacgih"];
	$metodoMedicao = $_POST["metodoMedicao"];
	$aparelhagem = $_POST["aparelhagem"];
	$danoSaude = $_POST["danoSaude"];
	$meioPropagacao = $_POST["meioPropagacao"];
	$regulamentacao = $_POST["regulamentacao"];

	

		$sql = "INSERT INTO tbagente(
							cdsubGrupo,
							nomeAgente,
							codigoAgente,
							codigoESocial,
							unidadeMedida,
							divisor,
							constante,
							nivelAcao,
							limiteExposicao,
							limiteExposicaoMaxima,
							nivelAcaoACGIH,
							limiteACGIH,
							metodoMedicao,
							aparelhagem,
							danoSaude,
							meioPropagacao,
							regulamentacao
						) values(
						'".$subGrupo."',
						'".$nmAgente."',
						'".$codigoAgente."',
						'".$codigoESocial."',
						'".$unidadeMedida."',
						'".$divisor."',
						'".$constante."',
						'".$nivelAcao."',
						'".$limiteExposicao."',
						'".$limiteExposicaoMaxima."',
						'".$nivelAcaoACGIH."',
						'".$limiteACGIH."',
						'".$metodoMedicao."',
						'".$aparelhagem."',
						'".$danoSaude."',
						'".$meioPropagacao."',
						'".$regulamentacao."')";
		if(mysqli_query($link, $sql)){
			echo "<script>alert('Agente Cadastrado com Sucesso.'); window.location='../../../syst.php';</script>";
		}else{
			echo "Erro ao Cadastrar Agente".mysqli_error($link);
		}
	

?>