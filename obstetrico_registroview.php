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
$obstetrico_registro_view = new obstetrico_registro_view();

// Run the page
$obstetrico_registro_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$obstetrico_registro_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$obstetrico_registro_view->isExport()) { ?>
<script>
var fobstetrico_registroview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fobstetrico_registroview = currentForm = new ew.Form("fobstetrico_registroview", "view");
	loadjs.done("fobstetrico_registroview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$obstetrico_registro_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $obstetrico_registro_view->ExportOptions->render("body") ?>
<?php $obstetrico_registro_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $obstetrico_registro_view->showPageHeader(); ?>
<?php
$obstetrico_registro_view->showMessage();
?>
<form name="fobstetrico_registroview" id="fobstetrico_registroview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="obstetrico_registro">
<input type="hidden" name="modal" value="<?php echo (int)$obstetrico_registro_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($obstetrico_registro_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $obstetrico_registro_view->TableLeftColumnClass ?>"><span id="elh_obstetrico_registro_id"><?php echo $obstetrico_registro_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $obstetrico_registro_view->id->cellAttributes() ?>>
<span id="el_obstetrico_registro_id">
<span<?php echo $obstetrico_registro_view->id->viewAttributes() ?>><?php echo $obstetrico_registro_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($obstetrico_registro_view->cod_casopreh->Visible) { // cod_casopreh ?>
	<tr id="r_cod_casopreh">
		<td class="<?php echo $obstetrico_registro_view->TableLeftColumnClass ?>"><span id="elh_obstetrico_registro_cod_casopreh"><?php echo $obstetrico_registro_view->cod_casopreh->caption() ?></span></td>
		<td data-name="cod_casopreh" <?php echo $obstetrico_registro_view->cod_casopreh->cellAttributes() ?>>
<span id="el_obstetrico_registro_cod_casopreh">
<span<?php echo $obstetrico_registro_view->cod_casopreh->viewAttributes() ?>><?php echo $obstetrico_registro_view->cod_casopreh->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($obstetrico_registro_view->trabajoparto->Visible) { // trabajoparto ?>
	<tr id="r_trabajoparto">
		<td class="<?php echo $obstetrico_registro_view->TableLeftColumnClass ?>"><span id="elh_obstetrico_registro_trabajoparto"><?php echo $obstetrico_registro_view->trabajoparto->caption() ?></span></td>
		<td data-name="trabajoparto" <?php echo $obstetrico_registro_view->trabajoparto->cellAttributes() ?>>
<span id="el_obstetrico_registro_trabajoparto">
<span<?php echo $obstetrico_registro_view->trabajoparto->viewAttributes() ?>><?php echo $obstetrico_registro_view->trabajoparto->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($obstetrico_registro_view->sangradovaginal->Visible) { // sangradovaginal ?>
	<tr id="r_sangradovaginal">
		<td class="<?php echo $obstetrico_registro_view->TableLeftColumnClass ?>"><span id="elh_obstetrico_registro_sangradovaginal"><?php echo $obstetrico_registro_view->sangradovaginal->caption() ?></span></td>
		<td data-name="sangradovaginal" <?php echo $obstetrico_registro_view->sangradovaginal->cellAttributes() ?>>
<span id="el_obstetrico_registro_sangradovaginal">
<span<?php echo $obstetrico_registro_view->sangradovaginal->viewAttributes() ?>><?php echo $obstetrico_registro_view->sangradovaginal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($obstetrico_registro_view->g->Visible) { // g ?>
	<tr id="r_g">
		<td class="<?php echo $obstetrico_registro_view->TableLeftColumnClass ?>"><span id="elh_obstetrico_registro_g"><?php echo $obstetrico_registro_view->g->caption() ?></span></td>
		<td data-name="g" <?php echo $obstetrico_registro_view->g->cellAttributes() ?>>
<span id="el_obstetrico_registro_g">
<span<?php echo $obstetrico_registro_view->g->viewAttributes() ?>><?php echo $obstetrico_registro_view->g->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($obstetrico_registro_view->p->Visible) { // p ?>
	<tr id="r_p">
		<td class="<?php echo $obstetrico_registro_view->TableLeftColumnClass ?>"><span id="elh_obstetrico_registro_p"><?php echo $obstetrico_registro_view->p->caption() ?></span></td>
		<td data-name="p" <?php echo $obstetrico_registro_view->p->cellAttributes() ?>>
<span id="el_obstetrico_registro_p">
<span<?php echo $obstetrico_registro_view->p->viewAttributes() ?>><?php echo $obstetrico_registro_view->p->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($obstetrico_registro_view->a->Visible) { // a ?>
	<tr id="r_a">
		<td class="<?php echo $obstetrico_registro_view->TableLeftColumnClass ?>"><span id="elh_obstetrico_registro_a"><?php echo $obstetrico_registro_view->a->caption() ?></span></td>
		<td data-name="a" <?php echo $obstetrico_registro_view->a->cellAttributes() ?>>
<span id="el_obstetrico_registro_a">
<span<?php echo $obstetrico_registro_view->a->viewAttributes() ?>><?php echo $obstetrico_registro_view->a->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($obstetrico_registro_view->n->Visible) { // n ?>
	<tr id="r_n">
		<td class="<?php echo $obstetrico_registro_view->TableLeftColumnClass ?>"><span id="elh_obstetrico_registro_n"><?php echo $obstetrico_registro_view->n->caption() ?></span></td>
		<td data-name="n" <?php echo $obstetrico_registro_view->n->cellAttributes() ?>>
<span id="el_obstetrico_registro_n">
<span<?php echo $obstetrico_registro_view->n->viewAttributes() ?>><?php echo $obstetrico_registro_view->n->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($obstetrico_registro_view->c->Visible) { // c ?>
	<tr id="r_c">
		<td class="<?php echo $obstetrico_registro_view->TableLeftColumnClass ?>"><span id="elh_obstetrico_registro_c"><?php echo $obstetrico_registro_view->c->caption() ?></span></td>
		<td data-name="c" <?php echo $obstetrico_registro_view->c->cellAttributes() ?>>
<span id="el_obstetrico_registro_c">
<span<?php echo $obstetrico_registro_view->c->viewAttributes() ?>><?php echo $obstetrico_registro_view->c->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($obstetrico_registro_view->fuente->Visible) { // fuente ?>
	<tr id="r_fuente">
		<td class="<?php echo $obstetrico_registro_view->TableLeftColumnClass ?>"><span id="elh_obstetrico_registro_fuente"><?php echo $obstetrico_registro_view->fuente->caption() ?></span></td>
		<td data-name="fuente" <?php echo $obstetrico_registro_view->fuente->cellAttributes() ?>>
<span id="el_obstetrico_registro_fuente">
<span<?php echo $obstetrico_registro_view->fuente->viewAttributes() ?>><?php echo $obstetrico_registro_view->fuente->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($obstetrico_registro_view->tiempo->Visible) { // tiempo ?>
	<tr id="r_tiempo">
		<td class="<?php echo $obstetrico_registro_view->TableLeftColumnClass ?>"><span id="elh_obstetrico_registro_tiempo"><?php echo $obstetrico_registro_view->tiempo->caption() ?></span></td>
		<td data-name="tiempo" <?php echo $obstetrico_registro_view->tiempo->cellAttributes() ?>>
<span id="el_obstetrico_registro_tiempo">
<span<?php echo $obstetrico_registro_view->tiempo->viewAttributes() ?>><?php echo $obstetrico_registro_view->tiempo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$obstetrico_registro_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$obstetrico_registro_view->isExport()) { ?>
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
$obstetrico_registro_view->terminate();
?>