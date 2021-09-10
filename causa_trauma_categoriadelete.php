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
$causa_trauma_categoria_delete = new causa_trauma_categoria_delete();

// Run the page
$causa_trauma_categoria_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$causa_trauma_categoria_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fcausa_trauma_categoriadelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fcausa_trauma_categoriadelete = currentForm = new ew.Form("fcausa_trauma_categoriadelete", "delete");
	loadjs.done("fcausa_trauma_categoriadelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $causa_trauma_categoria_delete->showPageHeader(); ?>
<?php
$causa_trauma_categoria_delete->showMessage();
?>
<form name="fcausa_trauma_categoriadelete" id="fcausa_trauma_categoriadelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="causa_trauma_categoria">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($causa_trauma_categoria_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($causa_trauma_categoria_delete->id->Visible) { // id ?>
		<th class="<?php echo $causa_trauma_categoria_delete->id->headerCellClass() ?>"><span id="elh_causa_trauma_categoria_id" class="causa_trauma_categoria_id"><?php echo $causa_trauma_categoria_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($causa_trauma_categoria_delete->causa_trauma->Visible) { // causa_trauma ?>
		<th class="<?php echo $causa_trauma_categoria_delete->causa_trauma->headerCellClass() ?>"><span id="elh_causa_trauma_categoria_causa_trauma" class="causa_trauma_categoria_causa_trauma"><?php echo $causa_trauma_categoria_delete->causa_trauma->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$causa_trauma_categoria_delete->RecordCount = 0;
$i = 0;
while (!$causa_trauma_categoria_delete->Recordset->EOF) {
	$causa_trauma_categoria_delete->RecordCount++;
	$causa_trauma_categoria_delete->RowCount++;

	// Set row properties
	$causa_trauma_categoria->resetAttributes();
	$causa_trauma_categoria->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$causa_trauma_categoria_delete->loadRowValues($causa_trauma_categoria_delete->Recordset);

	// Render row
	$causa_trauma_categoria_delete->renderRow();
?>
	<tr <?php echo $causa_trauma_categoria->rowAttributes() ?>>
<?php if ($causa_trauma_categoria_delete->id->Visible) { // id ?>
		<td <?php echo $causa_trauma_categoria_delete->id->cellAttributes() ?>>
<span id="el<?php echo $causa_trauma_categoria_delete->RowCount ?>_causa_trauma_categoria_id" class="causa_trauma_categoria_id">
<span<?php echo $causa_trauma_categoria_delete->id->viewAttributes() ?>><?php echo $causa_trauma_categoria_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($causa_trauma_categoria_delete->causa_trauma->Visible) { // causa_trauma ?>
		<td <?php echo $causa_trauma_categoria_delete->causa_trauma->cellAttributes() ?>>
<span id="el<?php echo $causa_trauma_categoria_delete->RowCount ?>_causa_trauma_categoria_causa_trauma" class="causa_trauma_categoria_causa_trauma">
<span<?php echo $causa_trauma_categoria_delete->causa_trauma->viewAttributes() ?>><?php echo $causa_trauma_categoria_delete->causa_trauma->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$causa_trauma_categoria_delete->Recordset->moveNext();
}
$causa_trauma_categoria_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $causa_trauma_categoria_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$causa_trauma_categoria_delete->showPageFooter();
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
$causa_trauma_categoria_delete->terminate();
?>