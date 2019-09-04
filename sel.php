<!DOCTYPE html>
<html lang="en">
<?php
	error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE ^ E_WARNING);
	$_SERVER['DOCUMENT_ROOT'] = dirname(__FILE__);
	session_start();
	header ('Content-type: text/html; charset=UTF-8');
	include "php/connect.php";
	$sql1 = "SELECT * FROM tbempresa ORDER BY nomeEmpresa ASC";
	$res1 = mysqli_query($link,$sql1);
	if (!isset($_SESSION)) session_start();
	session_start(); 	//A seção deve ser iniciada em todas as páginas
	if (!isset($_SESSION['cdLogin'])) {		//Verifica se há seções
	        session_destroy();						//Destroi a seção por segurança
	       	header("Location: index1010.php");	//Redireciona o visitante para login
	}
	$cdLogin = $_SESSION["cdLogin"];
	$LNome = $_SESSION["nome"];
	if (isset($_POST['submit'])) {
	}

?>
	<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	    
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
		<script>
			$(".novaemp").click(function(){
				var $value = $(this).attr("resultado");
				window.open($value,null,"height=600,width=800,status=no,toolbar=no,menubar=no,location=no");
			});
		</script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-5"></div>
				<div class="col-2">
						<div data-fancybox data-type="ajax" data-src="forms/cadastro/empresa.php" href="javascript;;" style="margin-top: 8px; background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Nova Empresa</b></div>
				</div>
				<div class="col-5"></div>
			</div>
			<div class="row" style="padding-top: 20px">
				<div class="col-3"></div>
				<div class="col-6">
				<form action="select_1.php" method="post">
						<table class="table table-sm table-responsive-sm table-light">
							<thead class="thead-light">
								<tr>
									<th colspan="2">Selecionar Empresa</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Empresa</td>
									<td>
										<select id="select" name="cdempresa">
											<?php
												while($row = mysqli_fetch_assoc($res1)){
													echo '
														<option value="'.$row["cdEmpresa"].'">'.$row['nomeEmpresa'].'</option>
													';
												}
											?>
										</select>
									</td>
								</tr>
								<tr>
										<td colspan="2"><center><button type="submit" >Selecionar</button></center></td>
								</tr>
							</tbody>
						</table>
				</form>	
				</div>
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