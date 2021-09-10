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
$usuarios_add = new usuarios_add();

// Run the page
$usuarios_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$usuarios_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fusuariosadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fusuariosadd = currentForm = new ew.Form("fusuariosadd", "add");

	// Validate form
	fusuariosadd.validate = function() {
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
			<?php if ($usuarios_add->fecha_creacion->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_creacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuarios_add->fecha_creacion->caption(), $usuarios_add->fecha_creacion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($usuarios_add->nombres->Required) { ?>
				elm = this.getElements("x" + infix + "_nombres");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuarios_add->nombres->caption(), $usuarios_add->nombres->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($usuarios_add->apellidos->Required) { ?>
				elm = this.getElements("x" + infix + "_apellidos");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuarios_add->apellidos->caption(), $usuarios_add->apellidos->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($usuarios_add->telefono->Required) { ?>
				elm = this.getElements("x" + infix + "_telefono");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuarios_add->telefono->caption(), $usuarios_add->telefono->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($usuarios_add->_login->Required) { ?>
				elm = this.getElements("x" + infix + "__login");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuarios_add->_login->caption(), $usuarios_add->_login->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($usuarios_add->pw->Required) { ?>
				elm = this.getElements("x" + infix + "_pw");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuarios_add->pw->caption(), $usuarios_add->pw->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($usuarios_add->perfil->Required) { ?>
				elm = this.getElements("x" + infix + "_perfil");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuarios_add->perfil->caption(), $usuarios_add->perfil->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($usuarios_add->sede->Required) { ?>
				elm = this.getElements("x" + infix + "_sede");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuarios_add->sede->caption(), $usuarios_add->sede->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($usuarios_add->acode->Required) { ?>
				elm = this.getElements("x" + infix + "_acode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $usuarios_add->acode->caption(), $usuarios_add->acode->RequiredErrorMessage)) ?>");
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
	fusuariosadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fusuariosadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fusuariosadd.lists["x_perfil"] = <?php echo $usuarios_add->perfil->Lookup->toClientList($usuarios_add) ?>;
	fusuariosadd.lists["x_perfil"].options = <?php echo JsonEncode($usuarios_add->perfil->lookupOptions()) ?>;
	fusuariosadd.lists["x_sede"] = <?php echo $usuarios_add->sede->Lookup->toClientList($usuarios_add) ?>;
	fusuariosadd.lists["x_sede"].options = <?php echo JsonEncode($usuarios_add->sede->lookupOptions()) ?>;
	fusuariosadd.lists["x_acode"] = <?php echo $usuarios_add->acode->Lookup->toClientList($usuarios_add) ?>;
	fusuariosadd.lists["x_acode"].options = <?php echo JsonEncode($usuarios_add->acode->lookupOptions()) ?>;
	loadjs.done("fusuariosadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $usuarios_add->showPageHeader(); ?>
<?php
$usuarios_add->showMessage();
?>
<form name="fusuariosadd" id="fusuariosadd" class="<?php echo $usuarios_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="usuarios">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$usuarios_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($usuarios_add->nombres->Visible) { // nombres ?>
	<div id="r_nombres" class="form-group row">
		<label id="elh_usuarios_nombres" for="x_nombres" class="<?php echo $usuarios_add->LeftColumnClass ?>"><?php echo $usuarios_add->nombres->caption() ?><?php echo $usuarios_add->nombres->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $usuarios_add->RightColumnClass ?>"><div <?php echo $usuarios_add->nombres->cellAttributes() ?>>
<span id="el_usuarios_nombres">
<input type="text" data-table="usuarios" data-field="x_nombres" name="x_nombres" id="x_nombres" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($usuarios_add->nombres->getPlaceHolder()) ?>" value="<?php echo $usuarios_add->nombres->EditValue ?>"<?php echo $usuarios_add->nombres->editAttributes() ?>>
</span>
<?php echo $usuarios_add->nombres->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($usuarios_add->apellidos->Visible) { // apellidos ?>
	<div id="r_apellidos" class="form-group row">
		<label id="elh_usuarios_apellidos" for="x_apellidos" class="<?php echo $usuarios_add->LeftColumnClass ?>"><?php echo $usuarios_add->apellidos->caption() ?><?php echo $usuarios_add->apellidos->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $usuarios_add->RightColumnClass ?>"><div <?php echo $usuarios_add->apellidos->cellAttributes() ?>>
<span id="el_usuarios_apellidos">
<input type="text" data-table="usuarios" data-field="x_apellidos" name="x_apellidos" id="x_apellidos" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($usuarios_add->apellidos->getPlaceHolder()) ?>" value="<?php echo $usuarios_add->apellidos->EditValue ?>"<?php echo $usuarios_add->apellidos->editAttributes() ?>>
</span>
<?php echo $usuarios_add->apellidos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($usuarios_add->telefono->Visible) { // telefono ?>
	<div id="r_telefono" class="form-group row">
		<label id="elh_usuarios_telefono" for="x_telefono" class="<?php echo $usuarios_add->LeftColumnClass ?>"><?php echo $usuarios_add->telefono->caption() ?><?php echo $usuarios_add->telefono->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $usuarios_add->RightColumnClass ?>"><div <?php echo $usuarios_add->telefono->cellAttributes() ?>>
<span id="el_usuarios_telefono">
<input type="text" data-table="usuarios" data-field="x_telefono" name="x_telefono" id="x_telefono" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($usuarios_add->telefono->getPlaceHolder()) ?>" value="<?php echo $usuarios_add->telefono->EditValue ?>"<?php echo $usuarios_add->telefono->editAttributes() ?>>
</span>
<?php echo $usuarios_add->telefono->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($usuarios_add->_login->Visible) { // login ?>
	<div id="r__login" class="form-group row">
		<label id="elh_usuarios__login" for="x__login" class="<?php echo $usuarios_add->LeftColumnClass ?>"><?php echo $usuarios_add->_login->caption() ?><?php echo $usuarios_add->_login->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $usuarios_add->RightColumnClass ?>"><div <?php echo $usuarios_add->_login->cellAttributes() ?>>
<span id="el_usuarios__login">
<input type="text" data-table="usuarios" data-field="x__login" name="x__login" id="x__login" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($usuarios_add->_login->getPlaceHolder()) ?>" value="<?php echo $usuarios_add->_login->EditValue ?>"<?php echo $usuarios_add->_login->editAttributes() ?>>
</span>
<?php echo $usuarios_add->_login->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($usuarios_add->pw->Visible) { // pw ?>
	<div id="r_pw" class="form-group row">
		<label id="elh_usuarios_pw" for="x_pw" class="<?php echo $usuarios_add->LeftColumnClass ?>"><?php echo $usuarios_add->pw->caption() ?><?php echo $usuarios_add->pw->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $usuarios_add->RightColumnClass ?>"><div <?php echo $usuarios_add->pw->cellAttributes() ?>>
<span id="el_usuarios_pw">
<div class="input-group"><input type="password" name="x_pw" id="x_pw" autocomplete="new-password" data-field="x_pw" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($usuarios_add->pw->getPlaceHolder()) ?>"<?php echo $usuarios_add->pw->editAttributes() ?>><div class="input-group-append"><button type="button" class="btn btn-default ew-toggle-password" onclick="ew.togglePassword(event);"><i class="fas fa-eye"></i></button></div></div>
</span>
<?php echo $usuarios_add->pw->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($usuarios_add->perfil->Visible) { // perfil ?>
	<div id="r_perfil" class="form-group row">
		<label id="elh_usuarios_perfil" for="x_perfil" class="<?php echo $usuarios_add->LeftColumnClass ?>"><?php echo $usuarios_add->perfil->caption() ?><?php echo $usuarios_add->perfil->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $usuarios_add->RightColumnClass ?>"><div <?php echo $usuarios_add->perfil->cellAttributes() ?>>
<?php if (!$Security->isAdmin() && $Security->isLoggedIn()) { // Non system admin ?>
<span id="el_usuarios_perfil">
<input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($usuarios_add->perfil->EditValue)) ?>">
</span>
<?php } else { ?>
<span id="el_usuarios_perfil">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="usuarios" data-field="x_perfil" data-value-separator="<?php echo $usuarios_add->perfil->displayValueSeparatorAttribute() ?>" id="x_perfil" name="x_perfil"<?php echo $usuarios_add->perfil->editAttributes() ?>>
			<?php echo $usuarios_add->perfil->selectOptionListHtml("x_perfil") ?>
		</select>
</div>
<?php echo $usuarios_add->perfil->Lookup->getParamTag($usuarios_add, "p_x_perfil") ?>
</span>
<?php } ?>
<?php echo $usuarios_add->perfil->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($usuarios_add->sede->Visible) { // sede ?>
	<div id="r_sede" class="form-group row">
		<label id="elh_usuarios_sede" for="x_sede" class="<?php echo $usuarios_add->LeftColumnClass ?>"><?php echo $usuarios_add->sede->caption() ?><?php echo $usuarios_add->sede->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $usuarios_add->RightColumnClass ?>"><div <?php echo $usuarios_add->sede->cellAttributes() ?>>
<span id="el_usuarios_sede">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="usuarios" data-field="x_sede" data-value-separator="<?php echo $usuarios_add->sede->displayValueSeparatorAttribute() ?>" id="x_sede" name="x_sede"<?php echo $usuarios_add->sede->editAttributes() ?>>
			<?php echo $usuarios_add->sede->selectOptionListHtml("x_sede") ?>
		</select>
</div>
<?php echo $usuarios_add->sede->Lookup->getParamTag($usuarios_add, "p_x_sede") ?>
</span>
<?php echo $usuarios_add->sede->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($usuarios_add->acode->Visible) { // acode ?>
	<div id="r_acode" class="form-group row">
		<label id="elh_usuarios_acode" for="x_acode" class="<?php echo $usuarios_add->LeftColumnClass ?>"><?php echo $usuarios_add->acode->caption() ?><?php echo $usuarios_add->acode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $usuarios_add->RightColumnClass ?>"><div <?php echo $usuarios_add->acode->cellAttributes() ?>>
<span id="el_usuarios_acode">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="usuarios" data-field="x_acode" data-value-separator="<?php echo $usuarios_add->acode->displayValueSeparatorAttribute() ?>" id="x_acode" name="x_acode"<?php echo $usuarios_add->acode->editAttributes() ?>>
			<?php echo $usuarios_add->acode->selectOptionListHtml("x_acode") ?>
		</select>
</div>
<?php echo $usuarios_add->acode->Lookup->getParamTag($usuarios_add, "p_x_acode") ?>
</span>
<?php echo $usuarios_add->acode->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$usuarios_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $usuarios_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $usuarios_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$usuarios_add->showPageFooter();
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
$usuarios_add->terminate();
?>