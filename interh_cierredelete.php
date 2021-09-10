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
$interh_cierre_delete = new interh_cierre_delete();

// Run the page
$interh_cierre_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_cierre_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var finterh_cierredelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	finterh_cierredelete = currentForm = new ew.Form("finterh_cierredelete", "delete");
	loadjs.done("finterh_cierredelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $interh_cierre_delete->showPageHeader(); ?>
<?php
$interh_cierre_delete->showMessage();
?>
<form name="finterh_cierredelete" id="finterh_cierredelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="interh_cierre">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($interh_cierre_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($interh_cierre_delete->id_cierre->Visible) { // id_cierre ?>
		<th class="<?php echo $interh_cierre_delete->id_cierre->headerCellClass() ?>"><span id="elh_interh_cierre_id_cierre" class="interh_cierre_id_cierre"><?php echo $interh_cierre_delete->id_cierre->caption() ?></span></th>
<?php } ?>
<?php if ($interh_cierre_delete->cod_casointerh->Visible) { // cod_casointerh ?>
		<th class="<?php echo $interh_cierre_delete->cod_casointerh->headerCellClass() ?>"><span id="elh_interh_cierre_cod_casointerh" class="interh_cierre_cod_casointerh"><?php echo $interh_cierre_delete->cod_casointerh->caption() ?></span></th>
<?php } ?>
<?php if ($interh_cierre_delete->nombrecierre->Visible) { // nombrecierre ?>
		<th class="<?php echo $interh_cierre_delete->nombrecierre->headerCellClass() ?>"><span id="elh_interh_cierre_nombrecierre" class="interh_cierre_nombrecierre"><?php echo $interh_cierre_delete->nombrecierre->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$interh_cierre_delete->RecordCount = 0;
$i = 0;
while (!$interh_cierre_delete->Recordset->EOF) {
	$interh_cierre_delete->RecordCount++;
	$interh_cierre_delete->RowCount++;

	// Set row properties
	$interh_cierre->resetAttributes();
	$interh_cierre->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$interh_cierre_delete->loadRowValues($interh_cierre_delete->Recordset);

	// Render row
	$interh_cierre_delete->renderRow();
?>
	<tr <?php echo $interh_cierre->rowAttributes() ?>>
<?php if ($interh_cierre_delete->id_cierre->Visible) { // id_cierre ?>
		<td <?php echo $interh_cierre_delete->id_cierre->cellAttributes() ?>>
<span id="el<?php echo $interh_cierre_delete->RowCount ?>_interh_cierre_id_cierre" class="interh_cierre_id_cierre">
<span<?php echo $interh_cierre_delete->id_cierre->viewAttributes() ?>><?php echo $interh_cierre_delete->id_cierre->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($interh_cierre_delete->cod_casointerh->Visible) { // cod_casointerh ?>
		<td <?php echo $interh_cierre_delete->cod_casointerh->cellAttributes() ?>>
<span id="el<?php echo $interh_cierre_delete->RowCount ?>_interh_cierre_cod_casointerh" class="interh_cierre_cod_casointerh">
<span<?php echo $interh_cierre_delete->cod_casointerh->viewAttributes() ?>><?php echo $interh_cierre_delete->cod_casointerh->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($interh_cierre_delete->nombrecierre->Visible) { // nombrecierre ?>
		<td <?php echo $interh_cierre_delete->nombrecierre->cellAttributes() ?>>
<span id="el<?php echo $interh_cierre_delete->RowCount ?>_interh_cierre_nombrecierre" class="interh_cierre_nombrecierre">
<span<?php echo $interh_cierre_delete->nombrecierre->viewAttributes() ?>><?php echo $interh_cierre_delete->nombrecierre->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$interh_cierre_delete->Recordset->moveNext();
}
$interh_cierre_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $interh_cierre_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$interh_cierre_delete->showPageFooter();
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
$interh_cierre_delete->terminate();
?>