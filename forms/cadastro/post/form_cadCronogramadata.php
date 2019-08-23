<?php
		include "../../../php/connect.php";
		$contrato = $_POST['cdContrato'];
		$tarefa = $_POST['tarefa'];
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
		$SQL = "INSERT INTO tbcontrato_cronograma_t ( 
			cdContrato,
			nomeTarefa,
			bmes1,
			bmes2,
			bmes3,
			bmes4,
			bmes5,
			bmes6,
			bmes7,
			bmes8,
			bmes9,
			bmes10,
			bmes11,
			bmes12			
			) VALUES (
			'".$contrato."',
			'".$tarefa."',
			'".$mes1."',
			'".$mes2."',
			'".$mes3."',
			'".$mes4."',
			'".$mes5."',
			'".$mes6."',
			'".$mes7."',
			'".$mes8."',
			'".$mes9."',
			'".$mes10."',
			'".$mes11."',
			'".$mes12."')";
		if(mysqli_query($link,$SQL)){
			echo "<script>alert('Tarefa do Cronograma Cadastrada com Sucesso.');  window.history.back();</script>";
		}else{
			echo "<script>alert('Cadastro da Tarefa do Cronograma falhou: ".mysqli_error($link)."');  window.close();</script>";
		}
?>