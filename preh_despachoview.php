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
$preh_despacho_view = new preh_despacho_view();

// Run the page
$preh_despacho_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_despacho_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$preh_despacho_view->isExport()) { ?>
<script>
var fpreh_despachoview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpreh_despachoview = currentForm = new ew.Form("fpreh_despachoview", "view");
	loadjs.done("fpreh_despachoview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$preh_despacho_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $preh_despacho_view->ExportOptions->render("body") ?>
<?php $preh_despacho_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $preh_despacho_view->showPageHeader(); ?>
<?php
$preh_despacho_view->showMessage();
?>
<form name="fpreh_despachoview" id="fpreh_despachoview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_despacho">
<input type="hidden" name="modal" value="<?php echo (int)$preh_despacho_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($preh_despacho_view->cod_casopreh->Visible) { // cod_casopreh ?>
	<tr id="r_cod_casopreh">
		<td class="<?php echo $preh_despacho_view->TableLeftColumnClass ?>"><span id="elh_preh_despacho_cod_casopreh"><?php echo $preh_despacho_view->cod_casopreh->caption() ?></span></td>
		<td data-name="cod_casopreh" <?php echo $preh_despacho_view->cod_casopreh->cellAttributes() ?>>
<span id="el_preh_despacho_cod_casopreh">
<span<?php echo $preh_despacho_view->cod_casopreh->viewAttributes() ?>><?php echo $preh_despacho_view->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_despacho_view->fecha->Visible) { // fecha ?>
	<tr id="r_fecha">
		<td class="<?php echo $preh_despacho_view->TableLeftColumnClass ?>"><span id="elh_preh_despacho_fecha"><?php echo $preh_despacho_view->fecha->caption() ?></span></td>
		<td data-name="fecha" <?php echo $preh_despacho_view->fecha->cellAttributes() ?>>
<span id="el_preh_despacho_fecha">
<span<?php echo $preh_despacho_view->fecha->viewAttributes() ?>><?php echo $preh_despacho_view->fecha->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_despacho_view->prioridad->Visible) { // prioridad ?>
	<tr id="r_prioridad">
		<td class="<?php echo $preh_despacho_view->TableLeftColumnClass ?>"><span id="elh_preh_despacho_prioridad"><?php echo $preh_despacho_view->prioridad->caption() ?></span></td>
		<td data-name="prioridad" <?php echo $preh_despacho_view->prioridad->cellAttributes() ?>>
<span id="el_preh_despacho_prioridad">
<span<?php echo $preh_despacho_view->prioridad->viewAttributes() ?>><?php echo $preh_despacho_view->prioridad->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_despacho_view->nombre_es->Visible) { // nombre_es ?>
	<tr id="r_nombre_es">
		<td class="<?php echo $preh_despacho_view->TableLeftColumnClass ?>"><span id="elh_preh_despacho_nombre_es"><?php echo $preh_despacho_view->nombre_es->caption() ?></span></td>
		<td data-name="nombre_es" <?php echo $preh_despacho_view->nombre_es->cellAttributes() ?>>
<span id="el_preh_despacho_nombre_es">
<span<?php echo $preh_despacho_view->nombre_es->viewAttributes() ?>><?php echo $preh_despacho_view->nombre_es->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_despacho_view->tiempo->Visible) { // tiempo ?>
	<tr id="r_tiempo">
		<td class="<?php echo $preh_despacho_view->TableLeftColumnClass ?>"><span id="elh_preh_despacho_tiempo"><?php echo $preh_despacho_view->tiempo->caption() ?></span></td>
		<td data-name="tiempo" <?php echo $preh_despacho_view->tiempo->cellAttributes() ?>>
<span id="el_preh_despacho_tiempo">
<span<?php echo $preh_despacho_view->tiempo->viewAttributes() ?>><?php
echo "<i class='far fa-clock'></i> ".CurrentPage()->tiempo->CurrentValue. " MIN";
?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_despacho_view->cod_ambulancia->Visible) { // cod_ambulancia ?>
	<tr id="r_cod_ambulancia">
		<td class="<?php echo $preh_despacho_view->TableLeftColumnClass ?>"><span id="elh_preh_despacho_cod_ambulancia"><?php echo $preh_despacho_view->cod_ambulancia->caption() ?></span></td>
		<td data-name="cod_ambulancia" <?php echo $preh_despacho_view->cod_ambulancia->cellAttributes() ?>>
<span id="el_preh_despacho_cod_ambulancia">
<span<?php echo $preh_despacho_view->cod_ambulancia->viewAttributes() ?>><?php echo $preh_despacho_view->cod_ambulancia->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_despacho_view->hora_asigna->Visible) { // hora_asigna ?>
	<tr id="r_hora_asigna">
		<td class="<?php echo $preh_despacho_view->TableLeftColumnClass ?>"><span id="elh_preh_despacho_hora_asigna"><?php echo $preh_despacho_view->hora_asigna->caption() ?></span></td>
		<td data-name="hora_asigna" <?php echo $preh_despacho_view->hora_asigna->cellAttributes() ?>>
<span id="el_preh_despacho_hora_asigna">
<span<?php echo $preh_despacho_view->hora_asigna->viewAttributes() ?>><?php
if (CurrentPage()->hora_asigna->CurrentValue != "")
echo "<i class='fas fa-stopwatch'></i> ".CurrentPage()->hora_asigna->CurrentValue;
?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_despacho_view->hora_llegada->Visible) { // hora_llegada ?>
	<tr id="r_hora_llegada">
		<td class="<?php echo $preh_despacho_view->TableLeftColumnClass ?>"><span id="elh_preh_despacho_hora_llegada"><?php echo $preh_despacho_view->hora_llegada->caption() ?></span></td>
		<td data-name="hora_llegada" <?php echo $preh_despacho_view->hora_llegada->cellAttributes() ?>>
<span id="el_preh_despacho_hora_llegada">
<span<?php echo $preh_despacho_view->hora_llegada->viewAttributes() ?>><?php
if ( CurrentPage()->hora_llegada->CurrentValue != "")
echo "<i class='fas fa-stopwatch'></i> ".CurrentPage()->hora_llegada->CurrentValue;
?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_despacho_view->hora_inicio->Visible) { // hora_inicio ?>
	<tr id="r_hora_inicio">
		<td class="<?php echo $preh_despacho_view->TableLeftColumnClass ?>"><span id="elh_preh_despacho_hora_inicio"><?php echo $preh_despacho_view->hora_inicio->caption() ?></span></td>
		<td data-name="hora_inicio" <?php echo $preh_despacho_view->hora_inicio->cellAttributes() ?>>
<span id="el_preh_despacho_hora_inicio">
<span<?php echo $preh_despacho_view->hora_inicio->viewAttributes() ?>><?php
if (CurrentPage()->hora_inicio->CurrentValue !="")
echo "<i class='fas fa-stopwatch'></i> ".CurrentPage()->hora_inicio->CurrentValue;
?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_despacho_view->hora_destino->Visible) { // hora_destino ?>
	<tr id="r_hora_destino">
		<td class="<?php echo $preh_despacho_view->TableLeftColumnClass ?>"><span id="elh_preh_despacho_hora_destino"><?php echo $preh_despacho_view->hora_destino->caption() ?></span></td>
		<td data-name="hora_destino" <?php echo $preh_despacho_view->hora_destino->cellAttributes() ?>>
<span id="el_preh_despacho_hora_destino">
<span<?php echo $preh_despacho_view->hora_destino->viewAttributes() ?>><?php
if(CurrentPage()->hora_destino->CurrentValue != "")
echo "<i class='fas fa-stopwatch'></i> ".CurrentPage()->hora_destino->CurrentValue;
?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_despacho_view->hora_preposicion->Visible) { // hora_preposicion ?>
	<tr id="r_hora_preposicion">
		<td class="<?php echo $preh_despacho_view->TableLeftColumnClass ?>"><span id="elh_preh_despacho_hora_preposicion"><?php echo $preh_despacho_view->hora_preposicion->caption() ?></span></td>
		<td data-name="hora_preposicion" <?php echo $preh_despacho_view->hora_preposicion->cellAttributes() ?>>
<span id="el_preh_despacho_hora_preposicion">
<span<?php echo $preh_despacho_view->hora_preposicion->viewAttributes() ?>><?php
if(CurrentPage()->hora_preposicion->CurrentValue != "")
echo "<i class='fas fa-stopwatch'></i> ".CurrentPage()->hora_preposicion->CurrentValue;
?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_despacho_view->base->Visible) { // base ?>
	<tr id="r_base">
		<td class="<?php echo $preh_despacho_view->TableLeftColumnClass ?>"><span id="elh_preh_despacho_base"><?php echo $preh_despacho_view->base->caption() ?></span></td>
		<td data-name="base" <?php echo $preh_despacho_view->base->cellAttributes() ?>>
<span id="el_preh_despacho_base">
<span<?php echo $preh_despacho_view->base->viewAttributes() ?>><?php echo $preh_despacho_view->base->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_despacho_view->sede->Visible) { // sede ?>
	<tr id="r_sede">
		<td class="<?php echo $preh_despacho_view->TableLeftColumnClass ?>"><span id="elh_preh_despacho_sede"><?php echo $preh_despacho_view->sede->caption() ?></span></td>
		<td data-name="sede" <?php echo $preh_despacho_view->sede->cellAttributes() ?>>
<span id="el_preh_despacho_sede">
<span<?php echo $preh_despacho_view->sede->viewAttributes() ?>><?php echo $preh_despacho_view->sede->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_despacho_view->cierre->Visible) { // cierre ?>
	<tr id="r_cierre">
		<td class="<?php echo $preh_despacho_view->TableLeftColumnClass ?>"><span id="elh_preh_despacho_cierre"><?php echo $preh_despacho_view->cierre->caption() ?></span></td>
		<td data-name="cierre" <?php echo $preh_despacho_view->cierre->cellAttributes() ?>>
<span id="el_preh_despacho_cierre">
<span<?php echo $preh_despacho_view->cierre->viewAttributes() ?>><?php echo $preh_despacho_view->cierre->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$preh_despacho_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$preh_despacho_view->isExport()) { ?>
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
$preh_despacho_view->terminate();
?>