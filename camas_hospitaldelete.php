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
$camas_hospital_delete = new camas_hospital_delete();

// Run the page
$camas_hospital_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$camas_hospital_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fcamas_hospitaldelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fcamas_hospitaldelete = currentForm = new ew.Form("fcamas_hospitaldelete", "delete");
	loadjs.done("fcamas_hospitaldelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $camas_hospital_delete->showPageHeader(); ?>
<?php
$camas_hospital_delete->showMessage();
?>
<form name="fcamas_hospitaldelete" id="fcamas_hospitaldelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="camas_hospital">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($camas_hospital_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($camas_hospital_delete->id_hospital->Visible) { // id_hospital ?>
		<th class="<?php echo $camas_hospital_delete->id_hospital->headerCellClass() ?>"><span id="elh_camas_hospital_id_hospital" class="camas_hospital_id_hospital"><?php echo $camas_hospital_delete->id_hospital->caption() ?></span></th>
<?php } ?>
<?php if ($camas_hospital_delete->c_hospitalaria->Visible) { // c_hospitalaria ?>
		<th class="<?php echo $camas_hospital_delete->c_hospitalaria->headerCellClass() ?>"><span id="elh_camas_hospital_c_hospitalaria" class="camas_hospital_c_hospitalaria"><?php echo $camas_hospital_delete->c_hospitalaria->caption() ?></span></th>
<?php } ?>
<?php if ($camas_hospital_delete->c_uci->Visible) { // c_uci ?>
		<th class="<?php echo $camas_hospital_delete->c_uci->headerCellClass() ?>"><span id="elh_camas_hospital_c_uci" class="camas_hospital_c_uci"><?php echo $camas_hospital_delete->c_uci->caption() ?></span></th>
<?php } ?>
<?php if ($camas_hospital_delete->c_especial->Visible) { // c_especial ?>
		<th class="<?php echo $camas_hospital_delete->c_especial->headerCellClass() ?>"><span id="elh_camas_hospital_c_especial" class="camas_hospital_c_especial"><?php echo $camas_hospital_delete->c_especial->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$camas_hospital_delete->RecordCount = 0;
$i = 0;
while (!$camas_hospital_delete->Recordset->EOF) {
	$camas_hospital_delete->RecordCount++;
	$camas_hospital_delete->RowCount++;

	// Set row properties
	$camas_hospital->resetAttributes();
	$camas_hospital->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$camas_hospital_delete->loadRowValues($camas_hospital_delete->Recordset);

	// Render row
	$camas_hospital_delete->renderRow();
?>
	<tr <?php echo $camas_hospital->rowAttributes() ?>>
<?php if ($camas_hospital_delete->id_hospital->Visible) { // id_hospital ?>
		<td <?php echo $camas_hospital_delete->id_hospital->cellAttributes() ?>>
<span id="el<?php echo $camas_hospital_delete->RowCount ?>_camas_hospital_id_hospital" class="camas_hospital_id_hospital">
<span<?php echo $camas_hospital_delete->id_hospital->viewAttributes() ?>><?php echo $camas_hospital_delete->id_hospital->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($camas_hospital_delete->c_hospitalaria->Visible) { // c_hospitalaria ?>
		<td <?php echo $camas_hospital_delete->c_hospitalaria->cellAttributes() ?>>
<span id="el<?php echo $camas_hospital_delete->RowCount ?>_camas_hospital_c_hospitalaria" class="camas_hospital_c_hospitalaria">
<span<?php echo $camas_hospital_delete->c_hospitalaria->viewAttributes() ?>><?php echo $camas_hospital_delete->c_hospitalaria->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($camas_hospital_delete->c_uci->Visible) { // c_uci ?>
		<td <?php echo $camas_hospital_delete->c_uci->cellAttributes() ?>>
<span id="el<?php echo $camas_hospital_delete->RowCount ?>_camas_hospital_c_uci" class="camas_hospital_c_uci">
<span<?php echo $camas_hospital_delete->c_uci->viewAttributes() ?>><?php echo $camas_hospital_delete->c_uci->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($camas_hospital_delete->c_especial->Visible) { // c_especial ?>
		<td <?php echo $camas_hospital_delete->c_especial->cellAttributes() ?>>
<span id="el<?php echo $camas_hospital_delete->RowCount ?>_camas_hospital_c_especial" class="camas_hospital_c_especial">
<span<?php echo $camas_hospital_delete->c_especial->viewAttributes() ?>><?php echo $camas_hospital_delete->c_especial->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$camas_hospital_delete->Recordset->moveNext();
}
$camas_hospital_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $camas_hospital_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$camas_hospital_delete->showPageFooter();
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
$camas_hospital_delete->terminate();
?>