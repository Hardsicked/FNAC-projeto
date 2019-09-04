<?php
	require "../../../php/connect.php";
	$vibr = $_POST["cresul"];
	$sql_resul_vibr = "SELECT * FROM tbresultado_vibr WHERE cdVibracao = ".$vibr;
	$qry_resul_vibr = mysqli_query($link,$sql_resul_vibr);
	$ghe = $_POST["ghe"];
	$sql_info_subgrupo = "SELECT * FROM tbsubgrupoagente WHERE cdSubGrupo = 15";
	$qry_info_subgrupo = mysqli_query($link,$sql_info_subgrupo);
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
	<form id="" class="" action="/fnac/forms/cadastro/post/form_editResultadovibracao.php" method="POST">
		<table class="table table-sm table-light">
			<thead class="thead-light">
				<tr>
					<th colspan="2" class="text-center">Modificar Resultado Vibração</th>
				</tr>
			</thead>
			<tbody>
				<?php while($assoc_vibr = mysqli_fetch_assoc($qry_resul_vibr)){
				echo '
				<tr>
					<td><input type="text" name="cdresultado" value="'.$vibr.'" hidden>
						Data de Avaliação</td>
					<td><input type="date" name="dataaval" value="'.$assoc_vibr["dataAvaliacao"].'" required></td>
				</tr>
				<tr>';
							echo '<td>Risco Vibração</td>
									<td>
										<select id="" class="" name="cdRisco" required>
							';
							while($assoc_subgrupo = mysqli_fetch_assoc($qry_info_subgrupo)){
								$sql_info_agente = "SELECT * FROM tbagente WHERE cdsubGrupo = ".$assoc_subgrupo["cdSubGrupo"];
								$qry_info_agente = mysqli_query($link,$sql_info_agente);
								while($assoc_agente = mysqli_fetch_assoc($qry_info_agente)){
									$agente = $assoc_agente["cdAgente"];
									$sql_info_risco = "SELECT * FROM tbrisco WHERE cdGHE = ".$ghe." AND cdAgente = ".$agente;
									$qry_info_risco = mysqli_query($link,$sql_info_risco);
									while($assoc_risco = mysqli_fetch_assoc($qry_info_risco)){
										if($assoc_vibr["cdRisco"] == $assoc_risco["cdrisco"]){
											echo '<option id="" class="" value="'.$assoc_risco["cdrisco"].'" selected>'.$assoc_subgrupo["nome"]." - ".$assoc_agente["nomeAgente"].'</option>';
										}else{
											echo '<option id="" class="" value="'.$assoc_risco["cdrisco"].'">'.$assoc_subgrupo["nome"]." - ".$assoc_agente["nomeAgente"].'</option>';
										}

									}
								}
									
							}
							echo '<tr>
					<input type="text" name="ghe" value="'.$assoc_vibr['cdGHE'].'" hidden>
					<td>Tipo de Vibração</td>
					<td><select name="tipo" required>';
						if($assoc_vibr['tipoVibracao'] == 0){
							echo'<option >Selecione o tipo de Vibração</option>
							<option value="0" selected>VCI - Vibração de Corpo Inteiro</option>
							<option value="1">VMB - Vibração de Mãos e Braços</option>';
						}elseif($assoc_vibr['tipoVibracao'] == 1){
							echo'<option >Selecione o tipo de Vibração</option>
							<option value="0">VCI - Vibração de Corpo Inteiro</option>
							<option value="1" selected>VMB - Vibração de Mãos e Braços</option>';
						}
					echo'</select></td>
				</tr>
				<tr>
					<td>Código de Rastreio</td>
					<td><input type="text" name="rastreio" required value="'.$assoc_vibr['codigoRastreio'].'"></td>
				</tr>
				<tr>
					<td>Data de Avaliação</td>
					<td><input type="date" name="dataaval" required value="'.$assoc_vibr['dataAvaliacao'].'"></td>
				</tr>
				<tr>
					<td>Tempo Efetivo de Exposição</td>
					<td><input type="text" name="tempoefetivo" required value="'.$assoc_vibr['tempoEfetivo'].'"></td>
				</tr>
				<tr>
					<td>Equipamento</td>
					<td><input type="text" name="equipamento" required value="'.$assoc_vibr['equipamento'].'"></td>
				</tr>
				<tr>
					<td>Aren m/s2</td>
					<td><input type="text" name="area" required value="'.$assoc_vibr['aren'].'"></td>
				</tr>
				<tr>
					<td>VDVR ms 1.75</td>
					<td><input type="text" name="vdvr" required value="'.$assoc_vibr['vdvrms175'].'"></td>
				</tr>
				<tr>
					<td>Observação</td>
					<td><input type="text" name="obs" required value="'.$assoc_vibr['obs'].'"></td>
				</tr>
				<tr>
					<td>GFIP</td>
					<td><select id="" class="" name="gfip" required>';
								if($assoc_vibr["gfip"] == 0){
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
									if($assoc_vibr["gfip"] == 1){
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
										if($assoc_vibr["gfip"] == 2){
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
											if($assoc_vibr["gfip"] == 3){
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
												if($assoc_vibr["gfip"] == 4){
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
													if($assoc_vibr["gfip"] == 5){
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
														if($assoc_vibr["gfip"] == 6){
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
															if($assoc_vibr["gfip"] == 7){
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
					echo '
							</select>
					</td>
					</tr>

					<tr>
						<td><input type="submit" id="" class="" name="" value="Confirmar Cadastro">
						</td>
						<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
					</tr>';
			}?>
			</tbody>
		</table>
	</form>
</body>