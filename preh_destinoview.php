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
$preh_destino_view = new preh_destino_view();

// Run the page
$preh_destino_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_destino_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$preh_destino_view->isExport()) { ?>
<script>
var fpreh_destinoview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpreh_destinoview = currentForm = new ew.Form("fpreh_destinoview", "view");
	loadjs.done("fpreh_destinoview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$preh_destino_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $preh_destino_view->ExportOptions->render("body") ?>
<?php $preh_destino_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $preh_destino_view->showPageHeader(); ?>
<?php
$preh_destino_view->showMessage();
?>
<form name="fpreh_destinoview" id="fpreh_destinoview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_destino">
<input type="hidden" name="modal" value="<?php echo (int)$preh_destino_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($preh_destino_view->id_destino->Visible) { // id_destino ?>
	<tr id="r_id_destino">
		<td class="<?php echo $preh_destino_view->TableLeftColumnClass ?>"><span id="elh_preh_destino_id_destino"><?php echo $preh_destino_view->id_destino->caption() ?></span></td>
		<td data-name="id_destino" <?php echo $preh_destino_view->id_destino->cellAttributes() ?>>
<span id="el_preh_destino_id_destino">
<span<?php echo $preh_destino_view->id_destino->viewAttributes() ?>><?php echo $preh_destino_view->id_destino->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_destino_view->cod_casopreh->Visible) { // cod_casopreh ?>
	<tr id="r_cod_casopreh">
		<td class="<?php echo $preh_destino_view->TableLeftColumnClass ?>"><span id="elh_preh_destino_cod_casopreh"><?php echo $preh_destino_view->cod_casopreh->caption() ?></span></td>
		<td data-name="cod_casopreh" <?php echo $preh_destino_view->cod_casopreh->cellAttributes() ?>>
<span id="el_preh_destino_cod_casopreh">
<span<?php echo $preh_destino_view->cod_casopreh->viewAttributes() ?>><?php echo $preh_destino_view->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_destino_view->cod_hospitaldestino->Visible) { // cod_hospitaldestino ?>
	<tr id="r_cod_hospitaldestino">
		<td class="<?php echo $preh_destino_view->TableLeftColumnClass ?>"><span id="elh_preh_destino_cod_hospitaldestino"><?php echo $preh_destino_view->cod_hospitaldestino->caption() ?></span></td>
		<td data-name="cod_hospitaldestino" <?php echo $preh_destino_view->cod_hospitaldestino->cellAttributes() ?>>
<span id="el_preh_destino_cod_hospitaldestino">
<span<?php echo $preh_destino_view->cod_hospitaldestino->viewAttributes() ?>><?php echo $preh_destino_view->cod_hospitaldestino->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_destino_view->nom_medicorecibe->Visible) { // nom_medicorecibe ?>
	<tr id="r_nom_medicorecibe">
		<td class="<?php echo $preh_destino_view->TableLeftColumnClass ?>"><span id="elh_preh_destino_nom_medicorecibe"><?php echo $preh_destino_view->nom_medicorecibe->caption() ?></span></td>
		<td data-name="nom_medicorecibe" <?php echo $preh_destino_view->nom_medicorecibe->cellAttributes() ?>>
<span id="el_preh_destino_nom_medicorecibe">
<span<?php echo $preh_destino_view->nom_medicorecibe->viewAttributes() ?>><?php echo $preh_destino_view->nom_medicorecibe->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($preh_destino_view->telefono_medico->Visible) { // telefono_medico ?>
	<tr id="r_telefono_medico">
		<td class="<?php echo $preh_destino_view->TableLeftColumnClass ?>"><span id="elh_preh_destino_telefono_medico"><?php echo $preh_destino_view->telefono_medico->caption() ?></span></td>
		<td data-name="telefono_medico" <?php echo $preh_destino_view->telefono_medico->cellAttributes() ?>>
<span id="el_preh_destino_telefono_medico">
<span<?php echo $preh_destino_view->telefono_medico->viewAttributes() ?>><?php echo $preh_destino_view->telefono_medico->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$preh_destino_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$preh_destino_view->isExport()) { ?>
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
$preh_destino_view->terminate();
?>