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
$distrito_reniec_delete = new distrito_reniec_delete();

// Run the page
$distrito_reniec_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$distrito_reniec_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fdistrito_reniecdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fdistrito_reniecdelete = currentForm = new ew.Form("fdistrito_reniecdelete", "delete");
	loadjs.done("fdistrito_reniecdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $distrito_reniec_delete->showPageHeader(); ?>
<?php
$distrito_reniec_delete->showMessage();
?>
<form name="fdistrito_reniecdelete" id="fdistrito_reniecdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="distrito_reniec">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($distrito_reniec_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($distrito_reniec_delete->cod_dpto->Visible) { // cod_dpto ?>
		<th class="<?php echo $distrito_reniec_delete->cod_dpto->headerCellClass() ?>"><span id="elh_distrito_reniec_cod_dpto" class="distrito_reniec_cod_dpto"><?php echo $distrito_reniec_delete->cod_dpto->caption() ?></span></th>
<?php } ?>
<?php if ($distrito_reniec_delete->cod_provincia->Visible) { // cod_provincia ?>
		<th class="<?php echo $distrito_reniec_delete->cod_provincia->headerCellClass() ?>"><span id="elh_distrito_reniec_cod_provincia" class="distrito_reniec_cod_provincia"><?php echo $distrito_reniec_delete->cod_provincia->caption() ?></span></th>
<?php } ?>
<?php if ($distrito_reniec_delete->cod_distrito->Visible) { // cod_distrito ?>
		<th class="<?php echo $distrito_reniec_delete->cod_distrito->headerCellClass() ?>"><span id="elh_distrito_reniec_cod_distrito" class="distrito_reniec_cod_distrito"><?php echo $distrito_reniec_delete->cod_distrito->caption() ?></span></th>
<?php } ?>
<?php if ($distrito_reniec_delete->nombre_distrito->Visible) { // nombre_distrito ?>
		<th class="<?php echo $distrito_reniec_delete->nombre_distrito->headerCellClass() ?>"><span id="elh_distrito_reniec_nombre_distrito" class="distrito_reniec_nombre_distrito"><?php echo $distrito_reniec_delete->nombre_distrito->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$distrito_reniec_delete->RecordCount = 0;
$i = 0;
while (!$distrito_reniec_delete->Recordset->EOF) {
	$distrito_reniec_delete->RecordCount++;
	$distrito_reniec_delete->RowCount++;

	// Set row properties
	$distrito_reniec->resetAttributes();
	$distrito_reniec->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$distrito_reniec_delete->loadRowValues($distrito_reniec_delete->Recordset);

	// Render row
	$distrito_reniec_delete->renderRow();
?>
	<tr <?php echo $distrito_reniec->rowAttributes() ?>>
<?php if ($distrito_reniec_delete->cod_dpto->Visible) { // cod_dpto ?>
		<td <?php echo $distrito_reniec_delete->cod_dpto->cellAttributes() ?>>
<span id="el<?php echo $distrito_reniec_delete->RowCount ?>_distrito_reniec_cod_dpto" class="distrito_reniec_cod_dpto">
<span<?php echo $distrito_reniec_delete->cod_dpto->viewAttributes() ?>><?php echo $distrito_reniec_delete->cod_dpto->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($distrito_reniec_delete->cod_provincia->Visible) { // cod_provincia ?>
		<td <?php echo $distrito_reniec_delete->cod_provincia->cellAttributes() ?>>
<span id="el<?php echo $distrito_reniec_delete->RowCount ?>_distrito_reniec_cod_provincia" class="distrito_reniec_cod_provincia">
<span<?php echo $distrito_reniec_delete->cod_provincia->viewAttributes() ?>><?php echo $distrito_reniec_delete->cod_provincia->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($distrito_reniec_delete->cod_distrito->Visible) { // cod_distrito ?>
		<td <?php echo $distrito_reniec_delete->cod_distrito->cellAttributes() ?>>
<span id="el<?php echo $distrito_reniec_delete->RowCount ?>_distrito_reniec_cod_distrito" class="distrito_reniec_cod_distrito">
<span<?php echo $distrito_reniec_delete->cod_distrito->viewAttributes() ?>><?php echo $distrito_reniec_delete->cod_distrito->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($distrito_reniec_delete->nombre_distrito->Visible) { // nombre_distrito ?>
		<td <?php echo $distrito_reniec_delete->nombre_distrito->cellAttributes() ?>>
<span id="el<?php echo $distrito_reniec_delete->RowCount ?>_distrito_reniec_nombre_distrito" class="distrito_reniec_nombre_distrito">
<span<?php echo $distrito_reniec_delete->nombre_distrito->viewAttributes() ?>><?php echo $distrito_reniec_delete->nombre_distrito->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$distrito_reniec_delete->Recordset->moveNext();
}
$distrito_reniec_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $distrito_reniec_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$distrito_reniec_delete->showPageFooter();
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
$distrito_reniec_delete->terminate();
?>