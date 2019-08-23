<?php
	require "../php/connect.php";
	session_start();
	$cdemp = $_GET['c'];	
	$sql_perf = "SELECT * FROM tbperfis WHERE cdEmpresa = ".$cdemp;
	$qry_perf = mysqli_query($link,$sql_perf);
?>
<body>
	<div class="container">
		<div class="row">
			<div class="col-8"><h2>Perfis da Empresa <?php echo "empresa:".$cdemp;?></h2></div>
			<div class="col-2">
				<div data-fancybox data-type="ajax" data-src="/fnac/forms/cadastro/add_perfil.php?c=<?php echo $cdemp; ?>" href="javascript:;" class="novobotao" style="background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Novo Perfil</b></div>
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
						<th>Modificar</th>
						<th>Excluir</th>
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
								<td class="text-center"><img data-fancybox data-type="ajax" data-src="forms/cadastro/edit/edit_perfil.php?c='.$_SESSION["cdempresa"].'&p=' . $row_perf['cdPerfil'] . '" href="javascript:;" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png"/></td>
								<td class="text-center"><img data-fancybox data-type="ajax" data-src="" href="javascript:; class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/delete.png"/></td>
							</tr>';
						}
					}else{
						echo'<tr>
								<td colspan="5">Nenhum Perfil cadastrado</td>
							</tr>';
					}?>
				</tbody>
			</table>
		</div>
	</div>
</body>