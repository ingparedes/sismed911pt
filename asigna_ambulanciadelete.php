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
$asigna_ambulancia_delete = new asigna_ambulancia_delete();

// Run the page
$asigna_ambulancia_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$asigna_ambulancia_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fasigna_ambulanciadelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fasigna_ambulanciadelete = currentForm = new ew.Form("fasigna_ambulanciadelete", "delete");
	loadjs.done("fasigna_ambulanciadelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $asigna_ambulancia_delete->showPageHeader(); ?>
<?php
$asigna_ambulancia_delete->showMessage();
?>
<form name="fasigna_ambulanciadelete" id="fasigna_ambulanciadelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="asigna_ambulancia">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($asigna_ambulancia_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($asigna_ambulancia_delete->cod_ambulancias->Visible) { // cod_ambulancias ?>
		<th class="<?php echo $asigna_ambulancia_delete->cod_ambulancias->headerCellClass() ?>"><span id="elh_asigna_ambulancia_cod_ambulancias" class="asigna_ambulancia_cod_ambulancias"><?php echo $asigna_ambulancia_delete->cod_ambulancias->caption() ?></span></th>
<?php } ?>
<?php if ($asigna_ambulancia_delete->placas->Visible) { // placas ?>
		<th class="<?php echo $asigna_ambulancia_delete->placas->headerCellClass() ?>"><span id="elh_asigna_ambulancia_placas" class="asigna_ambulancia_placas"><?php echo $asigna_ambulancia_delete->placas->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$asigna_ambulancia_delete->RecordCount = 0;
$i = 0;
while (!$asigna_ambulancia_delete->Recordset->EOF) {
	$asigna_ambulancia_delete->RecordCount++;
	$asigna_ambulancia_delete->RowCount++;

	// Set row properties
	$asigna_ambulancia->resetAttributes();
	$asigna_ambulancia->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$asigna_ambulancia_delete->loadRowValues($asigna_ambulancia_delete->Recordset);

	// Render row
	$asigna_ambulancia_delete->renderRow();
?>
	<tr <?php echo $asigna_ambulancia->rowAttributes() ?>>
<?php if ($asigna_ambulancia_delete->cod_ambulancias->Visible) { // cod_ambulancias ?>
		<td <?php echo $asigna_ambulancia_delete->cod_ambulancias->cellAttributes() ?>>
<span id="el<?php echo $asigna_ambulancia_delete->RowCount ?>_asigna_ambulancia_cod_ambulancias" class="asigna_ambulancia_cod_ambulancias">
<span<?php echo $asigna_ambulancia_delete->cod_ambulancias->viewAttributes() ?>><?php echo $asigna_ambulancia_delete->cod_ambulancias->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($asigna_ambulancia_delete->placas->Visible) { // placas ?>
		<td <?php echo $asigna_ambulancia_delete->placas->cellAttributes() ?>>
<span id="el<?php echo $asigna_ambulancia_delete->RowCount ?>_asigna_ambulancia_placas" class="asigna_ambulancia_placas">
<span<?php echo $asigna_ambulancia_delete->placas->viewAttributes() ?>><?php echo $asigna_ambulancia_delete->placas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$asigna_ambulancia_delete->Recordset->moveNext();
}
$asigna_ambulancia_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $asigna_ambulancia_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$asigna_ambulancia_delete->showPageFooter();
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
$asigna_ambulancia_delete->terminate();
?>