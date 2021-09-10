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
$sede_sismed_view = new sede_sismed_view();

// Run the page
$sede_sismed_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sede_sismed_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$sede_sismed_view->isExport()) { ?>
<script>
var fsede_sismedview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fsede_sismedview = currentForm = new ew.Form("fsede_sismedview", "view");
	loadjs.done("fsede_sismedview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$sede_sismed_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $sede_sismed_view->ExportOptions->render("body") ?>
<?php $sede_sismed_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $sede_sismed_view->showPageHeader(); ?>
<?php
$sede_sismed_view->showMessage();
?>
<form name="fsede_sismedview" id="fsede_sismedview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sede_sismed">
<input type="hidden" name="modal" value="<?php echo (int)$sede_sismed_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($sede_sismed_view->id_sede->Visible) { // id_sede ?>
	<tr id="r_id_sede">
		<td class="<?php echo $sede_sismed_view->TableLeftColumnClass ?>"><span id="elh_sede_sismed_id_sede"><?php echo $sede_sismed_view->id_sede->caption() ?></span></td>
		<td data-name="id_sede" <?php echo $sede_sismed_view->id_sede->cellAttributes() ?>>
<span id="el_sede_sismed_id_sede">
<span<?php echo $sede_sismed_view->id_sede->viewAttributes() ?>><?php echo $sede_sismed_view->id_sede->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sede_sismed_view->nombre_sede->Visible) { // nombre_sede ?>
	<tr id="r_nombre_sede">
		<td class="<?php echo $sede_sismed_view->TableLeftColumnClass ?>"><span id="elh_sede_sismed_nombre_sede"><?php echo $sede_sismed_view->nombre_sede->caption() ?></span></td>
		<td data-name="nombre_sede" <?php echo $sede_sismed_view->nombre_sede->cellAttributes() ?>>
<span id="el_sede_sismed_nombre_sede">
<span<?php echo $sede_sismed_view->nombre_sede->viewAttributes() ?>><?php echo $sede_sismed_view->nombre_sede->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$sede_sismed_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$sede_sismed_view->isExport()) { ?>
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
$sede_sismed_view->terminate();
?>