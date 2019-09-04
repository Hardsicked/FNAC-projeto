<?php
	error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);
	session_start();
	$contrato = $_GET['p'];
	$empid = $_GET['cd'];
	include "../../../php/connect.php";
	$query = "SELECT cdEmpresa,nomeEmpresa FROM tbempresa WHERE cdEmpresa = " . $empid;
	$resolution = mysqli_query($connect,$query);
	$sql1 = "SELECT * FROM tbcontrato WHERE cdContrato = " . $contrato;
	$query1 = mysqli_query($link,$sql1);
?>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="css/fnac.css">
<form id="" class="" action="/fnac/forms/cadastro/post/form_editContrato.php?p=<?php echo $contrato; ?>" method="POST">
<!--<label class="">Empresa: </label><select id="" class="" name="empresa"><br>
	<option id="" class="" value="Empresa1">Empresa1</option>
	<option id="" class="" value="Empresa2">Empresa2</option>
	<option id="" class="" value="Empresa3">Empresa3</option>
	<option id="" class="" value="Empresa4">Empresa4</option>
</select>-->
	<table class="table table-responsive-xl table-sm">
		<thead class="thead-light">
			<tr>
				<th colspan="3">Modificar contrato Contrato</th>
			</tr>
		</thead>
		<tbody>
		<?php
			while($assoc = mysqli_fetch_assoc($query1)){
			echo '
			<tr>
				<td><h4>Empresa: </h4></td>';
				while($row = mysqli_fetch_assoc($resolution)){
					echo '
					<td><input type="text" id="" class="" name="empresa" value="' . $row['nomeEmpresa'] . '" required disabled>
						<input type="text" id="" class="" name="cdEmpresa" value="' . $empid . '" required hidden>
					</td>
					';
				}
			echo'
			</tr>
				<td><h5>CNAE: </h5></td>
				<td><input type="text" id="" class="" name="cnae" placeholder="CNAE" value="'.$assoc["CNAE"].'" required></td>
			</tr>
			<tr>
				<td><h5>Grau de Risco da Empresa:</h5></td>
				<td><input type="text" id="" class="" name="riscoEmpresa" placeholder="Grau de Risco da Empresa" value="'.$assoc["risco_empresa"].'" required></td>
			</tr>
			<tr>
				<td><h5>Número:</h5></td>
				<td><input type="text" id="" class="" name="unidade" placeholder="Número" value="'.$assoc["unidade"].'" required></td>
			</tr>
			<tr>
				<td><h5>Responsável da Empresa:</h5></td>
				<td><input type="text" id="" class="" name="responsavelEmpresa" placeholder="Responsável da Empresa" value="'.$assoc["responsavelEmpresa"].'" required></td>
			</tr>
			<tr>
				<td colspan="3"><h5>Validade do Programa Legal: </h5><br>
					<h5>Data Inicial: </h5><input type="date" id="" class="" name="vDataInicial" value="'.date('Y-m-d',strtotime($assoc["v_data_inicial"])).'" required><br>
					<h5>Data Final: </h5><input type="date" id="" class="" name="vDataFinal" value="'.date('Y-m-d',strtotime($assoc["v_data_final"])).'" required>
				</td>
			</tr>
			<tr>
				<td><h5>Descrição do Contrato: </h5></td>
				<td><textarea id="" class="" name="descContrato" cols="30" rows="10" maxlength="1000" >'.$assoc["desc_contrato"].'</textarea></td>
			</tr>
			<tr>
				<td><h5>Valor:</h5></td>
				<td><input type="text" id="" class="" name="valor" placeholder="Valor" value="'.$assoc["valor"].'" required></td>
			</tr>
			<tr>
				<td colspan="3"><h5>Período de Execução: </h5><br>
					<h5>Data Inicial: </h5><input type="date" id="" class="" name="execDataInicial" value="'. date('Y-m-d',strtotime($assoc["exec_data_inicial"])).'" required><br>
					<h5>Data Final: </h5><input type="date" id="" class="" name="execDataFinal" value="'.date('Y-m-d',strtotime($assoc["exec_data_final"])).'" required>
				</td>
			</tr>
			<tr>
				<td><h5>Equipe Envolvida:</h5></td>
				<td><textarea id="" class="" name="equipeEnvolvida" cols="30" rows="10" maxlength="1000">'.$assoc["equipe_envolv"].'</textarea></td>
			</tr>
			<tr>
				<td colspan="3"><h5>Serviços:</h5><br>';
				if($assoc["LTCAT"] == TRUE){
					echo'<input type="checkbox" id="" class="" name="ltcat" value="1" checked>LTCAT<br>';
				}else{
					echo'<input type="checkbox" id="" class="" name="ltcat" value="1">LTCAT<br>';
				}
				if($assoc["PPRA_quant"] == TRUE){
					echo'<input type="checkbox" id="" class="" name="PPRA_quant" value="1" checked>PPRA Quantitativo(Com Ficha de Campo)<br>';
				}else{
					echo'<input type="checkbox" id="" class="" name="PPRA_quant" value="1">PPRA Quantitativo(Com Ficha de Campo)<br>';
				}
				if($assoc["PPRA_direta"] == TRUE){
					echo'<input type="checkbox" id="" class="" name="PPRA_direta" value="1" checked>PPRA Inserção Direta(Sem Ficha de Campo)<br>';
				}else{
					echo'<input type="checkbox" id="" class="" name="PPRA_direta" value="1">PPRA Inserção Direta(Sem Ficha de Campo)<br>';
				}
				if($assoc["PPRA_qualit"] == TRUE){
					echo'<input type="checkbox" id="" class="" name="PPRA_qualit" value="1" checked>PPRA Qualitativo(Sem Resultados Númericos)<br>';
				}else{
					echo'<input type="checkbox" id="" class="" name="PPRA_qualit" value="1">PPRA Qualitativo(Sem Resultados Númericos)<br>';
				}
				if($assoc["gestao"] == TRUE){
					echo'<input type="checkbox" id="" class="" name="gestao" value="1" checked>Gestão<br>';
				}else{
					echo'<input type="checkbox" id="" class="" name="gestao" value="1">Gestão<br>';
				}
				if($assoc["med_ambient"] == TRUE){
					echo'<input type="checkbox" id="" class="" name="med_ambient" value="1" checked>Medições Ambientais<br>';
				}else{
					echo'<input type="checkbox" id="" class="" name="med_ambient" value="1">Medições Ambientais<br>';
				}
				echo'</td>
			</tr>
			<tr>
				<td><h5>Resumo das Atividades da Empresa: </h5></td>
				<td><textarea id="" class="" name="resumoAtividade" cols="30" rows="10" maxlength="1000">'.$assoc["resumo"].'</textarea></td>
			</tr>
			<tr>
				<td><input type="submit" id="" class="" name="btnSave" value="Confirmar Cadastro"></td>
				<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
			</tr>
			';
			}
			?>
		</tbody>
	</table>
</form>