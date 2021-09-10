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
$webservices_delete = new webservices_delete();

// Run the page
$webservices_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$webservices_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fwebservicesdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fwebservicesdelete = currentForm = new ew.Form("fwebservicesdelete", "delete");
	loadjs.done("fwebservicesdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $webservices_delete->showPageHeader(); ?>
<?php
$webservices_delete->showMessage();
?>
<form name="fwebservicesdelete" id="fwebservicesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="webservices">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($webservices_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($webservices_delete->id_parametros->Visible) { // id_parametros ?>
		<th class="<?php echo $webservices_delete->id_parametros->headerCellClass() ?>"><span id="elh_webservices_id_parametros" class="webservices_id_parametros"><?php echo $webservices_delete->id_parametros->caption() ?></span></th>
<?php } ?>
<?php if ($webservices_delete->caller->Visible) { // caller ?>
		<th class="<?php echo $webservices_delete->caller->headerCellClass() ?>"><span id="elh_webservices_caller" class="webservices_caller"><?php echo $webservices_delete->caller->caption() ?></span></th>
<?php } ?>
<?php if ($webservices_delete->idpersonas->Visible) { // idpersonas ?>
		<th class="<?php echo $webservices_delete->idpersonas->headerCellClass() ?>"><span id="elh_webservices_idpersonas" class="webservices_idpersonas"><?php echo $webservices_delete->idpersonas->caption() ?></span></th>
<?php } ?>
<?php if ($webservices_delete->disponiblecamas->Visible) { // disponiblecamas ?>
		<th class="<?php echo $webservices_delete->disponiblecamas->headerCellClass() ?>"><span id="elh_webservices_disponiblecamas" class="webservices_disponiblecamas"><?php echo $webservices_delete->disponiblecamas->caption() ?></span></th>
<?php } ?>
<?php if ($webservices_delete->afiliados->Visible) { // afiliados ?>
		<th class="<?php echo $webservices_delete->afiliados->headerCellClass() ?>"><span id="elh_webservices_afiliados" class="webservices_afiliados"><?php echo $webservices_delete->afiliados->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$webservices_delete->RecordCount = 0;
$i = 0;
while (!$webservices_delete->Recordset->EOF) {
	$webservices_delete->RecordCount++;
	$webservices_delete->RowCount++;

	// Set row properties
	$webservices->resetAttributes();
	$webservices->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$webservices_delete->loadRowValues($webservices_delete->Recordset);

	// Render row
	$webservices_delete->renderRow();
?>
	<tr <?php echo $webservices->rowAttributes() ?>>
<?php if ($webservices_delete->id_parametros->Visible) { // id_parametros ?>
		<td <?php echo $webservices_delete->id_parametros->cellAttributes() ?>>
<span id="el<?php echo $webservices_delete->RowCount ?>_webservices_id_parametros" class="webservices_id_parametros">
<span<?php echo $webservices_delete->id_parametros->viewAttributes() ?>><?php echo $webservices_delete->id_parametros->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($webservices_delete->caller->Visible) { // caller ?>
		<td <?php echo $webservices_delete->caller->cellAttributes() ?>>
<span id="el<?php echo $webservices_delete->RowCount ?>_webservices_caller" class="webservices_caller">
<span<?php echo $webservices_delete->caller->viewAttributes() ?>><?php echo $webservices_delete->caller->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($webservices_delete->idpersonas->Visible) { // idpersonas ?>
		<td <?php echo $webservices_delete->idpersonas->cellAttributes() ?>>
<span id="el<?php echo $webservices_delete->RowCount ?>_webservices_idpersonas" class="webservices_idpersonas">
<span<?php echo $webservices_delete->idpersonas->viewAttributes() ?>><?php echo $webservices_delete->idpersonas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($webservices_delete->disponiblecamas->Visible) { // disponiblecamas ?>
		<td <?php echo $webservices_delete->disponiblecamas->cellAttributes() ?>>
<span id="el<?php echo $webservices_delete->RowCount ?>_webservices_disponiblecamas" class="webservices_disponiblecamas">
<span<?php echo $webservices_delete->disponiblecamas->viewAttributes() ?>><?php echo $webservices_delete->disponiblecamas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($webservices_delete->afiliados->Visible) { // afiliados ?>
		<td <?php echo $webservices_delete->afiliados->cellAttributes() ?>>
<span id="el<?php echo $webservices_delete->RowCount ?>_webservices_afiliados" class="webservices_afiliados">
<span<?php echo $webservices_delete->afiliados->viewAttributes() ?>><?php echo $webservices_delete->afiliados->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$webservices_delete->Recordset->moveNext();
}
$webservices_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $webservices_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$webservices_delete->showPageFooter();
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
$webservices_delete->terminate();
?>