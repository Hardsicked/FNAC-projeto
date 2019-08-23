<?php
	include "../../../php/connect.php";
	$cdemp = $_GET["cd"];
	$sqli = "SELECT * FROM tbequipamento WHERE cdEquipamento = ".$cdemp;
	$query = mysqli_query($link,$sqli);
?>
<form id="" class="" action="post/form_cadEquipamento.php" method="POST">
	<table class="table table-sm table-light">
		<thead class="thead-light">
			<tr>
				<th colspan="2" class="text-center">Modificar Equipamento</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row = mysqli_fetch_assoc($query)){
				echo'
				<tr>
					<td>Tipo do equipamento</td>
					<td>';
						if($row["tipoEquipamento"] == 0){
							echo '
								<input type="radio" id="" class="" name="tpEquipamento" value="0" checked>Instrumento<br>
								<input type="radio" id="" class="" name="tpEquipamento" value="1">Calibrador
							';
						}else{
							echo '
								<input type="radio" id="" class="" name="tpEquipamento" value="0">Instrumento<br>
								<input type="radio" id="" class="" name="tpEquipamento" value="1" checked>Calibrador
							';
						}
				echo'		
					</td>
				</tr>
				<tr>
					<td>Nome do Equipamento</td>
					<td><input type="text" id="" class="" name="nmEquipamento" placeholder="Nome do Instrumento" value="'.$row["nome"].'" required></td>
				</tr>
				<tr>
					<td>Número do Instrumento</td>
					<td><input type="text" id="" class="" name="numero" placeholder="Número do Instrumento" value="'.$row["numero"].'" required></td>
				</tr>
				<tr>
					<td>Número de Série</td>
					<td><input type="text" id="" class="" name="numeroSerie" placeholder="Número de Série" value="'.$row["numeroSerie"].'" required></td>
				</tr>
				<tr>
					<td>Certificado de Calibração</td>
					<td><input type="text" id="" class="" name="certCalibracao" placeholder="Certificado de Calibração" value="'.$row["certCalibracao"].'" required></td>
				</tr>
				<tr>
					<td>Data de Validade de Calibração</td>
					<td><input type="date" id="" class="" name="dataValidacao" required value="'.date('Y-m-d',strtotime($row["dataValidade"])).'"></td>
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