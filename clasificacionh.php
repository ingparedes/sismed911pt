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
					<th><?php echo $Language->Phrase("dt_hc"); ?></th>
					<th><?php echo $Language->Phrase("fp_title"); ?></th>
					<th><?php echo $Language->Phrase("dt_date"); ?></th>
					<th><?php echo $Language->Phrase("adm_egress"); ?></th>
					<th><?php echo $Language->Phrase("dt_911"); ?></th>
					<th><?php echo $Language->Phrase("fp_gender"); ?></th>
					<th><?php echo $Language->Phrase("adm_companion"); ?></th>
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
								<!-- Formulario Admision -->
								<form id="form_admission">
									<div class="form-row">
										<div class="form-group col-lg-3">
											<label for="attention"><?php echo $Language->Phrase("clasif_motivation"); ?>:</label>
											<select class="form-control" id="attention">
												<option value="0">
													<?php echo $Language->Phrase("f_select"); ?>
												</option>
											</select>
										</div>
										<div class="form-group col-lg-3" id="parentLocationTrauma" hidden>
											<label for="locationTrauma"><?php echo $Language->Phrase("clasif_location"); ?>:</label>
											<select class="form-control" id="locationTrauma">
												<option value="0">
													<?php echo $Language->Phrase("f_select"); ?>
												</option>
											</select>
										</div>
										<div class="form-group col-lg-3" id="parentCauseTrauma" hidden>
											<label for="causeTrauma"><?php echo $Language->Phrase("clasif_cause"); ?>:</label>
											<select class="form-control" id="causeTrauma">
												<option value="0">
													<?php echo $Language->Phrase("f_select"); ?>
												</option>
											</select>
										</div>
										<div class="form-group col-lg-3" id="parentSystem" hidden>
											<label for="system"><?php echo $Language->Phrase("clasif_system"); ?>:</label>
											<select class="form-control" id="system">
												<option value="0">
													<?php echo $Language->Phrase("f_select"); ?>
												</option>
											</select>
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-lg-2">
											<label for="glasgow"><?php echo $Language->Phrase("fec_glasgow"); ?>:</label>
											<input type="text" class="form-control" id="glasgow" placeholder="<?php echo $Language->Phrase("fec_glasgow"); ?>" />
										</div>
										<div class="form-group col-lg-2">
											<label for="pas"><?php echo $Language->Phrase("clasif_pas"); ?>:</label>
											<input type="text" class="form-control" id="pas" placeholder="<?php echo $Language->Phrase("clasif_pas"); ?>" />
										</div>
										<div class="form-group col-lg-2">
											<label for="pad"><?php echo $Language->Phrase("clasif_pad"); ?>:</label>
											<input type="text" class="form-control" id="pad" placeholder="<?php echo $Language->Phrase("clasif_pad"); ?>" />
										</div>
										<div class="form-group col-lg-2">
											<label for="fc"><?php echo $Language->Phrase("clasif_fc"); ?>:</label>
											<input type="text" class="form-control" id="fc" placeholder="<?php echo $Language->Phrase("clasif_fc"); ?>" />
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-lg-2">
											<label for="so2"><?php echo $Language->Phrase("clasif_so2"); ?>:</label>
											<input type="text" class="form-control" id="so2" placeholder="<?php echo $Language->Phrase("clasif_so2"); ?>" />
										</div>
										<div class="form-group col-lg-2">
											<label for="fr"><?php echo $Language->Phrase("clasif_fr"); ?>:</label>
											<input type="text" class="form-control" id="fr" placeholder="<?php echo $Language->Phrase("clasif_fr"); ?>" />
										</div>
										<div class="form-group col-lg-2">
											<label for="temp"><?php echo $Language->Phrase("clasif_temp"); ?>:</label>
											<input type="text" class="form-control" id="temp" placeholder="<?php echo $Language->Phrase("clasif_temp"); ?>" />
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-lg-3">
											<label for="classification"><?php echo $Language->Phrase("clasif_clasif"); ?>:</label>
											<select class="form-control fa" id="classification">
												<option value="0" style="color: initial">
													<?php echo $Language->Phrase("f_select"); ?>
												</option>
												<option value="Rojo" class="fa" style="color: red">
													&#xf0c8; <?php echo $Language->Phrase("clasif_red"); ?>
												</option>
												<option value="Naranja" class="fa" style="color: orange">
													&#xf0c8; <?php echo $Language->Phrase("clasif_orange"); ?>
												</option>
												<option value="Amarillo" class="fa" style="color: yellow">
													&#xf0c8; <?php echo $Language->Phrase("clasif_yellow"); ?>
												</option>
												<option value="Azul" class="fa" style="color: blue">
													&#xf0c8; <?php echo $Language->Phrase("clasif_blue"); ?>
												</option>
												<option value="Verde" class="fa" style="color: green">
													&#xf0c8; <?php echo $Language->Phrase("clasif_green"); ?>
												</option>
											</select>
										</div>
										<div class="form-group col-lg-3">
											<label for="dolor"><?php echo $Language->Phrase("clasif_pain"); ?>:</label>
											<select class="form-control" id="dolor">
												<option value="0">
													<?php echo $Language->Phrase("f_select"); ?>
												</option>
												<option value="1"><?php echo $Language->Phrase("clasif_pain1"); ?></option>
												<option value="2"><?php echo $Language->Phrase("clasif_pain2"); ?></option>
												<option value="3"><?php echo $Language->Phrase("clasif_pain3"); ?></option>
												<option value="4"><?php echo $Language->Phrase("clasif_pain4"); ?></option>
												<option value="5"><?php echo $Language->Phrase("clasif_pain5"); ?></option>
												<option value="6"><?php echo $Language->Phrase("clasif_pain6"); ?></option>
												<option value="7"><?php echo $Language->Phrase("clasif_pain7"); ?></option>
												<option value="8"><?php echo $Language->Phrase("clasif_pain8"); ?></option>
												<option value="9"><?php echo $Language->Phrase("clasif_pain9"); ?></option>
												<option value="10"><?php echo $Language->Phrase("clasif_pain10"); ?></option>
											</select>
										</div>
										<div class="form-group col-lg-6">
											<label for="signal"><?php echo $Language->Phrase("m_signal"); ?>:</label>
											<div class="input-group">
												<input id="id_signal" hidden />
												<input type="text" class="form-control" id="signal" placeholder="<?php echo $Language->Phrase("f_select"); ?>" disabled />
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
											<label for="motivation"><?php echo $Language->Phrase("clasif_motivation"); ?>:</label>
											<textarea class="form-control" id="motivation" placeholder="<?php echo $Language->Phrase("clasif_motivation"); ?>" rows="5"></textarea>
										</div>
										<div class="form-group col-lg-6">
											<label for="signalDescription"><?php echo $Language->Phrase("clasif_descrip"); ?>:</label>
											<textarea class="form-control" id="signalDescription" placeholder="<?php echo $Language->Phrase("clasif_descrip"); ?>" rows="5"></textarea>
										</div>
									</div>
									<button class="btn btn-primary" id="btnSaveTriage">
										<?php echo $Language->Phrase("savebtn"); ?>
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