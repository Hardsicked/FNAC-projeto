<?php 
$empid = $_GET['c'];
echo $empid;
include "../../../php/connect.php";
$query = "SELECT * FROM tbempresa WHERE cdEmpresa = " . $empid;
$res = mysqli_query($connect,$query);
foreach ($res as $r){
	$nmemp = $r['nomeEmpresa'];
	$ende = $r['endereco'];
	$rsocial = $r['razaoSocial'];
	$nmf = $r['nomeFantasia'];
	$cnpj = $r['cnpj'];
	$cep = $r['cep'];
}
?>
<form id="editEmpresa" class="" action="/fnac/forms/cadastro/post/form_editEmpresa.php?c=<?php echo $empid; ?>" method="POST" enctype="multipart/form-data">
			<table class="table table-dark">
				<thead class="thead-light">
					<tr>
						<th class="text-center" colspan="3">Modificar Empresa <?php echo $nmemp; ?></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><h5>Logo da empresa:</h5></td>
						<td><b><input type="file" name="fileUpload"></b></td>
					</tr>
					<tr>
						<td><h5>Nome da Empresa:</h5></td>
						<td><input type="text" id="" class="" name="nmEmpresa" placeholder="Nome da Empresa" value="<?php echo $nmemp; ?>" required></td>
					</tr>
					<tr>
						<td><h5>Endereço:</h5></td>
						<td><input type="text" id="" class="" name="endereco" placeholder="Endereço" value="<?php echo $ende; ?>"  required></td>
					</tr>
					<tr>
						<td><h5>Razão Social:</h5></td>
						<td><input type="text" id="" class="" name="razaoSocial" placeholder="Razão Social" value="<?php echo $rsocial; ?>"  required></td>
					</tr>
					<tr>
						<td><h5>Nome Fantasia:</h5></td>
						<td><input type="text" id="" class="" name="nmFantasia" placeholder="Nome Fantasia" value="<?php echo $nmf; ?>"  required></td>
					</tr>
					<tr>
						<td><h5>CNPJ: </h5></td>
						<td><input type="text" id="cnpj" class="" name="cnpj" value="<?php echo $cnpj; ?>"  placeholder="CNPJ" required ></td>
					</tr>
					<tr>
						<td><h5>CEP: </h5></td>
						<td><input type="text" id="cnpj" class="" name="cep"  placeholder="CEP" value="<?php echo $cep; ?>" required ></td>
					</tr>
					<tr>
						<td><input type="submit" id="confirmar" class="" name="btnSave" value="Confirmar Edição"></td>
						<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
					</tr>
				</tbody>
			</table>
</form>