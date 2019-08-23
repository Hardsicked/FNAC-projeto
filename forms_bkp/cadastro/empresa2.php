<form id="cadastro" class="" action="/fnac/forms/cadastro/post/form_cadEmpresa2.php" method="POST"  enctype="multipart/form-data">
	<table class="table table-dark">
		<thead class="thead-light">
			<tr>
				<th class="text-center" colspan="3">Nova Empresa</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><h5>Logo da empresa:</h5></td>
				<td><b><input type="file" name="fileUpload" required></b></td>
			</tr>
			<tr>
				<td colspan="2"><h5>Nome da Empresa:</h5></td>
				<td><input type="text" id="" class="" name="nmEmpresa" placeholder="Nome da Empresa" required></td>
			</tr>
			<tr>
				<td colspan="2"><h5>Endereço:</h5></td>
				<td><input type="text" id="" class="" name="endereco" placeholder="Endereço" required></td>
			</tr>
			<tr>
				<td colspan="2"><h5>Razão Social:</h5></td>
				<td><input type="text" id="" class="" name="razaoSocial" placeholder="Razão Social" cols="15" rows="2" required></td>
			</tr>
			<tr>
				<td colspan="2"><h5>Nome Fantasia:</h5></td>
				<td><input type="text" id="" class="" name="nmFantasia" placeholder="Nome Fantasia" cols="15" rows="2" required></td>
			</tr>
			<tr>
				<td colspan="2"><h5>CNPJ: </h5></td>
				<td><input type="text" id="cnpj" class="" name="cnpj"  placeholder="CNPJ" required ></td>
			</tr>
			<tr>
				<td><input type="submit" id="confirmar" class="" name="btnSave" value="Confirmar Cadastro"></td>
				<td></td>
				<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
			</tr>
		</tbody>
	</table>
</form>