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
$nivel_hospital_view = new nivel_hospital_view();

// Run the page
$nivel_hospital_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$nivel_hospital_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$nivel_hospital_view->isExport()) { ?>
<script>
var fnivel_hospitalview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fnivel_hospitalview = currentForm = new ew.Form("fnivel_hospitalview", "view");
	loadjs.done("fnivel_hospitalview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$nivel_hospital_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $nivel_hospital_view->ExportOptions->render("body") ?>
<?php $nivel_hospital_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $nivel_hospital_view->showPageHeader(); ?>
<?php
$nivel_hospital_view->showMessage();
?>
<form name="fnivel_hospitalview" id="fnivel_hospitalview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="nivel_hospital">
<input type="hidden" name="modal" value="<?php echo (int)$nivel_hospital_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($nivel_hospital_view->id_nivel->Visible) { // id_nivel ?>
	<tr id="r_id_nivel">
		<td class="<?php echo $nivel_hospital_view->TableLeftColumnClass ?>"><span id="elh_nivel_hospital_id_nivel"><?php echo $nivel_hospital_view->id_nivel->caption() ?></span></td>
		<td data-name="id_nivel" <?php echo $nivel_hospital_view->id_nivel->cellAttributes() ?>>
<span id="el_nivel_hospital_id_nivel">
<span<?php echo $nivel_hospital_view->id_nivel->viewAttributes() ?>><?php echo $nivel_hospital_view->id_nivel->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($nivel_hospital_view->nombre_nivel->Visible) { // nombre_nivel ?>
	<tr id="r_nombre_nivel">
		<td class="<?php echo $nivel_hospital_view->TableLeftColumnClass ?>"><span id="elh_nivel_hospital_nombre_nivel"><?php echo $nivel_hospital_view->nombre_nivel->caption() ?></span></td>
		<td data-name="nombre_nivel" <?php echo $nivel_hospital_view->nombre_nivel->cellAttributes() ?>>
<span id="el_nivel_hospital_nombre_nivel">
<span<?php echo $nivel_hospital_view->nombre_nivel->viewAttributes() ?>><?php echo $nivel_hospital_view->nombre_nivel->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$nivel_hospital_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$nivel_hospital_view->isExport()) { ?>
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
$nivel_hospital_view->terminate();
?>