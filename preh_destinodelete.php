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
$preh_destino_delete = new preh_destino_delete();

// Run the page
$preh_destino_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_destino_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpreh_destinodelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpreh_destinodelete = currentForm = new ew.Form("fpreh_destinodelete", "delete");
	loadjs.done("fpreh_destinodelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $preh_destino_delete->showPageHeader(); ?>
<?php
$preh_destino_delete->showMessage();
?>
<form name="fpreh_destinodelete" id="fpreh_destinodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_destino">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($preh_destino_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($preh_destino_delete->id_destino->Visible) { // id_destino ?>
		<th class="<?php echo $preh_destino_delete->id_destino->headerCellClass() ?>"><span id="elh_preh_destino_id_destino" class="preh_destino_id_destino"><?php echo $preh_destino_delete->id_destino->caption() ?></span></th>
<?php } ?>
<?php if ($preh_destino_delete->cod_casopreh->Visible) { // cod_casopreh ?>
		<th class="<?php echo $preh_destino_delete->cod_casopreh->headerCellClass() ?>"><span id="elh_preh_destino_cod_casopreh" class="preh_destino_cod_casopreh"><?php echo $preh_destino_delete->cod_casopreh->caption() ?></span></th>
<?php } ?>
<?php if ($preh_destino_delete->cod_hospitaldestino->Visible) { // cod_hospitaldestino ?>
		<th class="<?php echo $preh_destino_delete->cod_hospitaldestino->headerCellClass() ?>"><span id="elh_preh_destino_cod_hospitaldestino" class="preh_destino_cod_hospitaldestino"><?php echo $preh_destino_delete->cod_hospitaldestino->caption() ?></span></th>
<?php } ?>
<?php if ($preh_destino_delete->nom_medicorecibe->Visible) { // nom_medicorecibe ?>
		<th class="<?php echo $preh_destino_delete->nom_medicorecibe->headerCellClass() ?>"><span id="elh_preh_destino_nom_medicorecibe" class="preh_destino_nom_medicorecibe"><?php echo $preh_destino_delete->nom_medicorecibe->caption() ?></span></th>
<?php } ?>
<?php if ($preh_destino_delete->telefono_medico->Visible) { // telefono_medico ?>
		<th class="<?php echo $preh_destino_delete->telefono_medico->headerCellClass() ?>"><span id="elh_preh_destino_telefono_medico" class="preh_destino_telefono_medico"><?php echo $preh_destino_delete->telefono_medico->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$preh_destino_delete->RecordCount = 0;
$i = 0;
while (!$preh_destino_delete->Recordset->EOF) {
	$preh_destino_delete->RecordCount++;
	$preh_destino_delete->RowCount++;

	// Set row properties
	$preh_destino->resetAttributes();
	$preh_destino->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$preh_destino_delete->loadRowValues($preh_destino_delete->Recordset);

	// Render row
	$preh_destino_delete->renderRow();
?>
	<tr <?php echo $preh_destino->rowAttributes() ?>>
<?php if ($preh_destino_delete->id_destino->Visible) { // id_destino ?>
		<td <?php echo $preh_destino_delete->id_destino->cellAttributes() ?>>
<span id="el<?php echo $preh_destino_delete->RowCount ?>_preh_destino_id_destino" class="preh_destino_id_destino">
<span<?php echo $preh_destino_delete->id_destino->viewAttributes() ?>><?php echo $preh_destino_delete->id_destino->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_destino_delete->cod_casopreh->Visible) { // cod_casopreh ?>
		<td <?php echo $preh_destino_delete->cod_casopreh->cellAttributes() ?>>
<span id="el<?php echo $preh_destino_delete->RowCount ?>_preh_destino_cod_casopreh" class="preh_destino_cod_casopreh">
<span<?php echo $preh_destino_delete->cod_casopreh->viewAttributes() ?>><?php echo $preh_destino_delete->cod_casopreh->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_destino_delete->cod_hospitaldestino->Visible) { // cod_hospitaldestino ?>
		<td <?php echo $preh_destino_delete->cod_hospitaldestino->cellAttributes() ?>>
<span id="el<?php echo $preh_destino_delete->RowCount ?>_preh_destino_cod_hospitaldestino" class="preh_destino_cod_hospitaldestino">
<span<?php echo $preh_destino_delete->cod_hospitaldestino->viewAttributes() ?>><?php echo $preh_destino_delete->cod_hospitaldestino->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_destino_delete->nom_medicorecibe->Visible) { // nom_medicorecibe ?>
		<td <?php echo $preh_destino_delete->nom_medicorecibe->cellAttributes() ?>>
<span id="el<?php echo $preh_destino_delete->RowCount ?>_preh_destino_nom_medicorecibe" class="preh_destino_nom_medicorecibe">
<span<?php echo $preh_destino_delete->nom_medicorecibe->viewAttributes() ?>><?php echo $preh_destino_delete->nom_medicorecibe->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($preh_destino_delete->telefono_medico->Visible) { // telefono_medico ?>
		<td <?php echo $preh_destino_delete->telefono_medico->cellAttributes() ?>>
<span id="el<?php echo $preh_destino_delete->RowCount ?>_preh_destino_telefono_medico" class="preh_destino_telefono_medico">
<span<?php echo $preh_destino_delete->telefono_medico->viewAttributes() ?>><?php echo $preh_destino_delete->telefono_medico->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$preh_destino_delete->Recordset->moveNext();
}
$preh_destino_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $preh_destino_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$preh_destino_delete->showPageFooter();
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
$preh_destino_delete->terminate();
?>