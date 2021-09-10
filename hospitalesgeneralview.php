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
$hospitalesgeneral_view = new hospitalesgeneral_view();

// Run the page
$hospitalesgeneral_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospitalesgeneral_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$hospitalesgeneral_view->isExport()) { ?>
<script>
var fhospitalesgeneralview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fhospitalesgeneralview = currentForm = new ew.Form("fhospitalesgeneralview", "view");
	loadjs.done("fhospitalesgeneralview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$hospitalesgeneral_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hospitalesgeneral_view->ExportOptions->render("body") ?>
<?php $hospitalesgeneral_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hospitalesgeneral_view->showPageHeader(); ?>
<?php
$hospitalesgeneral_view->showMessage();
?>
<form name="fhospitalesgeneralview" id="fhospitalesgeneralview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospitalesgeneral">
<input type="hidden" name="modal" value="<?php echo (int)$hospitalesgeneral_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hospitalesgeneral_view->id_hospital->Visible) { // id_hospital ?>
	<tr id="r_id_hospital">
		<td class="<?php echo $hospitalesgeneral_view->TableLeftColumnClass ?>"><span id="elh_hospitalesgeneral_id_hospital"><?php echo $hospitalesgeneral_view->id_hospital->caption() ?></span></td>
		<td data-name="id_hospital" <?php echo $hospitalesgeneral_view->id_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_id_hospital">
<span<?php echo $hospitalesgeneral_view->id_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral_view->id_hospital->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospitalesgeneral_view->nombre_hospital->Visible) { // nombre_hospital ?>
	<tr id="r_nombre_hospital">
		<td class="<?php echo $hospitalesgeneral_view->TableLeftColumnClass ?>"><span id="elh_hospitalesgeneral_nombre_hospital"><?php echo $hospitalesgeneral_view->nombre_hospital->caption() ?></span></td>
		<td data-name="nombre_hospital" <?php echo $hospitalesgeneral_view->nombre_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_nombre_hospital">
<span<?php echo $hospitalesgeneral_view->nombre_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral_view->nombre_hospital->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospitalesgeneral_view->depto_hospital->Visible) { // depto_hospital ?>
	<tr id="r_depto_hospital">
		<td class="<?php echo $hospitalesgeneral_view->TableLeftColumnClass ?>"><span id="elh_hospitalesgeneral_depto_hospital"><?php echo $hospitalesgeneral_view->depto_hospital->caption() ?></span></td>
		<td data-name="depto_hospital" <?php echo $hospitalesgeneral_view->depto_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_depto_hospital">
<span<?php echo $hospitalesgeneral_view->depto_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral_view->depto_hospital->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospitalesgeneral_view->provincia_hospital->Visible) { // provincia_hospital ?>
	<tr id="r_provincia_hospital">
		<td class="<?php echo $hospitalesgeneral_view->TableLeftColumnClass ?>"><span id="elh_hospitalesgeneral_provincia_hospital"><?php echo $hospitalesgeneral_view->provincia_hospital->caption() ?></span></td>
		<td data-name="provincia_hospital" <?php echo $hospitalesgeneral_view->provincia_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_provincia_hospital">
<span<?php echo $hospitalesgeneral_view->provincia_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral_view->provincia_hospital->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospitalesgeneral_view->municipio_hospital->Visible) { // municipio_hospital ?>
	<tr id="r_municipio_hospital">
		<td class="<?php echo $hospitalesgeneral_view->TableLeftColumnClass ?>"><span id="elh_hospitalesgeneral_municipio_hospital"><?php echo $hospitalesgeneral_view->municipio_hospital->caption() ?></span></td>
		<td data-name="municipio_hospital" <?php echo $hospitalesgeneral_view->municipio_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_municipio_hospital">
<span<?php echo $hospitalesgeneral_view->municipio_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral_view->municipio_hospital->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospitalesgeneral_view->nivel_hospital->Visible) { // nivel_hospital ?>
	<tr id="r_nivel_hospital">
		<td class="<?php echo $hospitalesgeneral_view->TableLeftColumnClass ?>"><span id="elh_hospitalesgeneral_nivel_hospital"><?php echo $hospitalesgeneral_view->nivel_hospital->caption() ?></span></td>
		<td data-name="nivel_hospital" <?php echo $hospitalesgeneral_view->nivel_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_nivel_hospital">
<span<?php echo $hospitalesgeneral_view->nivel_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral_view->nivel_hospital->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospitalesgeneral_view->redservicions_hospital->Visible) { // redservicions_hospital ?>
	<tr id="r_redservicions_hospital">
		<td class="<?php echo $hospitalesgeneral_view->TableLeftColumnClass ?>"><span id="elh_hospitalesgeneral_redservicions_hospital"><?php echo $hospitalesgeneral_view->redservicions_hospital->caption() ?></span></td>
		<td data-name="redservicions_hospital" <?php echo $hospitalesgeneral_view->redservicions_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_redservicions_hospital">
<span<?php echo $hospitalesgeneral_view->redservicions_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral_view->redservicions_hospital->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospitalesgeneral_view->sector_hospital->Visible) { // sector_hospital ?>
	<tr id="r_sector_hospital">
		<td class="<?php echo $hospitalesgeneral_view->TableLeftColumnClass ?>"><span id="elh_hospitalesgeneral_sector_hospital"><?php echo $hospitalesgeneral_view->sector_hospital->caption() ?></span></td>
		<td data-name="sector_hospital" <?php echo $hospitalesgeneral_view->sector_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_sector_hospital">
<span<?php echo $hospitalesgeneral_view->sector_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral_view->sector_hospital->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospitalesgeneral_view->tipo_hospital->Visible) { // tipo_hospital ?>
	<tr id="r_tipo_hospital">
		<td class="<?php echo $hospitalesgeneral_view->TableLeftColumnClass ?>"><span id="elh_hospitalesgeneral_tipo_hospital"><?php echo $hospitalesgeneral_view->tipo_hospital->caption() ?></span></td>
		<td data-name="tipo_hospital" <?php echo $hospitalesgeneral_view->tipo_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_tipo_hospital">
<span<?php echo $hospitalesgeneral_view->tipo_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral_view->tipo_hospital->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospitalesgeneral_view->camashab_cali->Visible) { // camashab_cali ?>
	<tr id="r_camashab_cali">
		<td class="<?php echo $hospitalesgeneral_view->TableLeftColumnClass ?>"><span id="elh_hospitalesgeneral_camashab_cali"><?php echo $hospitalesgeneral_view->camashab_cali->caption() ?></span></td>
		<td data-name="camashab_cali" <?php echo $hospitalesgeneral_view->camashab_cali->cellAttributes() ?>>
<span id="el_hospitalesgeneral_camashab_cali">
<span<?php echo $hospitalesgeneral_view->camashab_cali->viewAttributes() ?>><?php echo $hospitalesgeneral_view->camashab_cali->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospitalesgeneral_view->especialidad->Visible) { // especialidad ?>
	<tr id="r_especialidad">
		<td class="<?php echo $hospitalesgeneral_view->TableLeftColumnClass ?>"><span id="elh_hospitalesgeneral_especialidad"><?php echo $hospitalesgeneral_view->especialidad->caption() ?></span></td>
		<td data-name="especialidad" <?php echo $hospitalesgeneral_view->especialidad->cellAttributes() ?>>
<span id="el_hospitalesgeneral_especialidad">
<span<?php echo $hospitalesgeneral_view->especialidad->viewAttributes() ?>><?php echo $hospitalesgeneral_view->especialidad->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospitalesgeneral_view->latitud_hospital->Visible) { // latitud_hospital ?>
	<tr id="r_latitud_hospital">
		<td class="<?php echo $hospitalesgeneral_view->TableLeftColumnClass ?>"><span id="elh_hospitalesgeneral_latitud_hospital"><?php echo $hospitalesgeneral_view->latitud_hospital->caption() ?></span></td>
		<td data-name="latitud_hospital" <?php echo $hospitalesgeneral_view->latitud_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_latitud_hospital">
<span<?php echo $hospitalesgeneral_view->latitud_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral_view->latitud_hospital->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospitalesgeneral_view->longitud_hospital->Visible) { // longitud_hospital ?>
	<tr id="r_longitud_hospital">
		<td class="<?php echo $hospitalesgeneral_view->TableLeftColumnClass ?>"><span id="elh_hospitalesgeneral_longitud_hospital"><?php echo $hospitalesgeneral_view->longitud_hospital->caption() ?></span></td>
		<td data-name="longitud_hospital" <?php echo $hospitalesgeneral_view->longitud_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_longitud_hospital">
<span<?php echo $hospitalesgeneral_view->longitud_hospital->viewAttributes() ?>><?php echo $hospitalesgeneral_view->longitud_hospital->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospitalesgeneral_view->icon_hospital->Visible) { // icon_hospital ?>
	<tr id="r_icon_hospital">
		<td class="<?php echo $hospitalesgeneral_view->TableLeftColumnClass ?>"><span id="elh_hospitalesgeneral_icon_hospital"><?php echo $hospitalesgeneral_view->icon_hospital->caption() ?></span></td>
		<td data-name="icon_hospital" <?php echo $hospitalesgeneral_view->icon_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_icon_hospital">
<span<?php echo $hospitalesgeneral_view->icon_hospital->viewAttributes() ?>><?php echo GetFileViewTag($hospitalesgeneral_view->icon_hospital, $hospitalesgeneral_view->icon_hospital->getViewValue(), FALSE) ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospitalesgeneral_view->codpolitico->Visible) { // codpolitico ?>
	<tr id="r_codpolitico">
		<td class="<?php echo $hospitalesgeneral_view->TableLeftColumnClass ?>"><span id="elh_hospitalesgeneral_codpolitico"><?php echo $hospitalesgeneral_view->codpolitico->caption() ?></span></td>
		<td data-name="codpolitico" <?php echo $hospitalesgeneral_view->codpolitico->cellAttributes() ?>>
<span id="el_hospitalesgeneral_codpolitico">
<span<?php echo $hospitalesgeneral_view->codpolitico->viewAttributes() ?>><?php echo $hospitalesgeneral_view->codpolitico->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospitalesgeneral_view->direccion->Visible) { // direccion ?>
	<tr id="r_direccion">
		<td class="<?php echo $hospitalesgeneral_view->TableLeftColumnClass ?>"><span id="elh_hospitalesgeneral_direccion"><?php echo $hospitalesgeneral_view->direccion->caption() ?></span></td>
		<td data-name="direccion" <?php echo $hospitalesgeneral_view->direccion->cellAttributes() ?>>
<span id="el_hospitalesgeneral_direccion">
<span<?php echo $hospitalesgeneral_view->direccion->viewAttributes() ?>><?php echo $hospitalesgeneral_view->direccion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospitalesgeneral_view->telefono->Visible) { // telefono ?>
	<tr id="r_telefono">
		<td class="<?php echo $hospitalesgeneral_view->TableLeftColumnClass ?>"><span id="elh_hospitalesgeneral_telefono"><?php echo $hospitalesgeneral_view->telefono->caption() ?></span></td>
		<td data-name="telefono" <?php echo $hospitalesgeneral_view->telefono->cellAttributes() ?>>
<span id="el_hospitalesgeneral_telefono">
<span<?php echo $hospitalesgeneral_view->telefono->viewAttributes() ?>><?php echo $hospitalesgeneral_view->telefono->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospitalesgeneral_view->nombre_responsable->Visible) { // nombre_responsable ?>
	<tr id="r_nombre_responsable">
		<td class="<?php echo $hospitalesgeneral_view->TableLeftColumnClass ?>"><span id="elh_hospitalesgeneral_nombre_responsable"><?php echo $hospitalesgeneral_view->nombre_responsable->caption() ?></span></td>
		<td data-name="nombre_responsable" <?php echo $hospitalesgeneral_view->nombre_responsable->cellAttributes() ?>>
<span id="el_hospitalesgeneral_nombre_responsable">
<span<?php echo $hospitalesgeneral_view->nombre_responsable->viewAttributes() ?>><?php echo $hospitalesgeneral_view->nombre_responsable->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospitalesgeneral_view->estado->Visible) { // estado ?>
	<tr id="r_estado">
		<td class="<?php echo $hospitalesgeneral_view->TableLeftColumnClass ?>"><span id="elh_hospitalesgeneral_estado"><?php echo $hospitalesgeneral_view->estado->caption() ?></span></td>
		<td data-name="estado" <?php echo $hospitalesgeneral_view->estado->cellAttributes() ?>>
<span id="el_hospitalesgeneral_estado">
<span<?php echo $hospitalesgeneral_view->estado->viewAttributes() ?>><div class="custom-control custom-checkbox d-inline-block"><input type="checkbox" id="x_estado" class="custom-control-input" value="<?php echo $hospitalesgeneral_view->estado->getViewValue() ?>" disabled<?php if (ConvertToBool($hospitalesgeneral_view->estado->CurrentValue)) { ?> checked<?php } ?>><label class="custom-control-label" for="x_estado"></label></div></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hospitalesgeneral_view->emt->Visible) { // emt ?>
	<tr id="r_emt">
		<td class="<?php echo $hospitalesgeneral_view->TableLeftColumnClass ?>"><span id="elh_hospitalesgeneral_emt"><?php echo $hospitalesgeneral_view->emt->caption() ?></span></td>
		<td data-name="emt" <?php echo $hospitalesgeneral_view->emt->cellAttributes() ?>>
<span id="el_hospitalesgeneral_emt">
<span<?php echo $hospitalesgeneral_view->emt->viewAttributes() ?>><div class="custom-control custom-checkbox d-inline-block"><input type="checkbox" id="x_emt" class="custom-control-input" value="<?php echo $hospitalesgeneral_view->emt->getViewValue() ?>" disabled<?php if (ConvertToBool($hospitalesgeneral_view->emt->CurrentValue)) { ?> checked<?php } ?>><label class="custom-control-label" for="x_emt"></label></div></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("camas_hospital", explode(",", $hospitalesgeneral->getCurrentDetailTable())) && $camas_hospital->DetailView) {
?>
<?php if ($hospitalesgeneral->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("camas_hospital", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "camas_hospitalgrid.php" ?>
<?php } ?>
</form>
<?php
$hospitalesgeneral_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$hospitalesgeneral_view->isExport()) { ?>
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
$hospitalesgeneral_view->terminate();
?>