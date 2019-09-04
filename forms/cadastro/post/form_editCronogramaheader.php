<?php
		include "../../../php/connect.php";
		$contrato = $_POST['cdContrato'];
		$cronogramah = $_POST['cdCronogramah'];
		$mes1 = $_POST['mes1'];
		$mes2 = $_POST['mes2'];
		$mes3 = $_POST['mes3'];
		$mes4 = $_POST['mes4'];
		$mes5 = $_POST['mes5'];
		$mes6 = $_POST['mes6'];
		$mes7 = $_POST['mes7'];
		$mes8 = $_POST['mes8'];
		$mes9 = $_POST['mes9'];
		$mes10 = $_POST['mes10'];
		$mes11 = $_POST['mes11'];
		$mes12 = $_POST['mes12'];
		$obs = $_POST['obs'];
		$SQL = "UPDATE tbcontrato_cronograma SET
			cdContrato = '".$contrato."',
			mes1 = '".$mes1."',
			mes2 = '".$mes2."',
			mes3 = '".$mes3."',
			mes4 = '".$mes4."',
			mes5 = '".$mes5."',
			mes6 = '".$mes6."',
			mes7 = '".$mes7."',
			mes8 = '".$mes8."',
			mes9 = '".$mes9."',
			mes10 = '".$mes10."',
			mes11 = '".$mes11."',
			mes12 = '".$mes12."',
			obs = '".$obs."'	
			WHERE cdCronogramah = ".$cronogramah;
		if(mysqli_query($link,$SQL)){
			echo "<script>alert('Cabeçalho do Cronograma Modificado com Sucesso.');  window.history.back();</script>";
		}else{
			echo "<script>alert('Modificar do Cabeçalho do Cronograma falhou: ".mysqli_error($link)."');  window.close();</script>";
		}
?>