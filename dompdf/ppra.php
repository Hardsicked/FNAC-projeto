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
	foreach ($empresa as $empresa) {
		$nome_empresa = $empresa['nomeEmpresa'];
		$endereco = $empresa['endereco'];
		$razao_social = $empresa['razaoSocial'];
		$nomeFantasia = $empresa['nomeFantasia'];
		$cnpj = $empresa['cnpj'];
		$cep = $empresa['cep'];
		$arquivo = $empresa['arquivo'];
		$nvEmpresa = $empresa['nvEmpresa'];
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
			font-size: 14px;
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
			    <td style="width:370px; text-align: center; padding-left: 60px;"> PPRA - Programa de Prevenção de Riscos Ambientais </td>
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
			<h1 style="text-align: center; font-size: 90px; margin-top: 150px;"> PPRA </h1>
			<h2 style="text-align: center; font-size: 35px; margin-top: 100px;"> Programa de Prevenção de Riscos Ambientais </h2>
			
			<h3 style="text-align: center; font-size: 25px;  margin-top: 100px;"> '.$razao_social.' </h3>
			<h3 style="text-align: center; font-size: 25px;"> - '. date('Y', strtotime($execucao_inicio)) .' - </h3>
			<h3 style="text-align: center; font-size: 18px; margin-bottom: 80px;">RT'.$id_empresa.'-'.$id_contrato.'</h3>
		</div>

		<!-- Indice do arquivo -->
		<div style="page-break-after: always; height: 22cm; text-size: 10px; padding-left: 10px;">
			<h3 style="text-align: center; font-size: 20px;"> Índice </h3>
			<div style="margin-bottom: 4cm;">
					<div style="width: 100%;"><div href="#id_empresa" float: left;"><b>1.</b>IDENTIFICAÇÃO DA EMPRESA</div><div style="text-align: right; float: right; padding-top: -22px;">3</div></div>

					<a><b>2.</b>RESUMO DAS ATIVIDADES DA EMPRESA</a><div style="text-align: right; float: right; padding-top: -22px;">3</div>

						<a><b>3.</b>INTRODUÇÃO</a>
						<div style="text-align: right; float: right; padding-top: -22px;">4</div>
				
				
						<a><b>4.</b>OBJETIVOS</a>
						<div style="text-align: right; float: right; padding-top: -22px;">4</div>
				
				
						<a><b>5.</b>POLITICA DE SAÚDE E SEGURANÇA</a>
						<div style="text-align: right; float: right; padding-top: -22px;">4</div>
				
				
						<a><b>6.</b>RESPONSABILIDADES E ATRIBUIÇÕES</a>
						<div style="text-align: right; float: right; padding-top: -22px;">5</div>
				
				
						<a><b>7.</b>PLANO DE AÇÃO</a>
						<div style="text-align: right; float: right; padding-top: -22px;">5</div>
				
				
						<a><b>8.</b>FORMA DE REGISTRO DOS DADOS E MANUTENÇÃO DO PPRA</a>
						<div style="text-align: right; float: right; padding-top: -22px;">6</div>
				
				
						<a><b>9.</b>ESTRATÉGIA E METODOLOGIA DESENVOLVIMENTO DO PPRA</a>
						<div style="text-align: right; float: right; padding-top: -22px;">7</div>
				
				
					
					<div style="margin-left: 15px;"><a><b>9.1.</b>ANTECIPAÇÃO DOS RISCOS AMBIENTAIS</a></div>
					<div style="text-align: right; float: right; padding-top: -22px;">7</div>
				
				
					<div style="margin-left: 15px;"><a><b>9.2.</b>RECONHECIMENTO DOS RISCOS AMBIENTAIS</a></div>
					<div style="text-align: right; float: right; padding-top: -22px;">7</div>
				
				
					<div style="margin-left: 15px;"><a>		<b>9.3.</b>AVALIAÇÃO DOS RISCOS AMBIENTAIS</a></div>
					<div style="text-align: right; float: right; padding-top: -22px;">8</div>
				
				
					<div style="margin-left: 15px;"><a>		<b>9.4.</b>CONCEITUAÇÃO</a></div>
					<div style="text-align: right; float: right; padding-top: -22px;">11</div>
				
				
					<div style="margin-left: 15px;"><a>		<b>9.5.</b>PROCESSO DE AMOSTRAGEM</a></div>
					<div style="text-align: right; float: right; padding-top: -22px;">12</div>
				
				
					<div style="margin-left: 15px;"><a>		<b>9.6.</b>MEDIDAS DE CONTROLE</a></div>
					<div style="text-align: right; float: right; padding-top: -22px;">13</div>
				
							
						<a><b>10.</b>DOCUMENTOS DE REFERÊNCIA</a>
						<div style="text-align: right; float: right; padding-top: -22px;">14</div>
				
				
						<a><b>11.</b>RESPONSABILIDADES TÉCNICA</a>
						<div style="text-align: right; float: right; padding-top: -22px;">15</div>
				
				
						<a><b>12.</b>RESUMO DOS GRUPOS HOMOGÊNEOS</a>
						<div style="text-align: right; float: right; padding-top: -22px;">16</div>
				
				
						<a><b>13.</b> ANTECIPAÇÃO E RECONHECIMENTO DOS RISCOS AMBIENTAIS</a>
						<div style="text-align: right; float: right; padding-top: -22px;">17</div>
				
						
							
							<ul>
								'. $riscos_ambientais .'
							</ul>
							
						
				
						<a><b>14.</b>PLANEJAMENTO ANUAL</a>
						<div style="text-align: right; float: right; padding-top: -22px;">'.$planejamentoanual.'</div>
				
				
						<a><b>15.</b>CONSIDERAÇÕES FINAIS</a>
						<div style="text-align: right; float: right; padding-top: -22px;">'.$planejamentoanual2.'</div>
					
			</div>
		</div>

		<div style="page-break-inside:always; height: 22cm;">
			<!-- 1 identificaçao -->
			<h2 style="text-align: center; font-size: 18px;"><a name="id_empresa">1. IDENTIFICAÇÃO DA EMPRESA </a></h2>		
			<ul style="list-style: none;">
				<li><b>Razão Social:</b> '. $razao_social .'</li>
				<li><b>Nome Fantasia:</b> '. $nomeFantasia .'</li>
				<li><b>Endereço:</b> '. $endereco .'</li>
				<li><b>CEP:</b> '. $cep .'</li>
				<li><b>CNPJ:</b> '. $cnpj .'</li>
				<li><b>CNAE:</b> '. $cnae .'</li>
				<li><b>Grau de risco:</b> '. $risco_empresa .'</li>
				<li><b>Responsável da Empresa:</b> '. $responsavelEmpresa .'</li>
				<li><b>Vigência:</b> '. date('d/m/Y', strtotime($vigencia_inicio)) .' à '. date('d/m/Y', strtotime($vigencia_fim)) .'</li>
			</ul>

			<!-- 2 resumo -->
			<h2 style="text-align: center; font-size: 18px;">2. RESUMO DAS ATIVIDADES DA EMPRESA </h2>
			
			<div style="height: 11cm;">
				<p>'. $resumo .'</p>
			</div>
		</div>
		<!-- 3 introdução -->
		<h2 style="text-align: center; font-size: 18px;">3. INTRODUÇÃO </h2>
		
		<p> Em atendimento à Norma Regulamentadora – NR 09, da Portaria n° 3.214 de
08/06/1978, da Lei 6.514 de 22/12/1977, a empresa implementa o Programa de Prevenção de
Riscos Ambientais – PPRA com o objetivo de preservar a saúde e a integridade física dos seus
colaboradores, por meio da antecipação, reconhecimento, avaliação e consequente controle da
ocorrência de riscos ambientais existentes ou que venham a existir no ambiente de trabalho,
tendo em consideração a proteção do meio ambiente e dos recursos naturais. </p>
		
		<p> Segundo a Norma Regulamentadora No 9 “Programa de Prevenção de Riscos Ambientais
(PPRA)” são considerados riscos ambientais os agentes físicos, químicos e biológicos existentes
nos ambientes de trabalho que, em função de sua natureza, concentração ou intensidade e tempo
de exposição, são capazes de causar danos à integridade física e à saúde do trabalhador. </p>

		<p> Classifica-se como agentes físicos as diversas formas de energia tais como: ruído,
vibrações, temperaturas extremas, radiações, já agentes químicos são as substâncias, compostos
ou produtos que possam penetrar no organismo pela via respiratória, nas formas de poeiras,
fumos, névoas, neblinas, gases ou vapores, ou que possam ter contato ou ser absorvido pelo
organismo através da pele ou por ingestão, por fim agentes biológicos são bactérias, fungos,
bacilos, parasitas, protozoários, vírus, microorganismos, entre outros. </p>
		
		<!-- 4 OBJETIVOS -->
		<h2 style="text-align: center; font-size: 18px;">4. OBJETIVOS </h2>
		
		<p> Preservar a saúde e integridade física dos trabalhadores; Antecipar, reconhecer, avaliar e
controlar os agentes ambientais físicos, químicos e biológicos; Fornecer informações para o
desenvolvimento do Programa de Controle Médico e Saúde Ocupacional (PCMSO) e outros
programas que se fizerem necessários; Cumprir o estabelecido na Portaria SSST 25, de 29 de
dezembro de 1994, do Ministério do Trabalho e Emprego (MTE), que altera o texto da Norma
Regulamentadora n° 09. </p>
			
		<!-- 5 POLITICA DE SAÚDE E SEGURANÇA -->
		<h2 style="text-align: center; font-size: 18px;">5. POLITICA DE SAÚDE E SEGURANÇA </h2>
		
		<p> A empresa garante a implantação de medidas permanentes que garantam a saúde e a
integridade física dos trabalhadores, bem como a melhoria na sua qualidade de vida no ambiente
de trabalho.</p>
		
		<p> A empresa assegura a implementação das medidas de controle necessárias à
neutralização ou eliminação dos agentes ambientais, cuja ação fisiológica decorrente de sua intensidade e/ou 
concentração relacionada com o tempo de exposição e natureza do agente seja capaz de provocar danos 
à saúde dos empregados, a fim de proporcionar ambientes de trabalhossaudáveis e seguros para o 
desenvolvimento das atividades realizadas e que garante o
atendimento à legislação vigente. </p>
		
		<!-- 6 RESPONSABILIDADES E ATRIBUIÇÕES -->
		<h2 style="text-align: center; font-size: 18px;">6. RESPONSABILIDADES E ATRIBUIÇÕES </h2>
		
		<h4 style="font-size: 15px;">6.1 Do empregador: </h4>
		<p> O empregador deverá definir como atividades permanentes o estabelecimento,
implementação e garantia do cumprimento do PPRA, apoiando, alocando os recursos necessários
e incentivando continuamente todas as suas etapas de elaboração e implantação.</p>

		<h4 style="font-size: 15px;">6.2 Dos empregados: </h4>
		<p> Os empregados devem participar na implementação e execução do PPRA, seguindo as
orientações recebidas nos treinamentos oferecidos, informando ao superior hierárquico direto
ocorrências que, a seu julgamento, possam implicar riscos à sua saúde ou de seus colegas de
trabalho.</p>	
		
		<!-- 7 PLANO DE AÇÃO -->
		<h2 style="text-align: center; font-size: 18px;">7. PLANO DE AÇÃO </h2>
		
		<p> A empresa deverá definir de forma clara e objetiva, no plano de ação, a cada ano ou
quando se fizer necessário, de forma a determinar a justificativa do estabelecimento das metas e
como serão atingidas.</p>
		
		<p> O planejamento anual deverá seguir as seguintes diretrizes, de acordo com a ferramenta
de gestão 5W1H, conforme descrição abaixo:</p>
		

		<table border="0.5" cellspacing=0 cellpadding=2 width="100%" style="font-size: 14px; margin-bottom: 0.7cm;">  
			<thead>
			    <tr style="text-align: center; background:  #f2f2f2;">
			      <th scope="col">Campo</th>
			      <th scope="col">Descrição</th>
			    </tr>
			</thead>
			<tbody>
			    <tr style="text-align: center;">
			      <td>O quê</td>
			      <td>Deverá descrever as metas definidas</td>
			    </tr>
			    <tr style="text-align: center;">
			      <td>Onde</td>
			      <td>Local ou processo onde será executado as metas</td>
			    </tr>
			    <tr style="text-align: center;">
			      <td>Porque</td>
			      <td>Justificativa da meta</td>
			    </tr>
			    <tr style="text-align: center;">
			      <td>Como</td>
			      <td>Estratégia utilizada para cumprimento da meta</td>
			    </tr>
			    <tr style="text-align: center;">
			      <td>Quem</td>
			      <td>Responsável pelo cumprimento da meta</td>
			    </tr>
			    <tr style="text-align: center;">
			      <td>Quando</td>
			      <td>Prazo máximo para cumprimento da meta</td>
			    </tr>
		  	</tbody>
		</table>
		
		<p> As ações preventivas ou corretivas nos ambientes deverão ser representadas pelas
medidas de controle individuais e/ou coletivas implementadas, conforme os riscos identificados,
de forma a reduzir prováveis exposições a agentes agressivos, baseando-se nas NR’s, sobretudo
nas Normas Regulamentadoras n° 09 e n° 15.</p>

		<p> O controle dos agentes ambientais será realizado sempre que os resultados das
avaliações quantitativas da exposição dos trabalhadores atingirem o Nível de Ação (NA), previsto
na Norma Regulamentadora n° 09, superarem os respectivos Limites de Tolerância conforme
previsto na NR 15 e seus anexos 1, 2, 3, 5, 11 e 12, nas atividades mencionadas nos anexos 6,
13 e 14 e por meio de inspeção nos locais de trabalho conforme anexos 7, 8, 9 e 10 ou, na
ausência destes, nos parâmetros técnicos adotados pela ACGIH. Para a realização das
avaliações ambientais dos agentes físicos e químicos passíveis de mensuração serão utilizados
parâmetros técnicos de amostragem em campo, seguindo recomendações técnicas explícitas
pelas Normas de Higiene Ocupacional (NHO), Instituto Nacional de Segurança e Saúde
Ocupacional dos EUA (National Institute for Occupacional Safety and Health – NIOSH) para
metodologias de coletas e/ou outras literaturas técnicas disponíveis, necessárias segundo análise
do profissional técnico responsável pela avaliação ambiental.</p>

		<p> As medidas de controle propostas poderão sofrer alterações no decorrer do período de
validade deste programa, de acordo com a avaliação da empresa, desde que não comprometam a
proteção mínima do trabalhador. Para isso é indicado à empresa, solicitar à engenharia de
segurança do trabalho e higiene ocupacional uma avaliação prévia das possíveis alterações.</p>

		<p> É de responsabilidade de a empresa fiscalizar, cobrar e registrar em ficha apropriada
definida por ela, o uso dos equipamentos de proteção individual quando indicados como medidas
de controle. Tal recomendação será sempre adotada quando os agentes ambientais indicados no
PPRA superarem seus respectivos Níveis de Ação, ou para aqueles que sejam reconhecidos de
forma qualitativa em inspeção realizada no local de trabalho. Fica a critério da empresa a adoção
dessas medidas quando os agentes ambientais mensurados apresentarem valores abaixo dos
respectivos Níveis de Ação para aqueles quantitativos.</p>
		
		<p> A empresa deverá elaborar e manter disponível para consultas em inspeções, auditorias
e/ou fiscalizações, procedimento indicando quais EPI’s são indicados para seus GHE’s e sua
respectiva periodicidade para troca. Outras ferramentas de gestão poderão ser utilizadas como
suporte para a implementação do PPRA, como o atendimento aos procedimentos da empresa.</p>
		
		<!-- 8 FORMA DE REGISTRO DOS DADOS E MANUTENÇÃO DO PPRA -->
		<h2 style="text-align: center; font-size: 18px;">8. FORMA DE REGISTRO DOS DADOS E MANUTENÇÃO DO PPRA </h2>
		
		<p> Este documento base do PPRA contém um histórico técnico e administrativo do seu
desenvolvimento e deverá ser mantido sob a guarda da empresa por um período mínimo de 20
anos.</p>
		
		<p> Sempre que houver mudanças nos processos de trabalho, alterações de Layout, matéria-
prima e número de empregados, deverá ser comunicado ao SESMT para possíveis revisões do PPRA, quando constatada a necessidade.</p>
		
		<p> A manutenção dos dados do PPRA é progressiva, ou seja não deverá ser descartado
nenhum dado anterior do programa, sendo assim , todos os novos dados ambientais levantados
durante a elaboração do PPRA vigente deverão ser agregados ao históricos pré- existente.</p>
		
		<!-- 9 ESTRATÉGIA E METODOLOGIA DESENVOLVIMENTO DO PPRA -->
		<h2 style="text-align: center; font-size: 18px;">9. ESTRATÉGIA E METODOLOGIA DESENVOLVIMENTO DO PPRA </h2>
		
		<h4 style="font-size: 15px;">9.1 Antecipação dos Riscos Ambientais </h4>
		<p> A antecipação dos Riscos Ambientais deverá ocorrer sempre que houver um projeto de
instalação de novos setores ou máquinas, em lugares pré existentes ou novos setores no
processo de produção. A Antecipação consiste na análise dos projetos para se buscar a
constatação de novos riscos diferentes dos existentes ou a possibilidade de que essas
modificações venham a aumentar os riscos já existentes. <br><br> A antecipação deverá envolver: </p>

		<ul style="font-size: 14px; line-height: 1.6;">
			<li>A análise de projetos de novas instalações.</li>
			<li>Métodos ou processos de trabalho, ou de modificação dos já existentes, visando a
identificar os riscos potenciais e introduzir medidas de proteção para sua redução ou
eliminação.</li>
		</ul>

		<h4 style="font-size: 15px;">9.2 Reconhecimento dos Riscos Ambientais </h4>
		<p> A etapa do reconhecimento é o início do trabalho de campo para identificar as atividades,
tarefas, fontes e tipos de riscos ambientais. Ela constitui no levantamento das seguintes
informações que serão registradas numa planilha básica a ser anexada neste documento base do
PPRA:</p>

		<ul style="font-size: 14px; line-height: 1.6;">
			<li>Identificação dos riscos ambientais;</li>
			<li>Determinação e localização das possíveis fontes geradoras;</li>
			<li>Identificação das possíveis trajetórias e dos meios de propagação dos agentes no ambiente de trabalho;</li>
			<li>Identificação das funções e determinação do número de trabalhadores expostos;</li>
			<li>Caracterização das atividades e do tipo de exposição;</li>
			<li>Obtenção de todos os dados existentes na empresa, indicativos de possíveis comprometimento da saúde no trabalho;</li>
			<li>Possíveis danos à saúde relacionados aos riscos identificados disponíveis na literatura técnica;</li>
			<li>A descrição das medidas de controle já existentes;</li>
		</ul>
		
		<p> Deverão ser determinados na caracterização básica os Grupos homogêneos de
exposição (GHE).</p>
		
		<p> O GHE representa um grupo de trabalhadores expostos aos agentes ambientais de forma
semelhante, de forma que a avaliação de qualquer um de seus componentes ofereça dados úteis
para estimar o risco dos demais integrantes.</p>
		
		<p> Para o seu desenvolvimento são contempladas(os): </p>

		<ul style="font-size: 14px; line-height: 1.6;">
			<li>Visitas aos locais de trabalho e entrevistas com trabalhadores;</li>
			<li>Dados do processo operacional, tais como: atividades, ciclos de trabalho, setores e suas características, equipamentos, locais de trabalho, agentes, dentre outros;</li>
			<li>Levantamento de matérias-primas, produtos, subprodutos, máquinas, equipamentos e/ou ferramentas utilizados, bem como das instalações e dos processos de trabalho;</li>
			<li>Análise de documentos existentes (procedimentos operacionais, relatórios técnicos, FISPQ).</li>
		</ul>
	
		<h4 style="font-size: 15px;">9.3 Avaliação dos Riscos Ambientais </h4>
		<p><b>9.3.1 Determinação de metas e prioridades de avaliação e controle.</b></p>
		
		<p> A determinação das prioridades de avaliação e controle deve ser realizada com base na graduação do risco.</p>
		
		<p> A avaliação do risco deve ser feita a partir da classificação do risco segundo a
análise já realizada, dos fatores de probabilidade de ocorrência e das consequências do
impacto. Essa classificação deve ser realizada através de uma matriz de risco, cujos
valores são obtidos pelo produto dos valores resultantes da análise da probabilidade e da
severidade.</p>

		<p> As tabelas abaixo relacionam as diretrizes para as definições de frequência e
consequência (severidade) para agentes ambientais (físicos, químicos e biológicos). Este
critério será utilizado quando ainda não houver dados quantitativos de exposição ou
quando o agente não possuir limites de tolerância.</p>
		
		<br><br><br>
		<h4 style="font-size: 15px; text-align: center;"> Tabela 1 – Critérios para estimativa qualitativa de exposição </h4>
		<table border="0.5" cellspacing=0 cellpadding=9 width="70%" style="font-size: 10px; margin-bottom: 0.3cm;" align="center">  
			<thead style="text-align: center; border: 2px solid #25305e; background:  #25305e; color: white;">
			    <tr>
			      <th >Índice</th>
			      <th >Descrição da Estimativa Qualitativa de Exposição</th>
			    </tr>
			</thead>
			<tbody>
			    <tr style="text-align: center;">
			      <td>1</td>
			      <td>A exposição ocupacional ao agente não é perceptível qualitativamente</td>
			    </tr>
			    <tr style="text-align: center;">
			      <td>2</td>
			      <td>O agente é detectado, mas o nível é tolerável aparentando estar abaixo do nível de ação.</td>
			    </tr>
			    <tr style="text-align: center;">
			      <td>3</td>
			      <td>O agente é detectado por causar incômodo aos empregados, mas a exposição aparenta estar abaixo do LEO (Limite de Exposição Ocupacional).</td>
			    </tr>
			    <tr style="text-align: center;">
			      <td>4</td>
			      <td>O agente é percebido e sua exposição aparenta estar acima do LEO.
Há reclamações dos empregados e casos reportados de pessoas com mal estar.
Ou quando não é possível estimar o nível de exposição, ou seja, nível de
exposição incerto.</td>
			    </tr>
		  	</tbody>
		</table>

			<h4 style="font-size: 15px; text-align: center;"> Tabela 2 – Critério para estimar o tempo de exposição </h4>
		<table border="0.5" cellspacing=0 cellpadding=9 width="70%" style="font-size: 10px; margin-bottom: 0.3cm;" align="center">  
			<thead style="text-align: center; border: 2px solid #25305e; background:  #25305e; color: white;">
			   <tr>
			      <th style="width: 10%;" rowspan="2">Índice</th>
			      <th colspan="2">Duração Total da exposição</th>
			    </tr>
			    <tr>
			      <th style="width: 20%;">% da jornada de trabalho</th>
			      <th></th>
			    </tr>
			</thead>
			<tbody>
			    <tr style="text-align: center;">
			      <td>1</td>
			      <td> até 12,5%</td>
			      <td>A exposição ocupacional ao agente não é perceptível qualitativamente</td>
			    </tr>
			    <tr style="text-align: center;">
			      <td>2</td>
			      <td> entre 12,5 e 25%</td>
			      <td>1 a 2 horas /turno de 8 horas ou 5 a 10 horas/semana</td>
			    </tr>
			    <tr style="text-align: center;">
			      <td>3</td>
			      <td> entre 25 e 50%</td>
			      <td>2 a 4 horas/turno de 8 horas ou 10 a 20 horas/semana</td>
			    </tr>
			    <tr style="text-align: center;">
			      <td>4</td>
			      <td> entre 50 e 87,5%</td>
			      <td>4 a 7 horas/turno de 8 horas ou 20 a 35 horas/semana</td>
			    </tr>
			    <tr style="text-align: center;">
			      <td>5</td>
			      <td> superior à 87,5%</td>
			      <td>maior que 7 horas/turno de 8 horas ou maior que 35 horas/semana</td>
			    </tr>
		  	</tbody>
		</table>
		<h4 style="font-size: 15px; text-align: center;"> Tabela 3 – Critério para definir o perfil de exposição </h4>
		<table border="0.5" cellspacing=0 cellpadding=9 width="70%" style="font-size: 10px; margin-bottom: 0.3cm;" align="center">  
			<thead style="text-align: center; border: 2px solid #25305e; background:  #25305e; color: white;">
			   <tr>
			      <th style="width: 40%;" rowspan="2">Resultado da Multiplicação dos resultados das tabelas 1 e 2</th>
			      <th colspan="2">Categoria do Perfil de Exposição</th>
			    </tr>
			    <tr>
			      <th style="width: 30%;">Descrição</th>
			      <th>Código</th>
			    </tr>
			</thead>
			<tbody>
			    <tr style="text-align: center;">
			      <td>1 à 3</td>
			      <td>Raro</td>
			      <td>2</td>
			    </tr>
			    <tr style="text-align: center;">
			      <td>4 à 7</td>
			      <td>Pouco Provável</td>
			      <td>3</td>
			    </tr>
			    <tr style="text-align: center;">
			      <td>8 à 11</td>
			      <td>Ocasional</td>
			      <td>5</td>
			    </tr>
			    <tr style="text-align: center;">
			      <td>12 à 16</td>
			      <td>Provável</td>
			      <td>8</td>
			    </tr>
			    <tr style="text-align: center;">
			      <td>17 à 20</td>
			      <td>Frequente</td>
			      <td>13</td>
			    </tr>
		  	</tbody>
		</table>
		
		<h4 style="font-size: 15px; text-align: center;"> Tabela 4 – Critério para estimar os efeitos à Saúde </h4>
		<table border="0.5" cellspacing=0 cellpadding=9 width="70%" style="font-size: 10px; margin-bottom: 0.3cm;" align="center">  
			<thead style="text-align: center; border: 2px solid #25305e; background:  #25305e; color: white;">
			   <tr>
			      <th>Nível</th>
			      <th>Efeitos à Saúde (Saúde Ocupacional)</th>
			      <th>Classificação</th>
			      <th>Código</th>
			    </tr>
			</thead>
			<tbody>
			    <tr style="text-align: center;">
			      <td>A</td>
			      <td>Efeitos reversíveis pouco preocupantes ou sem efeitos adversos conhecidos.</td>
			      <td>LEVE</td>
			      <td>2</td>
			    </tr>
			    <tr style="text-align: center;">
			      <td>B</td>
			      <td>Efeitos reversíveis preocupantes.</td>
			      <td>MODERADA</td>
			      <td>4</td>
			    </tr>
			    <tr style="text-align: center;">
			      <td>C</td>
			      <td>Efeitos reversíveis severos</td>
			      <td>GRAVE</td>
			      <td>8</td>
			    </tr>
			    <tr style="text-align: center;">
			      <td>D</td>
			      <td>Efeitos irreversíveis.</td>
			      <td>CRÍTICA</td>
			      <td>16</td>
			    </tr>
			    <tr style="text-align: center;">
			      <td>E</td>
			      <td>Risco de vida ou doenças incapacitantes.</td>
			      <td>CATASTRÓFICA</td>
			      <td>32</td>
			    </tr>
		  	</tbody>
		</table>

		<h4 style="font-size: 15px; text-align: center;"> Figura 1 – Matriz de Risco </h4>
		<img style="width:100%; height: auto; " src="fig_1.jpg" />
		
		<p style="margin-bottom: 1.5cm;"> A determinação apresentada acima tem como objetivo determinar as prioridades de
estudo dos grupos homogêneos definidos na caracterização básica, portanto para
determinação das avaliações quantitativas devem seguir o item 9.5 deste documento.</p>
		
		<h4 style="font-size: 15px;">9.3.2 Avaliação e monitoramento dos riscos ambientais </h4>
		<p> A estratégia definida abaixo tem como finalidade avaliar e monitorar os riscos de
forma a garantir a melhoria continua do ambiente de trabalho e definir controle efetivo
dos riscos ambientais.</p>
		
		<h4 style="font-size: 15px;">9.4 Conceituação </h4>
		<ul style="font-size: 12px; line-height: 1.6; text-align: justify;">
			<li><b>Agente ambiental</b> – segundo a NR – 09 do MTE corresponde aos agentes físicos,
químicos e biológicos existentes nos ambientes de trabalho que, em função de sua
natureza, concentração ou intensidade e tempo de exposição, são capazes de causar
danos à saúde do trabalhador</li>

			<li><b>Caracterização do ambiente</b> – envolve o conhecimento do ambiente, as atividades desenvolvidas, a descrição dos processos e dos agentes existentes.</li>

			<li><b>Caracterização da população exposta</b> – envolve o conhecimento das funções,
atividades e tarefas realizadas, com suas variações relacionadas com a força de
trabalho (quantidade de pessoas, característica da população).</li>

			<li><b>Caracterização dos agentes</b> – envolve a determinação dos agentes ligados ao local
de trabalho, suas atividades e tarefas decorrentes dos processos. Agrega o
conhecimento dos efeitos à saúde dos agentes, normas relacionadas e o estudo dos
limites de tolerância aplicáveis</li>

			<li><b>Posto de trabalho</b> – corresponde à área onde o empregado desenvolve suas
atividades.</li>

			<li><b>Equipamento de proteção coletiva</b> – dispositivo destinado a eliminar ou reduzir a
intensidade ou concentração dos agentes ambientais no ambiente de trabalho.</li>
			
			<li><b>Equipamento de proteção individual</b> – segundo a NR – 06 é todo dispositivo ou
produto, de uso individual utilizado pelo trabalhador, destinado à proteção de riscos
suscetíveis de ameaçar a segurança e a saúde no trabalho que possua Certificado de
Aprovação expedido pelo MTE.</li>

			<li><b>Estratégia de amostragem</b> – conjunto de técnicas e abordagens que mescla a
ciência da Higiene Ocupacional com poderosas ferramentas estatísticas e que visa
fomentar a gestão das exposições ocupacionais.</li>

			<li><b>Grupo Homogêneo de Exposição</b> – grupo de trabalhadores que experimentam
situações de exposição similares de forma que o resultado fornecido pela avaliação da
exposição de qualquer trabalhador desse grupo seja representativo da exposição dos
demais trabalhadores</li>

			<li><b>Higienista Ocupacional</b> – profissional de nível superior ou técnico com conhecimento
específico de ferramentas e métodos destinados a antecipação, reconhecimento,
avaliação e controle dos riscos ambientais.</li>

			<li><b>Exposto de Maior Risco (EMC)</b> – trabalhador de um grupo homogêneo de exposição
(GHE) que é julgado como possuidor da maior exposição relativa em seu grupo (o
entendimento de “mais exposto” do grupo é dado no sentido qualitativo)</li>

			<li><b>Nível de Ação</b> – É o valor acima do qual devem ser iniciadas ações preventivas de
forma a minimizar a probabilidade de que as exposições a agentes ambientais
ultrapassem os limites de exposição.</li>

			<li><b>Limite de exposição</b> – – É a intensidade ou concentração máxima, relacionada com a
natureza e o tempo de exposição ao agente, que não causará dano à saúde da
maioria dos trabalhadores expostos, durante a sua vida laboral.</li>
			
		</ul>
		<br><br> 
		<h4 style="font-size: 15px;">9.5 Processo de amostragem </h4>
		<p> Após a análise da cada atividade e segundo prioridade definida segundo item 9.3.1 deste
documento, será determinado o número de amostragens necessárias para representar a
exposição ocupacional aos agentes ambientais tomando como base os níveis de ação e limites de
tolerância dos mesmos.</p>

		<p> Sempre que necessário a estratégia de amostragem poderá ser reavaliada de acordo
com a necessidade de monitoramento dos agentes, das características das atividades e conforme
o julgamento profissional dos responsáveis pelo monitoramento ambiental.</p>

		<p> As amostragens deverão seguir os padrões estabelecidos na higiene ocupacional, tendo
como referência normas de higiene ocupacional (NHO) da FUNDACENTRO e/ou procedimentos
internacionais NIOSH, OSHA etc.</p>
		
		<img style="width:100%; height: auto;" src="fig_2.png" />

		<p> Os instrumentos e/ou equipamentos de medição deverão atender as especificações
mínimas e configurações segundo a metodologia adotada bem como estar devidamente aferido e
/ ou calibrado.</p>
		
		<h4 style="font-size: 15px;">9.6 Medidas de Controle  </h4>
		<p> Deverão ser adotadas as medidas necessárias suficientes para a eliminação, a minimização
ou o controle dos riscos ambientais sempre que forem verificadas uma ou mais das seguintes
situações:</p>
		
		<ul style="font-size: 14px; line-height: 1.6; text-align: justify; list-style: lower-alpha;">
			<li> Identificação, na fase de antecipação, de risco potencial à saúde; </li>
			<li> Constatação, na fase de reconhecimento, de risco evidente à saúde;  </li>
			<li> Quando os resultados das avaliações quantitativas da exposição dos trabalhadores
excederem os valores dos limites previstos na NR-15 ou, na ausência destes os valores limites de exposição ocupacional adotados pela ACGIH - American Conference of Governmental Industrial Higyenists, ou aqueles que venham a ser estabelecidos em negociação coletiva de trabalho, desde que mais rigorosos do que os critérios técnico-legais estabelecidos; </li>
			<li> quando, através do controle médico da saúde, ficar caracterizado o nexo causal entre
danos observados na saúde os trabalhadores e a situação de trabalho a que eles ficam expostos.  </li>
		</ul>
		
		<p> O estudo, desenvolvimento e implantação de medidas de proteção coletiva deverá obedecer
à seguinte hierarquia: </p>

		<ul style="font-size: 14px; line-height: 1.6; text-align: justify; list-style: lower-alpha;">
			<li>  medidas que eliminam ou reduzam a utilização ou a formação de agentes prejudiciais à saúde;  </li>
			<li> medidas que previnam a liberação ou disseminação desses agentes no ambiente de trabalho;   </li>
			<li> medidas que reduzam os níveis ou a concentração desses agentes no ambiente de trabalho. </li>
		</ul>

		<p> A implantação de medidas de caráter coletivo deverá ser acompanhada de treinamento dos
trabalhadores quanto os procedimentos que assegurem a sua eficiência e de informação sobre as
eventuais limitações de proteção que ofereçam. </p>
		
		<p> Quando comprovado pelo empregador ou instituição a inviabilidade técnica da adoção de
medidas de proteção coletiva ou quando estas não forem suficientes ou encontrar-se em fase de
estudo, planejamento ou implantação, ou ainda em caráter complementar ou emergencial,
deverão ser adotados outras medidas, obedecendo-se à seguinte hierarquia:  </p>
		
		<ul style="font-size: 14px; line-height: 1.6; text-align: justify; list-style: lower-alpha;">
			<li> Medidas de caráter administrativo ou de organização do trabalho;  </li>
			<li> Utilização de equipamento de proteção individual - EPI.  </li>
		</ul>

		<p> A utilização de EPI no âmbito do programa deverá considerar as Normas Legais e
Administrativas em vigor e envolver no mínimo:  </p>
		
		<ul style="font-size: 14px; line-height: 1.6; text-align: justify; list-style: lower-alpha;">
			<li> Seleção do EPI adequado tecnicamente ao risco a que o trabalhador está exposto e à
atividade exercida, considerando-se a eficiência necessária para o controle da
exposição ao risco e o conforto oferecido segundo avaliação do trabalhador usuário;  </li>
			<li> Programa de treinamento dos trabalhadores quanto à sua correta utilização e
orientação sobre as limitações de proteção que o EPI oferece;  </li>
			<li> Estabelecimento de normas ou procedimento para promover o fornecimento, o uso, a
guarda, a higienização, a conservação, a manutenção e a reposição do EPI, visando
garantir as condições de proteção originalmente estabelecidas;  </li>
			<li> Caracterização das funções ou atividades dos trabalhadores, com a respectiva
identificação dos EPI’s utilizados para os riscos ambientais. </li>
		</ul>

		<!-- DOCUMENTOS DE REFERÊNCIA -->
		<h2 style="text-align: center; font-size: 18px;">10. DOCUMENTOS DE REFERÊNCIA </h2>
		
		<ul style="font-size: 14px; line-height: 1.6; text-align: justify;">
			<li> ACGIH –American Conf. of Governmental Industrial Hygienists </li>
			<li> Fichas de Informação de Segurança de Produtos Químicos (FISPQ) </li>
			<li> Normas de Higiene Ocupacional da FUNDACENTRO </li>

			<li> Normas Regulamentadoras do Ministério do Trabalho e Emprego </li>
			<li> Programa de Prevenção de Riscos Ambientais (PPRA) </li>
			<li> NTA24-0035 v1 – Monitoramento de Agentes Ambientais </li>
		</ul>
		
		<!-- RESPONSABILIDADES TÉCNICA -->
		<div style="page-break-inside:always; height: 22cm;">
			<h2 style="text-align: center; font-size: 18px;">11. RESPONSABILIDADES TÉCNICA </h2>
			
				<p>A responsabilidade técnica da realização deste estudo é de responsabilidade da equipe
	desenvolvedora:</p>
				<br><br><br><br>
				<table width="100%">
					<tr>
						'.$assinatura.'
					</tr>
				</table>
		</div>

	<div style="page-break-inside:always; height: 22cm;">
		<!-- RESUMO DOS GRUPOS HOMOGÊNEOS -->
		<h2 style="text-align: center; font-size: 18px;">12. RESUMO DOS GRUPOS HOMOGÊNEOS </h2>
		
		<table border="0.5" cellspacing=0 cellpadding=0 width="100%" style="font-size: 14px; margin-bottom: 0.7cm;">  
			<thead style="text-align: center; border: 2px solid #25305e; background:  #25305e; color: white;">
				<tr style="text-align: center;">
					<th>GHE</th>
					<th>Setor</th>
					<th>Cargo / Função</th>
					<th>Agentes de Risco</th>
				</tr>
			</thead>
			<tbody>
				'.$html.'
			</tbody>
		</table>	
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


