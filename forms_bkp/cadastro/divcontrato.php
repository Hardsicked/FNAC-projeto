<?php 
	include "../../php/connect.php";
	$empid = $_GET["cd"];
	$tipo = $_GET["type"];
	$sql1 = "SELECT * FROM tbsuperintendencia WHERE cdEmpresa = ".$empid;
	$res1 = mysqli_query($link,$sql1);
	$sql2 = "SELECT * FROM tbgerencia WHERE cdEmpresa = ".$empid;
	$res2 = mysqli_query($link,$sql2);
	if($tipo == 1){
		echo '
			<form id="" class="" action="/fnac/forms/cadastro/post/form_cadSetor.php?cd='.$empid.'&type=1" method="POST">
			<table class="table table-dark table-striped">
				<thead class="thead-light">
					<th class="text-center" colspan="2">Cadastro de Gerência Geral</th>
				</thead>
				<tbody>
					<tr>
						<td><h5>Gerência Geral</h5></td>
						<td><input type="text" id="" class="" name="SIntendencia" placeholder="Gerência Geral"></td>
					</tr>
					<tr>
						<td><input type="submit" id="" class="" name="btnSave" value="Confirmar Cadastro"></td>
						<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
					</tr>
				</tbody>
			</form>
		';
	}else{
		if($tipo == 2){
			echo '
			<form id="" class="" action="/fnac/forms/cadastro/post/form_cadSetor.php?cd='.$empid.'&type=2" method="POST">
			<table class="table table-dark table-striped">
				<thead class="thead-light">
					<th class="text-center" colspan="2">Cadastro de Gerência</th>
				</thead>
				<tbody>
					<tr>
						<td><h5>Gerência Geral</h5></td>
						<td>
				';
									if($res1->num_rows > 0){
										echo '<select id="" class="" name="cdSIntendencia" id="cdSIntendencia">';
										while($row1 = mysqli_fetch_assoc($res1)){
											echo '
												<option name="cdSIntendencia" id="" class="" value="'.$row1["cdSuperIntendencia"].'">"'.$row1['superintendencia'].'"</option>
											';
										}
										echo '</select>';
									}else{
										echo '<select id="" class="" name="cdSIntendencia" disabled>';
										echo '<option name="cdempresa" id="" class="" value="">Nenhuma Gerência Geral Cadastrada</option>';
										echo '</select>';
									}
				echo '
						</td>
					</tr>
					<tr>
						<td><h5>Gerência</h5></td>
						<td><input type="text" id="" class="" name="gerencia" placeholder="Gerência"></td>
					</tr>
					<tr>
						<td><input type="submit" id="" class="" name="btnSave" value="Confirmar Cadastro"></td>
						<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
					</tr>
				</tbody>
			</form>
			';
		}else{
				echo '
				<form id="" class="" action="/fnac/forms/cadastro/post/form_cadSetor.php?cd='.$empid.'&type=3" method="POST">
					<table class="table table-dark table-striped">
						<thead class="thead-light">
							<th class="text-center" colspan="2">Cadastro de Setor</th>
						</thead>
						<tbody>
							<tr>
								<td><h5>Gerência Geral</h5></td>
								<td>
									<select id="" class="" name="cdSIntendecia" disabled>
										<option name="cdempresa" id="" class="" value="">Gerência Geral Linkada a Gerência</option>
									</select>
								</td>
							</tr>
							<tr>
								<td><h5>Gerência</h5></td>
								<td>
				';
											if($res2->num_rows > 0){
												echo '<select id="" class="" name="cdGerencia">';
												while($row2 = mysqli_fetch_assoc($res2)){
													$sql3 = "SELECT * FROM tbsuperintendencia WHERE cdEmpresa = ".$empid." AND cdSuperIntendencia = ".$row2["cdSuperIntendencia"];
													$res3 = mysqli_query($link,$sql3);
													echo '
														<option name="cdgerencia" id="" class="" value="'.$row2["cdGerencia"].'">"'.$row2["gerencia"].'" - "'.$row3['superintendencia'].'"</option>
													';
												}
												echo '</select>';
											}else{
												echo '<select id="" class="" name="cdGerencia" disabled>';
												echo '<option name="cdempresa" id="" class="" value="">Nenhuma Gerência Cadastrada</option>';
												echo '</select>';
											}
				echo '
								
								</td>
							</tr>
							<tr>
								<td><h5>Setor</h5></td>
								<td><input type="text" id="" class="" name="setor" placeholder="Setor"></td>
							</tr>
							<tr>
								<td><input type="submit" id="" class="" name="btnSave" value="Confirmar Cadastro"></td>
								<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
							</tr>
						</tbody>
				</form>
				';
		}
	}
	?>
			