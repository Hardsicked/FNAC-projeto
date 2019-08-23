<?php 
	require "../../php/connect.php";
	$contrato = $_GET['c'];
	$sql_info_ghe = "SELECT * FROM tbghe WHERE cdContrato = ".$contrato;
	$qry_info_ghe = mysqli_query($link,$sql_info_ghe);
	$sql_epi = "SELECT * FROM tbepi WHERE tipoEPI = 5";
	$qry_epi = mysqli_query($link,$sql_epi);
	$sql_inst = "SELECT * FROM tbequipamento WHERE tipoEquipamento = 0";
	$qry_inst = mysqli_query($link,$sql_inst);
	$sql_calb = "SELECT * FROM tbequipamento WHERE tipoEquipamento = 1";
	$qry_calb = mysqli_query($link,$sql_calb);

?>
<head>
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
		<link rel="stylesheet" href="../../css/fnac.css">
		
		<!-- Custom styles for this template -->
		<link href="../../css/scrolling-nav.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../../css/jquery.fancybox.min.css">
		<!-- Bootstrap core JavaScript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="../../js/bootstrap.min.js"></script>

		<!-- Plugin JavaScript -->
		<!--<script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

		<!-- Custom JavaScript for this theme -->
		<script src="../../js/scrolling-nav.js"></script>
		<script src="../../js/jquery.fancybox.min.js"></script>
		<script>
			$(document).ready(function(){
				$('#amostravalida').change(function(){
				    if ($('#amostravalida').prop(':checked')){
				       $('#just').val('').prop('disabled', false);
				       $('#just').val('').prop('required', true);
				        console.log('checked');
				    } else {
				        $('#just').val('Não há justificativa').prop('disabled', true);
				        $('#just').val('').prop('required', false);
				        console.log('unchecked');
				    }
				});
			});
		</script>
</head>
<body>
	<form id="" class="" action="/fnac/forms/cadastro/post/form_cadFichaRuido.php" method="POST" enctype="multipart/form-data">
		<table class="table table-sm table-light">
			<thead class="thead-light">
				<tr>
					<th colspan="2" class="text-center">Nova Ficha Ruído</th>
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
									echo '<option id="" class="" value="'.$assoc_ghe["cdGHE"].'">'.$assoc_ghe["codGHE"].'</option>';
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
					<td><b><input type="file" name="img1" required></b></td>
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
					<td><input type="date" name="dataaval"></td>
				</tr>
				<tr>
					<td>EPI</td>
					<td><select name="epi">
								<?php 
									while($assoc_epi = mysqli_fetch_assoc($qry_epi)){
										$tipoepi = "Protetor Auricular";
										echo'<option value="'.$assoc_epi["cdEPI"].'">'.$tipoepi.' - '.$assoc_epi["fabricante"].' - '.$assoc_epi["modelo"].' - '.$assoc_epi["ca"].'</option>';
									}
								?>
					</select></td>
				</tr>
				<tr>
					<td>EPC</td>
					<td><input size="100" type="text" name="EPC" required></td>
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
								?>
								</tbody>
							</table>
						</td>
				</tr>
				<tr>
					<td>Hora Inicial</td>
					<td><input type="time" name="hrinicial" required></td>
				</tr>
				<tr>
					<td>Intervalo Inicio</td>
					<td><input type="time" name="intinic" required></td>
				</tr>
				<tr>
					<td>Intervalo Final</td>
					<td><input type="time" name="intfinal" required></td>
				</tr>
				<tr>
					<td>Hora Final</td>
					<td><input type="time" name="hrfinal" required></td>
				</tr>
				<tr>
					<td>Dia Típico?</td>
					<td><input type="radio" name="diaTipico" required value="0" checked>Não<input type="radio" name="diaTipico" required value="1">Sim</td>
				</tr>
				<tr>
					<td>Colaborador</td>
					<td><input type="text" name="colab" required> Matricula: <input type="text" name="colabm" required></td>
				</tr>
				<tr>
					<td>Supervisor</td>
					<td><input type="text" name="superv" required> Matricula: <input type="text" name="supervm" required></td>
				</tr>
				<tr>
					<td>Avaliador</td>
					<td><input type="text" name="avali" required> Matricula: <input type="text" name="avalim" required></td>
				</tr>	
				<tr>
					<td>Amostra Válida</td>
					<td><input type="radio" class="amostravalida" name="amostraValida" required value="0" id="amostravalida" checked>Não<input type="radio" class="amostravalida" name="amostraValida"  required value="1">Sim</td>
				</tr>
				<tr>
					<td>Justificativa</td>
					<td><textarea name="justificativa" id="just" required rows="2" col="40"></textarea></td>
				</tr>	
				<tr>
					<td><input type="submit" id="" class="" name="" value="Confirmar Cadastro"></td>
					<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
				</tr>
			</tbody>
		</table>
	</form>
</body>
				