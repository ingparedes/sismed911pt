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
$censo_total_delete = new censo_total_delete();

// Run the page
$censo_total_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$censo_total_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fcenso_totaldelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fcenso_totaldelete = currentForm = new ew.Form("fcenso_totaldelete", "delete");
	loadjs.done("fcenso_totaldelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $censo_total_delete->showPageHeader(); ?>
<?php
$censo_total_delete->showMessage();
?>
<form name="fcenso_totaldelete" id="fcenso_totaldelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="censo_total">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($censo_total_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($censo_total_delete->id_hospital->Visible) { // id_hospital ?>
		<th class="<?php echo $censo_total_delete->id_hospital->headerCellClass() ?>"><span id="elh_censo_total_id_hospital" class="censo_total_id_hospital"><?php echo $censo_total_delete->id_hospital->caption() ?></span></th>
<?php } ?>
<?php if ($censo_total_delete->cod_servicio->Visible) { // cod_servicio ?>
		<th class="<?php echo $censo_total_delete->cod_servicio->headerCellClass() ?>"><span id="elh_censo_total_cod_servicio" class="censo_total_cod_servicio"><?php echo $censo_total_delete->cod_servicio->caption() ?></span></th>
<?php } ?>
<?php if ($censo_total_delete->cod_division->Visible) { // cod_division ?>
		<th class="<?php echo $censo_total_delete->cod_division->headerCellClass() ?>"><span id="elh_censo_total_cod_division" class="censo_total_cod_division"><?php echo $censo_total_delete->cod_division->caption() ?></span></th>
<?php } ?>
<?php if ($censo_total_delete->camas_ocupadas->Visible) { // camas_ocupadas ?>
		<th class="<?php echo $censo_total_delete->camas_ocupadas->headerCellClass() ?>"><span id="elh_censo_total_camas_ocupadas" class="censo_total_camas_ocupadas"><?php echo $censo_total_delete->camas_ocupadas->caption() ?></span></th>
<?php } ?>
<?php if ($censo_total_delete->camas_libres->Visible) { // camas_libres ?>
		<th class="<?php echo $censo_total_delete->camas_libres->headerCellClass() ?>"><span id="elh_censo_total_camas_libres" class="censo_total_camas_libres"><?php echo $censo_total_delete->camas_libres->caption() ?></span></th>
<?php } ?>
<?php if ($censo_total_delete->camas_fueraservicio->Visible) { // camas_fueraservicio ?>
		<th class="<?php echo $censo_total_delete->camas_fueraservicio->headerCellClass() ?>"><span id="elh_censo_total_camas_fueraservicio" class="censo_total_camas_fueraservicio"><?php echo $censo_total_delete->camas_fueraservicio->caption() ?></span></th>
<?php } ?>
<?php if ($censo_total_delete->nombre_reporta->Visible) { // nombre_reporta ?>
		<th class="<?php echo $censo_total_delete->nombre_reporta->headerCellClass() ?>"><span id="elh_censo_total_nombre_reporta" class="censo_total_nombre_reporta"><?php echo $censo_total_delete->nombre_reporta->caption() ?></span></th>
<?php } ?>
<?php if ($censo_total_delete->telefono_reporta->Visible) { // telefono_reporta ?>
		<th class="<?php echo $censo_total_delete->telefono_reporta->headerCellClass() ?>"><span id="elh_censo_total_telefono_reporta" class="censo_total_telefono_reporta"><?php echo $censo_total_delete->telefono_reporta->caption() ?></span></th>
<?php } ?>
<?php if ($censo_total_delete->fecha_reporte->Visible) { // fecha_reporte ?>
		<th class="<?php echo $censo_total_delete->fecha_reporte->headerCellClass() ?>"><span id="elh_censo_total_fecha_reporte" class="censo_total_fecha_reporte"><?php echo $censo_total_delete->fecha_reporte->caption() ?></span></th>
<?php } ?>
<?php if ($censo_total_delete->id_censo->Visible) { // id_censo ?>
		<th class="<?php echo $censo_total_delete->id_censo->headerCellClass() ?>"><span id="elh_censo_total_id_censo" class="censo_total_id_censo"><?php echo $censo_total_delete->id_censo->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$censo_total_delete->RecordCount = 0;
$i = 0;
while (!$censo_total_delete->Recordset->EOF) {
	$censo_total_delete->RecordCount++;
	$censo_total_delete->RowCount++;

	// Set row properties
	$censo_total->resetAttributes();
	$censo_total->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$censo_total_delete->loadRowValues($censo_total_delete->Recordset);

	// Render row
	$censo_total_delete->renderRow();
?>
	<tr <?php echo $censo_total->rowAttributes() ?>>
<?php if ($censo_total_delete->id_hospital->Visible) { // id_hospital ?>
		<td <?php echo $censo_total_delete->id_hospital->cellAttributes() ?>>
<span id="el<?php echo $censo_total_delete->RowCount ?>_censo_total_id_hospital" class="censo_total_id_hospital">
<span<?php echo $censo_total_delete->id_hospital->viewAttributes() ?>><?php echo $censo_total_delete->id_hospital->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($censo_total_delete->cod_servicio->Visible) { // cod_servicio ?>
		<td <?php echo $censo_total_delete->cod_servicio->cellAttributes() ?>>
<span id="el<?php echo $censo_total_delete->RowCount ?>_censo_total_cod_servicio" class="censo_total_cod_servicio">
<span<?php echo $censo_total_delete->cod_servicio->viewAttributes() ?>><?php echo $censo_total_delete->cod_servicio->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($censo_total_delete->cod_division->Visible) { // cod_division ?>
		<td <?php echo $censo_total_delete->cod_division->cellAttributes() ?>>
<span id="el<?php echo $censo_total_delete->RowCount ?>_censo_total_cod_division" class="censo_total_cod_division">
<span<?php echo $censo_total_delete->cod_division->viewAttributes() ?>><?php echo $censo_total_delete->cod_division->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($censo_total_delete->camas_ocupadas->Visible) { // camas_ocupadas ?>
		<td <?php echo $censo_total_delete->camas_ocupadas->cellAttributes() ?>>
<span id="el<?php echo $censo_total_delete->RowCount ?>_censo_total_camas_ocupadas" class="censo_total_camas_ocupadas">
<span<?php echo $censo_total_delete->camas_ocupadas->viewAttributes() ?>><?php echo $censo_total_delete->camas_ocupadas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($censo_total_delete->camas_libres->Visible) { // camas_libres ?>
		<td <?php echo $censo_total_delete->camas_libres->cellAttributes() ?>>
<span id="el<?php echo $censo_total_delete->RowCount ?>_censo_total_camas_libres" class="censo_total_camas_libres">
<span<?php echo $censo_total_delete->camas_libres->viewAttributes() ?>><?php echo $censo_total_delete->camas_libres->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($censo_total_delete->camas_fueraservicio->Visible) { // camas_fueraservicio ?>
		<td <?php echo $censo_total_delete->camas_fueraservicio->cellAttributes() ?>>
<span id="el<?php echo $censo_total_delete->RowCount ?>_censo_total_camas_fueraservicio" class="censo_total_camas_fueraservicio">
<span<?php echo $censo_total_delete->camas_fueraservicio->viewAttributes() ?>><?php echo $censo_total_delete->camas_fueraservicio->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($censo_total_delete->nombre_reporta->Visible) { // nombre_reporta ?>
		<td <?php echo $censo_total_delete->nombre_reporta->cellAttributes() ?>>
<span id="el<?php echo $censo_total_delete->RowCount ?>_censo_total_nombre_reporta" class="censo_total_nombre_reporta">
<span<?php echo $censo_total_delete->nombre_reporta->viewAttributes() ?>><?php echo $censo_total_delete->nombre_reporta->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($censo_total_delete->telefono_reporta->Visible) { // telefono_reporta ?>
		<td <?php echo $censo_total_delete->telefono_reporta->cellAttributes() ?>>
<span id="el<?php echo $censo_total_delete->RowCount ?>_censo_total_telefono_reporta" class="censo_total_telefono_reporta">
<span<?php echo $censo_total_delete->telefono_reporta->viewAttributes() ?>><?php echo $censo_total_delete->telefono_reporta->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($censo_total_delete->fecha_reporte->Visible) { // fecha_reporte ?>
		<td <?php echo $censo_total_delete->fecha_reporte->cellAttributes() ?>>
<span id="el<?php echo $censo_total_delete->RowCount ?>_censo_total_fecha_reporte" class="censo_total_fecha_reporte">
<span<?php echo $censo_total_delete->fecha_reporte->viewAttributes() ?>><?php echo $censo_total_delete->fecha_reporte->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($censo_total_delete->id_censo->Visible) { // id_censo ?>
		<td <?php echo $censo_total_delete->id_censo->cellAttributes() ?>>
<span id="el<?php echo $censo_total_delete->RowCount ?>_censo_total_id_censo" class="censo_total_id_censo">
<span<?php echo $censo_total_delete->id_censo->viewAttributes() ?>><?php echo $censo_total_delete->id_censo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$censo_total_delete->Recordset->moveNext();
}
$censo_total_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $censo_total_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$censo_total_delete->showPageFooter();
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
$censo_total_delete->terminate();
?>