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
$pacientegeneral_delete = new pacientegeneral_delete();

// Run the page
$pacientegeneral_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pacientegeneral_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpacientegeneraldelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpacientegeneraldelete = currentForm = new ew.Form("fpacientegeneraldelete", "delete");
	loadjs.done("fpacientegeneraldelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pacientegeneral_delete->showPageHeader(); ?>
<?php
$pacientegeneral_delete->showMessage();
?>
<form name="fpacientegeneraldelete" id="fpacientegeneraldelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pacientegeneral">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pacientegeneral_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pacientegeneral_delete->cod_casointerh->Visible) { // cod_casointerh ?>
		<th class="<?php echo $pacientegeneral_delete->cod_casointerh->headerCellClass() ?>"><span id="elh_pacientegeneral_cod_casointerh" class="pacientegeneral_cod_casointerh"><?php echo $pacientegeneral_delete->cod_casointerh->caption() ?></span></th>
<?php } ?>
<?php if ($pacientegeneral_delete->id_paciente->Visible) { // id_paciente ?>
		<th class="<?php echo $pacientegeneral_delete->id_paciente->headerCellClass() ?>"><span id="elh_pacientegeneral_id_paciente" class="pacientegeneral_id_paciente"><?php echo $pacientegeneral_delete->id_paciente->caption() ?></span></th>
<?php } ?>
<?php if ($pacientegeneral_delete->expendiente->Visible) { // expendiente ?>
		<th class="<?php echo $pacientegeneral_delete->expendiente->headerCellClass() ?>"><span id="elh_pacientegeneral_expendiente" class="pacientegeneral_expendiente"><?php echo $pacientegeneral_delete->expendiente->caption() ?></span></th>
<?php } ?>
<?php if ($pacientegeneral_delete->tipo_doc->Visible) { // tipo_doc ?>
		<th class="<?php echo $pacientegeneral_delete->tipo_doc->headerCellClass() ?>"><span id="elh_pacientegeneral_tipo_doc" class="pacientegeneral_tipo_doc"><?php echo $pacientegeneral_delete->tipo_doc->caption() ?></span></th>
<?php } ?>
<?php if ($pacientegeneral_delete->num_doc->Visible) { // num_doc ?>
		<th class="<?php echo $pacientegeneral_delete->num_doc->headerCellClass() ?>"><span id="elh_pacientegeneral_num_doc" class="pacientegeneral_num_doc"><?php echo $pacientegeneral_delete->num_doc->caption() ?></span></th>
<?php } ?>
<?php if ($pacientegeneral_delete->nombre1->Visible) { // nombre1 ?>
		<th class="<?php echo $pacientegeneral_delete->nombre1->headerCellClass() ?>"><span id="elh_pacientegeneral_nombre1" class="pacientegeneral_nombre1"><?php echo $pacientegeneral_delete->nombre1->caption() ?></span></th>
<?php } ?>
<?php if ($pacientegeneral_delete->nombre2->Visible) { // nombre2 ?>
		<th class="<?php echo $pacientegeneral_delete->nombre2->headerCellClass() ?>"><span id="elh_pacientegeneral_nombre2" class="pacientegeneral_nombre2"><?php echo $pacientegeneral_delete->nombre2->caption() ?></span></th>
<?php } ?>
<?php if ($pacientegeneral_delete->apellido1->Visible) { // apellido1 ?>
		<th class="<?php echo $pacientegeneral_delete->apellido1->headerCellClass() ?>"><span id="elh_pacientegeneral_apellido1" class="pacientegeneral_apellido1"><?php echo $pacientegeneral_delete->apellido1->caption() ?></span></th>
<?php } ?>
<?php if ($pacientegeneral_delete->apellido2->Visible) { // apellido2 ?>
		<th class="<?php echo $pacientegeneral_delete->apellido2->headerCellClass() ?>"><span id="elh_pacientegeneral_apellido2" class="pacientegeneral_apellido2"><?php echo $pacientegeneral_delete->apellido2->caption() ?></span></th>
<?php } ?>
<?php if ($pacientegeneral_delete->genero->Visible) { // genero ?>
		<th class="<?php echo $pacientegeneral_delete->genero->headerCellClass() ?>"><span id="elh_pacientegeneral_genero" class="pacientegeneral_genero"><?php echo $pacientegeneral_delete->genero->caption() ?></span></th>
<?php } ?>
<?php if ($pacientegeneral_delete->edad->Visible) { // edad ?>
		<th class="<?php echo $pacientegeneral_delete->edad->headerCellClass() ?>"><span id="elh_pacientegeneral_edad" class="pacientegeneral_edad"><?php echo $pacientegeneral_delete->edad->caption() ?></span></th>
<?php } ?>
<?php if ($pacientegeneral_delete->fecha_nacido->Visible) { // fecha_nacido ?>
		<th class="<?php echo $pacientegeneral_delete->fecha_nacido->headerCellClass() ?>"><span id="elh_pacientegeneral_fecha_nacido" class="pacientegeneral_fecha_nacido"><?php echo $pacientegeneral_delete->fecha_nacido->caption() ?></span></th>
<?php } ?>
<?php if ($pacientegeneral_delete->cod_edad->Visible) { // cod_edad ?>
		<th class="<?php echo $pacientegeneral_delete->cod_edad->headerCellClass() ?>"><span id="elh_pacientegeneral_cod_edad" class="pacientegeneral_cod_edad"><?php echo $pacientegeneral_delete->cod_edad->caption() ?></span></th>
<?php } ?>
<?php if ($pacientegeneral_delete->telefono->Visible) { // telefono ?>
		<th class="<?php echo $pacientegeneral_delete->telefono->headerCellClass() ?>"><span id="elh_pacientegeneral_telefono" class="pacientegeneral_telefono"><?php echo $pacientegeneral_delete->telefono->caption() ?></span></th>
<?php } ?>
<?php if ($pacientegeneral_delete->celular->Visible) { // celular ?>
		<th class="<?php echo $pacientegeneral_delete->celular->headerCellClass() ?>"><span id="elh_pacientegeneral_celular" class="pacientegeneral_celular"><?php echo $pacientegeneral_delete->celular->caption() ?></span></th>
<?php } ?>
<?php if ($pacientegeneral_delete->direccion->Visible) { // direccion ?>
		<th class="<?php echo $pacientegeneral_delete->direccion->headerCellClass() ?>"><span id="elh_pacientegeneral_direccion" class="pacientegeneral_direccion"><?php echo $pacientegeneral_delete->direccion->caption() ?></span></th>
<?php } ?>
<?php if ($pacientegeneral_delete->aseguradro->Visible) { // aseguradro ?>
		<th class="<?php echo $pacientegeneral_delete->aseguradro->headerCellClass() ?>"><span id="elh_pacientegeneral_aseguradro" class="pacientegeneral_aseguradro"><?php echo $pacientegeneral_delete->aseguradro->caption() ?></span></th>
<?php } ?>
<?php if ($pacientegeneral_delete->nss->Visible) { // nss ?>
		<th class="<?php echo $pacientegeneral_delete->nss->headerCellClass() ?>"><span id="elh_pacientegeneral_nss" class="pacientegeneral_nss"><?php echo $pacientegeneral_delete->nss->caption() ?></span></th>
<?php } ?>
<?php if ($pacientegeneral_delete->prehospitalario->Visible) { // prehospitalario ?>
		<th class="<?php echo $pacientegeneral_delete->prehospitalario->headerCellClass() ?>"><span id="elh_pacientegeneral_prehospitalario" class="pacientegeneral_prehospitalario"><?php echo $pacientegeneral_delete->prehospitalario->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pacientegeneral_delete->RecordCount = 0;
$i = 0;
while (!$pacientegeneral_delete->Recordset->EOF) {
	$pacientegeneral_delete->RecordCount++;
	$pacientegeneral_delete->RowCount++;

	// Set row properties
	$pacientegeneral->resetAttributes();
	$pacientegeneral->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pacientegeneral_delete->loadRowValues($pacientegeneral_delete->Recordset);

	// Render row
	$pacientegeneral_delete->renderRow();
?>
	<tr <?php echo $pacientegeneral->rowAttributes() ?>>
<?php if ($pacientegeneral_delete->cod_casointerh->Visible) { // cod_casointerh ?>
		<td <?php echo $pacientegeneral_delete->cod_casointerh->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_delete->RowCount ?>_pacientegeneral_cod_casointerh" class="pacientegeneral_cod_casointerh">
<span<?php echo $pacientegeneral_delete->cod_casointerh->viewAttributes() ?>><?php echo $pacientegeneral_delete->cod_casointerh->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pacientegeneral_delete->id_paciente->Visible) { // id_paciente ?>
		<td <?php echo $pacientegeneral_delete->id_paciente->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_delete->RowCount ?>_pacientegeneral_id_paciente" class="pacientegeneral_id_paciente">
<span<?php echo $pacientegeneral_delete->id_paciente->viewAttributes() ?>><?php echo $pacientegeneral_delete->id_paciente->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pacientegeneral_delete->expendiente->Visible) { // expendiente ?>
		<td <?php echo $pacientegeneral_delete->expendiente->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_delete->RowCount ?>_pacientegeneral_expendiente" class="pacientegeneral_expendiente">
<span<?php echo $pacientegeneral_delete->expendiente->viewAttributes() ?>><?php echo $pacientegeneral_delete->expendiente->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pacientegeneral_delete->tipo_doc->Visible) { // tipo_doc ?>
		<td <?php echo $pacientegeneral_delete->tipo_doc->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_delete->RowCount ?>_pacientegeneral_tipo_doc" class="pacientegeneral_tipo_doc">
<span<?php echo $pacientegeneral_delete->tipo_doc->viewAttributes() ?>><?php echo $pacientegeneral_delete->tipo_doc->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pacientegeneral_delete->num_doc->Visible) { // num_doc ?>
		<td <?php echo $pacientegeneral_delete->num_doc->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_delete->RowCount ?>_pacientegeneral_num_doc" class="pacientegeneral_num_doc">
<span<?php echo $pacientegeneral_delete->num_doc->viewAttributes() ?>><?php echo $pacientegeneral_delete->num_doc->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pacientegeneral_delete->nombre1->Visible) { // nombre1 ?>
		<td <?php echo $pacientegeneral_delete->nombre1->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_delete->RowCount ?>_pacientegeneral_nombre1" class="pacientegeneral_nombre1">
<span<?php echo $pacientegeneral_delete->nombre1->viewAttributes() ?>><?php echo $pacientegeneral_delete->nombre1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pacientegeneral_delete->nombre2->Visible) { // nombre2 ?>
		<td <?php echo $pacientegeneral_delete->nombre2->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_delete->RowCount ?>_pacientegeneral_nombre2" class="pacientegeneral_nombre2">
<span<?php echo $pacientegeneral_delete->nombre2->viewAttributes() ?>><?php echo $pacientegeneral_delete->nombre2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pacientegeneral_delete->apellido1->Visible) { // apellido1 ?>
		<td <?php echo $pacientegeneral_delete->apellido1->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_delete->RowCount ?>_pacientegeneral_apellido1" class="pacientegeneral_apellido1">
<span<?php echo $pacientegeneral_delete->apellido1->viewAttributes() ?>><?php echo $pacientegeneral_delete->apellido1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pacientegeneral_delete->apellido2->Visible) { // apellido2 ?>
		<td <?php echo $pacientegeneral_delete->apellido2->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_delete->RowCount ?>_pacientegeneral_apellido2" class="pacientegeneral_apellido2">
<span<?php echo $pacientegeneral_delete->apellido2->viewAttributes() ?>><?php echo $pacientegeneral_delete->apellido2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pacientegeneral_delete->genero->Visible) { // genero ?>
		<td <?php echo $pacientegeneral_delete->genero->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_delete->RowCount ?>_pacientegeneral_genero" class="pacientegeneral_genero">
<span<?php echo $pacientegeneral_delete->genero->viewAttributes() ?>><?php echo $pacientegeneral_delete->genero->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pacientegeneral_delete->edad->Visible) { // edad ?>
		<td <?php echo $pacientegeneral_delete->edad->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_delete->RowCount ?>_pacientegeneral_edad" class="pacientegeneral_edad">
<span<?php echo $pacientegeneral_delete->edad->viewAttributes() ?>><?php echo $pacientegeneral_delete->edad->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pacientegeneral_delete->fecha_nacido->Visible) { // fecha_nacido ?>
		<td <?php echo $pacientegeneral_delete->fecha_nacido->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_delete->RowCount ?>_pacientegeneral_fecha_nacido" class="pacientegeneral_fecha_nacido">
<span<?php echo $pacientegeneral_delete->fecha_nacido->viewAttributes() ?>><?php echo $pacientegeneral_delete->fecha_nacido->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pacientegeneral_delete->cod_edad->Visible) { // cod_edad ?>
		<td <?php echo $pacientegeneral_delete->cod_edad->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_delete->RowCount ?>_pacientegeneral_cod_edad" class="pacientegeneral_cod_edad">
<span<?php echo $pacientegeneral_delete->cod_edad->viewAttributes() ?>><?php echo $pacientegeneral_delete->cod_edad->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pacientegeneral_delete->telefono->Visible) { // telefono ?>
		<td <?php echo $pacientegeneral_delete->telefono->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_delete->RowCount ?>_pacientegeneral_telefono" class="pacientegeneral_telefono">
<span<?php echo $pacientegeneral_delete->telefono->viewAttributes() ?>><?php echo $pacientegeneral_delete->telefono->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pacientegeneral_delete->celular->Visible) { // celular ?>
		<td <?php echo $pacientegeneral_delete->celular->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_delete->RowCount ?>_pacientegeneral_celular" class="pacientegeneral_celular">
<span<?php echo $pacientegeneral_delete->celular->viewAttributes() ?>><?php echo $pacientegeneral_delete->celular->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pacientegeneral_delete->direccion->Visible) { // direccion ?>
		<td <?php echo $pacientegeneral_delete->direccion->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_delete->RowCount ?>_pacientegeneral_direccion" class="pacientegeneral_direccion">
<span<?php echo $pacientegeneral_delete->direccion->viewAttributes() ?>><?php echo $pacientegeneral_delete->direccion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pacientegeneral_delete->aseguradro->Visible) { // aseguradro ?>
		<td <?php echo $pacientegeneral_delete->aseguradro->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_delete->RowCount ?>_pacientegeneral_aseguradro" class="pacientegeneral_aseguradro">
<span<?php echo $pacientegeneral_delete->aseguradro->viewAttributes() ?>><?php echo $pacientegeneral_delete->aseguradro->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pacientegeneral_delete->nss->Visible) { // nss ?>
		<td <?php echo $pacientegeneral_delete->nss->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_delete->RowCount ?>_pacientegeneral_nss" class="pacientegeneral_nss">
<span<?php echo $pacientegeneral_delete->nss->viewAttributes() ?>><?php echo $pacientegeneral_delete->nss->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pacientegeneral_delete->prehospitalario->Visible) { // prehospitalario ?>
		<td <?php echo $pacientegeneral_delete->prehospitalario->cellAttributes() ?>>
<span id="el<?php echo $pacientegeneral_delete->RowCount ?>_pacientegeneral_prehospitalario" class="pacientegeneral_prehospitalario">
<span<?php echo $pacientegeneral_delete->prehospitalario->viewAttributes() ?>><?php echo $pacientegeneral_delete->prehospitalario->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pacientegeneral_delete->Recordset->moveNext();
}
$pacientegeneral_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pacientegeneral_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pacientegeneral_delete->showPageFooter();
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
$pacientegeneral_delete->terminate();
?>