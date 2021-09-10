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
$interh_maestro_delete = new interh_maestro_delete();

// Run the page
$interh_maestro_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_maestro_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var finterh_maestrodelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	finterh_maestrodelete = currentForm = new ew.Form("finterh_maestrodelete", "delete");
	loadjs.done("finterh_maestrodelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $interh_maestro_delete->showPageHeader(); ?>
<?php
$interh_maestro_delete->showMessage();
?>
<form name="finterh_maestrodelete" id="finterh_maestrodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="interh_maestro">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($interh_maestro_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($interh_maestro_delete->cod_casointerh->Visible) { // cod_casointerh ?>
		<th class="<?php echo $interh_maestro_delete->cod_casointerh->headerCellClass() ?>"><span id="elh_interh_maestro_cod_casointerh" class="interh_maestro_cod_casointerh"><?php echo $interh_maestro_delete->cod_casointerh->caption() ?></span></th>
<?php } ?>
<?php if ($interh_maestro_delete->fechahorainterh->Visible) { // fechahorainterh ?>
		<th class="<?php echo $interh_maestro_delete->fechahorainterh->headerCellClass() ?>"><span id="elh_interh_maestro_fechahorainterh" class="interh_maestro_fechahorainterh"><?php echo $interh_maestro_delete->fechahorainterh->caption() ?></span></th>
<?php } ?>
<?php if ($interh_maestro_delete->tiempo->Visible) { // tiempo ?>
		<th class="<?php echo $interh_maestro_delete->tiempo->headerCellClass() ?>"><span id="elh_interh_maestro_tiempo" class="interh_maestro_tiempo"><?php echo $interh_maestro_delete->tiempo->caption() ?></span></th>
<?php } ?>
<?php if ($interh_maestro_delete->hospital_origneinterh->Visible) { // hospital_origneinterh ?>
		<th class="<?php echo $interh_maestro_delete->hospital_origneinterh->headerCellClass() ?>"><span id="elh_interh_maestro_hospital_origneinterh" class="interh_maestro_hospital_origneinterh"><?php echo $interh_maestro_delete->hospital_origneinterh->caption() ?></span></th>
<?php } ?>
<?php if ($interh_maestro_delete->motivo_atencioninteh->Visible) { // motivo_atencioninteh ?>
		<th class="<?php echo $interh_maestro_delete->motivo_atencioninteh->headerCellClass() ?>"><span id="elh_interh_maestro_motivo_atencioninteh" class="interh_maestro_motivo_atencioninteh"><?php echo $interh_maestro_delete->motivo_atencioninteh->caption() ?></span></th>
<?php } ?>
<?php if ($interh_maestro_delete->accioninterh->Visible) { // accioninterh ?>
		<th class="<?php echo $interh_maestro_delete->accioninterh->headerCellClass() ?>"><span id="elh_interh_maestro_accioninterh" class="interh_maestro_accioninterh"><?php echo $interh_maestro_delete->accioninterh->caption() ?></span></th>
<?php } ?>
<?php if ($interh_maestro_delete->prioridadinterh->Visible) { // prioridadinterh ?>
		<th class="<?php echo $interh_maestro_delete->prioridadinterh->headerCellClass() ?>"><span id="elh_interh_maestro_prioridadinterh" class="interh_maestro_prioridadinterh"><?php echo $interh_maestro_delete->prioridadinterh->caption() ?></span></th>
<?php } ?>
<?php if ($interh_maestro_delete->estadointerh->Visible) { // estadointerh ?>
		<th class="<?php echo $interh_maestro_delete->estadointerh->headerCellClass() ?>"><span id="elh_interh_maestro_estadointerh" class="interh_maestro_estadointerh"><?php echo $interh_maestro_delete->estadointerh->caption() ?></span></th>
<?php } ?>
<?php if ($interh_maestro_delete->ambulancia->Visible) { // ambulancia ?>
		<th class="<?php echo $interh_maestro_delete->ambulancia->headerCellClass() ?>"><span id="elh_interh_maestro_ambulancia" class="interh_maestro_ambulancia"><?php echo $interh_maestro_delete->ambulancia->caption() ?></span></th>
<?php } ?>
<?php if ($interh_maestro_delete->paciente->Visible) { // paciente ?>
		<th class="<?php echo $interh_maestro_delete->paciente->headerCellClass() ?>"><span id="elh_interh_maestro_paciente" class="interh_maestro_paciente"><?php echo $interh_maestro_delete->paciente->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$interh_maestro_delete->RecordCount = 0;
$i = 0;
while (!$interh_maestro_delete->Recordset->EOF) {
	$interh_maestro_delete->RecordCount++;
	$interh_maestro_delete->RowCount++;

	// Set row properties
	$interh_maestro->resetAttributes();
	$interh_maestro->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$interh_maestro_delete->loadRowValues($interh_maestro_delete->Recordset);

	// Render row
	$interh_maestro_delete->renderRow();
?>
	<tr <?php echo $interh_maestro->rowAttributes() ?>>
<?php if ($interh_maestro_delete->cod_casointerh->Visible) { // cod_casointerh ?>
		<td <?php echo $interh_maestro_delete->cod_casointerh->cellAttributes() ?>>
<span id="el<?php echo $interh_maestro_delete->RowCount ?>_interh_maestro_cod_casointerh" class="interh_maestro_cod_casointerh">
<span<?php echo $interh_maestro_delete->cod_casointerh->viewAttributes() ?>><?php echo $interh_maestro_delete->cod_casointerh->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($interh_maestro_delete->fechahorainterh->Visible) { // fechahorainterh ?>
		<td <?php echo $interh_maestro_delete->fechahorainterh->cellAttributes() ?>>
<span id="el<?php echo $interh_maestro_delete->RowCount ?>_interh_maestro_fechahorainterh" class="interh_maestro_fechahorainterh">
<span<?php echo $interh_maestro_delete->fechahorainterh->viewAttributes() ?>><?php echo $interh_maestro_delete->fechahorainterh->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($interh_maestro_delete->tiempo->Visible) { // tiempo ?>
		<td <?php echo $interh_maestro_delete->tiempo->cellAttributes() ?>>
<span id="el<?php echo $interh_maestro_delete->RowCount ?>_interh_maestro_tiempo" class="interh_maestro_tiempo">
<span<?php echo $interh_maestro_delete->tiempo->viewAttributes() ?>><?php
echo "<i class='far fa-clock'></i> ".CurrentPage()->tiempo->CurrentValue. " MIN";
?></span>
</span>
</td>
<?php } ?>
<?php if ($interh_maestro_delete->hospital_origneinterh->Visible) { // hospital_origneinterh ?>
		<td <?php echo $interh_maestro_delete->hospital_origneinterh->cellAttributes() ?>>
<span id="el<?php echo $interh_maestro_delete->RowCount ?>_interh_maestro_hospital_origneinterh" class="interh_maestro_hospital_origneinterh">
<span<?php echo $interh_maestro_delete->hospital_origneinterh->viewAttributes() ?>><?php echo $interh_maestro_delete->hospital_origneinterh->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($interh_maestro_delete->motivo_atencioninteh->Visible) { // motivo_atencioninteh ?>
		<td <?php echo $interh_maestro_delete->motivo_atencioninteh->cellAttributes() ?>>
<span id="el<?php echo $interh_maestro_delete->RowCount ?>_interh_maestro_motivo_atencioninteh" class="interh_maestro_motivo_atencioninteh">
<span<?php echo $interh_maestro_delete->motivo_atencioninteh->viewAttributes() ?>><?php echo $interh_maestro_delete->motivo_atencioninteh->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($interh_maestro_delete->accioninterh->Visible) { // accioninterh ?>
		<td <?php echo $interh_maestro_delete->accioninterh->cellAttributes() ?>>
<span id="el<?php echo $interh_maestro_delete->RowCount ?>_interh_maestro_accioninterh" class="interh_maestro_accioninterh">
<span<?php echo $interh_maestro_delete->accioninterh->viewAttributes() ?>><?php echo $interh_maestro_delete->accioninterh->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($interh_maestro_delete->prioridadinterh->Visible) { // prioridadinterh ?>
		<td <?php echo $interh_maestro_delete->prioridadinterh->cellAttributes() ?>>
<span id="el<?php echo $interh_maestro_delete->RowCount ?>_interh_maestro_prioridadinterh" class="interh_maestro_prioridadinterh">
<span<?php echo $interh_maestro_delete->prioridadinterh->viewAttributes() ?>><?php
if(CurrentPage()->prioridadinterh->CurrentValue == 1)
echo "<i class='fas fa-caret-up'></i> ".CurrentPage()->prioridadinterh->CurrentValue. "High";
elseif (CurrentPage()->prioridadinterh->CurrentValue == 2)
echo "<i class='fas fa-caret-left'></i> ".CurrentPage()->prioridadinterh->CurrentValue. " Medium";
else
echo "<i class='fas fa-caret-down'></i> ".CurrentPage()->prioridadinterh->CurrentValue. " Low";
?></span>
</span>
</td>
<?php } ?>
<?php if ($interh_maestro_delete->estadointerh->Visible) { // estadointerh ?>
		<td <?php echo $interh_maestro_delete->estadointerh->cellAttributes() ?>>
<span id="el<?php echo $interh_maestro_delete->RowCount ?>_interh_maestro_estadointerh" class="interh_maestro_estadointerh">
<span<?php echo $interh_maestro_delete->estadointerh->viewAttributes() ?>><?php
$h_asigna = ExecuteScalar("SELECT hora_asigna FROM interh_maestro INNER JOIN servicio_ambulancia ON interh_maestro.cod_casointerh = servicio_ambulancia.id_maestrointerh WHERE interh_maestro.cod_casointerh =".CurrentPage()->cod_casointerh->CurrentValue);
$h_llegada = ExecuteScalar("SELECT hora_llegada FROM interh_maestro INNER JOIN servicio_ambulancia ON interh_maestro.cod_casointerh = servicio_ambulancia.id_maestrointerh WHERE interh_maestro.cod_casointerh = ".CurrentPage()->cod_casointerh->CurrentValue);
$h_hospital = ExecuteScalar("SELECT hora_destino FROM interh_maestro INNER JOIN servicio_ambulancia ON interh_maestro.cod_casointerh = servicio_ambulancia.id_maestrointerh WHERE interh_maestro.cod_casointerh = ".CurrentPage()->cod_casointerh->CurrentValue);
if ( $h_asigna <> '')
echo "<small><li class = 'badge bg-info'> <i class='fas fa-check'></i> Asignada </li></small>";
if ( $h_llegada <> '')
echo "<small><li class = 'badge bg-secondary'> <i class='fas fa-check'></i> Destino </li></small>";
if ( $h_hospital <> '')
echo "<small><li class = 'badge bg-success'> <i class='fas fa-check'></i> Hospital </li></small>";
?></span>
</span>
</td>
<?php } ?>
<?php if ($interh_maestro_delete->ambulancia->Visible) { // ambulancia ?>
		<td <?php echo $interh_maestro_delete->ambulancia->cellAttributes() ?>>
<span id="el<?php echo $interh_maestro_delete->RowCount ?>_interh_maestro_ambulancia" class="interh_maestro_ambulancia">
<span<?php echo $interh_maestro_delete->ambulancia->viewAttributes() ?>><?php
$ambu = ExecuteScalar("SELECT servicio_ambulancia.cod_ambulancia FROM servicio_ambulancia WHERE id_maestrointerh =".CurrentPage()->cod_casointerh->CurrentValue);
echo $ambu;
?></span>
</span>
</td>
<?php } ?>
<?php if ($interh_maestro_delete->paciente->Visible) { // paciente ?>
		<td <?php echo $interh_maestro_delete->paciente->cellAttributes() ?>>
<span id="el<?php echo $interh_maestro_delete->RowCount ?>_interh_maestro_paciente" class="interh_maestro_paciente">
<span<?php echo $interh_maestro_delete->paciente->viewAttributes() ?>><?php
$genero = ExecuteScalar("SELECT edad FROM pacientegeneral INNER JOIN interh_maestro ON interh_maestro.cod_casointerh = pacientegeneral.cod_pacienteinterh WHERE interh_maestro.cod_casointerh = ".CurrentPage()->cod_casointerh->CurrentValue);
$cod_ide = ExecuteScalar("SELECT num_doc FROM pacientegeneral INNER JOIN interh_maestro ON interh_maestro.cod_casointerh = pacientegeneral.cod_pacienteinterh WHERE interh_maestro.cod_casointerh = ".CurrentPage()->cod_casointerh->CurrentValue);
if ( $genero <> '' or $cod_ide <> '')
 echo "<i class='icofont-check-circled icofont-3x'></i> </br>"."Registrado";
?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$interh_maestro_delete->Recordset->moveNext();
}
$interh_maestro_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $interh_maestro_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$interh_maestro_delete->showPageFooter();
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
$interh_maestro_delete->terminate();
?>