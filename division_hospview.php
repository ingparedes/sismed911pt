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
$division_hosp_view = new division_hosp_view();

// Run the page
$division_hosp_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$division_hosp_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$division_hosp_view->isExport()) { ?>
<script>
var fdivision_hospview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fdivision_hospview = currentForm = new ew.Form("fdivision_hospview", "view");
	loadjs.done("fdivision_hospview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$division_hosp_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $division_hosp_view->ExportOptions->render("body") ?>
<?php $division_hosp_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $division_hosp_view->showPageHeader(); ?>
<?php
$division_hosp_view->showMessage();
?>
<form name="fdivision_hospview" id="fdivision_hospview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="division_hosp">
<input type="hidden" name="modal" value="<?php echo (int)$division_hosp_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($division_hosp_view->descripcion->Visible) { // descripcion ?>
	<tr id="r_descripcion">
		<td class="<?php echo $division_hosp_view->TableLeftColumnClass ?>"><span id="elh_division_hosp_descripcion"><?php echo $division_hosp_view->descripcion->caption() ?></span></td>
		<td data-name="descripcion" <?php echo $division_hosp_view->descripcion->cellAttributes() ?>>
<span id="el_division_hosp_descripcion">
<span<?php echo $division_hosp_view->descripcion->viewAttributes() ?>><?php echo $division_hosp_view->descripcion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($division_hosp_view->id_servicio->Visible) { // id_servicio ?>
	<tr id="r_id_servicio">
		<td class="<?php echo $division_hosp_view->TableLeftColumnClass ?>"><span id="elh_division_hosp_id_servicio"><?php echo $division_hosp_view->id_servicio->caption() ?></span></td>
		<td data-name="id_servicio" <?php echo $division_hosp_view->id_servicio->cellAttributes() ?>>
<span id="el_division_hosp_id_servicio">
<span<?php echo $division_hosp_view->id_servicio->viewAttributes() ?>><?php echo $division_hosp_view->id_servicio->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($division_hosp_view->bloque->Visible) { // bloque ?>
	<tr id="r_bloque">
		<td class="<?php echo $division_hosp_view->TableLeftColumnClass ?>"><span id="elh_division_hosp_bloque"><?php echo $division_hosp_view->bloque->caption() ?></span></td>
		<td data-name="bloque" <?php echo $division_hosp_view->bloque->cellAttributes() ?>>
<span id="el_division_hosp_bloque">
<span<?php echo $division_hosp_view->bloque->viewAttributes() ?>><?php echo $division_hosp_view->bloque->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($division_hosp_view->id_division->Visible) { // id_division ?>
	<tr id="r_id_division">
		<td class="<?php echo $division_hosp_view->TableLeftColumnClass ?>"><span id="elh_division_hosp_id_division"><?php echo $division_hosp_view->id_division->caption() ?></span></td>
		<td data-name="id_division" <?php echo $division_hosp_view->id_division->cellAttributes() ?>>
<span id="el_division_hosp_id_division">
<span<?php echo $division_hosp_view->id_division->viewAttributes() ?>><?php echo $division_hosp_view->id_division->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$division_hosp_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$division_hosp_view->isExport()) { ?>
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
$division_hosp_view->terminate();
?>