<?php
	require "../php/connect.php";
	session_start();
	$sql_perf = "SELECT * FROM tbperfis WHERE cdEmpresa = ".$_SESSION["cdempresa"];
	$qry_perf = mysqli_query($link,$sql_perf);
?>
<body>
	<div class="container">
		<div class="row">
			<div class="col-8"><h2>Perfis da Empresa</h2></div>
			<div class="col-2">
				<div data-fancybox data-type="ajax" data-src="/fnac/forms/cadastro/add_perfil.php?c=<?php echo $_SESSION["cdempresa"]; ?>" href="javascript:;" class="novobotao" style="background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Novo Perfil</b></div>
			</div>
		</div>
		<div class="row">
			<table class="table table-sm table-light table-bordered">
				<thead>
					<tr>
						<th>Responsável Técnico Eng</th>
						<th>Cargo Eng</th>
						<th>Técnico -Seg</th>
						<th>Cargo</th>
						<th>Logomarca</th>
						<th>Endereço do Rodapé</th>
						<th>Logo e Rodapé Ativados?</th>
						<th>Observações</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if($qry_perf->num_rows > 0){
						while($row_perf = mysqli_fetch_assoc($qry_perf)){
						echo '<tr>
								<td>'.$row_perf['responsavel'].'</td>
								<td>'.$row_perf['cargoeng'].'</td>
								<td>'.$row_perf['tecnico'].'</td>
								<td>'.$row_perf['cargotec'].'</td>
								<td><img height="50px" width="auto" src="/fnac/img_perfil/'.$row_perf['logomarca'].'"/></td>
								<td>'.$row_perf['endereco'].'</td>
								<td>';
									if($row_perf['logorodape'] == 1){
										echo'<img height="24px" widht="24px" src="img/icons/true.png"/>';
									}else{
										echo'<img height="24px" widht="24px" src="img/icons/false.png"/>';
									}
								echo '
								</td>
								<td>'.$row_perf['observacao'].'</td>
							</tr>';
						}
					}else{
						echo'<tr>
								<td colspan="8">Nenhum Perfil cadastrado</td>
							</tr>';
					}?>
				</tbody>
			</table>
		</div>
	</div>
</body>