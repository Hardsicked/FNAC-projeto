<?php
	include "../../../php/connect.php";
	$empid = $_GET["cd"];
	$contrato = $_GET["cid"];
	$cdghe = $_GET["ghe"];
	$sql1 = "SELECT * FROM tbcontrato WHERE cdContrato = ".$contrato;
	$sql2 = "SELECT * FROM tbsuperintendencia WHERE cdEmpresa = ".$empid;
	$sql3 = "SELECT * FROM tbgerencia WHERE cdEmpresa = ".$empid;
	$sql4 = "SELECT * FROM tbsetor WHERE cdEmpresa = ".$empid;
	$sql5 = "SELECT * FROM tbghe WHERE cdGHE = ".$cdghe;
	$query1 = mysqli_query($link,$sql1);
	$query2 = mysqli_query($link,$sql2);
	$query3 = mysqli_query($link,$sql3);
	$query4 = mysqli_query($link,$sql4);
	$query5 = mysqli_query($link,$sql5);
?>
<form id="" class="" action="/fnac/forms/cadastro/post/form_editGHE.php?c=<?php echo $cdghe; ?>" method="POST">
	<table class="table table-light table-stripped table-sm table-responsive-xl">
		<thead class="thead-light">
			<tr>
				<th class="text-center" colspan="2">Modificar GHE</th>
			</tr>
		</thead>
		<tbody>
		<?php
			while($assoc = mysqli_fetch_assoc($query5)){
			echo '
			<tr>
				<td>Contrato</td>
				<td>';
						$sql11 = "SELECT * FROM tbempresa WHERE cdEmpresa = ".$empid;
						$query11 = mysqli_query($link,$sql11);
						while($resul11 = mysqli_fetch_assoc($query11)){
							echo '
								<input type="text" name="Contrato" value="'.$resul11["nomeEmpresa"].'-'.$contrato.'" disabled>
								<input type="text" name="cdContrato" value="'.$contrato.'" hidden>
							';
						}
				echo '
				</td>
			</tr>
			<tr>
				<td>Gerência Geral</td>
				<td><select id="" class="" name="cdGG">
							';
							while($resul2 = mysqli_fetch_assoc($query2)){
								echo'<option id="" class="" value="'.$resul2["cdSuperIntendencia"].'">'.$resul2["superintendencia"].'</option>';
							}
					echo'						
					</select>
				</td>
			</tr>
			<tr>
				<td>Gerência</td>
				<td><select id="" class="" name="cdGerencia">';
							while($resul3 = mysqli_fetch_assoc($query3)){
								echo'<option id="" class="" value="'.$resul3["cdGerencia"].'">'.$resul3["gerencia"].'</option>';
							}
					echo '
					</select>
				</td>
			</tr>
			<tr>
				<td>Setor</td>
				<td>
					<select id="" class="" name="cdSetor">';
							while($resul4 = mysqli_fetch_assoc($query4)){
								echo'<option id="" class="" value="'.$resul4["cdSetor"].'">'.$resul4["setor"].'</option>';
							}
					echo '
					</select>
				</td>
			</tr>
			<tr>
				<td>Tipo</td>
				<td>
					<select id="" class="" name="tipoGHE">';
						while($resul1 = mysqli_fetch_assoc($query1)){
							if($resul1["LTCAT"] == 1){
								if($assoc["tipoCont"] == 1){
									echo '<option id="" class="" value="1" selected>LTCAT</option>';
								}else{
									echo '<option id="" class="" value="1" >LTCAT</option>';
								}
							}
							if($resul1["PPRA_quant"] == 1){
								if($assoc["tipoCont"] == 2){
									echo '<option id="" class="" value="2" selected>PPRA Quantitativo(Com Ficha de Campo)</option>';
								}else{
									echo '<option id="" class="" value="2">PPRA Quantitativo(Com Ficha de Campo)</option>';
								}
							}
							if($resul1["PPRA_direta"] == 1){
								if($assoc["tipoCont"] == 3){
									echo '<option id="" class="" value="3" selected>PPRA Inserção Direta(Sem Ficha de Campo)</option>';
								}else{
									echo '<option id="" class="" value="3">PPRA Inserção Direta(Sem Ficha de Campo)</option>';
								}
							}
							if($resul1["PPRA_qualit"] == 1){
								if($assoc["tipoCont"] == 4){
									echo '<option id="" class="" value="4" selected>PPRA Qualitativo(Sem Resultados Númericos)</option>';
								}else{
									echo '<option id="" class="" value="4">PPRA Qualitativo(Sem Resultados Númericos)</option>';
								}
							}
						}
				echo '
					</select>
				</td>
			</tr>
			<tr>
				<td>Código GHE</td>
				<td><input type="text" id="" class="" name="codGHE" placeholder="Código GHE" value="'.$assoc["codGHE"].'" required></td>
			<tr>
			<tr>
				<td>Nome do GHE</td>
				<td><input type="text" id="" class="" name="nomeGHE" placeholder="Nome do GHE" value="'.$assoc["nomeGHE"].'" required></td>
			</tr>
			<tr>
				<td>Número de Empregados</td>
				<td><input type="text" id="" class="" name="numEmpregados" placeholder="Número de Empregados" value="'.$assoc["numEmpregados"].'" required></td>
			</tr>
			<tr>
				<td>Jornada de Trabalho</td>
				<td><input type="text" id="" class="" name="jornadaTrab" placeholder="Jornada de Trabalho" value="'.$assoc["jornadaTrab"].'" required></td>
			</tr>
			<tr>
				<td>Descrição do Local de Trabalho</td>
				<td><textarea id="" class="" name="descTrab" cols="30" rows="10">'.$assoc["descTrab"].'</textarea></td>
			</tr>
			<tr>
				<td><input type="submit" id="" class="" name="" value="Confirmar Cadastro"></td>
				<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
			</tr>
			';
			}
			?>
		</tbody>
	</table>
</form>