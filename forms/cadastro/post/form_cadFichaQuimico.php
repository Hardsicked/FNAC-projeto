<?php  
	include "../../../php/connect.php";
	error_reporting(E_ALL);
	$ghe = $_POST["ghe"];
	$dataaval = $_POST["dataaval"];
	$hrinicial =  $_POST["hrinicial"];
	$hrfinal = $_POST["hrfinal"];
	$intinic = $_POST["intinic"];
	$intfinal =  $_POST["intfinal"];
	$diatipico = $_POST["diaTipico"];
	$just = $_POST["justificativa"];
	$amostraV = $_POST["amostraValida"];
	$epi = $_POST["epi"];
	$epc = $_POST["EPC"];
	$inst = $_POST["inst"];
	$calib = $_POST["calib"];
	$numamos = $_POST["numamos"];
	$bc = $_POST["bc"];
	$tipoamos = $_POST["tipoamos"];
	$subAgente = $_POST["subgrupo"];
	$agente1 = $_POST["cdAgente1"];
	$agente2 = $_POST["cdAgente2"];
	$agente3 = $_POST["cdAgente3"];
	$agente4 = $_POST["cdAgente4"];
	$agente5 = $_POST["cdAgente5"];
	$agente6 = $_POST["cdAgente6"];
	$agente7 = $_POST["cdAgente7"];
	$agente8 = $_POST["cdAgente8"];
	$agente9 = $_POST["cdAgente9"];
	$agente10 = $_POST["cdAgente10"];
	$vazinicial = floatval ($_POST["vazinicial"]);
	$vazfinal = floatval ($_POST["vazfinal"]);
	$vazMedia = (floatval ($_POST["vazinicial"]) + floatval ($_POST["vazfinal"]))/2;
	$vazPrcnt = (floatval ($_POST["vazinicial"]) + floatval ($_POST["vazfinal"]))/floatval ($_POST["vazinicial"]);
	$temp = $_POST["temperatura"];
	$urainicial = $_POST["urainicial"];
	$urafinal = $_POST["urafinal"];
	$colab = $_POST["colab"];
	$colabm = $_POST["colabm"]; 
	$superv = $_POST["superv"];
	$supervm = $_POST["supervm"];
	$aval = $_POST["avali"];
	$avalm = $_POST["avalim"];
	$folderuniquename = time();
	$pdf = 0;
	mkdir("../../../ficha/".md5($folderuniquename)."/", 0700);
		$_UP['pasta'] = '../../../ficha/'.md5($folderuniquename).'/';
		$pasta = $_UP['pasta'];
		// Tamanho máximo do arquivo (em Bytes)
		$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
		$_UP["tamanhopdf"] = 250000;
		// Array com as extensões permitidas
		$_UP['extensoesimg'] = array('jpg', 'png', 'gif');
		$_UP['extensoespdf'] = array('pdf');
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
				
			} else {
			  // Não foi possível fazer o upload, provavelmente a pasta está incorreta
			  echo "<br>Não foi possível enviar a imagem, tente novamente";
			}
		} else {
		  // Não foi possível fazer o upload, provavelmente a pasta está incorreta
		  echo "<br>Não foi possível enviar o img, tente novamente";
		}
		if (isset($_FILES['pdf'])){
			// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
			if ($_FILES['pdf']['error'] != 0) {
				echo "<script>alert('Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES['pdf']['error']]. "');</script>";
				die();
			}
			// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
			// Faz a verificação da extensão do arquivo
			$extensao3 = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
			if (array_search($extensao3, $_UP['extensoespdf']) === false) {
			  echo "Por favor, envie arquivos pdf!";
			  exit;
			}
			// Faz a verificação do tamanho do arquivo
			if ($_UP['tamanhopdf'] < $_FILES['pdf']['size']) {
			  echo "O PDF enviado é muito grande, envie arquivos de até 25Mb.";
			  exit;
			}
			// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
			// Primeiro verifica se deve trocar o nome do arquivo
			if ($_UP['renomeiapdf'] == true) {
			  // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
			  $GLOBALS['nome_final'] = md5($folderuniquename).'.'.$extensao3;
			} else {
			  // Mantém o nome original do arquivo
			  $GLOBALS['nome_final'] = $_FILES['pdf']['name'];
			}
			  
			// Depois verifica se é possível mover o arquivo para a pasta escolhida
			if (move_uploaded_file($_FILES['pdf']['tmp_name'], $_UP['pasta'] . $GLOBALS['nome_final'])) {
				echo"<script>alert('Aguarde o upload dos arquivos');</script>";
				$pdf = md5($folderuniquename).'.'.$extensao3;
			  // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
				
			} else {
				// Não foi possível fazer o upload, provavelmente a pasta está incorreta
				
				echo "<br>Não foi possível enviar o pdf, tente novamente";
			}
		}
		$contsql = "SELECT * FROM tbficha_ghe WHERE cdGHE = ".$_POST["ghe"]." AND tipo = 2 ORDER BY DR DESC LIMIT 1";
		$contqry = mysqli_query($link,$contsql);
		foreach($contqry as $sqldr){
			$dr = $sqldr['DR'] + 1;
		}
		$folder = md5($folderuniquename);
		$sql = "INSERT INTO tbficha_quimico(
		dataAval,
		hrInicio,
		hrFinal,
		intervaloInicial,
		intervaloFinal,
		tempoDeMedicao,
		vazaoinicial,
		vazaoFinal,
		vazaoMedia,
		vazaoPrcnt,
		numAmostrador,
		bc,
		tipoAmos,
		cdSubGrupoA,
		cdAgente1,
		cdAgente2,
		cdAgente3,
		cdAgente4,
		cdAgente5,
		cdAgente6,
		cdAgente7,
		cdAgente8,
		cdAgente9,
		cdAgente10,
		temp,
		urainicial,
		urafinal,
		diaTipico,
		justificativa,
		amostraValida,
		cdEpi,
		EPC,
		cdInstrumento,
		cdCalibrador,
		colaborador,
		colaborador_ma,
		supervisor,
		supervisor_ma,
		avaliador,
		avaliador_ma,
		pasta,
		pdfname,
		file1,
		file2) 
		VALUES(
		'".$dataaval."',
		'".$hrinicial."',
		'".$hrfinal."',
		'".$intinic."',
		'".$intfinal."',
		TIMEDIFF(TIMEDIFF('".$hrfinal."','".$hrinicial."'),TIMEDIFF('".$intfinal."','".$intinic."')),
		'".$vazinicial."',
		'".$vazfinal."',
		'".$vazMedia."',
		'".$vazPrcnt."',
		'".$numamos."',
		'".$bc."',
		'".$tipoamos."',
		'".$subAgente."',
		'".$agente1."',
		'".$agente2."',
		'".$agente3."',
		'".$agente4."',
		'".$agente5."',
		'".$agente6."',
		'".$agente7."',
		'".$agente8."',
		'".$agente9."',
		'".$agente10."',
		'".$temp."',
		'".$urainicial."',
		'".$urafinal."',
		'".$diatipico."',
		'".$just."',
		'".$amostraV."',
		'".$epi."',
		'".$epc."',
		'".$inst."',
		'".$calib."',
		'".$colab."',
		'".$colabm."',
		'".$superv."',
		'".$supervm."',
		'".$aval."',
		'".$avalm."',
		'".$folder."',
		'".$pdf."',
		'".$arquivo1."',
		'".$arquivo2."')";
		if(mysqli_query($link, $sql)){
			$idruido = $link->insert_id;
			$sql1 = "INSERT INTO tbficha_ghe(cdGHE,cdFicha,tipo,DR) VALUES('".$ghe."','".$idruido."',2,'".$dr."')";
			if(mysqli_query($link, $sql1)){
				echo "<script>alert('Ficha de Quimico Cadastrado com Sucesso.'); window.close();</script>";
			}else{
				echo "<script>alert('Erro ao cadastrar ficha: ".mysqli_error($link)."'); window.close()</script>";
			}
		}else{
			echo "<script>alert('Erro ao cadastrar ficha: ".mysqli_error($link)."'); window.close()</script>";
		}
		
		
		
		
		
		
		
		
?>