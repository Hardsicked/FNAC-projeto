<?php
include "../../../php/connect.php";
	$campoghe = $_POST['campoghe'];
	$campocargo = $_POST['campocargo'];
	$campodesc = $_POST['campodesc'];
	$sql_add = "INSERT INTO tbcargos(cdGHE,cargo,descCargo) VALUES('".$campoghe."','".$campocargo."','".$campodesc."')";
		$insert = mysqli_query($link, $sql_add);
		if($insert){
			echo "<script>alert('Cargo Cadastrado com Sucesso.'); window.location='../../../syst.php';</script>";
		}else{
			echo "Erro ao cadastrar Sub Grupo".mysqli_error($link);
		}
?>