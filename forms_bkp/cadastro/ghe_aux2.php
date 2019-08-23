<?php
	include "../../php/connect.php";
	$empid = $_GET["cd"];
	$contrato = $_GET["cid"];
	echo $contrato;
	$cdgg = $_POST['cdGG'];
	$sql = "SELECT * FROM tbgerencia WHERE cdSuperIntendencia = ".$cdgg;
	$query = mysqli_query($link,$sql);
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
	<form id="" class="" action="/fnac/forms/cadastro/ghe.php?cid=<?php echo $contrato; ?>" method="POST">
		<table class="table table-light table-stripped table-sm table-responsive-xl">
			<thead class="thead-light">
				<tr>
					<th class="text-center" colspan="2">Nova GHE</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Gerência</td>
					<td><select id="" class="" name="cdg">
							<?php
								while($resul = mysqli_fetch_assoc($query)){
									echo'<option id="" class="" value="'.$resul["cdGerencia"].'">'.$resul["gerencia"].'</option>';
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td><input type="submit" id="" class="" name="" value="Confirmar"></td>
				</tr>
			</tbody>
		</table>
	</form>
</body>