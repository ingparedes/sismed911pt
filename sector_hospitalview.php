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
$sector_hospital_view = new sector_hospital_view();

// Run the page
$sector_hospital_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sector_hospital_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$sector_hospital_view->isExport()) { ?>
<script>
var fsector_hospitalview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fsector_hospitalview = currentForm = new ew.Form("fsector_hospitalview", "view");
	loadjs.done("fsector_hospitalview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$sector_hospital_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $sector_hospital_view->ExportOptions->render("body") ?>
<?php $sector_hospital_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $sector_hospital_view->showPageHeader(); ?>
<?php
$sector_hospital_view->showMessage();
?>
<form name="fsector_hospitalview" id="fsector_hospitalview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sector_hospital">
<input type="hidden" name="modal" value="<?php echo (int)$sector_hospital_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($sector_hospital_view->id_sector->Visible) { // id_sector ?>
	<tr id="r_id_sector">
		<td class="<?php echo $sector_hospital_view->TableLeftColumnClass ?>"><span id="elh_sector_hospital_id_sector"><?php echo $sector_hospital_view->id_sector->caption() ?></span></td>
		<td data-name="id_sector" <?php echo $sector_hospital_view->id_sector->cellAttributes() ?>>
<span id="el_sector_hospital_id_sector">
<span<?php echo $sector_hospital_view->id_sector->viewAttributes() ?>><?php echo $sector_hospital_view->id_sector->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sector_hospital_view->nombre_sector->Visible) { // nombre_sector ?>
	<tr id="r_nombre_sector">
		<td class="<?php echo $sector_hospital_view->TableLeftColumnClass ?>"><span id="elh_sector_hospital_nombre_sector"><?php echo $sector_hospital_view->nombre_sector->caption() ?></span></td>
		<td data-name="nombre_sector" <?php echo $sector_hospital_view->nombre_sector->cellAttributes() ?>>
<span id="el_sector_hospital_nombre_sector">
<span<?php echo $sector_hospital_view->nombre_sector->viewAttributes() ?>><?php echo $sector_hospital_view->nombre_sector->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$sector_hospital_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$sector_hospital_view->isExport()) { ?>
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
$sector_hospital_view->terminate();
?>