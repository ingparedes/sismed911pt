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
$tipo_llamada_view = new tipo_llamada_view();

// Run the page
$tipo_llamada_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tipo_llamada_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$tipo_llamada_view->isExport()) { ?>
<script>
var ftipo_llamadaview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ftipo_llamadaview = currentForm = new ew.Form("ftipo_llamadaview", "view");
	loadjs.done("ftipo_llamadaview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$tipo_llamada_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $tipo_llamada_view->ExportOptions->render("body") ?>
<?php $tipo_llamada_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $tipo_llamada_view->showPageHeader(); ?>
<?php
$tipo_llamada_view->showMessage();
?>
<form name="ftipo_llamadaview" id="ftipo_llamadaview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tipo_llamada">
<input type="hidden" name="modal" value="<?php echo (int)$tipo_llamada_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($tipo_llamada_view->id_llamda_f->Visible) { // id_llamda_f ?>
	<tr id="r_id_llamda_f">
		<td class="<?php echo $tipo_llamada_view->TableLeftColumnClass ?>"><span id="elh_tipo_llamada_id_llamda_f"><?php echo $tipo_llamada_view->id_llamda_f->caption() ?></span></td>
		<td data-name="id_llamda_f" <?php echo $tipo_llamada_view->id_llamda_f->cellAttributes() ?>>
<span id="el_tipo_llamada_id_llamda_f">
<span<?php echo $tipo_llamada_view->id_llamda_f->viewAttributes() ?>><?php echo $tipo_llamada_view->id_llamda_f->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tipo_llamada_view->llamada_fallida->Visible) { // llamada_fallida ?>
	<tr id="r_llamada_fallida">
		<td class="<?php echo $tipo_llamada_view->TableLeftColumnClass ?>"><span id="elh_tipo_llamada_llamada_fallida"><?php echo $tipo_llamada_view->llamada_fallida->caption() ?></span></td>
		<td data-name="llamada_fallida" <?php echo $tipo_llamada_view->llamada_fallida->cellAttributes() ?>>
<span id="el_tipo_llamada_llamada_fallida">
<span<?php echo $tipo_llamada_view->llamada_fallida->viewAttributes() ?>><?php echo $tipo_llamada_view->llamada_fallida->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tipo_llamada_view->llamada_fallida_en->Visible) { // llamada_fallida_en ?>
	<tr id="r_llamada_fallida_en">
		<td class="<?php echo $tipo_llamada_view->TableLeftColumnClass ?>"><span id="elh_tipo_llamada_llamada_fallida_en"><?php echo $tipo_llamada_view->llamada_fallida_en->caption() ?></span></td>
		<td data-name="llamada_fallida_en" <?php echo $tipo_llamada_view->llamada_fallida_en->cellAttributes() ?>>
<span id="el_tipo_llamada_llamada_fallida_en">
<span<?php echo $tipo_llamada_view->llamada_fallida_en->viewAttributes() ?>><?php echo $tipo_llamada_view->llamada_fallida_en->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tipo_llamada_view->llamada_fallida_pr->Visible) { // llamada_fallida_pr ?>
	<tr id="r_llamada_fallida_pr">
		<td class="<?php echo $tipo_llamada_view->TableLeftColumnClass ?>"><span id="elh_tipo_llamada_llamada_fallida_pr"><?php echo $tipo_llamada_view->llamada_fallida_pr->caption() ?></span></td>
		<td data-name="llamada_fallida_pr" <?php echo $tipo_llamada_view->llamada_fallida_pr->cellAttributes() ?>>
<span id="el_tipo_llamada_llamada_fallida_pr">
<span<?php echo $tipo_llamada_view->llamada_fallida_pr->viewAttributes() ?>><?php echo $tipo_llamada_view->llamada_fallida_pr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tipo_llamada_view->llamada_fallida_fr->Visible) { // llamada_fallida_fr ?>
	<tr id="r_llamada_fallida_fr">
		<td class="<?php echo $tipo_llamada_view->TableLeftColumnClass ?>"><span id="elh_tipo_llamada_llamada_fallida_fr"><?php echo $tipo_llamada_view->llamada_fallida_fr->caption() ?></span></td>
		<td data-name="llamada_fallida_fr" <?php echo $tipo_llamada_view->llamada_fallida_fr->cellAttributes() ?>>
<span id="el_tipo_llamada_llamada_fallida_fr">
<span<?php echo $tipo_llamada_view->llamada_fallida_fr->viewAttributes() ?>><?php echo $tipo_llamada_view->llamada_fallida_fr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$tipo_llamada_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$tipo_llamada_view->isExport()) { ?>
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
$tipo_llamada_view->terminate();
?>