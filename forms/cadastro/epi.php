<form id="" class="" action="/fnac/forms/cadastro/post/form_cadEPI.php" method="POST">
	<table class="table table-dark">
		<thead class="thead-light">
			<tr>
				<th colspan="2" class="text-center">Nova EPI</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><h5>Tipo de EPI: </h5></td>
				<td><select id="" class="" name="tpEPI">
						<option id="" class="" value="1" selected>Capacete</option>
						<option id="" class="" value="2">Bota</option>
						<option id="" class="" value="3">Luva</option>
						<option id="" class="" value="4">Protetor Respiratório</option>
						<option id="" class="" value="5">Protetor Auricular</option>
						<option id="" class="" value="6">Óculos</option>
						<option id="" class="" value="7">Cinto de Segurança</option>
						<option id="" class="" value="8">Vestimentas</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Nome do Epi:</td>
				<td><input type="text" id="" class="" name="nmEPI" placeholder="Nome do EPI" required></td>
			</tr>
			<tr>
				<td>Fabricante:</td>
				<td><input type="text" id="" class="" name="fabricante" placeholder="Fabricante" required></td>
			</tr>
			<tr>
				<td>Modelo:</td>
				<td><input type="text" id="" class="" name="modelo" placeholder="Modelo" required></td>
			</tr>
			<tr>
				<td>CA:</td>
				<td><input type="text" id="" class="" name="ca" placeholder="CA" required></td>
			</tr>
			<tr>
				<td>Nível de Proteção</td>
				<td><input type="text" id="" class="" name="nivelProtecao" placeholder="Nível de Proteção" required></td>
			</tr>
			<tr>
				<td><input type="submit" id="" class="" name="btnSave" value="Confirmar Cadastro"></td>
				<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
			</tr>
		</tbody>
</form>