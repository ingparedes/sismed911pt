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
$recordatorio_taller_delete = new recordatorio_taller_delete();

// Run the page
$recordatorio_taller_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recordatorio_taller_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var frecordatorio_tallerdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	frecordatorio_tallerdelete = currentForm = new ew.Form("frecordatorio_tallerdelete", "delete");
	loadjs.done("frecordatorio_tallerdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $recordatorio_taller_delete->showPageHeader(); ?>
<?php
$recordatorio_taller_delete->showMessage();
?>
<form name="frecordatorio_tallerdelete" id="frecordatorio_tallerdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recordatorio_taller">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($recordatorio_taller_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($recordatorio_taller_delete->id->Visible) { // id ?>
		<th class="<?php echo $recordatorio_taller_delete->id->headerCellClass() ?>"><span id="elh_recordatorio_taller_id" class="recordatorio_taller_id"><?php echo $recordatorio_taller_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($recordatorio_taller_delete->vehiculo->Visible) { // vehiculo ?>
		<th class="<?php echo $recordatorio_taller_delete->vehiculo->headerCellClass() ?>"><span id="elh_recordatorio_taller_vehiculo" class="recordatorio_taller_vehiculo"><?php echo $recordatorio_taller_delete->vehiculo->caption() ?></span></th>
<?php } ?>
<?php if ($recordatorio_taller_delete->servicio->Visible) { // servicio ?>
		<th class="<?php echo $recordatorio_taller_delete->servicio->headerCellClass() ?>"><span id="elh_recordatorio_taller_servicio" class="recordatorio_taller_servicio"><?php echo $recordatorio_taller_delete->servicio->caption() ?></span></th>
<?php } ?>
<?php if ($recordatorio_taller_delete->frecuencia_km->Visible) { // frecuencia_km ?>
		<th class="<?php echo $recordatorio_taller_delete->frecuencia_km->headerCellClass() ?>"><span id="elh_recordatorio_taller_frecuencia_km" class="recordatorio_taller_frecuencia_km"><?php echo $recordatorio_taller_delete->frecuencia_km->caption() ?></span></th>
<?php } ?>
<?php if ($recordatorio_taller_delete->frecuencia_tiempo->Visible) { // frecuencia_tiempo ?>
		<th class="<?php echo $recordatorio_taller_delete->frecuencia_tiempo->headerCellClass() ?>"><span id="elh_recordatorio_taller_frecuencia_tiempo" class="recordatorio_taller_frecuencia_tiempo"><?php echo $recordatorio_taller_delete->frecuencia_tiempo->caption() ?></span></th>
<?php } ?>
<?php if ($recordatorio_taller_delete->anticipo_km->Visible) { // anticipo_km ?>
		<th class="<?php echo $recordatorio_taller_delete->anticipo_km->headerCellClass() ?>"><span id="elh_recordatorio_taller_anticipo_km" class="recordatorio_taller_anticipo_km"><?php echo $recordatorio_taller_delete->anticipo_km->caption() ?></span></th>
<?php } ?>
<?php if ($recordatorio_taller_delete->anticipo_tiempo->Visible) { // anticipo_tiempo ?>
		<th class="<?php echo $recordatorio_taller_delete->anticipo_tiempo->headerCellClass() ?>"><span id="elh_recordatorio_taller_anticipo_tiempo" class="recordatorio_taller_anticipo_tiempo"><?php echo $recordatorio_taller_delete->anticipo_tiempo->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$recordatorio_taller_delete->RecordCount = 0;
$i = 0;
while (!$recordatorio_taller_delete->Recordset->EOF) {
	$recordatorio_taller_delete->RecordCount++;
	$recordatorio_taller_delete->RowCount++;

	// Set row properties
	$recordatorio_taller->resetAttributes();
	$recordatorio_taller->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$recordatorio_taller_delete->loadRowValues($recordatorio_taller_delete->Recordset);

	// Render row
	$recordatorio_taller_delete->renderRow();
?>
	<tr <?php echo $recordatorio_taller->rowAttributes() ?>>
<?php if ($recordatorio_taller_delete->id->Visible) { // id ?>
		<td <?php echo $recordatorio_taller_delete->id->cellAttributes() ?>>
<span id="el<?php echo $recordatorio_taller_delete->RowCount ?>_recordatorio_taller_id" class="recordatorio_taller_id">
<span<?php echo $recordatorio_taller_delete->id->viewAttributes() ?>><?php echo $recordatorio_taller_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recordatorio_taller_delete->vehiculo->Visible) { // vehiculo ?>
		<td <?php echo $recordatorio_taller_delete->vehiculo->cellAttributes() ?>>
<span id="el<?php echo $recordatorio_taller_delete->RowCount ?>_recordatorio_taller_vehiculo" class="recordatorio_taller_vehiculo">
<span<?php echo $recordatorio_taller_delete->vehiculo->viewAttributes() ?>><?php echo $recordatorio_taller_delete->vehiculo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recordatorio_taller_delete->servicio->Visible) { // servicio ?>
		<td <?php echo $recordatorio_taller_delete->servicio->cellAttributes() ?>>
<span id="el<?php echo $recordatorio_taller_delete->RowCount ?>_recordatorio_taller_servicio" class="recordatorio_taller_servicio">
<span<?php echo $recordatorio_taller_delete->servicio->viewAttributes() ?>><?php echo $recordatorio_taller_delete->servicio->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recordatorio_taller_delete->frecuencia_km->Visible) { // frecuencia_km ?>
		<td <?php echo $recordatorio_taller_delete->frecuencia_km->cellAttributes() ?>>
<span id="el<?php echo $recordatorio_taller_delete->RowCount ?>_recordatorio_taller_frecuencia_km" class="recordatorio_taller_frecuencia_km">
<span<?php echo $recordatorio_taller_delete->frecuencia_km->viewAttributes() ?>><?php echo $recordatorio_taller_delete->frecuencia_km->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recordatorio_taller_delete->frecuencia_tiempo->Visible) { // frecuencia_tiempo ?>
		<td <?php echo $recordatorio_taller_delete->frecuencia_tiempo->cellAttributes() ?>>
<span id="el<?php echo $recordatorio_taller_delete->RowCount ?>_recordatorio_taller_frecuencia_tiempo" class="recordatorio_taller_frecuencia_tiempo">
<span<?php echo $recordatorio_taller_delete->frecuencia_tiempo->viewAttributes() ?>><?php echo $recordatorio_taller_delete->frecuencia_tiempo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recordatorio_taller_delete->anticipo_km->Visible) { // anticipo_km ?>
		<td <?php echo $recordatorio_taller_delete->anticipo_km->cellAttributes() ?>>
<span id="el<?php echo $recordatorio_taller_delete->RowCount ?>_recordatorio_taller_anticipo_km" class="recordatorio_taller_anticipo_km">
<span<?php echo $recordatorio_taller_delete->anticipo_km->viewAttributes() ?>><?php echo $recordatorio_taller_delete->anticipo_km->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($recordatorio_taller_delete->anticipo_tiempo->Visible) { // anticipo_tiempo ?>
		<td <?php echo $recordatorio_taller_delete->anticipo_tiempo->cellAttributes() ?>>
<span id="el<?php echo $recordatorio_taller_delete->RowCount ?>_recordatorio_taller_anticipo_tiempo" class="recordatorio_taller_anticipo_tiempo">
<span<?php echo $recordatorio_taller_delete->anticipo_tiempo->viewAttributes() ?>><?php echo $recordatorio_taller_delete->anticipo_tiempo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$recordatorio_taller_delete->Recordset->moveNext();
}
$recordatorio_taller_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $recordatorio_taller_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$recordatorio_taller_delete->showPageFooter();
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
$recordatorio_taller_delete->terminate();
?>