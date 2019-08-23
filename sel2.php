<!DOCTYPE html>
<html lang="en">
<?php
	error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE ^ E_WARNING);
	$_SERVER['DOCUMENT_ROOT'] = dirname(__FILE__);
	session_start();
	header ('Content-type: text/html; charset=UTF-8');
	include "php/connect.php";
	$empid = $_SESSION["cdempresa"];
	$sql1 = "SELECT * FROM tbempresa WHERE cdEmpresa = ".$empid;
	$res1 = mysqli_query($link,$sql1);
	$sql2 = "SELECT * FROM tbcontrato WHERE cdEmpresa = ".$empid;
	$res2 = mysqli_query($link,$sql2);
	if (!isset($_SESSION)) session_start();
	if (!isset($_SESSION["cdLogin"])) {
		//Destrói a sessão por segurança
		session_destroy();
		//Redireciona o visitante de volta pro login
		header("Location: index1010.php");
	}
	$cdLogin = $_SESSION["cdLogin"];
	$LNome = $_SESSION["nome"];
?>
	<head>
	    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title><?php echo $_SESSION["nome"]; ?> - Projeto FAR</title>

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
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-5"></div>
				<div class="col-2">
					<div data-fancybox data-type="ajax" data-src="forms/cadastro/contrato2.php?cd=<?php echo $empid; ?>" href="javascript:;"  class="novobotao text-center"><b>Novo Contrato</b></div>
				</div>
				<div class="col-5"></div>
			</div>
			<div class="row" style="padding-top: 20px">
				<div class="col-3"></div>
				<div class="col-6">
					<div>
						<form action="select_2.php" method="post">
							<table class="table table-sm table-responsive-sm table-light">
								<thead class="thead-light">
									<tr>
										<th colspan="2">Selecionar Contrato</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Empresa</td>
										<td>
											<select id="" class="" name="cdempresa" disabled>
												<?php
													while($row = mysqli_fetch_assoc($res1)){
														echo '
															<option name="cdempresa" id="" class="" value="'.$row["cdEmpresa"].'">'.$row['nomeEmpresa'].'</option>
														';
													}
												?>
											</select>
										</td>
									</tr>
									<tr>
										<td>Contrato</td>
										<td>
											<select id="" class="" name="cdcontrato">
												<?php
													while($row2 = mysqli_fetch_assoc($res2)){
														$contrato = $row2["cdContrato"];
														echo '
															<option name="cdcontrato" class="" value="'.$row2["cdContrato"].'">'.$row2['cdEmpresa'].'-'.$row2["cdContrato"].'</option>
														';
													}
												?>
											</select>
										</td>
									</tr>
									<tr>
										<td colspan="2"><center><button type="submit" >Entrar</button></center></td>
									</tr>
								</tbody>
							</table>
						</form>
					</div>
					<div id="select"></div>
				</div>

				<div class="col-3"></div>
			</div>
		</div>
	    <!-- Footer -->
		<footer class="py-3 bg-dark fixed-bottom">
		  <div class="container">
			<p class="m-0 text-center text-white">Copyright &copy; LCAT 2018</p>
		  </div>
		  <!-- /.container -->
		</footer>


	</body>
</html>