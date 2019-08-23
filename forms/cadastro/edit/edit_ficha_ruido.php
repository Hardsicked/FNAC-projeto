<?php 
	require "../../../php/connect.php";
	$ficha = $_GET['c'];
	$sql_ficha_ghe = "SELECT * FROM tbficha_ghe WHERE cdFicha = ".$ficha;
	$qry_ficha_ghe = mysqli_query($link,$sql_ficha_ghe);
	$sql_ficha = "SELECT * FROM tbficha_ruido WHERE cdFicha = ".$ficha;
	$qry_ficha = mysqli_query($link,$sql_ficha);
	$sql_epi = "SELECT * FROM tbepi WHERE tipoEPI = 5";
	$qry_epi = mysqli_query($link,$sql_epi);
	$sql_inst = "SELECT * FROM tbequipamento WHERE tipoEquipamento = 0";
	$qry_inst = mysqli_query($link,$sql_inst);
	$sql_calb = "SELECT * FROM tbequipamento WHERE tipoEquipamento = 1";
	$qry_calb = mysqli_query($link,$sql_calb);
	foreach($qry_ficha_ghe as $fichaghe){
		$cdghe = $fichaghe['cdGHE'];
	}
	$sql_ghe = "SELECT * FROM tbghe WHERE cdGHE = ".$cdghe;
	$qry_ghe = mysqli_query($link,$sql_ghe);
	foreach($qry_ghe as $ghe){
		$contrato = $ghe['cdContrato'];
	}
	$sql_info_ghe = "SELECT * FROM tbghe WHERE cdContrato = ".$contrato;
	$qry_info_ghe = mysqli_query($link,$sql_info_ghe);
	foreach($qry_ficha as $ficha){
		$data = $ficha['dataAval'];
		$cdEpi = $ficha['cdEpi'];
		$cdinst = $ficha['cdInstrumento'];
		$cdcalib = $ficha['cdCalibrador'];
		$hrinicial = $ficha['hrInicio'];
		$hrfinal = $ficha['hrFinal'];
		$intinicial = $ficha['intervaloInicial'];
		$intfinal = $ficha['intervaloFinal'];
		$diatipico = $ficha['diaTipico'];
		$colab = $ficha['colaborador'];
		$colabm = $ficha['colaborador_ma'];
		$superv = $ficha['supervisor'];
		$supervm = $ficha['supervisor_ma'];
		$aval = $ficha['avaliador'];
		$avalm = $ficha['avaliador_ma'];
		$amostraval = $ficha['amostraValida'];
		$justificativa = $ficha['justificativa'];
		$folder = $ficha['pasta'];
	}

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
		<script src="../../js/bootstrap.min.js"></script>

		<!-- Plugin JavaScript -->
		<!--<script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

		<!-- Custom JavaScript for this theme -->
		<script src="../../../js/scrolling-nav.js"></script>
		<script src="../../../js/jquery.fancybox.min.js"></script>
		<script>
			$(document).ready(function(){
				$('.amostravalida').change(function(){
				    if ($('#amostravalida').is(':checked') == true){
				        $('#just'.val('Não há justificativa').prop('disabled', true);
				        console.log('checked');
				    } else {
				        $('#just').val('').prop('disabled', false);
				        console.log('unchecked');
				    }
				});
			});
		</script>
</head>
<body>
	<form id="" class="" action="/fnac/forms/cadastro/post/form_editFichaRuido.php" method="POST" enctype="multipart/form-data">
		<table class="table table-sm table-light">
			<thead class="thead-light">
				<tr>
					<th colspan="2" class="text-center">Nova Ficha Ruído</th>
					<input name="cdficha" type="text" value="<?php echo $ficha; ?>" hidden/>
					<input name="folder" type="text" value="<?php echo $folder; ?>" hidden/>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Codígo da GHE</td>
					<td>
						<?php
							if($qry_info_ghe->num_rows > 0){
								echo '<select id="" class="" name="ghe" required>';
								while($assoc_ghe = mysqli_fetch_assoc($qry_info_ghe)){
									if($cdghe = $assoc_ghe["cdGHE"]){
										echo '<option id="" class="" value="'.$assoc_ghe["cdGHE"].'" selected>'.$assoc_ghe["codGHE"].'</option>';
									}else{
										echo '<option id="" class="" value="'.$assoc_ghe["cdGHE"].'">'.$assoc_ghe["codGHE"].'</option>';
									}
								}
							}else{
								echo '
									<select id="" class="" name="ghe">
										<option id="" class="">Nenhum Cargo cadastrado</option>
									';
							}
						?>
						</select>					
					</td>
				</tr>
				<tr>
					<td><h5>Primeira Imagem</h5></td>
					<td><b><input type="file" name="img1"></b></td>
				</tr>
				<tr>
					<td><h5>Segunda Imagem</h5></td>
					<td><b><input type="file" name="img2"></b></td>
				</tr>
				<tr>
					<td><h5>Arquivo PDF a ser anexado</h5></td>
					<td><b><input type="file" name="fileUpload"></b></td>
				</tr>
				<tr>
					<td>Data</td>
					<td><input type="date" name="dataaval" value="<?php echo $data; ?>"></td>
				</tr>
				<tr>
					<td>EPI</td>
					<td><select name="epi">
								<?php 
									while($assoc_epi = mysqli_fetch_assoc($qry_epi)){
										$tipoepi = "Protetor Auricular";
										if($cdEpi = $assoc_epi["cdEPI"]){
											echo'<option value="'.$assoc_epi["cdEPI"].'" selected>'.$tipoepi.' - '.$assoc_epi["fabricante"].' - '.$assoc_epi["modelo"].' - '.$assoc_epi["ca"].'</option>';
										}else{
											echo'<option value="'.$assoc_epi["cdEPI"].'">'.$tipoepi.' - '.$assoc_epi["fabricante"].' - '.$assoc_epi["modelo"].' - '.$assoc_epi["ca"].'</option>';
										}
									}
								?>
					</select></td>
				</tr>
				<tr>
					<td>Instrumento</td>
					<td><table id="userTbl" class="table table-sm table-light table-stripped table-responsive">
								<thead>
									<tr>
										<th class="text-center">Selecionar</th>
										<th class="text-center">Nome do Instrumento</th>
										<th class="text-center">Número</th>
										<th class="text-center">Número de Série</th>
										<th class="text-center">Certificado de Calibração</th>
										<th class="text-center">dataValidade</th>
									</tr>
								</thead>
								<tbody>
								<?php 
									while($assoc_inst = mysqli_fetch_assoc($qry_inst)){
										if($cdinst = $assoc_inst["cdEquipamento"]){
											echo'
												<tr>
													<td class="text-center"><input type="radio" name="inst" value="'.$assoc_inst["cdEquipamento"].'" checked></td>
													<td class="text-center">'.$assoc_inst["nome"].'</td>
													<td class="text-center">'.$assoc_inst["numero"].'</td>
													<td class="text-center">'.$assoc_inst["numeroSerie"].'</td>
													<td class="text-center">'.$assoc_inst["certCalibracao"].'</td>
													<td class="text-center">'.$assoc_inst["dataValidade"].'</td>
												</tr>
											';
										}else{
											echo'
											<tr>
												<td class="text-center"><input type="radio" name="inst" value="'.$assoc_inst["cdEquipamento"].'"></td>
												<td class="text-center">'.$assoc_inst["nome"].'</td>
												<td class="text-center">'.$assoc_inst["numero"].'</td>
												<td class="text-center">'.$assoc_inst["numeroSerie"].'</td>
												<td class="text-center">'.$assoc_inst["certCalibracao"].'</td>
												<td class="text-center">'.$assoc_inst["dataValidade"].'</td>
											</tr>
										';
										}
									}
								?>
								</tbody>
							</table>
						</td>
				</tr>
				<tr>
					<td>Calibrador</td>
					<td><table id="userTbl" class="table table-sm table-light table-stripped table-responsive">
								<thead>
									<tr>
										<th class="text-center">Selecionar</th>
										<th class="text-center">Nome do Calibrador</th>
										<th class="text-center">Número</th>
										<th class="text-center">Número de Série</th>
										<th class="text-center">Certificado de Calibração</th>
										<th class="text-center">dataValidade</th>
									</tr>
								</thead>
								<tbody>
								<?php 
									while($assoc_calb = mysqli_fetch_assoc($qry_calb)){
										if($cdcalib = $assoc_calb["cdEquipamento"]){
											echo'
												<tr>
													<td class="text-center"><input type="radio" name="calib" value="'.$assoc_calb["cdEquipamento"].'" checked></td>
													<td class="text-center">'.$assoc_calb["nome"].'</td>
													<td class="text-center">'.$assoc_calb["numero"].'</td>
													<td class="text-center">'.$assoc_calb["numeroSerie"].'</td>
													<td class="text-center">'.$assoc_calb["certCalibracao"].'</td>
													<td class="text-center">'.$assoc_calb["dataValidade"].'</td>
												</tr>
											';
										}else{
											echo'
											<tr>
												<td class="text-center"><input type="radio" name="calib" value="'.$assoc_calb["cdEquipamento"].'"></td>
												<td class="text-center">'.$assoc_calb["nome"].'</td>
												<td class="text-center">'.$assoc_calb["numero"].'</td>
												<td class="text-center">'.$assoc_calb["numeroSerie"].'</td>
												<td class="text-center">'.$assoc_calb["certCalibracao"].'</td>
												<td class="text-center">'.$assoc_calb["dataValidade"].'</td>
											</tr>
										';
										}
									}
								?>
								</tbody>
							</table>
						</td>
				</tr>
				<tr>
					<td>Hora Inicial</td>
					<td><input type="time" name="hrinicial" required value="<?php echo $hrinicial;?>"></td>
				</tr>
				<tr>
					<td>Intervalo Inicio</td>
					<td><input type="time" name="intinic" required value="<?php echo $intinicial;?>"></td>
				</tr>
				<tr>
					<td>Intervalo Final</td>
					<td><input type="time" name="intfinal" required value="<?php echo $intfinal;?>"></td>
				</tr>
				<tr>
					<td>Hora Final</td>
					<td><input type="time" name="hrfinal" required value="<?php echo $hrfinal;?>"></td>
				</tr>
				<tr>
					<td>Dia Típico?</td>
					<td><?php
						if($diatipico = 1){
							echo'<input type="radio" name="diaTipico" required value="0">Não
							<input type="radio" name="diaTipico" required value="1" checked>Sim';
						}else{
							echo'<input type="radio" name="diaTipico" required value="0" checked>Não
							<input type="radio" name="diaTipico" required value="1">Sim';
						}?>
					</td>
				</tr>
				<tr>
					<td>Colaborador</td>
					<td><input type="text" name="colab" required value="<?php echo $colab; ?>"> Matricula: <input type="text" name="colabm" required value="<?php echo $colabm; ?>"></td>
				</tr>
				<tr>
					<td>Supervisor</td>
					<td><input type="text" name="superv" required value="<?php echo $superv; ?>"> Matricula: <input type="text" name="supervm" required value="<?php echo $supervm; ?>"></td>
				</tr>
				<tr>
					<td>Avaliador</td>
					<td><input type="text" name="avali" required value="<?php echo $aval; ?>"> Matricula: <input type="text" name="avalim" required value="<?php echo $avalm; ?>"></td>
				</tr>	
				<tr>
					<td>Amostra Válida</td>
					<td><?php
						if($amostraval = 1){
							echo'<input type="radio" name="amostraValida" class="amostravalida" required value="0" id="amostravalida">Não
							<input type="radio" class="amostravalida" name="amostraValida" required value="1" checked>Sim';
						}else{
							echo'<input type="radio" name="amostraValida" class="amostravalida" required value="0" id="amostravalida" checked>Não
							<input type="radio" class="amostravalida" name="amostraValida" required value="1">Sim';
						}?>
					</td>
				</tr>
				<tr>
					<td>Justificativa</td>
					<td><textarea name="justificativa" id="just" required rows="2" col="40"><?php echo $justificativa; ?></textarea></td>
				</tr>	
				<tr>
					<td><input type="submit" id="" class="" name="" value="Confirmar Cadastro"></td>
					<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
				</tr>
			</tbody>
		</table>
	</form>
</body>
				