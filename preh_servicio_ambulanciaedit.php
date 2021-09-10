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
$preh_servicio_ambulancia_edit = new preh_servicio_ambulancia_edit();

// Run the page
$preh_servicio_ambulancia_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_servicio_ambulancia_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpreh_servicio_ambulanciaedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpreh_servicio_ambulanciaedit = currentForm = new ew.Form("fpreh_servicio_ambulanciaedit", "edit");

	// Validate form
	fpreh_servicio_ambulanciaedit.validate = function() {
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
			<?php if ($preh_servicio_ambulancia_edit->id_servcioambulacia->Required) { ?>
				elm = this.getElements("x" + infix + "_id_servcioambulacia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->id_servcioambulacia->caption(), $preh_servicio_ambulancia_edit->id_servcioambulacia->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_id_servcioambulacia");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($preh_servicio_ambulancia_edit->id_servcioambulacia->errorMessage()) ?>");
			<?php if ($preh_servicio_ambulancia_edit->cod_casopreh->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->cod_casopreh->caption(), $preh_servicio_ambulancia_edit->cod_casopreh->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_servicio_ambulancia_edit->hora_confirma->Required) { ?>
				elm = this.getElements("x" + infix + "_hora_confirma");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->hora_confirma->caption(), $preh_servicio_ambulancia_edit->hora_confirma->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_hora_confirma");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($preh_servicio_ambulancia_edit->hora_confirma->errorMessage()) ?>");
			<?php if ($preh_servicio_ambulancia_edit->hora_asigna->Required) { ?>
				elm = this.getElements("x" + infix + "_hora_asigna");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->hora_asigna->caption(), $preh_servicio_ambulancia_edit->hora_asigna->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_servicio_ambulancia_edit->hora_llegada->Required) { ?>
				elm = this.getElements("x" + infix + "_hora_llegada");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->hora_llegada->caption(), $preh_servicio_ambulancia_edit->hora_llegada->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_servicio_ambulancia_edit->hora_inicio->Required) { ?>
				elm = this.getElements("x" + infix + "_hora_inicio");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->hora_inicio->caption(), $preh_servicio_ambulancia_edit->hora_inicio->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_servicio_ambulancia_edit->hora_destino->Required) { ?>
				elm = this.getElements("x" + infix + "_hora_destino");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->hora_destino->caption(), $preh_servicio_ambulancia_edit->hora_destino->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_servicio_ambulancia_edit->hora_preposicion->Required) { ?>
				elm = this.getElements("x" + infix + "_hora_preposicion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->hora_preposicion->caption(), $preh_servicio_ambulancia_edit->hora_preposicion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_servicio_ambulancia_edit->observaciones->Required) { ?>
				elm = this.getElements("x" + infix + "_observaciones");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->observaciones->caption(), $preh_servicio_ambulancia_edit->observaciones->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_servicio_ambulancia_edit->tipo_traslado->Required) { ?>
				elm = this.getElements("x" + infix + "_tipo_traslado");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->tipo_traslado->caption(), $preh_servicio_ambulancia_edit->tipo_traslado->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_servicio_ambulancia_edit->traslado_fallido->Required) { ?>
				elm = this.getElements("x" + infix + "_traslado_fallido");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->traslado_fallido->caption(), $preh_servicio_ambulancia_edit->traslado_fallido->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_servicio_ambulancia_edit->estado_paciente->Required) { ?>
				elm = this.getElements("x" + infix + "_estado_paciente");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->estado_paciente->caption(), $preh_servicio_ambulancia_edit->estado_paciente->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_servicio_ambulancia_edit->k_final->Required) { ?>
				elm = this.getElements("x" + infix + "_k_final");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->k_final->caption(), $preh_servicio_ambulancia_edit->k_final->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_servicio_ambulancia_edit->k_inical->Required) { ?>
				elm = this.getElements("x" + infix + "_k_inical");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->k_inical->caption(), $preh_servicio_ambulancia_edit->k_inical->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_servicio_ambulancia_edit->tipo_serviciosistema->Required) { ?>
				elm = this.getElements("x" + infix + "_tipo_serviciosistema");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->tipo_serviciosistema->caption(), $preh_servicio_ambulancia_edit->tipo_serviciosistema->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_servicio_ambulancia_edit->preposicion->Required) { ?>
				elm = this.getElements("x" + infix + "_preposicion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->preposicion->caption(), $preh_servicio_ambulancia_edit->preposicion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_servicio_ambulancia_edit->conductor->Required) { ?>
				elm = this.getElements("x" + infix + "_conductor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->conductor->caption(), $preh_servicio_ambulancia_edit->conductor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_servicio_ambulancia_edit->medico->Required) { ?>
				elm = this.getElements("x" + infix + "_medico");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->medico->caption(), $preh_servicio_ambulancia_edit->medico->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_servicio_ambulancia_edit->paramedico->Required) { ?>
				elm = this.getElements("x" + infix + "_paramedico");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->paramedico->caption(), $preh_servicio_ambulancia_edit->paramedico->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_servicio_ambulancia_edit->dx_aph->Required) { ?>
				elm = this.getElements("x" + infix + "_dx_aph[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->dx_aph->caption(), $preh_servicio_ambulancia_edit->dx_aph->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_servicio_ambulancia_edit->dx_soat->Required) { ?>
				elm = this.getElements("x" + infix + "_dx_soat[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->dx_soat->caption(), $preh_servicio_ambulancia_edit->dx_soat->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_servicio_ambulancia_edit->estado_pacientefinal->Required) { ?>
				elm = this.getElements("x" + infix + "_estado_pacientefinal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->estado_pacientefinal->caption(), $preh_servicio_ambulancia_edit->estado_pacientefinal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_servicio_ambulancia_edit->cuando_murio->Required) { ?>
				elm = this.getElements("x" + infix + "_cuando_murio");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->cuando_murio->caption(), $preh_servicio_ambulancia_edit->cuando_murio->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cuando_murio");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($preh_servicio_ambulancia_edit->cuando_murio->errorMessage()) ?>");
			<?php if ($preh_servicio_ambulancia_edit->accidente_vehiculo->Required) { ?>
				elm = this.getElements("x" + infix + "_accidente_vehiculo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->accidente_vehiculo->caption(), $preh_servicio_ambulancia_edit->accidente_vehiculo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_servicio_ambulancia_edit->atropellado->Required) { ?>
				elm = this.getElements("x" + infix + "_atropellado[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_servicio_ambulancia_edit->atropellado->caption(), $preh_servicio_ambulancia_edit->atropellado->RequiredErrorMessage)) ?>");
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
	fpreh_servicio_ambulanciaedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpreh_servicio_ambulanciaedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpreh_servicio_ambulanciaedit.lists["x_traslado_fallido"] = <?php echo $preh_servicio_ambulancia_edit->traslado_fallido->Lookup->toClientList($preh_servicio_ambulancia_edit) ?>;
	fpreh_servicio_ambulanciaedit.lists["x_traslado_fallido"].options = <?php echo JsonEncode($preh_servicio_ambulancia_edit->traslado_fallido->lookupOptions()) ?>;
	fpreh_servicio_ambulanciaedit.lists["x_dx_aph[]"] = <?php echo $preh_servicio_ambulancia_edit->dx_aph->Lookup->toClientList($preh_servicio_ambulancia_edit) ?>;
	fpreh_servicio_ambulanciaedit.lists["x_dx_aph[]"].options = <?php echo JsonEncode($preh_servicio_ambulancia_edit->dx_aph->lookupOptions()) ?>;
	fpreh_servicio_ambulanciaedit.lists["x_dx_soat[]"] = <?php echo $preh_servicio_ambulancia_edit->dx_soat->Lookup->toClientList($preh_servicio_ambulancia_edit) ?>;
	fpreh_servicio_ambulanciaedit.lists["x_dx_soat[]"].options = <?php echo JsonEncode($preh_servicio_ambulancia_edit->dx_soat->lookupOptions()) ?>;
	fpreh_servicio_ambulanciaedit.lists["x_estado_pacientefinal"] = <?php echo $preh_servicio_ambulancia_edit->estado_pacientefinal->Lookup->toClientList($preh_servicio_ambulancia_edit) ?>;
	fpreh_servicio_ambulanciaedit.lists["x_estado_pacientefinal"].options = <?php echo JsonEncode($preh_servicio_ambulancia_edit->estado_pacientefinal->options(FALSE, TRUE)) ?>;
	fpreh_servicio_ambulanciaedit.lists["x_accidente_vehiculo"] = <?php echo $preh_servicio_ambulancia_edit->accidente_vehiculo->Lookup->toClientList($preh_servicio_ambulancia_edit) ?>;
	fpreh_servicio_ambulanciaedit.lists["x_accidente_vehiculo"].options = <?php echo JsonEncode($preh_servicio_ambulancia_edit->accidente_vehiculo->options(FALSE, TRUE)) ?>;
	fpreh_servicio_ambulanciaedit.lists["x_atropellado[]"] = <?php echo $preh_servicio_ambulancia_edit->atropellado->Lookup->toClientList($preh_servicio_ambulancia_edit) ?>;
	fpreh_servicio_ambulanciaedit.lists["x_atropellado[]"].options = <?php echo JsonEncode($preh_servicio_ambulancia_edit->atropellado->options(FALSE, TRUE)) ?>;
	loadjs.done("fpreh_servicio_ambulanciaedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $preh_servicio_ambulancia_edit->showPageHeader(); ?>
<?php
$preh_servicio_ambulancia_edit->showMessage();
?>
<form name="fpreh_servicio_ambulanciaedit" id="fpreh_servicio_ambulanciaedit" class="<?php echo $preh_servicio_ambulancia_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_servicio_ambulancia">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$preh_servicio_ambulancia_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($preh_servicio_ambulancia_edit->id_servcioambulacia->Visible) { // id_servcioambulacia ?>
	<div id="r_id_servcioambulacia" class="form-group row">
		<label id="elh_preh_servicio_ambulancia_id_servcioambulacia" for="x_id_servcioambulacia" class="<?php echo $preh_servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_preh_servicio_ambulancia_id_servcioambulacia" type="text/html"><?php echo $preh_servicio_ambulancia_edit->id_servcioambulacia->caption() ?><?php echo $preh_servicio_ambulancia_edit->id_servcioambulacia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $preh_servicio_ambulancia_edit->id_servcioambulacia->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_id_servcioambulacia" type="text/html"><span id="el_preh_servicio_ambulancia_id_servcioambulacia">
<input type="text" data-table="preh_servicio_ambulancia" data-field="x_id_servcioambulacia" name="x_id_servcioambulacia" id="x_id_servcioambulacia" maxlength="4" placeholder="<?php echo HtmlEncode($preh_servicio_ambulancia_edit->id_servcioambulacia->getPlaceHolder()) ?>" value="<?php echo $preh_servicio_ambulancia_edit->id_servcioambulacia->EditValue ?>"<?php echo $preh_servicio_ambulancia_edit->id_servcioambulacia->editAttributes() ?>>
</span></script>
<?php echo $preh_servicio_ambulancia_edit->id_servcioambulacia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_servicio_ambulancia_edit->cod_casopreh->Visible) { // cod_casopreh ?>
	<div id="r_cod_casopreh" class="form-group row">
		<label id="elh_preh_servicio_ambulancia_cod_casopreh" for="x_cod_casopreh" class="<?php echo $preh_servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_preh_servicio_ambulancia_cod_casopreh" type="text/html"><?php echo $preh_servicio_ambulancia_edit->cod_casopreh->caption() ?><?php echo $preh_servicio_ambulancia_edit->cod_casopreh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $preh_servicio_ambulancia_edit->cod_casopreh->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_cod_casopreh" type="text/html"><span id="el_preh_servicio_ambulancia_cod_casopreh">
<span<?php echo $preh_servicio_ambulancia_edit->cod_casopreh->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($preh_servicio_ambulancia_edit->cod_casopreh->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="preh_servicio_ambulancia" data-field="x_cod_casopreh" name="x_cod_casopreh" id="x_cod_casopreh" value="<?php echo HtmlEncode($preh_servicio_ambulancia_edit->cod_casopreh->CurrentValue) ?>">
<?php echo $preh_servicio_ambulancia_edit->cod_casopreh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_servicio_ambulancia_edit->hora_confirma->Visible) { // hora_confirma ?>
	<div id="r_hora_confirma" class="form-group row">
		<label id="elh_preh_servicio_ambulancia_hora_confirma" for="x_hora_confirma" class="<?php echo $preh_servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_preh_servicio_ambulancia_hora_confirma" type="text/html"><?php echo $preh_servicio_ambulancia_edit->hora_confirma->caption() ?><?php echo $preh_servicio_ambulancia_edit->hora_confirma->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $preh_servicio_ambulancia_edit->hora_confirma->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_hora_confirma" type="text/html"><span id="el_preh_servicio_ambulancia_hora_confirma">
<input type="text" data-table="preh_servicio_ambulancia" data-field="x_hora_confirma" name="x_hora_confirma" id="x_hora_confirma" maxlength="8" placeholder="<?php echo HtmlEncode($preh_servicio_ambulancia_edit->hora_confirma->getPlaceHolder()) ?>" value="<?php echo $preh_servicio_ambulancia_edit->hora_confirma->EditValue ?>"<?php echo $preh_servicio_ambulancia_edit->hora_confirma->editAttributes() ?>>
<?php if (!$preh_servicio_ambulancia_edit->hora_confirma->ReadOnly && !$preh_servicio_ambulancia_edit->hora_confirma->Disabled && !isset($preh_servicio_ambulancia_edit->hora_confirma->EditAttrs["readonly"]) && !isset($preh_servicio_ambulancia_edit->hora_confirma->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="preh_servicio_ambulanciaedit_js">
loadjs.ready(["fpreh_servicio_ambulanciaedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpreh_servicio_ambulanciaedit", "x_hora_confirma", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $preh_servicio_ambulancia_edit->hora_confirma->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_servicio_ambulancia_edit->hora_asigna->Visible) { // hora_asigna ?>
	<div id="r_hora_asigna" class="form-group row">
		<label id="elh_preh_servicio_ambulancia_hora_asigna" for="x_hora_asigna" class="<?php echo $preh_servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_preh_servicio_ambulancia_hora_asigna" type="text/html"><?php echo $preh_servicio_ambulancia_edit->hora_asigna->caption() ?><?php echo $preh_servicio_ambulancia_edit->hora_asigna->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $preh_servicio_ambulancia_edit->hora_asigna->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_hora_asigna" type="text/html"><span id="el_preh_servicio_ambulancia_hora_asigna">
<input type="text" data-table="preh_servicio_ambulancia" data-field="x_hora_asigna" name="x_hora_asigna" id="x_hora_asigna" maxlength="8" placeholder="<?php echo HtmlEncode($preh_servicio_ambulancia_edit->hora_asigna->getPlaceHolder()) ?>" value="<?php echo $preh_servicio_ambulancia_edit->hora_asigna->EditValue ?>"<?php echo $preh_servicio_ambulancia_edit->hora_asigna->editAttributes() ?>>
<?php if (!$preh_servicio_ambulancia_edit->hora_asigna->ReadOnly && !$preh_servicio_ambulancia_edit->hora_asigna->Disabled && !isset($preh_servicio_ambulancia_edit->hora_asigna->EditAttrs["readonly"]) && !isset($preh_servicio_ambulancia_edit->hora_asigna->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="preh_servicio_ambulanciaedit_js">
loadjs.ready(["fpreh_servicio_ambulanciaedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpreh_servicio_ambulanciaedit", "x_hora_asigna", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $preh_servicio_ambulancia_edit->hora_asigna->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_servicio_ambulancia_edit->hora_llegada->Visible) { // hora_llegada ?>
	<div id="r_hora_llegada" class="form-group row">
		<label id="elh_preh_servicio_ambulancia_hora_llegada" for="x_hora_llegada" class="<?php echo $preh_servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_preh_servicio_ambulancia_hora_llegada" type="text/html"><?php echo $preh_servicio_ambulancia_edit->hora_llegada->caption() ?><?php echo $preh_servicio_ambulancia_edit->hora_llegada->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $preh_servicio_ambulancia_edit->hora_llegada->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_hora_llegada" type="text/html"><span id="el_preh_servicio_ambulancia_hora_llegada">
<input type="text" data-table="preh_servicio_ambulancia" data-field="x_hora_llegada" name="x_hora_llegada" id="x_hora_llegada" maxlength="8" placeholder="<?php echo HtmlEncode($preh_servicio_ambulancia_edit->hora_llegada->getPlaceHolder()) ?>" value="<?php echo $preh_servicio_ambulancia_edit->hora_llegada->EditValue ?>"<?php echo $preh_servicio_ambulancia_edit->hora_llegada->editAttributes() ?>>
<?php if (!$preh_servicio_ambulancia_edit->hora_llegada->ReadOnly && !$preh_servicio_ambulancia_edit->hora_llegada->Disabled && !isset($preh_servicio_ambulancia_edit->hora_llegada->EditAttrs["readonly"]) && !isset($preh_servicio_ambulancia_edit->hora_llegada->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="preh_servicio_ambulanciaedit_js">
loadjs.ready(["fpreh_servicio_ambulanciaedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpreh_servicio_ambulanciaedit", "x_hora_llegada", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $preh_servicio_ambulancia_edit->hora_llegada->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_servicio_ambulancia_edit->hora_inicio->Visible) { // hora_inicio ?>
	<div id="r_hora_inicio" class="form-group row">
		<label id="elh_preh_servicio_ambulancia_hora_inicio" for="x_hora_inicio" class="<?php echo $preh_servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_preh_servicio_ambulancia_hora_inicio" type="text/html"><?php echo $preh_servicio_ambulancia_edit->hora_inicio->caption() ?><?php echo $preh_servicio_ambulancia_edit->hora_inicio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $preh_servicio_ambulancia_edit->hora_inicio->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_hora_inicio" type="text/html"><span id="el_preh_servicio_ambulancia_hora_inicio">
<input type="text" data-table="preh_servicio_ambulancia" data-field="x_hora_inicio" name="x_hora_inicio" id="x_hora_inicio" maxlength="8" placeholder="<?php echo HtmlEncode($preh_servicio_ambulancia_edit->hora_inicio->getPlaceHolder()) ?>" value="<?php echo $preh_servicio_ambulancia_edit->hora_inicio->EditValue ?>"<?php echo $preh_servicio_ambulancia_edit->hora_inicio->editAttributes() ?>>
<?php if (!$preh_servicio_ambulancia_edit->hora_inicio->ReadOnly && !$preh_servicio_ambulancia_edit->hora_inicio->Disabled && !isset($preh_servicio_ambulancia_edit->hora_inicio->EditAttrs["readonly"]) && !isset($preh_servicio_ambulancia_edit->hora_inicio->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="preh_servicio_ambulanciaedit_js">
loadjs.ready(["fpreh_servicio_ambulanciaedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpreh_servicio_ambulanciaedit", "x_hora_inicio", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $preh_servicio_ambulancia_edit->hora_inicio->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_servicio_ambulancia_edit->hora_destino->Visible) { // hora_destino ?>
	<div id="r_hora_destino" class="form-group row">
		<label id="elh_preh_servicio_ambulancia_hora_destino" for="x_hora_destino" class="<?php echo $preh_servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_preh_servicio_ambulancia_hora_destino" type="text/html"><?php echo $preh_servicio_ambulancia_edit->hora_destino->caption() ?><?php echo $preh_servicio_ambulancia_edit->hora_destino->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $preh_servicio_ambulancia_edit->hora_destino->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_hora_destino" type="text/html"><span id="el_preh_servicio_ambulancia_hora_destino">
<input type="text" data-table="preh_servicio_ambulancia" data-field="x_hora_destino" name="x_hora_destino" id="x_hora_destino" maxlength="8" placeholder="<?php echo HtmlEncode($preh_servicio_ambulancia_edit->hora_destino->getPlaceHolder()) ?>" value="<?php echo $preh_servicio_ambulancia_edit->hora_destino->EditValue ?>"<?php echo $preh_servicio_ambulancia_edit->hora_destino->editAttributes() ?>>
<?php if (!$preh_servicio_ambulancia_edit->hora_destino->ReadOnly && !$preh_servicio_ambulancia_edit->hora_destino->Disabled && !isset($preh_servicio_ambulancia_edit->hora_destino->EditAttrs["readonly"]) && !isset($preh_servicio_ambulancia_edit->hora_destino->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="preh_servicio_ambulanciaedit_js">
loadjs.ready(["fpreh_servicio_ambulanciaedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpreh_servicio_ambulanciaedit", "x_hora_destino", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $preh_servicio_ambulancia_edit->hora_destino->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_servicio_ambulancia_edit->hora_preposicion->Visible) { // hora_preposicion ?>
	<div id="r_hora_preposicion" class="form-group row">
		<label id="elh_preh_servicio_ambulancia_hora_preposicion" for="x_hora_preposicion" class="<?php echo $preh_servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_preh_servicio_ambulancia_hora_preposicion" type="text/html"><?php echo $preh_servicio_ambulancia_edit->hora_preposicion->caption() ?><?php echo $preh_servicio_ambulancia_edit->hora_preposicion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $preh_servicio_ambulancia_edit->hora_preposicion->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_hora_preposicion" type="text/html"><span id="el_preh_servicio_ambulancia_hora_preposicion">
<input type="text" data-table="preh_servicio_ambulancia" data-field="x_hora_preposicion" name="x_hora_preposicion" id="x_hora_preposicion" maxlength="8" placeholder="<?php echo HtmlEncode($preh_servicio_ambulancia_edit->hora_preposicion->getPlaceHolder()) ?>" value="<?php echo $preh_servicio_ambulancia_edit->hora_preposicion->EditValue ?>"<?php echo $preh_servicio_ambulancia_edit->hora_preposicion->editAttributes() ?>>
<?php if (!$preh_servicio_ambulancia_edit->hora_preposicion->ReadOnly && !$preh_servicio_ambulancia_edit->hora_preposicion->Disabled && !isset($preh_servicio_ambulancia_edit->hora_preposicion->EditAttrs["readonly"]) && !isset($preh_servicio_ambulancia_edit->hora_preposicion->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="preh_servicio_ambulanciaedit_js">
loadjs.ready(["fpreh_servicio_ambulanciaedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpreh_servicio_ambulanciaedit", "x_hora_preposicion", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $preh_servicio_ambulancia_edit->hora_preposicion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_servicio_ambulancia_edit->observaciones->Visible) { // observaciones ?>
	<div id="r_observaciones" class="form-group row">
		<label id="elh_preh_servicio_ambulancia_observaciones" for="x_observaciones" class="<?php echo $preh_servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_preh_servicio_ambulancia_observaciones" type="text/html"><?php echo $preh_servicio_ambulancia_edit->observaciones->caption() ?><?php echo $preh_servicio_ambulancia_edit->observaciones->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $preh_servicio_ambulancia_edit->observaciones->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_observaciones" type="text/html"><span id="el_preh_servicio_ambulancia_observaciones">
<textarea data-table="preh_servicio_ambulancia" data-field="x_observaciones" name="x_observaciones" id="x_observaciones" cols="35" rows="4" placeholder="<?php echo HtmlEncode($preh_servicio_ambulancia_edit->observaciones->getPlaceHolder()) ?>"<?php echo $preh_servicio_ambulancia_edit->observaciones->editAttributes() ?>><?php echo $preh_servicio_ambulancia_edit->observaciones->EditValue ?></textarea>
</span></script>
<?php echo $preh_servicio_ambulancia_edit->observaciones->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_servicio_ambulancia_edit->tipo_traslado->Visible) { // tipo_traslado ?>
	<div id="r_tipo_traslado" class="form-group row">
		<label id="elh_preh_servicio_ambulancia_tipo_traslado" for="x_tipo_traslado" class="<?php echo $preh_servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_preh_servicio_ambulancia_tipo_traslado" type="text/html"><?php echo $preh_servicio_ambulancia_edit->tipo_traslado->caption() ?><?php echo $preh_servicio_ambulancia_edit->tipo_traslado->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $preh_servicio_ambulancia_edit->tipo_traslado->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_tipo_traslado" type="text/html"><span id="el_preh_servicio_ambulancia_tipo_traslado">
<input type="text" data-table="preh_servicio_ambulancia" data-field="x_tipo_traslado" name="x_tipo_traslado" id="x_tipo_traslado" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($preh_servicio_ambulancia_edit->tipo_traslado->getPlaceHolder()) ?>" value="<?php echo $preh_servicio_ambulancia_edit->tipo_traslado->EditValue ?>"<?php echo $preh_servicio_ambulancia_edit->tipo_traslado->editAttributes() ?>>
</span></script>
<?php echo $preh_servicio_ambulancia_edit->tipo_traslado->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_servicio_ambulancia_edit->traslado_fallido->Visible) { // traslado_fallido ?>
	<div id="r_traslado_fallido" class="form-group row">
		<label id="elh_preh_servicio_ambulancia_traslado_fallido" for="x_traslado_fallido" class="<?php echo $preh_servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_preh_servicio_ambulancia_traslado_fallido" type="text/html"><?php echo $preh_servicio_ambulancia_edit->traslado_fallido->caption() ?><?php echo $preh_servicio_ambulancia_edit->traslado_fallido->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $preh_servicio_ambulancia_edit->traslado_fallido->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_traslado_fallido" type="text/html"><span id="el_preh_servicio_ambulancia_traslado_fallido">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="preh_servicio_ambulancia" data-field="x_traslado_fallido" data-value-separator="<?php echo $preh_servicio_ambulancia_edit->traslado_fallido->displayValueSeparatorAttribute() ?>" id="x_traslado_fallido" name="x_traslado_fallido"<?php echo $preh_servicio_ambulancia_edit->traslado_fallido->editAttributes() ?>>
			<?php echo $preh_servicio_ambulancia_edit->traslado_fallido->selectOptionListHtml("x_traslado_fallido") ?>
		</select>
</div>
<?php echo $preh_servicio_ambulancia_edit->traslado_fallido->Lookup->getParamTag($preh_servicio_ambulancia_edit, "p_x_traslado_fallido") ?>
</span></script>
<?php echo $preh_servicio_ambulancia_edit->traslado_fallido->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_servicio_ambulancia_edit->estado_paciente->Visible) { // estado_paciente ?>
	<div id="r_estado_paciente" class="form-group row">
		<label id="elh_preh_servicio_ambulancia_estado_paciente" for="x_estado_paciente" class="<?php echo $preh_servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_preh_servicio_ambulancia_estado_paciente" type="text/html"><?php echo $preh_servicio_ambulancia_edit->estado_paciente->caption() ?><?php echo $preh_servicio_ambulancia_edit->estado_paciente->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $preh_servicio_ambulancia_edit->estado_paciente->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_estado_paciente" type="text/html"><span id="el_preh_servicio_ambulancia_estado_paciente">
<input type="text" data-table="preh_servicio_ambulancia" data-field="x_estado_paciente" name="x_estado_paciente" id="x_estado_paciente" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($preh_servicio_ambulancia_edit->estado_paciente->getPlaceHolder()) ?>" value="<?php echo $preh_servicio_ambulancia_edit->estado_paciente->EditValue ?>"<?php echo $preh_servicio_ambulancia_edit->estado_paciente->editAttributes() ?>>
</span></script>
<?php echo $preh_servicio_ambulancia_edit->estado_paciente->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_servicio_ambulancia_edit->tipo_serviciosistema->Visible) { // tipo_serviciosistema ?>
	<div id="r_tipo_serviciosistema" class="form-group row">
		<label id="elh_preh_servicio_ambulancia_tipo_serviciosistema" for="x_tipo_serviciosistema" class="<?php echo $preh_servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_preh_servicio_ambulancia_tipo_serviciosistema" type="text/html"><?php echo $preh_servicio_ambulancia_edit->tipo_serviciosistema->caption() ?><?php echo $preh_servicio_ambulancia_edit->tipo_serviciosistema->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $preh_servicio_ambulancia_edit->tipo_serviciosistema->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_tipo_serviciosistema" type="text/html"><span id="el_preh_servicio_ambulancia_tipo_serviciosistema">
<input type="text" data-table="preh_servicio_ambulancia" data-field="x_tipo_serviciosistema" name="x_tipo_serviciosistema" id="x_tipo_serviciosistema" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($preh_servicio_ambulancia_edit->tipo_serviciosistema->getPlaceHolder()) ?>" value="<?php echo $preh_servicio_ambulancia_edit->tipo_serviciosistema->EditValue ?>"<?php echo $preh_servicio_ambulancia_edit->tipo_serviciosistema->editAttributes() ?>>
</span></script>
<?php echo $preh_servicio_ambulancia_edit->tipo_serviciosistema->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_servicio_ambulancia_edit->preposicion->Visible) { // preposicion ?>
	<div id="r_preposicion" class="form-group row">
		<label id="elh_preh_servicio_ambulancia_preposicion" for="x_preposicion" class="<?php echo $preh_servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_preh_servicio_ambulancia_preposicion" type="text/html"><?php echo $preh_servicio_ambulancia_edit->preposicion->caption() ?><?php echo $preh_servicio_ambulancia_edit->preposicion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $preh_servicio_ambulancia_edit->preposicion->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_preposicion" type="text/html"><span id="el_preh_servicio_ambulancia_preposicion">
<input type="text" data-table="preh_servicio_ambulancia" data-field="x_preposicion" name="x_preposicion" id="x_preposicion" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($preh_servicio_ambulancia_edit->preposicion->getPlaceHolder()) ?>" value="<?php echo $preh_servicio_ambulancia_edit->preposicion->EditValue ?>"<?php echo $preh_servicio_ambulancia_edit->preposicion->editAttributes() ?>>
</span></script>
<?php echo $preh_servicio_ambulancia_edit->preposicion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_servicio_ambulancia_edit->conductor->Visible) { // conductor ?>
	<div id="r_conductor" class="form-group row">
		<label id="elh_preh_servicio_ambulancia_conductor" for="x_conductor" class="<?php echo $preh_servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_preh_servicio_ambulancia_conductor" type="text/html"><?php echo $preh_servicio_ambulancia_edit->conductor->caption() ?><?php echo $preh_servicio_ambulancia_edit->conductor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $preh_servicio_ambulancia_edit->conductor->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_conductor" type="text/html"><span id="el_preh_servicio_ambulancia_conductor">
<input type="text" data-table="preh_servicio_ambulancia" data-field="x_conductor" name="x_conductor" id="x_conductor" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($preh_servicio_ambulancia_edit->conductor->getPlaceHolder()) ?>" value="<?php echo $preh_servicio_ambulancia_edit->conductor->EditValue ?>"<?php echo $preh_servicio_ambulancia_edit->conductor->editAttributes() ?>>
</span></script>
<?php echo $preh_servicio_ambulancia_edit->conductor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_servicio_ambulancia_edit->medico->Visible) { // medico ?>
	<div id="r_medico" class="form-group row">
		<label id="elh_preh_servicio_ambulancia_medico" for="x_medico" class="<?php echo $preh_servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_preh_servicio_ambulancia_medico" type="text/html"><?php echo $preh_servicio_ambulancia_edit->medico->caption() ?><?php echo $preh_servicio_ambulancia_edit->medico->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $preh_servicio_ambulancia_edit->medico->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_medico" type="text/html"><span id="el_preh_servicio_ambulancia_medico">
<input type="text" data-table="preh_servicio_ambulancia" data-field="x_medico" name="x_medico" id="x_medico" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($preh_servicio_ambulancia_edit->medico->getPlaceHolder()) ?>" value="<?php echo $preh_servicio_ambulancia_edit->medico->EditValue ?>"<?php echo $preh_servicio_ambulancia_edit->medico->editAttributes() ?>>
</span></script>
<?php echo $preh_servicio_ambulancia_edit->medico->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_servicio_ambulancia_edit->paramedico->Visible) { // paramedico ?>
	<div id="r_paramedico" class="form-group row">
		<label id="elh_preh_servicio_ambulancia_paramedico" for="x_paramedico" class="<?php echo $preh_servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_preh_servicio_ambulancia_paramedico" type="text/html"><?php echo $preh_servicio_ambulancia_edit->paramedico->caption() ?><?php echo $preh_servicio_ambulancia_edit->paramedico->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $preh_servicio_ambulancia_edit->paramedico->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_paramedico" type="text/html"><span id="el_preh_servicio_ambulancia_paramedico">
<input type="text" data-table="preh_servicio_ambulancia" data-field="x_paramedico" name="x_paramedico" id="x_paramedico" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($preh_servicio_ambulancia_edit->paramedico->getPlaceHolder()) ?>" value="<?php echo $preh_servicio_ambulancia_edit->paramedico->EditValue ?>"<?php echo $preh_servicio_ambulancia_edit->paramedico->editAttributes() ?>>
</span></script>
<?php echo $preh_servicio_ambulancia_edit->paramedico->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_servicio_ambulancia_edit->dx_aph->Visible) { // dx_aph ?>
	<div id="r_dx_aph" class="form-group row">
		<label id="elh_preh_servicio_ambulancia_dx_aph" for="x_dx_aph" class="<?php echo $preh_servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_preh_servicio_ambulancia_dx_aph" type="text/html"><?php echo $preh_servicio_ambulancia_edit->dx_aph->caption() ?><?php echo $preh_servicio_ambulancia_edit->dx_aph->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $preh_servicio_ambulancia_edit->dx_aph->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_dx_aph" type="text/html"><span id="el_preh_servicio_ambulancia_dx_aph">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_dx_aph"><?php echo EmptyValue(strval($preh_servicio_ambulancia_edit->dx_aph->ViewValue)) ? $Language->phrase("PleaseSelect") : $preh_servicio_ambulancia_edit->dx_aph->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($preh_servicio_ambulancia_edit->dx_aph->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($preh_servicio_ambulancia_edit->dx_aph->ReadOnly || $preh_servicio_ambulancia_edit->dx_aph->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_dx_aph[]',m:1,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $preh_servicio_ambulancia_edit->dx_aph->Lookup->getParamTag($preh_servicio_ambulancia_edit, "p_x_dx_aph") ?>
<input type="hidden" data-table="preh_servicio_ambulancia" data-field="x_dx_aph" data-multiple="1" data-lookup="1" data-value-separator="<?php echo $preh_servicio_ambulancia_edit->dx_aph->displayValueSeparatorAttribute() ?>" name="x_dx_aph[]" id="x_dx_aph[]" value="<?php echo $preh_servicio_ambulancia_edit->dx_aph->CurrentValue ?>"<?php echo $preh_servicio_ambulancia_edit->dx_aph->editAttributes() ?>>
</span></script>
<?php echo $preh_servicio_ambulancia_edit->dx_aph->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_servicio_ambulancia_edit->dx_soat->Visible) { // dx_soat ?>
	<div id="r_dx_soat" class="form-group row">
		<label id="elh_preh_servicio_ambulancia_dx_soat" for="x_dx_soat" class="<?php echo $preh_servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_preh_servicio_ambulancia_dx_soat" type="text/html"><?php echo $preh_servicio_ambulancia_edit->dx_soat->caption() ?><?php echo $preh_servicio_ambulancia_edit->dx_soat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $preh_servicio_ambulancia_edit->dx_soat->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_dx_soat" type="text/html"><span id="el_preh_servicio_ambulancia_dx_soat">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_dx_soat"><?php echo EmptyValue(strval($preh_servicio_ambulancia_edit->dx_soat->ViewValue)) ? $Language->phrase("PleaseSelect") : $preh_servicio_ambulancia_edit->dx_soat->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($preh_servicio_ambulancia_edit->dx_soat->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($preh_servicio_ambulancia_edit->dx_soat->ReadOnly || $preh_servicio_ambulancia_edit->dx_soat->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_dx_soat[]',m:1,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $preh_servicio_ambulancia_edit->dx_soat->Lookup->getParamTag($preh_servicio_ambulancia_edit, "p_x_dx_soat") ?>
<input type="hidden" data-table="preh_servicio_ambulancia" data-field="x_dx_soat" data-multiple="1" data-lookup="1" data-value-separator="<?php echo $preh_servicio_ambulancia_edit->dx_soat->displayValueSeparatorAttribute() ?>" name="x_dx_soat[]" id="x_dx_soat[]" value="<?php echo $preh_servicio_ambulancia_edit->dx_soat->CurrentValue ?>"<?php echo $preh_servicio_ambulancia_edit->dx_soat->editAttributes() ?>>
</span></script>
<?php echo $preh_servicio_ambulancia_edit->dx_soat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_servicio_ambulancia_edit->estado_pacientefinal->Visible) { // estado_pacientefinal ?>
	<div id="r_estado_pacientefinal" class="form-group row">
		<label id="elh_preh_servicio_ambulancia_estado_pacientefinal" class="<?php echo $preh_servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_preh_servicio_ambulancia_estado_pacientefinal" type="text/html"><?php echo $preh_servicio_ambulancia_edit->estado_pacientefinal->caption() ?><?php echo $preh_servicio_ambulancia_edit->estado_pacientefinal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $preh_servicio_ambulancia_edit->estado_pacientefinal->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_estado_pacientefinal" type="text/html"><span id="el_preh_servicio_ambulancia_estado_pacientefinal">
<div id="tp_x_estado_pacientefinal" class="ew-template"><input type="radio" class="custom-control-input" data-table="preh_servicio_ambulancia" data-field="x_estado_pacientefinal" data-value-separator="<?php echo $preh_servicio_ambulancia_edit->estado_pacientefinal->displayValueSeparatorAttribute() ?>" name="x_estado_pacientefinal" id="x_estado_pacientefinal" value="{value}"<?php echo $preh_servicio_ambulancia_edit->estado_pacientefinal->editAttributes() ?>></div>
<div id="dsl_x_estado_pacientefinal" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $preh_servicio_ambulancia_edit->estado_pacientefinal->radioButtonListHtml(FALSE, "x_estado_pacientefinal") ?>
</div></div>
</span></script>
<?php echo $preh_servicio_ambulancia_edit->estado_pacientefinal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_servicio_ambulancia_edit->cuando_murio->Visible) { // cuando_murio ?>
	<div id="r_cuando_murio" class="form-group row">
		<label id="elh_preh_servicio_ambulancia_cuando_murio" for="x_cuando_murio" class="<?php echo $preh_servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_preh_servicio_ambulancia_cuando_murio" type="text/html"><?php echo $preh_servicio_ambulancia_edit->cuando_murio->caption() ?><?php echo $preh_servicio_ambulancia_edit->cuando_murio->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $preh_servicio_ambulancia_edit->cuando_murio->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_cuando_murio" type="text/html"><span id="el_preh_servicio_ambulancia_cuando_murio">
<input type="text" data-table="preh_servicio_ambulancia" data-field="x_cuando_murio" name="x_cuando_murio" id="x_cuando_murio" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($preh_servicio_ambulancia_edit->cuando_murio->getPlaceHolder()) ?>" value="<?php echo $preh_servicio_ambulancia_edit->cuando_murio->EditValue ?>"<?php echo $preh_servicio_ambulancia_edit->cuando_murio->editAttributes() ?>>
</span></script>
<?php echo $preh_servicio_ambulancia_edit->cuando_murio->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_servicio_ambulancia_edit->accidente_vehiculo->Visible) { // accidente_vehiculo ?>
	<div id="r_accidente_vehiculo" class="form-group row">
		<label id="elh_preh_servicio_ambulancia_accidente_vehiculo" class="<?php echo $preh_servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_preh_servicio_ambulancia_accidente_vehiculo" type="text/html"><?php echo $preh_servicio_ambulancia_edit->accidente_vehiculo->caption() ?><?php echo $preh_servicio_ambulancia_edit->accidente_vehiculo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $preh_servicio_ambulancia_edit->accidente_vehiculo->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_accidente_vehiculo" type="text/html"><span id="el_preh_servicio_ambulancia_accidente_vehiculo">
<div id="tp_x_accidente_vehiculo" class="ew-template"><input type="radio" class="custom-control-input" data-table="preh_servicio_ambulancia" data-field="x_accidente_vehiculo" data-value-separator="<?php echo $preh_servicio_ambulancia_edit->accidente_vehiculo->displayValueSeparatorAttribute() ?>" name="x_accidente_vehiculo" id="x_accidente_vehiculo" value="{value}"<?php echo $preh_servicio_ambulancia_edit->accidente_vehiculo->editAttributes() ?>></div>
<div id="dsl_x_accidente_vehiculo" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $preh_servicio_ambulancia_edit->accidente_vehiculo->radioButtonListHtml(FALSE, "x_accidente_vehiculo") ?>
</div></div>
</span></script>
<?php echo $preh_servicio_ambulancia_edit->accidente_vehiculo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_servicio_ambulancia_edit->atropellado->Visible) { // atropellado ?>
	<div id="r_atropellado" class="form-group row">
		<label id="elh_preh_servicio_ambulancia_atropellado" class="<?php echo $preh_servicio_ambulancia_edit->LeftColumnClass ?>"><script id="tpc_preh_servicio_ambulancia_atropellado" type="text/html"><?php echo $preh_servicio_ambulancia_edit->atropellado->caption() ?><?php echo $preh_servicio_ambulancia_edit->atropellado->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_servicio_ambulancia_edit->RightColumnClass ?>"><div <?php echo $preh_servicio_ambulancia_edit->atropellado->cellAttributes() ?>>
<script id="tpx_preh_servicio_ambulancia_atropellado" type="text/html"><span id="el_preh_servicio_ambulancia_atropellado">
<div id="tp_x_atropellado" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="preh_servicio_ambulancia" data-field="x_atropellado" data-value-separator="<?php echo $preh_servicio_ambulancia_edit->atropellado->displayValueSeparatorAttribute() ?>" name="x_atropellado[]" id="x_atropellado[]" value="{value}"<?php echo $preh_servicio_ambulancia_edit->atropellado->editAttributes() ?>></div>
<div id="dsl_x_atropellado" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $preh_servicio_ambulancia_edit->atropellado->checkBoxListHtml(FALSE, "x_atropellado[]") ?>
</div></div>
</span></script>
<?php echo $preh_servicio_ambulancia_edit->atropellado->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<script id="tpx_preh_servicio_ambulancia_k_final" type="text/html"><span id="el_preh_servicio_ambulancia_k_final">
<input type="hidden" data-table="preh_servicio_ambulancia" data-field="x_k_final" name="x_k_final" id="x_k_final" value="<?php echo HtmlEncode($preh_servicio_ambulancia_edit->k_final->CurrentValue) ?>">
</span></script>
<script id="tpx_preh_servicio_ambulancia_k_inical" type="text/html"><span id="el_preh_servicio_ambulancia_k_inical">
<input type="hidden" data-table="preh_servicio_ambulancia" data-field="x_k_inical" name="x_k_inical" id="x_k_inical" value="<?php echo HtmlEncode($preh_servicio_ambulancia_edit->k_inical->CurrentValue) ?>">
</span></script>
	<input type="hidden" data-table="preh_servicio_ambulancia" data-field="x_cod_ambulancia" name="x_cod_ambulancia" id="x_cod_ambulancia" value="<?php echo HtmlEncode($preh_servicio_ambulancia_edit->cod_ambulancia->CurrentValue) ?>">
<div id="tpd_preh_servicio_ambulanciaedit" class="ew-custom-template"></div>
<script id="tpm_preh_servicio_ambulanciaedit" type="text/html">
<div id="ct_preh_servicio_ambulancia_edit">
</hr>
<div style="display: none" id ="llaves">
	<div class="form-row">
		<div class="form-group col-xs-2">
			{{include tmpl=~getTemplate("#tpx_preh_servicio_ambulancia_cod_ambulancia")/}}
		</div>
		<div class="form-group col-xs-2">
			{{include tmpl=~getTemplate("#tpx_preh_servicio_ambulancia_cod_casopreh")/}}
		</div>
	</div>
</div>
<div class="form-row">
	<div class="form-group col-xs-2">
	</div>
	<div class="form-group col-xs-2">
	 </div>
 </div>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $preh_servicio_ambulancia_edit->hora_asigna->caption() ?></label></br>
	 <div class="input-group-append"> {{include tmpl=~getTemplate("#tpx_preh_servicio_ambulancia_hora_asigna")/}}<button  onClick = 'fechaHoy(0)' class="btn btn-default" type="button"><i class="fas fa-stopwatch"></i></button></div>
	</div>
</div>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $preh_servicio_ambulancia_edit->hora_llegada->caption() ?></label></br>
	 <div class="input-group-append"> {{include tmpl=~getTemplate("#tpx_preh_servicio_ambulancia_hora_llegada")/}}<button  onClick = 'fechaHoy(1)' class="btn btn-default" type="button"><i class="fas fa-stopwatch"></i></button></div>
	</div>
</div>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $preh_servicio_ambulancia_edit->hora_inicio->caption() ?></label></br>
	 <div class="input-group-append"> {{include tmpl=~getTemplate("#tpx_preh_servicio_ambulancia_hora_inicio")/}}<button  onClick = 'fechaHoy(2)' class="btn btn-default" type="button"><i class="fas fa-stopwatch"></i></button></div>
	</div>
</div>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $preh_servicio_ambulancia_edit->hora_destino->caption() ?></label></br>
	  <div class="input-group-append"> {{include tmpl=~getTemplate("#tpx_preh_servicio_ambulancia_hora_destino")/}}<button  onClick = 'fechaHoy(3)' class="btn btn-default" type="button"><i class="fas fa-stopwatch"></i></button></div>
	</div>
</div>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $preh_servicio_ambulancia_edit->hora_preposicion->caption() ?></label></br>
<div class="input-group-append"> {{include tmpl=~getTemplate("#tpx_preh_servicio_ambulancia_hora_preposicion")/}}<button  onClick = 'fechaHoy(4)' class="btn btn-default" type="button"><i class="fas fa-stopwatch"></i></button></div>
	  </div>
 </div>
<?php echo $tri_amb ?> </br>
 </hr>
<div class="form-row">
	<div class="form-group col-xs-2">
	  <label><?php echo $preh_servicio_ambulancia_edit->conductor->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_preh_servicio_ambulancia_conductor")/}}
	</div>
	<div class="form-group col-xs-2">
	  <label><?php echo $preh_servicio_ambulancia_edit->medico->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_preh_servicio_ambulancia_medico")/}}
	</div>
	<div class="form-group col-xs-2">
	  <label><?php echo $preh_servicio_ambulancia_edit->paramedico->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_preh_servicio_ambulancia_paramedico")/}}
	</div>
 </div>
<div class="form-row">
<div class="form-group col-xs-2">
	  <label><?php echo $preh_servicio_ambulancia_edit->traslado_fallido->caption() ?></label></br>
	  {{include tmpl=~getTemplate("#tpx_preh_servicio_ambulancia_traslado_fallido")/}}
	</div>
</div>
	  <div class="form-group">
	 	<label><?php echo $preh_servicio_ambulancia_edit->observaciones->caption() ?></label></br>
	 	  {{include tmpl=~getTemplate("#tpx_preh_servicio_ambulancia_observaciones")/}}
	  </div>
</div>
</script>
<script type="text/html" class="preh_servicio_ambulanciaedit_js">


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

<?php if (!$preh_servicio_ambulancia_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $preh_servicio_ambulancia_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $preh_servicio_ambulancia_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($preh_servicio_ambulancia->Rows) ?> };
	ew.applyTemplate("tpd_preh_servicio_ambulanciaedit", "tpm_preh_servicio_ambulanciaedit", "preh_servicio_ambulanciaedit", "<?php echo $preh_servicio_ambulancia->CustomExport ?>", ew.templateData.rows[0]);
	$("script.preh_servicio_ambulanciaedit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$preh_servicio_ambulancia_edit->showPageFooter();
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
$preh_servicio_ambulancia_edit->terminate();
?>