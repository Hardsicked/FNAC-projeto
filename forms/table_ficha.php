<?php
	session_start();
	require "../php/connect.php";
	$empid = $_SESSION['cdempresa'];
	$contratoid = $_SESSION['cdcontrato'];
	$sql_ghe = "SELECT * FROM tbghe WHERE cdEmpresa = ".$empid." AND cdContrato = ".$contratoid;
	$query_ghe = mysqli_query($link,$sql_ghe);
	$sql_agente = "SELECT * FROM tbagente";
	$query_agente = mysqli_query($link,$sql_agente);
?>
	<head>
		<script>
			$(document).ready(function(){
	            $("#btncadastrar").click(function(){
                    event.preventDefault();
                    var form = $('#cadastrar')[0];
                    var data = new FormData(form);
                    $("#btncadastrar").prop("disabled", true);
                    $("#janelabody").hide(100);
                    $(".progress").show(0);
                    $.ajax({
                        url: "form/cadastro/post/form_cadFichaCampo.php",
                        type: 'POST',
                        enctype: 'multipart/form-data',
                        xhr: function () {
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function (evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = Math.round(evt.loaded / evt.total);
                                    var percent = percentComplete * 100;
                                    console.log(percentComplete);
                                    $('.progress').css({
                                        width: percentComplete * 100 + '%'
                                    });
                                    $('.progress').html(percent + '%');
                                    if (percentComplete === 1) {
                                        $('.progress').addClass('hide');
                                    }
                                }
                            }, false);
                            xhr.addEventListener("progress", function (evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = Math.round(evt.loaded / evt.total);
                                    console.log(percentComplete);
                                    $('.progress').css({
                                        width: percentComplete * 100 + '%'
                                    });
                                }
                            }, false);
                            return xhr;
                        },
                        data: data,
                        processData: false,
                        contentType: false,
                        success: function () {
                            $("#btncadastrar").prop("disabled", false);
                            alert("Ficha Cadastrada com Sucesso!");
                            $(".progress").hide( 500 , function(){
                                $('#novafichamodal').modal('hide');
                                $("#janelabody").show(500);
                            });
                            location.reload(); 
                        },
                        error: function (status) {
                            alert(status);
                        }
                    });
                    return false;
                });
			})
		</script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-3">
					<h2 class="text-center">Fichas de Campo</h2>
				</div>
				<div class="col-6"></div>
				<div class="col-3">
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#novafichamodal">
	                        Nova Ficha
	                </button>
				</div>
			</div>
			<div class="row">
				<form method="post" action="">
					<table class="table table-sm table-light table-stripped table-bordered">
						<thead class="thead-light">
							<tr>
								<th class="text-center">GHE</th>
								<th class="text-center">DR</th>
								<th class="text-center">Tipo</th>
								<th class="text-center">Número da Amostra</th>
								<th class="text-center">Código de Rastreio</th>
								<th class="text-center">Data de Avaliação</th>
								<th class="text-center">Concentração</th>
								<th class="text-center">sio2</th>
								<th class="text-center">Agentes</th>
								<th class="text-center">Modificar</th>
								<th class="text-center">Deletar</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								
									$sql_ficha = "SELECT * FROM tbficha_campo";
									$query_ficha = mysqli_query($link,$sql_ficha);
			
									while($assoc_ficha = mysqli_fetch_assoc($query_ficha)){
											if($assoc_ficha['tipo'] == 1){
												$tipoMed = "Ruídoo";
											}elseif($assoc_ficha['tipo'] == 2){
												$tipoMed = "Químco";
											}elseif($assoc_ficha['tipo'] == 3){
												$tipoMed = "Vibração";
											}elseif($assoc_ficha['tipo'] == 4){
												$tipoMed = "Calor";
											}elseif($assoc_ficha['tipo'] == 5){
												$tipoMed = "Qualitativos";
											}
											echo '<tr>';
											$descmed = $assoc_ficha["descMed"];
											echo '		<td class="text-center">'.$assoc_ficha['cdGHE'].'</td>
														<td class="text-center">'.$assoc_ficha['DR'].'</td>	
														<td class="text-center">'.$tipoMed.'</td>
														<td class="text-center">'.$assoc_ficha['numAmostrador'].'</td>
														<td class="text-center">'.$assoc_ficha['codRastreio'].'</td>
														<td class="text-center">'.$assoc_ficha['dataAval'].'</td>
														<td class="text-center">'.$assoc_ficha['concMedicao'].'</td>
														<td class="text-center">'.$assoc_ficha['sio2'].'</td>
														<td style="text-align: center;">
					                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#agentemodal"  data-whatever="'.$assoc_ficha["cdFicha"].'">
					                                                Agentes
					                                        </button>
					                                    </td>	
														<td class="text-center"><img ficha="" class="editficha icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png"/></td>
														<td class="text-center"><img data-fancybox data-type="ajax" data-src="" href="javascript:;" data-confirm="" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/delete.png"/></td>		
													</tr>
												';
									}?>
						</tbody>
					</table>
					</div>
					<div class="row">
						<div class="col-12" id="info">
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="modal fade" id="agentemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Agentes:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="progress2" style="background: #166fff; display: block; height: 20px; text-align: center; transition: width .3s; width: 0; color: white;"></div>
                <div class="container-fluid" id="janelabody">
                    <div class="row" id="tabela">
                    </div>
                    <div class="modal-footer">      
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="novafichamodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
          <div class="modal-dialog" role="document" style="width: 70%;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alterar</h5>
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
							    <label for="GHE" class="col-form-label">GHE</label>
							    <select class="form-control" id="GHE" name="GHE">
							    	<option value="" selected>Selecione</option>
							      <?php
										while($assoc_ghe = mysqli_fetch_assoc($query_ghe)){
											$cdGHE = $assoc_ghe['cdGHE'];
											$codGHE = $assoc_ghe['codGHE'];
											echo'<option value="'.$cdGHE.'">'.$codGHE.'</option>';
										}
									?>
							    </select>
							  </div>
                              <div class="form-group">
                                <label for="tipo" class="col-form-label">Tipo de Ficha:</label>
                                <select id="tipo" name="tipo" class="form-control" required>
                                        <option value="" selected>Selecione</option>
                                        <option value="1">Ruído</option>
                                        <option value="2">Químico</option>
                                        <option value="3">Vibração</option>
                                        <option value="4">Calor</option>
                                        <option value="5">Qualitativo</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="drn" class="col-form-label">DR:</label>
                                <input type="text" name="drn" class="form-control" id="drn">
                              </div>  
                              <div class="form-group">
                                <label for="numAmos" class="col-form-label">Número do Amostrador:</label>
                                <textarea name="numAmos" class="form-control" id="numAmos"></textarea>
                              </div>
                              <div class="form-group">
                                <label for="codRastreio" class="col-form-label">Código de Rastreio:</label>
                                <input type="text" name="codRastreio" class="form-control" id="codRastreio">
                            </div>  
                          	<div class="form-group">
                                <label for="dataAval" class="col-form-label">Data de Avaliação:</label>
                                <input type="date" name="dataAval" class="form-control" id="dataAval">
                            </div>   

	                    	<div class="form-group">
	                            <label for="concMedicao" class="col-form-label">Concentração de Medição:</label>
	                            <input type="text" name="concMedicao" class="form-control" id="concMedicao">
	                        </div>
	                        <div class="form-group">
	                            <label for="sio2" class="col-form-label">% SIO 2:</label>
	                            <input type="text" name="sio2" class="form-control" id="sio2">
	                        </div> 
                        </div>
                        <div class="col-6"> 
							<label for="agente" class="col-form-label">Agentes da ficha:</label>
							<?php require "cadastro/add_ficha_agente.php"; ?>
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
	</body>
	