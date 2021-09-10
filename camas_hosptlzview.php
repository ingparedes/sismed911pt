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
$camas_hosptlz_view = new camas_hosptlz_view();

// Run the page
$camas_hosptlz_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$camas_hosptlz_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$camas_hosptlz_view->isExport()) { ?>
<script>
var fcamas_hosptlzview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fcamas_hosptlzview = currentForm = new ew.Form("fcamas_hosptlzview", "view");
	loadjs.done("fcamas_hosptlzview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$camas_hosptlz_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $camas_hosptlz_view->ExportOptions->render("body") ?>
<?php $camas_hosptlz_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $camas_hosptlz_view->showPageHeader(); ?>
<?php
$camas_hosptlz_view->showMessage();
?>
<form name="fcamas_hosptlzview" id="fcamas_hosptlzview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="camas_hosptlz">
<input type="hidden" name="modal" value="<?php echo (int)$camas_hosptlz_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($camas_hosptlz_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $camas_hosptlz_view->TableLeftColumnClass ?>"><span id="elh_camas_hosptlz_id"><?php echo $camas_hosptlz_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $camas_hosptlz_view->id->cellAttributes() ?>>
<span id="el_camas_hosptlz_id">
<span<?php echo $camas_hosptlz_view->id->viewAttributes() ?>><?php echo $camas_hosptlz_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($camas_hosptlz_view->ocupadas->Visible) { // ocupadas ?>
	<tr id="r_ocupadas">
		<td class="<?php echo $camas_hosptlz_view->TableLeftColumnClass ?>"><span id="elh_camas_hosptlz_ocupadas"><?php echo $camas_hosptlz_view->ocupadas->caption() ?></span></td>
		<td data-name="ocupadas" <?php echo $camas_hosptlz_view->ocupadas->cellAttributes() ?>>
<span id="el_camas_hosptlz_ocupadas">
<span<?php echo $camas_hosptlz_view->ocupadas->viewAttributes() ?>><?php echo $camas_hosptlz_view->ocupadas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($camas_hosptlz_view->sin_servicio->Visible) { // sin_servicio ?>
	<tr id="r_sin_servicio">
		<td class="<?php echo $camas_hosptlz_view->TableLeftColumnClass ?>"><span id="elh_camas_hosptlz_sin_servicio"><?php echo $camas_hosptlz_view->sin_servicio->caption() ?></span></td>
		<td data-name="sin_servicio" <?php echo $camas_hosptlz_view->sin_servicio->cellAttributes() ?>>
<span id="el_camas_hosptlz_sin_servicio">
<span<?php echo $camas_hosptlz_view->sin_servicio->viewAttributes() ?>><?php echo $camas_hosptlz_view->sin_servicio->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($camas_hosptlz_view->libres->Visible) { // libres ?>
	<tr id="r_libres">
		<td class="<?php echo $camas_hosptlz_view->TableLeftColumnClass ?>"><span id="elh_camas_hosptlz_libres"><?php echo $camas_hosptlz_view->libres->caption() ?></span></td>
		<td data-name="libres" <?php echo $camas_hosptlz_view->libres->cellAttributes() ?>>
<span id="el_camas_hosptlz_libres">
<span<?php echo $camas_hosptlz_view->libres->viewAttributes() ?>><?php echo $camas_hosptlz_view->libres->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($camas_hosptlz_view->id_camas->Visible) { // id_camas ?>
	<tr id="r_id_camas">
		<td class="<?php echo $camas_hosptlz_view->TableLeftColumnClass ?>"><span id="elh_camas_hosptlz_id_camas"><?php echo $camas_hosptlz_view->id_camas->caption() ?></span></td>
		<td data-name="id_camas" <?php echo $camas_hosptlz_view->id_camas->cellAttributes() ?>>
<span id="el_camas_hosptlz_id_camas">
<span<?php echo $camas_hosptlz_view->id_camas->viewAttributes() ?>><?php echo $camas_hosptlz_view->id_camas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$camas_hosptlz_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$camas_hosptlz_view->isExport()) { ?>
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
$camas_hosptlz_view->terminate();
?>