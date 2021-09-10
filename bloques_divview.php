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
$bloques_div_view = new bloques_div_view();

// Run the page
$bloques_div_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bloques_div_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$bloques_div_view->isExport()) { ?>
<script>
var fbloques_divview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fbloques_divview = currentForm = new ew.Form("fbloques_divview", "view");
	loadjs.done("fbloques_divview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$bloques_div_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $bloques_div_view->ExportOptions->render("body") ?>
<?php $bloques_div_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $bloques_div_view->showPageHeader(); ?>
<?php
$bloques_div_view->showMessage();
?>
<form name="fbloques_divview" id="fbloques_divview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bloques_div">
<input type="hidden" name="modal" value="<?php echo (int)$bloques_div_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($bloques_div_view->bloque->Visible) { // bloque ?>
	<tr id="r_bloque">
		<td class="<?php echo $bloques_div_view->TableLeftColumnClass ?>"><span id="elh_bloques_div_bloque"><?php echo $bloques_div_view->bloque->caption() ?></span></td>
		<td data-name="bloque" <?php echo $bloques_div_view->bloque->cellAttributes() ?>>
<span id="el_bloques_div_bloque">
<span<?php echo $bloques_div_view->bloque->viewAttributes() ?>><?php echo $bloques_div_view->bloque->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bloques_div_view->fecha_creacion->Visible) { // fecha_creacion ?>
	<tr id="r_fecha_creacion">
		<td class="<?php echo $bloques_div_view->TableLeftColumnClass ?>"><span id="elh_bloques_div_fecha_creacion"><?php echo $bloques_div_view->fecha_creacion->caption() ?></span></td>
		<td data-name="fecha_creacion" <?php echo $bloques_div_view->fecha_creacion->cellAttributes() ?>>
<span id="el_bloques_div_fecha_creacion">
<span<?php echo $bloques_div_view->fecha_creacion->viewAttributes() ?>><?php echo $bloques_div_view->fecha_creacion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bloques_div_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $bloques_div_view->TableLeftColumnClass ?>"><span id="elh_bloques_div_id"><?php echo $bloques_div_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $bloques_div_view->id->cellAttributes() ?>>
<span id="el_bloques_div_id">
<span<?php echo $bloques_div_view->id->viewAttributes() ?>><?php echo $bloques_div_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bloques_div_view->activo->Visible) { // activo ?>
	<tr id="r_activo">
		<td class="<?php echo $bloques_div_view->TableLeftColumnClass ?>"><span id="elh_bloques_div_activo"><?php echo $bloques_div_view->activo->caption() ?></span></td>
		<td data-name="activo" <?php echo $bloques_div_view->activo->cellAttributes() ?>>
<span id="el_bloques_div_activo">
<span<?php echo $bloques_div_view->activo->viewAttributes() ?>><div class="custom-control custom-checkbox d-inline-block"><input type="checkbox" id="x_activo" class="custom-control-input" value="<?php echo $bloques_div_view->activo->getViewValue() ?>" disabled<?php if (ConvertToBool($bloques_div_view->activo->CurrentValue)) { ?> checked<?php } ?>><label class="custom-control-label" for="x_activo"></label></div></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$bloques_div_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$bloques_div_view->isExport()) { ?>
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
$bloques_div_view->terminate();
?>