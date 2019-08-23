<?php
		session_start();
		$_SESSION["cdcontrato"] = $_POST["cdcontrato"];
		header ("Location: syst.php");
?>