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
$insumos_delete = new insumos_delete();

// Run the page
$insumos_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$insumos_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var finsumosdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	finsumosdelete = currentForm = new ew.Form("finsumosdelete", "delete");
	loadjs.done("finsumosdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $insumos_delete->showPageHeader(); ?>
<?php
$insumos_delete->showMessage();
?>
<form name="finsumosdelete" id="finsumosdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="insumos">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($insumos_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($insumos_delete->id_insumo->Visible) { // id_insumo ?>
		<th class="<?php echo $insumos_delete->id_insumo->headerCellClass() ?>"><span id="elh_insumos_id_insumo" class="insumos_id_insumo"><?php echo $insumos_delete->id_insumo->caption() ?></span></th>
<?php } ?>
<?php if ($insumos_delete->nombre_insumo->Visible) { // nombre_insumo ?>
		<th class="<?php echo $insumos_delete->nombre_insumo->headerCellClass() ?>"><span id="elh_insumos_nombre_insumo" class="insumos_nombre_insumo"><?php echo $insumos_delete->nombre_insumo->caption() ?></span></th>
<?php } ?>
<?php if ($insumos_delete->valor->Visible) { // valor ?>
		<th class="<?php echo $insumos_delete->valor->headerCellClass() ?>"><span id="elh_insumos_valor" class="insumos_valor"><?php echo $insumos_delete->valor->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$insumos_delete->RecordCount = 0;
$i = 0;
while (!$insumos_delete->Recordset->EOF) {
	$insumos_delete->RecordCount++;
	$insumos_delete->RowCount++;

	// Set row properties
	$insumos->resetAttributes();
	$insumos->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$insumos_delete->loadRowValues($insumos_delete->Recordset);

	// Render row
	$insumos_delete->renderRow();
?>
	<tr <?php echo $insumos->rowAttributes() ?>>
<?php if ($insumos_delete->id_insumo->Visible) { // id_insumo ?>
		<td <?php echo $insumos_delete->id_insumo->cellAttributes() ?>>
<span id="el<?php echo $insumos_delete->RowCount ?>_insumos_id_insumo" class="insumos_id_insumo">
<span<?php echo $insumos_delete->id_insumo->viewAttributes() ?>><?php echo $insumos_delete->id_insumo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($insumos_delete->nombre_insumo->Visible) { // nombre_insumo ?>
		<td <?php echo $insumos_delete->nombre_insumo->cellAttributes() ?>>
<span id="el<?php echo $insumos_delete->RowCount ?>_insumos_nombre_insumo" class="insumos_nombre_insumo">
<span<?php echo $insumos_delete->nombre_insumo->viewAttributes() ?>><?php echo $insumos_delete->nombre_insumo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($insumos_delete->valor->Visible) { // valor ?>
		<td <?php echo $insumos_delete->valor->cellAttributes() ?>>
<span id="el<?php echo $insumos_delete->RowCount ?>_insumos_valor" class="insumos_valor">
<span<?php echo $insumos_delete->valor->viewAttributes() ?>><?php echo $insumos_delete->valor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$insumos_delete->Recordset->moveNext();
}
$insumos_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $insumos_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$insumos_delete->showPageFooter();
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
$insumos_delete->terminate();
?>