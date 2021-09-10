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
$mante_amb_delete = new mante_amb_delete();

// Run the page
$mante_amb_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mante_amb_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmante_ambdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmante_ambdelete = currentForm = new ew.Form("fmante_ambdelete", "delete");
	loadjs.done("fmante_ambdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mante_amb_delete->showPageHeader(); ?>
<?php
$mante_amb_delete->showMessage();
?>
<form name="fmante_ambdelete" id="fmante_ambdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mante_amb">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mante_amb_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mante_amb_delete->id->Visible) { // id ?>
		<th class="<?php echo $mante_amb_delete->id->headerCellClass() ?>"><span id="elh_mante_amb_id" class="mante_amb_id"><?php echo $mante_amb_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($mante_amb_delete->id_ambulancias->Visible) { // id_ambulancias ?>
		<th class="<?php echo $mante_amb_delete->id_ambulancias->headerCellClass() ?>"><span id="elh_mante_amb_id_ambulancias" class="mante_amb_id_ambulancias"><?php echo $mante_amb_delete->id_ambulancias->caption() ?></span></th>
<?php } ?>
<?php if ($mante_amb_delete->fecha_inicio->Visible) { // fecha_inicio ?>
		<th class="<?php echo $mante_amb_delete->fecha_inicio->headerCellClass() ?>"><span id="elh_mante_amb_fecha_inicio" class="mante_amb_fecha_inicio"><?php echo $mante_amb_delete->fecha_inicio->caption() ?></span></th>
<?php } ?>
<?php if ($mante_amb_delete->fecha_fin->Visible) { // fecha_fin ?>
		<th class="<?php echo $mante_amb_delete->fecha_fin->headerCellClass() ?>"><span id="elh_mante_amb_fecha_fin" class="mante_amb_fecha_fin"><?php echo $mante_amb_delete->fecha_fin->caption() ?></span></th>
<?php } ?>
<?php if ($mante_amb_delete->taller->Visible) { // taller ?>
		<th class="<?php echo $mante_amb_delete->taller->headerCellClass() ?>"><span id="elh_mante_amb_taller" class="mante_amb_taller"><?php echo $mante_amb_delete->taller->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mante_amb_delete->RecordCount = 0;
$i = 0;
while (!$mante_amb_delete->Recordset->EOF) {
	$mante_amb_delete->RecordCount++;
	$mante_amb_delete->RowCount++;

	// Set row properties
	$mante_amb->resetAttributes();
	$mante_amb->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mante_amb_delete->loadRowValues($mante_amb_delete->Recordset);

	// Render row
	$mante_amb_delete->renderRow();
?>
	<tr <?php echo $mante_amb->rowAttributes() ?>>
<?php if ($mante_amb_delete->id->Visible) { // id ?>
		<td <?php echo $mante_amb_delete->id->cellAttributes() ?>>
<span id="el<?php echo $mante_amb_delete->RowCount ?>_mante_amb_id" class="mante_amb_id">
<span<?php echo $mante_amb_delete->id->viewAttributes() ?>><?php echo $mante_amb_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mante_amb_delete->id_ambulancias->Visible) { // id_ambulancias ?>
		<td <?php echo $mante_amb_delete->id_ambulancias->cellAttributes() ?>>
<span id="el<?php echo $mante_amb_delete->RowCount ?>_mante_amb_id_ambulancias" class="mante_amb_id_ambulancias">
<span<?php echo $mante_amb_delete->id_ambulancias->viewAttributes() ?>><?php echo $mante_amb_delete->id_ambulancias->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mante_amb_delete->fecha_inicio->Visible) { // fecha_inicio ?>
		<td <?php echo $mante_amb_delete->fecha_inicio->cellAttributes() ?>>
<span id="el<?php echo $mante_amb_delete->RowCount ?>_mante_amb_fecha_inicio" class="mante_amb_fecha_inicio">
<span<?php echo $mante_amb_delete->fecha_inicio->viewAttributes() ?>><?php echo $mante_amb_delete->fecha_inicio->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mante_amb_delete->fecha_fin->Visible) { // fecha_fin ?>
		<td <?php echo $mante_amb_delete->fecha_fin->cellAttributes() ?>>
<span id="el<?php echo $mante_amb_delete->RowCount ?>_mante_amb_fecha_fin" class="mante_amb_fecha_fin">
<span<?php echo $mante_amb_delete->fecha_fin->viewAttributes() ?>><?php echo $mante_amb_delete->fecha_fin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mante_amb_delete->taller->Visible) { // taller ?>
		<td <?php echo $mante_amb_delete->taller->cellAttributes() ?>>
<span id="el<?php echo $mante_amb_delete->RowCount ?>_mante_amb_taller" class="mante_amb_taller">
<span<?php echo $mante_amb_delete->taller->viewAttributes() ?>><?php echo $mante_amb_delete->taller->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$mante_amb_delete->Recordset->moveNext();
}
$mante_amb_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mante_amb_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$mante_amb_delete->showPageFooter();
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
$mante_amb_delete->terminate();
?>