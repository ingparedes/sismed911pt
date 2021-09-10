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
$sala_rac_edit = new sala_rac_edit();

// Run the page
$sala_rac_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sala_rac_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fsala_racedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fsala_racedit = currentForm = new ew.Form("fsala_racedit", "edit");

	// Validate form
	fsala_racedit.validate = function() {
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
			<?php if ($sala_rac_edit->id_registro->Required) { ?>
				elm = this.getElements("x" + infix + "_id_registro");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->id_registro->caption(), $sala_rac_edit->id_registro->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_id_registro");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($sala_rac_edit->id_registro->errorMessage()) ?>");
			<?php if ($sala_rac_edit->fecha_hora->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_hora");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->fecha_hora->caption(), $sala_rac_edit->fecha_hora->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_fecha_hora");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($sala_rac_edit->fecha_hora->errorMessage()) ?>");
			<?php if ($sala_rac_edit->id_admision->Required) { ?>
				elm = this.getElements("x" + infix + "_id_admision");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->id_admision->caption(), $sala_rac_edit->id_admision->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_edit->acompanante->Required) { ?>
				elm = this.getElements("x" + infix + "_acompanante");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->acompanante->caption(), $sala_rac_edit->acompanante->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_edit->tel_acompanante->Required) { ?>
				elm = this.getElements("x" + infix + "_tel_acompanante");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->tel_acompanante->caption(), $sala_rac_edit->tel_acompanante->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_edit->tipo_urgencia->Required) { ?>
				elm = this.getElements("x" + infix + "_tipo_urgencia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->tipo_urgencia->caption(), $sala_rac_edit->tipo_urgencia->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_edit->clasificacion->Required) { ?>
				elm = this.getElements("x" + infix + "_clasificacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->clasificacion->caption(), $sala_rac_edit->clasificacion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_edit->motivo_consulta->Required) { ?>
				elm = this.getElements("x" + infix + "_motivo_consulta");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->motivo_consulta->caption(), $sala_rac_edit->motivo_consulta->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_edit->signos_vitales->Required) { ?>
				elm = this.getElements("x" + infix + "_signos_vitales");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->signos_vitales->caption(), $sala_rac_edit->signos_vitales->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_edit->so2->Required) { ?>
				elm = this.getElements("x" + infix + "_so2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->so2->caption(), $sala_rac_edit->so2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_edit->fr->Required) { ?>
				elm = this.getElements("x" + infix + "_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->fr->caption(), $sala_rac_edit->fr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_edit->_t->Required) { ?>
				elm = this.getElements("x" + infix + "__t");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->_t->caption(), $sala_rac_edit->_t->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_edit->fc->Required) { ?>
				elm = this.getElements("x" + infix + "_fc");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->fc->caption(), $sala_rac_edit->fc->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_edit->pas->Required) { ?>
				elm = this.getElements("x" + infix + "_pas");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->pas->caption(), $sala_rac_edit->pas->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_edit->pad->Required) { ?>
				elm = this.getElements("x" + infix + "_pad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->pad->caption(), $sala_rac_edit->pad->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_edit->local_trauma->Required) { ?>
				elm = this.getElements("x" + infix + "_local_trauma");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->local_trauma->caption(), $sala_rac_edit->local_trauma->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_edit->sistema->Required) { ?>
				elm = this.getElements("x" + infix + "_sistema");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->sistema->caption(), $sala_rac_edit->sistema->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_edit->nivel_conciencia->Required) { ?>
				elm = this.getElements("x" + infix + "_nivel_conciencia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->nivel_conciencia->caption(), $sala_rac_edit->nivel_conciencia->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_edit->dolor->Required) { ?>
				elm = this.getElements("x" + infix + "_dolor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->dolor->caption(), $sala_rac_edit->dolor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_edit->signos_sintomas->Required) { ?>
				elm = this.getElements("x" + infix + "_signos_sintomas");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->signos_sintomas->caption(), $sala_rac_edit->signos_sintomas->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_edit->factores_riesgos->Required) { ?>
				elm = this.getElements("x" + infix + "_factores_riesgos");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->factores_riesgos->caption(), $sala_rac_edit->factores_riesgos->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_edit->estado_final->Required) { ?>
				elm = this.getElements("x" + infix + "_estado_final");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->estado_final->caption(), $sala_rac_edit->estado_final->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_edit->tipo_ingreso->Required) { ?>
				elm = this.getElements("x" + infix + "_tipo_ingreso");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->tipo_ingreso->caption(), $sala_rac_edit->tipo_ingreso->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_edit->hora_clasificacion->Required) { ?>
				elm = this.getElements("x" + infix + "_hora_clasificacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->hora_clasificacion->caption(), $sala_rac_edit->hora_clasificacion->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_hora_clasificacion");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($sala_rac_edit->hora_clasificacion->errorMessage()) ?>");
			<?php if ($sala_rac_edit->descripcion_signos->Required) { ?>
				elm = this.getElements("x" + infix + "_descripcion_signos");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->descripcion_signos->caption(), $sala_rac_edit->descripcion_signos->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_edit->hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->hospital->caption(), $sala_rac_edit->hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_edit->motivo_trauma->Required) { ?>
				elm = this.getElements("x" + infix + "_motivo_trauma");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_edit->motivo_trauma->caption(), $sala_rac_edit->motivo_trauma->RequiredErrorMessage)) ?>");
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
	fsala_racedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fsala_racedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fsala_racedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $sala_rac_edit->showPageHeader(); ?>
<?php
$sala_rac_edit->showMessage();
?>
<form name="fsala_racedit" id="fsala_racedit" class="<?php echo $sala_rac_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sala_rac">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$sala_rac_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($sala_rac_edit->id_registro->Visible) { // id_registro ?>
	<div id="r_id_registro" class="form-group row">
		<label id="elh_sala_rac_id_registro" for="x_id_registro" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->id_registro->caption() ?><?php echo $sala_rac_edit->id_registro->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->id_registro->cellAttributes() ?>>
<input type="text" data-table="sala_rac" data-field="x_id_registro" name="x_id_registro" id="x_id_registro" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($sala_rac_edit->id_registro->getPlaceHolder()) ?>" value="<?php echo $sala_rac_edit->id_registro->EditValue ?>"<?php echo $sala_rac_edit->id_registro->editAttributes() ?>>
<input type="hidden" data-table="sala_rac" data-field="x_id_registro" name="o_id_registro" id="o_id_registro" value="<?php echo HtmlEncode($sala_rac_edit->id_registro->OldValue != null ? $sala_rac_edit->id_registro->OldValue : $sala_rac_edit->id_registro->CurrentValue) ?>">
<?php echo $sala_rac_edit->id_registro->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->fecha_hora->Visible) { // fecha_hora ?>
	<div id="r_fecha_hora" class="form-group row">
		<label id="elh_sala_rac_fecha_hora" for="x_fecha_hora" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->fecha_hora->caption() ?><?php echo $sala_rac_edit->fecha_hora->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->fecha_hora->cellAttributes() ?>>
<span id="el_sala_rac_fecha_hora">
<input type="text" data-table="sala_rac" data-field="x_fecha_hora" name="x_fecha_hora" id="x_fecha_hora" maxlength="8" placeholder="<?php echo HtmlEncode($sala_rac_edit->fecha_hora->getPlaceHolder()) ?>" value="<?php echo $sala_rac_edit->fecha_hora->EditValue ?>"<?php echo $sala_rac_edit->fecha_hora->editAttributes() ?>>
<?php if (!$sala_rac_edit->fecha_hora->ReadOnly && !$sala_rac_edit->fecha_hora->Disabled && !isset($sala_rac_edit->fecha_hora->EditAttrs["readonly"]) && !isset($sala_rac_edit->fecha_hora->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fsala_racedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fsala_racedit", "x_fecha_hora", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $sala_rac_edit->fecha_hora->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->id_admision->Visible) { // id_admision ?>
	<div id="r_id_admision" class="form-group row">
		<label id="elh_sala_rac_id_admision" for="x_id_admision" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->id_admision->caption() ?><?php echo $sala_rac_edit->id_admision->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->id_admision->cellAttributes() ?>>
<span id="el_sala_rac_id_admision">
<input type="text" data-table="sala_rac" data-field="x_id_admision" name="x_id_admision" id="x_id_admision" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($sala_rac_edit->id_admision->getPlaceHolder()) ?>" value="<?php echo $sala_rac_edit->id_admision->EditValue ?>"<?php echo $sala_rac_edit->id_admision->editAttributes() ?>>
</span>
<?php echo $sala_rac_edit->id_admision->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->acompanante->Visible) { // acompañante ?>
	<div id="r_acompanante" class="form-group row">
		<label id="elh_sala_rac_acompanante" for="x_acompanante" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->acompanante->caption() ?><?php echo $sala_rac_edit->acompanante->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->acompanante->cellAttributes() ?>>
<span id="el_sala_rac_acompanante">
<input type="text" data-table="sala_rac" data-field="x_acompanante" name="x_acompanante" id="x_acompanante" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($sala_rac_edit->acompanante->getPlaceHolder()) ?>" value="<?php echo $sala_rac_edit->acompanante->EditValue ?>"<?php echo $sala_rac_edit->acompanante->editAttributes() ?>>
</span>
<?php echo $sala_rac_edit->acompanante->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->tel_acompanante->Visible) { // tel_acompañante ?>
	<div id="r_tel_acompanante" class="form-group row">
		<label id="elh_sala_rac_tel_acompanante" for="x_tel_acompanante" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->tel_acompanante->caption() ?><?php echo $sala_rac_edit->tel_acompanante->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->tel_acompanante->cellAttributes() ?>>
<span id="el_sala_rac_tel_acompanante">
<input type="text" data-table="sala_rac" data-field="x_tel_acompanante" name="x_tel_acompanante" id="x_tel_acompanante" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($sala_rac_edit->tel_acompanante->getPlaceHolder()) ?>" value="<?php echo $sala_rac_edit->tel_acompanante->EditValue ?>"<?php echo $sala_rac_edit->tel_acompanante->editAttributes() ?>>
</span>
<?php echo $sala_rac_edit->tel_acompanante->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->tipo_urgencia->Visible) { // tipo_urgencia ?>
	<div id="r_tipo_urgencia" class="form-group row">
		<label id="elh_sala_rac_tipo_urgencia" for="x_tipo_urgencia" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->tipo_urgencia->caption() ?><?php echo $sala_rac_edit->tipo_urgencia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->tipo_urgencia->cellAttributes() ?>>
<span id="el_sala_rac_tipo_urgencia">
<input type="text" data-table="sala_rac" data-field="x_tipo_urgencia" name="x_tipo_urgencia" id="x_tipo_urgencia" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($sala_rac_edit->tipo_urgencia->getPlaceHolder()) ?>" value="<?php echo $sala_rac_edit->tipo_urgencia->EditValue ?>"<?php echo $sala_rac_edit->tipo_urgencia->editAttributes() ?>>
</span>
<?php echo $sala_rac_edit->tipo_urgencia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->clasificacion->Visible) { // clasificacion ?>
	<div id="r_clasificacion" class="form-group row">
		<label id="elh_sala_rac_clasificacion" for="x_clasificacion" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->clasificacion->caption() ?><?php echo $sala_rac_edit->clasificacion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->clasificacion->cellAttributes() ?>>
<span id="el_sala_rac_clasificacion">
<input type="text" data-table="sala_rac" data-field="x_clasificacion" name="x_clasificacion" id="x_clasificacion" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($sala_rac_edit->clasificacion->getPlaceHolder()) ?>" value="<?php echo $sala_rac_edit->clasificacion->EditValue ?>"<?php echo $sala_rac_edit->clasificacion->editAttributes() ?>>
</span>
<?php echo $sala_rac_edit->clasificacion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->motivo_consulta->Visible) { // motivo_consulta ?>
	<div id="r_motivo_consulta" class="form-group row">
		<label id="elh_sala_rac_motivo_consulta" for="x_motivo_consulta" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->motivo_consulta->caption() ?><?php echo $sala_rac_edit->motivo_consulta->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->motivo_consulta->cellAttributes() ?>>
<span id="el_sala_rac_motivo_consulta">
<textarea data-table="sala_rac" data-field="x_motivo_consulta" name="x_motivo_consulta" id="x_motivo_consulta" cols="35" rows="4" placeholder="<?php echo HtmlEncode($sala_rac_edit->motivo_consulta->getPlaceHolder()) ?>"<?php echo $sala_rac_edit->motivo_consulta->editAttributes() ?>><?php echo $sala_rac_edit->motivo_consulta->EditValue ?></textarea>
</span>
<?php echo $sala_rac_edit->motivo_consulta->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->signos_vitales->Visible) { // signos_vitales ?>
	<div id="r_signos_vitales" class="form-group row">
		<label id="elh_sala_rac_signos_vitales" for="x_signos_vitales" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->signos_vitales->caption() ?><?php echo $sala_rac_edit->signos_vitales->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->signos_vitales->cellAttributes() ?>>
<span id="el_sala_rac_signos_vitales">
<textarea data-table="sala_rac" data-field="x_signos_vitales" name="x_signos_vitales" id="x_signos_vitales" cols="35" rows="4" placeholder="<?php echo HtmlEncode($sala_rac_edit->signos_vitales->getPlaceHolder()) ?>"<?php echo $sala_rac_edit->signos_vitales->editAttributes() ?>><?php echo $sala_rac_edit->signos_vitales->EditValue ?></textarea>
</span>
<?php echo $sala_rac_edit->signos_vitales->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->so2->Visible) { // so2 ?>
	<div id="r_so2" class="form-group row">
		<label id="elh_sala_rac_so2" for="x_so2" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->so2->caption() ?><?php echo $sala_rac_edit->so2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->so2->cellAttributes() ?>>
<span id="el_sala_rac_so2">
<input type="text" data-table="sala_rac" data-field="x_so2" name="x_so2" id="x_so2" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($sala_rac_edit->so2->getPlaceHolder()) ?>" value="<?php echo $sala_rac_edit->so2->EditValue ?>"<?php echo $sala_rac_edit->so2->editAttributes() ?>>
</span>
<?php echo $sala_rac_edit->so2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->fr->Visible) { // fr ?>
	<div id="r_fr" class="form-group row">
		<label id="elh_sala_rac_fr" for="x_fr" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->fr->caption() ?><?php echo $sala_rac_edit->fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->fr->cellAttributes() ?>>
<span id="el_sala_rac_fr">
<input type="text" data-table="sala_rac" data-field="x_fr" name="x_fr" id="x_fr" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($sala_rac_edit->fr->getPlaceHolder()) ?>" value="<?php echo $sala_rac_edit->fr->EditValue ?>"<?php echo $sala_rac_edit->fr->editAttributes() ?>>
</span>
<?php echo $sala_rac_edit->fr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->_t->Visible) { // t ?>
	<div id="r__t" class="form-group row">
		<label id="elh_sala_rac__t" for="x__t" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->_t->caption() ?><?php echo $sala_rac_edit->_t->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->_t->cellAttributes() ?>>
<span id="el_sala_rac__t">
<input type="text" data-table="sala_rac" data-field="x__t" name="x__t" id="x__t" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($sala_rac_edit->_t->getPlaceHolder()) ?>" value="<?php echo $sala_rac_edit->_t->EditValue ?>"<?php echo $sala_rac_edit->_t->editAttributes() ?>>
</span>
<?php echo $sala_rac_edit->_t->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->fc->Visible) { // fc ?>
	<div id="r_fc" class="form-group row">
		<label id="elh_sala_rac_fc" for="x_fc" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->fc->caption() ?><?php echo $sala_rac_edit->fc->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->fc->cellAttributes() ?>>
<span id="el_sala_rac_fc">
<input type="text" data-table="sala_rac" data-field="x_fc" name="x_fc" id="x_fc" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($sala_rac_edit->fc->getPlaceHolder()) ?>" value="<?php echo $sala_rac_edit->fc->EditValue ?>"<?php echo $sala_rac_edit->fc->editAttributes() ?>>
</span>
<?php echo $sala_rac_edit->fc->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->pas->Visible) { // pas ?>
	<div id="r_pas" class="form-group row">
		<label id="elh_sala_rac_pas" for="x_pas" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->pas->caption() ?><?php echo $sala_rac_edit->pas->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->pas->cellAttributes() ?>>
<span id="el_sala_rac_pas">
<input type="text" data-table="sala_rac" data-field="x_pas" name="x_pas" id="x_pas" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($sala_rac_edit->pas->getPlaceHolder()) ?>" value="<?php echo $sala_rac_edit->pas->EditValue ?>"<?php echo $sala_rac_edit->pas->editAttributes() ?>>
</span>
<?php echo $sala_rac_edit->pas->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->pad->Visible) { // pad ?>
	<div id="r_pad" class="form-group row">
		<label id="elh_sala_rac_pad" for="x_pad" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->pad->caption() ?><?php echo $sala_rac_edit->pad->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->pad->cellAttributes() ?>>
<span id="el_sala_rac_pad">
<input type="text" data-table="sala_rac" data-field="x_pad" name="x_pad" id="x_pad" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($sala_rac_edit->pad->getPlaceHolder()) ?>" value="<?php echo $sala_rac_edit->pad->EditValue ?>"<?php echo $sala_rac_edit->pad->editAttributes() ?>>
</span>
<?php echo $sala_rac_edit->pad->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->local_trauma->Visible) { // local_trauma ?>
	<div id="r_local_trauma" class="form-group row">
		<label id="elh_sala_rac_local_trauma" for="x_local_trauma" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->local_trauma->caption() ?><?php echo $sala_rac_edit->local_trauma->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->local_trauma->cellAttributes() ?>>
<span id="el_sala_rac_local_trauma">
<input type="text" data-table="sala_rac" data-field="x_local_trauma" name="x_local_trauma" id="x_local_trauma" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($sala_rac_edit->local_trauma->getPlaceHolder()) ?>" value="<?php echo $sala_rac_edit->local_trauma->EditValue ?>"<?php echo $sala_rac_edit->local_trauma->editAttributes() ?>>
</span>
<?php echo $sala_rac_edit->local_trauma->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->sistema->Visible) { // sistema ?>
	<div id="r_sistema" class="form-group row">
		<label id="elh_sala_rac_sistema" for="x_sistema" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->sistema->caption() ?><?php echo $sala_rac_edit->sistema->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->sistema->cellAttributes() ?>>
<span id="el_sala_rac_sistema">
<input type="text" data-table="sala_rac" data-field="x_sistema" name="x_sistema" id="x_sistema" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($sala_rac_edit->sistema->getPlaceHolder()) ?>" value="<?php echo $sala_rac_edit->sistema->EditValue ?>"<?php echo $sala_rac_edit->sistema->editAttributes() ?>>
</span>
<?php echo $sala_rac_edit->sistema->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->nivel_conciencia->Visible) { // nivel_conciencia ?>
	<div id="r_nivel_conciencia" class="form-group row">
		<label id="elh_sala_rac_nivel_conciencia" for="x_nivel_conciencia" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->nivel_conciencia->caption() ?><?php echo $sala_rac_edit->nivel_conciencia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->nivel_conciencia->cellAttributes() ?>>
<span id="el_sala_rac_nivel_conciencia">
<input type="text" data-table="sala_rac" data-field="x_nivel_conciencia" name="x_nivel_conciencia" id="x_nivel_conciencia" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($sala_rac_edit->nivel_conciencia->getPlaceHolder()) ?>" value="<?php echo $sala_rac_edit->nivel_conciencia->EditValue ?>"<?php echo $sala_rac_edit->nivel_conciencia->editAttributes() ?>>
</span>
<?php echo $sala_rac_edit->nivel_conciencia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->dolor->Visible) { // dolor ?>
	<div id="r_dolor" class="form-group row">
		<label id="elh_sala_rac_dolor" for="x_dolor" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->dolor->caption() ?><?php echo $sala_rac_edit->dolor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->dolor->cellAttributes() ?>>
<span id="el_sala_rac_dolor">
<input type="text" data-table="sala_rac" data-field="x_dolor" name="x_dolor" id="x_dolor" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($sala_rac_edit->dolor->getPlaceHolder()) ?>" value="<?php echo $sala_rac_edit->dolor->EditValue ?>"<?php echo $sala_rac_edit->dolor->editAttributes() ?>>
</span>
<?php echo $sala_rac_edit->dolor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->signos_sintomas->Visible) { // signos_sintomas ?>
	<div id="r_signos_sintomas" class="form-group row">
		<label id="elh_sala_rac_signos_sintomas" for="x_signos_sintomas" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->signos_sintomas->caption() ?><?php echo $sala_rac_edit->signos_sintomas->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->signos_sintomas->cellAttributes() ?>>
<span id="el_sala_rac_signos_sintomas">
<input type="text" data-table="sala_rac" data-field="x_signos_sintomas" name="x_signos_sintomas" id="x_signos_sintomas" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($sala_rac_edit->signos_sintomas->getPlaceHolder()) ?>" value="<?php echo $sala_rac_edit->signos_sintomas->EditValue ?>"<?php echo $sala_rac_edit->signos_sintomas->editAttributes() ?>>
</span>
<?php echo $sala_rac_edit->signos_sintomas->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->factores_riesgos->Visible) { // factores_riesgos ?>
	<div id="r_factores_riesgos" class="form-group row">
		<label id="elh_sala_rac_factores_riesgos" for="x_factores_riesgos" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->factores_riesgos->caption() ?><?php echo $sala_rac_edit->factores_riesgos->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->factores_riesgos->cellAttributes() ?>>
<span id="el_sala_rac_factores_riesgos">
<input type="text" data-table="sala_rac" data-field="x_factores_riesgos" name="x_factores_riesgos" id="x_factores_riesgos" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($sala_rac_edit->factores_riesgos->getPlaceHolder()) ?>" value="<?php echo $sala_rac_edit->factores_riesgos->EditValue ?>"<?php echo $sala_rac_edit->factores_riesgos->editAttributes() ?>>
</span>
<?php echo $sala_rac_edit->factores_riesgos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->estado_final->Visible) { // estado_final ?>
	<div id="r_estado_final" class="form-group row">
		<label id="elh_sala_rac_estado_final" for="x_estado_final" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->estado_final->caption() ?><?php echo $sala_rac_edit->estado_final->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->estado_final->cellAttributes() ?>>
<span id="el_sala_rac_estado_final">
<input type="text" data-table="sala_rac" data-field="x_estado_final" name="x_estado_final" id="x_estado_final" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($sala_rac_edit->estado_final->getPlaceHolder()) ?>" value="<?php echo $sala_rac_edit->estado_final->EditValue ?>"<?php echo $sala_rac_edit->estado_final->editAttributes() ?>>
</span>
<?php echo $sala_rac_edit->estado_final->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->tipo_ingreso->Visible) { // tipo_ingreso ?>
	<div id="r_tipo_ingreso" class="form-group row">
		<label id="elh_sala_rac_tipo_ingreso" for="x_tipo_ingreso" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->tipo_ingreso->caption() ?><?php echo $sala_rac_edit->tipo_ingreso->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->tipo_ingreso->cellAttributes() ?>>
<span id="el_sala_rac_tipo_ingreso">
<input type="text" data-table="sala_rac" data-field="x_tipo_ingreso" name="x_tipo_ingreso" id="x_tipo_ingreso" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($sala_rac_edit->tipo_ingreso->getPlaceHolder()) ?>" value="<?php echo $sala_rac_edit->tipo_ingreso->EditValue ?>"<?php echo $sala_rac_edit->tipo_ingreso->editAttributes() ?>>
</span>
<?php echo $sala_rac_edit->tipo_ingreso->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->hora_clasificacion->Visible) { // hora_clasificacion ?>
	<div id="r_hora_clasificacion" class="form-group row">
		<label id="elh_sala_rac_hora_clasificacion" for="x_hora_clasificacion" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->hora_clasificacion->caption() ?><?php echo $sala_rac_edit->hora_clasificacion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->hora_clasificacion->cellAttributes() ?>>
<span id="el_sala_rac_hora_clasificacion">
<input type="text" data-table="sala_rac" data-field="x_hora_clasificacion" name="x_hora_clasificacion" id="x_hora_clasificacion" maxlength="8" placeholder="<?php echo HtmlEncode($sala_rac_edit->hora_clasificacion->getPlaceHolder()) ?>" value="<?php echo $sala_rac_edit->hora_clasificacion->EditValue ?>"<?php echo $sala_rac_edit->hora_clasificacion->editAttributes() ?>>
<?php if (!$sala_rac_edit->hora_clasificacion->ReadOnly && !$sala_rac_edit->hora_clasificacion->Disabled && !isset($sala_rac_edit->hora_clasificacion->EditAttrs["readonly"]) && !isset($sala_rac_edit->hora_clasificacion->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fsala_racedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fsala_racedit", "x_hora_clasificacion", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $sala_rac_edit->hora_clasificacion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->descripcion_signos->Visible) { // descripcion_signos ?>
	<div id="r_descripcion_signos" class="form-group row">
		<label id="elh_sala_rac_descripcion_signos" for="x_descripcion_signos" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->descripcion_signos->caption() ?><?php echo $sala_rac_edit->descripcion_signos->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->descripcion_signos->cellAttributes() ?>>
<span id="el_sala_rac_descripcion_signos">
<textarea data-table="sala_rac" data-field="x_descripcion_signos" name="x_descripcion_signos" id="x_descripcion_signos" cols="35" rows="4" placeholder="<?php echo HtmlEncode($sala_rac_edit->descripcion_signos->getPlaceHolder()) ?>"<?php echo $sala_rac_edit->descripcion_signos->editAttributes() ?>><?php echo $sala_rac_edit->descripcion_signos->EditValue ?></textarea>
</span>
<?php echo $sala_rac_edit->descripcion_signos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->hospital->Visible) { // hospital ?>
	<div id="r_hospital" class="form-group row">
		<label id="elh_sala_rac_hospital" for="x_hospital" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->hospital->caption() ?><?php echo $sala_rac_edit->hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->hospital->cellAttributes() ?>>
<span id="el_sala_rac_hospital">
<input type="text" data-table="sala_rac" data-field="x_hospital" name="x_hospital" id="x_hospital" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($sala_rac_edit->hospital->getPlaceHolder()) ?>" value="<?php echo $sala_rac_edit->hospital->EditValue ?>"<?php echo $sala_rac_edit->hospital->editAttributes() ?>>
</span>
<?php echo $sala_rac_edit->hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_edit->motivo_trauma->Visible) { // motivo_trauma ?>
	<div id="r_motivo_trauma" class="form-group row">
		<label id="elh_sala_rac_motivo_trauma" for="x_motivo_trauma" class="<?php echo $sala_rac_edit->LeftColumnClass ?>"><?php echo $sala_rac_edit->motivo_trauma->caption() ?><?php echo $sala_rac_edit->motivo_trauma->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_edit->RightColumnClass ?>"><div <?php echo $sala_rac_edit->motivo_trauma->cellAttributes() ?>>
<span id="el_sala_rac_motivo_trauma">
<input type="text" data-table="sala_rac" data-field="x_motivo_trauma" name="x_motivo_trauma" id="x_motivo_trauma" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($sala_rac_edit->motivo_trauma->getPlaceHolder()) ?>" value="<?php echo $sala_rac_edit->motivo_trauma->EditValue ?>"<?php echo $sala_rac_edit->motivo_trauma->editAttributes() ?>>
</span>
<?php echo $sala_rac_edit->motivo_trauma->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$sala_rac_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $sala_rac_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sala_rac_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$sala_rac_edit->showPageFooter();
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
$sala_rac_edit->terminate();
?>