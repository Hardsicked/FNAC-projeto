<?php 
	include "../../../php/connect.php";
	$empid = $_GET["e"];
	$tipo = $_GET["t"];
	$identity = $_GET['c'];
	$sql1 = "SELECT * FROM tbsuperintendencia WHERE cdEmpresa = ".$empid;
	$res1 = mysqli_query($link,$sql1);
	$sql2 = "SELECT * FROM tbgerencia WHERE cdEmpresa = ".$empid;
	$res2 = mysqli_query($link,$sql2);
	if($tipo == 1){
		$sql_info= "SELECT * FROM tbsuperintendencia WHERE cdSuperIntendencia= ".$identity;
		$query_info= mysqli_query($link,$sql_info);
		while($assoc_info = mysqli_fetch_assoc($query_info)){
			echo '
				<form id="" class="" action="/fnac/forms/cadastro/post/form_editSetor.php?e='.$empid.'&t=1&c='.$identity.'" method="POST">
				<table class="table table-dark table-striped">
					<thead class="thead-light">
						<th class="text-center" colspan="2">Cadastro de Gerência Geral</th>
					</thead>
					<tbody>
						<tr>
							<td><h5>Gerência Geral</h5></td>
							<td><input type="text" id="" class="" name="SIntendencia" placeholder="Gerência Geral" value="'.$assoc_info['superintendencia'].'"></td>
						</tr>
						<tr>
							<td><input type="submit" id="" class="" name="btnSave" value="Confirmar Cadastro"></td>
							<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
						</tr>
					</tbody>
				</form>
			';
		}
	}else{
		if($tipo == 2){
			$sql_info= "SELECT * FROM tbgerencia WHERE cdGerencia= ".$identity;
			$query_info= mysqli_query($link,$sql_info);
			while($assoc_info = mysqli_fetch_assoc($query_info)){
				echo '
				<form id="" class="" action="/fnac/forms/cadastro/post/form_ediSetor.php?e='.$empid.'&t=2$c='.$identity.'" method="POST">
				<table class="table table-light table-striped">
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
										if($row1['cdSuperIntendencia'] = $assoc_info['cdSuperIntendencia']){
											echo '
												<option name="cdSIntendencia" id="" class="" value="'.$row1["cdSuperIntendencia"].'" selected>"'.$row1['superintendencia'].'"</option>
											';
										}else{
											echo '
												<option name="cdSIntendencia" id="" class="" value="'.$row1["cdSuperIntendencia"].'">"'.$row1['superintendencia'].'"</option>
											';
										}
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
							<td><input type="text" id="" class="" name="gerencia" placeholder="Gerência" value="'.$assoc_info['gerencia'].'"></td>
						</tr>
						<tr>
							<td><input type="submit" id="" class="" name="btnSave" value="Confirmar Cadastro"></td>
							<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
						</tr>
					</tbody>
				</form>
				';
			}
		}else{
			$sql_info= "SELECT * FROM tbsetor WHERE cdSetor= ".$identity;
			$query_info= mysqli_query($link,$sql_info);
			while($assoc_info = mysqli_fetch_assoc($query_info)){
				echo '
				<form id="" class="" "/fnac/forms/cadastro/post/form_ediSetor.php?e='.$empid.'&t=3$c='.$identity.'" method="POST">
					<table class="table table-light table-striped">
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
													if($assoc_info['cdGerencia'] = $row2["cdGerencia"]){
														echo '
															<option name="cdgerencia" id="" class="" value="'.$row2["cdGerencia"].'" selected>"'.$row2["gerencia"].'" - "'.$row3['superintendencia'].'"</option>
														';
													}else{
														echo '
															<option name="cdgerencia" id="" class="" value="'.$row2["cdGerencia"].'">"'.$row2["gerencia"].'" - "'.$row3['superintendencia'].'"</option>
														';
													}
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
								<td><input type="text" id="" class="" name="setor" placeholder="Setor" value="'.$assoc_info['setor'].'"></td>
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
	}
	?>
			