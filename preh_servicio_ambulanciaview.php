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
$preh_servicio_ambulancia_view = new preh_servicio_ambulancia_view();

// Run the page
$preh_servicio_ambulancia_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_servicio_ambulancia_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$preh_servicio_ambulancia_view->isExport()) { ?>
<script>
var fpreh_servicio_ambulanciaview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpreh_servicio_ambulanciaview = currentForm = new ew.Form("fpreh_servicio_ambulanciaview", "view");
	loadjs.done("fpreh_servicio_ambulanciaview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$preh_servicio_ambulancia_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $preh_servicio_ambulancia_view->ExportOptions->render("body") ?>
<?php $preh_servicio_ambulancia_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $preh_servicio_ambulancia_view->showPageHeader(); ?>
<?php
$preh_servicio_ambulancia_view->showMessage();
?>
<form name="fpreh_servicio_ambulanciaview" id="fpreh_servicio_ambulanciaview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_servicio_ambulancia">
<input type="hidden" name="modal" value="<?php echo (int)$preh_servicio_ambulancia_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($preh_servicio_ambulancia_view->id_servcioambulacia->Visible) { // id_servcioambulacia ?>
	<tr id="r_id_servcioambulacia">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_id_servcioambulacia"><script id="tpc_preh_servicio_ambulancia_id_servcioambulacia" type="text/html"><?php echo $preh_servicio_ambulancia_view->id_servcioambulacia->caption() ?></script></span></td>
		<td data-name="id_servcioambulacia" <?php echo $preh_servicio_ambulancia_view->id_servcioambulacia->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_id_servcioambulacia" type="text/html"><span id="el_preh_servicio_ambulancia_id_servcioambulacia">
<span<?php echo $preh_servicio_ambulancia_view->id_servcioambulacia->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->id_servcioambulacia->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->cod_casopreh->Visible) { // cod_casopreh ?>
	<tr id="r_cod_casopreh">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_cod_casopreh"><script id="tpc_preh_servicio_ambulancia_cod_casopreh" type="text/html"><?php echo $preh_servicio_ambulancia_view->cod_casopreh->caption() ?></script></span></td>
		<td data-name="cod_casopreh" <?php echo $preh_servicio_ambulancia_view->cod_casopreh->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_cod_casopreh" type="text/html"><span id="el_preh_servicio_ambulancia_cod_casopreh">
<span<?php echo $preh_servicio_ambulancia_view->cod_casopreh->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->cod_casopreh->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->cod_ambulancia->Visible) { // cod_ambulancia ?>
	<tr id="r_cod_ambulancia">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_cod_ambulancia"><script id="tpc_preh_servicio_ambulancia_cod_ambulancia" type="text/html"><?php echo $preh_servicio_ambulancia_view->cod_ambulancia->caption() ?></script></span></td>
		<td data-name="cod_ambulancia" <?php echo $preh_servicio_ambulancia_view->cod_ambulancia->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_cod_ambulancia" type="text/html"><span id="el_preh_servicio_ambulancia_cod_ambulancia">
<span<?php echo $preh_servicio_ambulancia_view->cod_ambulancia->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->cod_ambulancia->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->hora_confirma->Visible) { // hora_confirma ?>
	<tr id="r_hora_confirma">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_hora_confirma"><script id="tpc_preh_servicio_ambulancia_hora_confirma" type="text/html"><?php echo $preh_servicio_ambulancia_view->hora_confirma->caption() ?></script></span></td>
		<td data-name="hora_confirma" <?php echo $preh_servicio_ambulancia_view->hora_confirma->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_hora_confirma" type="text/html"><span id="el_preh_servicio_ambulancia_hora_confirma">
<span<?php echo $preh_servicio_ambulancia_view->hora_confirma->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->hora_confirma->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->hora_asigna->Visible) { // hora_asigna ?>
	<tr id="r_hora_asigna">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_hora_asigna"><script id="tpc_preh_servicio_ambulancia_hora_asigna" type="text/html"><?php echo $preh_servicio_ambulancia_view->hora_asigna->caption() ?></script></span></td>
		<td data-name="hora_asigna" <?php echo $preh_servicio_ambulancia_view->hora_asigna->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_hora_asigna" type="text/html"><span id="el_preh_servicio_ambulancia_hora_asigna">
<span<?php echo $preh_servicio_ambulancia_view->hora_asigna->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->hora_asigna->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->hora_llegada->Visible) { // hora_llegada ?>
	<tr id="r_hora_llegada">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_hora_llegada"><script id="tpc_preh_servicio_ambulancia_hora_llegada" type="text/html"><?php echo $preh_servicio_ambulancia_view->hora_llegada->caption() ?></script></span></td>
		<td data-name="hora_llegada" <?php echo $preh_servicio_ambulancia_view->hora_llegada->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_hora_llegada" type="text/html"><span id="el_preh_servicio_ambulancia_hora_llegada">
<span<?php echo $preh_servicio_ambulancia_view->hora_llegada->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->hora_llegada->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->hora_inicio->Visible) { // hora_inicio ?>
	<tr id="r_hora_inicio">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_hora_inicio"><script id="tpc_preh_servicio_ambulancia_hora_inicio" type="text/html"><?php echo $preh_servicio_ambulancia_view->hora_inicio->caption() ?></script></span></td>
		<td data-name="hora_inicio" <?php echo $preh_servicio_ambulancia_view->hora_inicio->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_hora_inicio" type="text/html"><span id="el_preh_servicio_ambulancia_hora_inicio">
<span<?php echo $preh_servicio_ambulancia_view->hora_inicio->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->hora_inicio->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->hora_destino->Visible) { // hora_destino ?>
	<tr id="r_hora_destino">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_hora_destino"><script id="tpc_preh_servicio_ambulancia_hora_destino" type="text/html"><?php echo $preh_servicio_ambulancia_view->hora_destino->caption() ?></script></span></td>
		<td data-name="hora_destino" <?php echo $preh_servicio_ambulancia_view->hora_destino->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_hora_destino" type="text/html"><span id="el_preh_servicio_ambulancia_hora_destino">
<span<?php echo $preh_servicio_ambulancia_view->hora_destino->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->hora_destino->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->hora_preposicion->Visible) { // hora_preposicion ?>
	<tr id="r_hora_preposicion">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_hora_preposicion"><script id="tpc_preh_servicio_ambulancia_hora_preposicion" type="text/html"><?php echo $preh_servicio_ambulancia_view->hora_preposicion->caption() ?></script></span></td>
		<td data-name="hora_preposicion" <?php echo $preh_servicio_ambulancia_view->hora_preposicion->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_hora_preposicion" type="text/html"><span id="el_preh_servicio_ambulancia_hora_preposicion">
<span<?php echo $preh_servicio_ambulancia_view->hora_preposicion->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->hora_preposicion->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->observaciones->Visible) { // observaciones ?>
	<tr id="r_observaciones">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_observaciones"><script id="tpc_preh_servicio_ambulancia_observaciones" type="text/html"><?php echo $preh_servicio_ambulancia_view->observaciones->caption() ?></script></span></td>
		<td data-name="observaciones" <?php echo $preh_servicio_ambulancia_view->observaciones->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_observaciones" type="text/html"><span id="el_preh_servicio_ambulancia_observaciones">
<span<?php echo $preh_servicio_ambulancia_view->observaciones->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->observaciones->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->tipo_traslado->Visible) { // tipo_traslado ?>
	<tr id="r_tipo_traslado">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_tipo_traslado"><script id="tpc_preh_servicio_ambulancia_tipo_traslado" type="text/html"><?php echo $preh_servicio_ambulancia_view->tipo_traslado->caption() ?></script></span></td>
		<td data-name="tipo_traslado" <?php echo $preh_servicio_ambulancia_view->tipo_traslado->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_tipo_traslado" type="text/html"><span id="el_preh_servicio_ambulancia_tipo_traslado">
<span<?php echo $preh_servicio_ambulancia_view->tipo_traslado->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->tipo_traslado->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->traslado_fallido->Visible) { // traslado_fallido ?>
	<tr id="r_traslado_fallido">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_traslado_fallido"><script id="tpc_preh_servicio_ambulancia_traslado_fallido" type="text/html"><?php echo $preh_servicio_ambulancia_view->traslado_fallido->caption() ?></script></span></td>
		<td data-name="traslado_fallido" <?php echo $preh_servicio_ambulancia_view->traslado_fallido->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_traslado_fallido" type="text/html"><span id="el_preh_servicio_ambulancia_traslado_fallido">
<span<?php echo $preh_servicio_ambulancia_view->traslado_fallido->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->traslado_fallido->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->estado_paciente->Visible) { // estado_paciente ?>
	<tr id="r_estado_paciente">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_estado_paciente"><script id="tpc_preh_servicio_ambulancia_estado_paciente" type="text/html"><?php echo $preh_servicio_ambulancia_view->estado_paciente->caption() ?></script></span></td>
		<td data-name="estado_paciente" <?php echo $preh_servicio_ambulancia_view->estado_paciente->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_estado_paciente" type="text/html"><span id="el_preh_servicio_ambulancia_estado_paciente">
<span<?php echo $preh_servicio_ambulancia_view->estado_paciente->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->estado_paciente->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->k_final->Visible) { // k_final ?>
	<tr id="r_k_final">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_k_final"><script id="tpc_preh_servicio_ambulancia_k_final" type="text/html"><?php echo $preh_servicio_ambulancia_view->k_final->caption() ?></script></span></td>
		<td data-name="k_final" <?php echo $preh_servicio_ambulancia_view->k_final->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_k_final" type="text/html"><span id="el_preh_servicio_ambulancia_k_final">
<span<?php echo $preh_servicio_ambulancia_view->k_final->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->k_final->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->k_inical->Visible) { // k_inical ?>
	<tr id="r_k_inical">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_k_inical"><script id="tpc_preh_servicio_ambulancia_k_inical" type="text/html"><?php echo $preh_servicio_ambulancia_view->k_inical->caption() ?></script></span></td>
		<td data-name="k_inical" <?php echo $preh_servicio_ambulancia_view->k_inical->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_k_inical" type="text/html"><span id="el_preh_servicio_ambulancia_k_inical">
<span<?php echo $preh_servicio_ambulancia_view->k_inical->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->k_inical->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->tipo_serviciosistema->Visible) { // tipo_serviciosistema ?>
	<tr id="r_tipo_serviciosistema">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_tipo_serviciosistema"><script id="tpc_preh_servicio_ambulancia_tipo_serviciosistema" type="text/html"><?php echo $preh_servicio_ambulancia_view->tipo_serviciosistema->caption() ?></script></span></td>
		<td data-name="tipo_serviciosistema" <?php echo $preh_servicio_ambulancia_view->tipo_serviciosistema->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_tipo_serviciosistema" type="text/html"><span id="el_preh_servicio_ambulancia_tipo_serviciosistema">
<span<?php echo $preh_servicio_ambulancia_view->tipo_serviciosistema->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->tipo_serviciosistema->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->preposicion->Visible) { // preposicion ?>
	<tr id="r_preposicion">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_preposicion"><script id="tpc_preh_servicio_ambulancia_preposicion" type="text/html"><?php echo $preh_servicio_ambulancia_view->preposicion->caption() ?></script></span></td>
		<td data-name="preposicion" <?php echo $preh_servicio_ambulancia_view->preposicion->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_preposicion" type="text/html"><span id="el_preh_servicio_ambulancia_preposicion">
<span<?php echo $preh_servicio_ambulancia_view->preposicion->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->preposicion->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->conductor->Visible) { // conductor ?>
	<tr id="r_conductor">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_conductor"><script id="tpc_preh_servicio_ambulancia_conductor" type="text/html"><?php echo $preh_servicio_ambulancia_view->conductor->caption() ?></script></span></td>
		<td data-name="conductor" <?php echo $preh_servicio_ambulancia_view->conductor->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_conductor" type="text/html"><span id="el_preh_servicio_ambulancia_conductor">
<span<?php echo $preh_servicio_ambulancia_view->conductor->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->conductor->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->medico->Visible) { // medico ?>
	<tr id="r_medico">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_medico"><script id="tpc_preh_servicio_ambulancia_medico" type="text/html"><?php echo $preh_servicio_ambulancia_view->medico->caption() ?></script></span></td>
		<td data-name="medico" <?php echo $preh_servicio_ambulancia_view->medico->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_medico" type="text/html"><span id="el_preh_servicio_ambulancia_medico">
<span<?php echo $preh_servicio_ambulancia_view->medico->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->medico->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->paramedico->Visible) { // paramedico ?>
	<tr id="r_paramedico">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_paramedico"><script id="tpc_preh_servicio_ambulancia_paramedico" type="text/html"><?php echo $preh_servicio_ambulancia_view->paramedico->caption() ?></script></span></td>
		<td data-name="paramedico" <?php echo $preh_servicio_ambulancia_view->paramedico->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_paramedico" type="text/html"><span id="el_preh_servicio_ambulancia_paramedico">
<span<?php echo $preh_servicio_ambulancia_view->paramedico->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->paramedico->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->dx_aph->Visible) { // dx_aph ?>
	<tr id="r_dx_aph">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_dx_aph"><script id="tpc_preh_servicio_ambulancia_dx_aph" type="text/html"><?php echo $preh_servicio_ambulancia_view->dx_aph->caption() ?></script></span></td>
		<td data-name="dx_aph" <?php echo $preh_servicio_ambulancia_view->dx_aph->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_dx_aph" type="text/html"><span id="el_preh_servicio_ambulancia_dx_aph">
<span<?php echo $preh_servicio_ambulancia_view->dx_aph->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->dx_aph->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->dx_soat->Visible) { // dx_soat ?>
	<tr id="r_dx_soat">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_dx_soat"><script id="tpc_preh_servicio_ambulancia_dx_soat" type="text/html"><?php echo $preh_servicio_ambulancia_view->dx_soat->caption() ?></script></span></td>
		<td data-name="dx_soat" <?php echo $preh_servicio_ambulancia_view->dx_soat->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_dx_soat" type="text/html"><span id="el_preh_servicio_ambulancia_dx_soat">
<span<?php echo $preh_servicio_ambulancia_view->dx_soat->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->dx_soat->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->estado_pacientefinal->Visible) { // estado_pacientefinal ?>
	<tr id="r_estado_pacientefinal">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_estado_pacientefinal"><script id="tpc_preh_servicio_ambulancia_estado_pacientefinal" type="text/html"><?php echo $preh_servicio_ambulancia_view->estado_pacientefinal->caption() ?></script></span></td>
		<td data-name="estado_pacientefinal" <?php echo $preh_servicio_ambulancia_view->estado_pacientefinal->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_estado_pacientefinal" type="text/html"><span id="el_preh_servicio_ambulancia_estado_pacientefinal">
<span<?php echo $preh_servicio_ambulancia_view->estado_pacientefinal->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->estado_pacientefinal->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->cuando_murio->Visible) { // cuando_murio ?>
	<tr id="r_cuando_murio">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_cuando_murio"><script id="tpc_preh_servicio_ambulancia_cuando_murio" type="text/html"><?php echo $preh_servicio_ambulancia_view->cuando_murio->caption() ?></script></span></td>
		<td data-name="cuando_murio" <?php echo $preh_servicio_ambulancia_view->cuando_murio->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_cuando_murio" type="text/html"><span id="el_preh_servicio_ambulancia_cuando_murio">
<span<?php echo $preh_servicio_ambulancia_view->cuando_murio->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->cuando_murio->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->accidente_vehiculo->Visible) { // accidente_vehiculo ?>
	<tr id="r_accidente_vehiculo">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_accidente_vehiculo"><script id="tpc_preh_servicio_ambulancia_accidente_vehiculo" type="text/html"><?php echo $preh_servicio_ambulancia_view->accidente_vehiculo->caption() ?></script></span></td>
		<td data-name="accidente_vehiculo" <?php echo $preh_servicio_ambulancia_view->accidente_vehiculo->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_accidente_vehiculo" type="text/html"><span id="el_preh_servicio_ambulancia_accidente_vehiculo">
<span<?php echo $preh_servicio_ambulancia_view->accidente_vehiculo->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->accidente_vehiculo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_servicio_ambulancia_view->atropellado->Visible) { // atropellado ?>
	<tr id="r_atropellado">
		<td class="<?php echo $preh_servicio_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_preh_servicio_ambulancia_atropellado"><script id="tpc_preh_servicio_ambulancia_atropellado" type="text/html"><?php echo $preh_servicio_ambulancia_view->atropellado->caption() ?></script></span></td>
		<td data-name="atropellado" <?php echo $preh_servicio_ambulancia_view->atropellado->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_atropellado" type="text/html"><span id="el_preh_servicio_ambulancia_atropellado">
<span<?php echo $preh_servicio_ambulancia_view->atropellado->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_view->atropellado->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_preh_servicio_ambulanciaview" class="ew-custom-template"></div>
<script id="tpm_preh_servicio_ambulanciaview" type="text/html">
<div id="ct_preh_servicio_ambulancia_view">
<div class="form-row">
	<div class="form-group col-xs-2">
	  {{include tmpl=~getTemplate("#tpx_id_maestrointerh")/}}
	</div>
	<div class="form-group col-xs-2">
	  {{include tmpl=~getTemplate("#tpx_preh_servicio_ambulancia_cod_ambulancia")/}}
	</div>
</div>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $preh_servicio_ambulancia_view->hora_asigna->caption() ?></label></br>
	 <div class="input-group-append"> {{include tmpl=~getTemplate("#tpx_preh_servicio_ambulancia_hora_asigna")/}}<button  onClick = 'fechaHoy(0)' class="btn btn-default" type="button"><i class="fas fa-stopwatch"></i></button></div>
	 </div>
</div>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $preh_servicio_ambulancia_view->hora_llegada->caption() ?></label></br>
	  <div class="input-group-append"> {{include tmpl=~getTemplate("#tpx_preh_servicio_ambulancia_hora_llegada")/}}<button  onClick = 'fechaHoy(1)' class="btn btn-default" type="button"><i class="fas fa-stopwatch"></i></button></div>
	</div>
</div>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $preh_servicio_ambulancia_view->hora_inicio->caption() ?></label></br>
	  <div class="input-group-append"> {{include tmpl=~getTemplate("#tpx_preh_servicio_ambulancia_hora_inicio")/}} <button  onClick = 'fechaHoy(2)' class="btn btn-default" type="button"><i class="fas fa-stopwatch"></i></button></div>	  
	</div>
</div>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $preh_servicio_ambulancia_view->hora_destino->caption() ?></label></br>
	  <div class="input-group-append">{{include tmpl=~getTemplate("#tpx_preh_servicio_ambulancia_hora_destino")/}}<button  onClick = 'fechaHoy(3)' class="btn btn-default" type="button"><i class="fas fa-stopwatch"></i></button></div>
	 </div>
</div>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $preh_servicio_ambulancia_view->hora_preposicion->caption() ?></label></br>
	 <div class="input-group-append">  {{include tmpl=~getTemplate("#tpx_preh_servicio_ambulancia_hora_preposicion")/}}<button  onClick = 'fechaHoy(4)' class="btn btn-default" type="button"><i class="fas fa-stopwatch"></i></button></div>
	</div>
 </div>
<?php echo $tri_amb ?> </br>
 </hr>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $preh_servicio_ambulancia_view->conductor->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_preh_servicio_ambulancia_conductor")/}}
	</div>
	<div class="form-group col-xs-2">
	  <label><?php echo $preh_servicio_ambulancia_view->medico->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_preh_servicio_ambulancia_medico")/}}
	</div>
	<div class="form-group col-xs-2">
	  <label><?php echo $preh_servicio_ambulancia_view->paramedico->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_preh_servicio_ambulancia_paramedico")/}}
	</div>
  </div>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $preh_servicio_ambulancia_view->traslado_fallido->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_preh_servicio_ambulancia_traslado_fallido")/}}
	</div>
	  <div class="form-group">
	 	<label><?php echo $preh_servicio_ambulancia_view->observaciones->caption() ?></label></br>
	 	  {{include tmpl=~getTemplate("#tpx_preh_servicio_ambulancia_observaciones")/}}
	  </div>
</div>
</div>
</script>
<script type="text/html" class="preh_servicio_ambulanciaview_js">


		function fechaHoy(boton){
			var fecha = new Date(); 
			var mes = fecha.getMonth()+1; 
			var dia = fecha.getDate(); 
			var ano = fecha.getFullYear(); 
			var hora = fecha.getHours();    
			var min = fecha.getMinutes();  
			var seg = fecha.getSeconds();
			if (hora > 12){
				hora= hora-12;
				seg = seg+" PM";				
			}else{
				seg = seg+" AM";
			}
			if(dia<10)
				dia='0'+dia; //agrega cero si el menor de 10
			if(mes<10)
				mes='0'+mes //agrega cero si el menor de 10
			if(hora<10)
				hora='0'+hora; //agrega cero si el menor de 10
			if(min<10)
				min='0'+min
			if(seg<10)
				seg='0'+seg
			fecha = dia+"/"+mes+"/"+ano+" "+hora+":"+min+":"+seg;
			if (boton == 0) 
				document.getElementById('x_hora_asigna').value= fecha
			else if (boton == 1)
				document.getElementById('x_hora_llegada').value= fecha
			else if (boton == 2)
				document.getElementById('x_hora_inicio').value= fecha
			else if (boton == 3)
				document.getElementById('x_hora_destino').value= fecha
			else if (boton == 4)
				document.getElementById('x_hora_preposicion').value= fecha
			return fecha;
		}   

</script>

</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($preh_servicio_ambulancia->Rows) ?> };
	ew.applyTemplate("tpd_preh_servicio_ambulanciaview", "tpm_preh_servicio_ambulanciaview", "preh_servicio_ambulanciaview", "<?php echo $preh_servicio_ambulancia->CustomExport ?>", ew.templateData.rows[0]);
	$("script.preh_servicio_ambulanciaview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$preh_servicio_ambulancia_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$preh_servicio_ambulancia_view->isExport()) { ?>
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
$preh_servicio_ambulancia_view->terminate();
?>