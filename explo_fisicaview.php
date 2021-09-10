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
$explo_fisica_view = new explo_fisica_view();

// Run the page
$explo_fisica_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$explo_fisica_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$explo_fisica_view->isExport()) { ?>
<script>
var fexplo_fisicaview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fexplo_fisicaview = currentForm = new ew.Form("fexplo_fisicaview", "view");
	loadjs.done("fexplo_fisicaview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$explo_fisica_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $explo_fisica_view->ExportOptions->render("body") ?>
<?php $explo_fisica_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $explo_fisica_view->showPageHeader(); ?>
<?php
$explo_fisica_view->showMessage();
?>
<form name="fexplo_fisicaview" id="fexplo_fisicaview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="explo_fisica">
<input type="hidden" name="modal" value="<?php echo (int)$explo_fisica_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($explo_fisica_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $explo_fisica_view->TableLeftColumnClass ?>"><span id="elh_explo_fisica_id"><?php echo $explo_fisica_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $explo_fisica_view->id->cellAttributes() ?>>
<span id="el_explo_fisica_id">
<span<?php echo $explo_fisica_view->id->viewAttributes() ?>><?php echo $explo_fisica_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($explo_fisica_view->nombre->Visible) { // nombre ?>
	<tr id="r_nombre">
		<td class="<?php echo $explo_fisica_view->TableLeftColumnClass ?>"><span id="elh_explo_fisica_nombre"><?php echo $explo_fisica_view->nombre->caption() ?></span></td>
		<td data-name="nombre" <?php echo $explo_fisica_view->nombre->cellAttributes() ?>>
<span id="el_explo_fisica_nombre">
<span<?php echo $explo_fisica_view->nombre->viewAttributes() ?>><?php echo $explo_fisica_view->nombre->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$explo_fisica_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$explo_fisica_view->isExport()) { ?>
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
$explo_fisica_view->terminate();
?>