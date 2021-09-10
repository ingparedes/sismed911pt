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
$triage_view = new triage_view();

// Run the page
$triage_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$triage_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$triage_view->isExport()) { ?>
<script>
var ftriageview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ftriageview = currentForm = new ew.Form("ftriageview", "view");
	loadjs.done("ftriageview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$triage_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $triage_view->ExportOptions->render("body") ?>
<?php $triage_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $triage_view->showPageHeader(); ?>
<?php
$triage_view->showMessage();
?>
<form name="ftriageview" id="ftriageview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="triage">
<input type="hidden" name="modal" value="<?php echo (int)$triage_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($triage_view->id_triage->Visible) { // id_triage ?>
	<tr id="r_id_triage">
		<td class="<?php echo $triage_view->TableLeftColumnClass ?>"><span id="elh_triage_id_triage"><?php echo $triage_view->id_triage->caption() ?></span></td>
		<td data-name="id_triage" <?php echo $triage_view->id_triage->cellAttributes() ?>>
<span id="el_triage_id_triage">
<span<?php echo $triage_view->id_triage->viewAttributes() ?>><?php echo $triage_view->id_triage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($triage_view->nombre_triage_es->Visible) { // nombre_triage_es ?>
	<tr id="r_nombre_triage_es">
		<td class="<?php echo $triage_view->TableLeftColumnClass ?>"><span id="elh_triage_nombre_triage_es"><?php echo $triage_view->nombre_triage_es->caption() ?></span></td>
		<td data-name="nombre_triage_es" <?php echo $triage_view->nombre_triage_es->cellAttributes() ?>>
<span id="el_triage_nombre_triage_es">
<span<?php echo $triage_view->nombre_triage_es->viewAttributes() ?>><?php echo $triage_view->nombre_triage_es->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($triage_view->nombre_triage_en->Visible) { // nombre_triage_en ?>
	<tr id="r_nombre_triage_en">
		<td class="<?php echo $triage_view->TableLeftColumnClass ?>"><span id="elh_triage_nombre_triage_en"><?php echo $triage_view->nombre_triage_en->caption() ?></span></td>
		<td data-name="nombre_triage_en" <?php echo $triage_view->nombre_triage_en->cellAttributes() ?>>
<span id="el_triage_nombre_triage_en">
<span<?php echo $triage_view->nombre_triage_en->viewAttributes() ?>><?php echo $triage_view->nombre_triage_en->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($triage_view->nombre_triage_pr->Visible) { // nombre_triage_pr ?>
	<tr id="r_nombre_triage_pr">
		<td class="<?php echo $triage_view->TableLeftColumnClass ?>"><span id="elh_triage_nombre_triage_pr"><?php echo $triage_view->nombre_triage_pr->caption() ?></span></td>
		<td data-name="nombre_triage_pr" <?php echo $triage_view->nombre_triage_pr->cellAttributes() ?>>
<span id="el_triage_nombre_triage_pr">
<span<?php echo $triage_view->nombre_triage_pr->viewAttributes() ?>><?php echo $triage_view->nombre_triage_pr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($triage_view->nombre_triage_fr->Visible) { // nombre_triage_fr ?>
	<tr id="r_nombre_triage_fr">
		<td class="<?php echo $triage_view->TableLeftColumnClass ?>"><span id="elh_triage_nombre_triage_fr"><?php echo $triage_view->nombre_triage_fr->caption() ?></span></td>
		<td data-name="nombre_triage_fr" <?php echo $triage_view->nombre_triage_fr->cellAttributes() ?>>
<span id="el_triage_nombre_triage_fr">
<span<?php echo $triage_view->nombre_triage_fr->viewAttributes() ?>><?php echo $triage_view->nombre_triage_fr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$triage_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$triage_view->isExport()) { ?>
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
$triage_view->terminate();
?>