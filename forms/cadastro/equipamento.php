<form id="" class="" action="/fnac/forms/cadastro/post/form_cadEquipamento.php" method="POST">
	<table class="table table-sm table-light">
		<thead class="thead-light">
			<tr>
				<th colspan="2" class="text-center">Novo Equipamento</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Tipo do equipamento</td>
				<td>
					<input type="radio" id="" class="" name="tpEquipamento" value="0">Instrumento<br>
					<input type="radio" id="" class="" name="tpEquipamento" value="1">Calibrador
				</td>
			</tr>
			<tr>
				<td>Nome do Equipamento</td>
				<td><input type="text" id="" class="" name="nmEquipamento" placeholder="Nome do Instrumento" required></td>
			</tr>
			<tr>
				<td>Número do Instrumento</td>
				<td><input type="text" id="" class="" name="numero" placeholder="Número do Instrumento" required></td>
			</tr>
			<tr>
				<td>Número de Série</td>
				<td><input type="text" id="" class="" name="numeroSerie" placeholder="Número de Série" required></td>
			</tr>
			<tr>
				<td>Certificado de Calibração</td>
				<td><input type="text" id="" class="" name="certCalibracao" placeholder="Certificado de Calibração" required></td>
			</tr>
			<tr>
				<td>Data de Validade de Calibração</td>
				<td><input type="date" id="" class="" name="dataValidacao" required></td>
			</tr>
			<tr>
				<td><input type="submit" id="" class="" name="btnSave" value="Confirmar Cadastro"></td>
				<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
			</tr>
		</tbody>
	</table>
</form>