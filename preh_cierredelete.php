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
$preh_cierre_delete = new preh_cierre_delete();

// Run the page
$preh_cierre_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_cierre_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpreh_cierredelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpreh_cierredelete = currentForm = new ew.Form("fpreh_cierredelete", "delete");
	loadjs.done("fpreh_cierredelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $preh_cierre_delete->showPageHeader(); ?>
<?php
$preh_cierre_delete->showMessage();
?>
<form name="fpreh_cierredelete" id="fpreh_cierredelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_cierre">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($preh_cierre_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($preh_cierre_delete->id_cierre->Visible) { // id_cierre ?>
		<th class="<?php echo $preh_cierre_delete->id_cierre->headerCellClass() ?>"><span id="elh_preh_cierre_id_cierre" class="preh_cierre_id_cierre"><?php echo $preh_cierre_delete->id_cierre->caption() ?></span></th>
<?php } ?>
<?php if ($preh_cierre_delete->nombrecierre->Visible) { // nombrecierre ?>
		<th class="<?php echo $preh_cierre_delete->nombrecierre->headerCellClass() ?>"><span id="elh_preh_cierre_nombrecierre" class="preh_cierre_nombrecierre"><?php echo $preh_cierre_delete->nombrecierre->caption() ?></span></th>
<?php } ?>
<?php if ($preh_cierre_delete->cod_casopreh->Visible) { // cod_casopreh ?>
		<th class="<?php echo $preh_cierre_delete->cod_casopreh->headerCellClass() ?>"><span id="elh_preh_cierre_cod_casopreh" class="preh_cierre_cod_casopreh"><?php echo $preh_cierre_delete->cod_casopreh->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$preh_cierre_delete->RecordCount = 0;
$i = 0;
while (!$preh_cierre_delete->Recordset->EOF) {
	$preh_cierre_delete->RecordCount++;
	$preh_cierre_delete->RowCount++;

	// Set row properties
	$preh_cierre->resetAttributes();
	$preh_cierre->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$preh_cierre_delete->loadRowValues($preh_cierre_delete->Recordset);

	// Render row
	$preh_cierre_delete->renderRow();
?>
	<tr <?php echo $preh_cierre->rowAttributes() ?>>
<?php if ($preh_cierre_delete->id_cierre->Visible) { // id_cierre ?>
		<td <?php echo $preh_cierre_delete->id_cierre->cellAttributes() ?>>
<span id="el<?php echo $preh_cierre_delete->RowCount ?>_preh_cierre_id_cierre" class="preh_cierre_id_cierre">
<span<?php echo $preh_cierre_delete->id_cierre->viewAttributes() ?>><?php echo $preh_cierre_delete->id_cierre->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_cierre_delete->nombrecierre->Visible) { // nombrecierre ?>
		<td <?php echo $preh_cierre_delete->nombrecierre->cellAttributes() ?>>
<span id="el<?php echo $preh_cierre_delete->RowCount ?>_preh_cierre_nombrecierre" class="preh_cierre_nombrecierre">
<span<?php echo $preh_cierre_delete->nombrecierre->viewAttributes() ?>><?php echo $preh_cierre_delete->nombrecierre->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_cierre_delete->cod_casopreh->Visible) { // cod_casopreh ?>
		<td <?php echo $preh_cierre_delete->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $preh_cierre_delete->RowCount ?>_preh_cierre_cod_casopreh" class="preh_cierre_cod_casopreh">
<span<?php echo $preh_cierre_delete->cod_casopreh->viewAttributes() ?>><?php echo $preh_cierre_delete->cod_casopreh->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$preh_cierre_delete->Recordset->moveNext();
}
$preh_cierre_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $preh_cierre_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$preh_cierre_delete->showPageFooter();
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
$preh_cierre_delete->terminate();
?>