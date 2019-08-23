<?php 
	require "../../../php/connect.php";
	$contrato = $_GET['c'];
	$cdresult = $_GET['b'];
	$ghe = $_POST['ghe'];
	$sql_info_ruido = "SELECT * FROM tbresultado_ruido WHERE cdResultado =".$cdresult;
	$qry_info_ruido = mysqli_query($link,$sql_info_ruido);
	$sql_info_risco = "SELECT * FROM tbrisco WHERE cdGHE = ".$ghe;
	$qry_info_risco = mysqli_query($link,$sql_info_risco);
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
</head>
<body>
	<form id="" class="" action="/fnac/forms/cadastro/post/form_cadResultadoruido.php" method="POST">
		<table class="table table-sm table-light">
			<thead class="thead-light">
				<tr>
					<th colspan="2" class="text-center">Novo Resultado Ruído</th>
				</tr>
			</thead>
			<tbody>
				<?php while($assoc_ruido = mysqli_fetch_assoc($qry_info_ruido)){
					echo'
					<tr>
						<td>Selecionar Risco</td>
						<td><input type="text" name="ghe" value="'.$ghe.'" hidden>';
							echo '<select id="" class="" name="risco" required>';
							$sql_info_agente_risco = "SELECT * FROM tbagente WHERE cdsubGrupo = 7";
							$qry_info_agente_risco = mysqli_query($link,$sql_info_agente_risco);
							while($assoc_agente_risco = mysqli_fetch_assoc($qry_info_agente_risco)){
								$sql_info_risco = "SELECT * FROM tbrisco WHERE cdGHE = ".$ghe." AND cdAgente = ".$assoc_agente_risco['cdAgente'];
								$qry_info_risco = mysqli_query($link,$sql_info_risco);
								while($assoc_risco = mysqli_fetch_assoc($qry_info_risco)){
									if($assoc_ruido["cdRisco"] == $$assoc_risco["cdrisco"]){
										echo '<option id="" class="" value="'.$assoc_risco["cdrisco"].'" selected>'.$assoc_agente_risco["nomeAgente"].'</option>';
									}else{
										echo '<option id="" class="" value="'.$assoc_risco["cdrisco"].'">'.$assoc_agente_risco["nomeAgente"].'</option>';
									}
								}
							}
							echo '
							</select>					
						</td>
					</tr>
					<tr>
						<td>Código de Rastreio</td>
						<td><input type="text" name="rastreio" value="'.$assoc_ruido["codRastreio"].'" required></td>
					</tr>
					<tr>
						<td>Código de Rastreio</td>
						<td><input type="date" name="dataaval" value="'.$assoc_ruido["dataAvaliacao"].'" required></td>
					</tr>
					<tr>
						<td>Resultado</td>
						<td><input type="text" name="resultado" value="'.$assoc_ruido["concentracao"].'" required></td>
					</tr>
					<tr>
						<td>Dose Projetada</td>
						<td><input type="text" name="dose" value="'.$assoc_ruido["doseProjetada"].'" required></td>
					</tr>
					<tr>
						<td>NeN</td>
						<td><input type="text" name="nen" value="'.$assoc_ruido["nen"].'" required></td>
					</tr>		
					<tr>
						<td><input type="submit" id="" class="" name="" value="Confirmar Cadastro"></td>
						<td><input type="reset" id="" class="" name="" value="Recomeçar Campos"></td>
					</tr>';
				}?>
				
			</tbody>
		</table>
	</form>
</body>