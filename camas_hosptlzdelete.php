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
$camas_hosptlz_delete = new camas_hosptlz_delete();

// Run the page
$camas_hosptlz_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$camas_hosptlz_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fcamas_hosptlzdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fcamas_hosptlzdelete = currentForm = new ew.Form("fcamas_hosptlzdelete", "delete");
	loadjs.done("fcamas_hosptlzdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $camas_hosptlz_delete->showPageHeader(); ?>
<?php
$camas_hosptlz_delete->showMessage();
?>
<form name="fcamas_hosptlzdelete" id="fcamas_hosptlzdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="camas_hosptlz">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($camas_hosptlz_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($camas_hosptlz_delete->id->Visible) { // id ?>
		<th class="<?php echo $camas_hosptlz_delete->id->headerCellClass() ?>"><span id="elh_camas_hosptlz_id" class="camas_hosptlz_id"><?php echo $camas_hosptlz_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($camas_hosptlz_delete->ocupadas->Visible) { // ocupadas ?>
		<th class="<?php echo $camas_hosptlz_delete->ocupadas->headerCellClass() ?>"><span id="elh_camas_hosptlz_ocupadas" class="camas_hosptlz_ocupadas"><?php echo $camas_hosptlz_delete->ocupadas->caption() ?></span></th>
<?php } ?>
<?php if ($camas_hosptlz_delete->sin_servicio->Visible) { // sin_servicio ?>
		<th class="<?php echo $camas_hosptlz_delete->sin_servicio->headerCellClass() ?>"><span id="elh_camas_hosptlz_sin_servicio" class="camas_hosptlz_sin_servicio"><?php echo $camas_hosptlz_delete->sin_servicio->caption() ?></span></th>
<?php } ?>
<?php if ($camas_hosptlz_delete->libres->Visible) { // libres ?>
		<th class="<?php echo $camas_hosptlz_delete->libres->headerCellClass() ?>"><span id="elh_camas_hosptlz_libres" class="camas_hosptlz_libres"><?php echo $camas_hosptlz_delete->libres->caption() ?></span></th>
<?php } ?>
<?php if ($camas_hosptlz_delete->id_camas->Visible) { // id_camas ?>
		<th class="<?php echo $camas_hosptlz_delete->id_camas->headerCellClass() ?>"><span id="elh_camas_hosptlz_id_camas" class="camas_hosptlz_id_camas"><?php echo $camas_hosptlz_delete->id_camas->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$camas_hosptlz_delete->RecordCount = 0;
$i = 0;
while (!$camas_hosptlz_delete->Recordset->EOF) {
	$camas_hosptlz_delete->RecordCount++;
	$camas_hosptlz_delete->RowCount++;

	// Set row properties
	$camas_hosptlz->resetAttributes();
	$camas_hosptlz->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$camas_hosptlz_delete->loadRowValues($camas_hosptlz_delete->Recordset);

	// Render row
	$camas_hosptlz_delete->renderRow();
?>
	<tr <?php echo $camas_hosptlz->rowAttributes() ?>>
<?php if ($camas_hosptlz_delete->id->Visible) { // id ?>
		<td <?php echo $camas_hosptlz_delete->id->cellAttributes() ?>>
<span id="el<?php echo $camas_hosptlz_delete->RowCount ?>_camas_hosptlz_id" class="camas_hosptlz_id">
<span<?php echo $camas_hosptlz_delete->id->viewAttributes() ?>><?php echo $camas_hosptlz_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($camas_hosptlz_delete->ocupadas->Visible) { // ocupadas ?>
		<td <?php echo $camas_hosptlz_delete->ocupadas->cellAttributes() ?>>
<span id="el<?php echo $camas_hosptlz_delete->RowCount ?>_camas_hosptlz_ocupadas" class="camas_hosptlz_ocupadas">
<span<?php echo $camas_hosptlz_delete->ocupadas->viewAttributes() ?>><?php echo $camas_hosptlz_delete->ocupadas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($camas_hosptlz_delete->sin_servicio->Visible) { // sin_servicio ?>
		<td <?php echo $camas_hosptlz_delete->sin_servicio->cellAttributes() ?>>
<span id="el<?php echo $camas_hosptlz_delete->RowCount ?>_camas_hosptlz_sin_servicio" class="camas_hosptlz_sin_servicio">
<span<?php echo $camas_hosptlz_delete->sin_servicio->viewAttributes() ?>><?php echo $camas_hosptlz_delete->sin_servicio->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($camas_hosptlz_delete->libres->Visible) { // libres ?>
		<td <?php echo $camas_hosptlz_delete->libres->cellAttributes() ?>>
<span id="el<?php echo $camas_hosptlz_delete->RowCount ?>_camas_hosptlz_libres" class="camas_hosptlz_libres">
<span<?php echo $camas_hosptlz_delete->libres->viewAttributes() ?>><?php echo $camas_hosptlz_delete->libres->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($camas_hosptlz_delete->id_camas->Visible) { // id_camas ?>
		<td <?php echo $camas_hosptlz_delete->id_camas->cellAttributes() ?>>
<span id="el<?php echo $camas_hosptlz_delete->RowCount ?>_camas_hosptlz_id_camas" class="camas_hosptlz_id_camas">
<span<?php echo $camas_hosptlz_delete->id_camas->viewAttributes() ?>><?php echo $camas_hosptlz_delete->id_camas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$camas_hosptlz_delete->Recordset->moveNext();
}
$camas_hosptlz_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $camas_hosptlz_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$camas_hosptlz_delete->showPageFooter();
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
$camas_hosptlz_delete->terminate();
?>