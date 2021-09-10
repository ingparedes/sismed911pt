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
$tipo_ambulancia_delete = new tipo_ambulancia_delete();

// Run the page
$tipo_ambulancia_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tipo_ambulancia_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftipo_ambulanciadelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ftipo_ambulanciadelete = currentForm = new ew.Form("ftipo_ambulanciadelete", "delete");
	loadjs.done("ftipo_ambulanciadelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $tipo_ambulancia_delete->showPageHeader(); ?>
<?php
$tipo_ambulancia_delete->showMessage();
?>
<form name="ftipo_ambulanciadelete" id="ftipo_ambulanciadelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tipo_ambulancia">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($tipo_ambulancia_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($tipo_ambulancia_delete->id_tipotransport->Visible) { // id_tipotransport ?>
		<th class="<?php echo $tipo_ambulancia_delete->id_tipotransport->headerCellClass() ?>"><span id="elh_tipo_ambulancia_id_tipotransport" class="tipo_ambulancia_id_tipotransport"><?php echo $tipo_ambulancia_delete->id_tipotransport->caption() ?></span></th>
<?php } ?>
<?php if ($tipo_ambulancia_delete->tipo_amb_es->Visible) { // tipo_amb_es ?>
		<th class="<?php echo $tipo_ambulancia_delete->tipo_amb_es->headerCellClass() ?>"><span id="elh_tipo_ambulancia_tipo_amb_es" class="tipo_ambulancia_tipo_amb_es"><?php echo $tipo_ambulancia_delete->tipo_amb_es->caption() ?></span></th>
<?php } ?>
<?php if ($tipo_ambulancia_delete->tipo_amb_en->Visible) { // tipo_amb_en ?>
		<th class="<?php echo $tipo_ambulancia_delete->tipo_amb_en->headerCellClass() ?>"><span id="elh_tipo_ambulancia_tipo_amb_en" class="tipo_ambulancia_tipo_amb_en"><?php echo $tipo_ambulancia_delete->tipo_amb_en->caption() ?></span></th>
<?php } ?>
<?php if ($tipo_ambulancia_delete->tipo_amb_pr->Visible) { // tipo_amb_pr ?>
		<th class="<?php echo $tipo_ambulancia_delete->tipo_amb_pr->headerCellClass() ?>"><span id="elh_tipo_ambulancia_tipo_amb_pr" class="tipo_ambulancia_tipo_amb_pr"><?php echo $tipo_ambulancia_delete->tipo_amb_pr->caption() ?></span></th>
<?php } ?>
<?php if ($tipo_ambulancia_delete->tipo_amb_fr->Visible) { // tipo_amb_fr ?>
		<th class="<?php echo $tipo_ambulancia_delete->tipo_amb_fr->headerCellClass() ?>"><span id="elh_tipo_ambulancia_tipo_amb_fr" class="tipo_ambulancia_tipo_amb_fr"><?php echo $tipo_ambulancia_delete->tipo_amb_fr->caption() ?></span></th>
<?php } ?>
<?php if ($tipo_ambulancia_delete->codigo->Visible) { // codigo ?>
		<th class="<?php echo $tipo_ambulancia_delete->codigo->headerCellClass() ?>"><span id="elh_tipo_ambulancia_codigo" class="tipo_ambulancia_codigo"><?php echo $tipo_ambulancia_delete->codigo->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$tipo_ambulancia_delete->RecordCount = 0;
$i = 0;
while (!$tipo_ambulancia_delete->Recordset->EOF) {
	$tipo_ambulancia_delete->RecordCount++;
	$tipo_ambulancia_delete->RowCount++;

	// Set row properties
	$tipo_ambulancia->resetAttributes();
	$tipo_ambulancia->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$tipo_ambulancia_delete->loadRowValues($tipo_ambulancia_delete->Recordset);

	// Render row
	$tipo_ambulancia_delete->renderRow();
?>
	<tr <?php echo $tipo_ambulancia->rowAttributes() ?>>
<?php if ($tipo_ambulancia_delete->id_tipotransport->Visible) { // id_tipotransport ?>
		<td <?php echo $tipo_ambulancia_delete->id_tipotransport->cellAttributes() ?>>
<span id="el<?php echo $tipo_ambulancia_delete->RowCount ?>_tipo_ambulancia_id_tipotransport" class="tipo_ambulancia_id_tipotransport">
<span<?php echo $tipo_ambulancia_delete->id_tipotransport->viewAttributes() ?>><?php echo $tipo_ambulancia_delete->id_tipotransport->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tipo_ambulancia_delete->tipo_amb_es->Visible) { // tipo_amb_es ?>
		<td <?php echo $tipo_ambulancia_delete->tipo_amb_es->cellAttributes() ?>>
<span id="el<?php echo $tipo_ambulancia_delete->RowCount ?>_tipo_ambulancia_tipo_amb_es" class="tipo_ambulancia_tipo_amb_es">
<span<?php echo $tipo_ambulancia_delete->tipo_amb_es->viewAttributes() ?>><?php echo $tipo_ambulancia_delete->tipo_amb_es->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tipo_ambulancia_delete->tipo_amb_en->Visible) { // tipo_amb_en ?>
		<td <?php echo $tipo_ambulancia_delete->tipo_amb_en->cellAttributes() ?>>
<span id="el<?php echo $tipo_ambulancia_delete->RowCount ?>_tipo_ambulancia_tipo_amb_en" class="tipo_ambulancia_tipo_amb_en">
<span<?php echo $tipo_ambulancia_delete->tipo_amb_en->viewAttributes() ?>><?php echo $tipo_ambulancia_delete->tipo_amb_en->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tipo_ambulancia_delete->tipo_amb_pr->Visible) { // tipo_amb_pr ?>
		<td <?php echo $tipo_ambulancia_delete->tipo_amb_pr->cellAttributes() ?>>
<span id="el<?php echo $tipo_ambulancia_delete->RowCount ?>_tipo_ambulancia_tipo_amb_pr" class="tipo_ambulancia_tipo_amb_pr">
<span<?php echo $tipo_ambulancia_delete->tipo_amb_pr->viewAttributes() ?>><?php echo $tipo_ambulancia_delete->tipo_amb_pr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tipo_ambulancia_delete->tipo_amb_fr->Visible) { // tipo_amb_fr ?>
		<td <?php echo $tipo_ambulancia_delete->tipo_amb_fr->cellAttributes() ?>>
<span id="el<?php echo $tipo_ambulancia_delete->RowCount ?>_tipo_ambulancia_tipo_amb_fr" class="tipo_ambulancia_tipo_amb_fr">
<span<?php echo $tipo_ambulancia_delete->tipo_amb_fr->viewAttributes() ?>><?php echo $tipo_ambulancia_delete->tipo_amb_fr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tipo_ambulancia_delete->codigo->Visible) { // codigo ?>
		<td <?php echo $tipo_ambulancia_delete->codigo->cellAttributes() ?>>
<span id="el<?php echo $tipo_ambulancia_delete->RowCount ?>_tipo_ambulancia_codigo" class="tipo_ambulancia_codigo">
<span<?php echo $tipo_ambulancia_delete->codigo->viewAttributes() ?>><?php echo $tipo_ambulancia_delete->codigo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$tipo_ambulancia_delete->Recordset->moveNext();
}
$tipo_ambulancia_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tipo_ambulancia_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$tipo_ambulancia_delete->showPageFooter();
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
$tipo_ambulancia_delete->terminate();
?>