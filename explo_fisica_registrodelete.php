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
$explo_fisica_registro_delete = new explo_fisica_registro_delete();

// Run the page
$explo_fisica_registro_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$explo_fisica_registro_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fexplo_fisica_registrodelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fexplo_fisica_registrodelete = currentForm = new ew.Form("fexplo_fisica_registrodelete", "delete");
	loadjs.done("fexplo_fisica_registrodelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $explo_fisica_registro_delete->showPageHeader(); ?>
<?php
$explo_fisica_registro_delete->showMessage();
?>
<form name="fexplo_fisica_registrodelete" id="fexplo_fisica_registrodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="explo_fisica_registro">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($explo_fisica_registro_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($explo_fisica_registro_delete->id->Visible) { // id ?>
		<th class="<?php echo $explo_fisica_registro_delete->id->headerCellClass() ?>"><span id="elh_explo_fisica_registro_id" class="explo_fisica_registro_id"><?php echo $explo_fisica_registro_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($explo_fisica_registro_delete->id_trauma_fisico->Visible) { // id_trauma_fisico ?>
		<th class="<?php echo $explo_fisica_registro_delete->id_trauma_fisico->headerCellClass() ?>"><span id="elh_explo_fisica_registro_id_trauma_fisico" class="explo_fisica_registro_id_trauma_fisico"><?php echo $explo_fisica_registro_delete->id_trauma_fisico->caption() ?></span></th>
<?php } ?>
<?php if ($explo_fisica_registro_delete->posx->Visible) { // posx ?>
		<th class="<?php echo $explo_fisica_registro_delete->posx->headerCellClass() ?>"><span id="elh_explo_fisica_registro_posx" class="explo_fisica_registro_posx"><?php echo $explo_fisica_registro_delete->posx->caption() ?></span></th>
<?php } ?>
<?php if ($explo_fisica_registro_delete->posy->Visible) { // posy ?>
		<th class="<?php echo $explo_fisica_registro_delete->posy->headerCellClass() ?>"><span id="elh_explo_fisica_registro_posy" class="explo_fisica_registro_posy"><?php echo $explo_fisica_registro_delete->posy->caption() ?></span></th>
<?php } ?>
<?php if ($explo_fisica_registro_delete->pos->Visible) { // pos ?>
		<th class="<?php echo $explo_fisica_registro_delete->pos->headerCellClass() ?>"><span id="elh_explo_fisica_registro_pos" class="explo_fisica_registro_pos"><?php echo $explo_fisica_registro_delete->pos->caption() ?></span></th>
<?php } ?>
<?php if ($explo_fisica_registro_delete->cod_casopreh->Visible) { // cod_casopreh ?>
		<th class="<?php echo $explo_fisica_registro_delete->cod_casopreh->headerCellClass() ?>"><span id="elh_explo_fisica_registro_cod_casopreh" class="explo_fisica_registro_cod_casopreh"><?php echo $explo_fisica_registro_delete->cod_casopreh->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$explo_fisica_registro_delete->RecordCount = 0;
$i = 0;
while (!$explo_fisica_registro_delete->Recordset->EOF) {
	$explo_fisica_registro_delete->RecordCount++;
	$explo_fisica_registro_delete->RowCount++;

	// Set row properties
	$explo_fisica_registro->resetAttributes();
	$explo_fisica_registro->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$explo_fisica_registro_delete->loadRowValues($explo_fisica_registro_delete->Recordset);

	// Render row
	$explo_fisica_registro_delete->renderRow();
?>
	<tr <?php echo $explo_fisica_registro->rowAttributes() ?>>
<?php if ($explo_fisica_registro_delete->id->Visible) { // id ?>
		<td <?php echo $explo_fisica_registro_delete->id->cellAttributes() ?>>
<span id="el<?php echo $explo_fisica_registro_delete->RowCount ?>_explo_fisica_registro_id" class="explo_fisica_registro_id">
<span<?php echo $explo_fisica_registro_delete->id->viewAttributes() ?>><?php echo $explo_fisica_registro_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($explo_fisica_registro_delete->id_trauma_fisico->Visible) { // id_trauma_fisico ?>
		<td <?php echo $explo_fisica_registro_delete->id_trauma_fisico->cellAttributes() ?>>
<span id="el<?php echo $explo_fisica_registro_delete->RowCount ?>_explo_fisica_registro_id_trauma_fisico" class="explo_fisica_registro_id_trauma_fisico">
<span<?php echo $explo_fisica_registro_delete->id_trauma_fisico->viewAttributes() ?>><?php echo $explo_fisica_registro_delete->id_trauma_fisico->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($explo_fisica_registro_delete->posx->Visible) { // posx ?>
		<td <?php echo $explo_fisica_registro_delete->posx->cellAttributes() ?>>
<span id="el<?php echo $explo_fisica_registro_delete->RowCount ?>_explo_fisica_registro_posx" class="explo_fisica_registro_posx">
<span<?php echo $explo_fisica_registro_delete->posx->viewAttributes() ?>><?php echo $explo_fisica_registro_delete->posx->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($explo_fisica_registro_delete->posy->Visible) { // posy ?>
		<td <?php echo $explo_fisica_registro_delete->posy->cellAttributes() ?>>
<span id="el<?php echo $explo_fisica_registro_delete->RowCount ?>_explo_fisica_registro_posy" class="explo_fisica_registro_posy">
<span<?php echo $explo_fisica_registro_delete->posy->viewAttributes() ?>><?php echo $explo_fisica_registro_delete->posy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($explo_fisica_registro_delete->pos->Visible) { // pos ?>
		<td <?php echo $explo_fisica_registro_delete->pos->cellAttributes() ?>>
<span id="el<?php echo $explo_fisica_registro_delete->RowCount ?>_explo_fisica_registro_pos" class="explo_fisica_registro_pos">
<span<?php echo $explo_fisica_registro_delete->pos->viewAttributes() ?>><?php echo $explo_fisica_registro_delete->pos->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($explo_fisica_registro_delete->cod_casopreh->Visible) { // cod_casopreh ?>
		<td <?php echo $explo_fisica_registro_delete->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $explo_fisica_registro_delete->RowCount ?>_explo_fisica_registro_cod_casopreh" class="explo_fisica_registro_cod_casopreh">
<span<?php echo $explo_fisica_registro_delete->cod_casopreh->viewAttributes() ?>><?php echo $explo_fisica_registro_delete->cod_casopreh->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$explo_fisica_registro_delete->Recordset->moveNext();
}
$explo_fisica_registro_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $explo_fisica_registro_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$explo_fisica_registro_delete->showPageFooter();
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
$explo_fisica_registro_delete->terminate();
?>