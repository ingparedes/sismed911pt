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
$antecedentes_registro_delete = new antecedentes_registro_delete();

// Run the page
$antecedentes_registro_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$antecedentes_registro_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fantecedentes_registrodelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fantecedentes_registrodelete = currentForm = new ew.Form("fantecedentes_registrodelete", "delete");
	loadjs.done("fantecedentes_registrodelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $antecedentes_registro_delete->showPageHeader(); ?>
<?php
$antecedentes_registro_delete->showMessage();
?>
<form name="fantecedentes_registrodelete" id="fantecedentes_registrodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="antecedentes_registro">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($antecedentes_registro_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($antecedentes_registro_delete->id->Visible) { // id ?>
		<th class="<?php echo $antecedentes_registro_delete->id->headerCellClass() ?>"><span id="elh_antecedentes_registro_id" class="antecedentes_registro_id"><?php echo $antecedentes_registro_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($antecedentes_registro_delete->cod_casopreh->Visible) { // cod_casopreh ?>
		<th class="<?php echo $antecedentes_registro_delete->cod_casopreh->headerCellClass() ?>"><span id="elh_antecedentes_registro_cod_casopreh" class="antecedentes_registro_cod_casopreh"><?php echo $antecedentes_registro_delete->cod_casopreh->caption() ?></span></th>
<?php } ?>
<?php if ($antecedentes_registro_delete->diabetes->Visible) { // diabetes ?>
		<th class="<?php echo $antecedentes_registro_delete->diabetes->headerCellClass() ?>"><span id="elh_antecedentes_registro_diabetes" class="antecedentes_registro_diabetes"><?php echo $antecedentes_registro_delete->diabetes->caption() ?></span></th>
<?php } ?>
<?php if ($antecedentes_registro_delete->cardiopatia->Visible) { // cardiopatia ?>
		<th class="<?php echo $antecedentes_registro_delete->cardiopatia->headerCellClass() ?>"><span id="elh_antecedentes_registro_cardiopatia" class="antecedentes_registro_cardiopatia"><?php echo $antecedentes_registro_delete->cardiopatia->caption() ?></span></th>
<?php } ?>
<?php if ($antecedentes_registro_delete->convulsiones->Visible) { // convulsiones ?>
		<th class="<?php echo $antecedentes_registro_delete->convulsiones->headerCellClass() ?>"><span id="elh_antecedentes_registro_convulsiones" class="antecedentes_registro_convulsiones"><?php echo $antecedentes_registro_delete->convulsiones->caption() ?></span></th>
<?php } ?>
<?php if ($antecedentes_registro_delete->asmabronquitis->Visible) { // asmabronquitis ?>
		<th class="<?php echo $antecedentes_registro_delete->asmabronquitis->headerCellClass() ?>"><span id="elh_antecedentes_registro_asmabronquitis" class="antecedentes_registro_asmabronquitis"><?php echo $antecedentes_registro_delete->asmabronquitis->caption() ?></span></th>
<?php } ?>
<?php if ($antecedentes_registro_delete->acv->Visible) { // acv ?>
		<th class="<?php echo $antecedentes_registro_delete->acv->headerCellClass() ?>"><span id="elh_antecedentes_registro_acv" class="antecedentes_registro_acv"><?php echo $antecedentes_registro_delete->acv->caption() ?></span></th>
<?php } ?>
<?php if ($antecedentes_registro_delete->has->Visible) { // has ?>
		<th class="<?php echo $antecedentes_registro_delete->has->headerCellClass() ?>"><span id="elh_antecedentes_registro_has" class="antecedentes_registro_has"><?php echo $antecedentes_registro_delete->has->caption() ?></span></th>
<?php } ?>
<?php if ($antecedentes_registro_delete->alergia->Visible) { // alergia ?>
		<th class="<?php echo $antecedentes_registro_delete->alergia->headerCellClass() ?>"><span id="elh_antecedentes_registro_alergia" class="antecedentes_registro_alergia"><?php echo $antecedentes_registro_delete->alergia->caption() ?></span></th>
<?php } ?>
<?php if ($antecedentes_registro_delete->medicamentos->Visible) { // medicamentos ?>
		<th class="<?php echo $antecedentes_registro_delete->medicamentos->headerCellClass() ?>"><span id="elh_antecedentes_registro_medicamentos" class="antecedentes_registro_medicamentos"><?php echo $antecedentes_registro_delete->medicamentos->caption() ?></span></th>
<?php } ?>
<?php if ($antecedentes_registro_delete->otros->Visible) { // otros ?>
		<th class="<?php echo $antecedentes_registro_delete->otros->headerCellClass() ?>"><span id="elh_antecedentes_registro_otros" class="antecedentes_registro_otros"><?php echo $antecedentes_registro_delete->otros->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$antecedentes_registro_delete->RecordCount = 0;
$i = 0;
while (!$antecedentes_registro_delete->Recordset->EOF) {
	$antecedentes_registro_delete->RecordCount++;
	$antecedentes_registro_delete->RowCount++;

	// Set row properties
	$antecedentes_registro->resetAttributes();
	$antecedentes_registro->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$antecedentes_registro_delete->loadRowValues($antecedentes_registro_delete->Recordset);

	// Render row
	$antecedentes_registro_delete->renderRow();
?>
	<tr <?php echo $antecedentes_registro->rowAttributes() ?>>
<?php if ($antecedentes_registro_delete->id->Visible) { // id ?>
		<td <?php echo $antecedentes_registro_delete->id->cellAttributes() ?>>
<span id="el<?php echo $antecedentes_registro_delete->RowCount ?>_antecedentes_registro_id" class="antecedentes_registro_id">
<span<?php echo $antecedentes_registro_delete->id->viewAttributes() ?>><?php echo $antecedentes_registro_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($antecedentes_registro_delete->cod_casopreh->Visible) { // cod_casopreh ?>
		<td <?php echo $antecedentes_registro_delete->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $antecedentes_registro_delete->RowCount ?>_antecedentes_registro_cod_casopreh" class="antecedentes_registro_cod_casopreh">
<span<?php echo $antecedentes_registro_delete->cod_casopreh->viewAttributes() ?>><?php echo $antecedentes_registro_delete->cod_casopreh->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($antecedentes_registro_delete->diabetes->Visible) { // diabetes ?>
		<td <?php echo $antecedentes_registro_delete->diabetes->cellAttributes() ?>>
<span id="el<?php echo $antecedentes_registro_delete->RowCount ?>_antecedentes_registro_diabetes" class="antecedentes_registro_diabetes">
<span<?php echo $antecedentes_registro_delete->diabetes->viewAttributes() ?>><?php echo $antecedentes_registro_delete->diabetes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($antecedentes_registro_delete->cardiopatia->Visible) { // cardiopatia ?>
		<td <?php echo $antecedentes_registro_delete->cardiopatia->cellAttributes() ?>>
<span id="el<?php echo $antecedentes_registro_delete->RowCount ?>_antecedentes_registro_cardiopatia" class="antecedentes_registro_cardiopatia">
<span<?php echo $antecedentes_registro_delete->cardiopatia->viewAttributes() ?>><?php echo $antecedentes_registro_delete->cardiopatia->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($antecedentes_registro_delete->convulsiones->Visible) { // convulsiones ?>
		<td <?php echo $antecedentes_registro_delete->convulsiones->cellAttributes() ?>>
<span id="el<?php echo $antecedentes_registro_delete->RowCount ?>_antecedentes_registro_convulsiones" class="antecedentes_registro_convulsiones">
<span<?php echo $antecedentes_registro_delete->convulsiones->viewAttributes() ?>><?php echo $antecedentes_registro_delete->convulsiones->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($antecedentes_registro_delete->asmabronquitis->Visible) { // asmabronquitis ?>
		<td <?php echo $antecedentes_registro_delete->asmabronquitis->cellAttributes() ?>>
<span id="el<?php echo $antecedentes_registro_delete->RowCount ?>_antecedentes_registro_asmabronquitis" class="antecedentes_registro_asmabronquitis">
<span<?php echo $antecedentes_registro_delete->asmabronquitis->viewAttributes() ?>><?php echo $antecedentes_registro_delete->asmabronquitis->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($antecedentes_registro_delete->acv->Visible) { // acv ?>
		<td <?php echo $antecedentes_registro_delete->acv->cellAttributes() ?>>
<span id="el<?php echo $antecedentes_registro_delete->RowCount ?>_antecedentes_registro_acv" class="antecedentes_registro_acv">
<span<?php echo $antecedentes_registro_delete->acv->viewAttributes() ?>><?php echo $antecedentes_registro_delete->acv->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($antecedentes_registro_delete->has->Visible) { // has ?>
		<td <?php echo $antecedentes_registro_delete->has->cellAttributes() ?>>
<span id="el<?php echo $antecedentes_registro_delete->RowCount ?>_antecedentes_registro_has" class="antecedentes_registro_has">
<span<?php echo $antecedentes_registro_delete->has->viewAttributes() ?>><?php echo $antecedentes_registro_delete->has->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($antecedentes_registro_delete->alergia->Visible) { // alergia ?>
		<td <?php echo $antecedentes_registro_delete->alergia->cellAttributes() ?>>
<span id="el<?php echo $antecedentes_registro_delete->RowCount ?>_antecedentes_registro_alergia" class="antecedentes_registro_alergia">
<span<?php echo $antecedentes_registro_delete->alergia->viewAttributes() ?>><?php echo $antecedentes_registro_delete->alergia->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($antecedentes_registro_delete->medicamentos->Visible) { // medicamentos ?>
		<td <?php echo $antecedentes_registro_delete->medicamentos->cellAttributes() ?>>
<span id="el<?php echo $antecedentes_registro_delete->RowCount ?>_antecedentes_registro_medicamentos" class="antecedentes_registro_medicamentos">
<span<?php echo $antecedentes_registro_delete->medicamentos->viewAttributes() ?>><?php echo $antecedentes_registro_delete->medicamentos->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($antecedentes_registro_delete->otros->Visible) { // otros ?>
		<td <?php echo $antecedentes_registro_delete->otros->cellAttributes() ?>>
<span id="el<?php echo $antecedentes_registro_delete->RowCount ?>_antecedentes_registro_otros" class="antecedentes_registro_otros">
<span<?php echo $antecedentes_registro_delete->otros->viewAttributes() ?>><?php echo $antecedentes_registro_delete->otros->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$antecedentes_registro_delete->Recordset->moveNext();
}
$antecedentes_registro_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $antecedentes_registro_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$antecedentes_registro_delete->showPageFooter();
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
$antecedentes_registro_delete->terminate();
?>