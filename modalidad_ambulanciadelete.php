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
$modalidad_ambulancia_delete = new modalidad_ambulancia_delete();

// Run the page
$modalidad_ambulancia_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$modalidad_ambulancia_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmodalidad_ambulanciadelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmodalidad_ambulanciadelete = currentForm = new ew.Form("fmodalidad_ambulanciadelete", "delete");
	loadjs.done("fmodalidad_ambulanciadelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $modalidad_ambulancia_delete->showPageHeader(); ?>
<?php
$modalidad_ambulancia_delete->showMessage();
?>
<form name="fmodalidad_ambulanciadelete" id="fmodalidad_ambulanciadelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="modalidad_ambulancia">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($modalidad_ambulancia_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($modalidad_ambulancia_delete->id_modalidad->Visible) { // id_modalidad ?>
		<th class="<?php echo $modalidad_ambulancia_delete->id_modalidad->headerCellClass() ?>"><span id="elh_modalidad_ambulancia_id_modalidad" class="modalidad_ambulancia_id_modalidad"><?php echo $modalidad_ambulancia_delete->id_modalidad->caption() ?></span></th>
<?php } ?>
<?php if ($modalidad_ambulancia_delete->modalidadambu_es->Visible) { // modalidadambu_es ?>
		<th class="<?php echo $modalidad_ambulancia_delete->modalidadambu_es->headerCellClass() ?>"><span id="elh_modalidad_ambulancia_modalidadambu_es" class="modalidad_ambulancia_modalidadambu_es"><?php echo $modalidad_ambulancia_delete->modalidadambu_es->caption() ?></span></th>
<?php } ?>
<?php if ($modalidad_ambulancia_delete->modalidadambu_en->Visible) { // modalidadambu_en ?>
		<th class="<?php echo $modalidad_ambulancia_delete->modalidadambu_en->headerCellClass() ?>"><span id="elh_modalidad_ambulancia_modalidadambu_en" class="modalidad_ambulancia_modalidadambu_en"><?php echo $modalidad_ambulancia_delete->modalidadambu_en->caption() ?></span></th>
<?php } ?>
<?php if ($modalidad_ambulancia_delete->modalidadambu_pr->Visible) { // modalidadambu_pr ?>
		<th class="<?php echo $modalidad_ambulancia_delete->modalidadambu_pr->headerCellClass() ?>"><span id="elh_modalidad_ambulancia_modalidadambu_pr" class="modalidad_ambulancia_modalidadambu_pr"><?php echo $modalidad_ambulancia_delete->modalidadambu_pr->caption() ?></span></th>
<?php } ?>
<?php if ($modalidad_ambulancia_delete->modalidadambu_fr->Visible) { // modalidadambu_fr ?>
		<th class="<?php echo $modalidad_ambulancia_delete->modalidadambu_fr->headerCellClass() ?>"><span id="elh_modalidad_ambulancia_modalidadambu_fr" class="modalidad_ambulancia_modalidadambu_fr"><?php echo $modalidad_ambulancia_delete->modalidadambu_fr->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$modalidad_ambulancia_delete->RecordCount = 0;
$i = 0;
while (!$modalidad_ambulancia_delete->Recordset->EOF) {
	$modalidad_ambulancia_delete->RecordCount++;
	$modalidad_ambulancia_delete->RowCount++;

	// Set row properties
	$modalidad_ambulancia->resetAttributes();
	$modalidad_ambulancia->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$modalidad_ambulancia_delete->loadRowValues($modalidad_ambulancia_delete->Recordset);

	// Render row
	$modalidad_ambulancia_delete->renderRow();
?>
	<tr <?php echo $modalidad_ambulancia->rowAttributes() ?>>
<?php if ($modalidad_ambulancia_delete->id_modalidad->Visible) { // id_modalidad ?>
		<td <?php echo $modalidad_ambulancia_delete->id_modalidad->cellAttributes() ?>>
<span id="el<?php echo $modalidad_ambulancia_delete->RowCount ?>_modalidad_ambulancia_id_modalidad" class="modalidad_ambulancia_id_modalidad">
<span<?php echo $modalidad_ambulancia_delete->id_modalidad->viewAttributes() ?>><?php echo $modalidad_ambulancia_delete->id_modalidad->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($modalidad_ambulancia_delete->modalidadambu_es->Visible) { // modalidadambu_es ?>
		<td <?php echo $modalidad_ambulancia_delete->modalidadambu_es->cellAttributes() ?>>
<span id="el<?php echo $modalidad_ambulancia_delete->RowCount ?>_modalidad_ambulancia_modalidadambu_es" class="modalidad_ambulancia_modalidadambu_es">
<span<?php echo $modalidad_ambulancia_delete->modalidadambu_es->viewAttributes() ?>><?php echo $modalidad_ambulancia_delete->modalidadambu_es->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($modalidad_ambulancia_delete->modalidadambu_en->Visible) { // modalidadambu_en ?>
		<td <?php echo $modalidad_ambulancia_delete->modalidadambu_en->cellAttributes() ?>>
<span id="el<?php echo $modalidad_ambulancia_delete->RowCount ?>_modalidad_ambulancia_modalidadambu_en" class="modalidad_ambulancia_modalidadambu_en">
<span<?php echo $modalidad_ambulancia_delete->modalidadambu_en->viewAttributes() ?>><?php echo $modalidad_ambulancia_delete->modalidadambu_en->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($modalidad_ambulancia_delete->modalidadambu_pr->Visible) { // modalidadambu_pr ?>
		<td <?php echo $modalidad_ambulancia_delete->modalidadambu_pr->cellAttributes() ?>>
<span id="el<?php echo $modalidad_ambulancia_delete->RowCount ?>_modalidad_ambulancia_modalidadambu_pr" class="modalidad_ambulancia_modalidadambu_pr">
<span<?php echo $modalidad_ambulancia_delete->modalidadambu_pr->viewAttributes() ?>><?php echo $modalidad_ambulancia_delete->modalidadambu_pr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($modalidad_ambulancia_delete->modalidadambu_fr->Visible) { // modalidadambu_fr ?>
		<td <?php echo $modalidad_ambulancia_delete->modalidadambu_fr->cellAttributes() ?>>
<span id="el<?php echo $modalidad_ambulancia_delete->RowCount ?>_modalidad_ambulancia_modalidadambu_fr" class="modalidad_ambulancia_modalidadambu_fr">
<span<?php echo $modalidad_ambulancia_delete->modalidadambu_fr->viewAttributes() ?>><?php echo $modalidad_ambulancia_delete->modalidadambu_fr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$modalidad_ambulancia_delete->Recordset->moveNext();
}
$modalidad_ambulancia_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $modalidad_ambulancia_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$modalidad_ambulancia_delete->showPageFooter();
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
$modalidad_ambulancia_delete->terminate();
?>