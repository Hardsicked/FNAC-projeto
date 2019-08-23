<?php 
require "../../php/connect.php";
if (isset($_POST['search'])) {
//Search box value assigning to $Name variable.
   $Name = $_POST['search'];
//Search query.
   $Query = "SELECT * FROM tbagente WHERE nomeAgente LIKE '%$Name%'";
//Query execution
   $ExecQuery = mysqli_query($link, $Query);
//Creating unordered list to display result.
   echo '
   
	<table id="userTbl" class="table table-sm table-light table-stripped table-responsive">
		<thead>
			<tr>
				<th class="text-center">Selecionar Agente</th>
				<th class="text-center">Grupo</th>
				<th class="text-center">Sub Grupo</th>
				<th class="text-center">Agente</th>
			</tr>
		</thead>
		<tbody>';
			foreach($ExecQuery as $agente){
				$sql2 = "SELECT * FROM tbsubgrupoagente WHERE cdSubGrupo = ".$agente['cdsubGrupo'];
				$qry2 = mysqli_query($link,$sql2);
				while($row2 = mysqli_fetch_assoc($qry2)){
					$sql3 = "SELECT * FROM tbgruposagente WHERE cdTipoAgente = ".$row2['cdTipoAgente'];
					$qry3 = mysqli_query($link,$sql3);
					while($row3 = mysqli_fetch_assoc($qry3)){
						echo'
							<tr id="Linha">
								<td class="text-center"><input type="radio" name="agente" value="'.$agente["cdAgente"].'" required></td>
								<td class="text-center">'.$row3["tipoAgente"].'</td>
								<td class="text-center">'.$row2["nome"].'</td>
								<td class="text-center" class="nomeagente">'.$agente["nomeAgente"].'</td>
							</tr>
						';
					}
				}
			}
		?>
		</tbody>
	</table>';
   //Fetching result from database.
<?php   
   }
?>
</ul>