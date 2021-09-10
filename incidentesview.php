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
$incidentes_view = new incidentes_view();

// Run the page
$incidentes_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$incidentes_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$incidentes_view->isExport()) { ?>
<script>
var fincidentesview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fincidentesview = currentForm = new ew.Form("fincidentesview", "view");
	loadjs.done("fincidentesview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$incidentes_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $incidentes_view->ExportOptions->render("body") ?>
<?php $incidentes_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $incidentes_view->showPageHeader(); ?>
<?php
$incidentes_view->showMessage();
?>
<form name="fincidentesview" id="fincidentesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="incidentes">
<input type="hidden" name="modal" value="<?php echo (int)$incidentes_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($incidentes_view->id_incidente->Visible) { // id_incidente ?>
	<tr id="r_id_incidente">
		<td class="<?php echo $incidentes_view->TableLeftColumnClass ?>"><span id="elh_incidentes_id_incidente"><?php echo $incidentes_view->id_incidente->caption() ?></span></td>
		<td data-name="id_incidente" <?php echo $incidentes_view->id_incidente->cellAttributes() ?>>
<span id="el_incidentes_id_incidente">
<span<?php echo $incidentes_view->id_incidente->viewAttributes() ?>><?php echo $incidentes_view->id_incidente->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($incidentes_view->incidente_es->Visible) { // incidente_es ?>
	<tr id="r_incidente_es">
		<td class="<?php echo $incidentes_view->TableLeftColumnClass ?>"><span id="elh_incidentes_incidente_es"><?php echo $incidentes_view->incidente_es->caption() ?></span></td>
		<td data-name="incidente_es" <?php echo $incidentes_view->incidente_es->cellAttributes() ?>>
<span id="el_incidentes_incidente_es">
<span<?php echo $incidentes_view->incidente_es->viewAttributes() ?>><?php echo $incidentes_view->incidente_es->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($incidentes_view->nombre_es->Visible) { // nombre_es ?>
	<tr id="r_nombre_es">
		<td class="<?php echo $incidentes_view->TableLeftColumnClass ?>"><span id="elh_incidentes_nombre_es"><?php echo $incidentes_view->nombre_es->caption() ?></span></td>
		<td data-name="nombre_es" <?php echo $incidentes_view->nombre_es->cellAttributes() ?>>
<span id="el_incidentes_nombre_es">
<span<?php echo $incidentes_view->nombre_es->viewAttributes() ?>><?php echo $incidentes_view->nombre_es->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($incidentes_view->incidente_en->Visible) { // incidente_en ?>
	<tr id="r_incidente_en">
		<td class="<?php echo $incidentes_view->TableLeftColumnClass ?>"><span id="elh_incidentes_incidente_en"><?php echo $incidentes_view->incidente_en->caption() ?></span></td>
		<td data-name="incidente_en" <?php echo $incidentes_view->incidente_en->cellAttributes() ?>>
<span id="el_incidentes_incidente_en">
<span<?php echo $incidentes_view->incidente_en->viewAttributes() ?>><?php echo $incidentes_view->incidente_en->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($incidentes_view->nombre_en->Visible) { // nombre_en ?>
	<tr id="r_nombre_en">
		<td class="<?php echo $incidentes_view->TableLeftColumnClass ?>"><span id="elh_incidentes_nombre_en"><?php echo $incidentes_view->nombre_en->caption() ?></span></td>
		<td data-name="nombre_en" <?php echo $incidentes_view->nombre_en->cellAttributes() ?>>
<span id="el_incidentes_nombre_en">
<span<?php echo $incidentes_view->nombre_en->viewAttributes() ?>><?php echo $incidentes_view->nombre_en->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($incidentes_view->incidente_fr->Visible) { // incidente_fr ?>
	<tr id="r_incidente_fr">
		<td class="<?php echo $incidentes_view->TableLeftColumnClass ?>"><span id="elh_incidentes_incidente_fr"><?php echo $incidentes_view->incidente_fr->caption() ?></span></td>
		<td data-name="incidente_fr" <?php echo $incidentes_view->incidente_fr->cellAttributes() ?>>
<span id="el_incidentes_incidente_fr">
<span<?php echo $incidentes_view->incidente_fr->viewAttributes() ?>><?php echo $incidentes_view->incidente_fr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($incidentes_view->nombre_fr->Visible) { // nombre_fr ?>
	<tr id="r_nombre_fr">
		<td class="<?php echo $incidentes_view->TableLeftColumnClass ?>"><span id="elh_incidentes_nombre_fr"><?php echo $incidentes_view->nombre_fr->caption() ?></span></td>
		<td data-name="nombre_fr" <?php echo $incidentes_view->nombre_fr->cellAttributes() ?>>
<span id="el_incidentes_nombre_fr">
<span<?php echo $incidentes_view->nombre_fr->viewAttributes() ?>><?php echo $incidentes_view->nombre_fr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($incidentes_view->incidente_pt->Visible) { // incidente_pt ?>
	<tr id="r_incidente_pt">
		<td class="<?php echo $incidentes_view->TableLeftColumnClass ?>"><span id="elh_incidentes_incidente_pt"><?php echo $incidentes_view->incidente_pt->caption() ?></span></td>
		<td data-name="incidente_pt" <?php echo $incidentes_view->incidente_pt->cellAttributes() ?>>
<span id="el_incidentes_incidente_pt">
<span<?php echo $incidentes_view->incidente_pt->viewAttributes() ?>><?php echo $incidentes_view->incidente_pt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($incidentes_view->nombre_pt->Visible) { // nombre_pt ?>
	<tr id="r_nombre_pt">
		<td class="<?php echo $incidentes_view->TableLeftColumnClass ?>"><span id="elh_incidentes_nombre_pt"><?php echo $incidentes_view->nombre_pt->caption() ?></span></td>
		<td data-name="nombre_pt" <?php echo $incidentes_view->nombre_pt->cellAttributes() ?>>
<span id="el_incidentes_nombre_pt">
<span<?php echo $incidentes_view->nombre_pt->viewAttributes() ?>><?php echo $incidentes_view->nombre_pt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$incidentes_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$incidentes_view->isExport()) { ?>
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
$incidentes_view->terminate();
?>