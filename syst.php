<?php
header('Content-Type: text/html; charset=UTF-8');

error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);
$_SERVER['DOCUMENT_ROOT'] = dirname(__FILE__);
include "php/connect.php";
session_cache_expire(1440);
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
$cdLogin = $_SESSION["cdLogin"];
$LNome = $_SESSION["nome"];
$_SESSION['cd'] = $_SESSION['cdempresa'];
$contrato = $_SESSION['cdcontrato'];
?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title id="title">Empresas - FAR Sistemas</title>

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
		$(document).ready(function(){
			$("#Empresas").click(function(){
				$("#base").fadeOut(250, function(){
					$("#base").load("forms/empresas.php", function(){
						$("#base").fadeIn(250);
						$("#nav_Agente").removeClass("active");
						$("#nav_Perfis").removeClass("active");
						$("#nav_GHE").removeClass("active");
						$("#nav_Equipamento").removeClass("active");
						$("#nav_EPI").removeClass("active");
						$("#nav_Usuarios").removeClass("active");
						$("#nav_empresas").addClass("active");
						$("#nav_Resultados").removeClass("active");
						$("#nav_Ficha").removeClass("active");
						$("#title").html("Empresas  - Projeto FAR");
					});
				});
			});
			$("#base").load("forms/empresas.php",function(){
				$("#base").fadeOut(0);
				$("#base").fadeIn(1000);
				$("#nav_empresas").addClass("active");
			});
			$("#GHE").click(function(){
				$("#base").fadeOut(250, function(){
					$("#base").load("forms/ghe.php", function(){
						$("#base").fadeIn(250);
						$("#nav_empresas").removeClass("active"); 						
						$("#nav_Ficha").removeClass("active");
						$("#nav_Perfis").removeClass("active");
						$("#nav_Agente").removeClass("active");
						$("#nav_Equipamento").removeClass("active");
						$("#nav_EPI").removeClass("active");
						$("#nav_Usuarios").removeClass("active");
						$("#nav_GHE").addClass("active");
						$("#nav_Resultados").removeClass("active");
						$("#title").html("GHE  - Projeto FAR");
					});
				});
			});
			$("#Agente").click(function(){
				$("#base").fadeOut(250, function(){
					$("#base").load("forms/agente.php", function(){
						$("#base").fadeIn(250);
						$("#nav_empresas").removeClass("active"); 						
						$("#nav_Ficha").removeClass("active");
						$("#nav_Perfis").removeClass("active");
						$("#nav_Equipamento").removeClass("active");
						$("#nav_EPI").removeClass("active");
						$("#nav_GHE").removeClass("active");
						$("#nav_Usuarios").removeClass("active");
						$("#nav_Agente").addClass("active");
						$("#nav_Resultados").removeClass("active");
						$("#title").html("Agente  - Projeto FAR");
					});
				});
			});
			$("#EPI").click(function(){
				$("#base").fadeOut(250, function(){
					$("#base").load("forms/epi.php", function(){
						$("#base").fadeIn(250);
						$("#nav_empresas").removeClass("active"); 						
						$("#nav_Ficha").removeClass("active");
						$("#nav_Perfis").removeClass("active");
						$("#nav_GHE").removeClass("active");
						$("#nav_Agente").removeClass("active");
						$("#nav_Equipamento").removeClass("active");
						$("#nav_Usuarios").removeClass("active");
						$("#nav_EPI").addClass("active");
						$("#nav_Resultados").removeClass("active");
						$("#title").html("EPI  - Projeto FAR");
					});
				});
			});
			$("#Equipamento").click(function(){
				$("#base").fadeOut(250, function(){
					$("#base").load("forms/equipamento.php", function(){
						$("#base").fadeIn(250);
						$("#nav_empresas").removeClass("active"); 						
						$("#nav_Ficha").removeClass("active");
						$("#nav_Perfis").removeClass("active");
						$("#nav_GHE").removeClass("active");
						$("#nav_Agente").removeClass("active");
						$("#nav_EPI").removeClass("active");
						$("#nav_Usuarios").removeClass("active");
						$("#nav_Equipamento").addClass("active");
						$("#nav_Resultados").removeClass("active");
						$("#title").html("Equipamento  - Projeto FAR");
					});
				});
			});
			$("#nav_Usuarios").click(function(){
				$("#base").fadeOut(250, function(){
					$("#base").load("forms/users.php", function(){
						$("#base").fadeIn(250);
						$("#nav_empresas").removeClass("active"); 						
						$("#nav_Ficha").removeClass("active");
						$("#nav_Perfis").removeClass("active");
						$("#nav_GHE").removeClass("active");
						$("#nav_Agente").removeClass("active");
						$("#nav_EPI").removeClass("active");
						$("#nav_Equipamento").removeClass("active");
						$("#nav_Usuarios").addClass("active");
						$("#nav_Resultados").removeClass("active");
						$("#title").html("Usuários  - Projeto FAR");
					});
				});
			});
			$("#Contratos").click(function(){
				$("#base").fadeOut(250, function(){
					$("#base").load("forms/contrato.php", function(){
						$("#base").fadeIn(250);
						$("#nav_Agente").removeClass("active");
						$("#nav_Perfis").removeClass("active");
						$("#nav_GHE").removeClass("active");
						$("#nav_Equipamento").removeClass("active");
						$("#nav_EPI").removeClass("active");
						$("#nav_Usuarios").removeClass("active");
						$("#nav_empresas").addClass("active");
						$("#nav_Ficha").removeClass("active");
						$("#nav_Resultados").removeClass("active");
						$("#title").html("Contratos  - Projeto FAR");
					});
				});
			});
			$("#Cronograma").click(function(){
				$("#base").fadeOut(250, function(){
					$("#base").load("forms/table_cronograma.php", function(){
						$("#base").fadeIn(250);
						$("#nav_Agente").removeClass("active");
						$("#nav_Perfis").removeClass("active");
						$("#nav_GHE").removeClass("active");
						$("#nav_Equipamento").removeClass("active");
						$("#nav_EPI").removeClass("active");
						$("#nav_Usuarios").removeClass("active");
						$("#nav_empresas").addClass("active");
						$("#nav_Ficha").removeClass("active");
						$("#nav_Resultados").removeClass("active");
						$("#title").html("Cronograma  - Projeto FAR");
					});
				});
			});
			$("#Risco").click(function(){
				$("#base").fadeOut(250, function(){
					$("#base").load("forms/Risco.php", function(){
						$("#base").fadeIn(250);
						$("#nav_Agente").removeClass("active");
						$("#nav_Perfis").removeClass("active");
						$("#nav_GHE").addClass("active");
						$("#nav_Equipamento").removeClass("active");
						$("#nav_EPI").removeClass("active");
						$("#nav_Usuarios").removeClass("active");
						$("#nav_empresas").removeClass("active"); 						
						$("#nav_Ficha").removeClass("active");
						$("#nav_Resultados").removeClass("active");
						$("#title").html("Risco  - Projeto FAR");
					});
				});
			});
			$("#Perfis").click(function(){
				var $valor = $(this).attr("load");
				$("#base").fadeOut(250, function(){
					$("#base").load($valor, function(){
						$("#base").fadeIn(250);
						$("#nav_Agente").removeClass("active");
						$("#nav_Perfis").addClass("active");
						$("#nav_GHE").removeClass("active");
						$("#nav_Equipamento").removeClass("active");
						$("#nav_EPI").removeClass("active");
						$("#nav_Usuarios").removeClass("active");
						$("#nav_empresas").removeClass("active"); 						
						$("#nav_Ficha").removeClass("active");
						$("#nav_Resultados").removeClass("active");
						$("#title").html("Perfil  - Projeto FAR");
					});
				});
			});
			$("#resultadoRuido").click(function(){
				$("#base").fadeOut(250, function(){
					$("#base").load("forms/table_resultado_ruido.php", function(){
						$("#base").fadeIn(250);
						$("#nav_Agente").removeClass("active");
						$("#nav_Perfis").removeClass("active");
						$("#nav_GHE").removeClass("active");
						$("#nav_Resultados").addClass("active");
						$("#nav_Equipamento").removeClass("active");
						$("#nav_EPI").removeClass("active");
						$("#nav_Usuarios").removeClass("active");
						$("#nav_empresas").removeClass("active"); 						
						$("#nav_Ficha").removeClass("active");
						$("#title").html("Resultado Ruídos  - Projeto FAR");
					});
				});
			});
			$("#resultadoCalor").click(function(){
				$("#base").fadeOut(250, function(){
					$("#base").load("forms/table_resultado_calor.php", function(){
						$("#base").fadeIn(250);
						$("#nav_Agente").removeClass("active");
						$("#nav_Perfis").removeClass("active");
						$("#nav_GHE").removeClass("active");
						$("#nav_Resultados").addClass("active");
						$("#nav_Equipamento").removeClass("active");
						$("#nav_EPI").removeClass("active");
						$("#nav_Usuarios").removeClass("active");
						$("#nav_empresas").removeClass("active"); 						
						$("#nav_Ficha").removeClass("active");
						$("#title").html("Resultado Calor  - Projeto FAR");
					});
				});
			});
			$("#resultadoQuimico").click(function(){
				$("#base").fadeOut(250, function(){
					$("#base").load("forms/table_resultado_quimico.php", function(){
						$("#base").fadeIn(250);
						$("#nav_Agente").removeClass("active");
						$("#nav_Perfis").removeClass("active");
						$("#nav_GHE").removeClass("active");
						$("#nav_Resultados").addClass("active");
						$("#nav_Equipamento").removeClass("active");
						$("#nav_EPI").removeClass("active");
						$("#nav_Usuarios").removeClass("active");
						$("#nav_empresas").removeClass("active"); 						
						$("#nav_Ficha").removeClass("active");
						$("#title").html("Resultado Quimico  - Projeto FAR");
					});
				});
			});
			$("#resultadoVibracao").click(function(){
				$("#base").fadeOut(250, function(){
					$("#base").load("forms/table_resultado_vibracao.php", function(){
						$("#base").fadeIn(250);
						$("#nav_Agente").removeClass("active");
						$("#nav_Perfis").removeClass("active");
						$("#nav_GHE").removeClass("active");
						$("#nav_Resultados").addClass("active");
						$("#nav_Equipamento").removeClass("active");
						$("#nav_EPI").removeClass("active");
						$("#nav_Usuarios").removeClass("active");
						$("#nav_empresas").removeClass("active"); 						
						$("#nav_Ficha").removeClass("active");
						$("#title").html("Resultado Vibração  - Projeto FAR");
					});
				});
			});
			$("#resultadoQualitativo").click(function(){
				$("#base").fadeOut(250, function(){
					$("#base").load("forms/table_resultado_qualitativo.php", function(){
						$("#base").fadeIn(250);
						$("#nav_Agente").removeClass("active");
						$("#nav_Perfis").removeClass("active");
						$("#nav_GHE").removeClass("active");
						$("#nav_Resultados").addClass("active");
						$("#nav_Equipamento").removeClass("active");
						$("#nav_EPI").removeClass("active");
						$("#nav_Usuarios").removeClass("active");
						$("#nav_empresas").removeClass("active"); 						
						$("#nav_Ficha").removeClass("active");
						$("#nav_Ficha").removeClass("active");
						$("#title").html("Resultado Qualitativo  - Projeto FAR");
					});
				});
			});
			$("#fichaq").click(function(){
				$("#base").fadeOut(250, function(){
					$("#base").load("forms/table_ficha_quimica.php", function(){
						$("#base").fadeIn(250);
						$("#nav_Agente").removeClass("active");
						$("#nav_Perfis").removeClass("active");
						$("#nav_GHE").removeClass("active");
						$("#nav_Resultados").removeClass("active");
						$("#nav_Equipamento").removeClass("active");
						$("#nav_Ficha").addClass("active");
						$("#nav_EPI").removeClass("active");
						$("#nav_Usuarios").removeClass("active");
						$("#nav_empresas").removeClass("active");
						$("#title").html("Ficha de Campo - Projeto FAR");
					});
				});
			});
			$("#ficha").click(function(){
				$("#base").fadeOut(250, function(){
					$("#base").load("forms/table_ficha.php", function(){
						$("#base").fadeIn(250);
						$("#nav_Agente").removeClass("active");
						$("#nav_Perfis").removeClass("active");
						$("#nav_GHE").removeClass("active");
						$("#nav_Resultados").removeClass("active");
						$("#nav_Equipamento").removeClass("active");
						$("#nav_Ficha").addClass("active");
						$("#nav_EPI").removeClass("active");
						$("#nav_Usuarios").removeClass("active");
						$("#nav_empresas").removeClass("active");
						$("#title").html("Ficha de Campo - Projeto FAR");
					});
				});
			});
			$("#PPRA").click(function(){
				$target = $(this).attr("page");
				window.open($target);
			});
			$("#LTCAT").click(function(){
				$target = $(this).attr("page");
				window.open($target);
			});
			$("#sair").click(function(){
				$("body").fadeOut(800, function(){
					window.location = "php/logout.php";
				});
			});
		});
	</script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="#">
			<img src="img/logo.png" width="auto" height="50" alt="">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown" id="nav_empresas">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Empresas
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" style="cursor: pointer" id="Empresas">Empresas</a>
						<a class="dropdown-item" style="cursor: pointer" id="Contratos">Contratos</a>
						
					</div>
				</li>
				<li class="nav-item dropdown" id="nav_GHE">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Cadastros
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" style="cursor: pointer" id="GHE">GHE</a>
						<a class="dropdown-item" style="cursor: pointer" id="Risco">Riscos</a>
						<a class="dropdown-item" style="cursor: pointer" id="Cronograma">Cronograma</a>
						<a class="dropdown-item" style="cursor: pointer" id="Perfis" load="forms/table_perfis.php?c=<?php echo $_SESSION['cdempresa'] ?>">Perfis</a>
					</div>
				</li>
				<li class="nav-item dropdown" id="nav_Resultados">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Resultados
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" style="cursor: pointer" id="resultadoQuimico">Químico</a>
						<a class="dropdown-item" style="cursor: pointer" id="resultadoRuido">Ruído</a>
						<a class="dropdown-item" style="cursor: pointer" id="resultadoCalor">Calor</a>
						<a class="dropdown-item" style="cursor: pointer" id="resultadoVibracao">Vibração</a>
						<a class="dropdown-item" style="cursor: pointer" id="resultadoQualitativo">Qualitativos</a>
					</div>
				</li>
				<li class="nav-item dropdown" id="nav_Laudos">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Gerar Laudos
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" style="cursor: pointer" id="PPRA" target="_blank" page="dompdf/ppra_aux.php?z=<?php echo $contrato ?>&x=<?php echo $_SESSION['cdempresa'] ?>">PPRA</a>
						<a class="dropdown-item" style="cursor: pointer" id="LTCAT" target="_blank" page="dompdf/ltcat_aux.php?z=<?php echo $contrato ?>&x=<?php echo $_SESSION['cdempresa'] ?>">LTCAT</a>
						<a class="dropdown-item" style="cursor: pointer" id="">PPR</a>
						<a class="dropdown-item" style="cursor: pointer" id="">Relatório Técnico</a>
						<a class="dropdown-item" style="cursor: pointer" id="">PCMSO</a>
						<a class="dropdown-item" style="cursor: pointer" id="">Efeito Combinado</a>
						<a class="dropdown-item" style="cursor: pointer" id="">PCA Auditivo</a>
						<a class="dropdown-item" style="cursor: pointer" id="">Qualitativos</a>
					</div>
				</li>
				<li class="nav-item dropdown"id="nav_Relatorios">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Relatórios
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" style="cursor: pointer" id="">Memória de Cálculo</a>
						<a class="dropdown-item" style="cursor: pointer" id="">Históricos Avaliação</a>
						<a class="dropdown-item" style="cursor: pointer" id="">Resumo de Resultados</a>
						<a class="dropdown-item" style="cursor: pointer" id="">Cadeia de Amostradores</a>
					</div>
				</li>
				<li class="nav-item dropdown" id="nav_Ficha">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Fichas de Campo
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" style="cursor: pointer" id="ficha">Outras</a>
						<a class="dropdown-item" style="cursor: pointer" id="fichaq">Quimico</a>
					</div>
				</li>
				<li class="nav-item" id="nav_APR-HO">
					<a class="nav-link" style="cursor: pointer" id="APR-HO">APR-HO</a>
				</li>
				<li class="nav-item dropdown" id="nav_Gestao">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Gestão
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" style="cursor: pointer" id="">Check-List</a>
						<a class="dropdown-item" style="cursor: pointer" id="">PPRA Av.Global</a>
						<a class="dropdown-item" style="cursor: pointer" id="">PPR Av.Global</a>
					</div>
				</li>
				<li class="nav-item" id="nav_EPI">
					<a class="nav-link" style="cursor: pointer" id="EPI">EPI</a>
				</li>
				<li class="nav-item" id="nav_Equipamento">
					<a class="nav-link" style="cursor: pointer" id="Equipamento">Equipamento</a>
				</li>
				<li class="nav-item" id="nav_Agente">
					<a class="nav-link" style="cursor: pointer" id="Agente">Agente</a>
				</li>
				
				
				
				
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item" id="nav_Usuarios">
					<a class="nav-link" style="cursor: pointer" id="Usuarios">Usuarios</a>
				</li>
				<li class="nav-item" id="nav_Usuario">
					<a class="nav-link" style="cursor: pointer" id="Usuario"><?php echo $_SESSION["nome"]; ?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="cursor: pointer" id="sair">Sair</a>
				</li>
			</ul>
		</div>
	</nav>

	<h5 style="color: white"><?php 	print_r($_SESSION); ?></h3>
		<div id="main" class="container-fluid">
			<div class="row text-center">
				<div class="col-12">
					<div class="base" id="base"></div>
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