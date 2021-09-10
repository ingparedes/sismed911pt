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
$interh_prioridad_delete = new interh_prioridad_delete();

// Run the page
$interh_prioridad_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_prioridad_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var finterh_prioridaddelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	finterh_prioridaddelete = currentForm = new ew.Form("finterh_prioridaddelete", "delete");
	loadjs.done("finterh_prioridaddelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $interh_prioridad_delete->showPageHeader(); ?>
<?php
$interh_prioridad_delete->showMessage();
?>
<form name="finterh_prioridaddelete" id="finterh_prioridaddelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="interh_prioridad">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($interh_prioridad_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($interh_prioridad_delete->id_prioridad->Visible) { // id_prioridad ?>
		<th class="<?php echo $interh_prioridad_delete->id_prioridad->headerCellClass() ?>"><span id="elh_interh_prioridad_id_prioridad" class="interh_prioridad_id_prioridad"><?php echo $interh_prioridad_delete->id_prioridad->caption() ?></span></th>
<?php } ?>
<?php if ($interh_prioridad_delete->nombre_prioridad->Visible) { // nombre_prioridad ?>
		<th class="<?php echo $interh_prioridad_delete->nombre_prioridad->headerCellClass() ?>"><span id="elh_interh_prioridad_nombre_prioridad" class="interh_prioridad_nombre_prioridad"><?php echo $interh_prioridad_delete->nombre_prioridad->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$interh_prioridad_delete->RecordCount = 0;
$i = 0;
while (!$interh_prioridad_delete->Recordset->EOF) {
	$interh_prioridad_delete->RecordCount++;
	$interh_prioridad_delete->RowCount++;

	// Set row properties
	$interh_prioridad->resetAttributes();
	$interh_prioridad->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$interh_prioridad_delete->loadRowValues($interh_prioridad_delete->Recordset);

	// Render row
	$interh_prioridad_delete->renderRow();
?>
	<tr <?php echo $interh_prioridad->rowAttributes() ?>>
<?php if ($interh_prioridad_delete->id_prioridad->Visible) { // id_prioridad ?>
		<td <?php echo $interh_prioridad_delete->id_prioridad->cellAttributes() ?>>
<span id="el<?php echo $interh_prioridad_delete->RowCount ?>_interh_prioridad_id_prioridad" class="interh_prioridad_id_prioridad">
<span<?php echo $interh_prioridad_delete->id_prioridad->viewAttributes() ?>><?php echo $interh_prioridad_delete->id_prioridad->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($interh_prioridad_delete->nombre_prioridad->Visible) { // nombre_prioridad ?>
		<td <?php echo $interh_prioridad_delete->nombre_prioridad->cellAttributes() ?>>
<span id="el<?php echo $interh_prioridad_delete->RowCount ?>_interh_prioridad_nombre_prioridad" class="interh_prioridad_nombre_prioridad">
<span<?php echo $interh_prioridad_delete->nombre_prioridad->viewAttributes() ?>><?php echo $interh_prioridad_delete->nombre_prioridad->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$interh_prioridad_delete->Recordset->moveNext();
}
$interh_prioridad_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $interh_prioridad_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$interh_prioridad_delete->showPageFooter();
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
$interh_prioridad_delete->terminate();
?>