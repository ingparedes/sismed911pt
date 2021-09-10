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
$code_planta_delete = new code_planta_delete();

// Run the page
$code_planta_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$code_planta_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fcode_plantadelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fcode_plantadelete = currentForm = new ew.Form("fcode_plantadelete", "delete");
	loadjs.done("fcode_plantadelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $code_planta_delete->showPageHeader(); ?>
<?php
$code_planta_delete->showMessage();
?>
<form name="fcode_plantadelete" id="fcode_plantadelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="code_planta">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($code_planta_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($code_planta_delete->idacode->Visible) { // idacode ?>
		<th class="<?php echo $code_planta_delete->idacode->headerCellClass() ?>"><span id="elh_code_planta_idacode" class="code_planta_idacode"><?php echo $code_planta_delete->idacode->caption() ?></span></th>
<?php } ?>
<?php if ($code_planta_delete->nombreacode->Visible) { // nombreacode ?>
		<th class="<?php echo $code_planta_delete->nombreacode->headerCellClass() ?>"><span id="elh_code_planta_nombreacode" class="code_planta_nombreacode"><?php echo $code_planta_delete->nombreacode->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$code_planta_delete->RecordCount = 0;
$i = 0;
while (!$code_planta_delete->Recordset->EOF) {
	$code_planta_delete->RecordCount++;
	$code_planta_delete->RowCount++;

	// Set row properties
	$code_planta->resetAttributes();
	$code_planta->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$code_planta_delete->loadRowValues($code_planta_delete->Recordset);

	// Render row
	$code_planta_delete->renderRow();
?>
	<tr <?php echo $code_planta->rowAttributes() ?>>
<?php if ($code_planta_delete->idacode->Visible) { // idacode ?>
		<td <?php echo $code_planta_delete->idacode->cellAttributes() ?>>
<span id="el<?php echo $code_planta_delete->RowCount ?>_code_planta_idacode" class="code_planta_idacode">
<span<?php echo $code_planta_delete->idacode->viewAttributes() ?>><?php echo $code_planta_delete->idacode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($code_planta_delete->nombreacode->Visible) { // nombreacode ?>
		<td <?php echo $code_planta_delete->nombreacode->cellAttributes() ?>>
<span id="el<?php echo $code_planta_delete->RowCount ?>_code_planta_nombreacode" class="code_planta_nombreacode">
<span<?php echo $code_planta_delete->nombreacode->viewAttributes() ?>><?php echo $code_planta_delete->nombreacode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$code_planta_delete->Recordset->moveNext();
}
$code_planta_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $code_planta_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$code_planta_delete->showPageFooter();
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
$code_planta_delete->terminate();
?>