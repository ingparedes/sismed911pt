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
$tipo_ambulancia_view = new tipo_ambulancia_view();

// Run the page
$tipo_ambulancia_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tipo_ambulancia_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$tipo_ambulancia_view->isExport()) { ?>
<script>
var ftipo_ambulanciaview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ftipo_ambulanciaview = currentForm = new ew.Form("ftipo_ambulanciaview", "view");
	loadjs.done("ftipo_ambulanciaview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$tipo_ambulancia_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $tipo_ambulancia_view->ExportOptions->render("body") ?>
<?php $tipo_ambulancia_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $tipo_ambulancia_view->showPageHeader(); ?>
<?php
$tipo_ambulancia_view->showMessage();
?>
<form name="ftipo_ambulanciaview" id="ftipo_ambulanciaview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tipo_ambulancia">
<input type="hidden" name="modal" value="<?php echo (int)$tipo_ambulancia_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($tipo_ambulancia_view->id_tipotransport->Visible) { // id_tipotransport ?>
	<tr id="r_id_tipotransport">
		<td class="<?php echo $tipo_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_tipo_ambulancia_id_tipotransport"><?php echo $tipo_ambulancia_view->id_tipotransport->caption() ?></span></td>
		<td data-name="id_tipotransport" <?php echo $tipo_ambulancia_view->id_tipotransport->cellAttributes() ?>>
<span id="el_tipo_ambulancia_id_tipotransport">
<span<?php echo $tipo_ambulancia_view->id_tipotransport->viewAttributes() ?>><?php echo $tipo_ambulancia_view->id_tipotransport->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tipo_ambulancia_view->tipo_amb_es->Visible) { // tipo_amb_es ?>
	<tr id="r_tipo_amb_es">
		<td class="<?php echo $tipo_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_tipo_ambulancia_tipo_amb_es"><?php echo $tipo_ambulancia_view->tipo_amb_es->caption() ?></span></td>
		<td data-name="tipo_amb_es" <?php echo $tipo_ambulancia_view->tipo_amb_es->cellAttributes() ?>>
<span id="el_tipo_ambulancia_tipo_amb_es">
<span<?php echo $tipo_ambulancia_view->tipo_amb_es->viewAttributes() ?>><?php echo $tipo_ambulancia_view->tipo_amb_es->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tipo_ambulancia_view->tipo_amb_en->Visible) { // tipo_amb_en ?>
	<tr id="r_tipo_amb_en">
		<td class="<?php echo $tipo_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_tipo_ambulancia_tipo_amb_en"><?php echo $tipo_ambulancia_view->tipo_amb_en->caption() ?></span></td>
		<td data-name="tipo_amb_en" <?php echo $tipo_ambulancia_view->tipo_amb_en->cellAttributes() ?>>
<span id="el_tipo_ambulancia_tipo_amb_en">
<span<?php echo $tipo_ambulancia_view->tipo_amb_en->viewAttributes() ?>><?php echo $tipo_ambulancia_view->tipo_amb_en->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tipo_ambulancia_view->tipo_amb_pr->Visible) { // tipo_amb_pr ?>
	<tr id="r_tipo_amb_pr">
		<td class="<?php echo $tipo_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_tipo_ambulancia_tipo_amb_pr"><?php echo $tipo_ambulancia_view->tipo_amb_pr->caption() ?></span></td>
		<td data-name="tipo_amb_pr" <?php echo $tipo_ambulancia_view->tipo_amb_pr->cellAttributes() ?>>
<span id="el_tipo_ambulancia_tipo_amb_pr">
<span<?php echo $tipo_ambulancia_view->tipo_amb_pr->viewAttributes() ?>><?php echo $tipo_ambulancia_view->tipo_amb_pr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tipo_ambulancia_view->tipo_amb_fr->Visible) { // tipo_amb_fr ?>
	<tr id="r_tipo_amb_fr">
		<td class="<?php echo $tipo_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_tipo_ambulancia_tipo_amb_fr"><?php echo $tipo_ambulancia_view->tipo_amb_fr->caption() ?></span></td>
		<td data-name="tipo_amb_fr" <?php echo $tipo_ambulancia_view->tipo_amb_fr->cellAttributes() ?>>
<span id="el_tipo_ambulancia_tipo_amb_fr">
<span<?php echo $tipo_ambulancia_view->tipo_amb_fr->viewAttributes() ?>><?php echo $tipo_ambulancia_view->tipo_amb_fr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tipo_ambulancia_view->codigo->Visible) { // codigo ?>
	<tr id="r_codigo">
		<td class="<?php echo $tipo_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_tipo_ambulancia_codigo"><?php echo $tipo_ambulancia_view->codigo->caption() ?></span></td>
		<td data-name="codigo" <?php echo $tipo_ambulancia_view->codigo->cellAttributes() ?>>
<span id="el_tipo_ambulancia_codigo">
<span<?php echo $tipo_ambulancia_view->codigo->viewAttributes() ?>><?php echo $tipo_ambulancia_view->codigo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$tipo_ambulancia_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$tipo_ambulancia_view->isExport()) { ?>
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
$tipo_ambulancia_view->terminate();
?>