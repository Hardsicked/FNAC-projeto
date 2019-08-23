<?php
	session_start();
	require "../php/connect.php";
	$empid = $_SESSION['cdempresa'];
	$contratoid = $_SESSION['cdcontrato'];
	$sqlh = "SELECT * FROM tbcontrato_cronograma WHERE cdContrato =".$contratoid;
	$qryh = mysqli_query($link,$sqlh);
	$sqlt = "SELECT * FROM tbcontrato_cronograma_t WHERE cdContrato =".$contratoid;
	$qryt = mysqli_query($link,$sqlt);
?>
	<head>
		<script>
			function novoresultado() {
				window.open("forms/cadastro/add_cronograma_header.php?c=<?php echo $contratoid; ?>",null,"height=900,width=800,status=no,toolbar=no,menubar=no,location=no");
			}
			function novoresultado2() {
				window.open("forms/cadastro/add_cronograma_data.php?c=<?php echo $contratoid; ?>",null,"height=900,width=800,status=no,toolbar=no,menubar=no,location=no");
			}
			$(".editcabe").click(function(){
				var $value = $(this).attr("agente");
				window.open($value,null,"height=750,width=600,status=no,toolbar=no,menubar=no,location=no");
			});
		</script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-5">
					<h2 class="text-center">Cronograma</h2>
				</div>
				<div class="col-2">
					<div onclick="novoresultado()" class="novobotao text-center" style="margin-top: 8px; background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Novo Cabeçalho</b></div>
				</div>
				<div class="col-2">
					<div agente="/fnac/forms/cadastro/edit/edit_cronograma_header.php?c=<?php echo $contratoid; ?>" class="editcabe novobotao text-center" style="border-radius: 2px; margin-top: 8px; background-color: #94f441 color: white;;cursor: pointer; "><b>Modificar Cabeçalho</b></div>
				</div>
				<div class="col-3">
					<div onclick="novoresultado2()" class="novobotao text-center" style="margin-top: 8px; background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Nova Tarefa</b></div>
				</div>
			</div>
			<div class="row">
				<table class="table table-sm table-light table-stripped table-bordered" cellpadding="1">
					<thead class="thead-light">
						<?php if($qryh -> num_rows > 0){
							foreach($qryh as $h){
								$mes1 = $h["mes1"];
								$mes2 = $h["mes2"];
								$mes3 = $h["mes3"];
								$mes4 = $h["mes4"];
								$mes5 = $h["mes5"];
								$mes6 = $h["mes6"];
								$mes7 = $h["mes7"];
								$mes8 = $h["mes8"];
								$mes9 = $h["mes9"];
								$mes10 = $h["mes10"];
								$mes11 = $h["mes11"];
								$mes12 = $h["mes12"];
							}
							echo'<tr>
								<td class="text-center"><b>Tarefa</b></td>
								<td class="text-center" style="background-color: #ccc;"><b>'.$mes1.'</b></td>
								<td class="text-center" style="background-color: #ccc;"><b>'.$mes2.'</b></td>
								<td class="text-center" style="background-color: #ccc;"><b>'.$mes3.'</b></td>
								<td class="text-center" style="background-color: #ccc;"><b>'.$mes4.'</b></td>
								<td class="text-center" style="background-color: #ccc;"><b>'.$mes5.'</b></td>
								<td class="text-center" style="background-color: #ccc;"><b>'.$mes6.'</b></td>
								<td class="text-center" style="background-color: #ccc;"><b>'.$mes7.'</b></td>
								<td class="text-center" style="background-color: #ccc;"><b>'.$mes8.'</b></td>
								<td class="text-center" style="background-color: #ccc;"><b>'.$mes9.'</b></td>
								<td class="text-center" style="background-color: #ccc;"><b>'.$mes10.'</b></td>
								<td class="text-center" style="background-color: #ccc;"><b>'.$mes11.'</b></td>
								<td class="text-center" style="background-color: #ccc;"><b>'.$mes12.'</b></td>
								<td class="text-center" style="background-color: $ccc;"><b>Modificar</b></td>
							</tr>';
						}else{
							echo'<tr><td class="text-center" colspan="13">Não Há cabeçalho cadastrado!</td></tr>';
						}?>
					</thead>
					<tbody>
						<?php if($qryt -> num_rows > 0){
							foreach($qryt as $t){
							$cont = 0;
								$tarefa = $t["nomeTarefa"];
								$mes = array($t["bmes1"],$t["bmes2"],$t["bmes3"],$t["bmes4"],$t["bmes5"],$t["bmes6"],$t["bmes7"],$t["bmes8"],$t["bmes9"],$t["bmes10"],$t["bmes11"],$t["bmes12"]);
								echo'<tr>
									<td class="text-center" style="background-color: #ccc;">'.$tarefa.'</td>';
								while($cont < 12){
									if($mes[$cont] == 0){
										echo'<td class="text-center" style="background-color: white;">Não Marcado</td>';
									}else{
										echo'<td class="text-center" style="background-color: #42aaf4;">Marcado</td>';
		
									}
									$cont++;
									if($cont == 12){
										echo'<td class="text-center">
											<img agente="/fnac/forms/cadastro/edit/edit_cronograma_data.php?c='.$contratoid.'&b='.$t['cdCronograma'].'" class="editcabe icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png"/>
									</td>';
									}
								}
							}
							
							echo'
							</tr>';
						}else{
							echo'<tr><td class="text-center" colspan="13">Não há tarefas cadastradas!</td></tr>';
						}?>
						
					</tbody>
				</table>
			</div>
		</div>
	</body>
	