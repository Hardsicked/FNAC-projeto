<?php
	require "../php/connect.php";
	$cdqual = $_GET['c'];
	$type = $_GET['t'];
	$sqlQual = "SELECT * FROM tbresultado_qual WHERE cdQualitativo = ".$cdqual;
	$qryQual = mysqli_query($link,$sqlQual);
	foreach($qryQual as $qual){
		if($type == 1){
			echo '<p align="justify">'.$qual['obs'].'</p>';
		}elseif($type == 0){
			echo '<p align="justify">'.$qual['texto'].'</p>';
		}
	}
?>