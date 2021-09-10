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
$cie10dx_view = new cie10dx_view();

// Run the page
$cie10dx_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$cie10dx_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$cie10dx_view->isExport()) { ?>
<script>
var fcie10dxview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fcie10dxview = currentForm = new ew.Form("fcie10dxview", "view");
	loadjs.done("fcie10dxview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$cie10dx_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $cie10dx_view->ExportOptions->render("body") ?>
<?php $cie10dx_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $cie10dx_view->showPageHeader(); ?>
<?php
$cie10dx_view->showMessage();
?>
<form name="fcie10dxview" id="fcie10dxview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="cie10dx">
<input type="hidden" name="modal" value="<?php echo (int)$cie10dx_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($cie10dx_view->codcie10->Visible) { // codcie10 ?>
	<tr id="r_codcie10">
		<td class="<?php echo $cie10dx_view->TableLeftColumnClass ?>"><span id="elh_cie10dx_codcie10"><?php echo $cie10dx_view->codcie10->caption() ?></span></td>
		<td data-name="codcie10" <?php echo $cie10dx_view->codcie10->cellAttributes() ?>>
<span id="el_cie10dx_codcie10">
<span<?php echo $cie10dx_view->codcie10->viewAttributes() ?>><?php echo $cie10dx_view->codcie10->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cie10dx_view->dx_es->Visible) { // dx_es ?>
	<tr id="r_dx_es">
		<td class="<?php echo $cie10dx_view->TableLeftColumnClass ?>"><span id="elh_cie10dx_dx_es"><?php echo $cie10dx_view->dx_es->caption() ?></span></td>
		<td data-name="dx_es" <?php echo $cie10dx_view->dx_es->cellAttributes() ?>>
<span id="el_cie10dx_dx_es">
<span<?php echo $cie10dx_view->dx_es->viewAttributes() ?>><?php echo $cie10dx_view->dx_es->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cie10dx_view->dx_en->Visible) { // dx_en ?>
	<tr id="r_dx_en">
		<td class="<?php echo $cie10dx_view->TableLeftColumnClass ?>"><span id="elh_cie10dx_dx_en"><?php echo $cie10dx_view->dx_en->caption() ?></span></td>
		<td data-name="dx_en" <?php echo $cie10dx_view->dx_en->cellAttributes() ?>>
<span id="el_cie10dx_dx_en">
<span<?php echo $cie10dx_view->dx_en->viewAttributes() ?>><?php echo $cie10dx_view->dx_en->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cie10dx_view->dx_pr->Visible) { // dx_pr ?>
	<tr id="r_dx_pr">
		<td class="<?php echo $cie10dx_view->TableLeftColumnClass ?>"><span id="elh_cie10dx_dx_pr"><?php echo $cie10dx_view->dx_pr->caption() ?></span></td>
		<td data-name="dx_pr" <?php echo $cie10dx_view->dx_pr->cellAttributes() ?>>
<span id="el_cie10dx_dx_pr">
<span<?php echo $cie10dx_view->dx_pr->viewAttributes() ?>><?php echo $cie10dx_view->dx_pr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cie10dx_view->dx_fr->Visible) { // dx_fr ?>
	<tr id="r_dx_fr">
		<td class="<?php echo $cie10dx_view->TableLeftColumnClass ?>"><span id="elh_cie10dx_dx_fr"><?php echo $cie10dx_view->dx_fr->caption() ?></span></td>
		<td data-name="dx_fr" <?php echo $cie10dx_view->dx_fr->cellAttributes() ?>>
<span id="el_cie10dx_dx_fr">
<span<?php echo $cie10dx_view->dx_fr->viewAttributes() ?>><?php echo $cie10dx_view->dx_fr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cie10dx_view->dxsoat->Visible) { // dxsoat ?>
	<tr id="r_dxsoat">
		<td class="<?php echo $cie10dx_view->TableLeftColumnClass ?>"><span id="elh_cie10dx_dxsoat"><?php echo $cie10dx_view->dxsoat->caption() ?></span></td>
		<td data-name="dxsoat" <?php echo $cie10dx_view->dxsoat->cellAttributes() ?>>
<span id="el_cie10dx_dxsoat">
<span<?php echo $cie10dx_view->dxsoat->viewAttributes() ?>><?php echo $cie10dx_view->dxsoat->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cie10dx_view->iddx->Visible) { // iddx ?>
	<tr id="r_iddx">
		<td class="<?php echo $cie10dx_view->TableLeftColumnClass ?>"><span id="elh_cie10dx_iddx"><?php echo $cie10dx_view->iddx->caption() ?></span></td>
		<td data-name="iddx" <?php echo $cie10dx_view->iddx->cellAttributes() ?>>
<span id="el_cie10dx_iddx">
<span<?php echo $cie10dx_view->iddx->viewAttributes() ?>><?php echo $cie10dx_view->iddx->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$cie10dx_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$cie10dx_view->isExport()) { ?>
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
$cie10dx_view->terminate();
?>