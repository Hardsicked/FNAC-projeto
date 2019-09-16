<?php  
	include "../../../php/connect.php";
	error_reporting(E_ALL);
	$ghe = $_POST["ghe"];
	$dataaval = $_POST["dataaval"];
	$diatipico = $_POST["diaTipico"];
	$just = $_POST["justificativa"];
	$amostraV = $_POST["amostraValida"];
	$epi = $_POST["epi"];
	$agente = $_POST["agente"];
	$colab = $_POST["colab"];
	$colabm = $_POST["colabm"]; 
	$superv = $_POST["superv"];
	$supervm = $_POST["supervm"];
	$aval = $_POST["avali"];
	$avalm = $_POST["avalim"];
	$folderuniquename = time();
	mkdir("../../..//ficha/".md5($folderuniquename)."/", 0700);
		$_UP['pasta'] = '../../../ficha/'.md5($folderuniquename).'/';
		$pasta = $_UP['pasta'];
		// Tamanho máximo do arquivo (em Bytes)
		$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
		$_UP["tamanhopdf"] = 250000;
		// Array com as extensões permitidas
		$_UP['extensoesimg'] = array('jpg', 'png', 'gif',);
		$_UP['extensoespdf'] = 'pdf';
		$_UP['renomeiaimg'] = true;
		$_UP['renomeiapdf'] = true;
		// Array com os tipos de erros de upload do PHP
		$_UP['erros'][0] = 'Não houve erro';
		$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
		$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
		$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
		$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
		// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
		
		
		if ($_FILES['img1']['error'] != 0) {
		  die("Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES['img1']['error']]);
		  exit; // Para a execução do script
		}
		// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
		// Faz a verificação da extensão do arquivo
		$extensao1 = pathinfo($_FILES['img1']['name'], PATHINFO_EXTENSION);
		if (array_search($extensao1, $_UP['extensoesimg']) === false) {
		  echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
		  exit;
		}
		// Faz a verificação do tamanho do arquivo
		if ($_UP['tamanho'] < $_FILES['img1']['size']) {
		  echo "A imagem 1 enviada é muito grande, envie arquivos de até 2Mb.";
		  exit;
		}
		// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
		// Primeiro verifica se deve trocar o nome do arquivo
		if ($_UP['renomeiaimg'] == true) {
		  // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
		  $GLOBALS['img1'] = '1.'.$extensao1;
		} else {
		  // Mantém o nome original do arquivo
		  $GLOBALS['img1'] = $_FILES['renomeiaimg']['name'];
		}
		  
		// Depois verifica se é possível mover o arquivo para a pasta escolhida
		if (move_uploaded_file($_FILES['img1']['tmp_name'], $_UP['pasta'] . $GLOBALS['img1'])) {
		  // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
			if ($_FILES['img2']['error'] != 0) {
				die("Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES['img2']['error']]);
				exit; // Para a execução do script
			}
			// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
			// Faz a verificação da extensão do arquivo
			$extensao2 = pathinfo($_FILES['img2']['name'], PATHINFO_EXTENSION);
			if (array_search($extensao2, $_UP['extensoesimg']) === false) {
			  echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
			  exit;
			}
			// Faz a verificação do tamanho do arquivo
			if ($_UP['tamanho'] < $_FILES['img2']['size']) {
			  echo "A imagem 2 enviada é muito grande, envie arquivos de até 2Mb.";
			  exit;
			}
			// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
			// Primeiro verifica se deve trocar o nome do arquivo
			if ($_UP['renomeiaimg'] == true) {
			  // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
			  $GLOBALS['img2'] = '2.'.$extensao2;
			} else {
			  // Mantém o nome original do arquivo
			  $GLOBALS['img2'] = $_FILES['renomeiaimg']['name'];
			}
			  
			// Depois verifica se é possível mover o arquivo para a pasta escolhida
			if (move_uploaded_file($_FILES['img2']['tmp_name'], $_UP['pasta'] . $GLOBALS['img2'])) {
			  // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
					  if ($_FILES['fileUpload']['error'] != 0) {
					  die("Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES['pdf']['error']]);
					  exit; // Para a execução do script
					}
					// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
					// Faz a verificação da extensão do arquivo
					$extensao3 = pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION);
					if ($extensao3 != $_UP['extensoespdf']) {
					  echo "Por favor, envie arquivos pdf!";
					  exit;
					}
					// Faz a verificação do tamanho do arquivo
					if ($_UP['tamanhopdf'] < $_FILES['fileUpload']['size']) {
					  echo "O PDF enviado é muito grande, envie arquivos de até 25Mb.";
					  exit;
					}
					// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
					// Primeiro verifica se deve trocar o nome do arquivo
					if ($_UP['renomeiapdf'] == true) {
					  // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
					  $GLOBALS['nome_final'] = md5(time()).'.'.$extensao3;
					} else {
					  // Mantém o nome original do arquivo
					  $GLOBALS['nome_final'] = $_FILES['fileUpload']['name'];
					}
					  
					// Depois verifica se é possível mover o arquivo para a pasta escolhida
					if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $_UP['pasta'] . $GLOBALS['nome_final'])) {
						echo"<script>alert('Aguarde o upload dos arquivos');</script>";
					  // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
						
					} else {
						 // Não foi possível fazer o upload, provavelmente a pasta está incorreta
						echo "<br>Não foi possível enviar o pdf, tente novamente";
					}
				
			} else {
			  // Não foi possível fazer o upload, provavelmente a pasta está incorreta
			  echo "<br>Não foi possível enviar a imagem, tente novamente";
			}
		} else {
		  // Não foi possível fazer o upload, provavelmente a pasta está incorreta
		  echo "<br>Não foi possível enviar o img, tente novamente";
		}
		$pdf = $GLOBALS['nome_final'];
		$contsql = "SELECT * FROM tbficha_ghe WHERE cdGHE = ".$ghe." AND tipo = 5";
		$contqry = mysqli_query($link,$contsql);
		$dr = $contqry->num_rows + 1;
		$folder = md5($folderuniquename);
		$sql = "INSERT INTO tbficha_quali(dataAval,diaTipico,justificativa,amostraValida,cdEpi,cdAgente,colaborador,colaborador_ma,supervisor,supervisor_ma,avaliador,avaliador_ma,pasta,pdfname) VALUES('".$dataaval."','".$diatipico."','".$just."','".$amostraV."','".$epi."','".$agente."','".$colab."','".$colabm."','".$superv."','".$supervm."','".$aval."','".$avalm."','".$folder."','".$pdf."')";
		if(mysqli_query($link, $sql)){
			$idruido = $link->insert_id;
			$sql1 = "INSERT INTO tbficha_ghe(cdGHE,cdFicha,tipo,DR) VALUES('".$ghe."','".$idruido."',5,'".$dr."')";
			if(mysqli_query($link, $sql1)){
				echo "<script>alert('Ficha de Ruído Cadastrado com Sucesso.'); window.close();</script>";
			}else{
				echo "<script>alert('Erro ao cadastrar ficha: ".mysqli_error($link)."'); window.close()</script>";
			}
		}else{
			echo "<script>alert('Erro ao cadastrar ficha: ".mysqli_error($link)."'); window.close()</script>";
		}
		
		
		
		
		
		
		
		
?>