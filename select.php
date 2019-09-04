<form action="" method="post">
	<table class="table table-sm table-responsive-sm table-light">
		<thead class="thead-light">
			<tr>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Empresa</td>
				<td>
					<select id="" class="" name="cdempresa">
						<?php
							while($row = mysqli_fetch_assoc($row1)){
								echo '
									<option id="" class="" value="'.$row["cdEmpresa"].'">"'.$row['nomeEmpresa'].'"</option>
								';
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2"><center><button type="submit" id="next">Próximo</button></center></td>
			</tr>
			<input class="hidden-xs-up" name="select" value="1" disabled>
		</tbody>
	</table>
</form>