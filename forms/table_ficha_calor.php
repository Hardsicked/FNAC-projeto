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
			$(".novocalor").click(function(){
				var $value = $(this).attr("resultado");
				window.open($value,null,"height=600,width=800,status=no,toolbar=no,menubar=no,location=no");
			});
			$(".editcalor").click(function(){
				var $value = $(this).attr("ficha");
				window.open($value,null,"height=600,width=800,status=no,toolbar=no,menubar=no,location=no");
			});
			$(".infocd").change(function(){
				var $cdFicha = $('input[name=fichacalor]:checked').val();
				var $valor = "/fnac/forms/table_ficha_calor_info.php?c="+$cdFicha;
				$("#info").fadeOut(255,function(){
					$("#info").html($valor,function(){
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
					<h2 class="text-center">Fichas Calor</h2>
				</div>
				<div class="col-6"></div>
				<div class="col-3">
					<div class="novobotao text-center novocalor" resultado="forms/cadastro/add_ficha_calor.php?c=<?php echo $contratoid; ?>" style="margin-top: 8px; background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Nova Ficha Calor</b></div>
				</div>
			</div>
			<div class="row">
				<form method="post" action="">
					<table class="table table-sm table-light table-stripped table-bordered">
						<thead class="thead-light">
							<tr>
								<th colspan="10"></th>
								<th colspan="2" class="text-center"><b>Colaborador</b></th>
								<th colspan="2" class="text-center"><b>Supervisor</b></th>
								<th colspan="2" class="text-center"><b>Avaliador</b></th>
							</tr>
							<tr>
								<th class="text-center">Código do GHE</th>
								<th class="text-center">Cod.AV</th>
								<th class="text-center">Arquivos Associados</th>
								<th class="text-center">Gerar Ficha</th>
								<th class="text-center">Modificar</th>
								<th class="text-center">Excluir</th>
								<th class="text-center">Selecionar</th>
								<th class="text-center">Data de Avaliação</th>
								<th class="text-center">Tipo de Medida de Controle</th>
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
								$sql_fichag = "SELECT * FROM tbficha_ghe WHERE cdGHE = ".$ghe." AND tipo = 4";
								$qry_fichag = mysqli_query($link,$sql_fichag);
								while($assoc_fichag = mysqli_fetch_assoc($qry_fichag)){
									$sql_ficha = "SELECT * FROM tbficha_calor WHERE cdFicha = ".$assoc_fichag['cdFicha'];
									$query_ficha = mysqli_query($link,$sql_ficha);
			
										
										$numficha = $query_ficha->num_rows;
										if($numficha > 0){
											echo ' <tr><td class="text-center" rowspan="'.$numficha.'">'.$codghe.'</td>';
										}
										while($assoc_ficha = mysqli_fetch_assoc($query_ficha)){	
											if($assoc_ficha["medDeControle"] == 1){
												$tipoMed = "Individual";
											}else{
												if($assoc_ficha["medDeControle"] == 2){
													$tipoMed = "Coletiva";
												}else{
													if($assoc_ficha["medDeControle"] == 0){
														$tipoMed = "Não Identificado";
													}
												}
											}
											$descmed = $assoc_ficha["descMed"];
											echo '			<td class="text-center">'.$assoc_fichag['DR'].'</td>
														<td class="text-center"><img ficha="" class="editcalor icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png"/></td>
														<td class="text-center"><img ficha="" class="imprimir icone2" style="cursor: pointer" width="24px" height="24px" impress="" src="img/icons/edit.png"/></td>			
														<td class="text-center"><img ficha="" class="editcalor icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png"/></td>
														<td class="text-center"><img data-fancybox data-type="ajax" data-src="" href="javascript:;" data-confirm="" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/delete.png"/></td>
														<td class="text-center"><input type="radio" id="fichacalor" name="fichacalor" class="infocd" value="'.$assoc_ficha['cdFicha'].'"></td>
														<td class="text-center">'.$assoc_ficha['dataAval'].'</td>	
														<td class="text-center">'.$tipoMed.' - '.$descmed.'</td>
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
	