<?php 
	require "../php/connect.php";
	session_start ();
	$empid = $_SESSION['cdempresa'];
	$contratoid = $_SESSION['cdcontrato'];
	$sql_ghe = "SELECT * FROM tbghe WHERE cdEmpresa = ".$empid." AND cdContrato = ".$contratoid;
	$query_ghe = mysqli_query($link,$sql_ghe);
?>
<script>
    $(document).ready(function(){
      // bind change event to select
	  $('#botaoconfirma').on('click', function() {
          var ghe = $('#dynamic_select').val(); // get selected value
          if (ghe) { // require a URL
			var gheresul = 'forms/table_resultado.php?c=' + ghe;
              $("#resul").load(gheresul);
          }
      });
    });
</script>
<div class="container">
	<div class="row">
		<div class="col-4">
			<h2 class="text-center"> Escolha a GHE</h2>
		</div>
		<div class="col-4">
			<select id="dynamic_select">
				<?php while($assoc_ghe = mysqli_fetch_assoc($query_ghe)){
					echo' <option value="'.$assoc_ghe['cdGHE'].'">'.$assoc_ghe['codGHE'].' - '.$assoc_ghe['nomeGHE'].'</option>';
				}?>
			</select>
		</div>
		<div class="col-4">
			<center><button id="botaoconfirma">Selecionar</button></center>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div id="resul"></div>
		</div>
	</div>
</div>