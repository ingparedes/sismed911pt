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
$mante_amb_view = new mante_amb_view();

// Run the page
$mante_amb_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mante_amb_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$mante_amb_view->isExport()) { ?>
<script>
var fmante_ambview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmante_ambview = currentForm = new ew.Form("fmante_ambview", "view");
	loadjs.done("fmante_ambview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$mante_amb_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mante_amb_view->ExportOptions->render("body") ?>
<?php $mante_amb_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mante_amb_view->showPageHeader(); ?>
<?php
$mante_amb_view->showMessage();
?>
<form name="fmante_ambview" id="fmante_ambview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mante_amb">
<input type="hidden" name="modal" value="<?php echo (int)$mante_amb_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mante_amb_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mante_amb_view->TableLeftColumnClass ?>"><span id="elh_mante_amb_id"><?php echo $mante_amb_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $mante_amb_view->id->cellAttributes() ?>>
<span id="el_mante_amb_id">
<span<?php echo $mante_amb_view->id->viewAttributes() ?>><?php echo $mante_amb_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mante_amb_view->id_ambulancias->Visible) { // id_ambulancias ?>
	<tr id="r_id_ambulancias">
		<td class="<?php echo $mante_amb_view->TableLeftColumnClass ?>"><span id="elh_mante_amb_id_ambulancias"><?php echo $mante_amb_view->id_ambulancias->caption() ?></span></td>
		<td data-name="id_ambulancias" <?php echo $mante_amb_view->id_ambulancias->cellAttributes() ?>>
<span id="el_mante_amb_id_ambulancias">
<span<?php echo $mante_amb_view->id_ambulancias->viewAttributes() ?>><?php echo $mante_amb_view->id_ambulancias->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mante_amb_view->fecha_inicio->Visible) { // fecha_inicio ?>
	<tr id="r_fecha_inicio">
		<td class="<?php echo $mante_amb_view->TableLeftColumnClass ?>"><span id="elh_mante_amb_fecha_inicio"><?php echo $mante_amb_view->fecha_inicio->caption() ?></span></td>
		<td data-name="fecha_inicio" <?php echo $mante_amb_view->fecha_inicio->cellAttributes() ?>>
<span id="el_mante_amb_fecha_inicio">
<span<?php echo $mante_amb_view->fecha_inicio->viewAttributes() ?>><?php echo $mante_amb_view->fecha_inicio->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mante_amb_view->fecha_fin->Visible) { // fecha_fin ?>
	<tr id="r_fecha_fin">
		<td class="<?php echo $mante_amb_view->TableLeftColumnClass ?>"><span id="elh_mante_amb_fecha_fin"><?php echo $mante_amb_view->fecha_fin->caption() ?></span></td>
		<td data-name="fecha_fin" <?php echo $mante_amb_view->fecha_fin->cellAttributes() ?>>
<span id="el_mante_amb_fecha_fin">
<span<?php echo $mante_amb_view->fecha_fin->viewAttributes() ?>><?php echo $mante_amb_view->fecha_fin->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mante_amb_view->observaciones->Visible) { // observaciones ?>
	<tr id="r_observaciones">
		<td class="<?php echo $mante_amb_view->TableLeftColumnClass ?>"><span id="elh_mante_amb_observaciones"><?php echo $mante_amb_view->observaciones->caption() ?></span></td>
		<td data-name="observaciones" <?php echo $mante_amb_view->observaciones->cellAttributes() ?>>
<span id="el_mante_amb_observaciones">
<span<?php echo $mante_amb_view->observaciones->viewAttributes() ?>><?php echo $mante_amb_view->observaciones->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mante_amb_view->taller->Visible) { // taller ?>
	<tr id="r_taller">
		<td class="<?php echo $mante_amb_view->TableLeftColumnClass ?>"><span id="elh_mante_amb_taller"><?php echo $mante_amb_view->taller->caption() ?></span></td>
		<td data-name="taller" <?php echo $mante_amb_view->taller->cellAttributes() ?>>
<span id="el_mante_amb_taller">
<span<?php echo $mante_amb_view->taller->viewAttributes() ?>><?php echo $mante_amb_view->taller->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mante_amb_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mante_amb_view->isExport()) { ?>
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
$mante_amb_view->terminate();
?>