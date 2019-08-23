<?php
	require "../../../php/connect.php";
	$quimico = $_POST["cresul"];
	$sql_resul_quimico = "SELECT * FROM tbresultado_quim WHERE cdQuim = ".$quimico;
	$qry_resul_quimico = mysqli_query($link,$sql_resul_quimico);
	$ghe = $_POST["ghe"];
	$sql_info_subgrupo = "SELECT * FROM tbsubgrupoagente WHERE cdTipoAgente = 9";
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
	<form id="" class="" action="/fnac/forms/cadastro/post/form_editResultadoquimico.php" method="POST">
		<table class="table table-sm table-light">
			<thead class="thead-light">
				<tr>
					<th colspan="2" class="text-center">Modificar Resultado Químico</th>
				</tr>
			</thead>
			<tbody>
				<?php while($assoc_quim = mysqli_fetch_assoc($qry_resul_quimico)){
				echo '
				<tr>
					<td>Código de Rastreio</td>
					<td>
						<input type="text" name="cdresultado" value="'.$quimico.'" hidden>
						<input type="text" name="rastreio" value="'.$assoc_quim["codigoRastreio"].'" required>
					</td>
				</tr>
				<tr>
					<td>Data de Avaliação</td>
					<td><input type="date" name="dataaval" value="'.$assoc_quim["dataAvaliacao"].'" required></td>
				</tr>
				<tr>';
						if($qry_info_subgrupo->num_rows > 0){
							echo '<td>Agente Quimico</td>
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
										if($assoc_quim["cdRisco"] == $assoc_risco["cdrisco"]){
											echo '<option id="" class="" value="'.$assoc_risco["cdrisco"].'" selected>'.$assoc_subgrupo["nome"]." - ".$assoc_agente["nomeAgente"].'</option>';
										}else{
											echo '<option id="" class="" value="'.$assoc_risco["cdrisco"].'">'.$assoc_subgrupo["nome"]." - ".$assoc_agente["nomeAgente"].'</option>';
										}

									}
								}
									
							}
						}else{
							echo '<td>Agente Quimico <img height="20px" width="20px" style="margin-top: -4px;" src="../../img/icons/alert.png"/></td>
									<td>
										<select id="" class="" name="cdRisco" disabled>
											<option id="" class="" >Nenhum Risco Químico cadastrado</option>
								';
						}
					echo'
						</select>					
					</td>
				</tr>
				<tr>
					<td>Resultado</td>
					<td><input type="text" name="resultado" value="'.$assoc_quim["concentracaomg"].'" required></td>
				</tr>
				<tr>
					<td>% Sio2</td>
					<td><input type="text" name="sio2" value="'.$assoc_quim["prcntgSio2"].'">';
					if($assoc_quim["imprimirSio2"] == 1){
						echo'<input type="checkbox" name="imprimir" value="1" checked>Habilitar?';
					}else{
						echo'<input type="checkbox" name="imprimir" value="1">Habilitar?';
					}
				echo'
					</td>
				</tr>
				<tr>
					<td>GFIP</td>
					<td><select id="" class="" name="gfip" required>';
								if($assoc_quim["GFIP"] == 0){
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
									if($assoc_quim["GFIP"] == 1){
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
										if($assoc_quim["GFIP"] == 2){
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
											if($assoc_quim["GFIP"] == 3){
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
												if($assoc_quim["GFIP"] == 4){
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
													if($assoc_quim["GFIP"] == 5){
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
														if($assoc_quim["GFIP"] == 6){
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
															if($assoc_quim["GFIP"] == 7){
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