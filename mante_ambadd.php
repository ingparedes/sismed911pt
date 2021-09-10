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
$mante_amb_add = new mante_amb_add();

// Run the page
$mante_amb_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mante_amb_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmante_ambadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fmante_ambadd = currentForm = new ew.Form("fmante_ambadd", "add");

	// Validate form
	fmante_ambadd.validate = function() {
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
			<?php if ($mante_amb_add->id_ambulancias->Required) { ?>
				elm = this.getElements("x" + infix + "_id_ambulancias");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mante_amb_add->id_ambulancias->caption(), $mante_amb_add->id_ambulancias->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_id_ambulancias");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mante_amb_add->id_ambulancias->errorMessage()) ?>");
			<?php if ($mante_amb_add->fecha_inicio->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_inicio");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mante_amb_add->fecha_inicio->caption(), $mante_amb_add->fecha_inicio->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_fecha_inicio");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mante_amb_add->fecha_inicio->errorMessage()) ?>");
			<?php if ($mante_amb_add->fecha_fin->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_fin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mante_amb_add->fecha_fin->caption(), $mante_amb_add->fecha_fin->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_fecha_fin");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mante_amb_add->fecha_fin->errorMessage()) ?>");
			<?php if ($mante_amb_add->observaciones->Required) { ?>
				elm = this.getElements("x" + infix + "_observaciones");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mante_amb_add->observaciones->caption(), $mante_amb_add->observaciones->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mante_amb_add->taller->Required) { ?>
				elm = this.getElements("x" + infix + "_taller");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mante_amb_add->taller->caption(), $mante_amb_add->taller->RequiredErrorMessage)) ?>");
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
	fmante_ambadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmante_ambadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fmante_ambadd.lists["x_taller"] = <?php echo $mante_amb_add->taller->Lookup->toClientList($mante_amb_add) ?>;
	fmante_ambadd.lists["x_taller"].options = <?php echo JsonEncode($mante_amb_add->taller->lookupOptions()) ?>;
	loadjs.done("fmante_ambadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mante_amb_add->showPageHeader(); ?>
<?php
$mante_amb_add->showMessage();
?>
<form name="fmante_ambadd" id="fmante_ambadd" class="<?php echo $mante_amb_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mante_amb">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$mante_amb_add->IsModal ?>">
<?php if ($mante_amb->getCurrentMasterTable() == "ambulancias") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ambulancias">
<input type="hidden" name="fk_id_ambulancias" value="<?php echo HtmlEncode($mante_amb_add->id_ambulancias->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($mante_amb_add->id_ambulancias->Visible) { // id_ambulancias ?>
	<div id="r_id_ambulancias" class="form-group row">
		<label id="elh_mante_amb_id_ambulancias" for="x_id_ambulancias" class="<?php echo $mante_amb_add->LeftColumnClass ?>"><?php echo $mante_amb_add->id_ambulancias->caption() ?><?php echo $mante_amb_add->id_ambulancias->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mante_amb_add->RightColumnClass ?>"><div <?php echo $mante_amb_add->id_ambulancias->cellAttributes() ?>>
<?php if ($mante_amb_add->id_ambulancias->getSessionValue() != "") { ?>
<span id="el_mante_amb_id_ambulancias">
<span<?php echo $mante_amb_add->id_ambulancias->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($mante_amb_add->id_ambulancias->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_id_ambulancias" name="x_id_ambulancias" value="<?php echo HtmlEncode($mante_amb_add->id_ambulancias->CurrentValue) ?>">
<?php } else { ?>
<span id="el_mante_amb_id_ambulancias">
<input type="text" data-table="mante_amb" data-field="x_id_ambulancias" name="x_id_ambulancias" id="x_id_ambulancias" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($mante_amb_add->id_ambulancias->getPlaceHolder()) ?>" value="<?php echo $mante_amb_add->id_ambulancias->EditValue ?>"<?php echo $mante_amb_add->id_ambulancias->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $mante_amb_add->id_ambulancias->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mante_amb_add->fecha_inicio->Visible) { // fecha_inicio ?>
	<div id="r_fecha_inicio" class="form-group row">
		<label id="elh_mante_amb_fecha_inicio" for="x_fecha_inicio" class="<?php echo $mante_amb_add->LeftColumnClass ?>"><?php echo $mante_amb_add->fecha_inicio->caption() ?><?php echo $mante_amb_add->fecha_inicio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mante_amb_add->RightColumnClass ?>"><div <?php echo $mante_amb_add->fecha_inicio->cellAttributes() ?>>
<span id="el_mante_amb_fecha_inicio">
<input type="text" data-table="mante_amb" data-field="x_fecha_inicio" name="x_fecha_inicio" id="x_fecha_inicio" maxlength="4" placeholder="<?php echo HtmlEncode($mante_amb_add->fecha_inicio->getPlaceHolder()) ?>" value="<?php echo $mante_amb_add->fecha_inicio->EditValue ?>"<?php echo $mante_amb_add->fecha_inicio->editAttributes() ?>>
<?php if (!$mante_amb_add->fecha_inicio->ReadOnly && !$mante_amb_add->fecha_inicio->Disabled && !isset($mante_amb_add->fecha_inicio->EditAttrs["readonly"]) && !isset($mante_amb_add->fecha_inicio->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmante_ambadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fmante_ambadd", "x_fecha_inicio", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $mante_amb_add->fecha_inicio->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mante_amb_add->fecha_fin->Visible) { // fecha_fin ?>
	<div id="r_fecha_fin" class="form-group row">
		<label id="elh_mante_amb_fecha_fin" for="x_fecha_fin" class="<?php echo $mante_amb_add->LeftColumnClass ?>"><?php echo $mante_amb_add->fecha_fin->caption() ?><?php echo $mante_amb_add->fecha_fin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mante_amb_add->RightColumnClass ?>"><div <?php echo $mante_amb_add->fecha_fin->cellAttributes() ?>>
<span id="el_mante_amb_fecha_fin">
<input type="text" data-table="mante_amb" data-field="x_fecha_fin" name="x_fecha_fin" id="x_fecha_fin" maxlength="4" placeholder="<?php echo HtmlEncode($mante_amb_add->fecha_fin->getPlaceHolder()) ?>" value="<?php echo $mante_amb_add->fecha_fin->EditValue ?>"<?php echo $mante_amb_add->fecha_fin->editAttributes() ?>>
<?php if (!$mante_amb_add->fecha_fin->ReadOnly && !$mante_amb_add->fecha_fin->Disabled && !isset($mante_amb_add->fecha_fin->EditAttrs["readonly"]) && !isset($mante_amb_add->fecha_fin->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmante_ambadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fmante_ambadd", "x_fecha_fin", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $mante_amb_add->fecha_fin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mante_amb_add->observaciones->Visible) { // observaciones ?>
	<div id="r_observaciones" class="form-group row">
		<label id="elh_mante_amb_observaciones" for="x_observaciones" class="<?php echo $mante_amb_add->LeftColumnClass ?>"><?php echo $mante_amb_add->observaciones->caption() ?><?php echo $mante_amb_add->observaciones->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mante_amb_add->RightColumnClass ?>"><div <?php echo $mante_amb_add->observaciones->cellAttributes() ?>>
<span id="el_mante_amb_observaciones">
<textarea data-table="mante_amb" data-field="x_observaciones" name="x_observaciones" id="x_observaciones" cols="35" rows="4" placeholder="<?php echo HtmlEncode($mante_amb_add->observaciones->getPlaceHolder()) ?>"<?php echo $mante_amb_add->observaciones->editAttributes() ?>><?php echo $mante_amb_add->observaciones->EditValue ?></textarea>
</span>
<?php echo $mante_amb_add->observaciones->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mante_amb_add->taller->Visible) { // taller ?>
	<div id="r_taller" class="form-group row">
		<label id="elh_mante_amb_taller" for="x_taller" class="<?php echo $mante_amb_add->LeftColumnClass ?>"><?php echo $mante_amb_add->taller->caption() ?><?php echo $mante_amb_add->taller->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mante_amb_add->RightColumnClass ?>"><div <?php echo $mante_amb_add->taller->cellAttributes() ?>>
<span id="el_mante_amb_taller">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mante_amb" data-field="x_taller" data-value-separator="<?php echo $mante_amb_add->taller->displayValueSeparatorAttribute() ?>" id="x_taller" name="x_taller"<?php echo $mante_amb_add->taller->editAttributes() ?>>
			<?php echo $mante_amb_add->taller->selectOptionListHtml("x_taller") ?>
		</select>
</div>
<?php echo $mante_amb_add->taller->Lookup->getParamTag($mante_amb_add, "p_x_taller") ?>
</span>
<?php echo $mante_amb_add->taller->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mante_amb_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mante_amb_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mante_amb_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mante_amb_add->showPageFooter();
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
$mante_amb_add->terminate();
?>