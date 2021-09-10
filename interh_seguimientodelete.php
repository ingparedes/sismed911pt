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
$interh_seguimiento_delete = new interh_seguimiento_delete();

// Run the page
$interh_seguimiento_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_seguimiento_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var finterh_seguimientodelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	finterh_seguimientodelete = currentForm = new ew.Form("finterh_seguimientodelete", "delete");
	loadjs.done("finterh_seguimientodelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $interh_seguimiento_delete->showPageHeader(); ?>
<?php
$interh_seguimiento_delete->showMessage();
?>
<form name="finterh_seguimientodelete" id="finterh_seguimientodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="interh_seguimiento">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($interh_seguimiento_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($interh_seguimiento_delete->id_seguimiento->Visible) { // id_seguimiento ?>
		<th class="<?php echo $interh_seguimiento_delete->id_seguimiento->headerCellClass() ?>"><span id="elh_interh_seguimiento_id_seguimiento" class="interh_seguimiento_id_seguimiento"><?php echo $interh_seguimiento_delete->id_seguimiento->caption() ?></span></th>
<?php } ?>
<?php if ($interh_seguimiento_delete->fecha_seguimento->Visible) { // fecha_seguimento ?>
		<th class="<?php echo $interh_seguimiento_delete->fecha_seguimento->headerCellClass() ?>"><span id="elh_interh_seguimiento_fecha_seguimento" class="interh_seguimiento_fecha_seguimento"><?php echo $interh_seguimiento_delete->fecha_seguimento->caption() ?></span></th>
<?php } ?>
<?php if ($interh_seguimiento_delete->cod_casointerh->Visible) { // cod_casointerh ?>
		<th class="<?php echo $interh_seguimiento_delete->cod_casointerh->headerCellClass() ?>"><span id="elh_interh_seguimiento_cod_casointerh" class="interh_seguimiento_cod_casointerh"><?php echo $interh_seguimiento_delete->cod_casointerh->caption() ?></span></th>
<?php } ?>
<?php if ($interh_seguimiento_delete->seguimento->Visible) { // seguimento ?>
		<th class="<?php echo $interh_seguimiento_delete->seguimento->headerCellClass() ?>"><span id="elh_interh_seguimiento_seguimento" class="interh_seguimiento_seguimento"><?php echo $interh_seguimiento_delete->seguimento->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$interh_seguimiento_delete->RecordCount = 0;
$i = 0;
while (!$interh_seguimiento_delete->Recordset->EOF) {
	$interh_seguimiento_delete->RecordCount++;
	$interh_seguimiento_delete->RowCount++;

	// Set row properties
	$interh_seguimiento->resetAttributes();
	$interh_seguimiento->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$interh_seguimiento_delete->loadRowValues($interh_seguimiento_delete->Recordset);

	// Render row
	$interh_seguimiento_delete->renderRow();
?>
	<tr <?php echo $interh_seguimiento->rowAttributes() ?>>
<?php if ($interh_seguimiento_delete->id_seguimiento->Visible) { // id_seguimiento ?>
		<td <?php echo $interh_seguimiento_delete->id_seguimiento->cellAttributes() ?>>
<span id="el<?php echo $interh_seguimiento_delete->RowCount ?>_interh_seguimiento_id_seguimiento" class="interh_seguimiento_id_seguimiento">
<span<?php echo $interh_seguimiento_delete->id_seguimiento->viewAttributes() ?>><?php echo $interh_seguimiento_delete->id_seguimiento->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($interh_seguimiento_delete->fecha_seguimento->Visible) { // fecha_seguimento ?>
		<td <?php echo $interh_seguimiento_delete->fecha_seguimento->cellAttributes() ?>>
<span id="el<?php echo $interh_seguimiento_delete->RowCount ?>_interh_seguimiento_fecha_seguimento" class="interh_seguimiento_fecha_seguimento">
<span<?php echo $interh_seguimiento_delete->fecha_seguimento->viewAttributes() ?>><?php echo $interh_seguimiento_delete->fecha_seguimento->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($interh_seguimiento_delete->cod_casointerh->Visible) { // cod_casointerh ?>
		<td <?php echo $interh_seguimiento_delete->cod_casointerh->cellAttributes() ?>>
<span id="el<?php echo $interh_seguimiento_delete->RowCount ?>_interh_seguimiento_cod_casointerh" class="interh_seguimiento_cod_casointerh">
<span<?php echo $interh_seguimiento_delete->cod_casointerh->viewAttributes() ?>><?php echo $interh_seguimiento_delete->cod_casointerh->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($interh_seguimiento_delete->seguimento->Visible) { // seguimento ?>
		<td <?php echo $interh_seguimiento_delete->seguimento->cellAttributes() ?>>
<span id="el<?php echo $interh_seguimiento_delete->RowCount ?>_interh_seguimiento_seguimento" class="interh_seguimiento_seguimento">
<span<?php echo $interh_seguimiento_delete->seguimento->viewAttributes() ?>><?php echo $interh_seguimiento_delete->seguimento->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$interh_seguimiento_delete->Recordset->moveNext();
}
$interh_seguimiento_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $interh_seguimiento_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$interh_seguimiento_delete->showPageFooter();
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
$interh_seguimiento_delete->terminate();
?>