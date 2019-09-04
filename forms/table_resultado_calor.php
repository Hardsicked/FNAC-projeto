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
				window.open("forms/cadastro/add_resultado_caloraux.php?c=<?php echo $contratoid; ?>&i=0",null,"height=700,width=800,status=no,toolbar=no,menubar=no,location=no");
			}
			function novoresultado2() {
				window.open("forms/cadastro/add_resultado_caloraux.php?c=<?php echo $contratoid; ?>&i=1",null,"height=700,width=800,status=no,toolbar=no,menubar=no,location=no");
			}
			$(".editcalor").click(function(){
				var $value = $(this).attr("agente");
				window.open($value,null,"height=500,width=800,status=no,toolbar=no,menubar=no,location=no");
			});
		</script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-6">
					<h2 class="text-center">Resultados Calor</h2>
				</div>
				<div class="col-6">
					<div onclick="novoresultado2()" class="novobotao text-center" style="margin-top: 8px; background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Nova Informação</b></div>
					<div onclick="novoresultado()" class="novobotao text-center" style="margin-top: 8px; background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Novo Resultado</b></div>
				</div>
			</div>
			<table class="table table-sm table-light table-stripped table-bordered" style="margin-top: 5px;">
				<thead class="thead-light">
					<tr>
						<th class="text-center">Identificação do Ciclo</th>
						<th class="text-center">Código de Amostragem</th>
					</tr>
				</thead>
				<tbody>
					<?php $sql_resultado2 = "SELECT * FROM tbresultado_caloraux WHERE cdGHE = ".$ghe;
						$resultadoaux = mysqli_query($link,$sql_resultado);
					 foreach ($resultadoaux as $ra) {
						
						echo'<tr>
							<td class="text-center">'.$ra["ciclo"].'</td>
							<td class="text-center">'.$ra["cdAmostragem"].'</td>
						</tr>';
					
					}?>
				</tbody>
			</table>
			<table class="table table-sm table-light table-stripped table-bordered">
				<thead class="thead-light">
					<tr>
						<th class="text-center">Código do GHE</th>
						<th class="text-center">Cargo</th>
						<th class="text-center">Tarefa</th>
						<th class="text-center">Carga Solar</th>
						<th class="text-center">Tempo de Execução (Minutos)</th>
						<th class="text-center">TG (ºC)</th>
						<th class="text-center">TBN (ºC)</th>
						<th class="text-center">TBS (ºC)</th>
						<th class="text-center">IBUTG (ºC)</th>
						<th class="text-center">Observação</th>
						<th class="text-center">GFIP</th>
						<th class="text-center">Modificar</th>
						<th class="text-center">Excluir</th>
					</tr>
				</thead>
				<tbody>
					<?php while($assoc_ghe = mysqli_fetch_assoc($query_ghe)){
							$ghe = $assoc_ghe['cdGHE'];
							$sql_resultado = "SELECT * FROM tbresultado_calor WHERE cdGHE = ".$ghe;
							$query_resultado = mysqli_query($link,$sql_resultado);
							while($assoc_resultado = mysqli_fetch_assoc($query_resultado)){
								echo ' <tr>
										<td class="text-center">'.$assoc_ghe['codGHE'].'</td>
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
											<td class="text-center">'.$assoc_resultado['tarefa'].'</td>
											<td class="text-center">';
											if($assoc_resultado['cargasolar'] == 1){
												echo 'Sim';
											}else{
												echo 'Não';
											}
											echo'</td>
											<td class="text-center">'.$assoc_resultado['tempoexec'].'</td>
											<td class="text-center">'.$assoc_resultado['tg'].'</td>
											<td class="text-center">'.$assoc_resultado['tbn'].'</td>
											<td class="text-center">'.$assoc_resultado['tbs'].'</td>
											<td class="text-center">'.$assoc_resultado['ibutg'].'</td>
											<td class="text-center">'.$assoc_resultado['observacao'].'</td>
											<td class="text-center">';
													if($assoc_resultado['gfip'] == 0){
														echo'00 - Não Exposto a agente nocivo';
													}else{
														if($assoc_resultado['gfip'] == 1){
															echo'01 - Não Exposição a agente nocivo.Trabalhador já esteve exposto';
														}else{
															if($assoc_resultado['gfip'] == 2){
																echo'02 - Exposição a agente nocivo <br>(Aposentadoria especial aos 15 anos de trabalho)';
															}else{
																if($assoc_resultado['gfip'] == 3){
																	echo'03 - Exposição a agente nocivo <br>(Aposentadoria especial aos 20 anos de trabalho)';
																}else{
																	if($assoc_resultado['gfip'] == 4){
																		echo'04 - Exposição a agente nocivo <br>(Aposentadoria especial aos 25 anos de trabalho)';
																	}else{
																		if($assoc_resultado['gfip'] == 5){
																			echo'05 - Não Exposto a agente nocivo';
																		}else{
																			if($assoc_resultado['gfip'] == 6){
																				echo'06 - Exposição a agente nocivo <br>(Aposentadoria especial aos 15 anos de trabalho)';
																			}else{
																				if($assoc_resultado['gfip'] == 6){
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
											<td class="text-center"><img agente="/fnac/forms/cadastro/edit/edit_resultado_calor.php?c='.$assoc_resultado['cdCalor'].'" class="editcalor icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png" /></td>
											<td class="text-center"><img data-fancybox data-type="ajax" data-src="/fnac/forms/cadastro/post/form_delResultadocalor.php?c='.$assoc_resultado['cdCalor'].'" href="javascript:;" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/delete.png"/></td>
										</tr>
									';
							}
					}?>
				</tbody>
			</table>
		</div>
	</body>
	