<?php
	include "../../php/connect.php";
	
	// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
	$usuario = $_POST['login'];
	$senha = $_POST['senha'];
	// Validação do usuário/senha digitados
	$sql = "SELECT `cdLogin`, `user`, `nome_real`, `p_admin`, SUBSTRING(nome_real, 1, LOCATE(' ', nome_real, 1) - 1) as `nome1`	
			FROM `tblogin` 
			WHERE (`user` = '". $usuario ."') AND (`pass` = '". sha1($senha) ."')";
	$query = mysqli_query($link, $sql)or die (mysqli_error());
	$resultado=mysqli_fetch_assoc($query);
	if (mysqli_num_rows($query) != 1) {
		echo 0;
	} else {
		// Se a sessão não existir, inicia uma
		if (!isset($_SESSION)) 
		session_start();
		// Salva os dados encontrados na sessão
		$_SESSION['cdLogin'] = $resultado['cdLogin'];
		$_SESSION['nome'] = $resultado['nome1'];
		$_SESSION['admin'] = $resultado['p_admin'];
		echo 1;
		exit;
	}