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
$turno_registro_view = new turno_registro_view();

// Run the page
$turno_registro_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$turno_registro_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$turno_registro_view->isExport()) { ?>
<script>
var fturno_registroview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fturno_registroview = currentForm = new ew.Form("fturno_registroview", "view");
	loadjs.done("fturno_registroview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$turno_registro_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $turno_registro_view->ExportOptions->render("body") ?>
<?php $turno_registro_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $turno_registro_view->showPageHeader(); ?>
<?php
$turno_registro_view->showMessage();
?>
<form name="fturno_registroview" id="fturno_registroview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="turno_registro">
<input type="hidden" name="modal" value="<?php echo (int)$turno_registro_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($turno_registro_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $turno_registro_view->TableLeftColumnClass ?>"><span id="elh_turno_registro_id"><?php echo $turno_registro_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $turno_registro_view->id->cellAttributes() ?>>
<span id="el_turno_registro_id">
<span<?php echo $turno_registro_view->id->viewAttributes() ?>><?php echo $turno_registro_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($turno_registro_view->cod_ambulancias->Visible) { // cod_ambulancias ?>
	<tr id="r_cod_ambulancias">
		<td class="<?php echo $turno_registro_view->TableLeftColumnClass ?>"><span id="elh_turno_registro_cod_ambulancias"><?php echo $turno_registro_view->cod_ambulancias->caption() ?></span></td>
		<td data-name="cod_ambulancias" <?php echo $turno_registro_view->cod_ambulancias->cellAttributes() ?>>
<span id="el_turno_registro_cod_ambulancias">
<span<?php echo $turno_registro_view->cod_ambulancias->viewAttributes() ?>><?php echo $turno_registro_view->cod_ambulancias->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($turno_registro_view->km_actual->Visible) { // km_actual ?>
	<tr id="r_km_actual">
		<td class="<?php echo $turno_registro_view->TableLeftColumnClass ?>"><span id="elh_turno_registro_km_actual"><?php echo $turno_registro_view->km_actual->caption() ?></span></td>
		<td data-name="km_actual" <?php echo $turno_registro_view->km_actual->cellAttributes() ?>>
<span id="el_turno_registro_km_actual">
<span<?php echo $turno_registro_view->km_actual->viewAttributes() ?>><?php echo $turno_registro_view->km_actual->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($turno_registro_view->combustible_actual->Visible) { // combustible_actual ?>
	<tr id="r_combustible_actual">
		<td class="<?php echo $turno_registro_view->TableLeftColumnClass ?>"><span id="elh_turno_registro_combustible_actual"><?php echo $turno_registro_view->combustible_actual->caption() ?></span></td>
		<td data-name="combustible_actual" <?php echo $turno_registro_view->combustible_actual->cellAttributes() ?>>
<span id="el_turno_registro_combustible_actual">
<span<?php echo $turno_registro_view->combustible_actual->viewAttributes() ?>><?php echo $turno_registro_view->combustible_actual->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($turno_registro_view->cantidadtiket->Visible) { // cantidadtiket ?>
	<tr id="r_cantidadtiket">
		<td class="<?php echo $turno_registro_view->TableLeftColumnClass ?>"><span id="elh_turno_registro_cantidadtiket"><?php echo $turno_registro_view->cantidadtiket->caption() ?></span></td>
		<td data-name="cantidadtiket" <?php echo $turno_registro_view->cantidadtiket->cellAttributes() ?>>
<span id="el_turno_registro_cantidadtiket">
<span<?php echo $turno_registro_view->cantidadtiket->viewAttributes() ?>><?php echo $turno_registro_view->cantidadtiket->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($turno_registro_view->observacion->Visible) { // observacion ?>
	<tr id="r_observacion">
		<td class="<?php echo $turno_registro_view->TableLeftColumnClass ?>"><span id="elh_turno_registro_observacion"><?php echo $turno_registro_view->observacion->caption() ?></span></td>
		<td data-name="observacion" <?php echo $turno_registro_view->observacion->cellAttributes() ?>>
<span id="el_turno_registro_observacion">
<span<?php echo $turno_registro_view->observacion->viewAttributes() ?>><?php echo $turno_registro_view->observacion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($turno_registro_view->usuario->Visible) { // usuario ?>
	<tr id="r_usuario">
		<td class="<?php echo $turno_registro_view->TableLeftColumnClass ?>"><span id="elh_turno_registro_usuario"><?php echo $turno_registro_view->usuario->caption() ?></span></td>
		<td data-name="usuario" <?php echo $turno_registro_view->usuario->cellAttributes() ?>>
<span id="el_turno_registro_usuario">
<span<?php echo $turno_registro_view->usuario->viewAttributes() ?>><?php echo $turno_registro_view->usuario->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$turno_registro_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$turno_registro_view->isExport()) { ?>
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
$turno_registro_view->terminate();
?>