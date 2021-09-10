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
$procedimiento_registro_delete = new procedimiento_registro_delete();

// Run the page
$procedimiento_registro_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$procedimiento_registro_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fprocedimiento_registrodelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fprocedimiento_registrodelete = currentForm = new ew.Form("fprocedimiento_registrodelete", "delete");
	loadjs.done("fprocedimiento_registrodelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $procedimiento_registro_delete->showPageHeader(); ?>
<?php
$procedimiento_registro_delete->showMessage();
?>
<form name="fprocedimiento_registrodelete" id="fprocedimiento_registrodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="procedimiento_registro">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($procedimiento_registro_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($procedimiento_registro_delete->id->Visible) { // id ?>
		<th class="<?php echo $procedimiento_registro_delete->id->headerCellClass() ?>"><span id="elh_procedimiento_registro_id" class="procedimiento_registro_id"><?php echo $procedimiento_registro_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($procedimiento_registro_delete->cod_casopreh->Visible) { // cod_casopreh ?>
		<th class="<?php echo $procedimiento_registro_delete->cod_casopreh->headerCellClass() ?>"><span id="elh_procedimiento_registro_cod_casopreh" class="procedimiento_registro_cod_casopreh"><?php echo $procedimiento_registro_delete->cod_casopreh->caption() ?></span></th>
<?php } ?>
<?php if ($procedimiento_registro_delete->procedimiento_tipo_id->Visible) { // procedimiento_tipo_id ?>
		<th class="<?php echo $procedimiento_registro_delete->procedimiento_tipo_id->headerCellClass() ?>"><span id="elh_procedimiento_registro_procedimiento_tipo_id" class="procedimiento_registro_procedimiento_tipo_id"><?php echo $procedimiento_registro_delete->procedimiento_tipo_id->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$procedimiento_registro_delete->RecordCount = 0;
$i = 0;
while (!$procedimiento_registro_delete->Recordset->EOF) {
	$procedimiento_registro_delete->RecordCount++;
	$procedimiento_registro_delete->RowCount++;

	// Set row properties
	$procedimiento_registro->resetAttributes();
	$procedimiento_registro->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$procedimiento_registro_delete->loadRowValues($procedimiento_registro_delete->Recordset);

	// Render row
	$procedimiento_registro_delete->renderRow();
?>
	<tr <?php echo $procedimiento_registro->rowAttributes() ?>>
<?php if ($procedimiento_registro_delete->id->Visible) { // id ?>
		<td <?php echo $procedimiento_registro_delete->id->cellAttributes() ?>>
<span id="el<?php echo $procedimiento_registro_delete->RowCount ?>_procedimiento_registro_id" class="procedimiento_registro_id">
<span<?php echo $procedimiento_registro_delete->id->viewAttributes() ?>><?php echo $procedimiento_registro_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($procedimiento_registro_delete->cod_casopreh->Visible) { // cod_casopreh ?>
		<td <?php echo $procedimiento_registro_delete->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $procedimiento_registro_delete->RowCount ?>_procedimiento_registro_cod_casopreh" class="procedimiento_registro_cod_casopreh">
<span<?php echo $procedimiento_registro_delete->cod_casopreh->viewAttributes() ?>><?php echo $procedimiento_registro_delete->cod_casopreh->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($procedimiento_registro_delete->procedimiento_tipo_id->Visible) { // procedimiento_tipo_id ?>
		<td <?php echo $procedimiento_registro_delete->procedimiento_tipo_id->cellAttributes() ?>>
<span id="el<?php echo $procedimiento_registro_delete->RowCount ?>_procedimiento_registro_procedimiento_tipo_id" class="procedimiento_registro_procedimiento_tipo_id">
<span<?php echo $procedimiento_registro_delete->procedimiento_tipo_id->viewAttributes() ?>><?php echo $procedimiento_registro_delete->procedimiento_tipo_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$procedimiento_registro_delete->Recordset->moveNext();
}
$procedimiento_registro_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $procedimiento_registro_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$procedimiento_registro_delete->showPageFooter();
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
$procedimiento_registro_delete->terminate();
?>