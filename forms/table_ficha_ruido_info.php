<?php
	session_start();
	require "../php/connect.php";
	$cdficha = $_GET["c"];
	$sql_info = "SELECT * FROM tbficha_ruido_info WHERE cdFicha = ".$cdficha;
	$qry_info = mysqli_query($link,$sql_info);
?>
	<head>
		<script>
			$(".novainfo").click(function(){
				var $value = $(this).attr("resultado");
				window.open($value,null,"height=600,width=800,status=no,toolbar=no,menubar=no,location=no");
			});
		</script>
	</head>
	<body>
			<div class="row">
				<div class="col-3">
					<h2 class="text-center">Valores da ficha selecionada</h2>
				</div>
				<div class="col-6"></div>
				<div class="col-3">
					<div class="novobotao text-center novainfo" resultado="/fnac/forms/cadastro/add_ficha_ruido_info.php?c=<?php echo $cdficha; ?>" style="margin-top: 8px; background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Nova Info</b></div>
				</div>
			</div>
			<table class="table table-sm table-light table-stripped table-bordered">
				<thead class="thead-light">
					<tr>
						<th class="text-center">Codigo da Informação</th>
						<th class="text-center">Descrição da Atividade</th>
						<th class="text-center">Local</th>
						<th class="text-center">Horário</th>
						<th class="text-center">Fonte do Agente</th>
						<th class="text-center">Modificar</th>
						<th class="text-center">Excluir</th>
					</tr>
				</thead>
				<tbody>
					<?php while($assoc_info = mysqli_fetch_assoc($qry_info)){
						echo'</td>
										<td class="text-center">'.$assoc_info['cdInfo'].'</td>
										<td class="text-center">'.$assoc_info['ativ'].'</td>
										<td class="text-center">'.$assoc_info['local'].'</td>
										<td class="text-center">'.$assoc_info['horaInicial'].' ás '.$assoc_info['horaFinal'].'</td>
										<td class="text-center">'.$assoc_info['fonte'].'</td>
										<td class="text-center"><img agente="" class="editruido icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png"/></td>
										<td class="text-center"><img data-fancybox data-type="ajax" data-src="" href="javascript:;" data-confirm="" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/delete.png"/></td>
									</tr>
								';
						}?>
				</tbody>
			</table>
		</div>
	</body>
	