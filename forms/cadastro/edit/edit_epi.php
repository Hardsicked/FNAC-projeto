<?php
	include "../../../php/connect.php";
	$sql1 = "SELECT * From tbepi WHERE cdEpi =".$_GET["cd"];
	$res1 = mysqli_query($connect,$sql1);
	while($row = mysqli_fetch_assoc($res1)){
		echo '
			<form id="" class="" action="/fnac/forms/cadastro/post/form_editEPI.php" method="POST">
				<table class="table table-dark">
					<thead class="thead-light">
						<tr>
							<th colspan="2" class="text-center">Modificar EPI: ' . $row["nome"] . ' - ' . $row["modelo"] . '</th>
						</tr>
					</thead>
					<tbody>
						<tr>';
		if($row["tipoEPI"] == 1){
			echo '
							<td><h5>Tipo de EPI: </h5></td>
							<td><select id="" class="" name="tpEPI">
									<option id="" class="" value="1" selected>Capacete</option>
									<option id="" class="" value="2">Bota</option>
									<option id="" class="" value="3">Luva</option>
								</select>
							</td>
				';
		}else{
			if($row["tipoEPI"] == 2){
			echo '
							<td><h5>Tipo de EPI: </h5></td>
							<td><select id="" class="" name="tpEPI">
									<option id="" class="" value="1">Capacete</option>
									<option id="" class="" value="2" selected>Bota</option>
									<option id="" class="" value="3">Luva</option>
								</select>
							</td>
			';
			}else{
			echo '
							<td><h5>Tipo de EPI: </h5></td>
							<td><select id="" class="" name="tpEPI">
									<option id="" class="" value="1">Capacete</option>
									<option id="" class="" value="2">Bota</option>
									<option id="" class="" value="3" selected>Luva</option>
								</select>
							</td>
			';
			}
		}
		echo '
						</tr>
						<tr>
							<td>Nome do Epi:</td>
							<td><input type="text" id="" class="" name="nmEPI" placeholder="Nome do EPI" required value="' . $row["nome"] . '"></td>
						</tr>
						<tr>
							<td>Fabricante:</td>
							<td><input type="text" id="" class="" name="fabricante" placeholder="Fabricante" required value="' . $row["fabricante"] . '"></td>
						</tr>
						<tr>
							<td>Modelo:</td>
							<td><input type="text" id="" class="" name="modelo" placeholder="Modelo" required value="' . $row["modelo"] . '"></td>
						</tr>
						<tr>
							<td>CA:</td>
							<td><input type="text" id="" class="" name="ca" placeholder="CA" required value="' . $row["ca"] . '"></td>
						</tr>
						<tr>
							<td>Nível de Proteção</td>
							<td><input type="text" id="" class="" name="nivelProtecao" placeholder="Nível de Proteção" required value="' . $row["nivelProtecao"] . '"></td>
						</tr>
						<tr>
							<td><input type="submit" id="" class="" name="btnSave" value="Confirmar Edição"></td>
						</tr>
					</tbody>
			</form>
		';
	}
?>