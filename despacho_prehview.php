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
$despacho_preh_view = new despacho_preh_view();

// Run the page
$despacho_preh_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$despacho_preh_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$despacho_preh_view->isExport()) { ?>
<script>
var fdespacho_prehview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fdespacho_prehview = currentForm = new ew.Form("fdespacho_prehview", "view");
	loadjs.done("fdespacho_prehview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$despacho_preh_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $despacho_preh_view->ExportOptions->render("body") ?>
<?php $despacho_preh_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $despacho_preh_view->showPageHeader(); ?>
<?php
$despacho_preh_view->showMessage();
?>
<form name="fdespacho_prehview" id="fdespacho_prehview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="despacho_preh">
<input type="hidden" name="modal" value="<?php echo (int)$despacho_preh_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($despacho_preh_view->id_despacho->Visible) { // id_despacho ?>
	<tr id="r_id_despacho">
		<td class="<?php echo $despacho_preh_view->TableLeftColumnClass ?>"><span id="elh_despacho_preh_id_despacho"><?php echo $despacho_preh_view->id_despacho->caption() ?></span></td>
		<td data-name="id_despacho" <?php echo $despacho_preh_view->id_despacho->cellAttributes() ?>>
<span id="el_despacho_preh_id_despacho">
<span<?php echo $despacho_preh_view->id_despacho->viewAttributes() ?>><?php echo $despacho_preh_view->id_despacho->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($despacho_preh_view->fechahoradespacho->Visible) { // fechahoradespacho ?>
	<tr id="r_fechahoradespacho">
		<td class="<?php echo $despacho_preh_view->TableLeftColumnClass ?>"><span id="elh_despacho_preh_fechahoradespacho"><?php echo $despacho_preh_view->fechahoradespacho->caption() ?></span></td>
		<td data-name="fechahoradespacho" <?php echo $despacho_preh_view->fechahoradespacho->cellAttributes() ?>>
<span id="el_despacho_preh_fechahoradespacho">
<span<?php echo $despacho_preh_view->fechahoradespacho->viewAttributes() ?>><?php echo $despacho_preh_view->fechahoradespacho->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($despacho_preh_view->cod_caso->Visible) { // cod_caso ?>
	<tr id="r_cod_caso">
		<td class="<?php echo $despacho_preh_view->TableLeftColumnClass ?>"><span id="elh_despacho_preh_cod_caso"><?php echo $despacho_preh_view->cod_caso->caption() ?></span></td>
		<td data-name="cod_caso" <?php echo $despacho_preh_view->cod_caso->cellAttributes() ?>>
<span id="el_despacho_preh_cod_caso">
<span<?php echo $despacho_preh_view->cod_caso->viewAttributes() ?>><?php echo $despacho_preh_view->cod_caso->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($despacho_preh_view->sede->Visible) { // sede ?>
	<tr id="r_sede">
		<td class="<?php echo $despacho_preh_view->TableLeftColumnClass ?>"><span id="elh_despacho_preh_sede"><?php echo $despacho_preh_view->sede->caption() ?></span></td>
		<td data-name="sede" <?php echo $despacho_preh_view->sede->cellAttributes() ?>>
<span id="el_despacho_preh_sede">
<span<?php echo $despacho_preh_view->sede->viewAttributes() ?>><?php echo $despacho_preh_view->sede->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($despacho_preh_view->nota->Visible) { // nota ?>
	<tr id="r_nota">
		<td class="<?php echo $despacho_preh_view->TableLeftColumnClass ?>"><span id="elh_despacho_preh_nota"><?php echo $despacho_preh_view->nota->caption() ?></span></td>
		<td data-name="nota" <?php echo $despacho_preh_view->nota->cellAttributes() ?>>
<span id="el_despacho_preh_nota">
<span<?php echo $despacho_preh_view->nota->viewAttributes() ?>><?php echo $despacho_preh_view->nota->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$despacho_preh_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$despacho_preh_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$despacho_preh_view->terminate();
?>