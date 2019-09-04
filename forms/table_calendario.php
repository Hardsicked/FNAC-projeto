<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<?php 
 	error_reporting(E_ALL ^ E_DEPRECATED);
	include "../php/connect.php";
	$sql1 = "SELECT * From tbequipamento";
	$res1 = mysqli_query($connect,$sql1);
	header ('Content-type: text/html; charset=UTF-8');
?>
	<div class="container">
	<div class="row"><div class="col-12"><h3>Equipamento</h3></div></div>
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8"></div>
			<div class="col-2">
				<div data-fancybox data-type="ajax" data-src="forms/cadastro/equipamento.php" href="javascript:;" class="novobotao" style="background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Novo Equipamento</b></div>
			</div>
		</div>
		<div class="row">			
			<div id="tabela" class="col-md-12">
				<table class="table table-striped table-responsive-xl table-sm table-bordered"  style="margin-top: 40px">
					<thead class="thead-light">
						<tr>
							<th>Número de Cadastro</th>
							<th>Tipo de Equipamento</th>
							<th>Nome</th>
							<th>Número</th>
							<th>Número de Serie</th>
							<th>Certificado de Calibração</th>
							<th>Data de Validade</th>
							<th>Modificar Equipamento</th>
							<th>Excluir Equipamento</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if ($res1->num_rows > 0){
								while($row = mysqli_fetch_assoc($res1)){
								if($row["tipoEquipamento"] == 0){
									$tipoequipamento = "Instrumento";
								}else{
									$tipoequipamento = "Calibrador";
								}
									echo '
										<tr style="background-color: ">
											<td>' . $row["cdEquipamento"] . '</td>
											<td>' . $tipoequipamento . '</td>
											<td>' . $row["nome"] . '</td>
											<td>' . $row["numero"] . '</td>
											<td>' . $row["numeroSerie"] . '</td>
											<td>' . $row["certCalibracao"] .  '</td>
											<td>' . $row["dataValidade"] .  '</td>
											<td><img data-fancybox data-type="ajax" data-src="forms/cadastro/edit/edit_equipamento.php?cd='.$row["cdEquipamento"].'" href="javascript:;"id="modcadastro" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png"/></td>
											<td><img class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/delete.png"/></td>
										</tr>
									';
								}
							}
						?>
					<tbody>
				</table>
			</div>
		</div>
	</div>
</html>