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
$explo_fisica_registro_view = new explo_fisica_registro_view();

// Run the page
$explo_fisica_registro_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$explo_fisica_registro_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$explo_fisica_registro_view->isExport()) { ?>
<script>
var fexplo_fisica_registroview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fexplo_fisica_registroview = currentForm = new ew.Form("fexplo_fisica_registroview", "view");
	loadjs.done("fexplo_fisica_registroview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$explo_fisica_registro_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $explo_fisica_registro_view->ExportOptions->render("body") ?>
<?php $explo_fisica_registro_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $explo_fisica_registro_view->showPageHeader(); ?>
<?php
$explo_fisica_registro_view->showMessage();
?>
<form name="fexplo_fisica_registroview" id="fexplo_fisica_registroview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="explo_fisica_registro">
<input type="hidden" name="modal" value="<?php echo (int)$explo_fisica_registro_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($explo_fisica_registro_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $explo_fisica_registro_view->TableLeftColumnClass ?>"><span id="elh_explo_fisica_registro_id"><?php echo $explo_fisica_registro_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $explo_fisica_registro_view->id->cellAttributes() ?>>
<span id="el_explo_fisica_registro_id">
<span<?php echo $explo_fisica_registro_view->id->viewAttributes() ?>><?php echo $explo_fisica_registro_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($explo_fisica_registro_view->id_trauma_fisico->Visible) { // id_trauma_fisico ?>
	<tr id="r_id_trauma_fisico">
		<td class="<?php echo $explo_fisica_registro_view->TableLeftColumnClass ?>"><span id="elh_explo_fisica_registro_id_trauma_fisico"><?php echo $explo_fisica_registro_view->id_trauma_fisico->caption() ?></span></td>
		<td data-name="id_trauma_fisico" <?php echo $explo_fisica_registro_view->id_trauma_fisico->cellAttributes() ?>>
<span id="el_explo_fisica_registro_id_trauma_fisico">
<span<?php echo $explo_fisica_registro_view->id_trauma_fisico->viewAttributes() ?>><?php echo $explo_fisica_registro_view->id_trauma_fisico->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($explo_fisica_registro_view->posx->Visible) { // posx ?>
	<tr id="r_posx">
		<td class="<?php echo $explo_fisica_registro_view->TableLeftColumnClass ?>"><span id="elh_explo_fisica_registro_posx"><?php echo $explo_fisica_registro_view->posx->caption() ?></span></td>
		<td data-name="posx" <?php echo $explo_fisica_registro_view->posx->cellAttributes() ?>>
<span id="el_explo_fisica_registro_posx">
<span<?php echo $explo_fisica_registro_view->posx->viewAttributes() ?>><?php echo $explo_fisica_registro_view->posx->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($explo_fisica_registro_view->posy->Visible) { // posy ?>
	<tr id="r_posy">
		<td class="<?php echo $explo_fisica_registro_view->TableLeftColumnClass ?>"><span id="elh_explo_fisica_registro_posy"><?php echo $explo_fisica_registro_view->posy->caption() ?></span></td>
		<td data-name="posy" <?php echo $explo_fisica_registro_view->posy->cellAttributes() ?>>
<span id="el_explo_fisica_registro_posy">
<span<?php echo $explo_fisica_registro_view->posy->viewAttributes() ?>><?php echo $explo_fisica_registro_view->posy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($explo_fisica_registro_view->pos->Visible) { // pos ?>
	<tr id="r_pos">
		<td class="<?php echo $explo_fisica_registro_view->TableLeftColumnClass ?>"><span id="elh_explo_fisica_registro_pos"><?php echo $explo_fisica_registro_view->pos->caption() ?></span></td>
		<td data-name="pos" <?php echo $explo_fisica_registro_view->pos->cellAttributes() ?>>
<span id="el_explo_fisica_registro_pos">
<span<?php echo $explo_fisica_registro_view->pos->viewAttributes() ?>><?php echo $explo_fisica_registro_view->pos->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($explo_fisica_registro_view->cod_casopreh->Visible) { // cod_casopreh ?>
	<tr id="r_cod_casopreh">
		<td class="<?php echo $explo_fisica_registro_view->TableLeftColumnClass ?>"><span id="elh_explo_fisica_registro_cod_casopreh"><?php echo $explo_fisica_registro_view->cod_casopreh->caption() ?></span></td>
		<td data-name="cod_casopreh" <?php echo $explo_fisica_registro_view->cod_casopreh->cellAttributes() ?>>
<span id="el_explo_fisica_registro_cod_casopreh">
<span<?php echo $explo_fisica_registro_view->cod_casopreh->viewAttributes() ?>><?php echo $explo_fisica_registro_view->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$explo_fisica_registro_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$explo_fisica_registro_view->isExport()) { ?>
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
$explo_fisica_registro_view->terminate();
?>