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
$sala_rac_delete = new sala_rac_delete();

// Run the page
$sala_rac_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sala_rac_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fsala_racdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fsala_racdelete = currentForm = new ew.Form("fsala_racdelete", "delete");
	loadjs.done("fsala_racdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $sala_rac_delete->showPageHeader(); ?>
<?php
$sala_rac_delete->showMessage();
?>
<form name="fsala_racdelete" id="fsala_racdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sala_rac">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($sala_rac_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($sala_rac_delete->id_registro->Visible) { // id_registro ?>
		<th class="<?php echo $sala_rac_delete->id_registro->headerCellClass() ?>"><span id="elh_sala_rac_id_registro" class="sala_rac_id_registro"><?php echo $sala_rac_delete->id_registro->caption() ?></span></th>
<?php } ?>
<?php if ($sala_rac_delete->fecha_hora->Visible) { // fecha_hora ?>
		<th class="<?php echo $sala_rac_delete->fecha_hora->headerCellClass() ?>"><span id="elh_sala_rac_fecha_hora" class="sala_rac_fecha_hora"><?php echo $sala_rac_delete->fecha_hora->caption() ?></span></th>
<?php } ?>
<?php if ($sala_rac_delete->id_admision->Visible) { // id_admision ?>
		<th class="<?php echo $sala_rac_delete->id_admision->headerCellClass() ?>"><span id="elh_sala_rac_id_admision" class="sala_rac_id_admision"><?php echo $sala_rac_delete->id_admision->caption() ?></span></th>
<?php } ?>
<?php if ($sala_rac_delete->acompanante->Visible) { // acompañante ?>
		<th class="<?php echo $sala_rac_delete->acompanante->headerCellClass() ?>"><span id="elh_sala_rac_acompanante" class="sala_rac_acompanante"><?php echo $sala_rac_delete->acompanante->caption() ?></span></th>
<?php } ?>
<?php if ($sala_rac_delete->tel_acompanante->Visible) { // tel_acompañante ?>
		<th class="<?php echo $sala_rac_delete->tel_acompanante->headerCellClass() ?>"><span id="elh_sala_rac_tel_acompanante" class="sala_rac_tel_acompanante"><?php echo $sala_rac_delete->tel_acompanante->caption() ?></span></th>
<?php } ?>
<?php if ($sala_rac_delete->tipo_urgencia->Visible) { // tipo_urgencia ?>
		<th class="<?php echo $sala_rac_delete->tipo_urgencia->headerCellClass() ?>"><span id="elh_sala_rac_tipo_urgencia" class="sala_rac_tipo_urgencia"><?php echo $sala_rac_delete->tipo_urgencia->caption() ?></span></th>
<?php } ?>
<?php if ($sala_rac_delete->clasificacion->Visible) { // clasificacion ?>
		<th class="<?php echo $sala_rac_delete->clasificacion->headerCellClass() ?>"><span id="elh_sala_rac_clasificacion" class="sala_rac_clasificacion"><?php echo $sala_rac_delete->clasificacion->caption() ?></span></th>
<?php } ?>
<?php if ($sala_rac_delete->so2->Visible) { // so2 ?>
		<th class="<?php echo $sala_rac_delete->so2->headerCellClass() ?>"><span id="elh_sala_rac_so2" class="sala_rac_so2"><?php echo $sala_rac_delete->so2->caption() ?></span></th>
<?php } ?>
<?php if ($sala_rac_delete->fr->Visible) { // fr ?>
		<th class="<?php echo $sala_rac_delete->fr->headerCellClass() ?>"><span id="elh_sala_rac_fr" class="sala_rac_fr"><?php echo $sala_rac_delete->fr->caption() ?></span></th>
<?php } ?>
<?php if ($sala_rac_delete->_t->Visible) { // t ?>
		<th class="<?php echo $sala_rac_delete->_t->headerCellClass() ?>"><span id="elh_sala_rac__t" class="sala_rac__t"><?php echo $sala_rac_delete->_t->caption() ?></span></th>
<?php } ?>
<?php if ($sala_rac_delete->fc->Visible) { // fc ?>
		<th class="<?php echo $sala_rac_delete->fc->headerCellClass() ?>"><span id="elh_sala_rac_fc" class="sala_rac_fc"><?php echo $sala_rac_delete->fc->caption() ?></span></th>
<?php } ?>
<?php if ($sala_rac_delete->pas->Visible) { // pas ?>
		<th class="<?php echo $sala_rac_delete->pas->headerCellClass() ?>"><span id="elh_sala_rac_pas" class="sala_rac_pas"><?php echo $sala_rac_delete->pas->caption() ?></span></th>
<?php } ?>
<?php if ($sala_rac_delete->pad->Visible) { // pad ?>
		<th class="<?php echo $sala_rac_delete->pad->headerCellClass() ?>"><span id="elh_sala_rac_pad" class="sala_rac_pad"><?php echo $sala_rac_delete->pad->caption() ?></span></th>
<?php } ?>
<?php if ($sala_rac_delete->local_trauma->Visible) { // local_trauma ?>
		<th class="<?php echo $sala_rac_delete->local_trauma->headerCellClass() ?>"><span id="elh_sala_rac_local_trauma" class="sala_rac_local_trauma"><?php echo $sala_rac_delete->local_trauma->caption() ?></span></th>
<?php } ?>
<?php if ($sala_rac_delete->sistema->Visible) { // sistema ?>
		<th class="<?php echo $sala_rac_delete->sistema->headerCellClass() ?>"><span id="elh_sala_rac_sistema" class="sala_rac_sistema"><?php echo $sala_rac_delete->sistema->caption() ?></span></th>
<?php } ?>
<?php if ($sala_rac_delete->nivel_conciencia->Visible) { // nivel_conciencia ?>
		<th class="<?php echo $sala_rac_delete->nivel_conciencia->headerCellClass() ?>"><span id="elh_sala_rac_nivel_conciencia" class="sala_rac_nivel_conciencia"><?php echo $sala_rac_delete->nivel_conciencia->caption() ?></span></th>
<?php } ?>
<?php if ($sala_rac_delete->dolor->Visible) { // dolor ?>
		<th class="<?php echo $sala_rac_delete->dolor->headerCellClass() ?>"><span id="elh_sala_rac_dolor" class="sala_rac_dolor"><?php echo $sala_rac_delete->dolor->caption() ?></span></th>
<?php } ?>
<?php if ($sala_rac_delete->signos_sintomas->Visible) { // signos_sintomas ?>
		<th class="<?php echo $sala_rac_delete->signos_sintomas->headerCellClass() ?>"><span id="elh_sala_rac_signos_sintomas" class="sala_rac_signos_sintomas"><?php echo $sala_rac_delete->signos_sintomas->caption() ?></span></th>
<?php } ?>
<?php if ($sala_rac_delete->factores_riesgos->Visible) { // factores_riesgos ?>
		<th class="<?php echo $sala_rac_delete->factores_riesgos->headerCellClass() ?>"><span id="elh_sala_rac_factores_riesgos" class="sala_rac_factores_riesgos"><?php echo $sala_rac_delete->factores_riesgos->caption() ?></span></th>
<?php } ?>
<?php if ($sala_rac_delete->estado_final->Visible) { // estado_final ?>
		<th class="<?php echo $sala_rac_delete->estado_final->headerCellClass() ?>"><span id="elh_sala_rac_estado_final" class="sala_rac_estado_final"><?php echo $sala_rac_delete->estado_final->caption() ?></span></th>
<?php } ?>
<?php if ($sala_rac_delete->tipo_ingreso->Visible) { // tipo_ingreso ?>
		<th class="<?php echo $sala_rac_delete->tipo_ingreso->headerCellClass() ?>"><span id="elh_sala_rac_tipo_ingreso" class="sala_rac_tipo_ingreso"><?php echo $sala_rac_delete->tipo_ingreso->caption() ?></span></th>
<?php } ?>
<?php if ($sala_rac_delete->hora_clasificacion->Visible) { // hora_clasificacion ?>
		<th class="<?php echo $sala_rac_delete->hora_clasificacion->headerCellClass() ?>"><span id="elh_sala_rac_hora_clasificacion" class="sala_rac_hora_clasificacion"><?php echo $sala_rac_delete->hora_clasificacion->caption() ?></span></th>
<?php } ?>
<?php if ($sala_rac_delete->hospital->Visible) { // hospital ?>
		<th class="<?php echo $sala_rac_delete->hospital->headerCellClass() ?>"><span id="elh_sala_rac_hospital" class="sala_rac_hospital"><?php echo $sala_rac_delete->hospital->caption() ?></span></th>
<?php } ?>
<?php if ($sala_rac_delete->motivo_trauma->Visible) { // motivo_trauma ?>
		<th class="<?php echo $sala_rac_delete->motivo_trauma->headerCellClass() ?>"><span id="elh_sala_rac_motivo_trauma" class="sala_rac_motivo_trauma"><?php echo $sala_rac_delete->motivo_trauma->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$sala_rac_delete->RecordCount = 0;
$i = 0;
while (!$sala_rac_delete->Recordset->EOF) {
	$sala_rac_delete->RecordCount++;
	$sala_rac_delete->RowCount++;

	// Set row properties
	$sala_rac->resetAttributes();
	$sala_rac->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$sala_rac_delete->loadRowValues($sala_rac_delete->Recordset);

	// Render row
	$sala_rac_delete->renderRow();
?>
	<tr <?php echo $sala_rac->rowAttributes() ?>>
<?php if ($sala_rac_delete->id_registro->Visible) { // id_registro ?>
		<td <?php echo $sala_rac_delete->id_registro->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_delete->RowCount ?>_sala_rac_id_registro" class="sala_rac_id_registro">
<span<?php echo $sala_rac_delete->id_registro->viewAttributes() ?>><?php echo $sala_rac_delete->id_registro->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sala_rac_delete->fecha_hora->Visible) { // fecha_hora ?>
		<td <?php echo $sala_rac_delete->fecha_hora->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_delete->RowCount ?>_sala_rac_fecha_hora" class="sala_rac_fecha_hora">
<span<?php echo $sala_rac_delete->fecha_hora->viewAttributes() ?>><?php echo $sala_rac_delete->fecha_hora->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sala_rac_delete->id_admision->Visible) { // id_admision ?>
		<td <?php echo $sala_rac_delete->id_admision->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_delete->RowCount ?>_sala_rac_id_admision" class="sala_rac_id_admision">
<span<?php echo $sala_rac_delete->id_admision->viewAttributes() ?>><?php echo $sala_rac_delete->id_admision->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sala_rac_delete->acompanante->Visible) { // acompañante ?>
		<td <?php echo $sala_rac_delete->acompanante->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_delete->RowCount ?>_sala_rac_acompanante" class="sala_rac_acompanante">
<span<?php echo $sala_rac_delete->acompanante->viewAttributes() ?>><?php echo $sala_rac_delete->acompanante->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sala_rac_delete->tel_acompanante->Visible) { // tel_acompañante ?>
		<td <?php echo $sala_rac_delete->tel_acompanante->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_delete->RowCount ?>_sala_rac_tel_acompanante" class="sala_rac_tel_acompanante">
<span<?php echo $sala_rac_delete->tel_acompanante->viewAttributes() ?>><?php echo $sala_rac_delete->tel_acompanante->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sala_rac_delete->tipo_urgencia->Visible) { // tipo_urgencia ?>
		<td <?php echo $sala_rac_delete->tipo_urgencia->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_delete->RowCount ?>_sala_rac_tipo_urgencia" class="sala_rac_tipo_urgencia">
<span<?php echo $sala_rac_delete->tipo_urgencia->viewAttributes() ?>><?php echo $sala_rac_delete->tipo_urgencia->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sala_rac_delete->clasificacion->Visible) { // clasificacion ?>
		<td <?php echo $sala_rac_delete->clasificacion->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_delete->RowCount ?>_sala_rac_clasificacion" class="sala_rac_clasificacion">
<span<?php echo $sala_rac_delete->clasificacion->viewAttributes() ?>><?php echo $sala_rac_delete->clasificacion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sala_rac_delete->so2->Visible) { // so2 ?>
		<td <?php echo $sala_rac_delete->so2->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_delete->RowCount ?>_sala_rac_so2" class="sala_rac_so2">
<span<?php echo $sala_rac_delete->so2->viewAttributes() ?>><?php echo $sala_rac_delete->so2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sala_rac_delete->fr->Visible) { // fr ?>
		<td <?php echo $sala_rac_delete->fr->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_delete->RowCount ?>_sala_rac_fr" class="sala_rac_fr">
<span<?php echo $sala_rac_delete->fr->viewAttributes() ?>><?php echo $sala_rac_delete->fr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sala_rac_delete->_t->Visible) { // t ?>
		<td <?php echo $sala_rac_delete->_t->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_delete->RowCount ?>_sala_rac__t" class="sala_rac__t">
<span<?php echo $sala_rac_delete->_t->viewAttributes() ?>><?php echo $sala_rac_delete->_t->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sala_rac_delete->fc->Visible) { // fc ?>
		<td <?php echo $sala_rac_delete->fc->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_delete->RowCount ?>_sala_rac_fc" class="sala_rac_fc">
<span<?php echo $sala_rac_delete->fc->viewAttributes() ?>><?php echo $sala_rac_delete->fc->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sala_rac_delete->pas->Visible) { // pas ?>
		<td <?php echo $sala_rac_delete->pas->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_delete->RowCount ?>_sala_rac_pas" class="sala_rac_pas">
<span<?php echo $sala_rac_delete->pas->viewAttributes() ?>><?php echo $sala_rac_delete->pas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sala_rac_delete->pad->Visible) { // pad ?>
		<td <?php echo $sala_rac_delete->pad->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_delete->RowCount ?>_sala_rac_pad" class="sala_rac_pad">
<span<?php echo $sala_rac_delete->pad->viewAttributes() ?>><?php echo $sala_rac_delete->pad->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sala_rac_delete->local_trauma->Visible) { // local_trauma ?>
		<td <?php echo $sala_rac_delete->local_trauma->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_delete->RowCount ?>_sala_rac_local_trauma" class="sala_rac_local_trauma">
<span<?php echo $sala_rac_delete->local_trauma->viewAttributes() ?>><?php echo $sala_rac_delete->local_trauma->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sala_rac_delete->sistema->Visible) { // sistema ?>
		<td <?php echo $sala_rac_delete->sistema->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_delete->RowCount ?>_sala_rac_sistema" class="sala_rac_sistema">
<span<?php echo $sala_rac_delete->sistema->viewAttributes() ?>><?php echo $sala_rac_delete->sistema->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sala_rac_delete->nivel_conciencia->Visible) { // nivel_conciencia ?>
		<td <?php echo $sala_rac_delete->nivel_conciencia->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_delete->RowCount ?>_sala_rac_nivel_conciencia" class="sala_rac_nivel_conciencia">
<span<?php echo $sala_rac_delete->nivel_conciencia->viewAttributes() ?>><?php echo $sala_rac_delete->nivel_conciencia->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sala_rac_delete->dolor->Visible) { // dolor ?>
		<td <?php echo $sala_rac_delete->dolor->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_delete->RowCount ?>_sala_rac_dolor" class="sala_rac_dolor">
<span<?php echo $sala_rac_delete->dolor->viewAttributes() ?>><?php echo $sala_rac_delete->dolor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sala_rac_delete->signos_sintomas->Visible) { // signos_sintomas ?>
		<td <?php echo $sala_rac_delete->signos_sintomas->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_delete->RowCount ?>_sala_rac_signos_sintomas" class="sala_rac_signos_sintomas">
<span<?php echo $sala_rac_delete->signos_sintomas->viewAttributes() ?>><?php echo $sala_rac_delete->signos_sintomas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sala_rac_delete->factores_riesgos->Visible) { // factores_riesgos ?>
		<td <?php echo $sala_rac_delete->factores_riesgos->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_delete->RowCount ?>_sala_rac_factores_riesgos" class="sala_rac_factores_riesgos">
<span<?php echo $sala_rac_delete->factores_riesgos->viewAttributes() ?>><?php echo $sala_rac_delete->factores_riesgos->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sala_rac_delete->estado_final->Visible) { // estado_final ?>
		<td <?php echo $sala_rac_delete->estado_final->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_delete->RowCount ?>_sala_rac_estado_final" class="sala_rac_estado_final">
<span<?php echo $sala_rac_delete->estado_final->viewAttributes() ?>><?php echo $sala_rac_delete->estado_final->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sala_rac_delete->tipo_ingreso->Visible) { // tipo_ingreso ?>
		<td <?php echo $sala_rac_delete->tipo_ingreso->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_delete->RowCount ?>_sala_rac_tipo_ingreso" class="sala_rac_tipo_ingreso">
<span<?php echo $sala_rac_delete->tipo_ingreso->viewAttributes() ?>><?php echo $sala_rac_delete->tipo_ingreso->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sala_rac_delete->hora_clasificacion->Visible) { // hora_clasificacion ?>
		<td <?php echo $sala_rac_delete->hora_clasificacion->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_delete->RowCount ?>_sala_rac_hora_clasificacion" class="sala_rac_hora_clasificacion">
<span<?php echo $sala_rac_delete->hora_clasificacion->viewAttributes() ?>><?php echo $sala_rac_delete->hora_clasificacion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sala_rac_delete->hospital->Visible) { // hospital ?>
		<td <?php echo $sala_rac_delete->hospital->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_delete->RowCount ?>_sala_rac_hospital" class="sala_rac_hospital">
<span<?php echo $sala_rac_delete->hospital->viewAttributes() ?>><?php echo $sala_rac_delete->hospital->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sala_rac_delete->motivo_trauma->Visible) { // motivo_trauma ?>
		<td <?php echo $sala_rac_delete->motivo_trauma->cellAttributes() ?>>
<span id="el<?php echo $sala_rac_delete->RowCount ?>_sala_rac_motivo_trauma" class="sala_rac_motivo_trauma">
<span<?php echo $sala_rac_delete->motivo_trauma->viewAttributes() ?>><?php echo $sala_rac_delete->motivo_trauma->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$sala_rac_delete->Recordset->moveNext();
}
$sala_rac_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sala_rac_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$sala_rac_delete->showPageFooter();
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
$sala_rac_delete->terminate();
?>