<?php 
	require "../../php/connect.php";
	$ficha = $_GET['c'];
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
	<form id="" class="" action="/fnac/forms/cadastro/post/form_cadFichaQuimicoInfo.php" method="POST">
		<input type="text" value="<?php echo $ficha; ?>" name="ficha">
		<table class="table table-sm table-light">
			<thead class="thead-light">
				<tr>
					<th colspan="2" class="text-center">Novo Resultado Ficha</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Descrição da atividade</td>
					<td><input type="text" name="descativ"></td>
				</tr>
				<tr>
					<td>Local</td>
					<td><input type="text" name="local"></td>
				</tr>
				<tr>
					<td>Horário</td>
					<td>Inicio:<input type="time" name="inicio">
						<br>Término:<input type="time" name="termino"></td>
				</tr>
				<tr>
					<td>Fonte do Agente</td>
					<td><input type="text" name="fonte"></td>
				</tr>
				<tr>
					<td><input type="submit" id="" class="" name="" value="Concluir"></td>
					<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
				</tr>
			</tbody>
		</table>
	</form>
</body>