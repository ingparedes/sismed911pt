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
$obstetrico_registro_delete = new obstetrico_registro_delete();

// Run the page
$obstetrico_registro_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$obstetrico_registro_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fobstetrico_registrodelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fobstetrico_registrodelete = currentForm = new ew.Form("fobstetrico_registrodelete", "delete");
	loadjs.done("fobstetrico_registrodelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $obstetrico_registro_delete->showPageHeader(); ?>
<?php
$obstetrico_registro_delete->showMessage();
?>
<form name="fobstetrico_registrodelete" id="fobstetrico_registrodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="obstetrico_registro">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($obstetrico_registro_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($obstetrico_registro_delete->id->Visible) { // id ?>
		<th class="<?php echo $obstetrico_registro_delete->id->headerCellClass() ?>"><span id="elh_obstetrico_registro_id" class="obstetrico_registro_id"><?php echo $obstetrico_registro_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($obstetrico_registro_delete->cod_casopreh->Visible) { // cod_casopreh ?>
		<th class="<?php echo $obstetrico_registro_delete->cod_casopreh->headerCellClass() ?>"><span id="elh_obstetrico_registro_cod_casopreh" class="obstetrico_registro_cod_casopreh"><?php echo $obstetrico_registro_delete->cod_casopreh->caption() ?></span></th>
<?php } ?>
<?php if ($obstetrico_registro_delete->trabajoparto->Visible) { // trabajoparto ?>
		<th class="<?php echo $obstetrico_registro_delete->trabajoparto->headerCellClass() ?>"><span id="elh_obstetrico_registro_trabajoparto" class="obstetrico_registro_trabajoparto"><?php echo $obstetrico_registro_delete->trabajoparto->caption() ?></span></th>
<?php } ?>
<?php if ($obstetrico_registro_delete->sangradovaginal->Visible) { // sangradovaginal ?>
		<th class="<?php echo $obstetrico_registro_delete->sangradovaginal->headerCellClass() ?>"><span id="elh_obstetrico_registro_sangradovaginal" class="obstetrico_registro_sangradovaginal"><?php echo $obstetrico_registro_delete->sangradovaginal->caption() ?></span></th>
<?php } ?>
<?php if ($obstetrico_registro_delete->g->Visible) { // g ?>
		<th class="<?php echo $obstetrico_registro_delete->g->headerCellClass() ?>"><span id="elh_obstetrico_registro_g" class="obstetrico_registro_g"><?php echo $obstetrico_registro_delete->g->caption() ?></span></th>
<?php } ?>
<?php if ($obstetrico_registro_delete->p->Visible) { // p ?>
		<th class="<?php echo $obstetrico_registro_delete->p->headerCellClass() ?>"><span id="elh_obstetrico_registro_p" class="obstetrico_registro_p"><?php echo $obstetrico_registro_delete->p->caption() ?></span></th>
<?php } ?>
<?php if ($obstetrico_registro_delete->a->Visible) { // a ?>
		<th class="<?php echo $obstetrico_registro_delete->a->headerCellClass() ?>"><span id="elh_obstetrico_registro_a" class="obstetrico_registro_a"><?php echo $obstetrico_registro_delete->a->caption() ?></span></th>
<?php } ?>
<?php if ($obstetrico_registro_delete->n->Visible) { // n ?>
		<th class="<?php echo $obstetrico_registro_delete->n->headerCellClass() ?>"><span id="elh_obstetrico_registro_n" class="obstetrico_registro_n"><?php echo $obstetrico_registro_delete->n->caption() ?></span></th>
<?php } ?>
<?php if ($obstetrico_registro_delete->c->Visible) { // c ?>
		<th class="<?php echo $obstetrico_registro_delete->c->headerCellClass() ?>"><span id="elh_obstetrico_registro_c" class="obstetrico_registro_c"><?php echo $obstetrico_registro_delete->c->caption() ?></span></th>
<?php } ?>
<?php if ($obstetrico_registro_delete->fuente->Visible) { // fuente ?>
		<th class="<?php echo $obstetrico_registro_delete->fuente->headerCellClass() ?>"><span id="elh_obstetrico_registro_fuente" class="obstetrico_registro_fuente"><?php echo $obstetrico_registro_delete->fuente->caption() ?></span></th>
<?php } ?>
<?php if ($obstetrico_registro_delete->tiempo->Visible) { // tiempo ?>
		<th class="<?php echo $obstetrico_registro_delete->tiempo->headerCellClass() ?>"><span id="elh_obstetrico_registro_tiempo" class="obstetrico_registro_tiempo"><?php echo $obstetrico_registro_delete->tiempo->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$obstetrico_registro_delete->RecordCount = 0;
$i = 0;
while (!$obstetrico_registro_delete->Recordset->EOF) {
	$obstetrico_registro_delete->RecordCount++;
	$obstetrico_registro_delete->RowCount++;

	// Set row properties
	$obstetrico_registro->resetAttributes();
	$obstetrico_registro->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$obstetrico_registro_delete->loadRowValues($obstetrico_registro_delete->Recordset);

	// Render row
	$obstetrico_registro_delete->renderRow();
?>
	<tr <?php echo $obstetrico_registro->rowAttributes() ?>>
<?php if ($obstetrico_registro_delete->id->Visible) { // id ?>
		<td <?php echo $obstetrico_registro_delete->id->cellAttributes() ?>>
<span id="el<?php echo $obstetrico_registro_delete->RowCount ?>_obstetrico_registro_id" class="obstetrico_registro_id">
<span<?php echo $obstetrico_registro_delete->id->viewAttributes() ?>><?php echo $obstetrico_registro_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($obstetrico_registro_delete->cod_casopreh->Visible) { // cod_casopreh ?>
		<td <?php echo $obstetrico_registro_delete->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $obstetrico_registro_delete->RowCount ?>_obstetrico_registro_cod_casopreh" class="obstetrico_registro_cod_casopreh">
<span<?php echo $obstetrico_registro_delete->cod_casopreh->viewAttributes() ?>><?php echo $obstetrico_registro_delete->cod_casopreh->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($obstetrico_registro_delete->trabajoparto->Visible) { // trabajoparto ?>
		<td <?php echo $obstetrico_registro_delete->trabajoparto->cellAttributes() ?>>
<span id="el<?php echo $obstetrico_registro_delete->RowCount ?>_obstetrico_registro_trabajoparto" class="obstetrico_registro_trabajoparto">
<span<?php echo $obstetrico_registro_delete->trabajoparto->viewAttributes() ?>><?php echo $obstetrico_registro_delete->trabajoparto->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($obstetrico_registro_delete->sangradovaginal->Visible) { // sangradovaginal ?>
		<td <?php echo $obstetrico_registro_delete->sangradovaginal->cellAttributes() ?>>
<span id="el<?php echo $obstetrico_registro_delete->RowCount ?>_obstetrico_registro_sangradovaginal" class="obstetrico_registro_sangradovaginal">
<span<?php echo $obstetrico_registro_delete->sangradovaginal->viewAttributes() ?>><?php echo $obstetrico_registro_delete->sangradovaginal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($obstetrico_registro_delete->g->Visible) { // g ?>
		<td <?php echo $obstetrico_registro_delete->g->cellAttributes() ?>>
<span id="el<?php echo $obstetrico_registro_delete->RowCount ?>_obstetrico_registro_g" class="obstetrico_registro_g">
<span<?php echo $obstetrico_registro_delete->g->viewAttributes() ?>><?php echo $obstetrico_registro_delete->g->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($obstetrico_registro_delete->p->Visible) { // p ?>
		<td <?php echo $obstetrico_registro_delete->p->cellAttributes() ?>>
<span id="el<?php echo $obstetrico_registro_delete->RowCount ?>_obstetrico_registro_p" class="obstetrico_registro_p">
<span<?php echo $obstetrico_registro_delete->p->viewAttributes() ?>><?php echo $obstetrico_registro_delete->p->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($obstetrico_registro_delete->a->Visible) { // a ?>
		<td <?php echo $obstetrico_registro_delete->a->cellAttributes() ?>>
<span id="el<?php echo $obstetrico_registro_delete->RowCount ?>_obstetrico_registro_a" class="obstetrico_registro_a">
<span<?php echo $obstetrico_registro_delete->a->viewAttributes() ?>><?php echo $obstetrico_registro_delete->a->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($obstetrico_registro_delete->n->Visible) { // n ?>
		<td <?php echo $obstetrico_registro_delete->n->cellAttributes() ?>>
<span id="el<?php echo $obstetrico_registro_delete->RowCount ?>_obstetrico_registro_n" class="obstetrico_registro_n">
<span<?php echo $obstetrico_registro_delete->n->viewAttributes() ?>><?php echo $obstetrico_registro_delete->n->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($obstetrico_registro_delete->c->Visible) { // c ?>
		<td <?php echo $obstetrico_registro_delete->c->cellAttributes() ?>>
<span id="el<?php echo $obstetrico_registro_delete->RowCount ?>_obstetrico_registro_c" class="obstetrico_registro_c">
<span<?php echo $obstetrico_registro_delete->c->viewAttributes() ?>><?php echo $obstetrico_registro_delete->c->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($obstetrico_registro_delete->fuente->Visible) { // fuente ?>
		<td <?php echo $obstetrico_registro_delete->fuente->cellAttributes() ?>>
<span id="el<?php echo $obstetrico_registro_delete->RowCount ?>_obstetrico_registro_fuente" class="obstetrico_registro_fuente">
<span<?php echo $obstetrico_registro_delete->fuente->viewAttributes() ?>><?php echo $obstetrico_registro_delete->fuente->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($obstetrico_registro_delete->tiempo->Visible) { // tiempo ?>
		<td <?php echo $obstetrico_registro_delete->tiempo->cellAttributes() ?>>
<span id="el<?php echo $obstetrico_registro_delete->RowCount ?>_obstetrico_registro_tiempo" class="obstetrico_registro_tiempo">
<span<?php echo $obstetrico_registro_delete->tiempo->viewAttributes() ?>><?php echo $obstetrico_registro_delete->tiempo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$obstetrico_registro_delete->Recordset->moveNext();
}
$obstetrico_registro_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $obstetrico_registro_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$obstetrico_registro_delete->showPageFooter();
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
$obstetrico_registro_delete->terminate();
?>