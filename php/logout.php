<?php
  session_start(); // Inicia a sessão
  session_destroy(); // Destrói a sessão limpando todos os valores salvos
  unset( $_SESSION["cdLogin"]);
  unset( $_SESSION["nome"]);
  unset( $_SESSION["admin"]);
  unset( $_SESSION["cdempresa"]);
  unset( $_SESSION["cdcontrato"]);
  unset( $_SESSION["cd"]);
  header("Location: ../index.php"); exit; // Redireciona o visitante
?>