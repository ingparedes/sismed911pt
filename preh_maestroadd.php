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
$preh_maestro_add = new preh_maestro_add();

// Run the page
$preh_maestro_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$preh_maestro_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpreh_maestroadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpreh_maestroadd = currentForm = new ew.Form("fpreh_maestroadd", "add");

	// Validate form
	fpreh_maestroadd.validate = function() {
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
			<?php if ($preh_maestro_add->fecha->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->fecha->caption(), $preh_maestro_add->fecha->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_maestro_add->tiempo->Required) { ?>
				elm = this.getElements("x" + infix + "_tiempo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->tiempo->caption(), $preh_maestro_add->tiempo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tiempo");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($preh_maestro_add->tiempo->errorMessage()) ?>");
			<?php if ($preh_maestro_add->llamada_fallida->Required) { ?>
				elm = this.getElements("x" + infix + "_llamada_fallida");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->llamada_fallida->caption(), $preh_maestro_add->llamada_fallida->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_maestro_add->longitud->Required) { ?>
				elm = this.getElements("x" + infix + "_longitud");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->longitud->caption(), $preh_maestro_add->longitud->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_maestro_add->latitud->Required) { ?>
				elm = this.getElements("x" + infix + "_latitud");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->latitud->caption(), $preh_maestro_add->latitud->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_maestro_add->quepasa->Required) { ?>
				elm = this.getElements("x" + infix + "_quepasa");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->quepasa->caption(), $preh_maestro_add->quepasa->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_maestro_add->direccion->Required) { ?>
				elm = this.getElements("x" + infix + "_direccion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->direccion->caption(), $preh_maestro_add->direccion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_maestro_add->estado_llamada->Required) { ?>
				elm = this.getElements("x" + infix + "_estado_llamada");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->estado_llamada->caption(), $preh_maestro_add->estado_llamada->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_maestro_add->incidente->Required) { ?>
				elm = this.getElements("x" + infix + "_incidente");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->incidente->caption(), $preh_maestro_add->incidente->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_maestro_add->prioridad->Required) { ?>
				elm = this.getElements("x" + infix + "_prioridad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->prioridad->caption(), $preh_maestro_add->prioridad->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_maestro_add->accion->Required) { ?>
				elm = this.getElements("x" + infix + "_accion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->accion->caption(), $preh_maestro_add->accion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_maestro_add->estado->Required) { ?>
				elm = this.getElements("x" + infix + "_estado");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->estado->caption(), $preh_maestro_add->estado->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_estado");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($preh_maestro_add->estado->errorMessage()) ?>");
			<?php if ($preh_maestro_add->cierre->Required) { ?>
				elm = this.getElements("x" + infix + "_cierre");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->cierre->caption(), $preh_maestro_add->cierre->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cierre");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($preh_maestro_add->cierre->errorMessage()) ?>");
			<?php if ($preh_maestro_add->caso_multiple->Required) { ?>
				elm = this.getElements("x" + infix + "_caso_multiple");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->caso_multiple->caption(), $preh_maestro_add->caso_multiple->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_caso_multiple");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($preh_maestro_add->caso_multiple->errorMessage()) ?>");
			<?php if ($preh_maestro_add->paciente->Required) { ?>
				elm = this.getElements("x" + infix + "_paciente");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->paciente->caption(), $preh_maestro_add->paciente->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_maestro_add->evaluacion->Required) { ?>
				elm = this.getElements("x" + infix + "_evaluacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->evaluacion->caption(), $preh_maestro_add->evaluacion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_maestro_add->sede->Required) { ?>
				elm = this.getElements("x" + infix + "_sede");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->sede->caption(), $preh_maestro_add->sede->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_maestro_add->hospital_destino->Required) { ?>
				elm = this.getElements("x" + infix + "_hospital_destino");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->hospital_destino->caption(), $preh_maestro_add->hospital_destino->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_maestro_add->nombre_medico->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_medico");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->nombre_medico->caption(), $preh_maestro_add->nombre_medico->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_maestro_add->nombre_confirma->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_confirma");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->nombre_confirma->caption(), $preh_maestro_add->nombre_confirma->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_maestro_add->telefono_confirma->Required) { ?>
				elm = this.getElements("x" + infix + "_telefono_confirma");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->telefono_confirma->caption(), $preh_maestro_add->telefono_confirma->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_maestro_add->telefono->Required) { ?>
				elm = this.getElements("x" + infix + "_telefono");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->telefono->caption(), $preh_maestro_add->telefono->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_maestro_add->nombre_reporta->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_reporta");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->nombre_reporta->caption(), $preh_maestro_add->nombre_reporta->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_maestro_add->distrito->Required) { ?>
				elm = this.getElements("x" + infix + "_distrito");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->distrito->caption(), $preh_maestro_add->distrito->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_maestro_add->descripcion->Required) { ?>
				elm = this.getElements("x" + infix + "_descripcion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->descripcion->caption(), $preh_maestro_add->descripcion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($preh_maestro_add->observacion->Required) { ?>
				elm = this.getElements("x" + infix + "_observacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $preh_maestro_add->observacion->caption(), $preh_maestro_add->observacion->RequiredErrorMessage)) ?>");
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
	fpreh_maestroadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpreh_maestroadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpreh_maestroadd.lists["x_llamada_fallida"] = <?php echo $preh_maestro_add->llamada_fallida->Lookup->toClientList($preh_maestro_add) ?>;
	fpreh_maestroadd.lists["x_llamada_fallida"].options = <?php echo JsonEncode($preh_maestro_add->llamada_fallida->lookupOptions()) ?>;
	fpreh_maestroadd.lists["x_incidente"] = <?php echo $preh_maestro_add->incidente->Lookup->toClientList($preh_maestro_add) ?>;
	fpreh_maestroadd.lists["x_incidente"].options = <?php echo JsonEncode($preh_maestro_add->incidente->lookupOptions()) ?>;
	fpreh_maestroadd.lists["x_prioridad"] = <?php echo $preh_maestro_add->prioridad->Lookup->toClientList($preh_maestro_add) ?>;
	fpreh_maestroadd.lists["x_prioridad"].options = <?php echo JsonEncode($preh_maestro_add->prioridad->lookupOptions()) ?>;
	fpreh_maestroadd.lists["x_accion"] = <?php echo $preh_maestro_add->accion->Lookup->toClientList($preh_maestro_add) ?>;
	fpreh_maestroadd.lists["x_accion"].options = <?php echo JsonEncode($preh_maestro_add->accion->lookupOptions()) ?>;
	fpreh_maestroadd.lists["x_hospital_destino"] = <?php echo $preh_maestro_add->hospital_destino->Lookup->toClientList($preh_maestro_add) ?>;
	fpreh_maestroadd.lists["x_hospital_destino"].options = <?php echo JsonEncode($preh_maestro_add->hospital_destino->lookupOptions()) ?>;
	loadjs.done("fpreh_maestroadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	function busqueda(){var e={texto:document.getElementById("x_incidente").value,langid:"<?php echo CurrentLanguageID();?>"};$.ajax({data:e,url:"valida_pg.php?tipo=incidente",type:"POST",success:function(e){$("#datos1").html(e)}})}$(document).ready(function(){$(".caso_multiple").hide()}),$("select[name='x_incidente']").change(function(){busqueda()});
});
</script>
<?php $preh_maestro_add->showPageHeader(); ?>
<?php
$preh_maestro_add->showMessage();
?>
<form name="fpreh_maestroadd" id="fpreh_maestroadd" class="<?php echo $preh_maestro_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="preh_maestro">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$preh_maestro_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($preh_maestro_add->tiempo->Visible) { // tiempo ?>
	<div id="r_tiempo" class="form-group row">
		<label id="elh_preh_maestro_tiempo" for="x_tiempo" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_tiempo" type="text/html"><?php echo $preh_maestro_add->tiempo->caption() ?><?php echo $preh_maestro_add->tiempo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->tiempo->cellAttributes() ?>>
<script id="tpx_preh_maestro_tiempo" type="text/html"><span id="el_preh_maestro_tiempo">
<input type="text" data-table="preh_maestro" data-field="x_tiempo" name="x_tiempo" id="x_tiempo" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($preh_maestro_add->tiempo->getPlaceHolder()) ?>" value="<?php echo $preh_maestro_add->tiempo->EditValue ?>"<?php echo $preh_maestro_add->tiempo->editAttributes() ?>>
</span></script>
<?php echo $preh_maestro_add->tiempo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_add->llamada_fallida->Visible) { // llamada_fallida ?>
	<div id="r_llamada_fallida" class="form-group row">
		<label id="elh_preh_maestro_llamada_fallida" for="x_llamada_fallida" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_llamada_fallida" type="text/html"><?php echo $preh_maestro_add->llamada_fallida->caption() ?><?php echo $preh_maestro_add->llamada_fallida->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->llamada_fallida->cellAttributes() ?>>
<script id="tpx_preh_maestro_llamada_fallida" type="text/html"><span id="el_preh_maestro_llamada_fallida">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="preh_maestro" data-field="x_llamada_fallida" data-value-separator="<?php echo $preh_maestro_add->llamada_fallida->displayValueSeparatorAttribute() ?>" id="x_llamada_fallida" name="x_llamada_fallida"<?php echo $preh_maestro_add->llamada_fallida->editAttributes() ?>>
			<?php echo $preh_maestro_add->llamada_fallida->selectOptionListHtml("x_llamada_fallida") ?>
		</select>
</div>
<?php echo $preh_maestro_add->llamada_fallida->Lookup->getParamTag($preh_maestro_add, "p_x_llamada_fallida") ?>
</span></script>
<?php echo $preh_maestro_add->llamada_fallida->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_add->longitud->Visible) { // longitud ?>
	<div id="r_longitud" class="form-group row">
		<label id="elh_preh_maestro_longitud" for="x_longitud" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_longitud" type="text/html"><?php echo $preh_maestro_add->longitud->caption() ?><?php echo $preh_maestro_add->longitud->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->longitud->cellAttributes() ?>>
<script id="tpx_preh_maestro_longitud" type="text/html"><span id="el_preh_maestro_longitud">
<input type="text" data-table="preh_maestro" data-field="x_longitud" name="x_longitud" id="x_longitud" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($preh_maestro_add->longitud->getPlaceHolder()) ?>" value="<?php echo $preh_maestro_add->longitud->EditValue ?>"<?php echo $preh_maestro_add->longitud->editAttributes() ?>>
</span></script>
<?php echo $preh_maestro_add->longitud->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_add->latitud->Visible) { // latitud ?>
	<div id="r_latitud" class="form-group row">
		<label id="elh_preh_maestro_latitud" for="x_latitud" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_latitud" type="text/html"><?php echo $preh_maestro_add->latitud->caption() ?><?php echo $preh_maestro_add->latitud->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->latitud->cellAttributes() ?>>
<script id="tpx_preh_maestro_latitud" type="text/html"><span id="el_preh_maestro_latitud">
<input type="text" data-table="preh_maestro" data-field="x_latitud" name="x_latitud" id="x_latitud" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($preh_maestro_add->latitud->getPlaceHolder()) ?>" value="<?php echo $preh_maestro_add->latitud->EditValue ?>"<?php echo $preh_maestro_add->latitud->editAttributes() ?>>
</span></script>
<?php echo $preh_maestro_add->latitud->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_add->quepasa->Visible) { // quepasa ?>
	<div id="r_quepasa" class="form-group row">
		<label id="elh_preh_maestro_quepasa" for="x_quepasa" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_quepasa" type="text/html"><?php echo $preh_maestro_add->quepasa->caption() ?><?php echo $preh_maestro_add->quepasa->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->quepasa->cellAttributes() ?>>
<script id="tpx_preh_maestro_quepasa" type="text/html"><span id="el_preh_maestro_quepasa">
<textarea data-table="preh_maestro" data-field="x_quepasa" name="x_quepasa" id="x_quepasa" cols="35" rows="2" placeholder="<?php echo HtmlEncode($preh_maestro_add->quepasa->getPlaceHolder()) ?>"<?php echo $preh_maestro_add->quepasa->editAttributes() ?>><?php echo $preh_maestro_add->quepasa->EditValue ?></textarea>
</span></script>
<?php echo $preh_maestro_add->quepasa->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_add->direccion->Visible) { // direccion ?>
	<div id="r_direccion" class="form-group row">
		<label id="elh_preh_maestro_direccion" for="x_direccion" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_direccion" type="text/html"><?php echo $preh_maestro_add->direccion->caption() ?><?php echo $preh_maestro_add->direccion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->direccion->cellAttributes() ?>>
<script id="tpx_preh_maestro_direccion" type="text/html"><span id="el_preh_maestro_direccion">
<input type="text" data-table="preh_maestro" data-field="x_direccion" name="x_direccion" id="x_direccion" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($preh_maestro_add->direccion->getPlaceHolder()) ?>" value="<?php echo $preh_maestro_add->direccion->EditValue ?>"<?php echo $preh_maestro_add->direccion->editAttributes() ?>>
</span></script>
<?php echo $preh_maestro_add->direccion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_add->estado_llamada->Visible) { // estado_llamada ?>
	<div id="r_estado_llamada" class="form-group row">
		<label id="elh_preh_maestro_estado_llamada" for="x_estado_llamada" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_estado_llamada" type="text/html"><?php echo $preh_maestro_add->estado_llamada->caption() ?><?php echo $preh_maestro_add->estado_llamada->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->estado_llamada->cellAttributes() ?>>
<script id="tpx_preh_maestro_estado_llamada" type="text/html"><span id="el_preh_maestro_estado_llamada">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="preh_maestro" data-field="x_estado_llamada" data-value-separator="<?php echo $preh_maestro_add->estado_llamada->displayValueSeparatorAttribute() ?>" id="x_estado_llamada" name="x_estado_llamada"<?php echo $preh_maestro_add->estado_llamada->editAttributes() ?>>
			<?php echo $preh_maestro_add->estado_llamada->selectOptionListHtml("x_estado_llamada") ?>
		</select>
</div>
</span></script>
<?php echo $preh_maestro_add->estado_llamada->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_add->incidente->Visible) { // incidente ?>
	<div id="r_incidente" class="form-group row">
		<label id="elh_preh_maestro_incidente" for="x_incidente" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_incidente" type="text/html"><?php echo $preh_maestro_add->incidente->caption() ?><?php echo $preh_maestro_add->incidente->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->incidente->cellAttributes() ?>>
<script id="tpx_preh_maestro_incidente" type="text/html"><span id="el_preh_maestro_incidente">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="preh_maestro" data-field="x_incidente" data-value-separator="<?php echo $preh_maestro_add->incidente->displayValueSeparatorAttribute() ?>" id="x_incidente" name="x_incidente"<?php echo $preh_maestro_add->incidente->editAttributes() ?>>
			<?php echo $preh_maestro_add->incidente->selectOptionListHtml("x_incidente") ?>
		</select>
</div>
<?php echo $preh_maestro_add->incidente->Lookup->getParamTag($preh_maestro_add, "p_x_incidente") ?>
</span></script>
<?php echo $preh_maestro_add->incidente->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_add->prioridad->Visible) { // prioridad ?>
	<div id="r_prioridad" class="form-group row">
		<label id="elh_preh_maestro_prioridad" for="x_prioridad" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_prioridad" type="text/html"><?php echo $preh_maestro_add->prioridad->caption() ?><?php echo $preh_maestro_add->prioridad->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->prioridad->cellAttributes() ?>>
<script id="tpx_preh_maestro_prioridad" type="text/html"><span id="el_preh_maestro_prioridad">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="preh_maestro" data-field="x_prioridad" data-value-separator="<?php echo $preh_maestro_add->prioridad->displayValueSeparatorAttribute() ?>" id="x_prioridad" name="x_prioridad"<?php echo $preh_maestro_add->prioridad->editAttributes() ?>>
			<?php echo $preh_maestro_add->prioridad->selectOptionListHtml("x_prioridad") ?>
		</select>
</div>
<?php echo $preh_maestro_add->prioridad->Lookup->getParamTag($preh_maestro_add, "p_x_prioridad") ?>
</span></script>
<?php echo $preh_maestro_add->prioridad->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_add->accion->Visible) { // accion ?>
	<div id="r_accion" class="form-group row">
		<label id="elh_preh_maestro_accion" for="x_accion" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_accion" type="text/html"><?php echo $preh_maestro_add->accion->caption() ?><?php echo $preh_maestro_add->accion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->accion->cellAttributes() ?>>
<script id="tpx_preh_maestro_accion" type="text/html"><span id="el_preh_maestro_accion">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="preh_maestro" data-field="x_accion" data-value-separator="<?php echo $preh_maestro_add->accion->displayValueSeparatorAttribute() ?>" id="x_accion" name="x_accion"<?php echo $preh_maestro_add->accion->editAttributes() ?>>
			<?php echo $preh_maestro_add->accion->selectOptionListHtml("x_accion") ?>
		</select>
</div>
<?php echo $preh_maestro_add->accion->Lookup->getParamTag($preh_maestro_add, "p_x_accion") ?>
</span></script>
<?php echo $preh_maestro_add->accion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_add->estado->Visible) { // estado ?>
	<div id="r_estado" class="form-group row">
		<label id="elh_preh_maestro_estado" for="x_estado" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_estado" type="text/html"><?php echo $preh_maestro_add->estado->caption() ?><?php echo $preh_maestro_add->estado->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->estado->cellAttributes() ?>>
<script id="tpx_preh_maestro_estado" type="text/html"><span id="el_preh_maestro_estado">
<input type="text" data-table="preh_maestro" data-field="x_estado" name="x_estado" id="x_estado" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($preh_maestro_add->estado->getPlaceHolder()) ?>" value="<?php echo $preh_maestro_add->estado->EditValue ?>"<?php echo $preh_maestro_add->estado->editAttributes() ?>>
</span></script>
<?php echo $preh_maestro_add->estado->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_add->cierre->Visible) { // cierre ?>
	<div id="r_cierre" class="form-group row">
		<label id="elh_preh_maestro_cierre" for="x_cierre" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_cierre" type="text/html"><?php echo $preh_maestro_add->cierre->caption() ?><?php echo $preh_maestro_add->cierre->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->cierre->cellAttributes() ?>>
<script id="tpx_preh_maestro_cierre" type="text/html"><span id="el_preh_maestro_cierre">
<input type="text" data-table="preh_maestro" data-field="x_cierre" name="x_cierre" id="x_cierre" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($preh_maestro_add->cierre->getPlaceHolder()) ?>" value="<?php echo $preh_maestro_add->cierre->EditValue ?>"<?php echo $preh_maestro_add->cierre->editAttributes() ?>>
</span></script>
<?php echo $preh_maestro_add->cierre->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_add->caso_multiple->Visible) { // caso_multiple ?>
	<div id="r_caso_multiple" class="form-group row">
		<label id="elh_preh_maestro_caso_multiple" for="x_caso_multiple" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_caso_multiple" type="text/html"><?php echo $preh_maestro_add->caso_multiple->caption() ?><?php echo $preh_maestro_add->caso_multiple->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->caso_multiple->cellAttributes() ?>>
<script id="tpx_preh_maestro_caso_multiple" type="text/html"><span id="el_preh_maestro_caso_multiple">
<input type="text" data-table="preh_maestro" data-field="x_caso_multiple" name="x_caso_multiple" id="x_caso_multiple" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($preh_maestro_add->caso_multiple->getPlaceHolder()) ?>" value="<?php echo $preh_maestro_add->caso_multiple->EditValue ?>"<?php echo $preh_maestro_add->caso_multiple->editAttributes() ?>>
</span></script>
<?php echo $preh_maestro_add->caso_multiple->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_add->paciente->Visible) { // paciente ?>
	<div id="r_paciente" class="form-group row">
		<label id="elh_preh_maestro_paciente" for="x_paciente" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_paciente" type="text/html"><?php echo $preh_maestro_add->paciente->caption() ?><?php echo $preh_maestro_add->paciente->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->paciente->cellAttributes() ?>>
<script id="tpx_preh_maestro_paciente" type="text/html"><span id="el_preh_maestro_paciente">
<textarea data-table="preh_maestro" data-field="x_paciente" name="x_paciente" id="x_paciente" cols="35" rows="4" placeholder="<?php echo HtmlEncode($preh_maestro_add->paciente->getPlaceHolder()) ?>"<?php echo $preh_maestro_add->paciente->editAttributes() ?>><?php echo $preh_maestro_add->paciente->EditValue ?></textarea>
</span></script>
<?php echo $preh_maestro_add->paciente->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_add->evaluacion->Visible) { // evaluacion ?>
	<div id="r_evaluacion" class="form-group row">
		<label id="elh_preh_maestro_evaluacion" for="x_evaluacion" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_evaluacion" type="text/html"><?php echo $preh_maestro_add->evaluacion->caption() ?><?php echo $preh_maestro_add->evaluacion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->evaluacion->cellAttributes() ?>>
<script id="tpx_preh_maestro_evaluacion" type="text/html"><span id="el_preh_maestro_evaluacion">
<textarea data-table="preh_maestro" data-field="x_evaluacion" name="x_evaluacion" id="x_evaluacion" cols="35" rows="4" placeholder="<?php echo HtmlEncode($preh_maestro_add->evaluacion->getPlaceHolder()) ?>"<?php echo $preh_maestro_add->evaluacion->editAttributes() ?>><?php echo $preh_maestro_add->evaluacion->EditValue ?></textarea>
</span></script>
<?php echo $preh_maestro_add->evaluacion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_add->sede->Visible) { // sede ?>
	<div id="r_sede" class="form-group row">
		<label id="elh_preh_maestro_sede" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_sede" type="text/html"><?php echo $preh_maestro_add->sede->caption() ?><?php echo $preh_maestro_add->sede->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->sede->cellAttributes() ?>>
<script id="tpx_preh_maestro_sede" type="text/html"><span id="el_preh_maestro_sede">
<input type="text" data-table="preh_maestro" data-field="x_sede" name="x_sede" id="x_sede" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($preh_maestro_add->sede->getPlaceHolder()) ?>" value="<?php echo $preh_maestro_add->sede->EditValue ?>"<?php echo $preh_maestro_add->sede->editAttributes() ?>>
</span></script>
<?php echo $preh_maestro_add->sede->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_add->hospital_destino->Visible) { // hospital_destino ?>
	<div id="r_hospital_destino" class="form-group row">
		<label id="elh_preh_maestro_hospital_destino" for="x_hospital_destino" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_hospital_destino" type="text/html"><?php echo $preh_maestro_add->hospital_destino->caption() ?><?php echo $preh_maestro_add->hospital_destino->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->hospital_destino->cellAttributes() ?>>
<script id="tpx_preh_maestro_hospital_destino" type="text/html"><span id="el_preh_maestro_hospital_destino">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_hospital_destino"><?php echo EmptyValue(strval($preh_maestro_add->hospital_destino->ViewValue)) ? $Language->phrase("PleaseSelect") : $preh_maestro_add->hospital_destino->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($preh_maestro_add->hospital_destino->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($preh_maestro_add->hospital_destino->ReadOnly || $preh_maestro_add->hospital_destino->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_hospital_destino',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $preh_maestro_add->hospital_destino->Lookup->getParamTag($preh_maestro_add, "p_x_hospital_destino") ?>
<input type="hidden" data-table="preh_maestro" data-field="x_hospital_destino" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $preh_maestro_add->hospital_destino->displayValueSeparatorAttribute() ?>" name="x_hospital_destino" id="x_hospital_destino" value="<?php echo $preh_maestro_add->hospital_destino->CurrentValue ?>"<?php echo $preh_maestro_add->hospital_destino->editAttributes() ?>>
</span></script>
<?php echo $preh_maestro_add->hospital_destino->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_add->nombre_medico->Visible) { // nombre_medico ?>
	<div id="r_nombre_medico" class="form-group row">
		<label id="elh_preh_maestro_nombre_medico" for="x_nombre_medico" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_nombre_medico" type="text/html"><?php echo $preh_maestro_add->nombre_medico->caption() ?><?php echo $preh_maestro_add->nombre_medico->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->nombre_medico->cellAttributes() ?>>
<script id="tpx_preh_maestro_nombre_medico" type="text/html"><span id="el_preh_maestro_nombre_medico">
<input type="text" data-table="preh_maestro" data-field="x_nombre_medico" name="x_nombre_medico" id="x_nombre_medico" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($preh_maestro_add->nombre_medico->getPlaceHolder()) ?>" value="<?php echo $preh_maestro_add->nombre_medico->EditValue ?>"<?php echo $preh_maestro_add->nombre_medico->editAttributes() ?>>
</span></script>
<?php echo $preh_maestro_add->nombre_medico->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_add->nombre_confirma->Visible) { // nombre_confirma ?>
	<div id="r_nombre_confirma" class="form-group row">
		<label id="elh_preh_maestro_nombre_confirma" for="x_nombre_confirma" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_nombre_confirma" type="text/html"><?php echo $preh_maestro_add->nombre_confirma->caption() ?><?php echo $preh_maestro_add->nombre_confirma->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->nombre_confirma->cellAttributes() ?>>
<script id="tpx_preh_maestro_nombre_confirma" type="text/html"><span id="el_preh_maestro_nombre_confirma">
<input type="text" data-table="preh_maestro" data-field="x_nombre_confirma" name="x_nombre_confirma" id="x_nombre_confirma" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($preh_maestro_add->nombre_confirma->getPlaceHolder()) ?>" value="<?php echo $preh_maestro_add->nombre_confirma->EditValue ?>"<?php echo $preh_maestro_add->nombre_confirma->editAttributes() ?>>
</span></script>
<?php echo $preh_maestro_add->nombre_confirma->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_add->telefono_confirma->Visible) { // telefono_confirma ?>
	<div id="r_telefono_confirma" class="form-group row">
		<label id="elh_preh_maestro_telefono_confirma" for="x_telefono_confirma" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_telefono_confirma" type="text/html"><?php echo $preh_maestro_add->telefono_confirma->caption() ?><?php echo $preh_maestro_add->telefono_confirma->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->telefono_confirma->cellAttributes() ?>>
<script id="tpx_preh_maestro_telefono_confirma" type="text/html"><span id="el_preh_maestro_telefono_confirma">
<input type="text" data-table="preh_maestro" data-field="x_telefono_confirma" name="x_telefono_confirma" id="x_telefono_confirma" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($preh_maestro_add->telefono_confirma->getPlaceHolder()) ?>" value="<?php echo $preh_maestro_add->telefono_confirma->EditValue ?>"<?php echo $preh_maestro_add->telefono_confirma->editAttributes() ?>>
</span></script>
<?php echo $preh_maestro_add->telefono_confirma->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_add->telefono->Visible) { // telefono ?>
	<div id="r_telefono" class="form-group row">
		<label id="elh_preh_maestro_telefono" for="x_telefono" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_telefono" type="text/html"><?php echo $preh_maestro_add->telefono->caption() ?><?php echo $preh_maestro_add->telefono->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->telefono->cellAttributes() ?>>
<script id="tpx_preh_maestro_telefono" type="text/html"><span id="el_preh_maestro_telefono">
<input type="text" data-table="preh_maestro" data-field="x_telefono" name="x_telefono" id="x_telefono" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($preh_maestro_add->telefono->getPlaceHolder()) ?>" value="<?php echo $preh_maestro_add->telefono->EditValue ?>"<?php echo $preh_maestro_add->telefono->editAttributes() ?>>
</span></script>
<?php echo $preh_maestro_add->telefono->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_add->nombre_reporta->Visible) { // nombre_reporta ?>
	<div id="r_nombre_reporta" class="form-group row">
		<label id="elh_preh_maestro_nombre_reporta" for="x_nombre_reporta" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_nombre_reporta" type="text/html"><?php echo $preh_maestro_add->nombre_reporta->caption() ?><?php echo $preh_maestro_add->nombre_reporta->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->nombre_reporta->cellAttributes() ?>>
<script id="tpx_preh_maestro_nombre_reporta" type="text/html"><span id="el_preh_maestro_nombre_reporta">
<input type="text" data-table="preh_maestro" data-field="x_nombre_reporta" name="x_nombre_reporta" id="x_nombre_reporta" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($preh_maestro_add->nombre_reporta->getPlaceHolder()) ?>" value="<?php echo $preh_maestro_add->nombre_reporta->EditValue ?>"<?php echo $preh_maestro_add->nombre_reporta->editAttributes() ?>>
</span></script>
<?php echo $preh_maestro_add->nombre_reporta->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_add->distrito->Visible) { // distrito ?>
	<div id="r_distrito" class="form-group row">
		<label id="elh_preh_maestro_distrito" for="x_distrito" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_distrito" type="text/html"><?php echo $preh_maestro_add->distrito->caption() ?><?php echo $preh_maestro_add->distrito->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->distrito->cellAttributes() ?>>
<script id="tpx_preh_maestro_distrito" type="text/html"><span id="el_preh_maestro_distrito">
<input type="text" data-table="preh_maestro" data-field="x_distrito" name="x_distrito" id="x_distrito" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($preh_maestro_add->distrito->getPlaceHolder()) ?>" value="<?php echo $preh_maestro_add->distrito->EditValue ?>"<?php echo $preh_maestro_add->distrito->editAttributes() ?>>
</span></script>
<?php echo $preh_maestro_add->distrito->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_add->descripcion->Visible) { // descripcion ?>
	<div id="r_descripcion" class="form-group row">
		<label id="elh_preh_maestro_descripcion" for="x_descripcion" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_descripcion" type="text/html"><?php echo $preh_maestro_add->descripcion->caption() ?><?php echo $preh_maestro_add->descripcion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->descripcion->cellAttributes() ?>>
<script id="tpx_preh_maestro_descripcion" type="text/html"><span id="el_preh_maestro_descripcion">
<textarea data-table="preh_maestro" data-field="x_descripcion" name="x_descripcion" id="x_descripcion" cols="35" rows="4" placeholder="<?php echo HtmlEncode($preh_maestro_add->descripcion->getPlaceHolder()) ?>"<?php echo $preh_maestro_add->descripcion->editAttributes() ?>><?php echo $preh_maestro_add->descripcion->EditValue ?></textarea>
</span></script>
<?php echo $preh_maestro_add->descripcion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($preh_maestro_add->observacion->Visible) { // observacion ?>
	<div id="r_observacion" class="form-group row">
		<label id="elh_preh_maestro_observacion" for="x_observacion" class="<?php echo $preh_maestro_add->LeftColumnClass ?>"><script id="tpc_preh_maestro_observacion" type="text/html"><?php echo $preh_maestro_add->observacion->caption() ?><?php echo $preh_maestro_add->observacion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $preh_maestro_add->RightColumnClass ?>"><div <?php echo $preh_maestro_add->observacion->cellAttributes() ?>>
<script id="tpx_preh_maestro_observacion" type="text/html"><span id="el_preh_maestro_observacion">
<textarea data-table="preh_maestro" data-field="x_observacion" name="x_observacion" id="x_observacion" cols="35" rows="4" placeholder="<?php echo HtmlEncode($preh_maestro_add->observacion->getPlaceHolder()) ?>"<?php echo $preh_maestro_add->observacion->editAttributes() ?>><?php echo $preh_maestro_add->observacion->EditValue ?></textarea>
</span></script>
<?php echo $preh_maestro_add->observacion->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_preh_maestroadd" class="ew-custom-template"></div>
<script id="tpm_preh_maestroadd" type="text/html">
<div id="ct_preh_maestro_add">
<div class="container">
	<div class="container-fluid">
		<div class="row">
		  <!-- left column -->
		  <div class="col-md-6">
			<!-- general form elements -->
			<div>
			  <div class="card-header">
			<h3>  <?php  echo $Language->Phrase("nuevo_caso"); ?></h3>
			  </div>
	    <label><?php echo $preh_maestro_add->telefono->caption() ?></label>
  		<div class="ew-row">{{include tmpl=~getTemplate("#tpx_preh_maestro_telefono")/}}
  		<button  onClick = 'obtenerDatos();' class="btn btn-default" type="button"><i class="fas fa-phone-alt"></i></button>
  		</div>
		<label><?php echo $preh_maestro_add->llamada_fallida->caption() ?></label>
  		<div class="ew-row">{{include tmpl=~getTemplate("#tpx_preh_maestro_llamada_fallida")/}}</div>
  		 <label><?php echo $preh_maestro_add->quepasa->caption() ?></label>
  		<div class="ew-row">{{include tmpl=~getTemplate("#tpx_preh_maestro_quepasa")/}}</div>
  		<label><?php echo $preh_maestro_add->incidente->caption() ?></label>
  		<div class="ew-row">{{include tmpl=~getTemplate("#tpx_preh_maestro_incidente")/}}</div>
  		<label><?php echo $preh_maestro_add->direccion->caption() ?></label>
  		<div class="ew-row">{{include tmpl=~getTemplate("#tpx_preh_maestro_direccion")/}}</div>
  		<label><?php echo $preh_maestro_add->nombre_reporta->caption() ?></label>
  		 <div class="ew-row">{{include tmpl=~getTemplate("#tpx_preh_maestro_nombre_reporta")/}}</div>
  		 <label><?php echo $preh_maestro_add->prioridad->caption() ?></label>
  		<div class="ew-row">{{include tmpl=~getTemplate("#tpx_preh_maestro_prioridad")/}}</div>
  		<label><?php echo $preh_maestro_add->accion->caption() ?></label>
  		<div class="ew-row">{{include tmpl=~getTemplate("#tpx_preh_maestro_accion")/}}</div>
  	  <input type="checkbox" id="casomltple" onclick="fechaHoy()">
	  <label for="casomltple">¿<?php  echo $Language->Phrase("multiple"); ?>?</label>
	  <br>
	 <div style="display: none" id ="div_caso_mltple"> 
	  	<label><?php echo $preh_maestro_add->caso_multiple->caption() ?></label>
	  	{{include tmpl=~getTemplate("#tpx_preh_maestro_caso_multiple")/}}
	  	<br>
	  	<label><?php echo $preh_maestro_add->fecha->caption() ?></label>
	  	{{include tmpl=~getTemplate("#tpx_preh_maestro_fecha")/}}
	  		Sede: {{include tmpl=~getTemplate("#tpx_preh_maestro_sede")/}}
	  	<br>
	  	</div> 
	  	</div>
	  	</div>
	 <div class="col-md-6">
		<!-- general form elements disabled -->
		<div>
		<div class="card-header">
			<h3><?php  echo $Language->Phrase("stat_call"); ?></h3> 
		</div>
		<div class="alert alert-secondary" role="alert" id = "estadisticas">
		<!-- <button type="button" class="btn btn-secondary">Más</button> -->
		</div>
			<div class="card-header">
			<h3 ><?php  echo $Language->Phrase("incidente"); ?></h3>
			 </div>
	         <div id="datos1"></div>
		 </div>	 
	</div>       
	</div>       
  </div>
</div>
</script>
<script type="text/html" class="preh_maestroadd_js">

$(document).ready(function (){
  $('#casomltple').on('change',function(){
	if (this.checked) {
	 $("#div_caso_mltple").hide();

	 //$("#x_caso_multiple").value = '999999';
	 document.getElementById('x_caso_multiple').value= '999999';
	} else {
		 document.getElementById('x_caso_multiple').value= '';
		 $("#div_caso_mltple").hide();
	}  
  })
});

function obtenerDatos(acode) {

	//let url = "https://s3.amazonaws.com/dolartoday/data.json"; //Ruta de solicitud
	let url = "http://localhost:3000/telefonos/"+acode;

	//console.log(url);
	const api = new XMLHttpRequest();
	api.open('GET', url, true);
	api.send();
	api.onreadystatechange = function () {
		if (this.status==200 && this.readyState == 4) { //cambiar a respuesta de central
			let datos = JSON.parse(this.responseText);

			//console.log(datos);
			let item = datos.telefono;
			busca_tel(item);
			document.getElementById('x_telefono').value = `${datos.telefono}`;
			document.getElementById('x_nombre_reporta').value = `${datos.nombre}`;
		return item;	
		}
	}
}

function busca_tel(tel){

	//var texto =document.getElementById("x_incidente").value;
	var langid = '<?php echo CurrentLanguageID();?>';
	var parametros = {
		"texto" : tel, "langid": langid
	};
	$.ajax({
		data: parametros,
		url: "valida_pg.php?tipo=telefono",
		type: "POST",
		success:function(respose){
			$("#estadisticas").html(respose);
		}
	});
}

		function fechaHoy(){
			var fecha = new Date(); 
			var mes = fecha.getMonth()+1; 
			var dia = fecha.getDate(); 
			var ano = fecha.getFullYear(); 
			var hora = fecha.getHours();    
			var min = fecha.getMinutes();  
			var seg = fecha.getSeconds();
			if (hora > 12){
				hora= hora-12;
				seg = seg+" PM";				
			}else{
				seg = seg+" AM";
			}
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
			document.getElementById('x_fecha').value= fecha
			return fecha;
		}   

</script>

<?php if (!$preh_maestro_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $preh_maestro_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $preh_maestro_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($preh_maestro->Rows) ?> };
	ew.applyTemplate("tpd_preh_maestroadd", "tpm_preh_maestroadd", "preh_maestroadd", "<?php echo $preh_maestro->CustomExport ?>", ew.templateData.rows[0]);
	$("script.preh_maestroadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$preh_maestro_add->showPageFooter();
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
$preh_maestro_add->terminate();
?>