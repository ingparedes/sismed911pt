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
$admisionhs = new admisionhs();

// Run the page
$admisionhs->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>

<fieldset id="fieldset-admission" hidden>
	<div class="row">
		<div class="col-lg-12">
			<form id="form_admission" class="mb-3">
				<div class="form-row mb-2">
					<div class="form-group col-auto">
						<label for="ingress">Tipo Ingreso:<span style="color: red"> *</span></label>
						<select class="form-control" id="ingress">
							<option>-- Seleccione una opción --</option>
						</select>
					</div>
					<div class="form-group col-auto">
						<label hidden for="code" id="labelCode">Código:<span style="color: red"> *</span></label>
						<input class="form-control" id="code" hidden />
					</div>
					<div class="form-group col-auto">
						<label for="idP">Paciente:<span style="color: red"> *</span></label>
						<div class="d-flex align-items-center">
							<input type="text" class="form-control" id="idP" disabled />
							<span class="fa-stack showModal">
								<i class="fa fa-square fa-stack-2x" style="color: #cbc9ce"></i>
								<i class="fa fa-search fa-stack-1x"></i>
							</span>
							<span class="fa-stack addPatient">
								<i class="fa fa-square fa-stack-2x" style="color: #cbc9ce"></i>
								<i class="fa fa-plus fa-stack-1x"></i>
							</span>
						</div>
					</div>
				</div>
				<div class="form-row mb-2">
					<div class="form-group col-auto">
						<label for="companion">Acompañante:</label>
						<input id="companion" class="form-control" />
					</div>
					<div class="form-group col-auto">
						<label for="tel_companion">Tel. acompañante:</label>
						<input id="phone_companion" class="form-control" />
					</div>
				</div>
				<button class="btn btn-primary not-allowed" id="btnSaveAdmission" disabled>
					Guardar
				</button>
			</form>
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
									<!-- Formulario Paciente -->
									<div class="tab-pane fade show active" id="paciente" role="tabpanel" aria-labelledby="paciente-tab">
										<form id="form_paciente">
											<div class="form-row">
												<div class="form-group col-lg-2">
													<label for="p_ide">IDE:</label>
													<select class="form-control" id="p_ide">
														<option value="0">Seleccione...</option>
													</select>
												</div>
												<div class="form-group col-lg-2">
													<label for="p_number">Número:</label>
													<input type="text" class="form-control" id="p_number" placeholder="Número" />
													<div class="invalid-feedback">Ingrese un número válido</div>
												</div>
												<div class="form-group col-lg-2">
													<label for="p_exp">Expediente:</label>
													<input type="text" class="form-control" id="p_exp" placeholder="Expediente" />
												</div>
												<div class="form-group col-lg-3">
													<label for="p_date">Fecha de nacimiento:</label>
													<input type="date" class="form-control" id="p_date" />
												</div>
												<div class="form-group col-lg-1">
													<label for="p_age">Edad:</label>
													<input type="text" class="form-control" id="p_age" placeholder="Edad" />
												</div>
												<div class="form-group col-lg-2">
													<label for="p_typeage">Tipo de edad:</label>
													<select class="form-control" id="p_typeage">
														<option>Seleccione...</option>
													</select>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-lg-3">
													<label for="p_name1">Nombre 1:</label>
													<input type="text" class="form-control" id="p_name1" placeholder="Nombre 1" />
												</div>
												<div class="form-group col-lg-3">
													<label for="p_name2">Nombre 2:</label>
													<input type="text" class="form-control" id="p_name2" placeholder="Nombre 2" />
												</div>
												<div class="form-group col-lg-3">
													<label for="p_lastname1">Apellido 1:</label>
													<input type="text" class="form-control" id="p_lastname1" placeholder="Apellido 1" />
												</div>
												<div class="form-group col-lg-3">
													<label for="p_lastname2">Apellido 2:</label>
													<input type="text" class="form-control" id="p_lastname2" placeholder="Apellido 2" />
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-lg-1">
													<label class="col-form-label pt-0">Género:</label>
													<div class="form-check">
														<input class="form-check-input gender" type="radio" name="gender" id="p_genM" value="1" />
														<label class="form-check-label" for="p_genM">M</label>
													</div>
													<div class="form-check">
														<input class="form-check-input gender" type="radio" name="gender" id="p_genF" value="2" />
														<label class="form-check-label" for="p_genF">F</label>
													</div>
												</div>
												<div class="form-group col-lg-2">
													<label for="p_phone">Teléfono:</label>
													<input type="text" class="form-control" id="p_phone" placeholder="No. de teléfono" />
												</div>
												<div class="form-group col-lg-2">
													<label for="p_segS">No. seguro social:</label>
													<input type="text" class="form-control" id="p_segS" placeholder="No. seguro social" />
												</div>
												<div class="form-group col-lg-7">
													<label for="p_address">Dirección:</label>
													<input type="text" class="form-control" id="p_address" placeholder="Dirección particular" />
												</div>
											</div>
											<div class="form-row">

												<div class="form-group col-lg-12">
													<label for="p_obs">Observaciones:</label>
													<textarea class="form-control" id="p_obs" placeholder="Observaciones"></textarea>
												</div>
											</div>
										</form>
									</div>
									<!-- end form paciente-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</fieldset>

<?php include_once "modals.php"; ?>

<script>
	ew.ready("makerjs", "<?php echo $RELATIVE_PATH ?>js/admission.js", "admission");
</script>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$admisionhs->terminate();
?>