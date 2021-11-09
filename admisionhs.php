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

<script>
	localStorage.setItem("language", "<?php echo CurrentLanguageID(); ?>");
	localStorage.setItem("pdf_information", "<?php echo $Language->Phrase('pdf_admissionorden'); ?>");
	localStorage.setItem("pdf_date", "<?php echo $Language->Phrase('dt_date'); ?>");
	localStorage.setItem("pdf_hour", "<?php echo $Language->Phrase('pdf_hour'); ?>");
	localStorage.setItem("pdf_priority", "<?php echo $Language->Phrase('dt_priority'); ?>");
	localStorage.setItem("pdf_incident", "<?php echo $Language->Phrase('dt_incident'); ?>");
	localStorage.setItem("pdf_ambulance", "<?php echo $Language->Phrase('fa_ambulance'); ?>");
	localStorage.setItem("pdf_place", "<?php echo $Language->Phrase('pdf_place'); ?>");
	localStorage.setItem("pdf_kmstart", "<?php echo $Language->Phrase('pdf_kmstart'); ?>");
	localStorage.setItem("pdf_kmend", "<?php echo $Language->Phrase('pdf_kmend'); ?>");
	localStorage.setItem("pdf_patientname", "<?php echo $Language->Phrase('pdf_patientname'); ?>");
	localStorage.setItem("pdf_gender", "<?php echo $Language->Phrase('fp_gender'); ?>");
	localStorage.setItem("pdf_datebirth", "<?php echo $Language->Phrase('fp_datebirth'); ?>");
	localStorage.setItem("pdf_age", "<?php echo $Language->Phrase('fp_age'); ?>");
	localStorage.setItem("pdf_cause", "<?php echo $Language->Phrase('pdf_cause'); ?>");
	localStorage.setItem("pdf_infotime", "<?php echo $Language->Phrase('pdf_infotime'); ?>");
	localStorage.setItem("pdf_hourstart", "<?php echo $Language->Phrase('pdf_hourstart'); ?>");
	localStorage.setItem("pdf_hourplace", "<?php echo $Language->Phrase('pdf_hourplace'); ?>");
	localStorage.setItem("pdf_hourhospital", "<?php echo $Language->Phrase('pdf_hourhospital'); ?>");
	localStorage.setItem("pdf_hourbase", "<?php echo $Language->Phrase('pdf_hourbase'); ?>");
	localStorage.setItem("pdf_expgeneral", "<?php echo $Language->Phrase('pdf_expgeneral'); ?>");
	localStorage.setItem("pdf_category", "<?php echo $Language->Phrase('pdf_category'); ?>");
	localStorage.setItem("pdf_name", "<?php echo $Language->Phrase('m_hospname'); ?>");
	localStorage.setItem("pdf_process", "<?php echo $Language->Phrase('pdf_process'); ?>");
	localStorage.setItem("pdf_expphysical", "<?php echo $Language->Phrase('pdf_expphysical'); ?>");
	localStorage.setItem("pdf_position", "<?php echo $Language->Phrase('pdf_position'); ?>");
	localStorage.setItem("pdf_trauma", "<?php echo $Language->Phrase('pdf_trauma'); ?>");
	localStorage.setItem("pdf_signal", "<?php echo $Language->Phrase('pdf_signal'); ?>");
	localStorage.setItem("pdf_fr", "<?php echo $Language->Phrase('fec_fr'); ?>");
	localStorage.setItem("pdf_ta", "<?php echo $Language->Phrase('fec_ta'); ?>");
	localStorage.setItem("pdf_fc", "<?php echo $Language->Phrase('fec_fc'); ?>");
	localStorage.setItem("pdf_sao2", "<?php echo $Language->Phrase('pdf_sao2'); ?>");
	localStorage.setItem("pdf_temp", "<?php echo $Language->Phrase('pdf_temp'); ?>");
	localStorage.setItem("pdf_glasgow", "<?php echo $Language->Phrase('fec_glasgow'); ?>");
	localStorage.setItem("pdf_past", "<?php echo $Language->Phrase('fec_past'); ?>");
	localStorage.setItem("pdf_diabetes", "<?php echo $Language->Phrase('pdf_diabetes'); ?>");
	localStorage.setItem("pdf_heartdisease", "<?php echo $Language->Phrase('pdf_heartdisease'); ?>");
	localStorage.setItem("pdf_seizures", "<?php echo $Language->Phrase('pdf_seizures'); ?>");
	localStorage.setItem("pdf_asthma", "<?php echo $Language->Phrase('pdf_asthma'); ?>");
	localStorage.setItem("pdf_acv", "<?php echo $Language->Phrase('pdf_acv'); ?>");
	localStorage.setItem("pdf_has", "<?php echo $Language->Phrase('pdf_has'); ?>");
	localStorage.setItem("pdf_allergy", "<?php echo $Language->Phrase('pdf_allergy'); ?>");
	localStorage.setItem("pdf_other", "<?php echo $Language->Phrase('em_other'); ?>");
	localStorage.setItem("pdf_medical", "<?php echo $Language->Phrase('m_medicalsearch'); ?>");
	localStorage.setItem("pdf_diag", "<?php echo $Language->Phrase('pdf_diag'); ?>");
	localStorage.setItem("pdf_cie10", "<?php echo $Language->Phrase('pdf_codecie10'); ?>");
	localStorage.setItem("pdf_cie10diag", "<?php echo $Language->Phrase('m_cie10diag'); ?>");
	localStorage.setItem("pdf_complement", "<?php echo $Language->Phrase('pdf_complement'); ?>");
	localStorage.setItem("pdf_supplies", "<?php echo $Language->Phrase('pdf_supplies'); ?>");
	localStorage.setItem("pdf_cant", "<?php echo $Language->Phrase('pdf_cant'); ?>");
	localStorage.setItem("pdf_triage", "<?php echo $Language->Phrase('fec_triage'); ?>");
	localStorage.setItem("pdf_obs", "<?php echo $Language->Phrase('fp_observation'); ?>");
	localStorage.setItem("pdf_belongings", "<?php echo $Language->Phrase('pdf_belongings'); ?>");
	localStorage.setItem("pdf_desc", "<?php echo $Language->Phrase('pdf_desc'); ?>");
	localStorage.setItem("pdf_namereceives", "<?php echo $Language->Phrase('pdf_namereceives'); ?>");
	localStorage.setItem("pdf_optionclosecase", "<?php echo $Language->Phrase('pdf_optionclosecase'); ?>");
	localStorage.setItem("pdf_responsible", "<?php echo $Language->Phrase('pdf_responsible'); ?>");
	localStorage.setItem("pdf_doctor", "<?php echo $Language->Phrase('pdf_doctor'); ?>");
	localStorage.setItem("pdf_nurse", "<?php echo $Language->Phrase('pdf_nurse'); ?>");
	localStorage.setItem("pdf_destiny", "<?php echo $Language->Phrase('pdf_destiny'); ?>");
	localStorage.setItem("pdf_hospital", "<?php echo $Language->Phrase('fh_title'); ?>");
	localStorage.setItem("pdf_doctorreceives", "<?php echo $Language->Phrase('pdf_doctorreceives'); ?>");
	localStorage.setItem("pdf_doctorfirm", "<?php echo $Language->Phrase('pdf_doctorfirm'); ?>");
</script>

<div id="data-user" data-hospital="<?php echo CurrentUserInfo('hospital') ?>" hidden></div>

<div class="row">
	<div class="col-lg-12">
		<form id="form_admission" class="mb-3">
			<div class="form-row mb-2">
				<div class="form-group col-auto">
					<label for="ingress"><?php echo $Language->Phrase('adm_egress'); ?>:<span style="color: red"> *</span></label>
					<select class="form-control" id="ingress">
						<option><?php echo $Language->Phrase('f_select'); ?></option>
					</select>
				</div>
				<div class="form-group col-auto">
					<label hidden for="code" id="labelCode"><?php echo $Language->Phrase('m_cie10code'); ?>:<span style="color: red"> *</span></label>
					<input class="form-control" id="code" hidden />
				</div>
				<div class="form-group col-auto">
					<label for="idP"><?php echo $Language->Phrase('fp_title'); ?>:<span style="color: red"> *</span></label>
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
					<label for="companion"><?php echo $Language->Phrase('adm_companion'); ?>:</label>
					<input id="companion" class="form-control" />
				</div>
				<div class="form-group col-auto">
					<label for="tel_companion"><?php echo $Language->Phrase('adm_phonecompanion'); ?>:</label>
					<input type="text" id="phone_companion" class="form-control" />
				</div>
			</div>
			<button class="btn btn-primary not-allowed" id="btnSaveAdmission" disabled>
				<?php echo $Language->Phrase('savebtn'); ?>
			</button>
			<button type="button" class="btn btn-primary" id="print-admission" disabled>
				<i class="fa fa-print"></i> <?php echo $Language->Phrase("em_ordenadmission"); ?>
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
						<i class="fa fa-wpforms" aria-hidden="true"></i> <?php echo $Language->Phrase('f_title'); ?>
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
	ew.ready("makerjs", "<?php echo $RELATIVE_PATH ?>js/admission.js", "admission");
</script>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$admisionhs->terminate();
?>