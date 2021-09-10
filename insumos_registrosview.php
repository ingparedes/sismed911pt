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
$insumos_registros_view = new insumos_registros_view();

// Run the page
$insumos_registros_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$insumos_registros_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$insumos_registros_view->isExport()) { ?>
<script>
var finsumos_registrosview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	finsumos_registrosview = currentForm = new ew.Form("finsumos_registrosview", "view");
	loadjs.done("finsumos_registrosview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$insumos_registros_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $insumos_registros_view->ExportOptions->render("body") ?>
<?php $insumos_registros_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $insumos_registros_view->showPageHeader(); ?>
<?php
$insumos_registros_view->showMessage();
?>
<form name="finsumos_registrosview" id="finsumos_registrosview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="insumos_registros">
<input type="hidden" name="modal" value="<?php echo (int)$insumos_registros_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($insumos_registros_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $insumos_registros_view->TableLeftColumnClass ?>"><span id="elh_insumos_registros_id"><?php echo $insumos_registros_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $insumos_registros_view->id->cellAttributes() ?>>
<span id="el_insumos_registros_id">
<span<?php echo $insumos_registros_view->id->viewAttributes() ?>><?php echo $insumos_registros_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($insumos_registros_view->cod_casopreh->Visible) { // cod_casopreh ?>
	<tr id="r_cod_casopreh">
		<td class="<?php echo $insumos_registros_view->TableLeftColumnClass ?>"><span id="elh_insumos_registros_cod_casopreh"><?php echo $insumos_registros_view->cod_casopreh->caption() ?></span></td>
		<td data-name="cod_casopreh" <?php echo $insumos_registros_view->cod_casopreh->cellAttributes() ?>>
<span id="el_insumos_registros_cod_casopreh">
<span<?php echo $insumos_registros_view->cod_casopreh->viewAttributes() ?>><?php echo $insumos_registros_view->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($insumos_registros_view->insumos_id->Visible) { // insumos_id ?>
	<tr id="r_insumos_id">
		<td class="<?php echo $insumos_registros_view->TableLeftColumnClass ?>"><span id="elh_insumos_registros_insumos_id"><?php echo $insumos_registros_view->insumos_id->caption() ?></span></td>
		<td data-name="insumos_id" <?php echo $insumos_registros_view->insumos_id->cellAttributes() ?>>
<span id="el_insumos_registros_insumos_id">
<span<?php echo $insumos_registros_view->insumos_id->viewAttributes() ?>><?php echo $insumos_registros_view->insumos_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($insumos_registros_view->cantidad->Visible) { // cantidad ?>
	<tr id="r_cantidad">
		<td class="<?php echo $insumos_registros_view->TableLeftColumnClass ?>"><span id="elh_insumos_registros_cantidad"><?php echo $insumos_registros_view->cantidad->caption() ?></span></td>
		<td data-name="cantidad" <?php echo $insumos_registros_view->cantidad->cellAttributes() ?>>
<span id="el_insumos_registros_cantidad">
<span<?php echo $insumos_registros_view->cantidad->viewAttributes() ?>><?php echo $insumos_registros_view->cantidad->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$insumos_registros_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$insumos_registros_view->isExport()) { ?>
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
$insumos_registros_view->terminate();
?>