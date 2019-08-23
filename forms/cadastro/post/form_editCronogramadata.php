<?php
		include "../../../php/connect.php";
		$contrato = $_POST['cdContrato'];
		$cronograma = $_POST['cdCronograma'];
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
		$tarefa = $_POST['tarefa'];
		$SQL = "UPDATE tbcontrato_cronograma_t SET
			cdContrato = '".$contrato."',
			nomeTarefa = '".$tarefa."',
			bmes1 = '".$mes1."',
			bmes2 = '".$mes2."',
			bmes3 = '".$mes3."',
			bmes4 = '".$mes4."',
			bmes5 = '".$mes5."',
			bmes6 = '".$mes6."',
			bmes7 = '".$mes7."',
			bmes8 = '".$mes8."',
			bmes9 = '".$mes9."',
			bmes10 = '".$mes10."',
			bmes11 = '".$mes11."',
			bmes12 = '".$mes12."'
			WHERE cdCronograma = ".$cronograma;
		if(mysqli_query($link,$SQL)){
			echo "<script>alert('Tarefa do Cronograma Modificado com Sucesso.');  window.history.back();</script>";
		}else{
			echo "<script>alert('Modificar do Tarefa do Cronograma falhou: ".mysqli_error($link)."');  window.close();</script>";
		}
?>