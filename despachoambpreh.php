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
$despachoambpreh = new despachoambpreh();

// Run the page
$despachoambpreh->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>

<div class="row mb-3">
	<div class="col-lg-12" id="tableMaestro_wrapper">
		<table id="tableServiceAmbulance" class="table table-striped table-bordered dt-responsive nowrap" style="width: 100%">
			<thead>
				<tr>
					<th>Caso</th>
					<th>Fecha</th>
					<th>Incidente</th>
					<th>Tiempo</th>
					<th>Ambulancia</th>
					<th>Hora asignada</th>
					<th>Hora llegada</th>
					<th>Hora inicio</th>
					<th>Hora destino</th>
					<th>Hora base</th>
					<th>Base</th>
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
								<!-- Formulario ambulancia -->
								<form id="form_ambulance">
									<div class="row">
										<div class="form-group col-md-3">
											<label for="serviceAmbulance">Ambulancia:</label>
											<div class="input-group">
												<input type="text" class="form-control" id="serviceAmbulance" placeholder="Ambulancia" />
												<div class="input-group-append">
													<!-- Button trigger modal -->
													<button type="button" class="btn btn-outline-secondary ambulance_search" data-toggle="modal" data-target="#modalAmbulance">
														<i class="fa fa-search" aria-hidden="true"></i>
													</button>
												</div>
											</div>
										</div>
										<div class="form-group col-md-3">
											<label for="date_asig">H. Asignación:</label>
											<input type="datetime-local" class="form-control change" id="date_asig" step="1" />
										</div>
										<div class="form-group col-md-3">
											<label for="date_lleg">H. Llegada:</label>
											<input type="datetime-local" class="form-control change" id="date_lleg" step="1" />
										</div>
										<div class="form-group col-md-3">
											<label for="date_ini">H. Inicia:</label>
											<input type="datetime-local" class="form-control change" id="date_ini" step="1" />
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-3">
											<label for="date_dest">H. Destino:</label>
											<input type="datetime-local" class="form-control change" id="date_dest" step="1" />
										</div>
										<div class="form-group col-md-3">
											<label for="date_base">H. Base:</label>
											<input type="datetime-local" class="form-control change" id="date_base" step="1" />
										</div>
										<div class="form-group col-md-3">
											<label for="conductor">Conductor:</label>
											<input type="text" class="form-control change" id="conductor" placeholder="Conductor" />
										</div>
										<div class="form-group col-md-3">
											<label for="medico">Médico:</label>
											<input type="text" class="form-control change" id="medico" placeholder="Médico" />
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-3">
											<label for="paramedico">Paramédico:</label>
											<input type="text" class="form-control change" id="paramedico" placeholder="Paramédico" />
										</div>
										<div class="form-group col-md-6">
											<label for="obs">Observaciones:</label>
											<textarea class="form-control change" id="obs" placeholder="Observaciones" rows="3"></textarea>
										</div>
									</div>
								</form>
								<!-- end form ambulance -->
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
	ew.ready("makerjs", "<?php echo $RELATIVE_PATH ?>js/serviceA.js", "serviceA");
</script>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$despachoambpreh->terminate();
?>