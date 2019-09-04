<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<?php 
 	error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);
	include "../../php/connect.php";
	session_start();
	$cdghe = $_GET['cd'];
	$empid = $_SESSION["cdempresa"];
	$contrato = $_SESSION["cdcontrato"];
	$SQL = "SELECT * FROM tbrisco WHERE cdGHE =".$cdghe;
	$QUERY = mysqli_query($link,$SQL);
	header ('Content-type: text/html; charset=UTF-8');
?>
	<div class="container-fluid">
		<div class="row"><div class="col-12"><h3>Risco</h3></div></div>
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8"></div>
			<div class="col-2">
				<div data-fancybox data-type="ajax" data-src="forms/cadastro/GHErisco.php?ghe=<?php echo $cdghe; ?>" href="javascript:;" class="novobotao text-center" style="background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Nova Risco</b></div></a>
			</div>
		</div>
		<div class="row">
			<div id="tabela" class="col-md-12">
				<table class="table table-striped table-responsive-xl table-sm"  style="margin-top: 40px">
					<thead class="thead-light">
						<tr>
							<th>Código</th>							
							<th>Agente</th>
							<th>Fonte</th>
							<th>Controle</th>
							<th>Exposição</th>
							<th>Remover</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($QUERY->num_rows > 0){
							while($ASSOC = mysqli_fetch_assoc($QUERY)){
								$sql2 = "SELECT * From tbagente WHERE cdAgente = " . $ASSOC["cdAgente"];
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
													<td><b>' . $ASSOC["cdrisco"] . '</b></td>
													<td><b>' . $row4["tipoAgente"] . ' - ' . $row3["nome"] . ' - ' . $row2["nomeAgente"] . '</b></td>
													<td><b>' . $ASSOC["fonte"] . '</b></td>
													<td><b>' . $ASSOC["controle"] . '</b></td>
													<td><b>' . $ASSOC["exposicao"] . '</b></td>
													<td><b><img src="img/icons/delete.png" width="24px" height="24px" data-fancybox data-type="ajax" data-src="forms/cadastro/post/forms_delriscoGHE.php?cd=' . $ASSOC["cdRisco"] . '" href="javascript:;" class="icone2"/></td>
												</tr>
											';
										}
									}
								}
							}
						}else{
							echo '
								<tr style="background-color: ">
									<td colspan="12">Nehnum Risco Cadastrado</td>
								</tr>
							';
						}
						?>
					<tbody>
				</table>
			</div>
		</div>
	</div>
</html>