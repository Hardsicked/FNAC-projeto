<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<?php 
 	error_reporting(E_ALL ^ E_DEPRECATED);
	include "../php/connect.php";
	$sql1 = "SELECT * From tbgruposagente";
	$res1 = mysqli_query($connect,$sql1);
	header ('Content-type: text/html; charset=UTF-8');
?>
	<div class="container-fluid">
	<div class="row"><div class="col-12"><h3>Grupos Agente</h3></div></div>
		<div class="row">
			<div class="col-md-12">
				<form id="" class="" action="/fnac/forms/cadastro/post/form_cadGrupos.php" method="POST">
					<table class="table table-sm table-responsive-xl table-light">
						<thead class="thead-light">
							<tr>
								<th colspan="2" class="text-center">Novo Grupo</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Nome do Grupo</td>
								<td><input type="text" id="nomeGrupo" class="" name="nomeGrupo" required></td>
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
							<th>Código do Grupo</th>
							<th>Grupo</th>
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
											<td class="text-center"><b>' . $row["cdTipoAgente"] . '</b></td>
											<td class="text-center"><b>' . $row["tipoAgente"] . '</b></td>
											<td class="text-center"><b><img data-fancybox data-type="ajax" data-src="forms/cadastro/edit/edit_grupo.php?c=' . $row["cdTipoAgente"] . '" href="javascript:;" class="icone2" style="cursor: pointer" width="24px" height="24px" src="/fnac/img/icons/edit.png"/></b></td>
											<td class="text-center"><b><img data-fancybox data-type="ajax" data-src="forms/cadastro/post/form_delGrupo.php?cd=' . $row["cdTipoAgente"] . '" href="javascript:; class="icone2" style="cursor: pointer" width="24px" height="24px" src="/fnac/img/icons/delete.png"/></b></td>
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