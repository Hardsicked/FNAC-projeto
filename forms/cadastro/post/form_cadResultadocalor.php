<?php

		include "../../../php/connect.php";
		$ghe = $_POST['ghe'];
		$risco = $_POST['risco'];
		$pontom = $_POST['pontom'];
		$tarefa = $_POST['tarefa'];
		$obs = $_POST['observacao'];
		$cargasolar = $_POST['cargasolar'];
		$tempoexec = $_POST['tempoexec'];
		$tg = str_replace(",",".",$_POST['tg']);
		$tbn = str_replace(",",".",$_POST['tbn']);
		$tbs = str_replace(",",".",$_POST['tbs']);
		$ibutg = str_replace(",",".",$_POST['tg']);
		$metabolica = $_POST['metabolica'];
		$gfip = $_POST['gfip'];	
		$SQL = "INSERT INTO tbresultado_calor (
			cdGHE,
			cdRisco,
			tarefa,
			pontoDeMedicao,
			observacao,
			cargasolar,
			tempoexec,
			tg,
			tbn,
			tbs,
			ibutg,
			metabolica,
			gfip
			) VALUES (
			'".$ghe."',
			'".$risco."',
			'".$tarefa."',
			'".$pontom."',
			'".$obs."',
			'".$cargasolar."',
			'".$tempoexec."',
			'".$tg."',
			'".$tbn."',
			'".$tbs."',
			'".$ibutg."',
			'".$metabolica."',
			'".$gfip."')";
		if(mysqli_query($link,$SQL)){
			echo "<script>alert('Resultado de Calor Cadastrado com Sucesso.'); window.history.back();</script>";
		}else{
			echo "<script>alert('Cadastro do resultado falhou: ".mysqli_error($link)."'); window.close();</script>";
		}
?>