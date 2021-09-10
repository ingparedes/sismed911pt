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
$medicamentos_view = new medicamentos_view();

// Run the page
$medicamentos_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$medicamentos_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$medicamentos_view->isExport()) { ?>
<script>
var fmedicamentosview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmedicamentosview = currentForm = new ew.Form("fmedicamentosview", "view");
	loadjs.done("fmedicamentosview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$medicamentos_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $medicamentos_view->ExportOptions->render("body") ?>
<?php $medicamentos_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $medicamentos_view->showPageHeader(); ?>
<?php
$medicamentos_view->showMessage();
?>
<form name="fmedicamentosview" id="fmedicamentosview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="medicamentos">
<input type="hidden" name="modal" value="<?php echo (int)$medicamentos_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($medicamentos_view->id_medicamento->Visible) { // id_medicamento ?>
	<tr id="r_id_medicamento">
		<td class="<?php echo $medicamentos_view->TableLeftColumnClass ?>"><span id="elh_medicamentos_id_medicamento"><?php echo $medicamentos_view->id_medicamento->caption() ?></span></td>
		<td data-name="id_medicamento" <?php echo $medicamentos_view->id_medicamento->cellAttributes() ?>>
<span id="el_medicamentos_id_medicamento">
<span<?php echo $medicamentos_view->id_medicamento->viewAttributes() ?>><?php echo $medicamentos_view->id_medicamento->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($medicamentos_view->nombre_medicamento->Visible) { // nombre_medicamento ?>
	<tr id="r_nombre_medicamento">
		<td class="<?php echo $medicamentos_view->TableLeftColumnClass ?>"><span id="elh_medicamentos_nombre_medicamento"><?php echo $medicamentos_view->nombre_medicamento->caption() ?></span></td>
		<td data-name="nombre_medicamento" <?php echo $medicamentos_view->nombre_medicamento->cellAttributes() ?>>
<span id="el_medicamentos_nombre_medicamento">
<span<?php echo $medicamentos_view->nombre_medicamento->viewAttributes() ?>><?php echo $medicamentos_view->nombre_medicamento->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($medicamentos_view->valor->Visible) { // valor ?>
	<tr id="r_valor">
		<td class="<?php echo $medicamentos_view->TableLeftColumnClass ?>"><span id="elh_medicamentos_valor"><?php echo $medicamentos_view->valor->caption() ?></span></td>
		<td data-name="valor" <?php echo $medicamentos_view->valor->cellAttributes() ?>>
<span id="el_medicamentos_valor">
<span<?php echo $medicamentos_view->valor->viewAttributes() ?>><?php echo $medicamentos_view->valor->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$medicamentos_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$medicamentos_view->isExport()) { ?>
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
$medicamentos_view->terminate();
?>