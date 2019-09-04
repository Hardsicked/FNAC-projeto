<?php
	require "../../../php/connect.php";
	$quali = $_POST["cresul"];
	$sql_resul_quali = "SELECT * FROM tbresultado_qual WHERE cdQualitativo = ".$quali;
	$qry_resul_quali = mysqli_query($link,$sql_resul_quali);
	$ghe = $_POST["ghe"];
	$sql_info_subgrupo = "SELECT * FROM tbsubgrupoagente WHERE cdSubGrupo = 32";
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
					<th colspan="2" class="text-center">Modificar Resultado Qualitativo</th>
				</tr>
			</thead>
			<tbody>
				<?php while($assoc_quali = mysqli_fetch_assoc($qry_resul_quali)){
				echo '
				<tr>
					<td><input type="text" name="cdresultado" value="'.$assoc_quali["cdQualitativo"].'" hidden>
						Data de Avaliação</td>
					<td><input type="date" name="dataaval" value="'.$assoc_quali["dataAval"].'" required></td>
				</tr>
				<tr>';
						if($qry_info_subgrupo->num_rows > 0){
							echo '<td>Agente Qualitativo</td>
									<td>
										<select id="" class="" name="cdRisco" required>
							';
							while($assoc_subgrupo = mysqli_fetch_assoc($qry_info_subgrupo)){
								$sql_info_agente = "SELECT * FROM tbagente WHERE cdsubGrupo = 32";
								$qry_info_agente = mysqli_query($link,$sql_info_agente);
								while($assoc_agente = mysqli_fetch_assoc($qry_info_agente)){
									$agente = $assoc_agente["cdAgente"];
									$sql_info_risco = "SELECT * FROM tbrisco WHERE cdGHE = ".$ghe." AND cdAgente = ".$agente;
									$qry_info_risco = mysqli_query($link,$sql_info_risco);
									while($assoc_risco = mysqli_fetch_assoc($qry_info_risco)){
										if($assoc_qual["cdRisco"] == $assoc_risco["cdrisco"]){
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
					<td><textarea rows="10" cols="100" name="texto" required>'.$assoc_quali["texto"].'</textarea></td>
				</tr>
				<tr>
					<td>Observação</td>
					<td><textarea rows="10" cols="100" name="obs" required>'.$assoc_quali["obs"].'</textarea></td>
				</tr>
				<tr>
					<td>EPI Adequada?</td>';
				if($assoc_quali['epiAdequada'] == 1){
					echo'<td><select name="epia" required>
						<option disabled>Selecione</option>
						<option value="1" selected>Não</option>
						<option value="2">Sim</option>
					</select></td>';
				}else{
					echo'<td><select name="epia" required>
						<option disabled>Selecione</option>
						<option value="1">Não</option>
						<option value="2" selected>Sim</option>
					</select></td>';
				}
					
				echo'</tr>
				<tr>
					<td>GFIP</td>
					<td><select id="" class="" name="gfip" required>';
								if($assoc_qual["GFIP"] == 0){
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
									if($assoc_qual["GFIP"] == 1){
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
										if($assoc_qual["GFIP"] == 2){
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
											if($assoc_qual["GFIP"] == 3){
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
												if($assoc_qual["GFIP"] == 4){
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
													if($assoc_qual["GFIP"] == 5){
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
														if($assoc_qual["GFIP"] == 6){
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
															if($assoc_qual["GFIP"] == 7){
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