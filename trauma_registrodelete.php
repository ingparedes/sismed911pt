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
$trauma_registro_delete = new trauma_registro_delete();

// Run the page
$trauma_registro_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$trauma_registro_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftrauma_registrodelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ftrauma_registrodelete = currentForm = new ew.Form("ftrauma_registrodelete", "delete");
	loadjs.done("ftrauma_registrodelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $trauma_registro_delete->showPageHeader(); ?>
<?php
$trauma_registro_delete->showMessage();
?>
<form name="ftrauma_registrodelete" id="ftrauma_registrodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="trauma_registro">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($trauma_registro_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($trauma_registro_delete->id->Visible) { // id ?>
		<th class="<?php echo $trauma_registro_delete->id->headerCellClass() ?>"><span id="elh_trauma_registro_id" class="trauma_registro_id"><?php echo $trauma_registro_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($trauma_registro_delete->cod_casopreh->Visible) { // cod_casopreh ?>
		<th class="<?php echo $trauma_registro_delete->cod_casopreh->headerCellClass() ?>"><span id="elh_trauma_registro_cod_casopreh" class="trauma_registro_cod_casopreh"><?php echo $trauma_registro_delete->cod_casopreh->caption() ?></span></th>
<?php } ?>
<?php if ($trauma_registro_delete->causa_trauma_registro->Visible) { // causa_trauma_registro ?>
		<th class="<?php echo $trauma_registro_delete->causa_trauma_registro->headerCellClass() ?>"><span id="elh_trauma_registro_causa_trauma_registro" class="trauma_registro_causa_trauma_registro"><?php echo $trauma_registro_delete->causa_trauma_registro->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$trauma_registro_delete->RecordCount = 0;
$i = 0;
while (!$trauma_registro_delete->Recordset->EOF) {
	$trauma_registro_delete->RecordCount++;
	$trauma_registro_delete->RowCount++;

	// Set row properties
	$trauma_registro->resetAttributes();
	$trauma_registro->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$trauma_registro_delete->loadRowValues($trauma_registro_delete->Recordset);

	// Render row
	$trauma_registro_delete->renderRow();
?>
	<tr <?php echo $trauma_registro->rowAttributes() ?>>
<?php if ($trauma_registro_delete->id->Visible) { // id ?>
		<td <?php echo $trauma_registro_delete->id->cellAttributes() ?>>
<span id="el<?php echo $trauma_registro_delete->RowCount ?>_trauma_registro_id" class="trauma_registro_id">
<span<?php echo $trauma_registro_delete->id->viewAttributes() ?>><?php echo $trauma_registro_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($trauma_registro_delete->cod_casopreh->Visible) { // cod_casopreh ?>
		<td <?php echo $trauma_registro_delete->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $trauma_registro_delete->RowCount ?>_trauma_registro_cod_casopreh" class="trauma_registro_cod_casopreh">
<span<?php echo $trauma_registro_delete->cod_casopreh->viewAttributes() ?>><?php echo $trauma_registro_delete->cod_casopreh->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($trauma_registro_delete->causa_trauma_registro->Visible) { // causa_trauma_registro ?>
		<td <?php echo $trauma_registro_delete->causa_trauma_registro->cellAttributes() ?>>
<span id="el<?php echo $trauma_registro_delete->RowCount ?>_trauma_registro_causa_trauma_registro" class="trauma_registro_causa_trauma_registro">
<span<?php echo $trauma_registro_delete->causa_trauma_registro->viewAttributes() ?>><?php echo $trauma_registro_delete->causa_trauma_registro->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$trauma_registro_delete->Recordset->moveNext();
}
$trauma_registro_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $trauma_registro_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$trauma_registro_delete->showPageFooter();
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
$trauma_registro_delete->terminate();
?>