<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<?php 
 	error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE ^ E_WARNING);
	$_SERVER['DOCUMENT_ROOT'] = dirname(__FILE__);
	header ('Content-type: text/html; charset=UTF-8');
	include "../php/connect.php";
	if (!isset($_SESSION)) session_start();
	if (!isset($_SESSION["cdLogin"])) {
		//Destrói a sessão por segurança
		session_destroy();
		//Redireciona o visitante de volta pro login
		header("Location: index.php"); exit;
	}
	if (!isset($_SESSION['cdcontrato'])){
		header ("Location: sel.php");
	}
	$cdLogin = $_SESSION["cdLogin"];
	$LNome = $_SESSION["nome"];
	$_SESSION['cd'] = $_SESSION['cdempresa'];
	$contrato = $_SESSION['cdcontrato'];
	$sql1 = "SELECT * FROM tbagente";
	$query1 = mysqli_query($link,$sql1);
?>
<script>
function novoagente() {
	window.open("forms/cadastro/agente.php",null,"height=900,width=800,status=no,toolbar=no,menubar=no,location=no");
};
$(".editagente").click(function(){
	var $value = $(this).attr("agente");
	window.open($value,null,"height=900,width=800,status=no,toolbar=no,menubar=no,location=no");
});
</script>
		<div class="row"><div class="col-12"><h3 class="text-center">Agentes</h3></div></div>
		<div class="row">
			<div class="col-2">
				<div style="cursor: pointer" alt="Editar Grupos" data-fancybox data-type="ajax" data-src="forms/grupos.php" href="javascript:;" class="novobotao text-center" style="background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Grupos</b></div>
			</div>
			<div class="col-2">
				<div style="cursor: pointer" alt="Editar Sub-Grupos" data-fancybox data-type="ajax" data-src="forms/subgrupos.php" href="javascript:;" class="novobotao text-center" style="background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Sub Grupos</b></div>
			</div>
			<div class="col-6"></div>
			<div class="col-2">
				<div onclick="novoagente()" class="novobotao text-center" style="background-color: #94f441; cursor: pointer; color: white; border-radius: 2px;"><b>Novo Agente</b></div>
			</div>
		</div>
		<div class="row">
			<div id="tabela" class="col-12">
					<table class="table table-striped table-sm table-light table-responsive table-bordered" style="margin-top: 40px">
						<thead class="thead-light">
							<tr>
								<th class="text-center">Nome do Agente</th>
								<th class="text-center">Código do Agente</th>
								<th class="text-center">Grupo</th>
								<th class="text-center">Sub Grupo</th>
								<th class="text-center">Codigo E Social</th>
								<th class="text-center">Unidade de Medida</th>
								<th class="text-center">Divisor</th>
								<th class="text-center">Constante</th>
								<th class="text-center">Nivel de Ação</th>
								<th class="text-center">Limite de Exposição</th>
								<th class="text-center">Limite de Exposição Máxima</th>
								<th class="text-center">Nível de Ação ACGIH</th>
								<th class="text-center">Limite de Exposição ACGIH</th>
								<th class="text-center">Método de Medição</th>
								<th class="text-center">Aparelhagem</th>
								<th class="text-center">Dano a Saúde</th>
								<th class="text-center">Meio de Propagação</th>
								<th class="text-center">Alterar</th>
								<th class="text-center">Excluir</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if ($query1->num_rows > 0){
									while($row = mysqli_fetch_assoc($query1)){
										echo '
											<tr style="background-color: ">
												<td class="text-center">' . $row["nomeAgente"] . '</td>
												<td class="text-center">' . $row["codigoAgente"] . '</td>
												<td class="text-center">' . $row["nomeAgente"] . '</td>
												<td class="text-center">' . $row["nomeAgente"] . '</td>
												<td class="text-center">' . $row["codigoESocial"] . '</td>
												<td class="text-center">' . $row["unidadeMedida"] . '</td>
												<td class="text-center">' . $row["divisor"] . '</td>
												<td class="text-center">' . $row["constante"] . '</td>
												<td class="text-center">' . $row["nivelAcao"] . '</td>
												<td class="text-center">' . $row["limiteExposicao"] . '</td>
												<td class="text-center">' . $row["limiteExposicaoMaxima"] . '</td>
												<td class="text-center">' . $row["nivelAcaoACGIH"] . '</td>
												<td class="text-center">' . $row["limiteACGIH"] . '</td>
												<td class="text-center">' . $row["metodoMedicao"] . '</td>
												<td class="text-center">' . $row["aparelhagem"] . '</td>
												<td class="text-center">' . $row["danoSaude"] . '</td>
												<td class="text-center">' . $row["meioPropagacao"] . '</td>
												<td class="text-center"><b><img agente="forms/cadastro/edit/edit_agente.php?c='.$row["cdAgente"].'" href="javascript:;" class="editagente icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png"/></b></td>
												<td class="text-center"><b><img data-fancybox data-type="ajax" data-src="forms/cadastro/post/form_delAgente.php?c='.$row["cdAgente"].'" href="javascript:; class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/delete.png"/></b></td>
											</tr>
										';
									}
								}else{
									echo '
										<tr style="background-color: ">
											<td class="text-center" colspan="17">Nehnum Agente Cadastrada</td>
										</tr>
									';
								}
							?>
						<tbody>
					</table>
			</div>
		</div>
</html>