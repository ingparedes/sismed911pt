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
$preh_maestro_view = new preh_maestro_view();

// Run the page
$preh_maestro_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_maestro_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$preh_maestro_view->isExport()) { ?>
<script>
var fpreh_maestroview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpreh_maestroview = currentForm = new ew.Form("fpreh_maestroview", "view");
	loadjs.done("fpreh_maestroview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$preh_maestro_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $preh_maestro_view->ExportOptions->render("body") ?>
<?php $preh_maestro_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $preh_maestro_view->showPageHeader(); ?>
<?php
$preh_maestro_view->showMessage();
?>
<form name="fpreh_maestroview" id="fpreh_maestroview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_maestro">
<input type="hidden" name="modal" value="<?php echo (int)$preh_maestro_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($preh_maestro_view->cod_casopreh->Visible) { // cod_casopreh ?>
	<tr id="r_cod_casopreh">
		<td class="<?php echo $preh_maestro_view->TableLeftColumnClass ?>"><span id="elh_preh_maestro_cod_casopreh"><?php echo $preh_maestro_view->cod_casopreh->caption() ?></span></td>
		<td data-name="cod_casopreh" <?php echo $preh_maestro_view->cod_casopreh->cellAttributes() ?>>
<span id="el_preh_maestro_cod_casopreh">
<span<?php echo $preh_maestro_view->cod_casopreh->viewAttributes() ?>><?php if (!EmptyString($preh_maestro_view->cod_casopreh->TooltipValue) && $preh_maestro_view->cod_casopreh->linkAttributes() != "") { ?>
<a<?php echo $preh_maestro_view->cod_casopreh->linkAttributes() ?>><?php echo $preh_maestro_view->cod_casopreh->getViewValue() ?></a>
<?php } else { ?>
<?php echo $preh_maestro_view->cod_casopreh->getViewValue() ?>
<?php } ?>
<span id="tt_preh_maestro_x_cod_casopreh" class="d-none">
<?php echo $preh_maestro_view->cod_casopreh->TooltipValue ?>
</span></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_maestro_view->fecha->Visible) { // fecha ?>
	<tr id="r_fecha">
		<td class="<?php echo $preh_maestro_view->TableLeftColumnClass ?>"><span id="elh_preh_maestro_fecha"><?php echo $preh_maestro_view->fecha->caption() ?></span></td>
		<td data-name="fecha" <?php echo $preh_maestro_view->fecha->cellAttributes() ?>>
<span id="el_preh_maestro_fecha">
<span<?php echo $preh_maestro_view->fecha->viewAttributes() ?>><?php echo $preh_maestro_view->fecha->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_maestro_view->tiempo->Visible) { // tiempo ?>
	<tr id="r_tiempo">
		<td class="<?php echo $preh_maestro_view->TableLeftColumnClass ?>"><span id="elh_preh_maestro_tiempo"><?php echo $preh_maestro_view->tiempo->caption() ?></span></td>
		<td data-name="tiempo" <?php echo $preh_maestro_view->tiempo->cellAttributes() ?>>
<span id="el_preh_maestro_tiempo">
<span<?php echo $preh_maestro_view->tiempo->viewAttributes() ?>><?php
echo "<i class='far fa-clock'></i> ".CurrentPage()->tiempo->CurrentValue. " MIN";
?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_maestro_view->quepasa->Visible) { // quepasa ?>
	<tr id="r_quepasa">
		<td class="<?php echo $preh_maestro_view->TableLeftColumnClass ?>"><span id="elh_preh_maestro_quepasa"><?php echo $preh_maestro_view->quepasa->caption() ?></span></td>
		<td data-name="quepasa" <?php echo $preh_maestro_view->quepasa->cellAttributes() ?>>
<span id="el_preh_maestro_quepasa">
<span<?php echo $preh_maestro_view->quepasa->viewAttributes() ?>><?php echo $preh_maestro_view->quepasa->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_maestro_view->direccion->Visible) { // direccion ?>
	<tr id="r_direccion">
		<td class="<?php echo $preh_maestro_view->TableLeftColumnClass ?>"><span id="elh_preh_maestro_direccion"><?php echo $preh_maestro_view->direccion->caption() ?></span></td>
		<td data-name="direccion" <?php echo $preh_maestro_view->direccion->cellAttributes() ?>>
<span id="el_preh_maestro_direccion">
<span<?php echo $preh_maestro_view->direccion->viewAttributes() ?>><?php echo $preh_maestro_view->direccion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_maestro_view->incidente->Visible) { // incidente ?>
	<tr id="r_incidente">
		<td class="<?php echo $preh_maestro_view->TableLeftColumnClass ?>"><span id="elh_preh_maestro_incidente"><?php echo $preh_maestro_view->incidente->caption() ?></span></td>
		<td data-name="incidente" <?php echo $preh_maestro_view->incidente->cellAttributes() ?>>
<span id="el_preh_maestro_incidente">
<span<?php echo $preh_maestro_view->incidente->viewAttributes() ?>><?php echo $preh_maestro_view->incidente->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_maestro_view->prioridad->Visible) { // prioridad ?>
	<tr id="r_prioridad">
		<td class="<?php echo $preh_maestro_view->TableLeftColumnClass ?>"><span id="elh_preh_maestro_prioridad"><?php echo $preh_maestro_view->prioridad->caption() ?></span></td>
		<td data-name="prioridad" <?php echo $preh_maestro_view->prioridad->cellAttributes() ?>>
<span id="el_preh_maestro_prioridad">
<span<?php echo $preh_maestro_view->prioridad->viewAttributes() ?>><?php echo $preh_maestro_view->prioridad->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_maestro_view->accion->Visible) { // accion ?>
	<tr id="r_accion">
		<td class="<?php echo $preh_maestro_view->TableLeftColumnClass ?>"><span id="elh_preh_maestro_accion"><?php echo $preh_maestro_view->accion->caption() ?></span></td>
		<td data-name="accion" <?php echo $preh_maestro_view->accion->cellAttributes() ?>>
<span id="el_preh_maestro_accion">
<span<?php echo $preh_maestro_view->accion->viewAttributes() ?>><?php echo $preh_maestro_view->accion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_maestro_view->estado->Visible) { // estado ?>
	<tr id="r_estado">
		<td class="<?php echo $preh_maestro_view->TableLeftColumnClass ?>"><span id="elh_preh_maestro_estado"><?php echo $preh_maestro_view->estado->caption() ?></span></td>
		<td data-name="estado" <?php echo $preh_maestro_view->estado->cellAttributes() ?>>
<span id="el_preh_maestro_estado">
<span<?php echo $preh_maestro_view->estado->viewAttributes() ?>><?php
$amb = ExecuteScalar("SELECT preh_servicio_ambulancia.cod_ambulancia FROM preh_maestro INNER JOIN preh_servicio_ambulancia ON preh_maestro.cod_casopreh =  preh_servicio_ambulancia.id_maestrointerh WHERE preh_maestro.cod_casopreh = ".CurrentPage()->cod_casopreh->CurrentValue);
if ( $amb <> '')
echo "<small><li class = 'badge bg-info'> <i class='fas fa-check'></i> Asignada ".$amb."</li></small>";
?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_maestro_view->paciente->Visible) { // paciente ?>
	<tr id="r_paciente">
		<td class="<?php echo $preh_maestro_view->TableLeftColumnClass ?>"><span id="elh_preh_maestro_paciente"><?php echo $preh_maestro_view->paciente->caption() ?></span></td>
		<td data-name="paciente" <?php echo $preh_maestro_view->paciente->cellAttributes() ?>>
<span id="el_preh_maestro_paciente">
<span<?php echo $preh_maestro_view->paciente->viewAttributes() ?>><?php
$pte = ExecuteScalar("SELECT concat_ws(' ','ID',num_doc,nombre1,nombre2,apellido1,apellido2) as pte FROM pacientegeneral WHERE prehospitalario = '1' and cod_pacienteinterh = ".CurrentPage()->cod_casopreh->CurrentValue);
echo $pte;
?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_maestro_view->evaluacion->Visible) { // evaluacion ?>
	<tr id="r_evaluacion">
		<td class="<?php echo $preh_maestro_view->TableLeftColumnClass ?>"><span id="elh_preh_maestro_evaluacion"><?php echo $preh_maestro_view->evaluacion->caption() ?></span></td>
		<td data-name="evaluacion" <?php echo $preh_maestro_view->evaluacion->cellAttributes() ?>>
<span id="el_preh_maestro_evaluacion">
<span<?php echo $preh_maestro_view->evaluacion->viewAttributes() ?>><?php echo $preh_maestro_view->evaluacion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_maestro_view->hospital_destino->Visible) { // hospital_destino ?>
	<tr id="r_hospital_destino">
		<td class="<?php echo $preh_maestro_view->TableLeftColumnClass ?>"><span id="elh_preh_maestro_hospital_destino"><?php echo $preh_maestro_view->hospital_destino->caption() ?></span></td>
		<td data-name="hospital_destino" <?php echo $preh_maestro_view->hospital_destino->cellAttributes() ?>>
<span id="el_preh_maestro_hospital_destino">
<span<?php echo $preh_maestro_view->hospital_destino->viewAttributes() ?>><?php echo $preh_maestro_view->hospital_destino->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_maestro_view->nombre_confirma->Visible) { // nombre_confirma ?>
	<tr id="r_nombre_confirma">
		<td class="<?php echo $preh_maestro_view->TableLeftColumnClass ?>"><span id="elh_preh_maestro_nombre_confirma"><?php echo $preh_maestro_view->nombre_confirma->caption() ?></span></td>
		<td data-name="nombre_confirma" <?php echo $preh_maestro_view->nombre_confirma->cellAttributes() ?>>
<span id="el_preh_maestro_nombre_confirma">
<span<?php echo $preh_maestro_view->nombre_confirma->viewAttributes() ?>><?php echo $preh_maestro_view->nombre_confirma->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_maestro_view->telefono_confirma->Visible) { // telefono_confirma ?>
	<tr id="r_telefono_confirma">
		<td class="<?php echo $preh_maestro_view->TableLeftColumnClass ?>"><span id="elh_preh_maestro_telefono_confirma"><?php echo $preh_maestro_view->telefono_confirma->caption() ?></span></td>
		<td data-name="telefono_confirma" <?php echo $preh_maestro_view->telefono_confirma->cellAttributes() ?>>
<span id="el_preh_maestro_telefono_confirma">
<span<?php echo $preh_maestro_view->telefono_confirma->viewAttributes() ?>><?php echo $preh_maestro_view->telefono_confirma->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_maestro_view->telefono->Visible) { // telefono ?>
	<tr id="r_telefono">
		<td class="<?php echo $preh_maestro_view->TableLeftColumnClass ?>"><span id="elh_preh_maestro_telefono"><?php echo $preh_maestro_view->telefono->caption() ?></span></td>
		<td data-name="telefono" <?php echo $preh_maestro_view->telefono->cellAttributes() ?>>
<span id="el_preh_maestro_telefono">
<span<?php echo $preh_maestro_view->telefono->viewAttributes() ?>><?php echo $preh_maestro_view->telefono->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_maestro_view->nombre_reporta->Visible) { // nombre_reporta ?>
	<tr id="r_nombre_reporta">
		<td class="<?php echo $preh_maestro_view->TableLeftColumnClass ?>"><span id="elh_preh_maestro_nombre_reporta"><?php echo $preh_maestro_view->nombre_reporta->caption() ?></span></td>
		<td data-name="nombre_reporta" <?php echo $preh_maestro_view->nombre_reporta->cellAttributes() ?>>
<span id="el_preh_maestro_nombre_reporta">
<span<?php echo $preh_maestro_view->nombre_reporta->viewAttributes() ?>><?php echo $preh_maestro_view->nombre_reporta->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_maestro_view->distrito->Visible) { // distrito ?>
	<tr id="r_distrito">
		<td class="<?php echo $preh_maestro_view->TableLeftColumnClass ?>"><span id="elh_preh_maestro_distrito"><?php echo $preh_maestro_view->distrito->caption() ?></span></td>
		<td data-name="distrito" <?php echo $preh_maestro_view->distrito->cellAttributes() ?>>
<span id="el_preh_maestro_distrito">
<span<?php echo $preh_maestro_view->distrito->viewAttributes() ?>><?php echo $preh_maestro_view->distrito->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$preh_maestro_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$preh_maestro_view->isExport()) { ?>
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
$preh_maestro_view->terminate();
?>