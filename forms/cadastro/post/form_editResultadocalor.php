<?php 
	include "../../../php/connect.php";
	$calor = $_GET['c'];
	$ghe = $_POST['ghe'];
	$risco = $_POST['risco'];
	$pontom = $_POST['ponto'];
	$tarefa = $_POST['tarefa'];
	$obs = $_POST['observacao'];
	$cargasolar = $_POST['cargasolar'];
	$tempoexec = $_POST['tempoexec'];
	$tg = str_replace(",",".",$_POST['tg']);
	$tbn = str_replace(",",".",$_POST['tbn']);
	$tbs = str_replace(",",".",$_POST['tbs']);
	$ibutg = str_replace(",",".",$_POST['ibutg']);
	$metabolica = $_POST['metabolica'];
	$gfip = $_POST['gfip'];
	$sql = "UPDATE tbresultado_calor SET 
	cdRisco = '".$risco."',
	tarefa = '".$tarefa."',
	pontoDeMedicao = '".$pontom."',
	observacao = '".$obs."',
	cargasolar = '".$cargasolar."',
	tempoexec = '".$tempoexec."',
	tg = '".$tg."',
	tbn = '".$tbn."',
	tbs = '".$tbs."',
	ibutg = '".$ibutg."',
	metabolica = '".$metabolica."',
	GFIP = '".$gfip."'
	WHERE cdCalor = ".$calor;
	if(mysqli_query($link, $sql)){
		echo "<script>alert('Resultado Calor Modificado com Sucesso.'); window.close();</script>";
	}else{
		echo "<script>alert('Resultado Calor não foi modificado: ".mysqli_error($link)."'); window.close();</script>";
	}
?>