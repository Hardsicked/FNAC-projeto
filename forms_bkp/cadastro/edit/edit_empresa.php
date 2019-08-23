<?php 
$empid = $_GET['cd'];
include "../../../php/connect.php";
$query = "SELECT * FROM tbempresa WHERE cdEmpresa = " . $empid;
$res = mysqli_query($connect,$query);
echo '<form id="editEmpresa" class="" action="/fnac/forms/cadastro/post/form_editEmpresa.php?cd=' . $empid . '" method="POST">';
	while ($row = mysqli_fetch_assoc($res)){
		echo '
			<table class="table table-dark">
				<thead class="thead-light">
					<tr>
						<th class="text-center" colspan="3">Modificar Empresa ' . $row['nomeEmpresa'] . '</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><h5>Logo da empresa:</h5></td>
						<td><b><input type="file" name="fileUpload"></b></td>
					</tr>
					<tr>
						<td><h5>Nome da Empresa:</h5></td>
						<td><input type="text" id="" class="" name="nmEmpresa" placeholder="Nome da Empresa" value="' . $row["nomeEmpresa"] . '" required></td>
					</tr>
					<tr>
						<td><h5>Endereço:</h5></td>
						<td><input type="text" id="" class="" name="endereco" placeholder="Endereço" value="' . $row["endereco"] . '" required></td>
					</tr>
					<tr>
						<td><h5>Razão Social:</h5></td>
						<td><input type="text" id="" class="" name="razaoSocial" placeholder="Razão Social" value="' . $row["razaoSocial"] . '" required></td>
					</tr>
					<tr>
						<td><h5>Nome Fantasia:</h5></td>
						<td><input type="text" id="" class="" name="nmFantasia" placeholder="Nome Fantasia" value="' . $row["nomeFantasia"] . '" required></td>
					</tr>
					<tr>
						<td><h5>CNPJ: </h5></td>
						<td><input type="text" id="cnpj" class="" name="cnpj" value="' . $row["cnpj"] . '" placeholder="CNPJ" required ></td>
					</tr>
					<tr>
						<td><input type="submit" id="confirmar" class="" name="btnSave" value="Confirmar Edição"></td>
						<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
					</tr>
				</tbody>
			</table>
			';
	};
?>
</form>