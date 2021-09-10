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
$triage_delete = new triage_delete();

// Run the page
$triage_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$triage_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftriagedelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ftriagedelete = currentForm = new ew.Form("ftriagedelete", "delete");
	loadjs.done("ftriagedelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $triage_delete->showPageHeader(); ?>
<?php
$triage_delete->showMessage();
?>
<form name="ftriagedelete" id="ftriagedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="triage">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($triage_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($triage_delete->id_triage->Visible) { // id_triage ?>
		<th class="<?php echo $triage_delete->id_triage->headerCellClass() ?>"><span id="elh_triage_id_triage" class="triage_id_triage"><?php echo $triage_delete->id_triage->caption() ?></span></th>
<?php } ?>
<?php if ($triage_delete->nombre_triage_es->Visible) { // nombre_triage_es ?>
		<th class="<?php echo $triage_delete->nombre_triage_es->headerCellClass() ?>"><span id="elh_triage_nombre_triage_es" class="triage_nombre_triage_es"><?php echo $triage_delete->nombre_triage_es->caption() ?></span></th>
<?php } ?>
<?php if ($triage_delete->nombre_triage_en->Visible) { // nombre_triage_en ?>
		<th class="<?php echo $triage_delete->nombre_triage_en->headerCellClass() ?>"><span id="elh_triage_nombre_triage_en" class="triage_nombre_triage_en"><?php echo $triage_delete->nombre_triage_en->caption() ?></span></th>
<?php } ?>
<?php if ($triage_delete->nombre_triage_pr->Visible) { // nombre_triage_pr ?>
		<th class="<?php echo $triage_delete->nombre_triage_pr->headerCellClass() ?>"><span id="elh_triage_nombre_triage_pr" class="triage_nombre_triage_pr"><?php echo $triage_delete->nombre_triage_pr->caption() ?></span></th>
<?php } ?>
<?php if ($triage_delete->nombre_triage_fr->Visible) { // nombre_triage_fr ?>
		<th class="<?php echo $triage_delete->nombre_triage_fr->headerCellClass() ?>"><span id="elh_triage_nombre_triage_fr" class="triage_nombre_triage_fr"><?php echo $triage_delete->nombre_triage_fr->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$triage_delete->RecordCount = 0;
$i = 0;
while (!$triage_delete->Recordset->EOF) {
	$triage_delete->RecordCount++;
	$triage_delete->RowCount++;

	// Set row properties
	$triage->resetAttributes();
	$triage->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$triage_delete->loadRowValues($triage_delete->Recordset);

	// Render row
	$triage_delete->renderRow();
?>
	<tr <?php echo $triage->rowAttributes() ?>>
<?php if ($triage_delete->id_triage->Visible) { // id_triage ?>
		<td <?php echo $triage_delete->id_triage->cellAttributes() ?>>
<span id="el<?php echo $triage_delete->RowCount ?>_triage_id_triage" class="triage_id_triage">
<span<?php echo $triage_delete->id_triage->viewAttributes() ?>><?php echo $triage_delete->id_triage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($triage_delete->nombre_triage_es->Visible) { // nombre_triage_es ?>
		<td <?php echo $triage_delete->nombre_triage_es->cellAttributes() ?>>
<span id="el<?php echo $triage_delete->RowCount ?>_triage_nombre_triage_es" class="triage_nombre_triage_es">
<span<?php echo $triage_delete->nombre_triage_es->viewAttributes() ?>><?php echo $triage_delete->nombre_triage_es->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($triage_delete->nombre_triage_en->Visible) { // nombre_triage_en ?>
		<td <?php echo $triage_delete->nombre_triage_en->cellAttributes() ?>>
<span id="el<?php echo $triage_delete->RowCount ?>_triage_nombre_triage_en" class="triage_nombre_triage_en">
<span<?php echo $triage_delete->nombre_triage_en->viewAttributes() ?>><?php echo $triage_delete->nombre_triage_en->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($triage_delete->nombre_triage_pr->Visible) { // nombre_triage_pr ?>
		<td <?php echo $triage_delete->nombre_triage_pr->cellAttributes() ?>>
<span id="el<?php echo $triage_delete->RowCount ?>_triage_nombre_triage_pr" class="triage_nombre_triage_pr">
<span<?php echo $triage_delete->nombre_triage_pr->viewAttributes() ?>><?php echo $triage_delete->nombre_triage_pr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($triage_delete->nombre_triage_fr->Visible) { // nombre_triage_fr ?>
		<td <?php echo $triage_delete->nombre_triage_fr->cellAttributes() ?>>
<span id="el<?php echo $triage_delete->RowCount ?>_triage_nombre_triage_fr" class="triage_nombre_triage_fr">
<span<?php echo $triage_delete->nombre_triage_fr->viewAttributes() ?>><?php echo $triage_delete->nombre_triage_fr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$triage_delete->Recordset->moveNext();
}
$triage_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $triage_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$triage_delete->showPageFooter();
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
$triage_delete->terminate();
?>