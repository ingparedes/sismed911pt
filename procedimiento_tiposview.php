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
$procedimiento_tipos_view = new procedimiento_tipos_view();

// Run the page
$procedimiento_tipos_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$procedimiento_tipos_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$procedimiento_tipos_view->isExport()) { ?>
<script>
var fprocedimiento_tiposview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fprocedimiento_tiposview = currentForm = new ew.Form("fprocedimiento_tiposview", "view");
	loadjs.done("fprocedimiento_tiposview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$procedimiento_tipos_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $procedimiento_tipos_view->ExportOptions->render("body") ?>
<?php $procedimiento_tipos_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $procedimiento_tipos_view->showPageHeader(); ?>
<?php
$procedimiento_tipos_view->showMessage();
?>
<form name="fprocedimiento_tiposview" id="fprocedimiento_tiposview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="procedimiento_tipos">
<input type="hidden" name="modal" value="<?php echo (int)$procedimiento_tipos_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($procedimiento_tipos_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $procedimiento_tipos_view->TableLeftColumnClass ?>"><span id="elh_procedimiento_tipos_id"><?php echo $procedimiento_tipos_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $procedimiento_tipos_view->id->cellAttributes() ?>>
<span id="el_procedimiento_tipos_id">
<span<?php echo $procedimiento_tipos_view->id->viewAttributes() ?>><?php echo $procedimiento_tipos_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($procedimiento_tipos_view->nombre_procedimeto->Visible) { // nombre_procedimeto ?>
	<tr id="r_nombre_procedimeto">
		<td class="<?php echo $procedimiento_tipos_view->TableLeftColumnClass ?>"><span id="elh_procedimiento_tipos_nombre_procedimeto"><?php echo $procedimiento_tipos_view->nombre_procedimeto->caption() ?></span></td>
		<td data-name="nombre_procedimeto" <?php echo $procedimiento_tipos_view->nombre_procedimeto->cellAttributes() ?>>
<span id="el_procedimiento_tipos_nombre_procedimeto">
<span<?php echo $procedimiento_tipos_view->nombre_procedimeto->viewAttributes() ?>><?php echo $procedimiento_tipos_view->nombre_procedimeto->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$procedimiento_tipos_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$procedimiento_tipos_view->isExport()) { ?>
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
$procedimiento_tipos_view->terminate();
?>