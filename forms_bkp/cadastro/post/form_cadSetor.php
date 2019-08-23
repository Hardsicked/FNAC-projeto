<?php
	include "../../../php/connect.php";
	$tipo = $_GET["type"];
	$empid = $_GET["cd"];
	if($tipo == 1){
		$SIntendencia = $_POST["SIntendencia"];
		if(isset($_POST["btnSave"])){
			$sql = "INSERT INTO tbsuperintendencia(superintendencia,cdEmpresa) VALUES('".$SIntendencia."', '".$empid."')";
			if(mysqli_query($link, $sql)){
				echo "<script>alert('Gerência Geral Cadastrada com Sucesso.'); window.location='../../../syst.php';</script>";
			}else{
				echo "Erro ao cadastrar setor".mysqli_error($link);
			}
		}
	}else{
		if($tipo == 2){
			$gerencia = $_POST["gerencia"];
			$cdSI = $_POST["cdSIntendencia"];
			if(isset($_POST["btnSave"])){
			$sql = "INSERT INTO tbgerencia(cdEmpresa,cdSuperIntendencia,gerencia) VALUES('".$empid."', '".$cdSI."', '".$gerencia."')";
				if(mysqli_query($link, $sql)){
					echo "<script>alert('Gerência Cadastrada com Sucesso.'); window.location='../../../syst.php';</script>";
				}else{
					echo "Erro ao cadastrar setor".mysqli_error($link);
				}
			}
		}else{
			$setor = $_POST["setor"];
			$cdGerencia = $_POST["cdGerencia"];
			if(isset($_POST["btnSave"])){
			$sql = "INSERT INTO tbsetor(cdEmpresa,cdGerencia,setor) VALUES('".$empid."', '".$cdGerencia."', '".$setor."')";
				if(mysqli_query($link, $sql)){
					echo "<script>alert('Setor Cadastrado com Sucesso.'); window.location='../../../syst.php';</script>";
				}else{
					echo "Erro ao cadastrar setor".mysqli_error($link);
				}
			}
		}
	}
?>