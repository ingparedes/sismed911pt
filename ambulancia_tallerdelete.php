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
$ambulancia_taller_delete = new ambulancia_taller_delete();

// Run the page
$ambulancia_taller_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ambulancia_taller_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fambulancia_tallerdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fambulancia_tallerdelete = currentForm = new ew.Form("fambulancia_tallerdelete", "delete");
	loadjs.done("fambulancia_tallerdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ambulancia_taller_delete->showPageHeader(); ?>
<?php
$ambulancia_taller_delete->showMessage();
?>
<form name="fambulancia_tallerdelete" id="fambulancia_tallerdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ambulancia_taller">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ambulancia_taller_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ambulancia_taller_delete->id->Visible) { // id ?>
		<th class="<?php echo $ambulancia_taller_delete->id->headerCellClass() ?>"><span id="elh_ambulancia_taller_id" class="ambulancia_taller_id"><?php echo $ambulancia_taller_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($ambulancia_taller_delete->nombre_taller->Visible) { // nombre_taller ?>
		<th class="<?php echo $ambulancia_taller_delete->nombre_taller->headerCellClass() ?>"><span id="elh_ambulancia_taller_nombre_taller" class="ambulancia_taller_nombre_taller"><?php echo $ambulancia_taller_delete->nombre_taller->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ambulancia_taller_delete->RecordCount = 0;
$i = 0;
while (!$ambulancia_taller_delete->Recordset->EOF) {
	$ambulancia_taller_delete->RecordCount++;
	$ambulancia_taller_delete->RowCount++;

	// Set row properties
	$ambulancia_taller->resetAttributes();
	$ambulancia_taller->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ambulancia_taller_delete->loadRowValues($ambulancia_taller_delete->Recordset);

	// Render row
	$ambulancia_taller_delete->renderRow();
?>
	<tr <?php echo $ambulancia_taller->rowAttributes() ?>>
<?php if ($ambulancia_taller_delete->id->Visible) { // id ?>
		<td <?php echo $ambulancia_taller_delete->id->cellAttributes() ?>>
<span id="el<?php echo $ambulancia_taller_delete->RowCount ?>_ambulancia_taller_id" class="ambulancia_taller_id">
<span<?php echo $ambulancia_taller_delete->id->viewAttributes() ?>><?php echo $ambulancia_taller_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ambulancia_taller_delete->nombre_taller->Visible) { // nombre_taller ?>
		<td <?php echo $ambulancia_taller_delete->nombre_taller->cellAttributes() ?>>
<span id="el<?php echo $ambulancia_taller_delete->RowCount ?>_ambulancia_taller_nombre_taller" class="ambulancia_taller_nombre_taller">
<span<?php echo $ambulancia_taller_delete->nombre_taller->viewAttributes() ?>><?php echo $ambulancia_taller_delete->nombre_taller->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ambulancia_taller_delete->Recordset->moveNext();
}
$ambulancia_taller_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ambulancia_taller_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ambulancia_taller_delete->showPageFooter();
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
$ambulancia_taller_delete->terminate();
?>