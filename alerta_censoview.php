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
$alerta_censo_view = new alerta_censo_view();

// Run the page
$alerta_censo_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$alerta_censo_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$alerta_censo_view->isExport()) { ?>
<script>
var falerta_censoview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	falerta_censoview = currentForm = new ew.Form("falerta_censoview", "view");
	loadjs.done("falerta_censoview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$alerta_censo_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $alerta_censo_view->ExportOptions->render("body") ?>
<?php $alerta_censo_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $alerta_censo_view->showPageHeader(); ?>
<?php
$alerta_censo_view->showMessage();
?>
<form name="falerta_censoview" id="falerta_censoview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="alerta_censo">
<input type="hidden" name="modal" value="<?php echo (int)$alerta_censo_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($alerta_censo_view->id_tiempocenso->Visible) { // id_tiempocenso ?>
	<tr id="r_id_tiempocenso">
		<td class="<?php echo $alerta_censo_view->TableLeftColumnClass ?>"><span id="elh_alerta_censo_id_tiempocenso"><?php echo $alerta_censo_view->id_tiempocenso->caption() ?></span></td>
		<td data-name="id_tiempocenso" <?php echo $alerta_censo_view->id_tiempocenso->cellAttributes() ?>>
<span id="el_alerta_censo_id_tiempocenso">
<span<?php echo $alerta_censo_view->id_tiempocenso->viewAttributes() ?>><?php echo $alerta_censo_view->id_tiempocenso->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alerta_censo_view->hora1->Visible) { // hora1 ?>
	<tr id="r_hora1">
		<td class="<?php echo $alerta_censo_view->TableLeftColumnClass ?>"><span id="elh_alerta_censo_hora1"><?php echo $alerta_censo_view->hora1->caption() ?></span></td>
		<td data-name="hora1" <?php echo $alerta_censo_view->hora1->cellAttributes() ?>>
<span id="el_alerta_censo_hora1">
<span<?php echo $alerta_censo_view->hora1->viewAttributes() ?>><?php echo $alerta_censo_view->hora1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alerta_censo_view->hora2->Visible) { // hora2 ?>
	<tr id="r_hora2">
		<td class="<?php echo $alerta_censo_view->TableLeftColumnClass ?>"><span id="elh_alerta_censo_hora2"><?php echo $alerta_censo_view->hora2->caption() ?></span></td>
		<td data-name="hora2" <?php echo $alerta_censo_view->hora2->cellAttributes() ?>>
<span id="el_alerta_censo_hora2">
<span<?php echo $alerta_censo_view->hora2->viewAttributes() ?>><?php echo $alerta_censo_view->hora2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alerta_censo_view->hora3->Visible) { // hora3 ?>
	<tr id="r_hora3">
		<td class="<?php echo $alerta_censo_view->TableLeftColumnClass ?>"><span id="elh_alerta_censo_hora3"><?php echo $alerta_censo_view->hora3->caption() ?></span></td>
		<td data-name="hora3" <?php echo $alerta_censo_view->hora3->cellAttributes() ?>>
<span id="el_alerta_censo_hora3">
<span<?php echo $alerta_censo_view->hora3->viewAttributes() ?>><?php echo $alerta_censo_view->hora3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alerta_censo_view->hora4->Visible) { // hora4 ?>
	<tr id="r_hora4">
		<td class="<?php echo $alerta_censo_view->TableLeftColumnClass ?>"><span id="elh_alerta_censo_hora4"><?php echo $alerta_censo_view->hora4->caption() ?></span></td>
		<td data-name="hora4" <?php echo $alerta_censo_view->hora4->cellAttributes() ?>>
<span id="el_alerta_censo_hora4">
<span<?php echo $alerta_censo_view->hora4->viewAttributes() ?>><?php echo $alerta_censo_view->hora4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alerta_censo_view->t_recordatorio->Visible) { // t_recordatorio ?>
	<tr id="r_t_recordatorio">
		<td class="<?php echo $alerta_censo_view->TableLeftColumnClass ?>"><span id="elh_alerta_censo_t_recordatorio"><?php echo $alerta_censo_view->t_recordatorio->caption() ?></span></td>
		<td data-name="t_recordatorio" <?php echo $alerta_censo_view->t_recordatorio->cellAttributes() ?>>
<span id="el_alerta_censo_t_recordatorio">
<span<?php echo $alerta_censo_view->t_recordatorio->viewAttributes() ?>><?php echo $alerta_censo_view->t_recordatorio->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alerta_censo_view->texto_recordatorio->Visible) { // texto_recordatorio ?>
	<tr id="r_texto_recordatorio">
		<td class="<?php echo $alerta_censo_view->TableLeftColumnClass ?>"><span id="elh_alerta_censo_texto_recordatorio"><?php echo $alerta_censo_view->texto_recordatorio->caption() ?></span></td>
		<td data-name="texto_recordatorio" <?php echo $alerta_censo_view->texto_recordatorio->cellAttributes() ?>>
<span id="el_alerta_censo_texto_recordatorio">
<span<?php echo $alerta_censo_view->texto_recordatorio->viewAttributes() ?>><?php echo $alerta_censo_view->texto_recordatorio->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alerta_censo_view->t_notificacion->Visible) { // t_notificacion ?>
	<tr id="r_t_notificacion">
		<td class="<?php echo $alerta_censo_view->TableLeftColumnClass ?>"><span id="elh_alerta_censo_t_notificacion"><?php echo $alerta_censo_view->t_notificacion->caption() ?></span></td>
		<td data-name="t_notificacion" <?php echo $alerta_censo_view->t_notificacion->cellAttributes() ?>>
<span id="el_alerta_censo_t_notificacion">
<span<?php echo $alerta_censo_view->t_notificacion->viewAttributes() ?>><?php echo $alerta_censo_view->t_notificacion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($alerta_censo_view->texto_notificacion->Visible) { // texto_notificacion ?>
	<tr id="r_texto_notificacion">
		<td class="<?php echo $alerta_censo_view->TableLeftColumnClass ?>"><span id="elh_alerta_censo_texto_notificacion"><?php echo $alerta_censo_view->texto_notificacion->caption() ?></span></td>
		<td data-name="texto_notificacion" <?php echo $alerta_censo_view->texto_notificacion->cellAttributes() ?>>
<span id="el_alerta_censo_texto_notificacion">
<span<?php echo $alerta_censo_view->texto_notificacion->viewAttributes() ?>><?php echo $alerta_censo_view->texto_notificacion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$alerta_censo_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$alerta_censo_view->isExport()) { ?>
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
$alerta_censo_view->terminate();
?>