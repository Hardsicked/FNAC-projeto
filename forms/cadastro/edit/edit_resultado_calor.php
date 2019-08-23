<?php
	require "../../../php/connect.php";
	$calor = $_GET['c'];
	$sql_result = "SELECT * FROM tbresultado_calor WHERE cdCalor =".$calor;
	$qry_result = mysqli_query($link,$sql_result);
	foreach ($qry_result as $result){
		$cdrisco = $result['cdRisco'];
		$ghe = $result['cdGHE'];
		$tarefa = $result['tarefa'];
		$pontom = $result['pontoDeMedicao'];
		$obs = $result['observacao'];
		$carga = $result['cargasolar'];
		$tempo = $result['tempoexec'];
		$tg = $result['tg'];
		$tbn = $result['tbn'];
		$tbs = $result['tbs'];
		$ibutg = $result['ibutg'];
		$meta = $result['metabolica'];
		$gfip = $result['gfip'];
	}
	$sql_info_subgrupo = "SELECT * FROM tbsubgrupoagente WHERE cdSubGrupo = 19";
	$qry_info_subgrupo = mysqli_query($link,$sql_info_subgrupo);
	$sql_risco = "SELECT * FROM tbrisco WHERE cdGHE = ".$ghe." AND tipoRisco = 4";
	$qry_risco = mysqli_query($link,$sql_risco);
	
?>
<head>
	<link rel="stylesheet" href="../../../css/bootstrap.min.css">
		<link rel="stylesheet" href="../../../css/fnac.css">
		
		<!-- Custom styles for this template -->
		<link href="../../../css/scrolling-nav.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../../../css/jquery.fancybox.min.css">
		<!-- Bootstrap core JavaScript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="../../../js/bootstrap.min.js"></script>

		<!-- Plugin JavaScript -->
		<!--<script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

		<!-- Custom JavaScript for this theme -->
		<script src="../../../js/scrolling-nav.js"></script>
		<script src="../../../js/jquery.fancybox.min.js"></script>
</head>
<body>
	<form id="" class="" action="/fnac/forms/cadastro/post/form_editResultadocalor.php?c=<?php echo $calor; ?>" method="POST">
		<table class="table table-sm table-light">
			<thead class="thead-light">
				<tr>
					<th colspan="2" class="text-center">Modificar Resultado Calor</th>
				</tr>
			</thead>
			<tbody>
			<tr>
					<td>Selecionar Risco</td>
					<td><input type="text" name="ghe" value="<?php echo $ghe; ?>" hidden>
					<select name="risco" required>
						<option selected>Nenhum Risco Selecionado</option>
						<?php 
						if($qry_risco->num_rows == 0){
							echo "<option>Nenhum Risco de Calor Cadastrado</option>";
						}else{
							foreach($qry_risco as $risco){
								$sql_agente = "SELECT * FROM tbagente WHERE cdAgente = ".$risco['cdAgente'];
								$agente = mysqli_query($link,$sql_agente);
								foreach($agente as $agente){
									if($risco['cdrisco'] == $cdrisco){
										echo "<option value='".$risco['cdrisco']."'selected>".$risco['cdrisco']." - ".$agente['nomeAgente']."</option>";
									}else{
										echo "<option value='".$risco['cdrisco']."'>".$risco['cdrisco']." - ".$agente['nomeAgente']."</option>";
									}
								}
							}
						}
						  ?>
				</tr>
				<tr>
					<td>Ponto de Medição</td>
					<td><input type="text" name="ponto" required value="<?php echo $pontom; ?>"></td>
				</tr>
				<tr>
					<td>Tarefa</td>
					<td><input type="text" name="tarefa" required value="<?php echo $tarefa; ?>"></td>
				</tr>
				<tr>
					<td>Carga Solar</td>
					<td><select name="cargasolar" required>
						<option disabled> Selecione </option>
						<?php if($carga == 0){
							echo'<option value="0" selected>Não</option>
							<option value="1">Sim</option>';
							}elseif($carga == 1){
							echo'<option value="0">Não</option>
							<option value="1" selected>Sim</option>';
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Tempo de Execução (minutos)</td>
					<td><input type="text" name="tempoexec" required value="<?php echo $tempo; ?>"></td>
				</tr>
				<tr>
					<td>TG (ºC)</td>
					<td><input type="text" name="tg" required value="<?php echo $tg; ?>"></td>
				</tr>
				<tr>
					<td>TBN (ºC)</td>
					<td><input type="text" name="tbn" required value="<?php echo $tbn; ?>"></td>
				</tr>
				<tr>
					<td>TBS (ºC)</td>
					<td><input type="text" name="tbs" value="<?php echo $tbs; ?>"></td>
				</tr>
				<tr>
					<td>IBUTG (ºC)</td>
					<td><input type="text" name="ibutg" required value="<?php echo $ibutg; ?>"></td>
				</tr>
				<tr>
					<td>Taxa de Metabolica (Kcal/h)</td>
					<td><input type="text" name="metabolica" required value="<?php echo $meta; ?>"></td>
				</tr>
				<tr>
					<td>Observação</td>
					<td><input type="text" name="observacao" required value="<?php echo $obs; ?>"></td>
				</tr>
				<tr>
					<td>GFIP</td>
					<td><select id="" class="" name="gfip" required><?php
								if($gfip == 0){
									echo'<option id="" class="" value="0" selected>00 - Não Exposto a agente nocivo</option>
									<option id="" class="" value="1">01 - Não Exposição a agente nocivo.Trabalhador já esteve exposto</option>
									<option id="" class="" value="2">02 - Exposição a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
									<option id="" class="" value="3">03 - Exposição a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
									<option id="" class="" value="4">04 - Exposição a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>
									<option id="" class="" value="5">05 - Não Exposto a agente nocivo</option>
									<option id="" class="" value="6">06 - Exposição a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
									<option id="" class="" value="7">07 - Exposição a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
									<option id="" class="" value="8">08 - Exposição a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>';
								}else{
									if($gfip == 1){
										echo'<option id="" class="" value="0">00 - Não Exposto a agente nocivo</option>
										<option id="" class="" value="1" selected>01 - Não Exposição a agente nocivo.Trabalhador já esteve exposto</option>
										<option id="" class="" value="2">02 - Exposição a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
										<option id="" class="" value="3">03 - Exposição a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
										<option id="" class="" value="4">04 - Exposição a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>
										<option id="" class="" value="5">05 - Não Exposto a agente nocivo</option>
										<option id="" class="" value="6">06 - Exposição a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
										<option id="" class="" value="7">07 - Exposição a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
										<option id="" class="" value="8">08 - Exposição a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>';
									}else{
										if($gfip == 2){
											echo'<option id="" class="" value="0">00 - Não Exposto a agente nocivo</option>
											<option id="" class="" value="1">01 - Não Exposição a agente nocivo.Trabalhador já esteve exposto</option>
											<option id="" class="" value="2" selected>02 - Exposição a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
											<option id="" class="" value="3">03 - Exposição a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
											<option id="" class="" value="4">04 - Exposição a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>
											<option id="" class="" value="5">05 - Não Exposto a agente nocivo</option>
											<option id="" class="" value="6">06 - Exposição a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
											<option id="" class="" value="7">07 - Exposição a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
											<option id="" class="" value="8">08 - Exposição a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>';
										}else{
											if($gfip == 3){
												echo'<option id="" class="" value="0">00 - Não Exposto a agente nocivo</option>
													<option id="" class="" value="1">01 - Não Exposição a agente nocivo.Trabalhador já esteve exposto</option>
													<option id="" class="" value="2">02 - Exposição a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
													<option id="" class="" value="3" selected>03 - Exposição a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
													<option id="" class="" value="4">04 - Exposição a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>
													<option id="" class="" value="5">05 - Não Exposto a agente nocivo</option>
													<option id="" class="" value="6">06 - Exposição a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
													<option id="" class="" value="7">07 - Exposição a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
													<option id="" class="" value="8">08 - Exposição a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>';
											}else{
												if($gfip == 4){
													echo'<option id="" class="" value="0">00 - Não Exposto a agente nocivo</option>
														<option id="" class="" value="1">01 - Não Exposição a agente nocivo.Trabalhador já esteve exposto</option>
														<option id="" class="" value="2">02 - Exposição a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
														<option id="" class="" value="3">03 - Exposição a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
														<option id="" class="" value="4" selected>04 - Exposição a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>
														<option id="" class="" value="5">05 - Não Exposto a agente nocivo</option>
														<option id="" class="" value="6">06 - Exposição a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
														<option id="" class="" value="7">07 - Exposição a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
														<option id="" class="" value="8">08 - Exposição a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>';
												}else{
													if($gfip == 5){
														echo'<option id="" class="" value="0">00 - Não Exposto a agente nocivo</option>
															<option id="" class="" value="1">01 - Não Exposição a agente nocivo.Trabalhador já esteve exposto</option>
															<option id="" class="" value="2">02 - Exposição a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
															<option id="" class="" value="3">03 - Exposição a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
															<option id="" class="" value="4">04 - Exposição a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>
															<option id="" class="" value="5" selected>05 - Não Exposto a agente nocivo</option>
															<option id="" class="" value="6">06 - Exposição a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
															<option id="" class="" value="7">07 - Exposição a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
															<option id="" class="" value="8">08 - Exposição a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>';
													}else{
														if($gfip == 6){
															echo'<option id="" class="" value="0">00 - Não Exposto a agente nocivo</option>
																<option id="" class="" value="1">01 - Não Exposição a agente nocivo.Trabalhador já esteve exposto</option>
																<option id="" class="" value="2">02 - Exposição a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
																<option id="" class="" value="3">03 - Exposição a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
																<option id="" class="" value="4">04 - Exposição a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>
																<option id="" class="" value="5">05 - Não Exposto a agente nocivo</option>
																<option id="" class="" value="6" selected>06 - Exposição a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
																<option id="" class="" value="7">07 - Exposição a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
																<option id="" class="" value="8">08 - Exposição a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>';
														}else{
															if($gfip == 7){
																echo'<option id="" class="" value="0">00 - Não Exposto a agente nocivo</option>
																	<option id="" class="" value="1">01 - Não Exposição a agente nocivo.Trabalhador já esteve exposto</option>
																	<option id="" class="" value="2">02 - Exposição a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
																	<option id="" class="" value="3">03 - Exposição a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
																	<option id="" class="" value="4">04 - Exposição a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>
																	<option id="" class="" value="5">05 - Não Exposto a agente nocivo</option>
																	<option id="" class="" value="6">06 - Exposição a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
																	<option id="" class="" value="7" selected>07 - Exposição a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
																	<option id="" class="" value="8">08 - Exposição a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>';
															}else{
																echo'<option id="" class="" value="0">00 - Não Exposto a agente nocivo</option>
																	<option id="" class="" value="1">01 - Não Exposição a agente nocivo.Trabalhador já esteve exposto</option>
																	<option id="" class="" value="2">02 - Exposição a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
																	<option id="" class="" value="3">03 - Exposição a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
																	<option id="" class="" value="4">04 - Exposição a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>
																	<option id="" class="" value="5">05 - Não Exposto a agente nocivo</option>
																	<option id="" class="" value="6">06 - Exposição a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
																	<option id="" class="" value="7">07 - Exposição a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
																	<option id="" class="" value="8" selected>08 - Exposição a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>';
															}
														}
													}
												}
											}
										}
									}
								}
?>
							</select>
					</td>
				</tr>
				<tr>
					<td><input type="submit" id="" class="" name="" value="Confirmar Modificar"></td>
					<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
				</tr>
			</tbody>
		</table>
	</form>
</body>
