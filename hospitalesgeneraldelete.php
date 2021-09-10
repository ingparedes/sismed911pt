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
$hospitalesgeneral_delete = new hospitalesgeneral_delete();

// Run the page
$hospitalesgeneral_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospitalesgeneral_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fhospitalesgeneraldelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fhospitalesgeneraldelete = currentForm = new ew.Form("fhospitalesgeneraldelete", "delete");
	loadjs.done("fhospitalesgeneraldelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $hospitalesgeneral_delete->showPageHeader(); ?>
<?php
$hospitalesgeneral_delete->showMessage();
?>
<form name="fhospitalesgeneraldelete" id="fhospitalesgeneraldelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospitalesgeneral">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hospitalesgeneral_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hospitalesgeneral_delete->nombre_hospital->Visible) { // nombre_hospital ?>
		<th class="<?php echo $hospitalesgeneral_delete->nombre_hospital->headerCellClass() ?>"><span id="elh_hospitalesgeneral_nombre_hospital" class="hospitalesgeneral_nombre_hospital"><?php echo $hospitalesgeneral_delete->nombre_hospital->caption() ?></span></th>
<?php } ?>
<?php if ($hospitalesgeneral_delete->depto_hospital->Visible) { // depto_hospital ?>
		<th class="<?php echo $hospitalesgeneral_delete->depto_hospital->headerCellClass() ?>"><span id="elh_hospitalesgeneral_depto_hospital" class="hospitalesgeneral_depto_hospital"><?php echo $hospitalesgeneral_delete->depto_hospital->caption() ?></span></th>
<?php } ?>
<?php if ($hospitalesgeneral_delete->provincia_hospital->Visible) { // provincia_hospital ?>
		<th class="<?php echo $hospitalesgeneral_delete->provincia_hospital->headerCellClass() ?>"><span id="elh_hospitalesgeneral_provincia_hospital" class="hospitalesgeneral_provincia_hospital"><?php echo $hospitalesgeneral_delete->provincia_hospital->caption() ?></span></th>
<?php } ?>
<?php if ($hospitalesgeneral_delete->municipio_hospital->Visible) { // municipio_hospital ?>
		<th class="<?php echo $hospitalesgeneral_delete->municipio_hospital->headerCellClass() ?>"><span id="elh_hospitalesgeneral_municipio_hospital" class="hospitalesgeneral_municipio_hospital"><?php echo $hospitalesgeneral_delete->municipio_hospital->caption() ?></span></th>
<?php } ?>
<?php if ($hospitalesgeneral_delete->nivel_hospital->Visible) { // nivel_hospital ?>
		<th class="<?php echo $hospitalesgeneral_delete->nivel_hospital->headerCellClass() ?>"><span id="elh_hospitalesgeneral_nivel_hospital" class="hospitalesgeneral_nivel_hospital"><?php echo $hospitalesgeneral_delete->nivel_hospital->caption() ?></span></th>
<?php } ?>
<?php if ($hospitalesgeneral_delete->tipo_hospital->Visible) { // tipo_hospital ?>
		<th class="<?php echo $hospitalesgeneral_delete->tipo_hospital->headerCellClass() ?>"><span id="elh_hospitalesgeneral_tipo_hospital" class="hospitalesgeneral_tipo_hospital"><?php echo $hospitalesgeneral_delete->tipo_hospital->caption() ?></span></th>
<?php } ?>
<?php if ($hospitalesgeneral_delete->especialidad->Visible) { // especialidad ?>
		<th class="<?php echo $hospitalesgeneral_delete->especialidad->headerCellClass() ?>"><span id="elh_hospitalesgeneral_especialidad" class="hospitalesgeneral_especialidad"><?php echo $hospitalesgeneral_delete->especialidad->caption() ?></span></th>
<?php } ?>
<?php if ($hospitalesgeneral_delete->codpolitico->Visible) { // codpolitico ?>
		<th class="<?php echo $hospitalesgeneral_delete->codpolitico->headerCellClass() ?>"><span id="elh_hospitalesgeneral_codpolitico" class="hospitalesgeneral_codpolitico"><?php echo $hospitalesgeneral_delete->codpolitico->caption() ?></span></th>
<?php } ?>
<?php if ($hospitalesgeneral_delete->telefono->Visible) { // telefono ?>
		<th class="<?php echo $hospitalesgeneral_delete->telefono->headerCellClass() ?>"><span id="elh_hospitalesgeneral_telefono" class="hospitalesgeneral_telefono"><?php echo $hospitalesgeneral_delete->telefono->caption() ?></span></th>
<?php } ?>
<?php if ($hospitalesgeneral_delete->nombre_responsable->Visible) { // nombre_responsable ?>
		<th class="<?php echo $hospitalesgeneral_delete->nombre_responsable->headerCellClass() ?>"><span id="elh_hospitalesgeneral_nombre_responsable" class="hospitalesgeneral_nombre_responsable"><?php echo $hospitalesgeneral_delete->nombre_responsable->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hospitalesgeneral_delete->RecordCount = 0;
$i = 0;
while (!$hospitalesgeneral_delete->Recordset->EOF) {
	$hospitalesgeneral_delete->RecordCount++;
	$hospitalesgeneral_delete->RowCount++;

	// Set row properties
	$hospitalesgeneral->resetAttributes();
	$hospitalesgeneral->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hospitalesgeneral_delete->loadRowValues($hospitalesgeneral_delete->Recordset);

	// Render row
	$hospitalesgeneral_delete->renderRow();
?>
	<tr <?php echo $hospitalesgeneral->rowAttributes() ?>>
<?php if ($hospitalesgeneral_delete->nombre_hospital->Visible) { // nombre_hospital ?>
		<td <?php echo $hospitalesgeneral_delete->nombre_hospital->cellAttributes() ?>>
<span id="el<?php echo $hospitalesgeneral_delete->RowCount ?>_hospitalesgeneral_nombre_hospital" class="hospitalesgeneral_nombre_hospital">
<span<?php echo $hospitalesgeneral_delete->nombre_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral_delete->nombre_hospital->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospitalesgeneral_delete->depto_hospital->Visible) { // depto_hospital ?>
		<td <?php echo $hospitalesgeneral_delete->depto_hospital->cellAttributes() ?>>
<span id="el<?php echo $hospitalesgeneral_delete->RowCount ?>_hospitalesgeneral_depto_hospital" class="hospitalesgeneral_depto_hospital">
<span<?php echo $hospitalesgeneral_delete->depto_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral_delete->depto_hospital->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospitalesgeneral_delete->provincia_hospital->Visible) { // provincia_hospital ?>
		<td <?php echo $hospitalesgeneral_delete->provincia_hospital->cellAttributes() ?>>
<span id="el<?php echo $hospitalesgeneral_delete->RowCount ?>_hospitalesgeneral_provincia_hospital" class="hospitalesgeneral_provincia_hospital">
<span<?php echo $hospitalesgeneral_delete->provincia_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral_delete->provincia_hospital->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospitalesgeneral_delete->municipio_hospital->Visible) { // municipio_hospital ?>
		<td <?php echo $hospitalesgeneral_delete->municipio_hospital->cellAttributes() ?>>
<span id="el<?php echo $hospitalesgeneral_delete->RowCount ?>_hospitalesgeneral_municipio_hospital" class="hospitalesgeneral_municipio_hospital">
<span<?php echo $hospitalesgeneral_delete->municipio_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral_delete->municipio_hospital->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospitalesgeneral_delete->nivel_hospital->Visible) { // nivel_hospital ?>
		<td <?php echo $hospitalesgeneral_delete->nivel_hospital->cellAttributes() ?>>
<span id="el<?php echo $hospitalesgeneral_delete->RowCount ?>_hospitalesgeneral_nivel_hospital" class="hospitalesgeneral_nivel_hospital">
<span<?php echo $hospitalesgeneral_delete->nivel_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral_delete->nivel_hospital->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospitalesgeneral_delete->tipo_hospital->Visible) { // tipo_hospital ?>
		<td <?php echo $hospitalesgeneral_delete->tipo_hospital->cellAttributes() ?>>
<span id="el<?php echo $hospitalesgeneral_delete->RowCount ?>_hospitalesgeneral_tipo_hospital" class="hospitalesgeneral_tipo_hospital">
<span<?php echo $hospitalesgeneral_delete->tipo_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral_delete->tipo_hospital->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospitalesgeneral_delete->especialidad->Visible) { // especialidad ?>
		<td <?php echo $hospitalesgeneral_delete->especialidad->cellAttributes() ?>>
<span id="el<?php echo $hospitalesgeneral_delete->RowCount ?>_hospitalesgeneral_especialidad" class="hospitalesgeneral_especialidad">
<span<?php echo $hospitalesgeneral_delete->especialidad->viewAttributes() ?>><?php echo $hospitalesgeneral_delete->especialidad->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospitalesgeneral_delete->codpolitico->Visible) { // codpolitico ?>
		<td <?php echo $hospitalesgeneral_delete->codpolitico->cellAttributes() ?>>
<span id="el<?php echo $hospitalesgeneral_delete->RowCount ?>_hospitalesgeneral_codpolitico" class="hospitalesgeneral_codpolitico">
<span<?php echo $hospitalesgeneral_delete->codpolitico->viewAttributes() ?>><?php echo $hospitalesgeneral_delete->codpolitico->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospitalesgeneral_delete->telefono->Visible) { // telefono ?>
		<td <?php echo $hospitalesgeneral_delete->telefono->cellAttributes() ?>>
<span id="el<?php echo $hospitalesgeneral_delete->RowCount ?>_hospitalesgeneral_telefono" class="hospitalesgeneral_telefono">
<span<?php echo $hospitalesgeneral_delete->telefono->viewAttributes() ?>><?php echo $hospitalesgeneral_delete->telefono->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospitalesgeneral_delete->nombre_responsable->Visible) { // nombre_responsable ?>
		<td <?php echo $hospitalesgeneral_delete->nombre_responsable->cellAttributes() ?>>
<span id="el<?php echo $hospitalesgeneral_delete->RowCount ?>_hospitalesgeneral_nombre_responsable" class="hospitalesgeneral_nombre_responsable">
<span<?php echo $hospitalesgeneral_delete->nombre_responsable->viewAttributes() ?>><?php echo $hospitalesgeneral_delete->nombre_responsable->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hospitalesgeneral_delete->Recordset->moveNext();
}
$hospitalesgeneral_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hospitalesgeneral_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hospitalesgeneral_delete->showPageFooter();
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
$hospitalesgeneral_delete->terminate();
?>