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
$antecedentes_registro_view = new antecedentes_registro_view();

// Run the page
$antecedentes_registro_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$antecedentes_registro_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$antecedentes_registro_view->isExport()) { ?>
<script>
var fantecedentes_registroview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fantecedentes_registroview = currentForm = new ew.Form("fantecedentes_registroview", "view");
	loadjs.done("fantecedentes_registroview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$antecedentes_registro_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $antecedentes_registro_view->ExportOptions->render("body") ?>
<?php $antecedentes_registro_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $antecedentes_registro_view->showPageHeader(); ?>
<?php
$antecedentes_registro_view->showMessage();
?>
<form name="fantecedentes_registroview" id="fantecedentes_registroview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="antecedentes_registro">
<input type="hidden" name="modal" value="<?php echo (int)$antecedentes_registro_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($antecedentes_registro_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $antecedentes_registro_view->TableLeftColumnClass ?>"><span id="elh_antecedentes_registro_id"><?php echo $antecedentes_registro_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $antecedentes_registro_view->id->cellAttributes() ?>>
<span id="el_antecedentes_registro_id">
<span<?php echo $antecedentes_registro_view->id->viewAttributes() ?>><?php echo $antecedentes_registro_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($antecedentes_registro_view->cod_casopreh->Visible) { // cod_casopreh ?>
	<tr id="r_cod_casopreh">
		<td class="<?php echo $antecedentes_registro_view->TableLeftColumnClass ?>"><span id="elh_antecedentes_registro_cod_casopreh"><?php echo $antecedentes_registro_view->cod_casopreh->caption() ?></span></td>
		<td data-name="cod_casopreh" <?php echo $antecedentes_registro_view->cod_casopreh->cellAttributes() ?>>
<span id="el_antecedentes_registro_cod_casopreh">
<span<?php echo $antecedentes_registro_view->cod_casopreh->viewAttributes() ?>><?php echo $antecedentes_registro_view->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($antecedentes_registro_view->diabetes->Visible) { // diabetes ?>
	<tr id="r_diabetes">
		<td class="<?php echo $antecedentes_registro_view->TableLeftColumnClass ?>"><span id="elh_antecedentes_registro_diabetes"><?php echo $antecedentes_registro_view->diabetes->caption() ?></span></td>
		<td data-name="diabetes" <?php echo $antecedentes_registro_view->diabetes->cellAttributes() ?>>
<span id="el_antecedentes_registro_diabetes">
<span<?php echo $antecedentes_registro_view->diabetes->viewAttributes() ?>><?php echo $antecedentes_registro_view->diabetes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($antecedentes_registro_view->cardiopatia->Visible) { // cardiopatia ?>
	<tr id="r_cardiopatia">
		<td class="<?php echo $antecedentes_registro_view->TableLeftColumnClass ?>"><span id="elh_antecedentes_registro_cardiopatia"><?php echo $antecedentes_registro_view->cardiopatia->caption() ?></span></td>
		<td data-name="cardiopatia" <?php echo $antecedentes_registro_view->cardiopatia->cellAttributes() ?>>
<span id="el_antecedentes_registro_cardiopatia">
<span<?php echo $antecedentes_registro_view->cardiopatia->viewAttributes() ?>><?php echo $antecedentes_registro_view->cardiopatia->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($antecedentes_registro_view->convulsiones->Visible) { // convulsiones ?>
	<tr id="r_convulsiones">
		<td class="<?php echo $antecedentes_registro_view->TableLeftColumnClass ?>"><span id="elh_antecedentes_registro_convulsiones"><?php echo $antecedentes_registro_view->convulsiones->caption() ?></span></td>
		<td data-name="convulsiones" <?php echo $antecedentes_registro_view->convulsiones->cellAttributes() ?>>
<span id="el_antecedentes_registro_convulsiones">
<span<?php echo $antecedentes_registro_view->convulsiones->viewAttributes() ?>><?php echo $antecedentes_registro_view->convulsiones->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($antecedentes_registro_view->asmabronquitis->Visible) { // asmabronquitis ?>
	<tr id="r_asmabronquitis">
		<td class="<?php echo $antecedentes_registro_view->TableLeftColumnClass ?>"><span id="elh_antecedentes_registro_asmabronquitis"><?php echo $antecedentes_registro_view->asmabronquitis->caption() ?></span></td>
		<td data-name="asmabronquitis" <?php echo $antecedentes_registro_view->asmabronquitis->cellAttributes() ?>>
<span id="el_antecedentes_registro_asmabronquitis">
<span<?php echo $antecedentes_registro_view->asmabronquitis->viewAttributes() ?>><?php echo $antecedentes_registro_view->asmabronquitis->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($antecedentes_registro_view->acv->Visible) { // acv ?>
	<tr id="r_acv">
		<td class="<?php echo $antecedentes_registro_view->TableLeftColumnClass ?>"><span id="elh_antecedentes_registro_acv"><?php echo $antecedentes_registro_view->acv->caption() ?></span></td>
		<td data-name="acv" <?php echo $antecedentes_registro_view->acv->cellAttributes() ?>>
<span id="el_antecedentes_registro_acv">
<span<?php echo $antecedentes_registro_view->acv->viewAttributes() ?>><?php echo $antecedentes_registro_view->acv->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($antecedentes_registro_view->has->Visible) { // has ?>
	<tr id="r_has">
		<td class="<?php echo $antecedentes_registro_view->TableLeftColumnClass ?>"><span id="elh_antecedentes_registro_has"><?php echo $antecedentes_registro_view->has->caption() ?></span></td>
		<td data-name="has" <?php echo $antecedentes_registro_view->has->cellAttributes() ?>>
<span id="el_antecedentes_registro_has">
<span<?php echo $antecedentes_registro_view->has->viewAttributes() ?>><?php echo $antecedentes_registro_view->has->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($antecedentes_registro_view->alergia->Visible) { // alergia ?>
	<tr id="r_alergia">
		<td class="<?php echo $antecedentes_registro_view->TableLeftColumnClass ?>"><span id="elh_antecedentes_registro_alergia"><?php echo $antecedentes_registro_view->alergia->caption() ?></span></td>
		<td data-name="alergia" <?php echo $antecedentes_registro_view->alergia->cellAttributes() ?>>
<span id="el_antecedentes_registro_alergia">
<span<?php echo $antecedentes_registro_view->alergia->viewAttributes() ?>><?php echo $antecedentes_registro_view->alergia->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($antecedentes_registro_view->medicamentos->Visible) { // medicamentos ?>
	<tr id="r_medicamentos">
		<td class="<?php echo $antecedentes_registro_view->TableLeftColumnClass ?>"><span id="elh_antecedentes_registro_medicamentos"><?php echo $antecedentes_registro_view->medicamentos->caption() ?></span></td>
		<td data-name="medicamentos" <?php echo $antecedentes_registro_view->medicamentos->cellAttributes() ?>>
<span id="el_antecedentes_registro_medicamentos">
<span<?php echo $antecedentes_registro_view->medicamentos->viewAttributes() ?>><?php echo $antecedentes_registro_view->medicamentos->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($antecedentes_registro_view->otros->Visible) { // otros ?>
	<tr id="r_otros">
		<td class="<?php echo $antecedentes_registro_view->TableLeftColumnClass ?>"><span id="elh_antecedentes_registro_otros"><?php echo $antecedentes_registro_view->otros->caption() ?></span></td>
		<td data-name="otros" <?php echo $antecedentes_registro_view->otros->cellAttributes() ?>>
<span id="el_antecedentes_registro_otros">
<span<?php echo $antecedentes_registro_view->otros->viewAttributes() ?>><?php echo $antecedentes_registro_view->otros->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$antecedentes_registro_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$antecedentes_registro_view->isExport()) { ?>
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
$antecedentes_registro_view->terminate();
?>