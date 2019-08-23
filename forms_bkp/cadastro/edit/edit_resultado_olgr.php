<?php 
	require "../../../php/connect.php";
	$qualitativo = $_GET['b'];
	$sql_info_qual = "SELECT * FROM tbresultado_olgr WHERE cdOleoGraxa = ".$qualitativo;
	$qry_info_qual = mysqli_query($link,$sql_info_qual);
	$contrato = $_GET['c'];
	$sql_info_ghe = "SELECT * FROM tbghe WHERE cdContrato = ".$contrato;
	$qry_info_ghe = mysqli_query($link,$sql_info_ghe);
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
	<form id="" class="" action="/fnac/forms/cadastro/post/form_editResultadooleograxa.php?c=<?php echo $qualitativo; ?>" method="POST">
		<table class="table table-sm table-light">
			<thead class="thead-light">
				<tr>
					<th colspan="2" class="text-center">Modificar Resultado Qualitativo</th>
				</tr>
			</thead>
			<tbody>
				<?php while($assoc_res = mysqli_fetch_assoc($qry_info_qual)){
					echo '
					<tr>
						<td>Codígo da GHE</td>
						<td>';
								if($qry_info_ghe->num_rows > 0){
									echo '<select id="" class="" name="ghe" required>';
									while($assoc_ghe = mysqli_fetch_assoc($qry_info_ghe)){
										if($assoc_res["cdGHE"] == $assoc_ghe["cdGHE"]){
											echo '<option id="" class="" value="'.$assoc_ghe["cdGHE"].'" selected>'.$assoc_ghe["codGHE"].'</option>';
										}else{
											echo '<option id="" class="" value="'.$assoc_ghe["cdGHE"].'">'.$assoc_ghe["codGHE"].'</option>';
										}
									}
								}else{
									echo '
										<select id="" class="" name="ghe">
											<option id="" class="">Nenhum GHE cadastrado</option>
										';
								}
							echo '
							</select>					
						</td>
					</tr>
					<tr>
						<td>Código de Rastreio</td>
						<td><input type="text" name="rastreio" value="'.$assoc_res["codigoRastreio"].'" required></td>
					</tr>
					<tr>
						<td>Data de Avaliação</td>
						<td><input type="date" name="dataaval" value="'.$assoc_res["dataAvaliacao"].'" required></td>
					</tr>
					<tr>
						<td>Agente Qualitativo</td>
						<td><select name="agentequal" required>';
								if($assoc_res["agenteQualitativo"] == 1){
									echo'<option value="1" selected>Manipulação de Óleos e Graxa</option>
								 		 <option value="0">Radiação Não Ionizante - Ultra Violetas';
								}else{
									echo'<option value="1">Manipulação de Óleos e Graxa</option>
								 		 <option value="0" selected>Radiação Não Ionizante - Ultra Violetas';
								}
						echo '
							</select>
						</td>
					</tr>
					<tr>
						<td>Descrição Atividade Classificada</td>
						<td>
							<textarea cols="70" rows="20" name="descativClass">'.$assoc_res["descAtiv"].'</textarea>
						</td>
					</tr>
					<tr>
						<td>Descrição Tarefa durante a exposição</td>
						<td><textarea cols="70" rows="20" name="descTaref">'.$assoc_res["descTaref"].'</textarea>
						</td>
					</tr>
					<tr>
						<td>Utilização adequada para a realização da tarefa?</td>
						<td>
							<center>';
							if($assoc_res["utilizacaoAdeq"] == 1){
								echo'<input  type="radio" name="utilizacaoadeq" value="false" checked>Não
									 <input type="radio" name="utilizacaoadeq" value="true">Sim';
							}else{
								echo'<input  type="radio" name="utilizacaoadeq" value="false">Não
									 <input type="radio" name="utilizacaoadeq" value="true" checked>Sim';
							}
							echo'
							</center>
						</td>
					</tr>
					<tr>
						<td>GFIP</td>
						<td><select id="" class="" name="gfip" required>';
								if($assoc_res["GFIP"] == 0){
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
									if($assoc_res["GFIP"] == 1){
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
										if($assoc_res["GFIP"] == 2){
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
											if($assoc_res["GFIP"] == 3){
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
												if($assoc_res["GFIP"] == 4){
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
													if($assoc_res["GFIP"] == 5){
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
														if($assoc_res["GFIP"] == 6){
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
															if($assoc_res["GFIP"] == 7){
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
						<td>';
							 if($qry_info_ghe->num_rows > 0){
								echo'<input type="submit" id="" class="" name="" value="Confirmar Cadastro">';
							}else{
								echo'<input type="submit" id="" class="" name="" value="Confirmar Cadastro" disabled>';
							}
						echo'
						</td>
						<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
					</tr>';
			}?>
			</tbody>
		</table>
	</form>
</body>