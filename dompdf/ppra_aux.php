<?php
	include "../php/connect.php";
	$id_empresa = $_GET['x'];
	$id_contrato = $_GET['z'];
	$sql_perfil = "SELECT * FROM tbperfis WHERE cdEmpresa = ".$id_empresa;
	$qry_perfil = mysqli_query($link,$sql_perfil);
?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title id="title">Empresas - FAR Sistemas</title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/fnac.css">

	<!-- Custom styles for this template -->
	<link href="../css/scrolling-nav.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.min.css">
	<!-- Bootstrap core JavaScript -->
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="../js/bootstrap.min.js"></script>

	<!-- Plugin JavaScript -->
	<!--<script src="../vendor/jquery-easing/jquery.easing.min.js"></script> -->

	<!-- Custom JavaScript for this theme -->
	<script src="../js/scrolling-nav.js"></script>
	<script src="../js/jquery.fancybox.min.js"></script>
	<script>
	$(document).ready(function(){
		$("#selecionar").click(function(){
			if($("#perfil").val() != 0){
				window.location.href = "ppra.php?x="+$("#aux").attr("x")+"&z="+$("#aux").attr("z")+"&p="+$("#select").val()+"&w="+$("#perfil").val()+"&y="+$("#imagem").val();
			}else{
				alert("Perfil não selecionado!");
			}
		});
	});
	</script>
</head>
<body>
	<span id="aux" x="<?php echo $id_empresa; ?>" z="<?php echo $id_contrato; ?>"></span>
	<div style="width: 100%; height: 50px;"></div>
	<center><h5>Deseja impressão com inclusão de assinatura Técnica?</h5>
	<select id="select">
		<option value="1">Sim</option>
		<option value="0">Não</option>
	</select>
	<h5>Perfil para ser utilizado na Impressão:</h5>
	<select id="perfil">
		<option value="0">Selecione</option>
		<?php
		foreach($qry_perfil as $profile){
			echo'<option value="'.$profile["cdPerfil"].'">Responsável: '.$profile["responsavel"].' - Tecnico: '.$profile["tecnico"].'</option>';
		}?>
	</select>
	<h5>Incluir logomarca do perfil no PPRA?</h5>
	<select id="imagem">
		<option value="1">Sim</option>
		<option value="0">Não</option>
	</select>
	<button id="selecionar">Prosseguir</button></center>
</body>
		