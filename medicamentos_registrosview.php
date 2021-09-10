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
$medicamentos_registros_view = new medicamentos_registros_view();

// Run the page
$medicamentos_registros_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$medicamentos_registros_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$medicamentos_registros_view->isExport()) { ?>
<script>
var fmedicamentos_registrosview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmedicamentos_registrosview = currentForm = new ew.Form("fmedicamentos_registrosview", "view");
	loadjs.done("fmedicamentos_registrosview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$medicamentos_registros_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $medicamentos_registros_view->ExportOptions->render("body") ?>
<?php $medicamentos_registros_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $medicamentos_registros_view->showPageHeader(); ?>
<?php
$medicamentos_registros_view->showMessage();
?>
<form name="fmedicamentos_registrosview" id="fmedicamentos_registrosview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="medicamentos_registros">
<input type="hidden" name="modal" value="<?php echo (int)$medicamentos_registros_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($medicamentos_registros_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $medicamentos_registros_view->TableLeftColumnClass ?>"><span id="elh_medicamentos_registros_id"><?php echo $medicamentos_registros_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $medicamentos_registros_view->id->cellAttributes() ?>>
<span id="el_medicamentos_registros_id">
<span<?php echo $medicamentos_registros_view->id->viewAttributes() ?>><?php echo $medicamentos_registros_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($medicamentos_registros_view->cod_casopreh->Visible) { // cod_casopreh ?>
	<tr id="r_cod_casopreh">
		<td class="<?php echo $medicamentos_registros_view->TableLeftColumnClass ?>"><span id="elh_medicamentos_registros_cod_casopreh"><?php echo $medicamentos_registros_view->cod_casopreh->caption() ?></span></td>
		<td data-name="cod_casopreh" <?php echo $medicamentos_registros_view->cod_casopreh->cellAttributes() ?>>
<span id="el_medicamentos_registros_cod_casopreh">
<span<?php echo $medicamentos_registros_view->cod_casopreh->viewAttributes() ?>><?php echo $medicamentos_registros_view->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($medicamentos_registros_view->medicamentos_id->Visible) { // medicamentos_id ?>
	<tr id="r_medicamentos_id">
		<td class="<?php echo $medicamentos_registros_view->TableLeftColumnClass ?>"><span id="elh_medicamentos_registros_medicamentos_id"><?php echo $medicamentos_registros_view->medicamentos_id->caption() ?></span></td>
		<td data-name="medicamentos_id" <?php echo $medicamentos_registros_view->medicamentos_id->cellAttributes() ?>>
<span id="el_medicamentos_registros_medicamentos_id">
<span<?php echo $medicamentos_registros_view->medicamentos_id->viewAttributes() ?>><?php echo $medicamentos_registros_view->medicamentos_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($medicamentos_registros_view->cantidad->Visible) { // cantidad ?>
	<tr id="r_cantidad">
		<td class="<?php echo $medicamentos_registros_view->TableLeftColumnClass ?>"><span id="elh_medicamentos_registros_cantidad"><?php echo $medicamentos_registros_view->cantidad->caption() ?></span></td>
		<td data-name="cantidad" <?php echo $medicamentos_registros_view->cantidad->cellAttributes() ?>>
<span id="el_medicamentos_registros_cantidad">
<span<?php echo $medicamentos_registros_view->cantidad->viewAttributes() ?>><?php echo $medicamentos_registros_view->cantidad->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$medicamentos_registros_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$medicamentos_registros_view->isExport()) { ?>
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
$medicamentos_registros_view->terminate();
?>