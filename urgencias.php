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
$urgencias = new urgencias();

// Run the page
$urgencias->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>

<div id="data-user" data-user="<?php echo CurrentUserInfo('nombres') . ' ' . CurrentUserInfo('apellidos') ?>" hidden></div>

<div class="row mb-3">
	<div class="col-lg-12" id="tableMaestro_wrapper">
		<table id="tableUrgency" class="table table-striped table-bordered nowrap dt-responsive" style="width: 100%">
			<thead>
				<tr>
					<th>Clasificación</th>
					<th>Tiempo</th>
					<th>Fecha Clasificación</th>
					<th>No. HC</th>
					<th>Paciente</th>
					<th>Urgencia</th>
					<th>Dar de alta</th>
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
					<h5>
						<i class="fa fa-wpforms" aria-hidden="true"></i> Formulario
						<span class="case"></span>
					</h5>
				</div>
				<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionForms">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-12">
								<!-- Formulario urgencia -->
								<form id="form_urgency">
									<div class="form-row">
										<div class="form-group col-lg-3">
											<label for="general">General:</label>
											<select class="form-control" id="general">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="cabeza">Cabeza:</label>
											<select class="form-control" id="cabeza">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="ojo">Ojos:</label>
											<select class="form-control" id="ojo">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="otorrino">Otorrino:</label>
											<select class="form-control" id="otorrino">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-lg-3">
											<label for="boca">Boca:</label>
											<select class="form-control" id="boca">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="cuello">Cuello:</label>
											<select class="form-control" id="cuello">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="torax">Tórax:</label>
											<select class="form-control" id="torax">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="corazon">Corazón:</label>
											<select class="form-control" id="corazon">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-lg-3">
											<label for="pulmon">Pulmón:</label>
											<select class="form-control" id="pulmon">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="abdomen">Abdomen:</label>
											<select class="form-control" id="abdomen">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="pelvis">Pelvis:</label>
											<select class="form-control" id="pelvis">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="rectal">Rectal:</label>
											<select class="form-control" id="rectal">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-lg-3">
											<label for="genital">Genital:</label>
											<select class="form-control" id="genital">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="extremidad">Extremidad:</label>
											<select class="form-control" id="extremidad">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="neuro">Neuro:</label>
											<select class="form-control" id="neuro">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="piel">Piel:</label>
											<select class="form-control" id="piel">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-lg-6">
											<label for="sign">Síntomas:</label>
											<textarea class="form-control" id="sign" placeholder="Síntomas" rows="5"></textarea>
										</div>
										<div class="form-group col-lg-6">
											<label for="description">Descripción diagnóstico:</label>
											<textarea class="form-control" id="description" placeholder="Descripción diagnóstico" rows="5"></textarea>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-lg-6">
											<label for="ec_cie10">CIE10:</label>
											<div class="input-group">
												<input type="text" class="form-control" id="ec_cie10" placeholder="CIE10" disabled />
												<div class="input-group-append">
													<!-- Button trigger modal -->
													<button type="button" class="btn btn-outline-secondary cie10_search" data-toggle="modal" data-target="#CIE10">
														<i class="fa fa-search" aria-hidden="true"></i>
													</button>
												</div>
											</div>
										</div>
										<div class="form-group col-lg-6">
											<label for="other">Otros:</label>
											<textarea class="form-control" id="other" placeholder="Otros"></textarea>
										</div>
									</div>
									<div class="form-row">
										<div class="col-6">
											<div class="form-row">
												<div class="form-group col-auto">
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-medical">
														<i class="fa fa-plus"></i> Medicamentos
													</button>
												</div>
												<div class="form-group col-auto">
													<button type="button" class="btn btn-primary" id="print-medical">
														<i class="fa fa-print"></i> Orden Medicamentos
													</button>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col table-responsive">
													<table id="tableMedical" class="table table-striped table-bordered nowrap" style="width: 100%">
														<thead>
															<tr>
																<th>Medicamento</th>
																<th>Dosis</th>
																<th>Opción</th>
															</tr>
														</thead>
														<tbody></tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-row">
												<div class="form-group col-auto">
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-examen">
														<i class="fa fa-plus"></i> Exámenes
													</button>
												</div>
												<div class="form-group col-auto">
													<button type="button" class="btn btn-primary" id="print-examen">
														<i class="fa fa-print"></i> Orden Exámenes
													</button>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col table-responsive">
													<table id="tableExamen" class="table table-striped table-bordered nowrap" style="width: 100%">
														<thead>
															<tr>
																<th>Exámenes</th>
																<th>Opción</th>
															</tr>
														</thead>
														<tbody></tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</form>
								<!-- end form urgencia-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once "modals.php"; ?>

<script>
	ew.ready("makerjs", "<?php echo $RELATIVE_PATH ?>js/urgency.js", "urgency");
</script>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$urgencias->terminate();
?>