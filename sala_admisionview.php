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
$sala_admision_view = new sala_admision_view();

// Run the page
$sala_admision_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sala_admision_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$sala_admision_view->isExport()) { ?>
<script>
var fsala_admisionview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fsala_admisionview = currentForm = new ew.Form("fsala_admisionview", "view");
	loadjs.done("fsala_admisionview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$sala_admision_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $sala_admision_view->ExportOptions->render("body") ?>
<?php $sala_admision_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $sala_admision_view->showPageHeader(); ?>
<?php
$sala_admision_view->showMessage();
?>
<form name="fsala_admisionview" id="fsala_admisionview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sala_admision">
<input type="hidden" name="modal" value="<?php echo (int)$sala_admision_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($sala_admision_view->cod_casopreh->Visible) { // cod_casopreh ?>
	<tr id="r_cod_casopreh">
		<td class="<?php echo $sala_admision_view->TableLeftColumnClass ?>"><span id="elh_sala_admision_cod_casopreh"><?php echo $sala_admision_view->cod_casopreh->caption() ?></span></td>
		<td data-name="cod_casopreh" <?php echo $sala_admision_view->cod_casopreh->cellAttributes() ?>>
<span id="el_sala_admision_cod_casopreh">
<span<?php echo $sala_admision_view->cod_casopreh->viewAttributes() ?>><?php echo $sala_admision_view->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_admision_view->fecha->Visible) { // fecha ?>
	<tr id="r_fecha">
		<td class="<?php echo $sala_admision_view->TableLeftColumnClass ?>"><span id="elh_sala_admision_fecha"><?php echo $sala_admision_view->fecha->caption() ?></span></td>
		<td data-name="fecha" <?php echo $sala_admision_view->fecha->cellAttributes() ?>>
<span id="el_sala_admision_fecha">
<span<?php echo $sala_admision_view->fecha->viewAttributes() ?>><?php echo $sala_admision_view->fecha->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_admision_view->prioridad->Visible) { // prioridad ?>
	<tr id="r_prioridad">
		<td class="<?php echo $sala_admision_view->TableLeftColumnClass ?>"><span id="elh_sala_admision_prioridad"><?php echo $sala_admision_view->prioridad->caption() ?></span></td>
		<td data-name="prioridad" <?php echo $sala_admision_view->prioridad->cellAttributes() ?>>
<span id="el_sala_admision_prioridad">
<span<?php echo $sala_admision_view->prioridad->viewAttributes() ?>><?php echo $sala_admision_view->prioridad->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_admision_view->nombre_es->Visible) { // nombre_es ?>
	<tr id="r_nombre_es">
		<td class="<?php echo $sala_admision_view->TableLeftColumnClass ?>"><span id="elh_sala_admision_nombre_es"><?php echo $sala_admision_view->nombre_es->caption() ?></span></td>
		<td data-name="nombre_es" <?php echo $sala_admision_view->nombre_es->cellAttributes() ?>>
<span id="el_sala_admision_nombre_es">
<span<?php echo $sala_admision_view->nombre_es->viewAttributes() ?>><?php echo $sala_admision_view->nombre_es->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_admision_view->hospital_destino->Visible) { // hospital_destino ?>
	<tr id="r_hospital_destino">
		<td class="<?php echo $sala_admision_view->TableLeftColumnClass ?>"><span id="elh_sala_admision_hospital_destino"><?php echo $sala_admision_view->hospital_destino->caption() ?></span></td>
		<td data-name="hospital_destino" <?php echo $sala_admision_view->hospital_destino->cellAttributes() ?>>
<span id="el_sala_admision_hospital_destino">
<span<?php echo $sala_admision_view->hospital_destino->viewAttributes() ?>><?php echo $sala_admision_view->hospital_destino->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_admision_view->nombre_confirma->Visible) { // nombre_confirma ?>
	<tr id="r_nombre_confirma">
		<td class="<?php echo $sala_admision_view->TableLeftColumnClass ?>"><span id="elh_sala_admision_nombre_confirma"><?php echo $sala_admision_view->nombre_confirma->caption() ?></span></td>
		<td data-name="nombre_confirma" <?php echo $sala_admision_view->nombre_confirma->cellAttributes() ?>>
<span id="el_sala_admision_nombre_confirma">
<span<?php echo $sala_admision_view->nombre_confirma->viewAttributes() ?>><?php echo $sala_admision_view->nombre_confirma->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_admision_view->paciente->Visible) { // paciente ?>
	<tr id="r_paciente">
		<td class="<?php echo $sala_admision_view->TableLeftColumnClass ?>"><span id="elh_sala_admision_paciente"><?php echo $sala_admision_view->paciente->caption() ?></span></td>
		<td data-name="paciente" <?php echo $sala_admision_view->paciente->cellAttributes() ?>>
<span id="el_sala_admision_paciente">
<span<?php echo $sala_admision_view->paciente->viewAttributes() ?>><?php echo $sala_admision_view->paciente->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_admision_view->genero->Visible) { // genero ?>
	<tr id="r_genero">
		<td class="<?php echo $sala_admision_view->TableLeftColumnClass ?>"><span id="elh_sala_admision_genero"><?php echo $sala_admision_view->genero->caption() ?></span></td>
		<td data-name="genero" <?php echo $sala_admision_view->genero->cellAttributes() ?>>
<span id="el_sala_admision_genero">
<span<?php echo $sala_admision_view->genero->viewAttributes() ?>><?php echo $sala_admision_view->genero->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_admision_view->edad->Visible) { // edad ?>
	<tr id="r_edad">
		<td class="<?php echo $sala_admision_view->TableLeftColumnClass ?>"><span id="elh_sala_admision_edad"><?php echo $sala_admision_view->edad->caption() ?></span></td>
		<td data-name="edad" <?php echo $sala_admision_view->edad->cellAttributes() ?>>
<span id="el_sala_admision_edad">
<span<?php echo $sala_admision_view->edad->viewAttributes() ?>><?php echo $sala_admision_view->edad->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_admision_view->cod_ambulancia->Visible) { // cod_ambulancia ?>
	<tr id="r_cod_ambulancia">
		<td class="<?php echo $sala_admision_view->TableLeftColumnClass ?>"><span id="elh_sala_admision_cod_ambulancia"><?php echo $sala_admision_view->cod_ambulancia->caption() ?></span></td>
		<td data-name="cod_ambulancia" <?php echo $sala_admision_view->cod_ambulancia->cellAttributes() ?>>
<span id="el_sala_admision_cod_ambulancia">
<span<?php echo $sala_admision_view->cod_ambulancia->viewAttributes() ?>><?php echo $sala_admision_view->cod_ambulancia->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_admision_view->cuando_murio->Visible) { // cuando_murio ?>
	<tr id="r_cuando_murio">
		<td class="<?php echo $sala_admision_view->TableLeftColumnClass ?>"><span id="elh_sala_admision_cuando_murio"><?php echo $sala_admision_view->cuando_murio->caption() ?></span></td>
		<td data-name="cuando_murio" <?php echo $sala_admision_view->cuando_murio->cellAttributes() ?>>
<span id="el_sala_admision_cuando_murio">
<span<?php echo $sala_admision_view->cuando_murio->viewAttributes() ?>><?php echo $sala_admision_view->cuando_murio->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$sala_admision_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$sala_admision_view->isExport()) { ?>
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
$sala_admision_view->terminate();
?>