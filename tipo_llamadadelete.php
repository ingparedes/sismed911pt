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
$tipo_llamada_delete = new tipo_llamada_delete();

// Run the page
$tipo_llamada_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tipo_llamada_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftipo_llamadadelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ftipo_llamadadelete = currentForm = new ew.Form("ftipo_llamadadelete", "delete");
	loadjs.done("ftipo_llamadadelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $tipo_llamada_delete->showPageHeader(); ?>
<?php
$tipo_llamada_delete->showMessage();
?>
<form name="ftipo_llamadadelete" id="ftipo_llamadadelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tipo_llamada">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($tipo_llamada_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($tipo_llamada_delete->id_llamda_f->Visible) { // id_llamda_f ?>
		<th class="<?php echo $tipo_llamada_delete->id_llamda_f->headerCellClass() ?>"><span id="elh_tipo_llamada_id_llamda_f" class="tipo_llamada_id_llamda_f"><?php echo $tipo_llamada_delete->id_llamda_f->caption() ?></span></th>
<?php } ?>
<?php if ($tipo_llamada_delete->llamada_fallida->Visible) { // llamada_fallida ?>
		<th class="<?php echo $tipo_llamada_delete->llamada_fallida->headerCellClass() ?>"><span id="elh_tipo_llamada_llamada_fallida" class="tipo_llamada_llamada_fallida"><?php echo $tipo_llamada_delete->llamada_fallida->caption() ?></span></th>
<?php } ?>
<?php if ($tipo_llamada_delete->llamada_fallida_en->Visible) { // llamada_fallida_en ?>
		<th class="<?php echo $tipo_llamada_delete->llamada_fallida_en->headerCellClass() ?>"><span id="elh_tipo_llamada_llamada_fallida_en" class="tipo_llamada_llamada_fallida_en"><?php echo $tipo_llamada_delete->llamada_fallida_en->caption() ?></span></th>
<?php } ?>
<?php if ($tipo_llamada_delete->llamada_fallida_pr->Visible) { // llamada_fallida_pr ?>
		<th class="<?php echo $tipo_llamada_delete->llamada_fallida_pr->headerCellClass() ?>"><span id="elh_tipo_llamada_llamada_fallida_pr" class="tipo_llamada_llamada_fallida_pr"><?php echo $tipo_llamada_delete->llamada_fallida_pr->caption() ?></span></th>
<?php } ?>
<?php if ($tipo_llamada_delete->llamada_fallida_fr->Visible) { // llamada_fallida_fr ?>
		<th class="<?php echo $tipo_llamada_delete->llamada_fallida_fr->headerCellClass() ?>"><span id="elh_tipo_llamada_llamada_fallida_fr" class="tipo_llamada_llamada_fallida_fr"><?php echo $tipo_llamada_delete->llamada_fallida_fr->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$tipo_llamada_delete->RecordCount = 0;
$i = 0;
while (!$tipo_llamada_delete->Recordset->EOF) {
	$tipo_llamada_delete->RecordCount++;
	$tipo_llamada_delete->RowCount++;

	// Set row properties
	$tipo_llamada->resetAttributes();
	$tipo_llamada->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$tipo_llamada_delete->loadRowValues($tipo_llamada_delete->Recordset);

	// Render row
	$tipo_llamada_delete->renderRow();
?>
	<tr <?php echo $tipo_llamada->rowAttributes() ?>>
<?php if ($tipo_llamada_delete->id_llamda_f->Visible) { // id_llamda_f ?>
		<td <?php echo $tipo_llamada_delete->id_llamda_f->cellAttributes() ?>>
<span id="el<?php echo $tipo_llamada_delete->RowCount ?>_tipo_llamada_id_llamda_f" class="tipo_llamada_id_llamda_f">
<span<?php echo $tipo_llamada_delete->id_llamda_f->viewAttributes() ?>><?php echo $tipo_llamada_delete->id_llamda_f->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tipo_llamada_delete->llamada_fallida->Visible) { // llamada_fallida ?>
		<td <?php echo $tipo_llamada_delete->llamada_fallida->cellAttributes() ?>>
<span id="el<?php echo $tipo_llamada_delete->RowCount ?>_tipo_llamada_llamada_fallida" class="tipo_llamada_llamada_fallida">
<span<?php echo $tipo_llamada_delete->llamada_fallida->viewAttributes() ?>><?php echo $tipo_llamada_delete->llamada_fallida->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tipo_llamada_delete->llamada_fallida_en->Visible) { // llamada_fallida_en ?>
		<td <?php echo $tipo_llamada_delete->llamada_fallida_en->cellAttributes() ?>>
<span id="el<?php echo $tipo_llamada_delete->RowCount ?>_tipo_llamada_llamada_fallida_en" class="tipo_llamada_llamada_fallida_en">
<span<?php echo $tipo_llamada_delete->llamada_fallida_en->viewAttributes() ?>><?php echo $tipo_llamada_delete->llamada_fallida_en->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tipo_llamada_delete->llamada_fallida_pr->Visible) { // llamada_fallida_pr ?>
		<td <?php echo $tipo_llamada_delete->llamada_fallida_pr->cellAttributes() ?>>
<span id="el<?php echo $tipo_llamada_delete->RowCount ?>_tipo_llamada_llamada_fallida_pr" class="tipo_llamada_llamada_fallida_pr">
<span<?php echo $tipo_llamada_delete->llamada_fallida_pr->viewAttributes() ?>><?php echo $tipo_llamada_delete->llamada_fallida_pr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tipo_llamada_delete->llamada_fallida_fr->Visible) { // llamada_fallida_fr ?>
		<td <?php echo $tipo_llamada_delete->llamada_fallida_fr->cellAttributes() ?>>
<span id="el<?php echo $tipo_llamada_delete->RowCount ?>_tipo_llamada_llamada_fallida_fr" class="tipo_llamada_llamada_fallida_fr">
<span<?php echo $tipo_llamada_delete->llamada_fallida_fr->viewAttributes() ?>><?php echo $tipo_llamada_delete->llamada_fallida_fr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$tipo_llamada_delete->Recordset->moveNext();
}
$tipo_llamada_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tipo_llamada_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$tipo_llamada_delete->showPageFooter();
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
$tipo_llamada_delete->terminate();
?>