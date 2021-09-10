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
$sede_sismed_delete = new sede_sismed_delete();

// Run the page
$sede_sismed_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sede_sismed_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fsede_sismeddelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fsede_sismeddelete = currentForm = new ew.Form("fsede_sismeddelete", "delete");
	loadjs.done("fsede_sismeddelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $sede_sismed_delete->showPageHeader(); ?>
<?php
$sede_sismed_delete->showMessage();
?>
<form name="fsede_sismeddelete" id="fsede_sismeddelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sede_sismed">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($sede_sismed_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($sede_sismed_delete->id_sede->Visible) { // id_sede ?>
		<th class="<?php echo $sede_sismed_delete->id_sede->headerCellClass() ?>"><span id="elh_sede_sismed_id_sede" class="sede_sismed_id_sede"><?php echo $sede_sismed_delete->id_sede->caption() ?></span></th>
<?php } ?>
<?php if ($sede_sismed_delete->nombre_sede->Visible) { // nombre_sede ?>
		<th class="<?php echo $sede_sismed_delete->nombre_sede->headerCellClass() ?>"><span id="elh_sede_sismed_nombre_sede" class="sede_sismed_nombre_sede"><?php echo $sede_sismed_delete->nombre_sede->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$sede_sismed_delete->RecordCount = 0;
$i = 0;
while (!$sede_sismed_delete->Recordset->EOF) {
	$sede_sismed_delete->RecordCount++;
	$sede_sismed_delete->RowCount++;

	// Set row properties
	$sede_sismed->resetAttributes();
	$sede_sismed->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$sede_sismed_delete->loadRowValues($sede_sismed_delete->Recordset);

	// Render row
	$sede_sismed_delete->renderRow();
?>
	<tr <?php echo $sede_sismed->rowAttributes() ?>>
<?php if ($sede_sismed_delete->id_sede->Visible) { // id_sede ?>
		<td <?php echo $sede_sismed_delete->id_sede->cellAttributes() ?>>
<span id="el<?php echo $sede_sismed_delete->RowCount ?>_sede_sismed_id_sede" class="sede_sismed_id_sede">
<span<?php echo $sede_sismed_delete->id_sede->viewAttributes() ?>><?php echo $sede_sismed_delete->id_sede->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sede_sismed_delete->nombre_sede->Visible) { // nombre_sede ?>
		<td <?php echo $sede_sismed_delete->nombre_sede->cellAttributes() ?>>
<span id="el<?php echo $sede_sismed_delete->RowCount ?>_sede_sismed_nombre_sede" class="sede_sismed_nombre_sede">
<span<?php echo $sede_sismed_delete->nombre_sede->viewAttributes() ?>><?php echo $sede_sismed_delete->nombre_sede->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$sede_sismed_delete->Recordset->moveNext();
}
$sede_sismed_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sede_sismed_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$sede_sismed_delete->showPageFooter();
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
$sede_sismed_delete->terminate();
?>