<?php
	include "../../../php/connect.php";
	$tipo = $_GET["t"];
	$empid = $_GET["e"];
	$identity = $_GET["c"];
	if($tipo == 1){
		$SIntendencia = $_POST["SIntendencia"];
		if(isset($_POST["btnSave"])){
			$sql = "UPDATE tbsuperintendencia SET superintendencia='".$SIntendencia."', cdEmpresa='".$empid."' WHERE cdSuperIntendencia = ".$identity;
			if(mysqli_query($link, $sql)){
				echo "<script>alert('Gerência Geral Modificada com Sucesso.'); window.location='../../../syst.php';</script>";
			}else{
				echo "Erro ao cadastrar setor".mysqli_error($link);
			}
		}
	}else{
		if($tipo == 2){
			$gerencia = $_POST["gerencia"];
			$cdSI = $_POST["cdSIntendencia"];
			if(isset($_POST["btnSave"])){
			$sql = "UPDATE tbgerencia SET cdEmpresa='".$empid."', cdSuperIntendencia='".$cdSI."', gerencia='".$gerencia."' WHERE cdGerencia = ".$identity;
				if(mysqli_query($link, $sql)){
					echo "<script>alert('Gerência Modificiada com Sucesso.'); window.location='../../../syst.php';</script>";
				}else{
					echo "Erro ao cadastrar setor".mysqli_error($link);
				}
			}
		}else{
			$setor = $_POST["setor"];
			$cdGerencia = $_POST["cdGerencia"];
			if(isset($_POST["btnSave"])){
			$sql = "UPDATE tbsetor SET setor cdEmpresa='".$empid."', cdGerencia='".$cdGerencia."', setor='".$setor."' WHERE cdSetor = ".$identity;
				if(mysqli_query($link, $sql)){
					echo "<script>alert('Setor Modificada com Sucesso.'); window.location='../../../syst.php';</script>";
				}else{
					echo "Erro ao cadastrar setor".mysqli_error($link);
				}
			}
		}
	}
?>