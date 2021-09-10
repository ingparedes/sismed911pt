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
$firmas_registro_view = new firmas_registro_view();

// Run the page
$firmas_registro_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$firmas_registro_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$firmas_registro_view->isExport()) { ?>
<script>
var ffirmas_registroview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ffirmas_registroview = currentForm = new ew.Form("ffirmas_registroview", "view");
	loadjs.done("ffirmas_registroview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$firmas_registro_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $firmas_registro_view->ExportOptions->render("body") ?>
<?php $firmas_registro_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $firmas_registro_view->showPageHeader(); ?>
<?php
$firmas_registro_view->showMessage();
?>
<form name="ffirmas_registroview" id="ffirmas_registroview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="firmas_registro">
<input type="hidden" name="modal" value="<?php echo (int)$firmas_registro_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($firmas_registro_view->posx->Visible) { // posx ?>
	<tr id="r_posx">
		<td class="<?php echo $firmas_registro_view->TableLeftColumnClass ?>"><span id="elh_firmas_registro_posx"><?php echo $firmas_registro_view->posx->caption() ?></span></td>
		<td data-name="posx" <?php echo $firmas_registro_view->posx->cellAttributes() ?>>
<span id="el_firmas_registro_posx">
<span<?php echo $firmas_registro_view->posx->viewAttributes() ?>><?php echo $firmas_registro_view->posx->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($firmas_registro_view->posy->Visible) { // posy ?>
	<tr id="r_posy">
		<td class="<?php echo $firmas_registro_view->TableLeftColumnClass ?>"><span id="elh_firmas_registro_posy"><?php echo $firmas_registro_view->posy->caption() ?></span></td>
		<td data-name="posy" <?php echo $firmas_registro_view->posy->cellAttributes() ?>>
<span id="el_firmas_registro_posy">
<span<?php echo $firmas_registro_view->posy->viewAttributes() ?>><?php echo $firmas_registro_view->posy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($firmas_registro_view->cod_casopreh->Visible) { // cod_casopreh ?>
	<tr id="r_cod_casopreh">
		<td class="<?php echo $firmas_registro_view->TableLeftColumnClass ?>"><span id="elh_firmas_registro_cod_casopreh"><?php echo $firmas_registro_view->cod_casopreh->caption() ?></span></td>
		<td data-name="cod_casopreh" <?php echo $firmas_registro_view->cod_casopreh->cellAttributes() ?>>
<span id="el_firmas_registro_cod_casopreh">
<span<?php echo $firmas_registro_view->cod_casopreh->viewAttributes() ?>><?php echo $firmas_registro_view->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($firmas_registro_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $firmas_registro_view->TableLeftColumnClass ?>"><span id="elh_firmas_registro_id"><?php echo $firmas_registro_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $firmas_registro_view->id->cellAttributes() ?>>
<span id="el_firmas_registro_id">
<span<?php echo $firmas_registro_view->id->viewAttributes() ?>><?php echo $firmas_registro_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($firmas_registro_view->ancho->Visible) { // ancho ?>
	<tr id="r_ancho">
		<td class="<?php echo $firmas_registro_view->TableLeftColumnClass ?>"><span id="elh_firmas_registro_ancho"><?php echo $firmas_registro_view->ancho->caption() ?></span></td>
		<td data-name="ancho" <?php echo $firmas_registro_view->ancho->cellAttributes() ?>>
<span id="el_firmas_registro_ancho">
<span<?php echo $firmas_registro_view->ancho->viewAttributes() ?>><?php echo $firmas_registro_view->ancho->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$firmas_registro_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$firmas_registro_view->isExport()) { ?>
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
$firmas_registro_view->terminate();
?>