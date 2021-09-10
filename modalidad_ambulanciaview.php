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
$modalidad_ambulancia_view = new modalidad_ambulancia_view();

// Run the page
$modalidad_ambulancia_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$modalidad_ambulancia_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$modalidad_ambulancia_view->isExport()) { ?>
<script>
var fmodalidad_ambulanciaview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmodalidad_ambulanciaview = currentForm = new ew.Form("fmodalidad_ambulanciaview", "view");
	loadjs.done("fmodalidad_ambulanciaview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$modalidad_ambulancia_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $modalidad_ambulancia_view->ExportOptions->render("body") ?>
<?php $modalidad_ambulancia_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $modalidad_ambulancia_view->showPageHeader(); ?>
<?php
$modalidad_ambulancia_view->showMessage();
?>
<form name="fmodalidad_ambulanciaview" id="fmodalidad_ambulanciaview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="modalidad_ambulancia">
<input type="hidden" name="modal" value="<?php echo (int)$modalidad_ambulancia_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($modalidad_ambulancia_view->id_modalidad->Visible) { // id_modalidad ?>
	<tr id="r_id_modalidad">
		<td class="<?php echo $modalidad_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_modalidad_ambulancia_id_modalidad"><?php echo $modalidad_ambulancia_view->id_modalidad->caption() ?></span></td>
		<td data-name="id_modalidad" <?php echo $modalidad_ambulancia_view->id_modalidad->cellAttributes() ?>>
<span id="el_modalidad_ambulancia_id_modalidad">
<span<?php echo $modalidad_ambulancia_view->id_modalidad->viewAttributes() ?>><?php echo $modalidad_ambulancia_view->id_modalidad->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($modalidad_ambulancia_view->modalidadambu_es->Visible) { // modalidadambu_es ?>
	<tr id="r_modalidadambu_es">
		<td class="<?php echo $modalidad_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_modalidad_ambulancia_modalidadambu_es"><?php echo $modalidad_ambulancia_view->modalidadambu_es->caption() ?></span></td>
		<td data-name="modalidadambu_es" <?php echo $modalidad_ambulancia_view->modalidadambu_es->cellAttributes() ?>>
<span id="el_modalidad_ambulancia_modalidadambu_es">
<span<?php echo $modalidad_ambulancia_view->modalidadambu_es->viewAttributes() ?>><?php echo $modalidad_ambulancia_view->modalidadambu_es->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($modalidad_ambulancia_view->modalidadambu_en->Visible) { // modalidadambu_en ?>
	<tr id="r_modalidadambu_en">
		<td class="<?php echo $modalidad_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_modalidad_ambulancia_modalidadambu_en"><?php echo $modalidad_ambulancia_view->modalidadambu_en->caption() ?></span></td>
		<td data-name="modalidadambu_en" <?php echo $modalidad_ambulancia_view->modalidadambu_en->cellAttributes() ?>>
<span id="el_modalidad_ambulancia_modalidadambu_en">
<span<?php echo $modalidad_ambulancia_view->modalidadambu_en->viewAttributes() ?>><?php echo $modalidad_ambulancia_view->modalidadambu_en->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($modalidad_ambulancia_view->modalidadambu_pr->Visible) { // modalidadambu_pr ?>
	<tr id="r_modalidadambu_pr">
		<td class="<?php echo $modalidad_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_modalidad_ambulancia_modalidadambu_pr"><?php echo $modalidad_ambulancia_view->modalidadambu_pr->caption() ?></span></td>
		<td data-name="modalidadambu_pr" <?php echo $modalidad_ambulancia_view->modalidadambu_pr->cellAttributes() ?>>
<span id="el_modalidad_ambulancia_modalidadambu_pr">
<span<?php echo $modalidad_ambulancia_view->modalidadambu_pr->viewAttributes() ?>><?php echo $modalidad_ambulancia_view->modalidadambu_pr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($modalidad_ambulancia_view->modalidadambu_fr->Visible) { // modalidadambu_fr ?>
	<tr id="r_modalidadambu_fr">
		<td class="<?php echo $modalidad_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_modalidad_ambulancia_modalidadambu_fr"><?php echo $modalidad_ambulancia_view->modalidadambu_fr->caption() ?></span></td>
		<td data-name="modalidadambu_fr" <?php echo $modalidad_ambulancia_view->modalidadambu_fr->cellAttributes() ?>>
<span id="el_modalidad_ambulancia_modalidadambu_fr">
<span<?php echo $modalidad_ambulancia_view->modalidadambu_fr->viewAttributes() ?>><?php echo $modalidad_ambulancia_view->modalidadambu_fr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$modalidad_ambulancia_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$modalidad_ambulancia_view->isExport()) { ?>
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
$modalidad_ambulancia_view->terminate();
?>