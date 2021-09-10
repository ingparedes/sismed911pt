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
$alerta_censo_add = new alerta_censo_add();

// Run the page
$alerta_censo_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$alerta_censo_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var falerta_censoadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	falerta_censoadd = currentForm = new ew.Form("falerta_censoadd", "add");

	// Validate form
	falerta_censoadd.validate = function() {
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
			<?php if ($alerta_censo_add->hora1->Required) { ?>
				elm = this.getElements("x" + infix + "_hora1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alerta_censo_add->hora1->caption(), $alerta_censo_add->hora1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($alerta_censo_add->hora2->Required) { ?>
				elm = this.getElements("x" + infix + "_hora2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alerta_censo_add->hora2->caption(), $alerta_censo_add->hora2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($alerta_censo_add->hora3->Required) { ?>
				elm = this.getElements("x" + infix + "_hora3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alerta_censo_add->hora3->caption(), $alerta_censo_add->hora3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($alerta_censo_add->hora4->Required) { ?>
				elm = this.getElements("x" + infix + "_hora4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alerta_censo_add->hora4->caption(), $alerta_censo_add->hora4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($alerta_censo_add->t_recordatorio->Required) { ?>
				elm = this.getElements("x" + infix + "_t_recordatorio");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alerta_censo_add->t_recordatorio->caption(), $alerta_censo_add->t_recordatorio->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($alerta_censo_add->texto_recordatorio->Required) { ?>
				elm = this.getElements("x" + infix + "_texto_recordatorio");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alerta_censo_add->texto_recordatorio->caption(), $alerta_censo_add->texto_recordatorio->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_texto_recordatorio");
				if (elm && !ew.checkTime(elm.value))
					return this.onError(elm, "<?php echo JsEncode($alerta_censo_add->texto_recordatorio->errorMessage()) ?>");
			<?php if ($alerta_censo_add->t_notificacion->Required) { ?>
				elm = this.getElements("x" + infix + "_t_notificacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alerta_censo_add->t_notificacion->caption(), $alerta_censo_add->t_notificacion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($alerta_censo_add->texto_notificacion->Required) { ?>
				elm = this.getElements("x" + infix + "_texto_notificacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alerta_censo_add->texto_notificacion->caption(), $alerta_censo_add->texto_notificacion->RequiredErrorMessage)) ?>");
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
	falerta_censoadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	falerta_censoadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	falerta_censoadd.lists["x_t_recordatorio"] = <?php echo $alerta_censo_add->t_recordatorio->Lookup->toClientList($alerta_censo_add) ?>;
	falerta_censoadd.lists["x_t_recordatorio"].options = <?php echo JsonEncode($alerta_censo_add->t_recordatorio->options(FALSE, TRUE)) ?>;
	falerta_censoadd.lists["x_t_notificacion"] = <?php echo $alerta_censo_add->t_notificacion->Lookup->toClientList($alerta_censo_add) ?>;
	falerta_censoadd.lists["x_t_notificacion"].options = <?php echo JsonEncode($alerta_censo_add->t_notificacion->options(FALSE, TRUE)) ?>;
	loadjs.done("falerta_censoadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $alerta_censo_add->showPageHeader(); ?>
<?php
$alerta_censo_add->showMessage();
?>
<form name="falerta_censoadd" id="falerta_censoadd" class="<?php echo $alerta_censo_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="alerta_censo">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$alerta_censo_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($alerta_censo_add->hora1->Visible) { // hora1 ?>
	<div id="r_hora1" class="form-group row">
		<label id="elh_alerta_censo_hora1" for="x_hora1" class="<?php echo $alerta_censo_add->LeftColumnClass ?>"><?php echo $alerta_censo_add->hora1->caption() ?><?php echo $alerta_censo_add->hora1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alerta_censo_add->RightColumnClass ?>"><div <?php echo $alerta_censo_add->hora1->cellAttributes() ?>>
<span id="el_alerta_censo_hora1">
<input type="text" data-table="alerta_censo" data-field="x_hora1" name="x_hora1" id="x_hora1" maxlength="8" placeholder="<?php echo HtmlEncode($alerta_censo_add->hora1->getPlaceHolder()) ?>" value="<?php echo $alerta_censo_add->hora1->EditValue ?>"<?php echo $alerta_censo_add->hora1->editAttributes() ?>>
<?php if (!$alerta_censo_add->hora1->ReadOnly && !$alerta_censo_add->hora1->Disabled && !isset($alerta_censo_add->hora1->EditAttrs["readonly"]) && !isset($alerta_censo_add->hora1->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["falerta_censoadd", "datetimepicker"], function() {
	ew.createDateTimePicker("falerta_censoadd", "x_hora1", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $alerta_censo_add->hora1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alerta_censo_add->hora2->Visible) { // hora2 ?>
	<div id="r_hora2" class="form-group row">
		<label id="elh_alerta_censo_hora2" for="x_hora2" class="<?php echo $alerta_censo_add->LeftColumnClass ?>"><?php echo $alerta_censo_add->hora2->caption() ?><?php echo $alerta_censo_add->hora2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alerta_censo_add->RightColumnClass ?>"><div <?php echo $alerta_censo_add->hora2->cellAttributes() ?>>
<span id="el_alerta_censo_hora2">
<input type="text" data-table="alerta_censo" data-field="x_hora2" name="x_hora2" id="x_hora2" maxlength="8" placeholder="<?php echo HtmlEncode($alerta_censo_add->hora2->getPlaceHolder()) ?>" value="<?php echo $alerta_censo_add->hora2->EditValue ?>"<?php echo $alerta_censo_add->hora2->editAttributes() ?>>
<?php if (!$alerta_censo_add->hora2->ReadOnly && !$alerta_censo_add->hora2->Disabled && !isset($alerta_censo_add->hora2->EditAttrs["readonly"]) && !isset($alerta_censo_add->hora2->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["falerta_censoadd", "datetimepicker"], function() {
	ew.createDateTimePicker("falerta_censoadd", "x_hora2", {"ignoreReadonly":true,"useCurrent":false,"format":1});
});
</script>
<?php } ?>
</span>
<?php echo $alerta_censo_add->hora2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alerta_censo_add->hora3->Visible) { // hora3 ?>
	<div id="r_hora3" class="form-group row">
		<label id="elh_alerta_censo_hora3" for="x_hora3" class="<?php echo $alerta_censo_add->LeftColumnClass ?>"><?php echo $alerta_censo_add->hora3->caption() ?><?php echo $alerta_censo_add->hora3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alerta_censo_add->RightColumnClass ?>"><div <?php echo $alerta_censo_add->hora3->cellAttributes() ?>>
<span id="el_alerta_censo_hora3">
<input type="text" data-table="alerta_censo" data-field="x_hora3" name="x_hora3" id="x_hora3" maxlength="8" placeholder="<?php echo HtmlEncode($alerta_censo_add->hora3->getPlaceHolder()) ?>" value="<?php echo $alerta_censo_add->hora3->EditValue ?>"<?php echo $alerta_censo_add->hora3->editAttributes() ?>>
<?php if (!$alerta_censo_add->hora3->ReadOnly && !$alerta_censo_add->hora3->Disabled && !isset($alerta_censo_add->hora3->EditAttrs["readonly"]) && !isset($alerta_censo_add->hora3->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["falerta_censoadd", "datetimepicker"], function() {
	ew.createDateTimePicker("falerta_censoadd", "x_hora3", {"ignoreReadonly":true,"useCurrent":false,"format":1});
});
</script>
<?php } ?>
</span>
<?php echo $alerta_censo_add->hora3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alerta_censo_add->hora4->Visible) { // hora4 ?>
	<div id="r_hora4" class="form-group row">
		<label id="elh_alerta_censo_hora4" for="x_hora4" class="<?php echo $alerta_censo_add->LeftColumnClass ?>"><?php echo $alerta_censo_add->hora4->caption() ?><?php echo $alerta_censo_add->hora4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alerta_censo_add->RightColumnClass ?>"><div <?php echo $alerta_censo_add->hora4->cellAttributes() ?>>
<span id="el_alerta_censo_hora4">
<input type="text" data-table="alerta_censo" data-field="x_hora4" name="x_hora4" id="x_hora4" maxlength="8" placeholder="<?php echo HtmlEncode($alerta_censo_add->hora4->getPlaceHolder()) ?>" value="<?php echo $alerta_censo_add->hora4->EditValue ?>"<?php echo $alerta_censo_add->hora4->editAttributes() ?>>
<?php if (!$alerta_censo_add->hora4->ReadOnly && !$alerta_censo_add->hora4->Disabled && !isset($alerta_censo_add->hora4->EditAttrs["readonly"]) && !isset($alerta_censo_add->hora4->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["falerta_censoadd", "datetimepicker"], function() {
	ew.createDateTimePicker("falerta_censoadd", "x_hora4", {"ignoreReadonly":true,"useCurrent":false,"format":1});
});
</script>
<?php } ?>
</span>
<?php echo $alerta_censo_add->hora4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alerta_censo_add->t_recordatorio->Visible) { // t_recordatorio ?>
	<div id="r_t_recordatorio" class="form-group row">
		<label id="elh_alerta_censo_t_recordatorio" for="x_t_recordatorio" class="<?php echo $alerta_censo_add->LeftColumnClass ?>"><?php echo $alerta_censo_add->t_recordatorio->caption() ?><?php echo $alerta_censo_add->t_recordatorio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alerta_censo_add->RightColumnClass ?>"><div <?php echo $alerta_censo_add->t_recordatorio->cellAttributes() ?>>
<span id="el_alerta_censo_t_recordatorio">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="alerta_censo" data-field="x_t_recordatorio" data-value-separator="<?php echo $alerta_censo_add->t_recordatorio->displayValueSeparatorAttribute() ?>" id="x_t_recordatorio" name="x_t_recordatorio"<?php echo $alerta_censo_add->t_recordatorio->editAttributes() ?>>
			<?php echo $alerta_censo_add->t_recordatorio->selectOptionListHtml("x_t_recordatorio") ?>
		</select>
</div>
</span>
<?php echo $alerta_censo_add->t_recordatorio->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alerta_censo_add->texto_recordatorio->Visible) { // texto_recordatorio ?>
	<div id="r_texto_recordatorio" class="form-group row">
		<label id="elh_alerta_censo_texto_recordatorio" for="x_texto_recordatorio" class="<?php echo $alerta_censo_add->LeftColumnClass ?>"><?php echo $alerta_censo_add->texto_recordatorio->caption() ?><?php echo $alerta_censo_add->texto_recordatorio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alerta_censo_add->RightColumnClass ?>"><div <?php echo $alerta_censo_add->texto_recordatorio->cellAttributes() ?>>
<span id="el_alerta_censo_texto_recordatorio">
<input type="text" data-table="alerta_censo" data-field="x_texto_recordatorio" name="x_texto_recordatorio" id="x_texto_recordatorio" size="30" maxlength="70" placeholder="<?php echo HtmlEncode($alerta_censo_add->texto_recordatorio->getPlaceHolder()) ?>" value="<?php echo $alerta_censo_add->texto_recordatorio->EditValue ?>"<?php echo $alerta_censo_add->texto_recordatorio->editAttributes() ?>>
</span>
<?php echo $alerta_censo_add->texto_recordatorio->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alerta_censo_add->t_notificacion->Visible) { // t_notificacion ?>
	<div id="r_t_notificacion" class="form-group row">
		<label id="elh_alerta_censo_t_notificacion" for="x_t_notificacion" class="<?php echo $alerta_censo_add->LeftColumnClass ?>"><?php echo $alerta_censo_add->t_notificacion->caption() ?><?php echo $alerta_censo_add->t_notificacion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alerta_censo_add->RightColumnClass ?>"><div <?php echo $alerta_censo_add->t_notificacion->cellAttributes() ?>>
<span id="el_alerta_censo_t_notificacion">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="alerta_censo" data-field="x_t_notificacion" data-value-separator="<?php echo $alerta_censo_add->t_notificacion->displayValueSeparatorAttribute() ?>" id="x_t_notificacion" name="x_t_notificacion"<?php echo $alerta_censo_add->t_notificacion->editAttributes() ?>>
			<?php echo $alerta_censo_add->t_notificacion->selectOptionListHtml("x_t_notificacion") ?>
		</select>
</div>
</span>
<?php echo $alerta_censo_add->t_notificacion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alerta_censo_add->texto_notificacion->Visible) { // texto_notificacion ?>
	<div id="r_texto_notificacion" class="form-group row">
		<label id="elh_alerta_censo_texto_notificacion" for="x_texto_notificacion" class="<?php echo $alerta_censo_add->LeftColumnClass ?>"><?php echo $alerta_censo_add->texto_notificacion->caption() ?><?php echo $alerta_censo_add->texto_notificacion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alerta_censo_add->RightColumnClass ?>"><div <?php echo $alerta_censo_add->texto_notificacion->cellAttributes() ?>>
<span id="el_alerta_censo_texto_notificacion">
<input type="text" data-table="alerta_censo" data-field="x_texto_notificacion" name="x_texto_notificacion" id="x_texto_notificacion" size="30" maxlength="70" placeholder="<?php echo HtmlEncode($alerta_censo_add->texto_notificacion->getPlaceHolder()) ?>" value="<?php echo $alerta_censo_add->texto_notificacion->EditValue ?>"<?php echo $alerta_censo_add->texto_notificacion->editAttributes() ?>>
</span>
<?php echo $alerta_censo_add->texto_notificacion->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$alerta_censo_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $alerta_censo_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $alerta_censo_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$alerta_censo_add->showPageFooter();
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
$alerta_censo_add->terminate();
?>