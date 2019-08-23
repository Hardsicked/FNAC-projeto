<?php
	// include autoloader
	require_once 'dompdf/autoload.inc.php';
	use Dompdf\Dompdf;

	
	$dompdf = new Dompdf();
	
	$dompdf->load_html('
		<h1>Edson Arantes do Nascimento</h1>
	');
	
	$dompdf->setPaper('A4', 'horizontal');
	
	$dompdf->render();
	
	$dompdf->stream(
		"relatorio_lks.pdf",
		array(
			"Attachment" => false
		)
	);
?>