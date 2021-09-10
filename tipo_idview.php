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
$tipo_id_view = new tipo_id_view();

// Run the page
$tipo_id_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tipo_id_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$tipo_id_view->isExport()) { ?>
<script>
var ftipo_idview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ftipo_idview = currentForm = new ew.Form("ftipo_idview", "view");
	loadjs.done("ftipo_idview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$tipo_id_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $tipo_id_view->ExportOptions->render("body") ?>
<?php $tipo_id_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $tipo_id_view->showPageHeader(); ?>
<?php
$tipo_id_view->showMessage();
?>
<form name="ftipo_idview" id="ftipo_idview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tipo_id">
<input type="hidden" name="modal" value="<?php echo (int)$tipo_id_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($tipo_id_view->id_tipo->Visible) { // id_tipo ?>
	<tr id="r_id_tipo">
		<td class="<?php echo $tipo_id_view->TableLeftColumnClass ?>"><span id="elh_tipo_id_id_tipo"><?php echo $tipo_id_view->id_tipo->caption() ?></span></td>
		<td data-name="id_tipo" <?php echo $tipo_id_view->id_tipo->cellAttributes() ?>>
<span id="el_tipo_id_id_tipo">
<span<?php echo $tipo_id_view->id_tipo->viewAttributes() ?>><?php echo $tipo_id_view->id_tipo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tipo_id_view->descripcion->Visible) { // descripcion ?>
	<tr id="r_descripcion">
		<td class="<?php echo $tipo_id_view->TableLeftColumnClass ?>"><span id="elh_tipo_id_descripcion"><?php echo $tipo_id_view->descripcion->caption() ?></span></td>
		<td data-name="descripcion" <?php echo $tipo_id_view->descripcion->cellAttributes() ?>>
<span id="el_tipo_id_descripcion">
<span<?php echo $tipo_id_view->descripcion->viewAttributes() ?>><?php echo $tipo_id_view->descripcion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tipo_id_view->descripcion_en->Visible) { // descripcion_en ?>
	<tr id="r_descripcion_en">
		<td class="<?php echo $tipo_id_view->TableLeftColumnClass ?>"><span id="elh_tipo_id_descripcion_en"><?php echo $tipo_id_view->descripcion_en->caption() ?></span></td>
		<td data-name="descripcion_en" <?php echo $tipo_id_view->descripcion_en->cellAttributes() ?>>
<span id="el_tipo_id_descripcion_en">
<span<?php echo $tipo_id_view->descripcion_en->viewAttributes() ?>><?php echo $tipo_id_view->descripcion_en->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tipo_id_view->descripcion_pr->Visible) { // descripcion_pr ?>
	<tr id="r_descripcion_pr">
		<td class="<?php echo $tipo_id_view->TableLeftColumnClass ?>"><span id="elh_tipo_id_descripcion_pr"><?php echo $tipo_id_view->descripcion_pr->caption() ?></span></td>
		<td data-name="descripcion_pr" <?php echo $tipo_id_view->descripcion_pr->cellAttributes() ?>>
<span id="el_tipo_id_descripcion_pr">
<span<?php echo $tipo_id_view->descripcion_pr->viewAttributes() ?>><?php echo $tipo_id_view->descripcion_pr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tipo_id_view->descripcion_fr->Visible) { // descripcion_fr ?>
	<tr id="r_descripcion_fr">
		<td class="<?php echo $tipo_id_view->TableLeftColumnClass ?>"><span id="elh_tipo_id_descripcion_fr"><?php echo $tipo_id_view->descripcion_fr->caption() ?></span></td>
		<td data-name="descripcion_fr" <?php echo $tipo_id_view->descripcion_fr->cellAttributes() ?>>
<span id="el_tipo_id_descripcion_fr">
<span<?php echo $tipo_id_view->descripcion_fr->viewAttributes() ?>><?php echo $tipo_id_view->descripcion_fr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$tipo_id_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$tipo_id_view->isExport()) { ?>
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
$tipo_id_view->terminate();
?>