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
$nivel_hospital_delete = new nivel_hospital_delete();

// Run the page
$nivel_hospital_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$nivel_hospital_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fnivel_hospitaldelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fnivel_hospitaldelete = currentForm = new ew.Form("fnivel_hospitaldelete", "delete");
	loadjs.done("fnivel_hospitaldelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $nivel_hospital_delete->showPageHeader(); ?>
<?php
$nivel_hospital_delete->showMessage();
?>
<form name="fnivel_hospitaldelete" id="fnivel_hospitaldelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="nivel_hospital">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($nivel_hospital_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($nivel_hospital_delete->id_nivel->Visible) { // id_nivel ?>
		<th class="<?php echo $nivel_hospital_delete->id_nivel->headerCellClass() ?>"><span id="elh_nivel_hospital_id_nivel" class="nivel_hospital_id_nivel"><?php echo $nivel_hospital_delete->id_nivel->caption() ?></span></th>
<?php } ?>
<?php if ($nivel_hospital_delete->nombre_nivel->Visible) { // nombre_nivel ?>
		<th class="<?php echo $nivel_hospital_delete->nombre_nivel->headerCellClass() ?>"><span id="elh_nivel_hospital_nombre_nivel" class="nivel_hospital_nombre_nivel"><?php echo $nivel_hospital_delete->nombre_nivel->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$nivel_hospital_delete->RecordCount = 0;
$i = 0;
while (!$nivel_hospital_delete->Recordset->EOF) {
	$nivel_hospital_delete->RecordCount++;
	$nivel_hospital_delete->RowCount++;

	// Set row properties
	$nivel_hospital->resetAttributes();
	$nivel_hospital->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$nivel_hospital_delete->loadRowValues($nivel_hospital_delete->Recordset);

	// Render row
	$nivel_hospital_delete->renderRow();
?>
	<tr <?php echo $nivel_hospital->rowAttributes() ?>>
<?php if ($nivel_hospital_delete->id_nivel->Visible) { // id_nivel ?>
		<td <?php echo $nivel_hospital_delete->id_nivel->cellAttributes() ?>>
<span id="el<?php echo $nivel_hospital_delete->RowCount ?>_nivel_hospital_id_nivel" class="nivel_hospital_id_nivel">
<span<?php echo $nivel_hospital_delete->id_nivel->viewAttributes() ?>><?php echo $nivel_hospital_delete->id_nivel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($nivel_hospital_delete->nombre_nivel->Visible) { // nombre_nivel ?>
		<td <?php echo $nivel_hospital_delete->nombre_nivel->cellAttributes() ?>>
<span id="el<?php echo $nivel_hospital_delete->RowCount ?>_nivel_hospital_nombre_nivel" class="nivel_hospital_nombre_nivel">
<span<?php echo $nivel_hospital_delete->nombre_nivel->viewAttributes() ?>><?php echo $nivel_hospital_delete->nombre_nivel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$nivel_hospital_delete->Recordset->moveNext();
}
$nivel_hospital_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $nivel_hospital_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$nivel_hospital_delete->showPageFooter();
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
$nivel_hospital_delete->terminate();
?>