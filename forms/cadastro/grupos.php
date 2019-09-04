<?php
	if(isset($_POST["btnSave"])){
		include "../../php/connect.php";
		$nome = $_POST["nome"];
		$sql = "INSERT INTO tbtipoagente (tipoAgente) VALUES('".$nome."')";
		if(mysqli_query($link, $sql)){
			echo "Grupo cadastrado com sucesso!";
		}else{
			echo "Erro ao cadastrar Grupo".mysqli_error($link);
		}
	}
?>
<div class="container">
	<table class="table table-sm table-responsive-xl table-light">
		<form id="" class="" action="" method="post">
			<thead class="thead-light">
				<tr>
					<th colspan="2" class="text-center">Novo Grupo</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Nome do Grupo</td>
					<td><input type="text" name="nome" id="nome"></td>
				</tr>
				<tr>				
					<td><input type="submit" id="" class="" name="btnSave" value="Confirmar Cadastro"></td>
					<td><input type="reset" id="" class="" name="" value="Limpar Campos"></td>
				</tr>
			</tbody>
		</form>
	</table>
</div>
	