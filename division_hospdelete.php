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
$division_hosp_delete = new division_hosp_delete();

// Run the page
$division_hosp_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$division_hosp_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fdivision_hospdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fdivision_hospdelete = currentForm = new ew.Form("fdivision_hospdelete", "delete");
	loadjs.done("fdivision_hospdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $division_hosp_delete->showPageHeader(); ?>
<?php
$division_hosp_delete->showMessage();
?>
<form name="fdivision_hospdelete" id="fdivision_hospdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="division_hosp">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($division_hosp_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($division_hosp_delete->descripcion->Visible) { // descripcion ?>
		<th class="<?php echo $division_hosp_delete->descripcion->headerCellClass() ?>"><span id="elh_division_hosp_descripcion" class="division_hosp_descripcion"><?php echo $division_hosp_delete->descripcion->caption() ?></span></th>
<?php } ?>
<?php if ($division_hosp_delete->id_servicio->Visible) { // id_servicio ?>
		<th class="<?php echo $division_hosp_delete->id_servicio->headerCellClass() ?>"><span id="elh_division_hosp_id_servicio" class="division_hosp_id_servicio"><?php echo $division_hosp_delete->id_servicio->caption() ?></span></th>
<?php } ?>
<?php if ($division_hosp_delete->bloque->Visible) { // bloque ?>
		<th class="<?php echo $division_hosp_delete->bloque->headerCellClass() ?>"><span id="elh_division_hosp_bloque" class="division_hosp_bloque"><?php echo $division_hosp_delete->bloque->caption() ?></span></th>
<?php } ?>
<?php if ($division_hosp_delete->id_division->Visible) { // id_division ?>
		<th class="<?php echo $division_hosp_delete->id_division->headerCellClass() ?>"><span id="elh_division_hosp_id_division" class="division_hosp_id_division"><?php echo $division_hosp_delete->id_division->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$division_hosp_delete->RecordCount = 0;
$i = 0;
while (!$division_hosp_delete->Recordset->EOF) {
	$division_hosp_delete->RecordCount++;
	$division_hosp_delete->RowCount++;

	// Set row properties
	$division_hosp->resetAttributes();
	$division_hosp->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$division_hosp_delete->loadRowValues($division_hosp_delete->Recordset);

	// Render row
	$division_hosp_delete->renderRow();
?>
	<tr <?php echo $division_hosp->rowAttributes() ?>>
<?php if ($division_hosp_delete->descripcion->Visible) { // descripcion ?>
		<td <?php echo $division_hosp_delete->descripcion->cellAttributes() ?>>
<span id="el<?php echo $division_hosp_delete->RowCount ?>_division_hosp_descripcion" class="division_hosp_descripcion">
<span<?php echo $division_hosp_delete->descripcion->viewAttributes() ?>><?php echo $division_hosp_delete->descripcion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($division_hosp_delete->id_servicio->Visible) { // id_servicio ?>
		<td <?php echo $division_hosp_delete->id_servicio->cellAttributes() ?>>
<span id="el<?php echo $division_hosp_delete->RowCount ?>_division_hosp_id_servicio" class="division_hosp_id_servicio">
<span<?php echo $division_hosp_delete->id_servicio->viewAttributes() ?>><?php echo $division_hosp_delete->id_servicio->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($division_hosp_delete->bloque->Visible) { // bloque ?>
		<td <?php echo $division_hosp_delete->bloque->cellAttributes() ?>>
<span id="el<?php echo $division_hosp_delete->RowCount ?>_division_hosp_bloque" class="division_hosp_bloque">
<span<?php echo $division_hosp_delete->bloque->viewAttributes() ?>><?php echo $division_hosp_delete->bloque->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($division_hosp_delete->id_division->Visible) { // id_division ?>
		<td <?php echo $division_hosp_delete->id_division->cellAttributes() ?>>
<span id="el<?php echo $division_hosp_delete->RowCount ?>_division_hosp_id_division" class="division_hosp_id_division">
<span<?php echo $division_hosp_delete->id_division->viewAttributes() ?>><?php echo $division_hosp_delete->id_division->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$division_hosp_delete->Recordset->moveNext();
}
$division_hosp_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $division_hosp_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$division_hosp_delete->showPageFooter();
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
$division_hosp_delete->terminate();
?>