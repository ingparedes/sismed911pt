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
$censo_total_view = new censo_total_view();

// Run the page
$censo_total_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$censo_total_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$censo_total_view->isExport()) { ?>
<script>
var fcenso_totalview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fcenso_totalview = currentForm = new ew.Form("fcenso_totalview", "view");
	loadjs.done("fcenso_totalview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$censo_total_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $censo_total_view->ExportOptions->render("body") ?>
<?php $censo_total_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $censo_total_view->showPageHeader(); ?>
<?php
$censo_total_view->showMessage();
?>
<form name="fcenso_totalview" id="fcenso_totalview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="censo_total">
<input type="hidden" name="modal" value="<?php echo (int)$censo_total_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($censo_total_view->id_hospital->Visible) { // id_hospital ?>
	<tr id="r_id_hospital">
		<td class="<?php echo $censo_total_view->TableLeftColumnClass ?>"><span id="elh_censo_total_id_hospital"><?php echo $censo_total_view->id_hospital->caption() ?></span></td>
		<td data-name="id_hospital" <?php echo $censo_total_view->id_hospital->cellAttributes() ?>>
<span id="el_censo_total_id_hospital">
<span<?php echo $censo_total_view->id_hospital->viewAttributes() ?>><?php echo $censo_total_view->id_hospital->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($censo_total_view->cod_servicio->Visible) { // cod_servicio ?>
	<tr id="r_cod_servicio">
		<td class="<?php echo $censo_total_view->TableLeftColumnClass ?>"><span id="elh_censo_total_cod_servicio"><?php echo $censo_total_view->cod_servicio->caption() ?></span></td>
		<td data-name="cod_servicio" <?php echo $censo_total_view->cod_servicio->cellAttributes() ?>>
<span id="el_censo_total_cod_servicio">
<span<?php echo $censo_total_view->cod_servicio->viewAttributes() ?>><?php echo $censo_total_view->cod_servicio->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($censo_total_view->cod_division->Visible) { // cod_division ?>
	<tr id="r_cod_division">
		<td class="<?php echo $censo_total_view->TableLeftColumnClass ?>"><span id="elh_censo_total_cod_division"><?php echo $censo_total_view->cod_division->caption() ?></span></td>
		<td data-name="cod_division" <?php echo $censo_total_view->cod_division->cellAttributes() ?>>
<span id="el_censo_total_cod_division">
<span<?php echo $censo_total_view->cod_division->viewAttributes() ?>><?php echo $censo_total_view->cod_division->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($censo_total_view->camas_ocupadas->Visible) { // camas_ocupadas ?>
	<tr id="r_camas_ocupadas">
		<td class="<?php echo $censo_total_view->TableLeftColumnClass ?>"><span id="elh_censo_total_camas_ocupadas"><?php echo $censo_total_view->camas_ocupadas->caption() ?></span></td>
		<td data-name="camas_ocupadas" <?php echo $censo_total_view->camas_ocupadas->cellAttributes() ?>>
<span id="el_censo_total_camas_ocupadas">
<span<?php echo $censo_total_view->camas_ocupadas->viewAttributes() ?>><?php echo $censo_total_view->camas_ocupadas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($censo_total_view->camas_libres->Visible) { // camas_libres ?>
	<tr id="r_camas_libres">
		<td class="<?php echo $censo_total_view->TableLeftColumnClass ?>"><span id="elh_censo_total_camas_libres"><?php echo $censo_total_view->camas_libres->caption() ?></span></td>
		<td data-name="camas_libres" <?php echo $censo_total_view->camas_libres->cellAttributes() ?>>
<span id="el_censo_total_camas_libres">
<span<?php echo $censo_total_view->camas_libres->viewAttributes() ?>><?php echo $censo_total_view->camas_libres->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($censo_total_view->camas_fueraservicio->Visible) { // camas_fueraservicio ?>
	<tr id="r_camas_fueraservicio">
		<td class="<?php echo $censo_total_view->TableLeftColumnClass ?>"><span id="elh_censo_total_camas_fueraservicio"><?php echo $censo_total_view->camas_fueraservicio->caption() ?></span></td>
		<td data-name="camas_fueraservicio" <?php echo $censo_total_view->camas_fueraservicio->cellAttributes() ?>>
<span id="el_censo_total_camas_fueraservicio">
<span<?php echo $censo_total_view->camas_fueraservicio->viewAttributes() ?>><?php echo $censo_total_view->camas_fueraservicio->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($censo_total_view->nombre_reporta->Visible) { // nombre_reporta ?>
	<tr id="r_nombre_reporta">
		<td class="<?php echo $censo_total_view->TableLeftColumnClass ?>"><span id="elh_censo_total_nombre_reporta"><?php echo $censo_total_view->nombre_reporta->caption() ?></span></td>
		<td data-name="nombre_reporta" <?php echo $censo_total_view->nombre_reporta->cellAttributes() ?>>
<span id="el_censo_total_nombre_reporta">
<span<?php echo $censo_total_view->nombre_reporta->viewAttributes() ?>><?php echo $censo_total_view->nombre_reporta->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($censo_total_view->telefono_reporta->Visible) { // telefono_reporta ?>
	<tr id="r_telefono_reporta">
		<td class="<?php echo $censo_total_view->TableLeftColumnClass ?>"><span id="elh_censo_total_telefono_reporta"><?php echo $censo_total_view->telefono_reporta->caption() ?></span></td>
		<td data-name="telefono_reporta" <?php echo $censo_total_view->telefono_reporta->cellAttributes() ?>>
<span id="el_censo_total_telefono_reporta">
<span<?php echo $censo_total_view->telefono_reporta->viewAttributes() ?>><?php echo $censo_total_view->telefono_reporta->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($censo_total_view->fecha_reporte->Visible) { // fecha_reporte ?>
	<tr id="r_fecha_reporte">
		<td class="<?php echo $censo_total_view->TableLeftColumnClass ?>"><span id="elh_censo_total_fecha_reporte"><?php echo $censo_total_view->fecha_reporte->caption() ?></span></td>
		<td data-name="fecha_reporte" <?php echo $censo_total_view->fecha_reporte->cellAttributes() ?>>
<span id="el_censo_total_fecha_reporte">
<span<?php echo $censo_total_view->fecha_reporte->viewAttributes() ?>><?php echo $censo_total_view->fecha_reporte->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($censo_total_view->id_censo->Visible) { // id_censo ?>
	<tr id="r_id_censo">
		<td class="<?php echo $censo_total_view->TableLeftColumnClass ?>"><span id="elh_censo_total_id_censo"><?php echo $censo_total_view->id_censo->caption() ?></span></td>
		<td data-name="id_censo" <?php echo $censo_total_view->id_censo->cellAttributes() ?>>
<span id="el_censo_total_id_censo">
<span<?php echo $censo_total_view->id_censo->viewAttributes() ?>><?php echo $censo_total_view->id_censo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$censo_total_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$censo_total_view->isExport()) { ?>
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
$censo_total_view->terminate();
?>