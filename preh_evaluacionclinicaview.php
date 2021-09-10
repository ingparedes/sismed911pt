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
$preh_evaluacionclinica_view = new preh_evaluacionclinica_view();

// Run the page
$preh_evaluacionclinica_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_evaluacionclinica_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$preh_evaluacionclinica_view->isExport()) { ?>
<script>
var fpreh_evaluacionclinicaview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpreh_evaluacionclinicaview = currentForm = new ew.Form("fpreh_evaluacionclinicaview", "view");
	loadjs.done("fpreh_evaluacionclinicaview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$preh_evaluacionclinica_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $preh_evaluacionclinica_view->ExportOptions->render("body") ?>
<?php $preh_evaluacionclinica_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $preh_evaluacionclinica_view->showPageHeader(); ?>
<?php
$preh_evaluacionclinica_view->showMessage();
?>
<form name="fpreh_evaluacionclinicaview" id="fpreh_evaluacionclinicaview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_evaluacionclinica">
<input type="hidden" name="modal" value="<?php echo (int)$preh_evaluacionclinica_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($preh_evaluacionclinica_view->id_evaluacionclinica->Visible) { // id_evaluacionclinica ?>
	<tr id="r_id_evaluacionclinica">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_id_evaluacionclinica"><?php echo $preh_evaluacionclinica_view->id_evaluacionclinica->caption() ?></span></td>
		<td data-name="id_evaluacionclinica" <?php echo $preh_evaluacionclinica_view->id_evaluacionclinica->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_id_evaluacionclinica">
<span<?php echo $preh_evaluacionclinica_view->id_evaluacionclinica->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->id_evaluacionclinica->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->cod_casopreh->Visible) { // cod_casopreh ?>
	<tr id="r_cod_casopreh">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_cod_casopreh"><?php echo $preh_evaluacionclinica_view->cod_casopreh->caption() ?></span></td>
		<td data-name="cod_casopreh" <?php echo $preh_evaluacionclinica_view->cod_casopreh->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_cod_casopreh">
<span<?php echo $preh_evaluacionclinica_view->cod_casopreh->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->fecha_horaevaluacion->Visible) { // fecha_horaevaluacion ?>
	<tr id="r_fecha_horaevaluacion">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_fecha_horaevaluacion"><?php echo $preh_evaluacionclinica_view->fecha_horaevaluacion->caption() ?></span></td>
		<td data-name="fecha_horaevaluacion" <?php echo $preh_evaluacionclinica_view->fecha_horaevaluacion->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_fecha_horaevaluacion">
<span<?php echo $preh_evaluacionclinica_view->fecha_horaevaluacion->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->fecha_horaevaluacion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->cod_paciente->Visible) { // cod_paciente ?>
	<tr id="r_cod_paciente">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_cod_paciente"><?php echo $preh_evaluacionclinica_view->cod_paciente->caption() ?></span></td>
		<td data-name="cod_paciente" <?php echo $preh_evaluacionclinica_view->cod_paciente->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_cod_paciente">
<span<?php echo $preh_evaluacionclinica_view->cod_paciente->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->cod_paciente->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->cod_diag_cie->Visible) { // cod_diag_cie ?>
	<tr id="r_cod_diag_cie">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_cod_diag_cie"><?php echo $preh_evaluacionclinica_view->cod_diag_cie->caption() ?></span></td>
		<td data-name="cod_diag_cie" <?php echo $preh_evaluacionclinica_view->cod_diag_cie->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_cod_diag_cie">
<span<?php echo $preh_evaluacionclinica_view->cod_diag_cie->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->cod_diag_cie->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->diagnos_txt->Visible) { // diagnos_txt ?>
	<tr id="r_diagnos_txt">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_diagnos_txt"><?php echo $preh_evaluacionclinica_view->diagnos_txt->caption() ?></span></td>
		<td data-name="diagnos_txt" <?php echo $preh_evaluacionclinica_view->diagnos_txt->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_diagnos_txt">
<span<?php echo $preh_evaluacionclinica_view->diagnos_txt->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->diagnos_txt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->triage->Visible) { // triage ?>
	<tr id="r_triage">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_triage"><?php echo $preh_evaluacionclinica_view->triage->caption() ?></span></td>
		<td data-name="triage" <?php echo $preh_evaluacionclinica_view->triage->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_triage">
<span<?php echo $preh_evaluacionclinica_view->triage->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->triage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->c_clinico->Visible) { // c_clinico ?>
	<tr id="r_c_clinico">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_c_clinico"><?php echo $preh_evaluacionclinica_view->c_clinico->caption() ?></span></td>
		<td data-name="c_clinico" <?php echo $preh_evaluacionclinica_view->c_clinico->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_c_clinico">
<span<?php echo $preh_evaluacionclinica_view->c_clinico->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->c_clinico->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->examen_fisico->Visible) { // examen_fisico ?>
	<tr id="r_examen_fisico">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_examen_fisico"><?php echo $preh_evaluacionclinica_view->examen_fisico->caption() ?></span></td>
		<td data-name="examen_fisico" <?php echo $preh_evaluacionclinica_view->examen_fisico->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_examen_fisico">
<span<?php echo $preh_evaluacionclinica_view->examen_fisico->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->examen_fisico->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->tratamiento->Visible) { // tratamiento ?>
	<tr id="r_tratamiento">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_tratamiento"><?php echo $preh_evaluacionclinica_view->tratamiento->caption() ?></span></td>
		<td data-name="tratamiento" <?php echo $preh_evaluacionclinica_view->tratamiento->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_tratamiento">
<span<?php echo $preh_evaluacionclinica_view->tratamiento->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->tratamiento->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->antecedentes->Visible) { // antecedentes ?>
	<tr id="r_antecedentes">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_antecedentes"><?php echo $preh_evaluacionclinica_view->antecedentes->caption() ?></span></td>
		<td data-name="antecedentes" <?php echo $preh_evaluacionclinica_view->antecedentes->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_antecedentes">
<span<?php echo $preh_evaluacionclinica_view->antecedentes->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->antecedentes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->paraclinicos->Visible) { // paraclinicos ?>
	<tr id="r_paraclinicos">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_paraclinicos"><?php echo $preh_evaluacionclinica_view->paraclinicos->caption() ?></span></td>
		<td data-name="paraclinicos" <?php echo $preh_evaluacionclinica_view->paraclinicos->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_paraclinicos">
<span<?php echo $preh_evaluacionclinica_view->paraclinicos->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->paraclinicos->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->sv_tx->Visible) { // sv_tx ?>
	<tr id="r_sv_tx">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_sv_tx"><?php echo $preh_evaluacionclinica_view->sv_tx->caption() ?></span></td>
		<td data-name="sv_tx" <?php echo $preh_evaluacionclinica_view->sv_tx->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_sv_tx">
<span<?php echo $preh_evaluacionclinica_view->sv_tx->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->sv_tx->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->sv_fc->Visible) { // sv_fc ?>
	<tr id="r_sv_fc">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_sv_fc"><?php echo $preh_evaluacionclinica_view->sv_fc->caption() ?></span></td>
		<td data-name="sv_fc" <?php echo $preh_evaluacionclinica_view->sv_fc->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_sv_fc">
<span<?php echo $preh_evaluacionclinica_view->sv_fc->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->sv_fc->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->sv_fr->Visible) { // sv_fr ?>
	<tr id="r_sv_fr">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_sv_fr"><?php echo $preh_evaluacionclinica_view->sv_fr->caption() ?></span></td>
		<td data-name="sv_fr" <?php echo $preh_evaluacionclinica_view->sv_fr->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_sv_fr">
<span<?php echo $preh_evaluacionclinica_view->sv_fr->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->sv_fr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->sv_temp->Visible) { // sv_temp ?>
	<tr id="r_sv_temp">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_sv_temp"><?php echo $preh_evaluacionclinica_view->sv_temp->caption() ?></span></td>
		<td data-name="sv_temp" <?php echo $preh_evaluacionclinica_view->sv_temp->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_sv_temp">
<span<?php echo $preh_evaluacionclinica_view->sv_temp->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->sv_temp->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->sv_gl->Visible) { // sv_gl ?>
	<tr id="r_sv_gl">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_sv_gl"><?php echo $preh_evaluacionclinica_view->sv_gl->caption() ?></span></td>
		<td data-name="sv_gl" <?php echo $preh_evaluacionclinica_view->sv_gl->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_sv_gl">
<span<?php echo $preh_evaluacionclinica_view->sv_gl->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->sv_gl->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->peso->Visible) { // peso ?>
	<tr id="r_peso">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_peso"><?php echo $preh_evaluacionclinica_view->peso->caption() ?></span></td>
		<td data-name="peso" <?php echo $preh_evaluacionclinica_view->peso->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_peso">
<span<?php echo $preh_evaluacionclinica_view->peso->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->peso->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->talla->Visible) { // talla ?>
	<tr id="r_talla">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_talla"><?php echo $preh_evaluacionclinica_view->talla->caption() ?></span></td>
		<td data-name="talla" <?php echo $preh_evaluacionclinica_view->talla->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_talla">
<span<?php echo $preh_evaluacionclinica_view->talla->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->talla->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->sv_fcf->Visible) { // sv_fcf ?>
	<tr id="r_sv_fcf">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_sv_fcf"><?php echo $preh_evaluacionclinica_view->sv_fcf->caption() ?></span></td>
		<td data-name="sv_fcf" <?php echo $preh_evaluacionclinica_view->sv_fcf->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_sv_fcf">
<span<?php echo $preh_evaluacionclinica_view->sv_fcf->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->sv_fcf->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->sv_satO2->Visible) { // sv_satO2 ?>
	<tr id="r_sv_satO2">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_sv_satO2"><?php echo $preh_evaluacionclinica_view->sv_satO2->caption() ?></span></td>
		<td data-name="sv_satO2" <?php echo $preh_evaluacionclinica_view->sv_satO2->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_sv_satO2">
<span<?php echo $preh_evaluacionclinica_view->sv_satO2->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->sv_satO2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->sv_apgar->Visible) { // sv_apgar ?>
	<tr id="r_sv_apgar">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_sv_apgar"><?php echo $preh_evaluacionclinica_view->sv_apgar->caption() ?></span></td>
		<td data-name="sv_apgar" <?php echo $preh_evaluacionclinica_view->sv_apgar->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_sv_apgar">
<span<?php echo $preh_evaluacionclinica_view->sv_apgar->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->sv_apgar->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->sv_gli->Visible) { // sv_gli ?>
	<tr id="r_sv_gli">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_sv_gli"><?php echo $preh_evaluacionclinica_view->sv_gli->caption() ?></span></td>
		<td data-name="sv_gli" <?php echo $preh_evaluacionclinica_view->sv_gli->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_sv_gli">
<span<?php echo $preh_evaluacionclinica_view->sv_gli->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->sv_gli->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->tipo_paciente->Visible) { // tipo_paciente ?>
	<tr id="r_tipo_paciente">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_tipo_paciente"><?php echo $preh_evaluacionclinica_view->tipo_paciente->caption() ?></span></td>
		<td data-name="tipo_paciente" <?php echo $preh_evaluacionclinica_view->tipo_paciente->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_tipo_paciente">
<span<?php echo $preh_evaluacionclinica_view->tipo_paciente->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->tipo_paciente->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->usu_sede->Visible) { // usu_sede ?>
	<tr id="r_usu_sede">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_usu_sede"><?php echo $preh_evaluacionclinica_view->usu_sede->caption() ?></span></td>
		<td data-name="usu_sede" <?php echo $preh_evaluacionclinica_view->usu_sede->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_usu_sede">
<span<?php echo $preh_evaluacionclinica_view->usu_sede->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->usu_sede->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->tiempo_enfermedad->Visible) { // tiempo_enfermedad ?>
	<tr id="r_tiempo_enfermedad">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_tiempo_enfermedad"><?php echo $preh_evaluacionclinica_view->tiempo_enfermedad->caption() ?></span></td>
		<td data-name="tiempo_enfermedad" <?php echo $preh_evaluacionclinica_view->tiempo_enfermedad->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_tiempo_enfermedad">
<span<?php echo $preh_evaluacionclinica_view->tiempo_enfermedad->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->tiempo_enfermedad->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->tipo_enfermedad->Visible) { // tipo_enfermedad ?>
	<tr id="r_tipo_enfermedad">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_tipo_enfermedad"><?php echo $preh_evaluacionclinica_view->tipo_enfermedad->caption() ?></span></td>
		<td data-name="tipo_enfermedad" <?php echo $preh_evaluacionclinica_view->tipo_enfermedad->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_tipo_enfermedad">
<span<?php echo $preh_evaluacionclinica_view->tipo_enfermedad->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->tipo_enfermedad->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->ap_med_paciente->Visible) { // ap_med_paciente ?>
	<tr id="r_ap_med_paciente">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_ap_med_paciente"><?php echo $preh_evaluacionclinica_view->ap_med_paciente->caption() ?></span></td>
		<td data-name="ap_med_paciente" <?php echo $preh_evaluacionclinica_view->ap_med_paciente->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_ap_med_paciente">
<span<?php echo $preh_evaluacionclinica_view->ap_med_paciente->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->ap_med_paciente->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->ap_diabetes->Visible) { // ap_diabetes ?>
	<tr id="r_ap_diabetes">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_ap_diabetes"><?php echo $preh_evaluacionclinica_view->ap_diabetes->caption() ?></span></td>
		<td data-name="ap_diabetes" <?php echo $preh_evaluacionclinica_view->ap_diabetes->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_ap_diabetes">
<span<?php echo $preh_evaluacionclinica_view->ap_diabetes->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->ap_diabetes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->ap_cardiop->Visible) { // ap_cardiop ?>
	<tr id="r_ap_cardiop">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_ap_cardiop"><?php echo $preh_evaluacionclinica_view->ap_cardiop->caption() ?></span></td>
		<td data-name="ap_cardiop" <?php echo $preh_evaluacionclinica_view->ap_cardiop->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_ap_cardiop">
<span<?php echo $preh_evaluacionclinica_view->ap_cardiop->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->ap_cardiop->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->ap_convul->Visible) { // ap_convul ?>
	<tr id="r_ap_convul">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_ap_convul"><?php echo $preh_evaluacionclinica_view->ap_convul->caption() ?></span></td>
		<td data-name="ap_convul" <?php echo $preh_evaluacionclinica_view->ap_convul->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_ap_convul">
<span<?php echo $preh_evaluacionclinica_view->ap_convul->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->ap_convul->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->ap_asma->Visible) { // ap_asma ?>
	<tr id="r_ap_asma">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_ap_asma"><?php echo $preh_evaluacionclinica_view->ap_asma->caption() ?></span></td>
		<td data-name="ap_asma" <?php echo $preh_evaluacionclinica_view->ap_asma->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_ap_asma">
<span<?php echo $preh_evaluacionclinica_view->ap_asma->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->ap_asma->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->ap_acv->Visible) { // ap_acv ?>
	<tr id="r_ap_acv">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_ap_acv"><?php echo $preh_evaluacionclinica_view->ap_acv->caption() ?></span></td>
		<td data-name="ap_acv" <?php echo $preh_evaluacionclinica_view->ap_acv->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_ap_acv">
<span<?php echo $preh_evaluacionclinica_view->ap_acv->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->ap_acv->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->ap_has->Visible) { // ap_has ?>
	<tr id="r_ap_has">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_ap_has"><?php echo $preh_evaluacionclinica_view->ap_has->caption() ?></span></td>
		<td data-name="ap_has" <?php echo $preh_evaluacionclinica_view->ap_has->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_ap_has">
<span<?php echo $preh_evaluacionclinica_view->ap_has->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->ap_has->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->ap_alergia->Visible) { // ap_alergia ?>
	<tr id="r_ap_alergia">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_ap_alergia"><?php echo $preh_evaluacionclinica_view->ap_alergia->caption() ?></span></td>
		<td data-name="ap_alergia" <?php echo $preh_evaluacionclinica_view->ap_alergia->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_ap_alergia">
<span<?php echo $preh_evaluacionclinica_view->ap_alergia->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->ap_alergia->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_evaluacionclinica_view->ap_otros->Visible) { // ap_otros ?>
	<tr id="r_ap_otros">
		<td class="<?php echo $preh_evaluacionclinica_view->TableLeftColumnClass ?>"><span id="elh_preh_evaluacionclinica_ap_otros"><?php echo $preh_evaluacionclinica_view->ap_otros->caption() ?></span></td>
		<td data-name="ap_otros" <?php echo $preh_evaluacionclinica_view->ap_otros->cellAttributes() ?>>
<span id="el_preh_evaluacionclinica_ap_otros">
<span<?php echo $preh_evaluacionclinica_view->ap_otros->viewAttributes() ?>><?php echo $preh_evaluacionclinica_view->ap_otros->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$preh_evaluacionclinica_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$preh_evaluacionclinica_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$preh_evaluacionclinica_view->terminate();
?>