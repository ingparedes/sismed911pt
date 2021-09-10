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
$insumos_registros_delete = new insumos_registros_delete();

// Run the page
$insumos_registros_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$insumos_registros_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var finsumos_registrosdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	finsumos_registrosdelete = currentForm = new ew.Form("finsumos_registrosdelete", "delete");
	loadjs.done("finsumos_registrosdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $insumos_registros_delete->showPageHeader(); ?>
<?php
$insumos_registros_delete->showMessage();
?>
<form name="finsumos_registrosdelete" id="finsumos_registrosdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="insumos_registros">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($insumos_registros_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($insumos_registros_delete->id->Visible) { // id ?>
		<th class="<?php echo $insumos_registros_delete->id->headerCellClass() ?>"><span id="elh_insumos_registros_id" class="insumos_registros_id"><?php echo $insumos_registros_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($insumos_registros_delete->cod_casopreh->Visible) { // cod_casopreh ?>
		<th class="<?php echo $insumos_registros_delete->cod_casopreh->headerCellClass() ?>"><span id="elh_insumos_registros_cod_casopreh" class="insumos_registros_cod_casopreh"><?php echo $insumos_registros_delete->cod_casopreh->caption() ?></span></th>
<?php } ?>
<?php if ($insumos_registros_delete->insumos_id->Visible) { // insumos_id ?>
		<th class="<?php echo $insumos_registros_delete->insumos_id->headerCellClass() ?>"><span id="elh_insumos_registros_insumos_id" class="insumos_registros_insumos_id"><?php echo $insumos_registros_delete->insumos_id->caption() ?></span></th>
<?php } ?>
<?php if ($insumos_registros_delete->cantidad->Visible) { // cantidad ?>
		<th class="<?php echo $insumos_registros_delete->cantidad->headerCellClass() ?>"><span id="elh_insumos_registros_cantidad" class="insumos_registros_cantidad"><?php echo $insumos_registros_delete->cantidad->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$insumos_registros_delete->RecordCount = 0;
$i = 0;
while (!$insumos_registros_delete->Recordset->EOF) {
	$insumos_registros_delete->RecordCount++;
	$insumos_registros_delete->RowCount++;

	// Set row properties
	$insumos_registros->resetAttributes();
	$insumos_registros->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$insumos_registros_delete->loadRowValues($insumos_registros_delete->Recordset);

	// Render row
	$insumos_registros_delete->renderRow();
?>
	<tr <?php echo $insumos_registros->rowAttributes() ?>>
<?php if ($insumos_registros_delete->id->Visible) { // id ?>
		<td <?php echo $insumos_registros_delete->id->cellAttributes() ?>>
<span id="el<?php echo $insumos_registros_delete->RowCount ?>_insumos_registros_id" class="insumos_registros_id">
<span<?php echo $insumos_registros_delete->id->viewAttributes() ?>><?php echo $insumos_registros_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($insumos_registros_delete->cod_casopreh->Visible) { // cod_casopreh ?>
		<td <?php echo $insumos_registros_delete->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $insumos_registros_delete->RowCount ?>_insumos_registros_cod_casopreh" class="insumos_registros_cod_casopreh">
<span<?php echo $insumos_registros_delete->cod_casopreh->viewAttributes() ?>><?php echo $insumos_registros_delete->cod_casopreh->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($insumos_registros_delete->insumos_id->Visible) { // insumos_id ?>
		<td <?php echo $insumos_registros_delete->insumos_id->cellAttributes() ?>>
<span id="el<?php echo $insumos_registros_delete->RowCount ?>_insumos_registros_insumos_id" class="insumos_registros_insumos_id">
<span<?php echo $insumos_registros_delete->insumos_id->viewAttributes() ?>><?php echo $insumos_registros_delete->insumos_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($insumos_registros_delete->cantidad->Visible) { // cantidad ?>
		<td <?php echo $insumos_registros_delete->cantidad->cellAttributes() ?>>
<span id="el<?php echo $insumos_registros_delete->RowCount ?>_insumos_registros_cantidad" class="insumos_registros_cantidad">
<span<?php echo $insumos_registros_delete->cantidad->viewAttributes() ?>><?php echo $insumos_registros_delete->cantidad->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$insumos_registros_delete->Recordset->moveNext();
}
$insumos_registros_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $insumos_registros_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$insumos_registros_delete->showPageFooter();
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
$insumos_registros_delete->terminate();
?>