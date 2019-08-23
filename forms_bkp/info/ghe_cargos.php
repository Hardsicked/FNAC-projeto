<?php
	include "../../php/connect.php";
	$cdghe = $_GET["ghe"];
	$sqli = "SELECT *FROM tbcargos WHERE cdGHE = ".$cdghe;
	$qry = mysqli_query($link,$sqli);
?>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<table class="table table-sm table-light table-stripped">
					<thead class="thead-light">
						<tr>
							<th colspan="2" class="text-center">Cargos da GHE</th>
						</tr>
						<tr>
							<th class="text-center">Cargo</th>
							<th class="text-center">Descrição das Atividades do Cargo</th>
							<th class="text-center">Modificar</th>
							<th class="text-center">Deletar</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if($qry->num_rows > 0){
								while($assoc_info = mysqli_fetch_assoc($qry)){
									echo'
										<tr>
											<td class="text-center">'.$assoc_info['cargo'].'</td>
											<td class="text-center">'.$assoc_info['descCargo'].'</td>
											<td class="text-center"><img data-fancybox data-type="ajax" data-src="forms/cadastro/edit/edit_cargo.php?c='.$assoc_info["cdCargos"].'" href="javascript:;" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png"/></td>
											<td class="text-center"><img data-fancybox data-type="ajax" data-src="forms/cadastro/post/form_delCargo.php?c='.$assoc_info["cdCargos"].'" href="javascript:;" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/delete.png"/></td>
										</tr>
									';
								}
							}else{
								echo'
									<tr>
										<td colspan="2" class="text-center">Nenhum Cargo cadastrado nesta GHE</td>
									</tr>
								';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<form id="" class="" action="/fnac/forms/cadastro/post/form_cadCargo.php" method="POST">
					<table class="table table-sm table-responsive-xl table-light">
						<thead class="thead-light">
							<tr>
								<th colspan="2" class="text-center">Novo Cargo</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Cargo</td>
								<td><input type="text" name="campocargo" id="campocargo" required></td>
							</tr>
							<tr>
								<td>Descrição da Atividade do Cargo</td>
								<td><textarea name="campodesc" id="campodesc" cols="60" rows="20" required></textarea></td>
								<input type="text" name="campoghe" id="campoghe" value="<?php echo $cdghe?>" hidden required>
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
	</div>