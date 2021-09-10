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
$interh_maestro_view = new interh_maestro_view();

// Run the page
$interh_maestro_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_maestro_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$interh_maestro_view->isExport()) { ?>
<script>
var finterh_maestroview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	finterh_maestroview = currentForm = new ew.Form("finterh_maestroview", "view");
	loadjs.done("finterh_maestroview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$interh_maestro_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $interh_maestro_view->ExportOptions->render("body") ?>
<?php $interh_maestro_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $interh_maestro_view->showPageHeader(); ?>
<?php
$interh_maestro_view->showMessage();
?>
<form name="finterh_maestroview" id="finterh_maestroview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="interh_maestro">
<input type="hidden" name="modal" value="<?php echo (int)$interh_maestro_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($interh_maestro_view->cod_casointerh->Visible) { // cod_casointerh ?>
	<tr id="r_cod_casointerh">
		<td class="<?php echo $interh_maestro_view->TableLeftColumnClass ?>"><span id="elh_interh_maestro_cod_casointerh"><?php echo $interh_maestro_view->cod_casointerh->caption() ?></span></td>
		<td data-name="cod_casointerh" <?php echo $interh_maestro_view->cod_casointerh->cellAttributes() ?>>
<span id="el_interh_maestro_cod_casointerh">
<span<?php echo $interh_maestro_view->cod_casointerh->viewAttributes() ?>><?php echo $interh_maestro_view->cod_casointerh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($interh_maestro_view->fechahorainterh->Visible) { // fechahorainterh ?>
	<tr id="r_fechahorainterh">
		<td class="<?php echo $interh_maestro_view->TableLeftColumnClass ?>"><span id="elh_interh_maestro_fechahorainterh"><?php echo $interh_maestro_view->fechahorainterh->caption() ?></span></td>
		<td data-name="fechahorainterh" <?php echo $interh_maestro_view->fechahorainterh->cellAttributes() ?>>
<span id="el_interh_maestro_fechahorainterh">
<span<?php echo $interh_maestro_view->fechahorainterh->viewAttributes() ?>><?php echo $interh_maestro_view->fechahorainterh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($interh_maestro_view->tiempo->Visible) { // tiempo ?>
	<tr id="r_tiempo">
		<td class="<?php echo $interh_maestro_view->TableLeftColumnClass ?>"><span id="elh_interh_maestro_tiempo"><?php echo $interh_maestro_view->tiempo->caption() ?></span></td>
		<td data-name="tiempo" <?php echo $interh_maestro_view->tiempo->cellAttributes() ?>>
<span id="el_interh_maestro_tiempo">
<span<?php echo $interh_maestro_view->tiempo->viewAttributes() ?>><?php
echo "<i class='far fa-clock'></i> ".CurrentPage()->tiempo->CurrentValue. " MIN";
?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($interh_maestro_view->tipo_serviciointerh->Visible) { // tipo_serviciointerh ?>
	<tr id="r_tipo_serviciointerh">
		<td class="<?php echo $interh_maestro_view->TableLeftColumnClass ?>"><span id="elh_interh_maestro_tipo_serviciointerh"><?php echo $interh_maestro_view->tipo_serviciointerh->caption() ?></span></td>
		<td data-name="tipo_serviciointerh" <?php echo $interh_maestro_view->tipo_serviciointerh->cellAttributes() ?>>
<span id="el_interh_maestro_tipo_serviciointerh">
<span<?php echo $interh_maestro_view->tipo_serviciointerh->viewAttributes() ?>><?php echo $interh_maestro_view->tipo_serviciointerh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($interh_maestro_view->hospital_origneinterh->Visible) { // hospital_origneinterh ?>
	<tr id="r_hospital_origneinterh">
		<td class="<?php echo $interh_maestro_view->TableLeftColumnClass ?>"><span id="elh_interh_maestro_hospital_origneinterh"><?php echo $interh_maestro_view->hospital_origneinterh->caption() ?></span></td>
		<td data-name="hospital_origneinterh" <?php echo $interh_maestro_view->hospital_origneinterh->cellAttributes() ?>>
<span id="el_interh_maestro_hospital_origneinterh">
<span<?php echo $interh_maestro_view->hospital_origneinterh->viewAttributes() ?>><?php echo $interh_maestro_view->hospital_origneinterh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($interh_maestro_view->nombrereportainterh->Visible) { // nombrereportainterh ?>
	<tr id="r_nombrereportainterh">
		<td class="<?php echo $interh_maestro_view->TableLeftColumnClass ?>"><span id="elh_interh_maestro_nombrereportainterh"><?php echo $interh_maestro_view->nombrereportainterh->caption() ?></span></td>
		<td data-name="nombrereportainterh" <?php echo $interh_maestro_view->nombrereportainterh->cellAttributes() ?>>
<span id="el_interh_maestro_nombrereportainterh">
<span<?php echo $interh_maestro_view->nombrereportainterh->viewAttributes() ?>><?php echo $interh_maestro_view->nombrereportainterh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($interh_maestro_view->telefonointerh->Visible) { // telefonointerh ?>
	<tr id="r_telefonointerh">
		<td class="<?php echo $interh_maestro_view->TableLeftColumnClass ?>"><span id="elh_interh_maestro_telefonointerh"><?php echo $interh_maestro_view->telefonointerh->caption() ?></span></td>
		<td data-name="telefonointerh" <?php echo $interh_maestro_view->telefonointerh->cellAttributes() ?>>
<span id="el_interh_maestro_telefonointerh">
<span<?php echo $interh_maestro_view->telefonointerh->viewAttributes() ?>><?php echo $interh_maestro_view->telefonointerh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($interh_maestro_view->motivo_atencioninteh->Visible) { // motivo_atencioninteh ?>
	<tr id="r_motivo_atencioninteh">
		<td class="<?php echo $interh_maestro_view->TableLeftColumnClass ?>"><span id="elh_interh_maestro_motivo_atencioninteh"><?php echo $interh_maestro_view->motivo_atencioninteh->caption() ?></span></td>
		<td data-name="motivo_atencioninteh" <?php echo $interh_maestro_view->motivo_atencioninteh->cellAttributes() ?>>
<span id="el_interh_maestro_motivo_atencioninteh">
<span<?php echo $interh_maestro_view->motivo_atencioninteh->viewAttributes() ?>><?php echo $interh_maestro_view->motivo_atencioninteh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($interh_maestro_view->accioninterh->Visible) { // accioninterh ?>
	<tr id="r_accioninterh">
		<td class="<?php echo $interh_maestro_view->TableLeftColumnClass ?>"><span id="elh_interh_maestro_accioninterh"><?php echo $interh_maestro_view->accioninterh->caption() ?></span></td>
		<td data-name="accioninterh" <?php echo $interh_maestro_view->accioninterh->cellAttributes() ?>>
<span id="el_interh_maestro_accioninterh">
<span<?php echo $interh_maestro_view->accioninterh->viewAttributes() ?>><?php echo $interh_maestro_view->accioninterh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($interh_maestro_view->prioridadinterh->Visible) { // prioridadinterh ?>
	<tr id="r_prioridadinterh">
		<td class="<?php echo $interh_maestro_view->TableLeftColumnClass ?>"><span id="elh_interh_maestro_prioridadinterh"><?php echo $interh_maestro_view->prioridadinterh->caption() ?></span></td>
		<td data-name="prioridadinterh" <?php echo $interh_maestro_view->prioridadinterh->cellAttributes() ?>>
<span id="el_interh_maestro_prioridadinterh">
<span<?php echo $interh_maestro_view->prioridadinterh->viewAttributes() ?>><?php
if(CurrentPage()->prioridadinterh->CurrentValue == 1)
echo "<i class='fas fa-caret-up'></i> ".CurrentPage()->prioridadinterh->CurrentValue. "High";
elseif (CurrentPage()->prioridadinterh->CurrentValue == 2)
echo "<i class='fas fa-caret-left'></i> ".CurrentPage()->prioridadinterh->CurrentValue. " Medium";
else
echo "<i class='fas fa-caret-down'></i> ".CurrentPage()->prioridadinterh->CurrentValue. " Low";
?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($interh_maestro_view->estadointerh->Visible) { // estadointerh ?>
	<tr id="r_estadointerh">
		<td class="<?php echo $interh_maestro_view->TableLeftColumnClass ?>"><span id="elh_interh_maestro_estadointerh"><?php echo $interh_maestro_view->estadointerh->caption() ?></span></td>
		<td data-name="estadointerh" <?php echo $interh_maestro_view->estadointerh->cellAttributes() ?>>
<span id="el_interh_maestro_estadointerh">
<span<?php echo $interh_maestro_view->estadointerh->viewAttributes() ?>><?php
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
	</tr>
<?php } ?>
<?php if ($interh_maestro_view->hospital_destinointerh->Visible) { // hospital_destinointerh ?>
	<tr id="r_hospital_destinointerh">
		<td class="<?php echo $interh_maestro_view->TableLeftColumnClass ?>"><span id="elh_interh_maestro_hospital_destinointerh"><?php echo $interh_maestro_view->hospital_destinointerh->caption() ?></span></td>
		<td data-name="hospital_destinointerh" <?php echo $interh_maestro_view->hospital_destinointerh->cellAttributes() ?>>
<span id="el_interh_maestro_hospital_destinointerh">
<span<?php echo $interh_maestro_view->hospital_destinointerh->viewAttributes() ?>><?php echo $interh_maestro_view->hospital_destinointerh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($interh_maestro_view->nombre_recibe->Visible) { // nombre_recibe ?>
	<tr id="r_nombre_recibe">
		<td class="<?php echo $interh_maestro_view->TableLeftColumnClass ?>"><span id="elh_interh_maestro_nombre_recibe"><?php echo $interh_maestro_view->nombre_recibe->caption() ?></span></td>
		<td data-name="nombre_recibe" <?php echo $interh_maestro_view->nombre_recibe->cellAttributes() ?>>
<span id="el_interh_maestro_nombre_recibe">
<span<?php echo $interh_maestro_view->nombre_recibe->viewAttributes() ?>><?php echo $interh_maestro_view->nombre_recibe->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($interh_maestro_view->ambulancia->Visible) { // ambulancia ?>
	<tr id="r_ambulancia">
		<td class="<?php echo $interh_maestro_view->TableLeftColumnClass ?>"><span id="elh_interh_maestro_ambulancia"><?php echo $interh_maestro_view->ambulancia->caption() ?></span></td>
		<td data-name="ambulancia" <?php echo $interh_maestro_view->ambulancia->cellAttributes() ?>>
<span id="el_interh_maestro_ambulancia">
<span<?php echo $interh_maestro_view->ambulancia->viewAttributes() ?>><?php
$ambu = ExecuteScalar("SELECT servicio_ambulancia.cod_ambulancia FROM servicio_ambulancia WHERE id_maestrointerh =".CurrentPage()->cod_casointerh->CurrentValue);
echo $ambu;
?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$interh_maestro_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$interh_maestro_view->isExport()) { ?>
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
$interh_maestro_view->terminate();
?>