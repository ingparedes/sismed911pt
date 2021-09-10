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
$catalogo_serv_taller_view = new catalogo_serv_taller_view();

// Run the page
$catalogo_serv_taller_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$catalogo_serv_taller_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$catalogo_serv_taller_view->isExport()) { ?>
<script>
var fcatalogo_serv_tallerview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fcatalogo_serv_tallerview = currentForm = new ew.Form("fcatalogo_serv_tallerview", "view");
	loadjs.done("fcatalogo_serv_tallerview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$catalogo_serv_taller_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $catalogo_serv_taller_view->ExportOptions->render("body") ?>
<?php $catalogo_serv_taller_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $catalogo_serv_taller_view->showPageHeader(); ?>
<?php
$catalogo_serv_taller_view->showMessage();
?>
<form name="fcatalogo_serv_tallerview" id="fcatalogo_serv_tallerview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="catalogo_serv_taller">
<input type="hidden" name="modal" value="<?php echo (int)$catalogo_serv_taller_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($catalogo_serv_taller_view->id_catalogo->Visible) { // id_catalogo ?>
	<tr id="r_id_catalogo">
		<td class="<?php echo $catalogo_serv_taller_view->TableLeftColumnClass ?>"><span id="elh_catalogo_serv_taller_id_catalogo"><?php echo $catalogo_serv_taller_view->id_catalogo->caption() ?></span></td>
		<td data-name="id_catalogo" <?php echo $catalogo_serv_taller_view->id_catalogo->cellAttributes() ?>>
<span id="el_catalogo_serv_taller_id_catalogo">
<span<?php echo $catalogo_serv_taller_view->id_catalogo->viewAttributes() ?>><?php echo $catalogo_serv_taller_view->id_catalogo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($catalogo_serv_taller_view->servicio_en->Visible) { // servicio_en ?>
	<tr id="r_servicio_en">
		<td class="<?php echo $catalogo_serv_taller_view->TableLeftColumnClass ?>"><span id="elh_catalogo_serv_taller_servicio_en"><?php echo $catalogo_serv_taller_view->servicio_en->caption() ?></span></td>
		<td data-name="servicio_en" <?php echo $catalogo_serv_taller_view->servicio_en->cellAttributes() ?>>
<span id="el_catalogo_serv_taller_servicio_en">
<span<?php echo $catalogo_serv_taller_view->servicio_en->viewAttributes() ?>><?php echo $catalogo_serv_taller_view->servicio_en->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($catalogo_serv_taller_view->servicio_es->Visible) { // servicio_es ?>
	<tr id="r_servicio_es">
		<td class="<?php echo $catalogo_serv_taller_view->TableLeftColumnClass ?>"><span id="elh_catalogo_serv_taller_servicio_es"><?php echo $catalogo_serv_taller_view->servicio_es->caption() ?></span></td>
		<td data-name="servicio_es" <?php echo $catalogo_serv_taller_view->servicio_es->cellAttributes() ?>>
<span id="el_catalogo_serv_taller_servicio_es">
<span<?php echo $catalogo_serv_taller_view->servicio_es->viewAttributes() ?>><?php echo $catalogo_serv_taller_view->servicio_es->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($catalogo_serv_taller_view->servicio_pr->Visible) { // servicio_pr ?>
	<tr id="r_servicio_pr">
		<td class="<?php echo $catalogo_serv_taller_view->TableLeftColumnClass ?>"><span id="elh_catalogo_serv_taller_servicio_pr"><?php echo $catalogo_serv_taller_view->servicio_pr->caption() ?></span></td>
		<td data-name="servicio_pr" <?php echo $catalogo_serv_taller_view->servicio_pr->cellAttributes() ?>>
<span id="el_catalogo_serv_taller_servicio_pr">
<span<?php echo $catalogo_serv_taller_view->servicio_pr->viewAttributes() ?>><?php echo $catalogo_serv_taller_view->servicio_pr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($catalogo_serv_taller_view->servicio_fr->Visible) { // servicio_fr ?>
	<tr id="r_servicio_fr">
		<td class="<?php echo $catalogo_serv_taller_view->TableLeftColumnClass ?>"><span id="elh_catalogo_serv_taller_servicio_fr"><?php echo $catalogo_serv_taller_view->servicio_fr->caption() ?></span></td>
		<td data-name="servicio_fr" <?php echo $catalogo_serv_taller_view->servicio_fr->cellAttributes() ?>>
<span id="el_catalogo_serv_taller_servicio_fr">
<span<?php echo $catalogo_serv_taller_view->servicio_fr->viewAttributes() ?>><?php echo $catalogo_serv_taller_view->servicio_fr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$catalogo_serv_taller_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$catalogo_serv_taller_view->isExport()) { ?>
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
$catalogo_serv_taller_view->terminate();
?>