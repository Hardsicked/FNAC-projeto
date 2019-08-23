<?php  
	include "../../../php/connect.php";
	$cdSuperIntendencia = $_POST["cdSuperIntendencia"];
	$gerencia = $_POST["gerencia"];
	$sql = "INSERT INTO tbgerencia(cdSuperIntendencia,gerencia) VALUES('".$cdSuperIntendencia."','".$gerencia."')";
	if(isset($_POST["btnSave"])){
		if(mysqli_query($link, $sql)){
			echo "<script>alert('Gerência Cadastrada com Sucesso.')</script>";
		}else{
			echo "Erro ao cadastrar gerencia".mysqli_error($link);
		}
	}
?>