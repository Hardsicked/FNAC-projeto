<?php 
	include "../php/connect.php";
	session_start();
	$pri_admin = $_SESSION["admin"];
	$empid = $_SESSION["cdempresa"];	
	$sql1 = "SELECT * From tbempresa WHERE cdEmpresa = ". $empid;
	$res1 = mysqli_query($connect,$sql1);
	$sql2 = "SELECT * From tbempresa WHERE NOT cdEmpresa = ". $empid;
	$res2 = mysqli_query($connect,$sql2);
?>

	<div class="container" >
		<div class="row"><div class="col-12"><h3>Empresas</h3></div></div>
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8"></div>
			<div class="col-2">
				<div data-fancybox data-type="ajax" data-src="forms/cadastro/empresa.php" href="javascript;;" style="margin-top: 8px; background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Nova Empresa</b></div>
			</div>
		</div>
		<div class="row"">
			<div id="tabela" class="col-12">
					<table class="table table-striped table-responsive table-sm table-bordered" style="margin-top: 20px;">
						<thead class="thead-light">
							<tr>
								<th class="text-center">Cadastro</th>
								<th class="text-center">Logo</th>
								<th class="text-center">Nome da Empresa</th>
								<th class="text-center">Endereço</th>
								<th class="text-center">Razão Social</th>
								<th class="text-center">Nome Fantasia</th>
								<th class="text-center">CNPJ</th>
								<th class="text-center">CEP</th>
								<th class="text-center">Setores</th>
								<th class="text-center">Alterar</th>
								<th class="text-center">Excluir</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if ($res1->num_rows > 0){
									while($row = mysqli_fetch_assoc($res1)){
										echo '
											<tr style="background-color: ">
												<td class="text-center">' . $row["cdEmpresa"] . '</td>
												<td class="text-center"><img width="50px" src="img_empresas/' . $row["arquivo"] . '" /></td>
												<td class="text-center">' . $row["nomeEmpresa"] . '</td>
												<td class="text-center">' . $row["endereco"] . '</td>
												<td class="text-center">' . $row["razaoSocial"] . '</td>
												<td class="text-center">' . $row["nomeFantasia"] . '</td>
												<td class="text-center">' . $row["cnpj"] .  '</td>
												<td class="text-center">' . $row["cep"] .  '</td>
												<td class="text-center"><img data-fancybox data-type="ajax"	data-src="forms/setor.php?cd='. $row["cdEmpresa"].'" href="javascript:;"class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/divsetor.png"/></td>
												<td class="text-center"><img data-fancybox data-type="ajax" data-src="forms/cadastro/edit/edit_empresa.php?c=' . $empid . '" href="javascript:;" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png"/></td>
												<td class="text-center"><img data-fancybox data-type="ajax" data-src="forms/cadastro/post/form_delEmpresa.php?c=' . $empid . '" href="javascript:; class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/delete.png"/></td>
											</tr>
										';
									}
								}else{
									echo '
										<tr style="background-color: ">
											<td colspan="11">Nehnuma Empresa Cadastrada</td>
										</tr>
									';
								}
							?>
						<tbody>
					</table>
					<?php if($pri_admin == TRUE){
					echo '
					<table class="table table-striped table-responsive-xl table-sm table-bordered"  style="margin-top: 40px">
						<thead class="thead-light">
							<tr>
								<th colspan="9">Outras Empresas</th>
							</tr>
							<tr>
								<th class="text-center">Cadastro</th>
								<th class="text-center">Logo</th>
								<th class="text-center">Nome da Empresa</th>
								<th class="text-center">Endereço</th>
								<th class="text-center">Razão Social</th>
								<th class="text-center">Nome Fantasia</th>
								<th class="text-center">CNPJ</th>
								<th class="text-center">CEP</th>
								<th class="text-center">Setores</th>

							</tr>
						</thead>
						<tbody>';
								if ($res2->num_rows > 0){
									while($row2 = mysqli_fetch_assoc($res2)){
										echo '
											<tr style="background-color: ">
												<td class="text-center">' . $row2["cdEmpresa"] . '</td>
												<td class="text-center"><img width="50px" src="img_empresas/' . $row2["arquivo"] . '" /></td>
												<td class="text-center">' . $row2["nomeEmpresa"] . '</td>
												<td class="text-center">' . $row2["endereco"] . '</td>
												<td class="text-center">' . $row2["razaoSocial"] . '</td>
												<td class="text-center">' . $row2["nomeFantasia"] . '</td>
												<td class="text-center">' . $row2["cnpj"] .  '</td>
												<td class="text-center">' . $row2["cep"] .  '</td>
												<td class="text-center"><img data-fancybox data-type="ajax"	data-src="forms/setor.php?cd='. $row2["cdEmpresa"].'" href="javascript:;"class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/divsetor.png"/></td>
											</tr>
										';
									}
								}else{
									echo '
										<tr style="background-color: ">
											<td colspan="11">Nehnuma Empresa Cadastrada</td>
										</tr>
									';
								}
						echo '
						<tbody>
					</table>';
					}
					?>
			</div>
		</div>
	</div>
</html>