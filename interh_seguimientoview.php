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
$interh_seguimiento_view = new interh_seguimiento_view();

// Run the page
$interh_seguimiento_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_seguimiento_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$interh_seguimiento_view->isExport()) { ?>
<script>
var finterh_seguimientoview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	finterh_seguimientoview = currentForm = new ew.Form("finterh_seguimientoview", "view");
	loadjs.done("finterh_seguimientoview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$interh_seguimiento_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $interh_seguimiento_view->ExportOptions->render("body") ?>
<?php $interh_seguimiento_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $interh_seguimiento_view->showPageHeader(); ?>
<?php
$interh_seguimiento_view->showMessage();
?>
<form name="finterh_seguimientoview" id="finterh_seguimientoview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="interh_seguimiento">
<input type="hidden" name="modal" value="<?php echo (int)$interh_seguimiento_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($interh_seguimiento_view->id_seguimiento->Visible) { // id_seguimiento ?>
	<tr id="r_id_seguimiento">
		<td class="<?php echo $interh_seguimiento_view->TableLeftColumnClass ?>"><span id="elh_interh_seguimiento_id_seguimiento"><?php echo $interh_seguimiento_view->id_seguimiento->caption() ?></span></td>
		<td data-name="id_seguimiento" <?php echo $interh_seguimiento_view->id_seguimiento->cellAttributes() ?>>
<span id="el_interh_seguimiento_id_seguimiento">
<span<?php echo $interh_seguimiento_view->id_seguimiento->viewAttributes() ?>><?php echo $interh_seguimiento_view->id_seguimiento->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($interh_seguimiento_view->fecha_seguimento->Visible) { // fecha_seguimento ?>
	<tr id="r_fecha_seguimento">
		<td class="<?php echo $interh_seguimiento_view->TableLeftColumnClass ?>"><span id="elh_interh_seguimiento_fecha_seguimento"><?php echo $interh_seguimiento_view->fecha_seguimento->caption() ?></span></td>
		<td data-name="fecha_seguimento" <?php echo $interh_seguimiento_view->fecha_seguimento->cellAttributes() ?>>
<span id="el_interh_seguimiento_fecha_seguimento">
<span<?php echo $interh_seguimiento_view->fecha_seguimento->viewAttributes() ?>><?php echo $interh_seguimiento_view->fecha_seguimento->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($interh_seguimiento_view->cod_casointerh->Visible) { // cod_casointerh ?>
	<tr id="r_cod_casointerh">
		<td class="<?php echo $interh_seguimiento_view->TableLeftColumnClass ?>"><span id="elh_interh_seguimiento_cod_casointerh"><?php echo $interh_seguimiento_view->cod_casointerh->caption() ?></span></td>
		<td data-name="cod_casointerh" <?php echo $interh_seguimiento_view->cod_casointerh->cellAttributes() ?>>
<span id="el_interh_seguimiento_cod_casointerh">
<span<?php echo $interh_seguimiento_view->cod_casointerh->viewAttributes() ?>><?php echo $interh_seguimiento_view->cod_casointerh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($interh_seguimiento_view->seguimento->Visible) { // seguimento ?>
	<tr id="r_seguimento">
		<td class="<?php echo $interh_seguimiento_view->TableLeftColumnClass ?>"><span id="elh_interh_seguimiento_seguimento"><?php echo $interh_seguimiento_view->seguimento->caption() ?></span></td>
		<td data-name="seguimento" <?php echo $interh_seguimiento_view->seguimento->cellAttributes() ?>>
<span id="el_interh_seguimiento_seguimento">
<span<?php echo $interh_seguimiento_view->seguimento->viewAttributes() ?>><?php echo $interh_seguimiento_view->seguimento->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$interh_seguimiento_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$interh_seguimiento_view->isExport()) { ?>
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
$interh_seguimiento_view->terminate();
?>