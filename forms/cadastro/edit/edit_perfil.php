<?php
	include "../../../php/connect.php";
	$cdEmpresa = $_GET['c'];
	$cdperfil = $_GET['p'];
	$sql_perf = "SELECT * FROM tbperfis WHERE cdPerfil =".$cdperfil;
	$qry_perf = mysqli_query($link,$sql_perf);
?>
<form id="cadastro" class="" action="/fnac/forms/cadastro/post/form_editPerfil.php?c=<?php echo $cdperfil;?>" method="POST"  enctype="multipart/form-data">
	<table class="table table-light ">
		<thead class="thead-light">
			<tr>
				<th class="text-center" colspan="3">Novo Perfil de Assinatura</th>
			</tr>
		</thead>
		<tbody>
<?php
	while($assoc = mysqli_fetch_assoc($qry_perf)){
		echo'<tr>
				<td><h5>Logo da Assinatura:</h5></td>
				<td><b><input type="file" name="fileUpload">
						<input type="text" name="cdEmpresa" value="'.$cdEmpresa.'" required hidden>
				</b></td>
			</tr>
			<tr>
				<td><h5>Responsável Técnico Eng:</h5></td>
				<td colspan="2"><input type="text" id="" class="" name="responsavel" placeholder="Engenheiro" value="'.$assoc['responsavel'].'" required></td>
			</tr>
			<tr>
				<td><h5>Cargo Eng:</h5></td>
				<td colspan="2"><input type="text" id="" class="" name="cargoeng" placeholder="Cargo do Engenheiro" value="'.$assoc['cargoeng'].'" required></td>
			</tr>
			<tr>
				<td><h5>Técnico -Seg:</h5></td>
				<td colspan="2"><input type="text" id="" class="" name="tecnico" placeholder="Técnico" value="'.$assoc['tecnico'].'" required></td>
			</tr>
			<tr>
				<td><h5>Cargo:</h5></td>
				<td colspan="2"><input type="text" id="" class="" name="cargotec" placeholder="Cargo Técnico" value="'.$assoc['cargotec'].'" required></td>
			</tr>
			<tr>
				<td><h5>Logomarca e Rodapé:</h5></td>
				<td colspan="2">';
				if($assoc['logorodape'] == 1){
					echo'<input type="radio" id="logorodape" class="" value="1" name="logorodape" required checked>Sim
						<input type="radio" id="logorodape" class="" value="0" name="logorodape" required>Não';
				}else{
					echo'<input type="radio" id="logorodape" class="" value="1" name="logorodape" required>Sim
						<input type="radio" id="logorodape" class="" value="0" name="logorodape" required checked>Não';
				}
			echo'</td>
			</tr>
			<tr>
				<td><h5>Endereço:</h5></td>
				<td colspan="2"><input type="text" id="" class="" name="endereco" placeholder="Endereço" value="'.$assoc['endereco'].'" required></td>
			</tr>
			<tr>
				<td><h5>Observações:</h5></td>
				<td colspan="2"><textarea name="observacoes" cols="80" rows="10">'.$assoc['observacao'].'</textarea></td>
			</tr>
			<tr>
				<td><input type="submit" id="confirmar" class="" name="btnSave" value="Confirmar Cadastro"></td>
				<td></td>
				<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
			</tr>';
	}
?>
			
		</tbody>
	</table>
</form>