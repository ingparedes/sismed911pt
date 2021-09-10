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
$servicio_ambulancia_edit = new servicio_ambulancia_edit();

// Run the page
$servicio_ambulancia_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$servicio_ambulancia_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fservicio_ambulanciaedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fservicio_ambulanciaedit = currentForm = new ew.Form("fservicio_ambulanciaedit", "edit");

	// Validate form
	fservicio_ambulanciaedit.validate = function() {
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
			<?php if ($servicio_ambulancia_edit->cod_casointerh->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_casointerh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_ambulancia_edit->cod_casointerh->caption(), $servicio_ambulancia_edit->cod_casointerh->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($servicio_ambulancia_edit->cod_ambulancia->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_ambulancia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_ambulancia_edit->cod_ambulancia->caption(), $servicio_ambulancia_edit->cod_ambulancia->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($servicio_ambulancia_edit->hora_asigna->Required) { ?>
				elm = this.getElements("x" + infix + "_hora_asigna");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_ambulancia_edit->hora_asigna->caption(), $servicio_ambulancia_edit->hora_asigna->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_hora_asigna");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($servicio_ambulancia_edit->hora_asigna->errorMessage()) ?>");
			<?php if ($servicio_ambulancia_edit->hora_llegada->Required) { ?>
				elm = this.getElements("x" + infix + "_hora_llegada");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_ambulancia_edit->hora_llegada->caption(), $servicio_ambulancia_edit->hora_llegada->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_hora_llegada");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($servicio_ambulancia_edit->hora_llegada->errorMessage()) ?>");
			<?php if ($servicio_ambulancia_edit->hora_inicio->Required) { ?>
				elm = this.getElements("x" + infix + "_hora_inicio");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_ambulancia_edit->hora_inicio->caption(), $servicio_ambulancia_edit->hora_inicio->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($servicio_ambulancia_edit->hora_destino->Required) { ?>
				elm = this.getElements("x" + infix + "_hora_destino");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_ambulancia_edit->hora_destino->caption(), $servicio_ambulancia_edit->hora_destino->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($servicio_ambulancia_edit->hora_preposicion->Required) { ?>
				elm = this.getElements("x" + infix + "_hora_preposicion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_ambulancia_edit->hora_preposicion->caption(), $servicio_ambulancia_edit->hora_preposicion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($servicio_ambulancia_edit->observaciones->Required) { ?>
				elm = this.getElements("x" + infix + "_observaciones");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_ambulancia_edit->observaciones->caption(), $servicio_ambulancia_edit->observaciones->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($servicio_ambulancia_edit->tipo_traslado->Required) { ?>
				elm = this.getElements("x" + infix + "_tipo_traslado");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_ambulancia_edit->tipo_traslado->caption(), $servicio_ambulancia_edit->tipo_traslado->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($servicio_ambulancia_edit->traslado_fallido->Required) { ?>
				elm = this.getElements("x" + infix + "_traslado_fallido");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_ambulancia_edit->traslado_fallido->caption(), $servicio_ambulancia_edit->traslado_fallido->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($servicio_ambulancia_edit->estado_paciente->Required) { ?>
				elm = this.getElements("x" + infix + "_estado_paciente");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_ambulancia_edit->estado_paciente->caption(), $servicio_ambulancia_edit->estado_paciente->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($servicio_ambulancia_edit->k_final->Required) { ?>
				elm = this.getElements("x" + infix + "_k_final");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_ambulancia_edit->k_final->caption(), $servicio_ambulancia_edit->k_final->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($servicio_ambulancia_edit->k_inical->Required) { ?>
				elm = this.getElements("x" + infix + "_k_inical");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_ambulancia_edit->k_inical->caption(), $servicio_ambulancia_edit->k_inical->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($servicio_ambulancia_edit->tipo_serviciosistema->Required) { ?>
				elm = this.getElements("x" + infix + "_tipo_serviciosistema");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_ambulancia_edit->tipo_serviciosistema->caption(), $servicio_ambulancia_edit->tipo_serviciosistema->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($servicio_ambulancia_edit->preposicion->Required) { ?>
				elm = this.getElements("x" + infix + "_preposicion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_ambulancia_edit->preposicion->caption(), $servicio_ambulancia_edit->preposicion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($servicio_ambulancia_edit->conductor->Required) { ?>
				elm = this.getElements("x" + infix + "_conductor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_ambulancia_edit->conductor->caption(), $servicio_ambulancia_edit->conductor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($servicio_ambulancia_edit->medico->Required) { ?>
				elm = this.getElements("x" + infix + "_medico");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_ambulancia_edit->medico->caption(), $servicio_ambulancia_edit->medico->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($servicio_ambulancia_edit->paramedico->Required) { ?>
				elm = this.getElements("x" + infix + "_paramedico");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $servicio_ambulancia_edit->paramedico->caption(), $servicio_ambulancia_edit->paramedico->RequiredErrorMessage)) ?>");
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
	fservicio_ambulanciaedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fservicio_ambulanciaedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fservicio_ambulanciaedit.lists["x_traslado_fallido"] = <?php echo $servicio_ambulancia_edit->traslado_fallido->Lookup->toClientList($servicio_ambulancia_edit) ?>;
	fservicio_ambulanciaedit.lists["x_traslado_fallido"].options = <?php echo JsonEncode($servicio_ambulancia_edit->traslado_fallido->lookupOptions()) ?>;
	loadjs.done("fservicio_ambulanciaedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	$(document).ready(function(){$("#btn-cancel").hide()});
});
</script>
<?php $servicio_ambulancia_edit->showPageHeader(); ?>
<?php
$servicio_ambulancia_edit->showMessage();
?>
<form name="fservicio_ambulanciaedit" id="fservicio_ambulanciaedit" class="<?php echo $servicio_ambulancia_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="servicio_ambulancia">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$servicio_ambulancia_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($servicio_ambulancia_edit->hora_asigna->Visible) { // hora_asigna ?>
	<div id="r_hora_asigna" class="form-group row">
		<label id="elh_servicio_ambulancia_hora_asigna" for="x_hora_asigna" class="<?php echo $servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_servicio_ambulancia_hora_asigna" type="text/html"><?php echo $servicio_ambulancia_edit->hora_asigna->caption() ?><?php echo $servicio_ambulancia_edit->hora_asigna->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $servicio_ambulancia_edit->hora_asigna->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_hora_asigna" type="text/html"><span id="el_servicio_ambulancia_hora_asigna">
<input type="text" data-table="servicio_ambulancia" data-field="x_hora_asigna" data-format="11" name="x_hora_asigna" id="x_hora_asigna" maxlength="5" placeholder="<?php echo HtmlEncode($servicio_ambulancia_edit->hora_asigna->getPlaceHolder()) ?>" value="<?php echo $servicio_ambulancia_edit->hora_asigna->EditValue ?>"<?php echo $servicio_ambulancia_edit->hora_asigna->editAttributes() ?>>
<?php if (!$servicio_ambulancia_edit->hora_asigna->ReadOnly && !$servicio_ambulancia_edit->hora_asigna->Disabled && !isset($servicio_ambulancia_edit->hora_asigna->EditAttrs["readonly"]) && !isset($servicio_ambulancia_edit->hora_asigna->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="servicio_ambulanciaedit_js">
loadjs.ready(["fservicio_ambulanciaedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fservicio_ambulanciaedit", "x_hora_asigna", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $servicio_ambulancia_edit->hora_asigna->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($servicio_ambulancia_edit->hora_llegada->Visible) { // hora_llegada ?>
	<div id="r_hora_llegada" class="form-group row">
		<label id="elh_servicio_ambulancia_hora_llegada" for="x_hora_llegada" class="<?php echo $servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_servicio_ambulancia_hora_llegada" type="text/html"><?php echo $servicio_ambulancia_edit->hora_llegada->caption() ?><?php echo $servicio_ambulancia_edit->hora_llegada->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $servicio_ambulancia_edit->hora_llegada->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_hora_llegada" type="text/html"><span id="el_servicio_ambulancia_hora_llegada">
<input type="text" data-table="servicio_ambulancia" data-field="x_hora_llegada" data-format="11" name="x_hora_llegada" id="x_hora_llegada" maxlength="5" placeholder="<?php echo HtmlEncode($servicio_ambulancia_edit->hora_llegada->getPlaceHolder()) ?>" value="<?php echo $servicio_ambulancia_edit->hora_llegada->EditValue ?>"<?php echo $servicio_ambulancia_edit->hora_llegada->editAttributes() ?>>
<?php if (!$servicio_ambulancia_edit->hora_llegada->ReadOnly && !$servicio_ambulancia_edit->hora_llegada->Disabled && !isset($servicio_ambulancia_edit->hora_llegada->EditAttrs["readonly"]) && !isset($servicio_ambulancia_edit->hora_llegada->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="servicio_ambulanciaedit_js">
loadjs.ready(["fservicio_ambulanciaedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fservicio_ambulanciaedit", "x_hora_llegada", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $servicio_ambulancia_edit->hora_llegada->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($servicio_ambulancia_edit->hora_inicio->Visible) { // hora_inicio ?>
	<div id="r_hora_inicio" class="form-group row">
		<label id="elh_servicio_ambulancia_hora_inicio" for="x_hora_inicio" class="<?php echo $servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_servicio_ambulancia_hora_inicio" type="text/html"><?php echo $servicio_ambulancia_edit->hora_inicio->caption() ?><?php echo $servicio_ambulancia_edit->hora_inicio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $servicio_ambulancia_edit->hora_inicio->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_hora_inicio" type="text/html"><span id="el_servicio_ambulancia_hora_inicio">
<input type="text" data-table="servicio_ambulancia" data-field="x_hora_inicio" data-format="11" name="x_hora_inicio" id="x_hora_inicio" maxlength="5" placeholder="<?php echo HtmlEncode($servicio_ambulancia_edit->hora_inicio->getPlaceHolder()) ?>" value="<?php echo $servicio_ambulancia_edit->hora_inicio->EditValue ?>"<?php echo $servicio_ambulancia_edit->hora_inicio->editAttributes() ?>>
<?php if (!$servicio_ambulancia_edit->hora_inicio->ReadOnly && !$servicio_ambulancia_edit->hora_inicio->Disabled && !isset($servicio_ambulancia_edit->hora_inicio->EditAttrs["readonly"]) && !isset($servicio_ambulancia_edit->hora_inicio->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="servicio_ambulanciaedit_js">
loadjs.ready(["fservicio_ambulanciaedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fservicio_ambulanciaedit", "x_hora_inicio", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $servicio_ambulancia_edit->hora_inicio->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($servicio_ambulancia_edit->hora_destino->Visible) { // hora_destino ?>
	<div id="r_hora_destino" class="form-group row">
		<label id="elh_servicio_ambulancia_hora_destino" for="x_hora_destino" class="<?php echo $servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_servicio_ambulancia_hora_destino" type="text/html"><?php echo $servicio_ambulancia_edit->hora_destino->caption() ?><?php echo $servicio_ambulancia_edit->hora_destino->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $servicio_ambulancia_edit->hora_destino->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_hora_destino" type="text/html"><span id="el_servicio_ambulancia_hora_destino">
<input type="text" data-table="servicio_ambulancia" data-field="x_hora_destino" data-format="11" name="x_hora_destino" id="x_hora_destino" maxlength="5" placeholder="<?php echo HtmlEncode($servicio_ambulancia_edit->hora_destino->getPlaceHolder()) ?>" value="<?php echo $servicio_ambulancia_edit->hora_destino->EditValue ?>"<?php echo $servicio_ambulancia_edit->hora_destino->editAttributes() ?>>
<?php if (!$servicio_ambulancia_edit->hora_destino->ReadOnly && !$servicio_ambulancia_edit->hora_destino->Disabled && !isset($servicio_ambulancia_edit->hora_destino->EditAttrs["readonly"]) && !isset($servicio_ambulancia_edit->hora_destino->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="servicio_ambulanciaedit_js">
loadjs.ready(["fservicio_ambulanciaedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fservicio_ambulanciaedit", "x_hora_destino", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $servicio_ambulancia_edit->hora_destino->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($servicio_ambulancia_edit->hora_preposicion->Visible) { // hora_preposicion ?>
	<div id="r_hora_preposicion" class="form-group row">
		<label id="elh_servicio_ambulancia_hora_preposicion" for="x_hora_preposicion" class="<?php echo $servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_servicio_ambulancia_hora_preposicion" type="text/html"><?php echo $servicio_ambulancia_edit->hora_preposicion->caption() ?><?php echo $servicio_ambulancia_edit->hora_preposicion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $servicio_ambulancia_edit->hora_preposicion->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_hora_preposicion" type="text/html"><span id="el_servicio_ambulancia_hora_preposicion">
<input type="text" data-table="servicio_ambulancia" data-field="x_hora_preposicion" data-format="11" name="x_hora_preposicion" id="x_hora_preposicion" maxlength="5" placeholder="<?php echo HtmlEncode($servicio_ambulancia_edit->hora_preposicion->getPlaceHolder()) ?>" value="<?php echo $servicio_ambulancia_edit->hora_preposicion->EditValue ?>"<?php echo $servicio_ambulancia_edit->hora_preposicion->editAttributes() ?>>
<?php if (!$servicio_ambulancia_edit->hora_preposicion->ReadOnly && !$servicio_ambulancia_edit->hora_preposicion->Disabled && !isset($servicio_ambulancia_edit->hora_preposicion->EditAttrs["readonly"]) && !isset($servicio_ambulancia_edit->hora_preposicion->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="servicio_ambulanciaedit_js">
loadjs.ready(["fservicio_ambulanciaedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fservicio_ambulanciaedit", "x_hora_preposicion", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $servicio_ambulancia_edit->hora_preposicion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($servicio_ambulancia_edit->observaciones->Visible) { // observaciones ?>
	<div id="r_observaciones" class="form-group row">
		<label id="elh_servicio_ambulancia_observaciones" for="x_observaciones" class="<?php echo $servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_servicio_ambulancia_observaciones" type="text/html"><?php echo $servicio_ambulancia_edit->observaciones->caption() ?><?php echo $servicio_ambulancia_edit->observaciones->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $servicio_ambulancia_edit->observaciones->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_observaciones" type="text/html"><span id="el_servicio_ambulancia_observaciones">
<textarea data-table="servicio_ambulancia" data-field="x_observaciones" name="x_observaciones" id="x_observaciones" cols="2" rows="2" placeholder="<?php echo HtmlEncode($servicio_ambulancia_edit->observaciones->getPlaceHolder()) ?>"<?php echo $servicio_ambulancia_edit->observaciones->editAttributes() ?>><?php echo $servicio_ambulancia_edit->observaciones->EditValue ?></textarea>
</span></script>
<?php echo $servicio_ambulancia_edit->observaciones->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($servicio_ambulancia_edit->tipo_traslado->Visible) { // tipo_traslado ?>
	<div id="r_tipo_traslado" class="form-group row">
		<label id="elh_servicio_ambulancia_tipo_traslado" for="x_tipo_traslado" class="<?php echo $servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_servicio_ambulancia_tipo_traslado" type="text/html"><?php echo $servicio_ambulancia_edit->tipo_traslado->caption() ?><?php echo $servicio_ambulancia_edit->tipo_traslado->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $servicio_ambulancia_edit->tipo_traslado->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_tipo_traslado" type="text/html"><span id="el_servicio_ambulancia_tipo_traslado">
<input type="text" data-table="servicio_ambulancia" data-field="x_tipo_traslado" name="x_tipo_traslado" id="x_tipo_traslado" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($servicio_ambulancia_edit->tipo_traslado->getPlaceHolder()) ?>" value="<?php echo $servicio_ambulancia_edit->tipo_traslado->EditValue ?>"<?php echo $servicio_ambulancia_edit->tipo_traslado->editAttributes() ?>>
</span></script>
<?php echo $servicio_ambulancia_edit->tipo_traslado->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($servicio_ambulancia_edit->traslado_fallido->Visible) { // traslado_fallido ?>
	<div id="r_traslado_fallido" class="form-group row">
		<label id="elh_servicio_ambulancia_traslado_fallido" for="x_traslado_fallido" class="<?php echo $servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_servicio_ambulancia_traslado_fallido" type="text/html"><?php echo $servicio_ambulancia_edit->traslado_fallido->caption() ?><?php echo $servicio_ambulancia_edit->traslado_fallido->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $servicio_ambulancia_edit->traslado_fallido->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_traslado_fallido" type="text/html"><span id="el_servicio_ambulancia_traslado_fallido">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="servicio_ambulancia" data-field="x_traslado_fallido" data-value-separator="<?php echo $servicio_ambulancia_edit->traslado_fallido->displayValueSeparatorAttribute() ?>" id="x_traslado_fallido" name="x_traslado_fallido"<?php echo $servicio_ambulancia_edit->traslado_fallido->editAttributes() ?>>
			<?php echo $servicio_ambulancia_edit->traslado_fallido->selectOptionListHtml("x_traslado_fallido") ?>
		</select>
</div>
<?php echo $servicio_ambulancia_edit->traslado_fallido->Lookup->getParamTag($servicio_ambulancia_edit, "p_x_traslado_fallido") ?>
</span></script>
<?php echo $servicio_ambulancia_edit->traslado_fallido->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($servicio_ambulancia_edit->estado_paciente->Visible) { // estado_paciente ?>
	<div id="r_estado_paciente" class="form-group row">
		<label id="elh_servicio_ambulancia_estado_paciente" for="x_estado_paciente" class="<?php echo $servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_servicio_ambulancia_estado_paciente" type="text/html"><?php echo $servicio_ambulancia_edit->estado_paciente->caption() ?><?php echo $servicio_ambulancia_edit->estado_paciente->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $servicio_ambulancia_edit->estado_paciente->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_estado_paciente" type="text/html"><span id="el_servicio_ambulancia_estado_paciente">
<input type="text" data-table="servicio_ambulancia" data-field="x_estado_paciente" name="x_estado_paciente" id="x_estado_paciente" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($servicio_ambulancia_edit->estado_paciente->getPlaceHolder()) ?>" value="<?php echo $servicio_ambulancia_edit->estado_paciente->EditValue ?>"<?php echo $servicio_ambulancia_edit->estado_paciente->editAttributes() ?>>
</span></script>
<?php echo $servicio_ambulancia_edit->estado_paciente->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($servicio_ambulancia_edit->k_final->Visible) { // k_final ?>
	<div id="r_k_final" class="form-group row">
		<label id="elh_servicio_ambulancia_k_final" for="x_k_final" class="<?php echo $servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_servicio_ambulancia_k_final" type="text/html"><?php echo $servicio_ambulancia_edit->k_final->caption() ?><?php echo $servicio_ambulancia_edit->k_final->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $servicio_ambulancia_edit->k_final->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_k_final" type="text/html"><span id="el_servicio_ambulancia_k_final">
<input type="text" data-table="servicio_ambulancia" data-field="x_k_final" name="x_k_final" id="x_k_final" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($servicio_ambulancia_edit->k_final->getPlaceHolder()) ?>" value="<?php echo $servicio_ambulancia_edit->k_final->EditValue ?>"<?php echo $servicio_ambulancia_edit->k_final->editAttributes() ?>>
</span></script>
<?php echo $servicio_ambulancia_edit->k_final->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($servicio_ambulancia_edit->k_inical->Visible) { // k_inical ?>
	<div id="r_k_inical" class="form-group row">
		<label id="elh_servicio_ambulancia_k_inical" for="x_k_inical" class="<?php echo $servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_servicio_ambulancia_k_inical" type="text/html"><?php echo $servicio_ambulancia_edit->k_inical->caption() ?><?php echo $servicio_ambulancia_edit->k_inical->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $servicio_ambulancia_edit->k_inical->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_k_inical" type="text/html"><span id="el_servicio_ambulancia_k_inical">
<input type="text" data-table="servicio_ambulancia" data-field="x_k_inical" name="x_k_inical" id="x_k_inical" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($servicio_ambulancia_edit->k_inical->getPlaceHolder()) ?>" value="<?php echo $servicio_ambulancia_edit->k_inical->EditValue ?>"<?php echo $servicio_ambulancia_edit->k_inical->editAttributes() ?>>
</span></script>
<?php echo $servicio_ambulancia_edit->k_inical->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($servicio_ambulancia_edit->tipo_serviciosistema->Visible) { // tipo_serviciosistema ?>
	<div id="r_tipo_serviciosistema" class="form-group row">
		<label id="elh_servicio_ambulancia_tipo_serviciosistema" for="x_tipo_serviciosistema" class="<?php echo $servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_servicio_ambulancia_tipo_serviciosistema" type="text/html"><?php echo $servicio_ambulancia_edit->tipo_serviciosistema->caption() ?><?php echo $servicio_ambulancia_edit->tipo_serviciosistema->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $servicio_ambulancia_edit->tipo_serviciosistema->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_tipo_serviciosistema" type="text/html"><span id="el_servicio_ambulancia_tipo_serviciosistema">
<input type="text" data-table="servicio_ambulancia" data-field="x_tipo_serviciosistema" name="x_tipo_serviciosistema" id="x_tipo_serviciosistema" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($servicio_ambulancia_edit->tipo_serviciosistema->getPlaceHolder()) ?>" value="<?php echo $servicio_ambulancia_edit->tipo_serviciosistema->EditValue ?>"<?php echo $servicio_ambulancia_edit->tipo_serviciosistema->editAttributes() ?>>
</span></script>
<?php echo $servicio_ambulancia_edit->tipo_serviciosistema->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($servicio_ambulancia_edit->preposicion->Visible) { // preposicion ?>
	<div id="r_preposicion" class="form-group row">
		<label id="elh_servicio_ambulancia_preposicion" for="x_preposicion" class="<?php echo $servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_servicio_ambulancia_preposicion" type="text/html"><?php echo $servicio_ambulancia_edit->preposicion->caption() ?><?php echo $servicio_ambulancia_edit->preposicion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $servicio_ambulancia_edit->preposicion->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_preposicion" type="text/html"><span id="el_servicio_ambulancia_preposicion">
<input type="text" data-table="servicio_ambulancia" data-field="x_preposicion" name="x_preposicion" id="x_preposicion" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($servicio_ambulancia_edit->preposicion->getPlaceHolder()) ?>" value="<?php echo $servicio_ambulancia_edit->preposicion->EditValue ?>"<?php echo $servicio_ambulancia_edit->preposicion->editAttributes() ?>>
</span></script>
<?php echo $servicio_ambulancia_edit->preposicion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($servicio_ambulancia_edit->conductor->Visible) { // conductor ?>
	<div id="r_conductor" class="form-group row">
		<label id="elh_servicio_ambulancia_conductor" for="x_conductor" class="<?php echo $servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_servicio_ambulancia_conductor" type="text/html"><?php echo $servicio_ambulancia_edit->conductor->caption() ?><?php echo $servicio_ambulancia_edit->conductor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $servicio_ambulancia_edit->conductor->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_conductor" type="text/html"><span id="el_servicio_ambulancia_conductor">
<input type="text" data-table="servicio_ambulancia" data-field="x_conductor" name="x_conductor" id="x_conductor" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($servicio_ambulancia_edit->conductor->getPlaceHolder()) ?>" value="<?php echo $servicio_ambulancia_edit->conductor->EditValue ?>"<?php echo $servicio_ambulancia_edit->conductor->editAttributes() ?>>
</span></script>
<?php echo $servicio_ambulancia_edit->conductor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($servicio_ambulancia_edit->medico->Visible) { // medico ?>
	<div id="r_medico" class="form-group row">
		<label id="elh_servicio_ambulancia_medico" for="x_medico" class="<?php echo $servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_servicio_ambulancia_medico" type="text/html"><?php echo $servicio_ambulancia_edit->medico->caption() ?><?php echo $servicio_ambulancia_edit->medico->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $servicio_ambulancia_edit->medico->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_medico" type="text/html"><span id="el_servicio_ambulancia_medico">
<input type="text" data-table="servicio_ambulancia" data-field="x_medico" name="x_medico" id="x_medico" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($servicio_ambulancia_edit->medico->getPlaceHolder()) ?>" value="<?php echo $servicio_ambulancia_edit->medico->EditValue ?>"<?php echo $servicio_ambulancia_edit->medico->editAttributes() ?>>
</span></script>
<?php echo $servicio_ambulancia_edit->medico->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($servicio_ambulancia_edit->paramedico->Visible) { // paramedico ?>
	<div id="r_paramedico" class="form-group row">
		<label id="elh_servicio_ambulancia_paramedico" for="x_paramedico" class="<?php echo $servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_servicio_ambulancia_paramedico" type="text/html"><?php echo $servicio_ambulancia_edit->paramedico->caption() ?><?php echo $servicio_ambulancia_edit->paramedico->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $servicio_ambulancia_edit->paramedico->cellAttributes() ?>>
<script id="tpx_servicio_ambulancia_paramedico" type="text/html"><span id="el_servicio_ambulancia_paramedico">
<input type="text" data-table="servicio_ambulancia" data-field="x_paramedico" name="x_paramedico" id="x_paramedico" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($servicio_ambulancia_edit->paramedico->getPlaceHolder()) ?>" value="<?php echo $servicio_ambulancia_edit->paramedico->EditValue ?>"<?php echo $servicio_ambulancia_edit->paramedico->editAttributes() ?>>
</span></script>
<?php echo $servicio_ambulancia_edit->paramedico->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<script id="tpx_servicio_ambulancia_cod_casointerh" type="text/html"><span id="el_servicio_ambulancia_cod_casointerh">
<input type="hidden" data-table="servicio_ambulancia" data-field="x_cod_casointerh" name="x_cod_casointerh" id="x_cod_casointerh" value="<?php echo HtmlEncode($servicio_ambulancia_edit->cod_casointerh->CurrentValue) ?>">
</span></script>
<script id="tpx_servicio_ambulancia_cod_ambulancia" type="text/html"><span id="el_servicio_ambulancia_cod_ambulancia">
<input type="hidden" data-table="servicio_ambulancia" data-field="x_cod_ambulancia" name="x_cod_ambulancia" id="x_cod_ambulancia" value="<?php echo HtmlEncode($servicio_ambulancia_edit->cod_ambulancia->CurrentValue) ?>">
</span></script>
<div id="tpd_servicio_ambulanciaedit" class="ew-custom-template"></div>
<script id="tpm_servicio_ambulanciaedit" type="text/html">
<div id="ct_servicio_ambulancia_edit">
</hr>
{{include tmpl=~getTemplate("#tpx_servicio_ambulancia_cod_casointerh")/}} <br>
{{include tmpl=~getTemplate("#tpx_servicio_ambulancia_cod_ambulancia")/}}
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $servicio_ambulancia_edit->hora_asigna->caption() ?></label></br>
	 <div class="input-group-append"> {{include tmpl=~getTemplate("#tpx_servicio_ambulancia_hora_asigna")/}}<button  onClick = 'fechaHoy(0)' class="btn btn-default" type="button"><i class="fas fa-stopwatch"></i></button></div>
	</div>
</div>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $servicio_ambulancia_edit->hora_llegada->caption() ?></label></br>
	 <div class="input-group-append"> {{include tmpl=~getTemplate("#tpx_servicio_ambulancia_hora_llegada")/}}<button  onClick = 'fechaHoy(1)' class="btn btn-default" type="button"><i class="fas fa-stopwatch"></i></button></div>
	</div>
</div>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $servicio_ambulancia_edit->hora_inicio->caption() ?></label></br>
	 <div class="input-group-append"> {{include tmpl=~getTemplate("#tpx_servicio_ambulancia_hora_inicio")/}}<button  onClick = 'fechaHoy(2)' class="btn btn-default" type="button"><i class="fas fa-stopwatch"></i></button></div>
	</div>
</div>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $servicio_ambulancia_edit->hora_destino->caption() ?></label></br>
	  <div class="input-group-append"> {{include tmpl=~getTemplate("#tpx_servicio_ambulancia_hora_destino")/}}<button  onClick = 'fechaHoy(3)' class="btn btn-default" type="button"><i class="fas fa-stopwatch"></i></button></div>
	</div>
</div>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $servicio_ambulancia_edit->hora_preposicion->caption() ?></label></br>
<div class="input-group-append"> {{include tmpl=~getTemplate("#tpx_servicio_ambulancia_hora_preposicion")/}}<button  onClick = 'fechaHoy(4)' class="btn btn-default" type="button"><i class="fas fa-stopwatch"></i></button></div>
	  </div>
 </div>
 Tripulación Ambulancias </br>
 </hr>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $servicio_ambulancia_edit->conductor->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_servicio_ambulancia_conductor")/}}
	</div>
	<div class="form-group col-xs-2">
	  <label><?php echo $servicio_ambulancia_edit->medico->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_servicio_ambulancia_medico")/}}
	</div>
	<div class="form-group col-xs-2">
	  <label><?php echo $servicio_ambulancia_edit->paramedico->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_servicio_ambulancia_paramedico")/}}
	</div>
  </div>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $servicio_ambulancia_edit->traslado_fallido->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_servicio_ambulancia_traslado_fallido")/}}
	</div>
</div>
	  <div class="form-group">
	 	<label><?php echo $servicio_ambulancia_edit->observaciones->caption() ?></label></br>
	 	  {{include tmpl=~getTemplate("#tpx_servicio_ambulancia_observaciones")/}}
	  </div>
</div>
</script>
<script type="text/html" class="servicio_ambulanciaedit_js">


		function fechaHoy(boton){
			var fecha = new Date(); 
			var mes = fecha.getMonth()+1; 
			var dia = fecha.getDate(); 
			var ano = fecha.getFullYear(); 
			var hora = fecha.getHours();    
			var min = fecha.getMinutes();  
			var seg = fecha.getSeconds();
			if(dia<10)
				dia='0'+dia; //agrega cero si el menor de 10
			if(mes<10)
				mes='0'+mes //agrega cero si el menor de 10
			if(hora<10)
				hora='0'+hora; //agrega cero si el menor de 10
			if(min<10)
				min='0'+min
			if(seg<10)
				seg='0'+seg
			fecha = dia+"/"+mes+"/"+ano+" "+hora+":"+min+":"+seg;
			if (boton == 0) 
				document.getElementById('x_hora_asigna').value= fecha
			else if (boton == 1)
				document.getElementById('x_hora_llegada').value= fecha
			else if (boton == 2)
				document.getElementById('x_hora_inicio').value= fecha
			else if (boton == 3)
				document.getElementById('x_hora_destino').value= fecha
			else if (boton == 4)
				document.getElementById('x_hora_preposicion').value= fecha
			return fecha;
		}   

</script>

<?php if (!$servicio_ambulancia_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $servicio_ambulancia_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $servicio_ambulancia_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($servicio_ambulancia->Rows) ?> };
	ew.applyTemplate("tpd_servicio_ambulanciaedit", "tpm_servicio_ambulanciaedit", "servicio_ambulanciaedit", "<?php echo $servicio_ambulancia->CustomExport ?>", ew.templateData.rows[0]);
	$("script.servicio_ambulanciaedit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$servicio_ambulancia_edit->showPageFooter();
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
$servicio_ambulancia_edit->terminate();
?>