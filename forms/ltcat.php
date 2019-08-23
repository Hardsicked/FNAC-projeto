<?php
/* Carrega a classe DOMPdf */
require_once("dompdf/dompdf_config.inc.php");
include "../php/connect.php";
setlocale(LC_ALL, 'pt_BR.UTF-8', 'Portuguese_Brazil.1252');

/* Cria a instância */
$dompdf = new DOMPDF();
$final = 16;
$contador_pagina = 0;
$BIO = 000;
$id_empresa = $_GET['x'];
$id_contrato = $_GET['z'];
$secondperson = $_GET['p'];
$id_perfil = $_GET['w'];
$sqlh = "SELECT * FROM tbcontrato_cronograma WHERE cdContrato =".$id_contrato;
$qryh = mysqli_query($link,$sqlh);
$sqlt = "SELECT * FROM tbcontrato_cronograma_t WHERE cdContrato =".$id_contrato;
$qryt = mysqli_query($link,$sqlt);
foreach($qryh as $h){
	$hmes1 = substr($h["mes1"], 0, 6);
	$hmes2 = substr($h["mes2"], 0, 6);
	$hmes3 = substr($h["mes3"], 0, 6);
	$hmes4 = substr($h["mes4"], 0, 6);
	$hmes5 = substr($h["mes5"], 0, 6);
	$hmes6 = substr($h["mes6"], 0, 6);
	$hmes7 = substr($h["mes7"], 0, 6);
	$hmes8 = substr($h["mes8"], 0, 6);
	$hmes9 = substr($h["mes9"], 0, 6);
	$hmes10 = substr($h["mes10"], 0, 6);
	$hmes11 = substr($h["mes11"], 0, 6);
	$hmes12 = substr($h["mes12"], 0, 6);
	$hobs = $h["obs"];
}

$cronograma ='<div style="width: 50%; margin-left: 6%; margin-top: 10px">
<table style="font-size: 11px; width: 100%;" cellpadding=1 cellspacing=0 border=0.5>
					<thead class="thead-light">
						<tr style="background-color: #356dc6;">
								<td style="text-align: center; height:25px; width:200px;"><b>Ações Prazos</b></td>
								<td style="text-align: center; height:25px; width:25px;"><b>'.$hmes1.'</b></td>
								<td style="text-align: center; height:25px; width:25px;"><b>'.$hmes2.'</b></td>
								<td style="text-align: center; height:25px; width:25px;"><b>'.$hmes3.'</b></td>
								<td style="text-align: center; height:25px; width:25px;"><b>'.$hmes4.'</b></td>
								<td style="text-align: center; height:25px; width:25px;"><b>'.$hmes5.'</b></td>
								<td style="text-align: center; height:25px; width:25px;"><b>'.$hmes6.'</b></td>
								<td style="text-align: center; height:25px; width:25px;"><b>'.$hmes7.'</b></td>
								<td style="text-align: center; height:25px; width:25px;"><b>'.$hmes8.'</b></td>
								<td style="text-align: center; height:25px; width:25px;"><b>'.$hmes9.'</b></td>
								<td style="text-align: center; height:25px; width:25px;"><b>'.$hmes10.'</b></td>
								<td style="text-align: center; height:25px; width:25px;"><b>'.$hmes11.'</b></td>
								<td style="text-align: center; height:25px; width:25px;"><b>'.$hmes12.'</b></td>
							</tr>
					</thead>
					<tbody>';
	foreach($qryt as $t){
		$cont = 0;
		$tarefa = $t["nomeTarefa"];
		$mes = array($t["bmes1"],$t["bmes2"],$t["bmes3"],$t["bmes4"],$t["bmes5"],$t["bmes6"],$t["bmes7"],$t["bmes8"],$t["bmes9"],$t["bmes10"],$t["bmes11"],$t["bmes12"]);
		$cronograma .='<tr>
			<td class="text-center" style="font-size: 10px;">'.$tarefa.'</td>';
		while($cont < 12){
			if($mes[$cont] == 0){
				$cronograma .='<td style="background-color: white; text-align: center; height:25px;"></td>';
			}else{
				if($mes[$cont] == 1){
					$cronograma .='<td style="background-color: #63beff; text-align: center; height:25px;">*</td>';
				}elseif($mes[$cont] == 2){
					$cronograma .='<td style="background-color: #63beff; text-align: center; height:25px;">**</td>';
				}else{
					$cronograma .='<td style="background-color: #63beff; text-align: center; height:25px;">***</td>';
				}
		
			}
		$cont++;
		}
	}
$cronograma .='</tbody>
				</table></div>
				<p style="font-size: 12px; text-indent: 0em; line-height: 1.3;">Nota:'.$hobs.'</p>
				<div style="height: 30px;"></div>';
$sql1 = "SELECT * FROM tbempresa WHERE cdEmpresa = $id_empresa";
$empresa = mysqli_query($link,$sql1);
	foreach ($empresa as $emp) {
		$nome_empresa = $emp['nomeEmpresa'];
		$endereco = $emp['endereco'];
		$address = $emp['endereco'];
		$razao_social = $emp['razaoSocial'];
		$socialreason = $emp['razaoSocial'];
		$nomeFantasia = $emp['nomeFantasia'];
		$cnpj = $emp['cnpj'];
		$cep = $emp['cep'];
		$arquivo = $emp['arquivo'];
		$nvEmpresa = $emp['nvEmpresa'];
	}

$sql1 = "SELECT * FROM tbcontrato WHERE cdEmpresa = $id_empresa AND cdContrato = $id_contrato";
$contrato = mysqli_query($link,$sql1);
	foreach ($contrato as $contrato) {
		$cnae = $contrato['CNAE'];
		$risco_empresa = $contrato['risco_empresa'];
		$unidade = $contrato['unidade'];
		$responsavelEmpresa = $contrato['responsavelEmpresa'];
		$vigencia_inicio = $contrato['v_data_inicial'];
		$vigencia_fim = $contrato['v_data_final'];
		$execucao_inicio = $contrato['exec_data_inicial'];
		$execucao_fim = $contrato['exec_data_final'];
		$resumo = $contrato['resumo'];
		$equipe_envolv = $contrato['equipe_envolv'];
}
$sql_perfis = "SELECT * FROM tbperfis WHERE cdEmpresa = ".$id_empresa." AND cdPerfil = ".$id_perfil;
$perfis = mysqli_query($link,$sql_perfis);
	foreach ($perfis as $perfis){
		$engenheiro = $perfis["responsavel"];
		$cargoeng = $perfis["cargoeng"];
		$tecnico = $perfis["tecnico"];
		$cargotec = $perfis["cargotec"];
		$arquivoassinatura = $perfis["logomarca"];
		$enderecoperfil = $perfis["endereco"];
		$bol_logo_rodape = $GET_["y"];
	}
	if($bol_logo_rodape == 1){
		$footerperfil = '<small style="font-size: 12px;">'. $enderecoperfil .'</small> <br> <br>Página <span class="pagenum">';
		$headerperfil = '<img style="width:130px;" src="../img_perfil/'.$arquivoassinatura.'" />';
	}else{
		$footerperfil = ' <br> <br>Página <span class="pagenum">';
		$headerperfil = '<img style="width:130px;" src="../img/logowhite.png" />';
	}
	if($secondperson == 1){
		$assinatura = '<td style="width: 40%;">
							<hr>
							<p style="text-align: center; font-size: 11px; text-indent: 0;">'.$engenheiro.'
								<br>'.$cargoeng.'
							</p>
						</td>
						<td style="width: 20%;"></td>
						<td style="width: 40%;">
							<hr>
							<p style="text-align: center; font-size: 11px; text-indent: 0;">'.$tecnico.'
								<br>'.$cargotec.'
							</p>
						</td>';
	}else{
		$assinatura = '<td style="width: 30%;"></td>
		<td style="width: 40%;">
							<hr>
							<p style="text-align: center; font-size: 11px; text-indent: 0;">'.$engenheiro.'
								<br>'.$cargoeng.'
							</p>
						</td><td style="width: 30%;"></td>';
	}

$sql1 = "SELECT * FROM tbghe WHERE cdEmpresa = $id_empresa AND cdContrato = $id_contrato";
$ghe = mysqli_query($link,$sql1);
	foreach ($ghe as $ghe) { 
		$html .= '<tr style="text-align: center;">
					<td> '. $ghe['codGHE'] .' </td>';
		$cod_setor = $ghe['cdSetor'];
		$cod_ghe = $ghe['cdGHE'];
		$sql1 = "SELECT * FROM tbsetor WHERE cdSetor = $cod_setor";
		$setor = mysqli_query($link,$sql1);
			$html .= '<td><ul>';
			foreach ($setor as $setor) {
				$html .= '<li>'.$setor['setor'].'</li>';
				
			}
			$html .='</ul></td>';

		$sql1 = "SELECT * FROM tbcargos WHERE cdGHE = $cod_ghe";
		$cargo = mysqli_query($link,$sql1);
			$html .= '<td><ul>';
			foreach ($cargo as $cargo) {
				$html .='<li>'. $cargo['cargo'] .' </li>';
			}
			$html .= '</ul></td>';

		$sql1 = "SELECT * FROM tbrisco WHERE cdGHE = $cod_ghe";
		$risco = mysqli_query($link,$sql1);
		$html .= '<td><ul>';
			if($risco->num_rows == 0){
				$html .='<li>SEM RISCO</li>';
			}else{
				foreach($risco as $risco){
					$cod_agente = $risco['cdAgente'];
					$sql1 = "SELECT * FROM tbagente WHERE cdAgente = $cod_agente";
					$agente = mysqli_query($link,$sql1);
					foreach ($agente as $agente) {
						$html .='<li>'. $agente['nomeAgente'] .' </li>';
					}
				}		
			}
		$html .= '</ul></td>';
}

	$sql1 = "SELECT * FROM tbghe WHERE cdEmpresa = $id_empresa AND cdContrato = $id_contrato";
	$ghe = mysqli_query($link,$sql1);
	foreach ($ghe as $ghe) {
		$final = $final + 1;
		$anteci_riscos .= '
		<div style="height: 22cm; page-break-after: always;">
		<table cellspacing=1 cellpadding=0 width="100%" style="font-size: 12px;">  
			<tr>
			    <td><b>Empresa</b></td>
			    <td></td>
				<td><b>Código do GHE</b></td>
			</tr>
			<tr style="text-align: center;">
			    <td style="background: #ddd; width: 80%; text-align: left;"> '. $razao_social .'</td>
			    <td style="width: 2%;"></td>
				<td style="background: #ddd;"> '. $ghe['codGHE'] .'</td>
			</tr>
		</table>';

$cod_ghe = $ghe['cdGHE'];
$cod_setor = $ghe['cdSetor'];
$nomeGHE = $ghe['nomeGHE'];
$empGHE = $ghe['numEmpregados'];

$sql1 = "SELECT * FROM tbsetor WHERE cdSetor = $cod_setor";
$setor = mysqli_query($link,$sql1);
	foreach ($setor as $setor) {
		$nome_setor = $setor['setor'];
		$cod_gerencia = $setor['cdGerencia'];
	}
$sql1 = "SELECT * FROM tbgerencia WHERE cdGerencia = $cod_gerencia";
$gerencia = mysqli_query($link,$sql1);
	foreach ($gerencia as $gerencia) { 
		$cod_SI = $setor['cdSuperIntendencia'];
		$gerencia_ghe = $gerencia['gerencia'];
	}	
$sql1 = "SELECT * FROM tbsuperintendencia WHERE cdSuperIntendencia = $cod_SI";
$superi = mysqli_query($link,$sql1);
	foreach ($superi as $superi){
		$gerenciageral = $superi['superintendencia'];
	}
	$anteci_riscos .= '<table cellspacing=1 cellpadding=1 width="100%" style="font-size: 12px;"> 
				<tr>
				    <td><b>Gerência Geral/Gerência</b></td>
				    <td></td>
					<td><b>Setor/Local de Trabalho</b></td>
				</tr>
				<tr style="text-align: center;">
				    <td style="background: #ddd; width: 50%; text-align: left;">'. $gerenciageral . $gerencia_ghe .'</td>
				    <td style="width: 2%;"></td>
					<td style="background: #ddd; text-align: left;"> '. $nome_setor .'</td>
				</tr>
			</table>';

		$anteci_riscos .= '<table cellspacing=1 cellpadding=1 width="100%" style="font-size: 12px;"> 
			<tr>
			    <td><b>Grupo Ocupacional</b></td>
			    <td></td>
				<td><b>Nº Efetivo</b></td>
				<td></td>
				<td><b>Jornada de Trabalho</b></td>
			</tr>
			<tr style="text-align: center;">
			    <td style="background: #ddd; width: 60%; text-align: left;">'. $nomeGHE .'</td>
			    <td style="width: 2%;"></td>
				<td style="background: #ddd; width: 15%;">'.$empGHE.'</td>
				<td style="width: 2%;"></td>
				<td style="background: #ddd; width: 25%;"> '. $ghe['jornadaTrab'].'</td>
			</tr>
		</table>';

		$sql1 = "SELECT * FROM tbcargos WHERE cdGHE = $cod_ghe";
		$cargo = mysqli_query($link,$sql1);
		$anteci_riscos .= '<table cellspacing=1 cellpadding=1 width="100%" style="font-size: 12px;"> 
			<tr>
			    <td><b>Função(ões) do Grupo Ocupacional: </b></td>
			</tr>
			<tr style="text-align: center;">
			    <td style="background: #ddd; text-align: left;"> '; 
		foreach ($cargo as $cargo) {
			$anteci_riscos .= $cargo['cargo'].'; ';
		}
		$anteci_riscos .= '</td>
			</tr>
		</table>';

		$anteci_riscos .= '<div style="height: 5px;"></div>
		<p style="font-size: 12px; text-indent: 0em; line-height: 1.3;"><b>OBJETIVO:</b><br>Registrar a concentração ou intensidade dos agentes ambientais existentes nos ambientes de trabalho, visando conhecer a exposição ocupacional dos trabalhadores abrangidos pelo referido GHE - Grupo Homogêneo de Exposição, quando do desenvolvimento de suas atividades, comparando com os respectivos valores de limite de tolerância estabelecidos na legislação brasileira – NR-15 e limites de exposição estabelecido nas normas internacionais indicadas, como os valores adotados pela American Conference of Governamental Industrial Hygienist – ACGIH.</p>

		<p style="font-size: 12px; text-indent: 0em; line-height: 1.3;"><b>DETERMINAÇÃO DA EXPOSIÇÃO OCUPACIONAL:</b><br>As avaliações dos agentes ambientais foram realizadas com base nos procedimentos legais. As atividades exercidas pelo empregados avaliados durante o período da amostragem foram acompanhadas pelo técnico responsável pela medição e relatadas em detalhes nos respectivos relatórios de campo de cada amostragem realizada.</p>';

		$anteci_riscos .= '<p style="font-size: 12px; text-indent: 0em; line-height: 1.3;"><b>DESCRIÇÃO DO LOCAL DE TRABALHO:</b><br>
		'. $ghe['descTrab'] .'</p>
		
		<p style="font-size: 13px; text-indent: 0em; line-height: 1.3;"><b>CARGOS PARTICIPANTES DO GRUPO HOMOGÊNIO DE EXPOSIÇÃO:</b></p>';
		$sql1 = "SELECT * FROM tbcargos WHERE cdGHE = $cod_ghe";
		$cargo = mysqli_query($link,$sql1);
		foreach ($cargo as $cargo) {
		$anteci_riscos .= '<p style="font-size: 12px; text-indent: 0em; line-height: 1.3;"><b>CARGO/FUNÇÃO:</b> '.$cargo['cargo'].'<br>'. $cargo['descCargo'] .'</p>';
		}
		$anteci_riscos .= '</div>';

		$cod_ghe = $ghe['cdGHE'];
		$codv_ghe = $ghe['cdGHE'];
		$codigo_ghe = $ghe['codGHE'];
		$cod_setor = $ghe['cdSetor'];

		$sql1 = "SELECT * FROM tbrisco WHERE cdGHE = $cod_ghe ORDER BY tipoRisco";
		$risco = mysqli_query($link,$sql1);
		if($risco -> num_rows == 0){
			$final = $final + 1;
			$anteci_riscos .= '<div style="height: 22cm; page-break-after: always;">
				<h1 style="text-align: center; font-size: 11px; "> SEM RISCO OCUPACIONAL <h1>

				<table cellspacing=1 cellpadding=1 width="100%" style="font-size: 12px; margin-top: -30px; text-align: center;"> 
					<tr>
					    <td><b>CÓDIGO DO AGENTE:</b></td>
					    <td></td>
						<td><b>Código do GHE</b></td>
					</tr>
					<tr>
						<td style="background: #ddd; width: 49%;">09.01.001 Ausência do Fator de Risco</td>
						<td style="height: 2%;"></td>
						<td style="background: #ddd; width: 49%;">'. $codigo_ghe .'</td>
					</tr>
				</table>
				
				<div style="height: 0.2cm;"></div>
				
				<h2 style="font-size: 12px;"> IDENTIFICAÇÃO E RECONHECIMENTO GRUPO OCUPACIONAL: </h2>
				<table border=0.5 cellspacing=0 cellpadding=1 width="100%" style="font-size: 12px; text-align: center;"> 
					<tr>
					    <td style="width: 30%;">Propagação / Absorção:</td>
						<td> Ausência do Fator de Risco </td>
					</tr>
					<tr>
					    <td>Caracterização da Exposição:</td>
					    <td> Ausência do Fator de Risco </td>
					</tr>
					<tr>
					    <td>Danos a Saúde:</td>
					    <td> Ausência do Fator de Risco </td>
					</tr>
					<tr>
					    <td>Principais Fontes Geradoras:</td>
					    <td> Ausência do Fator de Risco </td>
					</tr>
					<tr>
					    <td>Medida de Controle Existente(s):</td>
					    <td> Ausência do Fator de Risco  </td>
					</tr>
				</table>
				
				<div style="height: 0.2cm;"></div>

				<p style="font-size: 12px; text-indent: 0em; line-height: 1.3; margin: 0px;"><b style="font-size: 12px;">RESUMO DE METODOLOGIA E INSTRUMENTAL UTILIZADO</b><br> <b>Normas Regulamentadoras nº. 09 / nº. 15, da Portaria 3.214, de 08/06/1978 do MTE</b> <br> '. $regulamentacao_agente;
					
						
						$sql1 = "SELECT * FROM tbresultado_ruido WHERE cdGHE = $cod_ghe";
						$result_ruido = mysqli_query($link,$sql1);
							foreach ($result_ruido as $result_ruido) { 
								$dataAvaliacao_ruido = date("d-m-Y", strtotime($result_ruido['dataAvaliacao']));
								$doseProjetada_ruido = $result_ruido['doseProjetada'];
								$nen_ruido = $result_ruido['nen'];
								$concentracao = $result_ruido['concentracao'];
								$risco_ruido = $result_ruido['cdRisco'];
							}


						$anteci_riscos .= '<h2 style="font-size: 11px; text-align: center; margin: 0.6cm;"> RESULTADOS OBTIDOS DAS AMOSTRAGENS </h2>
						<table border=0.5 cellspacing=0 cellpadding=1 width="100%" style="font-size: 11px; text-align: center;
						margin: -20px 0px 10px 0px;"> 
							<tr style="background: #ddd;">
								<td> Ausência do Fator de Risco </td>
							    <td> Ausência do Fator de Risco </td>
							    <td> Ausência do Fator de Risco </td>
							    <td> Ausência do Fator de Risco </td>
							    <td> Ausência do Fator de Risco </td>
							    <td> Ausência do Fator de Risco </td>
							</tr>
							<tr>
								<td>Ausência do Fator de Risco</td>
							    <td>Ausência do Fator de Risco</td>
							    <td>Ausência do Fator de Risco</td>
							    <td>Ausência do Fator de Risco</td>
							    <td>Ausência do Fator de Risco</td>
							    <td>Ausência do Fator de Risco</td>
							</tr>
						</table>';
						

						//parametrizando respostas da análise e interpretação de resultados
						$analise_result = 'Durante a fase de antecipação e reconhecimento dos riscos ocupacionais, não foi identificados agentes físicos, químicos e biológicos com potencial de risco à saúde e integridade dos trabalhadores ocupantes deste GHE, conforme a NR 09';


				$anteci_riscos .='<p style="font-size: 11px; text-indent: 0em; line-height: 1.3; margin: 0px;"><b style="font-size: 12px;">CONCLUSÃO, ANÁLISE E INTERPRETAÇÃO DOS RESULTADOS: </b><br> '. $analise_result .' </p><br>

				
				<div style="height: 30px;"></div>

				<div style="height: 1px; background: #222; width: 40%; margin-left: 30%; margin-bottom: 2px;"></div>
				<p style="text-align: center; font-size: 11px; text-indent: 0; line-height: 1; margin-top: -15px;"> '.$engenheiro.'
								<br>'.$cargoeng.'</p>
				</div>
				';
		}else{
			foreach ($risco as $risco) {
				$codigorisco = $risco['cdrisco'];
				$idrisco = $risco['cdrisco'];
				$agente = $risco['cdAgente'];
				$cod_epi = $risco['cdEpi'];
				$fontes_geradoras = $risco['fonte'];
				$controle = $risco['controle'];
				$exposicao = $risco['exposicao'];
				$codepi_risco = $risco['cdEpi'];

				if($exposicao == 1){
					$exposicao = 'Habitual';
				}else if($exposicao == 2){
					$exposicao = 'Intermitente';
				}else if($exposicao == 3){
					$exposicao = 'Habitual Permanente';
				}
					
				$sql1 = "SELECT * FROM tbagente WHERE cdAgente = ".$agente;
				$agente = mysqli_query($link,$sql1);
					foreach ($agente as $agente) {
						$nomeagente = $agente['nomeAgente'];
						$codigoAgente = $agente['codigoAgente'];
						$codigoesocial = $agente['codigoESocial'];
						$meioPropagacao = $agente['meioPropagacao'];
						$metodomedicao_agente = $agente['metodoMedicao'];
						$equipamento_medicao = $agente['aparelhagem'];
						$agente_nivel = $agente['nivelAcao'];
						$agente_limite = $agente['limiteExposicao'];
						$agente_nacgih = $agente['nivelAcaoACGIH'];
						$agente_lacgih = $agente['limiteACGIH'];
						$danos_saude = $agente['danoSaude'];
						$divisor = $agente['divisor'];
						$constante = $agente['constante'];
						$unidadeagente = $agente['unidadeMedida'];
						$subgrupoagente = $agente['cdsubGrupo']; 
						$regulamentacaodoagente = $agente['regulamentacao'];
					}
				$sql2 = "SELECT * FROM tbsubgrupoagente WHERE cdSubGrupo =".$subgrupoagente;
				$subsgrupoagente = mysqli_query($link,$sql2);
					foreach ($subsgrupoagente as $sga){
						$nomesubgrupo = $sga['nome'];
					}
			$agentelimitefloat = str_replace(",",".",$agente_limite);
			if($risco['tipoRisco'] == 1){
			$final = $final + 1;
			//resultado ruido
			$anteci_riscos .= '<div style="height: 22cm; page-break-after: always;">
				<h1 style="text-align: center; font-size: 11px; "> RUÍDO CONTÍNUO OU INTERMITENTE <h1>

				<table cellspacing=1 cellpadding=1 width="100%" style="font-size: 10px; margin-top: -30px; text-align: center; padding-top: -30px"> 
					<tr>
					    <td><b>CÓDIGO DO AGENTE - CODIGO E SOCIAL</b></td>
					    <td></td>
						<td><b>Código do GHE</b></td>
					</tr>
					<tr>
						<td style="background: #ddd; width: 49%;">'. $codigoAgente .' - '. $codigoesocial .'</td>
						<td style="height: 2%;"></td>
						<td style="background: #ddd; width: 49%;">'. $codigo_ghe .'</td>
					</tr>
				</table>
				
				<div style="height: 0.1cm;"></div>
				
				<h2 style="font-size: 10px;"> IDENTIFICAÇÃO E RECONHECIMENTO GRUPO OCUPACIONAL: </h2>
				<table  cellpadding=1 width="100%" style="font-size: 12px; "> 
					<tr>
					    <td style="width: 30%; text-align: center;">Propagação / Absorção:</td>
						<td style="border: 1px solid black;"> '. $meioPropagacao .' </td>
					</tr>
					<tr>
					    <td style="text-align: center;">Caracterização da Exposição:</td>
					    <td style="border: 1px solid black;">'.$exposicao.'</td>
					</tr>
					<tr>
					    <td style="text-align: center;">Danos a Saúde</td>
					    <td style="border: 1px solid black;"> '. $danos_saude .' </td>
					</tr>
					<tr>
					    <td style="text-align: center;">Principais Fontes Geradoras:</td>
					    <td style="border: 1px solid black;"> '. $fontes_geradoras .' </td>
					</tr>
					<tr>
					    <td style="text-align: center;">Medida de Controle Existente(s):</td>
					    <td style="border: 1px solid black;"> '. $controle .' </td>
					</tr>
				</table>
				
				<div style="height: 0.2cm;"></div>

				<p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: 0px;"><b style="font-size: 11px;">RESUMO DE METODOLOGIA E INSTRUMENTAL UTILIZADO</b><br> <b>Normas Regulamentadoras nº. 09 / nº. 15, da Portaria 3.214, de 08/06/1978 do MTE</b> <br> '. $metodomedicao_agente .' <br> 
				<b>Normas de Higiene Ocupacional – NHO 01 / Avaliação da Exposição Ocupacional ao Ruído, da FUNDACENTRO </b> <br> '. $higiene .' <br> <b> Equipamentos Utilizados na Medição </b> <br> '. $equipamento_medicao .' </p>';
					
						$sql1 = "SELECT * FROM tbresultado_ruido WHERE cdGHE =".$cod_ghe;
						$result_ruido = mysqli_query($link,$sql1);
							foreach ($result_ruido as $result_ruido) { 
								$dataAvaliacao_ruido = date("d/m/Y", strtotime($result_ruido['dataAvaliacao']));
								$doseProjetada_ruido = $result_ruido['doseProjetada'];
								$nen_ruido = $result_ruido['nen'];
								$nen_ruido2 = str_replace(",",".",$result_ruido['nen']);
								$nen_ruido3 = str_replace(",",".",$result_ruido['nen']);
								$concentracao = $result_ruido['concentracao'];
								$risco_ruido = $result_ruido['cdRisco'];
								$observacao = $result_ruido['obs'];
							}


							$anteci_riscos .= '<table style="padding-top: -17px;">
							<tr>
							<td>
							<h2 style="font-size: 11px; text-align: center; margin: 0.6cm;"> RESULTADOS OBTIDOS DAS AMOSTRAGENS - Q= 5 </h2>
							<table border=0.5   width="100%" style="font-size: 11px; text-align: center;
							margin: -20px 0px 10px 0px;"> 
								<tr style="background: #ddd;">
									<td>Data</td>
								    <td>Dose Projetada %</td>
								    <td>LAVG db(A)</td>
								    <td>NEN dB(A)</td>
								    <td>Nível de ação</td>
								    <td>Limite de Tolerância dB(A)</td>
								</tr>
								<tr>
									<td>'.$dataAvaliacao_ruido.'</td>
								    <td>'. $doseProjetada_ruido .'</td>
								    <td>'. $concentracao .'</td>
								    <td>'. $nen_ruido .'</td>
								    <td>'. $agente_nivel .'</td>
								    <td>'. $agente_limite .'</td>
								</tr>
							</table>
							</td>';
								if($codepi_risco == 0){
									$anteci_riscos .= '<td><h2 style="font-size: 11px; text-align: center; margin: 0.25cm 0.6cm 0cm 0.6cm;" > CÁLCULO DA EXPOSIÇÃO ATENUADA </h2>
										<table border=0.5  width="100%" style="font-size: 11px; text-align: center; "> 
											<tr style="background: #ddd;">
												<td>EPI Utilizada</td>
											    <td>Atenuação Calculada do EPI dB(A)</td>
											    <td>Atenuação Calculada</td>
											    <td>EPI Adequado?</td>
											</tr>
											<tr>
												<td colspan="4">SEM EPI</td>
											</tr>
										</table>
									</td>
									</tr>
								</table>
							
									<div style="height: 0.2cm;"></div>';
								}else{
									if($nen_ruido == "Inspeção" || $nen_ruido == "INSPEÇÃO"){
										$sql3 = "SELECT * FROM tbepi WHERE cdEPI = ".$codepi_risco;
										$result_epi = mysqli_query($link,$sql3);
										foreach($result_epi as $result_epi){
											$nome_epi = $result_epi['nome'];
											$nv = $result_epi['nivelProtecao'];
											$EPI = "";
											$total = "0";
										}
										$anteci_riscos .= '<td><h2 style="font-size: 11px; text-align: center; margin: 0.25cm 0.6cm 0cm 0.6cm;" > CÁLCULO DA EXPOSIÇÃO ATENUADA </h2>
											<table border=0.5  width="100%" style="font-size: 10px; text-align: center;"> 
												<tr style="background: #ddd;">
													<td style="width: 40%;">EPI Utilizada</td>
												    <td>Atenuação Calculada do EPI dB(A)</td>
												    <td>Atenuação Calculada</td>
												    <td>EPI Adequado?</td>
												</tr>
												<tr>
													<td>'. $nome_epi .'</td>
													<td>'.$nv.'</td>
													<td>'.$total.'</td>
													<td>'.$EPI.'</td>
												</tr>
											</table>
										</td>
										</tr>
									</table>
								
										<div style="height: 0.2cm;"></div>';
									}else{
										$sql3 = "SELECT * FROM tbepi WHERE cdEPI = ".$codepi_risco;
										$result_epi = mysqli_query($link,$sql3);
										foreach($result_epi as $result_epi){
											$nome_epi = $result_epi['nome'];
											$nv = $result_epi['nivelProtecao'];
											$calculoruido = str_replace(",",".",$nen_ruido) - str_replace(",",".",$nv);
											if($calculoruido < 85){
												$EPI = "Sim";
											}else{
												$EPI = "Não";
											}
										}
										$total = $calculoruido;
										$anteci_riscos .= '<td><h2 style="font-size: 11px; text-align: center; margin: 0.25cm 0.6cm 0cm 0.6cm;" > CÁLCULO DA EXPOSIÇÃO ATENUADA </h2>
											<table border=0.5  width="100%" style="font-size: 11px; text-align: center;"> 
												<tr style="background: #ddd;">
													<td>EPI Utilizada</td>
												    <td>Atenuação Calculada do EPI dB(A)</td>
												    <td>Atenuação Calculada</td>
												    <td>EPI Adequado?</td>
												</tr>
												<tr>
													<td style=" width: 40%;">'. $nome_epi .'</td>
													<td>'.$nv.'</td>
													<td>'.$calculoruido.'</td>
													<td>'.$EPI.'</td>
												</tr>
											</table>
										</td>
										</tr>
									</table><p><b>Nota:</b>'.$observacao.'</p>
								
										<div style="height: 0.2cm;"></div>';
									}
							}
							
							//parametrizando respostas da conclusao
							if($nen_ruido > 100){
								$conclusao = 'A';
							}elseif($nen_ruido = 100){
								$conclusao = 'B';
							}else{
								$conclusao = 'C';
							}

							//parametrizando respostas da análise e interpretação de resultados			
				
				$oitenta = 80;
				$oitentacinco = 85;

				$recomendacoes = 'Divulgar aos empregados as informações relativas ao risco avaliado e as ações preventivas, bem como o perfil de exposição ocupacional representado pelo seu GHE.';
				
				$anteci_riscos .= '<p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: 0px;"><b style="font-size: 11px;">CONCLUSÃO DA ATENUAÇÃO:</b><br>';
				if($codepi_risco == 0){
						$anteci_riscos .='Com base no resultado NEN (Q5) acima, pode-se concluir que o não foi identificado o uso de protetor auditivo para o cálculo de atenuação e controle da exposição ao agente ruído contínuo ou intermitente.</p><br>';
				}elseif($total == 0){
						$anteci_riscos .='Com base no resultado por inspeção e avaliação qualitativa , pode-se concluir que não será ser realizado o cálculo de atenuação do protetor auditivo para o controle da exposição ao agente ruído contínuo ou intermitente até que seja realizada a quantificação do agente.</p><br>';
				}elseif($total <= $oitenta){
					$anteci_riscos .='O cálculo da atenuação da exposição ao ruído foi realizado com base nos protetores auditivos - EPA utilizados pelos empregados, sendo
					deduzido o NRRsf (índice de redução de ruído, segundo o método B da ANSI S12.6.-1997) de cada EPA, do nível correspondente ao valor do
					nível de ação exposição normatizado (NEN), obtendo-se assim o resultado do nível de ruído após a atenuação <b>abaixo do nível de ação.</b></p><br>';
				}elseif($total > $oitenta && $total <= $oitentacinco){
					$anteci_riscos .='O cálculo da atenuação da exposição ao ruído foi realizado com base nos protetores auditivos - EPA utilizados pelos empregados, sendo	deduzido o NRRsf (índice de redução de ruído, segundo o método B da ANSI S12.6.-1997) de cada EPA, do nível correspondente ao valor do nível de ação exposição normatizado (NEN), obtendo-se assim o resultado do nível de ruído após a atenuação <b>acima do nível de ação.</b></p><br>';
				}elseif($total > $oitentacinco){
					$anteci_riscos .='O cálculo da atenuação da exposição ao ruído foi realizado com base nos protetores auditivos - EPA utilizados pelos empregados, sendo
							deduzido o NRRsf (índice de redução de ruído, segundo o método B da ANSI S12.6.-1997) de cada EPA, do nível correspondente ao valor do nível de ação exposição normatizado (NEN), obtendo-se assim o resultado do nível de ruído após a atenuação <b>acima do limite de tolerância</b> estabelecido pela NR15.</p><br>';
				}


				$anteci_riscos .='<p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: 0px;"><b style="font-size: 11px;">CONCLUSÃO, ANÁLISE E INTERPRETAÇÃO DOS RESULTADOS: </b><br>';
				if($total == 0){
						$anteci_riscos .= 'Durante a fase de antecipação e reconhecimento dos riscos ocupacionais, foi identificado o risco através de inspeção in loco no ambiente laboral,nas fases antecipação e reconhecimento foi concluída de forma qualitativa';
				}elseif($nen_ruido2 <= $oitenta){
					$anteci_riscos .= 'De acordo com os dados obtidos, a exposição média estatistica (MG) do NEN (Q5) encontra se <b>abaixo do nível de ação.</b>Sendo assim, considera-se que o perfil da exposição ocupacional <b>não excedeu o limite de tolerância</b> indicado conforme NR 15';
				}elseif($nen_ruido2 > $oitenta && $nen_ruido2 <= $oitentacinco){
						$anteci_riscos .= 'De acordo com os dados obtidos, a exposição média estatistica (MG) do NEN (Q5) encontra se <b>acima do nivel de ação e abaixo do limite de tolerância.</b>Sendo assim, considera-se que o perfil da exposição ocupacional <b>não excedeu o limite de tolerância</b> indicado conforme NR 15';
				}elseif($nen_ruido2 > $oitentacinco){
						$anteci_riscos .= 'De acordo com os dados obtidos, a exposição média estatistica (MG) do NEN (Q5) encontra se <b>acima do limite de tolerância.</b>Sendo assim, considera-se que o perfil da exposição ocupacional <b>excedeu o limite de tolerância</b> indicado conforme NR 15';
				}

				$anteci_riscos .= '</p><br>

				<p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: 0px;"><b style="font-size: 11px;">RECOMENDAÇÕES DE MEDIDAS CORRETIVAS E/OU PREVENTIVAS:</b><br> </p>';
				
				$termo = 'Inserção';
				$pattern = '/' . $termo . '/';
				$termo2 = 'Protetor auditivo';
				$pattern = '/' . $termo2 . '/';//Padrão a ser encontrado na string $tags
				if ($nen_ruido2 > 0 && preg_match("/Inserção/" , $nome_epi)) {
 					$anteci_riscos .='<p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: 0px;">Analisar alteração do tipo de protetor inserção para tipo concha, caso utilização de capacete deverá ser mantido a conformidade de fabricante. </p>';
 				}
 				if($nen_ruido3 > $oitentacinco){
 						$anteci_riscos .='<p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: 0px;"> Recomenda-se elaborar estudos de viabilidades técnicas e operacionais para implantação de medidas de controle de ordem coletiva, seguindo a hierarquia definida no item 9.3.5.2 da NR-09, de modo a reduzir a intensidade do ruído nos postos de trabalho, a concentrações que mantenha abaixo do nível de ação, com a finalidade de garantir a integridade da saúde e segurança dos empregados. Substituir periodicamente o protetor individual ou os seus componentes que venham apresentar o menor sinal de desgaste ou danos, como: selos, espumas, hastes e molas de pressão, de modo a manter o máximo desempenho durante o tempo de uso na jornada laboral. Manter uma continua verificação e fiscalização por parte da supervisão das áreas em geral, quanto à utilização efetiva do protetor individual pelos empregados durante todo o tempo de exposição ocupacional ao agente de ruído.</p>';
 				}elseif($nen_ruido3 > $oitenta){
 						$anteci_riscos .='<p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: 0px;">Recomenda-se reavaliar a exposição ocupacional periodicamente e sempre que forem realizadas alterações físicas e de maquinários nos ambientes de trabalho, métodos de trabalho e/ou processos operacionais</p>';
 				}elseif($nen_ruido3 < $oitenta){
 						$anteci_riscos .='<p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: 0px;">Recomenda-se manter no mínimo as condições ocupacionais existentes e reavaliar a exposição ocupacional periodicamente e também sempre que forem introduzidas alterações físicas e de maquinários nos ambientes de trabalho, métodos de trabalho e/ou processos operacionais.</p>';
				}elseif(preg_match($pattern2, $nome_epi)){
 					$anteci_riscos .='<p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: 0px;">Substituir periodicamente o protetor individual ou os seus componentes que venham apresentar o menor sinal de desgaste ou danos, como: selos, espumas, hastes e molas de pressão, de modo a manter o máximo desempenho durante o tempo de uso na jornada laboral.<br>Manter uma continua verificação e fiscalização por parte da supervisão das áreas em geral, quanto à utilização efetiva do protetor individual pelos empregados durante todo o tempo de exposição ocupacional ao agente de ruído.</p>';
				}

				$anteci_riscos .='<div style="height: 70px;"></div>

				<div style="height: 1px; background: #222; width: 40%; margin-left: 30%; margin-bottom: 2px; "></div>
				<p style="text-align: center; font-size: 11px; text-indent: 0; line-height: 1; margin-top: -15px;"> '.$engenheiro.'
								<br>'.$cargoeng.'</p>
				</div>
				';
				}else if($risco['tipoRisco'] == 2){
				$final = $final + 1; //resultado quimico
				$anteci_riscos .= '<div style="height: 22cm; page-break-after: always;">
				<h1 style="text-align: center; font-size: 14px; ">'. $nomesubgrupo .' - '. $nomeagente .' <h1>

				<table cellspacing=1 cellpadding=1 width="100%" style="font-size: 10px; margin-top: -30px; text-align: center; padding-top: -60px"> 
					<tr>
					    <td><b>CÓDIGO DO AGENTE - CÓDIGO E-SOCIAL</b></td>
					    <td></td>
						<td><b>Código do GHE</b></td>
					</tr>
					<tr>
						<td style="background: #ddd; width: 49%;">'. $codigoAgente .' - '. $codigoesocial .'</td>
						<td style="height: 2%;"></td>
						<td style="background: #ddd; width: 49%;">'. $codigo_ghe .'</td>
					</tr>
				</table>
				
				
				<h2 style="font-size: 10px; padding-top: -40px;"> IDENTIFICAÇÃO E RECONHECIMENTO GRUPO OCUPACIONAL: </h2>
				<table  cellpadding=1 width="100%" style="font-size: 12px; padding-top: -10px;"> 
					<tr>
					    <td style="width: 30%; text-align: center;">Propagação / Absorção:</td>
						<td style="border: 1px solid black;"> '. $meioPropagacao .' </td>
					</tr>
					<tr>
					    <td style="text-align: center;">Caracterização da Exposição:</td>
					    <td style="border: 1px solid black;">'.$exposicao.'</td>
					</tr>
					<tr>
					    <td style="text-align: center;">Danos a Saúde</td>
					    <td style="border: 1px solid black;"> '. $danos_saude .' </td>
					</tr>
					<tr>
					    <td style="text-align: center;">Principais Fontes Geradoras:</td>
					    <td style="border: 1px solid black;"> '. $fontes_geradoras .' </td>
					</tr>
					<tr>
					    <td style="text-align: center;">Medida de Controle Existente(s):</td>
					    <td style="border: 1px solid black;"> '. $controle .' </td>
					</tr>
				</table>

				<p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: -20px 0px 0px 0px;"><b style="font-size: 11px;">RESUMO DE METODOLOGIA E INSTRUMENTAL UTILIZADO</b><br><b> '. $metodomedicao_agente .'</b> <br> <b> Equipamentos Utilizados na Medição </b> <br> '. $equipamento_medicao .' </p>';
					
						
						$sql1 = "SELECT * FROM tbresultado_quim WHERE cdRisco = ".$codigorisco;
						$result_quim = mysqli_query($link,$sql1);
							foreach($result_quim as $result_quim){ 
								$dataAvaliacao_quim = date("d/m/Y", strtotime($result_quim['dataAvaliacao']));
								$codrastreio_quim = $result_quim['codigoRastreio'];
								$prcntgSio2 = $result_quim['prcntgSio2'];
								$imprimirSio2 = $result_quim['imprimirSio2'];
								$concentracaomg = str_replace(",",".",$result_quim['concentracaomg']);
								$risco_quim = $result_quim['cdRisco'];
								$observacao = $result_quim['obs'];
							}
						$fpmr = round($concentracaomg / $agentelimitefloat, 2);
						$calcfpmr = $fpmr;

						$anteci_riscos .= '
						<h2 style="font-size: 13px; text-align: center; margin: 0.6cm; padding-top: -17px"> RESULTADOS OBTIDOS DAS AMOSTRAGENS </h2>
						<table border=0.5   width="100%" style="font-size: 11px; text-align: center;
						margin: -10px 0px 0px 0px;">
							<tr style="background: #ddd;">
								<td rowspan="2">Data</td>
							    <td rowspan="2">Agente Ambiental</td>
							    <td colspan="2">Concentração obtida</td>
							    <td rowspan="2">Norma / Referência</td>
							    <td colspan="2">Nível de Ação</td>
							  	<td colspan="2">Limite de Tolerância</td>';
							  	if(preg_match("/Monóxido de Carbono/" , $nomeagente)){}else{
									$anteci_riscos .='<td rowspan="2">FPMR</td>';
								}
								$anteci_riscos .='
							</tr>
							<tr style="background: #ddd;">
								<td>ppm</td>
								<td>mg/m³</td>
								<td>ppm</td>
								<td>mg/m³</td>
								<td>ppm</td>
								<td>mg/m³</td>
							</tr>';
						if($unidadeagente == 1){
							$anteci_riscos .='<tr>
								<td>'.$dataAvaliacao_quim.'</td>
								<td>'.$nomeagente.'</td>
								<td>'.$concentracaomg.'</td>
								<td> - </td>
								<td>'.$regulamentacaodoagente.'</td>
								<td>'.$agente_nivel.'</td>
								<td> - </td>
								<td>'.$agente_limite.'</td>
								<td> - </td>';
								if(preg_match("/Monóxido de Carbono/" , $nomeagente)){}else{
									$anteci_riscos .='<td>'.$fpmr.'</td>';
								}
								$anteci_riscos .='</tr>';
						}elseif($unidadeagente == 2){
							$anteci_riscos .='<tr>
								<td>'.$dataAvaliacao_quim.'</td>
								<td>'.$nomeagente.'</td>
								<td> - </td>
								<td>'.$concentracaomg.'</td>
								<td>'.$regulamentacaodoagente.'</td>
								<td> - </td>
								<td>'.$agente_nivel.'</td>
								<td> - </td>
								<td>'.$agente_limite.'</td>';
								if(preg_match("/Monóxido de Carbono/" , $nomeagente)){}else{
									$anteci_riscos .='<td>'.$fpmr.'</td>';
								}
								$anteci_riscos .='</tr>';
						}

						$anteci_riscos .='</table>
						<table border=0.5 width="100%" style="font-size: 11px; text-align: center; margin-bottom: 0.3cm; margin-top: 0.5cm;" cellspacing=0 >
							<tr>';
							$epi_num = 0;
							if($codepi_risco == 0){
								$EPI = false;
							}else{
								$sql3 = "SELECT * FROM tbepi WHERE cdEPI = ".$codepi_risco;
								$result_epi = mysqli_query($link,$sql3);
								foreach($result_epi as $result_epi){
									$epi_num = $epi_num + 1;
									$nome_epi = $result_epi['nome'];
									$fpa = str_replace(",",".",$result_epi['nivelProtecao']);
									$EPI = true;
									$ca = $result_epi['ca'];
									if($fpa < $calcfpmr){
										$calc = 'Não';
									}elseif($fpa > $calcfpmr){
										$calc = 'Sim';
									}else{
										$calc = 'Não';
									}
									$anteci_riscos .= '<td>'.$epi_num.'</td>
									<td style="background: #ddd"><b>EPR Utilizado</b></td>
									<td>'.$nome_epi.'</td>	
									<td style="background: #ddd"><b>CA</b></td>
									<td>'.$ca.'</td>
									<td style="background: #ddd"><b>FPA do EPR</b></td>
									<td>'.$fpa.'</td>
									<td style="background: #ddd"><b>O EPR é adequado?</b></td>
									<td>'.$calc.'</td>';
								}
							}
						
							
						$anteci_riscos .= '</tr>
						</table><p><b>Nota:</b>'.$observacao.'</p>';

						//parametrizando respostas da análise e interpretação de resultados
						if(preg_match("/Inspeção/" , $concentracaomg) && $EPI == true){
							$analise_result = 'Foi utilizado o EPR (equipamento de proteção respiratória), mas não foram realizadas todas as fases previstas na NR09 -9.1.1 da antecipação, reconhecimento, avaliação e controle dos riscos ocupacionais. A não efetivação da fase de avaliação quantitativa dos agentes químicos torna possível concluir o cálculo de eficiência do EPI e consequentemente o reconhecimento do perfil ocupacional.';
						}elseif(preg_match("/Inspeção/" , $concentracaomg) && $EPI == false){
							$analise_result = 'Durante as atividades laborais, não foram identificado o uso do EPR ( Equipamento de Proteção Respiratória).A não efetivação da fase de avaliação quantitativa dos agentes químicos não torna possível concluir o cálculo de eficiência do EPI e consequentemente o reconhecimento do perfil ocupacional.';
						}elseif($fpmr > 1 && $EPI == false){
							$analise_result = 'O valor da concentração do agente ocupacional encontrada está acima do limite de tolerância e acima do valor máximo permitido para exposição ocupacional caracterizando grave e iminente risco à saúde dos empregados sem adoção do uso do EPR (Equipamento de Proteção Respiratória).';
						}elseif($fpa > $fpmr){
							$analise_result = 'Utilização do protetor respiratório de ordem individual reduz a concentração do agente ambiental avaliado a concentrações inferiores ao limite de tolerância estabelecido da Norma Regulamentadora NR 15 da Portaria 3214/78 do Ministério do Trabalho e Emprego - MTE. Conforme determina a NR 9 deverão ser analisados e implantadas medidas de ordem coletiva, que possam reduzir ou eliminação a concentração do agente ambiental ao nível de ação.';
						}elseif($fpa < $fpmr){
							$analise_result = 'Utilização do protetor respiratório de ordem individual não reduziu a concentração do agente ambiental avaliado, a concentrações inferiores ao limite de tolerância estabelecido pela NR 15. Deverá realizar seleção de novo EPR (equipamento de proteção respiratória) de caráter imediato e conforme a NR09 deverá ser implantadas medidas de controle de ordem coletiva, para eliminação ou neutralização mantendo ás concentrações ao nível de ação.';
						}
						

						if(preg_match("/Inspeção/" , $concentracaomg)){
							$analise_result2 = 'O agente ocupacional foi identificando durante as fases de antecipação e reconhecimento dos riscos ocupacionais, conforme a NR09 deverá constar no cronograma de ações deste PPRA, o planejamento das avaliações quantitativas para definição do perfil de exposição ocupacional.';
						}elseif($fpmr < 0.5){
							$analise_result2 = 'De acordo com os dados obtidos, ficou abaixo do limite de tolerância. Sendo assim, considera-se que o perfil da exposição ocupacional não excedeu o limite de tolerância conforme a NR15.';
						}elseif($fpmr >= 0.5 && $fpmr < 1){
							$analise_result2 = 'De acordo com os dados obtidos, ficou na faixa de exposição do nível de ação. Sendo assim, considera-se que o perfil da exposição ocupacional não excedeu o limite de tolerância conforme a NR15.';
						}elseif($fpmr == 1){
							$analise_result2 = 'De acordo com os dados obtidos, encontra-se em uma faixa de incerteza quanto a definição da exposição ocupacional. Sendo assim, considera-se que o perfil da exposição ocupacional não excedeu o limite de tolerância de exposição conforme a NR15.';
						}elseif($fpmr > 1){
							$analise_result2 = 'De acordo com os dados obtidos, ficou acima do limite de tolerância. Sendo assim, considera-se que o perfil da exposição ocupacional excedeu o limite de tolerância conforme a NR15.';
						}
							$recomendacoes = 'Divulgar aos empregados as informações relativas ao risco avaliado e as ações preventivas, bem como o perfil de exposição ocupacional representado pelo seu GHE.';
						if(preg_match("/Monóxido de Carbono/" , $nomeagente)){
							if($fpmr < 1){
								$recomendacoes .= '<br>Recomenda-se manter o monitoramento permanente nos ambientes de trabalho sujeitos a emissão de Monóxido de Carbono através de monitores fixos ou monitores de uso pessoal com alarme sonoro e visual de forma a possibilitar a fuga das pessoas em situações de grave e iminente risco da ocorrência de concentrações elevadas.';
							}
							if($fpmr > 0.5 && $fpmr <= 1){
								$recomendacoes .= '<br>Conforme o item 9.3.6.1 da NR-09 devem ser iniciadas ações preventivas de forma a minimizar a probabilidade de que a exposição ocupacional ao agente ambiental avaliado possa em algum momento da jornada de trabalho, ultrapassar o valor do Limite de Referência Ocupacional. Recomenda-se que após análise global do PPRA, seja inserido no cronograma de ações novas avaliações quantitativas do agente ocupacional garantindo validação do perfil de exposição ocupacional.';
							}elseif($fpmr > 1){
								$recomendacoes .= '<br>Recomenda-se elaborar estudo de viabilidade técnica e operacional para implantação de medidas de controle de ordem coletiva, seguindo a hierarquia definida no item 9.3.5.2 da NR-09, de modo a reduzir a emissão do agente ambiental avaliado no ambiente de trabalho, em concentrações que irá priorizar obter resultados abaixo do nível de ação, com a finalidade de garantir a integridade da saúde e segurança dos empregados.';
							}
						}else{
						//parametrizando respostas da recomendacoes
							if($fpmr > 0.5 && $fpmr <= 1){
								$recomendacoes .= 'Conforme o item 9.3.6.1 da NR-09 devem ser iniciadas ações preventivas de forma a minimizar a probabilidade de que a exposição ocupacional ao agente ambiental avaliado possa em algum momento da jornada de trabalho, ultrapassar o valor do Limite de Referência Ocupacional. Recomenda-se que após análise global do PPRA, seja inserido no cronograma de ações novas avaliações quantitativas do agente ocupacional garantindo validação do perfil de exposição ocupacional.';
							}elseif($fpmr > 1){
								$recomendacoes .= 'Recomenda-se elaborar estudo de viabilidade técnica e operacional para implantação de medidas de controle de ordem coletiva, seguindo a hierarquia definida no item 9.3.5.2 da NR-09, de modo a reduzir a emissão do agente ambiental avaliado no ambiente de trabalho, em concentrações que irá priorizar obter resultados abaixo do nível de ação, com a finalidade de garantir a integridade da saúde e segurança dos empregados.';
							}
							if($codepi_risco != 0){
								$recomendacoes .= '<br>Realizar treinamentos previstos no PPR, com os empregados quanto ao uso, manutenção e guarda dos EPR - Equipamentos de proteção respiratória. Manter uma contínua supervisão na utilização dos EPR durante as atividades laborais.';
							}
						}
		
				$anteci_riscos .= '<p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: 0px;"><b style="font-size: 11px;">CONCLUSÃO DA ATENUAÇÃO:</b><br>'.$analise_result.'</b></p><br>';


				$anteci_riscos .='<p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: 0px;"><b style="font-size: 11px;">CONCLUSÃO: </b><br> '. $analise_result2 .' </p><br>

				<p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: 0px;"><b style="font-size: 11px;">RECOMENDAÇÕES DE MEDIDAS CORRETIVAS E/OU PREVENTIVAS:</b><br>'. $recomendacoes .' </p>';
				
				$termo = 'Inserção';
				$pattern = '/' . $termo . '/';
				$termo2 = 'Protetor auditivo';
				$pattern = '/' . $termo2 . '/';//Padrão a ser encontrado na string $tags
				if ($nen_ruido > 0 && preg_match($pattern, $nome_epi)) {
 					$anteci_riscos .='<p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: 0px;">Reavaliação quantitativa periódica do GHE:<br> Analisar alteração do tipo de protetor inserção, para tipo concha em conformidade com capacete utilizado. </p><br>';
 					if($nen_ruido>85){
 						$anteci_riscos .='<p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: 0px;"> Realizar novas avaliações e verificar o EPI equipamento de proteção individual com maior capacidade de atenuação. </p><br>';
 					}
				}elseif(preg_match($pattern2, $nome_epi)){
 					$anteci_riscos .='Substituir periodicamente o protetor individual ou os seus componentes que venham apresentar o menor sinal de desgaste ou danos, como: selos, espumas, hastes e molas de pressão, de modo a manter o máximo desempenho durante o tempo de uso na jornada laboral.<br>Manter uma continua verificação e fiscalização por parte da supervisão das áreas em geral, quanto à utilização efetiva do protetor individual pelos empregados durante todo o tempo de exposição ocupacional ao agente de ruído.';
				}

				$anteci_riscos .='<div style="height: 70px;"></div>

				<div style="height: 1px; background: #222; width: 40%; margin-left: 30%; margin-bottom: 2px; "></div>
				<p style="text-align: center; font-size: 11px; text-indent: 0; line-height: 1; margin-top: -15px;"> '.$engenheiro.'
								<br>'.$cargoeng.'</p>
				</div>
				';
				}elseif($risco['tipoRisco'] == 3){
				$final = $final + 1; //resultado quimico
				$sql1 = "SELECT * FROM tbresultado_vibr WHERE cdRisco = ".$codigorisco;
				$result_vibr = mysqli_query($link,$sql1);
					foreach($result_vibr as $result_vibr){ 
						$codrastreio_vibr = $result_vibr['codigoRastreio'];
						$vibrtype = intval($result_vibr['tipoVibracao']) + 1;
						$aren_vibr = $result_vibr['aren'];
						$aren_vibr2 = $result_vibr['aren'];
						$aren_vibr3 = $result_vibr['aren'];
						$vdvr_vibr = $result_vibr['vdvrms175'];
						$vdvr_vibr2 = $result_vibr['vdvrms175'];
						$vdvr_vibr3 = $result_vibr['vdvrms175'];
						$tempoefetivo_vibr = $result_vibr['tempoEfetivo'];
						$equipamento_vibr = $result_vibr['equipamento'];
						$risco_vibr = $result_vibr['cdRisco'];
						$observacao = $result_vibr['obs'];
						
					}
					if($vibrtype == 1){
						$anteci_riscos .= '<div style="height: 22cm; page-break-after: always;">
						<h1 style="text-align: center; font-size: 14px; ">VIBRAÇÃO DE CORPO INTEIRO - VCI<h1>

						<table cellspacing=1 cellpadding=1 width="100%" style="font-size: 10px; margin-top: -50px; text-align: center; padding-top: -60px"> 
							<tr>
							    <td><b>CÓDIGO DO AGENTE - CÓDIGO E-SOCIAL</b></td>
							    <td></td>
								<td><b>Código do GHE</b></td>
							</tr>
							<tr>
								<td style="background: #ddd; width: 49%;">'. $codigoAgente .' - '. $codigoesocial .'</td>
								<td style="height: 2%;"></td>
								<td style="background: #ddd; width: 49%;">'. $codigo_ghe .'</td>
							</tr>
						</table>
						
						
						<h2 style="font-size: 10px; padding-top: -40px;"> IDENTIFICAÇÃO E RECONHECIMENTO GRUPO OCUPACIONAL: </h2>
						<table  cellpadding=1 width="100%" style="font-size: 12px; padding-top: -10px;"> 
							<tr>
							    <td style="width: 30%; text-align: center;">Propagação / Absorção:</td>
								<td style="border: 1px solid black;"> '. $meioPropagacao .' </td>
							</tr>
							<tr>
							    <td style="text-align: center;">Caracterização da Exposição:</td>
							    <td style="border: 1px solid black;">'.$exposicao.'</td>
							</tr>
							<tr>
							    <td style="text-align: center;">Danos a Saúde</td>
							    <td style="border: 1px solid black;"> '. $danos_saude .' </td>
							</tr>
							<tr>
							    <td style="text-align: center;">Principais Fontes Geradoras:</td>
							    <td style="border: 1px solid black;"> '. $fontes_geradoras .' </td>
							</tr>
							<tr>
							    <td style="text-align: center;">Medida de Controle Existente(s):</td>
							    <td style="border: 1px solid black;"> '. $controle .' </td>
							</tr>
						</table>

						<p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: -20px 0px 0px 0px;"><b style="font-size: 11px;">RESUMO DE METODOLOGIA E INSTRUMENTAL UTILIZADO</b><br><b> '. $metodomedicao_agente .'</b> <br> <b> Equipamentos Utilizados na Medição </b> <br> '. $equipamento_medicao .' </p>';
							

								$anteci_riscos .= '
								<h2 style="font-size: 13px; text-align: center; margin: 0.6cm; padding-top: -17px"> RESULTADOS OBTIDOS DAS AMOSTRAGENS </h2>
								<table border=0.5   width="100%" style="font-size: 11px; text-align: center;margin: -10px 0px 0px 0px;">
									<tr style="background: #ddd;">
										<td rowspan="2">Código da Amostra</td>
									    <td rowspan="2">Tempo de Exposição (min)</td>
									    <td rowspan="2">Descrição do(s) Equipamento(s)</td>
									    <td colspan="2">Nível de Ação</td>
									    <td colspan="2">Limite de Tolerância</td>
									    <td colspan="2">Resultados</td>
									</tr>
									<tr style="background: #ddd;">
										<td>aren (Σ XYZ) m/s2</td>
										<td>Valor Dose Vibração Resultante (VDVR) m/s1,75</td>
										<td>aren (Σ XYZ) m/s2</td>
										<td>Valor Dose Vibração Resultante (VDVR) m/s1,75</td>
										<td>aren (Σ XYZ) m/s2</td>
										<td>Valor Dose Vibração Resultante (VDVR) m/s1,75</td>
									</tr>
									<tr>
										<td>'.$codrastreio_vibr.'</td>
										<td>'.$tempoefetivo_vibr.'</td>
										<td>'.$equipamento_vibr.'</td>
										<td>'.$agente_nivel.'</td>
										<td>'.$agente_nivelacgih.'</td>
										<td>'.$agente_limite.'</td>
										<td>'.$agente_limiteacgih.'</td>
										<td>'.$aren_vibr.'</td>
										<td>'.$vdvr_vibr.'</td>
									</tr>
								</table><p><b>Nota:</b>'.$observacao.'</p><br>';

								/*//parametrizando respostas da análise e interpretação de resultados
								if(preg_match("/Inspeção/" , $concentracaomg) && $EPI == true){
									$analise_result = 'Foi utilizado o EPR (equipamento de proteção respiratória), mas não foram realizadas todas as fases previstas na NR09 -9.1.1 da antecipação, reconhecimento, avaliação e controle dos riscos ocupacionais. A não efetivação da fase de avaliação quantitativa dos agentes químicos torna possível concluir o cálculo de eficiência do EPI e consequentemente o reconhecimento do perfil ocupacional.';
								}elseif(preg_match("/Inspeção/" , $concentracaomg) && $EPI == false){
									$analise_result = 'Durante as atividades laborais, não foram identificado o uso do EPR ( Equipamento de Proteção Respiratória).A não efetivação da fase de avaliação quantitativa dos agentes químicos torna possível concluir o cálculo de eficiência do EPI e consequentemente o reconhecimento do perfil ocupacional.';
								}elseif($fpmr > 1 && $EPI == false){
									$analise_result = 'O valor da concentração do agente ocupacional encontrada está acima do limite de tolerância e acima do valor máximo permitido para exposição ocupacional caracterizando grave e iminente risco à saúde dos empregados sem adoção do uso do EPR (Equipamento de Proteção Respiratória).';
								}elseif($fpa > $fpmr){
									$analise_result = 'Utilização do protetor respiratório de ordem individual reduz a concentração do agente ambiental avaliado a concentrações inferiores ao limite de tolerância estabelecido da Norma Regulamentadora NR 15 da Portaria 3214/78 do Ministério do Trabalho e Emprego - MTE. Conforme determina a NR 9 deverão ser analisados e implantadas medidas de ordem coletiva, que possam reduzir ou eliminação a concentração do agente ambiental ao nível de ação.';
								}elseif($fpa < $fpmr){
									$analise_result = 'Utilização do protetor respiratório de ordem individual não reduziu a concentração do agente ambiental avaliado, a concentrações inferiores ao limite de tolerância estabelecido pela NR 15. Deverá realizar seleção de novo EPR (equipamento de proteção respiratória) de caráter imediato e conforme a NR09 deverá ser implantadas medidas de controle de ordem coletiva, para eliminação ou neutralização mantendo ás concentrações ao nível de ação.';
								}*/
								if(preg_match("/Inspeção/" , $aren_vibr2)){
									$analise_result2 = 'O agente ocupacional foi identificando durante as fases de antecipação e reconhecimento dos riscos ocupacionais, conforme a NR09 deverá constar no cronograma de ações deste PPRA, o planejamento das avaliações quantitativas para definição do perfil de exposição ocupacional.';
								}else{
									if($aren_vibr2 < 0.5){
										$analise_result2 = 'De acordo com os dados obtidos, a exposição do AREN ficou abaixo do nível de ação. Sendo assim, considera-se exposição abaixo do Limite de Tolerência da NR15.<br>';
									}elseif($aren_vibr2 >= 0.5 && $aren_vibr2 < 1.1){
										$analise_result2 = 'De acordo com os dados obtidos, a exposição do AREN ficou na faixa de exposição do nível de ação . Sendo assim considera-se abaixo do limite de tolerância da NR15.<br>';
									}elseif($aren_vibr2 > 1.1 ){
										$analise_result2 = 'De acordo com os dados obtidos, a exposição do AREN encontra-se acima do limite de tolerância conforme NR15<br>';
									}
									if($vdvr_vibr2 < 9.1){
										$analise_result2 .= 'De acordo com os dados obtidos, a exposição do VDVR ficou abaixo do nível de ação. Sendo assim, considera-se exposição abaixo do Limite de Tolerência da NR15.';
									}elseif($vdvr_vibr2 >= 9.1 && $vdvr_vibr2 < 21){
										$analise_result2 .= 'De acordo com os dados obtidos, a exposição do VDVR ficou na faixa de exposição do nível de ação . Sendo assim considera-se abaixo do limite de tolerância da NR15.';
									}elseif($vdvr_vibr2 > 21){
										$analise_result2 .= 'De acordo com os dados obtidos, a exposição do VDVR encontra-se acima do limite de tolerância conforme NR15';
									}
								}
								$recomendacoes = 'Divulgar aos empregados as informações relativas ao risco avaliado e as ações preventivas, bem como o perfil de exposição ocupacional representado pelo seu GHE.<br>';
								if($aren_vibr3 > 1.1 || $vdvr_vibr3 > 21){
									$recomendacoes .= 'Recomenda-se realizar avaliações períodicas, verificar viabilidade de implantação de medidas de controle de ordem coletiva e administrativas.';
								}
						


						$anteci_riscos .='<p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: 0px;"><b style="font-size: 11px;">CONCLUSÃO: </b><br> '. $analise_result2 .' </p><br>

						<p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: 0px;"><b style="font-size: 11px;">RECOMENDAÇÕES DE MEDIDAS CORRETIVAS E/OU PREVENTIVAS:</b><br>'. $recomendacoes .' </p>';
						
		
						$anteci_riscos .='<div style="height: 70px;"></div>

						<div style="height: 1px; background: #222; width: 40%; margin-left: 30%; margin-bottom: 2px; "></div>
						<p style="text-align: center; font-size: 11px; text-indent: 0; line-height: 1; margin-top: -15px;"> '.$engenheiro.'
										<br>'.$cargoeng.'</p>
						</div>
						';
					}elseif($vibrtype == 2){ 
						$anteci_riscos .= '<div style="height: 22cm; page-break-after: always;">
						<h1 style="text-align: center; font-size: 14px; ">VIBRAÇÃO DE MÃOS E BRAÇOS - VMB<h1>

						<table cellspacing=1 cellpadding=1 width="100%" style="font-size: 10px; margin-top: -50px; text-align: center; padding-top: -60px"> 
							<tr>
							    <td><b>CÓDIGO DO AGENTE - CÓDIGO E-SOCIAL</b></td>
							    <td></td>
								<td><b>Código do GHE</b></td>
							</tr>
							<tr>
								<td style="background: #ddd; width: 49%;">'. $codigoAgente .' - '. $codigoesocial .'</td>
								<td style="height: 2%;"></td>
								<td style="background: #ddd; width: 49%;">'. $codigo_ghe .'</td>
							</tr>
						</table>
						
						
						<h2 style="font-size: 10px; padding-top: -40px;"> IDENTIFICAÇÃO E RECONHECIMENTO GRUPO OCUPACIONAL: </h2>
						<table  cellpadding=1 width="100%" style="font-size: 12px; padding-top: -10px;"> 
							<tr>
							    <td style="width: 30%; text-align: center;">Propagação / Absorção:</td>
								<td style="border: 1px solid black;"> '. $meioPropagacao .' </td>
							</tr>
							<tr>
							    <td style="text-align: center;">Caracterização da Exposição:</td>
							    <td style="border: 1px solid black;">'.$exposicao.'</td>
							</tr>
							<tr>
							    <td style="text-align: center;">Danos a Saúde</td>
							    <td style="border: 1px solid black;"> '. $danos_saude .' </td>
							</tr>
							<tr>
							    <td style="text-align: center;">Principais Fontes Geradoras:</td>
							    <td style="border: 1px solid black;"> '. $fontes_geradoras .' </td>
							</tr>
							<tr>
							    <td style="text-align: center;">Medida de Controle Existente(s):</td>
							    <td style="border: 1px solid black;"> '. $controle .' </td>
							</tr>
						</table>

						<p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: -20px 0px 0px 0px;"><b style="font-size: 11px;">RESUMO DE METODOLOGIA E INSTRUMENTAL UTILIZADO</b><br><b> '. $metodomedicao_agente .'</b> <br> <b> Equipamentos Utilizados na Medição </b> <br> '. $equipamento_medicao .' </p>';
							

								$anteci_riscos .= '
								<h2 style="font-size: 13px; text-align: center; margin: 0.6cm; padding-top: -17px"> RESULTADOS OBTIDOS DAS AMOSTRAGENS </h2>
								<table border=0.5   width="100%" style="font-size: 11px; text-align: center;margin: -10px 0px 0px 0px;">
									<tr style="background: #ddd;">
										<td rowspan="2">Código da Amostra</td>
									    <td rowspan="2">Tempo de Exposição (min)</td>
									    <td rowspan="2">Descrição do(s) Equipamento(s)</td>
									    <td>Nível de Ação</td>
									    <td>Limite de Tolerância</td>
									    <td>Resultados</td>
									</tr>
									<tr style="background: #ddd;">
										<td>aren (Σ XYZ) m/s2</td>
										<td>aren (Σ XYZ) m/s2</td>
										<td>aren (Σ XYZ) m/s2</td>
									</tr>
									<tr>
										<td>'.$codrastreio_vibr.'</td>
										<td>'.$tempoefetivo_vibr.'</td>
										<td>'.$equipamento_vibr.'</td>
										<td>'.$agente_nivel.'</td>
										<td>'.$agente_limite.'</td>
										<td>'.$aren_vibr.'</td>
									</tr>
								</table><p><b>Nota:</b>'.$observacao.'</p><br>';

								if(preg_match("/Inspeção/" , $aren_vibr2)){
									$analise_result2 = 'O agente ocupacional foi identificando durante as fases de antecipação e reconhecimento dos riscos ocupacionais, conforme a NR09 deverá constar no cronograma de ações deste PPRA, o planejamento das avaliações quantitativas para definição do perfil de exposição ocupacional.';
								}elseif($aren_vibr2 < 2.5){
									$analise_result2 = 'De acordo com os dados obtidos, a exposição do AREN ficou abaixo do nível de ação. Sendo assim, considera-se exposição abaixo do Limite de Tolerência da NR15.';
								}elseif($aren_vibr2 >= 2.5 && $aren_vibr2 < 5){
									$analise_result2 = 'De acordo com os dados obtidos, a exposição do AREN ficou na faixa de exposição do nível de ação . Sendo assim considera-se abaixo do limite de tolerância da NR15.';
								}elseif($aren_vibr2 > 5){
									$analise_result2 = 'De acordo com os dados obtidos, a exposição do AREN encontra-se acima do limite de tolerância conforme NR15';
								}
								$recomendacoes = 'Divulgar aos empregados as informações relativas ao risco avaliado e as ações preventivas, bem como o perfil de exposição ocupacional representado pelo seu GHE.<br>';
								if($aren_vibr3 > 5){
									$recomendacoes .= 'Recomenda-se realizar avaliações períodicas, verificar viabilidade de implantação de medidas de controle de ordem coletiva e administrativas.';
								}
				


						$anteci_riscos .='<p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: 0px;"><b style="font-size: 11px;">CONCLUSÃO: </b><br> '. $analise_result2 .' </p><br>

						<p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: 0px;"><b style="font-size: 11px;">RECOMENDAÇÕES DE MEDIDAS CORRETIVAS E/OU PREVENTIVAS:</b><br>'. $recomendacoes .' </p>';
						
		
						$anteci_riscos .='<div style="height: 70px;"></div>

						<div style="height: 1px; background: #222; width: 40%; margin-left: 30%; margin-bottom: 2px; "></div>
						<p style="text-align: center; font-size: 11px; text-indent: 0; line-height: 1; margin-top: -15px;"> '.$engenheiro.'
										<br>'.$cargoeng.'</p>
						</div>
						';
					}

				}elseif($risco['tipoRisco'] == 4){
				$final = $final + 1; //resultado quimico
				$anteci_riscos .= '<div style="height: 22cm; page-break-after: always;">
				<h1 style="text-align: center; font-size: 14px; ">'. $nomesubgrupo .' - '. $nomeagente .' <h1>

				<table cellspacing=1 cellpadding=1 width="100%" style="font-size: 10px; margin-top: -30px; text-align: center; padding-top: -60px"> 
					<tr>
					    <td><b>CÓDIGO DO AGENTE - CÓDIGO E-SOCIAL</b></td>
					    <td></td>
						<td><b>Código do GHE</b></td>
					</tr>
					<tr>
						<td style="background: #ddd; width: 49%;">'. $codigoAgente .' - '. $codigoesocial .'</td>
						<td style="height: 2%;"></td>
						<td style="background: #ddd; width: 49%;">'. $codigo_ghe .'</td>
					</tr>
				</table>
				
				
				<h2 style="font-size: 10px; padding-top: -40px;"> IDENTIFICAÇÃO E RECONHECIMENTO GRUPO OCUPACIONAL: </h2>
				<table  cellpadding=1 width="100%" style="font-size: 12px; padding-top: -10px;"> 
					<tr>
					    <td style="width: 30%; text-align: center;">Propagação / Absorção:</td>
						<td style="border: 1px solid black;"> '. $meioPropagacao .' </td>
					</tr>
					<tr>
					    <td style="text-align: center;">Caracterização da Exposição:</td>
					    <td style="border: 1px solid black;">'.$exposicao.'</td>
					</tr>
					<tr>
					    <td style="text-align: center;">Danos a Saúde</td>
					    <td style="border: 1px solid black;"> '. $danos_saude .' </td>
					</tr>
					<tr>
					    <td style="text-align: center;">Principais Fontes Geradoras:</td>
					    <td style="border: 1px solid black;"> '. $fontes_geradoras .' </td>
					</tr>
					<tr>
					    <td style="text-align: center;">Medida de Controle Existente(s):</td>
					    <td style="border: 1px solid black;"> '. $controle .' </td>
					</tr>
				</table>

				<p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: -20px 0px 0px 0px;"><b style="font-size: 11px;">RESUMO DE METODOLOGIA E INSTRUMENTAL UTILIZADO</b><br><b> '. $metodomedicao_agente .'</b> <br> <b> Equipamentos Utilizados na Medição </b> <br> '. $equipamento_medicao .' </p>';
					
						$sql1 = "SELECT * FROM tbresultado_caloraux WHERE cdRisco =".$idrisco;
						$result_caloraux = mysqli_query($link,$sql1);
						foreach ($result_caloraux as $caloraux){
							$ciclo = $caloraux['ciclo'];
							$amost = $caloraux['cdAmostragem'];
						}
						$sql1 = "SELECT * FROM tbresultado_calor WHERE cdRisco = ".$codigorisco;
						$result_calor = mysqli_query($link,$sql1);
						$anteci_riscos .= '
						<h2 style="font-size: 13px; text-align: center; margin: 0.6cm; padding-top: -17px"> RESULTADOS OBTIDOS DAS AMOSTRAGENS </h2>
						<table border=0.5   width="100%" style="font-size: 9px; text-align: center;
						margin: -10px 0px 0px 0px;">
							<tr style="background: #ddd;">
								<td><b>Identificação do Ciclo</b></td>
								<td colspan="9" style="background: white">'.$ciclo.'</td>
							</tr>
							<tr style="background: #ddd;">
								<td><b>Código de Amostragem</b></td>
								<td style="background: white">'.$amost.'</td>
								<td><b>Regime de Trabalho</b></td>
								<td style="background: white" colspan="7">Intermitente com período de descanso em outro local (local de descanso).</td>
							</tr>
							<tr style="background: #ddd;">
								<td>Ponto de Medição</td>
								<td>Descrição Resumida Atividade</td>
								<td>Carga Solar S/N</td>
								<td>Tempo de Execução (minutos)</td>
								<td>TG (ºC)</td>
								<td>TBN (ºC)</td>
								<td>TBS (ºC)</td>
								<td>IBUTG (ºC)</td>
								<td>Taxa de Metabolica (Kcal/h)</td>
								<td>IBUTG Máximo Permitido</td>
							</tr>';

							$time = 0;
							$time2 = 0;
							$time3 = 0;
							$ibutgall = 0;
							$ibutgall2 = 0;
							$taxa = 0;
							$taxa2 = 0;
							$numdelinhas = 0;
							foreach($result_calor as $result_calor){ 
								$numdelinhas++;
								$pontomed = $result_calor['pontoDeMedicao'];
								$tarefa = $result_calor['tarefa'];
								$obs = $result_calor['observacao'];
								if($result_calor['cargasolar'] == 1){
									$cargasolar = 'Sim';
								}else{
									$cargasolar = 'Não';
								}
								$tempoexec = $result_calor['tempoexec'];
								$time = $time + $tempoexec;
								$time3 = $time3 + $result_calor['tempoexec'];
								$time2 = $time2 + $result_calor['tempoexec'];
								$tg = $result_calor['tg'];
								$tbn = $result_calor['tbn'];
								$tbs = $result_calor['tbs'];
								$ibutg = $result_calor['ibutg'];
								$metabolica = $result_calor['metabolica'];
								if(!preg_match("/Inspeção/" , $ibutg)){
									$taxa2 = $taxa2 + str_replace(",",".",$metabolica);
									$taxa = $taxa + str_replace(",",".",$metabolica);
								}else{
									$taxa2 = "Inspeção";
									$taxa = "Inspeção";
									$concord1 = 1;
									$tg = '';
									$tbn = '';
									$tbs = '';
								}

								$ibutgall = $ibutgall + ($ibutg * $tempoexec) ;
								$ibutgall2 = $ibutgall2 + ($ibutg * $tempoexec) ;
								$anteci_riscos .= '<tr style="background: white;">
													<td>'.$pontomed.'</td>
													<td>'.$tarefa.'</td>
													<td>'.$cargasolar.'</td>
													<td>'.$tempoexec.'</td>
													<td>'.$tg.'</td>
													<td>'.$tbn.'</td>
													<td>'.$tbs.'</td>
													<td>'.$ibutg.'</td>
													<td>'.$metabolica.'</td>
													<td border=0></td>
												</tr>';

							}
							if(!preg_match("/Inspeção/" , $taxa)){
								$taxaall =  round($taxa / $numdelinhas, 2);
								$taxaaall = round($taxa2 / $numdelinhas, 2);
							}else{
								$taxaall = "Inspeção";
								$taxaaall = "Inspeção";
								$concord2 = 1;
							}
							if(!preg_match("/Inspeção/" , $ibutg)){
								$ibutgall = $ibutgall / $time2;
								$ibutgall =  round($ibutgall, 2);
								$ibutgall2 =  $ibutgall2 / $time3;
								$ibutgall2 =  str_replace(",",".",round($ibutgall2, 2));
							}else{
								$ibutgall = "Inspeção";
								$ibutgall = "Inspeção";
								$concord3 = 1;
							}
							$anteci_riscos .= '<tr style="background: white;">
								<td colspan="3"><b>Tempo do Ciclo e Valores Ponderados do Ciclo</b></td>
								<td>'.$time.'</td>
								<td colspan="3"></td>
								<td>'.$ibutgall.'</td>
								<td>'.$taxaall.'</td>';
							if($taxaaall <= 175){	
								$anteci_riscos .= '<td>30,5</td>';
								$ibutgmax = 30.5;
							}elseif($taxaaall > 175 && $taxaaall <= 200){
								$anteci_riscos .= '<td>30,0</td>';
								$ibutgmax = 30.0;
							}elseif($taxaaall > 200 && $taxaaall <= 250){
								$anteci_riscos .= '<td>28,5</td>';
								$ibutgmax = 28.5;
							}elseif($taxaaall > 250 && $taxaaall <= 300){
								$anteci_riscos .= '<td>27,5</td>';
								$ibutgmax = 27.5;
							}elseif($taxaaall > 300 && $taxaaall <= 350){
								$anteci_riscos .= '<td>26,5</td>';
								$ibutgmax = 26.5;
							}elseif($taxaaall > 350 && $taxaaall <= 400){
								$anteci_riscos .= '<td>26,0</td>';
								$ibutgmax = 26.0;
							}elseif($taxaaall > 400 && $taxaaall <= 450){
								$anteci_riscos .= '<td>25,5</td>';
								$ibutgmax = 25.5;
							}elseif($taxaaall > 450 && $taxaaall <= 500){
								$anteci_riscos .= '<td>25,0</td>';
								$ibutgmax = 25.0;
							}
							$anteci_riscos .= '</tr></table><p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: 0px;">Nota:'.$obs.'</p>';
						

						if($concord1 == 1 OR $concord2 == 1 OR $concord3 == 1){
							$analise_result = 'Durante as fases de antecipação e reconhecimento de riscos ocupacionais foi indentificado atraves de inspeção no local de trabalho.';
							$recomendacoes = 'Realizar avaliação quantitativa do agente reconhecido conforme as fases prescritas na NR09 na implementação de controle sobre a exposição ocupacional.';
						}elseif($ibutgall > $ibutgmax){
							$analise_result = 'De acordo com os dados obtidos, O IBUTG (Índice de Bulbo Úmido - Temperatura de Globo) quando relacionado com o tipo de atividade em regime de trabalho a exposição média ponderada encontra se acima do limite de tolerância. Sendo assim, considera-se que o perfil da exposição ocupacional excedeu o limite de tolerância conforme Anexo 3 da NR15.';
							$recomendacoes = 'Divulgar aos empregados as informações relativas ao risco avaliado e as ações preventivas, bem como o perfil de exposição ocupacional representado pelo seu GHE. 
							<br><br>
							Recomenda-se elaborar estudo de viabilidade técnica e operacional para implantação de medidas de controle de ordem coletiva seguindo a hierarquia definida no item 9.3.5.2 da NR-09. As medidas devem priorizar a redução das emissões de sobrecarga térmica nos postos de trabalho a valor abaixo do Limite de Tolerância e a redução da sobrecarga fisiológica por calor, com a finalidade de garantir a integridade da saúde e segurança dos empregados. Após a implantação das medidas de controle de ordem coletiva, recomenda-se reavaliar a exposição ocupacional dos empregados para comprovar a sua eficácia e manter registro documental específico. Recomenda-se treinar os empregados quanto aos procedimentos que assegurem a eficiência das medidas de controle de ordem coletiva conforme previsto no item 9.3.5.3 da NR-09. Recomenda-se reavaliar periodicamente a exposição ocupacional dos empregados sempre que ocorrer alterações físicas e de maquinários nos ambientes de trabalho, métodos de trabalho e/ou processos operacionais.';
						}else{
							$analise_result = 'De acordo com os dados obtidos, O IBUTG (Índice de Bulbo Úmido - Temperatura de Globo) quando relacionado com o tipo de atividade em regime de trabalho a exposição média ponderada encontra se abaixo do limite de tolerância. Sendo assim, considera-se que o perfil da exposição ocupacional não excedeu o limite de tolerância conforme Anexo 3 da NR15.';
							$recomendacoes = 'Divulgar aos empregados as informações relativas ao risco avaliado e as ações preventivas, bem como o perfil de exposição ocupacional representado pelo seu GHE. 
							<br><br>
							Recomenda-se manter no mínimo as condições ocupacionais existentes e reavaliar a exposição ocupacional periodicamente e sempre que houver  alterações no layout do ambiente de trabalho.';
						}
						
						
		
				$anteci_riscos .= '<p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: 0px;"><b style="font-size: 11px;">CONCLUSÃO:</b><br>'.$analise_result.'</b></p><br>';


				$anteci_riscos .='<p style="font-size: 10px; text-indent: 0em; line-height: 1.3; margin: 0px;"><b style="font-size: 11px;">RECOMENDAÇÕES DE MEDIDAS CORRETIVAS E/OU PREVENTIVAS:</b><br>'. $recomendacoes .' </p>';
				

				$anteci_riscos .='<div style="height: 70px;"></div>

				<div style="height: 1px; background: #222; width: 40%; margin-left: 30%; margin-bottom: 2px; "></div>
				<p style="text-align: center; font-size: 11px; text-indent: 0; line-height: 1; margin-top: 0px;"> '.$engenheiro.'
								<br>'.$cargoeng.'</p>
				</div>';
				}elseif($risco['tipoRisco'] == 5){
					$final = $final + 1;
					
					

				$anteci_riscos .= '<div style="height: 22cm; page-break-after: always;">
				<h1 style="text-align: center; font-size: 13px; "> AVALIAÇÃO QUALITATIVA -  '. $nomeagente .'<h1>

				<table cellspacing=1 cellpadding=1 width="100%" style="font-size: 12px; margin-top: -30px; text-align: center;"> 
					<tr>
					    <td><b>CÓDIGO DO AGENTE - CÓDIGO E-SOCIAL</b></td>
					    <td></td>
						<td><b>Código do GHE</b></td>
					</tr>
					<tr>
						<td style="background: #ddd; width: 49%;">'. $nomeagente .' - '. $codigoesocial .'</td>
						<td style="height: 2%;"></td>
						<td style="background: #ddd; width: 49%;">'. $codigo_ghe .'</td>
					</tr>
				</table>
				
				<div style="height: 0.2cm;"></div>
				
				<h2 style="font-size: 12px;"> IDENTIFICAÇÃO E RECONHECIMENTO GRUPO OCUPACIONAL: </h2>
				<table  cellpadding=1 width="100%" style="font-size: 12px; "> 
					<tr>
					    <td style="width: 30%; text-align: center;">Propagação / Absorção:</td>
						<td style="border: 1px solid black;"> '. $meioPropagacao .' </td>
					</tr>
					<tr>
					    <td style="text-align: center;">Caracterização da Exposição:</td>
					    <td style="border: 1px solid black;">'.$exposicao.'</td>
					</tr>
					<tr>
					    <td style="text-align: center;">Danos a Saúde</td>
					    <td style="border: 1px solid black;"> '. $danos_saude .' </td>
					</tr>
					<tr>
					    <td style="text-align: center;">Principais Fontes Geradoras:</td>
					    <td style="border: 1px solid black;"> '. $fontes_geradoras .' </td>
					</tr>
					<tr>
					    <td style="text-align: center;">Medida de Controle Existente(s):</td>
					    <td style="border: 1px solid black;"> '. $controle .' </td>
					</tr>
				</table>
				
				<div style="height: 0.2cm;"></div>';
				$sql1 = "SELECT * FROM tbresultado_qual WHERE cdRisco = ".$codigorisco;
					$result_qual = mysqli_query($link,$sql1);
					foreach($result_qual as $qual){ 
						$texto = $qual['texto'];
						$epiadequada = $qual['epiAdequada'];
						$epiad2 = $qual['epiAdequada'];
					}
					if($epiadequada == 1){
							$epiad = 'Sim';
					}elseif($epiadequada == 2){
							$epiad = 'Não';
					}
				$anteci_riscos .= '<p style="font-size: 12px; text-indent: 0em; line-height: 1.3; margin: 0px;"><b style="font-size: 12px;">RESUMO DE METODOLOGIA E INSTRUMENTAL UTILIZADO</b><br> <b>Normas Regulamentadoras nº. 09 / nº. 15, da Portaria 3.214, de 08/06/1978 do MTE</b> <br> '. $regulamentacao_agente.'
				<h2 style="font-size: 11px; text-align: center; margin: 0.6cm;"> AVALIAÇÃO POR INSPEÇÃO NO AMBIENTE DE TRABALHO </h2>
						<table border=0.5 cellspacing=0 cellpadding=1 width="100%" style="font-size: 11px; margin: -20px 0px 10px 0px;"> 
							<tr style="background: #ddd;">
								<td>Resultado:</td>
							</tr>
							<tr>
								<td>'.$texto.'</td>
							</tr>
						</table>
						<table border=0.5 cellspacing=0 cellpadding=1 width="100%" style="font-size: 11px; margin: 0px 0px 10px 0px;"> 
							<tr>
								<td><b>As atividades são realizadas com utilização de EPI adequado para proteção do trabalhador?</b></td>
								<td>'.$epiad.'</td>
							</tr>
						</table>';
					
					if($epiad2 == 1){
							$CONCLUSAOQUAL = 'Conforme avaliação de forma qualitativa realizada no ambiente de trabalho, os controles ocupacionais encontra-se suficiente, com possibilidade remota de algum dano à saúde dos empregados em função da utilização correta de proteção individual adequada.';
							$RECOMENDACOESQUAL = 'Substituir periodicamente as proteções individuais a menor sinal de desgaste ou danos, assim como higienização das proteções individuais. Manter uma continua verificação e fiscalização por parte da supervisão das áreas em geral, quanto à utilização efetiva das proteções individuais pelos empregados durante todo o tempo de exposição ocupacional ao agente.';
					}elseif($epiad2 == 2){
							$CONCLUSAOQUAL = 'Conforme avaliação de forma qualitativa realizada no ambiente de trabalho, os controles ocupacionais encontra-se insuficiente, existe RGI (Risco Grave e Iminente) de dano a saúde dos trabalhadores expostos ao agente avaliado em função da insuficiência da proteção individual.';
							$RECOMENDACOESQUAL = 'Implementar medidas de controle coletivas e individuais de caráter imediato para proteção dos empregados ao agente.';
					}
						
					$anteci_riscos .= '<p style="font-size: 11px; text-indent: 0em; line-height: 1.3; margin: 0px;"><b style="font-size: 12px;">CONCLUSÃO: </b><br>'.$CONCLUSAOQUAL.'</p><br>
						<p style="font-size: 11px; text-indent: 0em; line-height: 1.3; margin: 0px;"><b style="font-size: 12px;">RECOMENDAÇÕES DE MEDIDAS CORRETIVAS E/OU PREVENTIVAS: </b><br>Divulgar aos empregados as informações relativas ao risco avaliado e as ações preventivas, bem como o perfil de exposição ocupacional representado pelo seu GHE.<br>'.$RECOMENDACOESQUAL.' </p><br>

				
				<div style="height: 30px;"></div>

				<div style="height: 1px; background: #222; width: 40%; margin-left: 30%; margin-bottom: 2px;"></div>
				<p style="text-align: center; font-size: 11px; text-indent: 0; line-height: 1; margin-top: -15px;"> '.$engenheiro.'
								<br>'.$cargoeng.'</p>
				</div>
				';
				}elseif($risco['tipoRisco'] == 6){
					$final = $final + 1;
					$BIO = $BIO + 1;
			$anteci_riscos .= '<div style="height: 22cm; page-break-after: always;">
				<h1 style="text-align: center; font-size: 11px; "> RISCO BIÓLOGICO <h1>

				<table cellspacing=1 cellpadding=1 width="100%" style="font-size: 12px; margin-top: -30px; text-align: center;"> 
					<tr>
					    <td><b>CÓDIGO DO AGENTE - CÓDIGO E-SOCIAL</b></td>
					    <td></td>
						<td><b>Código do GHE</b></td>
					</tr>
					<tr>
						<td style="background: #ddd; width: 49%;">BIO'.$BIO.' - '. $nomeagente .' - '. $codigoesocial .'</td>
						<td style="height: 2%;"></td>
						<td style="background: #ddd; width: 49%;">'. $codigo_ghe .'</td>
					</tr>
				</table>
				
				<div style="height: 0.2cm;"></div>
				
				<h2 style="font-size: 12px;"> IDENTIFICAÇÃO E RECONHECIMENTO GRUPO OCUPACIONAL: </h2>
				<table  cellpadding=1 width="100%" style="font-size: 12px; "> 
					<tr>
					    <td style="width: 30%; text-align: center;">Propagação / Absorção:</td>
						<td style="border: 1px solid black;"> '. $meioPropagacao .' </td>
					</tr>
					<tr>
					    <td style="text-align: center;">Caracterização da Exposição:</td>
					    <td style="border: 1px solid black;">'.$exposicao.'</td>
					</tr>
					<tr>
					    <td style="text-align: center;">Danos a Saúde</td>
					    <td style="border: 1px solid black;"> '. $danos_saude .' </td>
					</tr>
					<tr>
					    <td style="text-align: center;">Principais Fontes Geradoras:</td>
					    <td style="border: 1px solid black;"> '. $fontes_geradoras .' </td>
					</tr>
					<tr>
					    <td style="text-align: center;">Medida de Controle Existente(s):</td>
					    <td style="border: 1px solid black;"> '. $controle .' </td>
					</tr>
				</table><p><b>Nota:</b>'.$obs.'</p>
				
				<div style="height: 0.2cm;"></div>

				<p style="font-size: 12px; text-indent: 0em; line-height: 1.3; margin: 0px;"><b style="font-size: 12px;">RESUMO DE METODOLOGIA E INSTRUMENTAL UTILIZADO</b><br> <b>Normas Regulamentadoras nº. 09 / nº. 15, da Portaria 3.214, de 08/06/1978 do MTE</b> <br> '. $regulamentacao_agente.'
				<h2 style="font-size: 11px; text-align: center; margin: 0.6cm;"> RESULTADOS OBTIDOS DAS AMOSTRAGENS </h2>
						<table border=0.5 cellspacing=0 cellpadding=1 width="100%" style="font-size: 11px; text-align: center;
						margin: -20px 0px 10px 0px;"> 
							<tr style="background: #ddd;">
								<td>Código do Agente</td>
							    <td>Agente</td>
							    <td>Descritivo</td>
							</tr>
							<tr>
								<td>BIO'.$BIO.'</td>
							    <td>'. $nomeagente .'</td>
							    <td>Relação das atividades que envolvem agentes biológicos, cuja o reconhecimento é caracterizado pela avaliação qualitativa de inspeção no ambiente  laboral, este reconhecimento trata-se das fases de antecipação, reconhecimento, avaliação e controle dos riscos ocupacionais conforme NR09.
								</td>
							</tr>
						</table>
						<p style="font-size: 11px; text-indent: 0em; line-height: 1.3; margin: 0px;"><b style="font-size: 12px;">CONCLUSÃO, ANÁLISE E INTERPRETAÇÃO DOS RESULTADOS: </b><br>Durante a fase de antecipação e reconhecimento dos riscos ocupacionais, foi reconhecido de forma qualitativa através da inspeção no ambiente laboral os <b>riscos vírus e bactérias</b>, as medidas de controles existentes, são suficiente para eliminação ou a neutralização dos agentes nocivos reconhecidos.
 </p><br>

				
				<div style="height: 30px;"></div>

				<div style="height: 1px; background: #222; width: 40%; margin-left: 30%; margin-bottom: 2px;"></div>
				<p style="text-align: center; font-size: 11px; text-indent: 0; line-height: 1; margin-top: -15px;"> '.$engenheiro.'
								<br>'.$cargoeng.'</p>
				</div>
				';
				}
			}
		}
	}

$sql1 = "SELECT * FROM tbghe WHERE cdEmpresa = $id_empresa AND cdContrato = $id_contrato";
$ghe = mysqli_query($link,$sql1);
	foreach ($ghe as $ghe) { 
		$nomeGHE = $ghe['nomeGHE'];
		$CODGHE = $ghe['codGHE'];
		$sql2 = "SELECT * FROM tbsetor WHERE cdSetor = $cdsetor";
		$riscos_ambientais .= '<li> '. $CODGHE .' - '. $nomeGHE .' </li>';
	}
$planejamentoanual = $final + 1;
$planejamentoanual2 = $final + 2;
/* Carrega seu HTML */
$dompdf->load_html('
	<html>
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
			font-size: 12px;
			line-height: 1.6;
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
			    <td style="width:370px; text-align: center; padding-left: 60px;">LAUDO TÉCNICO DE VALIAÇÕES DAS CONDIÇÕES AMBIENTAIS DOS LOCAIS DE TRABALHO - LTCAT -</td>
			    <td><img style="width:140px;" src="../img_empresas/'. $arquivo .'"/></td>
			    <td style="padding-top: 7px; padding-right: 30px; padding-bottom: 10px ">
			    	<div style="margin-left: 2px;">
						<div style="padding: 0.1cm 0.1cm; font-size: 13px; text-align: center; margin: 9px 0px 9px 0px;">RT'.$id_empresa.'-'.$id_contrato.'</div>
			    	</div>
			    	<div style="margin-left: 2px;">
						<div style="padding: 0.1cm 0.1cm; font-size: 13px; text-align: center; margin: 9px 0px 9px 0px;">DATA: '. date('d/m/Y', strtotime($execucao_inicio)) .'</div>
			    	</div>
			    </td>
			</tr>
		</table>
	</div> 
	<div class="footer">'.$footerperfil.'</span>
	</div>
	
		<!-- Titulos e inicio do pdf -->
		<div style="page-break-inside:always; height: 22cm;">
			<h1 style="text-align: center; font-size: 43px; margin-top: 150px;">LAUDO TÉCNICO DE VALIAÇÕES DAS CONDIÇÕES AMBIENTAIS DOS LOCAIS DE TRABALHO</h1>
			<h2 style="text-align: center; font-size: 35px; margin-top: 100px;">- LTCAT -</h2>
			
			<h3 style="text-align: center; font-size: 25px;  margin-top: 100px;"> '.$razao_social.' </h3>
			<h3 style="text-align: center; font-size: 25px;"> - '. date('Y', strtotime($execucao_inicio)) .' - </h3>
			<h3 style="text-align: center; font-size: 18px; margin-bottom: 80px;">RT'.$id_empresa.'-'.$id_contrato.'</h3>
		</div>

		<!-- Indice do arquivo -->
		<div style="page-break-after: always; height: 22cm; text-size: 10px; padding-left: 10px;">
			<h3 style="text-align: center; font-size: 20px;"> Índice </h3>
			<div style="margin-bottom: 4cm;">
					<div style="width: 100%;"><div href="#id_empresa" float: left;"><b>1. Introdução</b></div><div style="text-align: right; float: right; padding-top: -22px;">3</div></div>

					<a><b>2. Identificação da empresa</b></a><div style="text-align: right; float: right; padding-top: -22px;">4</div>

					<a><b>2.1. Identificação do Local da Prestação de Serviços</b></a>
					<div style="text-align: right; float: right; padding-top: -22px;">4</div>
			
			
					<a><b>2.2. Identificação da Empresa Responsável Pelo Estudo</b></a>
					<div style="text-align: right; float: right; padding-top: -22px;">4</div>
			
			
					<a><b>3. Resumo de Atividades da Empresa</b></a>
					<div style="text-align: right; float: right; padding-top: -22px;">4</div>
			
			
					<a><b>4. Objetivo</b></a>
					<div style="text-align: right; float: right; padding-top: -22px;">4</div>
			
			
					<a><b>5. Silglas e Abreviaturas</b></a>
					<div style="text-align: right; float: right; padding-top: -22px;">5</div>
			
			
					<a><b>6. Bibliografia</b></a>
					<div style="text-align: right; float: right; padding-top: -22px;">6</div>
			
			
					<a><b>7. Considerações Técnicas</b></a>
					<div style="text-align: right; float: right; padding-top: -22px;">7</div>
			
					
					<a><b>8. Equipe Elaboradora</b></a>
					<div style="text-align: right; float: right; padding-top: -22px;">7</div>
				
				
					<a><b>9. Metodologias de avaliação de agentes Ocupacional</b></a>
					<div style="text-align: right; float: right; padding-top: -22px;"></div>
				
				
								'. $riscos_ambientais .'
				
					<a><b>10. Resumo dos Agentes Avaliados</b></a>
					<div style="text-align: right; float: right; padding-top: -22px;"></div>

					<a><b>11. Resultados e Conclusões</b></a>
					<div style="text-align: right; float: right; padding-top: -22px;"></div>

					<a><b>12. Considerações Finais</b></a>
					<div style="text-align: right; float: right; padding-top: -22px;"></div>
					
					
			</div>
		</div>

		<div style="page-break-inside:always; height: 22cm;">
			<!-- 1 introdução -->
			<h2 style="font-size: 18px;">1. INTRODUÇÃO </h2>
			
			<p> O Presente estudo quando para fins previdenciários depende de duas definições, a nocividade e a permanência,
			demostrada através do Laudo Técnico das Condições Ambientais - <b><i>LTCAT</i></b>, para a empresa <b>'.$socialreason.'</b>, situada '.$address.', o mesmo tem como premissas, a realização de
			estudos na qual destina-se no reconhecimento e avaliação, principalmente quantitativa dos agentes
			ambientais ou ocupacionais, serão demostrado a origem, intensidades e concentrações do agente ambiental.
			Abrangência deste Laudo, condiciona a efetiva exposição aos agentes nocivos ou associação de agentes
			prejudiciais à saúde ou à integridade física, as condições especiais que prejudicam a saúde ou integridade física,
			conforme definido no Anexo IV do Decreto nº 3.048, de 1999, com exposição a agentes nocivos em concentração
			ou intensidade e tempo de exposição que ultrapasse os limites de tolerância ou que, dependendo do agente,
			torne a possibilidade de exposição (§ 4º do art. 68, Decreto 3.048/99) condição especial prejudicial à saúde,
			quanto ao conceito de nocividade como situação combinada ou não de substâncias, energias e demais fatores
			de riscos reconhecidos, presentes no ambiente de trabalho, capazes de trazer ou ocasionar danos à saúde ou à
			integridade física do trabalhador; quanto ao conceito de permanência como aquele em que a exposição ao
			agente nocivo ocorre de forma não ocasional nem intermitente, no qual a exposição do empregado, do
			trabalhador avulso ou do cooperado ao agente nocivo seja indissociável da produção do bem ou da prestação do
			serviço.</p>

			<p>Todos procedimentos para avaliação ambiental contida neste presente Laudo, estão de acordo com as
			metodologias das Normas de Higiene Ocupacional – <b>NHO – FUNDACENTRO</b>.</p>

			<p>Os agente ambientais serão apresentados com os códigos e nomenclaturas em conformidade o <i>decreto
			8373, de 2014 na qual foi estabelecido o</i> <b>eSocial.</b></p>
		</div>


		<div style="page-break-inside:always; height: 22cm;">
			<!-- 2 identificaçao -->
			<h2 style="font-size: 18px;"><a name="id_empresa">2. Identificação da Empresa </a></h2>		
			<ul style="list-style: none;">
				<li><b>Razão Social:</b> '. $razao_social .'</li>
				<li><b>Nome Fantasia:</b> '. $nomeFantasia .'</li>
				<li><b>Endereço:</b> '. $endereco .'</li>
				<li><b>CEP:</b> '. $cep .'</li>
				<li><b>CNPJ:</b> '. $cnpj .'</li>
				<li><b>CNAE:</b> '. $cnae .'</li>
				<li><b>Responsável da Empresa:</b> '. $responsavelEmpresa .'</li>
				<li><b>Período de Realização:</b> '. date('d/m/Y', strtotime($vigencia_inicio)) .' à '. date('d/m/Y', strtotime($vigencia_fim)) .'</li>
			</ul>
			<!-- 2.1 Identificação do Local da Prestação de Serviços -->
			<h2 style="font-size: 18px;"><a name="id_empresa">2.1 Identificação do Local da Prestação de Serviços </a></h2>		
			<ul style="list-style: none;">
				<li><b>Razão Social:</b> '. $razao_social_local .'</li>
				<li><b>Unidade:</b> '. $unidade_local .'</li>
				<li><b>Endereço:</b> '. $endereco_local .'</li>
				<li><b>CNPJ:</b> '. $cnpj_local .'</li>
			</ul>
			<!-- 2.2 Identificação da Empresa e Responsável pelo Estudo -->
			<h2 style="font-size: 18px;"><a name="id_empresa">2.1 Identificação do Local da Prestação de Serviços </a></h2>		
			<ul style="list-style: none;">
				<li><b>Razão Social:</b> '. $razao_social_resp .'</li>
				<li><b>Unidade:</b> '. $unidade_resp .'</li>
				<li><b>Endereço:</b> '. $endereco_resp .'</li>
				<li><b>CNPJ:</b> '. $cnpj_resp .'</li>
			</ul>
			<!-- 3 OBJETIVOS -->
			<h2 style="font-size: 18px;">3. Objetivo </h2>
			
			<p> Conforme, estabelece o <b><i>art. 58 da lei nº 8.213, de 24 de julho de 1991</i></b>, que dispõe sobre os planos de benefícios da
			previdência social, o <b>Laudo Técnico das Condições do Ambiente de Trabalho – LTCAT</b> tem como objetivo identificar
			a exposição aos agentes físicos, químicos, biológicos ou a associação de agentes prejudiciais à saúde ou à integridade
			física do trabalhador, para fins de concessão da aposentadoria especial.</p><br>

			<p>Portanto, é necessário ressaltar que o LTCAT não possui a finalidade de caracterização e classificação da insalubridade
			e periculosidade, em atendimento as normas regulamentadoras do Ministério do Trabalho e Emprego – MTE.</p>


			<h2 style="font-size: 18px;">4. Resumo de Atividades da Empresa </h2>
			
			<p> '. $resumo . '</p>
		</div>
		
		<div style="page-break-inside:always; height: 22cm; font-size: 10px;">	
		<!-- 5 Siglas e Abreviaturas -->
		<h2 style=" font-size: 18px;">5. Siglas e Abreviaturas </h2>
			<a><b>MTE</b> - Ministério do Trabalho e Emprego<br>
			<b>NR</b> – Normas Regulamentadoras<br>
			<b>GFIP</b> - Guia de Recolhimento do FGTS<br>
			<b>INSS</b> – Instituto Nacional do Seguro Social<br>
			<b>FUNDACENTRO</b> – Fundação Jorge Duprat Figueiredo de Segurança e Medicina do Trabalho.<br>
			<b>ACGIH</b> - American Conference of Governmental Industrial Hygienists.<br>
			<b>ABHO</b> - Associação Brasileira de Higienistas Ocupacionais.<br>
			<b>NHO</b> - Normas de Higiene Ocupacional - FUNDACENTRO<br>
			<b>NIOSH</b> - National Institute for Occupational Safety and Health<br>
			<b>OSHA</b> - Occupational Safety and Health Administration<br>
			<b>ISO</b> - International Organization for Standardization<br>
			<b>AIHA</b> - American Industrial Hygiene Association. Industrial Hygiene Statistics<br>
			<b>TLV</b> - Threshold Limit Values (valor limite) AGIH<br>
			<b>BEI</b> - Biological Exposure Indice (índice de exposição biológica) AGIH<br>
			<b>TWA</b> – Threshold Limit Value – Time Weighted Average - Limite de tolerância ponderado no tempo- AGIH<br>
			<b>TLV STEL</b> – Limite de exposição de curta duração (Short Term Exposure Limit). AGIH<br>
			<b>EPI</b> – Equipamento de Proteção Individual.<br>
			<b>EPC</b> – Equipamento de Proteção Coletiva.<br>
			<b>CNEN</b> - Comissão Nacional de Energia Nuclear<br>
			<b>CIPA</b> – Comissão Interna de Prevenção de Acidentes<br>
			<b>CIPAMIN</b> – Comissão Interna de Prevenção de Acidentes na Mineração.<br>
			<b>CNAE</b> – Classificação Nacional de Atividade Econômica.<br>
			<b>CAT</b> – Comunicação de Acidente de Trabalho.<br>
			<b>CLT</b> – Consolidação das Leis do Trabalho.<br>
			<b>CA</b> – Certificado de Aprovação.<br>
			<b>DDS</b> – Diálogo Diário de Segurança.<br>
			<b>FISPQ</b> – Ficha de Segurança de Produtos Químicos.<br>
			<b>CREA</b> – Conselho Regional de Engenharia e Agronomia.<br>
			<b>CBO</b> – Classificação Brasileira de Ocupações.</a>
		
		</div>

		<div style="page-break-inside:always; height: 22cm;">	
		<!-- 6 Bibliografia / Referência Técnicas -->
		<h2 style="font-size: 18px;">6. Bibliografia / Referência Técnicas </h2>
		<ul>
			<li>BRASIL. Ministério do Trabalho e Emprego. Portaria nº 3.214, de 8 de junho de 1978. Aprova as normas
			regulamentadoras - NR - do capítulo V, título II, da Consolidação das Leis do Trabalho, relativas a segurança
			e medicina do trabalho. Normas Regulamentadoras Nº 6 – Equipamentos de Proteção Individual; Nº 7 –
			Programa de Controle Médico e Saúde Ocupacional; Nº 9 – Programa de Prevenção de Riscos Ambientais
			(PPRA) e Nº 15 – Atividades e Operações Insalubres. Decreto 3.048 INSS Previdência Social.</li>

			<li> ACGIH. <i>American Conference of Governmental Industrial Hygienists.</i> TLVs e BEIs: Limites de Exposição Ocupacional (TLVs) para Substâncias Químicas e Agentes Físicos e Índices Biológicos de Exposição (BEIs).</li>

			<li> FUNDACENTRO. Norma de Higiene Ocupacional NHO 1: Avaliação da Exposição Ocupacional ao Ruído.<br>
			São Paulo, 2001.</li>

			<li> FUNDACENTRO. Norma de Higiene Ocupacional NHO 6: Avaliação da Exposição Ocupacional ao Calor.<br>
			São Paulo, 2018.</li>

			<li> FUNDACENTRO. Norma de Higiene Ocupacional NHO 7: Calibração de Bombas de Amostragem Individual
			pelo Método da Bolha de Sabão. São Paulo, 2002.</li>

			<li> FUNDACENTRO. Norma de Higiene Ocupacional NHO 8: Coleta de Material Particulado Sólido Suspenso
			no Ar de Ambientes de Trabalho. São Paulo, 2007.</li>

			<li> FUNDACENTRO. Norma de Higiene Ocupacional NHO 9: Avaliação da exposição ocupacional a vibrações
			de corpo inteiro. São Paulo, 2007.</li>

			<li> FUNDACENTRO. Norma de Higiene Ocupacional NHO 10: Avaliação da exposição ocupacional a vibrações
			em mãos e braços.</li>

			<li> NIOSH. National Institute for Occupational Safety and Health. NIOSH Manual of Analytical <i>Methods</i> (NMAM).
			Publication 94-113. 4 ed. Atlanta: DHHS (NIOSH), 1994.</li>

			<li> OSHA. <i>Occupational Safety and Health Administration. Sampling and Analytical Methods. Methods
			Development Team: Industrial Hygiene Chemistry Division</i>, OSHA <i>Salt Lake Technical Center</i>.</li>

			<li> BRASIL. Presidência da República. Decreto nº 3.048, de 6 de maio de 1999. Aprova o Regulamento da
			Previdência Social, e dá outras providências.</li>

			<li> BRASIL. Ministério da Previdência Social. Instrução Normativa INSS/PRES Nº 77, de 21 de Janeiro de 2015.
			Dispõe sobre a administração de informações dos segurados.</li>

			<li> NIOSH. <i>National Institute for Occupational Safety and Health</i>. LEIDEL, Nelson A. et al. <i>Occupational
			Exposure Sampling Strategy Manual.</i> Ohio: NIOSH, 1977. 150p.</li>

			<li> AIHA. <i>American Industrial Hygiene Association. Industrial Hygiene Statistics</i>. Planilha eletrônica de
			tratamento estatístico de dados das avaliações quantitativas.</li>
		</ul>
		</div>

		<div style="page-break-inside:always; height: 22cm;">	
		<!-- 7 Considerações Finais -->
		<h2 style="font-size: 18px;">7. Considerações Finais </h2>
		
			<p>As amostragem foram realizadas através dos GHE/ GSO Grupo Homogênio de Exposição ou Grupo Similar de Exposição formados através da APR-HO Análise Preliminar de Riscos de Higiene Ocupacional ou Caracterização Básica prevista na fase de antecipação e reconhecimento de riscos Ocupacionais da NR 09.  <br> As Avaliações ou medições foram realizados conforme os parâmetro técnico definidos pelas NHO.</p>
			<p>A publicação da Lei nº 9.528, de 1997, Introduz a obrigatoriedade da apresentação da GFIP, que passa a vigorar a partir de 1°/1/1999 no LTCAT.</p>
			<div style="margin-left: 15px">
			<i>
				<p>(em branco) — Sem exposição a agente nocivo. Trabalhador nunca esteve exposto.</p>
				<p>01 — Não exposição a agente nocivo. Trabalhador já esteve exposto.</p>
				<p>02 — Exposição a agente nocivo (aposentadoria especial aos 15 anos de trabalho);</p>
				<p>03 — Exposição a agente nocivo (aposentadoria especial aos 20 anos de trabalho);</p>
				<p>04 — Exposição a agente nocivo (aposentadoria especial aos 25 anos de trabalho).</p>
				<p>Para os trabalhadores com mais de um vínculo empregatício</p>
				<p>05 — Não exposto a agente nocivo;</p>
				<p>06 — Exposição a agente nocivo (aposentadoria especial aos 15 anos de trabalho);</p>
				<p>07 — Exposição a agente nocivo (aposentadoria especial aos 20 anos de trabalho);</p>
				<p>08 — Exposição a agente nocivo (aposentadoria especial aos 25 anos de trabalho).</p>
			</i>
			</div>

			<p>Segundo a OIT- Organização Internacional do Trabalho, quando se trabalha com substâncias químicas deve-se prestar a necessária atenção não somente à toxicidade intrínseca das mesmas, como também a outros riscos derivados das operações.<br> Ainda de acordo com as orientações, não só da ACGIH como da própria OIT, deve ser enfatizado que os limites de tolerância, por melhor que sejam estabelecidos, não podem ser considerados como proteção total a todos os trabalhadores, pois os hipersusceptíveis podem ter uma resposta acima do esperado para certa exposição. Pouco pode ser feito nestes casos, do ponto de vista de higiene industrial, a não ser uma eliminação ou redução significativa de Exposições críticas ou a detecção precoce e afastamento do hipersusceptível.</p>

		</div>
		<div style="page-break-inside:always; height: 22cm;">	
		<!-- 8 Equipe Elaborada -->
		<h2 style="font-size: 18px;">8. Equipe Elaborada </h2>
		
			

		</div>
		<div style="page-break-inside:always; height: 22cm;">	
		<!-- 9 Resumo dos Agentes Avaliados -->
		<h2 style="font-size: 18px;">9. Resumo dos Agentes Avaliados </h2>
			<h3> <b> AGENTES AMBIENTAIS AVALIADOS: </b> </h3>
			<p>No presente Laudo Técnico foram aboradods os seguintes agentes ambientais supeitos quanto à exposição ocupacional no meio ambiente de trabalho:</p>
			<table>
			'.$html.'
			</table>
		</div>
		<div style="page-break-inside:always; height: 22cm;">	
		<!-- 10 Metodologias de avaliação de agentes Ocupacional -->
		<h2 style="font-size: 18px;">10. Metodologias de avaliação de agentes Ocupacional </h2>
			<h3><b>Metodologia para avaliação da exposição ocupacional ao Ruído (ANEXOS 1 e 2 da NR-15 e NHO-01)</b></h3>
			<p>As avaliações da exposição ocupacional ao ruído estão fundamentadas nas especificações estabelecidas no Anexo 1 da Norma Regulamentadora - NR-15 da Portaria 3.214/78 do Ministério do Trabalho e Emprego – MTE a qual estabelece Limite de Tolerância para jornada de até oito horas diárias para o ruído contínuo ou intermitente correspondente a 85 dB(A) e valor teto igual a 115 dB(A).</p>

			<P>Foram adotados os critérios e procedimentos de avaliação da exposição ocupacional ao ruído preconizados pela Norma de Higiene Ocupacional - NHO-01 da FUNDACENTRO, mantendo o incremento de duplicação da dose, fator “q=5”), em conformidade com o Anexo 1 da NR-15.</p>

			<p>Segundo a NHO-01, a dose referente a uma jornada diária de trabalho corresponde ao parâmetro utilizado para a caracterização da exposição ocupacional ao ruído, expresso em porcentagem de energia sonora, tendo como referência o valor máximo da energia sonora diária admitida, definida com base nos seguintes parâmetros:</p>

			<p><b>Critério de Referência (CR)</b>: o nível de ruído para o qual a exposição, por um período de oito horas, corresponde a uma dose de 100%. Incremento de Duplicação da Dose (Fator “q”): incremento em decibéis que, quando adicionado a um determinado nível, implica a duplicação da dose de exposição ou a redução para a metade do tempo máximo de exposição permitido.</p>

			<p><b>Nível Limiar de Integração (NLI)</b>: corresponde ao nível de ruído a partir do qual os valores devem ser computados na integração para fins de determinação de nível médio ou da dose de exposição. <br> O critério de referência que embasa os Limite de Tolerância definidos no Anexo 1 da NR-15, para ruído contínuo ou intermitente corresponde a uma dose de 100% para exposição de 8 horas ao nível de 85 dB(A). O critério de avaliação considera, além do critério de referência, o incremento de duplicação da dose (Fator “q = 5”) e o nível limiar de integração igual a 80 dB(A). A avaliação da exposição ocupacional ao ruído contínuo ou intermitente foi executada por meio da determinação da dose diária de ruído e do nível de exposição, parâmetros estes representativos da exposição diária do empregado.<br>
			Ainda de acordo com a NHO-01, esses parâmetros são equivalentes, sendo possível, a partir de um obter-se o outro, mediante as expressões matemáticas seguintes:</p>

			<h2>D = Te/480 x 100 x 2^(ne-85/5)[%] 	NE = 16,61 x log (480/Te x D/100) + 85 [db]</h2>

			<p>Onde:</p>
			<p><b>NE</b> = nível de eposição</b></p>
			<p><b>D</b> = dose diária de ruído em porcentagem</p>
			<p><b>TE</b> = tempo de duração, em minutos, da jornada diária de trabalho</p>
		</div>

		<div style="page-break-inside:always; height: 22cm;">	
			<h3><b> INSTRUMENTOS UTILIZADOS </b></h3>
			<p>Para determinação dos Níveis de Pressão Sonora (NPS) foram utilizados áudiodosimetros de Ruído Tipo 2 Fabricante Chrompack modelo Smartdb e Calibrador Acústico Fabricante Chrompack.<br></p>
			<h3><b> LIMITES DE TOLERÂNCIA ADOTADOS </b></h3>
			Foram adotados os Limites de Tolerância estabelecidos no Anexo 1 da Norma Regulamentadora -
			NR-15 da Portaria 3.214/78 do Ministério do Trabalho e Emprego - MTE conforme a tabela abaixo:
		</div>

		
		<!-- RESPONSABILIDADES TÉCNICA -->
		<div style="page-break-inside:always; height: 22cm;">
			<h2 style="text-align: center; font-size: 18px;">11. RESPONSABILIDADES TÉCNICA </h2>
			
				<p>A responsabilidade técnica da realização deste estudo é de responsabilidade da equipe
	desenvolvedora:</p>
				<br><br><br><br>
				
		</div>

	<div style="page-break-inside:always; height: 22cm;">
		<!-- RESUMO DOS GRUPOS HOMOGÊNEOS -->
		<h2 style="text-align: center; font-size: 18px;">12. RESUMO DOS GRUPOS HOMOGÊNEOS </h2>
		
	</div>

		<!-- 13. ANTECIPAÇÃO E RECONHECIMENTO DOS RISCOS AMBIENTAIS -->
		<h2 style="text-align: center; font-size: 18px;">13. ANTECIPAÇÃO E RECONHECIMENTO DOS RISCOS AMBIENTAIS </h2>
		'. $anteci_riscos .'
		<div style="height: 22cm; page-break-after: always;">
		<!-- 14. PLANEJAMENTO ANUAL -->
		<h2 style="text-align: center; font-size: 18px;">14. PLANEJAMENTO ANUAL </h2>
		'. $cronograma .'

		<p>Durante a vigência do PPRA serão realizadas ações com o objetivo de minimizar e/ou
eliminar as exposições aos agentes passíveis de causar doenças ocupacionais.</p></div>
	
		<!-- 15. CONSIDERAÇÕES FINAIS -->
		<h2 style="text-align: center; font-size: 18px;">15. CONSIDERAÇÕES FINAIS </h2>

		<p>A identificação das atividades e estimativas das exposições em função dos tempos foi
realizada através de visitas “in loco”, entrevista com os empregados e seus superiores imediatos,
e consulta a ordens de serviços quando aplicável, todas as informações contidas neste
documento foram validadas pela liderança da empresa.</p>
		
		<p>É de extrema importância que durante o processo de avaliação quantitativa dos agentes
ambientais, caso seja identificado algum desvio do perfil de exposição identificado na etapa de
reconhecimento, o higienista responsável pelas avaliações deverá redimensionar os GHE’s
conforme necessidade.</p>

		<p>Os GHE’S correspondem a uma expectativa do higienista responsável por este estudo,
sendo assim, os mesmos deverão ser validados na fase de avaliação dos riscos. Este trabalho
tem como objetivo principal fornecer informações estratégicas para a empresa no que diz respeito
a exposição dos seus trabalhadores a agentes ambientais ocupacionais em suas atividades
laborais, servindo como base para elaboração dos documentos legais e gestão da saúde e
segurança dos seus trabalhadores através de ações de prevenção e de controle.</p>		
		
		<h4 style="margin-top: 40px; font-size: 14px; text-align: center; text-transform: uppercase;"> '. strftime('%d DE %B de %Y', strtotime($execucao_fim)) .' </h4>

		<div style="height: 1px; background: #222; width: 40%; margin-left: 30%; margin-top: 60px;"></div>
			<p style="text-align: center; font-size: 11px; text-indent: 0; margin-top: -15px;"> '.$responsavelEmpresa.'
							<br>Responsável pela empresa: '. $nomeFantasia .'</p>
	</body>
	</html>
	');
	
	/*$dompdf->set_Paper('A4', 'portrait');*/

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


