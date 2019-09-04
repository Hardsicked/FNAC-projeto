<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<?php 
 	error_reporting(E_ALL ^ E_DEPRECATED);
	include "../php/connect.php";
	$sql1 = "SELECT * From tbepi";
	$res1 = mysqli_query($connect,$sql1);
	header ('Content-type: text/html; charset=UTF-8');
?>
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/fnac.css">
	<div class="container">
		<div class="row"><div class="col-12"><h3>EPI</h3></div></div>
		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-8"></div>
			<div class="col-md-2">
				<div data-fancybox data-type="ajax" data-src="forms/cadastro/epi.php" href="javascript:;" class="novobotao" style="background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Nova Epi</b></div>
			</div>
		</div>
		<div class="row">
			<div id="tabela" class="col-md-12">
					<table class="table table-striped table-responsive-xl table-sm table-bordered"  style="margin-top: 40px">
						<thead class="thead-light">
							<tr>
								<th>Número de Cadastro</th>
								<th>Tipo do EPI</th>
								<th>Nome</th>
								<th>Fabricante</th>
								<th>Modelo</th>
								<th>CA</th>
								<th>Nível de Proteção</th>
								<th>Modificar EPI</th>
								<th>Excluir EPI</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if ($res1->num_rows > 0){
									while($row1 = mysqli_fetch_assoc($res1)){
										if($row1["tipoEPI"] == 1){
											$tipoepi = "Capacete";
										}else{
											if($row1["tipoEPI"] == 2){
												$tipoepi = "Bota";
											}else{
												if($row1["tipoEPI"] == 3){
													$tipoepi = "Luva";
												}else{
													if($row1["tipoEPI"] == 4){
														$tipoepi = "Protetor Respiratório";
													}else{
														if($row1["tipoEPI"] == 5){
															$tipoepi = "Protetor Auricular";
														}else{
															if($row1["tipoEPI"] == 6){
																$tipoepi = "Óculos";
															}else{
																if($row1["tipoEPI"] == 7){
																	$tipoepi = "Cinto de Segurança";
																}else{
																	$tipoepi = "Vestimentas";
																}
															}
														}
													}
												}
											}
										}
										echo '
											<tr style="background-color: ">
												<td>' . $row1["cdEPI"] . '</td>
												<td>' . $tipoepi . '</td>
												<td>' . $row1["nome"] . '</td>
												<td>' . $row1["fabricante"] . '</td>
												<td>' . $row1["modelo"] . '</td>
												<td>' . $row1["ca"] .  '</td>
												<td>' . $row1["nivelProtecao"] .  '</td>
												<td><img data-fancybox data-type="ajax" data-src="forms/cadastro/edit/edit_epi.php?cd=' . $row1["cdEPI"] . '" href="javascript:;" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png"/></td>
												<td><img data-fancybox data-type="ajax" data-src="forms/cadastro/post/form_delEPI.php?cd=' . $row1["cdEPI"] . '" href="javascript:;" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/delete.png"/></td>
											</tr>
										';
									}
								}
							?>
						<tbody>
					</table>
			</div>
		</div>
	</div>
</html>