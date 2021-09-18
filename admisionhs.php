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
					<input id="phone_companion" class="form-control" />
				</div>
			</div>
			<button class="btn btn-primary not-allowed" id="btnSaveAdmission" disabled>
				<?php echo $Language->Phrase('savebtn'); ?>
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
											<div class="form-group col-lg-1">
												<label class="col-form-label pt-0"><?php echo $Language->Phrase("fp_gender"); ?>:</label>
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
												<label for="p_phone"><?php echo $Language->Phrase("fp_phone"); ?>:</label>
												<input type="text" class="form-control" id="p_phone" />
											</div>
											<div class="form-group col-lg-2">
												<label for="p_segS"><?php echo $Language->Phrase("fp_social"); ?>:</label>
												<input type="text" class="form-control" id="p_segS" placeholder="<?php echo $Language->Phrase("fp_social"); ?>" />
											</div>
											<div class="form-group col-lg-7">
												<label for="p_address"><?php echo $Language->Phrase("fp_address"); ?>:</label>
												<input type="text" class="form-control" id="p_address" placeholder="<?php echo $Language->Phrase("fp_address"); ?>" />
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-lg-12">
												<label for="p_obs"><?php echo $Language->Phrase("fp_observation"); ?>:</label>
												<textarea class="form-control" id="p_obs" placeholder="<?php echo $Language->Phrase("fp_observation"); ?>"></textarea>
											</div>
										</div>
										<button type="button" id="btnAddPatient" class="btn btn-primary" hidden>
											<?php echo $Language->Phrase('savebtn'); ?>
										</button>
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