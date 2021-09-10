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
$servicio_disponibilidad_view = new servicio_disponibilidad_view();

// Run the page
$servicio_disponibilidad_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$servicio_disponibilidad_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$servicio_disponibilidad_view->isExport()) { ?>
<script>
var fservicio_disponibilidadview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fservicio_disponibilidadview = currentForm = new ew.Form("fservicio_disponibilidadview", "view");
	loadjs.done("fservicio_disponibilidadview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$servicio_disponibilidad_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $servicio_disponibilidad_view->ExportOptions->render("body") ?>
<?php $servicio_disponibilidad_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $servicio_disponibilidad_view->showPageHeader(); ?>
<?php
$servicio_disponibilidad_view->showMessage();
?>
<form name="fservicio_disponibilidadview" id="fservicio_disponibilidadview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="servicio_disponibilidad">
<input type="hidden" name="modal" value="<?php echo (int)$servicio_disponibilidad_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($servicio_disponibilidad_view->servicio_disponabilidad->Visible) { // servicio_disponabilidad ?>
	<tr id="r_servicio_disponabilidad">
		<td class="<?php echo $servicio_disponibilidad_view->TableLeftColumnClass ?>"><span id="elh_servicio_disponibilidad_servicio_disponabilidad"><?php echo $servicio_disponibilidad_view->servicio_disponabilidad->caption() ?></span></td>
		<td data-name="servicio_disponabilidad" <?php echo $servicio_disponibilidad_view->servicio_disponabilidad->cellAttributes() ?>>
<span id="el_servicio_disponibilidad_servicio_disponabilidad">
<span<?php echo $servicio_disponibilidad_view->servicio_disponabilidad->viewAttributes() ?>><?php echo $servicio_disponibilidad_view->servicio_disponabilidad->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($servicio_disponibilidad_view->nombre_serv_es->Visible) { // nombre_serv_es ?>
	<tr id="r_nombre_serv_es">
		<td class="<?php echo $servicio_disponibilidad_view->TableLeftColumnClass ?>"><span id="elh_servicio_disponibilidad_nombre_serv_es"><?php echo $servicio_disponibilidad_view->nombre_serv_es->caption() ?></span></td>
		<td data-name="nombre_serv_es" <?php echo $servicio_disponibilidad_view->nombre_serv_es->cellAttributes() ?>>
<span id="el_servicio_disponibilidad_nombre_serv_es">
<span<?php echo $servicio_disponibilidad_view->nombre_serv_es->viewAttributes() ?>><?php echo $servicio_disponibilidad_view->nombre_serv_es->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($servicio_disponibilidad_view->nombre_serv_en->Visible) { // nombre_serv_en ?>
	<tr id="r_nombre_serv_en">
		<td class="<?php echo $servicio_disponibilidad_view->TableLeftColumnClass ?>"><span id="elh_servicio_disponibilidad_nombre_serv_en"><?php echo $servicio_disponibilidad_view->nombre_serv_en->caption() ?></span></td>
		<td data-name="nombre_serv_en" <?php echo $servicio_disponibilidad_view->nombre_serv_en->cellAttributes() ?>>
<span id="el_servicio_disponibilidad_nombre_serv_en">
<span<?php echo $servicio_disponibilidad_view->nombre_serv_en->viewAttributes() ?>><?php echo $servicio_disponibilidad_view->nombre_serv_en->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($servicio_disponibilidad_view->nombre_serv_pr->Visible) { // nombre_serv_pr ?>
	<tr id="r_nombre_serv_pr">
		<td class="<?php echo $servicio_disponibilidad_view->TableLeftColumnClass ?>"><span id="elh_servicio_disponibilidad_nombre_serv_pr"><?php echo $servicio_disponibilidad_view->nombre_serv_pr->caption() ?></span></td>
		<td data-name="nombre_serv_pr" <?php echo $servicio_disponibilidad_view->nombre_serv_pr->cellAttributes() ?>>
<span id="el_servicio_disponibilidad_nombre_serv_pr">
<span<?php echo $servicio_disponibilidad_view->nombre_serv_pr->viewAttributes() ?>><?php echo $servicio_disponibilidad_view->nombre_serv_pr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($servicio_disponibilidad_view->nombre_serv_fr->Visible) { // nombre_serv_fr ?>
	<tr id="r_nombre_serv_fr">
		<td class="<?php echo $servicio_disponibilidad_view->TableLeftColumnClass ?>"><span id="elh_servicio_disponibilidad_nombre_serv_fr"><?php echo $servicio_disponibilidad_view->nombre_serv_fr->caption() ?></span></td>
		<td data-name="nombre_serv_fr" <?php echo $servicio_disponibilidad_view->nombre_serv_fr->cellAttributes() ?>>
<span id="el_servicio_disponibilidad_nombre_serv_fr">
<span<?php echo $servicio_disponibilidad_view->nombre_serv_fr->viewAttributes() ?>><?php echo $servicio_disponibilidad_view->nombre_serv_fr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$servicio_disponibilidad_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$servicio_disponibilidad_view->isExport()) { ?>
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
$servicio_disponibilidad_view->terminate();
?>