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
$especial_ambulancia_view = new especial_ambulancia_view();

// Run the page
$especial_ambulancia_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$especial_ambulancia_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$especial_ambulancia_view->isExport()) { ?>
<script>
var fespecial_ambulanciaview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fespecial_ambulanciaview = currentForm = new ew.Form("fespecial_ambulanciaview", "view");
	loadjs.done("fespecial_ambulanciaview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$especial_ambulancia_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $especial_ambulancia_view->ExportOptions->render("body") ?>
<?php $especial_ambulancia_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $especial_ambulancia_view->showPageHeader(); ?>
<?php
$especial_ambulancia_view->showMessage();
?>
<form name="fespecial_ambulanciaview" id="fespecial_ambulanciaview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="especial_ambulancia">
<input type="hidden" name="modal" value="<?php echo (int)$especial_ambulancia_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($especial_ambulancia_view->id_especialambulancia->Visible) { // id_especialambulancia ?>
	<tr id="r_id_especialambulancia">
		<td class="<?php echo $especial_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_especial_ambulancia_id_especialambulancia"><?php echo $especial_ambulancia_view->id_especialambulancia->caption() ?></span></td>
		<td data-name="id_especialambulancia" <?php echo $especial_ambulancia_view->id_especialambulancia->cellAttributes() ?>>
<span id="el_especial_ambulancia_id_especialambulancia">
<span<?php echo $especial_ambulancia_view->id_especialambulancia->viewAttributes() ?>><?php echo $especial_ambulancia_view->id_especialambulancia->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($especial_ambulancia_view->especial_es->Visible) { // especial_es ?>
	<tr id="r_especial_es">
		<td class="<?php echo $especial_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_especial_ambulancia_especial_es"><?php echo $especial_ambulancia_view->especial_es->caption() ?></span></td>
		<td data-name="especial_es" <?php echo $especial_ambulancia_view->especial_es->cellAttributes() ?>>
<span id="el_especial_ambulancia_especial_es">
<span<?php echo $especial_ambulancia_view->especial_es->viewAttributes() ?>><?php echo $especial_ambulancia_view->especial_es->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($especial_ambulancia_view->especial_en->Visible) { // especial_en ?>
	<tr id="r_especial_en">
		<td class="<?php echo $especial_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_especial_ambulancia_especial_en"><?php echo $especial_ambulancia_view->especial_en->caption() ?></span></td>
		<td data-name="especial_en" <?php echo $especial_ambulancia_view->especial_en->cellAttributes() ?>>
<span id="el_especial_ambulancia_especial_en">
<span<?php echo $especial_ambulancia_view->especial_en->viewAttributes() ?>><?php echo $especial_ambulancia_view->especial_en->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($especial_ambulancia_view->especial_pr->Visible) { // especial_pr ?>
	<tr id="r_especial_pr">
		<td class="<?php echo $especial_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_especial_ambulancia_especial_pr"><?php echo $especial_ambulancia_view->especial_pr->caption() ?></span></td>
		<td data-name="especial_pr" <?php echo $especial_ambulancia_view->especial_pr->cellAttributes() ?>>
<span id="el_especial_ambulancia_especial_pr">
<span<?php echo $especial_ambulancia_view->especial_pr->viewAttributes() ?>><?php echo $especial_ambulancia_view->especial_pr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($especial_ambulancia_view->especial_fr->Visible) { // especial_fr ?>
	<tr id="r_especial_fr">
		<td class="<?php echo $especial_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_especial_ambulancia_especial_fr"><?php echo $especial_ambulancia_view->especial_fr->caption() ?></span></td>
		<td data-name="especial_fr" <?php echo $especial_ambulancia_view->especial_fr->cellAttributes() ?>>
<span id="el_especial_ambulancia_especial_fr">
<span<?php echo $especial_ambulancia_view->especial_fr->viewAttributes() ?>><?php echo $especial_ambulancia_view->especial_fr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$especial_ambulancia_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$especial_ambulancia_view->isExport()) { ?>
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
$especial_ambulancia_view->terminate();
?>