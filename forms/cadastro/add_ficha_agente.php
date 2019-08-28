<?php
	require "../php/connect.php";
	$sql_subg = "SELECT * FROM tbagente";
	$qry_subg = mysqli_query($link,$sql_subg);
	echo'
	<div class="form-group">
		<label class="col-form-label">Agente 1:</label>
		<select class="form-control" name="cdAgente1" required>
			<option value="0">Nenhuma Substância</option>';
			foreach ($qry_subg as $agent){
				echo'<option value="'.$agent["cdAgente"].'">'.$agent["nomeAgente"].'</option>';
			}
		echo'</select>
	</div>
	<div class="form-group">
		<label class="col-form-label">Agente 2:</label>
		<select class="form-control" name="cdAgente2">
			<option value="0">Nenhuma Substância</option>';
			foreach ($qry_subg as $agent){
				echo'<option value="'.$agent["cdAgente"].'">'.$agent["nomeAgente"].'</option>';
			}
		echo'</select>
	</div>
	<div class="form-group">
		<label class="col-form-label">Agente 3:</label>
		<select class="form-control" name="cdAgente3">
			<option value="0">Nenhuma Substância</option>';
			foreach ($qry_subg as $agent){
				echo'<option value="'.$agent["cdAgente"].'">'.$agent["nomeAgente"].'</option>';
			}
		echo'</select>
	</div>
	<div class="form-group">
		<label class="col-form-label">Agente 4:</label>
		<select class="form-control" name="cdAgente4">
			<option value="0">Nenhuma Substância</option>';
			foreach ($qry_subg as $agent){
				echo'<option value="'.$agent["cdAgente"].'">'.$agent["nomeAgente"].'</option>';
			}
		echo'</select>
	</div>
	<div class="form-group">
		<label class="col-form-label">Agente 5:</label>
		<select class="form-control" name="cdAgente5">
			<option value="0">Nenhuma Substância</option>';
			foreach ($qry_subg as $agent){
				echo'<option value="'.$agent["cdAgente"].'">'.$agent["nomeAgente"].'</option>';
			}
		echo'</select>
	</div>
	<div class="form-group">
		<label class="col-form-label">Agente 6:</label>
		<select class="form-control" name="cdAgente6">
			<option value="0">Nenhuma Substância</option>';
			foreach ($qry_subg as $agent){
				echo'<option value="'.$agent["cdAgente"].'">'.$agent["nomeAgente"].'</option>';
			}
		echo'</select>
	</div>
	<div class="form-group">
		<label class="col-form-label">Agente 7:</label>
		<select class="form-control" name="cdAgente7">
			<option value="0">Nenhuma Substância</option>';
			foreach ($qry_subg as $agent){
				echo'<option value="'.$agent["cdAgente"].'">'.$agent["nomeAgente"].'</option>';
			}
		echo'</select>
	</div>
	<div class="form-group">
		<label class="col-form-label">Agente 8:</label>
		<select class="form-control" name="cdAgente8">
			<option value="0">Nenhuma Substância</option>';
			foreach ($qry_subg as $agent){
				echo'<option value="'.$agent["cdAgente"].'">'.$agent["nomeAgente"].'</option>';
			}
		echo'</select>
	</div>
	<div class="form-group">
		<label class="col-form-label">Agente 9:</label>
		<select class="form-control" name="cdAgente9">
			<option value="0">Nenhuma Substância</option>';
			foreach ($qry_subg as $agent){
				echo'<option value="'.$agent["cdAgente"].'">'.$agent["nomeAgente"].'</option>';
			}
		echo'</select>
	</div>
	<div class="form-group">
		<label class="col-form-label">Agente 10:</label>
		<select class="form-control" name="cdAgente10">
			<option value="0">Nenhuma Substância</option>';
			foreach ($qry_subg as $agent){
				echo'<option value="'.$agent["cdAgente"].'">'.$agent["nomeAgente"].'</option>';
			}
		echo'</select>
	</div>';
?>