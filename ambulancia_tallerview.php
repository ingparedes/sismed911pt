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
$ambulancia_taller_view = new ambulancia_taller_view();

// Run the page
$ambulancia_taller_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ambulancia_taller_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ambulancia_taller_view->isExport()) { ?>
<script>
var fambulancia_tallerview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fambulancia_tallerview = currentForm = new ew.Form("fambulancia_tallerview", "view");
	loadjs.done("fambulancia_tallerview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ambulancia_taller_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ambulancia_taller_view->ExportOptions->render("body") ?>
<?php $ambulancia_taller_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ambulancia_taller_view->showPageHeader(); ?>
<?php
$ambulancia_taller_view->showMessage();
?>
<form name="fambulancia_tallerview" id="fambulancia_tallerview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ambulancia_taller">
<input type="hidden" name="modal" value="<?php echo (int)$ambulancia_taller_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($ambulancia_taller_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ambulancia_taller_view->TableLeftColumnClass ?>"><span id="elh_ambulancia_taller_id"><?php echo $ambulancia_taller_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $ambulancia_taller_view->id->cellAttributes() ?>>
<span id="el_ambulancia_taller_id">
<span<?php echo $ambulancia_taller_view->id->viewAttributes() ?>><?php echo $ambulancia_taller_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ambulancia_taller_view->nombre_taller->Visible) { // nombre_taller ?>
	<tr id="r_nombre_taller">
		<td class="<?php echo $ambulancia_taller_view->TableLeftColumnClass ?>"><span id="elh_ambulancia_taller_nombre_taller"><?php echo $ambulancia_taller_view->nombre_taller->caption() ?></span></td>
		<td data-name="nombre_taller" <?php echo $ambulancia_taller_view->nombre_taller->cellAttributes() ?>>
<span id="el_ambulancia_taller_nombre_taller">
<span<?php echo $ambulancia_taller_view->nombre_taller->viewAttributes() ?>><?php echo $ambulancia_taller_view->nombre_taller->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$ambulancia_taller_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ambulancia_taller_view->isExport()) { ?>
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
$ambulancia_taller_view->terminate();
?>