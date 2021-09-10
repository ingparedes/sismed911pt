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
$usuarios_view = new usuarios_view();

// Run the page
$usuarios_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$usuarios_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$usuarios_view->isExport()) { ?>
<script>
var fusuariosview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fusuariosview = currentForm = new ew.Form("fusuariosview", "view");
	loadjs.done("fusuariosview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$usuarios_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $usuarios_view->ExportOptions->render("body") ?>
<?php $usuarios_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $usuarios_view->showPageHeader(); ?>
<?php
$usuarios_view->showMessage();
?>
<form name="fusuariosview" id="fusuariosview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="usuarios">
<input type="hidden" name="modal" value="<?php echo (int)$usuarios_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($usuarios_view->id_user->Visible) { // id_user ?>
	<tr id="r_id_user">
		<td class="<?php echo $usuarios_view->TableLeftColumnClass ?>"><span id="elh_usuarios_id_user"><?php echo $usuarios_view->id_user->caption() ?></span></td>
		<td data-name="id_user" <?php echo $usuarios_view->id_user->cellAttributes() ?>>
<span id="el_usuarios_id_user">
<span<?php echo $usuarios_view->id_user->viewAttributes() ?>><?php echo $usuarios_view->id_user->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($usuarios_view->fecha_creacion->Visible) { // fecha_creacion ?>
	<tr id="r_fecha_creacion">
		<td class="<?php echo $usuarios_view->TableLeftColumnClass ?>"><span id="elh_usuarios_fecha_creacion"><?php echo $usuarios_view->fecha_creacion->caption() ?></span></td>
		<td data-name="fecha_creacion" <?php echo $usuarios_view->fecha_creacion->cellAttributes() ?>>
<span id="el_usuarios_fecha_creacion">
<span<?php echo $usuarios_view->fecha_creacion->viewAttributes() ?>><?php echo $usuarios_view->fecha_creacion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($usuarios_view->nombres->Visible) { // nombres ?>
	<tr id="r_nombres">
		<td class="<?php echo $usuarios_view->TableLeftColumnClass ?>"><span id="elh_usuarios_nombres"><?php echo $usuarios_view->nombres->caption() ?></span></td>
		<td data-name="nombres" <?php echo $usuarios_view->nombres->cellAttributes() ?>>
<span id="el_usuarios_nombres">
<span<?php echo $usuarios_view->nombres->viewAttributes() ?>><?php echo $usuarios_view->nombres->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($usuarios_view->apellidos->Visible) { // apellidos ?>
	<tr id="r_apellidos">
		<td class="<?php echo $usuarios_view->TableLeftColumnClass ?>"><span id="elh_usuarios_apellidos"><?php echo $usuarios_view->apellidos->caption() ?></span></td>
		<td data-name="apellidos" <?php echo $usuarios_view->apellidos->cellAttributes() ?>>
<span id="el_usuarios_apellidos">
<span<?php echo $usuarios_view->apellidos->viewAttributes() ?>><?php echo $usuarios_view->apellidos->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($usuarios_view->telefono->Visible) { // telefono ?>
	<tr id="r_telefono">
		<td class="<?php echo $usuarios_view->TableLeftColumnClass ?>"><span id="elh_usuarios_telefono"><?php echo $usuarios_view->telefono->caption() ?></span></td>
		<td data-name="telefono" <?php echo $usuarios_view->telefono->cellAttributes() ?>>
<span id="el_usuarios_telefono">
<span<?php echo $usuarios_view->telefono->viewAttributes() ?>><?php echo $usuarios_view->telefono->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($usuarios_view->_login->Visible) { // login ?>
	<tr id="r__login">
		<td class="<?php echo $usuarios_view->TableLeftColumnClass ?>"><span id="elh_usuarios__login"><?php echo $usuarios_view->_login->caption() ?></span></td>
		<td data-name="_login" <?php echo $usuarios_view->_login->cellAttributes() ?>>
<span id="el_usuarios__login">
<span<?php echo $usuarios_view->_login->viewAttributes() ?>><?php echo $usuarios_view->_login->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($usuarios_view->pw->Visible) { // pw ?>
	<tr id="r_pw">
		<td class="<?php echo $usuarios_view->TableLeftColumnClass ?>"><span id="elh_usuarios_pw"><?php echo $usuarios_view->pw->caption() ?></span></td>
		<td data-name="pw" <?php echo $usuarios_view->pw->cellAttributes() ?>>
<span id="el_usuarios_pw">
<span<?php echo $usuarios_view->pw->viewAttributes() ?>><?php echo $usuarios_view->pw->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($usuarios_view->perfil->Visible) { // perfil ?>
	<tr id="r_perfil">
		<td class="<?php echo $usuarios_view->TableLeftColumnClass ?>"><span id="elh_usuarios_perfil"><?php echo $usuarios_view->perfil->caption() ?></span></td>
		<td data-name="perfil" <?php echo $usuarios_view->perfil->cellAttributes() ?>>
<span id="el_usuarios_perfil">
<span<?php echo $usuarios_view->perfil->viewAttributes() ?>><?php echo $usuarios_view->perfil->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($usuarios_view->sede->Visible) { // sede ?>
	<tr id="r_sede">
		<td class="<?php echo $usuarios_view->TableLeftColumnClass ?>"><span id="elh_usuarios_sede"><?php echo $usuarios_view->sede->caption() ?></span></td>
		<td data-name="sede" <?php echo $usuarios_view->sede->cellAttributes() ?>>
<span id="el_usuarios_sede">
<span<?php echo $usuarios_view->sede->viewAttributes() ?>><?php echo $usuarios_view->sede->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($usuarios_view->acode->Visible) { // acode ?>
	<tr id="r_acode">
		<td class="<?php echo $usuarios_view->TableLeftColumnClass ?>"><span id="elh_usuarios_acode"><?php echo $usuarios_view->acode->caption() ?></span></td>
		<td data-name="acode" <?php echo $usuarios_view->acode->cellAttributes() ?>>
<span id="el_usuarios_acode">
<span<?php echo $usuarios_view->acode->viewAttributes() ?>><?php echo $usuarios_view->acode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$usuarios_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$usuarios_view->isExport()) { ?>
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
$usuarios_view->terminate();
?>