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
$usuarios_delete = new usuarios_delete();

// Run the page
$usuarios_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$usuarios_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fusuariosdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fusuariosdelete = currentForm = new ew.Form("fusuariosdelete", "delete");
	loadjs.done("fusuariosdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $usuarios_delete->showPageHeader(); ?>
<?php
$usuarios_delete->showMessage();
?>
<form name="fusuariosdelete" id="fusuariosdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="usuarios">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($usuarios_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($usuarios_delete->id_user->Visible) { // id_user ?>
		<th class="<?php echo $usuarios_delete->id_user->headerCellClass() ?>"><span id="elh_usuarios_id_user" class="usuarios_id_user"><?php echo $usuarios_delete->id_user->caption() ?></span></th>
<?php } ?>
<?php if ($usuarios_delete->fecha_creacion->Visible) { // fecha_creacion ?>
		<th class="<?php echo $usuarios_delete->fecha_creacion->headerCellClass() ?>"><span id="elh_usuarios_fecha_creacion" class="usuarios_fecha_creacion"><?php echo $usuarios_delete->fecha_creacion->caption() ?></span></th>
<?php } ?>
<?php if ($usuarios_delete->nombres->Visible) { // nombres ?>
		<th class="<?php echo $usuarios_delete->nombres->headerCellClass() ?>"><span id="elh_usuarios_nombres" class="usuarios_nombres"><?php echo $usuarios_delete->nombres->caption() ?></span></th>
<?php } ?>
<?php if ($usuarios_delete->apellidos->Visible) { // apellidos ?>
		<th class="<?php echo $usuarios_delete->apellidos->headerCellClass() ?>"><span id="elh_usuarios_apellidos" class="usuarios_apellidos"><?php echo $usuarios_delete->apellidos->caption() ?></span></th>
<?php } ?>
<?php if ($usuarios_delete->telefono->Visible) { // telefono ?>
		<th class="<?php echo $usuarios_delete->telefono->headerCellClass() ?>"><span id="elh_usuarios_telefono" class="usuarios_telefono"><?php echo $usuarios_delete->telefono->caption() ?></span></th>
<?php } ?>
<?php if ($usuarios_delete->_login->Visible) { // login ?>
		<th class="<?php echo $usuarios_delete->_login->headerCellClass() ?>"><span id="elh_usuarios__login" class="usuarios__login"><?php echo $usuarios_delete->_login->caption() ?></span></th>
<?php } ?>
<?php if ($usuarios_delete->pw->Visible) { // pw ?>
		<th class="<?php echo $usuarios_delete->pw->headerCellClass() ?>"><span id="elh_usuarios_pw" class="usuarios_pw"><?php echo $usuarios_delete->pw->caption() ?></span></th>
<?php } ?>
<?php if ($usuarios_delete->perfil->Visible) { // perfil ?>
		<th class="<?php echo $usuarios_delete->perfil->headerCellClass() ?>"><span id="elh_usuarios_perfil" class="usuarios_perfil"><?php echo $usuarios_delete->perfil->caption() ?></span></th>
<?php } ?>
<?php if ($usuarios_delete->sede->Visible) { // sede ?>
		<th class="<?php echo $usuarios_delete->sede->headerCellClass() ?>"><span id="elh_usuarios_sede" class="usuarios_sede"><?php echo $usuarios_delete->sede->caption() ?></span></th>
<?php } ?>
<?php if ($usuarios_delete->acode->Visible) { // acode ?>
		<th class="<?php echo $usuarios_delete->acode->headerCellClass() ?>"><span id="elh_usuarios_acode" class="usuarios_acode"><?php echo $usuarios_delete->acode->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$usuarios_delete->RecordCount = 0;
$i = 0;
while (!$usuarios_delete->Recordset->EOF) {
	$usuarios_delete->RecordCount++;
	$usuarios_delete->RowCount++;

	// Set row properties
	$usuarios->resetAttributes();
	$usuarios->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$usuarios_delete->loadRowValues($usuarios_delete->Recordset);

	// Render row
	$usuarios_delete->renderRow();
?>
	<tr <?php echo $usuarios->rowAttributes() ?>>
<?php if ($usuarios_delete->id_user->Visible) { // id_user ?>
		<td <?php echo $usuarios_delete->id_user->cellAttributes() ?>>
<span id="el<?php echo $usuarios_delete->RowCount ?>_usuarios_id_user" class="usuarios_id_user">
<span<?php echo $usuarios_delete->id_user->viewAttributes() ?>><?php echo $usuarios_delete->id_user->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($usuarios_delete->fecha_creacion->Visible) { // fecha_creacion ?>
		<td <?php echo $usuarios_delete->fecha_creacion->cellAttributes() ?>>
<span id="el<?php echo $usuarios_delete->RowCount ?>_usuarios_fecha_creacion" class="usuarios_fecha_creacion">
<span<?php echo $usuarios_delete->fecha_creacion->viewAttributes() ?>><?php echo $usuarios_delete->fecha_creacion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($usuarios_delete->nombres->Visible) { // nombres ?>
		<td <?php echo $usuarios_delete->nombres->cellAttributes() ?>>
<span id="el<?php echo $usuarios_delete->RowCount ?>_usuarios_nombres" class="usuarios_nombres">
<span<?php echo $usuarios_delete->nombres->viewAttributes() ?>><?php echo $usuarios_delete->nombres->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($usuarios_delete->apellidos->Visible) { // apellidos ?>
		<td <?php echo $usuarios_delete->apellidos->cellAttributes() ?>>
<span id="el<?php echo $usuarios_delete->RowCount ?>_usuarios_apellidos" class="usuarios_apellidos">
<span<?php echo $usuarios_delete->apellidos->viewAttributes() ?>><?php echo $usuarios_delete->apellidos->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($usuarios_delete->telefono->Visible) { // telefono ?>
		<td <?php echo $usuarios_delete->telefono->cellAttributes() ?>>
<span id="el<?php echo $usuarios_delete->RowCount ?>_usuarios_telefono" class="usuarios_telefono">
<span<?php echo $usuarios_delete->telefono->viewAttributes() ?>><?php echo $usuarios_delete->telefono->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($usuarios_delete->_login->Visible) { // login ?>
		<td <?php echo $usuarios_delete->_login->cellAttributes() ?>>
<span id="el<?php echo $usuarios_delete->RowCount ?>_usuarios__login" class="usuarios__login">
<span<?php echo $usuarios_delete->_login->viewAttributes() ?>><?php echo $usuarios_delete->_login->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($usuarios_delete->pw->Visible) { // pw ?>
		<td <?php echo $usuarios_delete->pw->cellAttributes() ?>>
<span id="el<?php echo $usuarios_delete->RowCount ?>_usuarios_pw" class="usuarios_pw">
<span<?php echo $usuarios_delete->pw->viewAttributes() ?>><?php echo $usuarios_delete->pw->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($usuarios_delete->perfil->Visible) { // perfil ?>
		<td <?php echo $usuarios_delete->perfil->cellAttributes() ?>>
<span id="el<?php echo $usuarios_delete->RowCount ?>_usuarios_perfil" class="usuarios_perfil">
<span<?php echo $usuarios_delete->perfil->viewAttributes() ?>><?php echo $usuarios_delete->perfil->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($usuarios_delete->sede->Visible) { // sede ?>
		<td <?php echo $usuarios_delete->sede->cellAttributes() ?>>
<span id="el<?php echo $usuarios_delete->RowCount ?>_usuarios_sede" class="usuarios_sede">
<span<?php echo $usuarios_delete->sede->viewAttributes() ?>><?php echo $usuarios_delete->sede->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($usuarios_delete->acode->Visible) { // acode ?>
		<td <?php echo $usuarios_delete->acode->cellAttributes() ?>>
<span id="el<?php echo $usuarios_delete->RowCount ?>_usuarios_acode" class="usuarios_acode">
<span<?php echo $usuarios_delete->acode->viewAttributes() ?>><?php echo $usuarios_delete->acode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$usuarios_delete->Recordset->moveNext();
}
$usuarios_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $usuarios_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$usuarios_delete->showPageFooter();
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
$usuarios_delete->terminate();
?>