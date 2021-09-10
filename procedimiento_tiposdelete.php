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
$procedimiento_tipos_delete = new procedimiento_tipos_delete();

// Run the page
$procedimiento_tipos_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$procedimiento_tipos_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fprocedimiento_tiposdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fprocedimiento_tiposdelete = currentForm = new ew.Form("fprocedimiento_tiposdelete", "delete");
	loadjs.done("fprocedimiento_tiposdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $procedimiento_tipos_delete->showPageHeader(); ?>
<?php
$procedimiento_tipos_delete->showMessage();
?>
<form name="fprocedimiento_tiposdelete" id="fprocedimiento_tiposdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="procedimiento_tipos">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($procedimiento_tipos_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($procedimiento_tipos_delete->id->Visible) { // id ?>
		<th class="<?php echo $procedimiento_tipos_delete->id->headerCellClass() ?>"><span id="elh_procedimiento_tipos_id" class="procedimiento_tipos_id"><?php echo $procedimiento_tipos_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($procedimiento_tipos_delete->nombre_procedimeto->Visible) { // nombre_procedimeto ?>
		<th class="<?php echo $procedimiento_tipos_delete->nombre_procedimeto->headerCellClass() ?>"><span id="elh_procedimiento_tipos_nombre_procedimeto" class="procedimiento_tipos_nombre_procedimeto"><?php echo $procedimiento_tipos_delete->nombre_procedimeto->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$procedimiento_tipos_delete->RecordCount = 0;
$i = 0;
while (!$procedimiento_tipos_delete->Recordset->EOF) {
	$procedimiento_tipos_delete->RecordCount++;
	$procedimiento_tipos_delete->RowCount++;

	// Set row properties
	$procedimiento_tipos->resetAttributes();
	$procedimiento_tipos->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$procedimiento_tipos_delete->loadRowValues($procedimiento_tipos_delete->Recordset);

	// Render row
	$procedimiento_tipos_delete->renderRow();
?>
	<tr <?php echo $procedimiento_tipos->rowAttributes() ?>>
<?php if ($procedimiento_tipos_delete->id->Visible) { // id ?>
		<td <?php echo $procedimiento_tipos_delete->id->cellAttributes() ?>>
<span id="el<?php echo $procedimiento_tipos_delete->RowCount ?>_procedimiento_tipos_id" class="procedimiento_tipos_id">
<span<?php echo $procedimiento_tipos_delete->id->viewAttributes() ?>><?php echo $procedimiento_tipos_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($procedimiento_tipos_delete->nombre_procedimeto->Visible) { // nombre_procedimeto ?>
		<td <?php echo $procedimiento_tipos_delete->nombre_procedimeto->cellAttributes() ?>>
<span id="el<?php echo $procedimiento_tipos_delete->RowCount ?>_procedimiento_tipos_nombre_procedimeto" class="procedimiento_tipos_nombre_procedimeto">
<span<?php echo $procedimiento_tipos_delete->nombre_procedimeto->viewAttributes() ?>><?php echo $procedimiento_tipos_delete->nombre_procedimeto->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$procedimiento_tipos_delete->Recordset->moveNext();
}
$procedimiento_tipos_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $procedimiento_tipos_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$procedimiento_tipos_delete->showPageFooter();
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
$procedimiento_tipos_delete->terminate();
?>