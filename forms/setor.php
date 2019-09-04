<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<?php
	$empid = $_GET["cd"];
 	//error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);
	include "../php/connect.php";
	$sql1 = "SELECT * From tbsuperintendencia WHERE cdEmpresa = " . $empid;
	$res1 = mysqli_query($link,$sql1);
	$sql2 = "SELECT * From tbgerencia WHERE cdEmpresa = " . $empid;
	$res2 = mysqli_query($link,$sql2);
	$sql3 = "SELECT * From tbsetor WHERE cdEmpresa = " . $empid;
	$res3 = mysqli_query($link,$sql3);
	header ('Content-type: text/html; charset=UTF-8');
?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div data-fancybox data-type="ajax" data-src="forms/cadastro/divcontrato.php?cd=<?php echo $empid; ?>&type=1" href="javascript:;" class="novobotao text-center" style="background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Nova Superintendência</b></div>
			</div>
			<div class="col-md-4">
				<div data-fancybox data-type="ajax" data-src="forms/cadastro/divcontrato.php?cd=<?php echo $empid; ?>&type=2" href="javascript:;" class="novobotao text-center" style="background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Novo Gerência</b></div>
			</div>
			<div class="col-md-4">
				<div data-fancybox data-type="ajax" data-src="forms/cadastro/divcontrato.php?cd=<?php echo $empid; ?>&type=3" href="javascript:;" class="novobotao text-center" style="background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Novo Setor</b></div>
			</div>
		</div>
		<div class="row">
			<div id="tabela" class="col-md-4">
					<table class="table table-striped table-bordered"  style="margin-top: 40px">
						<thead class="thead-light">
							<tr>
								<th>Gerência Geral</th>
								<th>Modificar</th>
								<th>Excluir</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if ($res1->num_rows > 0){
									while($row = mysqli_fetch_assoc($res1)){
										echo '
											<tr>
												<td>' . $row["superintendencia"] . '</td>
												<td><img data-fancybox data-type="ajax" data-src="forms/cadastro/edit/edit_setores.php?c=' . $row["cdSuperIntendencia"] . '&t=1e='.$empid.'" href="javascript:;" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png"/></td>
												<td><img data-fancybox data-type="ajax" data-src="forms/cadastro/post/form_delsetor.php?c=' . $row["cdSuperIntendencia"] . '&t=1e='.$empid.'" href="javascript:;" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/delete.png"/></td>
											</tr>
										';
									}
								}else{
									echo ' <td class="text-center" colspan="5">Não há nenhuma superintedência cadastrado</td> ';
								}
							?>
						<tbody>
					</table>
			</div>
			<div id="tabela" class="col-md-4">
					<table class="table table-striped table-bordered"  style="margin-top: 40px">
						<thead class="thead-light">
							<tr>
								<th>Gerência Geral</th>
								<th>Gerência</th>
								<th>Modificar</th>
								<th>Excluir</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if ($res2->num_rows > 0){
									while($row2 = mysqli_fetch_assoc($res2)){
										$cdSI = $row2["cdSuperIntendencia"];
										$sql22 = "SELECT * FROM tbsuperintendencia WHERE cdEmpresa = " . $empid . " AND cdSuperIntendencia = " . $cdSI ;
										$res22 = mysqli_query($link,$sql22);
										while($row22 = mysqli_fetch_assoc($res22)){
											echo '
												<tr>
													<td>' . $row22["superintendencia"] . '</td>
													<td>' . $row2["gerencia"] . '</td>
													<td><img data-fancybox data-type="ajax" data-src="forms/cadastro/edit/edit_setores.php?c=' . $row2["cdGerencia"] . 't=2&e='.$empid.'" href="javascript:;" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png"/></td>
													<td><img data-fancybox data-type="ajax" data-src="forms/cadastro/post/form_delsetor.php?c=' . $row2["cdGerencia"] . '&t=2e='.$empid.'" href="javascript:;" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/delete.png"/></td>
												</tr>
											';
										}
									}
								}else{
									echo ' <td class="text-center" colspan="5">Não há nenhuma Gerência cadastrado</td> ';
								}
							?>
						<tbody>
					</table>
			</div>
			<div id="tabela" class="col-md-4">
					<table class="table table-striped table-bordered"  style="margin-top: 40px">
						<thead class="thead-light">
							<tr>
								<th>Gerência Geral</th>
								<th>Gerência</th>
								<th>Setor</th>
								<th>Modificar</th>
								<th>Excluir</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if ($res3->num_rows > 0){
									while($row3 = mysqli_fetch_assoc($res3)){
										$cdGerencia = $row3["cdGerencia"];
										$sql5 = "SELECT * From tbgerencia WHERE cdEmpresa = " . $empid . " AND cdGerencia = " . $cdGerencia;
										$res5 = mysqli_query($link,$sql5);
										while($row5 = mysqli_fetch_assoc($res5)){
											$sql6 = "SELECT * From tbsuperintendencia WHERE cdEmpresa = " . $empid . " AND cdSuperIntendencia = ". $row5["cdSuperIntendencia"];
											$res6 = mysqli_query($link,$sql6);
											while($row6 = mysqli_fetch_assoc($res6)){
												echo '
													<tr>
														<td>' . $row6["superintendencia"] . '</td>
														<td>' . $row5["gerencia"] . '</td>
														<td>' . $row3["setor"] . '</td>
														<td><img data-fancybox data-type="ajax" data-src="forms/cadastro/edit/edit_setores.php?c=' . $row3["cdSetor"] . '&t=3&e='.$empid.'" href="javascript:;" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png"/></td>
														<td><img data-fancybox data-type="ajax" data-src="forms/cadastro/post/form_delsetor.php?c=' . $row3["cdSetor"] . '&t=3e='.$empid.'" href="javascript:;" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/delete.png"/></td>
													</tr>
												';
											}
										}
									}
								}else{
									echo ' <td class="text-center" colspan="5">Não há nenhum setor cadastrado</td> ';
								}
							?>
						<tbody>
					</table>
			</div>
		</div>
	</div>
</html>