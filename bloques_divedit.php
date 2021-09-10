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
$bloques_div_edit = new bloques_div_edit();

// Run the page
$bloques_div_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bloques_div_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbloques_divedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fbloques_divedit = currentForm = new ew.Form("fbloques_divedit", "edit");

	// Validate form
	fbloques_divedit.validate = function() {
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
			<?php if ($bloques_div_edit->bloque->Required) { ?>
				elm = this.getElements("x" + infix + "_bloque");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bloques_div_edit->bloque->caption(), $bloques_div_edit->bloque->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bloques_div_edit->fecha_creacion->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_creacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bloques_div_edit->fecha_creacion->caption(), $bloques_div_edit->fecha_creacion->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_fecha_creacion");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bloques_div_edit->fecha_creacion->errorMessage()) ?>");
			<?php if ($bloques_div_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bloques_div_edit->id->caption(), $bloques_div_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bloques_div_edit->activo->Required) { ?>
				elm = this.getElements("x" + infix + "_activo[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bloques_div_edit->activo->caption(), $bloques_div_edit->activo->RequiredErrorMessage)) ?>");
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
	fbloques_divedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbloques_divedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fbloques_divedit.lists["x_activo[]"] = <?php echo $bloques_div_edit->activo->Lookup->toClientList($bloques_div_edit) ?>;
	fbloques_divedit.lists["x_activo[]"].options = <?php echo JsonEncode($bloques_div_edit->activo->options(FALSE, TRUE)) ?>;
	loadjs.done("fbloques_divedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $bloques_div_edit->showPageHeader(); ?>
<?php
$bloques_div_edit->showMessage();
?>
<form name="fbloques_divedit" id="fbloques_divedit" class="<?php echo $bloques_div_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bloques_div">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$bloques_div_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($bloques_div_edit->bloque->Visible) { // bloque ?>
	<div id="r_bloque" class="form-group row">
		<label id="elh_bloques_div_bloque" for="x_bloque" class="<?php echo $bloques_div_edit->LeftColumnClass ?>"><?php echo $bloques_div_edit->bloque->caption() ?><?php echo $bloques_div_edit->bloque->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bloques_div_edit->RightColumnClass ?>"><div <?php echo $bloques_div_edit->bloque->cellAttributes() ?>>
<span id="el_bloques_div_bloque">
<input type="text" data-table="bloques_div" data-field="x_bloque" name="x_bloque" id="x_bloque" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($bloques_div_edit->bloque->getPlaceHolder()) ?>" value="<?php echo $bloques_div_edit->bloque->EditValue ?>"<?php echo $bloques_div_edit->bloque->editAttributes() ?>>
</span>
<?php echo $bloques_div_edit->bloque->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bloques_div_edit->fecha_creacion->Visible) { // fecha_creacion ?>
	<div id="r_fecha_creacion" class="form-group row">
		<label id="elh_bloques_div_fecha_creacion" for="x_fecha_creacion" class="<?php echo $bloques_div_edit->LeftColumnClass ?>"><?php echo $bloques_div_edit->fecha_creacion->caption() ?><?php echo $bloques_div_edit->fecha_creacion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bloques_div_edit->RightColumnClass ?>"><div <?php echo $bloques_div_edit->fecha_creacion->cellAttributes() ?>>
<span id="el_bloques_div_fecha_creacion">
<input type="text" data-table="bloques_div" data-field="x_fecha_creacion" name="x_fecha_creacion" id="x_fecha_creacion" maxlength="8" placeholder="<?php echo HtmlEncode($bloques_div_edit->fecha_creacion->getPlaceHolder()) ?>" value="<?php echo $bloques_div_edit->fecha_creacion->EditValue ?>"<?php echo $bloques_div_edit->fecha_creacion->editAttributes() ?>>
<?php if (!$bloques_div_edit->fecha_creacion->ReadOnly && !$bloques_div_edit->fecha_creacion->Disabled && !isset($bloques_div_edit->fecha_creacion->EditAttrs["readonly"]) && !isset($bloques_div_edit->fecha_creacion->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbloques_divedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fbloques_divedit", "x_fecha_creacion", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $bloques_div_edit->fecha_creacion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bloques_div_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_bloques_div_id" class="<?php echo $bloques_div_edit->LeftColumnClass ?>"><?php echo $bloques_div_edit->id->caption() ?><?php echo $bloques_div_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bloques_div_edit->RightColumnClass ?>"><div <?php echo $bloques_div_edit->id->cellAttributes() ?>>
<span id="el_bloques_div_id">
<span<?php echo $bloques_div_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bloques_div_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="bloques_div" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($bloques_div_edit->id->CurrentValue) ?>">
<?php echo $bloques_div_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bloques_div_edit->activo->Visible) { // activo ?>
	<div id="r_activo" class="form-group row">
		<label id="elh_bloques_div_activo" class="<?php echo $bloques_div_edit->LeftColumnClass ?>"><?php echo $bloques_div_edit->activo->caption() ?><?php echo $bloques_div_edit->activo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bloques_div_edit->RightColumnClass ?>"><div <?php echo $bloques_div_edit->activo->cellAttributes() ?>>
<span id="el_bloques_div_activo">
<?php
$selwrk = ConvertToBool($bloques_div_edit->activo->CurrentValue) ? " checked" : "";
?>
<div class="custom-control custom-checkbox d-inline-block">
	<input type="checkbox" class="custom-control-input" data-table="bloques_div" data-field="x_activo" name="x_activo[]" id="x_activo[]_423435" value="1"<?php echo $selwrk ?><?php echo $bloques_div_edit->activo->editAttributes() ?>>
	<label class="custom-control-label" for="x_activo[]_423435"></label>
</div>
</span>
<?php echo $bloques_div_edit->activo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$bloques_div_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $bloques_div_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $bloques_div_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$bloques_div_edit->showPageFooter();
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
$bloques_div_edit->terminate();
?>