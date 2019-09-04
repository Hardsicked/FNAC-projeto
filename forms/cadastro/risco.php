<?php
	$cont = $_GET['c'];
	error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);
	$_SERVER['DOCUMENT_ROOT'] = dirname(__FILE__);
	header ('Content-type: text/html; charset=UTF-8');
	include "../../php/connect.php";
	$sql1 = "SELECT * FROM tbagente";
	$query1 = mysqli_query($link,$sql1);
	$sql_ghe = "SELECT * FROM tbghe WHERE cdContrato = ".$cont;
	$qry_ghe = mysqli_query($link,$sql_ghe);
	$sql_epi = "SELECT * FROM tbepi";
	$qry_epi = mysqli_query($link,$sql_epi);
?>
<head>
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="../../css/bootstrap.min.css">
		<link rel="stylesheet" href="../../css/fnac.css">
		
		<!-- Custom styles for this template -->
		<link href="../../css/scrolling-nav.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../../css/jquery.fancybox.min.css">
		<!-- Bootstrap core JavaScript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="../../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../../js/search_agente_script.js"></script>

		<!-- Plugin JavaScript -->
		<!--<script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

		<!-- Custom JavaScript for this theme -->
		<script src="../../js/scrolling-nav.js"></script>
		<script src="../../js/jquery.fancybox.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#body_novorisco").fadeout(0, function(){
					$("#body_novorisco").fadein(500);
				});
				$("#myInput").on("keyup", function() {
					var value = $(this).val().toLowerCase();
					$("#myTable tr").filter(function() {
					  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
				});
				$('.search').on('keyup',function(){
					var searchTerm = $(this).val().toLowerCase();
					$('#userTbl tbody tr').each(function(){
						var lineStr = $(this).text().toLowerCase();
						if(lineStr.indexOf(searchTerm) === -1){
							$(this).hide();
						}else{
							$(this).show();
						}
					});
				});
			});
		</script>
</head>
	<body id="body_novorisco">
		<form id="" class="" action="/fnac/forms/cadastro/post/form_cadRisco.php" method="POST">
			<table class="table table-light table-stripped table-sm">
				<thead class="thead-light">
					<tr>
						<th class="text-center" colspan="2">Novo Risco</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-center">GHE</td>
						<td class="text-center">
							<table class="table table-sm table-light table-stripped table-responsive">
								<thead>
									<tr>
										<th class="text-center">Selecionar GHE</th>
										<th class="text-center">Código do GHE</th>
										<th class="text-center">Nome do GHE</th>
										<th class="text-center">Tipo de Contrato</th>
									</tr>
								</thead>
								<tbody>
								<?php 
									while($assoc_ghe = mysqli_fetch_assoc($qry_ghe)){
										if($assoc_ghe['tipoCont'] == 1){
											$tipo = "LTCAT";
										}else{
											if($assoc_ghe['tipoCont'] == 2){
												$tipo = "PPRA Quantitativo";
											}else{
												if($assoc_ghe['tipoCont'] == 3){
													$tipo = "PPRA Inserção Direta";
												}else{
													$tipo = "PPRA Qualitativo";
												}
											}
										}
										echo'
											<tr id="Linha">
												<td class="text-center"><input type="radio" name="ghe" value="'.$assoc_ghe["cdGHE"].'" required></td>
												<td class="text-center">'.$assoc_ghe["codGHE"].'</td>
												<td class="text-center">'.$assoc_ghe["nomeGHE"].'</td>
												<td class="text-center">'.$tipo.'</td>
											</tr>';
									}
								?>
								</tbody>
							</table>
						</td>
					<tr>
					<tr>
						<td class="text-center">Nome do Agente</td>
						<td class="text-center">								
						<!-- Search box. -->
					   	Procurar: <input type="text" id="search" placeholder="Search" />
					   	<!-- Suggestions will be displayed in below div. -->
					   	<div id="display"></div>
							
						</td>
					</tr>
					<tr>
						<td class="text-center" >Tipo do Risco</td>
						<td colspan="2"><select name="tipoRisco" required>
							<option value="" selected>Selecionar</option>
							<option value="1">Ruído</option>
							<option value="2">Quimico</option>
							<option value="3">Vibração</option>
							<option value="4">Calor</option>
							<option value="5">Qualitativo</option>
							<option value="6">Biológicos</option>
						</select></td>
					</tr>
					<tr>
						<td class="text-center">Principais Fontes Geradoras:</td>
						<td class="text-center"><textarea id="" class="" name="fontes" cols="48" rows="5"></textarea></td>
					</tr>
					<tr>
						<td class="text-center">Medidas de Controle Existente</td>
						<td class="text-center"><textarea id="" class="" name="controle" cols="48" rows="5"></textarea></td>
					</tr>
					<tr>
						<td class="text-center">Caracterização de Exposição</td>
						<td class="text-center">
							<select name="expo">
								<option value="1">Eventual</option>
								<option value="2">Intermitente</option>
								<option value="3">Habitual Pemanente</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="text-center">EPI</td>
						<td class="text-center">								
							<input type="text" class="search" placeholder="Agente">
							<table id="userTbl" class="table table-sm table-light table-stripped table-responsive">
								<thead>
									<tr>
										<th class="text-center">Selecionar EPI</th>
										<th class="text-center">Tipo EPI</th>
										<th class="text-center">Fabricante</th>
										<th class="text-center">Modelo</th>
										<th class="text-center">CA</th>
									</tr>
								</thead>
								<tbody>
								<?php 
									while($assoc_epi = mysqli_fetch_assoc($qry_epi)){
										if($assoc_epi["tipoEPI"] == 1){
											$tipoepi = "Capacete";
										}else{
											if($assoc_epi["tipoEPI"] == 2){
												$tipoepi = "Bota";
											}else{
												if($assoc_epi["tipoEPI"] == 3){
													$tipoepi = "Luva";
												}else{
													if($assoc_epi["tipoEPI"] == 4){
														$tipoepi = "Protetor Respiratório";
													}else{
														if($assoc_epi["tipoEPI"] == 5){
															$tipoepi = "Protetor Auricular";
														}else{
															if($assoc_epi["tipoEPI"] == 6){
																$tipoepi = "Óculos";
															}else{
																if($assoc_epi["tipoEPI"] == 7){
																	$tipoepi = "Cinto de Segurança";
																}else{
																	$tipoepi = "Vestimentas";
																}
															}
														}
													}
												}
											}
										}
										echo'
											<tr>
												<td class="text-center"><input type="radio" name="epi" value="'.$assoc_epi["cdEPI"].'"></td>
												<td class="text-center">'.$tipo_epi.'</td>
												<td class="text-center">'.$assoc_epi["fabricante"].'</td>
												<td class="text-center">'.$assoc_epi["modelo"].'</td>
												<td class="text-center">'.$assoc_epi["ca"].'</td>
											</tr>
										';
									}
								?>
								</tbody>
							</table>
						</td>
					</tr>
					<tr>
						<td class="text-center"><input type="submit" id="" class="" name="" value="Confirmar Cadastro"></td>
						<td class="text-center"><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
					</tr>
				</tbody>
			</table>
		</form>
	</body>
</html>