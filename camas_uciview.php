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
$camas_uci_view = new camas_uci_view();

// Run the page
$camas_uci_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$camas_uci_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$camas_uci_view->isExport()) { ?>
<script>
var fcamas_uciview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fcamas_uciview = currentForm = new ew.Form("fcamas_uciview", "view");
	loadjs.done("fcamas_uciview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$camas_uci_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $camas_uci_view->ExportOptions->render("body") ?>
<?php $camas_uci_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $camas_uci_view->showPageHeader(); ?>
<?php
$camas_uci_view->showMessage();
?>
<form name="fcamas_uciview" id="fcamas_uciview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="camas_uci">
<input type="hidden" name="modal" value="<?php echo (int)$camas_uci_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($camas_uci_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $camas_uci_view->TableLeftColumnClass ?>"><span id="elh_camas_uci_id"><?php echo $camas_uci_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $camas_uci_view->id->cellAttributes() ?>>
<span id="el_camas_uci_id">
<span<?php echo $camas_uci_view->id->viewAttributes() ?>><?php echo $camas_uci_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($camas_uci_view->ocupadas->Visible) { // ocupadas ?>
	<tr id="r_ocupadas">
		<td class="<?php echo $camas_uci_view->TableLeftColumnClass ?>"><span id="elh_camas_uci_ocupadas"><?php echo $camas_uci_view->ocupadas->caption() ?></span></td>
		<td data-name="ocupadas" <?php echo $camas_uci_view->ocupadas->cellAttributes() ?>>
<span id="el_camas_uci_ocupadas">
<span<?php echo $camas_uci_view->ocupadas->viewAttributes() ?>><?php echo $camas_uci_view->ocupadas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($camas_uci_view->sin_servicio->Visible) { // sin_servicio ?>
	<tr id="r_sin_servicio">
		<td class="<?php echo $camas_uci_view->TableLeftColumnClass ?>"><span id="elh_camas_uci_sin_servicio"><?php echo $camas_uci_view->sin_servicio->caption() ?></span></td>
		<td data-name="sin_servicio" <?php echo $camas_uci_view->sin_servicio->cellAttributes() ?>>
<span id="el_camas_uci_sin_servicio">
<span<?php echo $camas_uci_view->sin_servicio->viewAttributes() ?>><?php echo $camas_uci_view->sin_servicio->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($camas_uci_view->libres->Visible) { // libres ?>
	<tr id="r_libres">
		<td class="<?php echo $camas_uci_view->TableLeftColumnClass ?>"><span id="elh_camas_uci_libres"><?php echo $camas_uci_view->libres->caption() ?></span></td>
		<td data-name="libres" <?php echo $camas_uci_view->libres->cellAttributes() ?>>
<span id="el_camas_uci_libres">
<span<?php echo $camas_uci_view->libres->viewAttributes() ?>><?php echo $camas_uci_view->libres->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($camas_uci_view->id_camas->Visible) { // id_camas ?>
	<tr id="r_id_camas">
		<td class="<?php echo $camas_uci_view->TableLeftColumnClass ?>"><span id="elh_camas_uci_id_camas"><?php echo $camas_uci_view->id_camas->caption() ?></span></td>
		<td data-name="id_camas" <?php echo $camas_uci_view->id_camas->cellAttributes() ?>>
<span id="el_camas_uci_id_camas">
<span<?php echo $camas_uci_view->id_camas->viewAttributes() ?>><?php echo $camas_uci_view->id_camas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$camas_uci_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$camas_uci_view->isExport()) { ?>
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
$camas_uci_view->terminate();
?>