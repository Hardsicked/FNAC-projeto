<?php
	include "../../../php/connect.php";
	$tipo = $_GET["t"];
	$cd = $_GET["c"];
	if($tipo == 1){
		$cdSuperIntendencia = $cd;
		$sql = "DELETE FROM tbsuperintendencia WHERE cdSuperIntendencia='".$cdSuperIntendencia."'";
		if(mysqli_query($link, $sql)){
			echo "<script>alert('Superintendencia deletada com sucesso!');</script>";
		}else{
			echo "Erro ao deletar superintendencia".mysqli_error($link);
		}
	}else{
		if($tipo == 2){
			$cdGerencia = $cd;
			$sql = "DELETE FROM tbgerencia WHERE cdGerencia ='".$cdGerencia."'";
			if(mysqli_query($link, $sql)){
				echo "<script>alert('Gerencia deletada com sucesso!');</script>";
			}else{
				echo "Erro ao deletar gerencia".mysqli_error($link);
			}
		}else{
			$cdSetor = $cd;
			$sql = "DELETE FROM tbsetor WHERE cdSetor='".$cdSetor."'";
			if(mysqli_query($link, $sql)){
				echo "<script>alert('Setor deletado com sucesso!');</script>";
			}else{
				echo "Erro ao deletar setor".mysqli_query($link);
			}
		}
	}
?>