<?php
	require ("../../../php/connect.php");
	$cdSubGrupo = $_GET['c'];
	$sqlg = "SELECT * FROM tbgruposagente";
	$qryg = mysqli_query($link,$sqlg);
	$sqlsg = "SELECT * FROM tbsubgrupoagente WHERE cdSubGrupo =".$cdSubGrupo;
	$qrysg = mysqli_query($link,$sqlsg);
?>
<form action="/fnac/forms/cadastro/post/form_editSubGrupo.php?c=<?php echo $cdSubGrupo ?>" method="post">
					<table class="table table-sm table-responsive-xl table-light">
						<thead class="thead-light">
							<tr>
								<th colspan="2" class="text-center">Novo Sub Grupo</th>
							</tr>
						</thead>
						<tbody>
						<?php
							while($rowsg = mysqli_fetch_assoc($qrysg)){
								echo'
								<tr>
									<td>Grupo</td>
									<td>
										<select name="cdTipoAgente">';
									while($rowg = mysqli_fetch_assoc($qryg)){
										if ($rowg['cdTipoAgente'] = $rowsg["cdTipoAgente"]){
											echo'<option value="'.$rowg["cdTipoAgente"].'" selected>'.$rowg["tipoAgente"].'</option>';
										}else{
											echo'<option value="'.$rowg["cdTipoAgente"].'">'.$rowg["tipoAgente"].'</option>';
										}
									}
								echo'</select>
								</td>
							</tr>
							<tr>
								<td>Nome do Sub Grupo</td>
								<td><input type="text" name="nomeSubGrupo" value="'.$rowsg["nome"].'"></td>
							</tr>
							<tr>				
								<td><input type="submit" id="" class="" name="" value="Confirmar Cadastro"></td>
								<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
							</tr>';
							}
							?>
						</tbody>
					</table>
				</form>