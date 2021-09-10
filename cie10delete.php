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
$cie10_delete = new cie10_delete();

// Run the page
$cie10_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$cie10_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fcie10delete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fcie10delete = currentForm = new ew.Form("fcie10delete", "delete");
	loadjs.done("fcie10delete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $cie10_delete->showPageHeader(); ?>
<?php
$cie10_delete->showMessage();
?>
<form name="fcie10delete" id="fcie10delete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="cie10">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($cie10_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($cie10_delete->codigo_cie->Visible) { // codigo_cie ?>
		<th class="<?php echo $cie10_delete->codigo_cie->headerCellClass() ?>"><span id="elh_cie10_codigo_cie" class="cie10_codigo_cie"><?php echo $cie10_delete->codigo_cie->caption() ?></span></th>
<?php } ?>
<?php if ($cie10_delete->diagnostico->Visible) { // diagnostico ?>
		<th class="<?php echo $cie10_delete->diagnostico->headerCellClass() ?>"><span id="elh_cie10_diagnostico" class="cie10_diagnostico"><?php echo $cie10_delete->diagnostico->caption() ?></span></th>
<?php } ?>
<?php if ($cie10_delete->nivel->Visible) { // nivel ?>
		<th class="<?php echo $cie10_delete->nivel->headerCellClass() ?>"><span id="elh_cie10_nivel" class="cie10_nivel"><?php echo $cie10_delete->nivel->caption() ?></span></th>
<?php } ?>
<?php if ($cie10_delete->grupo->Visible) { // grupo ?>
		<th class="<?php echo $cie10_delete->grupo->headerCellClass() ?>"><span id="elh_cie10_grupo" class="cie10_grupo"><?php echo $cie10_delete->grupo->caption() ?></span></th>
<?php } ?>
<?php if ($cie10_delete->sexo->Visible) { // sexo ?>
		<th class="<?php echo $cie10_delete->sexo->headerCellClass() ?>"><span id="elh_cie10_sexo" class="cie10_sexo"><?php echo $cie10_delete->sexo->caption() ?></span></th>
<?php } ?>
<?php if ($cie10_delete->clasificacion->Visible) { // clasificacion ?>
		<th class="<?php echo $cie10_delete->clasificacion->headerCellClass() ?>"><span id="elh_cie10_clasificacion" class="cie10_clasificacion"><?php echo $cie10_delete->clasificacion->caption() ?></span></th>
<?php } ?>
<?php if ($cie10_delete->cod->Visible) { // cod ?>
		<th class="<?php echo $cie10_delete->cod->headerCellClass() ?>"><span id="elh_cie10_cod" class="cie10_cod"><?php echo $cie10_delete->cod->caption() ?></span></th>
<?php } ?>
<?php if ($cie10_delete->notifica->Visible) { // notifica ?>
		<th class="<?php echo $cie10_delete->notifica->headerCellClass() ?>"><span id="elh_cie10_notifica" class="cie10_notifica"><?php echo $cie10_delete->notifica->caption() ?></span></th>
<?php } ?>
<?php if ($cie10_delete->soat->Visible) { // soat ?>
		<th class="<?php echo $cie10_delete->soat->headerCellClass() ?>"><span id="elh_cie10_soat" class="cie10_soat"><?php echo $cie10_delete->soat->caption() ?></span></th>
<?php } ?>
<?php if ($cie10_delete->diagnostico_en->Visible) { // diagnostico_en ?>
		<th class="<?php echo $cie10_delete->diagnostico_en->headerCellClass() ?>"><span id="elh_cie10_diagnostico_en" class="cie10_diagnostico_en"><?php echo $cie10_delete->diagnostico_en->caption() ?></span></th>
<?php } ?>
<?php if ($cie10_delete->diagnostico_pr->Visible) { // diagnostico_pr ?>
		<th class="<?php echo $cie10_delete->diagnostico_pr->headerCellClass() ?>"><span id="elh_cie10_diagnostico_pr" class="cie10_diagnostico_pr"><?php echo $cie10_delete->diagnostico_pr->caption() ?></span></th>
<?php } ?>
<?php if ($cie10_delete->diagnostico_fr->Visible) { // diagnostico_fr ?>
		<th class="<?php echo $cie10_delete->diagnostico_fr->headerCellClass() ?>"><span id="elh_cie10_diagnostico_fr" class="cie10_diagnostico_fr"><?php echo $cie10_delete->diagnostico_fr->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$cie10_delete->RecordCount = 0;
$i = 0;
while (!$cie10_delete->Recordset->EOF) {
	$cie10_delete->RecordCount++;
	$cie10_delete->RowCount++;

	// Set row properties
	$cie10->resetAttributes();
	$cie10->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$cie10_delete->loadRowValues($cie10_delete->Recordset);

	// Render row
	$cie10_delete->renderRow();
?>
	<tr <?php echo $cie10->rowAttributes() ?>>
<?php if ($cie10_delete->codigo_cie->Visible) { // codigo_cie ?>
		<td <?php echo $cie10_delete->codigo_cie->cellAttributes() ?>>
<span id="el<?php echo $cie10_delete->RowCount ?>_cie10_codigo_cie" class="cie10_codigo_cie">
<span<?php echo $cie10_delete->codigo_cie->viewAttributes() ?>><?php echo $cie10_delete->codigo_cie->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cie10_delete->diagnostico->Visible) { // diagnostico ?>
		<td <?php echo $cie10_delete->diagnostico->cellAttributes() ?>>
<span id="el<?php echo $cie10_delete->RowCount ?>_cie10_diagnostico" class="cie10_diagnostico">
<span<?php echo $cie10_delete->diagnostico->viewAttributes() ?>><?php echo $cie10_delete->diagnostico->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cie10_delete->nivel->Visible) { // nivel ?>
		<td <?php echo $cie10_delete->nivel->cellAttributes() ?>>
<span id="el<?php echo $cie10_delete->RowCount ?>_cie10_nivel" class="cie10_nivel">
<span<?php echo $cie10_delete->nivel->viewAttributes() ?>><?php echo $cie10_delete->nivel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cie10_delete->grupo->Visible) { // grupo ?>
		<td <?php echo $cie10_delete->grupo->cellAttributes() ?>>
<span id="el<?php echo $cie10_delete->RowCount ?>_cie10_grupo" class="cie10_grupo">
<span<?php echo $cie10_delete->grupo->viewAttributes() ?>><?php echo $cie10_delete->grupo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cie10_delete->sexo->Visible) { // sexo ?>
		<td <?php echo $cie10_delete->sexo->cellAttributes() ?>>
<span id="el<?php echo $cie10_delete->RowCount ?>_cie10_sexo" class="cie10_sexo">
<span<?php echo $cie10_delete->sexo->viewAttributes() ?>><?php echo $cie10_delete->sexo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cie10_delete->clasificacion->Visible) { // clasificacion ?>
		<td <?php echo $cie10_delete->clasificacion->cellAttributes() ?>>
<span id="el<?php echo $cie10_delete->RowCount ?>_cie10_clasificacion" class="cie10_clasificacion">
<span<?php echo $cie10_delete->clasificacion->viewAttributes() ?>><?php echo $cie10_delete->clasificacion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cie10_delete->cod->Visible) { // cod ?>
		<td <?php echo $cie10_delete->cod->cellAttributes() ?>>
<span id="el<?php echo $cie10_delete->RowCount ?>_cie10_cod" class="cie10_cod">
<span<?php echo $cie10_delete->cod->viewAttributes() ?>><?php echo $cie10_delete->cod->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cie10_delete->notifica->Visible) { // notifica ?>
		<td <?php echo $cie10_delete->notifica->cellAttributes() ?>>
<span id="el<?php echo $cie10_delete->RowCount ?>_cie10_notifica" class="cie10_notifica">
<span<?php echo $cie10_delete->notifica->viewAttributes() ?>><?php echo $cie10_delete->notifica->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cie10_delete->soat->Visible) { // soat ?>
		<td <?php echo $cie10_delete->soat->cellAttributes() ?>>
<span id="el<?php echo $cie10_delete->RowCount ?>_cie10_soat" class="cie10_soat">
<span<?php echo $cie10_delete->soat->viewAttributes() ?>><?php echo $cie10_delete->soat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cie10_delete->diagnostico_en->Visible) { // diagnostico_en ?>
		<td <?php echo $cie10_delete->diagnostico_en->cellAttributes() ?>>
<span id="el<?php echo $cie10_delete->RowCount ?>_cie10_diagnostico_en" class="cie10_diagnostico_en">
<span<?php echo $cie10_delete->diagnostico_en->viewAttributes() ?>><?php echo $cie10_delete->diagnostico_en->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cie10_delete->diagnostico_pr->Visible) { // diagnostico_pr ?>
		<td <?php echo $cie10_delete->diagnostico_pr->cellAttributes() ?>>
<span id="el<?php echo $cie10_delete->RowCount ?>_cie10_diagnostico_pr" class="cie10_diagnostico_pr">
<span<?php echo $cie10_delete->diagnostico_pr->viewAttributes() ?>><?php echo $cie10_delete->diagnostico_pr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($cie10_delete->diagnostico_fr->Visible) { // diagnostico_fr ?>
		<td <?php echo $cie10_delete->diagnostico_fr->cellAttributes() ?>>
<span id="el<?php echo $cie10_delete->RowCount ?>_cie10_diagnostico_fr" class="cie10_diagnostico_fr">
<span<?php echo $cie10_delete->diagnostico_fr->viewAttributes() ?>><?php echo $cie10_delete->diagnostico_fr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$cie10_delete->Recordset->moveNext();
}
$cie10_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $cie10_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$cie10_delete->showPageFooter();
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
$cie10_delete->terminate();
?>