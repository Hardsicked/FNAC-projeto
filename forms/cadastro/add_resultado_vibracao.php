<?php 
	require "../../php/connect.php";
	$contrato = $_GET['c'];
	$ghecod = $_POST['ghe'];
	$sql_risco = "SELECT * FROM tbrisco WHERE cdGHE = ".$ghecod." AND tipoRisco = 3";
	$qry_risco = mysqli_query($link,$sql_risco);
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
</head>
<body>
	<form id="" class="" action="/fnac/forms/cadastro/post/form_cadResultadovibracao.php" method="POST">
		<table class="table table-sm table-light">
			<thead class="thead-light">
				<tr>
					<th colspan="2" class="text-center">Novo Resultado Vibração</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Selecionar Risco</td>
					<td><select name="risco" required>
						<option selected>Nenhum Risco Selecionado</option>
						<?php 
						if($qry_risco->num_rows == 0){
							echo "<option>Nenhum Risco de Vibração Cadastrado</option>";
						}else{
							foreach($qry_risco as $risco){
								$sql_agente = "SELECT * FROM tbagente WHERE cdAgente = ".$risco['cdAgente'];
								$agente = mysqli_query($link,$sql_agente);
								foreach($agente as $agente){
									echo "<option value='".$risco['cdrisco']."'>".$risco['cdrisco']." - ".$agente['nomeAgente']."</option>";
								}
							}
						}
						  ?>
				</tr>
				<tr>
					<input type="text" name="ghe" value="<?php echo $ghecod ;?>" hidden>
					<td>Tipo de Vibração</td>
					<td><select name="tipo" required>
						<option selected>Selecione o tipo de Vibração</option>
						<option value="0">VCI - Vibração de Corpo Inteiro</option>
						<option value="1">VMB - Vibração de Mãos e Braços</option>
					</select></td>
				</tr>
				<tr>
					<td>Código de Rastreio</td>
					<td><input type="text" name="rastreio" required></td>
				</tr>
				<tr>
					<td>Data de Avaliação</td>
					<td><input type="date" name="dataaval" required></td>
				</tr>
				<tr>
					<td>Tempo Efetivo de Exposição</td>
					<td><input type="text" name="tempoefetivo" required></td>
				</tr>
				<tr>
					<td>Equipamento</td>
					<td><input type="text" name="equipamento" required></td>
				</tr>
				<tr>
					<td>Aren m/s2</td>
					<td><input type="text" name="area" required></td>
				</tr>
				<tr>
					<td>VDVR ms 1.75</td>
					<td><input type="text" name="vdvr" required></td>
				</tr>
				<tr>
					<td>Observação</td>
					<td><input type="text" name="obs" required></td>
				</tr>
				<tr>
					<td>GFIP</td>
					<td><select id="" class="" name="gfip" required>
							<option id="" class="" value="0">00 - Não Exposto a agente nocivo</option>
							<option id="" class="" value="1">01 - Não Exposição a agente nocivo.Trabalhador já esteve exposto</option>
							<option id="" class="" value="2">02 - Exposição a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
							<option id="" class="" value="3">03 - Exposição a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
							<option id="" class="" value="4">04 - Exposição a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>
							<option id="" class="" value="5">05 - Não Exposto a agente nocivo</option>
							<option id="" class="" value="6">06 - Exposição a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
							<option id="" class="" value="7">07 - Exposição a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
							<option id="" class="" value="8">08 - Exposição a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<?php if($qry_risco->num_rows > 0){
							echo'<input type="submit" id="" class="" name="" value="Confirmar Cadastro">';
						}else{
							echo'<input type="submit" id="" class="" name="" value="Confirmar Cadastro" disabled>';
						}?>
					</td>
					<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
				</tr>
			</tbody>
		</table>
	</form>
</body>