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
$usuarios_edit = new usuarios_edit();

// Run the page
$usuarios_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$usuarios_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fusuariosedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fusuariosedit = currentForm = new ew.Form("fusuariosedit", "edit");

	// Validate form
	fusuariosedit.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			<?php if ($usuarios_edit->id_user->Required) { ?>
				elm = this.getElements("x" + infix + "_id_user");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuarios_edit->id_user->caption(), $usuarios_edit->id_user->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($usuarios_edit->fecha_creacion->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_creacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuarios_edit->fecha_creacion->caption(), $usuarios_edit->fecha_creacion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($usuarios_edit->nombres->Required) { ?>
				elm = this.getElements("x" + infix + "_nombres");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuarios_edit->nombres->caption(), $usuarios_edit->nombres->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($usuarios_edit->apellidos->Required) { ?>
				elm = this.getElements("x" + infix + "_apellidos");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuarios_edit->apellidos->caption(), $usuarios_edit->apellidos->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($usuarios_edit->telefono->Required) { ?>
				elm = this.getElements("x" + infix + "_telefono");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuarios_edit->telefono->caption(), $usuarios_edit->telefono->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($usuarios_edit->_login->Required) { ?>
				elm = this.getElements("x" + infix + "__login");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuarios_edit->_login->caption(), $usuarios_edit->_login->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($usuarios_edit->pw->Required) { ?>
				elm = this.getElements("x" + infix + "_pw");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuarios_edit->pw->caption(), $usuarios_edit->pw->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($usuarios_edit->perfil->Required) { ?>
				elm = this.getElements("x" + infix + "_perfil");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuarios_edit->perfil->caption(), $usuarios_edit->perfil->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($usuarios_edit->sede->Required) { ?>
				elm = this.getElements("x" + infix + "_sede");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuarios_edit->sede->caption(), $usuarios_edit->sede->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($usuarios_edit->acode->Required) { ?>
				elm = this.getElements("x" + infix + "_acode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuarios_edit->acode->caption(), $usuarios_edit->acode->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}

		// Process detail forms
		var dfs = $fobj.find("input[name='detailpage']").get();
		for (var i = 0; i < dfs.length; i++) {
			var df = dfs[i], val = df.value;
			if (val && ew.forms[val])
				if (!ew.forms[val].validate())
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fusuariosedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fusuariosedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fusuariosedit.lists["x_perfil"] = <?php echo $usuarios_edit->perfil->Lookup->toClientList($usuarios_edit) ?>;
	fusuariosedit.lists["x_perfil"].options = <?php echo JsonEncode($usuarios_edit->perfil->lookupOptions()) ?>;
	fusuariosedit.lists["x_sede"] = <?php echo $usuarios_edit->sede->Lookup->toClientList($usuarios_edit) ?>;
	fusuariosedit.lists["x_sede"].options = <?php echo JsonEncode($usuarios_edit->sede->lookupOptions()) ?>;
	fusuariosedit.lists["x_acode"] = <?php echo $usuarios_edit->acode->Lookup->toClientList($usuarios_edit) ?>;
	fusuariosedit.lists["x_acode"].options = <?php echo JsonEncode($usuarios_edit->acode->lookupOptions()) ?>;
	loadjs.done("fusuariosedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $usuarios_edit->showPageHeader(); ?>
<?php
$usuarios_edit->showMessage();
?>
<form name="fusuariosedit" id="fusuariosedit" class="<?php echo $usuarios_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="usuarios">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$usuarios_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($usuarios_edit->id_user->Visible) { // id_user ?>
	<div id="r_id_user" class="form-group row">
		<label id="elh_usuarios_id_user" class="<?php echo $usuarios_edit->LeftColumnClass ?>"><?php echo $usuarios_edit->id_user->caption() ?><?php echo $usuarios_edit->id_user->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $usuarios_edit->RightColumnClass ?>"><div <?php echo $usuarios_edit->id_user->cellAttributes() ?>>
<span id="el_usuarios_id_user">
<span<?php echo $usuarios_edit->id_user->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($usuarios_edit->id_user->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="usuarios" data-field="x_id_user" name="x_id_user" id="x_id_user" value="<?php echo HtmlEncode($usuarios_edit->id_user->CurrentValue) ?>">
<?php echo $usuarios_edit->id_user->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($usuarios_edit->nombres->Visible) { // nombres ?>
	<div id="r_nombres" class="form-group row">
		<label id="elh_usuarios_nombres" for="x_nombres" class="<?php echo $usuarios_edit->LeftColumnClass ?>"><?php echo $usuarios_edit->nombres->caption() ?><?php echo $usuarios_edit->nombres->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $usuarios_edit->RightColumnClass ?>"><div <?php echo $usuarios_edit->nombres->cellAttributes() ?>>
<span id="el_usuarios_nombres">
<input type="text" data-table="usuarios" data-field="x_nombres" name="x_nombres" id="x_nombres" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($usuarios_edit->nombres->getPlaceHolder()) ?>" value="<?php echo $usuarios_edit->nombres->EditValue ?>"<?php echo $usuarios_edit->nombres->editAttributes() ?>>
</span>
<?php echo $usuarios_edit->nombres->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($usuarios_edit->apellidos->Visible) { // apellidos ?>
	<div id="r_apellidos" class="form-group row">
		<label id="elh_usuarios_apellidos" for="x_apellidos" class="<?php echo $usuarios_edit->LeftColumnClass ?>"><?php echo $usuarios_edit->apellidos->caption() ?><?php echo $usuarios_edit->apellidos->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $usuarios_edit->RightColumnClass ?>"><div <?php echo $usuarios_edit->apellidos->cellAttributes() ?>>
<span id="el_usuarios_apellidos">
<input type="text" data-table="usuarios" data-field="x_apellidos" name="x_apellidos" id="x_apellidos" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($usuarios_edit->apellidos->getPlaceHolder()) ?>" value="<?php echo $usuarios_edit->apellidos->EditValue ?>"<?php echo $usuarios_edit->apellidos->editAttributes() ?>>
</span>
<?php echo $usuarios_edit->apellidos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($usuarios_edit->telefono->Visible) { // telefono ?>
	<div id="r_telefono" class="form-group row">
		<label id="elh_usuarios_telefono" for="x_telefono" class="<?php echo $usuarios_edit->LeftColumnClass ?>"><?php echo $usuarios_edit->telefono->caption() ?><?php echo $usuarios_edit->telefono->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $usuarios_edit->RightColumnClass ?>"><div <?php echo $usuarios_edit->telefono->cellAttributes() ?>>
<span id="el_usuarios_telefono">
<input type="text" data-table="usuarios" data-field="x_telefono" name="x_telefono" id="x_telefono" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($usuarios_edit->telefono->getPlaceHolder()) ?>" value="<?php echo $usuarios_edit->telefono->EditValue ?>"<?php echo $usuarios_edit->telefono->editAttributes() ?>>
</span>
<?php echo $usuarios_edit->telefono->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($usuarios_edit->_login->Visible) { // login ?>
	<div id="r__login" class="form-group row">
		<label id="elh_usuarios__login" for="x__login" class="<?php echo $usuarios_edit->LeftColumnClass ?>"><?php echo $usuarios_edit->_login->caption() ?><?php echo $usuarios_edit->_login->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $usuarios_edit->RightColumnClass ?>"><div <?php echo $usuarios_edit->_login->cellAttributes() ?>>
<span id="el_usuarios__login">
<input type="text" data-table="usuarios" data-field="x__login" name="x__login" id="x__login" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($usuarios_edit->_login->getPlaceHolder()) ?>" value="<?php echo $usuarios_edit->_login->EditValue ?>"<?php echo $usuarios_edit->_login->editAttributes() ?>>
</span>
<?php echo $usuarios_edit->_login->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($usuarios_edit->pw->Visible) { // pw ?>
	<div id="r_pw" class="form-group row">
		<label id="elh_usuarios_pw" for="x_pw" class="<?php echo $usuarios_edit->LeftColumnClass ?>"><?php echo $usuarios_edit->pw->caption() ?><?php echo $usuarios_edit->pw->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $usuarios_edit->RightColumnClass ?>"><div <?php echo $usuarios_edit->pw->cellAttributes() ?>>
<span id="el_usuarios_pw">
<div class="input-group"><input type="password" name="x_pw" id="x_pw" autocomplete="new-password" data-field="x_pw" value="<?php echo $usuarios_edit->pw->EditValue ?>" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($usuarios_edit->pw->getPlaceHolder()) ?>"<?php echo $usuarios_edit->pw->editAttributes() ?>><div class="input-group-append"><button type="button" class="btn btn-default ew-toggle-password" onclick="ew.togglePassword(event);"><i class="fas fa-eye"></i></button></div></div>
</span>
<?php echo $usuarios_edit->pw->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($usuarios_edit->perfil->Visible) { // perfil ?>
	<div id="r_perfil" class="form-group row">
		<label id="elh_usuarios_perfil" for="x_perfil" class="<?php echo $usuarios_edit->LeftColumnClass ?>"><?php echo $usuarios_edit->perfil->caption() ?><?php echo $usuarios_edit->perfil->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $usuarios_edit->RightColumnClass ?>"><div <?php echo $usuarios_edit->perfil->cellAttributes() ?>>
<?php if (!$Security->isAdmin() && $Security->isLoggedIn()) { // Non system admin ?>
<span id="el_usuarios_perfil">
<input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($usuarios_edit->perfil->EditValue)) ?>">
</span>
<?php } else { ?>
<span id="el_usuarios_perfil">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="usuarios" data-field="x_perfil" data-value-separator="<?php echo $usuarios_edit->perfil->displayValueSeparatorAttribute() ?>" id="x_perfil" name="x_perfil"<?php echo $usuarios_edit->perfil->editAttributes() ?>>
			<?php echo $usuarios_edit->perfil->selectOptionListHtml("x_perfil") ?>
		</select>
</div>
<?php echo $usuarios_edit->perfil->Lookup->getParamTag($usuarios_edit, "p_x_perfil") ?>
</span>
<?php } ?>
<?php echo $usuarios_edit->perfil->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($usuarios_edit->sede->Visible) { // sede ?>
	<div id="r_sede" class="form-group row">
		<label id="elh_usuarios_sede" for="x_sede" class="<?php echo $usuarios_edit->LeftColumnClass ?>"><?php echo $usuarios_edit->sede->caption() ?><?php echo $usuarios_edit->sede->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $usuarios_edit->RightColumnClass ?>"><div <?php echo $usuarios_edit->sede->cellAttributes() ?>>
<span id="el_usuarios_sede">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="usuarios" data-field="x_sede" data-value-separator="<?php echo $usuarios_edit->sede->displayValueSeparatorAttribute() ?>" id="x_sede" name="x_sede"<?php echo $usuarios_edit->sede->editAttributes() ?>>
			<?php echo $usuarios_edit->sede->selectOptionListHtml("x_sede") ?>
		</select>
</div>
<?php echo $usuarios_edit->sede->Lookup->getParamTag($usuarios_edit, "p_x_sede") ?>
</span>
<?php echo $usuarios_edit->sede->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($usuarios_edit->acode->Visible) { // acode ?>
	<div id="r_acode" class="form-group row">
		<label id="elh_usuarios_acode" for="x_acode" class="<?php echo $usuarios_edit->LeftColumnClass ?>"><?php echo $usuarios_edit->acode->caption() ?><?php echo $usuarios_edit->acode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $usuarios_edit->RightColumnClass ?>"><div <?php echo $usuarios_edit->acode->cellAttributes() ?>>
<span id="el_usuarios_acode">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="usuarios" data-field="x_acode" data-value-separator="<?php echo $usuarios_edit->acode->displayValueSeparatorAttribute() ?>" id="x_acode" name="x_acode"<?php echo $usuarios_edit->acode->editAttributes() ?>>
			<?php echo $usuarios_edit->acode->selectOptionListHtml("x_acode") ?>
		</select>
</div>
<?php echo $usuarios_edit->acode->Lookup->getParamTag($usuarios_edit, "p_x_acode") ?>
</span>
<?php echo $usuarios_edit->acode->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$usuarios_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $usuarios_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $usuarios_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$usuarios_edit->showPageFooter();
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
$usuarios_edit->terminate();
?>