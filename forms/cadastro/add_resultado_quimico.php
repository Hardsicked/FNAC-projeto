<?php
	require "../../php/connect.php";
	$ghe = $_POST["ghe"];
	$sql_info_subgrupo = "SELECT * FROM tbsubgrupoagente WHERE cdTipoAgente = 9";
	$qry_info_subgrupo = mysqli_query($link,$sql_info_subgrupo);
?>
<head>
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
		<link rel="stylesheet" href="../../css/fnac.css">
		
		<!-- Custom styles for this template -->
		<link href="../../css/scrolling-nav.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../../css/jquery.fancybox.min.css">
		<!-- Bootstrap core JavaScript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="../../js/bootstrap.min.js"></script>

		<!-- Plugin JavaScript -->
		<!--<script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

		<!-- Custom JavaScript for this theme -->
		<script src="../../js/scrolling-nav.js"></script>
		<script src="../../js/jquery.fancybox.min.js"></script>
</head>
<body>
	<div class="modal fade" id="novafichamodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nova Ficha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="progress" style="background: #166fff; display: block; height: 20px; text-align: center; transition: width .3s; width: 0; color: white;"></div>
                <div class="container-fluid" id="janelabody">
                    <div class="row">
                        <div class="col-6">
                            <form method="POST" id="cadastrar" enctype="multipart/form-data">
                            	<div class="form-group">
									<label for="" class="col-form-label">Código de Rastreio</label>
									<input class="form-control" type="text" name="rastreio" required>
								</div>
								<div class="form-group">
									<label for="" class="col-form-label">Data de Avaliação</label>
									<input class="form-control" type="date" name="dataaval" required>
								</div>
								<div class="form-group">
									<?php
										if($qry_info_subgrupo->num_rows > 0){
											echo '<label for="" class="col-form-label">Agente Quimico</label>
													
														<select id="" class="" name="cdRisco" required>
											';
											while($assoc_subgrupo = mysqli_fetch_assoc($qry_info_subgrupo)){
												$sql_info_agente = "SELECT * FROM tbagente WHERE cdsubGrupo = ".$assoc_subgrupo["cdSubGrupo"];
												$qry_info_agente = mysqli_query($link,$sql_info_agente);
												while($assoc_agente = mysqli_fetch_assoc($qry_info_agente)){
													$agente = $assoc_agente["cdAgente"];
													$sql_info_risco = "SELECT * FROM tbrisco WHERE cdGHE = ".$ghe." AND cdAgente = ".$agente;
													$qry_info_risco = mysqli_query($link,$sql_info_risco);
													while($assoc_risco = mysqli_fetch_assoc($qry_info_risco)){
														echo '<option id="" class="" value="'.$assoc_risco["cdrisco"].'">'.$assoc_subgrupo["nome"]." - ".$assoc_agente["nomeAgente"].'</option>';
													}
												}
													
											}
										}else{
											echo '<label for="" class="col-form-label">Agente Quimico <img height="20px" width="20px" style="margin-top: -4px;" src="../../img/icons/alert.png"/></label>
													
														<select id="" class="" name="cdRisco" disabled>
															<option id="" class="" >Nenhum Risco Químico cadastrado</option>
												';
										}
									?>
										</select>					
									
								</div>
								<div class="form-group">
									<label for="" class="col-form-label">Resultado</label>
									<input class="form-control" type="text" name="resultado" required>
								</div>
								<div class="form-group">
									<label for="" class="col-form-label">% Sio2</label>
									<input class="form-control" type="text" name="sio2">    <input type="checkbox" name="imprimir" value="1">Habilitar?
								</div>
								<div class="form-group">
									<label for="" class="col-form-label">Observação</label>
									<input class="form-control" type="text" name="obs">
								</div>
								<div class="form-group">
									<label for="" class="col-form-label">GFIP</label>
									<select id="" class="" name="gfip" required>
											<option id="" class="" value="0">00 - Não Exposto a agente nocivo</option>
											<option id="" class="" value="1">01 - Não Exposição a agente nocivo.Trabalhador já esteve exposto</option>
											<option id="" class="" value="2">02 - Exposição a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
											<option id="" class="" value="3">03 - Exposição a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
											<option id="" class="" value="4">04 - Exposição a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>
											<option id="" class="" value="5">05 - Não Exposto a agente nocivo</option>
											<option id="" class="" value="6">06 - Exposição a agente nocivo (Aposentadoria especial aos 15 anos de trabalho)</option>
											<option id="" class="" value="7">07 - Exposição a agente nocivo (Aposentadoria especial aos 20 anos de trabalho)</option>
											<option id="" class="" value="8">08 - Exposição a agente nocivo (Aposentadoria especial aos 25 anos de trabalho)</option>
										</select>
									
								</div>
								<div class="form-group">
									<label for="" class="col-form-label"><?php if($qry_info_subgrupo->num_rows > 0){
													echo'<input class="form-control" type="submit" id="" class="" name="" value="Confirmar Cadastro">';
												}else{
													echo'<input class="form-control" type="submit" id="" class="" name="" value="Confirmar Cadastro" disabled>';
												}
										?>
									</label>
									<input class="form-control" type="reset" id="" class="" name="" value="Limpar Campos">
								</div>
                        </div>

                    </div>

                    <div class="modal-footer">        
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btncadastrar" class="btn btn-primary">Confirmar Cadastro</button>
                    </div>
                </form>
				
                </div>
              </div>
            </div>
          </div>
        </div>
	<form id="" class="" action="/fnac/forms/cadastro/post/form_cadResultadoquimico.php" method="POST">
		<table class="table table-sm table-light">
			<thead class="thead-light">
				<tr>
					<th colspan="2" class="text-center">Novo Resultado Químico</th>
				</tr>
			</thead>
			<tbody>
				
			</tbody>
		</table>
	</form>
</body>
