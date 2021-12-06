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

global $Language;
?>
<?php include_once "header.php"; ?>

<script>
	localStorage.setItem("language", "<?php echo CurrentLanguageID(); ?>");
	localStorage.setItem("language_new_case", "<?php echo $Language->Phrase('dt_newcase'); ?>");
	localStorage.setItem("language_map", "<?php echo $Language->Phrase('dt_map'); ?>");
	localStorage.setItem("language_select", "<?php echo $Language->Phrase('fp_select'); ?>");
</script>

<div class="row mb-3">
	<div class="col-lg-12">
		<table id="tableMaestro" class="table table-striped table-bordered dt-responsive nowrap" style="width: 100%">
			<thead>
				<tr>
					<th><?php echo $Language->Phrase("dt_case"); ?></th>
					<th><?php echo $Language->Phrase("dt_date"); ?></th>
					<th><?php echo $Language->Phrase("dt_time"); ?></th>
					<th><?php echo $Language->Phrase("dt_patient"); ?></th>
					<th><?php echo $Language->Phrase("dt_address"); ?></th>
					<th><?php echo $Language->Phrase("dt_incident"); ?></th>
					<th><?php echo $Language->Phrase("dt_priority"); ?></th>					
					<th><?php echo $Language->Phrase("dt_destinationhospital"); ?></th>
					<th><?php echo $Language->Phrase("dt_medicalname"); ?></th>
					<th><?php echo $Language->Phrase("dt_phone"); ?></th>
					<th><?php echo $Language->Phrase("dt_report"); ?></th>
					<th><?php echo $Language->Phrase("dt_followup"); ?></th>
					<th><?php echo $Language->Phrase("dt_dispatch"); ?></th>
					<th><?php echo $Language->Phrase("dt_close"); ?></th>
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
					<h5><i class="fa fa-wpforms" aria-hidden="true"></i> <?php echo $Language->Phrase("f_title"); ?> <span class="case"></span></h5>
				</div>
				<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionForms">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-12">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item" role="presentation">
										<a class="nav-link active" id="paciente-tab" data-toggle="tab" href="#paciente" role="tab" aria-controls="paciente" aria-selected="true"><?php echo $Language->Phrase("fp_title"); ?></a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" id="evaluacion-tab" data-toggle="tab" href="#evaluacion" role="tab" aria-controls="evaluacion" aria-selected="false"><?php echo $Language->Phrase("fec_title"); ?></a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" id="hospital-tab" data-toggle="tab" href="#hospital" role="tab" aria-controls="hospital" aria-selected="false"><?php echo $Language->Phrase("fh_title"); ?></a>
									</li>
								</ul>
								<div class="tab-content mt-3">
									<!-- Formulario Paciente -->
									<div class="tab-pane fade show active" id="paciente" role="tabpanel" aria-labelledby="paciente-tab">
										<form id="form_paciente">
											<div class="form-row">
												<div class="form-group col-lg-2">
													<label for="p_ide"><?php echo $Language->Phrase("fp_ide"); ?>:</label>
													<select class="form-control" id="p_ide">
														<option value="0"><?php echo $Language->Phrase("fp_select"); ?></option>
													</select>
												</div>
												<div class="form-group col-lg-2">
													<label for="p_number"><?php echo $Language->Phrase("fp_number"); ?>:</label>
													<input type="text" class="form-control" id="p_number" placeholder="<?php echo $Language->Phrase("fp_number"); ?>" />
													<div class="invalid-feedback"><?php echo $Language->Phrase("fp_invalidfeedback"); ?></div>
												</div>
												<div class="form-group col-lg-2">
													<label for="p_exp"><?php echo $Language->Phrase("fp_record"); ?>:</label>
													<input type="text" class="form-control" id="p_exp" placeholder="<?php echo $Language->Phrase("fp_record"); ?>" />
												</div>
												<div class="form-group col-lg-3">
													<label for="p_date"><?php echo $Language->Phrase("fp_datebirth"); ?>:</label>
													<input type="date" class="form-control" id="p_date" />
												</div>
												<div class="form-group col-lg-1">
													<label for="p_age"><?php echo $Language->Phrase("fp_age"); ?>:</label>
													<input type="text" class="form-control" id="p_age" placeholder="<?php echo $Language->Phrase("fp_age"); ?>" />
												</div>
												<div class="form-group col-lg-2">
													<label for="p_typeage"><?php echo $Language->Phrase("fp_typeage"); ?>:</label>
													<select class="form-control" id="p_typeage">
														<option><?php echo $Language->Phrase("fp_select"); ?></option>
													</select>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-lg-3">
													<label for="p_name1"><?php echo $Language->Phrase("fp_name1"); ?>:</label>
													<input type="text" class="form-control" id="p_name1" placeholder="<?php echo $Language->Phrase("fp_name1"); ?>" />
												</div>
												<div class="form-group col-lg-3">
													<label for="p_name2"><?php echo $Language->Phrase("fp_name2"); ?>:</label>
													<input type="text" class="form-control" id="p_name2" placeholder="<?php echo $Language->Phrase("fp_name2"); ?>" />
												</div>
												<div class="form-group col-lg-3">
													<label for="p_lastname1"><?php echo $Language->Phrase("fp_lastname1"); ?>:</label>
													<input type="text" class="form-control" id="p_lastname1" placeholder="<?php echo $Language->Phrase("fp_lastname1"); ?>" />
												</div>
												<div class="form-group col-lg-3">
													<label for="p_lastname2"><?php echo $Language->Phrase("fp_lastname2"); ?>:</label>
													<input type="text" class="form-control" id="p_lastname2" placeholder="<?php echo $Language->Phrase("fp_lastname2"); ?>" />
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-lg-auto">
													<label class="col-form-label pt-0"><?php echo $Language->Phrase("fp_gender"); ?>:</label>
													<div class="form-check">
														<input class="form-check-input gender" type="radio" name="gender" id="p_genM" value="1" />
														<label class="form-check-label" for="p_genM"><?php echo $Language->Phrase("fp_male"); ?></label>
													</div>
													<div class="form-check">
														<input class="form-check-input gender" type="radio" name="gender" id="p_genF" value="2" />
														<label class="form-check-label" for="p_genF"><?php echo $Language->Phrase("fp_female"); ?></label>
													</div>
													<div class="form-check">
														<input class="form-check-input gender" type="radio" name="gender" id="p_genO" value="3" />
														<label class="form-check-label" for="p_genF"><?php echo $Language->Phrase("em_other"); ?></label>
													</div>
												</div>
												<div class="form-group col-lg-2">
													<label for="p_phone"><?php echo $Language->Phrase("fp_nickname"); ?>:</label>
													<input type="text" class="form-control" id="p_nickname" />
												</div>
												<div class="form-group col-lg-2">
													<label for="p_phone"><?php echo $Language->Phrase("fp_nationality"); ?>:</label>
													<input type="text" class="form-control" id="p_nationality" />
												</div>
												<div class="form-group col-lg-2">
													<label for="p_phone"><?php echo $Language->Phrase("fp_phone"); ?>:</label>
													<input type="text" class="form-control" id="p_phone" />
												</div>
												<div class="form-group col-lg-2">
													<label for="p_segS"><?php echo $Language->Phrase("fp_social"); ?>:</label>
													<input type="text" class="form-control" id="p_segS" placeholder="<?php echo $Language->Phrase("fp_social"); ?>" />
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-lg-6">
													<label for="p_address"><?php echo $Language->Phrase("fp_address"); ?>:</label>
													<input type="text" class="form-control" id="p_address" placeholder="<?php echo $Language->Phrase("fp_address"); ?>" />
												</div>
												<div class="form-group col-lg-6">
													<label for="p_obs"><?php echo $Language->Phrase("fp_observation"); ?>:</label>
													<textarea class="form-control" id="p_obs" placeholder="<?php echo $Language->Phrase("fp_observation"); ?>"></textarea>
												</div>
											</div>
										</form>
									</div>
									<!-- end form paciente-->

									<!-- Formulario Evaluación clínica -->
									<div class="tab-pane fade" id="evaluacion" role="tabpanel" aria-labelledby="evaluacion-tab">
										<form id="form_evalClinic">
											<div class="form-row">
												<div class="form-group col-lg-2">
													<label for="ec_ta"><?php echo $Language->Phrase("fec_ta"); ?>:</label>
													<input type="text" class="form-control" id="ec_ta" placeholder="<?php echo $Language->Phrase("fec_ta"); ?>" />
												</div>
												<div class="form-group col-lg-2">
													<label for="ec_fc"><?php echo $Language->Phrase("fec_fc"); ?>:</label>
													<input type="text" class="form-control" id="ec_fc" placeholder="<?php echo $Language->Phrase("fec_fc"); ?>" />
												</div>
												<div class="form-group col-lg-2">
													<label for="ec_fr"><?php echo $Language->Phrase("fec_fr"); ?>:</label>
													<input type="text" class="form-control" id="ec_fr" placeholder="<?php echo $Language->Phrase("fec_fr"); ?>" />
												</div>
												<div class="form-group col-lg-1">
													<label for="ec_temp"><?php echo $Language->Phrase("fec_temp"); ?>:</label>
													<input type="text" class="form-control" id="ec_temp" placeholder="<?php echo $Language->Phrase("fec_temp"); ?>" />
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-lg-2">
													<label for="ec_gl"><?php echo $Language->Phrase("fec_glasgow"); ?>:</label>
													<input type="text" class="form-control" id="ec_gl" placeholder="<?php echo $Language->Phrase("fec_glasgow"); ?>" />
												</div>
												<div class="form-group col-lg-2">
													<label for="ec_sato2"><?php echo $Language->Phrase("fec_svsat"); ?>:</label>
													<input type="text" class="form-control" id="ec_sato2" placeholder="<?php echo $Language->Phrase("fec_svsat"); ?>" />
												</div>
												<div class="form-group col-lg-2">
													<label for="ec_gli"><?php echo $Language->Phrase("fec_glycemia"); ?>:</label>
													<input type="text" class="form-control" id="ec_gli" placeholder="<?php echo $Language->Phrase("fec_glycemia"); ?>" />
												</div>
												<div class="form-group col-lg-2">
													<label for="ec_talla"><?php echo $Language->Phrase("fec_size"); ?>:</label>
													<input type="text" class="form-control" id="ec_talla" placeholder="<?php echo $Language->Phrase("fec_size"); ?>" />
												</div>
												<div class="form-group col-lg-2">
													<label for="ec_peso"><?php echo $Language->Phrase("fec_weight"); ?>:</label>
													<input type="text" class="form-control" id="ec_peso" placeholder="<?php echo $Language->Phrase("fec_weight"); ?>" />
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-lg-3">
													<label for="ec_triage"><?php echo $Language->Phrase("fec_triage"); ?>:</label>
													<select class="form-control fa" id="ec_triage">
														<option><?php echo $Language->Phrase("fp_select"); ?></option>
													</select>
												</div>
												<div class="form-group col-lg-3">
													<label for="ec_triage"><?php echo $Language->Phrase("fec_typepatient"); ?>:</label>
													<select class="form-control" id="ec_type">
														<option><?php echo $Language->Phrase("fp_select"); ?></option>
													</select>
												</div>
												<div class="form-group col-lg-6">
													<label for="ec_cie10"><?php echo $Language->Phrase("fec_cie10"); ?>:</label>
													<div class="input-group">
														<input type="text" class="form-control" id="ec_cie10" placeholder="<?php echo $Language->Phrase("fec_cie10"); ?>" />
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
													<label for="ec_cuadro"><?php echo $Language->Phrase("fec_clinical"); ?>:</label>
													<textarea class="form-control" id="ec_cuadro" rows="3" placeholder="<?php echo $Language->Phrase("fec_clinical"); ?>"></textarea>
												</div>
												<div class="form-group col-lg-3">
													<label for="ec_examen"><?php echo $Language->Phrase("fec_test"); ?>:</label>
													<textarea class="form-control" id="ec_examen" rows="3" placeholder="<?php echo $Language->Phrase("fec_test"); ?>"></textarea>
												</div>
												<div class="form-group col-lg-3">
													<label for="ec_antec"><?php echo $Language->Phrase("fec_past"); ?>:</label>
													<textarea class="form-control" id="ec_antec" rows="3" placeholder="<?php echo $Language->Phrase("fec_past"); ?>"></textarea>
												</div>
												<div class="form-group col-lg-3">
													<label for="ec_parac"><?php echo $Language->Phrase("fec_parac"); ?>:</label>
													<textarea class="form-control" id="ec_parac" rows="3" placeholder="<?php echo $Language->Phrase("fec_parac"); ?>"></textarea>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-lg-6">
													<label for="ec_tratam"><?php echo $Language->Phrase("fec_treatment"); ?>:</label>
													<textarea class="form-control" id="ec_tratam" rows="3" placeholder="<?php echo $Language->Phrase("fec_treatment"); ?>"></textarea>
												</div>
												<div class="form-group col-lg-6">
													<label for="ec_inform"><?php echo $Language->Phrase("fec_information"); ?>:</label>
													<textarea class="form-control" id="ec_inform" rows="3" placeholder="<?php echo $Language->Phrase("fec_information"); ?>"></textarea>
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
													<label for="hosp_dest"><?php echo $Language->Phrase("dt_destinationhospital"); ?>:</label>
													<div class="input-group">
														<input type="text" class="form-control" id="hosp_dest" placeholder="<?php echo $Language->Phrase("dt_destinationhospital"); ?>" />
														<div class="input-group-append">
															<!-- Button trigger modal -->
															<button type="button" class="btn btn-outline-secondary hosp_search" data-toggle="modal" data-target="#hosp">
																<i class="fa fa-search" aria-hidden="true"></i>
															</button>
														</div>
													</div>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-lg-4">
													<label for="hosp_nomMed"><?php echo $Language->Phrase("dt_medicalname"); ?>:</label>
													<input type="text" class="form-control" id="hosp_nomMed" placeholder="<?php echo $Language->Phrase("dt_medicalname"); ?>" />
												</div>
												<div class="form-group col-lg-4">
													<label for="hosp_telMed"><?php echo $Language->Phrase("dt_phone"); ?>:</label>
													<input type="text" class="form-control" id="hosp_telMed" placeholder="<?php echo $Language->Phrase("dt_phone"); ?>" />
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

<?php include_once "modals.php"; ?>

<script>
	ew.ready("makerjs", "<?php echo $RELATIVE_PATH ?>js/prehM.js", "prehM");
</script>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$Controprehmaster->terminate();
?>