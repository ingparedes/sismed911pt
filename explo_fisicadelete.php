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
$explo_fisica_delete = new explo_fisica_delete();

// Run the page
$explo_fisica_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$explo_fisica_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fexplo_fisicadelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fexplo_fisicadelete = currentForm = new ew.Form("fexplo_fisicadelete", "delete");
	loadjs.done("fexplo_fisicadelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $explo_fisica_delete->showPageHeader(); ?>
<?php
$explo_fisica_delete->showMessage();
?>
<form name="fexplo_fisicadelete" id="fexplo_fisicadelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="explo_fisica">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($explo_fisica_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($explo_fisica_delete->id->Visible) { // id ?>
		<th class="<?php echo $explo_fisica_delete->id->headerCellClass() ?>"><span id="elh_explo_fisica_id" class="explo_fisica_id"><?php echo $explo_fisica_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($explo_fisica_delete->nombre->Visible) { // nombre ?>
		<th class="<?php echo $explo_fisica_delete->nombre->headerCellClass() ?>"><span id="elh_explo_fisica_nombre" class="explo_fisica_nombre"><?php echo $explo_fisica_delete->nombre->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$explo_fisica_delete->RecordCount = 0;
$i = 0;
while (!$explo_fisica_delete->Recordset->EOF) {
	$explo_fisica_delete->RecordCount++;
	$explo_fisica_delete->RowCount++;

	// Set row properties
	$explo_fisica->resetAttributes();
	$explo_fisica->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$explo_fisica_delete->loadRowValues($explo_fisica_delete->Recordset);

	// Render row
	$explo_fisica_delete->renderRow();
?>
	<tr <?php echo $explo_fisica->rowAttributes() ?>>
<?php if ($explo_fisica_delete->id->Visible) { // id ?>
		<td <?php echo $explo_fisica_delete->id->cellAttributes() ?>>
<span id="el<?php echo $explo_fisica_delete->RowCount ?>_explo_fisica_id" class="explo_fisica_id">
<span<?php echo $explo_fisica_delete->id->viewAttributes() ?>><?php echo $explo_fisica_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($explo_fisica_delete->nombre->Visible) { // nombre ?>
		<td <?php echo $explo_fisica_delete->nombre->cellAttributes() ?>>
<span id="el<?php echo $explo_fisica_delete->RowCount ?>_explo_fisica_nombre" class="explo_fisica_nombre">
<span<?php echo $explo_fisica_delete->nombre->viewAttributes() ?>><?php echo $explo_fisica_delete->nombre->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$explo_fisica_delete->Recordset->moveNext();
}
$explo_fisica_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $explo_fisica_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$explo_fisica_delete->showPageFooter();
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
$explo_fisica_delete->terminate();
?>