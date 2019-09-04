<?php
	require "../../../php/connect.php";
	$contrato = $_GET['c'];
	$cd = $_GET['b'];
	$header_sql = "SELECT * FROM tbcontrato_cronograma WHERE cdContrato = ".$contrato;
	$header_qry = mysqli_query($link,$header_sql);
	$sql = "SELECT * FROM tbcontrato_cronograma_t WHERE cdContrato = ".$contrato." AND cdCronograma =".$cd;
	$qry = mysqli_query($link,$sql);
	foreach($qry as $t){
		$dmes = array($t["bmes1"],$t["bmes2"],$t["bmes3"],$t["bmes4"],$t["bmes5"],$t["bmes6"],$t["bmes7"],$t["bmes8"],$t["bmes9"],$t["bmes10"],$t["bmes11"],$t["bmes12"]);
		$tarefa = $t["nomeTarefa"];
	}
	foreach($header_qry as $h){
		$mes = array($h["mes1"],$h["mes2"],$h["mes3"],$h["mes4"],$h["mes5"],$h["mes6"],$h["mes7"],$h["mes8"],$h["mes9"],$h["mes10"],$h["mes11"],$h["mes12"]);
	}
	$cont = 0;
?>
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
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
	<form id="" class="" action="/fnac/forms/cadastro/post/form_editCronogramadata.php" method="POST">
		<table class="table table-sm table-light">
			<thead class="thead-light">
				<tr>
					<th colspan="2" class="text-center">Modificar Dados do Cronograma</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<input type="text" name="cdCronograma" value="<?php echo $cd; ?>" hidden>
						<input type="text" name="cdContrato" value="<?php echo $contrato; ?>" hidden>
						Tarefa
					</td>
					<td><input type="text" name="tarefa" required value="<?php echo $tarefa; ?>"></input></td>
				</tr>
				<?php while($cont < 12){
					$cont2 = $cont + 1;
					echo'<tr>
						<td>'.$mes[$cont].'</td>';
						if($dmes[$cont] == 1){
							echo'<td>
								<input type="radio" name="mes'.$cont2.'" value="1" checked>*
								<input type="radio" name="mes'.$cont2.'" value="2">**
								<input type="radio" name="mes'.$cont2.'" value="3">***
								<input type="radio" name="mes'.$cont2.'" value="0">Não Marcar
							</td>';
						}elseif($dmes[$cont] == 2){
							echo'<td>
								<input type="radio" name="mes'.$cont2.'" value="1">*
								<input type="radio" name="mes'.$cont2.'" value="2" checked>**
								<input type="radio" name="mes'.$cont2.'" value="3">***
								<input type="radio" name="mes'.$cont2.'" value="0">Não Marcar
							</td>';
						}elseif($dmes[$cont] == 3){
							echo'<td>
								<input type="radio" name="mes'.$cont2.'" value="1">*
								<input type="radio" name="mes'.$cont2.'" value="2">**
								<input type="radio" name="mes'.$cont2.'" value="3" checked>***
								<input type="radio" name="mes'.$cont2.'" value="0">Não Marcar
							</td>';
						}elseif($dmes[$cont] == 0){
							echo'<td>
								<input type="radio" name="mes'.$cont2.'" value="1">*
								<input type="radio" name="mes'.$cont2.'" value="2">**
								<input type="radio" name="mes'.$cont2.'" value="3">***
								<input type="radio" name="mes'.$cont2.'" value="0" checked>Não Marcar
							</td>';
						}
					echo'</tr>';
				$cont++;
				}?>
					
				<tr>
					<td>
						<input type="submit" id="" class="" name="" value="Confirmar Cadastro">
						<button type="button" onclick="fechar()">Finalizar Cadastros</button>
					</td>
					<td>
						<input type="reset" id="" class="" name="" value="Limpar Campos">
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</body>
