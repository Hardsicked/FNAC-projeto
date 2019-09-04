<?php
	require "../../../php/connect.php";
	$cargo = $_GET["c"];
	$sql_cargo = "SELECT * FROM tbcargos WHERE cdCargos =".$cargo;
	$qry_cargo = mysqli_query($link,$sql_cargo);
?>
<body>
	<div class="row">
		<div class="col-12">
			<form id="" class="" action="/fnac/forms/cadastro/post/form_editCargo.php" method="POST">
				<table class="table table-sm table-responsive-xl table-light">
					<thead class="thead-light">
						<tr>
							<th colspan="2" class="text-center">Modificar Cargo</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while($assoc_cargo = mysqli_fetch_assoc($qry_cargo)){
							echo'
							<tr>
								<td>Cargo</td>
								<td><input type="text" name="campocargo" id="campocargo" value="'.$assoc_cargo["cargo"].'" required><input type="text" name="cdCargos" value="'.$cargo.'" hidden></td>
							</tr>
							<tr>
								<td>Descrição da Atividade do Cargo</td>
								<td><textarea name="campodesc" id="campodesc" cols="60" rows="20" required>'.$assoc_cargo["descCargo"].'</textarea></td>
								<input type="text" name="campoghe" id="campoghe" value="<?php echo $cdghe?>" hidden required>
							</tr>
							<tr>				
								<td><input type="submit" id="" class="" name="" value="Confirmar Cadastro"></td>
								<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
							</tr>';
						}?>
					</tbody>
				</table>
			</form>
		</div>
	</div>
</body>