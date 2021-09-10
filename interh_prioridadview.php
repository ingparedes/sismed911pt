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
$interh_prioridad_view = new interh_prioridad_view();

// Run the page
$interh_prioridad_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_prioridad_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$interh_prioridad_view->isExport()) { ?>
<script>
var finterh_prioridadview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	finterh_prioridadview = currentForm = new ew.Form("finterh_prioridadview", "view");
	loadjs.done("finterh_prioridadview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$interh_prioridad_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $interh_prioridad_view->ExportOptions->render("body") ?>
<?php $interh_prioridad_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $interh_prioridad_view->showPageHeader(); ?>
<?php
$interh_prioridad_view->showMessage();
?>
<form name="finterh_prioridadview" id="finterh_prioridadview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="interh_prioridad">
<input type="hidden" name="modal" value="<?php echo (int)$interh_prioridad_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($interh_prioridad_view->id_prioridad->Visible) { // id_prioridad ?>
	<tr id="r_id_prioridad">
		<td class="<?php echo $interh_prioridad_view->TableLeftColumnClass ?>"><span id="elh_interh_prioridad_id_prioridad"><?php echo $interh_prioridad_view->id_prioridad->caption() ?></span></td>
		<td data-name="id_prioridad" <?php echo $interh_prioridad_view->id_prioridad->cellAttributes() ?>>
<span id="el_interh_prioridad_id_prioridad">
<span<?php echo $interh_prioridad_view->id_prioridad->viewAttributes() ?>><?php echo $interh_prioridad_view->id_prioridad->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($interh_prioridad_view->nombre_prioridad->Visible) { // nombre_prioridad ?>
	<tr id="r_nombre_prioridad">
		<td class="<?php echo $interh_prioridad_view->TableLeftColumnClass ?>"><span id="elh_interh_prioridad_nombre_prioridad"><?php echo $interh_prioridad_view->nombre_prioridad->caption() ?></span></td>
		<td data-name="nombre_prioridad" <?php echo $interh_prioridad_view->nombre_prioridad->cellAttributes() ?>>
<span id="el_interh_prioridad_nombre_prioridad">
<span<?php echo $interh_prioridad_view->nombre_prioridad->viewAttributes() ?>><?php echo $interh_prioridad_view->nombre_prioridad->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$interh_prioridad_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$interh_prioridad_view->isExport()) { ?>
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
$interh_prioridad_view->terminate();
?>