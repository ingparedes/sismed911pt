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
$insumos_view = new insumos_view();

// Run the page
$insumos_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$insumos_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$insumos_view->isExport()) { ?>
<script>
var finsumosview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	finsumosview = currentForm = new ew.Form("finsumosview", "view");
	loadjs.done("finsumosview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$insumos_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $insumos_view->ExportOptions->render("body") ?>
<?php $insumos_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $insumos_view->showPageHeader(); ?>
<?php
$insumos_view->showMessage();
?>
<form name="finsumosview" id="finsumosview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="insumos">
<input type="hidden" name="modal" value="<?php echo (int)$insumos_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($insumos_view->id_insumo->Visible) { // id_insumo ?>
	<tr id="r_id_insumo">
		<td class="<?php echo $insumos_view->TableLeftColumnClass ?>"><span id="elh_insumos_id_insumo"><?php echo $insumos_view->id_insumo->caption() ?></span></td>
		<td data-name="id_insumo" <?php echo $insumos_view->id_insumo->cellAttributes() ?>>
<span id="el_insumos_id_insumo">
<span<?php echo $insumos_view->id_insumo->viewAttributes() ?>><?php echo $insumos_view->id_insumo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($insumos_view->nombre_insumo->Visible) { // nombre_insumo ?>
	<tr id="r_nombre_insumo">
		<td class="<?php echo $insumos_view->TableLeftColumnClass ?>"><span id="elh_insumos_nombre_insumo"><?php echo $insumos_view->nombre_insumo->caption() ?></span></td>
		<td data-name="nombre_insumo" <?php echo $insumos_view->nombre_insumo->cellAttributes() ?>>
<span id="el_insumos_nombre_insumo">
<span<?php echo $insumos_view->nombre_insumo->viewAttributes() ?>><?php echo $insumos_view->nombre_insumo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($insumos_view->valor->Visible) { // valor ?>
	<tr id="r_valor">
		<td class="<?php echo $insumos_view->TableLeftColumnClass ?>"><span id="elh_insumos_valor"><?php echo $insumos_view->valor->caption() ?></span></td>
		<td data-name="valor" <?php echo $insumos_view->valor->cellAttributes() ?>>
<span id="el_insumos_valor">
<span<?php echo $insumos_view->valor->viewAttributes() ?>><?php echo $insumos_view->valor->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$insumos_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$insumos_view->isExport()) { ?>
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
$insumos_view->terminate();
?>