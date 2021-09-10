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
$asigna_ambulancia_view = new asigna_ambulancia_view();

// Run the page
$asigna_ambulancia_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$asigna_ambulancia_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$asigna_ambulancia_view->isExport()) { ?>
<script>
var fasigna_ambulanciaview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fasigna_ambulanciaview = currentForm = new ew.Form("fasigna_ambulanciaview", "view");
	loadjs.done("fasigna_ambulanciaview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$asigna_ambulancia_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $asigna_ambulancia_view->ExportOptions->render("body") ?>
<?php $asigna_ambulancia_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $asigna_ambulancia_view->showPageHeader(); ?>
<?php
$asigna_ambulancia_view->showMessage();
?>
<form name="fasigna_ambulanciaview" id="fasigna_ambulanciaview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="asigna_ambulancia">
<input type="hidden" name="modal" value="<?php echo (int)$asigna_ambulancia_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($asigna_ambulancia_view->id_ambulancias->Visible) { // id_ambulancias ?>
	<tr id="r_id_ambulancias">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_id_ambulancias"><?php echo $asigna_ambulancia_view->id_ambulancias->caption() ?></span></td>
		<td data-name="id_ambulancias" <?php echo $asigna_ambulancia_view->id_ambulancias->cellAttributes() ?>>
<span id="el_asigna_ambulancia_id_ambulancias">
<span<?php echo $asigna_ambulancia_view->id_ambulancias->viewAttributes() ?>><?php echo $asigna_ambulancia_view->id_ambulancias->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->cod_ambulancias->Visible) { // cod_ambulancias ?>
	<tr id="r_cod_ambulancias">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_cod_ambulancias"><?php echo $asigna_ambulancia_view->cod_ambulancias->caption() ?></span></td>
		<td data-name="cod_ambulancias" <?php echo $asigna_ambulancia_view->cod_ambulancias->cellAttributes() ?>>
<span id="el_asigna_ambulancia_cod_ambulancias">
<span<?php echo $asigna_ambulancia_view->cod_ambulancias->viewAttributes() ?>><?php echo $asigna_ambulancia_view->cod_ambulancias->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->placas->Visible) { // placas ?>
	<tr id="r_placas">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_placas"><?php echo $asigna_ambulancia_view->placas->caption() ?></span></td>
		<td data-name="placas" <?php echo $asigna_ambulancia_view->placas->cellAttributes() ?>>
<span id="el_asigna_ambulancia_placas">
<span<?php echo $asigna_ambulancia_view->placas->viewAttributes() ?>><?php echo $asigna_ambulancia_view->placas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->chasis->Visible) { // chasis ?>
	<tr id="r_chasis">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_chasis"><?php echo $asigna_ambulancia_view->chasis->caption() ?></span></td>
		<td data-name="chasis" <?php echo $asigna_ambulancia_view->chasis->cellAttributes() ?>>
<span id="el_asigna_ambulancia_chasis">
<span<?php echo $asigna_ambulancia_view->chasis->viewAttributes() ?>><?php echo $asigna_ambulancia_view->chasis->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->marca->Visible) { // marca ?>
	<tr id="r_marca">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_marca"><?php echo $asigna_ambulancia_view->marca->caption() ?></span></td>
		<td data-name="marca" <?php echo $asigna_ambulancia_view->marca->cellAttributes() ?>>
<span id="el_asigna_ambulancia_marca">
<span<?php echo $asigna_ambulancia_view->marca->viewAttributes() ?>><?php echo $asigna_ambulancia_view->marca->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->modelo->Visible) { // modelo ?>
	<tr id="r_modelo">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_modelo"><?php echo $asigna_ambulancia_view->modelo->caption() ?></span></td>
		<td data-name="modelo" <?php echo $asigna_ambulancia_view->modelo->cellAttributes() ?>>
<span id="el_asigna_ambulancia_modelo">
<span<?php echo $asigna_ambulancia_view->modelo->viewAttributes() ?>><?php echo $asigna_ambulancia_view->modelo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->tipo_translado->Visible) { // tipo_translado ?>
	<tr id="r_tipo_translado">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_tipo_translado"><?php echo $asigna_ambulancia_view->tipo_translado->caption() ?></span></td>
		<td data-name="tipo_translado" <?php echo $asigna_ambulancia_view->tipo_translado->cellAttributes() ?>>
<span id="el_asigna_ambulancia_tipo_translado">
<span<?php echo $asigna_ambulancia_view->tipo_translado->viewAttributes() ?>><?php echo $asigna_ambulancia_view->tipo_translado->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->tipo_conbustible->Visible) { // tipo_conbustible ?>
	<tr id="r_tipo_conbustible">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_tipo_conbustible"><?php echo $asigna_ambulancia_view->tipo_conbustible->caption() ?></span></td>
		<td data-name="tipo_conbustible" <?php echo $asigna_ambulancia_view->tipo_conbustible->cellAttributes() ?>>
<span id="el_asigna_ambulancia_tipo_conbustible">
<span<?php echo $asigna_ambulancia_view->tipo_conbustible->viewAttributes() ?>><?php echo $asigna_ambulancia_view->tipo_conbustible->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->modalidad->Visible) { // modalidad ?>
	<tr id="r_modalidad">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_modalidad"><?php echo $asigna_ambulancia_view->modalidad->caption() ?></span></td>
		<td data-name="modalidad" <?php echo $asigna_ambulancia_view->modalidad->cellAttributes() ?>>
<span id="el_asigna_ambulancia_modalidad">
<span<?php echo $asigna_ambulancia_view->modalidad->viewAttributes() ?>><?php echo $asigna_ambulancia_view->modalidad->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->estado->Visible) { // estado ?>
	<tr id="r_estado">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_estado"><?php echo $asigna_ambulancia_view->estado->caption() ?></span></td>
		<td data-name="estado" <?php echo $asigna_ambulancia_view->estado->cellAttributes() ?>>
<span id="el_asigna_ambulancia_estado">
<span<?php echo $asigna_ambulancia_view->estado->viewAttributes() ?>><?php echo $asigna_ambulancia_view->estado->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->ubicacion->Visible) { // ubicacion ?>
	<tr id="r_ubicacion">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_ubicacion"><?php echo $asigna_ambulancia_view->ubicacion->caption() ?></span></td>
		<td data-name="ubicacion" <?php echo $asigna_ambulancia_view->ubicacion->cellAttributes() ?>>
<span id="el_asigna_ambulancia_ubicacion">
<span<?php echo $asigna_ambulancia_view->ubicacion->viewAttributes() ?>><?php echo $asigna_ambulancia_view->ubicacion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->disponible->Visible) { // disponible ?>
	<tr id="r_disponible">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_disponible"><?php echo $asigna_ambulancia_view->disponible->caption() ?></span></td>
		<td data-name="disponible" <?php echo $asigna_ambulancia_view->disponible->cellAttributes() ?>>
<span id="el_asigna_ambulancia_disponible">
<span<?php echo $asigna_ambulancia_view->disponible->viewAttributes() ?>><?php echo $asigna_ambulancia_view->disponible->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->fecha_iniseguro->Visible) { // fecha_iniseguro ?>
	<tr id="r_fecha_iniseguro">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_fecha_iniseguro"><?php echo $asigna_ambulancia_view->fecha_iniseguro->caption() ?></span></td>
		<td data-name="fecha_iniseguro" <?php echo $asigna_ambulancia_view->fecha_iniseguro->cellAttributes() ?>>
<span id="el_asigna_ambulancia_fecha_iniseguro">
<span<?php echo $asigna_ambulancia_view->fecha_iniseguro->viewAttributes() ?>><?php echo $asigna_ambulancia_view->fecha_iniseguro->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->fecha_finseguro->Visible) { // fecha_finseguro ?>
	<tr id="r_fecha_finseguro">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_fecha_finseguro"><?php echo $asigna_ambulancia_view->fecha_finseguro->caption() ?></span></td>
		<td data-name="fecha_finseguro" <?php echo $asigna_ambulancia_view->fecha_finseguro->cellAttributes() ?>>
<span id="el_asigna_ambulancia_fecha_finseguro">
<span<?php echo $asigna_ambulancia_view->fecha_finseguro->viewAttributes() ?>><?php echo $asigna_ambulancia_view->fecha_finseguro->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->entidad->Visible) { // entidad ?>
	<tr id="r_entidad">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_entidad"><?php echo $asigna_ambulancia_view->entidad->caption() ?></span></td>
		<td data-name="entidad" <?php echo $asigna_ambulancia_view->entidad->cellAttributes() ?>>
<span id="el_asigna_ambulancia_entidad">
<span<?php echo $asigna_ambulancia_view->entidad->viewAttributes() ?>><?php echo $asigna_ambulancia_view->entidad->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->observacion->Visible) { // observacion ?>
	<tr id="r_observacion">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_observacion"><?php echo $asigna_ambulancia_view->observacion->caption() ?></span></td>
		<td data-name="observacion" <?php echo $asigna_ambulancia_view->observacion->cellAttributes() ?>>
<span id="el_asigna_ambulancia_observacion">
<span<?php echo $asigna_ambulancia_view->observacion->viewAttributes() ?>><?php echo $asigna_ambulancia_view->observacion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->asiganda->Visible) { // asiganda ?>
	<tr id="r_asiganda">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_asiganda"><?php echo $asigna_ambulancia_view->asiganda->caption() ?></span></td>
		<td data-name="asiganda" <?php echo $asigna_ambulancia_view->asiganda->cellAttributes() ?>>
<span id="el_asigna_ambulancia_asiganda">
<span<?php echo $asigna_ambulancia_view->asiganda->viewAttributes() ?>><?php echo $asigna_ambulancia_view->asiganda->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->config_manteni->Visible) { // config_manteni ?>
	<tr id="r_config_manteni">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_config_manteni"><?php echo $asigna_ambulancia_view->config_manteni->caption() ?></span></td>
		<td data-name="config_manteni" <?php echo $asigna_ambulancia_view->config_manteni->cellAttributes() ?>>
<span id="el_asigna_ambulancia_config_manteni">
<span<?php echo $asigna_ambulancia_view->config_manteni->viewAttributes() ?>><?php echo $asigna_ambulancia_view->config_manteni->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->fecha_creacion->Visible) { // fecha_creacion ?>
	<tr id="r_fecha_creacion">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_fecha_creacion"><?php echo $asigna_ambulancia_view->fecha_creacion->caption() ?></span></td>
		<td data-name="fecha_creacion" <?php echo $asigna_ambulancia_view->fecha_creacion->cellAttributes() ?>>
<span id="el_asigna_ambulancia_fecha_creacion">
<span<?php echo $asigna_ambulancia_view->fecha_creacion->viewAttributes() ?>><?php echo $asigna_ambulancia_view->fecha_creacion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->longitudambulancia->Visible) { // longitudambulancia ?>
	<tr id="r_longitudambulancia">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_longitudambulancia"><?php echo $asigna_ambulancia_view->longitudambulancia->caption() ?></span></td>
		<td data-name="longitudambulancia" <?php echo $asigna_ambulancia_view->longitudambulancia->cellAttributes() ?>>
<span id="el_asigna_ambulancia_longitudambulancia">
<span<?php echo $asigna_ambulancia_view->longitudambulancia->viewAttributes() ?>><?php echo $asigna_ambulancia_view->longitudambulancia->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->latituambulancia->Visible) { // latituambulancia ?>
	<tr id="r_latituambulancia">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_latituambulancia"><?php echo $asigna_ambulancia_view->latituambulancia->caption() ?></span></td>
		<td data-name="latituambulancia" <?php echo $asigna_ambulancia_view->latituambulancia->cellAttributes() ?>>
<span id="el_asigna_ambulancia_latituambulancia">
<span<?php echo $asigna_ambulancia_view->latituambulancia->viewAttributes() ?>><?php echo $asigna_ambulancia_view->latituambulancia->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->especial->Visible) { // especial ?>
	<tr id="r_especial">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_especial"><?php echo $asigna_ambulancia_view->especial->caption() ?></span></td>
		<td data-name="especial" <?php echo $asigna_ambulancia_view->especial->cellAttributes() ?>>
<span id="el_asigna_ambulancia_especial">
<span<?php echo $asigna_ambulancia_view->especial->viewAttributes() ?>><?php echo $asigna_ambulancia_view->especial->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->id_tipotransport->Visible) { // id_tipotransport ?>
	<tr id="r_id_tipotransport">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_id_tipotransport"><?php echo $asigna_ambulancia_view->id_tipotransport->caption() ?></span></td>
		<td data-name="id_tipotransport" <?php echo $asigna_ambulancia_view->id_tipotransport->cellAttributes() ?>>
<span id="el_asigna_ambulancia_id_tipotransport">
<span<?php echo $asigna_ambulancia_view->id_tipotransport->viewAttributes() ?>><?php echo $asigna_ambulancia_view->id_tipotransport->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->tipo_amb_es->Visible) { // tipo_amb_es ?>
	<tr id="r_tipo_amb_es">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_tipo_amb_es"><?php echo $asigna_ambulancia_view->tipo_amb_es->caption() ?></span></td>
		<td data-name="tipo_amb_es" <?php echo $asigna_ambulancia_view->tipo_amb_es->cellAttributes() ?>>
<span id="el_asigna_ambulancia_tipo_amb_es">
<span<?php echo $asigna_ambulancia_view->tipo_amb_es->viewAttributes() ?>><?php echo $asigna_ambulancia_view->tipo_amb_es->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->tipo_amb_en->Visible) { // tipo_amb_en ?>
	<tr id="r_tipo_amb_en">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_tipo_amb_en"><?php echo $asigna_ambulancia_view->tipo_amb_en->caption() ?></span></td>
		<td data-name="tipo_amb_en" <?php echo $asigna_ambulancia_view->tipo_amb_en->cellAttributes() ?>>
<span id="el_asigna_ambulancia_tipo_amb_en">
<span<?php echo $asigna_ambulancia_view->tipo_amb_en->viewAttributes() ?>><?php echo $asigna_ambulancia_view->tipo_amb_en->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->tipo_amb_pr->Visible) { // tipo_amb_pr ?>
	<tr id="r_tipo_amb_pr">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_tipo_amb_pr"><?php echo $asigna_ambulancia_view->tipo_amb_pr->caption() ?></span></td>
		<td data-name="tipo_amb_pr" <?php echo $asigna_ambulancia_view->tipo_amb_pr->cellAttributes() ?>>
<span id="el_asigna_ambulancia_tipo_amb_pr">
<span<?php echo $asigna_ambulancia_view->tipo_amb_pr->viewAttributes() ?>><?php echo $asigna_ambulancia_view->tipo_amb_pr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->tipo_amb_fr->Visible) { // tipo_amb_fr ?>
	<tr id="r_tipo_amb_fr">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_tipo_amb_fr"><?php echo $asigna_ambulancia_view->tipo_amb_fr->caption() ?></span></td>
		<td data-name="tipo_amb_fr" <?php echo $asigna_ambulancia_view->tipo_amb_fr->cellAttributes() ?>>
<span id="el_asigna_ambulancia_tipo_amb_fr">
<span<?php echo $asigna_ambulancia_view->tipo_amb_fr->viewAttributes() ?>><?php echo $asigna_ambulancia_view->tipo_amb_fr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->codigo->Visible) { // codigo ?>
	<tr id="r_codigo">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_codigo"><?php echo $asigna_ambulancia_view->codigo->caption() ?></span></td>
		<td data-name="codigo" <?php echo $asigna_ambulancia_view->codigo->cellAttributes() ?>>
<span id="el_asigna_ambulancia_codigo">
<span<?php echo $asigna_ambulancia_view->codigo->viewAttributes() ?>><?php echo $asigna_ambulancia_view->codigo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->id_especialambulancia->Visible) { // id_especialambulancia ?>
	<tr id="r_id_especialambulancia">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_id_especialambulancia"><?php echo $asigna_ambulancia_view->id_especialambulancia->caption() ?></span></td>
		<td data-name="id_especialambulancia" <?php echo $asigna_ambulancia_view->id_especialambulancia->cellAttributes() ?>>
<span id="el_asigna_ambulancia_id_especialambulancia">
<span<?php echo $asigna_ambulancia_view->id_especialambulancia->viewAttributes() ?>><?php echo $asigna_ambulancia_view->id_especialambulancia->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->especial_es->Visible) { // especial_es ?>
	<tr id="r_especial_es">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_especial_es"><?php echo $asigna_ambulancia_view->especial_es->caption() ?></span></td>
		<td data-name="especial_es" <?php echo $asigna_ambulancia_view->especial_es->cellAttributes() ?>>
<span id="el_asigna_ambulancia_especial_es">
<span<?php echo $asigna_ambulancia_view->especial_es->viewAttributes() ?>><?php echo $asigna_ambulancia_view->especial_es->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->especial_en->Visible) { // especial_en ?>
	<tr id="r_especial_en">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_especial_en"><?php echo $asigna_ambulancia_view->especial_en->caption() ?></span></td>
		<td data-name="especial_en" <?php echo $asigna_ambulancia_view->especial_en->cellAttributes() ?>>
<span id="el_asigna_ambulancia_especial_en">
<span<?php echo $asigna_ambulancia_view->especial_en->viewAttributes() ?>><?php echo $asigna_ambulancia_view->especial_en->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->especial_pr->Visible) { // especial_pr ?>
	<tr id="r_especial_pr">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_especial_pr"><?php echo $asigna_ambulancia_view->especial_pr->caption() ?></span></td>
		<td data-name="especial_pr" <?php echo $asigna_ambulancia_view->especial_pr->cellAttributes() ?>>
<span id="el_asigna_ambulancia_especial_pr">
<span<?php echo $asigna_ambulancia_view->especial_pr->viewAttributes() ?>><?php echo $asigna_ambulancia_view->especial_pr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($asigna_ambulancia_view->especial_fr->Visible) { // especial_fr ?>
	<tr id="r_especial_fr">
		<td class="<?php echo $asigna_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_asigna_ambulancia_especial_fr"><?php echo $asigna_ambulancia_view->especial_fr->caption() ?></span></td>
		<td data-name="especial_fr" <?php echo $asigna_ambulancia_view->especial_fr->cellAttributes() ?>>
<span id="el_asigna_ambulancia_especial_fr">
<span<?php echo $asigna_ambulancia_view->especial_fr->viewAttributes() ?>><?php echo $asigna_ambulancia_view->especial_fr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$asigna_ambulancia_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$asigna_ambulancia_view->isExport()) { ?>
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
$asigna_ambulancia_view->terminate();
?>