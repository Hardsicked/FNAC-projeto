<?php 
	require "../../../php/connect.php";
	$contrato = $_GET['c'];
	$cdresult = $_GET['b'];
	$ghe = $_POST['ghe'];
	$sql_info_ruido = "SELECT * FROM tbresultado_ruido WHERE cdResultado =".$cdresult;
	$qry_info_ruido = mysqli_query($link,$sql_info_ruido);
	$sql_info_risco = "SELECT * FROM tbrisco WHERE cdGHE = ".$ghe;
	$qry_info_risco = mysqli_query($link,$sql_info_risco);
?>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
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
	<form id="" class="" action="/fnac/forms/cadastro/post/form_editResultadoruido.php?c=<?php echo $cdresult; ?>" method="POST">
		<table class="table table-sm table-light">
			<thead class="thead-light">
				<tr>
					<th colspan="2" class="text-center">Novo Resultado Ruído</th>
				</tr>
			</thead>
			<tbody>
				<?php while($assoc_ruido = mysqli_fetch_assoc($qry_info_ruido)){
					echo'
					<tr>
						<td>Selecionar Risco</td>
						<td><input type="text" name="ghe" value="'.$ghe.'" hidden>';
							echo '<select id="" class="" name="risco" required>';
							$sql_info_agente_risco = "SELECT * FROM tbagente WHERE cdsubGrupo = 7";
							$qry_info_agente_risco = mysqli_query($link,$sql_info_agente_risco);
							while($assoc_agente_risco = mysqli_fetch_assoc($qry_info_agente_risco)){
								$sql_info_risco = "SELECT * FROM tbrisco WHERE cdGHE = ".$ghe." AND cdAgente = ".$assoc_agente_risco['cdAgente'];
								$qry_info_risco = mysqli_query($link,$sql_info_risco);
								while($assoc_risco = mysqli_fetch_assoc($qry_info_risco)){
									if($assoc_ruido["cdRisco"] == $$assoc_risco["cdrisco"]){
										echo '<option id="" class="" value="'.$assoc_risco["cdrisco"].'" selected>'.$assoc_agente_risco["nomeAgente"].'</option>';
									}else{
										echo '<option id="" class="" value="'.$assoc_risco["cdrisco"].'">'.$assoc_agente_risco["nomeAgente"].'</option>';
									}
								}
							}
							echo '
							</select>					
						</td>
					</tr>
					<tr>
						<td>Código de Rastreio</td>
						<td><input type="text" name="rastreio" value="'.$assoc_ruido["codRastreio"].'" required></td>
					</tr>
					<tr>
						<td>Código de Rastreio</td>
						<td><input type="date" name="dataaval" value="'.$assoc_ruido["dataAvaliacao"].'" required></td>
					</tr>
					<tr>
						<td>Resultado</td>
						<td><input type="text" name="resultado" value="'.$assoc_ruido["concentracao"].'" required></td>
					</tr>
					<tr>
						<td>Dose Projetada</td>
						<td><input type="text" name="dose" value="'.$assoc_ruido["doseProjetada"].'" required></td>
					</tr>
					<tr>
						<td>NeN</td>
						<td><input type="text" name="nen" value="'.$assoc_ruido["nen"].'" required></td>
					</tr>
					<tr>
						<td>Observação</td>
						<td><input type="text" name="obs" required value="'.$assoc_ruido["obs"].'"></td>
					</tr>
					<tr>
					<td>GFIP</td>
					<td><select id="" class="" name="gfip" required>';
								if($assoc_quim["GFIP"] == 0){
									echo'<option id="" class="" value="0" selected>00 - N�0�0o Exposto a agente nocivo</option>
									<option id="" class="" value="1">01 - N�0�0o Exposi�0�4�0�0o a agente nocivo.Trabalhador j�� esteve exposto</option>
									<option id="" class="" value="2">02 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
									<option id="" class="" value="3">03 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
									<option id="" class="" value="4">04 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>
									<option id="" class="" value="5">05 - N�0�0o Exposto a agente nocivo</option>
									<option id="" class="" value="6">06 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
									<option id="" class="" value="7">07 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
									<option id="" class="" value="8">08 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>';
								}else{
									if($assoc_quim["GFIP"] == 1){
										echo'<option id="" class="" value="0">00 - N�0�0o Exposto a agente nocivo</option>
										<option id="" class="" value="1" selected>01 - N�0�0o Exposi�0�4�0�0o a agente nocivo.Trabalhador j�� esteve exposto</option>
										<option id="" class="" value="2">02 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
										<option id="" class="" value="3">03 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
										<option id="" class="" value="4">04 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>
										<option id="" class="" value="5">05 - N�0�0o Exposto a agente nocivo</option>
										<option id="" class="" value="6">06 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
										<option id="" class="" value="7">07 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
										<option id="" class="" value="8">08 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>';
									}else{
										if($assoc_quim["GFIP"] == 2){
											echo'<option id="" class="" value="0">00 - N�0�0o Exposto a agente nocivo</option>
											<option id="" class="" value="1">01 - N�0�0o Exposi�0�4�0�0o a agente nocivo.Trabalhador j�� esteve exposto</option>
											<option id="" class="" value="2" selected>02 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
											<option id="" class="" value="3">03 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
											<option id="" class="" value="4">04 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>
											<option id="" class="" value="5">05 - N�0�0o Exposto a agente nocivo</option>
											<option id="" class="" value="6">06 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
											<option id="" class="" value="7">07 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
											<option id="" class="" value="8">08 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>';
										}else{
											if($assoc_quim["GFIP"] == 3){
												echo'<option id="" class="" value="0">00 - N�0�0o Exposto a agente nocivo</option>
													<option id="" class="" value="1">01 - N�0�0o Exposi�0�4�0�0o a agente nocivo.Trabalhador j�� esteve exposto</option>
													<option id="" class="" value="2">02 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
													<option id="" class="" value="3" selected>03 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
													<option id="" class="" value="4">04 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>
													<option id="" class="" value="5">05 - N�0�0o Exposto a agente nocivo</option>
													<option id="" class="" value="6">06 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
													<option id="" class="" value="7">07 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
													<option id="" class="" value="8">08 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>';
											}else{
												if($assoc_quim["GFIP"] == 4){
													echo'<option id="" class="" value="0">00 - N�0�0o Exposto a agente nocivo</option>
														<option id="" class="" value="1">01 - N�0�0o Exposi�0�4�0�0o a agente nocivo.Trabalhador j�� esteve exposto</option>
														<option id="" class="" value="2">02 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
														<option id="" class="" value="3">03 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
														<option id="" class="" value="4" selected>04 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>
														<option id="" class="" value="5">05 - N�0�0o Exposto a agente nocivo</option>
														<option id="" class="" value="6">06 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
														<option id="" class="" value="7">07 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
														<option id="" class="" value="8">08 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>';
												}else{
													if($assoc_quim["GFIP"] == 5){
														echo'<option id="" class="" value="0">00 - N�0�0o Exposto a agente nocivo</option>
															<option id="" class="" value="1">01 - N�0�0o Exposi�0�4�0�0o a agente nocivo.Trabalhador j�� esteve exposto</option>
															<option id="" class="" value="2">02 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
															<option id="" class="" value="3">03 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
															<option id="" class="" value="4">04 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>
															<option id="" class="" value="5" selected>05 - N�0�0o Exposto a agente nocivo</option>
															<option id="" class="" value="6">06 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
															<option id="" class="" value="7">07 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
															<option id="" class="" value="8">08 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>';
													}else{
														if($assoc_quim["GFIP"] == 6){
															echo'<option id="" class="" value="0">00 - N�0�0o Exposto a agente nocivo</option>
																<option id="" class="" value="1">01 - N�0�0o Exposi�0�4�0�0o a agente nocivo.Trabalhador j�� esteve exposto</option>
																<option id="" class="" value="2">02 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
																<option id="" class="" value="3">03 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
																<option id="" class="" value="4">04 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>
																<option id="" class="" value="5">05 - N�0�0o Exposto a agente nocivo</option>
																<option id="" class="" value="6" selected>06 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
																<option id="" class="" value="7">07 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
																<option id="" class="" value="8">08 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>';
														}else{
															if($assoc_quim["GFIP"] == 7){
																echo'<option id="" class="" value="0">00 - N�0�0o Exposto a agente nocivo</option>
																	<option id="" class="" value="1">01 - N�0�0o Exposi�0�4�0�0o a agente nocivo.Trabalhador j�� esteve exposto</option>
																	<option id="" class="" value="2">02 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
																	<option id="" class="" value="3">03 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
																	<option id="" class="" value="4">04 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>
																	<option id="" class="" value="5">05 - N�0�0o Exposto a agente nocivo</option>
																	<option id="" class="" value="6">06 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
																	<option id="" class="" value="7" selected>07 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
																	<option id="" class="" value="8">08 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>';
															}else{
																echo'<option id="" class="" value="0">00 - N�0�0o Exposto a agente nocivo</option>
																	<option id="" class="" value="1">01 - N�0�0o Exposi�0�4�0�0o a agente nocivo.Trabalhador j�� esteve exposto</option>
																	<option id="" class="" value="2">02 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
																	<option id="" class="" value="3">03 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
																	<option id="" class="" value="4">04 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>
																	<option id="" class="" value="5">05 - N�0�0o Exposto a agente nocivo</option>
																	<option id="" class="" value="6">06 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
																	<option id="" class="" value="7">07 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
																	<option id="" class="" value="8" selected>08 - Exposi�0�4�0�0o a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>';
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
						<td><input type="submit" id="" class="" name="" value="Confirmar Cadastro"></td>
						<td><input type="reset" id="" class="" name="" value="Recomeçar Campos"></td>
					</tr>';
				}?>
				
			</tbody>
		</table>
	</form>
</body>