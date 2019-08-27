<?php 
	require "../../php/connect.php";
	$contrato = $_GET['c'];
	$sql_info_ghe = "SELECT * FROM tbghe WHERE cdContrato = ".$contrato;
	$qry_info_ghe = mysqli_query($link,$sql_info_ghe);
	$sql_epi = "SELECT * FROM tbepi";
	$qry_epi = mysqli_query($link,$sql_epi);
	$sql_inst = "SELECT * FROM tbequipamento WHERE tipoEquipamento = 0";
	$qry_inst = mysqli_query($link,$sql_inst);
	$sql_calb = "SELECT * FROM tbequipamento WHERE tipoEquipamento = 1";
	$qry_calb = mysqli_query($link,$sql_calb);;

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
			
		</script>
</head>
<body>
	<form id="" class="" action="/fnac/forms/cadastro/post/form_cadFichaCalor.php" method="POST" enctype="multipart/form-data">
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
										<option id="" class="">Nenhum GHE cadastrado</option>
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
					<td><input type="date" name="dataaval"></td>
				</tr>
				<tr>
					<td>Tipo de Medida de Controle</td>
					<td>
						<select name="tipomed" required>
							<option value="" disabled selected>Selecione</option>
							<option value="1">Individual</option>
							<option value="2">Coletiva</option>
							<option value="0">Não Identificada</option>
						</select>
				</tr>
				<tr>
					<td>Descrição da Medida de Controle</td>
					<td><input type="text" name="descmed" required></td>
				</tr>
				<tr>
					<td>Colaborador</td>
					<td><input type="text" name="colab" required> Matricula: <input type="text" name="colabm" required</td>
				</tr>
				<tr>
					<td>Supervisor</td>
					<td><input type="text" name="superv" required> Matricula: <input type="text" name="supervm" required</td>
				</tr>
				<tr>
					<td>Avaliador</td>
					<td><input type="text" name="avali" required> Matricula: <input type="text" name="avalim" required</td>
				</tr>		
				<tr>
					<td><input type="submit" id="" class="" name="" value="Confirmar Cadastro"></td>
					<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
				</tr>
			</tbody>
		</table>
	</form>
</body>
				