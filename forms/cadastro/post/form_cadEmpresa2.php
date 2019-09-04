<?php  
	include "../../../php/connect.php";
	$nmEmpresa = $_POST["nmEmpresa"];
	$endereco = $_POST["endereco"];
	$razaoSocial = $_POST["razaoSocial"];
	$nmFantasia = $_POST["nmFantasia"];
	$cnpj = $_POST["cnpj"];
	$cep = $_POST["cep"];
	$pasta = '../../../img_empresas/';
	print_r($_FILES);
	// Check if image file is a actual image or fake image
	// Pasta onde o arquivo vai ser salvo
		$_UP['pasta'] = '../../../img_empresas/';
		// Tamanho máximo do arquivo (em Bytes)
		$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
		// Array com as extensões permitidas
		$_UP['extensoes'] = array('jpg', 'png', 'gif');
		// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
		$_UP['renomeia'] = true;
		// Array com os tipos de erros de upload do PHP
		$_UP['erros'][0] = 'Não houve erro';
		$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
		$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
		$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
		$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
		// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
		if ($_FILES['fileUpload']['error'] != 0) {
		  die("Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES['fileUpload']['error']]);
		  exit; // Para a execução do script
		}
		// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
		// Faz a verificação da extensão do arquivo
		$extensao = pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION);
		if (array_search($extensao, $_UP['extensoes']) === false) {
		  echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
		  exit;
		}
		// Faz a verificação do tamanho do arquivo
		if ($_UP['tamanho'] < $_FILES['fileUpload']['size']) {
		  echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
		  exit;
		}
		// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
		// Primeiro verifica se deve trocar o nome do arquivo
		if ($_UP['renomeia'] == true) {
		  // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
		  $GLOBALS['nome_final'] = md5(time()).'.'.$extensao;
		} else {
		  // Mantém o nome original do arquivo
		  $GLOBALS['nome_final'] = $_FILES['fileUpload']['name'];
		}
		  
		// Depois verifica se é possível mover o arquivo para a pasta escolhida
		if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $_UP['pasta'] . $GLOBALS['nome_final'])) {
		  // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
		  echo "Upload efetuado com sucesso!";
		} else {
		  // Não foi possível fazer o upload, provavelmente a pasta está incorreta
		  echo "Não foi possível enviar o arquivo, tente novamente";
		}
	$fileloc = $GLOBALS['nome_final'];
	if($_POST["nmEmpresa"] || $_POST["endereco"] || $_POST["razaoSocial"] || $_POST["nmFantasia"] || $_POST["cnpj"]){
		$sql = "INSERT INTO tbempresa(arquivo,nomeEmpresa,endereco,razaoSocial,nomeFantasia,cnpj,cep) values('".$fileloc."','".$nmEmpresa."','".$endereco."','".$razaoSocial."','".$nmFantasia."','".$cnpj."','".$cep."')";
		if(mysqli_query($link,$sql)){
			echo "<script>alert('Empresa Cadastrada com Sucesso.'); location.reload();</script>";
		}else{
			echo "Erro ao Cadastrar Empresa".mysqli_error($link);
		}
	}

?>