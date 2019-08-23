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
$sql1 = "SELECT * FROM tbficha_quimico WHERE cdFicha = ".$cdficha;
$qry1 = mysqli_query($link,$sql1);
foreach ($qry1 as $quimico){
	$dataAval = date("d/m/Y", strtotime($quimico['dataAval']));
	$hrinicio = date("H:i", strtotime($quimico['hrInicio']));
	$hrfinal = date("H:i", strtotime($quimico['hrFinal']));
	$intvalinicial = date("H:i", strtotime($quimico['intervaloInicial']));
	$intvalfinal = date("H:i", strtotime($quimico['intervaloFinal']));
	$tempomed = round($quimico['tempoDeMedicao'], 0);
	$numamostrador = $quimico['numAmostrador'];
	$bc = $quimico['bc'];
	$vazaoinicial = $quimico['vazaoInicial'];
	$vazaofinal = $quimico['vazaoFinal'];
	$vazaomedia = $quimico['vazaoMedia'];
	$variavazao = $quimico['vazaoPrcnt'];
	$volumetotal = round($quimico['tempoDeMedicao'] * $quimico['vazaoMedia'], 0);
	$temp = $quimico['temp'];
	$urainicial = $quimico['uraInicial'];
	$urafinal = $quimico['uraFinal'];
	if($quimico['tipoAmos'] == 1){
		$tipoamostrador = "PVC";
	}else{
		if($quimico['tipoAmos'] == 2){
			$tipoamostrador = "Ester de celulose";
		}else{
			if($quimico['tipoAmos'] == 3){
				$tipoamostrador = "TCA";
			}else{
				if($quimico['tipoAmos'] == 4){
					$tipoamostrador = "TCP";
				}else{
					if($quimico['tipoAmos'] == 5){
						$tipoamostrador = "Negro de Fumo";
					}else{
						if($quimico['tipoAmos'] == 6){
							$tipoamostrador = "Impinjer";
						}else{
							if($quimico['tipoAmos'] == 7){
								$tipoamostrador = "Outro";
							}
						}
					}
				}
			}
		}
	}
	if($quimico['diaTipico'] == 1){
		$diaTipico = 'Sim';
	}elseif($quimico['diaTipico'] == 0){
		$diaTipico = 'Não';
	}
	$justificativa = $quimico['justificativa'];
	if($quimico['amostraValida'] == 1){
		$amostra = 'Sim';
	}else{
		$amostra = 'Não';
	}
	$cdEpi = $quimico['cdEpi'];
	$cdInstrumento = $quimico['cdInstrumento'];
	$cdCalibrador = $quimico['cdCalibrador'];
	$colab = $quimico['colaborador'];
	$colabm = $quimico['colaborador_ma'];
	$superv = $quimico['supervisor'];
	$supervm = $quimico['supervisor_ma'];
	$aval = $quimico['avaliador'];
	$avalm = $quimico['avaliador_ma'];
	$pasta = $quimico['pasta'];
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
	$sql_subg = "SELECT * FROM tbsubgrupoagente WHERE cdSubGrupo = ".$quimico['cdSubGrupoA'];
	$qry_subg = mysqli_query($link,$sql_subg);
	$sql_agent1 = "SELECT * FROM tbagente WHERE cdAgente = ".$quimico['cdAgente1'];
	$qry_agent1 = mysqli_query($link,$sql_agent1);
	$sql_agent2 = "SELECT * FROM tbagente WHERE cdAgente = ".$quimico['cdAgente2'];
	$qry_agent2 = mysqli_query($link,$sql_agent2);
	$sql_agent3 = "SELECT * FROM tbagente WHERE cdAgente = ".$quimico['cdAgente3'];
	$qry_agent3 = mysqli_query($link,$sql_agent3);
	$sql_agent4 = "SELECT * FROM tbagente WHERE cdAgente = ".$quimico['cdAgente4'];
	$qry_agent4 = mysqli_query($link,$sql_agent4);
	$sql_agent5 = "SELECT * FROM tbagente WHERE cdAgente = ".$quimico['cdAgente5'];
	$qry_agent5 = mysqli_query($link,$sql_agent5);
	$sql_agent6 = "SELECT * FROM tbagente WHERE cdAgente = ".$quimico['cdAgente6'];
	$qry_agent6 = mysqli_query($link,$sql_agent6);
	$sql_agent7 = "SELECT * FROM tbagente WHERE cdAgente = ".$quimico['cdAgente7'];
	$qry_agent7 = mysqli_query($link,$sql_agent7);
	$sql_agent8 = "SELECT * FROM tbagente WHERE cdAgente = ".$quimico['cdAgente8'];
	$qry_agent8 = mysqli_query($link,$sql_agent8);
	$sql_agent9 = "SELECT * FROM tbagente WHERE cdAgente = ".$quimico['cdAgente9'];
	$qry_agent9 = mysqli_query($link,$sql_agent9);
	$sql_agent10 = "SELECT * FROM tbagente WHERE cdAgente = ".$quimico['cdAgente10'];
	$qry_agent10 = mysqli_query($link,$sql_agent10);
	foreach ($qry_subg as $sg){	
		$subagente = $sg['nome'];
	}
	foreach ($qry_agent1 as $agent1){
		$agente1 = $agent1['nomeAgente'];
	}
	foreach ($qry_agent2 as $agent2){
		$agente2 = $agent2['nomeAgente'];
	}
	foreach ($qry_agent3 as $agent3){
		$agente3 = $agent3['nomeAgente'];
	}
	foreach ($qry_agent4 as $agent4){
		$agente4 = $agent4['nomeAgente'];
	}
	foreach ($qry_agent5 as $agent5){
		$agente5 = $agent5['nomeAgente'];
	}
	foreach ($qry_agent6 as $agent6){
		$agente6 = $agent6['nomeAgente'];
	}
	foreach ($qry_agent7 as $agent7){
		$agente7 = $agent7['nomeAgente'];
	}
	foreach ($qry_agent8 as $agent8){
		$agente8 = $agent8['nomeAgente'];
	}
	foreach ($qry_agent9 as $agent9){
		$agente9 = $agent9['nomeAgente'];
	}
	foreach ($qry_agent10 as $agent10){
		$agente10 = $agent10['nomeAgente'];
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
			    <td style="width:370px; text-align: center; padding-left: 60px; padding-right: 60px; font-size: 25px;"><b>Ficha de Campo Avaliação Agentes Químicos</b></td>
			    <td><img style="width:140px;" src="../img_empresas/'. $arquivo .'"/></td>
			    <td style="padding-top: 7px; padding-right: 30px; padding-bottom: 10px ">
			    </td>
			</tr>
		</table>
	</div> 
	<div style="page-break-inside:always; height: 22cm;">
		<div style="background-color: #ccc; width: 100%;">
			<a style="float: left; text-align: right;"><b>1.IDENTIFICAÇÃO</b></a>
			<a style="float: center;"><b>Cod.AQº </b> '.$dr.'</a>
			<a style="float: right;"><b>Data: </b> '.$dataAval.'</a>
		</div>
		<table style="width: 100%;">
			<tr>
				<td><b>Empresa:</b>'.$nomeEmpresa.'</td>
				<td><b>Gerência:</b>'.$nomeGerencia.'</td>
			</tr>
			<tr>
				<td><b>Unidade:</b>'.$unidade.'</td>
				<td><b>Setor/Local:</b>'.$nomeSetor.'</td>
			</tr>
			<tr>
				<td><b>Jornada de Trabalho:</b>'.$jornadaTrab.'</td>
				<td><b>Código GHE:</b>'.$codGHE.'</td>
			</tr>
		</table>
		<div style="background-color: #ccc; width: 100%;">
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
				<img style="margin-right: 5%;" src="../ficha/'.$pasta.'/1.jpg" width="45%" height="auto"/>
				<img src="../ficha/'.$pasta.'/2.jpg" width="45%" height="auto"/>
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
		<div style="background-color: #ccc; width: 100%;">
			<a style="float: left; text-align: right;"><b>4.IDENTIFICAÇÃO DA AMOSTRA</b></a>
		</div>
		<table style="width: 100%;">
			<tr>
				<td style="font-size: 10px;"><b>Nº Amostrador:</b>'.$numamostrador.'</td>
				<td style="font-size: 10px;"><b>BC:</b>'.$bc.'</td>
				<td style="font-size: 10px;"><b>Tipo Amostrador:</b>'.$tipoamostrador.'</td>
			</tr>
			<tr>
				<td style="font-size: 10px;">Clas.do Agente: '.$subagente.'</td>
				<td style="font-size: 10px;"><b>Sub1: </b>'.$agente1.'</td>
				<td style="font-size: 10px;"><b>Sub2: </b>'.$agente2.'</td>
			</tr>
			<tr>
				<td style="font-size: 10px;"><b>Sub3: </b>'.$agente3.'</td>
				<td style="font-size: 10px;"><b>Sub4: </b>'.$agente4.'</td>
				<td style="font-size: 10px;"><b>Sub5: </b>'.$agente5.'</td>
				<td style="font-size: 10px;"><b>Sub6: </b>'.$agente6.'</td>
			</tr>
			<tr>
				<td style="font-size: 10px;"><b>Sub7: </b>'.$agente7.'</td>
				<td style="font-size: 10px;"><b>Sub8: </b>'.$agente8.'</td>
				<td style="font-size: 10px;"><b>Sub9: </b>'.$agente9.'</td>
				<td style="font-size: 10px;"><b>Sub10: </b>'.$agente10.'</td>
			</tr>
		</table>
		<div style="background-color: #ccc; width: 100%;">
			<a style="float: left; text-align: left;"><b>5.PROTEÇÃO RESPIRATORIA PESSOAL</b></a>
			<a style="float: left; text-align: center;"><b>DESCRITIVO</b></a>
			<a style="float: left; text-align: right;"><b>FATOR DE PROTEÇÃO</b></a>
		</div>
		<table style="width: 100%;">
			<tr>
				<td><b>Tipo E.P.I: </b>'.$nomeEPI.'</td>
				<td><b>Fabricante:</b>'.$fabricanteEPI.'</td>
				<td><b>Modelo</b>'.$modeloEPI.'</td>
				<td><b>Nº CA</b>'.$CA.'</td>
				<td rowspan="2">Fator de Proteção:'.$atenuacao.'</td>
			</tr>
			<tr>
				<td><b>EPC: </b>'.$epc.'</td>
				<td colspan="6"></td>
			</tr>
		</table>
		<table cellspacing=0 style="width: 100%;">
			<tr style="background-color: #ccc;">
				<td><b>6.DESCRIÇÃO DAS ATIVIDADES</b></td>
				<td><b>Local</b></td>
				<td><b>Horário</b></td>
				<td><b>Fonte do Agente</b></td>
			</tr>
			'.$informacoes.'
		</table>
		<div style="background-color: #ccc; width: 100%;">
			<a style="float: left; text-align: right;"><b>7.VALIDAÇÃO DA MEDIÇÃO</b></a>
		</div>
		<table style="width: 98%;">
			<tr>
				<td style="font-size: 10px; width: 20%"><b>Hora Início: </b>'.$hrinicio.'</td>
				<td style="font-size: 10px; width: 20%"><b>Interv.Inicial: </b>'.$intvalinicial.'</td>
				<td style="font-size: 10px; width: 20%"><b>Interv.Final: </b>'.$intvalfinal.'</td>
				<td style="font-size: 10px; width: 20%"><b>Término Avaliação: </b>'.$hrfinal.'</td>
				<td style="font-size: 10px; width: 20%"><b>Tempo Amostrado: </b>'.$tempomed.' Min</td>
			</tr>
			<tr>
				<td style="font-size: 10px; width: 25%"><b>Vazão Inicial (l/min): </b>'.$vazaoinicial.'</td>
				<td style="font-size: 10px; width: 25%"><b>Vazão Final (l/min): </b>'.$vazaofinal.'</td>
				<td style="font-size: 10px; width: 25%"><b>Vazão nédia (l/min): </b>'.$vazaomedia.'</td>
				<td style="font-size: 10px; width: 25%">Variação da vazão (%): '.$variavazao.'</td>
			</tr>
			<tr>
				<td style="font-size: 10px; width: 25%"><b>Volume Total (L): </b>'.$volumetotal.'</td>
				<td style="font-size: 10px; width: 25%"><b>Temperatura (ºC): </b>'.$temp.'</td>
				<td style="font-size: 10px; width: 25%">URA Inicial (%): '.$urainicial.'</td>
				<td style="font-size: 10px; width: 25%">URA Final (%): '.$urafinal.'</td>
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