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
$causa_externa_delete = new causa_externa_delete();

// Run the page
$causa_externa_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$causa_externa_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fcausa_externadelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fcausa_externadelete = currentForm = new ew.Form("fcausa_externadelete", "delete");
	loadjs.done("fcausa_externadelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $causa_externa_delete->showPageHeader(); ?>
<?php
$causa_externa_delete->showMessage();
?>
<form name="fcausa_externadelete" id="fcausa_externadelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="causa_externa">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($causa_externa_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($causa_externa_delete->id_causa->Visible) { // id_causa ?>
		<th class="<?php echo $causa_externa_delete->id_causa->headerCellClass() ?>"><span id="elh_causa_externa_id_causa" class="causa_externa_id_causa"><?php echo $causa_externa_delete->id_causa->caption() ?></span></th>
<?php } ?>
<?php if ($causa_externa_delete->nom_causa->Visible) { // nom_causa ?>
		<th class="<?php echo $causa_externa_delete->nom_causa->headerCellClass() ?>"><span id="elh_causa_externa_nom_causa" class="causa_externa_nom_causa"><?php echo $causa_externa_delete->nom_causa->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$causa_externa_delete->RecordCount = 0;
$i = 0;
while (!$causa_externa_delete->Recordset->EOF) {
	$causa_externa_delete->RecordCount++;
	$causa_externa_delete->RowCount++;

	// Set row properties
	$causa_externa->resetAttributes();
	$causa_externa->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$causa_externa_delete->loadRowValues($causa_externa_delete->Recordset);

	// Render row
	$causa_externa_delete->renderRow();
?>
	<tr <?php echo $causa_externa->rowAttributes() ?>>
<?php if ($causa_externa_delete->id_causa->Visible) { // id_causa ?>
		<td <?php echo $causa_externa_delete->id_causa->cellAttributes() ?>>
<span id="el<?php echo $causa_externa_delete->RowCount ?>_causa_externa_id_causa" class="causa_externa_id_causa">
<span<?php echo $causa_externa_delete->id_causa->viewAttributes() ?>><?php echo $causa_externa_delete->id_causa->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($causa_externa_delete->nom_causa->Visible) { // nom_causa ?>
		<td <?php echo $causa_externa_delete->nom_causa->cellAttributes() ?>>
<span id="el<?php echo $causa_externa_delete->RowCount ?>_causa_externa_nom_causa" class="causa_externa_nom_causa">
<span<?php echo $causa_externa_delete->nom_causa->viewAttributes() ?>><?php echo $causa_externa_delete->nom_causa->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$causa_externa_delete->Recordset->moveNext();
}
$causa_externa_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $causa_externa_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$causa_externa_delete->showPageFooter();
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
$causa_externa_delete->terminate();
?>