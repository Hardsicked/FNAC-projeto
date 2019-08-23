<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<?php 
 	error_reporting(E_ALL ^ E_DEPRECATED);
	include "../php/connect.php";
	$sql1 = "SELECT * From tblogin";
	$res1 = mysqli_query($connect,$sql1);
	header ('Content-type: text/html; charset=UTF-8');
?>
	<div class="container">
	<div class="row"><div class="col-12"><h3>Usuários</h3></div></div>
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8"></div>
			<div class="col-2">
				<div data-fancybox data-type="ajax" data-src="forms/cadastro/usuario.php" href="javascript:;" class="novobotao" style="background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Novo Usuário</b></div>
			</div>
		</div>
		<div class="row">			
			<div id="tabela" class="col-md-12">
				<table class="table table-striped table-responsive-xl table-sm table-bordered"  style="margin-top: 40px">
					<thead class="thead-light">
						<tr>
							<th colspan="6"></th>
							<th colspan="5"" class="text-center">Autorizações do sistema</th>
							<th colspan="3"></th>
						</tr>
						<tr>
							<th class="text-center">Nome Real</th>
							<th class="text-center">Usuário</th>
							<th class="text-center">Email</th>
							<th class="text-center">Telefone</th>
							<th class="text-center">Endereço</th>
							<th class="text-center">Data de Cadastro</th>
							<th class="text-center">Leitura</th>
							<th class="text-center">Escrita</th>
							<th class="text-center">Cadastro de Usuário</th>
							<th class="text-center">Administrador</th>
							<th class="text-center">Nível do Usuario</th>
							<th class="text-center">Assinatura</th>
							<th class="text-center">Modificar</th>
							<th class="text-center">Deletar</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if ($res1->num_rows > 0){
								while($row = mysqli_fetch_assoc($res1)){
								if($row["p_read"] == 1){
									$aread = "true.png";
								}else{
									$aread = "false.png";
								}
								if($row["p_write"] == 1){
									$awrite = "true.png";
								}else{
									$awrite = "false.png";
								}
								if($row["p_caduser"] == 1){
									$acad = "true.png";
								}else{
									$acad = "false.png";
								}
								if($row["p_admin"] == 1){
									$aadmin = "true.png";
								}else{
									$aadmin = "false.png";
								}
									echo '
										<tr style="background-color: ">
											<td><b>' . $row["nome_real"] . '</b></td>
											<td><b>' . $row["user"] . '</b></td>
											<td><b>' . $row["email"] . '</b></td>
											<td><b>' . $row["telefone"] . '</b></td>
											<td><b>' . $row["endereco"] . '</b></td>
											<td><b>' . $row["data_cad"] . '</b></td>
											<td><b><img width="24px" height="24px" src="img/icons/' . $aread . '"/></td>
											<td><b><img width="24px" height="24px" src="img/icons/' . $awrite . '"/></td>
											<td><b><img width="24px" height="24px" src="img/icons/' . $acad. '"/></td>
											<td><b><img width="24px" height="24px" src="img/icons/' . $aadmin . '"/></td>
											<td>';
												echo '  '.$row["nvUsuario"].'<br>';
												$x = 1;
												while($x <= 10){
													if($x <= $row["nvUsuario"]){
														echo'<img width="24px" height="24px" src="img/icons/true.png"/>';
													}else{
														echo'<img width="24px" height="24px" src="img/icons/false.png"/>';
													}
													$x++;
												}
											echo'
											</td>
											<td class="text-center"><img data-fancybox data-type="ajax" data-src="" href="javascript:;" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/info.png"/></td>
											<td class="text-center"><img data-fancybox data-type="ajax" data-src="" href="javascript:;" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png"/></td>
											<td class="text-center"><img data-fancybox data-type="ajax" data-src="" href="javascript:;" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/delete.png"/></td>
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