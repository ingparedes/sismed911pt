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
$catalogo_serv_taller_delete = new catalogo_serv_taller_delete();

// Run the page
$catalogo_serv_taller_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$catalogo_serv_taller_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fcatalogo_serv_tallerdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fcatalogo_serv_tallerdelete = currentForm = new ew.Form("fcatalogo_serv_tallerdelete", "delete");
	loadjs.done("fcatalogo_serv_tallerdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $catalogo_serv_taller_delete->showPageHeader(); ?>
<?php
$catalogo_serv_taller_delete->showMessage();
?>
<form name="fcatalogo_serv_tallerdelete" id="fcatalogo_serv_tallerdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="catalogo_serv_taller">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($catalogo_serv_taller_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($catalogo_serv_taller_delete->id_catalogo->Visible) { // id_catalogo ?>
		<th class="<?php echo $catalogo_serv_taller_delete->id_catalogo->headerCellClass() ?>"><span id="elh_catalogo_serv_taller_id_catalogo" class="catalogo_serv_taller_id_catalogo"><?php echo $catalogo_serv_taller_delete->id_catalogo->caption() ?></span></th>
<?php } ?>
<?php if ($catalogo_serv_taller_delete->servicio_en->Visible) { // servicio_en ?>
		<th class="<?php echo $catalogo_serv_taller_delete->servicio_en->headerCellClass() ?>"><span id="elh_catalogo_serv_taller_servicio_en" class="catalogo_serv_taller_servicio_en"><?php echo $catalogo_serv_taller_delete->servicio_en->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$catalogo_serv_taller_delete->RecordCount = 0;
$i = 0;
while (!$catalogo_serv_taller_delete->Recordset->EOF) {
	$catalogo_serv_taller_delete->RecordCount++;
	$catalogo_serv_taller_delete->RowCount++;

	// Set row properties
	$catalogo_serv_taller->resetAttributes();
	$catalogo_serv_taller->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$catalogo_serv_taller_delete->loadRowValues($catalogo_serv_taller_delete->Recordset);

	// Render row
	$catalogo_serv_taller_delete->renderRow();
?>
	<tr <?php echo $catalogo_serv_taller->rowAttributes() ?>>
<?php if ($catalogo_serv_taller_delete->id_catalogo->Visible) { // id_catalogo ?>
		<td <?php echo $catalogo_serv_taller_delete->id_catalogo->cellAttributes() ?>>
<span id="el<?php echo $catalogo_serv_taller_delete->RowCount ?>_catalogo_serv_taller_id_catalogo" class="catalogo_serv_taller_id_catalogo">
<span<?php echo $catalogo_serv_taller_delete->id_catalogo->viewAttributes() ?>><?php echo $catalogo_serv_taller_delete->id_catalogo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($catalogo_serv_taller_delete->servicio_en->Visible) { // servicio_en ?>
		<td <?php echo $catalogo_serv_taller_delete->servicio_en->cellAttributes() ?>>
<span id="el<?php echo $catalogo_serv_taller_delete->RowCount ?>_catalogo_serv_taller_servicio_en" class="catalogo_serv_taller_servicio_en">
<span<?php echo $catalogo_serv_taller_delete->servicio_en->viewAttributes() ?>><?php echo $catalogo_serv_taller_delete->servicio_en->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$catalogo_serv_taller_delete->Recordset->moveNext();
}
$catalogo_serv_taller_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $catalogo_serv_taller_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$catalogo_serv_taller_delete->showPageFooter();
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
$catalogo_serv_taller_delete->terminate();
?>