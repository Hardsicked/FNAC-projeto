<?php 
	require "../../../php/connect.php";
	$cdresult = $_GET['b'];
	$contrato = $_GET['c'];
	$sql_info_ruido = "SELECT * FROM tbresultado_ruido WHERE cdResultado =".$cdresult;
	$qry_info_ruido = mysqli_query($link,$sql_info_ruido);
	$sql_info_ghe = "SELECT * FROM tbghe WHERE cdContrato = ".$contrato;
	$qry_info_ghe = mysqli_query($link,$sql_info_ghe);
	$sql_info_risco = "SELECT * FROM tbrisco WHERE cdGHE = ".$contrato;
	$qry_info_risco = mysqli_query($link,$sql_info_ghe);
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
	<form id="" class="" action="/fnac/forms/cadastro/edit/edit_resultado_ruido.php?c=<?php echo $_GET['c']."&b=".$cdresult; ?>" method="POST">
		<table class="table table-sm table-light">
			<thead class="thead-light">
				<tr>
					<th colspan="2" class="text-center">Modificar Resultado Ruído</th>
				</tr>
			</thead>
			<tbody>
				<?php while($assoc_ruido = mysqli_fetch_assoc($qry_info_ruido)){
				echo '
				<tr>
					<td>Codígo da GHE</td>
					<td>';
							if($qry_info_ghe->num_rows > 0){
								echo '<select id="" class="" name="ghe" required>';
								while($assoc_ghe = mysqli_fetch_assoc($qry_info_ghe)){
									if($assoc_ruido["cdGHE"] == $assoc_ghe["cdGHE"]){
										echo '<option id="" class="" value="'.$assoc_ghe["cdGHE"].'" selected>'.$assoc_ghe["codGHE"].'</option>';
									}else{
										echo '<option id="" class="" value="'.$assoc_ghe["cdGHE"].'">'.$assoc_ghe["codGHE"].'</option>';
									}
								}
							}else{
								echo '
									<select id="" class="" name="ghe">
										<option id="" class="">Nenhum GHE cadastrado</option>
									';
							}
						echo '
						</select>					
					</td>
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