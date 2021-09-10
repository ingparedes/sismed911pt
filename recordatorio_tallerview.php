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
$recordatorio_taller_view = new recordatorio_taller_view();

// Run the page
$recordatorio_taller_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recordatorio_taller_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$recordatorio_taller_view->isExport()) { ?>
<script>
var frecordatorio_tallerview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	frecordatorio_tallerview = currentForm = new ew.Form("frecordatorio_tallerview", "view");
	loadjs.done("frecordatorio_tallerview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$recordatorio_taller_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $recordatorio_taller_view->ExportOptions->render("body") ?>
<?php $recordatorio_taller_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $recordatorio_taller_view->showPageHeader(); ?>
<?php
$recordatorio_taller_view->showMessage();
?>
<form name="frecordatorio_tallerview" id="frecordatorio_tallerview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recordatorio_taller">
<input type="hidden" name="modal" value="<?php echo (int)$recordatorio_taller_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($recordatorio_taller_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $recordatorio_taller_view->TableLeftColumnClass ?>"><span id="elh_recordatorio_taller_id"><?php echo $recordatorio_taller_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $recordatorio_taller_view->id->cellAttributes() ?>>
<span id="el_recordatorio_taller_id">
<span<?php echo $recordatorio_taller_view->id->viewAttributes() ?>><?php echo $recordatorio_taller_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recordatorio_taller_view->vehiculo->Visible) { // vehiculo ?>
	<tr id="r_vehiculo">
		<td class="<?php echo $recordatorio_taller_view->TableLeftColumnClass ?>"><span id="elh_recordatorio_taller_vehiculo"><?php echo $recordatorio_taller_view->vehiculo->caption() ?></span></td>
		<td data-name="vehiculo" <?php echo $recordatorio_taller_view->vehiculo->cellAttributes() ?>>
<span id="el_recordatorio_taller_vehiculo">
<span<?php echo $recordatorio_taller_view->vehiculo->viewAttributes() ?>><?php echo $recordatorio_taller_view->vehiculo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recordatorio_taller_view->servicio->Visible) { // servicio ?>
	<tr id="r_servicio">
		<td class="<?php echo $recordatorio_taller_view->TableLeftColumnClass ?>"><span id="elh_recordatorio_taller_servicio"><?php echo $recordatorio_taller_view->servicio->caption() ?></span></td>
		<td data-name="servicio" <?php echo $recordatorio_taller_view->servicio->cellAttributes() ?>>
<span id="el_recordatorio_taller_servicio">
<span<?php echo $recordatorio_taller_view->servicio->viewAttributes() ?>><?php echo $recordatorio_taller_view->servicio->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recordatorio_taller_view->frecuencia_km->Visible) { // frecuencia_km ?>
	<tr id="r_frecuencia_km">
		<td class="<?php echo $recordatorio_taller_view->TableLeftColumnClass ?>"><span id="elh_recordatorio_taller_frecuencia_km"><?php echo $recordatorio_taller_view->frecuencia_km->caption() ?></span></td>
		<td data-name="frecuencia_km" <?php echo $recordatorio_taller_view->frecuencia_km->cellAttributes() ?>>
<span id="el_recordatorio_taller_frecuencia_km">
<span<?php echo $recordatorio_taller_view->frecuencia_km->viewAttributes() ?>><?php echo $recordatorio_taller_view->frecuencia_km->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recordatorio_taller_view->frecuencia_tiempo->Visible) { // frecuencia_tiempo ?>
	<tr id="r_frecuencia_tiempo">
		<td class="<?php echo $recordatorio_taller_view->TableLeftColumnClass ?>"><span id="elh_recordatorio_taller_frecuencia_tiempo"><?php echo $recordatorio_taller_view->frecuencia_tiempo->caption() ?></span></td>
		<td data-name="frecuencia_tiempo" <?php echo $recordatorio_taller_view->frecuencia_tiempo->cellAttributes() ?>>
<span id="el_recordatorio_taller_frecuencia_tiempo">
<span<?php echo $recordatorio_taller_view->frecuencia_tiempo->viewAttributes() ?>><?php echo $recordatorio_taller_view->frecuencia_tiempo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recordatorio_taller_view->anticipo_km->Visible) { // anticipo_km ?>
	<tr id="r_anticipo_km">
		<td class="<?php echo $recordatorio_taller_view->TableLeftColumnClass ?>"><span id="elh_recordatorio_taller_anticipo_km"><?php echo $recordatorio_taller_view->anticipo_km->caption() ?></span></td>
		<td data-name="anticipo_km" <?php echo $recordatorio_taller_view->anticipo_km->cellAttributes() ?>>
<span id="el_recordatorio_taller_anticipo_km">
<span<?php echo $recordatorio_taller_view->anticipo_km->viewAttributes() ?>><?php echo $recordatorio_taller_view->anticipo_km->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($recordatorio_taller_view->anticipo_tiempo->Visible) { // anticipo_tiempo ?>
	<tr id="r_anticipo_tiempo">
		<td class="<?php echo $recordatorio_taller_view->TableLeftColumnClass ?>"><span id="elh_recordatorio_taller_anticipo_tiempo"><?php echo $recordatorio_taller_view->anticipo_tiempo->caption() ?></span></td>
		<td data-name="anticipo_tiempo" <?php echo $recordatorio_taller_view->anticipo_tiempo->cellAttributes() ?>>
<span id="el_recordatorio_taller_anticipo_tiempo">
<span<?php echo $recordatorio_taller_view->anticipo_tiempo->viewAttributes() ?>><?php echo $recordatorio_taller_view->anticipo_tiempo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$recordatorio_taller_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$recordatorio_taller_view->isExport()) { ?>
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
$recordatorio_taller_view->terminate();
?>