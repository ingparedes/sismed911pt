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
$preh_despacho_edit = new preh_despacho_edit();

// Run the page
$preh_despacho_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_despacho_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpreh_despachoedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpreh_despachoedit = currentForm = new ew.Form("fpreh_despachoedit", "edit");

	// Validate form
	fpreh_despachoedit.validate = function() {
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
			<?php if ($preh_despacho_edit->cod_casopreh->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_despacho_edit->cod_casopreh->caption(), $preh_despacho_edit->cod_casopreh->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($preh_despacho_edit->cod_casopreh->errorMessage()) ?>");
			<?php if ($preh_despacho_edit->fecha->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_despacho_edit->fecha->caption(), $preh_despacho_edit->fecha->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_fecha");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($preh_despacho_edit->fecha->errorMessage()) ?>");
			<?php if ($preh_despacho_edit->prioridad->Required) { ?>
				elm = this.getElements("x" + infix + "_prioridad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_despacho_edit->prioridad->caption(), $preh_despacho_edit->prioridad->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_prioridad");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($preh_despacho_edit->prioridad->errorMessage()) ?>");
			<?php if ($preh_despacho_edit->nombre_es->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_es");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_despacho_edit->nombre_es->caption(), $preh_despacho_edit->nombre_es->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_despacho_edit->tiempo->Required) { ?>
				elm = this.getElements("x" + infix + "_tiempo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_despacho_edit->tiempo->caption(), $preh_despacho_edit->tiempo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tiempo");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($preh_despacho_edit->tiempo->errorMessage()) ?>");
			<?php if ($preh_despacho_edit->cod_ambulancia->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_ambulancia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_despacho_edit->cod_ambulancia->caption(), $preh_despacho_edit->cod_ambulancia->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_despacho_edit->hora_asigna->Required) { ?>
				elm = this.getElements("x" + infix + "_hora_asigna");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_despacho_edit->hora_asigna->caption(), $preh_despacho_edit->hora_asigna->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_hora_asigna");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($preh_despacho_edit->hora_asigna->errorMessage()) ?>");
			<?php if ($preh_despacho_edit->hora_llegada->Required) { ?>
				elm = this.getElements("x" + infix + "_hora_llegada");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_despacho_edit->hora_llegada->caption(), $preh_despacho_edit->hora_llegada->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_hora_llegada");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($preh_despacho_edit->hora_llegada->errorMessage()) ?>");
			<?php if ($preh_despacho_edit->hora_inicio->Required) { ?>
				elm = this.getElements("x" + infix + "_hora_inicio");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_despacho_edit->hora_inicio->caption(), $preh_despacho_edit->hora_inicio->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_hora_inicio");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($preh_despacho_edit->hora_inicio->errorMessage()) ?>");
			<?php if ($preh_despacho_edit->hora_destino->Required) { ?>
				elm = this.getElements("x" + infix + "_hora_destino");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_despacho_edit->hora_destino->caption(), $preh_despacho_edit->hora_destino->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_hora_destino");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($preh_despacho_edit->hora_destino->errorMessage()) ?>");
			<?php if ($preh_despacho_edit->hora_preposicion->Required) { ?>
				elm = this.getElements("x" + infix + "_hora_preposicion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_despacho_edit->hora_preposicion->caption(), $preh_despacho_edit->hora_preposicion->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_hora_preposicion");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($preh_despacho_edit->hora_preposicion->errorMessage()) ?>");
			<?php if ($preh_despacho_edit->base->Required) { ?>
				elm = this.getElements("x" + infix + "_base");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_despacho_edit->base->caption(), $preh_despacho_edit->base->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_despacho_edit->sede->Required) { ?>
				elm = this.getElements("x" + infix + "_sede");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_despacho_edit->sede->caption(), $preh_despacho_edit->sede->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sede");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($preh_despacho_edit->sede->errorMessage()) ?>");
			<?php if ($preh_despacho_edit->cierre->Required) { ?>
				elm = this.getElements("x" + infix + "_cierre");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_despacho_edit->cierre->caption(), $preh_despacho_edit->cierre->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cierre");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($preh_despacho_edit->cierre->errorMessage()) ?>");

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
	fpreh_despachoedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpreh_despachoedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpreh_despachoedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	$(document).ready(function(){$("#btn-cancel").hide()});
});
</script>
<?php $preh_despacho_edit->showPageHeader(); ?>
<?php
$preh_despacho_edit->showMessage();
?>
<form name="fpreh_despachoedit" id="fpreh_despachoedit" class="<?php echo $preh_despacho_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_despacho">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$preh_despacho_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($preh_despacho_edit->cod_casopreh->Visible) { // cod_casopreh ?>
	<div id="r_cod_casopreh" class="form-group row">
		<label id="elh_preh_despacho_cod_casopreh" for="x_cod_casopreh" class="<?php echo $preh_despacho_edit->LeftColumnClass ?>"><?php echo $preh_despacho_edit->cod_casopreh->caption() ?><?php echo $preh_despacho_edit->cod_casopreh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_despacho_edit->RightColumnClass ?>"><div <?php echo $preh_despacho_edit->cod_casopreh->cellAttributes() ?>>
<input type="text" data-table="preh_despacho" data-field="x_cod_casopreh" name="x_cod_casopreh" id="x_cod_casopreh" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($preh_despacho_edit->cod_casopreh->getPlaceHolder()) ?>" value="<?php echo $preh_despacho_edit->cod_casopreh->EditValue ?>"<?php echo $preh_despacho_edit->cod_casopreh->editAttributes() ?>>
<input type="hidden" data-table="preh_despacho" data-field="x_cod_casopreh" name="o_cod_casopreh" id="o_cod_casopreh" value="<?php echo HtmlEncode($preh_despacho_edit->cod_casopreh->OldValue != null ? $preh_despacho_edit->cod_casopreh->OldValue : $preh_despacho_edit->cod_casopreh->CurrentValue) ?>">
<?php echo $preh_despacho_edit->cod_casopreh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_despacho_edit->fecha->Visible) { // fecha ?>
	<div id="r_fecha" class="form-group row">
		<label id="elh_preh_despacho_fecha" for="x_fecha" class="<?php echo $preh_despacho_edit->LeftColumnClass ?>"><?php echo $preh_despacho_edit->fecha->caption() ?><?php echo $preh_despacho_edit->fecha->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_despacho_edit->RightColumnClass ?>"><div <?php echo $preh_despacho_edit->fecha->cellAttributes() ?>>
<span id="el_preh_despacho_fecha">
<input type="text" data-table="preh_despacho" data-field="x_fecha" name="x_fecha" id="x_fecha" maxlength="8" placeholder="<?php echo HtmlEncode($preh_despacho_edit->fecha->getPlaceHolder()) ?>" value="<?php echo $preh_despacho_edit->fecha->EditValue ?>"<?php echo $preh_despacho_edit->fecha->editAttributes() ?>>
<?php if (!$preh_despacho_edit->fecha->ReadOnly && !$preh_despacho_edit->fecha->Disabled && !isset($preh_despacho_edit->fecha->EditAttrs["readonly"]) && !isset($preh_despacho_edit->fecha->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpreh_despachoedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpreh_despachoedit", "x_fecha", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $preh_despacho_edit->fecha->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_despacho_edit->prioridad->Visible) { // prioridad ?>
	<div id="r_prioridad" class="form-group row">
		<label id="elh_preh_despacho_prioridad" for="x_prioridad" class="<?php echo $preh_despacho_edit->LeftColumnClass ?>"><?php echo $preh_despacho_edit->prioridad->caption() ?><?php echo $preh_despacho_edit->prioridad->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_despacho_edit->RightColumnClass ?>"><div <?php echo $preh_despacho_edit->prioridad->cellAttributes() ?>>
<span id="el_preh_despacho_prioridad">
<input type="text" data-table="preh_despacho" data-field="x_prioridad" name="x_prioridad" id="x_prioridad" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($preh_despacho_edit->prioridad->getPlaceHolder()) ?>" value="<?php echo $preh_despacho_edit->prioridad->EditValue ?>"<?php echo $preh_despacho_edit->prioridad->editAttributes() ?>>
</span>
<?php echo $preh_despacho_edit->prioridad->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_despacho_edit->nombre_es->Visible) { // nombre_es ?>
	<div id="r_nombre_es" class="form-group row">
		<label id="elh_preh_despacho_nombre_es" for="x_nombre_es" class="<?php echo $preh_despacho_edit->LeftColumnClass ?>"><?php echo $preh_despacho_edit->nombre_es->caption() ?><?php echo $preh_despacho_edit->nombre_es->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_despacho_edit->RightColumnClass ?>"><div <?php echo $preh_despacho_edit->nombre_es->cellAttributes() ?>>
<span id="el_preh_despacho_nombre_es">
<input type="text" data-table="preh_despacho" data-field="x_nombre_es" name="x_nombre_es" id="x_nombre_es" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($preh_despacho_edit->nombre_es->getPlaceHolder()) ?>" value="<?php echo $preh_despacho_edit->nombre_es->EditValue ?>"<?php echo $preh_despacho_edit->nombre_es->editAttributes() ?>>
</span>
<?php echo $preh_despacho_edit->nombre_es->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_despacho_edit->tiempo->Visible) { // tiempo ?>
	<div id="r_tiempo" class="form-group row">
		<label id="elh_preh_despacho_tiempo" for="x_tiempo" class="<?php echo $preh_despacho_edit->LeftColumnClass ?>"><?php echo $preh_despacho_edit->tiempo->caption() ?><?php echo $preh_despacho_edit->tiempo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_despacho_edit->RightColumnClass ?>"><div <?php echo $preh_despacho_edit->tiempo->cellAttributes() ?>>
<span id="el_preh_despacho_tiempo">
<input type="text" data-table="preh_despacho" data-field="x_tiempo" name="x_tiempo" id="x_tiempo" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($preh_despacho_edit->tiempo->getPlaceHolder()) ?>" value="<?php echo $preh_despacho_edit->tiempo->EditValue ?>"<?php echo $preh_despacho_edit->tiempo->editAttributes() ?>>
</span>
<?php echo $preh_despacho_edit->tiempo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_despacho_edit->cod_ambulancia->Visible) { // cod_ambulancia ?>
	<div id="r_cod_ambulancia" class="form-group row">
		<label id="elh_preh_despacho_cod_ambulancia" for="x_cod_ambulancia" class="<?php echo $preh_despacho_edit->LeftColumnClass ?>"><?php echo $preh_despacho_edit->cod_ambulancia->caption() ?><?php echo $preh_despacho_edit->cod_ambulancia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_despacho_edit->RightColumnClass ?>"><div <?php echo $preh_despacho_edit->cod_ambulancia->cellAttributes() ?>>
<span id="el_preh_despacho_cod_ambulancia">
<input type="text" data-table="preh_despacho" data-field="x_cod_ambulancia" name="x_cod_ambulancia" id="x_cod_ambulancia" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($preh_despacho_edit->cod_ambulancia->getPlaceHolder()) ?>" value="<?php echo $preh_despacho_edit->cod_ambulancia->EditValue ?>"<?php echo $preh_despacho_edit->cod_ambulancia->editAttributes() ?>>
</span>
<?php echo $preh_despacho_edit->cod_ambulancia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_despacho_edit->hora_asigna->Visible) { // hora_asigna ?>
	<div id="r_hora_asigna" class="form-group row">
		<label id="elh_preh_despacho_hora_asigna" for="x_hora_asigna" class="<?php echo $preh_despacho_edit->LeftColumnClass ?>"><?php echo $preh_despacho_edit->hora_asigna->caption() ?><?php echo $preh_despacho_edit->hora_asigna->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_despacho_edit->RightColumnClass ?>"><div <?php echo $preh_despacho_edit->hora_asigna->cellAttributes() ?>>
<span id="el_preh_despacho_hora_asigna">
<input type="text" data-table="preh_despacho" data-field="x_hora_asigna" name="x_hora_asigna" id="x_hora_asigna" maxlength="8" placeholder="<?php echo HtmlEncode($preh_despacho_edit->hora_asigna->getPlaceHolder()) ?>" value="<?php echo $preh_despacho_edit->hora_asigna->EditValue ?>"<?php echo $preh_despacho_edit->hora_asigna->editAttributes() ?>>
<?php if (!$preh_despacho_edit->hora_asigna->ReadOnly && !$preh_despacho_edit->hora_asigna->Disabled && !isset($preh_despacho_edit->hora_asigna->EditAttrs["readonly"]) && !isset($preh_despacho_edit->hora_asigna->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpreh_despachoedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpreh_despachoedit", "x_hora_asigna", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $preh_despacho_edit->hora_asigna->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_despacho_edit->hora_llegada->Visible) { // hora_llegada ?>
	<div id="r_hora_llegada" class="form-group row">
		<label id="elh_preh_despacho_hora_llegada" for="x_hora_llegada" class="<?php echo $preh_despacho_edit->LeftColumnClass ?>"><?php echo $preh_despacho_edit->hora_llegada->caption() ?><?php echo $preh_despacho_edit->hora_llegada->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_despacho_edit->RightColumnClass ?>"><div <?php echo $preh_despacho_edit->hora_llegada->cellAttributes() ?>>
<span id="el_preh_despacho_hora_llegada">
<input type="text" data-table="preh_despacho" data-field="x_hora_llegada" name="x_hora_llegada" id="x_hora_llegada" maxlength="8" placeholder="<?php echo HtmlEncode($preh_despacho_edit->hora_llegada->getPlaceHolder()) ?>" value="<?php echo $preh_despacho_edit->hora_llegada->EditValue ?>"<?php echo $preh_despacho_edit->hora_llegada->editAttributes() ?>>
<?php if (!$preh_despacho_edit->hora_llegada->ReadOnly && !$preh_despacho_edit->hora_llegada->Disabled && !isset($preh_despacho_edit->hora_llegada->EditAttrs["readonly"]) && !isset($preh_despacho_edit->hora_llegada->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpreh_despachoedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpreh_despachoedit", "x_hora_llegada", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $preh_despacho_edit->hora_llegada->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_despacho_edit->hora_inicio->Visible) { // hora_inicio ?>
	<div id="r_hora_inicio" class="form-group row">
		<label id="elh_preh_despacho_hora_inicio" for="x_hora_inicio" class="<?php echo $preh_despacho_edit->LeftColumnClass ?>"><?php echo $preh_despacho_edit->hora_inicio->caption() ?><?php echo $preh_despacho_edit->hora_inicio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_despacho_edit->RightColumnClass ?>"><div <?php echo $preh_despacho_edit->hora_inicio->cellAttributes() ?>>
<span id="el_preh_despacho_hora_inicio">
<input type="text" data-table="preh_despacho" data-field="x_hora_inicio" name="x_hora_inicio" id="x_hora_inicio" maxlength="8" placeholder="<?php echo HtmlEncode($preh_despacho_edit->hora_inicio->getPlaceHolder()) ?>" value="<?php echo $preh_despacho_edit->hora_inicio->EditValue ?>"<?php echo $preh_despacho_edit->hora_inicio->editAttributes() ?>>
<?php if (!$preh_despacho_edit->hora_inicio->ReadOnly && !$preh_despacho_edit->hora_inicio->Disabled && !isset($preh_despacho_edit->hora_inicio->EditAttrs["readonly"]) && !isset($preh_despacho_edit->hora_inicio->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpreh_despachoedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpreh_despachoedit", "x_hora_inicio", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $preh_despacho_edit->hora_inicio->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_despacho_edit->hora_destino->Visible) { // hora_destino ?>
	<div id="r_hora_destino" class="form-group row">
		<label id="elh_preh_despacho_hora_destino" for="x_hora_destino" class="<?php echo $preh_despacho_edit->LeftColumnClass ?>"><?php echo $preh_despacho_edit->hora_destino->caption() ?><?php echo $preh_despacho_edit->hora_destino->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_despacho_edit->RightColumnClass ?>"><div <?php echo $preh_despacho_edit->hora_destino->cellAttributes() ?>>
<span id="el_preh_despacho_hora_destino">
<input type="text" data-table="preh_despacho" data-field="x_hora_destino" name="x_hora_destino" id="x_hora_destino" maxlength="8" placeholder="<?php echo HtmlEncode($preh_despacho_edit->hora_destino->getPlaceHolder()) ?>" value="<?php echo $preh_despacho_edit->hora_destino->EditValue ?>"<?php echo $preh_despacho_edit->hora_destino->editAttributes() ?>>
<?php if (!$preh_despacho_edit->hora_destino->ReadOnly && !$preh_despacho_edit->hora_destino->Disabled && !isset($preh_despacho_edit->hora_destino->EditAttrs["readonly"]) && !isset($preh_despacho_edit->hora_destino->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpreh_despachoedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpreh_despachoedit", "x_hora_destino", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $preh_despacho_edit->hora_destino->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_despacho_edit->hora_preposicion->Visible) { // hora_preposicion ?>
	<div id="r_hora_preposicion" class="form-group row">
		<label id="elh_preh_despacho_hora_preposicion" for="x_hora_preposicion" class="<?php echo $preh_despacho_edit->LeftColumnClass ?>"><?php echo $preh_despacho_edit->hora_preposicion->caption() ?><?php echo $preh_despacho_edit->hora_preposicion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_despacho_edit->RightColumnClass ?>"><div <?php echo $preh_despacho_edit->hora_preposicion->cellAttributes() ?>>
<span id="el_preh_despacho_hora_preposicion">
<input type="text" data-table="preh_despacho" data-field="x_hora_preposicion" name="x_hora_preposicion" id="x_hora_preposicion" maxlength="8" placeholder="<?php echo HtmlEncode($preh_despacho_edit->hora_preposicion->getPlaceHolder()) ?>" value="<?php echo $preh_despacho_edit->hora_preposicion->EditValue ?>"<?php echo $preh_despacho_edit->hora_preposicion->editAttributes() ?>>
<?php if (!$preh_despacho_edit->hora_preposicion->ReadOnly && !$preh_despacho_edit->hora_preposicion->Disabled && !isset($preh_despacho_edit->hora_preposicion->EditAttrs["readonly"]) && !isset($preh_despacho_edit->hora_preposicion->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpreh_despachoedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpreh_despachoedit", "x_hora_preposicion", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $preh_despacho_edit->hora_preposicion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_despacho_edit->base->Visible) { // base ?>
	<div id="r_base" class="form-group row">
		<label id="elh_preh_despacho_base" for="x_base" class="<?php echo $preh_despacho_edit->LeftColumnClass ?>"><?php echo $preh_despacho_edit->base->caption() ?><?php echo $preh_despacho_edit->base->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_despacho_edit->RightColumnClass ?>"><div <?php echo $preh_despacho_edit->base->cellAttributes() ?>>
<span id="el_preh_despacho_base">
<input type="text" data-table="preh_despacho" data-field="x_base" name="x_base" id="x_base" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($preh_despacho_edit->base->getPlaceHolder()) ?>" value="<?php echo $preh_despacho_edit->base->EditValue ?>"<?php echo $preh_despacho_edit->base->editAttributes() ?>>
</span>
<?php echo $preh_despacho_edit->base->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_despacho_edit->sede->Visible) { // sede ?>
	<div id="r_sede" class="form-group row">
		<label id="elh_preh_despacho_sede" for="x_sede" class="<?php echo $preh_despacho_edit->LeftColumnClass ?>"><?php echo $preh_despacho_edit->sede->caption() ?><?php echo $preh_despacho_edit->sede->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_despacho_edit->RightColumnClass ?>"><div <?php echo $preh_despacho_edit->sede->cellAttributes() ?>>
<span id="el_preh_despacho_sede">
<input type="text" data-table="preh_despacho" data-field="x_sede" name="x_sede" id="x_sede" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($preh_despacho_edit->sede->getPlaceHolder()) ?>" value="<?php echo $preh_despacho_edit->sede->EditValue ?>"<?php echo $preh_despacho_edit->sede->editAttributes() ?>>
</span>
<?php echo $preh_despacho_edit->sede->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_despacho_edit->cierre->Visible) { // cierre ?>
	<div id="r_cierre" class="form-group row">
		<label id="elh_preh_despacho_cierre" for="x_cierre" class="<?php echo $preh_despacho_edit->LeftColumnClass ?>"><?php echo $preh_despacho_edit->cierre->caption() ?><?php echo $preh_despacho_edit->cierre->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $preh_despacho_edit->RightColumnClass ?>"><div <?php echo $preh_despacho_edit->cierre->cellAttributes() ?>>
<span id="el_preh_despacho_cierre">
<input type="text" data-table="preh_despacho" data-field="x_cierre" name="x_cierre" id="x_cierre" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($preh_despacho_edit->cierre->getPlaceHolder()) ?>" value="<?php echo $preh_despacho_edit->cierre->EditValue ?>"<?php echo $preh_despacho_edit->cierre->editAttributes() ?>>
</span>
<?php echo $preh_despacho_edit->cierre->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$preh_despacho_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $preh_despacho_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $preh_despacho_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$preh_despacho_edit->showPageFooter();
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
$preh_despacho_edit->terminate();
?>