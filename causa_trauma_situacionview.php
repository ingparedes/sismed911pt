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
$causa_trauma_situacion_view = new causa_trauma_situacion_view();

// Run the page
$causa_trauma_situacion_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$causa_trauma_situacion_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$causa_trauma_situacion_view->isExport()) { ?>
<script>
var fcausa_trauma_situacionview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fcausa_trauma_situacionview = currentForm = new ew.Form("fcausa_trauma_situacionview", "view");
	loadjs.done("fcausa_trauma_situacionview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$causa_trauma_situacion_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $causa_trauma_situacion_view->ExportOptions->render("body") ?>
<?php $causa_trauma_situacion_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $causa_trauma_situacion_view->showPageHeader(); ?>
<?php
$causa_trauma_situacion_view->showMessage();
?>
<form name="fcausa_trauma_situacionview" id="fcausa_trauma_situacionview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="causa_trauma_situacion">
<input type="hidden" name="modal" value="<?php echo (int)$causa_trauma_situacion_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($causa_trauma_situacion_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $causa_trauma_situacion_view->TableLeftColumnClass ?>"><span id="elh_causa_trauma_situacion_id"><?php echo $causa_trauma_situacion_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $causa_trauma_situacion_view->id->cellAttributes() ?>>
<span id="el_causa_trauma_situacion_id">
<span<?php echo $causa_trauma_situacion_view->id->viewAttributes() ?>><?php echo $causa_trauma_situacion_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($causa_trauma_situacion_view->causa_trauma_categoria->Visible) { // causa_trauma_categoria ?>
	<tr id="r_causa_trauma_categoria">
		<td class="<?php echo $causa_trauma_situacion_view->TableLeftColumnClass ?>"><span id="elh_causa_trauma_situacion_causa_trauma_categoria"><?php echo $causa_trauma_situacion_view->causa_trauma_categoria->caption() ?></span></td>
		<td data-name="causa_trauma_categoria" <?php echo $causa_trauma_situacion_view->causa_trauma_categoria->cellAttributes() ?>>
<span id="el_causa_trauma_situacion_causa_trauma_categoria">
<span<?php echo $causa_trauma_situacion_view->causa_trauma_categoria->viewAttributes() ?>><?php echo $causa_trauma_situacion_view->causa_trauma_categoria->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($causa_trauma_situacion_view->nombre->Visible) { // nombre ?>
	<tr id="r_nombre">
		<td class="<?php echo $causa_trauma_situacion_view->TableLeftColumnClass ?>"><span id="elh_causa_trauma_situacion_nombre"><?php echo $causa_trauma_situacion_view->nombre->caption() ?></span></td>
		<td data-name="nombre" <?php echo $causa_trauma_situacion_view->nombre->cellAttributes() ?>>
<span id="el_causa_trauma_situacion_nombre">
<span<?php echo $causa_trauma_situacion_view->nombre->viewAttributes() ?>><?php echo $causa_trauma_situacion_view->nombre->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$causa_trauma_situacion_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$causa_trauma_situacion_view->isExport()) { ?>
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
$causa_trauma_situacion_view->terminate();
?>