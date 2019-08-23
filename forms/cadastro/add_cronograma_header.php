<?php
	require "../../php/connect.php";
	$contrato = $_GET['c'];
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
	<form id="" class="" action="/fnac/forms/cadastro/post/form_cadCronogramaheader.php" method="POST">
		<table class="table table-sm table-light">
			<thead class="thead-light">
				<tr>
					<th colspan="2" class="text-center">Novo Cabeçalho do Cronograma</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Contrato</td>
					<td><input type="text" name="cdContrato" value="<?php echo $contrato; ?>" readonly></td>
				</tr>
				<tr>
					<td>Qual o mês do campo 1?</td>
					<td><input type="text" name="mes1" required></input></td>
				</tr>
				<tr>
					<td>Qual o mês do campo 2?</td>
					<td><input type="text" name="mes2" required></input></td>
				</tr>
				<tr>
					<td>Qual o mês do campo 3?</td>
					<td><input type="text" name="mes3" required></input></td>
				</tr>
				<tr>
					<td>Qual o mês do campo 4?</td>
					<td><input type="text" name="mes4" required></input></td>
				</tr>
				<tr>
					<td>Qual o mês do campo 5?</td>
					<td><input type="text" name="mes5" required></input></td>
				</tr>
				<tr>
					<td>Qual o mês do campo 6?</td>
					<td><input type="text" name="mes6" required></input></td>
				</tr>
				<tr>
					<td>Qual o mês do campo 7?</td>
					<td><input type="text" name="mes7" required></input></td>
				</tr>
				<tr>
					<td>Qual o mês do campo 8?</td>
					<td><input type="text" name="mes8" required></input></td>
				</tr>
				<tr>
					<td>Qual o mês do campo 9?</td>
					<td><input type="text" name="mes9" required></input></td>
				</tr>
				<tr>
					<td>Qual o mês do campo 10?</td>
					<td><input type="text" name="mes10" required></input></td>
				</tr>
				<tr>
					<td>Qual o mês do campo 11?</td>
					<td><input type="text" name="mes11" required></input></td>
				</tr>
				<tr>
					<td>Qual o mês do campo 12?</td>
					<td><input type="text" name="mes12" required></input></td>
				</tr>
				<tr>
					<td>Observação</td>
					<td><input type="text" name="obs" required></input></td>
				</tr>
				<tr>
					<td><input type="submit" id="" class="" name="" value="Confirmar Cadastro"></td>
					<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
				</tr>
			</tbody>
		</table>
	</form>
</body>
