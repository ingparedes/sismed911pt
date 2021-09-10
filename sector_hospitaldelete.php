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
$sector_hospital_delete = new sector_hospital_delete();

// Run the page
$sector_hospital_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sector_hospital_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fsector_hospitaldelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fsector_hospitaldelete = currentForm = new ew.Form("fsector_hospitaldelete", "delete");
	loadjs.done("fsector_hospitaldelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $sector_hospital_delete->showPageHeader(); ?>
<?php
$sector_hospital_delete->showMessage();
?>
<form name="fsector_hospitaldelete" id="fsector_hospitaldelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sector_hospital">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($sector_hospital_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($sector_hospital_delete->id_sector->Visible) { // id_sector ?>
		<th class="<?php echo $sector_hospital_delete->id_sector->headerCellClass() ?>"><span id="elh_sector_hospital_id_sector" class="sector_hospital_id_sector"><?php echo $sector_hospital_delete->id_sector->caption() ?></span></th>
<?php } ?>
<?php if ($sector_hospital_delete->nombre_sector->Visible) { // nombre_sector ?>
		<th class="<?php echo $sector_hospital_delete->nombre_sector->headerCellClass() ?>"><span id="elh_sector_hospital_nombre_sector" class="sector_hospital_nombre_sector"><?php echo $sector_hospital_delete->nombre_sector->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$sector_hospital_delete->RecordCount = 0;
$i = 0;
while (!$sector_hospital_delete->Recordset->EOF) {
	$sector_hospital_delete->RecordCount++;
	$sector_hospital_delete->RowCount++;

	// Set row properties
	$sector_hospital->resetAttributes();
	$sector_hospital->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$sector_hospital_delete->loadRowValues($sector_hospital_delete->Recordset);

	// Render row
	$sector_hospital_delete->renderRow();
?>
	<tr <?php echo $sector_hospital->rowAttributes() ?>>
<?php if ($sector_hospital_delete->id_sector->Visible) { // id_sector ?>
		<td <?php echo $sector_hospital_delete->id_sector->cellAttributes() ?>>
<span id="el<?php echo $sector_hospital_delete->RowCount ?>_sector_hospital_id_sector" class="sector_hospital_id_sector">
<span<?php echo $sector_hospital_delete->id_sector->viewAttributes() ?>><?php echo $sector_hospital_delete->id_sector->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sector_hospital_delete->nombre_sector->Visible) { // nombre_sector ?>
		<td <?php echo $sector_hospital_delete->nombre_sector->cellAttributes() ?>>
<span id="el<?php echo $sector_hospital_delete->RowCount ?>_sector_hospital_nombre_sector" class="sector_hospital_nombre_sector">
<span<?php echo $sector_hospital_delete->nombre_sector->viewAttributes() ?>><?php echo $sector_hospital_delete->nombre_sector->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$sector_hospital_delete->Recordset->moveNext();
}
$sector_hospital_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sector_hospital_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$sector_hospital_delete->showPageFooter();
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
$sector_hospital_delete->terminate();
?>