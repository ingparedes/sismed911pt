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
$sala_rac_add = new sala_rac_add();

// Run the page
$sala_rac_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sala_rac_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fsala_racadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fsala_racadd = currentForm = new ew.Form("fsala_racadd", "add");

	// Validate form
	fsala_racadd.validate = function() {
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
			<?php if ($sala_rac_add->id_registro->Required) { ?>
				elm = this.getElements("x" + infix + "_id_registro");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->id_registro->caption(), $sala_rac_add->id_registro->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_id_registro");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($sala_rac_add->id_registro->errorMessage()) ?>");
			<?php if ($sala_rac_add->fecha_hora->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_hora");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->fecha_hora->caption(), $sala_rac_add->fecha_hora->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_fecha_hora");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($sala_rac_add->fecha_hora->errorMessage()) ?>");
			<?php if ($sala_rac_add->id_admision->Required) { ?>
				elm = this.getElements("x" + infix + "_id_admision");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->id_admision->caption(), $sala_rac_add->id_admision->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_add->acompanante->Required) { ?>
				elm = this.getElements("x" + infix + "_acompanante");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->acompanante->caption(), $sala_rac_add->acompanante->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_add->tel_acompanante->Required) { ?>
				elm = this.getElements("x" + infix + "_tel_acompanante");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->tel_acompanante->caption(), $sala_rac_add->tel_acompanante->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_add->tipo_urgencia->Required) { ?>
				elm = this.getElements("x" + infix + "_tipo_urgencia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->tipo_urgencia->caption(), $sala_rac_add->tipo_urgencia->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_add->clasificacion->Required) { ?>
				elm = this.getElements("x" + infix + "_clasificacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->clasificacion->caption(), $sala_rac_add->clasificacion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_add->motivo_consulta->Required) { ?>
				elm = this.getElements("x" + infix + "_motivo_consulta");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->motivo_consulta->caption(), $sala_rac_add->motivo_consulta->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_add->signos_vitales->Required) { ?>
				elm = this.getElements("x" + infix + "_signos_vitales");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->signos_vitales->caption(), $sala_rac_add->signos_vitales->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_add->so2->Required) { ?>
				elm = this.getElements("x" + infix + "_so2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->so2->caption(), $sala_rac_add->so2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_add->fr->Required) { ?>
				elm = this.getElements("x" + infix + "_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->fr->caption(), $sala_rac_add->fr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_add->_t->Required) { ?>
				elm = this.getElements("x" + infix + "__t");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->_t->caption(), $sala_rac_add->_t->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_add->fc->Required) { ?>
				elm = this.getElements("x" + infix + "_fc");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->fc->caption(), $sala_rac_add->fc->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_add->pas->Required) { ?>
				elm = this.getElements("x" + infix + "_pas");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->pas->caption(), $sala_rac_add->pas->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_add->pad->Required) { ?>
				elm = this.getElements("x" + infix + "_pad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->pad->caption(), $sala_rac_add->pad->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_add->local_trauma->Required) { ?>
				elm = this.getElements("x" + infix + "_local_trauma");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->local_trauma->caption(), $sala_rac_add->local_trauma->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_add->sistema->Required) { ?>
				elm = this.getElements("x" + infix + "_sistema");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->sistema->caption(), $sala_rac_add->sistema->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_add->nivel_conciencia->Required) { ?>
				elm = this.getElements("x" + infix + "_nivel_conciencia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->nivel_conciencia->caption(), $sala_rac_add->nivel_conciencia->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_add->dolor->Required) { ?>
				elm = this.getElements("x" + infix + "_dolor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->dolor->caption(), $sala_rac_add->dolor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_add->signos_sintomas->Required) { ?>
				elm = this.getElements("x" + infix + "_signos_sintomas");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->signos_sintomas->caption(), $sala_rac_add->signos_sintomas->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_add->factores_riesgos->Required) { ?>
				elm = this.getElements("x" + infix + "_factores_riesgos");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->factores_riesgos->caption(), $sala_rac_add->factores_riesgos->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_add->estado_final->Required) { ?>
				elm = this.getElements("x" + infix + "_estado_final");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->estado_final->caption(), $sala_rac_add->estado_final->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_add->tipo_ingreso->Required) { ?>
				elm = this.getElements("x" + infix + "_tipo_ingreso");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->tipo_ingreso->caption(), $sala_rac_add->tipo_ingreso->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_add->hora_clasificacion->Required) { ?>
				elm = this.getElements("x" + infix + "_hora_clasificacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->hora_clasificacion->caption(), $sala_rac_add->hora_clasificacion->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_hora_clasificacion");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($sala_rac_add->hora_clasificacion->errorMessage()) ?>");
			<?php if ($sala_rac_add->descripcion_signos->Required) { ?>
				elm = this.getElements("x" + infix + "_descripcion_signos");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->descripcion_signos->caption(), $sala_rac_add->descripcion_signos->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_add->hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->hospital->caption(), $sala_rac_add->hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sala_rac_add->motivo_trauma->Required) { ?>
				elm = this.getElements("x" + infix + "_motivo_trauma");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sala_rac_add->motivo_trauma->caption(), $sala_rac_add->motivo_trauma->RequiredErrorMessage)) ?>");
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
	fsala_racadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fsala_racadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fsala_racadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $sala_rac_add->showPageHeader(); ?>
<?php
$sala_rac_add->showMessage();
?>
<form name="fsala_racadd" id="fsala_racadd" class="<?php echo $sala_rac_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sala_rac">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$sala_rac_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($sala_rac_add->id_registro->Visible) { // id_registro ?>
	<div id="r_id_registro" class="form-group row">
		<label id="elh_sala_rac_id_registro" for="x_id_registro" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->id_registro->caption() ?><?php echo $sala_rac_add->id_registro->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->id_registro->cellAttributes() ?>>
<span id="el_sala_rac_id_registro">
<input type="text" data-table="sala_rac" data-field="x_id_registro" name="x_id_registro" id="x_id_registro" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($sala_rac_add->id_registro->getPlaceHolder()) ?>" value="<?php echo $sala_rac_add->id_registro->EditValue ?>"<?php echo $sala_rac_add->id_registro->editAttributes() ?>>
</span>
<?php echo $sala_rac_add->id_registro->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->fecha_hora->Visible) { // fecha_hora ?>
	<div id="r_fecha_hora" class="form-group row">
		<label id="elh_sala_rac_fecha_hora" for="x_fecha_hora" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->fecha_hora->caption() ?><?php echo $sala_rac_add->fecha_hora->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->fecha_hora->cellAttributes() ?>>
<span id="el_sala_rac_fecha_hora">
<input type="text" data-table="sala_rac" data-field="x_fecha_hora" name="x_fecha_hora" id="x_fecha_hora" maxlength="8" placeholder="<?php echo HtmlEncode($sala_rac_add->fecha_hora->getPlaceHolder()) ?>" value="<?php echo $sala_rac_add->fecha_hora->EditValue ?>"<?php echo $sala_rac_add->fecha_hora->editAttributes() ?>>
<?php if (!$sala_rac_add->fecha_hora->ReadOnly && !$sala_rac_add->fecha_hora->Disabled && !isset($sala_rac_add->fecha_hora->EditAttrs["readonly"]) && !isset($sala_rac_add->fecha_hora->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fsala_racadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fsala_racadd", "x_fecha_hora", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $sala_rac_add->fecha_hora->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->id_admision->Visible) { // id_admision ?>
	<div id="r_id_admision" class="form-group row">
		<label id="elh_sala_rac_id_admision" for="x_id_admision" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->id_admision->caption() ?><?php echo $sala_rac_add->id_admision->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->id_admision->cellAttributes() ?>>
<span id="el_sala_rac_id_admision">
<input type="text" data-table="sala_rac" data-field="x_id_admision" name="x_id_admision" id="x_id_admision" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($sala_rac_add->id_admision->getPlaceHolder()) ?>" value="<?php echo $sala_rac_add->id_admision->EditValue ?>"<?php echo $sala_rac_add->id_admision->editAttributes() ?>>
</span>
<?php echo $sala_rac_add->id_admision->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->acompanante->Visible) { // acompañante ?>
	<div id="r_acompanante" class="form-group row">
		<label id="elh_sala_rac_acompanante" for="x_acompanante" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->acompanante->caption() ?><?php echo $sala_rac_add->acompanante->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->acompanante->cellAttributes() ?>>
<span id="el_sala_rac_acompanante">
<input type="text" data-table="sala_rac" data-field="x_acompanante" name="x_acompanante" id="x_acompanante" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($sala_rac_add->acompanante->getPlaceHolder()) ?>" value="<?php echo $sala_rac_add->acompanante->EditValue ?>"<?php echo $sala_rac_add->acompanante->editAttributes() ?>>
</span>
<?php echo $sala_rac_add->acompanante->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->tel_acompanante->Visible) { // tel_acompañante ?>
	<div id="r_tel_acompanante" class="form-group row">
		<label id="elh_sala_rac_tel_acompanante" for="x_tel_acompanante" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->tel_acompanante->caption() ?><?php echo $sala_rac_add->tel_acompanante->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->tel_acompanante->cellAttributes() ?>>
<span id="el_sala_rac_tel_acompanante">
<input type="text" data-table="sala_rac" data-field="x_tel_acompanante" name="x_tel_acompanante" id="x_tel_acompanante" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($sala_rac_add->tel_acompanante->getPlaceHolder()) ?>" value="<?php echo $sala_rac_add->tel_acompanante->EditValue ?>"<?php echo $sala_rac_add->tel_acompanante->editAttributes() ?>>
</span>
<?php echo $sala_rac_add->tel_acompanante->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->tipo_urgencia->Visible) { // tipo_urgencia ?>
	<div id="r_tipo_urgencia" class="form-group row">
		<label id="elh_sala_rac_tipo_urgencia" for="x_tipo_urgencia" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->tipo_urgencia->caption() ?><?php echo $sala_rac_add->tipo_urgencia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->tipo_urgencia->cellAttributes() ?>>
<span id="el_sala_rac_tipo_urgencia">
<input type="text" data-table="sala_rac" data-field="x_tipo_urgencia" name="x_tipo_urgencia" id="x_tipo_urgencia" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($sala_rac_add->tipo_urgencia->getPlaceHolder()) ?>" value="<?php echo $sala_rac_add->tipo_urgencia->EditValue ?>"<?php echo $sala_rac_add->tipo_urgencia->editAttributes() ?>>
</span>
<?php echo $sala_rac_add->tipo_urgencia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->clasificacion->Visible) { // clasificacion ?>
	<div id="r_clasificacion" class="form-group row">
		<label id="elh_sala_rac_clasificacion" for="x_clasificacion" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->clasificacion->caption() ?><?php echo $sala_rac_add->clasificacion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->clasificacion->cellAttributes() ?>>
<span id="el_sala_rac_clasificacion">
<input type="text" data-table="sala_rac" data-field="x_clasificacion" name="x_clasificacion" id="x_clasificacion" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($sala_rac_add->clasificacion->getPlaceHolder()) ?>" value="<?php echo $sala_rac_add->clasificacion->EditValue ?>"<?php echo $sala_rac_add->clasificacion->editAttributes() ?>>
</span>
<?php echo $sala_rac_add->clasificacion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->motivo_consulta->Visible) { // motivo_consulta ?>
	<div id="r_motivo_consulta" class="form-group row">
		<label id="elh_sala_rac_motivo_consulta" for="x_motivo_consulta" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->motivo_consulta->caption() ?><?php echo $sala_rac_add->motivo_consulta->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->motivo_consulta->cellAttributes() ?>>
<span id="el_sala_rac_motivo_consulta">
<textarea data-table="sala_rac" data-field="x_motivo_consulta" name="x_motivo_consulta" id="x_motivo_consulta" cols="35" rows="4" placeholder="<?php echo HtmlEncode($sala_rac_add->motivo_consulta->getPlaceHolder()) ?>"<?php echo $sala_rac_add->motivo_consulta->editAttributes() ?>><?php echo $sala_rac_add->motivo_consulta->EditValue ?></textarea>
</span>
<?php echo $sala_rac_add->motivo_consulta->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->signos_vitales->Visible) { // signos_vitales ?>
	<div id="r_signos_vitales" class="form-group row">
		<label id="elh_sala_rac_signos_vitales" for="x_signos_vitales" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->signos_vitales->caption() ?><?php echo $sala_rac_add->signos_vitales->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->signos_vitales->cellAttributes() ?>>
<span id="el_sala_rac_signos_vitales">
<textarea data-table="sala_rac" data-field="x_signos_vitales" name="x_signos_vitales" id="x_signos_vitales" cols="35" rows="4" placeholder="<?php echo HtmlEncode($sala_rac_add->signos_vitales->getPlaceHolder()) ?>"<?php echo $sala_rac_add->signos_vitales->editAttributes() ?>><?php echo $sala_rac_add->signos_vitales->EditValue ?></textarea>
</span>
<?php echo $sala_rac_add->signos_vitales->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->so2->Visible) { // so2 ?>
	<div id="r_so2" class="form-group row">
		<label id="elh_sala_rac_so2" for="x_so2" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->so2->caption() ?><?php echo $sala_rac_add->so2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->so2->cellAttributes() ?>>
<span id="el_sala_rac_so2">
<input type="text" data-table="sala_rac" data-field="x_so2" name="x_so2" id="x_so2" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($sala_rac_add->so2->getPlaceHolder()) ?>" value="<?php echo $sala_rac_add->so2->EditValue ?>"<?php echo $sala_rac_add->so2->editAttributes() ?>>
</span>
<?php echo $sala_rac_add->so2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->fr->Visible) { // fr ?>
	<div id="r_fr" class="form-group row">
		<label id="elh_sala_rac_fr" for="x_fr" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->fr->caption() ?><?php echo $sala_rac_add->fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->fr->cellAttributes() ?>>
<span id="el_sala_rac_fr">
<input type="text" data-table="sala_rac" data-field="x_fr" name="x_fr" id="x_fr" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($sala_rac_add->fr->getPlaceHolder()) ?>" value="<?php echo $sala_rac_add->fr->EditValue ?>"<?php echo $sala_rac_add->fr->editAttributes() ?>>
</span>
<?php echo $sala_rac_add->fr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->_t->Visible) { // t ?>
	<div id="r__t" class="form-group row">
		<label id="elh_sala_rac__t" for="x__t" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->_t->caption() ?><?php echo $sala_rac_add->_t->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->_t->cellAttributes() ?>>
<span id="el_sala_rac__t">
<input type="text" data-table="sala_rac" data-field="x__t" name="x__t" id="x__t" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($sala_rac_add->_t->getPlaceHolder()) ?>" value="<?php echo $sala_rac_add->_t->EditValue ?>"<?php echo $sala_rac_add->_t->editAttributes() ?>>
</span>
<?php echo $sala_rac_add->_t->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->fc->Visible) { // fc ?>
	<div id="r_fc" class="form-group row">
		<label id="elh_sala_rac_fc" for="x_fc" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->fc->caption() ?><?php echo $sala_rac_add->fc->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->fc->cellAttributes() ?>>
<span id="el_sala_rac_fc">
<input type="text" data-table="sala_rac" data-field="x_fc" name="x_fc" id="x_fc" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($sala_rac_add->fc->getPlaceHolder()) ?>" value="<?php echo $sala_rac_add->fc->EditValue ?>"<?php echo $sala_rac_add->fc->editAttributes() ?>>
</span>
<?php echo $sala_rac_add->fc->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->pas->Visible) { // pas ?>
	<div id="r_pas" class="form-group row">
		<label id="elh_sala_rac_pas" for="x_pas" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->pas->caption() ?><?php echo $sala_rac_add->pas->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->pas->cellAttributes() ?>>
<span id="el_sala_rac_pas">
<input type="text" data-table="sala_rac" data-field="x_pas" name="x_pas" id="x_pas" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($sala_rac_add->pas->getPlaceHolder()) ?>" value="<?php echo $sala_rac_add->pas->EditValue ?>"<?php echo $sala_rac_add->pas->editAttributes() ?>>
</span>
<?php echo $sala_rac_add->pas->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->pad->Visible) { // pad ?>
	<div id="r_pad" class="form-group row">
		<label id="elh_sala_rac_pad" for="x_pad" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->pad->caption() ?><?php echo $sala_rac_add->pad->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->pad->cellAttributes() ?>>
<span id="el_sala_rac_pad">
<input type="text" data-table="sala_rac" data-field="x_pad" name="x_pad" id="x_pad" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($sala_rac_add->pad->getPlaceHolder()) ?>" value="<?php echo $sala_rac_add->pad->EditValue ?>"<?php echo $sala_rac_add->pad->editAttributes() ?>>
</span>
<?php echo $sala_rac_add->pad->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->local_trauma->Visible) { // local_trauma ?>
	<div id="r_local_trauma" class="form-group row">
		<label id="elh_sala_rac_local_trauma" for="x_local_trauma" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->local_trauma->caption() ?><?php echo $sala_rac_add->local_trauma->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->local_trauma->cellAttributes() ?>>
<span id="el_sala_rac_local_trauma">
<input type="text" data-table="sala_rac" data-field="x_local_trauma" name="x_local_trauma" id="x_local_trauma" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($sala_rac_add->local_trauma->getPlaceHolder()) ?>" value="<?php echo $sala_rac_add->local_trauma->EditValue ?>"<?php echo $sala_rac_add->local_trauma->editAttributes() ?>>
</span>
<?php echo $sala_rac_add->local_trauma->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->sistema->Visible) { // sistema ?>
	<div id="r_sistema" class="form-group row">
		<label id="elh_sala_rac_sistema" for="x_sistema" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->sistema->caption() ?><?php echo $sala_rac_add->sistema->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->sistema->cellAttributes() ?>>
<span id="el_sala_rac_sistema">
<input type="text" data-table="sala_rac" data-field="x_sistema" name="x_sistema" id="x_sistema" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($sala_rac_add->sistema->getPlaceHolder()) ?>" value="<?php echo $sala_rac_add->sistema->EditValue ?>"<?php echo $sala_rac_add->sistema->editAttributes() ?>>
</span>
<?php echo $sala_rac_add->sistema->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->nivel_conciencia->Visible) { // nivel_conciencia ?>
	<div id="r_nivel_conciencia" class="form-group row">
		<label id="elh_sala_rac_nivel_conciencia" for="x_nivel_conciencia" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->nivel_conciencia->caption() ?><?php echo $sala_rac_add->nivel_conciencia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->nivel_conciencia->cellAttributes() ?>>
<span id="el_sala_rac_nivel_conciencia">
<input type="text" data-table="sala_rac" data-field="x_nivel_conciencia" name="x_nivel_conciencia" id="x_nivel_conciencia" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($sala_rac_add->nivel_conciencia->getPlaceHolder()) ?>" value="<?php echo $sala_rac_add->nivel_conciencia->EditValue ?>"<?php echo $sala_rac_add->nivel_conciencia->editAttributes() ?>>
</span>
<?php echo $sala_rac_add->nivel_conciencia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->dolor->Visible) { // dolor ?>
	<div id="r_dolor" class="form-group row">
		<label id="elh_sala_rac_dolor" for="x_dolor" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->dolor->caption() ?><?php echo $sala_rac_add->dolor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->dolor->cellAttributes() ?>>
<span id="el_sala_rac_dolor">
<input type="text" data-table="sala_rac" data-field="x_dolor" name="x_dolor" id="x_dolor" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($sala_rac_add->dolor->getPlaceHolder()) ?>" value="<?php echo $sala_rac_add->dolor->EditValue ?>"<?php echo $sala_rac_add->dolor->editAttributes() ?>>
</span>
<?php echo $sala_rac_add->dolor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->signos_sintomas->Visible) { // signos_sintomas ?>
	<div id="r_signos_sintomas" class="form-group row">
		<label id="elh_sala_rac_signos_sintomas" for="x_signos_sintomas" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->signos_sintomas->caption() ?><?php echo $sala_rac_add->signos_sintomas->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->signos_sintomas->cellAttributes() ?>>
<span id="el_sala_rac_signos_sintomas">
<input type="text" data-table="sala_rac" data-field="x_signos_sintomas" name="x_signos_sintomas" id="x_signos_sintomas" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($sala_rac_add->signos_sintomas->getPlaceHolder()) ?>" value="<?php echo $sala_rac_add->signos_sintomas->EditValue ?>"<?php echo $sala_rac_add->signos_sintomas->editAttributes() ?>>
</span>
<?php echo $sala_rac_add->signos_sintomas->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->factores_riesgos->Visible) { // factores_riesgos ?>
	<div id="r_factores_riesgos" class="form-group row">
		<label id="elh_sala_rac_factores_riesgos" for="x_factores_riesgos" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->factores_riesgos->caption() ?><?php echo $sala_rac_add->factores_riesgos->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->factores_riesgos->cellAttributes() ?>>
<span id="el_sala_rac_factores_riesgos">
<input type="text" data-table="sala_rac" data-field="x_factores_riesgos" name="x_factores_riesgos" id="x_factores_riesgos" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($sala_rac_add->factores_riesgos->getPlaceHolder()) ?>" value="<?php echo $sala_rac_add->factores_riesgos->EditValue ?>"<?php echo $sala_rac_add->factores_riesgos->editAttributes() ?>>
</span>
<?php echo $sala_rac_add->factores_riesgos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->estado_final->Visible) { // estado_final ?>
	<div id="r_estado_final" class="form-group row">
		<label id="elh_sala_rac_estado_final" for="x_estado_final" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->estado_final->caption() ?><?php echo $sala_rac_add->estado_final->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->estado_final->cellAttributes() ?>>
<span id="el_sala_rac_estado_final">
<input type="text" data-table="sala_rac" data-field="x_estado_final" name="x_estado_final" id="x_estado_final" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($sala_rac_add->estado_final->getPlaceHolder()) ?>" value="<?php echo $sala_rac_add->estado_final->EditValue ?>"<?php echo $sala_rac_add->estado_final->editAttributes() ?>>
</span>
<?php echo $sala_rac_add->estado_final->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->tipo_ingreso->Visible) { // tipo_ingreso ?>
	<div id="r_tipo_ingreso" class="form-group row">
		<label id="elh_sala_rac_tipo_ingreso" for="x_tipo_ingreso" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->tipo_ingreso->caption() ?><?php echo $sala_rac_add->tipo_ingreso->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->tipo_ingreso->cellAttributes() ?>>
<span id="el_sala_rac_tipo_ingreso">
<input type="text" data-table="sala_rac" data-field="x_tipo_ingreso" name="x_tipo_ingreso" id="x_tipo_ingreso" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($sala_rac_add->tipo_ingreso->getPlaceHolder()) ?>" value="<?php echo $sala_rac_add->tipo_ingreso->EditValue ?>"<?php echo $sala_rac_add->tipo_ingreso->editAttributes() ?>>
</span>
<?php echo $sala_rac_add->tipo_ingreso->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->hora_clasificacion->Visible) { // hora_clasificacion ?>
	<div id="r_hora_clasificacion" class="form-group row">
		<label id="elh_sala_rac_hora_clasificacion" for="x_hora_clasificacion" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->hora_clasificacion->caption() ?><?php echo $sala_rac_add->hora_clasificacion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->hora_clasificacion->cellAttributes() ?>>
<span id="el_sala_rac_hora_clasificacion">
<input type="text" data-table="sala_rac" data-field="x_hora_clasificacion" name="x_hora_clasificacion" id="x_hora_clasificacion" maxlength="8" placeholder="<?php echo HtmlEncode($sala_rac_add->hora_clasificacion->getPlaceHolder()) ?>" value="<?php echo $sala_rac_add->hora_clasificacion->EditValue ?>"<?php echo $sala_rac_add->hora_clasificacion->editAttributes() ?>>
<?php if (!$sala_rac_add->hora_clasificacion->ReadOnly && !$sala_rac_add->hora_clasificacion->Disabled && !isset($sala_rac_add->hora_clasificacion->EditAttrs["readonly"]) && !isset($sala_rac_add->hora_clasificacion->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fsala_racadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fsala_racadd", "x_hora_clasificacion", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $sala_rac_add->hora_clasificacion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->descripcion_signos->Visible) { // descripcion_signos ?>
	<div id="r_descripcion_signos" class="form-group row">
		<label id="elh_sala_rac_descripcion_signos" for="x_descripcion_signos" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->descripcion_signos->caption() ?><?php echo $sala_rac_add->descripcion_signos->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->descripcion_signos->cellAttributes() ?>>
<span id="el_sala_rac_descripcion_signos">
<textarea data-table="sala_rac" data-field="x_descripcion_signos" name="x_descripcion_signos" id="x_descripcion_signos" cols="35" rows="4" placeholder="<?php echo HtmlEncode($sala_rac_add->descripcion_signos->getPlaceHolder()) ?>"<?php echo $sala_rac_add->descripcion_signos->editAttributes() ?>><?php echo $sala_rac_add->descripcion_signos->EditValue ?></textarea>
</span>
<?php echo $sala_rac_add->descripcion_signos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->hospital->Visible) { // hospital ?>
	<div id="r_hospital" class="form-group row">
		<label id="elh_sala_rac_hospital" for="x_hospital" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->hospital->caption() ?><?php echo $sala_rac_add->hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->hospital->cellAttributes() ?>>
<span id="el_sala_rac_hospital">
<input type="text" data-table="sala_rac" data-field="x_hospital" name="x_hospital" id="x_hospital" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($sala_rac_add->hospital->getPlaceHolder()) ?>" value="<?php echo $sala_rac_add->hospital->EditValue ?>"<?php echo $sala_rac_add->hospital->editAttributes() ?>>
</span>
<?php echo $sala_rac_add->hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sala_rac_add->motivo_trauma->Visible) { // motivo_trauma ?>
	<div id="r_motivo_trauma" class="form-group row">
		<label id="elh_sala_rac_motivo_trauma" for="x_motivo_trauma" class="<?php echo $sala_rac_add->LeftColumnClass ?>"><?php echo $sala_rac_add->motivo_trauma->caption() ?><?php echo $sala_rac_add->motivo_trauma->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sala_rac_add->RightColumnClass ?>"><div <?php echo $sala_rac_add->motivo_trauma->cellAttributes() ?>>
<span id="el_sala_rac_motivo_trauma">
<input type="text" data-table="sala_rac" data-field="x_motivo_trauma" name="x_motivo_trauma" id="x_motivo_trauma" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($sala_rac_add->motivo_trauma->getPlaceHolder()) ?>" value="<?php echo $sala_rac_add->motivo_trauma->EditValue ?>"<?php echo $sala_rac_add->motivo_trauma->editAttributes() ?>>
</span>
<?php echo $sala_rac_add->motivo_trauma->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$sala_rac_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $sala_rac_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sala_rac_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$sala_rac_add->showPageFooter();
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
$sala_rac_add->terminate();
?>