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
$preh_servicio_ambulancia_delete = new preh_servicio_ambulancia_delete();

// Run the page
$preh_servicio_ambulancia_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_servicio_ambulancia_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpreh_servicio_ambulanciadelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpreh_servicio_ambulanciadelete = currentForm = new ew.Form("fpreh_servicio_ambulanciadelete", "delete");
	loadjs.done("fpreh_servicio_ambulanciadelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	$(document).ready(function(){$(".llaves").hide()});
});
</script>
<?php $preh_servicio_ambulancia_delete->showPageHeader(); ?>
<?php
$preh_servicio_ambulancia_delete->showMessage();
?>
<form name="fpreh_servicio_ambulanciadelete" id="fpreh_servicio_ambulanciadelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_servicio_ambulancia">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($preh_servicio_ambulancia_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($preh_servicio_ambulancia_delete->id_servcioambulacia->Visible) { // id_servcioambulacia ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->id_servcioambulacia->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_id_servcioambulacia" class="preh_servicio_ambulancia_id_servcioambulacia"><?php echo $preh_servicio_ambulancia_delete->id_servcioambulacia->caption() ?></span></th>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->cod_casopreh->Visible) { // cod_casopreh ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->cod_casopreh->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_cod_casopreh" class="preh_servicio_ambulancia_cod_casopreh"><?php echo $preh_servicio_ambulancia_delete->cod_casopreh->caption() ?></span></th>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->cod_ambulancia->Visible) { // cod_ambulancia ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->cod_ambulancia->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_cod_ambulancia" class="preh_servicio_ambulancia_cod_ambulancia"><?php echo $preh_servicio_ambulancia_delete->cod_ambulancia->caption() ?></span></th>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->hora_confirma->Visible) { // hora_confirma ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->hora_confirma->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_hora_confirma" class="preh_servicio_ambulancia_hora_confirma"><?php echo $preh_servicio_ambulancia_delete->hora_confirma->caption() ?></span></th>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->hora_asigna->Visible) { // hora_asigna ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->hora_asigna->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_hora_asigna" class="preh_servicio_ambulancia_hora_asigna"><?php echo $preh_servicio_ambulancia_delete->hora_asigna->caption() ?></span></th>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->hora_llegada->Visible) { // hora_llegada ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->hora_llegada->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_hora_llegada" class="preh_servicio_ambulancia_hora_llegada"><?php echo $preh_servicio_ambulancia_delete->hora_llegada->caption() ?></span></th>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->hora_inicio->Visible) { // hora_inicio ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->hora_inicio->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_hora_inicio" class="preh_servicio_ambulancia_hora_inicio"><?php echo $preh_servicio_ambulancia_delete->hora_inicio->caption() ?></span></th>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->hora_destino->Visible) { // hora_destino ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->hora_destino->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_hora_destino" class="preh_servicio_ambulancia_hora_destino"><?php echo $preh_servicio_ambulancia_delete->hora_destino->caption() ?></span></th>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->hora_preposicion->Visible) { // hora_preposicion ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->hora_preposicion->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_hora_preposicion" class="preh_servicio_ambulancia_hora_preposicion"><?php echo $preh_servicio_ambulancia_delete->hora_preposicion->caption() ?></span></th>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->tipo_traslado->Visible) { // tipo_traslado ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->tipo_traslado->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_tipo_traslado" class="preh_servicio_ambulancia_tipo_traslado"><?php echo $preh_servicio_ambulancia_delete->tipo_traslado->caption() ?></span></th>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->traslado_fallido->Visible) { // traslado_fallido ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->traslado_fallido->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_traslado_fallido" class="preh_servicio_ambulancia_traslado_fallido"><?php echo $preh_servicio_ambulancia_delete->traslado_fallido->caption() ?></span></th>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->estado_paciente->Visible) { // estado_paciente ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->estado_paciente->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_estado_paciente" class="preh_servicio_ambulancia_estado_paciente"><?php echo $preh_servicio_ambulancia_delete->estado_paciente->caption() ?></span></th>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->k_final->Visible) { // k_final ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->k_final->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_k_final" class="preh_servicio_ambulancia_k_final"><?php echo $preh_servicio_ambulancia_delete->k_final->caption() ?></span></th>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->k_inical->Visible) { // k_inical ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->k_inical->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_k_inical" class="preh_servicio_ambulancia_k_inical"><?php echo $preh_servicio_ambulancia_delete->k_inical->caption() ?></span></th>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->tipo_serviciosistema->Visible) { // tipo_serviciosistema ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->tipo_serviciosistema->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_tipo_serviciosistema" class="preh_servicio_ambulancia_tipo_serviciosistema"><?php echo $preh_servicio_ambulancia_delete->tipo_serviciosistema->caption() ?></span></th>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->preposicion->Visible) { // preposicion ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->preposicion->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_preposicion" class="preh_servicio_ambulancia_preposicion"><?php echo $preh_servicio_ambulancia_delete->preposicion->caption() ?></span></th>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->conductor->Visible) { // conductor ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->conductor->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_conductor" class="preh_servicio_ambulancia_conductor"><?php echo $preh_servicio_ambulancia_delete->conductor->caption() ?></span></th>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->medico->Visible) { // medico ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->medico->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_medico" class="preh_servicio_ambulancia_medico"><?php echo $preh_servicio_ambulancia_delete->medico->caption() ?></span></th>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->paramedico->Visible) { // paramedico ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->paramedico->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_paramedico" class="preh_servicio_ambulancia_paramedico"><?php echo $preh_servicio_ambulancia_delete->paramedico->caption() ?></span></th>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->dx_aph->Visible) { // dx_aph ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->dx_aph->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_dx_aph" class="preh_servicio_ambulancia_dx_aph"><?php echo $preh_servicio_ambulancia_delete->dx_aph->caption() ?></span></th>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->dx_soat->Visible) { // dx_soat ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->dx_soat->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_dx_soat" class="preh_servicio_ambulancia_dx_soat"><?php echo $preh_servicio_ambulancia_delete->dx_soat->caption() ?></span></th>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->estado_pacientefinal->Visible) { // estado_pacientefinal ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->estado_pacientefinal->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_estado_pacientefinal" class="preh_servicio_ambulancia_estado_pacientefinal"><?php echo $preh_servicio_ambulancia_delete->estado_pacientefinal->caption() ?></span></th>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->cuando_murio->Visible) { // cuando_murio ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->cuando_murio->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_cuando_murio" class="preh_servicio_ambulancia_cuando_murio"><?php echo $preh_servicio_ambulancia_delete->cuando_murio->caption() ?></span></th>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->accidente_vehiculo->Visible) { // accidente_vehiculo ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->accidente_vehiculo->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_accidente_vehiculo" class="preh_servicio_ambulancia_accidente_vehiculo"><?php echo $preh_servicio_ambulancia_delete->accidente_vehiculo->caption() ?></span></th>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->atropellado->Visible) { // atropellado ?>
		<th class="<?php echo $preh_servicio_ambulancia_delete->atropellado->headerCellClass() ?>"><span id="elh_preh_servicio_ambulancia_atropellado" class="preh_servicio_ambulancia_atropellado"><?php echo $preh_servicio_ambulancia_delete->atropellado->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$preh_servicio_ambulancia_delete->RecordCount = 0;
$i = 0;
while (!$preh_servicio_ambulancia_delete->Recordset->EOF) {
	$preh_servicio_ambulancia_delete->RecordCount++;
	$preh_servicio_ambulancia_delete->RowCount++;

	// Set row properties
	$preh_servicio_ambulancia->resetAttributes();
	$preh_servicio_ambulancia->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$preh_servicio_ambulancia_delete->loadRowValues($preh_servicio_ambulancia_delete->Recordset);

	// Render row
	$preh_servicio_ambulancia_delete->renderRow();
?>
	<tr <?php echo $preh_servicio_ambulancia->rowAttributes() ?>>
<?php if ($preh_servicio_ambulancia_delete->id_servcioambulacia->Visible) { // id_servcioambulacia ?>
		<td <?php echo $preh_servicio_ambulancia_delete->id_servcioambulacia->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_id_servcioambulacia" class="preh_servicio_ambulancia_id_servcioambulacia">
<span<?php echo $preh_servicio_ambulancia_delete->id_servcioambulacia->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->id_servcioambulacia->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->cod_casopreh->Visible) { // cod_casopreh ?>
		<td <?php echo $preh_servicio_ambulancia_delete->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_cod_casopreh" class="preh_servicio_ambulancia_cod_casopreh">
<span<?php echo $preh_servicio_ambulancia_delete->cod_casopreh->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->cod_casopreh->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->cod_ambulancia->Visible) { // cod_ambulancia ?>
		<td <?php echo $preh_servicio_ambulancia_delete->cod_ambulancia->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_cod_ambulancia" class="preh_servicio_ambulancia_cod_ambulancia">
<span<?php echo $preh_servicio_ambulancia_delete->cod_ambulancia->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->cod_ambulancia->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->hora_confirma->Visible) { // hora_confirma ?>
		<td <?php echo $preh_servicio_ambulancia_delete->hora_confirma->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_hora_confirma" class="preh_servicio_ambulancia_hora_confirma">
<span<?php echo $preh_servicio_ambulancia_delete->hora_confirma->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->hora_confirma->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->hora_asigna->Visible) { // hora_asigna ?>
		<td <?php echo $preh_servicio_ambulancia_delete->hora_asigna->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_hora_asigna" class="preh_servicio_ambulancia_hora_asigna">
<span<?php echo $preh_servicio_ambulancia_delete->hora_asigna->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->hora_asigna->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->hora_llegada->Visible) { // hora_llegada ?>
		<td <?php echo $preh_servicio_ambulancia_delete->hora_llegada->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_hora_llegada" class="preh_servicio_ambulancia_hora_llegada">
<span<?php echo $preh_servicio_ambulancia_delete->hora_llegada->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->hora_llegada->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->hora_inicio->Visible) { // hora_inicio ?>
		<td <?php echo $preh_servicio_ambulancia_delete->hora_inicio->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_hora_inicio" class="preh_servicio_ambulancia_hora_inicio">
<span<?php echo $preh_servicio_ambulancia_delete->hora_inicio->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->hora_inicio->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->hora_destino->Visible) { // hora_destino ?>
		<td <?php echo $preh_servicio_ambulancia_delete->hora_destino->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_hora_destino" class="preh_servicio_ambulancia_hora_destino">
<span<?php echo $preh_servicio_ambulancia_delete->hora_destino->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->hora_destino->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->hora_preposicion->Visible) { // hora_preposicion ?>
		<td <?php echo $preh_servicio_ambulancia_delete->hora_preposicion->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_hora_preposicion" class="preh_servicio_ambulancia_hora_preposicion">
<span<?php echo $preh_servicio_ambulancia_delete->hora_preposicion->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->hora_preposicion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->tipo_traslado->Visible) { // tipo_traslado ?>
		<td <?php echo $preh_servicio_ambulancia_delete->tipo_traslado->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_tipo_traslado" class="preh_servicio_ambulancia_tipo_traslado">
<span<?php echo $preh_servicio_ambulancia_delete->tipo_traslado->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->tipo_traslado->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->traslado_fallido->Visible) { // traslado_fallido ?>
		<td <?php echo $preh_servicio_ambulancia_delete->traslado_fallido->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_traslado_fallido" class="preh_servicio_ambulancia_traslado_fallido">
<span<?php echo $preh_servicio_ambulancia_delete->traslado_fallido->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->traslado_fallido->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->estado_paciente->Visible) { // estado_paciente ?>
		<td <?php echo $preh_servicio_ambulancia_delete->estado_paciente->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_estado_paciente" class="preh_servicio_ambulancia_estado_paciente">
<span<?php echo $preh_servicio_ambulancia_delete->estado_paciente->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->estado_paciente->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->k_final->Visible) { // k_final ?>
		<td <?php echo $preh_servicio_ambulancia_delete->k_final->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_k_final" class="preh_servicio_ambulancia_k_final">
<span<?php echo $preh_servicio_ambulancia_delete->k_final->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->k_final->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->k_inical->Visible) { // k_inical ?>
		<td <?php echo $preh_servicio_ambulancia_delete->k_inical->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_k_inical" class="preh_servicio_ambulancia_k_inical">
<span<?php echo $preh_servicio_ambulancia_delete->k_inical->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->k_inical->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->tipo_serviciosistema->Visible) { // tipo_serviciosistema ?>
		<td <?php echo $preh_servicio_ambulancia_delete->tipo_serviciosistema->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_tipo_serviciosistema" class="preh_servicio_ambulancia_tipo_serviciosistema">
<span<?php echo $preh_servicio_ambulancia_delete->tipo_serviciosistema->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->tipo_serviciosistema->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->preposicion->Visible) { // preposicion ?>
		<td <?php echo $preh_servicio_ambulancia_delete->preposicion->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_preposicion" class="preh_servicio_ambulancia_preposicion">
<span<?php echo $preh_servicio_ambulancia_delete->preposicion->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->preposicion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->conductor->Visible) { // conductor ?>
		<td <?php echo $preh_servicio_ambulancia_delete->conductor->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_conductor" class="preh_servicio_ambulancia_conductor">
<span<?php echo $preh_servicio_ambulancia_delete->conductor->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->conductor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->medico->Visible) { // medico ?>
		<td <?php echo $preh_servicio_ambulancia_delete->medico->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_medico" class="preh_servicio_ambulancia_medico">
<span<?php echo $preh_servicio_ambulancia_delete->medico->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->medico->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->paramedico->Visible) { // paramedico ?>
		<td <?php echo $preh_servicio_ambulancia_delete->paramedico->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_paramedico" class="preh_servicio_ambulancia_paramedico">
<span<?php echo $preh_servicio_ambulancia_delete->paramedico->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->paramedico->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->dx_aph->Visible) { // dx_aph ?>
		<td <?php echo $preh_servicio_ambulancia_delete->dx_aph->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_dx_aph" class="preh_servicio_ambulancia_dx_aph">
<span<?php echo $preh_servicio_ambulancia_delete->dx_aph->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->dx_aph->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->dx_soat->Visible) { // dx_soat ?>
		<td <?php echo $preh_servicio_ambulancia_delete->dx_soat->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_dx_soat" class="preh_servicio_ambulancia_dx_soat">
<span<?php echo $preh_servicio_ambulancia_delete->dx_soat->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->dx_soat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->estado_pacientefinal->Visible) { // estado_pacientefinal ?>
		<td <?php echo $preh_servicio_ambulancia_delete->estado_pacientefinal->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_estado_pacientefinal" class="preh_servicio_ambulancia_estado_pacientefinal">
<span<?php echo $preh_servicio_ambulancia_delete->estado_pacientefinal->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->estado_pacientefinal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->cuando_murio->Visible) { // cuando_murio ?>
		<td <?php echo $preh_servicio_ambulancia_delete->cuando_murio->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_cuando_murio" class="preh_servicio_ambulancia_cuando_murio">
<span<?php echo $preh_servicio_ambulancia_delete->cuando_murio->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->cuando_murio->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->accidente_vehiculo->Visible) { // accidente_vehiculo ?>
		<td <?php echo $preh_servicio_ambulancia_delete->accidente_vehiculo->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_accidente_vehiculo" class="preh_servicio_ambulancia_accidente_vehiculo">
<span<?php echo $preh_servicio_ambulancia_delete->accidente_vehiculo->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->accidente_vehiculo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_servicio_ambulancia_delete->atropellado->Visible) { // atropellado ?>
		<td <?php echo $preh_servicio_ambulancia_delete->atropellado->cellAttributes() ?>>
<span id="el<?php echo $preh_servicio_ambulancia_delete->RowCount ?>_preh_servicio_ambulancia_atropellado" class="preh_servicio_ambulancia_atropellado">
<span<?php echo $preh_servicio_ambulancia_delete->atropellado->viewAttributes() ?>><?php echo $preh_servicio_ambulancia_delete->atropellado->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$preh_servicio_ambulancia_delete->Recordset->moveNext();
}
$preh_servicio_ambulancia_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $preh_servicio_ambulancia_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$preh_servicio_ambulancia_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$preh_servicio_ambulancia_delete->terminate();
?>