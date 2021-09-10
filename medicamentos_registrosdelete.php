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
$medicamentos_registros_delete = new medicamentos_registros_delete();

// Run the page
$medicamentos_registros_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$medicamentos_registros_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmedicamentos_registrosdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmedicamentos_registrosdelete = currentForm = new ew.Form("fmedicamentos_registrosdelete", "delete");
	loadjs.done("fmedicamentos_registrosdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $medicamentos_registros_delete->showPageHeader(); ?>
<?php
$medicamentos_registros_delete->showMessage();
?>
<form name="fmedicamentos_registrosdelete" id="fmedicamentos_registrosdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="medicamentos_registros">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($medicamentos_registros_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($medicamentos_registros_delete->id->Visible) { // id ?>
		<th class="<?php echo $medicamentos_registros_delete->id->headerCellClass() ?>"><span id="elh_medicamentos_registros_id" class="medicamentos_registros_id"><?php echo $medicamentos_registros_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($medicamentos_registros_delete->cod_casopreh->Visible) { // cod_casopreh ?>
		<th class="<?php echo $medicamentos_registros_delete->cod_casopreh->headerCellClass() ?>"><span id="elh_medicamentos_registros_cod_casopreh" class="medicamentos_registros_cod_casopreh"><?php echo $medicamentos_registros_delete->cod_casopreh->caption() ?></span></th>
<?php } ?>
<?php if ($medicamentos_registros_delete->medicamentos_id->Visible) { // medicamentos_id ?>
		<th class="<?php echo $medicamentos_registros_delete->medicamentos_id->headerCellClass() ?>"><span id="elh_medicamentos_registros_medicamentos_id" class="medicamentos_registros_medicamentos_id"><?php echo $medicamentos_registros_delete->medicamentos_id->caption() ?></span></th>
<?php } ?>
<?php if ($medicamentos_registros_delete->cantidad->Visible) { // cantidad ?>
		<th class="<?php echo $medicamentos_registros_delete->cantidad->headerCellClass() ?>"><span id="elh_medicamentos_registros_cantidad" class="medicamentos_registros_cantidad"><?php echo $medicamentos_registros_delete->cantidad->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$medicamentos_registros_delete->RecordCount = 0;
$i = 0;
while (!$medicamentos_registros_delete->Recordset->EOF) {
	$medicamentos_registros_delete->RecordCount++;
	$medicamentos_registros_delete->RowCount++;

	// Set row properties
	$medicamentos_registros->resetAttributes();
	$medicamentos_registros->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$medicamentos_registros_delete->loadRowValues($medicamentos_registros_delete->Recordset);

	// Render row
	$medicamentos_registros_delete->renderRow();
?>
	<tr <?php echo $medicamentos_registros->rowAttributes() ?>>
<?php if ($medicamentos_registros_delete->id->Visible) { // id ?>
		<td <?php echo $medicamentos_registros_delete->id->cellAttributes() ?>>
<span id="el<?php echo $medicamentos_registros_delete->RowCount ?>_medicamentos_registros_id" class="medicamentos_registros_id">
<span<?php echo $medicamentos_registros_delete->id->viewAttributes() ?>><?php echo $medicamentos_registros_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($medicamentos_registros_delete->cod_casopreh->Visible) { // cod_casopreh ?>
		<td <?php echo $medicamentos_registros_delete->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $medicamentos_registros_delete->RowCount ?>_medicamentos_registros_cod_casopreh" class="medicamentos_registros_cod_casopreh">
<span<?php echo $medicamentos_registros_delete->cod_casopreh->viewAttributes() ?>><?php echo $medicamentos_registros_delete->cod_casopreh->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($medicamentos_registros_delete->medicamentos_id->Visible) { // medicamentos_id ?>
		<td <?php echo $medicamentos_registros_delete->medicamentos_id->cellAttributes() ?>>
<span id="el<?php echo $medicamentos_registros_delete->RowCount ?>_medicamentos_registros_medicamentos_id" class="medicamentos_registros_medicamentos_id">
<span<?php echo $medicamentos_registros_delete->medicamentos_id->viewAttributes() ?>><?php echo $medicamentos_registros_delete->medicamentos_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($medicamentos_registros_delete->cantidad->Visible) { // cantidad ?>
		<td <?php echo $medicamentos_registros_delete->cantidad->cellAttributes() ?>>
<span id="el<?php echo $medicamentos_registros_delete->RowCount ?>_medicamentos_registros_cantidad" class="medicamentos_registros_cantidad">
<span<?php echo $medicamentos_registros_delete->cantidad->viewAttributes() ?>><?php echo $medicamentos_registros_delete->cantidad->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$medicamentos_registros_delete->Recordset->moveNext();
}
$medicamentos_registros_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $medicamentos_registros_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$medicamentos_registros_delete->showPageFooter();
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
$medicamentos_registros_delete->terminate();
?>