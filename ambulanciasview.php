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
$ambulancias_view = new ambulancias_view();

// Run the page
$ambulancias_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ambulancias_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ambulancias_view->isExport()) { ?>
<script>
var fambulanciasview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fambulanciasview = currentForm = new ew.Form("fambulanciasview", "view");
	loadjs.done("fambulanciasview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ambulancias_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ambulancias_view->ExportOptions->render("body") ?>
<?php $ambulancias_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ambulancias_view->showPageHeader(); ?>
<?php
$ambulancias_view->showMessage();
?>
<form name="fambulanciasview" id="fambulanciasview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ambulancias">
<input type="hidden" name="modal" value="<?php echo (int)$ambulancias_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($ambulancias_view->id_ambulancias->Visible) { // id_ambulancias ?>
	<tr id="r_id_ambulancias">
		<td class="<?php echo $ambulancias_view->TableLeftColumnClass ?>"><span id="elh_ambulancias_id_ambulancias"><?php echo $ambulancias_view->id_ambulancias->caption() ?></span></td>
		<td data-name="id_ambulancias" <?php echo $ambulancias_view->id_ambulancias->cellAttributes() ?>>
<span id="el_ambulancias_id_ambulancias">
<span<?php echo $ambulancias_view->id_ambulancias->viewAttributes() ?>><?php echo $ambulancias_view->id_ambulancias->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ambulancias_view->cod_ambulancias->Visible) { // cod_ambulancias ?>
	<tr id="r_cod_ambulancias">
		<td class="<?php echo $ambulancias_view->TableLeftColumnClass ?>"><span id="elh_ambulancias_cod_ambulancias"><?php echo $ambulancias_view->cod_ambulancias->caption() ?></span></td>
		<td data-name="cod_ambulancias" <?php echo $ambulancias_view->cod_ambulancias->cellAttributes() ?>>
<span id="el_ambulancias_cod_ambulancias">
<span<?php echo $ambulancias_view->cod_ambulancias->viewAttributes() ?>><?php echo $ambulancias_view->cod_ambulancias->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ambulancias_view->placas->Visible) { // placas ?>
	<tr id="r_placas">
		<td class="<?php echo $ambulancias_view->TableLeftColumnClass ?>"><span id="elh_ambulancias_placas"><?php echo $ambulancias_view->placas->caption() ?></span></td>
		<td data-name="placas" <?php echo $ambulancias_view->placas->cellAttributes() ?>>
<span id="el_ambulancias_placas">
<span<?php echo $ambulancias_view->placas->viewAttributes() ?>><?php echo $ambulancias_view->placas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ambulancias_view->chasis->Visible) { // chasis ?>
	<tr id="r_chasis">
		<td class="<?php echo $ambulancias_view->TableLeftColumnClass ?>"><span id="elh_ambulancias_chasis"><?php echo $ambulancias_view->chasis->caption() ?></span></td>
		<td data-name="chasis" <?php echo $ambulancias_view->chasis->cellAttributes() ?>>
<span id="el_ambulancias_chasis">
<span<?php echo $ambulancias_view->chasis->viewAttributes() ?>><?php echo $ambulancias_view->chasis->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ambulancias_view->marca->Visible) { // marca ?>
	<tr id="r_marca">
		<td class="<?php echo $ambulancias_view->TableLeftColumnClass ?>"><span id="elh_ambulancias_marca"><?php echo $ambulancias_view->marca->caption() ?></span></td>
		<td data-name="marca" <?php echo $ambulancias_view->marca->cellAttributes() ?>>
<span id="el_ambulancias_marca">
<span<?php echo $ambulancias_view->marca->viewAttributes() ?>><?php echo $ambulancias_view->marca->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ambulancias_view->modelo->Visible) { // modelo ?>
	<tr id="r_modelo">
		<td class="<?php echo $ambulancias_view->TableLeftColumnClass ?>"><span id="elh_ambulancias_modelo"><?php echo $ambulancias_view->modelo->caption() ?></span></td>
		<td data-name="modelo" <?php echo $ambulancias_view->modelo->cellAttributes() ?>>
<span id="el_ambulancias_modelo">
<span<?php echo $ambulancias_view->modelo->viewAttributes() ?>><?php echo $ambulancias_view->modelo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ambulancias_view->tipo_translado->Visible) { // tipo_translado ?>
	<tr id="r_tipo_translado">
		<td class="<?php echo $ambulancias_view->TableLeftColumnClass ?>"><span id="elh_ambulancias_tipo_translado"><?php echo $ambulancias_view->tipo_translado->caption() ?></span></td>
		<td data-name="tipo_translado" <?php echo $ambulancias_view->tipo_translado->cellAttributes() ?>>
<span id="el_ambulancias_tipo_translado">
<span<?php echo $ambulancias_view->tipo_translado->viewAttributes() ?>><?php echo $ambulancias_view->tipo_translado->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ambulancias_view->tipo_conbustible->Visible) { // tipo_conbustible ?>
	<tr id="r_tipo_conbustible">
		<td class="<?php echo $ambulancias_view->TableLeftColumnClass ?>"><span id="elh_ambulancias_tipo_conbustible"><?php echo $ambulancias_view->tipo_conbustible->caption() ?></span></td>
		<td data-name="tipo_conbustible" <?php echo $ambulancias_view->tipo_conbustible->cellAttributes() ?>>
<span id="el_ambulancias_tipo_conbustible">
<span<?php echo $ambulancias_view->tipo_conbustible->viewAttributes() ?>><?php echo $ambulancias_view->tipo_conbustible->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ambulancias_view->modalidad->Visible) { // modalidad ?>
	<tr id="r_modalidad">
		<td class="<?php echo $ambulancias_view->TableLeftColumnClass ?>"><span id="elh_ambulancias_modalidad"><?php echo $ambulancias_view->modalidad->caption() ?></span></td>
		<td data-name="modalidad" <?php echo $ambulancias_view->modalidad->cellAttributes() ?>>
<span id="el_ambulancias_modalidad">
<span<?php echo $ambulancias_view->modalidad->viewAttributes() ?>><?php echo $ambulancias_view->modalidad->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ambulancias_view->estado->Visible) { // estado ?>
	<tr id="r_estado">
		<td class="<?php echo $ambulancias_view->TableLeftColumnClass ?>"><span id="elh_ambulancias_estado"><?php echo $ambulancias_view->estado->caption() ?></span></td>
		<td data-name="estado" <?php echo $ambulancias_view->estado->cellAttributes() ?>>
<span id="el_ambulancias_estado">
<span<?php echo $ambulancias_view->estado->viewAttributes() ?>><?php echo $ambulancias_view->estado->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ambulancias_view->ubicacion->Visible) { // ubicacion ?>
	<tr id="r_ubicacion">
		<td class="<?php echo $ambulancias_view->TableLeftColumnClass ?>"><span id="elh_ambulancias_ubicacion"><?php echo $ambulancias_view->ubicacion->caption() ?></span></td>
		<td data-name="ubicacion" <?php echo $ambulancias_view->ubicacion->cellAttributes() ?>>
<span id="el_ambulancias_ubicacion">
<span<?php echo $ambulancias_view->ubicacion->viewAttributes() ?>><?php echo $ambulancias_view->ubicacion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ambulancias_view->disponible->Visible) { // disponible ?>
	<tr id="r_disponible">
		<td class="<?php echo $ambulancias_view->TableLeftColumnClass ?>"><span id="elh_ambulancias_disponible"><?php echo $ambulancias_view->disponible->caption() ?></span></td>
		<td data-name="disponible" <?php echo $ambulancias_view->disponible->cellAttributes() ?>>
<span id="el_ambulancias_disponible">
<span<?php echo $ambulancias_view->disponible->viewAttributes() ?>><?php echo $ambulancias_view->disponible->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ambulancias_view->fecha_iniseguro->Visible) { // fecha_iniseguro ?>
	<tr id="r_fecha_iniseguro">
		<td class="<?php echo $ambulancias_view->TableLeftColumnClass ?>"><span id="elh_ambulancias_fecha_iniseguro"><?php echo $ambulancias_view->fecha_iniseguro->caption() ?></span></td>
		<td data-name="fecha_iniseguro" <?php echo $ambulancias_view->fecha_iniseguro->cellAttributes() ?>>
<span id="el_ambulancias_fecha_iniseguro">
<span<?php echo $ambulancias_view->fecha_iniseguro->viewAttributes() ?>><?php echo $ambulancias_view->fecha_iniseguro->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ambulancias_view->fecha_finseguro->Visible) { // fecha_finseguro ?>
	<tr id="r_fecha_finseguro">
		<td class="<?php echo $ambulancias_view->TableLeftColumnClass ?>"><span id="elh_ambulancias_fecha_finseguro"><?php echo $ambulancias_view->fecha_finseguro->caption() ?></span></td>
		<td data-name="fecha_finseguro" <?php echo $ambulancias_view->fecha_finseguro->cellAttributes() ?>>
<span id="el_ambulancias_fecha_finseguro">
<span<?php echo $ambulancias_view->fecha_finseguro->viewAttributes() ?>><?php echo $ambulancias_view->fecha_finseguro->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ambulancias_view->entidad->Visible) { // entidad ?>
	<tr id="r_entidad">
		<td class="<?php echo $ambulancias_view->TableLeftColumnClass ?>"><span id="elh_ambulancias_entidad"><?php echo $ambulancias_view->entidad->caption() ?></span></td>
		<td data-name="entidad" <?php echo $ambulancias_view->entidad->cellAttributes() ?>>
<span id="el_ambulancias_entidad">
<span<?php echo $ambulancias_view->entidad->viewAttributes() ?>><?php echo $ambulancias_view->entidad->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ambulancias_view->observacion->Visible) { // observacion ?>
	<tr id="r_observacion">
		<td class="<?php echo $ambulancias_view->TableLeftColumnClass ?>"><span id="elh_ambulancias_observacion"><?php echo $ambulancias_view->observacion->caption() ?></span></td>
		<td data-name="observacion" <?php echo $ambulancias_view->observacion->cellAttributes() ?>>
<span id="el_ambulancias_observacion">
<span<?php echo $ambulancias_view->observacion->viewAttributes() ?>><?php echo $ambulancias_view->observacion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ambulancias_view->asiganda->Visible) { // asiganda ?>
	<tr id="r_asiganda">
		<td class="<?php echo $ambulancias_view->TableLeftColumnClass ?>"><span id="elh_ambulancias_asiganda"><?php echo $ambulancias_view->asiganda->caption() ?></span></td>
		<td data-name="asiganda" <?php echo $ambulancias_view->asiganda->cellAttributes() ?>>
<span id="el_ambulancias_asiganda">
<span<?php echo $ambulancias_view->asiganda->viewAttributes() ?>><?php echo $ambulancias_view->asiganda->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ambulancias_view->config_manteni->Visible) { // config_manteni ?>
	<tr id="r_config_manteni">
		<td class="<?php echo $ambulancias_view->TableLeftColumnClass ?>"><span id="elh_ambulancias_config_manteni"><?php echo $ambulancias_view->config_manteni->caption() ?></span></td>
		<td data-name="config_manteni" <?php echo $ambulancias_view->config_manteni->cellAttributes() ?>>
<span id="el_ambulancias_config_manteni">
<span<?php echo $ambulancias_view->config_manteni->viewAttributes() ?>><?php echo $ambulancias_view->config_manteni->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ambulancias_view->fecha_creacion->Visible) { // fecha_creacion ?>
	<tr id="r_fecha_creacion">
		<td class="<?php echo $ambulancias_view->TableLeftColumnClass ?>"><span id="elh_ambulancias_fecha_creacion"><?php echo $ambulancias_view->fecha_creacion->caption() ?></span></td>
		<td data-name="fecha_creacion" <?php echo $ambulancias_view->fecha_creacion->cellAttributes() ?>>
<span id="el_ambulancias_fecha_creacion">
<span<?php echo $ambulancias_view->fecha_creacion->viewAttributes() ?>><?php echo $ambulancias_view->fecha_creacion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ambulancias_view->longitudambulancia->Visible) { // longitudambulancia ?>
	<tr id="r_longitudambulancia">
		<td class="<?php echo $ambulancias_view->TableLeftColumnClass ?>"><span id="elh_ambulancias_longitudambulancia"><?php echo $ambulancias_view->longitudambulancia->caption() ?></span></td>
		<td data-name="longitudambulancia" <?php echo $ambulancias_view->longitudambulancia->cellAttributes() ?>>
<span id="el_ambulancias_longitudambulancia">
<span<?php echo $ambulancias_view->longitudambulancia->viewAttributes() ?>><?php echo $ambulancias_view->longitudambulancia->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ambulancias_view->latituambulancia->Visible) { // latituambulancia ?>
	<tr id="r_latituambulancia">
		<td class="<?php echo $ambulancias_view->TableLeftColumnClass ?>"><span id="elh_ambulancias_latituambulancia"><?php echo $ambulancias_view->latituambulancia->caption() ?></span></td>
		<td data-name="latituambulancia" <?php echo $ambulancias_view->latituambulancia->cellAttributes() ?>>
<span id="el_ambulancias_latituambulancia">
<span<?php echo $ambulancias_view->latituambulancia->viewAttributes() ?>><?php echo $ambulancias_view->latituambulancia->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ambulancias_view->especial->Visible) { // especial ?>
	<tr id="r_especial">
		<td class="<?php echo $ambulancias_view->TableLeftColumnClass ?>"><span id="elh_ambulancias_especial"><?php echo $ambulancias_view->especial->caption() ?></span></td>
		<td data-name="especial" <?php echo $ambulancias_view->especial->cellAttributes() ?>>
<span id="el_ambulancias_especial">
<span<?php echo $ambulancias_view->especial->viewAttributes() ?>><?php echo $ambulancias_view->especial->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("mante_amb", explode(",", $ambulancias->getCurrentDetailTable())) && $mante_amb->DetailView) {
?>
<?php if ($ambulancias->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("mante_amb", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "mante_ambgrid.php" ?>
<?php } ?>
</form>
<?php
$ambulancias_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ambulancias_view->isExport()) { ?>
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
$ambulancias_view->terminate();
?>