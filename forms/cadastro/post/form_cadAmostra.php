<?php  
	include "../../../php/connect.php";
	$cdFichaQuim = $_POST["cdFichaQuim"];
	$amostra = $_POST["amostra"];
	$sql = "INSERT INTO tbamostra(cdFichaQuim,amostra) VALUES('".$cdFichaQuim."','".$amostra."')";
	if(isset($_POST["btnSave"])){
		if(mysqli_query($link, $sql)){
			echo "Amostra cadastrada com sucesso!";
		}else{
			echo "Erro ao cadastrar amostra".mysqli_error($link);
		}
	}
?>