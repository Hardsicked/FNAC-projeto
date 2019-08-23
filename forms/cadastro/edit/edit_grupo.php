<?php 
		$cdGrupo = $_GET['c'];
?>
<div class="container">
	<form id="" class="" action="/fnac/forms/cadastro/post/form_editGrupo.php?c=<?php echo $cdGrupo; ?>" method="POST">
		<table class="table table-sm table-responsive-xl table-light">
			<thead class="thead-light">
				<tr>
					<th colspan="2" class="text-center">Modificar Grupo</th>
				</tr>
			</thead>
<?php
	require("../../../php/connect.php");
	$sqlg = "SELECT * FROM tbgruposagente WHERE cdTipoAgente =".$cdGrupo;
	$qryg = mysqli_query($link,$sqlg);
	while ($rowg = mysqli_fetch_assoc($qryg)){
		echo '
						<tbody>
							<tr>
								<td>Nome do Grupo</td>
								<td><input type="text" id="nomeGrupo" class="" name="nomeGrupo" value="'.$rowg["tipoAgente"].'"required></td>
							</tr>
							<tr>				
								<td><input type="submit" id="" class="" name="" value="Confirmar Cadastro"></td>
								<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
							</tr>
						</tbody>
			';
	}
?>
		</table>
	</form>
</div>