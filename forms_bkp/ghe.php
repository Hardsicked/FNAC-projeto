<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<?php 
 	error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);
	include "../php/connect.php";
	session_start();
	$empid = $_SESSION["cdempresa"];
	$contrato = $_SESSION["cdcontrato"];
	$sql1 = "SELECT * From tbghe WHERE cdContrato = ".$contrato." AND cdEmpresa = ".$empid;
	$res1 = mysqli_query($connect,$sql1);
	header ('Content-type: text/html; charset=UTF-8');
?>
<script>
	function novaghe() {
		window.open("forms/cadastro/ghe_aux1.php?c=<?php echo $empid;?>&cid=<?php echo $contrato;?>",null,"height=900,width=800,status=no,toolbar=no,menubar=no,location=no");
	}
</script>
	<div class="container-fluid">
		<div class="row"><div class="col-12"><h3>GHE</h3></div></div>
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8"></div>
			<div class="col-2">
				<div onclick="novaghe()" class="novobotao" style="background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Nova GHE</b></div>
			</div>
		</div>
		<div class="row">
			<div id="tabela" class="col-md-12">
				<table class="table table-striped table-responsive-xl table-sm table-bordered"  style="margin-top: 40px">
					<thead class="thead-light">
						<tr>
							<th>Código</th>							
							<th>Código Único de GHE</th>
							<th>Contrato</th>
							<th>Nome</th>
							<th>Número de Empregados</th>
							<th>Jornada de Trabalho</th>
							<th>Descrição do Trabalho</th>
							<th>Tipo de GHE</th>
							<th>Cargos</th>
							<th>Riscos</th>
							<th>Modificar</th>
							<th>Excluir</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if ($res1->num_rows > 0){
								while($row = mysqli_fetch_assoc($res1)){
									$sql2 = "SELECT * From tbcontrato WHERE cdContrato = " . $row["cdContrato"];
									$res2 = mysqli_query($connect,$sql2);
									if($row["tipoCont"] == 1){
										$tipoGHE = "LTCAT";
									}else{
										if($row["tipoCont"] == 2){
											$tipoGHE = "PPRA Quantitativo";
										}else{
											if($row["tipoCont"] == 3){
												$tipoGHE = "PPRA Inserção Direta";
											}else{
												$tipoGHE = "PPRA Qualitativo";
											}
										}
									}
									while($row2 = mysqli_fetch_assoc($res2)){
										$sql3 = "SELECT * From tbempresa WHERE cdEmpresa = " . $row2["cdEmpresa"];
										$res3 = mysqli_query($connect,$sql3);
										while($row3 = mysqli_fetch_assoc($res3)){
											$contrato = $row3["nomeEmpresa"] . $row2["cdContrato"];
											echo '
												<tr style="background-color: ">
													<td>' . $row["cdGHE"] . '</td>
													<td>' . $row["codGHE"] . '</td>
													<td>' . $row3["nomeEmpresa"] . '-' . $contrato . '</td>
													<td>' . $row["nomeGHE"] . '</td>
													<td>' . $row["numEmpregados"] . '</td>
													<td><img src="img/icons/info.png" width="24px" height="24px" data-fancybox data-type="ajax" data-src="forms/info/ghe_jorn_trab.php?ghe=' . $row["cdGHE"] . '" href="javascript:;" class="icone2"/></td>
													<td><img src="img/icons/info.png" width="24px" height="24px" data-fancybox data-type="ajax" data-src="forms/info/ghe_desc_trab.php?ghe=' . $row["cdGHE"] . '" href="javascript:;" class="icone2"/></td>
													<td>' . $tipoGHE .  '</td>
													<td><img src="img/icons/info.png" width="24px" height="24px" data-fancybox data-type="ajax" data-src="forms/info/ghe_cargos.php?ghe=' . $row["cdGHE"] . '" href="javascript:;" class="icone2"/></td>
													<td><img src="img/icons/info.png" width="24px" height="24px" data-fancybox data-type="ajax" data-src="forms/info/ghe_risco.php?cd=' . $row["cdGHE"] . '" href="javascript:;" class="icone2"/></td>
													<td><img src="img/icons/edit.png" width="24px" height="24px" data-fancybox data-type="ajax" data-src="forms/cadastro/edit/edit_ghe.php?cd='.$empid.'&cid='.$row['cdContrato'].'&ghe='.$row["cdGHE"].'" href="javascript:;" class="icone2"/></td>
													<td><img src="img/icons/delete.png" width="24px" height="24px" data-fancybox data-type="ajax" data-src="forms/cadastro/post/form_delGHE.php?cd=' . $row["cdGHE"] . '" href="javascript:;" class="icone2"/></td>
												</tr>
											';
										}
									}
								}
							}else{
								echo '
									<tr style="background-color: ">
										<td colspan="13">Nehnuma GHE Cadastrada</td>
									</tr>
								';
							}
						?>
					<tbody>
				</table>
			</div>
		</div>
	</div>
</html>