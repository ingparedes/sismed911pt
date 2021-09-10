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
$preh_evaluacionclinica_delete = new preh_evaluacionclinica_delete();

// Run the page
$preh_evaluacionclinica_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_evaluacionclinica_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpreh_evaluacionclinicadelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpreh_evaluacionclinicadelete = currentForm = new ew.Form("fpreh_evaluacionclinicadelete", "delete");
	loadjs.done("fpreh_evaluacionclinicadelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $preh_evaluacionclinica_delete->showPageHeader(); ?>
<?php
$preh_evaluacionclinica_delete->showMessage();
?>
<form name="fpreh_evaluacionclinicadelete" id="fpreh_evaluacionclinicadelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_evaluacionclinica">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($preh_evaluacionclinica_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($preh_evaluacionclinica_delete->id_evaluacionclinica->Visible) { // id_evaluacionclinica ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->id_evaluacionclinica->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_id_evaluacionclinica" class="preh_evaluacionclinica_id_evaluacionclinica"><?php echo $preh_evaluacionclinica_delete->id_evaluacionclinica->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->cod_casopreh->Visible) { // cod_casopreh ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->cod_casopreh->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_cod_casopreh" class="preh_evaluacionclinica_cod_casopreh"><?php echo $preh_evaluacionclinica_delete->cod_casopreh->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->fecha_horaevaluacion->Visible) { // fecha_horaevaluacion ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->fecha_horaevaluacion->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_fecha_horaevaluacion" class="preh_evaluacionclinica_fecha_horaevaluacion"><?php echo $preh_evaluacionclinica_delete->fecha_horaevaluacion->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->cod_paciente->Visible) { // cod_paciente ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->cod_paciente->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_cod_paciente" class="preh_evaluacionclinica_cod_paciente"><?php echo $preh_evaluacionclinica_delete->cod_paciente->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->cod_diag_cie->Visible) { // cod_diag_cie ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->cod_diag_cie->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_cod_diag_cie" class="preh_evaluacionclinica_cod_diag_cie"><?php echo $preh_evaluacionclinica_delete->cod_diag_cie->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->triage->Visible) { // triage ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->triage->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_triage" class="preh_evaluacionclinica_triage"><?php echo $preh_evaluacionclinica_delete->triage->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->sv_tx->Visible) { // sv_tx ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->sv_tx->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_sv_tx" class="preh_evaluacionclinica_sv_tx"><?php echo $preh_evaluacionclinica_delete->sv_tx->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->sv_fc->Visible) { // sv_fc ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->sv_fc->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_sv_fc" class="preh_evaluacionclinica_sv_fc"><?php echo $preh_evaluacionclinica_delete->sv_fc->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->sv_fr->Visible) { // sv_fr ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->sv_fr->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_sv_fr" class="preh_evaluacionclinica_sv_fr"><?php echo $preh_evaluacionclinica_delete->sv_fr->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->sv_temp->Visible) { // sv_temp ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->sv_temp->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_sv_temp" class="preh_evaluacionclinica_sv_temp"><?php echo $preh_evaluacionclinica_delete->sv_temp->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->sv_gl->Visible) { // sv_gl ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->sv_gl->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_sv_gl" class="preh_evaluacionclinica_sv_gl"><?php echo $preh_evaluacionclinica_delete->sv_gl->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->peso->Visible) { // peso ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->peso->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_peso" class="preh_evaluacionclinica_peso"><?php echo $preh_evaluacionclinica_delete->peso->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->talla->Visible) { // talla ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->talla->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_talla" class="preh_evaluacionclinica_talla"><?php echo $preh_evaluacionclinica_delete->talla->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->sv_fcf->Visible) { // sv_fcf ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->sv_fcf->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_sv_fcf" class="preh_evaluacionclinica_sv_fcf"><?php echo $preh_evaluacionclinica_delete->sv_fcf->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->sv_satO2->Visible) { // sv_satO2 ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->sv_satO2->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_sv_satO2" class="preh_evaluacionclinica_sv_satO2"><?php echo $preh_evaluacionclinica_delete->sv_satO2->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->sv_apgar->Visible) { // sv_apgar ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->sv_apgar->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_sv_apgar" class="preh_evaluacionclinica_sv_apgar"><?php echo $preh_evaluacionclinica_delete->sv_apgar->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->sv_gli->Visible) { // sv_gli ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->sv_gli->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_sv_gli" class="preh_evaluacionclinica_sv_gli"><?php echo $preh_evaluacionclinica_delete->sv_gli->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->tipo_paciente->Visible) { // tipo_paciente ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->tipo_paciente->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_tipo_paciente" class="preh_evaluacionclinica_tipo_paciente"><?php echo $preh_evaluacionclinica_delete->tipo_paciente->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->usu_sede->Visible) { // usu_sede ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->usu_sede->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_usu_sede" class="preh_evaluacionclinica_usu_sede"><?php echo $preh_evaluacionclinica_delete->usu_sede->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->tiempo_enfermedad->Visible) { // tiempo_enfermedad ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->tiempo_enfermedad->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_tiempo_enfermedad" class="preh_evaluacionclinica_tiempo_enfermedad"><?php echo $preh_evaluacionclinica_delete->tiempo_enfermedad->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->tipo_enfermedad->Visible) { // tipo_enfermedad ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->tipo_enfermedad->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_tipo_enfermedad" class="preh_evaluacionclinica_tipo_enfermedad"><?php echo $preh_evaluacionclinica_delete->tipo_enfermedad->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->ap_diabetes->Visible) { // ap_diabetes ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->ap_diabetes->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_ap_diabetes" class="preh_evaluacionclinica_ap_diabetes"><?php echo $preh_evaluacionclinica_delete->ap_diabetes->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->ap_cardiop->Visible) { // ap_cardiop ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->ap_cardiop->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_ap_cardiop" class="preh_evaluacionclinica_ap_cardiop"><?php echo $preh_evaluacionclinica_delete->ap_cardiop->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->ap_convul->Visible) { // ap_convul ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->ap_convul->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_ap_convul" class="preh_evaluacionclinica_ap_convul"><?php echo $preh_evaluacionclinica_delete->ap_convul->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->ap_asma->Visible) { // ap_asma ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->ap_asma->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_ap_asma" class="preh_evaluacionclinica_ap_asma"><?php echo $preh_evaluacionclinica_delete->ap_asma->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->ap_acv->Visible) { // ap_acv ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->ap_acv->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_ap_acv" class="preh_evaluacionclinica_ap_acv"><?php echo $preh_evaluacionclinica_delete->ap_acv->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->ap_has->Visible) { // ap_has ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->ap_has->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_ap_has" class="preh_evaluacionclinica_ap_has"><?php echo $preh_evaluacionclinica_delete->ap_has->caption() ?></span></th>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->ap_alergia->Visible) { // ap_alergia ?>
		<th class="<?php echo $preh_evaluacionclinica_delete->ap_alergia->headerCellClass() ?>"><span id="elh_preh_evaluacionclinica_ap_alergia" class="preh_evaluacionclinica_ap_alergia"><?php echo $preh_evaluacionclinica_delete->ap_alergia->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$preh_evaluacionclinica_delete->RecordCount = 0;
$i = 0;
while (!$preh_evaluacionclinica_delete->Recordset->EOF) {
	$preh_evaluacionclinica_delete->RecordCount++;
	$preh_evaluacionclinica_delete->RowCount++;

	// Set row properties
	$preh_evaluacionclinica->resetAttributes();
	$preh_evaluacionclinica->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$preh_evaluacionclinica_delete->loadRowValues($preh_evaluacionclinica_delete->Recordset);

	// Render row
	$preh_evaluacionclinica_delete->renderRow();
?>
	<tr <?php echo $preh_evaluacionclinica->rowAttributes() ?>>
<?php if ($preh_evaluacionclinica_delete->id_evaluacionclinica->Visible) { // id_evaluacionclinica ?>
		<td <?php echo $preh_evaluacionclinica_delete->id_evaluacionclinica->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_id_evaluacionclinica" class="preh_evaluacionclinica_id_evaluacionclinica">
<span<?php echo $preh_evaluacionclinica_delete->id_evaluacionclinica->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->id_evaluacionclinica->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->cod_casopreh->Visible) { // cod_casopreh ?>
		<td <?php echo $preh_evaluacionclinica_delete->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_cod_casopreh" class="preh_evaluacionclinica_cod_casopreh">
<span<?php echo $preh_evaluacionclinica_delete->cod_casopreh->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->cod_casopreh->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->fecha_horaevaluacion->Visible) { // fecha_horaevaluacion ?>
		<td <?php echo $preh_evaluacionclinica_delete->fecha_horaevaluacion->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_fecha_horaevaluacion" class="preh_evaluacionclinica_fecha_horaevaluacion">
<span<?php echo $preh_evaluacionclinica_delete->fecha_horaevaluacion->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->fecha_horaevaluacion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->cod_paciente->Visible) { // cod_paciente ?>
		<td <?php echo $preh_evaluacionclinica_delete->cod_paciente->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_cod_paciente" class="preh_evaluacionclinica_cod_paciente">
<span<?php echo $preh_evaluacionclinica_delete->cod_paciente->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->cod_paciente->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->cod_diag_cie->Visible) { // cod_diag_cie ?>
		<td <?php echo $preh_evaluacionclinica_delete->cod_diag_cie->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_cod_diag_cie" class="preh_evaluacionclinica_cod_diag_cie">
<span<?php echo $preh_evaluacionclinica_delete->cod_diag_cie->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->cod_diag_cie->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->triage->Visible) { // triage ?>
		<td <?php echo $preh_evaluacionclinica_delete->triage->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_triage" class="preh_evaluacionclinica_triage">
<span<?php echo $preh_evaluacionclinica_delete->triage->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->triage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->sv_tx->Visible) { // sv_tx ?>
		<td <?php echo $preh_evaluacionclinica_delete->sv_tx->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_sv_tx" class="preh_evaluacionclinica_sv_tx">
<span<?php echo $preh_evaluacionclinica_delete->sv_tx->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->sv_tx->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->sv_fc->Visible) { // sv_fc ?>
		<td <?php echo $preh_evaluacionclinica_delete->sv_fc->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_sv_fc" class="preh_evaluacionclinica_sv_fc">
<span<?php echo $preh_evaluacionclinica_delete->sv_fc->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->sv_fc->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->sv_fr->Visible) { // sv_fr ?>
		<td <?php echo $preh_evaluacionclinica_delete->sv_fr->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_sv_fr" class="preh_evaluacionclinica_sv_fr">
<span<?php echo $preh_evaluacionclinica_delete->sv_fr->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->sv_fr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->sv_temp->Visible) { // sv_temp ?>
		<td <?php echo $preh_evaluacionclinica_delete->sv_temp->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_sv_temp" class="preh_evaluacionclinica_sv_temp">
<span<?php echo $preh_evaluacionclinica_delete->sv_temp->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->sv_temp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->sv_gl->Visible) { // sv_gl ?>
		<td <?php echo $preh_evaluacionclinica_delete->sv_gl->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_sv_gl" class="preh_evaluacionclinica_sv_gl">
<span<?php echo $preh_evaluacionclinica_delete->sv_gl->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->sv_gl->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->peso->Visible) { // peso ?>
		<td <?php echo $preh_evaluacionclinica_delete->peso->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_peso" class="preh_evaluacionclinica_peso">
<span<?php echo $preh_evaluacionclinica_delete->peso->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->peso->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->talla->Visible) { // talla ?>
		<td <?php echo $preh_evaluacionclinica_delete->talla->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_talla" class="preh_evaluacionclinica_talla">
<span<?php echo $preh_evaluacionclinica_delete->talla->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->talla->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->sv_fcf->Visible) { // sv_fcf ?>
		<td <?php echo $preh_evaluacionclinica_delete->sv_fcf->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_sv_fcf" class="preh_evaluacionclinica_sv_fcf">
<span<?php echo $preh_evaluacionclinica_delete->sv_fcf->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->sv_fcf->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->sv_satO2->Visible) { // sv_satO2 ?>
		<td <?php echo $preh_evaluacionclinica_delete->sv_satO2->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_sv_satO2" class="preh_evaluacionclinica_sv_satO2">
<span<?php echo $preh_evaluacionclinica_delete->sv_satO2->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->sv_satO2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->sv_apgar->Visible) { // sv_apgar ?>
		<td <?php echo $preh_evaluacionclinica_delete->sv_apgar->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_sv_apgar" class="preh_evaluacionclinica_sv_apgar">
<span<?php echo $preh_evaluacionclinica_delete->sv_apgar->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->sv_apgar->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->sv_gli->Visible) { // sv_gli ?>
		<td <?php echo $preh_evaluacionclinica_delete->sv_gli->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_sv_gli" class="preh_evaluacionclinica_sv_gli">
<span<?php echo $preh_evaluacionclinica_delete->sv_gli->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->sv_gli->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->tipo_paciente->Visible) { // tipo_paciente ?>
		<td <?php echo $preh_evaluacionclinica_delete->tipo_paciente->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_tipo_paciente" class="preh_evaluacionclinica_tipo_paciente">
<span<?php echo $preh_evaluacionclinica_delete->tipo_paciente->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->tipo_paciente->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->usu_sede->Visible) { // usu_sede ?>
		<td <?php echo $preh_evaluacionclinica_delete->usu_sede->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_usu_sede" class="preh_evaluacionclinica_usu_sede">
<span<?php echo $preh_evaluacionclinica_delete->usu_sede->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->usu_sede->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->tiempo_enfermedad->Visible) { // tiempo_enfermedad ?>
		<td <?php echo $preh_evaluacionclinica_delete->tiempo_enfermedad->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_tiempo_enfermedad" class="preh_evaluacionclinica_tiempo_enfermedad">
<span<?php echo $preh_evaluacionclinica_delete->tiempo_enfermedad->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->tiempo_enfermedad->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->tipo_enfermedad->Visible) { // tipo_enfermedad ?>
		<td <?php echo $preh_evaluacionclinica_delete->tipo_enfermedad->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_tipo_enfermedad" class="preh_evaluacionclinica_tipo_enfermedad">
<span<?php echo $preh_evaluacionclinica_delete->tipo_enfermedad->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->tipo_enfermedad->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->ap_diabetes->Visible) { // ap_diabetes ?>
		<td <?php echo $preh_evaluacionclinica_delete->ap_diabetes->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_ap_diabetes" class="preh_evaluacionclinica_ap_diabetes">
<span<?php echo $preh_evaluacionclinica_delete->ap_diabetes->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->ap_diabetes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->ap_cardiop->Visible) { // ap_cardiop ?>
		<td <?php echo $preh_evaluacionclinica_delete->ap_cardiop->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_ap_cardiop" class="preh_evaluacionclinica_ap_cardiop">
<span<?php echo $preh_evaluacionclinica_delete->ap_cardiop->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->ap_cardiop->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->ap_convul->Visible) { // ap_convul ?>
		<td <?php echo $preh_evaluacionclinica_delete->ap_convul->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_ap_convul" class="preh_evaluacionclinica_ap_convul">
<span<?php echo $preh_evaluacionclinica_delete->ap_convul->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->ap_convul->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->ap_asma->Visible) { // ap_asma ?>
		<td <?php echo $preh_evaluacionclinica_delete->ap_asma->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_ap_asma" class="preh_evaluacionclinica_ap_asma">
<span<?php echo $preh_evaluacionclinica_delete->ap_asma->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->ap_asma->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->ap_acv->Visible) { // ap_acv ?>
		<td <?php echo $preh_evaluacionclinica_delete->ap_acv->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_ap_acv" class="preh_evaluacionclinica_ap_acv">
<span<?php echo $preh_evaluacionclinica_delete->ap_acv->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->ap_acv->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->ap_has->Visible) { // ap_has ?>
		<td <?php echo $preh_evaluacionclinica_delete->ap_has->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_ap_has" class="preh_evaluacionclinica_ap_has">
<span<?php echo $preh_evaluacionclinica_delete->ap_has->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->ap_has->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_evaluacionclinica_delete->ap_alergia->Visible) { // ap_alergia ?>
		<td <?php echo $preh_evaluacionclinica_delete->ap_alergia->cellAttributes() ?>>
<span id="el<?php echo $preh_evaluacionclinica_delete->RowCount ?>_preh_evaluacionclinica_ap_alergia" class="preh_evaluacionclinica_ap_alergia">
<span<?php echo $preh_evaluacionclinica_delete->ap_alergia->viewAttributes() ?>><?php echo $preh_evaluacionclinica_delete->ap_alergia->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$preh_evaluacionclinica_delete->Recordset->moveNext();
}
$preh_evaluacionclinica_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $preh_evaluacionclinica_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$preh_evaluacionclinica_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$preh_evaluacionclinica_delete->terminate();
?>