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
$pacientegeneral_view = new pacientegeneral_view();

// Run the page
$pacientegeneral_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pacientegeneral_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pacientegeneral_view->isExport()) { ?>
<script>
var fpacientegeneralview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpacientegeneralview = currentForm = new ew.Form("fpacientegeneralview", "view");
	loadjs.done("fpacientegeneralview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pacientegeneral_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pacientegeneral_view->ExportOptions->render("body") ?>
<?php $pacientegeneral_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pacientegeneral_view->showPageHeader(); ?>
<?php
$pacientegeneral_view->showMessage();
?>
<form name="fpacientegeneralview" id="fpacientegeneralview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pacientegeneral">
<input type="hidden" name="modal" value="<?php echo (int)$pacientegeneral_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pacientegeneral_view->cod_casointerh->Visible) { // cod_casointerh ?>
	<tr id="r_cod_casointerh">
		<td class="<?php echo $pacientegeneral_view->TableLeftColumnClass ?>"><span id="elh_pacientegeneral_cod_casointerh"><?php echo $pacientegeneral_view->cod_casointerh->caption() ?></span></td>
		<td data-name="cod_casointerh" <?php echo $pacientegeneral_view->cod_casointerh->cellAttributes() ?>>
<span id="el_pacientegeneral_cod_casointerh">
<span<?php echo $pacientegeneral_view->cod_casointerh->viewAttributes() ?>><?php echo $pacientegeneral_view->cod_casointerh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pacientegeneral_view->id_paciente->Visible) { // id_paciente ?>
	<tr id="r_id_paciente">
		<td class="<?php echo $pacientegeneral_view->TableLeftColumnClass ?>"><span id="elh_pacientegeneral_id_paciente"><?php echo $pacientegeneral_view->id_paciente->caption() ?></span></td>
		<td data-name="id_paciente" <?php echo $pacientegeneral_view->id_paciente->cellAttributes() ?>>
<span id="el_pacientegeneral_id_paciente">
<span<?php echo $pacientegeneral_view->id_paciente->viewAttributes() ?>><?php echo $pacientegeneral_view->id_paciente->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pacientegeneral_view->expendiente->Visible) { // expendiente ?>
	<tr id="r_expendiente">
		<td class="<?php echo $pacientegeneral_view->TableLeftColumnClass ?>"><span id="elh_pacientegeneral_expendiente"><?php echo $pacientegeneral_view->expendiente->caption() ?></span></td>
		<td data-name="expendiente" <?php echo $pacientegeneral_view->expendiente->cellAttributes() ?>>
<span id="el_pacientegeneral_expendiente">
<span<?php echo $pacientegeneral_view->expendiente->viewAttributes() ?>><?php echo $pacientegeneral_view->expendiente->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pacientegeneral_view->tipo_doc->Visible) { // tipo_doc ?>
	<tr id="r_tipo_doc">
		<td class="<?php echo $pacientegeneral_view->TableLeftColumnClass ?>"><span id="elh_pacientegeneral_tipo_doc"><?php echo $pacientegeneral_view->tipo_doc->caption() ?></span></td>
		<td data-name="tipo_doc" <?php echo $pacientegeneral_view->tipo_doc->cellAttributes() ?>>
<span id="el_pacientegeneral_tipo_doc">
<span<?php echo $pacientegeneral_view->tipo_doc->viewAttributes() ?>><?php echo $pacientegeneral_view->tipo_doc->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pacientegeneral_view->num_doc->Visible) { // num_doc ?>
	<tr id="r_num_doc">
		<td class="<?php echo $pacientegeneral_view->TableLeftColumnClass ?>"><span id="elh_pacientegeneral_num_doc"><?php echo $pacientegeneral_view->num_doc->caption() ?></span></td>
		<td data-name="num_doc" <?php echo $pacientegeneral_view->num_doc->cellAttributes() ?>>
<span id="el_pacientegeneral_num_doc">
<span<?php echo $pacientegeneral_view->num_doc->viewAttributes() ?>><?php echo $pacientegeneral_view->num_doc->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pacientegeneral_view->nombre1->Visible) { // nombre1 ?>
	<tr id="r_nombre1">
		<td class="<?php echo $pacientegeneral_view->TableLeftColumnClass ?>"><span id="elh_pacientegeneral_nombre1"><?php echo $pacientegeneral_view->nombre1->caption() ?></span></td>
		<td data-name="nombre1" <?php echo $pacientegeneral_view->nombre1->cellAttributes() ?>>
<span id="el_pacientegeneral_nombre1">
<span<?php echo $pacientegeneral_view->nombre1->viewAttributes() ?>><?php echo $pacientegeneral_view->nombre1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pacientegeneral_view->nombre2->Visible) { // nombre2 ?>
	<tr id="r_nombre2">
		<td class="<?php echo $pacientegeneral_view->TableLeftColumnClass ?>"><span id="elh_pacientegeneral_nombre2"><?php echo $pacientegeneral_view->nombre2->caption() ?></span></td>
		<td data-name="nombre2" <?php echo $pacientegeneral_view->nombre2->cellAttributes() ?>>
<span id="el_pacientegeneral_nombre2">
<span<?php echo $pacientegeneral_view->nombre2->viewAttributes() ?>><?php echo $pacientegeneral_view->nombre2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pacientegeneral_view->apellido1->Visible) { // apellido1 ?>
	<tr id="r_apellido1">
		<td class="<?php echo $pacientegeneral_view->TableLeftColumnClass ?>"><span id="elh_pacientegeneral_apellido1"><?php echo $pacientegeneral_view->apellido1->caption() ?></span></td>
		<td data-name="apellido1" <?php echo $pacientegeneral_view->apellido1->cellAttributes() ?>>
<span id="el_pacientegeneral_apellido1">
<span<?php echo $pacientegeneral_view->apellido1->viewAttributes() ?>><?php echo $pacientegeneral_view->apellido1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pacientegeneral_view->apellido2->Visible) { // apellido2 ?>
	<tr id="r_apellido2">
		<td class="<?php echo $pacientegeneral_view->TableLeftColumnClass ?>"><span id="elh_pacientegeneral_apellido2"><?php echo $pacientegeneral_view->apellido2->caption() ?></span></td>
		<td data-name="apellido2" <?php echo $pacientegeneral_view->apellido2->cellAttributes() ?>>
<span id="el_pacientegeneral_apellido2">
<span<?php echo $pacientegeneral_view->apellido2->viewAttributes() ?>><?php echo $pacientegeneral_view->apellido2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pacientegeneral_view->genero->Visible) { // genero ?>
	<tr id="r_genero">
		<td class="<?php echo $pacientegeneral_view->TableLeftColumnClass ?>"><span id="elh_pacientegeneral_genero"><?php echo $pacientegeneral_view->genero->caption() ?></span></td>
		<td data-name="genero" <?php echo $pacientegeneral_view->genero->cellAttributes() ?>>
<span id="el_pacientegeneral_genero">
<span<?php echo $pacientegeneral_view->genero->viewAttributes() ?>><?php echo $pacientegeneral_view->genero->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pacientegeneral_view->edad->Visible) { // edad ?>
	<tr id="r_edad">
		<td class="<?php echo $pacientegeneral_view->TableLeftColumnClass ?>"><span id="elh_pacientegeneral_edad"><?php echo $pacientegeneral_view->edad->caption() ?></span></td>
		<td data-name="edad" <?php echo $pacientegeneral_view->edad->cellAttributes() ?>>
<span id="el_pacientegeneral_edad">
<span<?php echo $pacientegeneral_view->edad->viewAttributes() ?>><?php echo $pacientegeneral_view->edad->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pacientegeneral_view->fecha_nacido->Visible) { // fecha_nacido ?>
	<tr id="r_fecha_nacido">
		<td class="<?php echo $pacientegeneral_view->TableLeftColumnClass ?>"><span id="elh_pacientegeneral_fecha_nacido"><?php echo $pacientegeneral_view->fecha_nacido->caption() ?></span></td>
		<td data-name="fecha_nacido" <?php echo $pacientegeneral_view->fecha_nacido->cellAttributes() ?>>
<span id="el_pacientegeneral_fecha_nacido">
<span<?php echo $pacientegeneral_view->fecha_nacido->viewAttributes() ?>><?php echo $pacientegeneral_view->fecha_nacido->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pacientegeneral_view->cod_edad->Visible) { // cod_edad ?>
	<tr id="r_cod_edad">
		<td class="<?php echo $pacientegeneral_view->TableLeftColumnClass ?>"><span id="elh_pacientegeneral_cod_edad"><?php echo $pacientegeneral_view->cod_edad->caption() ?></span></td>
		<td data-name="cod_edad" <?php echo $pacientegeneral_view->cod_edad->cellAttributes() ?>>
<span id="el_pacientegeneral_cod_edad">
<span<?php echo $pacientegeneral_view->cod_edad->viewAttributes() ?>><?php echo $pacientegeneral_view->cod_edad->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pacientegeneral_view->telefono->Visible) { // telefono ?>
	<tr id="r_telefono">
		<td class="<?php echo $pacientegeneral_view->TableLeftColumnClass ?>"><span id="elh_pacientegeneral_telefono"><?php echo $pacientegeneral_view->telefono->caption() ?></span></td>
		<td data-name="telefono" <?php echo $pacientegeneral_view->telefono->cellAttributes() ?>>
<span id="el_pacientegeneral_telefono">
<span<?php echo $pacientegeneral_view->telefono->viewAttributes() ?>><?php echo $pacientegeneral_view->telefono->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pacientegeneral_view->celular->Visible) { // celular ?>
	<tr id="r_celular">
		<td class="<?php echo $pacientegeneral_view->TableLeftColumnClass ?>"><span id="elh_pacientegeneral_celular"><?php echo $pacientegeneral_view->celular->caption() ?></span></td>
		<td data-name="celular" <?php echo $pacientegeneral_view->celular->cellAttributes() ?>>
<span id="el_pacientegeneral_celular">
<span<?php echo $pacientegeneral_view->celular->viewAttributes() ?>><?php echo $pacientegeneral_view->celular->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pacientegeneral_view->direccion->Visible) { // direccion ?>
	<tr id="r_direccion">
		<td class="<?php echo $pacientegeneral_view->TableLeftColumnClass ?>"><span id="elh_pacientegeneral_direccion"><?php echo $pacientegeneral_view->direccion->caption() ?></span></td>
		<td data-name="direccion" <?php echo $pacientegeneral_view->direccion->cellAttributes() ?>>
<span id="el_pacientegeneral_direccion">
<span<?php echo $pacientegeneral_view->direccion->viewAttributes() ?>><?php echo $pacientegeneral_view->direccion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pacientegeneral_view->aseguradro->Visible) { // aseguradro ?>
	<tr id="r_aseguradro">
		<td class="<?php echo $pacientegeneral_view->TableLeftColumnClass ?>"><span id="elh_pacientegeneral_aseguradro"><?php echo $pacientegeneral_view->aseguradro->caption() ?></span></td>
		<td data-name="aseguradro" <?php echo $pacientegeneral_view->aseguradro->cellAttributes() ?>>
<span id="el_pacientegeneral_aseguradro">
<span<?php echo $pacientegeneral_view->aseguradro->viewAttributes() ?>><?php echo $pacientegeneral_view->aseguradro->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pacientegeneral_view->observacion->Visible) { // observacion ?>
	<tr id="r_observacion">
		<td class="<?php echo $pacientegeneral_view->TableLeftColumnClass ?>"><span id="elh_pacientegeneral_observacion"><?php echo $pacientegeneral_view->observacion->caption() ?></span></td>
		<td data-name="observacion" <?php echo $pacientegeneral_view->observacion->cellAttributes() ?>>
<span id="el_pacientegeneral_observacion">
<span<?php echo $pacientegeneral_view->observacion->viewAttributes() ?>><?php echo $pacientegeneral_view->observacion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pacientegeneral_view->nss->Visible) { // nss ?>
	<tr id="r_nss">
		<td class="<?php echo $pacientegeneral_view->TableLeftColumnClass ?>"><span id="elh_pacientegeneral_nss"><?php echo $pacientegeneral_view->nss->caption() ?></span></td>
		<td data-name="nss" <?php echo $pacientegeneral_view->nss->cellAttributes() ?>>
<span id="el_pacientegeneral_nss">
<span<?php echo $pacientegeneral_view->nss->viewAttributes() ?>><?php echo $pacientegeneral_view->nss->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pacientegeneral_view->prehospitalario->Visible) { // prehospitalario ?>
	<tr id="r_prehospitalario">
		<td class="<?php echo $pacientegeneral_view->TableLeftColumnClass ?>"><span id="elh_pacientegeneral_prehospitalario"><?php echo $pacientegeneral_view->prehospitalario->caption() ?></span></td>
		<td data-name="prehospitalario" <?php echo $pacientegeneral_view->prehospitalario->cellAttributes() ?>>
<span id="el_pacientegeneral_prehospitalario">
<span<?php echo $pacientegeneral_view->prehospitalario->viewAttributes() ?>><?php echo $pacientegeneral_view->prehospitalario->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pacientegeneral_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pacientegeneral_view->isExport()) { ?>
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
$pacientegeneral_view->terminate();
?>