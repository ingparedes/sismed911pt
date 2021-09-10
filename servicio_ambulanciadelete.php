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
$servicio_ambulancia_delete = new servicio_ambulancia_delete();

// Run the page
$servicio_ambulancia_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$servicio_ambulancia_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fservicio_ambulanciadelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fservicio_ambulanciadelete = currentForm = new ew.Form("fservicio_ambulanciadelete", "delete");
	loadjs.done("fservicio_ambulanciadelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $servicio_ambulancia_delete->showPageHeader(); ?>
<?php
$servicio_ambulancia_delete->showMessage();
?>
<form name="fservicio_ambulanciadelete" id="fservicio_ambulanciadelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="servicio_ambulancia">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($servicio_ambulancia_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($servicio_ambulancia_delete->id_servcioambulacia->Visible) { // id_servcioambulacia ?>
		<th class="<?php echo $servicio_ambulancia_delete->id_servcioambulacia->headerCellClass() ?>"><span id="elh_servicio_ambulancia_id_servcioambulacia" class="servicio_ambulancia_id_servcioambulacia"><?php echo $servicio_ambulancia_delete->id_servcioambulacia->caption() ?></span></th>
<?php } ?>
<?php if ($servicio_ambulancia_delete->cod_casointerh->Visible) { // cod_casointerh ?>
		<th class="<?php echo $servicio_ambulancia_delete->cod_casointerh->headerCellClass() ?>"><span id="elh_servicio_ambulancia_cod_casointerh" class="servicio_ambulancia_cod_casointerh"><?php echo $servicio_ambulancia_delete->cod_casointerh->caption() ?></span></th>
<?php } ?>
<?php if ($servicio_ambulancia_delete->cod_ambulancia->Visible) { // cod_ambulancia ?>
		<th class="<?php echo $servicio_ambulancia_delete->cod_ambulancia->headerCellClass() ?>"><span id="elh_servicio_ambulancia_cod_ambulancia" class="servicio_ambulancia_cod_ambulancia"><?php echo $servicio_ambulancia_delete->cod_ambulancia->caption() ?></span></th>
<?php } ?>
<?php if ($servicio_ambulancia_delete->hora_asigna->Visible) { // hora_asigna ?>
		<th class="<?php echo $servicio_ambulancia_delete->hora_asigna->headerCellClass() ?>"><span id="elh_servicio_ambulancia_hora_asigna" class="servicio_ambulancia_hora_asigna"><?php echo $servicio_ambulancia_delete->hora_asigna->caption() ?></span></th>
<?php } ?>
<?php if ($servicio_ambulancia_delete->hora_llegada->Visible) { // hora_llegada ?>
		<th class="<?php echo $servicio_ambulancia_delete->hora_llegada->headerCellClass() ?>"><span id="elh_servicio_ambulancia_hora_llegada" class="servicio_ambulancia_hora_llegada"><?php echo $servicio_ambulancia_delete->hora_llegada->caption() ?></span></th>
<?php } ?>
<?php if ($servicio_ambulancia_delete->hora_inicio->Visible) { // hora_inicio ?>
		<th class="<?php echo $servicio_ambulancia_delete->hora_inicio->headerCellClass() ?>"><span id="elh_servicio_ambulancia_hora_inicio" class="servicio_ambulancia_hora_inicio"><?php echo $servicio_ambulancia_delete->hora_inicio->caption() ?></span></th>
<?php } ?>
<?php if ($servicio_ambulancia_delete->hora_destino->Visible) { // hora_destino ?>
		<th class="<?php echo $servicio_ambulancia_delete->hora_destino->headerCellClass() ?>"><span id="elh_servicio_ambulancia_hora_destino" class="servicio_ambulancia_hora_destino"><?php echo $servicio_ambulancia_delete->hora_destino->caption() ?></span></th>
<?php } ?>
<?php if ($servicio_ambulancia_delete->hora_preposicion->Visible) { // hora_preposicion ?>
		<th class="<?php echo $servicio_ambulancia_delete->hora_preposicion->headerCellClass() ?>"><span id="elh_servicio_ambulancia_hora_preposicion" class="servicio_ambulancia_hora_preposicion"><?php echo $servicio_ambulancia_delete->hora_preposicion->caption() ?></span></th>
<?php } ?>
<?php if ($servicio_ambulancia_delete->conductor->Visible) { // conductor ?>
		<th class="<?php echo $servicio_ambulancia_delete->conductor->headerCellClass() ?>"><span id="elh_servicio_ambulancia_conductor" class="servicio_ambulancia_conductor"><?php echo $servicio_ambulancia_delete->conductor->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$servicio_ambulancia_delete->RecordCount = 0;
$i = 0;
while (!$servicio_ambulancia_delete->Recordset->EOF) {
	$servicio_ambulancia_delete->RecordCount++;
	$servicio_ambulancia_delete->RowCount++;

	// Set row properties
	$servicio_ambulancia->resetAttributes();
	$servicio_ambulancia->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$servicio_ambulancia_delete->loadRowValues($servicio_ambulancia_delete->Recordset);

	// Render row
	$servicio_ambulancia_delete->renderRow();
?>
	<tr <?php echo $servicio_ambulancia->rowAttributes() ?>>
<?php if ($servicio_ambulancia_delete->id_servcioambulacia->Visible) { // id_servcioambulacia ?>
		<td <?php echo $servicio_ambulancia_delete->id_servcioambulacia->cellAttributes() ?>>
<span id="el<?php echo $servicio_ambulancia_delete->RowCount ?>_servicio_ambulancia_id_servcioambulacia" class="servicio_ambulancia_id_servcioambulacia">
<span<?php echo $servicio_ambulancia_delete->id_servcioambulacia->viewAttributes() ?>><?php echo $servicio_ambulancia_delete->id_servcioambulacia->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($servicio_ambulancia_delete->cod_casointerh->Visible) { // cod_casointerh ?>
		<td <?php echo $servicio_ambulancia_delete->cod_casointerh->cellAttributes() ?>>
<span id="el<?php echo $servicio_ambulancia_delete->RowCount ?>_servicio_ambulancia_cod_casointerh" class="servicio_ambulancia_cod_casointerh">
<span<?php echo $servicio_ambulancia_delete->cod_casointerh->viewAttributes() ?>><?php echo $servicio_ambulancia_delete->cod_casointerh->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($servicio_ambulancia_delete->cod_ambulancia->Visible) { // cod_ambulancia ?>
		<td <?php echo $servicio_ambulancia_delete->cod_ambulancia->cellAttributes() ?>>
<span id="el<?php echo $servicio_ambulancia_delete->RowCount ?>_servicio_ambulancia_cod_ambulancia" class="servicio_ambulancia_cod_ambulancia">
<span<?php echo $servicio_ambulancia_delete->cod_ambulancia->viewAttributes() ?>><?php echo $servicio_ambulancia_delete->cod_ambulancia->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($servicio_ambulancia_delete->hora_asigna->Visible) { // hora_asigna ?>
		<td <?php echo $servicio_ambulancia_delete->hora_asigna->cellAttributes() ?>>
<span id="el<?php echo $servicio_ambulancia_delete->RowCount ?>_servicio_ambulancia_hora_asigna" class="servicio_ambulancia_hora_asigna">
<span<?php echo $servicio_ambulancia_delete->hora_asigna->viewAttributes() ?>><?php echo $servicio_ambulancia_delete->hora_asigna->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($servicio_ambulancia_delete->hora_llegada->Visible) { // hora_llegada ?>
		<td <?php echo $servicio_ambulancia_delete->hora_llegada->cellAttributes() ?>>
<span id="el<?php echo $servicio_ambulancia_delete->RowCount ?>_servicio_ambulancia_hora_llegada" class="servicio_ambulancia_hora_llegada">
<span<?php echo $servicio_ambulancia_delete->hora_llegada->viewAttributes() ?>><?php echo $servicio_ambulancia_delete->hora_llegada->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($servicio_ambulancia_delete->hora_inicio->Visible) { // hora_inicio ?>
		<td <?php echo $servicio_ambulancia_delete->hora_inicio->cellAttributes() ?>>
<span id="el<?php echo $servicio_ambulancia_delete->RowCount ?>_servicio_ambulancia_hora_inicio" class="servicio_ambulancia_hora_inicio">
<span<?php echo $servicio_ambulancia_delete->hora_inicio->viewAttributes() ?>><?php echo $servicio_ambulancia_delete->hora_inicio->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($servicio_ambulancia_delete->hora_destino->Visible) { // hora_destino ?>
		<td <?php echo $servicio_ambulancia_delete->hora_destino->cellAttributes() ?>>
<span id="el<?php echo $servicio_ambulancia_delete->RowCount ?>_servicio_ambulancia_hora_destino" class="servicio_ambulancia_hora_destino">
<span<?php echo $servicio_ambulancia_delete->hora_destino->viewAttributes() ?>><?php echo $servicio_ambulancia_delete->hora_destino->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($servicio_ambulancia_delete->hora_preposicion->Visible) { // hora_preposicion ?>
		<td <?php echo $servicio_ambulancia_delete->hora_preposicion->cellAttributes() ?>>
<span id="el<?php echo $servicio_ambulancia_delete->RowCount ?>_servicio_ambulancia_hora_preposicion" class="servicio_ambulancia_hora_preposicion">
<span<?php echo $servicio_ambulancia_delete->hora_preposicion->viewAttributes() ?>><?php echo $servicio_ambulancia_delete->hora_preposicion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($servicio_ambulancia_delete->conductor->Visible) { // conductor ?>
		<td <?php echo $servicio_ambulancia_delete->conductor->cellAttributes() ?>>
<span id="el<?php echo $servicio_ambulancia_delete->RowCount ?>_servicio_ambulancia_conductor" class="servicio_ambulancia_conductor">
<span<?php echo $servicio_ambulancia_delete->conductor->viewAttributes() ?>><?php echo $servicio_ambulancia_delete->conductor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$servicio_ambulancia_delete->Recordset->moveNext();
}
$servicio_ambulancia_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $servicio_ambulancia_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$servicio_ambulancia_delete->showPageFooter();
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
$servicio_ambulancia_delete->terminate();
?>