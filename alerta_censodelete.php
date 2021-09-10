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
$alerta_censo_delete = new alerta_censo_delete();

// Run the page
$alerta_censo_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$alerta_censo_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var falerta_censodelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	falerta_censodelete = currentForm = new ew.Form("falerta_censodelete", "delete");
	loadjs.done("falerta_censodelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $alerta_censo_delete->showPageHeader(); ?>
<?php
$alerta_censo_delete->showMessage();
?>
<form name="falerta_censodelete" id="falerta_censodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="alerta_censo">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($alerta_censo_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($alerta_censo_delete->id_tiempocenso->Visible) { // id_tiempocenso ?>
		<th class="<?php echo $alerta_censo_delete->id_tiempocenso->headerCellClass() ?>"><span id="elh_alerta_censo_id_tiempocenso" class="alerta_censo_id_tiempocenso"><?php echo $alerta_censo_delete->id_tiempocenso->caption() ?></span></th>
<?php } ?>
<?php if ($alerta_censo_delete->hora1->Visible) { // hora1 ?>
		<th class="<?php echo $alerta_censo_delete->hora1->headerCellClass() ?>"><span id="elh_alerta_censo_hora1" class="alerta_censo_hora1"><?php echo $alerta_censo_delete->hora1->caption() ?></span></th>
<?php } ?>
<?php if ($alerta_censo_delete->hora2->Visible) { // hora2 ?>
		<th class="<?php echo $alerta_censo_delete->hora2->headerCellClass() ?>"><span id="elh_alerta_censo_hora2" class="alerta_censo_hora2"><?php echo $alerta_censo_delete->hora2->caption() ?></span></th>
<?php } ?>
<?php if ($alerta_censo_delete->hora3->Visible) { // hora3 ?>
		<th class="<?php echo $alerta_censo_delete->hora3->headerCellClass() ?>"><span id="elh_alerta_censo_hora3" class="alerta_censo_hora3"><?php echo $alerta_censo_delete->hora3->caption() ?></span></th>
<?php } ?>
<?php if ($alerta_censo_delete->hora4->Visible) { // hora4 ?>
		<th class="<?php echo $alerta_censo_delete->hora4->headerCellClass() ?>"><span id="elh_alerta_censo_hora4" class="alerta_censo_hora4"><?php echo $alerta_censo_delete->hora4->caption() ?></span></th>
<?php } ?>
<?php if ($alerta_censo_delete->t_recordatorio->Visible) { // t_recordatorio ?>
		<th class="<?php echo $alerta_censo_delete->t_recordatorio->headerCellClass() ?>"><span id="elh_alerta_censo_t_recordatorio" class="alerta_censo_t_recordatorio"><?php echo $alerta_censo_delete->t_recordatorio->caption() ?></span></th>
<?php } ?>
<?php if ($alerta_censo_delete->texto_recordatorio->Visible) { // texto_recordatorio ?>
		<th class="<?php echo $alerta_censo_delete->texto_recordatorio->headerCellClass() ?>"><span id="elh_alerta_censo_texto_recordatorio" class="alerta_censo_texto_recordatorio"><?php echo $alerta_censo_delete->texto_recordatorio->caption() ?></span></th>
<?php } ?>
<?php if ($alerta_censo_delete->t_notificacion->Visible) { // t_notificacion ?>
		<th class="<?php echo $alerta_censo_delete->t_notificacion->headerCellClass() ?>"><span id="elh_alerta_censo_t_notificacion" class="alerta_censo_t_notificacion"><?php echo $alerta_censo_delete->t_notificacion->caption() ?></span></th>
<?php } ?>
<?php if ($alerta_censo_delete->texto_notificacion->Visible) { // texto_notificacion ?>
		<th class="<?php echo $alerta_censo_delete->texto_notificacion->headerCellClass() ?>"><span id="elh_alerta_censo_texto_notificacion" class="alerta_censo_texto_notificacion"><?php echo $alerta_censo_delete->texto_notificacion->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$alerta_censo_delete->RecordCount = 0;
$i = 0;
while (!$alerta_censo_delete->Recordset->EOF) {
	$alerta_censo_delete->RecordCount++;
	$alerta_censo_delete->RowCount++;

	// Set row properties
	$alerta_censo->resetAttributes();
	$alerta_censo->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$alerta_censo_delete->loadRowValues($alerta_censo_delete->Recordset);

	// Render row
	$alerta_censo_delete->renderRow();
?>
	<tr <?php echo $alerta_censo->rowAttributes() ?>>
<?php if ($alerta_censo_delete->id_tiempocenso->Visible) { // id_tiempocenso ?>
		<td <?php echo $alerta_censo_delete->id_tiempocenso->cellAttributes() ?>>
<span id="el<?php echo $alerta_censo_delete->RowCount ?>_alerta_censo_id_tiempocenso" class="alerta_censo_id_tiempocenso">
<span<?php echo $alerta_censo_delete->id_tiempocenso->viewAttributes() ?>><?php echo $alerta_censo_delete->id_tiempocenso->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($alerta_censo_delete->hora1->Visible) { // hora1 ?>
		<td <?php echo $alerta_censo_delete->hora1->cellAttributes() ?>>
<span id="el<?php echo $alerta_censo_delete->RowCount ?>_alerta_censo_hora1" class="alerta_censo_hora1">
<span<?php echo $alerta_censo_delete->hora1->viewAttributes() ?>><?php echo $alerta_censo_delete->hora1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($alerta_censo_delete->hora2->Visible) { // hora2 ?>
		<td <?php echo $alerta_censo_delete->hora2->cellAttributes() ?>>
<span id="el<?php echo $alerta_censo_delete->RowCount ?>_alerta_censo_hora2" class="alerta_censo_hora2">
<span<?php echo $alerta_censo_delete->hora2->viewAttributes() ?>><?php echo $alerta_censo_delete->hora2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($alerta_censo_delete->hora3->Visible) { // hora3 ?>
		<td <?php echo $alerta_censo_delete->hora3->cellAttributes() ?>>
<span id="el<?php echo $alerta_censo_delete->RowCount ?>_alerta_censo_hora3" class="alerta_censo_hora3">
<span<?php echo $alerta_censo_delete->hora3->viewAttributes() ?>><?php echo $alerta_censo_delete->hora3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($alerta_censo_delete->hora4->Visible) { // hora4 ?>
		<td <?php echo $alerta_censo_delete->hora4->cellAttributes() ?>>
<span id="el<?php echo $alerta_censo_delete->RowCount ?>_alerta_censo_hora4" class="alerta_censo_hora4">
<span<?php echo $alerta_censo_delete->hora4->viewAttributes() ?>><?php echo $alerta_censo_delete->hora4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($alerta_censo_delete->t_recordatorio->Visible) { // t_recordatorio ?>
		<td <?php echo $alerta_censo_delete->t_recordatorio->cellAttributes() ?>>
<span id="el<?php echo $alerta_censo_delete->RowCount ?>_alerta_censo_t_recordatorio" class="alerta_censo_t_recordatorio">
<span<?php echo $alerta_censo_delete->t_recordatorio->viewAttributes() ?>><?php echo $alerta_censo_delete->t_recordatorio->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($alerta_censo_delete->texto_recordatorio->Visible) { // texto_recordatorio ?>
		<td <?php echo $alerta_censo_delete->texto_recordatorio->cellAttributes() ?>>
<span id="el<?php echo $alerta_censo_delete->RowCount ?>_alerta_censo_texto_recordatorio" class="alerta_censo_texto_recordatorio">
<span<?php echo $alerta_censo_delete->texto_recordatorio->viewAttributes() ?>><?php echo $alerta_censo_delete->texto_recordatorio->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($alerta_censo_delete->t_notificacion->Visible) { // t_notificacion ?>
		<td <?php echo $alerta_censo_delete->t_notificacion->cellAttributes() ?>>
<span id="el<?php echo $alerta_censo_delete->RowCount ?>_alerta_censo_t_notificacion" class="alerta_censo_t_notificacion">
<span<?php echo $alerta_censo_delete->t_notificacion->viewAttributes() ?>><?php echo $alerta_censo_delete->t_notificacion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($alerta_censo_delete->texto_notificacion->Visible) { // texto_notificacion ?>
		<td <?php echo $alerta_censo_delete->texto_notificacion->cellAttributes() ?>>
<span id="el<?php echo $alerta_censo_delete->RowCount ?>_alerta_censo_texto_notificacion" class="alerta_censo_texto_notificacion">
<span<?php echo $alerta_censo_delete->texto_notificacion->viewAttributes() ?>><?php echo $alerta_censo_delete->texto_notificacion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$alerta_censo_delete->Recordset->moveNext();
}
$alerta_censo_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $alerta_censo_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$alerta_censo_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$alerta_censo_delete->terminate();
?>