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
$cie10dx_delete = new cie10dx_delete();

// Run the page
$cie10dx_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$cie10dx_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fcie10dxdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fcie10dxdelete = currentForm = new ew.Form("fcie10dxdelete", "delete");
	loadjs.done("fcie10dxdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $cie10dx_delete->showPageHeader(); ?>
<?php
$cie10dx_delete->showMessage();
?>
<form name="fcie10dxdelete" id="fcie10dxdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="cie10dx">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($cie10dx_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($cie10dx_delete->codcie10->Visible) { // codcie10 ?>
		<th class="<?php echo $cie10dx_delete->codcie10->headerCellClass() ?>"><span id="elh_cie10dx_codcie10" class="cie10dx_codcie10"><?php echo $cie10dx_delete->codcie10->caption() ?></span></th>
<?php } ?>
<?php if ($cie10dx_delete->iddx->Visible) { // iddx ?>
		<th class="<?php echo $cie10dx_delete->iddx->headerCellClass() ?>"><span id="elh_cie10dx_iddx" class="cie10dx_iddx"><?php echo $cie10dx_delete->iddx->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$cie10dx_delete->RecordCount = 0;
$i = 0;
while (!$cie10dx_delete->Recordset->EOF) {
	$cie10dx_delete->RecordCount++;
	$cie10dx_delete->RowCount++;

	// Set row properties
	$cie10dx->resetAttributes();
	$cie10dx->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$cie10dx_delete->loadRowValues($cie10dx_delete->Recordset);

	// Render row
	$cie10dx_delete->renderRow();
?>
	<tr <?php echo $cie10dx->rowAttributes() ?>>
<?php if ($cie10dx_delete->codcie10->Visible) { // codcie10 ?>
		<td <?php echo $cie10dx_delete->codcie10->cellAttributes() ?>>
<span id="el<?php echo $cie10dx_delete->RowCount ?>_cie10dx_codcie10" class="cie10dx_codcie10">
<span<?php echo $cie10dx_delete->codcie10->viewAttributes() ?>><?php echo $cie10dx_delete->codcie10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cie10dx_delete->iddx->Visible) { // iddx ?>
		<td <?php echo $cie10dx_delete->iddx->cellAttributes() ?>>
<span id="el<?php echo $cie10dx_delete->RowCount ?>_cie10dx_iddx" class="cie10dx_iddx">
<span<?php echo $cie10dx_delete->iddx->viewAttributes() ?>><?php echo $cie10dx_delete->iddx->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$cie10dx_delete->Recordset->moveNext();
}
$cie10dx_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $cie10dx_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$cie10dx_delete->showPageFooter();
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
$cie10dx_delete->terminate();
?>