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
$base_ambulancia_view = new base_ambulancia_view();

// Run the page
$base_ambulancia_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$base_ambulancia_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$base_ambulancia_view->isExport()) { ?>
<script>
var fbase_ambulanciaview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fbase_ambulanciaview = currentForm = new ew.Form("fbase_ambulanciaview", "view");
	loadjs.done("fbase_ambulanciaview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$base_ambulancia_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $base_ambulancia_view->ExportOptions->render("body") ?>
<?php $base_ambulancia_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $base_ambulancia_view->showPageHeader(); ?>
<?php
$base_ambulancia_view->showMessage();
?>
<form name="fbase_ambulanciaview" id="fbase_ambulanciaview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="base_ambulancia">
<input type="hidden" name="modal" value="<?php echo (int)$base_ambulancia_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($base_ambulancia_view->id_base->Visible) { // id_base ?>
	<tr id="r_id_base">
		<td class="<?php echo $base_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_base_ambulancia_id_base"><?php echo $base_ambulancia_view->id_base->caption() ?></span></td>
		<td data-name="id_base" <?php echo $base_ambulancia_view->id_base->cellAttributes() ?>>
<span id="el_base_ambulancia_id_base">
<span<?php echo $base_ambulancia_view->id_base->viewAttributes() ?>><?php echo $base_ambulancia_view->id_base->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($base_ambulancia_view->nombre->Visible) { // nombre ?>
	<tr id="r_nombre">
		<td class="<?php echo $base_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_base_ambulancia_nombre"><?php echo $base_ambulancia_view->nombre->caption() ?></span></td>
		<td data-name="nombre" <?php echo $base_ambulancia_view->nombre->cellAttributes() ?>>
<span id="el_base_ambulancia_nombre">
<span<?php echo $base_ambulancia_view->nombre->viewAttributes() ?>><?php echo $base_ambulancia_view->nombre->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($base_ambulancia_view->dpto->Visible) { // dpto ?>
	<tr id="r_dpto">
		<td class="<?php echo $base_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_base_ambulancia_dpto"><?php echo $base_ambulancia_view->dpto->caption() ?></span></td>
		<td data-name="dpto" <?php echo $base_ambulancia_view->dpto->cellAttributes() ?>>
<span id="el_base_ambulancia_dpto">
<span<?php echo $base_ambulancia_view->dpto->viewAttributes() ?>><?php echo $base_ambulancia_view->dpto->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($base_ambulancia_view->provincia->Visible) { // provincia ?>
	<tr id="r_provincia">
		<td class="<?php echo $base_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_base_ambulancia_provincia"><?php echo $base_ambulancia_view->provincia->caption() ?></span></td>
		<td data-name="provincia" <?php echo $base_ambulancia_view->provincia->cellAttributes() ?>>
<span id="el_base_ambulancia_provincia">
<span<?php echo $base_ambulancia_view->provincia->viewAttributes() ?>><?php echo $base_ambulancia_view->provincia->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($base_ambulancia_view->distrito->Visible) { // distrito ?>
	<tr id="r_distrito">
		<td class="<?php echo $base_ambulancia_view->TableLeftColumnClass ?>"><span id="elh_base_ambulancia_distrito"><?php echo $base_ambulancia_view->distrito->caption() ?></span></td>
		<td data-name="distrito" <?php echo $base_ambulancia_view->distrito->cellAttributes() ?>>
<span id="el_base_ambulancia_distrito">
<span<?php echo $base_ambulancia_view->distrito->viewAttributes() ?>><?php echo $base_ambulancia_view->distrito->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$base_ambulancia_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$base_ambulancia_view->isExport()) { ?>
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
$base_ambulancia_view->terminate();
?>