<?php
	session_start();
	require "../php/connect.php";
	$empid = $_SESSION['cdempresa'];
	$contratoid = $_SESSION['cdcontrato'];
	$sql_ghe = "SELECT * FROM tbghe WHERE cdContrato = ".$contrato;
	$query_ghe = mysqli_query($link,$sql_ghe);
	$sql_epi = "SELECT * FROM tbepi WHERE tipoEPI = 4";
	$qry_epi = mysqli_query($link,$sql_epi);
	$sql_inst = "SELECT * FROM tbequipamento WHERE tipoEquipamento = 0";
	$qry_inst = mysqli_query($link,$sql_inst);
	$sql_calb = "SELECT * FROM tbequipamento WHERE tipoEquipamento = 1";
	$qry_calb = mysqli_query($link,$sql_calb);
	$sql_agent = "SELECT * FROM tbsubgrupoagente WHERE cdTipoAgente = 9";
	$qry_agent = mysqli_query($link,$sql_agent);
	$cont = 0;
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
                        url: "forms/cadastro/post/form_cadFichaCampo.php",
                        type: 'POST',
                        enctype: 'multipart/form-data',
                        xhr: function () {
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function (evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = Math.round(evt.loaded / evt.total);
                                    var percent = percentComplete * 100;
                                    //console.log(percentComplete);
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
                                    //console.log(percentComplete);
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
                        success: function (data) {
                            $("#btncadastrar").prop("disabled", false);
                            alert("Ficha Cadastrada com Sucesso!");
                            $(".progress").hide( 500 , function(){
                                $('#novafichamodal').modal('hide');
                                $("#janelabody").show(500);
                            });
                            console.log(data);
							//location.reload(); 
                        }
                    });
                    return false;
                });
               $('#agentemodal').on('show.bs.modal', function (event) {
               		event.preventDefault();
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var recipient = button.data('whatever');
                    // Extract info from data-* attribute
                    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                    var modal = $(this);
                    modal.find('.modal-title').text('Agentes:');
                    document.cookie = "cdFicha="+recipient;
                });
               $(".agentes").click(function(){
               		$(".esconder").toggle();
               });
               $(".esconder").toggle();
               $("#agente").fadeOut(0);
				$("#subgrupo").change(function(){
					var $optionSelected = $("option:selected", this);
    					var $cdid = this.value;
					var $subgrupo = "cadastro/add_ficha_quimico_aux.php?c="+$cdid;
					$("#agente").html($subgrupo);
					$("#agente").load($subgrupo,function(){
						$("#agente").fadeIn(800);
					});					
				});
			});
		</script>
	</head>
	<body>
		<div class="container-fluid">
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
			<div class="col-12">
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
						<tbody id="tablebody">
							<?php 
								
									$sql_ficha = "SELECT * FROM tbficha_campo";
									$query_ficha = mysqli_query($link,$sql_ficha);
			
									while($assoc_ficha = mysqli_fetch_assoc($query_ficha)){
											if($assoc_ficha['tipo'] == 1){
												$tipoMed = "Ruído";
											}elseif($assoc_ficha['tipo'] == 2){
												$tipoMed = "Químco";
											}elseif($assoc_ficha['tipo'] == 3){
												$tipoMed = "Vibração";
											}elseif($assoc_ficha['tipo'] == 4){
												$tipoMed = "Calor";
											}elseif($assoc_ficha['tipo'] == 5){
												$tipoMed = "Qualitativos";
											}
											$agentes = array(
												$assoc_ficha['cdAgente1'],
												$assoc_ficha['cdAgente2'],
												$assoc_ficha['cdAgente3'],
												$assoc_ficha['cdAgente4'],
												$assoc_ficha['cdAgente5'],
												$assoc_ficha['cdAgente6'],
												$assoc_ficha['cdAgente7'],
												$assoc_ficha['cdAgente8'],
												$assoc_ficha['cdAgente9'],
												$assoc_ficha['cdAgente10'],
											);
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
					                                        <button type="button" class="btn btn-info agentes" data-toggle="modal" data-target="#agentemodal"  data-whatever="'.$assoc_ficha["cdFicha"].'">
					                                                Agentes
					                                        </button>
					                                    </td>	
														<td class="text-center"><img ficha="" class="editficha icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/edit.png"/></td>
														<td class="text-center"><img data-fancybox data-type="ajax" data-src="" href="javascript:;" data-confirm="" class="icone2" style="cursor: pointer" width="24px" height="24px" src="img/icons/delete.png"/></td>		
													</tr>
												
											
											<tr class="esconder">';
											?>
												<td colspan="11">
													<table class="table table-striped table-sm table-light table-bordered" style="margin-top: 40px; font-size: 12px;">
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
															</tr>
														</thead>
														<tbody>
															<?php
																$sql1 = "SELECT * FROM tbagente ORDER BY nomeAgente";
																$query1 = mysqli_query($link,$sql1);
																while($row = mysqli_fetch_assoc($query1)){
																	if(in_array($row['cdAgente'], $agentes)){
																		if($row['unidadeMedida'] == 0){
																			$medida = 'Nenhuma';
																		}elseif($row['unidadeMedida'] == 1){
																			$medida = 'ppm';
																		}elseif($row['unidadeMedida'] == 2){
																			$medida = 'mg/m³';
																		}elseif($row['unidadeMedida'] == 3){
																			$medida = 'db(a)';
																		}elseif($row['unidadeMedida'] == 4){
																			$medida = 'Cº';
																		}elseif($row['unidadeMedida'] == 5){
																			$medida = 'ms/2';
																		}elseif($row['unidadeMedida'] == 6){
																			$medida = 'mg';
																		}
																		$sql_subgrupo = "SELECT * FROM tbsubgrupoagente WHERE cdSubGrupo =".$row['cdsubGrupo'];
																		$qry_subgrupo = mysqli_query($link,$sql_subgrupo);
																		foreach ($qry_subgrupo as $sub){
																			$nomesubgrupo = $sub["nome"];
																			$grupoagente = $sub["cdTipoAgente"];
																		}
																		$sql_grupo = "SELECT * FROM tbgruposagente WHERE cdTipoAgente =".$grupoagente;
																		$qry_grupo = mysqli_query($link,$sql_grupo);
																		foreach ($qry_grupo as $grp){
																			$nomegrupo = $grp["tipoAgente"];
																		}
																		echo '<tr style="background-color: ">
																				<td class="text-center" style="word-break:break-all;">' . $row["nomeAgente"] . '</td>
																				<td class="text-center" style="word-break:break-all;">' . $row["codigoAgente"] . '</td>
																				<td class="text-center" style="word-break:break-all;">' . $nomegrupo . '</td>
																				<td class="text-center" style="word-break:break-all;">' . $nomesubgrupo . '</td>
																				<td class="text-center" style="word-break:break-all;">' . $row["codigoESocial"] . '</td>
																				<td class="text-center" style="word-break:break-all;">' . $medida . '</td>
																				<td class="text-center" style="word-break:break-all;">' . $row["divisor"] . '</td>
																				<td class="text-center" style="word-break:break-all;">' . $row["constante"] . '</td>
																				<td class="text-center" style="word-break:break-all;">' . $row["nivelAcao"] . '</td>
																				<td class="text-center" style="word-break:break-all;">' . $row["limiteExposicao"] . '</td>
																				<td class="text-center" style="word-break:break-all;">' . $row["limiteExposicaoMaxima"] . '</td>
																				<td class="text-center" style="word-break:break-all;">' . $row["nivelAcaoACGIH"] . '</td>
																				<td class="text-center" style="word-break:break-all;">' . $row["limiteACGIH"] . '</td>
																				<td class="text-center" style="word-break:break-all;">' . $row["metodoMedicao"] . '</td>
																				<td class="text-center" style="word-break:break-all;">' . $row["aparelhagem"] . '</td>
																				<td class="text-center" style="word-break:break-all;">' . $row["danoSaude"] . '</td>
																				<td class="text-center" style="word-break:break-all;">' . $row["meioPropagacao"] . '</td>
																			</tr>
																		';
																	}
																}?>
														<tbody>
													</table>
												</td>
											</tr>
									<?php } ?>
						</tbody>
					</table>
					</div>
					<div class="row">
						<div class="col-12" id="info">
						</div>
					</div>
			</div>
		</div>
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
                        <div class="col-12">
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
								 <label for="" class="col-form-label">Primeira Imagem</label>
								<input type="file" name="img1">
							</div>
							<div class="form-group">
								 <label for="" class="col-form-label">Segunda Imagem</label>
								<input type="file" name="img2">
							</div>
							<div class="form-group">
								 <label for="" class="col-form-label">Arquivo PDF a ser anexado</label>
								<input type="file" name="pdf">
							</div>
							<div class="form-group">
								<label for="" class="col-form-label">Data</label>
								<input type="date" name="dataaval">
							</div>
                              <div class="form-group">
						<label for="" class="col-form-label">EPI</label>
						<select class="form-control" name="epi" class="form-control">
									<?php 
										while($assoc_epi = mysqli_fetch_assoc($qry_epi)){
										if($assoc_epi["tipoEPI"] == 1){
												$tipoepi = "Capacete";
											}else{
												if($assoc_epi["tipoEPI"] == 2){
													$tipoepi = "Bota";
												}else{
													if($assoc_epi["tipoEPI"] == 3){
														$tipoepi = "Luva";
													}else{
														if($assoc_epi["tipoEPI"] == 4){
															$tipoepi = "Protetor Respiratório";
														}else{
															if($assoc_epi["tipoEPI"] == 5){
																$tipoepi = "Protetor Auricular";
															}else{
																if($assoc_epi["tipoEPI"] == 6){
																	$tipoepi = "Óculos";
																}else{
																	if($assoc_epi["tipoEPI"] == 7){
																		$tipoepi = "Cinto de Segurança";
																	}else{
																		$tipoepi = "Vestimentas";
																	}
																}
															}
														}
													}
												}
											}
											echo'<option value="'.$assoc_epi["cdEPI"].'">'.$tipoepi.' - '.$assoc_epi["fabricante"].' - '.$assoc_epi["modelo"].' - '.$assoc_epi["ca"].'</option>';
										}
									?>
						</select>
					</div>
					<div class="form-group">
						<label for="" class="col-form-label">EPC</label>
						<input class="form-control" size="100" type="text" name="EPC" required>
					</div>
					<div class="form-group">
						<label for="" class="col-form-label">Instrumento</label>
						<table id="userTbl" class="table table-sm table-light table-stripped table-responsive" class="form-control">
							<thead>
								<tr>
									<th class="text-center">Selecionar</th>
									<th class="text-center">Nome do Instrumento</th>
									<th class="text-center">Número</th>
									<th class="text-center">Número de Série</th>
									<th class="text-center">Certificado de Calibração</th>
									<th class="text-center">dataValidade</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								while($assoc_inst = mysqli_fetch_assoc($qry_inst)){
									echo'
										<tr>
											<td class="text-center"><input type="radio" name="inst" value="'.$assoc_inst["cdEquipamento"].'"></td>
											<td class="text-center">'.$assoc_inst["nome"].'</td>
											<td class="text-center">'.$assoc_inst["numero"].'</td>
											<td class="text-center">'.$assoc_inst["numeroSerie"].'</td>
											<td class="text-center">'.$assoc_inst["certCalibracao"].'</td>
											<td class="text-center">'.$assoc_inst["dataValidade"].'</td>
										</tr>
									';
								}
							?>
							</tbody>
						</table>
					</div>
					<div class="form-group">
						<label for="" class="col-form-label">Calibrador</label>
						<table id="userTbl" class="table table-sm table-light table-stripped table-responsive" class="form-control">
							<thead>
								<tr>
									<th class="text-center">Selecionar</th>
									<th class="text-center">Nome do Calibrador</th>
									<th class="text-center">Número</th>
									<th class="text-center">Número de Série</th>
									<th class="text-center">Certificado de Calibração</th>
									<th class="text-center">dataValidade</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								while($assoc_calb = mysqli_fetch_assoc($qry_calb)){
									echo'
										<tr>
											<td class="text-center"><input type="radio" name="calib" value="'.$assoc_calb["cdEquipamento"].'"></td>
											<td class="text-center">'.$assoc_calb["nome"].'</td>
											<td class="text-center">'.$assoc_calb["numero"].'</td>
											<td class="text-center">'.$assoc_calb["numeroSerie"].'</td>
											<td class="text-center">'.$assoc_calb["certCalibracao"].'</td>
											<td class="text-center">'.$assoc_calb["dataValidade"].'</td>
										</tr>
									';
								}
							?>
							</tbody>
						</table>
					</div>
					<div class="form-group">
						<label for="" class="col-form-label">Número do Amostrador</label>
						<input class="form-control" type="text" name="numamos" required>
					</div>
					<div class="form-group">
						<label for="" class="col-form-label">BC</label>
						<input class="form-control" type="text" name="bc" required>
					</div>
					<div class="form-group">
						<label for="" class="col-form-label">Tipo Amostrador</label>
						
							<select class="form-control" name="tipoamos">
								<option value="" selected disabled>Selecione</option>
								<option value="1">PVC</option>
								<option value="2">Éster de celulose</option>
								<option value="3">TCA</option>
								<option value="4">TCP</option>
								<option value="5">Negro de Fumo</option>
								<option value="6">Impjer</option>
								<option value="7">Outro</option>
							</select>
						
					</div>
					<div class="form-group">
						<label for="" class="col-form-label">Grupo do Agente</label>
						
							<select class="form-control" id="subgrupo" name="subgrupo" required>
								<option value="" class="subgrupo" selected disabled>Selecione um Subgrupo</option>
								<?php while($assoc_agent = mysqli_fetch_assoc($qry_agent)){
									echo' <option value="'.$assoc_agent['cdSubGrupo'].'" class="subgrupo">'.$assoc_agent['nome'].'</option>';
									}
								?>
							</select>
						
					</div>
					<div class="form-group" id="agente"></div>
					<div class="form-group">
						<label for="" class="col-form-label">Vazão Inicial</label>
						<input class="form-control" type="number" step="0.01" name="vazinicial" required>
					</div>
					<div class="form-group">
						<label for="" class="col-form-label">Vazão Final</label>
						<input class="form-control" type="number" step="0.01" name="vazfinal" required>
					</div>
					<div class="form-group">
						<label for="" class="col-form-label">Temperatura (C°)</label>
						<input class="form-control" type="text" name="temperatura" required>
					</div>
					<div class="form-group">
						<label for="" class="col-form-label">URA Inicial</label>
						<input class="form-control" type="text" name="urainicial" required>
					</div>
					<div class="form-group">
						<label for="" class="col-form-label">URA Final</label>
						<input class="form-control" type="text" name="urafinal" required>
					</div>
					
					
											
					<div class="form-group">
						<label for="" class="col-form-label">Hora Inicial</label>
						<input class="form-control" type="time" name="hrinicial" required>
					</div>
					<div class="form-group">
						<label for="" class="col-form-label">Intervalo Inicio</label>
						<input class="form-control" type="time" name="intinic" required>
					</div>
					<div class="form-group">
						<label for="" class="col-form-label">Intervalo Final</label>
						<input class="form-control" type="time" name="intfinal" required>
					</div>
					<div class="form-group">
						<label for="" class="col-form-label">Hora Final</label>
						<input class="form-control" type="time" name="hrfinal" required>
					</div>
					<div class="form-group">
						<label for="" class="col-form-label">Dia Típico?</label>
						<input class="form-control" type="radio" name="diaTipico" required value="0" checked>Não
						<input class="form-control" type="radio" name="diaTipico" required value="1">Sim
					</div>
					
					<div class="form-group">
						<label for="" class="col-form-label">Colaborador</label>
						<input class="form-control" type="text" name="colab" required> 
						<label for="" class="col-form-label">Matricula:</label>
						<input class="form-control" type="text" name="colabm" required>
					</div>
					<div class="form-group">
						<label for="" class="col-form-label">Supervisor</label>
						<input class="form-control" type="text" name="superv" required> Matricula:
						<label for="" class="col-form-label">Matricula:</label>
						<input class="form-control" type="text" name="supervm" required>
					</div>
					<div class="form-group">
						<label for="" class="col-form-label">Avaliador</label>
						<input class="form-control" type="text" name="avali" required> Matricula:
						<label for="" class="col-form-label">Matricula:</label>
						<input class="form-control" type="text" name="avalim" required>
					</div>
					<div class="form-group">
						<label for="" class="col-form-label">Amostra Válida</label>
						<input class="form-control" type="radio" name="amostraValida" required value="0" id="amostravalida" checked>Não
						<input class="form-control" type="radio" name="amostraValida" required value="1">Sim
					</div>
					<div class="form-group" id="just2">
						<label for="" class="col-form-label">Justificativa</label>
						<textarea name="justificativa" id="just" required rows="2" col="40" value="" required></textarea>
					</div>
	                        </div>
<<<<<<< HEAD

	                    </div>

	                    <div class="modal-footer">        
	                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
	                        <button type="submit" id="btncadastrar" class="btn btn-primary">Confirmar Cadastro</button>
	                    </div>
	                </form>
=======
	                        <div class="form-group">
	                            <label for="sio2" class="col-form-label">% SIO 2:</label>
	                            <input type="text" name="sio2" class="form-control" id="sio2">
	                        </div>

							<div> 
								<label for="agente" class="col-form-label">Agentes da ficha:</label>
								<?php require "cadastro/add_ficha_agente.php"; ?>
	                    	</div>
                        </div>

                    </div>

                    <div class="modal-footer">        
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btncadastrar" class="btn btn-primary">Confirmar Cadastro</button>
                    </div>
                </form>
>>>>>>> c0a116714789494fa9b03c01bd84df555792f96a
				
                </div>
              </div>
            </div>
          </div>
        </div>
	</body>