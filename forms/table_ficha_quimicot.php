<?php
	session_start();
	require "../php/connect.php";
	$empid = $_SESSION['cdempresa'];
	$contratoid = $_SESSION['cdcontrato'];
	$sql_ghe = "SELECT * FROM tbghe WHERE cdEmpresa = ".$empid." AND cdContrato = ".$contratoid;
	$query_ghe = mysqli_query($link,$sql_ghe);
?>
	<head>
		<script>
			$(".imprimir").click(function(){
				var $valor = $(this).attr("impress");
				window.open($valor,null);
			});
			$(".novoruido").click(function(){
				var $value = $(this).attr("resultado");
				window.open($value,null,"height=600,width=800,status=no,toolbar=no,menubar=no,location=no");
			});
			$(".editruido").click(function(){
				var $value = $(this).attr("agente");
				window.open($value,null,"height=600,width=800,status=no,toolbar=no,menubar=no,location=no");
			});
			$(".infocd").change(function(){
				var $cdFicha = $('input[name=fichaquimica]:checked').val();
				var $valor = "/fnac/forms/table_ficha_quimica_info.php?c="+$cdFicha;
				$("#info").fadeOut(255,function(){
					$("#info").load($valor,function(){
						$("#info").fadeIn(800);
					});
				});
			});
		</script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-3">
					<h2 class="text-center">Fichas Químico</h2>
				</div>
				<div class="col-6"></div>
				<div class="col-3">
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#novafichamodal">
	                        Nova Ficha
	                </button>
				</div>
			</div>
			<div class="row">
				<form method="post" action="">
					<table class="table table-sm table-light table-stripped table-bordered">
						<thead class="thead-light">
							<tr>
								<th colspan="10"></th>
								<th class="text-center" colspan="2"><b>EPI</b></th>
								<th colspan="11"></th>
								<th class="text-center"><b>Colaborador</b></th>
								<th class="text-center"><b>Supervisor</b></th>
								<th class="text-center"><b>Avaliador</b></th>
							</tr>
							<tr>
								<th class="text-center">Código do GHE</th>
								<th class="text-center">Cod.AQ</th>
								<th class="text-center">Arquivos Associados</th>
								<th class="text-center">Gerar Ficha</th>
								<th class="text-center">Modificar</th>
								<th class="text-center">Excluir</th>
								<th class="text-center">Selecionar</th>
								<th class="text-center">Data de Avaliação</th>
								<th class="text-center">Instrumento</th>
								<th class="text-center">EPI</th>
								<th class="text-center">Fabricante/Modelo</th>
								<th class="text-center">Agentes</th>
								<th class="text-center">Vazão</th>
								<th class="text-center">Volume Total</th>
								<th class="text-center">Amostrador</th>
								<th class="text-center">BC</th>
								<th class="text-center">Temperatura (C°)</th>
								<th class="text-center">Tempo de Medição</th>
								<th class="text-center">Dia Típico?</th>
								<th class="text-center">Justificativa</th>
								<th class="text-center">Amostra Válida</th>
								<th class="text-center">Nome / Matrícula</th>
								<th class="text-center">Nome / Matrícula</th>
								<th class="text-center">Nome / Matrícula</th>

							</tr>
						</thead>
						<tbody>
							<?php 
							
								while($assoc_ghe = mysqli_fetch_assoc($query_ghe)){
								$ghe = $assoc_ghe['cdGHE'];
								$codghe = $assoc_ghe['codGHE'];
								$sql_fichag = "SELECT * FROM tbficha_ghe WHERE cdGHE = ".$ghe." AND tipo = 2";
								$qry_fichag = mysqli_query($link,$sql_fichag);
								while($assoc_fichag = mysqli_fetch_assoc($qry_fichag)){
									$sql_ficha = "SELECT * FROM tbficha_quimico WHERE cdFicha = ".$assoc_fichag['cdFicha'];
									$query_ficha = mysqli_query($link,$sql_ficha);
			
										
										$numficha = $query_ficha->num_rows;
										if($numficha > 0){
											echo ' <tr><td class="text-center" rowspan="'.$numficha.'">'.$codghe.'</td>';
										}
										while($assoc_ficha = mysqli_fetch_assoc($query_ficha)){
											$sql_subg = "SELECT * FROM tbsubgrupoagente WHERE cdSubGrupo = ".$assoc_ficha['cdSubGrupoA'];
											$qry_subg = mysqli_query($link,$sql_subg);
											$sql_agent1 = "SELECT * FROM tbagente WHERE cdAgente = ".$assoc_ficha['cdAgente1'];
											$qry_agent1 = mysqli_query($link,$sql_agent1);
											$sql_agent2 = "SELECT * FROM tbagente WHERE cdAgente = ".$assoc_ficha['cdAgente2'];
											$qry_agent2 = mysqli_query($link,$sql_agent2);
											$sql_agent3 = "SELECT * FROM tbagente WHERE cdAgente = ".$assoc_ficha['cdAgente3'];
											$qry_agent3 = mysqli_query($link,$sql_agent3);
											$sql_agent4 = "SELECT * FROM tbagente WHERE cdAgente = ".$assoc_ficha['cdAgente4'];
											$qry_agent4 = mysqli_query($link,$sql_agent4);
											$sql_agent5 = "SELECT * FROM tbagente WHERE cdAgente = ".$assoc_ficha['cdAgente5'];
											$qry_agent5 = mysqli_query($link,$sql_agent5);
											$sql_agent6 = "SELECT * FROM tbagente WHERE cdAgente = ".$assoc_ficha['cdAgente6'];
											$qry_agent6 = mysqli_query($link,$sql_agent6);
											$sql_agent7 = "SELECT * FROM tbagente WHERE cdAgente = ".$assoc_ficha['cdAgente7'];
											$qry_agent7 = mysqli_query($link,$sql_agent7);
											$sql_agent8 = "SELECT * FROM tbagente WHERE cdAgente = ".$assoc_ficha['cdAgente8'];
											$qry_agent8 = mysqli_query($link,$sql_agent8);
											$sql_agent9 = "SELECT * FROM tbagente WHERE cdAgente = ".$assoc_ficha['cdAgente9'];
											$qry_agent9 = mysqli_query($link,$sql_agent9);
											$sql_agent10 = "SELECT * FROM tbagente WHERE cdAgente = ".$assoc_ficha['cdAgente10'];
											$qry_agent10 = mysqli_query($link,$sql_agent10);
											$agente1 = "-";
											$agente2 = "-";
											$agente3 = "-";
											$agente4 = "-";
											$agente5 = "-";
											$agente6 = "-";
											$agente7 = "-";
											$agente8 = "-";
											$agente9 = "-";
											$agente10 = "-";
											foreach ($qry_subg as $sg){	
												$subgrupoagente = $sg['nome'];
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
											
											$qry_agent10 = mysqli_query($link,$sql_agent10);
											$sql_inst = "SELECT * FROM tbequipamento WHERE cdEquipamento = ".$assoc_ficha["cdInstrumento"];
											$qry_inst = mysqli_query($link,$sql_inst);
											$sql_calib = "SELECT * FROM tbequipamento WHERE cdEquipamento = ".$assoc_ficha["cdCalibrador"];
											$qry_calib = mysqli_query($link,$sql_calib);
											$sql_epi = "SELECT * FROM tbepi WHERE cdEpi = ".$assoc_ficha["cdEpi"];
											$qry_epi = mysqli_query($link,$sql_epi);
											$tempoMed = $assoc_ficha['tempoDeMedicao'];
											echo '			<td class="text-center">'.$assoc_fichag['DR'].'</td>
														<td class="text-center"><img agente="" class="editruido icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png"/></td>
														<td class="text-center"><img agente="" class="imprimir icone2" style="cursor: pointer" width="24px" height="24px" impress="/fnac/dompdf/ficha_quimico.php?x='.$assoc_ficha['cdFicha'].'&y='.$empid.'" src="img/icons/edit.png"/></td>			
														<td class="text-center"><img agente="forms/cadastro/edit/edit_ficha_quimico.php?c='.$assoc_ficha['cdFicha'].'" class="editruido icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png"/></td>
														<td class="text-center"><img data-fancybox data-type="ajax" data-src="" href="javascript:;" data-confirm="" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/delete.png"/></td>
														<td class="text-center"><input type="radio" id="fichaquimica" name="fichaquimica" class="infocd" value="'.$assoc_ficha['cdFicha'].'"></td>
														<td class="text-center">'.$assoc_ficha['dataAval'].'</td>';
														foreach($qry_inst as $assoc_inst){
															echo'<td class="text-center">'.$assoc_inst['nome'].' - '.$assoc_inst['numero'].'</td>';
														}
														foreach($qry_epi as $assoc_epi){
															echo'<td class="text-center">'.$assoc_epi['nome'].'</td>
															<td class="text-center">'.$assoc_epi['fabricante'].'/'.$assoc_epi['modelo'].'</td>';
														}
														echo'<td>
															<table class="text-center">
																<tr>
																	<th class="text-center" colspan="5">'.$subgrupoagente.'</th>
																</tr>
																<tr>
																	<td class="text-center">'.$agente1.'</td>
																	<td class="text-center">'.$agente2.'</td>
																	<td class="text-center">'.$agente3.'</td>
																	<td class="text-center">'.$agente4.'</td>
																	<td class="text-center">'.$agente5.'</td>
																</tr>
																<tr>
																	<td class="text-center">'.$agente6.'</td>
																	<td class="text-center">'.$agente7.'</td>
																	<td class="text-center">'.$agente8.'</td>
																	<td class="text-center">'.$agente9.'</td>
																	<td class="text-center">'.$agente10.'</td>
																</tr>
															</table>
														</td>
														<td>
															Vazão Inicial: '.$assoc_ficha['vazaoInicial'].'<br>
															Vazão Final: '.$assoc_ficha['vazaoFinal'].'<br>
															
														</td>
														<td>'.$assoc_ficha['volTotal'].'</td>
														<td>Numéro: '.$assoc_ficha['numAmostrador'].'</td>
														<td>
															'.$assoc_ficha['bc'].'
														</td>
														<td>
															'.$assoc_ficha['temp'].'
														</td>
														<td class="text-center" title="Hora Inicial: '.$assoc_ficha['hrInicio'].' Intervalo Inicial: '.$assoc_ficha['intervaloInicial'].'Intervalo Final: '.$assoc_ficha['intervaloFinal'].' Hora Final: '.$assoc_ficha['hrFinal'].'">'.$assoc_ficha['tempoDeMedicao'].'</td>
														<td class="text-center">';
															if($assoc_ficha['diaTipico'] == 0){
																echo 'Não';
															}else{
																echo 'Sim';
															}
														echo'</td>
														<td class="text-center">'.$assoc_ficha['justificativa'].'</td>
														<td class="text-center">';
															if($assoc_ficha['amostraValida'] == 0){
																echo 'Não';
															}else{
																echo 'Sim';
															}
														echo'</td>
														<td class="text-center">'.$assoc_ficha['colaborador'].' - '.$assoc_ficha['colaborador_ma'].'</td>
														<td class="text-center">'.$assoc_ficha['supervisor'].' - '.$assoc_ficha['supervisor_ma'].'</td>
														<td class="text-center">'.$assoc_ficha['avaliador'].' - '.$assoc_ficha['avaliador_ma'].'</td>
														
													</tr>
												';
									
										
										}
									}
								}?>
						</tbody>
					</table>
					</div>
					<div class="row">
						<div class="col-12" id="info">
						</div>
					</div>
				</form>
			</div>
		</div>
		 <div class="modal fade" id="novafichamodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nova Ficha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="progress" style="background: #166fff; display: block; height: 20px; text-align: center; transition: width .3s; width: 0; color: white;"></div>
                <div class="container-fluid" id="janelabody">
                    <?php require ("forms/cadastro/add_ficha_quimico.php?c=".$contratoid); ?>

                    <div class="modal-footer">        
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btncadastrar" class="btn btn-primary">Confirmar Cadastro</button>
                    </div>
                </form>
				
                </div>
              </div>
            </div>
          </div>
        </div>
	</body>
	