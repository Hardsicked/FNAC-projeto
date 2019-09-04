<?php
	include "../../php/connect.php";
	$cdghe = $_GET['ghe'];
	$sql_check = "SELECT cdRisco FROM tbgherisco WHERE cdGHE =".$cdghe;
	$query_check = mysqli_query ($connect,$sql_check);
?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<h3 class="text-center">Novo Risco da GHE</h3>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<form enctype="multipart/form-data" action="/fnac/forms/cadastro/post/form_cadGHErisco.php" method="POST">
				<table border="1" class="table table-sm table-responsive-xl table-light table-stripped">
					<thead class="thead-light">
						<tr>
							<th class="text-center">Selecionar</th>
							<th class="text-center">Agente</th>
							<th class="text-center">Fonte</th>
							<th class="text-center">Controle</th>
							<th class="text-center">Exposição</th>
						</tr>
					</thead>
					<tbody>
							<?php
							$contador = 1;
							while($check = mysqli_fetch_assoc($query_check)){
								$sql_risco = "SELECT * FROM tbrisco WHERE NOT cdrisco = ".$check['cdRisco'];
								if($contador > 1){
										$sql_risco = $sql_risco."AND NOT cdrisco = ".$check['cdRisco'];
								}
								$contador = $contador + 1;
							}
								$query_risco = mysqli_query ($connect,$sql_risco);
								if($query_risco->num_rows > 0){
									while($risco = mysqli_fetch_assoc($query_risco)){
										$sql2 = "SELECT * From tbagente WHERE cdAgente = " . $risco["cdAgente"];
										$res2 = mysqli_query($connect,$sql2);
										while($row2 = mysqli_fetch_assoc($res2)){
											$sql3 = "SELECT * From tbsubgrupoagente WHERE cdSubGrupo = " . $row2["cdsubGrupo"];
											$res3 = mysqli_query($connect,$sql3);
											while($row3 = mysqli_fetch_assoc($res3)){
												$sql4 = "SELECT * FROM tbgruposagente WHERE cdTipoAgente = " . $row3["cdTipoAgente"];
												$res4 = mysqli_query($connect,$sql4);
												while($row4 = mysqli_fetch_assoc($res4)){
													echo '
														<tr style="background-color: ">
															<td class="text-center"><input type="checkbox" name="cdrisco[]" value="'.$risco["cdrisco"].'"></td>
															<td><b>' . $row4["tipoAgente"] . ' - ' . $row3["nome"] . ' - ' . $row2["nomeAgente"] . '</b></td>
															<td><b>' . $risco["fonte"] . '</b></td>
															<td><b>' . $risco["controle"] . '</b></td>
															<td><b>' . $risco["exposicao"] . '</b></td>
														</tr>
													';
												}
											}
										}
									}
								}else{
									echo'<tr>
											<td colspan="5" class="text-center">Nenhum Risco a ser mostrado</td>
										</tr>';
								}
							?>
					</tbody>
				</table>
				<br>
				<input type="text" name="cdghe" value="<?php echo $cdghe?>" hidden>
				<input type="submit" id="" class="" name="" value="Confirmar Cadastro"><input type="reset" id="" class="" name="" value="Limpar Campos">
			</form>
		</div>
	</div>