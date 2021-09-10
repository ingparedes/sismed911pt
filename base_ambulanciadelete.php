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
$base_ambulancia_delete = new base_ambulancia_delete();

// Run the page
$base_ambulancia_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$base_ambulancia_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbase_ambulanciadelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fbase_ambulanciadelete = currentForm = new ew.Form("fbase_ambulanciadelete", "delete");
	loadjs.done("fbase_ambulanciadelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $base_ambulancia_delete->showPageHeader(); ?>
<?php
$base_ambulancia_delete->showMessage();
?>
<form name="fbase_ambulanciadelete" id="fbase_ambulanciadelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="base_ambulancia">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($base_ambulancia_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($base_ambulancia_delete->id_base->Visible) { // id_base ?>
		<th class="<?php echo $base_ambulancia_delete->id_base->headerCellClass() ?>"><span id="elh_base_ambulancia_id_base" class="base_ambulancia_id_base"><?php echo $base_ambulancia_delete->id_base->caption() ?></span></th>
<?php } ?>
<?php if ($base_ambulancia_delete->nombre->Visible) { // nombre ?>
		<th class="<?php echo $base_ambulancia_delete->nombre->headerCellClass() ?>"><span id="elh_base_ambulancia_nombre" class="base_ambulancia_nombre"><?php echo $base_ambulancia_delete->nombre->caption() ?></span></th>
<?php } ?>
<?php if ($base_ambulancia_delete->dpto->Visible) { // dpto ?>
		<th class="<?php echo $base_ambulancia_delete->dpto->headerCellClass() ?>"><span id="elh_base_ambulancia_dpto" class="base_ambulancia_dpto"><?php echo $base_ambulancia_delete->dpto->caption() ?></span></th>
<?php } ?>
<?php if ($base_ambulancia_delete->provincia->Visible) { // provincia ?>
		<th class="<?php echo $base_ambulancia_delete->provincia->headerCellClass() ?>"><span id="elh_base_ambulancia_provincia" class="base_ambulancia_provincia"><?php echo $base_ambulancia_delete->provincia->caption() ?></span></th>
<?php } ?>
<?php if ($base_ambulancia_delete->distrito->Visible) { // distrito ?>
		<th class="<?php echo $base_ambulancia_delete->distrito->headerCellClass() ?>"><span id="elh_base_ambulancia_distrito" class="base_ambulancia_distrito"><?php echo $base_ambulancia_delete->distrito->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$base_ambulancia_delete->RecordCount = 0;
$i = 0;
while (!$base_ambulancia_delete->Recordset->EOF) {
	$base_ambulancia_delete->RecordCount++;
	$base_ambulancia_delete->RowCount++;

	// Set row properties
	$base_ambulancia->resetAttributes();
	$base_ambulancia->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$base_ambulancia_delete->loadRowValues($base_ambulancia_delete->Recordset);

	// Render row
	$base_ambulancia_delete->renderRow();
?>
	<tr <?php echo $base_ambulancia->rowAttributes() ?>>
<?php if ($base_ambulancia_delete->id_base->Visible) { // id_base ?>
		<td <?php echo $base_ambulancia_delete->id_base->cellAttributes() ?>>
<span id="el<?php echo $base_ambulancia_delete->RowCount ?>_base_ambulancia_id_base" class="base_ambulancia_id_base">
<span<?php echo $base_ambulancia_delete->id_base->viewAttributes() ?>><?php echo $base_ambulancia_delete->id_base->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($base_ambulancia_delete->nombre->Visible) { // nombre ?>
		<td <?php echo $base_ambulancia_delete->nombre->cellAttributes() ?>>
<span id="el<?php echo $base_ambulancia_delete->RowCount ?>_base_ambulancia_nombre" class="base_ambulancia_nombre">
<span<?php echo $base_ambulancia_delete->nombre->viewAttributes() ?>><?php echo $base_ambulancia_delete->nombre->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($base_ambulancia_delete->dpto->Visible) { // dpto ?>
		<td <?php echo $base_ambulancia_delete->dpto->cellAttributes() ?>>
<span id="el<?php echo $base_ambulancia_delete->RowCount ?>_base_ambulancia_dpto" class="base_ambulancia_dpto">
<span<?php echo $base_ambulancia_delete->dpto->viewAttributes() ?>><?php echo $base_ambulancia_delete->dpto->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($base_ambulancia_delete->provincia->Visible) { // provincia ?>
		<td <?php echo $base_ambulancia_delete->provincia->cellAttributes() ?>>
<span id="el<?php echo $base_ambulancia_delete->RowCount ?>_base_ambulancia_provincia" class="base_ambulancia_provincia">
<span<?php echo $base_ambulancia_delete->provincia->viewAttributes() ?>><?php echo $base_ambulancia_delete->provincia->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($base_ambulancia_delete->distrito->Visible) { // distrito ?>
		<td <?php echo $base_ambulancia_delete->distrito->cellAttributes() ?>>
<span id="el<?php echo $base_ambulancia_delete->RowCount ?>_base_ambulancia_distrito" class="base_ambulancia_distrito">
<span<?php echo $base_ambulancia_delete->distrito->viewAttributes() ?>><?php echo $base_ambulancia_delete->distrito->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$base_ambulancia_delete->Recordset->moveNext();
}
$base_ambulancia_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $base_ambulancia_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$base_ambulancia_delete->showPageFooter();
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
$base_ambulancia_delete->terminate();
?>