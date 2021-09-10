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
$preh_seguimiento_view = new preh_seguimiento_view();

// Run the page
$preh_seguimiento_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_seguimiento_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$preh_seguimiento_view->isExport()) { ?>
<script>
var fpreh_seguimientoview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpreh_seguimientoview = currentForm = new ew.Form("fpreh_seguimientoview", "view");
	loadjs.done("fpreh_seguimientoview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$preh_seguimiento_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $preh_seguimiento_view->ExportOptions->render("body") ?>
<?php $preh_seguimiento_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $preh_seguimiento_view->showPageHeader(); ?>
<?php
$preh_seguimiento_view->showMessage();
?>
<form name="fpreh_seguimientoview" id="fpreh_seguimientoview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_seguimiento">
<input type="hidden" name="modal" value="<?php echo (int)$preh_seguimiento_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($preh_seguimiento_view->cod_casopreh->Visible) { // cod_casopreh ?>
	<tr id="r_cod_casopreh">
		<td class="<?php echo $preh_seguimiento_view->TableLeftColumnClass ?>"><span id="elh_preh_seguimiento_cod_casopreh"><?php echo $preh_seguimiento_view->cod_casopreh->caption() ?></span></td>
		<td data-name="cod_casopreh" <?php echo $preh_seguimiento_view->cod_casopreh->cellAttributes() ?>>
<span id="el_preh_seguimiento_cod_casopreh">
<span<?php echo $preh_seguimiento_view->cod_casopreh->viewAttributes() ?>><?php echo $preh_seguimiento_view->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_seguimiento_view->seguimento->Visible) { // seguimento ?>
	<tr id="r_seguimento">
		<td class="<?php echo $preh_seguimiento_view->TableLeftColumnClass ?>"><span id="elh_preh_seguimiento_seguimento"><?php echo $preh_seguimiento_view->seguimento->caption() ?></span></td>
		<td data-name="seguimento" <?php echo $preh_seguimiento_view->seguimento->cellAttributes() ?>>
<span id="el_preh_seguimiento_seguimento">
<span<?php echo $preh_seguimiento_view->seguimento->viewAttributes() ?>><?php echo $preh_seguimiento_view->seguimento->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_seguimiento_view->fecha_seguimento->Visible) { // fecha_seguimento ?>
	<tr id="r_fecha_seguimento">
		<td class="<?php echo $preh_seguimiento_view->TableLeftColumnClass ?>"><span id="elh_preh_seguimiento_fecha_seguimento"><?php echo $preh_seguimiento_view->fecha_seguimento->caption() ?></span></td>
		<td data-name="fecha_seguimento" <?php echo $preh_seguimiento_view->fecha_seguimento->cellAttributes() ?>>
<span id="el_preh_seguimiento_fecha_seguimento">
<span<?php echo $preh_seguimiento_view->fecha_seguimento->viewAttributes() ?>><?php echo $preh_seguimiento_view->fecha_seguimento->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_seguimiento_view->despacho->Visible) { // despacho ?>
	<tr id="r_despacho">
		<td class="<?php echo $preh_seguimiento_view->TableLeftColumnClass ?>"><span id="elh_preh_seguimiento_despacho"><?php echo $preh_seguimiento_view->despacho->caption() ?></span></td>
		<td data-name="despacho" <?php echo $preh_seguimiento_view->despacho->cellAttributes() ?>>
<span id="el_preh_seguimiento_despacho">
<span<?php echo $preh_seguimiento_view->despacho->viewAttributes() ?>><?php echo $preh_seguimiento_view->despacho->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$preh_seguimiento_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$preh_seguimiento_view->isExport()) { ?>
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
$preh_seguimiento_view->terminate();
?>