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
			$(".deleteruido").click(function(){
				var $value = $(this).attr("agente");
				if (confirm('Tem certeza que deseja deletar essa ficha?')) {
       					$.ajax({
				                    type: "POST",
				                    url: "/forms/cadastro/post/form_delFichaRuido.php",
				                    data: {
				                        firstname: "Bob",
				                        lastname: "Jones"
				                    }
				                })
				                .done(function (msg) {
				                    alert("Data Saved: " + msg);
				                });
				}
			});
			$(".infocd").change(function(){
				var $cdFicha = $('input[name=ficharuido]:checked').val();
				var $valor = "/fnac/forms/table_ficha_ruido_info.php?c="+$cdFicha;
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
					<h2 class="text-center">Fichas Ruídos</h2>
				</div>
				<div class="col-6"></div>
				<div class="col-3">
					<div class="novobotao text-center novoruido" resultado="forms/cadastro/add_ficha_ruido.php?c=<?php echo $contratoid; ?>" style="margin-top: 8px; background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Nova Ficha Ruido</b></div>
				</div>
			</div>
			<div class="row">
				<form method="post" action="">
					<table class="table table-sm table-light table-stripped table-bordered">
						<thead class="thead-light">
							<tr>
								<th colspan="8"></th>
								<th class="text-center" colspan="2"><b>Instrumento</b></th>
								<th class="text-center" colspan="2"><b>Calibrador</b></th>
								<th class="text-center" colspan="2"><b>EPI</b></th>
								<th colspan="8"></th>
								<th colspan="2" class="text-center"><b>Colaborador</b></th>
								<th colspan="2" class="text-center"><b>Supervisor</b></th>
								<th colspan="2" class="text-center"><b>Avaliador</b></th>
							</tr>
							<tr>
								<th class="text-center">Código do GHE</th>
								<th class="text-center">DR</th>
								<th class="text-center">Arquivos Associados</th>
								<th class="text-center">Gerar Ficha</th>
								<th class="text-center">Modificar</th>
								<th class="text-center">Excluir</th>
								<th class="text-center">Selecionar</th>
								<th class="text-center">Data de Avaliação</th>
								<th class="text-center">Instrumento</th>
								<th class="text-center">Número</th>
								<th class="text-center">Calibrador</th>
								<th class="text-center">Número</th>
								<th class="text-center">EPI</th>
								<th class="text-center">Fabricante/Modelo</th>
								<th class="text-center">Hora Inicial</th>
								<th class="text-center">Hora Final</th>
								<th class="text-center">Intervalo Inicial</th>
								<th class="text-center">Intervalo Final</th>
								<th class="text-center">Tempo de Medição</th>
								<th class="text-center">Dia Típico?</th>
								<th class="text-center">Justificativa</th>
								<th class="text-center">Amostra Válida</th>
								<th class="text-center">Nome</th>
								<th class="text-center">Matrícula</th>
								<th class="text-center">Nome</th>
								<th class="text-center">Matrícula</th>
								<th class="text-center">Nome</th>
								<th class="text-center">Matrícula</th>

							</tr>
						</thead>
						<tbody>
							<?php 
							
								while($assoc_ghe = mysqli_fetch_assoc($query_ghe)){
								$ghe = $assoc_ghe['cdGHE'];
								$codghe = $assoc_ghe['codGHE'];
								$sql_fichag = "SELECT * FROM tbficha_ghe WHERE cdGHE = ".$ghe." AND tipo = 1";
								$qry_fichag = mysqli_query($link,$sql_fichag);
								while($assoc_fichag = mysqli_fetch_assoc($qry_fichag)){
									$sql_ficha = "SELECT * FROM tbficha_ruido WHERE cdFicha = ".$assoc_fichag['cdFicha'];
									$query_ficha = mysqli_query($link,$sql_ficha);
			
										
										$numficha = $query_ficha->num_rows;
										if($numficha > 0){
											echo ' <tr><td class="text-center" rowspan="'.$numficha.'">'.$codghe.'</td>';
										}
										while($assoc_ficha = mysqli_fetch_assoc($query_ficha)){
											$sql_inst = "SELECT * FROM tbequipamento WHERE cdEquipamento = ".$assoc_ficha["cdInstrumento"];
											$qry_inst = mysqli_query($link,$sql_inst);
											$sql_calib = "SELECT * FROM tbequipamento WHERE cdEquipamento = ".$assoc_ficha["cdCalibrador"];
											$qry_calib = mysqli_query($link,$sql_calib);
											$sql_epi = "SELECT * FROM tbepi WHERE cdEpi = ".$assoc_ficha["cdEpi"];
											$qry_epi = mysqli_query($link,$sql_epi);
											$tempoMed = $assoc_ficha['tempoDeMedicao'];
											echo '			<td class="text-center">'.$assoc_fichag['DR'].'</td>
														<td class="text-center"><img  class="editruido icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png"/></td>
														<td class="text-center"><img agente="" class="imprimir icone2" style="cursor: pointer" width="24px" height="24px" impress="/fnac/dompdf/ficha_ruido.php?x='.$assoc_ficha['cdFicha'].'&y='.$empid.'" src="img/icons/edit.png"/></td>			
														<td class="text-center"><img agente="forms/cadastro/edit/edit_ficha_ruido.php?c='.$assoc_ficha['cdFicha'].'" class="editruido icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png"/></td>
														<td class="text-center"><img agente="'.$assoc_ficha['cdFicha'].'" class="deleteruido icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/delete.png"/></td>
														<td class="text-center"><input type="radio" id="ficharuido" name="ficharuido" class="infocd" value="'.$assoc_ficha['cdFicha'].'"></td>
														<td class="text-center">'.$assoc_ficha['dataAval'].'</td>';
														foreach($qry_inst as $assoc_inst){
															echo'<td class="text-center">'.$assoc_inst['nome'].'</td>
															<td class="text-center">'.$assoc_inst['numero'].'</td>';
														}
														foreach($qry_calib as $assoc_calib){
															echo'<td class="text-center">'.$assoc_calib['nome'].'</td>
															<td class="text-center">'.$assoc_calib['numero'].'</td>';
														}
														foreach($qry_epi as $assoc_epi){
															echo'<td class="text-center">'.$assoc_epi['nome'].'</td>
															<td class="text-center">'.$assoc_epi['fabricante'].'/'.$assoc_epi['modelo'].'</td>';
														}
																
														echo'<td class="text-center">'.$assoc_ficha['hrInicio'].'</td>
														<td class="text-center">'.$assoc_ficha['hrFinal'].'</td>
														<td class="text-center">'.$assoc_ficha['intervaloInicial'].'</td>
														<td class="text-center">'.$assoc_ficha['intervaloFinal'].'</td>
														<td class="text-center">'.$assoc_ficha['tempoDeMedicao'].'</td>
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
														<td class="text-center">'.$assoc_ficha['colaborador'].'</td>
														<td class="text-center">'.$assoc_ficha['colaborador_ma'].'</td>
														<td class="text-center">'.$assoc_ficha['supervisor'].'</td>
														<td class="text-center">'.$assoc_ficha['supervisor_ma'].'</td>
														<td class="text-center">'.$assoc_ficha['avaliador'].'</td>
														<td class="text-center">'.$assoc_ficha['avaliador_ma'].'</td>
														
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
	</body>
	