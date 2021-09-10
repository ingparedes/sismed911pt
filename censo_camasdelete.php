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
$censo_camas_delete = new censo_camas_delete();

// Run the page
$censo_camas_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$censo_camas_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fcenso_camasdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fcenso_camasdelete = currentForm = new ew.Form("fcenso_camasdelete", "delete");
	loadjs.done("fcenso_camasdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $censo_camas_delete->showPageHeader(); ?>
<?php
$censo_camas_delete->showMessage();
?>
<form name="fcenso_camasdelete" id="fcenso_camasdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="censo_camas">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($censo_camas_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($censo_camas_delete->id_cama->Visible) { // id_cama ?>
		<th class="<?php echo $censo_camas_delete->id_cama->headerCellClass() ?>"><span id="elh_censo_camas_id_cama" class="censo_camas_id_cama"><?php echo $censo_camas_delete->id_cama->caption() ?></span></th>
<?php } ?>
<?php if ($censo_camas_delete->id_hospital->Visible) { // id_hospital ?>
		<th class="<?php echo $censo_camas_delete->id_hospital->headerCellClass() ?>"><span id="elh_censo_camas_id_hospital" class="censo_camas_id_hospital"><?php echo $censo_camas_delete->id_hospital->caption() ?></span></th>
<?php } ?>
<?php if ($censo_camas_delete->fecha_reporte->Visible) { // fecha_reporte ?>
		<th class="<?php echo $censo_camas_delete->fecha_reporte->headerCellClass() ?>"><span id="elh_censo_camas_fecha_reporte" class="censo_camas_fecha_reporte"><?php echo $censo_camas_delete->fecha_reporte->caption() ?></span></th>
<?php } ?>
<?php if ($censo_camas_delete->nombre_reporta->Visible) { // nombre_reporta ?>
		<th class="<?php echo $censo_camas_delete->nombre_reporta->headerCellClass() ?>"><span id="elh_censo_camas_nombre_reporta" class="censo_camas_nombre_reporta"><?php echo $censo_camas_delete->nombre_reporta->caption() ?></span></th>
<?php } ?>
<?php if ($censo_camas_delete->tele_reporta->Visible) { // tele_reporta ?>
		<th class="<?php echo $censo_camas_delete->tele_reporta->headerCellClass() ?>"><span id="elh_censo_camas_tele_reporta" class="censo_camas_tele_reporta"><?php echo $censo_camas_delete->tele_reporta->caption() ?></span></th>
<?php } ?>
<?php if ($censo_camas_delete->id_bloque->Visible) { // id_bloque ?>
		<th class="<?php echo $censo_camas_delete->id_bloque->headerCellClass() ?>"><span id="elh_censo_camas_id_bloque" class="censo_camas_id_bloque"><?php echo $censo_camas_delete->id_bloque->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$censo_camas_delete->RecordCount = 0;
$i = 0;
while (!$censo_camas_delete->Recordset->EOF) {
	$censo_camas_delete->RecordCount++;
	$censo_camas_delete->RowCount++;

	// Set row properties
	$censo_camas->resetAttributes();
	$censo_camas->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$censo_camas_delete->loadRowValues($censo_camas_delete->Recordset);

	// Render row
	$censo_camas_delete->renderRow();
?>
	<tr <?php echo $censo_camas->rowAttributes() ?>>
<?php if ($censo_camas_delete->id_cama->Visible) { // id_cama ?>
		<td <?php echo $censo_camas_delete->id_cama->cellAttributes() ?>>
<span id="el<?php echo $censo_camas_delete->RowCount ?>_censo_camas_id_cama" class="censo_camas_id_cama">
<span<?php echo $censo_camas_delete->id_cama->viewAttributes() ?>><?php echo $censo_camas_delete->id_cama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($censo_camas_delete->id_hospital->Visible) { // id_hospital ?>
		<td <?php echo $censo_camas_delete->id_hospital->cellAttributes() ?>>
<span id="el<?php echo $censo_camas_delete->RowCount ?>_censo_camas_id_hospital" class="censo_camas_id_hospital">
<span<?php echo $censo_camas_delete->id_hospital->viewAttributes() ?>><?php echo $censo_camas_delete->id_hospital->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($censo_camas_delete->fecha_reporte->Visible) { // fecha_reporte ?>
		<td <?php echo $censo_camas_delete->fecha_reporte->cellAttributes() ?>>
<span id="el<?php echo $censo_camas_delete->RowCount ?>_censo_camas_fecha_reporte" class="censo_camas_fecha_reporte">
<span<?php echo $censo_camas_delete->fecha_reporte->viewAttributes() ?>><?php echo $censo_camas_delete->fecha_reporte->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($censo_camas_delete->nombre_reporta->Visible) { // nombre_reporta ?>
		<td <?php echo $censo_camas_delete->nombre_reporta->cellAttributes() ?>>
<span id="el<?php echo $censo_camas_delete->RowCount ?>_censo_camas_nombre_reporta" class="censo_camas_nombre_reporta">
<span<?php echo $censo_camas_delete->nombre_reporta->viewAttributes() ?>><?php echo $censo_camas_delete->nombre_reporta->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($censo_camas_delete->tele_reporta->Visible) { // tele_reporta ?>
		<td <?php echo $censo_camas_delete->tele_reporta->cellAttributes() ?>>
<span id="el<?php echo $censo_camas_delete->RowCount ?>_censo_camas_tele_reporta" class="censo_camas_tele_reporta">
<span<?php echo $censo_camas_delete->tele_reporta->viewAttributes() ?>><?php echo $censo_camas_delete->tele_reporta->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($censo_camas_delete->id_bloque->Visible) { // id_bloque ?>
		<td <?php echo $censo_camas_delete->id_bloque->cellAttributes() ?>>
<span id="el<?php echo $censo_camas_delete->RowCount ?>_censo_camas_id_bloque" class="censo_camas_id_bloque">
<span<?php echo $censo_camas_delete->id_bloque->viewAttributes() ?>><?php echo $censo_camas_delete->id_bloque->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$censo_camas_delete->Recordset->moveNext();
}
$censo_camas_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $censo_camas_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$censo_camas_delete->showPageFooter();
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
$censo_camas_delete->terminate();
?>