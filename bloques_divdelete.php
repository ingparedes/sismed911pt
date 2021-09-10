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
$bloques_div_delete = new bloques_div_delete();

// Run the page
$bloques_div_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bloques_div_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbloques_divdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fbloques_divdelete = currentForm = new ew.Form("fbloques_divdelete", "delete");
	loadjs.done("fbloques_divdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $bloques_div_delete->showPageHeader(); ?>
<?php
$bloques_div_delete->showMessage();
?>
<form name="fbloques_divdelete" id="fbloques_divdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bloques_div">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($bloques_div_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($bloques_div_delete->bloque->Visible) { // bloque ?>
		<th class="<?php echo $bloques_div_delete->bloque->headerCellClass() ?>"><span id="elh_bloques_div_bloque" class="bloques_div_bloque"><?php echo $bloques_div_delete->bloque->caption() ?></span></th>
<?php } ?>
<?php if ($bloques_div_delete->fecha_creacion->Visible) { // fecha_creacion ?>
		<th class="<?php echo $bloques_div_delete->fecha_creacion->headerCellClass() ?>"><span id="elh_bloques_div_fecha_creacion" class="bloques_div_fecha_creacion"><?php echo $bloques_div_delete->fecha_creacion->caption() ?></span></th>
<?php } ?>
<?php if ($bloques_div_delete->id->Visible) { // id ?>
		<th class="<?php echo $bloques_div_delete->id->headerCellClass() ?>"><span id="elh_bloques_div_id" class="bloques_div_id"><?php echo $bloques_div_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($bloques_div_delete->activo->Visible) { // activo ?>
		<th class="<?php echo $bloques_div_delete->activo->headerCellClass() ?>"><span id="elh_bloques_div_activo" class="bloques_div_activo"><?php echo $bloques_div_delete->activo->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$bloques_div_delete->RecordCount = 0;
$i = 0;
while (!$bloques_div_delete->Recordset->EOF) {
	$bloques_div_delete->RecordCount++;
	$bloques_div_delete->RowCount++;

	// Set row properties
	$bloques_div->resetAttributes();
	$bloques_div->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$bloques_div_delete->loadRowValues($bloques_div_delete->Recordset);

	// Render row
	$bloques_div_delete->renderRow();
?>
	<tr <?php echo $bloques_div->rowAttributes() ?>>
<?php if ($bloques_div_delete->bloque->Visible) { // bloque ?>
		<td <?php echo $bloques_div_delete->bloque->cellAttributes() ?>>
<span id="el<?php echo $bloques_div_delete->RowCount ?>_bloques_div_bloque" class="bloques_div_bloque">
<span<?php echo $bloques_div_delete->bloque->viewAttributes() ?>><?php echo $bloques_div_delete->bloque->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bloques_div_delete->fecha_creacion->Visible) { // fecha_creacion ?>
		<td <?php echo $bloques_div_delete->fecha_creacion->cellAttributes() ?>>
<span id="el<?php echo $bloques_div_delete->RowCount ?>_bloques_div_fecha_creacion" class="bloques_div_fecha_creacion">
<span<?php echo $bloques_div_delete->fecha_creacion->viewAttributes() ?>><?php echo $bloques_div_delete->fecha_creacion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bloques_div_delete->id->Visible) { // id ?>
		<td <?php echo $bloques_div_delete->id->cellAttributes() ?>>
<span id="el<?php echo $bloques_div_delete->RowCount ?>_bloques_div_id" class="bloques_div_id">
<span<?php echo $bloques_div_delete->id->viewAttributes() ?>><?php echo $bloques_div_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bloques_div_delete->activo->Visible) { // activo ?>
		<td <?php echo $bloques_div_delete->activo->cellAttributes() ?>>
<span id="el<?php echo $bloques_div_delete->RowCount ?>_bloques_div_activo" class="bloques_div_activo">
<span<?php echo $bloques_div_delete->activo->viewAttributes() ?>><div class="custom-control custom-checkbox d-inline-block"><input type="checkbox" id="x_activo" class="custom-control-input" value="<?php echo $bloques_div_delete->activo->getViewValue() ?>" disabled<?php if (ConvertToBool($bloques_div_delete->activo->CurrentValue)) { ?> checked<?php } ?>><label class="custom-control-label" for="x_activo"></label></div></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$bloques_div_delete->Recordset->moveNext();
}
$bloques_div_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $bloques_div_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$bloques_div_delete->showPageFooter();
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
$bloques_div_delete->terminate();
?>