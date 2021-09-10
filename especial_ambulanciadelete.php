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
$especial_ambulancia_delete = new especial_ambulancia_delete();

// Run the page
$especial_ambulancia_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$especial_ambulancia_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fespecial_ambulanciadelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fespecial_ambulanciadelete = currentForm = new ew.Form("fespecial_ambulanciadelete", "delete");
	loadjs.done("fespecial_ambulanciadelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $especial_ambulancia_delete->showPageHeader(); ?>
<?php
$especial_ambulancia_delete->showMessage();
?>
<form name="fespecial_ambulanciadelete" id="fespecial_ambulanciadelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="especial_ambulancia">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($especial_ambulancia_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($especial_ambulancia_delete->id_especialambulancia->Visible) { // id_especialambulancia ?>
		<th class="<?php echo $especial_ambulancia_delete->id_especialambulancia->headerCellClass() ?>"><span id="elh_especial_ambulancia_id_especialambulancia" class="especial_ambulancia_id_especialambulancia"><?php echo $especial_ambulancia_delete->id_especialambulancia->caption() ?></span></th>
<?php } ?>
<?php if ($especial_ambulancia_delete->especial_es->Visible) { // especial_es ?>
		<th class="<?php echo $especial_ambulancia_delete->especial_es->headerCellClass() ?>"><span id="elh_especial_ambulancia_especial_es" class="especial_ambulancia_especial_es"><?php echo $especial_ambulancia_delete->especial_es->caption() ?></span></th>
<?php } ?>
<?php if ($especial_ambulancia_delete->especial_en->Visible) { // especial_en ?>
		<th class="<?php echo $especial_ambulancia_delete->especial_en->headerCellClass() ?>"><span id="elh_especial_ambulancia_especial_en" class="especial_ambulancia_especial_en"><?php echo $especial_ambulancia_delete->especial_en->caption() ?></span></th>
<?php } ?>
<?php if ($especial_ambulancia_delete->especial_pr->Visible) { // especial_pr ?>
		<th class="<?php echo $especial_ambulancia_delete->especial_pr->headerCellClass() ?>"><span id="elh_especial_ambulancia_especial_pr" class="especial_ambulancia_especial_pr"><?php echo $especial_ambulancia_delete->especial_pr->caption() ?></span></th>
<?php } ?>
<?php if ($especial_ambulancia_delete->especial_fr->Visible) { // especial_fr ?>
		<th class="<?php echo $especial_ambulancia_delete->especial_fr->headerCellClass() ?>"><span id="elh_especial_ambulancia_especial_fr" class="especial_ambulancia_especial_fr"><?php echo $especial_ambulancia_delete->especial_fr->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$especial_ambulancia_delete->RecordCount = 0;
$i = 0;
while (!$especial_ambulancia_delete->Recordset->EOF) {
	$especial_ambulancia_delete->RecordCount++;
	$especial_ambulancia_delete->RowCount++;

	// Set row properties
	$especial_ambulancia->resetAttributes();
	$especial_ambulancia->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$especial_ambulancia_delete->loadRowValues($especial_ambulancia_delete->Recordset);

	// Render row
	$especial_ambulancia_delete->renderRow();
?>
	<tr <?php echo $especial_ambulancia->rowAttributes() ?>>
<?php if ($especial_ambulancia_delete->id_especialambulancia->Visible) { // id_especialambulancia ?>
		<td <?php echo $especial_ambulancia_delete->id_especialambulancia->cellAttributes() ?>>
<span id="el<?php echo $especial_ambulancia_delete->RowCount ?>_especial_ambulancia_id_especialambulancia" class="especial_ambulancia_id_especialambulancia">
<span<?php echo $especial_ambulancia_delete->id_especialambulancia->viewAttributes() ?>><?php echo $especial_ambulancia_delete->id_especialambulancia->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($especial_ambulancia_delete->especial_es->Visible) { // especial_es ?>
		<td <?php echo $especial_ambulancia_delete->especial_es->cellAttributes() ?>>
<span id="el<?php echo $especial_ambulancia_delete->RowCount ?>_especial_ambulancia_especial_es" class="especial_ambulancia_especial_es">
<span<?php echo $especial_ambulancia_delete->especial_es->viewAttributes() ?>><?php echo $especial_ambulancia_delete->especial_es->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($especial_ambulancia_delete->especial_en->Visible) { // especial_en ?>
		<td <?php echo $especial_ambulancia_delete->especial_en->cellAttributes() ?>>
<span id="el<?php echo $especial_ambulancia_delete->RowCount ?>_especial_ambulancia_especial_en" class="especial_ambulancia_especial_en">
<span<?php echo $especial_ambulancia_delete->especial_en->viewAttributes() ?>><?php echo $especial_ambulancia_delete->especial_en->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($especial_ambulancia_delete->especial_pr->Visible) { // especial_pr ?>
		<td <?php echo $especial_ambulancia_delete->especial_pr->cellAttributes() ?>>
<span id="el<?php echo $especial_ambulancia_delete->RowCount ?>_especial_ambulancia_especial_pr" class="especial_ambulancia_especial_pr">
<span<?php echo $especial_ambulancia_delete->especial_pr->viewAttributes() ?>><?php echo $especial_ambulancia_delete->especial_pr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($especial_ambulancia_delete->especial_fr->Visible) { // especial_fr ?>
		<td <?php echo $especial_ambulancia_delete->especial_fr->cellAttributes() ?>>
<span id="el<?php echo $especial_ambulancia_delete->RowCount ?>_especial_ambulancia_especial_fr" class="especial_ambulancia_especial_fr">
<span<?php echo $especial_ambulancia_delete->especial_fr->viewAttributes() ?>><?php echo $especial_ambulancia_delete->especial_fr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$especial_ambulancia_delete->Recordset->moveNext();
}
$especial_ambulancia_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $especial_ambulancia_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$especial_ambulancia_delete->showPageFooter();
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
$especial_ambulancia_delete->terminate();
?>