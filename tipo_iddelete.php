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
$tipo_id_delete = new tipo_id_delete();

// Run the page
$tipo_id_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tipo_id_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftipo_iddelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ftipo_iddelete = currentForm = new ew.Form("ftipo_iddelete", "delete");
	loadjs.done("ftipo_iddelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $tipo_id_delete->showPageHeader(); ?>
<?php
$tipo_id_delete->showMessage();
?>
<form name="ftipo_iddelete" id="ftipo_iddelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tipo_id">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($tipo_id_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($tipo_id_delete->id_tipo->Visible) { // id_tipo ?>
		<th class="<?php echo $tipo_id_delete->id_tipo->headerCellClass() ?>"><span id="elh_tipo_id_id_tipo" class="tipo_id_id_tipo"><?php echo $tipo_id_delete->id_tipo->caption() ?></span></th>
<?php } ?>
<?php if ($tipo_id_delete->descripcion->Visible) { // descripcion ?>
		<th class="<?php echo $tipo_id_delete->descripcion->headerCellClass() ?>"><span id="elh_tipo_id_descripcion" class="tipo_id_descripcion"><?php echo $tipo_id_delete->descripcion->caption() ?></span></th>
<?php } ?>
<?php if ($tipo_id_delete->descripcion_en->Visible) { // descripcion_en ?>
		<th class="<?php echo $tipo_id_delete->descripcion_en->headerCellClass() ?>"><span id="elh_tipo_id_descripcion_en" class="tipo_id_descripcion_en"><?php echo $tipo_id_delete->descripcion_en->caption() ?></span></th>
<?php } ?>
<?php if ($tipo_id_delete->descripcion_pr->Visible) { // descripcion_pr ?>
		<th class="<?php echo $tipo_id_delete->descripcion_pr->headerCellClass() ?>"><span id="elh_tipo_id_descripcion_pr" class="tipo_id_descripcion_pr"><?php echo $tipo_id_delete->descripcion_pr->caption() ?></span></th>
<?php } ?>
<?php if ($tipo_id_delete->descripcion_fr->Visible) { // descripcion_fr ?>
		<th class="<?php echo $tipo_id_delete->descripcion_fr->headerCellClass() ?>"><span id="elh_tipo_id_descripcion_fr" class="tipo_id_descripcion_fr"><?php echo $tipo_id_delete->descripcion_fr->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$tipo_id_delete->RecordCount = 0;
$i = 0;
while (!$tipo_id_delete->Recordset->EOF) {
	$tipo_id_delete->RecordCount++;
	$tipo_id_delete->RowCount++;

	// Set row properties
	$tipo_id->resetAttributes();
	$tipo_id->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$tipo_id_delete->loadRowValues($tipo_id_delete->Recordset);

	// Render row
	$tipo_id_delete->renderRow();
?>
	<tr <?php echo $tipo_id->rowAttributes() ?>>
<?php if ($tipo_id_delete->id_tipo->Visible) { // id_tipo ?>
		<td <?php echo $tipo_id_delete->id_tipo->cellAttributes() ?>>
<span id="el<?php echo $tipo_id_delete->RowCount ?>_tipo_id_id_tipo" class="tipo_id_id_tipo">
<span<?php echo $tipo_id_delete->id_tipo->viewAttributes() ?>><?php echo $tipo_id_delete->id_tipo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tipo_id_delete->descripcion->Visible) { // descripcion ?>
		<td <?php echo $tipo_id_delete->descripcion->cellAttributes() ?>>
<span id="el<?php echo $tipo_id_delete->RowCount ?>_tipo_id_descripcion" class="tipo_id_descripcion">
<span<?php echo $tipo_id_delete->descripcion->viewAttributes() ?>><?php echo $tipo_id_delete->descripcion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tipo_id_delete->descripcion_en->Visible) { // descripcion_en ?>
		<td <?php echo $tipo_id_delete->descripcion_en->cellAttributes() ?>>
<span id="el<?php echo $tipo_id_delete->RowCount ?>_tipo_id_descripcion_en" class="tipo_id_descripcion_en">
<span<?php echo $tipo_id_delete->descripcion_en->viewAttributes() ?>><?php echo $tipo_id_delete->descripcion_en->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tipo_id_delete->descripcion_pr->Visible) { // descripcion_pr ?>
		<td <?php echo $tipo_id_delete->descripcion_pr->cellAttributes() ?>>
<span id="el<?php echo $tipo_id_delete->RowCount ?>_tipo_id_descripcion_pr" class="tipo_id_descripcion_pr">
<span<?php echo $tipo_id_delete->descripcion_pr->viewAttributes() ?>><?php echo $tipo_id_delete->descripcion_pr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tipo_id_delete->descripcion_fr->Visible) { // descripcion_fr ?>
		<td <?php echo $tipo_id_delete->descripcion_fr->cellAttributes() ?>>
<span id="el<?php echo $tipo_id_delete->RowCount ?>_tipo_id_descripcion_fr" class="tipo_id_descripcion_fr">
<span<?php echo $tipo_id_delete->descripcion_fr->viewAttributes() ?>><?php echo $tipo_id_delete->descripcion_fr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$tipo_id_delete->Recordset->moveNext();
}
$tipo_id_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tipo_id_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$tipo_id_delete->showPageFooter();
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
$tipo_id_delete->terminate();
?>