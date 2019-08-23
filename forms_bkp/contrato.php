<html lang="en">
<?php
	error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE ^ E_WARNING);
	if (!isset($_SESSION)) session_start();
	$empid = $_SESSION["cdempresa"];
	include "../php/connect.php";
	$sql4 = "SELECT cdEmpresa,nomeEmpresa FROM tbempresa WHERE cdEmpresa = " . $empid;
	$res4 = mysqli_query($link,$sql4);	
	$sql3 = "SELECT cdEmpresa,nomeEmpresa FROM tbempresa WHERE cdEmpresa = " . $empid;
	$res3 = mysqli_query($link,$sql3);
	$sql2 = "SELECT * From tbcontrato WHERE cdEmpresa = " . $empid;
	$res2 = mysqli_query($link,$sql2);
?>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<h4>Contratos da Empresa : <?php while ($resul3 = mysqli_fetch_assoc($res3)){echo $resul3["nomeEmpresa"];}?></h4>
			</div>
			<div class="col-md-5"></div>
			<div class="col-md-4">
				<div data-fancybox data-type="ajax" data-src="forms/cadastro/contrato.php?cd=<?php echo $empid; ?>" href="javascript:;"  class="novobotao text-center"><b>Novo Contrato</b></div>
			</div>
		</div>
	</div>
		<table class="table-bordered table table-light table-responsive table-sm" style="margin-top: 40px; padding-bottom: 50px;" >
			<thead class="thead-light">
				<tr class="text-center">
					<th class="text-center">Código do contrato</th>
					<th class="text-center">Nome da Empresa</th>
					<th class="text-center">CNAE</th>
					<th class="text-center">Grau de risco da empresa</th>
					<th class="text-center">Número</th>
					<th class="text-center">Responsável</th>
					<th class="text-center">Data Inicial da Validade do Programa Legal</th>
					<th class="text-center">Data Final da Validade do Programa Legal</th>
					<th class="text-center">Descrição do contrato</th>
					<th class="text-center">Valor</th>
					<th class="text-center">Data Inicial de Execução</th>
					<th class="text-center">Data Final de Execução</th>
					<th class="text-center">Equipe Envolvida</th>
					<th class="text-center">LTCAT</th>
					<th class="text-center">PPRA Quantitativo</th>
					<th class="text-center">PPRA Inserção Direta</th>
					<th class="text-center">PPRA Qualitativo</th>
					<th class="text-center">Gestão</th>
					<th class="text-center">Medições Ambientais</th>
					<th class="text-center">Resumo</th>
					<th class="text-center">Editar Contrato</th>
					<th class="text-center">Excluir Contrato</th>
				</tr>
			</thead>
			<tbody>
			<?php
				if($res2->num_rows > 0){
					while ($row4 = mysqli_fetch_assoc($res4)){
						while($row2 = mysqli_fetch_assoc($res2)){
								if($row2["LTCAT"] == true){
									$LTCAT = "true.png";
								}else{
									$LTCAT = "false.png";
								}
								if($row2["PPRA_quant"] == true){
									$PPRAQN = "true.png";
								}else{
									$PPRAQN = "false.png";
								}
								if($row2["PPRA_direta"] == true){
									$PPRADI = "true.png";
								}else{
									$PPRADI = "false.png";
								}
								if($row2["PPRA_qualit"] == true){
									$PPRAQU = "true.png";
								}else{
									$PPRAQU = "false.png";
								}
								if($row2["gestao"] == true){
									$gestao = "true.png";
								}else{
									$gestao = "false.png";
								}
								if($row2["med_ambient"] == true){
									$medamb = "true.png";
								}else{
									$medamb = "false.png";
								}
								echo '
									<tr>
										<td class="text-center"><a target="_blank" href="dompdf/index.php?z='.$row2["cdContrato"].'&x='.$row4["cdEmpresa"].'">' . $row2["cdContrato"] . '</a></td>
										<td class="text-center">' . $row4["nomeEmpresa"] . '</td>
										<td class="text-center">' . $row2["CNAE"] . '</td>
										<td class="text-center">' . $row2["risco_empresa"] . '</td>
										<td class="text-center">' . $row2["unidade"] . '</td>
										<td class="text-center">' . $row2["responsavelEmpresa"] . '</td>
										<td class="text-center">' . $row2["v_data_inicial"] .  '</a></td>
										<td class="text-center">' . $row2["v_data_final"] . '</td>
										<td class="text-center"><img class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/document.png" data-fancybox data-type="ajax" data-src="forms/info/desc_contrato.php?cd=' . $row2["cdContrato"] . '" href="javascript:;"/></td>
										<td class="text-center">' . $row2["valor"] . '</td>
										<td class="text-center">' . $row2["exec_data_inicial"] . '</td>
										<td class="text-center">' . $row2["exec_data_final"] . '</td>
										<td class="text-center"><img class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/document.png" data-fancybox data-type="ajax" data-src="forms/info/contrato_equipe.php?cd=' . $row2["cdContrato"] . '" href="javascript:;"/></td>
										<td class="text-center"><img width="24px" height="24px" src="img/icons/' . $LTCAT . '"/></td>
										<td class="text-center"><img width="24px" height="24px" src="img/icons/' . $PPRAQN . '"/></td>
										<td class="text-center"><img width="24px" height="24px" src="img/icons/' . $PPRADI . '"/></td>
										<td class="text-center"><img width="24px" height="24px" src="img/icons/' . $PPRAQU . '"/></td>
										<td class="text-center"><img width="24px" height="24px" src="img/icons/' . $gestao . '"/></td>
										<td class="text-center"><img width="24px" height="24px" src="img/icons/' . $medamb . '"/></td>
										<td class="text-center"><img class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/document.png" data-fancybox data-type="ajax" data-src="forms/info/contrato_resumo.php?cd=' . $row2["cdContrato"] . '" href="javascript:;"/></td>
										<td class="text-center"><img class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png" data-fancybox data-type="ajax" data-src="forms/cadastro/edit/edit_contrato.php?p=' . $row2["cdContrato"] . '&cd='.$empid.'" href="javascript:;"/></td>
										<td class="text-center"><img class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/false.png" data-fancybox data-type="ajax" data-src="forms/cadastro/post/form_delContrato.php?cd=' . $row2["cdContrato"] . '" href="javascript:;"/></td>
									</tr>
								';
						}
					}
				}else{
					echo'
						<tr>
							<td colspan="22" class="text-center" >Nenhum Contrato encontrado</td>
						</tr>
						';
				}
			?>
			</tbody>
		</table>
</body>
</html>