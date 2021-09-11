<?php

namespace PHPMaker2020\sismed911;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$Controprehmaster = new Controprehmaster();

// Run the page
$Controprehmaster->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>

<link rel="stylesheet" href="assets/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" href="assets/responsive.bootstrap4.min.css" />
<link rel="stylesheet" href="assets/select.bootstrap4.min.css" />

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<table id="tableMaestro" class="table table-striped table-bordered dt-responsive nowrap" style="width: 100%">
				<thead>
					<tr>
						<th>Caso</th>
						<th>Fecha</th>
						<th>Tiempo</th>
						<th>Dirección</th>
						<th>Incidente</th>
						<th>Prioridad</th>
						<th>Paciente</th>
						<th>H. destino</th>
						<th>Nombre médico</th>
						<th>Teléfono</th>
						<th>Reporta</th>
						<th>Seguimiento</th>
						<th>Cerrar</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="accordion accordionForms" id="accordionForms">
				<div class="card">
					<div class="card-header" id="headingOne">
						<h5><i class="fa fa-wpforms" aria-hidden="true"></i> Formulario <span class="case"></span></h5>
					</div>
					<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionForms">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-12">
									<ul class="nav nav-tabs" id="myTab" role="tablist">
										<li class="nav-item" role="presentation">
											<a class="nav-link active" id="paciente-tab" data-toggle="tab" href="#paciente" role="tab" aria-controls="paciente" aria-selected="true">Paciente</a>
										</li>
										<li class="nav-item" role="presentation">
											<a class="nav-link" id="evaluacion-tab" data-toggle="tab" href="#evaluacion" role="tab" aria-controls="evaluacion" aria-selected="false">Evaluación clínica</a>
										</li>
										<li class="nav-item" role="presentation">
											<a class="nav-link" id="hospital-tab" data-toggle="tab" href="#hospital" role="tab" aria-controls="hospital" aria-selected="false">Hospital</a>
										</li>
									</ul>
									<div class="tab-content">
										<!-- Formulario Paciente -->
										<div class="tab-pane fade show active" id="paciente" role="tabpanel" aria-labelledby="paciente-tab">
											<form id="form_paciente">
												<div class="form-row">
													<div class="form-group col-lg-1">
														<label for="p_ide">IDE:</label>
														<select class="form-control" id="p_ide">
															<option>Seleccione...</option>
														</select>
													</div>
													<div class="form-group col-lg-2">
														<label for="p_number">Número:</label>
														<input type="text" class="form-control" id="p_number" placeholder="Número" />
													</div>
													<div class="form-group col-lg-2">
														<label for="p_exp">Expediente:</label>
														<input type="text" class="form-control" id="p_exp" placeholder="Expediente" />
													</div>
													<div class="form-group col-lg-2">
														<label for="p_date">Fecha de nacimiento:</label>
														<input type="date" class="form-control" id="p_date" />
													</div>
													<div class="form-group col-lg-1">
														<label for="p_age">Edad:</label>
														<input type="text" class="form-control" id="p_age" placeholder="Edad" />
													</div>
													<div class="form-group col-lg-1">
														<label for="p_typeage">Tipo edad:</label>
														<input type="text" class="form-control" id="p_typeage" placeholder="Tipo edad" />
													</div>
													<div class="form-group col-lg-1">
														<legend class="col-form-label pt-0">Género:</legend>
														<div class="form-check">
															<input class="form-check-input gender" type="radio" name="gender" id="p_genM" value="m" />
															<label class="form-check-label" for="p_genM">M</label>
														</div>
														<div class="form-check">
															<input class="form-check-input gender" type="radio" name="gender" id="p_genF" value="f" />
															<label class="form-check-label" for="p_genF">F</label>
														</div>
													</div>
													<div class="form-group col-lg-2">
														<label for="p_phone">Teléfono:</label>
														<input type="text" class="form-control" id="p_phone" placeholder="Número de teléfono" />
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-2">
														<label for="p_name1">Nombre 1:</label>
														<input type="text" class="form-control" id="p_name1" placeholder="Nombre 1" />
													</div>
													<div class="form-group col-lg-2">
														<label for="p_name2">Nombre 2:</label>
														<input type="text" class="form-control" id="p_name2" placeholder="Nombre 2" />
													</div>
													<div class="form-group col-lg-2">
														<label for="p_lastname1">Apellido 1:</label>
														<input type="text" class="form-control" id="p_lastname1" placeholder="Apellido 1" />
													</div>
													<div class="form-group col-lg-2">
														<label for="p_lastname2">Apellido 2:</label>
														<input type="text" class="form-control" id="p_lastname2" placeholder="Apellido 2" />
													</div>
													<div class="form-group col-lg-2">
														<label for="p_segS">No. seguro social:</label>
														<input type="text" class="form-control" id="p_segS" placeholder="No. seguro social" />
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-4">
														<label for="p_address">Dirección:</label>
														<input type="text" class="form-control" id="p_address" placeholder="Dirección particular" />
													</div>
													<div class="form-group col-lg-6">
														<label for="p_obs">Observaciones:</label>
														<textarea class="form-control" id="p_obs" placeholder="Observaciones"></textarea>
													</div>
												</div>
											</form>
										</div>
										<!-- end form paciente-->

										<!-- Formulario Evaluación clínica -->
										<div class="tab-pane fade" id="evaluacion" role="tabpanel" aria-labelledby="evaluacion-tab">
											<form id="form_evalClinic" class="needs-validation" novalidate>
												<div class="form-row">
													<div class="form-group col-lg-2">
														<label for="ec_triage">Triage:</label>
														<select class="form-control" id="ec_triage" required>
															<option>Seleccione...</option>
														</select>
														<div class="invalid-tooltip">Please select a valid state.</div>
													</div>
													<div class="form-group col-lg-2">
														<label for="ec_ta">T.A:</label>
														<input type="text" class="form-control" id="ec_ta" placeholder="T.A" />
													</div>
													<div class="form-group col-lg-2">
														<label for="ec_fc">F.C:</label>
														<input type="text" class="form-control" id="ec_fc" placeholder="F.C" />
													</div>
													<div class="form-group col-lg-2">
														<label for="ec_fr">F.R:</label>
														<input type="text" class="form-control" id="ec_fr" placeholder="F.R" />
													</div>
													<div class="form-group col-lg-1">
														<label for="ec_temp">T°:</label>
														<input type="text" class="form-control" id="ec_temp" placeholder="T°" />
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-1">
														<label for="ec_gl">Glasgow:</label>
														<input type="text" class="form-control" id="ec_gl" placeholder="Glasgow" />
													</div>
													<div class="form-group col-lg-1">
														<label for="ec_sato2">sv sat 02:</label>
														<input type="text" class="form-control" id="ec_sato2" placeholder="sv sat O2" />
													</div>
													<div class="form-group col-lg-1">
														<label for="ec_gli">Glicemia:</label>
														<input type="text" class="form-control" id="ec_gli" placeholder="Glicemia" />
													</div>
													<div class="form-group col-lg-1">
														<label for="ec_talla">Talla:</label>
														<input type="text" class="form-control" id="ec_talla" placeholder="Talla" />
													</div>
													<div class="form-group col-lg-1">
														<label for="ec_peso">Peso:</label>
														<input type="text" class="form-control" id="ec_peso" placeholder="Peso" />
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-10">
														<label for="ec_cie10">CIE10:</label>
														<div class="input-group">
															<input type="text" class="form-control" id="ec_cie10" placeholder="CIE10" />
															<div class="input-group-append">
																<!-- Button trigger modal -->
																<button type="button" class="btn btn-outline-secondary cie10_search" data-toggle="modal" data-target="#CIE10">
																	<i class="fa fa-search" aria-hidden="true"></i>
																</button>
															</div>
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-3">
														<label for="ec_cuadro">Cuadro clínico:</label>
														<textarea class="form-control" id="ec_cuadro" rows="3" placeholder="Cuadro clínico"></textarea>
													</div>
													<div class="form-group col-lg-3">
														<label for="ec_examen">Examen físico:</label>
														<textarea class="form-control" id="ec_examen" rows="3" placeholder="Examen físico"></textarea>
													</div>
													<div class="form-group col-lg-3">
														<label for="ec_antec">Antecedentes:</label>
														<textarea class="form-control" id="ec_antec" rows="3" placeholder="Antecedentes"></textarea>
													</div>
													<div class="form-group col-lg-3">
														<label for="ec_parac">Paraclínicos:</label>
														<textarea class="form-control" id="ec_parac" rows="3" placeholder="Paraclínicos"></textarea>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label for="ec_tratam">Tratamiento:</label>
														<textarea class="form-control" id="ec_tratam" rows="3" placeholder="Tratamiento"></textarea>
													</div>
													<div class="form-group col-lg-6">
														<label for="ec_inform">Informacion DX:</label>
														<textarea class="form-control" id="ec_inform" rows="3" placeholder="Informacion DX"></textarea>
													</div>
												</div>
											</form>
										</div>
										<!-- end form Evaluacion clínica-->

										<!-- Formulario Hospital -->
										<div class="tab-pane fade" id="hospital" role="tabpanel" aria-labelledby="hospital-tab">
											<form id="form_hospital">
												<div class="form-row">
													<div class="form-group col-lg-8">
														<label for="hosp_dest">H Destino:</label>
														<div class="input-group">
															<input type="text" class="form-control" id="hosp_dest" placeholder="Hospital destino" />
															<div class="input-group-append">
																<!-- Button trigger modal -->
																<button type="button" class="btn btn-outline-secondary hosp_search" data-toggle="modal" data-target="#hosp">
																	<i class="fa fa-search" aria-hidden="true"></i>
																</button>
															</div>
														</div>
													</div>
													<div class="form-group col-lg-2">
														<label for="hosp_nomMed">Nombre Médico:</label>
														<input type="text" class="form-control" id="hosp_nomMed" placeholder="Nombre Médico" />
													</div>
													<div class="form-group col-lg-2">
														<label for="hosp_telMed">Tel. Médico:</label>
														<input type="text" class="form-control" id="hosp_telMed" placeholder="Tel. Médico" />
													</div>
												</div>
											</form>
										</div>
										<!-- end form hospital -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal CIE10-->
<div class="modal fade" id="CIE10" tabindex="-1" aria-labelledby="CIE" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="CIE">Seleccione el CIE10</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table id="tableCIE10" class="table table-striped table-bordered" style="width: 100%">
					<thead>
						<tr>
							<th>Código</th>
							<th>Diagnóstico</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary not-allowed btnCIE10" data-dismiss="modal" disabled>
					Aceptar
				</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal Hospital -->
<div class="modal fade" id="hosp" tabindex="-1" aria-labelledby="hospit" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="hospit">Seleccione el hospital</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table id="tableHosp" class="table table-striped table-bordered" style="width: 100%">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nombre</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary not-allowed btnHosp" data-dismiss="modal" disabled>
					Aceptar
				</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal Cerrar Caso -->
<div class="modal fade" id="modalR" tabindex="-1" aria-labelledby="razonM" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="razonM">Cerrar el caso</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<label for="selectRazon">Seleccione el tipo de cierre</label>
				<select class="form-control" id="selectRazon">
					<option>Seleccione...</option>
				</select>
				<br />
				<label for="razon">Por favor, escriba la razón por la cual cierra el caso:</label>
				<textarea class="form-control" id="razon" rows="5" placeholder="Razón"></textarea>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary not-allowed btnRazon" data-dismiss="modal" disabled>
					Aceptar
				</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal Seguimiento -->
<div class="modal fade" id="modalSeg" tabindex="-1" aria-labelledby="seguim" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="seguim">Seguimiento</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<label>Notas:</label>
				<ul id="segNote"></ul>
				<br />
				<label for="noteInput">Por favor, escriba la nota:</label>
				<input type="text" class="form-control" id="noteInput" placeholder="Nota" />
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary not-allowed btnNote" data-dismiss="modal" disabled>
					Aceptar
				</button>
			</div>
		</div>
	</div>
</div>

<script>
	ew.ready("dataTable", "<?php echo $RELATIVE_PATH ?>js/prehM.js", "prehM");
</script>
<!-- </body>
</html> -->

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$Controprehmaster->terminate();
?>