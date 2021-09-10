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
$sala_rac_view = new sala_rac_view();

// Run the page
$sala_rac_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sala_rac_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$sala_rac_view->isExport()) { ?>
<script>
var fsala_racview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fsala_racview = currentForm = new ew.Form("fsala_racview", "view");
	loadjs.done("fsala_racview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$sala_rac_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $sala_rac_view->ExportOptions->render("body") ?>
<?php $sala_rac_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $sala_rac_view->showPageHeader(); ?>
<?php
$sala_rac_view->showMessage();
?>
<form name="fsala_racview" id="fsala_racview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sala_rac">
<input type="hidden" name="modal" value="<?php echo (int)$sala_rac_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($sala_rac_view->id_registro->Visible) { // id_registro ?>
	<tr id="r_id_registro">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_id_registro"><?php echo $sala_rac_view->id_registro->caption() ?></span></td>
		<td data-name="id_registro" <?php echo $sala_rac_view->id_registro->cellAttributes() ?>>
<span id="el_sala_rac_id_registro">
<span<?php echo $sala_rac_view->id_registro->viewAttributes() ?>><?php echo $sala_rac_view->id_registro->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->fecha_hora->Visible) { // fecha_hora ?>
	<tr id="r_fecha_hora">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_fecha_hora"><?php echo $sala_rac_view->fecha_hora->caption() ?></span></td>
		<td data-name="fecha_hora" <?php echo $sala_rac_view->fecha_hora->cellAttributes() ?>>
<span id="el_sala_rac_fecha_hora">
<span<?php echo $sala_rac_view->fecha_hora->viewAttributes() ?>><?php echo $sala_rac_view->fecha_hora->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->id_admision->Visible) { // id_admision ?>
	<tr id="r_id_admision">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_id_admision"><?php echo $sala_rac_view->id_admision->caption() ?></span></td>
		<td data-name="id_admision" <?php echo $sala_rac_view->id_admision->cellAttributes() ?>>
<span id="el_sala_rac_id_admision">
<span<?php echo $sala_rac_view->id_admision->viewAttributes() ?>><?php echo $sala_rac_view->id_admision->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->acompanante->Visible) { // acompañante ?>
	<tr id="r_acompanante">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_acompanante"><?php echo $sala_rac_view->acompanante->caption() ?></span></td>
		<td data-name="acompanante" <?php echo $sala_rac_view->acompanante->cellAttributes() ?>>
<span id="el_sala_rac_acompanante">
<span<?php echo $sala_rac_view->acompanante->viewAttributes() ?>><?php echo $sala_rac_view->acompanante->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->tel_acompanante->Visible) { // tel_acompañante ?>
	<tr id="r_tel_acompanante">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_tel_acompanante"><?php echo $sala_rac_view->tel_acompanante->caption() ?></span></td>
		<td data-name="tel_acompanante" <?php echo $sala_rac_view->tel_acompanante->cellAttributes() ?>>
<span id="el_sala_rac_tel_acompanante">
<span<?php echo $sala_rac_view->tel_acompanante->viewAttributes() ?>><?php echo $sala_rac_view->tel_acompanante->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->tipo_urgencia->Visible) { // tipo_urgencia ?>
	<tr id="r_tipo_urgencia">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_tipo_urgencia"><?php echo $sala_rac_view->tipo_urgencia->caption() ?></span></td>
		<td data-name="tipo_urgencia" <?php echo $sala_rac_view->tipo_urgencia->cellAttributes() ?>>
<span id="el_sala_rac_tipo_urgencia">
<span<?php echo $sala_rac_view->tipo_urgencia->viewAttributes() ?>><?php echo $sala_rac_view->tipo_urgencia->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->clasificacion->Visible) { // clasificacion ?>
	<tr id="r_clasificacion">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_clasificacion"><?php echo $sala_rac_view->clasificacion->caption() ?></span></td>
		<td data-name="clasificacion" <?php echo $sala_rac_view->clasificacion->cellAttributes() ?>>
<span id="el_sala_rac_clasificacion">
<span<?php echo $sala_rac_view->clasificacion->viewAttributes() ?>><?php echo $sala_rac_view->clasificacion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->motivo_consulta->Visible) { // motivo_consulta ?>
	<tr id="r_motivo_consulta">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_motivo_consulta"><?php echo $sala_rac_view->motivo_consulta->caption() ?></span></td>
		<td data-name="motivo_consulta" <?php echo $sala_rac_view->motivo_consulta->cellAttributes() ?>>
<span id="el_sala_rac_motivo_consulta">
<span<?php echo $sala_rac_view->motivo_consulta->viewAttributes() ?>><?php echo $sala_rac_view->motivo_consulta->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->signos_vitales->Visible) { // signos_vitales ?>
	<tr id="r_signos_vitales">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_signos_vitales"><?php echo $sala_rac_view->signos_vitales->caption() ?></span></td>
		<td data-name="signos_vitales" <?php echo $sala_rac_view->signos_vitales->cellAttributes() ?>>
<span id="el_sala_rac_signos_vitales">
<span<?php echo $sala_rac_view->signos_vitales->viewAttributes() ?>><?php echo $sala_rac_view->signos_vitales->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->so2->Visible) { // so2 ?>
	<tr id="r_so2">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_so2"><?php echo $sala_rac_view->so2->caption() ?></span></td>
		<td data-name="so2" <?php echo $sala_rac_view->so2->cellAttributes() ?>>
<span id="el_sala_rac_so2">
<span<?php echo $sala_rac_view->so2->viewAttributes() ?>><?php echo $sala_rac_view->so2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->fr->Visible) { // fr ?>
	<tr id="r_fr">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_fr"><?php echo $sala_rac_view->fr->caption() ?></span></td>
		<td data-name="fr" <?php echo $sala_rac_view->fr->cellAttributes() ?>>
<span id="el_sala_rac_fr">
<span<?php echo $sala_rac_view->fr->viewAttributes() ?>><?php echo $sala_rac_view->fr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->_t->Visible) { // t ?>
	<tr id="r__t">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac__t"><?php echo $sala_rac_view->_t->caption() ?></span></td>
		<td data-name="_t" <?php echo $sala_rac_view->_t->cellAttributes() ?>>
<span id="el_sala_rac__t">
<span<?php echo $sala_rac_view->_t->viewAttributes() ?>><?php echo $sala_rac_view->_t->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->fc->Visible) { // fc ?>
	<tr id="r_fc">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_fc"><?php echo $sala_rac_view->fc->caption() ?></span></td>
		<td data-name="fc" <?php echo $sala_rac_view->fc->cellAttributes() ?>>
<span id="el_sala_rac_fc">
<span<?php echo $sala_rac_view->fc->viewAttributes() ?>><?php echo $sala_rac_view->fc->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->pas->Visible) { // pas ?>
	<tr id="r_pas">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_pas"><?php echo $sala_rac_view->pas->caption() ?></span></td>
		<td data-name="pas" <?php echo $sala_rac_view->pas->cellAttributes() ?>>
<span id="el_sala_rac_pas">
<span<?php echo $sala_rac_view->pas->viewAttributes() ?>><?php echo $sala_rac_view->pas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->pad->Visible) { // pad ?>
	<tr id="r_pad">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_pad"><?php echo $sala_rac_view->pad->caption() ?></span></td>
		<td data-name="pad" <?php echo $sala_rac_view->pad->cellAttributes() ?>>
<span id="el_sala_rac_pad">
<span<?php echo $sala_rac_view->pad->viewAttributes() ?>><?php echo $sala_rac_view->pad->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->local_trauma->Visible) { // local_trauma ?>
	<tr id="r_local_trauma">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_local_trauma"><?php echo $sala_rac_view->local_trauma->caption() ?></span></td>
		<td data-name="local_trauma" <?php echo $sala_rac_view->local_trauma->cellAttributes() ?>>
<span id="el_sala_rac_local_trauma">
<span<?php echo $sala_rac_view->local_trauma->viewAttributes() ?>><?php echo $sala_rac_view->local_trauma->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->sistema->Visible) { // sistema ?>
	<tr id="r_sistema">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_sistema"><?php echo $sala_rac_view->sistema->caption() ?></span></td>
		<td data-name="sistema" <?php echo $sala_rac_view->sistema->cellAttributes() ?>>
<span id="el_sala_rac_sistema">
<span<?php echo $sala_rac_view->sistema->viewAttributes() ?>><?php echo $sala_rac_view->sistema->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->nivel_conciencia->Visible) { // nivel_conciencia ?>
	<tr id="r_nivel_conciencia">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_nivel_conciencia"><?php echo $sala_rac_view->nivel_conciencia->caption() ?></span></td>
		<td data-name="nivel_conciencia" <?php echo $sala_rac_view->nivel_conciencia->cellAttributes() ?>>
<span id="el_sala_rac_nivel_conciencia">
<span<?php echo $sala_rac_view->nivel_conciencia->viewAttributes() ?>><?php echo $sala_rac_view->nivel_conciencia->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->dolor->Visible) { // dolor ?>
	<tr id="r_dolor">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_dolor"><?php echo $sala_rac_view->dolor->caption() ?></span></td>
		<td data-name="dolor" <?php echo $sala_rac_view->dolor->cellAttributes() ?>>
<span id="el_sala_rac_dolor">
<span<?php echo $sala_rac_view->dolor->viewAttributes() ?>><?php echo $sala_rac_view->dolor->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->signos_sintomas->Visible) { // signos_sintomas ?>
	<tr id="r_signos_sintomas">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_signos_sintomas"><?php echo $sala_rac_view->signos_sintomas->caption() ?></span></td>
		<td data-name="signos_sintomas" <?php echo $sala_rac_view->signos_sintomas->cellAttributes() ?>>
<span id="el_sala_rac_signos_sintomas">
<span<?php echo $sala_rac_view->signos_sintomas->viewAttributes() ?>><?php echo $sala_rac_view->signos_sintomas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->factores_riesgos->Visible) { // factores_riesgos ?>
	<tr id="r_factores_riesgos">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_factores_riesgos"><?php echo $sala_rac_view->factores_riesgos->caption() ?></span></td>
		<td data-name="factores_riesgos" <?php echo $sala_rac_view->factores_riesgos->cellAttributes() ?>>
<span id="el_sala_rac_factores_riesgos">
<span<?php echo $sala_rac_view->factores_riesgos->viewAttributes() ?>><?php echo $sala_rac_view->factores_riesgos->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->estado_final->Visible) { // estado_final ?>
	<tr id="r_estado_final">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_estado_final"><?php echo $sala_rac_view->estado_final->caption() ?></span></td>
		<td data-name="estado_final" <?php echo $sala_rac_view->estado_final->cellAttributes() ?>>
<span id="el_sala_rac_estado_final">
<span<?php echo $sala_rac_view->estado_final->viewAttributes() ?>><?php echo $sala_rac_view->estado_final->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->tipo_ingreso->Visible) { // tipo_ingreso ?>
	<tr id="r_tipo_ingreso">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_tipo_ingreso"><?php echo $sala_rac_view->tipo_ingreso->caption() ?></span></td>
		<td data-name="tipo_ingreso" <?php echo $sala_rac_view->tipo_ingreso->cellAttributes() ?>>
<span id="el_sala_rac_tipo_ingreso">
<span<?php echo $sala_rac_view->tipo_ingreso->viewAttributes() ?>><?php echo $sala_rac_view->tipo_ingreso->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->hora_clasificacion->Visible) { // hora_clasificacion ?>
	<tr id="r_hora_clasificacion">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_hora_clasificacion"><?php echo $sala_rac_view->hora_clasificacion->caption() ?></span></td>
		<td data-name="hora_clasificacion" <?php echo $sala_rac_view->hora_clasificacion->cellAttributes() ?>>
<span id="el_sala_rac_hora_clasificacion">
<span<?php echo $sala_rac_view->hora_clasificacion->viewAttributes() ?>><?php echo $sala_rac_view->hora_clasificacion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->descripcion_signos->Visible) { // descripcion_signos ?>
	<tr id="r_descripcion_signos">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_descripcion_signos"><?php echo $sala_rac_view->descripcion_signos->caption() ?></span></td>
		<td data-name="descripcion_signos" <?php echo $sala_rac_view->descripcion_signos->cellAttributes() ?>>
<span id="el_sala_rac_descripcion_signos">
<span<?php echo $sala_rac_view->descripcion_signos->viewAttributes() ?>><?php echo $sala_rac_view->descripcion_signos->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->hospital->Visible) { // hospital ?>
	<tr id="r_hospital">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_hospital"><?php echo $sala_rac_view->hospital->caption() ?></span></td>
		<td data-name="hospital" <?php echo $sala_rac_view->hospital->cellAttributes() ?>>
<span id="el_sala_rac_hospital">
<span<?php echo $sala_rac_view->hospital->viewAttributes() ?>><?php echo $sala_rac_view->hospital->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sala_rac_view->motivo_trauma->Visible) { // motivo_trauma ?>
	<tr id="r_motivo_trauma">
		<td class="<?php echo $sala_rac_view->TableLeftColumnClass ?>"><span id="elh_sala_rac_motivo_trauma"><?php echo $sala_rac_view->motivo_trauma->caption() ?></span></td>
		<td data-name="motivo_trauma" <?php echo $sala_rac_view->motivo_trauma->cellAttributes() ?>>
<span id="el_sala_rac_motivo_trauma">
<span<?php echo $sala_rac_view->motivo_trauma->viewAttributes() ?>><?php echo $sala_rac_view->motivo_trauma->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$sala_rac_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$sala_rac_view->isExport()) { ?>
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
$sala_rac_view->terminate();
?>