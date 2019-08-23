<?php
	include "../../php/connect.php";
	
	// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
	if (!empty($_POST) AND (empty($_POST['user']) OR empty($_POST['pass']))) {
		header("Location: ../../index.php"); exit;
	}
	$usuario = mysqli_real_escape_string($link , $_POST['user']);
	$senha = mysqli_real_escape_string($link , $_POST['pass']);
	// Validação do usuário/senha digitados
	$sql = "SELECT `cdLogin`, `user`, `nome_real`, `p_admin`, SUBSTRING(nome_real, 1, LOCATE(' ', nome_real, 1) - 1) as `nome1`	
			FROM `tblogin` 
			WHERE (`user` = '". $usuario ."') AND (`pass` = '". sha1($senha) ."')";
	$query = mysqli_query($link,$sql);
	if (mysqli_num_rows($query) != 1) {
		// Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
		echo "Login inválido!"; exit;
	} else {
	  // Salva os dados encontados na variável $resultado
	  $resultado = mysqli_fetch_assoc($query);
	  // Se a sessão não existir, inicia uma
	  if (!isset($_SESSION)) session_start();
	  // Salva os dados encontrados na sessão
	  $_SESSION['cdLogin'] = $resultado['cdLogin'];
	  $_SESSION['nome'] = $resultado['nome1'];
	  $_SESSION['admin'] = $resultado['p_admin'];
	  // Redireciona o visitante
	  header("Location: ../../sel.php"); exit;
	}