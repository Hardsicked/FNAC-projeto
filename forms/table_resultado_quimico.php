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
			function novoresultado() {
				window.open("forms/cadastro/add_resultado_quimicoaux.php?c=<?php echo $contratoid; ?>",null,"height=900,width=800,status=no,toolbar=no,menubar=no,location=no");
			}
			$(".editquim").click(function(){
				var $value = $(this).attr("agente");
				window.open($value,null,"height=600,width=800,status=no,toolbar=no,menubar=no,location=no");
			});
		</script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-6">
					<h2 class="text-center">Resultados Químico</h2>
				</div>
				<div class="col-6">
					<div onclick="novoresultado()" class="novobotao text-center" style="margin-top: 8px; background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Novo Resultado</b></div>
				</div>
			</div>
			<table class="table table-sm table-light table-stripped table-bordered">
				<thead class="thead-light">
					<tr>
						<th class="text-center">Código do GHE</th>
						<th class="text-center">Agente Químico</th>
						<th class="text-center">Cargo</th>
						<th class="text-center">Cód. Rastreio</th>
						<th class="text-center">Data Avaliação</th>
						<th class="text-center">Concentração mg</th>
						<th class="text-center">% Sio2 </th>
						<th class="text-center">Imprimir % Sio2 </th>
						<th class="text-center">GFIP</th>
						<th class="text-center">EPI</th>
						<th class="text-center">Modificar</th>
						<th class="text-center">Excluir</th>
					</tr>
				</thead>
				<tbody>
					<?php while($assoc_ghe = mysqli_fetch_assoc($query_ghe)){
							$ghe = $assoc_ghe['cdGHE'];
							$sql_risco = "SELECT * FROM tbrisco WHERE cdGHE =".$ghe;
							$query_risco = mysqli_query($link,$sql_risco);
							while($assoc_risco = mysqli_fetch_assoc($query_risco)){
								$risco = $assoc_risco["cdrisco"];
								$sql_resultado = "SELECT * FROM tbresultado_quim WHERE cdRisco = ".$risco;
								$query_resultado = mysqli_query($link,$sql_resultado);
								$sql_agente = "SELECT * FROM tbagente WHERE cdAgente =".$assoc_risco["cdAgente"];
								$agente = mysqli_query($link,$sql_agente);
								foreach($agente as $agente){
									$agentenome = $agente['nomeAgente'];
								}
								while($assoc_resultado = mysqli_fetch_assoc($query_resultado)){
									echo ' <tr>
											<td class="text-center">'.$assoc_ghe['codGHE'].'</td>
											<td class="text-center">'.$agentenome.'</td>
											<td class="text-center">';
											$sql_cargos = "SELECT * FROM tbcargos WHERE cdGHE = ".$ghe;
											$query_cargos = mysqli_query($link,$sql_cargos);
											$contador = 0;
											while($assoc_cargos = mysqli_fetch_assoc($query_cargos)){
												if($contador <= $query_cargos->num_rows){
													echo $assoc_cargos['cargo'];
													echo "<br>";
													$contador = $contador + 1;
												}else{
													echo $assoc_cargos['cargo'];
												}
											}
												echo'</td>
												<td class="text-center">'.$assoc_resultado['codigoRastreio'].'</td>
												<td class="text-center">'.$assoc_resultado['dataAvaliacao'].'</td>
												<td class="text-center">'.$assoc_resultado['concentracaomg'].'</td>
												<td class="text-center">'.$assoc_resultado['prcntgSio2'].'</td>
												<td class="text-center">';
														if($assoc_resultado['imprimirSio2'] == 1){
															echo'<img width="24px" height="24px" src="img/icons/true.png"/>';
														}else{
															echo'<img width="24px" height="24px" src="img/icons/false.png"/>';
														}
												echo'</td>
												<td class="text-center">';
														if($assoc_resultado['GFIP'] == 0){
															echo'00 - Não Exposto a agente nocivo';
														}else{
															if($assoc_resultado['GFIP'] == 1){
																echo'01 - Não Exposição a agente nocivo.Trabalhador já esteve exposto';
															}else{
																if($assoc_resultado['GFIP'] == 2){
																	echo'02 - Exposição a agente nocivo <br>(Aposentadoria especial aos 15 anos de trabalho)';
																}else{
																	if($assoc_resultado['GFIP'] == 3){
																		echo'03 - Exposição a agente nocivo <br>(Aposentadoria especial aos 20 anos de trabalho)';
																	}else{
																		if($assoc_resultado['GFIP'] == 4){
																			echo'04 - Exposição a agente nocivo <br>(Aposentadoria especial aos 25 anos de trabalho)';
																		}else{
																			if($assoc_resultado['GFIP'] == 5){
																				echo'05 - Não Exposto a agente nocivo';
																			}else{
																				if($assoc_resultado['GFIP'] == 6){
																					echo'06 - Exposição a agente nocivo <br>(Aposentadoria especial aos 15 anos de trabalho)';
																				}else{
																					if($assoc_resultado['GFIP'] == 7){
																						echo'07 - Exposição a agente nocivo <br>(Aposentadoria especial aos 20 anos de trabalho)';
																					}else{
																						echo'08 - Exposição a agente nocivo <br>(Aposentadoria especial aos 25 anos de trabalho)';
																					}
																				}
																			}
																		}
																	}	
																}
															}
														}
												echo'</td>
												<td class="text-center"><img data-fancybox data-type="ajax" data-src="" href="javascript:;" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/info.png"/></td>
												<td class="text-center"><img agente="/fnac/forms/cadastro/edit/edit_resultado_quimicoaux.php?c='.$contratoid.'&b='.$assoc_resultado['cdQuim'].'" class="editquim icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png"/></td>
												<td class="text-center"><img data-fancybox data-type="ajax" data-src="" href="javascript:;" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/delete.png"/></td>
											</tr>
										';
								}
							}
					}?>
				</tbody>
			</table>
		</div>
	</body>
	