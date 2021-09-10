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
$causa_externa_view = new causa_externa_view();

// Run the page
$causa_externa_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$causa_externa_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$causa_externa_view->isExport()) { ?>
<script>
var fcausa_externaview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fcausa_externaview = currentForm = new ew.Form("fcausa_externaview", "view");
	loadjs.done("fcausa_externaview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$causa_externa_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $causa_externa_view->ExportOptions->render("body") ?>
<?php $causa_externa_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $causa_externa_view->showPageHeader(); ?>
<?php
$causa_externa_view->showMessage();
?>
<form name="fcausa_externaview" id="fcausa_externaview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="causa_externa">
<input type="hidden" name="modal" value="<?php echo (int)$causa_externa_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($causa_externa_view->id_causa->Visible) { // id_causa ?>
	<tr id="r_id_causa">
		<td class="<?php echo $causa_externa_view->TableLeftColumnClass ?>"><span id="elh_causa_externa_id_causa"><?php echo $causa_externa_view->id_causa->caption() ?></span></td>
		<td data-name="id_causa" <?php echo $causa_externa_view->id_causa->cellAttributes() ?>>
<span id="el_causa_externa_id_causa">
<span<?php echo $causa_externa_view->id_causa->viewAttributes() ?>><?php echo $causa_externa_view->id_causa->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($causa_externa_view->nom_causa->Visible) { // nom_causa ?>
	<tr id="r_nom_causa">
		<td class="<?php echo $causa_externa_view->TableLeftColumnClass ?>"><span id="elh_causa_externa_nom_causa"><?php echo $causa_externa_view->nom_causa->caption() ?></span></td>
		<td data-name="nom_causa" <?php echo $causa_externa_view->nom_causa->cellAttributes() ?>>
<span id="el_causa_externa_nom_causa">
<span<?php echo $causa_externa_view->nom_causa->viewAttributes() ?>><?php echo $causa_externa_view->nom_causa->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$causa_externa_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$causa_externa_view->isExport()) { ?>
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
$causa_externa_view->terminate();
?>