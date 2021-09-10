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
$censo_camas_view = new censo_camas_view();

// Run the page
$censo_camas_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$censo_camas_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$censo_camas_view->isExport()) { ?>
<script>
var fcenso_camasview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fcenso_camasview = currentForm = new ew.Form("fcenso_camasview", "view");
	loadjs.done("fcenso_camasview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$censo_camas_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $censo_camas_view->ExportOptions->render("body") ?>
<?php $censo_camas_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $censo_camas_view->showPageHeader(); ?>
<?php
$censo_camas_view->showMessage();
?>
<form name="fcenso_camasview" id="fcenso_camasview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="censo_camas">
<input type="hidden" name="modal" value="<?php echo (int)$censo_camas_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($censo_camas_view->id_cama->Visible) { // id_cama ?>
	<tr id="r_id_cama">
		<td class="<?php echo $censo_camas_view->TableLeftColumnClass ?>"><span id="elh_censo_camas_id_cama"><?php echo $censo_camas_view->id_cama->caption() ?></span></td>
		<td data-name="id_cama" <?php echo $censo_camas_view->id_cama->cellAttributes() ?>>
<span id="el_censo_camas_id_cama">
<span<?php echo $censo_camas_view->id_cama->viewAttributes() ?>><?php echo $censo_camas_view->id_cama->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($censo_camas_view->id_hospital->Visible) { // id_hospital ?>
	<tr id="r_id_hospital">
		<td class="<?php echo $censo_camas_view->TableLeftColumnClass ?>"><span id="elh_censo_camas_id_hospital"><?php echo $censo_camas_view->id_hospital->caption() ?></span></td>
		<td data-name="id_hospital" <?php echo $censo_camas_view->id_hospital->cellAttributes() ?>>
<span id="el_censo_camas_id_hospital">
<span<?php echo $censo_camas_view->id_hospital->viewAttributes() ?>><?php echo $censo_camas_view->id_hospital->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($censo_camas_view->fecha_reporte->Visible) { // fecha_reporte ?>
	<tr id="r_fecha_reporte">
		<td class="<?php echo $censo_camas_view->TableLeftColumnClass ?>"><span id="elh_censo_camas_fecha_reporte"><?php echo $censo_camas_view->fecha_reporte->caption() ?></span></td>
		<td data-name="fecha_reporte" <?php echo $censo_camas_view->fecha_reporte->cellAttributes() ?>>
<span id="el_censo_camas_fecha_reporte">
<span<?php echo $censo_camas_view->fecha_reporte->viewAttributes() ?>><?php echo $censo_camas_view->fecha_reporte->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($censo_camas_view->nombre_reporta->Visible) { // nombre_reporta ?>
	<tr id="r_nombre_reporta">
		<td class="<?php echo $censo_camas_view->TableLeftColumnClass ?>"><span id="elh_censo_camas_nombre_reporta"><?php echo $censo_camas_view->nombre_reporta->caption() ?></span></td>
		<td data-name="nombre_reporta" <?php echo $censo_camas_view->nombre_reporta->cellAttributes() ?>>
<span id="el_censo_camas_nombre_reporta">
<span<?php echo $censo_camas_view->nombre_reporta->viewAttributes() ?>><?php echo $censo_camas_view->nombre_reporta->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($censo_camas_view->tele_reporta->Visible) { // tele_reporta ?>
	<tr id="r_tele_reporta">
		<td class="<?php echo $censo_camas_view->TableLeftColumnClass ?>"><span id="elh_censo_camas_tele_reporta"><?php echo $censo_camas_view->tele_reporta->caption() ?></span></td>
		<td data-name="tele_reporta" <?php echo $censo_camas_view->tele_reporta->cellAttributes() ?>>
<span id="el_censo_camas_tele_reporta">
<span<?php echo $censo_camas_view->tele_reporta->viewAttributes() ?>><?php echo $censo_camas_view->tele_reporta->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($censo_camas_view->id_bloque->Visible) { // id_bloque ?>
	<tr id="r_id_bloque">
		<td class="<?php echo $censo_camas_view->TableLeftColumnClass ?>"><span id="elh_censo_camas_id_bloque"><?php echo $censo_camas_view->id_bloque->caption() ?></span></td>
		<td data-name="id_bloque" <?php echo $censo_camas_view->id_bloque->cellAttributes() ?>>
<span id="el_censo_camas_id_bloque">
<span<?php echo $censo_camas_view->id_bloque->viewAttributes() ?>><?php echo $censo_camas_view->id_bloque->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$censo_camas_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$censo_camas_view->isExport()) { ?>
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
$censo_camas_view->terminate();
?>