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
$servicio_disponibilidad_delete = new servicio_disponibilidad_delete();

// Run the page
$servicio_disponibilidad_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$servicio_disponibilidad_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fservicio_disponibilidaddelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fservicio_disponibilidaddelete = currentForm = new ew.Form("fservicio_disponibilidaddelete", "delete");
	loadjs.done("fservicio_disponibilidaddelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $servicio_disponibilidad_delete->showPageHeader(); ?>
<?php
$servicio_disponibilidad_delete->showMessage();
?>
<form name="fservicio_disponibilidaddelete" id="fservicio_disponibilidaddelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="servicio_disponibilidad">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($servicio_disponibilidad_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($servicio_disponibilidad_delete->servicio_disponabilidad->Visible) { // servicio_disponabilidad ?>
		<th class="<?php echo $servicio_disponibilidad_delete->servicio_disponabilidad->headerCellClass() ?>"><span id="elh_servicio_disponibilidad_servicio_disponabilidad" class="servicio_disponibilidad_servicio_disponabilidad"><?php echo $servicio_disponibilidad_delete->servicio_disponabilidad->caption() ?></span></th>
<?php } ?>
<?php if ($servicio_disponibilidad_delete->nombre_serv_es->Visible) { // nombre_serv_es ?>
		<th class="<?php echo $servicio_disponibilidad_delete->nombre_serv_es->headerCellClass() ?>"><span id="elh_servicio_disponibilidad_nombre_serv_es" class="servicio_disponibilidad_nombre_serv_es"><?php echo $servicio_disponibilidad_delete->nombre_serv_es->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$servicio_disponibilidad_delete->RecordCount = 0;
$i = 0;
while (!$servicio_disponibilidad_delete->Recordset->EOF) {
	$servicio_disponibilidad_delete->RecordCount++;
	$servicio_disponibilidad_delete->RowCount++;

	// Set row properties
	$servicio_disponibilidad->resetAttributes();
	$servicio_disponibilidad->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$servicio_disponibilidad_delete->loadRowValues($servicio_disponibilidad_delete->Recordset);

	// Render row
	$servicio_disponibilidad_delete->renderRow();
?>
	<tr <?php echo $servicio_disponibilidad->rowAttributes() ?>>
<?php if ($servicio_disponibilidad_delete->servicio_disponabilidad->Visible) { // servicio_disponabilidad ?>
		<td <?php echo $servicio_disponibilidad_delete->servicio_disponabilidad->cellAttributes() ?>>
<span id="el<?php echo $servicio_disponibilidad_delete->RowCount ?>_servicio_disponibilidad_servicio_disponabilidad" class="servicio_disponibilidad_servicio_disponabilidad">
<span<?php echo $servicio_disponibilidad_delete->servicio_disponabilidad->viewAttributes() ?>><?php echo $servicio_disponibilidad_delete->servicio_disponabilidad->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($servicio_disponibilidad_delete->nombre_serv_es->Visible) { // nombre_serv_es ?>
		<td <?php echo $servicio_disponibilidad_delete->nombre_serv_es->cellAttributes() ?>>
<span id="el<?php echo $servicio_disponibilidad_delete->RowCount ?>_servicio_disponibilidad_nombre_serv_es" class="servicio_disponibilidad_nombre_serv_es">
<span<?php echo $servicio_disponibilidad_delete->nombre_serv_es->viewAttributes() ?>><?php echo $servicio_disponibilidad_delete->nombre_serv_es->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$servicio_disponibilidad_delete->Recordset->moveNext();
}
$servicio_disponibilidad_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $servicio_disponibilidad_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$servicio_disponibilidad_delete->showPageFooter();
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
$servicio_disponibilidad_delete->terminate();
?>