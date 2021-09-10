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
$cie10_view = new cie10_view();

// Run the page
$cie10_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$cie10_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$cie10_view->isExport()) { ?>
<script>
var fcie10view, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fcie10view = currentForm = new ew.Form("fcie10view", "view");
	loadjs.done("fcie10view");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$cie10_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $cie10_view->ExportOptions->render("body") ?>
<?php $cie10_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $cie10_view->showPageHeader(); ?>
<?php
$cie10_view->showMessage();
?>
<form name="fcie10view" id="fcie10view" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="cie10">
<input type="hidden" name="modal" value="<?php echo (int)$cie10_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($cie10_view->codigo_cie->Visible) { // codigo_cie ?>
	<tr id="r_codigo_cie">
		<td class="<?php echo $cie10_view->TableLeftColumnClass ?>"><span id="elh_cie10_codigo_cie"><?php echo $cie10_view->codigo_cie->caption() ?></span></td>
		<td data-name="codigo_cie" <?php echo $cie10_view->codigo_cie->cellAttributes() ?>>
<span id="el_cie10_codigo_cie">
<span<?php echo $cie10_view->codigo_cie->viewAttributes() ?>><?php echo $cie10_view->codigo_cie->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cie10_view->diagnostico->Visible) { // diagnostico ?>
	<tr id="r_diagnostico">
		<td class="<?php echo $cie10_view->TableLeftColumnClass ?>"><span id="elh_cie10_diagnostico"><?php echo $cie10_view->diagnostico->caption() ?></span></td>
		<td data-name="diagnostico" <?php echo $cie10_view->diagnostico->cellAttributes() ?>>
<span id="el_cie10_diagnostico">
<span<?php echo $cie10_view->diagnostico->viewAttributes() ?>><?php echo $cie10_view->diagnostico->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cie10_view->nivel->Visible) { // nivel ?>
	<tr id="r_nivel">
		<td class="<?php echo $cie10_view->TableLeftColumnClass ?>"><span id="elh_cie10_nivel"><?php echo $cie10_view->nivel->caption() ?></span></td>
		<td data-name="nivel" <?php echo $cie10_view->nivel->cellAttributes() ?>>
<span id="el_cie10_nivel">
<span<?php echo $cie10_view->nivel->viewAttributes() ?>><?php echo $cie10_view->nivel->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cie10_view->grupo->Visible) { // grupo ?>
	<tr id="r_grupo">
		<td class="<?php echo $cie10_view->TableLeftColumnClass ?>"><span id="elh_cie10_grupo"><?php echo $cie10_view->grupo->caption() ?></span></td>
		<td data-name="grupo" <?php echo $cie10_view->grupo->cellAttributes() ?>>
<span id="el_cie10_grupo">
<span<?php echo $cie10_view->grupo->viewAttributes() ?>><?php echo $cie10_view->grupo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cie10_view->sexo->Visible) { // sexo ?>
	<tr id="r_sexo">
		<td class="<?php echo $cie10_view->TableLeftColumnClass ?>"><span id="elh_cie10_sexo"><?php echo $cie10_view->sexo->caption() ?></span></td>
		<td data-name="sexo" <?php echo $cie10_view->sexo->cellAttributes() ?>>
<span id="el_cie10_sexo">
<span<?php echo $cie10_view->sexo->viewAttributes() ?>><?php echo $cie10_view->sexo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cie10_view->clasificacion->Visible) { // clasificacion ?>
	<tr id="r_clasificacion">
		<td class="<?php echo $cie10_view->TableLeftColumnClass ?>"><span id="elh_cie10_clasificacion"><?php echo $cie10_view->clasificacion->caption() ?></span></td>
		<td data-name="clasificacion" <?php echo $cie10_view->clasificacion->cellAttributes() ?>>
<span id="el_cie10_clasificacion">
<span<?php echo $cie10_view->clasificacion->viewAttributes() ?>><?php echo $cie10_view->clasificacion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cie10_view->cod->Visible) { // cod ?>
	<tr id="r_cod">
		<td class="<?php echo $cie10_view->TableLeftColumnClass ?>"><span id="elh_cie10_cod"><?php echo $cie10_view->cod->caption() ?></span></td>
		<td data-name="cod" <?php echo $cie10_view->cod->cellAttributes() ?>>
<span id="el_cie10_cod">
<span<?php echo $cie10_view->cod->viewAttributes() ?>><?php echo $cie10_view->cod->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cie10_view->notifica->Visible) { // notifica ?>
	<tr id="r_notifica">
		<td class="<?php echo $cie10_view->TableLeftColumnClass ?>"><span id="elh_cie10_notifica"><?php echo $cie10_view->notifica->caption() ?></span></td>
		<td data-name="notifica" <?php echo $cie10_view->notifica->cellAttributes() ?>>
<span id="el_cie10_notifica">
<span<?php echo $cie10_view->notifica->viewAttributes() ?>><?php echo $cie10_view->notifica->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cie10_view->soat->Visible) { // soat ?>
	<tr id="r_soat">
		<td class="<?php echo $cie10_view->TableLeftColumnClass ?>"><span id="elh_cie10_soat"><?php echo $cie10_view->soat->caption() ?></span></td>
		<td data-name="soat" <?php echo $cie10_view->soat->cellAttributes() ?>>
<span id="el_cie10_soat">
<span<?php echo $cie10_view->soat->viewAttributes() ?>><?php echo $cie10_view->soat->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cie10_view->diagnostico_en->Visible) { // diagnostico_en ?>
	<tr id="r_diagnostico_en">
		<td class="<?php echo $cie10_view->TableLeftColumnClass ?>"><span id="elh_cie10_diagnostico_en"><?php echo $cie10_view->diagnostico_en->caption() ?></span></td>
		<td data-name="diagnostico_en" <?php echo $cie10_view->diagnostico_en->cellAttributes() ?>>
<span id="el_cie10_diagnostico_en">
<span<?php echo $cie10_view->diagnostico_en->viewAttributes() ?>><?php echo $cie10_view->diagnostico_en->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cie10_view->diagnostico_pr->Visible) { // diagnostico_pr ?>
	<tr id="r_diagnostico_pr">
		<td class="<?php echo $cie10_view->TableLeftColumnClass ?>"><span id="elh_cie10_diagnostico_pr"><?php echo $cie10_view->diagnostico_pr->caption() ?></span></td>
		<td data-name="diagnostico_pr" <?php echo $cie10_view->diagnostico_pr->cellAttributes() ?>>
<span id="el_cie10_diagnostico_pr">
<span<?php echo $cie10_view->diagnostico_pr->viewAttributes() ?>><?php echo $cie10_view->diagnostico_pr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($cie10_view->diagnostico_fr->Visible) { // diagnostico_fr ?>
	<tr id="r_diagnostico_fr">
		<td class="<?php echo $cie10_view->TableLeftColumnClass ?>"><span id="elh_cie10_diagnostico_fr"><?php echo $cie10_view->diagnostico_fr->caption() ?></span></td>
		<td data-name="diagnostico_fr" <?php echo $cie10_view->diagnostico_fr->cellAttributes() ?>>
<span id="el_cie10_diagnostico_fr">
<span<?php echo $cie10_view->diagnostico_fr->viewAttributes() ?>><?php echo $cie10_view->diagnostico_fr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$cie10_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$cie10_view->isExport()) { ?>
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
$cie10_view->terminate();
?>