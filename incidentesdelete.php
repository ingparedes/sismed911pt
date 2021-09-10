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
$incidentes_delete = new incidentes_delete();

// Run the page
$incidentes_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$incidentes_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fincidentesdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fincidentesdelete = currentForm = new ew.Form("fincidentesdelete", "delete");
	loadjs.done("fincidentesdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $incidentes_delete->showPageHeader(); ?>
<?php
$incidentes_delete->showMessage();
?>
<form name="fincidentesdelete" id="fincidentesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="incidentes">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($incidentes_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($incidentes_delete->id_incidente->Visible) { // id_incidente ?>
		<th class="<?php echo $incidentes_delete->id_incidente->headerCellClass() ?>"><span id="elh_incidentes_id_incidente" class="incidentes_id_incidente"><?php echo $incidentes_delete->id_incidente->caption() ?></span></th>
<?php } ?>
<?php if ($incidentes_delete->nombre_es->Visible) { // nombre_es ?>
		<th class="<?php echo $incidentes_delete->nombre_es->headerCellClass() ?>"><span id="elh_incidentes_nombre_es" class="incidentes_nombre_es"><?php echo $incidentes_delete->nombre_es->caption() ?></span></th>
<?php } ?>
<?php if ($incidentes_delete->nombre_en->Visible) { // nombre_en ?>
		<th class="<?php echo $incidentes_delete->nombre_en->headerCellClass() ?>"><span id="elh_incidentes_nombre_en" class="incidentes_nombre_en"><?php echo $incidentes_delete->nombre_en->caption() ?></span></th>
<?php } ?>
<?php if ($incidentes_delete->nombre_fr->Visible) { // nombre_fr ?>
		<th class="<?php echo $incidentes_delete->nombre_fr->headerCellClass() ?>"><span id="elh_incidentes_nombre_fr" class="incidentes_nombre_fr"><?php echo $incidentes_delete->nombre_fr->caption() ?></span></th>
<?php } ?>
<?php if ($incidentes_delete->nombre_pt->Visible) { // nombre_pt ?>
		<th class="<?php echo $incidentes_delete->nombre_pt->headerCellClass() ?>"><span id="elh_incidentes_nombre_pt" class="incidentes_nombre_pt"><?php echo $incidentes_delete->nombre_pt->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$incidentes_delete->RecordCount = 0;
$i = 0;
while (!$incidentes_delete->Recordset->EOF) {
	$incidentes_delete->RecordCount++;
	$incidentes_delete->RowCount++;

	// Set row properties
	$incidentes->resetAttributes();
	$incidentes->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$incidentes_delete->loadRowValues($incidentes_delete->Recordset);

	// Render row
	$incidentes_delete->renderRow();
?>
	<tr <?php echo $incidentes->rowAttributes() ?>>
<?php if ($incidentes_delete->id_incidente->Visible) { // id_incidente ?>
		<td <?php echo $incidentes_delete->id_incidente->cellAttributes() ?>>
<span id="el<?php echo $incidentes_delete->RowCount ?>_incidentes_id_incidente" class="incidentes_id_incidente">
<span<?php echo $incidentes_delete->id_incidente->viewAttributes() ?>><?php echo $incidentes_delete->id_incidente->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($incidentes_delete->nombre_es->Visible) { // nombre_es ?>
		<td <?php echo $incidentes_delete->nombre_es->cellAttributes() ?>>
<span id="el<?php echo $incidentes_delete->RowCount ?>_incidentes_nombre_es" class="incidentes_nombre_es">
<span<?php echo $incidentes_delete->nombre_es->viewAttributes() ?>><?php echo $incidentes_delete->nombre_es->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($incidentes_delete->nombre_en->Visible) { // nombre_en ?>
		<td <?php echo $incidentes_delete->nombre_en->cellAttributes() ?>>
<span id="el<?php echo $incidentes_delete->RowCount ?>_incidentes_nombre_en" class="incidentes_nombre_en">
<span<?php echo $incidentes_delete->nombre_en->viewAttributes() ?>><?php echo $incidentes_delete->nombre_en->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($incidentes_delete->nombre_fr->Visible) { // nombre_fr ?>
		<td <?php echo $incidentes_delete->nombre_fr->cellAttributes() ?>>
<span id="el<?php echo $incidentes_delete->RowCount ?>_incidentes_nombre_fr" class="incidentes_nombre_fr">
<span<?php echo $incidentes_delete->nombre_fr->viewAttributes() ?>><?php echo $incidentes_delete->nombre_fr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($incidentes_delete->nombre_pt->Visible) { // nombre_pt ?>
		<td <?php echo $incidentes_delete->nombre_pt->cellAttributes() ?>>
<span id="el<?php echo $incidentes_delete->RowCount ?>_incidentes_nombre_pt" class="incidentes_nombre_pt">
<span<?php echo $incidentes_delete->nombre_pt->viewAttributes() ?>><?php echo $incidentes_delete->nombre_pt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$incidentes_delete->Recordset->moveNext();
}
$incidentes_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $incidentes_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$incidentes_delete->showPageFooter();
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
$incidentes_delete->terminate();
?>