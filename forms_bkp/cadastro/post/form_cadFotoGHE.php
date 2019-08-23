<?php  
	include "../../../php/connect.php";
	$cdGHE = $_GET["cdGHE"];
	$foto1 = $_POST["foto1"];
	$foto2 = $_POST["foto2"];
	$foto3 = $_POST["foto3"];
	$sql = "INSERT INTO tbfotos(cdGHE,foto1,foto2,foto3) VALUES('".$cdGHE."', '".$foto1."', '".$foto2."', '".$foto3."')";
	if(isset($_POST["btnSave"])){
		if(mysqli_query($link, $sql)){
			echo "Fotos do GHE cadastrada com sucesso";
		}else{
			echo "Erro ao cadastrar fotos do GHE".mysqli_error($link);
		}
	}
?>