<?php
	require "../../../php/connect.php";
	$contrato = $_GET['c'];
	$sql1 = "SELECT * FROM tbcontrato_cronograma WHERE cdContrato = ".$contrato;
	$qry1 = mysqli_query($link,$sql1);
	foreach($qry1 as $h){
		$mes = array($h["mes1"],$h["mes2"],$h["mes3"],$h["mes4"],$h["mes5"],$h["mes6"],$h["mes7"],$h["mes8"],$h["mes9"],$h["mes10"],$h["mes11"],$h["mes12"]);
		$obs = $h["obs"];
		$cdresult = $h["cdCronogramah"];
	}
	$cont = 0;
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
		<script>
			function fechar() {
				window.close();
			}
		</script>
</head>
<body>
	<form id="" class="" action="/fnac/forms/cadastro/post/form_editCronogramaheader.php" method="POST">
		<table class="table table-sm table-light">
			<thead class="thead-light">
				<tr>
					<th colspan="2" class="text-center">Modificar Cabeçalho do Cronograma</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Contrato</td>
					<td>
					<input type="text" name="cdContrato" value="<?php echo $contrato; ?>" readonly>
					<input type="text" name="cdCronogramah" value="<?php echo $cdresult; ?>" hidden>
					</td>
				</tr>
<?php				
					while($cont < 12){
					$cont2 = $cont + 1;
						echo'<tr>
							<td>Qual o mês do campo '.$cont2.'?</td>
							<td><input type="text" name="mes'.$cont2.'" required value="'.$mes[$cont].'"></input></td>
						</tr>';
					$cont++;
					}?>

				<tr>
					<td>Observação</td>
					<td><input type="text" name="obs" required value="<?php echo $obs ?>"></input></td>
				</tr>
				<tr>
					<td><input type="submit" id="" class="" name="" value="Confirmar Cadastro"></td>
					<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
				</tr>
			</tbody>
		</table>
	</form>
</body>
