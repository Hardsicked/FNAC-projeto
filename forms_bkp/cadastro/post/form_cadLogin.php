<?php  
	include "../../../php/connect.php";
	$nome_real = $_POST["nome_real"];
	$user = $_POST["user"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	$telefone = $_POST["telefone"];
	$endereco = $_POST["endereco"];
	$data_cad = $_POST["data_cad"];
	$p_read = $_POST["p_read"];
	$p_write = $_POST["p_write"];
	$p_caduser = $_POST["p_caduser"];
	$p_admin = $_POST["p_admin"];
	$sql = "INSERT INTO tblogin(nome_real,user,pass,email,telefone,endereco,data_cad,p_read,p_write,p_caduser,p_admin) VALUES('".$nome_real."', '".$user."', '".$password."', '".$email."', '".$telefone."', '".$endereco."' ,'".$data_cad."', '".$p_read."', '".$p_write."', '".$p_caduser."', '".$p_admin."')";
	if(isset($_POST["btnSave"])){
		if(mysqli_query($link, $sql)){
			echo "Login cadastrado com sucesso";
		}else{
			echo "Erro ao cadastrar login".mysqli_error($link);
		}
	}
?>