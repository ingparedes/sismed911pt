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
$procedimiento_registro_view = new procedimiento_registro_view();

// Run the page
$procedimiento_registro_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$procedimiento_registro_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$procedimiento_registro_view->isExport()) { ?>
<script>
var fprocedimiento_registroview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fprocedimiento_registroview = currentForm = new ew.Form("fprocedimiento_registroview", "view");
	loadjs.done("fprocedimiento_registroview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$procedimiento_registro_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $procedimiento_registro_view->ExportOptions->render("body") ?>
<?php $procedimiento_registro_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $procedimiento_registro_view->showPageHeader(); ?>
<?php
$procedimiento_registro_view->showMessage();
?>
<form name="fprocedimiento_registroview" id="fprocedimiento_registroview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="procedimiento_registro">
<input type="hidden" name="modal" value="<?php echo (int)$procedimiento_registro_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($procedimiento_registro_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $procedimiento_registro_view->TableLeftColumnClass ?>"><span id="elh_procedimiento_registro_id"><?php echo $procedimiento_registro_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $procedimiento_registro_view->id->cellAttributes() ?>>
<span id="el_procedimiento_registro_id">
<span<?php echo $procedimiento_registro_view->id->viewAttributes() ?>><?php echo $procedimiento_registro_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($procedimiento_registro_view->cod_casopreh->Visible) { // cod_casopreh ?>
	<tr id="r_cod_casopreh">
		<td class="<?php echo $procedimiento_registro_view->TableLeftColumnClass ?>"><span id="elh_procedimiento_registro_cod_casopreh"><?php echo $procedimiento_registro_view->cod_casopreh->caption() ?></span></td>
		<td data-name="cod_casopreh" <?php echo $procedimiento_registro_view->cod_casopreh->cellAttributes() ?>>
<span id="el_procedimiento_registro_cod_casopreh">
<span<?php echo $procedimiento_registro_view->cod_casopreh->viewAttributes() ?>><?php echo $procedimiento_registro_view->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($procedimiento_registro_view->procedimiento_tipo_id->Visible) { // procedimiento_tipo_id ?>
	<tr id="r_procedimiento_tipo_id">
		<td class="<?php echo $procedimiento_registro_view->TableLeftColumnClass ?>"><span id="elh_procedimiento_registro_procedimiento_tipo_id"><?php echo $procedimiento_registro_view->procedimiento_tipo_id->caption() ?></span></td>
		<td data-name="procedimiento_tipo_id" <?php echo $procedimiento_registro_view->procedimiento_tipo_id->cellAttributes() ?>>
<span id="el_procedimiento_registro_procedimiento_tipo_id">
<span<?php echo $procedimiento_registro_view->procedimiento_tipo_id->viewAttributes() ?>><?php echo $procedimiento_registro_view->procedimiento_tipo_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$procedimiento_registro_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$procedimiento_registro_view->isExport()) { ?>
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
$procedimiento_registro_view->terminate();
?>