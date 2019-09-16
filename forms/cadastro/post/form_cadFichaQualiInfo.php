<?php  
	include "../../../php/connect.php";
	$ficha = $_POST["ficha"];
	$atividade = $_POST["descativ"];
	$local = $_POST["local"];
	$hrinicial = $_POST["inicio"];
	$hrfinal = $_POST["termino"];
	$fonte = $_POST["fonte"];
	$sql = "INSERT INTO tbficha_quali_info(cdFicha,ativ,local,horaInicial,horaFinal,Fonte) VALUES('".$ficha."','".$atividade."','".$local."','".$hrinicial."','".$hrfinal."','".$fonte."')";
	if(mysqli_query($link, $sql)){
		echo "<script>alert('Informação da Ficha Qualitativa Cadastrado com Sucesso.'); window.close();</script>";
	}else{
		echo "Erro ao cadastrar ficha".mysqli_error($link);
	}
	
?>