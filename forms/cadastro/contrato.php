<?php
	$empid = $_GET['cd'];
	include "../../php/connect.php";
	$query = "SELECT cdEmpresa,nomeEmpresa FROM tbempresa WHERE cdEmpresa = " . $empid;
	$resolution = mysqli_query($connect,$query);
?>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="css/fnac.css">
<form id="" class="" action="/fnac/forms/cadastro/post/form_cadContrato.php" method="POST">
<!--<label class="">Empresa: </label><select id="" class="" name="empresa"><br>
	<option id="" class="" value="Empresa1">Empresa1</option>
	<option id="" class="" value="Empresa2">Empresa2</option>
	<option id="" class="" value="Empresa3">Empresa3</option>
	<option id="" class="" value="Empresa4">Empresa4</option>
</select>-->
	<table class="table table-responsive-xl table-sm">
		<thead class="thead-light">
			<tr>
				<th colspan="3">Novo Contrato</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><h4>Empresa: </h4></td>
				<?php while($row = mysqli_fetch_assoc($resolution)){
					echo '
					<td><input type="text" id="" class="" name="empresa" value="' . $row['nomeEmpresa'] . '" required disabled>
						<input type="text" id="" class="" name="cdEmpresa" value="' . $empid . '" required hidden>
					</td>
					';
				} ?>
			</tr>
				<td><h5>CNAE: </h5></td>
				<td><input type="text" id="" class="" name="cnae" placeholder="CNAE" required></td>
			</tr>
			<tr>
				<td><h5>Grau de Risco da Empresa:</h5></td>
				<td><input type="text" id="" class="" name="riscoEmpresa" placeholder="Grau de Risco da Empresa" required></td>
			</tr>
			<tr>
				<td><h5>Número:</h5></td>
				<td><input type="text" id="" class="" name="unidade" placeholder="Número" required></td>
			</tr>
			<tr>
				<td><h5>Responsável da Empresa:</h5></td>
				<td><input type="text" id="" class="" name="responsavelEmpresa" placeholder="Responsável da Empresa" required></td>
			</tr>
			<tr>
				<td colspan="3"><h5>Validade do Programa Legal: </h5><br>
					<h5>Data Inicial: </h5><input type="date" id="" class="" name="vDataInicial" required><br>
					<h5>Data Final: </h5><input type="date" id="" class="" name="vDataFinal" required>
				</td>
			</tr>
			<tr>
				<td><h5>Descrição do Contrato: </h5></td>
				<td><textarea id="" class="" name="descContrato" cols="30" rows="10" maxlength="1000"></textarea></td>
			</tr>
			<tr>
				<td><h5>Valor:</h5></td>
				<td><input type="text" id="" class="" name="valor" placeholder="Valor" required></td>
			</tr>
			<tr>
				<td colspan="3"><h5>Período de Execução: </h5><br>
					<h5>Data Inicial: </h5><input type="date" id="" class="" name="execDataInicial" required><br>
					<h5>Data Final: </h5><input type="date" id="" class="" name="execDataFinal" required>
				</td>
			</tr>
			<tr>
				<td><h5>Equipe Envolvida:</h5></td>
				<td><textarea id="" class="" name="equipeEnvolvida" cols="30" rows="10" maxlength="1000"></textarea></td>
			</tr>
			<tr>
				<td colspan="3"><h5>Serviços:</h5><br>
					<input type="checkbox" id="" class="" name="ltcat" value="1">LTCAT<br>
					<input type="checkbox" id="" class="" name="PPRA_quant" value="1">PPRA<br>
					<input type="checkbox" id="" class="" name="gestao" value="1">Gestão<br>
					<input type="checkbox" id="" class="" name="med_ambient" value="1">Medições Ambientais<br>
				</td>
			</tr>
			<tr>
				<td><h5>Resumo das Atividades da Empresa: </h5></td>
				<td><textarea id="" class="" name="resumoAtividade" cols="30" rows="10" maxlength="1000"></textarea></td>
			</tr>
			<tr>
				<td><input type="submit" id="" class="" name="btnSave" value="Confirmar Cadastro"></td>
				<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
			</tr>
		</tbody>
	</table>
</form>