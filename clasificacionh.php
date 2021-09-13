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
$clasificacionh = new clasificacionh();

// Run the page
$clasificacionh->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>

<div class="row mb-3">
	<div class="col-lg-12">
		<table id="tableAdmission" class="table table-striped table-bordered dt-responsive nowrap" style="width: 100%">
			<thead>
				<tr>
					<th>No. HC</th>
					<th>Paciente</th>
					<th>Fecha</th>
					<th>Tipo de ingreso</th>
					<th>No. caso 911</th>
					<th>Género</th>
					<th>Acompañante</th>
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
								<!-- Formulario Admision -->
								<form id="form_admission">
									<div class="form-row">
										<div class="form-group col-lg-3">
											<label for="attention">Motivo de la atención:</label>
											<select class="form-control" id="attention">
												<option value="0">
													-- Seleccione una opción --
												</option>
											</select>
										</div>
										<div class="form-group col-lg-3" id="parentLocationTrauma" hidden>
											<label for="locationTrauma">Localización trauma:</label>
											<select class="form-control" id="locationTrauma">
												<option value="0">
													-- Seleccione una opción --
												</option>
											</select>
										</div>
										<div class="form-group col-lg-3" id="parentCauseTrauma" hidden>
											<label for="causeTrauma">Causa trauma:</label>
											<select class="form-control" id="causeTrauma">
												<option value="0">
													-- Seleccione una opción --
												</option>
											</select>
										</div>
										<div class="form-group col-lg-3" id="parentSystem" hidden>
											<label for="system">Sistema:</label>
											<select class="form-control" id="system">
												<option value="0">
													-- Seleccione una opción --
												</option>
											</select>
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-lg-2">
											<label for="glasgow">Glasgow:</label>
											<input type="text" class="form-control" id="glasgow" placeholder="Glasgow" />
										</div>
										<div class="form-group col-lg-2">
											<label for="pas">PAS(mmHg):</label>
											<input type="text" class="form-control" id="pas" placeholder="PAS(mmHg)" />
										</div>
										<div class="form-group col-lg-2">
											<label for="pad">PAD(mmHg):</label>
											<input type="text" class="form-control" id="pad" placeholder="PAD(mmHg)" />
										</div>
										<div class="form-group col-lg-2">
											<label for="fc">FC(bpm):</label>
											<input type="text" class="form-control" id="fc" placeholder="FC(bpm)" />
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-lg-2">
											<label for="so2">SO2(%):</label>
											<input type="text" class="form-control" id="so2" placeholder="SO2(%)" />
										</div>
										<div class="form-group col-lg-2">
											<label for="fr">FR(rpm):</label>
											<input type="text" class="form-control" id="fr" placeholder="FR(rpm)" />
										</div>
										<div class="form-group col-lg-2">
											<label for="temp">Temperatura(c):</label>
											<input type="text" class="form-control" id="temp" placeholder="Temperatura(c)" />
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-lg-3">
											<label for="classification">Clasificación:</label>
											<select class="form-control fa" id="classification">
												<option value="0" style="color: initial">
													-- Seleccione una opción --
												</option>
												<option value="Rojo" class="fa" style="color: red">
													&#xf0c8; Rojo
												</option>
												<option value="Naranja" class="fa" style="color: orange">
													&#xf0c8; Naranja
												</option>
												<option value="Amarillo" class="fa" style="color: yellow">
													&#xf0c8; Amarillo
												</option>
												<option value="Azul" class="fa" style="color: blue">
													&#xf0c8; Azul
												</option>
												<option value="Verde" class="fa" style="color: green">
													&#xf0c8; Verde
												</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="dolor">Dolor:</label>
											<select class="form-control" id="dolor">
												<option value="0">
													-- Seleccione una opción --
												</option>
												<option value="1">Escala 1</option>
												<option value="2">Escala 2</option>
												<option value="3">Escala 3</option>
												<option value="4">Escala 4</option>
												<option value="5">Escala 5</option>
												<option value="6">Escala 6</option>
												<option value="7">Escala 7</option>
												<option value="8">Escala 8</option>
												<option value="9">Escala 9</option>
												<option value="10">Escala 10</option>
											</select>
										</div>
										<div class="form-group col-lg-6">
											<label for="signal">Signos y síntomas:</label>
											<div class="input-group">
												<input id="id_signal" hidden />
												<input type="text" class="form-control" id="signal" placeholder="-- Seleccione una opción --" disabled />
												<div class="input-group-append">
													<!-- Button trigger modal -->
													<button type="button" class="btn btn-outline-secondary signal_search" data-toggle="modal" data-target="#modalSignal" disabled>
														<i class="fa fa-search" aria-hidden="true"></i>
													</button>
												</div>
											</div>
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-lg-6">
											<label for="motivation">Motivo consulta:</label>
											<textarea class="form-control" id="motivation" placeholder="Motivo consulta" rows="5"></textarea>
										</div>
										<div class="form-group col-lg-6">
											<label for="signalDescription">Signos y síntomas descripción:</label>
											<textarea class="form-control" id="signalDescription" placeholder="Signos y síntomas descripción" rows="5"></textarea>
										</div>
									</div>
									<button class="btn btn-primary" id="btnSaveTriage">
										Guardar
									</button>
								</form>
								<!-- end form admision-->
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
	ew.ready("makerjs", "<?php echo $RELATIVE_PATH ?>js/classification.js", "classification");
</script>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$clasificacionh->terminate();
?>