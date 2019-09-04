<?php
	include "../../../php/connect.php";
	$ghe = $_POST['cdghe'];
	$array_risco = $_POST['cdrisco'];
	foreach ($array_risco as $risco){
		$sql = "INSERT INTO tbgherisco (cdGHE,cdRisco) VALUES ('".$ghe."','".$risco."')";
		if(mysqli_query($connect,$sql)){
			echo "<script>alert('Risco cadastrado na GHE com Sucesso.'); window.location='../../../syst.php';</script>";
		}else{
			echo"<script>alert('Empresa Cadastrada com Sucesso.".mysqli_error($connect)."'); window.location='../../../syst.php';</script>";
		}
	}

?>
	