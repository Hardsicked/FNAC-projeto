<?php
include "../../../php/connect.php";
	$cargo = $_POST['cdCargos'];
	$campocargo = $_POST['campocargo'];
	$campodesc = $_POST['campodesc'];
	$sql_add = "UPDATE tbcargos SET cargo ='".$campocargo."', descCargo ='".$campodesc."' WHERE cdCargos = '".$cargo."'";
		$insert = mysqli_query($link, $sql_add);
		if($insert){
			echo "<script>alert('Cargo Modificado com Sucesso.'); window.location='../../../syst.php';</script>";
		}else{
			echo "Erro ao Modificar Cargo".mysqli_error($link);
		}
?>