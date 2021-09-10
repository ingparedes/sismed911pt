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
$ambulancias_delete = new ambulancias_delete();

// Run the page
$ambulancias_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ambulancias_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fambulanciasdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fambulanciasdelete = currentForm = new ew.Form("fambulanciasdelete", "delete");
	loadjs.done("fambulanciasdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ambulancias_delete->showPageHeader(); ?>
<?php
$ambulancias_delete->showMessage();
?>
<form name="fambulanciasdelete" id="fambulanciasdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ambulancias">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ambulancias_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ambulancias_delete->cod_ambulancias->Visible) { // cod_ambulancias ?>
		<th class="<?php echo $ambulancias_delete->cod_ambulancias->headerCellClass() ?>"><span id="elh_ambulancias_cod_ambulancias" class="ambulancias_cod_ambulancias"><?php echo $ambulancias_delete->cod_ambulancias->caption() ?></span></th>
<?php } ?>
<?php if ($ambulancias_delete->placas->Visible) { // placas ?>
		<th class="<?php echo $ambulancias_delete->placas->headerCellClass() ?>"><span id="elh_ambulancias_placas" class="ambulancias_placas"><?php echo $ambulancias_delete->placas->caption() ?></span></th>
<?php } ?>
<?php if ($ambulancias_delete->chasis->Visible) { // chasis ?>
		<th class="<?php echo $ambulancias_delete->chasis->headerCellClass() ?>"><span id="elh_ambulancias_chasis" class="ambulancias_chasis"><?php echo $ambulancias_delete->chasis->caption() ?></span></th>
<?php } ?>
<?php if ($ambulancias_delete->marca->Visible) { // marca ?>
		<th class="<?php echo $ambulancias_delete->marca->headerCellClass() ?>"><span id="elh_ambulancias_marca" class="ambulancias_marca"><?php echo $ambulancias_delete->marca->caption() ?></span></th>
<?php } ?>
<?php if ($ambulancias_delete->modelo->Visible) { // modelo ?>
		<th class="<?php echo $ambulancias_delete->modelo->headerCellClass() ?>"><span id="elh_ambulancias_modelo" class="ambulancias_modelo"><?php echo $ambulancias_delete->modelo->caption() ?></span></th>
<?php } ?>
<?php if ($ambulancias_delete->tipo_translado->Visible) { // tipo_translado ?>
		<th class="<?php echo $ambulancias_delete->tipo_translado->headerCellClass() ?>"><span id="elh_ambulancias_tipo_translado" class="ambulancias_tipo_translado"><?php echo $ambulancias_delete->tipo_translado->caption() ?></span></th>
<?php } ?>
<?php if ($ambulancias_delete->estado->Visible) { // estado ?>
		<th class="<?php echo $ambulancias_delete->estado->headerCellClass() ?>"><span id="elh_ambulancias_estado" class="ambulancias_estado"><?php echo $ambulancias_delete->estado->caption() ?></span></th>
<?php } ?>
<?php if ($ambulancias_delete->ubicacion->Visible) { // ubicacion ?>
		<th class="<?php echo $ambulancias_delete->ubicacion->headerCellClass() ?>"><span id="elh_ambulancias_ubicacion" class="ambulancias_ubicacion"><?php echo $ambulancias_delete->ubicacion->caption() ?></span></th>
<?php } ?>
<?php if ($ambulancias_delete->especial->Visible) { // especial ?>
		<th class="<?php echo $ambulancias_delete->especial->headerCellClass() ?>"><span id="elh_ambulancias_especial" class="ambulancias_especial"><?php echo $ambulancias_delete->especial->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ambulancias_delete->RecordCount = 0;
$i = 0;
while (!$ambulancias_delete->Recordset->EOF) {
	$ambulancias_delete->RecordCount++;
	$ambulancias_delete->RowCount++;

	// Set row properties
	$ambulancias->resetAttributes();
	$ambulancias->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ambulancias_delete->loadRowValues($ambulancias_delete->Recordset);

	// Render row
	$ambulancias_delete->renderRow();
?>
	<tr <?php echo $ambulancias->rowAttributes() ?>>
<?php if ($ambulancias_delete->cod_ambulancias->Visible) { // cod_ambulancias ?>
		<td <?php echo $ambulancias_delete->cod_ambulancias->cellAttributes() ?>>
<span id="el<?php echo $ambulancias_delete->RowCount ?>_ambulancias_cod_ambulancias" class="ambulancias_cod_ambulancias">
<span<?php echo $ambulancias_delete->cod_ambulancias->viewAttributes() ?>><?php echo $ambulancias_delete->cod_ambulancias->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ambulancias_delete->placas->Visible) { // placas ?>
		<td <?php echo $ambulancias_delete->placas->cellAttributes() ?>>
<span id="el<?php echo $ambulancias_delete->RowCount ?>_ambulancias_placas" class="ambulancias_placas">
<span<?php echo $ambulancias_delete->placas->viewAttributes() ?>><?php echo $ambulancias_delete->placas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ambulancias_delete->chasis->Visible) { // chasis ?>
		<td <?php echo $ambulancias_delete->chasis->cellAttributes() ?>>
<span id="el<?php echo $ambulancias_delete->RowCount ?>_ambulancias_chasis" class="ambulancias_chasis">
<span<?php echo $ambulancias_delete->chasis->viewAttributes() ?>><?php echo $ambulancias_delete->chasis->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ambulancias_delete->marca->Visible) { // marca ?>
		<td <?php echo $ambulancias_delete->marca->cellAttributes() ?>>
<span id="el<?php echo $ambulancias_delete->RowCount ?>_ambulancias_marca" class="ambulancias_marca">
<span<?php echo $ambulancias_delete->marca->viewAttributes() ?>><?php echo $ambulancias_delete->marca->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ambulancias_delete->modelo->Visible) { // modelo ?>
		<td <?php echo $ambulancias_delete->modelo->cellAttributes() ?>>
<span id="el<?php echo $ambulancias_delete->RowCount ?>_ambulancias_modelo" class="ambulancias_modelo">
<span<?php echo $ambulancias_delete->modelo->viewAttributes() ?>><?php echo $ambulancias_delete->modelo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ambulancias_delete->tipo_translado->Visible) { // tipo_translado ?>
		<td <?php echo $ambulancias_delete->tipo_translado->cellAttributes() ?>>
<span id="el<?php echo $ambulancias_delete->RowCount ?>_ambulancias_tipo_translado" class="ambulancias_tipo_translado">
<span<?php echo $ambulancias_delete->tipo_translado->viewAttributes() ?>><?php echo $ambulancias_delete->tipo_translado->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ambulancias_delete->estado->Visible) { // estado ?>
		<td <?php echo $ambulancias_delete->estado->cellAttributes() ?>>
<span id="el<?php echo $ambulancias_delete->RowCount ?>_ambulancias_estado" class="ambulancias_estado">
<span<?php echo $ambulancias_delete->estado->viewAttributes() ?>><?php echo $ambulancias_delete->estado->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ambulancias_delete->ubicacion->Visible) { // ubicacion ?>
		<td <?php echo $ambulancias_delete->ubicacion->cellAttributes() ?>>
<span id="el<?php echo $ambulancias_delete->RowCount ?>_ambulancias_ubicacion" class="ambulancias_ubicacion">
<span<?php echo $ambulancias_delete->ubicacion->viewAttributes() ?>><?php echo $ambulancias_delete->ubicacion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ambulancias_delete->especial->Visible) { // especial ?>
		<td <?php echo $ambulancias_delete->especial->cellAttributes() ?>>
<span id="el<?php echo $ambulancias_delete->RowCount ?>_ambulancias_especial" class="ambulancias_especial">
<span<?php echo $ambulancias_delete->especial->viewAttributes() ?>><?php echo $ambulancias_delete->especial->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ambulancias_delete->Recordset->moveNext();
}
$ambulancias_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ambulancias_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ambulancias_delete->showPageFooter();
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
$ambulancias_delete->terminate();
?>