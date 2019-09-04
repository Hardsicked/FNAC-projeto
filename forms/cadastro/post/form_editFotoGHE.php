<?php  
	include "../../../php/connect.php";
	$cdGHE = $_GET["cdGHE"];
	$foto1 = $_POST["foto1"];
	$foto2 = $_POST["foto2"];
	$foto3 = $_POST["foto3"];
	$sql = "UPDATE tbfotos SET foto1='".$foto1."', foto2='".$foto2."', foto3='".$foto3."' WHERE cdGHE='".$cdGHE."'";
	if(mysqli_query($link, $sql)){
		echo "Fotos do GHE editada com sucesso!";
	}else{
		echo "Erro ao editar fotos do GHE".mysqli_error($link);
	}
?>