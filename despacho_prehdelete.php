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
$despacho_preh_delete = new despacho_preh_delete();

// Run the page
$despacho_preh_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$despacho_preh_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fdespacho_prehdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fdespacho_prehdelete = currentForm = new ew.Form("fdespacho_prehdelete", "delete");
	loadjs.done("fdespacho_prehdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $despacho_preh_delete->showPageHeader(); ?>
<?php
$despacho_preh_delete->showMessage();
?>
<form name="fdespacho_prehdelete" id="fdespacho_prehdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="despacho_preh">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($despacho_preh_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($despacho_preh_delete->id_despacho->Visible) { // id_despacho ?>
		<th class="<?php echo $despacho_preh_delete->id_despacho->headerCellClass() ?>"><span id="elh_despacho_preh_id_despacho" class="despacho_preh_id_despacho"><?php echo $despacho_preh_delete->id_despacho->caption() ?></span></th>
<?php } ?>
<?php if ($despacho_preh_delete->fechahoradespacho->Visible) { // fechahoradespacho ?>
		<th class="<?php echo $despacho_preh_delete->fechahoradespacho->headerCellClass() ?>"><span id="elh_despacho_preh_fechahoradespacho" class="despacho_preh_fechahoradespacho"><?php echo $despacho_preh_delete->fechahoradespacho->caption() ?></span></th>
<?php } ?>
<?php if ($despacho_preh_delete->cod_caso->Visible) { // cod_caso ?>
		<th class="<?php echo $despacho_preh_delete->cod_caso->headerCellClass() ?>"><span id="elh_despacho_preh_cod_caso" class="despacho_preh_cod_caso"><?php echo $despacho_preh_delete->cod_caso->caption() ?></span></th>
<?php } ?>
<?php if ($despacho_preh_delete->sede->Visible) { // sede ?>
		<th class="<?php echo $despacho_preh_delete->sede->headerCellClass() ?>"><span id="elh_despacho_preh_sede" class="despacho_preh_sede"><?php echo $despacho_preh_delete->sede->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$despacho_preh_delete->RecordCount = 0;
$i = 0;
while (!$despacho_preh_delete->Recordset->EOF) {
	$despacho_preh_delete->RecordCount++;
	$despacho_preh_delete->RowCount++;

	// Set row properties
	$despacho_preh->resetAttributes();
	$despacho_preh->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$despacho_preh_delete->loadRowValues($despacho_preh_delete->Recordset);

	// Render row
	$despacho_preh_delete->renderRow();
?>
	<tr <?php echo $despacho_preh->rowAttributes() ?>>
<?php if ($despacho_preh_delete->id_despacho->Visible) { // id_despacho ?>
		<td <?php echo $despacho_preh_delete->id_despacho->cellAttributes() ?>>
<span id="el<?php echo $despacho_preh_delete->RowCount ?>_despacho_preh_id_despacho" class="despacho_preh_id_despacho">
<span<?php echo $despacho_preh_delete->id_despacho->viewAttributes() ?>><?php echo $despacho_preh_delete->id_despacho->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($despacho_preh_delete->fechahoradespacho->Visible) { // fechahoradespacho ?>
		<td <?php echo $despacho_preh_delete->fechahoradespacho->cellAttributes() ?>>
<span id="el<?php echo $despacho_preh_delete->RowCount ?>_despacho_preh_fechahoradespacho" class="despacho_preh_fechahoradespacho">
<span<?php echo $despacho_preh_delete->fechahoradespacho->viewAttributes() ?>><?php echo $despacho_preh_delete->fechahoradespacho->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($despacho_preh_delete->cod_caso->Visible) { // cod_caso ?>
		<td <?php echo $despacho_preh_delete->cod_caso->cellAttributes() ?>>
<span id="el<?php echo $despacho_preh_delete->RowCount ?>_despacho_preh_cod_caso" class="despacho_preh_cod_caso">
<span<?php echo $despacho_preh_delete->cod_caso->viewAttributes() ?>><?php echo $despacho_preh_delete->cod_caso->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($despacho_preh_delete->sede->Visible) { // sede ?>
		<td <?php echo $despacho_preh_delete->sede->cellAttributes() ?>>
<span id="el<?php echo $despacho_preh_delete->RowCount ?>_despacho_preh_sede" class="despacho_preh_sede">
<span<?php echo $despacho_preh_delete->sede->viewAttributes() ?>><?php echo $despacho_preh_delete->sede->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$despacho_preh_delete->Recordset->moveNext();
}
$despacho_preh_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $despacho_preh_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$despacho_preh_delete->showPageFooter();
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
$despacho_preh_delete->terminate();
?>