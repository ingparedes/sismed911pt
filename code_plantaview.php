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
$code_planta_view = new code_planta_view();

// Run the page
$code_planta_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$code_planta_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$code_planta_view->isExport()) { ?>
<script>
var fcode_plantaview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fcode_plantaview = currentForm = new ew.Form("fcode_plantaview", "view");
	loadjs.done("fcode_plantaview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$code_planta_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $code_planta_view->ExportOptions->render("body") ?>
<?php $code_planta_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $code_planta_view->showPageHeader(); ?>
<?php
$code_planta_view->showMessage();
?>
<form name="fcode_plantaview" id="fcode_plantaview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="code_planta">
<input type="hidden" name="modal" value="<?php echo (int)$code_planta_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($code_planta_view->idacode->Visible) { // idacode ?>
	<tr id="r_idacode">
		<td class="<?php echo $code_planta_view->TableLeftColumnClass ?>"><span id="elh_code_planta_idacode"><?php echo $code_planta_view->idacode->caption() ?></span></td>
		<td data-name="idacode" <?php echo $code_planta_view->idacode->cellAttributes() ?>>
<span id="el_code_planta_idacode">
<span<?php echo $code_planta_view->idacode->viewAttributes() ?>><?php echo $code_planta_view->idacode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($code_planta_view->nombreacode->Visible) { // nombreacode ?>
	<tr id="r_nombreacode">
		<td class="<?php echo $code_planta_view->TableLeftColumnClass ?>"><span id="elh_code_planta_nombreacode"><?php echo $code_planta_view->nombreacode->caption() ?></span></td>
		<td data-name="nombreacode" <?php echo $code_planta_view->nombreacode->cellAttributes() ?>>
<span id="el_code_planta_nombreacode">
<span<?php echo $code_planta_view->nombreacode->viewAttributes() ?>><?php echo $code_planta_view->nombreacode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$code_planta_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$code_planta_view->isExport()) { ?>
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
$code_planta_view->terminate();
?>