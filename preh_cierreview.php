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
$preh_cierre_view = new preh_cierre_view();

// Run the page
$preh_cierre_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_cierre_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$preh_cierre_view->isExport()) { ?>
<script>
var fpreh_cierreview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpreh_cierreview = currentForm = new ew.Form("fpreh_cierreview", "view");
	loadjs.done("fpreh_cierreview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$preh_cierre_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $preh_cierre_view->ExportOptions->render("body") ?>
<?php $preh_cierre_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $preh_cierre_view->showPageHeader(); ?>
<?php
$preh_cierre_view->showMessage();
?>
<form name="fpreh_cierreview" id="fpreh_cierreview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_cierre">
<input type="hidden" name="modal" value="<?php echo (int)$preh_cierre_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($preh_cierre_view->id_cierre->Visible) { // id_cierre ?>
	<tr id="r_id_cierre">
		<td class="<?php echo $preh_cierre_view->TableLeftColumnClass ?>"><span id="elh_preh_cierre_id_cierre"><script id="tpc_preh_cierre_id_cierre" type="text/html"><?php echo $preh_cierre_view->id_cierre->caption() ?></script></span></td>
		<td data-name="id_cierre" <?php echo $preh_cierre_view->id_cierre->cellAttributes() ?>>
<script id="tpx_preh_cierre_id_cierre" type="text/html"><span id="el_preh_cierre_id_cierre">
<span<?php echo $preh_cierre_view->id_cierre->viewAttributes() ?>><?php echo $preh_cierre_view->id_cierre->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_cierre_view->nombrecierre->Visible) { // nombrecierre ?>
	<tr id="r_nombrecierre">
		<td class="<?php echo $preh_cierre_view->TableLeftColumnClass ?>"><span id="elh_preh_cierre_nombrecierre"><script id="tpc_preh_cierre_nombrecierre" type="text/html"><?php echo $preh_cierre_view->nombrecierre->caption() ?></script></span></td>
		<td data-name="nombrecierre" <?php echo $preh_cierre_view->nombrecierre->cellAttributes() ?>>
<script id="tpx_preh_cierre_nombrecierre" type="text/html"><span id="el_preh_cierre_nombrecierre">
<span<?php echo $preh_cierre_view->nombrecierre->viewAttributes() ?>><?php echo $preh_cierre_view->nombrecierre->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_cierre_view->cod_casopreh->Visible) { // cod_casopreh ?>
	<tr id="r_cod_casopreh">
		<td class="<?php echo $preh_cierre_view->TableLeftColumnClass ?>"><span id="elh_preh_cierre_cod_casopreh"><script id="tpc_preh_cierre_cod_casopreh" type="text/html"><?php echo $preh_cierre_view->cod_casopreh->caption() ?></script></span></td>
		<td data-name="cod_casopreh" <?php echo $preh_cierre_view->cod_casopreh->cellAttributes() ?>>
<script id="tpx_preh_cierre_cod_casopreh" type="text/html"><span id="el_preh_cierre_cod_casopreh">
<span<?php echo $preh_cierre_view->cod_casopreh->viewAttributes() ?>><?php echo $preh_cierre_view->cod_casopreh->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($preh_cierre_view->nota->Visible) { // nota ?>
	<tr id="r_nota">
		<td class="<?php echo $preh_cierre_view->TableLeftColumnClass ?>"><span id="elh_preh_cierre_nota"><script id="tpc_preh_cierre_nota" type="text/html"><?php echo $preh_cierre_view->nota->caption() ?></script></span></td>
		<td data-name="nota" <?php echo $preh_cierre_view->nota->cellAttributes() ?>>
<script id="tpx_preh_cierre_nota" type="text/html"><span id="el_preh_cierre_nota">
<span<?php echo $preh_cierre_view->nota->viewAttributes() ?>><?php echo $preh_cierre_view->nota->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_preh_cierreview" class="ew-custom-template"></div>
<script id="tpm_preh_cierreview" type="text/html">
<div id="ct_preh_cierre_view"><h3> Este caso fue cerrado></h3>
<em> No caso: {{include tmpl="#tpc_preh_cierre_cod_casopreh"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_preh_cierre_cod_casopreh")/}}<em>
<em> Descripción: {{include tmpl=~getTemplate("#tpx_preh_cierre_nota")/}}<em>
</div>
</script>

</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($preh_cierre->Rows) ?> };
	ew.applyTemplate("tpd_preh_cierreview", "tpm_preh_cierreview", "preh_cierreview", "<?php echo $preh_cierre->CustomExport ?>", ew.templateData.rows[0]);
	$("script.preh_cierreview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$preh_cierre_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$preh_cierre_view->isExport()) { ?>
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
$preh_cierre_view->terminate();
?>