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
$webservices_view = new webservices_view();

// Run the page
$webservices_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$webservices_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$webservices_view->isExport()) { ?>
<script>
var fwebservicesview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fwebservicesview = currentForm = new ew.Form("fwebservicesview", "view");
	loadjs.done("fwebservicesview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$webservices_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $webservices_view->ExportOptions->render("body") ?>
<?php $webservices_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $webservices_view->showPageHeader(); ?>
<?php
$webservices_view->showMessage();
?>
<form name="fwebservicesview" id="fwebservicesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="webservices">
<input type="hidden" name="modal" value="<?php echo (int)$webservices_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($webservices_view->id_parametros->Visible) { // id_parametros ?>
	<tr id="r_id_parametros">
		<td class="<?php echo $webservices_view->TableLeftColumnClass ?>"><span id="elh_webservices_id_parametros"><?php echo $webservices_view->id_parametros->caption() ?></span></td>
		<td data-name="id_parametros" <?php echo $webservices_view->id_parametros->cellAttributes() ?>>
<span id="el_webservices_id_parametros">
<span<?php echo $webservices_view->id_parametros->viewAttributes() ?>><?php echo $webservices_view->id_parametros->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($webservices_view->caller->Visible) { // caller ?>
	<tr id="r_caller">
		<td class="<?php echo $webservices_view->TableLeftColumnClass ?>"><span id="elh_webservices_caller"><?php echo $webservices_view->caller->caption() ?></span></td>
		<td data-name="caller" <?php echo $webservices_view->caller->cellAttributes() ?>>
<span id="el_webservices_caller">
<span<?php echo $webservices_view->caller->viewAttributes() ?>><?php echo $webservices_view->caller->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($webservices_view->idpersonas->Visible) { // idpersonas ?>
	<tr id="r_idpersonas">
		<td class="<?php echo $webservices_view->TableLeftColumnClass ?>"><span id="elh_webservices_idpersonas"><?php echo $webservices_view->idpersonas->caption() ?></span></td>
		<td data-name="idpersonas" <?php echo $webservices_view->idpersonas->cellAttributes() ?>>
<span id="el_webservices_idpersonas">
<span<?php echo $webservices_view->idpersonas->viewAttributes() ?>><?php echo $webservices_view->idpersonas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($webservices_view->disponiblecamas->Visible) { // disponiblecamas ?>
	<tr id="r_disponiblecamas">
		<td class="<?php echo $webservices_view->TableLeftColumnClass ?>"><span id="elh_webservices_disponiblecamas"><?php echo $webservices_view->disponiblecamas->caption() ?></span></td>
		<td data-name="disponiblecamas" <?php echo $webservices_view->disponiblecamas->cellAttributes() ?>>
<span id="el_webservices_disponiblecamas">
<span<?php echo $webservices_view->disponiblecamas->viewAttributes() ?>><?php echo $webservices_view->disponiblecamas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($webservices_view->afiliados->Visible) { // afiliados ?>
	<tr id="r_afiliados">
		<td class="<?php echo $webservices_view->TableLeftColumnClass ?>"><span id="elh_webservices_afiliados"><?php echo $webservices_view->afiliados->caption() ?></span></td>
		<td data-name="afiliados" <?php echo $webservices_view->afiliados->cellAttributes() ?>>
<span id="el_webservices_afiliados">
<span<?php echo $webservices_view->afiliados->viewAttributes() ?>><?php echo $webservices_view->afiliados->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$webservices_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$webservices_view->isExport()) { ?>
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
$webservices_view->terminate();
?>