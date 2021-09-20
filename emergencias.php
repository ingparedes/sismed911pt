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
$emergencias = new emergencias();

// Run the page
$emergencias->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>

<script>
	localStorage.setItem("language", "<?php echo CurrentLanguageID(); ?>");
	localStorage.setItem("pdf_medicalorden", "<?php $Language->Phrase("pdf_medicalorden"); ?>");
	localStorage.setItem("pdf_testorden", "<?php $Language->Phrase("pdf_testorden"); ?>");
	localStorage.setItem("pdf_hospitalname", "<?php $Language->Phrase("pdf_hospitalname"); ?>");
	localStorage.setItem("pdf_expiredate", "<?php $Language->Phrase("pdf_expiredate"); ?>");
	localStorage.setItem("pdf_patientname", "<?php $Language->Phrase("pdf_patientname"); ?>");
	localStorage.setItem("pdf_identity", "<?php $Language->Phrase("pdf_identity"); ?>");
	localStorage.setItem("pdf_code", "<?php $Language->Phrase("pdf_code"); ?>");
	localStorage.setItem("pdf_doctor", "<?php $Language->Phrase("pdf_doctor"); ?>");
	localStorage.setItem("fp_age", "<?php $Language->Phrase("fp_age"); ?>");
	localStorage.setItem("m_medicalsearch", "<?php $Language->Phrase("m_medicalsearch"); ?>");
	localStorage.setItem("m_medicallabel2", "<?php $Language->Phrase("m_medicallabel2"); ?>");
	localStorage.setItem("m_test", "<?php $Language->Phrase("m_test"); ?>");
</script>

<div id="data-user" data-user="<?php echo CurrentUserInfo('nombres') . ' ' . CurrentUserInfo('apellidos') ?>" data-hospital="<?php echo CurrentUserInfo('hospital') ?>" hidden></div>

<div class="row mb-3">
	<div class="col-lg-12">
		<table id="tableEmergency" class="table table-striped table-bordered nowrap dt-responsive" style="width: 100%">
			<thead>
				<tr>
					<th><?php echo $Language->Phrase("clasif_clasif"); ?></th>
					<th><?php echo $Language->Phrase("dt_time"); ?></th>
					<th><?php echo $Language->Phrase("em_dateclasification"); ?></th>
					<th><?php echo $Language->Phrase("dt_hc"); ?></th>
					<th><?php echo $Language->Phrase("dt_patient"); ?></th>
					<th><?php echo $Language->Phrase("dt_emergency"); ?></th>
					<th><?php echo $Language->Phrase("dt_daralta"); ?></th>
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
						<i class="fa fa-wpforms" aria-hidden="true"></i> <?php echo $Language->Phrase("f_title"); ?>
						<span class="case"></span>
					</h5>
				</div>
				<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionForms">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-12">
								<!-- Formulario emergencia -->
								<form id="form_emergency">
									<div class="form-row">
										<div class="form-group col-lg-3">
											<label for="general"><?php echo $Language->Phrase("em_general"); ?>:</label>
											<select class="form-control" id="general">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="cabeza"><?php echo $Language->Phrase("em_cabeza"); ?>:</label>
											<select class="form-control" id="cabeza">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="ojo"><?php echo $Language->Phrase("em_ojo"); ?>:</label>
											<select class="form-control" id="ojo">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="otorrino"><?php echo $Language->Phrase("em_otorrino"); ?>:</label>
											<select class="form-control" id="otorrino">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-lg-3">
											<label for="boca"><?php echo $Language->Phrase("em_boca"); ?>:</label>
											<select class="form-control" id="boca">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="cuello"><?php echo $Language->Phrase("em_cuello"); ?>:</label>
											<select class="form-control" id="cuello">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="torax"><?php echo $Language->Phrase("em_torax"); ?>:</label>
											<select class="form-control" id="torax">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="corazon"><?php echo $Language->Phrase("em_corazon"); ?>:</label>
											<select class="form-control" id="corazon">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-lg-3">
											<label for="pulmon"><?php echo $Language->Phrase("em_pulmon"); ?>:</label>
											<select class="form-control" id="pulmon">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="abdomen"><?php echo $Language->Phrase("em_abdomen"); ?>:</label>
											<select class="form-control" id="abdomen">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="pelvis"><?php echo $Language->Phrase("em_pelvis"); ?>:</label>
											<select class="form-control" id="pelvis">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="rectal"><?php echo $Language->Phrase("em_rectal"); ?>:</label>
											<select class="form-control" id="rectal">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-lg-3">
											<label for="genital"><?php echo $Language->Phrase("em_genital"); ?>:</label>
											<select class="form-control" id="genital">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="extremidad"><?php echo $Language->Phrase("em_extremidad"); ?>:</label>
											<select class="form-control" id="extremidad">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="neuro"><?php echo $Language->Phrase("em_neuro"); ?>:</label>
											<select class="form-control" id="neuro">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="piel"><?php echo $Language->Phrase("em_piel"); ?>:</label>
											<select class="form-control" id="piel">
												<option>-- Seleccione una opción --</option>
											</select>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-lg-6">
											<label for="sign"><?php echo $Language->Phrase("em_sign"); ?>:</label>
											<textarea class="form-control" id="sign" placeholder="<?php echo $Language->Phrase("em_sign"); ?>" rows="5"></textarea>
										</div>
										<div class="form-group col-lg-6">
											<label for="description"><?php echo $Language->Phrase("em_description"); ?>:</label>
											<textarea class="form-control" id="description" placeholder="<?php echo $Language->Phrase("em_description"); ?>" rows="5"></textarea>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-lg-6">
											<label for="ec_cie10"><?php echo $Language->Phrase("fec_cie10"); ?>:</label>
											<div class="input-group">
												<input type="text" class="form-control" id="ec_cie10" placeholder="<?php echo $Language->Phrase("fec_cie10"); ?>" disabled />
												<div class="input-group-append">
													<!-- Button trigger modal -->
													<button type="button" class="btn btn-outline-secondary cie10_search" data-toggle="modal" data-target="#CIE10">
														<i class="fa fa-search" aria-hidden="true"></i>
													</button>
												</div>
											</div>
										</div>
										<div class="form-group col-lg-6">
											<label for="other"><?php echo $Language->Phrase("em_other"); ?>:</label>
											<textarea class="form-control" id="other" placeholder="<?php echo $Language->Phrase("em_other"); ?>"></textarea>
										</div>
									</div>
									<div class="form-row">
										<div class="col-6">
											<div class="form-row">
												<div class="form-group col-auto">
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-medical">
														<i class="fa fa-plus"></i> <?php echo $Language->Phrase("m_medicalsearch"); ?>
													</button>
												</div>
												<div class="form-group col-auto">
													<button type="button" class="btn btn-primary" id="print-medical">
														<i class="fa fa-print"></i> <?php echo $Language->Phrase("em_ordenmedical"); ?>
													</button>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col table-responsive">
													<table id="tableMedical" class="table table-striped table-bordered nowrap" style="width: 100%">
														<thead>
															<tr>
																<th><?php echo $Language->Phrase("m_medicalsearch"); ?></th>
																<th><?php echo $Language->Phrase("m_medicallabel2"); ?></th>
																<th><?php echo $Language->Phrase("em_option"); ?></th>
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
														<i class="fa fa-plus"></i> <?php echo $Language->Phrase("m_test"); ?>
													</button>
												</div>
												<div class="form-group col-auto">
													<button type="button" class="btn btn-primary" id="print-examen">
														<i class="fa fa-print"></i> <?php echo $Language->Phrase("em_ordentest"); ?>
													</button>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col table-responsive">
													<table id="tableExamen" class="table table-striped table-bordered nowrap" style="width: 100%">
														<thead>
															<tr>
																<th><?php echo $Language->Phrase("m_test"); ?></th>
																<th><?php echo $Language->Phrase("em_option"); ?></th>
															</tr>
														</thead>
														<tbody></tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</form>
								<!-- end form emergencia-->
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
	ew.ready("makerjs", "<?php echo $RELATIVE_PATH ?>js/emergency.js", "emergency");
</script>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$emergencias->terminate();
?>