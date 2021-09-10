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
$camas_uci_delete = new camas_uci_delete();

// Run the page
$camas_uci_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$camas_uci_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fcamas_ucidelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fcamas_ucidelete = currentForm = new ew.Form("fcamas_ucidelete", "delete");
	loadjs.done("fcamas_ucidelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $camas_uci_delete->showPageHeader(); ?>
<?php
$camas_uci_delete->showMessage();
?>
<form name="fcamas_ucidelete" id="fcamas_ucidelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="camas_uci">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($camas_uci_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($camas_uci_delete->id->Visible) { // id ?>
		<th class="<?php echo $camas_uci_delete->id->headerCellClass() ?>"><span id="elh_camas_uci_id" class="camas_uci_id"><?php echo $camas_uci_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($camas_uci_delete->ocupadas->Visible) { // ocupadas ?>
		<th class="<?php echo $camas_uci_delete->ocupadas->headerCellClass() ?>"><span id="elh_camas_uci_ocupadas" class="camas_uci_ocupadas"><?php echo $camas_uci_delete->ocupadas->caption() ?></span></th>
<?php } ?>
<?php if ($camas_uci_delete->sin_servicio->Visible) { // sin_servicio ?>
		<th class="<?php echo $camas_uci_delete->sin_servicio->headerCellClass() ?>"><span id="elh_camas_uci_sin_servicio" class="camas_uci_sin_servicio"><?php echo $camas_uci_delete->sin_servicio->caption() ?></span></th>
<?php } ?>
<?php if ($camas_uci_delete->libres->Visible) { // libres ?>
		<th class="<?php echo $camas_uci_delete->libres->headerCellClass() ?>"><span id="elh_camas_uci_libres" class="camas_uci_libres"><?php echo $camas_uci_delete->libres->caption() ?></span></th>
<?php } ?>
<?php if ($camas_uci_delete->id_camas->Visible) { // id_camas ?>
		<th class="<?php echo $camas_uci_delete->id_camas->headerCellClass() ?>"><span id="elh_camas_uci_id_camas" class="camas_uci_id_camas"><?php echo $camas_uci_delete->id_camas->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$camas_uci_delete->RecordCount = 0;
$i = 0;
while (!$camas_uci_delete->Recordset->EOF) {
	$camas_uci_delete->RecordCount++;
	$camas_uci_delete->RowCount++;

	// Set row properties
	$camas_uci->resetAttributes();
	$camas_uci->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$camas_uci_delete->loadRowValues($camas_uci_delete->Recordset);

	// Render row
	$camas_uci_delete->renderRow();
?>
	<tr <?php echo $camas_uci->rowAttributes() ?>>
<?php if ($camas_uci_delete->id->Visible) { // id ?>
		<td <?php echo $camas_uci_delete->id->cellAttributes() ?>>
<span id="el<?php echo $camas_uci_delete->RowCount ?>_camas_uci_id" class="camas_uci_id">
<span<?php echo $camas_uci_delete->id->viewAttributes() ?>><?php echo $camas_uci_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($camas_uci_delete->ocupadas->Visible) { // ocupadas ?>
		<td <?php echo $camas_uci_delete->ocupadas->cellAttributes() ?>>
<span id="el<?php echo $camas_uci_delete->RowCount ?>_camas_uci_ocupadas" class="camas_uci_ocupadas">
<span<?php echo $camas_uci_delete->ocupadas->viewAttributes() ?>><?php echo $camas_uci_delete->ocupadas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($camas_uci_delete->sin_servicio->Visible) { // sin_servicio ?>
		<td <?php echo $camas_uci_delete->sin_servicio->cellAttributes() ?>>
<span id="el<?php echo $camas_uci_delete->RowCount ?>_camas_uci_sin_servicio" class="camas_uci_sin_servicio">
<span<?php echo $camas_uci_delete->sin_servicio->viewAttributes() ?>><?php echo $camas_uci_delete->sin_servicio->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($camas_uci_delete->libres->Visible) { // libres ?>
		<td <?php echo $camas_uci_delete->libres->cellAttributes() ?>>
<span id="el<?php echo $camas_uci_delete->RowCount ?>_camas_uci_libres" class="camas_uci_libres">
<span<?php echo $camas_uci_delete->libres->viewAttributes() ?>><?php echo $camas_uci_delete->libres->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($camas_uci_delete->id_camas->Visible) { // id_camas ?>
		<td <?php echo $camas_uci_delete->id_camas->cellAttributes() ?>>
<span id="el<?php echo $camas_uci_delete->RowCount ?>_camas_uci_id_camas" class="camas_uci_id_camas">
<span<?php echo $camas_uci_delete->id_camas->viewAttributes() ?>><?php echo $camas_uci_delete->id_camas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$camas_uci_delete->Recordset->moveNext();
}
$camas_uci_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $camas_uci_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$camas_uci_delete->showPageFooter();
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
$camas_uci_delete->terminate();
?>