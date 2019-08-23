<?php
	$cdghe = $_GET['c'];
?>
<div class="container">
	<table class="table table-sm table-responsive-xl table-light">
		<form id="" class="" action="/fnac/forms/cadastro/post/form_cadCargo.php" method="post">
			<thead class="thead-light">
				<tr>
					<th colspan="2" class="text-center">Novo Cargo</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Cargo</td>
					<td><input type="text" name="cargo" id="cargo"></td>
				</tr>
				<tr>
					<td>Descrição da Atividade do Cargo</td>
					<td><textarea name="desc" cols="60" rows="20"></textarea></td>
					<input type="text" name="ghe" hidden value="<?php echo $cdghe?>
				</tr>
				<tr>				
					<td><input type="submit" id="" class="" name="btnSave" value="Confirmar Cadastro"></td>
					<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
				</tr>
			</tbody>
		</form>
	</table>
</div>
	