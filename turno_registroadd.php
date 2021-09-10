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
$turno_registro_add = new turno_registro_add();

// Run the page
$turno_registro_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$turno_registro_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fturno_registroadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fturno_registroadd = currentForm = new ew.Form("fturno_registroadd", "add");

	// Validate form
	fturno_registroadd.validate = function() {
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
			<?php if ($turno_registro_add->cod_ambulancias->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_ambulancias");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $turno_registro_add->cod_ambulancias->caption(), $turno_registro_add->cod_ambulancias->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($turno_registro_add->km_actual->Required) { ?>
				elm = this.getElements("x" + infix + "_km_actual");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $turno_registro_add->km_actual->caption(), $turno_registro_add->km_actual->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($turno_registro_add->combustible_actual->Required) { ?>
				elm = this.getElements("x" + infix + "_combustible_actual");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $turno_registro_add->combustible_actual->caption(), $turno_registro_add->combustible_actual->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($turno_registro_add->cantidadtiket->Required) { ?>
				elm = this.getElements("x" + infix + "_cantidadtiket");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $turno_registro_add->cantidadtiket->caption(), $turno_registro_add->cantidadtiket->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($turno_registro_add->observacion->Required) { ?>
				elm = this.getElements("x" + infix + "_observacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $turno_registro_add->observacion->caption(), $turno_registro_add->observacion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($turno_registro_add->usuario->Required) { ?>
				elm = this.getElements("x" + infix + "_usuario");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $turno_registro_add->usuario->caption(), $turno_registro_add->usuario->RequiredErrorMessage)) ?>");
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
	fturno_registroadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fturno_registroadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fturno_registroadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $turno_registro_add->showPageHeader(); ?>
<?php
$turno_registro_add->showMessage();
?>
<form name="fturno_registroadd" id="fturno_registroadd" class="<?php echo $turno_registro_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="turno_registro">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$turno_registro_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($turno_registro_add->cod_ambulancias->Visible) { // cod_ambulancias ?>
	<div id="r_cod_ambulancias" class="form-group row">
		<label id="elh_turno_registro_cod_ambulancias" for="x_cod_ambulancias" class="<?php echo $turno_registro_add->LeftColumnClass ?>"><?php echo $turno_registro_add->cod_ambulancias->caption() ?><?php echo $turno_registro_add->cod_ambulancias->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $turno_registro_add->RightColumnClass ?>"><div <?php echo $turno_registro_add->cod_ambulancias->cellAttributes() ?>>
<span id="el_turno_registro_cod_ambulancias">
<input type="text" data-table="turno_registro" data-field="x_cod_ambulancias" name="x_cod_ambulancias" id="x_cod_ambulancias" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($turno_registro_add->cod_ambulancias->getPlaceHolder()) ?>" value="<?php echo $turno_registro_add->cod_ambulancias->EditValue ?>"<?php echo $turno_registro_add->cod_ambulancias->editAttributes() ?>>
</span>
<?php echo $turno_registro_add->cod_ambulancias->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($turno_registro_add->km_actual->Visible) { // km_actual ?>
	<div id="r_km_actual" class="form-group row">
		<label id="elh_turno_registro_km_actual" for="x_km_actual" class="<?php echo $turno_registro_add->LeftColumnClass ?>"><?php echo $turno_registro_add->km_actual->caption() ?><?php echo $turno_registro_add->km_actual->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $turno_registro_add->RightColumnClass ?>"><div <?php echo $turno_registro_add->km_actual->cellAttributes() ?>>
<span id="el_turno_registro_km_actual">
<input type="text" data-table="turno_registro" data-field="x_km_actual" name="x_km_actual" id="x_km_actual" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($turno_registro_add->km_actual->getPlaceHolder()) ?>" value="<?php echo $turno_registro_add->km_actual->EditValue ?>"<?php echo $turno_registro_add->km_actual->editAttributes() ?>>
</span>
<?php echo $turno_registro_add->km_actual->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($turno_registro_add->combustible_actual->Visible) { // combustible_actual ?>
	<div id="r_combustible_actual" class="form-group row">
		<label id="elh_turno_registro_combustible_actual" for="x_combustible_actual" class="<?php echo $turno_registro_add->LeftColumnClass ?>"><?php echo $turno_registro_add->combustible_actual->caption() ?><?php echo $turno_registro_add->combustible_actual->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $turno_registro_add->RightColumnClass ?>"><div <?php echo $turno_registro_add->combustible_actual->cellAttributes() ?>>
<span id="el_turno_registro_combustible_actual">
<input type="text" data-table="turno_registro" data-field="x_combustible_actual" name="x_combustible_actual" id="x_combustible_actual" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($turno_registro_add->combustible_actual->getPlaceHolder()) ?>" value="<?php echo $turno_registro_add->combustible_actual->EditValue ?>"<?php echo $turno_registro_add->combustible_actual->editAttributes() ?>>
</span>
<?php echo $turno_registro_add->combustible_actual->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($turno_registro_add->cantidadtiket->Visible) { // cantidadtiket ?>
	<div id="r_cantidadtiket" class="form-group row">
		<label id="elh_turno_registro_cantidadtiket" for="x_cantidadtiket" class="<?php echo $turno_registro_add->LeftColumnClass ?>"><?php echo $turno_registro_add->cantidadtiket->caption() ?><?php echo $turno_registro_add->cantidadtiket->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $turno_registro_add->RightColumnClass ?>"><div <?php echo $turno_registro_add->cantidadtiket->cellAttributes() ?>>
<span id="el_turno_registro_cantidadtiket">
<input type="text" data-table="turno_registro" data-field="x_cantidadtiket" name="x_cantidadtiket" id="x_cantidadtiket" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($turno_registro_add->cantidadtiket->getPlaceHolder()) ?>" value="<?php echo $turno_registro_add->cantidadtiket->EditValue ?>"<?php echo $turno_registro_add->cantidadtiket->editAttributes() ?>>
</span>
<?php echo $turno_registro_add->cantidadtiket->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($turno_registro_add->observacion->Visible) { // observacion ?>
	<div id="r_observacion" class="form-group row">
		<label id="elh_turno_registro_observacion" for="x_observacion" class="<?php echo $turno_registro_add->LeftColumnClass ?>"><?php echo $turno_registro_add->observacion->caption() ?><?php echo $turno_registro_add->observacion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $turno_registro_add->RightColumnClass ?>"><div <?php echo $turno_registro_add->observacion->cellAttributes() ?>>
<span id="el_turno_registro_observacion">
<textarea data-table="turno_registro" data-field="x_observacion" name="x_observacion" id="x_observacion" cols="35" rows="4" placeholder="<?php echo HtmlEncode($turno_registro_add->observacion->getPlaceHolder()) ?>"<?php echo $turno_registro_add->observacion->editAttributes() ?>><?php echo $turno_registro_add->observacion->EditValue ?></textarea>
</span>
<?php echo $turno_registro_add->observacion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($turno_registro_add->usuario->Visible) { // usuario ?>
	<div id="r_usuario" class="form-group row">
		<label id="elh_turno_registro_usuario" for="x_usuario" class="<?php echo $turno_registro_add->LeftColumnClass ?>"><?php echo $turno_registro_add->usuario->caption() ?><?php echo $turno_registro_add->usuario->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $turno_registro_add->RightColumnClass ?>"><div <?php echo $turno_registro_add->usuario->cellAttributes() ?>>
<span id="el_turno_registro_usuario">
<input type="text" data-table="turno_registro" data-field="x_usuario" name="x_usuario" id="x_usuario" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($turno_registro_add->usuario->getPlaceHolder()) ?>" value="<?php echo $turno_registro_add->usuario->EditValue ?>"<?php echo $turno_registro_add->usuario->editAttributes() ?>>
</span>
<?php echo $turno_registro_add->usuario->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$turno_registro_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $turno_registro_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $turno_registro_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$turno_registro_add->showPageFooter();
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
$turno_registro_add->terminate();
?>