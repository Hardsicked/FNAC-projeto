<?php  
	include "../../../php/connect.php";
	error_reporting(E_ALL);
	$ficha = $_POST["cdficha"];
	$fichapasta = $_POST["folder"];
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
	$inst = $_POST["inst"];
	$calib = $_POST["calib"];
	$numamos = $_POST["numamos"];
	$bc = $_POST["bc"];
	$tipoamos = $_POST["tipoamos"];
	$subAgente = $_POST["subgrupo"];
	if(!isset($_POST["cdAgente1"])){
		$agente1 = 0;
	}else{
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
	}
	$vazinicial = $_POST["vazinicial"];
	$vazfinal = $_POST["vazfinal"];
	$temp = $_POST["temperatura"];
	$urainicial = $_POST["urainicial"];
	$urafinal = $_POST["urafinal"];
	$colab = $_POST["colab"];
	$colabm = $_POST["colabm"]; 
	$superv = $_POST["superv"];
	$supervm = $_POST["supervm"];
	$aval = $_POST["avali"];
	$avalm = $_POST["avalim"];
	$timeelapsed = 0;
	$folderuniquename = $fichapasta;
		$_UP['pasta'] = '../../../ficha/'.$folderuniquename.'/';
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
			} else {
			  // Não foi possível fazer o upload, provavelmente a pasta está incorreta
			  echo "<br>Não foi possível enviar a imagem, tente novamente";
			}
		} else {
		  // Não foi possível fazer o upload, provavelmente a pasta está incorreta
		  echo "<br>Não foi possível enviar o img, tente novamente";
		}
		$contsql = "SELECT * FROM tbficha_ghe WHERE cdGHE = ".$ghe." AND tipo = 2";
		$contqry = mysqli_query($link,$contsql);
		$dr = $contqry->num_rows + 1;
		$folder = $fichapasta;
		if($agente1 = 0){
			$sql = "UPDATE tbficha_quimico SET
			dataAval = '".$dataaval."',
			hrInicio = '".$hrinicial."',
			hrFinal = '".$hrfinal."',
			intervaloInicial = '".$intinic."',
			intervaloFinal = '".$intfinal."',
			vazaoinicial = '".$vazinicial."',
			vazaoFinal = '".$vazfinal."',
			numAmostrador = '".$numamos."',
			bc = '".$bc."',
			tipoAmos = '".$tipoamos."',
			temp = '".$temp."',
			urainicial = '".$urainicial."',
			urafinal = '".$urafinal."',
			diaTipico = '".$diatipico."',
			justificativa = '".$just."',
			amostraValida = '".$amostraV."',
			cdEpi = '".$epi."',
			cdInstrumento = '".$inst."',
			cdCalibrador = '".$calib."',
			colaborador = '".$colab."',
			colaborador_ma = '".$colabm."',
			supervisor = '".$superv."',
			supervisor_ma = '".$supervm."',
			avaliador = '".$aval."',
			avaliador_ma = '".$avalm."',
			pasta = '".$folder."') 
			WHERE cdFicha = ".$ficha;
		}else{
			$sql = "UPDATE tbficha_quimico SET
			dataAval = '".$dataaval."',
			hrInicio = '".$hrinicial."',
			hrFinal = '".$hrfinal."',
			intervaloInicial = '".$intinic."',
			intervaloFinal = '".$intfinal."',
			vazaoinicial = '".$vazinicial."',
			vazaoFinal = '".$vazfinal."',
			numAmostrador = '".$numamos."',
			bc = '".$bc."',
			tipoAmos = '".$tipoamos."',
			cdSubGrupoA = '".$subAgente."',
			cdAgente1 = '".$agente1."',
			cdAgente2 = '".$agente2."',
			cdAgente3 = '".$agente3."',
			cdAgente4 = '".$agente4."',
			cdAgente5 = '".$agente5."',
			cdAgente6 = '".$agente6."',
			cdAgente7 = '".$agente7."',
			cdAgente8 = '".$agente8."',
			cdAgente9 = '".$agente9."',
			cdAgente10 = '".$agente10."',
			temp = '".$temp."',
			urainicial = '".$urainicial."',
			urafinal = '".$urafinal."',
			diaTipico = '".$diatipico."',
			justificativa = '".$just."',
			amostraValida = '".$amostraV."',
			cdEpi = '".$epi."',
			cdInstrumento = '".$inst."',
			cdCalibrador = '".$calib."',
			colaborador = '".$colab."',
			colaborador_ma = '".$colabm."',
			supervisor = '".$superv."',
			supervisor_ma = '".$supervm."',
			avaliador = '".$aval."',
			avaliador_ma = '".$avalm."',
			pasta = '".$folder."') 
			WHERE cdFicha = ".$ficha;
		}
		if(mysqli_query($link, $sql)){
			echo "<script>alert('Ficha de Quimico Modificada com Sucesso.'); window.close();</script>";
		}else{
			echo "<script>alert('Erro ao Modificar ficha: ".mysqli_error($link)."'); window.close()</script>";
		}
		
		
		
		
		
		
		
		
?>