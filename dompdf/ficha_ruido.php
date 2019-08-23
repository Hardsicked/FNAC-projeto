<?php

/* Carrega a classe DOMPdf */
require_once("dompdf/dompdf_config.inc.php");
include "../php/connect.php";
setlocale(LC_ALL, 'pt_BR.UTF-8', 'Portuguese_Brazil.1252');
$cdficha = $_GET['x'];
$id_empres = $_GET['y'];
$sql1 = "SELECT * FROM tbficha_ghe WHERE cdFicha =".$cdficha;
$qry1 = mysqli_query($link,$sql1);
foreach ($qry1 as $fghe){
	$dr = $fghe['DR'];
	$ghe = $fghe['cdGHE'];
	$ghe2 = $fghe['cdGHE'];
}
$sql_perfis = "SELECT * FROM tbperfis WHERE cdEmpresa = ".$id_empres." LIMIT 1";
$perfis = mysqli_query($link,$sql_perfis);
	foreach ($perfis as $perfis){
		$engenheiro = $perfis["responsavel"];
		$cargoeng = $perfis["cargoeng"];
		$tecnico = $perfis["tecnico"];
		$cargotec = $perfis["cargotec"];
		$arquivoassinatura = $perfis["logomarca"];
		$enderecoperfil = $perfis["endereco"];
		$bol_logo_rodape = $perfis["logorodape"];
		$headerperfil = '<img style="width:130px;" src="../img_perfil/'.$arquivoassinatura.'" />';
	}
$sql1 = "SELECT * FROM tbficha_ruido WHERE cdFicha = ".$cdficha;
$qry1 = mysqli_query($link,$sql1);
foreach ($qry1 as $ruido){
	$dataAval = date("d/m/Y",strtotime($ruido['dataAval']));
	$hrinicio = date("H:i", strtotime($ruido['hrInicio']));
	$hrfinal =  date("H:i", strtotime($ruido['hrFinal']));
	$intvalinicial =  date("H:i", strtotime($ruido['intervaloInicial']));
	$intvalfinal = date("H:i", strtotime($ruido['intervaloFinal']));
	$tempomed = round($ruido['tempoDeMedicao'], 0);
	if($ruido['diaTipico'] == 1){
		$diaTipico = 'Sim';
	}elseif($ruido['diaTipico'] == 0){
		$diaTipico = 'Não';
	}
	$justificativa = $ruido['justificativa'];
	if( $ruido['amostraValida'] == 1){
		$amostra = 'Sim';
	}elseif( $ruido['amostraValida'] == 0){
		$amostra = 'Não';
	}
	if($ruido['amostraValida'] == 1){
		$amostra = "Sim";
	}else{
		$amostra = "Não";
	}	
	$cdEpi = $ruido['cdEpi'];
	$epc = $ruido['EPC'];
	$cdInstrumento = $ruido['cdInstrumento'];
	$cdCalibrador = $ruido['cdCalibrador'];
	$colab = $ruido['colaborador'];
	$colabma = $ruido['colaborador_ma'];
	$superv = $ruido['supervisor'];
	$supervma = $ruido['supervisor_ma'];
	$aval = $ruido['avaliador'];
	$avalma = $ruido['avaliador_ma'];
	$pasta = $ruido['pasta'];
	$arquivo1 = '../ficha/'.$pasta.'/'.'1.';
	$arquivo2 = '../ficha/'.$pasta.'/'.'2.';
	if(file_exists($arquivo1.'png')){
		$arquivo1 = $arquivo1.'png';
	}elseif(file_exists($arquivo1.'jpg')){
		$arquivo1 = $arquivo1.'jpg';
	}elseif(file_exists($arquivo1.'gif')){
		$arquivo1 = $arquivo1.'gif';
	}
	if(file_exists($arquivo2.'png')){
		$arquivo2 = $arquivo2.'png';
	}elseif(file_exists($arquivo2.'jpg')){
		$arquivo2 = $arquivo2.'jpg';
	}elseif(file_exists($arquivo2.'gif')){
		$arquivo2 = $arquivo2.'gif';
	}
}
$sql1 = "SELECT * FROM tbghe WHERE cdGHE = ".$ghe;
$qry1 = mysqli_query($link,$sql1);
foreach ($qry1 as $ghe){
	$cdcontrato = $ghe['cdContrato'];
	$jornadaTrab = $ghe['jornadaTrab'];
	$cdsetor = $ghe['cdSetor'];
	$codGHE = $ghe['codGHE'];
}
$sql1 = "SELECT * FROM tbcontrato WHERE cdContrato = ".$cdcontrato;
$qry1 = mysqli_query($link,$sql1);
foreach ($qry1 as $contrato){
	$cdempresa = $contrato['cdEmpresa'];
	$unidade = $contrato['unidade'];

}
$sql1 = "SELECT * FROM tbempresa WHERE cdEmpresa = ".$cdempresa;
$qry1 = mysqli_query($link,$sql1);
foreach ($qry1 as $empresa){
	$nomeEmpresa = $empresa['nomeEmpresa'];
	$arquivo = $empresa['arquivo'];
}
$sql1 = "SELECT * FROM tbsetor WHERE cdSetor = ".$cdsetor;
$qry1 = mysqli_query($link,$sql1);
foreach ($qry1 as $setor){
	$cdgerencia = $setor['cdGerencia'];
	$nomeSetor = $setor['setor'];
}
$sql1 = "SELECT * FROM tbgerencia WHERE cdGerencia = ".$cdgerencia;
$qry1 = mysqli_query($link,$sql1);
foreach ($qry1 as $gerencia){
	$nomeGerencia = $gerencia['gerencia'];
}
$sql1 = "SELECT * FROM tbequipamento WHERE cdEquipamento = ".$cdInstrumento;
$qry1 = mysqli_query($link,$sql1);
foreach ($qry1 as $instrumento){
	$nomeInstrumento = $instrumento['nome'];
	$numeroserieI = $instrumento['numeroSerie'];
	$calibInstrumento = $instrumento['certCalibracao'];
	$dataInstrumento = date("d/m/Y",strtotime($instrumento['dataValidade']));
}
$sql1 = "SELECT * FROM tbequipamento WHERE cdEquipamento = ".$cdCalibrador;
$qry1 = mysqli_query($link,$sql1);
foreach ($qry1 as $calibrador){
	$nomeCalibrador = $calibrador['nome'];
	$numeroserieC = $calibrador['numeroSerie'];
	$calibCalibrador = $calibrador['certCalibracao'];
	$dataCalibrador = date("d/m/Y",strtotime($calibrador['dataValidade']));
}
$sql1 = "SELECT * FROM tbepi WHERE cdEPI = ".$cdEpi;
$qry1 = mysqli_query($link,$sql1);
foreach ($qry1 as $epi){
	$nomeEPI = $epi['nome'];
	$fabricanteEPI = $epi['fabricante'];
	$modeloEPI = $epi['modelo'];
	$CA = $epi['ca'];
	$atenuacao = $epi['nivelProtecao'];
}
$sql1 = "SELECT * FROM tbficha_ruido_info WHERE cdFicha = ".$cdficha;
$qry1 = mysqli_query($link,$sql1);
foreach ($qry1 as $info){
$hrinicial = date("H:i", strtotime($info['horaInicial']));
$hrfinal = date("H:i", strtotime($info['horaFinal']));
	$informacoes .= '<tr>
						<td>'.$info['ativ'].'</td>
						<td>'.$info['local'].'</td>
						<td>'.$hrinicial.' ás '.$hrfinal.'</td>
						<td>'.$info['fonte'].'</td>
					</tr>';
}
$sql1 = "SELECT * FROM tbcargos WHERE cdGHE = ".$ghe2;
$qry1 = mysqli_query($link,$sql1);
foreach ($qry1 as $cargos){
	$cargo .= '<tr><td>'.$cargos['cargo'].'</td></tr>';
}
/* Cria a instância */
$dompdf = new DOMPDF();
$dompdf->load_html('<html>
	<head>
	<style>
		@page {
            margin: 0.4cm 0cm;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin: 3.3cm 0.8cm 0.8cm 0.8cm;
            font-family: helvetica, arial;
        }
		.header,
		.footer {
			width: 100%;
			text-align: center;
			position: fixed;
		}
		.header {
			top: 0px;
			
			margin-right: 0.3cm;
			margin-left: 0.3cm;
		}
		.header ul{
			list-style: none;
		}
		.footer {
			bottom: 25px;
			font-size: 10px;
			line-height: 0.8;
		}
		.pagenum:before {
			content: counter(page);
		}
		h2{
			margin: 0;
		}
		p{
			text-align: justify;
			text-indent: 2em;
			font-size: 14px;
			line-height: 1.6;
		}
		a,td,th{
			font-size: 12px;
		}
		.reta{
			height: 1px; 
			background: #222; 
			display: inline-block; 
			margin-top: 10px;
		}
	</style>
	</head>
	<body>
	<div class="header">
		<table cellspacing=0 cellpadding=2>  
			<tr>
			    <td style="">'.$headerperfil.'</td>
			    <td style="width:370px; text-align: center; padding-left: 60px; padding-right: 60px; font-size: 25px;"><b> Ficha de Campo Avaliação Ruído</b></td>
			    <td><img style="width:140px;" src="../img_empresas/'. $arquivo .'"/></td>
			    <td style="padding-top: 7px; padding-right: 30px; padding-bottom: 10px ">
			    </td>
			</tr>
		</table>
	</div> 
	<div style="page-break-inside:always; height: 22cm;">
		<div style="background-color: #ccc; width: 100%;">
			<a style="float: left; text-align: right;"><b>1.IDENTIFICAÇÃO</b></a>
			<a style="float: center;"><b>DRº </b> '.$dr.'</a>
			<a style="float: right;"><b>Data: </b> '.$dataAval.'</a>
		</div>
		<table style="width: 100%;">
			<tr>
				<td><b>Empresa:</b> '.$nomeEmpresa.'</td>
				<td><b>Gerência:</b> '.$nomeGerencia.'</td>
			</tr>
			<tr>
				<td><b>Unidade:</b> '.$unidade.'</td>
				<td><b>Setor/Local:</b> '.$nomeSetor.'</td>
			</tr>
			<tr>
				<td><b>Jornada de Trabalho:</b> '.$jornadaTrab.'</td>
				<td><b>Código GHE:</b> '.$codGHE.'</td>
			</tr>
		</table>
		<div style="background-color: #ccc; width: 100%;  margin-bottom: 10px;">
			<a style="float: left; text-align: right;"><b>2.CARGOS/FUNÇÃO</b></a>
			<a style="float: right;"><b>IMAGENS</b></a>
		</div>
		<div>
			<div style="padding-left: 50%; float: left; width: 50%;">
				<table>
					'.$cargo.'
				</table>
			</div>
			<div style="float: left; width: 50%;">
				<img style="margin-right: 5%;" src="'.$arquivo1.'" width="45%" height="auto"/>
				<img src="'.$arquivo2.'" width="45%" height="auto"/>
			</div>
		</div>
		<div style="background-color: #ccc; width: 100%;  margin-bottom: 10px;">
			<a style="float: left; text-align: right;"><b>3.DADOS EQUIPAMENTOS</b></a>
		</div>
		<table style="width: 100%;">
			<tr>
				<td><b>Instrumento:</b> '.$nomeInstrumento.'</td>
				<td><b>Número de Série:</b> '.$numeroserieI.'</td>
			</tr>
			<tr>
				<td><b>Certific. calibração:</b> '.$calibInstrumento.'</td>
				<td><b>Val. de Calibração:</b> '.$dataInstrumento.'</td>
			</tr>
			<tr>
				<td><b>Calibrador:</b> '.$nomeCalibrador.'</td>
				<td><b>Número de Série:</b> '.$numeroserieC.'</td>
			</tr>
			<tr>
				<td><b>Certific. calibração:</b> '.$calibCalibrador.'</td>
				<td><b>Val. de Calibração:</b> '.$dataCalibrador.'</td>
			</tr>
		</table>
		<div style="background-color: #ccc; width: 100%;  margin-bottom: 10px;">
			<a style="float: left; text-align: right;"><b>4.PROTEÇÃO PESSOAL / COLETIVA</b></a>
		</div>
		<table style="width: 100%;">
			<tr>
				<td><b>Tipo E.P.I: </b></td>
				<td>'.$nomeEPI.'</td>
				<td><b>Fabricante:</b></td>
				<td>'.$fabricanteEPI.'</td>
				<td><b>Modelo</b></td>
				<td>'.$modeloEPI.'</td>
				<td><b>Nº CA</b></td>
				<td>'.$CA.'</td>
				<td rowspan="2">Nível de Atenuação (dba): </td>
				<td rowspan="2">'.$atenuacao.'</td>
			</tr>
			<tr>
				<td><b>EPC: </b></td>
				<td>'.$epc.'</td>
				<td colspan="6"></td>
			</tr>
		</table>
		<table cellspacing=0 style="width: 100%; margin-bottom: 10px;">
			<tr style="background-color: #ccc;">
				<td><b>5.DESCRIÇÃO DAS ATIVIDADES</b></td>
				<td><b>Local</b></td>
				<td><b>Horário</b></td>
				<td><b>Fonte do Agente</b></td>
			</tr>
			'.$informacoes.'
		</table>
		<div style="background-color: #ccc; width: 100%;  margin-bottom: 10px;">
			<a style="float: left; text-align: right;"><b>6.VALIDAÇÃO DA MEDIÇÃO</b></a>
		</div>
		<table style="width: 98%;">
			<tr>
				<td style="font-size: 10px; width: 20%"><b>Hora Início: </b>'.$hrinicio.'</td>
				<td style="font-size: 10px; width: 20%"><b>Interv.Inicial: </b>'.$intvalinicial.'</td>
				<td style="font-size: 10px; width: 20%"><b>Interv.Final: </b>'.$intvalfinal.'</td>
				<td style="font-size: 10px; width: 20%"><b>Término Avaliação: </b>'.$hrfinal.'</td>
				<td style="font-size: 10px; width: 20%"><b>Tempo Total: </b>'.$tempomed.' Min</td>
			</tr>
			<tr>
				<td style="font-size: 10px; width: 33%"><b>Dia Típico: </b>'.$diaTipico.'</td>
				<td style="font-size: 10px; width: 33%"><b>Justificativa: </b>'.$justificativa.'</td>
				<td style="font-size: 10px; width: 33%"><b>Amostra Válida: </b>'.$amostra.'</td>
			</tr>
		</table>
		<table border=0.5 cellpadding=1 cellspacing=0 style="width: 94%; padding-left: 3%; margin-top: 10px;">
			<tr>
				<th style="width: 15%">Colaborador Avaliado:</th>
				<td style="width: 25%">'.$colab.'</td>
				<th style="width: 25%">Matrícula: '.$colabma.'</th>
				<td style="width: 30%">Assinatura:</td>
			</tr>
			<tr>
				<th style="width: 15%">Supervisor Imediato:</th>
				<td style="width: 25%">'.$superv.'</td>
				<th style="width: 25%">Matrícula: '.$supervma.'</th>
				<td style="width: 30%">Assinatura:</td>
			</tr>
			<tr>
				<th style="width: 15%">Avaliador Responsável:</th>
				<td style="width: 25%">'.$aval.'</td>
				<th style="width: 25%">Matrícula: '.$avalma.'</th>
				<td style="width: 30%">Assinatura:</td>
			</tr>
		</table>
	</div>
	</body>
	</html>
	');
/* Renderiza */
$dompdf->render();


/* Exibe */
$dompdf->stream(
	"saida.pdf", /* Nome do arquivo de saída */
	array(
		"Attachment" => false /* Para download, altere para true */
	)
);
?>
