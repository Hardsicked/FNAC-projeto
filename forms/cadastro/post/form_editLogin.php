<?php  
	include "../../../php/connect.php";
	$cdLogin = $_GET["cdLogin"];
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
	$sql = "UPDATE tblogin SET nome_real='".$nome_real."', user='".$user."', pass='".$password."', email='".$email."', telefone='".$telefone."', endereco='".$endereco."', data_cad='".$data_cad."', p_read='".$p_read."', p_write='".$p_write."', p_caduser='".$p_caduser."', p_admin='".$p_admin."' WHERE cdLogin='".$cdLogin."'";
	if(mysqli_query($link, $sql)){
		echo "Login editado com sucesso!";
	}else{
		echo "Erro ao editar login".mysqli_error($link);
	}
?>