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
$servicios_division_delete = new servicios_division_delete();

// Run the page
$servicios_division_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$servicios_division_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fservicios_divisiondelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fservicios_divisiondelete = currentForm = new ew.Form("fservicios_divisiondelete", "delete");
	loadjs.done("fservicios_divisiondelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $servicios_division_delete->showPageHeader(); ?>
<?php
$servicios_division_delete->showMessage();
?>
<form name="fservicios_divisiondelete" id="fservicios_divisiondelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="servicios_division">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($servicios_division_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($servicios_division_delete->nombre_servicio->Visible) { // nombre_servicio ?>
		<th class="<?php echo $servicios_division_delete->nombre_servicio->headerCellClass() ?>"><span id="elh_servicios_division_nombre_servicio" class="servicios_division_nombre_servicio"><?php echo $servicios_division_delete->nombre_servicio->caption() ?></span></th>
<?php } ?>
<?php if ($servicios_division_delete->id_servicio->Visible) { // id_servicio ?>
		<th class="<?php echo $servicios_division_delete->id_servicio->headerCellClass() ?>"><span id="elh_servicios_division_id_servicio" class="servicios_division_id_servicio"><?php echo $servicios_division_delete->id_servicio->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$servicios_division_delete->RecordCount = 0;
$i = 0;
while (!$servicios_division_delete->Recordset->EOF) {
	$servicios_division_delete->RecordCount++;
	$servicios_division_delete->RowCount++;

	// Set row properties
	$servicios_division->resetAttributes();
	$servicios_division->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$servicios_division_delete->loadRowValues($servicios_division_delete->Recordset);

	// Render row
	$servicios_division_delete->renderRow();
?>
	<tr <?php echo $servicios_division->rowAttributes() ?>>
<?php if ($servicios_division_delete->nombre_servicio->Visible) { // nombre_servicio ?>
		<td <?php echo $servicios_division_delete->nombre_servicio->cellAttributes() ?>>
<span id="el<?php echo $servicios_division_delete->RowCount ?>_servicios_division_nombre_servicio" class="servicios_division_nombre_servicio">
<span<?php echo $servicios_division_delete->nombre_servicio->viewAttributes() ?>><?php echo $servicios_division_delete->nombre_servicio->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($servicios_division_delete->id_servicio->Visible) { // id_servicio ?>
		<td <?php echo $servicios_division_delete->id_servicio->cellAttributes() ?>>
<span id="el<?php echo $servicios_division_delete->RowCount ?>_servicios_division_id_servicio" class="servicios_division_id_servicio">
<span<?php echo $servicios_division_delete->id_servicio->viewAttributes() ?>><?php echo $servicios_division_delete->id_servicio->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$servicios_division_delete->Recordset->moveNext();
}
$servicios_division_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $servicios_division_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$servicios_division_delete->showPageFooter();
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
$servicios_division_delete->terminate();
?>