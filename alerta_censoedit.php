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
$alerta_censo_edit = new alerta_censo_edit();

// Run the page
$alerta_censo_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$alerta_censo_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var falerta_censoedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	falerta_censoedit = currentForm = new ew.Form("falerta_censoedit", "edit");

	// Validate form
	falerta_censoedit.validate = function() {
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
			<?php if ($alerta_censo_edit->id_tiempocenso->Required) { ?>
				elm = this.getElements("x" + infix + "_id_tiempocenso");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alerta_censo_edit->id_tiempocenso->caption(), $alerta_censo_edit->id_tiempocenso->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($alerta_censo_edit->hora1->Required) { ?>
				elm = this.getElements("x" + infix + "_hora1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alerta_censo_edit->hora1->caption(), $alerta_censo_edit->hora1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($alerta_censo_edit->hora2->Required) { ?>
				elm = this.getElements("x" + infix + "_hora2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alerta_censo_edit->hora2->caption(), $alerta_censo_edit->hora2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($alerta_censo_edit->hora3->Required) { ?>
				elm = this.getElements("x" + infix + "_hora3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alerta_censo_edit->hora3->caption(), $alerta_censo_edit->hora3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($alerta_censo_edit->hora4->Required) { ?>
				elm = this.getElements("x" + infix + "_hora4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alerta_censo_edit->hora4->caption(), $alerta_censo_edit->hora4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($alerta_censo_edit->t_recordatorio->Required) { ?>
				elm = this.getElements("x" + infix + "_t_recordatorio");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alerta_censo_edit->t_recordatorio->caption(), $alerta_censo_edit->t_recordatorio->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($alerta_censo_edit->texto_recordatorio->Required) { ?>
				elm = this.getElements("x" + infix + "_texto_recordatorio");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alerta_censo_edit->texto_recordatorio->caption(), $alerta_censo_edit->texto_recordatorio->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_texto_recordatorio");
				if (elm && !ew.checkTime(elm.value))
					return this.onError(elm, "<?php echo JsEncode($alerta_censo_edit->texto_recordatorio->errorMessage()) ?>");
			<?php if ($alerta_censo_edit->t_notificacion->Required) { ?>
				elm = this.getElements("x" + infix + "_t_notificacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alerta_censo_edit->t_notificacion->caption(), $alerta_censo_edit->t_notificacion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($alerta_censo_edit->texto_notificacion->Required) { ?>
				elm = this.getElements("x" + infix + "_texto_notificacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $alerta_censo_edit->texto_notificacion->caption(), $alerta_censo_edit->texto_notificacion->RequiredErrorMessage)) ?>");
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
	falerta_censoedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	falerta_censoedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	falerta_censoedit.lists["x_t_recordatorio"] = <?php echo $alerta_censo_edit->t_recordatorio->Lookup->toClientList($alerta_censo_edit) ?>;
	falerta_censoedit.lists["x_t_recordatorio"].options = <?php echo JsonEncode($alerta_censo_edit->t_recordatorio->options(FALSE, TRUE)) ?>;
	falerta_censoedit.lists["x_t_notificacion"] = <?php echo $alerta_censo_edit->t_notificacion->Lookup->toClientList($alerta_censo_edit) ?>;
	falerta_censoedit.lists["x_t_notificacion"].options = <?php echo JsonEncode($alerta_censo_edit->t_notificacion->options(FALSE, TRUE)) ?>;
	loadjs.done("falerta_censoedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $alerta_censo_edit->showPageHeader(); ?>
<?php
$alerta_censo_edit->showMessage();
?>
<form name="falerta_censoedit" id="falerta_censoedit" class="<?php echo $alerta_censo_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="alerta_censo">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$alerta_censo_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($alerta_censo_edit->id_tiempocenso->Visible) { // id_tiempocenso ?>
	<div id="r_id_tiempocenso" class="form-group row">
		<label id="elh_alerta_censo_id_tiempocenso" class="<?php echo $alerta_censo_edit->LeftColumnClass ?>"><?php echo $alerta_censo_edit->id_tiempocenso->caption() ?><?php echo $alerta_censo_edit->id_tiempocenso->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alerta_censo_edit->RightColumnClass ?>"><div <?php echo $alerta_censo_edit->id_tiempocenso->cellAttributes() ?>>
<span id="el_alerta_censo_id_tiempocenso">
<span<?php echo $alerta_censo_edit->id_tiempocenso->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($alerta_censo_edit->id_tiempocenso->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="alerta_censo" data-field="x_id_tiempocenso" name="x_id_tiempocenso" id="x_id_tiempocenso" value="<?php echo HtmlEncode($alerta_censo_edit->id_tiempocenso->CurrentValue) ?>">
<?php echo $alerta_censo_edit->id_tiempocenso->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alerta_censo_edit->hora1->Visible) { // hora1 ?>
	<div id="r_hora1" class="form-group row">
		<label id="elh_alerta_censo_hora1" for="x_hora1" class="<?php echo $alerta_censo_edit->LeftColumnClass ?>"><?php echo $alerta_censo_edit->hora1->caption() ?><?php echo $alerta_censo_edit->hora1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alerta_censo_edit->RightColumnClass ?>"><div <?php echo $alerta_censo_edit->hora1->cellAttributes() ?>>
<span id="el_alerta_censo_hora1">
<input type="text" data-table="alerta_censo" data-field="x_hora1" name="x_hora1" id="x_hora1" maxlength="8" placeholder="<?php echo HtmlEncode($alerta_censo_edit->hora1->getPlaceHolder()) ?>" value="<?php echo $alerta_censo_edit->hora1->EditValue ?>"<?php echo $alerta_censo_edit->hora1->editAttributes() ?>>
<?php if (!$alerta_censo_edit->hora1->ReadOnly && !$alerta_censo_edit->hora1->Disabled && !isset($alerta_censo_edit->hora1->EditAttrs["readonly"]) && !isset($alerta_censo_edit->hora1->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["falerta_censoedit", "datetimepicker"], function() {
	ew.createDateTimePicker("falerta_censoedit", "x_hora1", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $alerta_censo_edit->hora1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alerta_censo_edit->hora2->Visible) { // hora2 ?>
	<div id="r_hora2" class="form-group row">
		<label id="elh_alerta_censo_hora2" for="x_hora2" class="<?php echo $alerta_censo_edit->LeftColumnClass ?>"><?php echo $alerta_censo_edit->hora2->caption() ?><?php echo $alerta_censo_edit->hora2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alerta_censo_edit->RightColumnClass ?>"><div <?php echo $alerta_censo_edit->hora2->cellAttributes() ?>>
<span id="el_alerta_censo_hora2">
<input type="text" data-table="alerta_censo" data-field="x_hora2" name="x_hora2" id="x_hora2" maxlength="8" placeholder="<?php echo HtmlEncode($alerta_censo_edit->hora2->getPlaceHolder()) ?>" value="<?php echo $alerta_censo_edit->hora2->EditValue ?>"<?php echo $alerta_censo_edit->hora2->editAttributes() ?>>
<?php if (!$alerta_censo_edit->hora2->ReadOnly && !$alerta_censo_edit->hora2->Disabled && !isset($alerta_censo_edit->hora2->EditAttrs["readonly"]) && !isset($alerta_censo_edit->hora2->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["falerta_censoedit", "datetimepicker"], function() {
	ew.createDateTimePicker("falerta_censoedit", "x_hora2", {"ignoreReadonly":true,"useCurrent":false,"format":1});
});
</script>
<?php } ?>
</span>
<?php echo $alerta_censo_edit->hora2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alerta_censo_edit->hora3->Visible) { // hora3 ?>
	<div id="r_hora3" class="form-group row">
		<label id="elh_alerta_censo_hora3" for="x_hora3" class="<?php echo $alerta_censo_edit->LeftColumnClass ?>"><?php echo $alerta_censo_edit->hora3->caption() ?><?php echo $alerta_censo_edit->hora3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alerta_censo_edit->RightColumnClass ?>"><div <?php echo $alerta_censo_edit->hora3->cellAttributes() ?>>
<span id="el_alerta_censo_hora3">
<input type="text" data-table="alerta_censo" data-field="x_hora3" name="x_hora3" id="x_hora3" maxlength="8" placeholder="<?php echo HtmlEncode($alerta_censo_edit->hora3->getPlaceHolder()) ?>" value="<?php echo $alerta_censo_edit->hora3->EditValue ?>"<?php echo $alerta_censo_edit->hora3->editAttributes() ?>>
<?php if (!$alerta_censo_edit->hora3->ReadOnly && !$alerta_censo_edit->hora3->Disabled && !isset($alerta_censo_edit->hora3->EditAttrs["readonly"]) && !isset($alerta_censo_edit->hora3->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["falerta_censoedit", "datetimepicker"], function() {
	ew.createDateTimePicker("falerta_censoedit", "x_hora3", {"ignoreReadonly":true,"useCurrent":false,"format":1});
});
</script>
<?php } ?>
</span>
<?php echo $alerta_censo_edit->hora3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alerta_censo_edit->hora4->Visible) { // hora4 ?>
	<div id="r_hora4" class="form-group row">
		<label id="elh_alerta_censo_hora4" for="x_hora4" class="<?php echo $alerta_censo_edit->LeftColumnClass ?>"><?php echo $alerta_censo_edit->hora4->caption() ?><?php echo $alerta_censo_edit->hora4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alerta_censo_edit->RightColumnClass ?>"><div <?php echo $alerta_censo_edit->hora4->cellAttributes() ?>>
<span id="el_alerta_censo_hora4">
<input type="text" data-table="alerta_censo" data-field="x_hora4" name="x_hora4" id="x_hora4" maxlength="8" placeholder="<?php echo HtmlEncode($alerta_censo_edit->hora4->getPlaceHolder()) ?>" value="<?php echo $alerta_censo_edit->hora4->EditValue ?>"<?php echo $alerta_censo_edit->hora4->editAttributes() ?>>
<?php if (!$alerta_censo_edit->hora4->ReadOnly && !$alerta_censo_edit->hora4->Disabled && !isset($alerta_censo_edit->hora4->EditAttrs["readonly"]) && !isset($alerta_censo_edit->hora4->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["falerta_censoedit", "datetimepicker"], function() {
	ew.createDateTimePicker("falerta_censoedit", "x_hora4", {"ignoreReadonly":true,"useCurrent":false,"format":1});
});
</script>
<?php } ?>
</span>
<?php echo $alerta_censo_edit->hora4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alerta_censo_edit->t_recordatorio->Visible) { // t_recordatorio ?>
	<div id="r_t_recordatorio" class="form-group row">
		<label id="elh_alerta_censo_t_recordatorio" for="x_t_recordatorio" class="<?php echo $alerta_censo_edit->LeftColumnClass ?>"><?php echo $alerta_censo_edit->t_recordatorio->caption() ?><?php echo $alerta_censo_edit->t_recordatorio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alerta_censo_edit->RightColumnClass ?>"><div <?php echo $alerta_censo_edit->t_recordatorio->cellAttributes() ?>>
<span id="el_alerta_censo_t_recordatorio">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="alerta_censo" data-field="x_t_recordatorio" data-value-separator="<?php echo $alerta_censo_edit->t_recordatorio->displayValueSeparatorAttribute() ?>" id="x_t_recordatorio" name="x_t_recordatorio"<?php echo $alerta_censo_edit->t_recordatorio->editAttributes() ?>>
			<?php echo $alerta_censo_edit->t_recordatorio->selectOptionListHtml("x_t_recordatorio") ?>
		</select>
</div>
</span>
<?php echo $alerta_censo_edit->t_recordatorio->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alerta_censo_edit->texto_recordatorio->Visible) { // texto_recordatorio ?>
	<div id="r_texto_recordatorio" class="form-group row">
		<label id="elh_alerta_censo_texto_recordatorio" for="x_texto_recordatorio" class="<?php echo $alerta_censo_edit->LeftColumnClass ?>"><?php echo $alerta_censo_edit->texto_recordatorio->caption() ?><?php echo $alerta_censo_edit->texto_recordatorio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alerta_censo_edit->RightColumnClass ?>"><div <?php echo $alerta_censo_edit->texto_recordatorio->cellAttributes() ?>>
<span id="el_alerta_censo_texto_recordatorio">
<input type="text" data-table="alerta_censo" data-field="x_texto_recordatorio" name="x_texto_recordatorio" id="x_texto_recordatorio" size="30" maxlength="70" placeholder="<?php echo HtmlEncode($alerta_censo_edit->texto_recordatorio->getPlaceHolder()) ?>" value="<?php echo $alerta_censo_edit->texto_recordatorio->EditValue ?>"<?php echo $alerta_censo_edit->texto_recordatorio->editAttributes() ?>>
</span>
<?php echo $alerta_censo_edit->texto_recordatorio->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alerta_censo_edit->t_notificacion->Visible) { // t_notificacion ?>
	<div id="r_t_notificacion" class="form-group row">
		<label id="elh_alerta_censo_t_notificacion" for="x_t_notificacion" class="<?php echo $alerta_censo_edit->LeftColumnClass ?>"><?php echo $alerta_censo_edit->t_notificacion->caption() ?><?php echo $alerta_censo_edit->t_notificacion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alerta_censo_edit->RightColumnClass ?>"><div <?php echo $alerta_censo_edit->t_notificacion->cellAttributes() ?>>
<span id="el_alerta_censo_t_notificacion">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="alerta_censo" data-field="x_t_notificacion" data-value-separator="<?php echo $alerta_censo_edit->t_notificacion->displayValueSeparatorAttribute() ?>" id="x_t_notificacion" name="x_t_notificacion"<?php echo $alerta_censo_edit->t_notificacion->editAttributes() ?>>
			<?php echo $alerta_censo_edit->t_notificacion->selectOptionListHtml("x_t_notificacion") ?>
		</select>
</div>
</span>
<?php echo $alerta_censo_edit->t_notificacion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($alerta_censo_edit->texto_notificacion->Visible) { // texto_notificacion ?>
	<div id="r_texto_notificacion" class="form-group row">
		<label id="elh_alerta_censo_texto_notificacion" for="x_texto_notificacion" class="<?php echo $alerta_censo_edit->LeftColumnClass ?>"><?php echo $alerta_censo_edit->texto_notificacion->caption() ?><?php echo $alerta_censo_edit->texto_notificacion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $alerta_censo_edit->RightColumnClass ?>"><div <?php echo $alerta_censo_edit->texto_notificacion->cellAttributes() ?>>
<span id="el_alerta_censo_texto_notificacion">
<input type="text" data-table="alerta_censo" data-field="x_texto_notificacion" name="x_texto_notificacion" id="x_texto_notificacion" size="30" maxlength="70" placeholder="<?php echo HtmlEncode($alerta_censo_edit->texto_notificacion->getPlaceHolder()) ?>" value="<?php echo $alerta_censo_edit->texto_notificacion->EditValue ?>"<?php echo $alerta_censo_edit->texto_notificacion->editAttributes() ?>>
</span>
<?php echo $alerta_censo_edit->texto_notificacion->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$alerta_censo_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $alerta_censo_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $alerta_censo_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$alerta_censo_edit->showPageFooter();
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
$alerta_censo_edit->terminate();
?>