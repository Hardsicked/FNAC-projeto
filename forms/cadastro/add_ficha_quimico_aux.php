<?php
	require "../../php/connect.php";
	$sql_subg = "SELECT * FROM tbagente";
	$qry_subg = mysqli_query($link,$sql_subg);
	echo'<tr>
		<td>Substância 1</td>
		<td><select name="cdAgente1" required>
			<option value="0">Nenhuma Substância</option>';
			foreach ($qry_subg as $agent){
				echo'<option value="'.$agent["cdAgente"].'">'.$agent["nomeAgente"].'</option>';
			}
		echo'</select></td>
	</tr>
	<tr>
		<td>Substância 2</td>
		<td><select name="cdAgente2">
			<option value="0">Nenhuma Substância</option>';
			foreach ($qry_subg as $agent){
				echo'<option value="'.$agent["cdAgente"].'">'.$agent["nomeAgente"].'</option>';
			}
		echo'</select></td>
	</tr>
	<tr>
		<td>Substância 3</td>
		<td><select name="cdAgente3">
			<option value="0">Nenhuma Substância</option>';
			foreach ($qry_subg as $agent){
				echo'<option value="'.$agent["cdAgente"].'">'.$agent["nomeAgente"].'</option>';
			}
		echo'</select></td>
	</tr>
	<tr>
		<td>Substância 4</td>
		<td><select name="cdAgente4">
			<option value="0">Nenhuma Substância</option>';
			foreach ($qry_subg as $agent){
				echo'<option value="'.$agent["cdAgente"].'">'.$agent["nomeAgente"].'</option>';
			}
		echo'</select></td>
	</tr><tr>
		<td>Substância 5</td>
		<td><select name="cdAgente5">
			<option value="0">Nenhuma Substância</option>';
			foreach ($qry_subg as $agent){
				echo'<option value="'.$agent["cdAgente"].'">'.$agent["nomeAgente"].'</option>';
			}
		echo'</select></td>
	</tr>
	<tr>
		<td>Substância 6</td>
		<td><select name="cdAgente6">
			<option value="0">Nenhuma Substância</option>';
			foreach ($qry_subg as $agent){
				echo'<option value="'.$agent["cdAgente"].'">'.$agent["nomeAgente"].'</option>';
			}
		echo'</select></td>
	</tr><tr>
		<td>Substância 7</td>
		<td><select name="cdAgente7">
			<option value="0">Nenhuma Substância</option>';
			foreach ($qry_subg as $agent){
				echo'<option value="'.$agent["cdAgente"].'">'.$agent["nomeAgente"].'</option>';
			}
		echo'</select></td>
	</tr>
	<tr>
		<td>Substância 8</td>
		<td><select name="cdAgente8">
			<option value="0">Nenhuma Substância</option>';
			foreach ($qry_subg as $agent){
				echo'<option value="'.$agent["cdAgente"].'">'.$agent["nomeAgente"].'</option>';
			}
		echo'</select></td>
	</tr><tr>
		<td>Substância 9</td>
		<td><select name="cdAgente9">
			<option value="0">Nenhuma Substância</option>';
			foreach ($qry_subg as $agent){
				echo'<option value="'.$agent["cdAgente"].'">'.$agent["nomeAgente"].'</option>';
			}
		echo'</select></td>
	</tr>
	<tr>
		<td>Substância 10</td>
		<td><select name="cdAgente10">
			<option value="0">Nenhuma Substância</option>';
			foreach ($qry_subg as $agent){
				echo'<option value="'.$agent["cdAgente"].'">'.$agent["nomeAgente"].'</option>';
			}
		echo'</select></td>
	</tr>';
?>