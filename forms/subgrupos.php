<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<?php 
 	error_reporting(E_ALL ^ E_DEPRECATED);
	include "../php/connect.php";
	$sql1 = "SELECT * From tbsubgrupoagente";
	$sql2 = "SELECT * FROM tbgruposagente";
	$res1 = mysqli_query($connect,$sql1);
	$res2 = mysqli_query($connect,$sql2);
	header ('Content-type: text/html; charset=UTF-8');

?>
	<div class="container-fluid">
	<div class="row"><div class="col-12"><h3>Sub Grupos Agente</h3></div></div>
		<div class="row">
			<div class="col-12">
				<form action="/fnac/forms/cadastro/post/form_cadSubGrupos.php" method="post">
					<table class="table table-sm table-responsive-xl table-light">
						<thead class="thead-light">
							<tr>
								<th colspan="2" class="text-center">Novo Sub Grupo</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Grupo</td>
								<td>
									<select name="grupo">
									<?php
									while($row3 = mysqli_fetch_assoc($res2)){
										echo'<option value="'.$row3["cdTipoAgente"].'">'.$row3["tipoAgente"].'</option>';
									}
									?></select>
								</td>
							</tr>
							<tr>
								<td>Nome do Sub Grupo</td>
								<td><input type="text" name="nomeSubGrupo"></td>
							</tr>
							<tr>				
								<td><input type="submit" id="" class="" name="" value="Confirmar Cadastro"></td>
								<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
							</tr>
						</tbody>
					</table>
				</form>
			</div>
		</div>
		<div class="row">			
			<div id="tabela" class="col-md-12">
				<table class="table table-striped table-responsive-xl table-bordered"  style="margin-top: 40px">
					<thead class="thead-light">
						<tr>
							<th>Código do Sub Grupo</th>
							<th>Grupo</th>
							<th>Sub Grupo</th>
							<th>Modificar</th>
							<th>Excluir</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if ($res1->num_rows > 0){
								while($row = mysqli_fetch_assoc($res1)){
									$sql2 = "SELECT * From tbgruposagente WHERE cdTipoAgente = ".$row["cdTipoAgente"];
									$res2 = mysqli_query($connect,$sql2);
									while($row2 = mysqli_fetch_assoc($res2)){
										echo '
											<tr>
												<td class="text-center"><b>' . $row["cdSubGrupo"] . '</b></td>
												<td class="text-center"><b>' . $row2["tipoAgente"] . '</b></td>
												<td class="text-center"><b>' . $row["nome"] . '</b></td>
												<td class="text-center"><b><img data-fancybox data-type="ajax" data-src="forms/cadastro/edit/edit_subgrupo.php?c=' . $row["cdSubGrupo"] . '" href="javascript:;" class="icone2" style="cursor: pointer" width="24px" height="24px" src="/fnac/img/icons/edit.png"/></b></td>
												<td class="text-center"><b><img data-fancybox data-type="ajax" data-src="forms/cadastro/post/form_delSubGrupo.php?cd=' . $row["cdSubGrupo"] . '" href="javascript:; class="icone2" style="cursor: pointer" width="24px" height="24px" src="/fnac/img/icons/delete.png"/></b></td>
											</tr>
										';
									}
								}
							}
						?>
					<tbody>
				</table>
			</div>
		</div>
	</div>
</html>