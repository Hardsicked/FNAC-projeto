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
				window.open("forms/cadastro/add_resultado_qualitativoaux.php?c=<?php echo $contratoid; ?>",null,"height=900,width=800,status=no,toolbar=no,menubar=no,location=no");
			}
			$(".infoqual").click(function(){
				var $value = $(this).attr("agente");
				window.open($value,null,"height=500,width=800,status=no,toolbar=no,menubar=no,location=no");
			});
			$(".editqual").click(function(){
				var $value = $(this).attr("agente");
				window.open($value,null,"height=500,width=800,status=no,toolbar=no,menubar=no,location=no");
			});
		</script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-6">
					<h2 class="text-center">Resultados Qualitativos</h2>
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
						<th class="text-center">Resultado/Texto</th>
						<th class="text-center">EPI Adequada?</th>
						<th class="text-center">Observação</th>
						<th class="text-center">GFIP</th>
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
								$sql_resultado = "SELECT * FROM tbresultado_qual WHERE cdRisco = ".$risco;
								$query_resultado = mysqli_query($link,$sql_resultado);
								$sql_agente = "SELECT * FROM tbagente WHERE cdAgente =".$assoc_risco["cdAgente"];
								$agente = mysqli_query($link,$sql_agente);
								foreach($agente as $agente){
									$agentenome = $agente['nomeAgente'];
								}
								while($assoc_resultado = mysqli_fetch_assoc($query_resultado)){
									if($assoc_resultado['epiAdequada'] == 1){
										$epiad = 'Sim';
									}else{
										$epiad = 'Não';
									}
									echo ' <tr>
											<td class="text-center">'.$assoc_ghe['codGHE'].'</td>
											<td class="text-center">'.$agentenome.'</td>
											<td class="text-center">'.$assoc_resultado['dataAval'].'</td>
											<td class="text-center"><img agente="/fnac/forms/table_resultado_qualitativoaux.php?c='.$assoc_resultado['cdQualitativo'].'&z=0" class="infoqual icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png"/></td>
											<td class="text-center"></td>
											<td class="text-center"><img agente="/fnac/forms/table_resultado_qualitativoaux.php?c='.$assoc_resultado['cdQualitativo'].'&z=1" class="infoqual icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png"/></td>
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
												<td class="text-center"><img agente="/fnac/forms/cadastro/edit/edit_resultado_qualitativoaux.php?b='.$assoc_resultado['cdQualitativo'].'&c='.$contratoid.'" class="editqual icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png"/></td>
												<td class="text-center"><img data-confirm="Tem certeza que deseja apagar esse resultado qualitativo?" href="/fnac/forms/cadastro/post/form_delResultadoQualitativo.php?c='.$assoc_resultado['cdQualitativo'].'" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/delete.png"/></td>
											</tr>
										';
								}
							}
					}?>
				</tbody>
			</table>
		</div>
	</body>
	