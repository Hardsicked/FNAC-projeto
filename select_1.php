<?php
		session_start();
		$_SESSION['cdempresa'] = $_POST['cdempresa'];
		header ("Location: sel2.php");
?>