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
$explo_general_afeccion_view = new explo_general_afeccion_view();

// Run the page
$explo_general_afeccion_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$explo_general_afeccion_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$explo_general_afeccion_view->isExport()) { ?>
<script>
var fexplo_general_afeccionview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fexplo_general_afeccionview = currentForm = new ew.Form("fexplo_general_afeccionview", "view");
	loadjs.done("fexplo_general_afeccionview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$explo_general_afeccion_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $explo_general_afeccion_view->ExportOptions->render("body") ?>
<?php $explo_general_afeccion_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $explo_general_afeccion_view->showPageHeader(); ?>
<?php
$explo_general_afeccion_view->showMessage();
?>
<form name="fexplo_general_afeccionview" id="fexplo_general_afeccionview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="explo_general_afeccion">
<input type="hidden" name="modal" value="<?php echo (int)$explo_general_afeccion_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($explo_general_afeccion_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $explo_general_afeccion_view->TableLeftColumnClass ?>"><span id="elh_explo_general_afeccion_id"><?php echo $explo_general_afeccion_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $explo_general_afeccion_view->id->cellAttributes() ?>>
<span id="el_explo_general_afeccion_id">
<span<?php echo $explo_general_afeccion_view->id->viewAttributes() ?>><?php echo $explo_general_afeccion_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($explo_general_afeccion_view->explo_general_cat->Visible) { // explo_general_cat ?>
	<tr id="r_explo_general_cat">
		<td class="<?php echo $explo_general_afeccion_view->TableLeftColumnClass ?>"><span id="elh_explo_general_afeccion_explo_general_cat"><?php echo $explo_general_afeccion_view->explo_general_cat->caption() ?></span></td>
		<td data-name="explo_general_cat" <?php echo $explo_general_afeccion_view->explo_general_cat->cellAttributes() ?>>
<span id="el_explo_general_afeccion_explo_general_cat">
<span<?php echo $explo_general_afeccion_view->explo_general_cat->viewAttributes() ?>><?php echo $explo_general_afeccion_view->explo_general_cat->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($explo_general_afeccion_view->descripcion->Visible) { // descripcion ?>
	<tr id="r_descripcion">
		<td class="<?php echo $explo_general_afeccion_view->TableLeftColumnClass ?>"><span id="elh_explo_general_afeccion_descripcion"><?php echo $explo_general_afeccion_view->descripcion->caption() ?></span></td>
		<td data-name="descripcion" <?php echo $explo_general_afeccion_view->descripcion->cellAttributes() ?>>
<span id="el_explo_general_afeccion_descripcion">
<span<?php echo $explo_general_afeccion_view->descripcion->viewAttributes() ?>><?php echo $explo_general_afeccion_view->descripcion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$explo_general_afeccion_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$explo_general_afeccion_view->isExport()) { ?>
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
$explo_general_afeccion_view->terminate();
?>