<?php
	include "../../../php/connect.php";
	$empid = $_GET['c'];
	$contrato = $_GET['ci'];
	$ghe = $_GET['g'];
	$sql_ghe = "SELECT * FROM tbghe WHERE cdGHE = ".$ghe;
	$qry_ghe = mysqli_query($link,$sql_ghe);

?>
<head>
	<link rel="stylesheet" href="../../../css/bootstrap.min.css">
		<link rel="stylesheet" href="../../../css/fnac.css">
		
		<!-- Custom styles for this template -->
		<link href="../../../css/scrolling-nav.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../../css/jquery.fancybox.min.css">
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
	<form id="" class="" action="/fnac/forms/cadastro/edit/edit_gheaux2.php?c=<?php echo $empid; ?>&cid=<?php echo $contrato; ?>&g=<?php echo $ghe;?>" method="POST">
		<table class="table table-light table-stripped table-sm table-responsive-xl">
			<thead class="thead-light">
				<tr>
					<th class="text-center" colspan="2">Modificar GHE</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Gerência Geral</td>
					<td><select id="" class="" name="cdGG">
							<?php
							while($assoc_ghe = mysqli_fetch_assoc($qry_ghe)){
								$sql_setor = "SELECT * FROM tbsetor WHERE cdSetor = ".$assoc_ghe['cdSetor'];
								$qry_setor = mysqli_query($link,$sql_setor);
								while($assoc_setor = mysqli_fetch_assoc($qry_setor)){
									$sql_gerencia = "SELECT * FROM tbgerencia WHERE cdGerencia =".$assoc_setor['cdGerencia'];
									$qry_gerencia = mysqli_query($link,$sql_gerencia);
									while($assoc_gerencia = mysqli_fetch_assoc($qry_gerencia)){
										$sql = "SELECT * FROM tbsuperintendencia WHERE cdEmpresa = ".$empid;
										$query = mysqli_query($link,$sql);
										while($resul = mysqli_fetch_assoc($query)){
											if($resul["cdSuperIntendencia"] == $assoc_gerencia["cdSuperIntendencia"]){
												echo'<option id="" class="" value="'.$resul["cdSuperIntendencia"].'" selected>'.$resul["superintendencia"].'</option>';
											}else{
												echo'<option id="" class="" value="'.$resul["cdSuperIntendencia"].'">'.$resul["superintendencia"].'</option>';
											}
										}
									}
								}
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