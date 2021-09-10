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
$bloques_div_add = new bloques_div_add();

// Run the page
$bloques_div_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bloques_div_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbloques_divadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fbloques_divadd = currentForm = new ew.Form("fbloques_divadd", "add");

	// Validate form
	fbloques_divadd.validate = function() {
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
			<?php if ($bloques_div_add->bloque->Required) { ?>
				elm = this.getElements("x" + infix + "_bloque");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bloques_div_add->bloque->caption(), $bloques_div_add->bloque->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bloques_div_add->fecha_creacion->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_creacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bloques_div_add->fecha_creacion->caption(), $bloques_div_add->fecha_creacion->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_fecha_creacion");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bloques_div_add->fecha_creacion->errorMessage()) ?>");
			<?php if ($bloques_div_add->activo->Required) { ?>
				elm = this.getElements("x" + infix + "_activo[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bloques_div_add->activo->caption(), $bloques_div_add->activo->RequiredErrorMessage)) ?>");
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
	fbloques_divadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbloques_divadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fbloques_divadd.lists["x_activo[]"] = <?php echo $bloques_div_add->activo->Lookup->toClientList($bloques_div_add) ?>;
	fbloques_divadd.lists["x_activo[]"].options = <?php echo JsonEncode($bloques_div_add->activo->options(FALSE, TRUE)) ?>;
	loadjs.done("fbloques_divadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $bloques_div_add->showPageHeader(); ?>
<?php
$bloques_div_add->showMessage();
?>
<form name="fbloques_divadd" id="fbloques_divadd" class="<?php echo $bloques_div_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bloques_div">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$bloques_div_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($bloques_div_add->bloque->Visible) { // bloque ?>
	<div id="r_bloque" class="form-group row">
		<label id="elh_bloques_div_bloque" for="x_bloque" class="<?php echo $bloques_div_add->LeftColumnClass ?>"><?php echo $bloques_div_add->bloque->caption() ?><?php echo $bloques_div_add->bloque->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bloques_div_add->RightColumnClass ?>"><div <?php echo $bloques_div_add->bloque->cellAttributes() ?>>
<span id="el_bloques_div_bloque">
<input type="text" data-table="bloques_div" data-field="x_bloque" name="x_bloque" id="x_bloque" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($bloques_div_add->bloque->getPlaceHolder()) ?>" value="<?php echo $bloques_div_add->bloque->EditValue ?>"<?php echo $bloques_div_add->bloque->editAttributes() ?>>
</span>
<?php echo $bloques_div_add->bloque->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bloques_div_add->fecha_creacion->Visible) { // fecha_creacion ?>
	<div id="r_fecha_creacion" class="form-group row">
		<label id="elh_bloques_div_fecha_creacion" for="x_fecha_creacion" class="<?php echo $bloques_div_add->LeftColumnClass ?>"><?php echo $bloques_div_add->fecha_creacion->caption() ?><?php echo $bloques_div_add->fecha_creacion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bloques_div_add->RightColumnClass ?>"><div <?php echo $bloques_div_add->fecha_creacion->cellAttributes() ?>>
<span id="el_bloques_div_fecha_creacion">
<input type="text" data-table="bloques_div" data-field="x_fecha_creacion" name="x_fecha_creacion" id="x_fecha_creacion" maxlength="8" placeholder="<?php echo HtmlEncode($bloques_div_add->fecha_creacion->getPlaceHolder()) ?>" value="<?php echo $bloques_div_add->fecha_creacion->EditValue ?>"<?php echo $bloques_div_add->fecha_creacion->editAttributes() ?>>
<?php if (!$bloques_div_add->fecha_creacion->ReadOnly && !$bloques_div_add->fecha_creacion->Disabled && !isset($bloques_div_add->fecha_creacion->EditAttrs["readonly"]) && !isset($bloques_div_add->fecha_creacion->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbloques_divadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fbloques_divadd", "x_fecha_creacion", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $bloques_div_add->fecha_creacion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bloques_div_add->activo->Visible) { // activo ?>
	<div id="r_activo" class="form-group row">
		<label id="elh_bloques_div_activo" class="<?php echo $bloques_div_add->LeftColumnClass ?>"><?php echo $bloques_div_add->activo->caption() ?><?php echo $bloques_div_add->activo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bloques_div_add->RightColumnClass ?>"><div <?php echo $bloques_div_add->activo->cellAttributes() ?>>
<span id="el_bloques_div_activo">
<?php
$selwrk = ConvertToBool($bloques_div_add->activo->CurrentValue) ? " checked" : "";
?>
<div class="custom-control custom-checkbox d-inline-block">
	<input type="checkbox" class="custom-control-input" data-table="bloques_div" data-field="x_activo" name="x_activo[]" id="x_activo[]_122927" value="1"<?php echo $selwrk ?><?php echo $bloques_div_add->activo->editAttributes() ?>>
	<label class="custom-control-label" for="x_activo[]_122927"></label>
</div>
</span>
<?php echo $bloques_div_add->activo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$bloques_div_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $bloques_div_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $bloques_div_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$bloques_div_add->showPageFooter();
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
$bloques_div_add->terminate();
?>