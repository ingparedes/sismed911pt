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
$explo_general_cat_delete = new explo_general_cat_delete();

// Run the page
$explo_general_cat_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$explo_general_cat_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fexplo_general_catdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fexplo_general_catdelete = currentForm = new ew.Form("fexplo_general_catdelete", "delete");
	loadjs.done("fexplo_general_catdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $explo_general_cat_delete->showPageHeader(); ?>
<?php
$explo_general_cat_delete->showMessage();
?>
<form name="fexplo_general_catdelete" id="fexplo_general_catdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="explo_general_cat">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($explo_general_cat_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($explo_general_cat_delete->id->Visible) { // id ?>
		<th class="<?php echo $explo_general_cat_delete->id->headerCellClass() ?>"><span id="elh_explo_general_cat_id" class="explo_general_cat_id"><?php echo $explo_general_cat_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($explo_general_cat_delete->descripcion->Visible) { // descripcion ?>
		<th class="<?php echo $explo_general_cat_delete->descripcion->headerCellClass() ?>"><span id="elh_explo_general_cat_descripcion" class="explo_general_cat_descripcion"><?php echo $explo_general_cat_delete->descripcion->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$explo_general_cat_delete->RecordCount = 0;
$i = 0;
while (!$explo_general_cat_delete->Recordset->EOF) {
	$explo_general_cat_delete->RecordCount++;
	$explo_general_cat_delete->RowCount++;

	// Set row properties
	$explo_general_cat->resetAttributes();
	$explo_general_cat->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$explo_general_cat_delete->loadRowValues($explo_general_cat_delete->Recordset);

	// Render row
	$explo_general_cat_delete->renderRow();
?>
	<tr <?php echo $explo_general_cat->rowAttributes() ?>>
<?php if ($explo_general_cat_delete->id->Visible) { // id ?>
		<td <?php echo $explo_general_cat_delete->id->cellAttributes() ?>>
<span id="el<?php echo $explo_general_cat_delete->RowCount ?>_explo_general_cat_id" class="explo_general_cat_id">
<span<?php echo $explo_general_cat_delete->id->viewAttributes() ?>><?php echo $explo_general_cat_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($explo_general_cat_delete->descripcion->Visible) { // descripcion ?>
		<td <?php echo $explo_general_cat_delete->descripcion->cellAttributes() ?>>
<span id="el<?php echo $explo_general_cat_delete->RowCount ?>_explo_general_cat_descripcion" class="explo_general_cat_descripcion">
<span<?php echo $explo_general_cat_delete->descripcion->viewAttributes() ?>><?php echo $explo_general_cat_delete->descripcion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$explo_general_cat_delete->Recordset->moveNext();
}
$explo_general_cat_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $explo_general_cat_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$explo_general_cat_delete->showPageFooter();
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
$explo_general_cat_delete->terminate();
?>