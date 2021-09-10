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
$preh_maestro_delete = new preh_maestro_delete();

// Run the page
$preh_maestro_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_maestro_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpreh_maestrodelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpreh_maestrodelete = currentForm = new ew.Form("fpreh_maestrodelete", "delete");
	loadjs.done("fpreh_maestrodelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $preh_maestro_delete->showPageHeader(); ?>
<?php
$preh_maestro_delete->showMessage();
?>
<form name="fpreh_maestrodelete" id="fpreh_maestrodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_maestro">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($preh_maestro_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($preh_maestro_delete->cod_casopreh->Visible) { // cod_casopreh ?>
		<th class="<?php echo $preh_maestro_delete->cod_casopreh->headerCellClass() ?>"><span id="elh_preh_maestro_cod_casopreh" class="preh_maestro_cod_casopreh"><?php echo $preh_maestro_delete->cod_casopreh->caption() ?></span></th>
<?php } ?>
<?php if ($preh_maestro_delete->fecha->Visible) { // fecha ?>
		<th class="<?php echo $preh_maestro_delete->fecha->headerCellClass() ?>"><span id="elh_preh_maestro_fecha" class="preh_maestro_fecha"><?php echo $preh_maestro_delete->fecha->caption() ?></span></th>
<?php } ?>
<?php if ($preh_maestro_delete->tiempo->Visible) { // tiempo ?>
		<th class="<?php echo $preh_maestro_delete->tiempo->headerCellClass() ?>"><span id="elh_preh_maestro_tiempo" class="preh_maestro_tiempo"><?php echo $preh_maestro_delete->tiempo->caption() ?></span></th>
<?php } ?>
<?php if ($preh_maestro_delete->direccion->Visible) { // direccion ?>
		<th class="<?php echo $preh_maestro_delete->direccion->headerCellClass() ?>"><span id="elh_preh_maestro_direccion" class="preh_maestro_direccion"><?php echo $preh_maestro_delete->direccion->caption() ?></span></th>
<?php } ?>
<?php if ($preh_maestro_delete->incidente->Visible) { // incidente ?>
		<th class="<?php echo $preh_maestro_delete->incidente->headerCellClass() ?>"><span id="elh_preh_maestro_incidente" class="preh_maestro_incidente"><?php echo $preh_maestro_delete->incidente->caption() ?></span></th>
<?php } ?>
<?php if ($preh_maestro_delete->prioridad->Visible) { // prioridad ?>
		<th class="<?php echo $preh_maestro_delete->prioridad->headerCellClass() ?>"><span id="elh_preh_maestro_prioridad" class="preh_maestro_prioridad"><?php echo $preh_maestro_delete->prioridad->caption() ?></span></th>
<?php } ?>
<?php if ($preh_maestro_delete->estado->Visible) { // estado ?>
		<th class="<?php echo $preh_maestro_delete->estado->headerCellClass() ?>"><span id="elh_preh_maestro_estado" class="preh_maestro_estado"><?php echo $preh_maestro_delete->estado->caption() ?></span></th>
<?php } ?>
<?php if ($preh_maestro_delete->caso_multiple->Visible) { // caso_multiple ?>
		<th class="<?php echo $preh_maestro_delete->caso_multiple->headerCellClass() ?>"><span id="elh_preh_maestro_caso_multiple" class="preh_maestro_caso_multiple"><?php echo $preh_maestro_delete->caso_multiple->caption() ?></span></th>
<?php } ?>
<?php if ($preh_maestro_delete->paciente->Visible) { // paciente ?>
		<th class="<?php echo $preh_maestro_delete->paciente->headerCellClass() ?>"><span id="elh_preh_maestro_paciente" class="preh_maestro_paciente"><?php echo $preh_maestro_delete->paciente->caption() ?></span></th>
<?php } ?>
<?php if ($preh_maestro_delete->hospital_destino->Visible) { // hospital_destino ?>
		<th class="<?php echo $preh_maestro_delete->hospital_destino->headerCellClass() ?>"><span id="elh_preh_maestro_hospital_destino" class="preh_maestro_hospital_destino"><?php echo $preh_maestro_delete->hospital_destino->caption() ?></span></th>
<?php } ?>
<?php if ($preh_maestro_delete->nombre_medico->Visible) { // nombre_medico ?>
		<th class="<?php echo $preh_maestro_delete->nombre_medico->headerCellClass() ?>"><span id="elh_preh_maestro_nombre_medico" class="preh_maestro_nombre_medico"><?php echo $preh_maestro_delete->nombre_medico->caption() ?></span></th>
<?php } ?>
<?php if ($preh_maestro_delete->telefono->Visible) { // telefono ?>
		<th class="<?php echo $preh_maestro_delete->telefono->headerCellClass() ?>"><span id="elh_preh_maestro_telefono" class="preh_maestro_telefono"><?php echo $preh_maestro_delete->telefono->caption() ?></span></th>
<?php } ?>
<?php if ($preh_maestro_delete->nombre_reporta->Visible) { // nombre_reporta ?>
		<th class="<?php echo $preh_maestro_delete->nombre_reporta->headerCellClass() ?>"><span id="elh_preh_maestro_nombre_reporta" class="preh_maestro_nombre_reporta"><?php echo $preh_maestro_delete->nombre_reporta->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$preh_maestro_delete->RecordCount = 0;
$i = 0;
while (!$preh_maestro_delete->Recordset->EOF) {
	$preh_maestro_delete->RecordCount++;
	$preh_maestro_delete->RowCount++;

	// Set row properties
	$preh_maestro->resetAttributes();
	$preh_maestro->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$preh_maestro_delete->loadRowValues($preh_maestro_delete->Recordset);

	// Render row
	$preh_maestro_delete->renderRow();
?>
	<tr <?php echo $preh_maestro->rowAttributes() ?>>
<?php if ($preh_maestro_delete->cod_casopreh->Visible) { // cod_casopreh ?>
		<td <?php echo $preh_maestro_delete->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_delete->RowCount ?>_preh_maestro_cod_casopreh" class="preh_maestro_cod_casopreh">
<span<?php echo $preh_maestro_delete->cod_casopreh->viewAttributes() ?>><?php if (!EmptyString($preh_maestro_delete->cod_casopreh->TooltipValue) && $preh_maestro_delete->cod_casopreh->linkAttributes() != "") { ?>
<a<?php echo $preh_maestro_delete->cod_casopreh->linkAttributes() ?>><?php echo $preh_maestro_delete->cod_casopreh->getViewValue() ?></a>
<?php } else { ?>
<?php echo $preh_maestro_delete->cod_casopreh->getViewValue() ?>
<?php } ?>
<span id="tt_preh_maestro_x_cod_casopreh" class="d-none">
<?php echo $preh_maestro_delete->cod_casopreh->TooltipValue ?>
</span></span>
</span>
</td>
<?php } ?>
<?php if ($preh_maestro_delete->fecha->Visible) { // fecha ?>
		<td <?php echo $preh_maestro_delete->fecha->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_delete->RowCount ?>_preh_maestro_fecha" class="preh_maestro_fecha">
<span<?php echo $preh_maestro_delete->fecha->viewAttributes() ?>><?php echo $preh_maestro_delete->fecha->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_maestro_delete->tiempo->Visible) { // tiempo ?>
		<td <?php echo $preh_maestro_delete->tiempo->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_delete->RowCount ?>_preh_maestro_tiempo" class="preh_maestro_tiempo">
<span<?php echo $preh_maestro_delete->tiempo->viewAttributes() ?>><?php
echo "<i class='far fa-clock'></i> ".CurrentPage()->tiempo->CurrentValue. " MIN";
?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_maestro_delete->direccion->Visible) { // direccion ?>
		<td <?php echo $preh_maestro_delete->direccion->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_delete->RowCount ?>_preh_maestro_direccion" class="preh_maestro_direccion">
<span<?php echo $preh_maestro_delete->direccion->viewAttributes() ?>><?php echo $preh_maestro_delete->direccion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_maestro_delete->incidente->Visible) { // incidente ?>
		<td <?php echo $preh_maestro_delete->incidente->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_delete->RowCount ?>_preh_maestro_incidente" class="preh_maestro_incidente">
<span<?php echo $preh_maestro_delete->incidente->viewAttributes() ?>><?php echo $preh_maestro_delete->incidente->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_maestro_delete->prioridad->Visible) { // prioridad ?>
		<td <?php echo $preh_maestro_delete->prioridad->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_delete->RowCount ?>_preh_maestro_prioridad" class="preh_maestro_prioridad">
<span<?php echo $preh_maestro_delete->prioridad->viewAttributes() ?>><?php echo $preh_maestro_delete->prioridad->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_maestro_delete->estado->Visible) { // estado ?>
		<td <?php echo $preh_maestro_delete->estado->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_delete->RowCount ?>_preh_maestro_estado" class="preh_maestro_estado">
<span<?php echo $preh_maestro_delete->estado->viewAttributes() ?>><?php
$amb = ExecuteScalar("SELECT preh_servicio_ambulancia.cod_ambulancia FROM preh_maestro INNER JOIN preh_servicio_ambulancia ON preh_maestro.cod_casopreh =  preh_servicio_ambulancia.id_maestrointerh WHERE preh_maestro.cod_casopreh = ".CurrentPage()->cod_casopreh->CurrentValue);
if ( $amb <> '')
echo "<small><li class = 'badge bg-info'> <i class='fas fa-check'></i> Asignada ".$amb."</li></small>";
?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_maestro_delete->caso_multiple->Visible) { // caso_multiple ?>
		<td <?php echo $preh_maestro_delete->caso_multiple->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_delete->RowCount ?>_preh_maestro_caso_multiple" class="preh_maestro_caso_multiple">
<span<?php echo $preh_maestro_delete->caso_multiple->viewAttributes() ?>><?php echo $preh_maestro_delete->caso_multiple->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_maestro_delete->paciente->Visible) { // paciente ?>
		<td <?php echo $preh_maestro_delete->paciente->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_delete->RowCount ?>_preh_maestro_paciente" class="preh_maestro_paciente">
<span<?php echo $preh_maestro_delete->paciente->viewAttributes() ?>><?php
$pte = ExecuteScalar("SELECT concat_ws(' ','ID',num_doc,nombre1,nombre2,apellido1,apellido2) as pte FROM pacientegeneral WHERE prehospitalario = '1' and cod_pacienteinterh = ".CurrentPage()->cod_casopreh->CurrentValue);
echo $pte;
?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_maestro_delete->hospital_destino->Visible) { // hospital_destino ?>
		<td <?php echo $preh_maestro_delete->hospital_destino->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_delete->RowCount ?>_preh_maestro_hospital_destino" class="preh_maestro_hospital_destino">
<span<?php echo $preh_maestro_delete->hospital_destino->viewAttributes() ?>><?php echo $preh_maestro_delete->hospital_destino->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_maestro_delete->nombre_medico->Visible) { // nombre_medico ?>
		<td <?php echo $preh_maestro_delete->nombre_medico->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_delete->RowCount ?>_preh_maestro_nombre_medico" class="preh_maestro_nombre_medico">
<span<?php echo $preh_maestro_delete->nombre_medico->viewAttributes() ?>><?php echo $preh_maestro_delete->nombre_medico->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_maestro_delete->telefono->Visible) { // telefono ?>
		<td <?php echo $preh_maestro_delete->telefono->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_delete->RowCount ?>_preh_maestro_telefono" class="preh_maestro_telefono">
<span<?php echo $preh_maestro_delete->telefono->viewAttributes() ?>><?php echo $preh_maestro_delete->telefono->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_maestro_delete->nombre_reporta->Visible) { // nombre_reporta ?>
		<td <?php echo $preh_maestro_delete->nombre_reporta->cellAttributes() ?>>
<span id="el<?php echo $preh_maestro_delete->RowCount ?>_preh_maestro_nombre_reporta" class="preh_maestro_nombre_reporta">
<span<?php echo $preh_maestro_delete->nombre_reporta->viewAttributes() ?>><?php echo $preh_maestro_delete->nombre_reporta->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$preh_maestro_delete->Recordset->moveNext();
}
$preh_maestro_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $preh_maestro_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$preh_maestro_delete->showPageFooter();
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
$preh_maestro_delete->terminate();
?>