<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<?php 
 	error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);
	include "../php/connect.php";
	if (!isset($_SESSION)) session_start();
	if (!isset($_SESSION["cdLogin"])) {
		//Destrói a sessão por segurança
		session_destroy();
		//Redireciona o visitante de volta pro login
		header("Location: index.php"); exit;
	}
	if (!isset($_SESSION['cdcontrato'])){
		header ("Location: sel.php");
	}
	$empid = $_SESSION["cdempresa"];
	$contrato = $_SESSION["cdcontrato"];
	$sql_ghe = "SELECT * From tbghe WHERE cdContrato = ".$contrato;
	$res_ghe = mysqli_query($link,$sql_ghe);
	header ('Content-type: text/html; charset=UTF-8');
?>
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/fnac.css">
		
		<!-- Custom styles for this template -->
		<link href="css/scrolling-nav.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.min.css">
		<!-- Bootstrap core JavaScript -->
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="js/bootstrap.min.js"></script>

		<!-- Plugin JavaScript -->
		<!--<script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

		<!-- Custom JavaScript for this theme -->
		<script src="js/scrolling-nav.js"></script>
		<script src="js/jquery.fancybox.min.js"></script>

<script>
	function novorisco() {
		window.open("forms/cadastro/risco.php?c=<?php echo $_SESSION['cdcontrato'];?>",null,"height=900,width=800,status=no,toolbar=no,menubar=no,location=no");
	}
	$(".editarrisco").click(function(){
		var $value = $(this).attr("risco");
		window.open($value,null,"height=600,width=800,status=no,toolbar=no,menubar=no,location=no");
	});
	$(".delrisco").click(function(){
		var $value = $(this).attr("risco");
		window.open($value,null,"height=600,width=800,status=no,toolbar=no,menubar=no,location=no");
	});
</script>
	<div class="container">
		<div class="row"><div class="col-12"><h3>Risco</h3></div></div>
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8"></div>
			<div class="col-2">
				<div onclick="novorisco()" class="novobotao text-center" style="background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Novo Risco</b></div></a>
			</div>
		</div>
		<div class="row">
			<div id="tabela" class="col-md-12">
				<table class="table table-striped table-responsive table-sm table-bordered" style="margin-top: 40px">
					<thead class="thead-light">
						<tr>
							<th class="text-center">GHE</th>
							<th class="text-center">Código</th>							
							<th class="text-center" colspan="3">Agente</th>
							<th class="text-center" colspan="4">EPI</th>
							<th class="text-center">Fonte</th>
							<th class="text-center">Controle</th>
							<th class="text-center">Exposição</th>
							<th class="text-center">Modificar</th>
							<th class="text-center">Excluir</th>
						</tr>
						<tr>
							<th class="text-center"></th>
							<th class="text-center">Grupo</th>
							<th class="text-center">Sub Grupo</th>
							<th class="text-center">Nome do Agente</th>
							<th class="text-center">Nome</th>
							<th class="text-center">Fabricante</th>
							<th class="text-center">Modelo</th>
							<th class="text-center">CA</th>
							<th colspan="6"></th>
						</tr>
					</thead>
					<tbody>
						<?php
							if ($res_ghe->num_rows > 0){
								while($row_ghe = mysqli_fetch_assoc($res_ghe)){
									$sql1 = "SELECT * From tbrisco WHERE cdGHE = ".$row_ghe["cdGHE"];
									$res1 = mysqli_query($connect,$sql1);
									while($row1 = mysqli_fetch_assoc($res1)){
									if($row1["exposicao"] == 1){
										$expo = "Eventual";
									}else{
										if($row1["exposicao"] == 2){
											$expo = "Intermitente";
										}else{
											$expo = "Habitual Permanente";
										}
									}
									$sql2 = "SELECT * From tbagente WHERE cdAgente = " . $row1["cdAgente"];
									$res2 = mysqli_query($connect,$sql2);
									while($row2 = mysqli_fetch_assoc($res2)){
										$sql3 = "SELECT * From tbsubgrupoagente WHERE cdSubGrupo = " . $row2["cdsubGrupo"];
										$res3 = mysqli_query($connect,$sql3);
										while($row3 = mysqli_fetch_assoc($res3)){
											$sql4 = "SELECT * FROM tbgruposagente WHERE cdTipoAgente = " . $row3["cdTipoAgente"];
											$res4 = mysqli_query($connect,$sql4);
											while($row4 = mysqli_fetch_assoc($res4)){
											if($row1["cdEpi"] != 0){
												$sql5 = "SELECT * FROM tbepi WHERE cdEPI = ".$row1["cdEpi"];
												$qry5 = mysqli_query($link,$sql5);
												while($row5 = mysqli_fetch_assoc($qry5)){
														
														echo '
															<tr style="background-color: ">
																<td class="text-center">' . $row_ghe['nomeGHE'] . '</td>
																<td class="text-center">' . $row1["cdrisco"] . '</td>
																<td class="text-center">' . $row4["tipoAgente"] . '</td>
																<td class="text-center">' . $row3["nome"] . '</td>
																<td class="text-center">' . $row2["nomeAgente"] . '</td>
																<td class="text-center">' . $row5["nome"] . '</td>
																<td class="text-center">' . $row5["fabricante"] . '</td>
																<td class="text-center">' . $row5["modelo"] . '</td>
																<td class="text-center">' . $row5["ca"] . '</td>
																<td class="text-center">' . $row1["fonte"] . '</td>
																<td class="text-center">' . $row1["controle"] . '</td>
																<td class="text-center">' . $expo . '</td>
																<td class="text-center"><img class="editarrisco icone2" src="img/icons/edit.png" width="24px" height="24px" risco="forms/cadastro/edit/edit_risco.php?c='.$_SESSION['cdcontrato'].'&r='.$row1['cdrisco'].'" /></td>
																<td class="text-center"><img class="delrisco icone2" src="img/icons/delete.png" width="24px" height="24px" risco="forms/cadastro/post/form_delRisco.php?c='.$row1['cdrisco'].'" /></td>
															</tr>
														';
												}
											}else{
											echo '
															<tr style="background-color: ">
																<td class="text-center">' . $row_ghe['nomeGHE'] . '</td>
																<td class="text-center">' . $row1["cdrisco"] . '</td>
																<td class="text-center">' . $row4["tipoAgente"] . '</td>
																<td class="text-center">' . $row3["nome"] . '</td>
																<td class="text-center">' . $row2["nomeAgente"] . '</td>
																<td class="text-center" colspan="4">SEM EPI</td>
																<td class="text-center">' . $row1["fonte"] . '</td>
																<td class="text-center">' . $row1["controle"] . '</td>
																<td class="text-center">' . $expo . '</td>
																<td class="text-center"><img class="editarrisco icone2" src="img/icons/edit.png" width="24px" height="24px" risco="forms/cadastro/edit/edit_risco.php?c='.$_SESSION['cdcontrato'].'&r='.$row1['cdrisco'].'" /></td>
																<td class="text-center"><img class="delrisco icone2" src="img/icons/delete.png" width="24px" height="24px" risco="forms/cadastro/post/form_delRisco.php?c='.$row1['cdrisco'].'" /></td>
															</tr>
														';
											}
												}
											}
										}
									}
								}
							}else{
								echo '
									<tr style="background-color: ">
										<td colspan="14">Nehnum Risco Cadastrado</td>
									</tr>
								';
							}
						?>
					<tbody>
				</table>
			</div>
		</div>
	</div>
</html>