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
$explo_general_registro_view = new explo_general_registro_view();

// Run the page
$explo_general_registro_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$explo_general_registro_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$explo_general_registro_view->isExport()) { ?>
<script>
var fexplo_general_registroview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fexplo_general_registroview = currentForm = new ew.Form("fexplo_general_registroview", "view");
	loadjs.done("fexplo_general_registroview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$explo_general_registro_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $explo_general_registro_view->ExportOptions->render("body") ?>
<?php $explo_general_registro_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $explo_general_registro_view->showPageHeader(); ?>
<?php
$explo_general_registro_view->showMessage();
?>
<form name="fexplo_general_registroview" id="fexplo_general_registroview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="explo_general_registro">
<input type="hidden" name="modal" value="<?php echo (int)$explo_general_registro_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($explo_general_registro_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $explo_general_registro_view->TableLeftColumnClass ?>"><span id="elh_explo_general_registro_id"><?php echo $explo_general_registro_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $explo_general_registro_view->id->cellAttributes() ?>>
<span id="el_explo_general_registro_id">
<span<?php echo $explo_general_registro_view->id->viewAttributes() ?>><?php echo $explo_general_registro_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($explo_general_registro_view->cod_casopreh->Visible) { // cod_casopreh ?>
	<tr id="r_cod_casopreh">
		<td class="<?php echo $explo_general_registro_view->TableLeftColumnClass ?>"><span id="elh_explo_general_registro_cod_casopreh"><?php echo $explo_general_registro_view->cod_casopreh->caption() ?></span></td>
		<td data-name="cod_casopreh" <?php echo $explo_general_registro_view->cod_casopreh->cellAttributes() ?>>
<span id="el_explo_general_registro_cod_casopreh">
<span<?php echo $explo_general_registro_view->cod_casopreh->viewAttributes() ?>><?php echo $explo_general_registro_view->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($explo_general_registro_view->explo_general_afeccion->Visible) { // explo_general_afeccion ?>
	<tr id="r_explo_general_afeccion">
		<td class="<?php echo $explo_general_registro_view->TableLeftColumnClass ?>"><span id="elh_explo_general_registro_explo_general_afeccion"><?php echo $explo_general_registro_view->explo_general_afeccion->caption() ?></span></td>
		<td data-name="explo_general_afeccion" <?php echo $explo_general_registro_view->explo_general_afeccion->cellAttributes() ?>>
<span id="el_explo_general_registro_explo_general_afeccion">
<span<?php echo $explo_general_registro_view->explo_general_afeccion->viewAttributes() ?>><?php echo $explo_general_registro_view->explo_general_afeccion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$explo_general_registro_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$explo_general_registro_view->isExport()) { ?>
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
$explo_general_registro_view->terminate();
?>