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
$camas_hospital_view = new camas_hospital_view();

// Run the page
$camas_hospital_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$camas_hospital_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$camas_hospital_view->isExport()) { ?>
<script>
var fcamas_hospitalview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fcamas_hospitalview = currentForm = new ew.Form("fcamas_hospitalview", "view");
	loadjs.done("fcamas_hospitalview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$camas_hospital_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $camas_hospital_view->ExportOptions->render("body") ?>
<?php $camas_hospital_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $camas_hospital_view->showPageHeader(); ?>
<?php
$camas_hospital_view->showMessage();
?>
<form name="fcamas_hospitalview" id="fcamas_hospitalview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="camas_hospital">
<input type="hidden" name="modal" value="<?php echo (int)$camas_hospital_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($camas_hospital_view->id_hospital->Visible) { // id_hospital ?>
	<tr id="r_id_hospital">
		<td class="<?php echo $camas_hospital_view->TableLeftColumnClass ?>"><span id="elh_camas_hospital_id_hospital"><?php echo $camas_hospital_view->id_hospital->caption() ?></span></td>
		<td data-name="id_hospital" <?php echo $camas_hospital_view->id_hospital->cellAttributes() ?>>
<span id="el_camas_hospital_id_hospital">
<span<?php echo $camas_hospital_view->id_hospital->viewAttributes() ?>><?php echo $camas_hospital_view->id_hospital->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($camas_hospital_view->c_hospitalaria->Visible) { // c_hospitalaria ?>
	<tr id="r_c_hospitalaria">
		<td class="<?php echo $camas_hospital_view->TableLeftColumnClass ?>"><span id="elh_camas_hospital_c_hospitalaria"><?php echo $camas_hospital_view->c_hospitalaria->caption() ?></span></td>
		<td data-name="c_hospitalaria" <?php echo $camas_hospital_view->c_hospitalaria->cellAttributes() ?>>
<span id="el_camas_hospital_c_hospitalaria">
<span<?php echo $camas_hospital_view->c_hospitalaria->viewAttributes() ?>><?php echo $camas_hospital_view->c_hospitalaria->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($camas_hospital_view->c_uci->Visible) { // c_uci ?>
	<tr id="r_c_uci">
		<td class="<?php echo $camas_hospital_view->TableLeftColumnClass ?>"><span id="elh_camas_hospital_c_uci"><?php echo $camas_hospital_view->c_uci->caption() ?></span></td>
		<td data-name="c_uci" <?php echo $camas_hospital_view->c_uci->cellAttributes() ?>>
<span id="el_camas_hospital_c_uci">
<span<?php echo $camas_hospital_view->c_uci->viewAttributes() ?>><?php echo $camas_hospital_view->c_uci->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($camas_hospital_view->c_especial->Visible) { // c_especial ?>
	<tr id="r_c_especial">
		<td class="<?php echo $camas_hospital_view->TableLeftColumnClass ?>"><span id="elh_camas_hospital_c_especial"><?php echo $camas_hospital_view->c_especial->caption() ?></span></td>
		<td data-name="c_especial" <?php echo $camas_hospital_view->c_especial->cellAttributes() ?>>
<span id="el_camas_hospital_c_especial">
<span<?php echo $camas_hospital_view->c_especial->viewAttributes() ?>><?php echo $camas_hospital_view->c_especial->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$camas_hospital_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$camas_hospital_view->isExport()) { ?>
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
$camas_hospital_view->terminate();
?>