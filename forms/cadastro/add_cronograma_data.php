<?php
	require "../../php/connect.php";
	$contrato = $_GET['c'];
	$header_sql = "SELECT * FROM tbcontrato_cronograma WHERE cdContrato = ".$contrato." ORDER BY cdCronogramah ASC";
	$header_qry = mysqli_query($link,$header_sql);
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
			function fechar() {
				window.close();
			}
		</script>
</head>
<body>
	<form id="" class="" action="/fnac/forms/cadastro/post/form_cadCronogramadata.php" method="POST">
		<table class="table table-sm table-light">
			<thead class="thead-light">
				<tr>
					<th colspan="2" class="text-center">Novos Dados do Cronograma</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><input type="text" name="cdContrato" value="<?php echo $contrato; ?>" hidden></input>
						Tarefa</td>
					<td><input type="text" name="tarefa" required></input></td>
				</tr>
				<?php if($header_qry->num_rows > 0){
					foreach($header_qry as $h){
						$mes1 = $h["mes1"];
						$mes2 = $h["mes2"];
						$mes3 = $h["mes3"];
						$mes4 = $h["mes4"];
						$mes5 = $h["mes5"];
						$mes6 = $h["mes6"];
						$mes7 = $h["mes7"];
						$mes8 = $h["mes8"];
						$mes9 = $h["mes9"];
						$mes10 = $h["mes10"];
						$mes11 = $h["mes11"];
						$mes12 = $h["mes12"];
					}
					echo'<tr>
						<td>'.$mes1.'</td>
						<td><input type="radio" name="mes1" value="1" required>*<input type="radio" name="mes1" value="2">**<input type="radio" name="mes1" value="3">***</radio><input type="radio" name="mes1" value="0" required selected>Não Marcar</radio></td>
					</tr>
					<tr>
						<td>'.$mes2.'</td>
						<td><input type="radio" name="mes2" value="1" required>*<input type="radio" name="mes2" value="2">**<input type="radio" name="mes2" value="3">***</radio><input type="radio" name="mes2" value="0" required selected>Não Marcar</radio></td>
					</tr>
					<tr>
						<td>'.$mes3.'</td>
						<td><input type="radio" name="mes3" value="1" required>*<input type="radio" name="mes3" value="2">**<input type="radio" name="mes3" value="3">***</radio><input type="radio" name="mes3" value="0" required selected>Não Marcar</radio></td>
					</tr>
					<tr>
						<td>'.$mes4.'</td>
						<td><input type="radio" name="mes4" value="1" required>*<input type="radio" name="mes4" value="2">**<input type="radio" name="mes4" value="3">***</radio><input type="radio" name="mes4" value="0" required selected>Não Marcar</radio></td>
					</tr>
					<tr>
						<td>'.$mes5.'</td>
						<td><input type="radio" name="mes5" value="1" required>*<input type="radio" name="mes5" value="2">**<input type="radio" name="mes5" value="3">***</radio><input type="radio" name="mes5" value="0" required selected>Não Marcar</radio></td>
					</tr>
					<tr>
						<td>'.$mes6.'</td>
						<td><input type="radio" name="mes6" value="1" required>*<input type="radio" name="mes6" value="2">**<input type="radio" name="mes6" value="3">***</radio><input type="radio" name="mes6" value="0" required selected>Não Marcar</radio></td>
					</tr>
					<tr>
						<td>'.$mes7.'</td>
						<td><input type="radio" name="mes7" value="1" required>*<input type="radio" name="mes7" value="2">**<input type="radio" name="mes7" value="3">***</radio><input type="radio" name="mes7" value="0" required selected>Não Marcar</radio></td>
					</tr>
					<tr>
						<td>'.$mes8.'</td>
						<td><input type="radio" name="mes8" value="1" required>*<input type="radio" name="mes8" value="2">**<input type="radio" name="mes8" value="3">***</radio><input type="radio" name="mes8" value="0" required selected>Não Marcar</radio></td>
					</tr>
					<tr>
						<td>'.$mes9.'</td>
						<td><input type="radio" name="mes9" value="1" required>*<input type="radio" name="mes9" value="2">**<input type="radio" name="mes9" value="3">***</radio><input type="radio" name="mes9" value="0" required selected>Não Marcar</radio></td>
					</tr>
					<tr>
						<td>'.$mes10.'</td>
						<td><input type="radio" name="mes10" value="1" required>*<input type="radio" name="mes10" value="2">**<input type="radio" name="mes10" value="3">***</radio><input type="radio" name="mes10" value="0" required selected>Não Marcar</radio></td>
					</tr>
					<tr>
						<td>'.$mes11.'</td>
						<td><input type="radio" name="mes11" value="1" required>*<input type="radio" name="mes11" value="2">**<input type="radio" name="mes11" value="3">***</radio><input type="radio" name="mes11" value="0" required selected>Não Marcar</radio></td>
					</tr>
					<tr>
						<td>'.$mes12.'</td>
						<td><input type="radio" name="mes12" value="1" required>*<input type="radio" name="mes12" value="2">**<input type="radio" name="mes12" value="3">***</radio><input type="radio" name="mes12" value="0" required selected>Não Marcar</radio></td>
					</tr>
					<tr>
					<td><input type="submit" id="" class="" name="" value="Confirmar Cadastro">';
				}else{
					echo'<tr>
						<td>Não há Informações de cabeçalho inseridas!</td>
						<td></td>
						</tr>
					<tr><td><input type="submit" id="" class="" name="" value="Confirmar Cadastro" disabled>';
				}?>
						<button type="button" onclick="fechar()">Finalizar Cadastros</button></td>
					</td>
					<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
				</tr>
			</tbody>
		</table>
	</form>
</body>
