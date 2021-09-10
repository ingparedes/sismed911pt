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
$turno_registro_delete = new turno_registro_delete();

// Run the page
$turno_registro_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$turno_registro_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fturno_registrodelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fturno_registrodelete = currentForm = new ew.Form("fturno_registrodelete", "delete");
	loadjs.done("fturno_registrodelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $turno_registro_delete->showPageHeader(); ?>
<?php
$turno_registro_delete->showMessage();
?>
<form name="fturno_registrodelete" id="fturno_registrodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="turno_registro">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($turno_registro_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($turno_registro_delete->id->Visible) { // id ?>
		<th class="<?php echo $turno_registro_delete->id->headerCellClass() ?>"><span id="elh_turno_registro_id" class="turno_registro_id"><?php echo $turno_registro_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($turno_registro_delete->cod_ambulancias->Visible) { // cod_ambulancias ?>
		<th class="<?php echo $turno_registro_delete->cod_ambulancias->headerCellClass() ?>"><span id="elh_turno_registro_cod_ambulancias" class="turno_registro_cod_ambulancias"><?php echo $turno_registro_delete->cod_ambulancias->caption() ?></span></th>
<?php } ?>
<?php if ($turno_registro_delete->km_actual->Visible) { // km_actual ?>
		<th class="<?php echo $turno_registro_delete->km_actual->headerCellClass() ?>"><span id="elh_turno_registro_km_actual" class="turno_registro_km_actual"><?php echo $turno_registro_delete->km_actual->caption() ?></span></th>
<?php } ?>
<?php if ($turno_registro_delete->combustible_actual->Visible) { // combustible_actual ?>
		<th class="<?php echo $turno_registro_delete->combustible_actual->headerCellClass() ?>"><span id="elh_turno_registro_combustible_actual" class="turno_registro_combustible_actual"><?php echo $turno_registro_delete->combustible_actual->caption() ?></span></th>
<?php } ?>
<?php if ($turno_registro_delete->cantidadtiket->Visible) { // cantidadtiket ?>
		<th class="<?php echo $turno_registro_delete->cantidadtiket->headerCellClass() ?>"><span id="elh_turno_registro_cantidadtiket" class="turno_registro_cantidadtiket"><?php echo $turno_registro_delete->cantidadtiket->caption() ?></span></th>
<?php } ?>
<?php if ($turno_registro_delete->usuario->Visible) { // usuario ?>
		<th class="<?php echo $turno_registro_delete->usuario->headerCellClass() ?>"><span id="elh_turno_registro_usuario" class="turno_registro_usuario"><?php echo $turno_registro_delete->usuario->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$turno_registro_delete->RecordCount = 0;
$i = 0;
while (!$turno_registro_delete->Recordset->EOF) {
	$turno_registro_delete->RecordCount++;
	$turno_registro_delete->RowCount++;

	// Set row properties
	$turno_registro->resetAttributes();
	$turno_registro->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$turno_registro_delete->loadRowValues($turno_registro_delete->Recordset);

	// Render row
	$turno_registro_delete->renderRow();
?>
	<tr <?php echo $turno_registro->rowAttributes() ?>>
<?php if ($turno_registro_delete->id->Visible) { // id ?>
		<td <?php echo $turno_registro_delete->id->cellAttributes() ?>>
<span id="el<?php echo $turno_registro_delete->RowCount ?>_turno_registro_id" class="turno_registro_id">
<span<?php echo $turno_registro_delete->id->viewAttributes() ?>><?php echo $turno_registro_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($turno_registro_delete->cod_ambulancias->Visible) { // cod_ambulancias ?>
		<td <?php echo $turno_registro_delete->cod_ambulancias->cellAttributes() ?>>
<span id="el<?php echo $turno_registro_delete->RowCount ?>_turno_registro_cod_ambulancias" class="turno_registro_cod_ambulancias">
<span<?php echo $turno_registro_delete->cod_ambulancias->viewAttributes() ?>><?php echo $turno_registro_delete->cod_ambulancias->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($turno_registro_delete->km_actual->Visible) { // km_actual ?>
		<td <?php echo $turno_registro_delete->km_actual->cellAttributes() ?>>
<span id="el<?php echo $turno_registro_delete->RowCount ?>_turno_registro_km_actual" class="turno_registro_km_actual">
<span<?php echo $turno_registro_delete->km_actual->viewAttributes() ?>><?php echo $turno_registro_delete->km_actual->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($turno_registro_delete->combustible_actual->Visible) { // combustible_actual ?>
		<td <?php echo $turno_registro_delete->combustible_actual->cellAttributes() ?>>
<span id="el<?php echo $turno_registro_delete->RowCount ?>_turno_registro_combustible_actual" class="turno_registro_combustible_actual">
<span<?php echo $turno_registro_delete->combustible_actual->viewAttributes() ?>><?php echo $turno_registro_delete->combustible_actual->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($turno_registro_delete->cantidadtiket->Visible) { // cantidadtiket ?>
		<td <?php echo $turno_registro_delete->cantidadtiket->cellAttributes() ?>>
<span id="el<?php echo $turno_registro_delete->RowCount ?>_turno_registro_cantidadtiket" class="turno_registro_cantidadtiket">
<span<?php echo $turno_registro_delete->cantidadtiket->viewAttributes() ?>><?php echo $turno_registro_delete->cantidadtiket->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($turno_registro_delete->usuario->Visible) { // usuario ?>
		<td <?php echo $turno_registro_delete->usuario->cellAttributes() ?>>
<span id="el<?php echo $turno_registro_delete->RowCount ?>_turno_registro_usuario" class="turno_registro_usuario">
<span<?php echo $turno_registro_delete->usuario->viewAttributes() ?>><?php echo $turno_registro_delete->usuario->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$turno_registro_delete->Recordset->moveNext();
}
$turno_registro_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $turno_registro_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$turno_registro_delete->showPageFooter();
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
$turno_registro_delete->terminate();
?>