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
$servicios_division_view = new servicios_division_view();

// Run the page
$servicios_division_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$servicios_division_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$servicios_division_view->isExport()) { ?>
<script>
var fservicios_divisionview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fservicios_divisionview = currentForm = new ew.Form("fservicios_divisionview", "view");
	loadjs.done("fservicios_divisionview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$servicios_division_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $servicios_division_view->ExportOptions->render("body") ?>
<?php $servicios_division_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $servicios_division_view->showPageHeader(); ?>
<?php
$servicios_division_view->showMessage();
?>
<form name="fservicios_divisionview" id="fservicios_divisionview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="servicios_division">
<input type="hidden" name="modal" value="<?php echo (int)$servicios_division_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($servicios_division_view->nombre_servicio->Visible) { // nombre_servicio ?>
	<tr id="r_nombre_servicio">
		<td class="<?php echo $servicios_division_view->TableLeftColumnClass ?>"><span id="elh_servicios_division_nombre_servicio"><?php echo $servicios_division_view->nombre_servicio->caption() ?></span></td>
		<td data-name="nombre_servicio" <?php echo $servicios_division_view->nombre_servicio->cellAttributes() ?>>
<span id="el_servicios_division_nombre_servicio">
<span<?php echo $servicios_division_view->nombre_servicio->viewAttributes() ?>><?php echo $servicios_division_view->nombre_servicio->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($servicios_division_view->id_servicio->Visible) { // id_servicio ?>
	<tr id="r_id_servicio">
		<td class="<?php echo $servicios_division_view->TableLeftColumnClass ?>"><span id="elh_servicios_division_id_servicio"><?php echo $servicios_division_view->id_servicio->caption() ?></span></td>
		<td data-name="id_servicio" <?php echo $servicios_division_view->id_servicio->cellAttributes() ?>>
<span id="el_servicios_division_id_servicio">
<span<?php echo $servicios_division_view->id_servicio->viewAttributes() ?>><?php echo $servicios_division_view->id_servicio->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$servicios_division_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$servicios_division_view->isExport()) { ?>
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
$servicios_division_view->terminate();
?>