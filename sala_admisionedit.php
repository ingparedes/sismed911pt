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
$sala_admision_edit = new sala_admision_edit();

// Run the page
$sala_admision_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sala_admision_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fsala_admisionedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fsala_admisionedit = currentForm = new ew.Form("fsala_admisionedit", "edit");

	// Validate form
	fsala_admisionedit.validate = function() {
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
			<?php if ($sala_admision_edit->cod_casopreh->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_admision_edit->cod_casopreh->caption(), $sala_admision_edit->cod_casopreh->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($sala_admision_edit->cod_casopreh->errorMessage()) ?>");
			<?php if ($sala_admision_edit->fecha->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_admision_edit->fecha->caption(), $sala_admision_edit->fecha->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_fecha");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($sala_admision_edit->fecha->errorMessage()) ?>");
			<?php if ($sala_admision_edit->prioridad->Required) { ?>
				elm = this.getElements("x" + infix + "_prioridad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_admision_edit->prioridad->caption(), $sala_admision_edit->prioridad->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_prioridad");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($sala_admision_edit->prioridad->errorMessage()) ?>");
			<?php if ($sala_admision_edit->nombre_es->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_es");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_admision_edit->nombre_es->caption(), $sala_admision_edit->nombre_es->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_admision_edit->hospital_destino->Required) { ?>
				elm = this.getElements("x" + infix + "_hospital_destino");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_admision_edit->hospital_destino->caption(), $sala_admision_edit->hospital_destino->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_admision_edit->nombre_confirma->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_confirma");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_admision_edit->nombre_confirma->caption(), $sala_admision_edit->nombre_confirma->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_admision_edit->paciente->Required) { ?>
				elm = this.getElements("x" + infix + "_paciente");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_admision_edit->paciente->caption(), $sala_admision_edit->paciente->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_admision_edit->genero->Required) { ?>
				elm = this.getElements("x" + infix + "_genero");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_admision_edit->genero->caption(), $sala_admision_edit->genero->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_genero");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($sala_admision_edit->genero->errorMessage()) ?>");
			<?php if ($sala_admision_edit->edad->Required) { ?>
				elm = this.getElements("x" + infix + "_edad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_admision_edit->edad->caption(), $sala_admision_edit->edad->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_edad");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($sala_admision_edit->edad->errorMessage()) ?>");
			<?php if ($sala_admision_edit->cod_ambulancia->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_ambulancia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_admision_edit->cod_ambulancia->caption(), $sala_admision_edit->cod_ambulancia->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_admision_edit->cuando_murio->Required) { ?>
				elm = this.getElements("x" + infix + "_cuando_murio");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_admision_edit->cuando_murio->caption(), $sala_admision_edit->cuando_murio->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cuando_murio");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($sala_admision_edit->cuando_murio->errorMessage()) ?>");

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
	fsala_admisionedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fsala_admisionedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fsala_admisionedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $sala_admision_edit->showPageHeader(); ?>
<?php
$sala_admision_edit->showMessage();
?>
<form name="fsala_admisionedit" id="fsala_admisionedit" class="<?php echo $sala_admision_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sala_admision">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$sala_admision_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($sala_admision_edit->cod_casopreh->Visible) { // cod_casopreh ?>
	<div id="r_cod_casopreh" class="form-group row">
		<label id="elh_sala_admision_cod_casopreh" for="x_cod_casopreh" class="<?php echo $sala_admision_edit->LeftColumnClass ?>"><?php echo $sala_admision_edit->cod_casopreh->caption() ?><?php echo $sala_admision_edit->cod_casopreh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_admision_edit->RightColumnClass ?>"><div <?php echo $sala_admision_edit->cod_casopreh->cellAttributes() ?>>
<input type="text" data-table="sala_admision" data-field="x_cod_casopreh" name="x_cod_casopreh" id="x_cod_casopreh" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($sala_admision_edit->cod_casopreh->getPlaceHolder()) ?>" value="<?php echo $sala_admision_edit->cod_casopreh->EditValue ?>"<?php echo $sala_admision_edit->cod_casopreh->editAttributes() ?>>
<input type="hidden" data-table="sala_admision" data-field="x_cod_casopreh" name="o_cod_casopreh" id="o_cod_casopreh" value="<?php echo HtmlEncode($sala_admision_edit->cod_casopreh->OldValue != null ? $sala_admision_edit->cod_casopreh->OldValue : $sala_admision_edit->cod_casopreh->CurrentValue) ?>">
<?php echo $sala_admision_edit->cod_casopreh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_admision_edit->fecha->Visible) { // fecha ?>
	<div id="r_fecha" class="form-group row">
		<label id="elh_sala_admision_fecha" for="x_fecha" class="<?php echo $sala_admision_edit->LeftColumnClass ?>"><?php echo $sala_admision_edit->fecha->caption() ?><?php echo $sala_admision_edit->fecha->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_admision_edit->RightColumnClass ?>"><div <?php echo $sala_admision_edit->fecha->cellAttributes() ?>>
<span id="el_sala_admision_fecha">
<input type="text" data-table="sala_admision" data-field="x_fecha" name="x_fecha" id="x_fecha" maxlength="8" placeholder="<?php echo HtmlEncode($sala_admision_edit->fecha->getPlaceHolder()) ?>" value="<?php echo $sala_admision_edit->fecha->EditValue ?>"<?php echo $sala_admision_edit->fecha->editAttributes() ?>>
<?php if (!$sala_admision_edit->fecha->ReadOnly && !$sala_admision_edit->fecha->Disabled && !isset($sala_admision_edit->fecha->EditAttrs["readonly"]) && !isset($sala_admision_edit->fecha->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fsala_admisionedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fsala_admisionedit", "x_fecha", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $sala_admision_edit->fecha->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_admision_edit->prioridad->Visible) { // prioridad ?>
	<div id="r_prioridad" class="form-group row">
		<label id="elh_sala_admision_prioridad" for="x_prioridad" class="<?php echo $sala_admision_edit->LeftColumnClass ?>"><?php echo $sala_admision_edit->prioridad->caption() ?><?php echo $sala_admision_edit->prioridad->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_admision_edit->RightColumnClass ?>"><div <?php echo $sala_admision_edit->prioridad->cellAttributes() ?>>
<span id="el_sala_admision_prioridad">
<input type="text" data-table="sala_admision" data-field="x_prioridad" name="x_prioridad" id="x_prioridad" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($sala_admision_edit->prioridad->getPlaceHolder()) ?>" value="<?php echo $sala_admision_edit->prioridad->EditValue ?>"<?php echo $sala_admision_edit->prioridad->editAttributes() ?>>
</span>
<?php echo $sala_admision_edit->prioridad->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_admision_edit->nombre_es->Visible) { // nombre_es ?>
	<div id="r_nombre_es" class="form-group row">
		<label id="elh_sala_admision_nombre_es" for="x_nombre_es" class="<?php echo $sala_admision_edit->LeftColumnClass ?>"><?php echo $sala_admision_edit->nombre_es->caption() ?><?php echo $sala_admision_edit->nombre_es->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_admision_edit->RightColumnClass ?>"><div <?php echo $sala_admision_edit->nombre_es->cellAttributes() ?>>
<span id="el_sala_admision_nombre_es">
<input type="text" data-table="sala_admision" data-field="x_nombre_es" name="x_nombre_es" id="x_nombre_es" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($sala_admision_edit->nombre_es->getPlaceHolder()) ?>" value="<?php echo $sala_admision_edit->nombre_es->EditValue ?>"<?php echo $sala_admision_edit->nombre_es->editAttributes() ?>>
</span>
<?php echo $sala_admision_edit->nombre_es->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_admision_edit->hospital_destino->Visible) { // hospital_destino ?>
	<div id="r_hospital_destino" class="form-group row">
		<label id="elh_sala_admision_hospital_destino" for="x_hospital_destino" class="<?php echo $sala_admision_edit->LeftColumnClass ?>"><?php echo $sala_admision_edit->hospital_destino->caption() ?><?php echo $sala_admision_edit->hospital_destino->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_admision_edit->RightColumnClass ?>"><div <?php echo $sala_admision_edit->hospital_destino->cellAttributes() ?>>
<span id="el_sala_admision_hospital_destino">
<input type="text" data-table="sala_admision" data-field="x_hospital_destino" name="x_hospital_destino" id="x_hospital_destino" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($sala_admision_edit->hospital_destino->getPlaceHolder()) ?>" value="<?php echo $sala_admision_edit->hospital_destino->EditValue ?>"<?php echo $sala_admision_edit->hospital_destino->editAttributes() ?>>
</span>
<?php echo $sala_admision_edit->hospital_destino->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_admision_edit->nombre_confirma->Visible) { // nombre_confirma ?>
	<div id="r_nombre_confirma" class="form-group row">
		<label id="elh_sala_admision_nombre_confirma" for="x_nombre_confirma" class="<?php echo $sala_admision_edit->LeftColumnClass ?>"><?php echo $sala_admision_edit->nombre_confirma->caption() ?><?php echo $sala_admision_edit->nombre_confirma->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_admision_edit->RightColumnClass ?>"><div <?php echo $sala_admision_edit->nombre_confirma->cellAttributes() ?>>
<span id="el_sala_admision_nombre_confirma">
<input type="text" data-table="sala_admision" data-field="x_nombre_confirma" name="x_nombre_confirma" id="x_nombre_confirma" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($sala_admision_edit->nombre_confirma->getPlaceHolder()) ?>" value="<?php echo $sala_admision_edit->nombre_confirma->EditValue ?>"<?php echo $sala_admision_edit->nombre_confirma->editAttributes() ?>>
</span>
<?php echo $sala_admision_edit->nombre_confirma->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_admision_edit->paciente->Visible) { // paciente ?>
	<div id="r_paciente" class="form-group row">
		<label id="elh_sala_admision_paciente" for="x_paciente" class="<?php echo $sala_admision_edit->LeftColumnClass ?>"><?php echo $sala_admision_edit->paciente->caption() ?><?php echo $sala_admision_edit->paciente->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_admision_edit->RightColumnClass ?>"><div <?php echo $sala_admision_edit->paciente->cellAttributes() ?>>
<span id="el_sala_admision_paciente">
<textarea data-table="sala_admision" data-field="x_paciente" name="x_paciente" id="x_paciente" cols="35" rows="4" placeholder="<?php echo HtmlEncode($sala_admision_edit->paciente->getPlaceHolder()) ?>"<?php echo $sala_admision_edit->paciente->editAttributes() ?>><?php echo $sala_admision_edit->paciente->EditValue ?></textarea>
</span>
<?php echo $sala_admision_edit->paciente->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_admision_edit->genero->Visible) { // genero ?>
	<div id="r_genero" class="form-group row">
		<label id="elh_sala_admision_genero" for="x_genero" class="<?php echo $sala_admision_edit->LeftColumnClass ?>"><?php echo $sala_admision_edit->genero->caption() ?><?php echo $sala_admision_edit->genero->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_admision_edit->RightColumnClass ?>"><div <?php echo $sala_admision_edit->genero->cellAttributes() ?>>
<span id="el_sala_admision_genero">
<input type="text" data-table="sala_admision" data-field="x_genero" name="x_genero" id="x_genero" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($sala_admision_edit->genero->getPlaceHolder()) ?>" value="<?php echo $sala_admision_edit->genero->EditValue ?>"<?php echo $sala_admision_edit->genero->editAttributes() ?>>
</span>
<?php echo $sala_admision_edit->genero->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_admision_edit->edad->Visible) { // edad ?>
	<div id="r_edad" class="form-group row">
		<label id="elh_sala_admision_edad" for="x_edad" class="<?php echo $sala_admision_edit->LeftColumnClass ?>"><?php echo $sala_admision_edit->edad->caption() ?><?php echo $sala_admision_edit->edad->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_admision_edit->RightColumnClass ?>"><div <?php echo $sala_admision_edit->edad->cellAttributes() ?>>
<span id="el_sala_admision_edad">
<input type="text" data-table="sala_admision" data-field="x_edad" name="x_edad" id="x_edad" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($sala_admision_edit->edad->getPlaceHolder()) ?>" value="<?php echo $sala_admision_edit->edad->EditValue ?>"<?php echo $sala_admision_edit->edad->editAttributes() ?>>
</span>
<?php echo $sala_admision_edit->edad->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_admision_edit->cod_ambulancia->Visible) { // cod_ambulancia ?>
	<div id="r_cod_ambulancia" class="form-group row">
		<label id="elh_sala_admision_cod_ambulancia" for="x_cod_ambulancia" class="<?php echo $sala_admision_edit->LeftColumnClass ?>"><?php echo $sala_admision_edit->cod_ambulancia->caption() ?><?php echo $sala_admision_edit->cod_ambulancia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_admision_edit->RightColumnClass ?>"><div <?php echo $sala_admision_edit->cod_ambulancia->cellAttributes() ?>>
<span id="el_sala_admision_cod_ambulancia">
<input type="text" data-table="sala_admision" data-field="x_cod_ambulancia" name="x_cod_ambulancia" id="x_cod_ambulancia" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($sala_admision_edit->cod_ambulancia->getPlaceHolder()) ?>" value="<?php echo $sala_admision_edit->cod_ambulancia->EditValue ?>"<?php echo $sala_admision_edit->cod_ambulancia->editAttributes() ?>>
</span>
<?php echo $sala_admision_edit->cod_ambulancia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_admision_edit->cuando_murio->Visible) { // cuando_murio ?>
	<div id="r_cuando_murio" class="form-group row">
		<label id="elh_sala_admision_cuando_murio" for="x_cuando_murio" class="<?php echo $sala_admision_edit->LeftColumnClass ?>"><?php echo $sala_admision_edit->cuando_murio->caption() ?><?php echo $sala_admision_edit->cuando_murio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_admision_edit->RightColumnClass ?>"><div <?php echo $sala_admision_edit->cuando_murio->cellAttributes() ?>>
<span id="el_sala_admision_cuando_murio">
<input type="text" data-table="sala_admision" data-field="x_cuando_murio" name="x_cuando_murio" id="x_cuando_murio" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($sala_admision_edit->cuando_murio->getPlaceHolder()) ?>" value="<?php echo $sala_admision_edit->cuando_murio->EditValue ?>"<?php echo $sala_admision_edit->cuando_murio->editAttributes() ?>>
</span>
<?php echo $sala_admision_edit->cuando_murio->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$sala_admision_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $sala_admision_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sala_admision_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$sala_admision_edit->showPageFooter();
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
$sala_admision_edit->terminate();
?>