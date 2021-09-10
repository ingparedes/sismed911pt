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
$medicamentos_delete = new medicamentos_delete();

// Run the page
$medicamentos_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$medicamentos_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmedicamentosdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmedicamentosdelete = currentForm = new ew.Form("fmedicamentosdelete", "delete");
	loadjs.done("fmedicamentosdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $medicamentos_delete->showPageHeader(); ?>
<?php
$medicamentos_delete->showMessage();
?>
<form name="fmedicamentosdelete" id="fmedicamentosdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="medicamentos">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($medicamentos_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($medicamentos_delete->id_medicamento->Visible) { // id_medicamento ?>
		<th class="<?php echo $medicamentos_delete->id_medicamento->headerCellClass() ?>"><span id="elh_medicamentos_id_medicamento" class="medicamentos_id_medicamento"><?php echo $medicamentos_delete->id_medicamento->caption() ?></span></th>
<?php } ?>
<?php if ($medicamentos_delete->nombre_medicamento->Visible) { // nombre_medicamento ?>
		<th class="<?php echo $medicamentos_delete->nombre_medicamento->headerCellClass() ?>"><span id="elh_medicamentos_nombre_medicamento" class="medicamentos_nombre_medicamento"><?php echo $medicamentos_delete->nombre_medicamento->caption() ?></span></th>
<?php } ?>
<?php if ($medicamentos_delete->valor->Visible) { // valor ?>
		<th class="<?php echo $medicamentos_delete->valor->headerCellClass() ?>"><span id="elh_medicamentos_valor" class="medicamentos_valor"><?php echo $medicamentos_delete->valor->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$medicamentos_delete->RecordCount = 0;
$i = 0;
while (!$medicamentos_delete->Recordset->EOF) {
	$medicamentos_delete->RecordCount++;
	$medicamentos_delete->RowCount++;

	// Set row properties
	$medicamentos->resetAttributes();
	$medicamentos->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$medicamentos_delete->loadRowValues($medicamentos_delete->Recordset);

	// Render row
	$medicamentos_delete->renderRow();
?>
	<tr <?php echo $medicamentos->rowAttributes() ?>>
<?php if ($medicamentos_delete->id_medicamento->Visible) { // id_medicamento ?>
		<td <?php echo $medicamentos_delete->id_medicamento->cellAttributes() ?>>
<span id="el<?php echo $medicamentos_delete->RowCount ?>_medicamentos_id_medicamento" class="medicamentos_id_medicamento">
<span<?php echo $medicamentos_delete->id_medicamento->viewAttributes() ?>><?php echo $medicamentos_delete->id_medicamento->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($medicamentos_delete->nombre_medicamento->Visible) { // nombre_medicamento ?>
		<td <?php echo $medicamentos_delete->nombre_medicamento->cellAttributes() ?>>
<span id="el<?php echo $medicamentos_delete->RowCount ?>_medicamentos_nombre_medicamento" class="medicamentos_nombre_medicamento">
<span<?php echo $medicamentos_delete->nombre_medicamento->viewAttributes() ?>><?php echo $medicamentos_delete->nombre_medicamento->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($medicamentos_delete->valor->Visible) { // valor ?>
		<td <?php echo $medicamentos_delete->valor->cellAttributes() ?>>
<span id="el<?php echo $medicamentos_delete->RowCount ?>_medicamentos_valor" class="medicamentos_valor">
<span<?php echo $medicamentos_delete->valor->viewAttributes() ?>><?php echo $medicamentos_delete->valor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$medicamentos_delete->Recordset->moveNext();
}
$medicamentos_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $medicamentos_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$medicamentos_delete->showPageFooter();
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
$medicamentos_delete->terminate();
?>