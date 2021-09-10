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
$ambulancias_edit = new ambulancias_edit();

// Run the page
$ambulancias_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ambulancias_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fambulanciasedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fambulanciasedit = currentForm = new ew.Form("fambulanciasedit", "edit");

	// Validate form
	fambulanciasedit.validate = function() {
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
			<?php if ($ambulancias_edit->id_ambulancias->Required) { ?>
				elm = this.getElements("x" + infix + "_id_ambulancias");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_edit->id_ambulancias->caption(), $ambulancias_edit->id_ambulancias->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_edit->cod_ambulancias->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_ambulancias");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_edit->cod_ambulancias->caption(), $ambulancias_edit->cod_ambulancias->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_edit->placas->Required) { ?>
				elm = this.getElements("x" + infix + "_placas");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_edit->placas->caption(), $ambulancias_edit->placas->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_edit->chasis->Required) { ?>
				elm = this.getElements("x" + infix + "_chasis");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_edit->chasis->caption(), $ambulancias_edit->chasis->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_edit->marca->Required) { ?>
				elm = this.getElements("x" + infix + "_marca");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_edit->marca->caption(), $ambulancias_edit->marca->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_edit->modelo->Required) { ?>
				elm = this.getElements("x" + infix + "_modelo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_edit->modelo->caption(), $ambulancias_edit->modelo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_edit->tipo_translado->Required) { ?>
				elm = this.getElements("x" + infix + "_tipo_translado");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_edit->tipo_translado->caption(), $ambulancias_edit->tipo_translado->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_edit->tipo_conbustible->Required) { ?>
				elm = this.getElements("x" + infix + "_tipo_conbustible");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_edit->tipo_conbustible->caption(), $ambulancias_edit->tipo_conbustible->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_edit->modalidad->Required) { ?>
				elm = this.getElements("x" + infix + "_modalidad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_edit->modalidad->caption(), $ambulancias_edit->modalidad->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_edit->estado->Required) { ?>
				elm = this.getElements("x" + infix + "_estado");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_edit->estado->caption(), $ambulancias_edit->estado->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_edit->ubicacion->Required) { ?>
				elm = this.getElements("x" + infix + "_ubicacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_edit->ubicacion->caption(), $ambulancias_edit->ubicacion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_edit->disponible->Required) { ?>
				elm = this.getElements("x" + infix + "_disponible");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_edit->disponible->caption(), $ambulancias_edit->disponible->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_edit->fecha_iniseguro->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_iniseguro");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_edit->fecha_iniseguro->caption(), $ambulancias_edit->fecha_iniseguro->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_fecha_iniseguro");
				if (elm && !ew.checkDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ambulancias_edit->fecha_iniseguro->errorMessage()) ?>");
			<?php if ($ambulancias_edit->fecha_finseguro->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_finseguro");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_edit->fecha_finseguro->caption(), $ambulancias_edit->fecha_finseguro->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_fecha_finseguro");
				if (elm && !ew.checkDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ambulancias_edit->fecha_finseguro->errorMessage()) ?>");
			<?php if ($ambulancias_edit->entidad->Required) { ?>
				elm = this.getElements("x" + infix + "_entidad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_edit->entidad->caption(), $ambulancias_edit->entidad->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_edit->observacion->Required) { ?>
				elm = this.getElements("x" + infix + "_observacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_edit->observacion->caption(), $ambulancias_edit->observacion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_edit->asiganda->Required) { ?>
				elm = this.getElements("x" + infix + "_asiganda");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_edit->asiganda->caption(), $ambulancias_edit->asiganda->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_edit->config_manteni->Required) { ?>
				elm = this.getElements("x" + infix + "_config_manteni");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_edit->config_manteni->caption(), $ambulancias_edit->config_manteni->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_edit->fecha_creacion->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_creacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_edit->fecha_creacion->caption(), $ambulancias_edit->fecha_creacion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_edit->longitudambulancia->Required) { ?>
				elm = this.getElements("x" + infix + "_longitudambulancia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_edit->longitudambulancia->caption(), $ambulancias_edit->longitudambulancia->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_edit->latituambulancia->Required) { ?>
				elm = this.getElements("x" + infix + "_latituambulancia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_edit->latituambulancia->caption(), $ambulancias_edit->latituambulancia->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ambulancias_edit->especial->Required) { ?>
				elm = this.getElements("x" + infix + "_especial");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ambulancias_edit->especial->caption(), $ambulancias_edit->especial->RequiredErrorMessage)) ?>");
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
	fambulanciasedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fambulanciasedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fambulanciasedit.lists["x_tipo_translado"] = <?php echo $ambulancias_edit->tipo_translado->Lookup->toClientList($ambulancias_edit) ?>;
	fambulanciasedit.lists["x_tipo_translado"].options = <?php echo JsonEncode($ambulancias_edit->tipo_translado->lookupOptions()) ?>;
	fambulanciasedit.lists["x_modalidad"] = <?php echo $ambulancias_edit->modalidad->Lookup->toClientList($ambulancias_edit) ?>;
	fambulanciasedit.lists["x_modalidad"].options = <?php echo JsonEncode($ambulancias_edit->modalidad->lookupOptions()) ?>;
	fambulanciasedit.lists["x_estado"] = <?php echo $ambulancias_edit->estado->Lookup->toClientList($ambulancias_edit) ?>;
	fambulanciasedit.lists["x_estado"].options = <?php echo JsonEncode($ambulancias_edit->estado->options(FALSE, TRUE)) ?>;
	fambulanciasedit.lists["x_ubicacion"] = <?php echo $ambulancias_edit->ubicacion->Lookup->toClientList($ambulancias_edit) ?>;
	fambulanciasedit.lists["x_ubicacion"].options = <?php echo JsonEncode($ambulancias_edit->ubicacion->lookupOptions()) ?>;
	fambulanciasedit.lists["x_entidad"] = <?php echo $ambulancias_edit->entidad->Lookup->toClientList($ambulancias_edit) ?>;
	fambulanciasedit.lists["x_entidad"].options = <?php echo JsonEncode($ambulancias_edit->entidad->lookupOptions()) ?>;
	fambulanciasedit.autoSuggests["x_entidad"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fambulanciasedit.lists["x_especial"] = <?php echo $ambulancias_edit->especial->Lookup->toClientList($ambulancias_edit) ?>;
	fambulanciasedit.lists["x_especial"].options = <?php echo JsonEncode($ambulancias_edit->especial->lookupOptions()) ?>;
	loadjs.done("fambulanciasedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ambulancias_edit->showPageHeader(); ?>
<?php
$ambulancias_edit->showMessage();
?>
<form name="fambulanciasedit" id="fambulanciasedit" class="<?php echo $ambulancias_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ambulancias">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$ambulancias_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($ambulancias_edit->id_ambulancias->Visible) { // id_ambulancias ?>
	<div id="r_id_ambulancias" class="form-group row">
		<label id="elh_ambulancias_id_ambulancias" class="<?php echo $ambulancias_edit->LeftColumnClass ?>"><?php echo $ambulancias_edit->id_ambulancias->caption() ?><?php echo $ambulancias_edit->id_ambulancias->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ambulancias_edit->RightColumnClass ?>"><div <?php echo $ambulancias_edit->id_ambulancias->cellAttributes() ?>>
<span id="el_ambulancias_id_ambulancias">
<span<?php echo $ambulancias_edit->id_ambulancias->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ambulancias_edit->id_ambulancias->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="ambulancias" data-field="x_id_ambulancias" name="x_id_ambulancias" id="x_id_ambulancias" value="<?php echo HtmlEncode($ambulancias_edit->id_ambulancias->CurrentValue) ?>">
<?php echo $ambulancias_edit->id_ambulancias->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_edit->cod_ambulancias->Visible) { // cod_ambulancias ?>
	<div id="r_cod_ambulancias" class="form-group row">
		<label id="elh_ambulancias_cod_ambulancias" for="x_cod_ambulancias" class="<?php echo $ambulancias_edit->LeftColumnClass ?>"><?php echo $ambulancias_edit->cod_ambulancias->caption() ?><?php echo $ambulancias_edit->cod_ambulancias->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ambulancias_edit->RightColumnClass ?>"><div <?php echo $ambulancias_edit->cod_ambulancias->cellAttributes() ?>>
<span id="el_ambulancias_cod_ambulancias">
<input type="text" data-table="ambulancias" data-field="x_cod_ambulancias" name="x_cod_ambulancias" id="x_cod_ambulancias" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($ambulancias_edit->cod_ambulancias->getPlaceHolder()) ?>" value="<?php echo $ambulancias_edit->cod_ambulancias->EditValue ?>"<?php echo $ambulancias_edit->cod_ambulancias->editAttributes() ?>>
</span>
<?php echo $ambulancias_edit->cod_ambulancias->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_edit->placas->Visible) { // placas ?>
	<div id="r_placas" class="form-group row">
		<label id="elh_ambulancias_placas" for="x_placas" class="<?php echo $ambulancias_edit->LeftColumnClass ?>"><?php echo $ambulancias_edit->placas->caption() ?><?php echo $ambulancias_edit->placas->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ambulancias_edit->RightColumnClass ?>"><div <?php echo $ambulancias_edit->placas->cellAttributes() ?>>
<span id="el_ambulancias_placas">
<input type="text" data-table="ambulancias" data-field="x_placas" name="x_placas" id="x_placas" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($ambulancias_edit->placas->getPlaceHolder()) ?>" value="<?php echo $ambulancias_edit->placas->EditValue ?>"<?php echo $ambulancias_edit->placas->editAttributes() ?>>
</span>
<?php echo $ambulancias_edit->placas->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_edit->chasis->Visible) { // chasis ?>
	<div id="r_chasis" class="form-group row">
		<label id="elh_ambulancias_chasis" for="x_chasis" class="<?php echo $ambulancias_edit->LeftColumnClass ?>"><?php echo $ambulancias_edit->chasis->caption() ?><?php echo $ambulancias_edit->chasis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ambulancias_edit->RightColumnClass ?>"><div <?php echo $ambulancias_edit->chasis->cellAttributes() ?>>
<span id="el_ambulancias_chasis">
<input type="text" data-table="ambulancias" data-field="x_chasis" name="x_chasis" id="x_chasis" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($ambulancias_edit->chasis->getPlaceHolder()) ?>" value="<?php echo $ambulancias_edit->chasis->EditValue ?>"<?php echo $ambulancias_edit->chasis->editAttributes() ?>>
</span>
<?php echo $ambulancias_edit->chasis->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_edit->marca->Visible) { // marca ?>
	<div id="r_marca" class="form-group row">
		<label id="elh_ambulancias_marca" for="x_marca" class="<?php echo $ambulancias_edit->LeftColumnClass ?>"><?php echo $ambulancias_edit->marca->caption() ?><?php echo $ambulancias_edit->marca->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ambulancias_edit->RightColumnClass ?>"><div <?php echo $ambulancias_edit->marca->cellAttributes() ?>>
<span id="el_ambulancias_marca">
<input type="text" data-table="ambulancias" data-field="x_marca" name="x_marca" id="x_marca" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ambulancias_edit->marca->getPlaceHolder()) ?>" value="<?php echo $ambulancias_edit->marca->EditValue ?>"<?php echo $ambulancias_edit->marca->editAttributes() ?>>
</span>
<?php echo $ambulancias_edit->marca->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_edit->modelo->Visible) { // modelo ?>
	<div id="r_modelo" class="form-group row">
		<label id="elh_ambulancias_modelo" for="x_modelo" class="<?php echo $ambulancias_edit->LeftColumnClass ?>"><?php echo $ambulancias_edit->modelo->caption() ?><?php echo $ambulancias_edit->modelo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ambulancias_edit->RightColumnClass ?>"><div <?php echo $ambulancias_edit->modelo->cellAttributes() ?>>
<span id="el_ambulancias_modelo">
<input type="text" data-table="ambulancias" data-field="x_modelo" name="x_modelo" id="x_modelo" size="30" maxlength="32" placeholder="<?php echo HtmlEncode($ambulancias_edit->modelo->getPlaceHolder()) ?>" value="<?php echo $ambulancias_edit->modelo->EditValue ?>"<?php echo $ambulancias_edit->modelo->editAttributes() ?>>
</span>
<?php echo $ambulancias_edit->modelo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_edit->tipo_translado->Visible) { // tipo_translado ?>
	<div id="r_tipo_translado" class="form-group row">
		<label id="elh_ambulancias_tipo_translado" for="x_tipo_translado" class="<?php echo $ambulancias_edit->LeftColumnClass ?>"><?php echo $ambulancias_edit->tipo_translado->caption() ?><?php echo $ambulancias_edit->tipo_translado->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ambulancias_edit->RightColumnClass ?>"><div <?php echo $ambulancias_edit->tipo_translado->cellAttributes() ?>>
<span id="el_ambulancias_tipo_translado">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ambulancias" data-field="x_tipo_translado" data-value-separator="<?php echo $ambulancias_edit->tipo_translado->displayValueSeparatorAttribute() ?>" id="x_tipo_translado" name="x_tipo_translado"<?php echo $ambulancias_edit->tipo_translado->editAttributes() ?>>
			<?php echo $ambulancias_edit->tipo_translado->selectOptionListHtml("x_tipo_translado") ?>
		</select>
</div>
<?php echo $ambulancias_edit->tipo_translado->Lookup->getParamTag($ambulancias_edit, "p_x_tipo_translado") ?>
</span>
<?php echo $ambulancias_edit->tipo_translado->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_edit->tipo_conbustible->Visible) { // tipo_conbustible ?>
	<div id="r_tipo_conbustible" class="form-group row">
		<label id="elh_ambulancias_tipo_conbustible" for="x_tipo_conbustible" class="<?php echo $ambulancias_edit->LeftColumnClass ?>"><?php echo $ambulancias_edit->tipo_conbustible->caption() ?><?php echo $ambulancias_edit->tipo_conbustible->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ambulancias_edit->RightColumnClass ?>"><div <?php echo $ambulancias_edit->tipo_conbustible->cellAttributes() ?>>
<span id="el_ambulancias_tipo_conbustible">
<input type="text" data-table="ambulancias" data-field="x_tipo_conbustible" name="x_tipo_conbustible" id="x_tipo_conbustible" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($ambulancias_edit->tipo_conbustible->getPlaceHolder()) ?>" value="<?php echo $ambulancias_edit->tipo_conbustible->EditValue ?>"<?php echo $ambulancias_edit->tipo_conbustible->editAttributes() ?>>
</span>
<?php echo $ambulancias_edit->tipo_conbustible->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_edit->modalidad->Visible) { // modalidad ?>
	<div id="r_modalidad" class="form-group row">
		<label id="elh_ambulancias_modalidad" for="x_modalidad" class="<?php echo $ambulancias_edit->LeftColumnClass ?>"><?php echo $ambulancias_edit->modalidad->caption() ?><?php echo $ambulancias_edit->modalidad->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ambulancias_edit->RightColumnClass ?>"><div <?php echo $ambulancias_edit->modalidad->cellAttributes() ?>>
<span id="el_ambulancias_modalidad">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ambulancias" data-field="x_modalidad" data-value-separator="<?php echo $ambulancias_edit->modalidad->displayValueSeparatorAttribute() ?>" id="x_modalidad" name="x_modalidad"<?php echo $ambulancias_edit->modalidad->editAttributes() ?>>
			<?php echo $ambulancias_edit->modalidad->selectOptionListHtml("x_modalidad") ?>
		</select>
</div>
<?php echo $ambulancias_edit->modalidad->Lookup->getParamTag($ambulancias_edit, "p_x_modalidad") ?>
</span>
<?php echo $ambulancias_edit->modalidad->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_edit->estado->Visible) { // estado ?>
	<div id="r_estado" class="form-group row">
		<label id="elh_ambulancias_estado" for="x_estado" class="<?php echo $ambulancias_edit->LeftColumnClass ?>"><?php echo $ambulancias_edit->estado->caption() ?><?php echo $ambulancias_edit->estado->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ambulancias_edit->RightColumnClass ?>"><div <?php echo $ambulancias_edit->estado->cellAttributes() ?>>
<span id="el_ambulancias_estado">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ambulancias" data-field="x_estado" data-value-separator="<?php echo $ambulancias_edit->estado->displayValueSeparatorAttribute() ?>" id="x_estado" name="x_estado"<?php echo $ambulancias_edit->estado->editAttributes() ?>>
			<?php echo $ambulancias_edit->estado->selectOptionListHtml("x_estado") ?>
		</select>
</div>
</span>
<?php echo $ambulancias_edit->estado->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_edit->ubicacion->Visible) { // ubicacion ?>
	<div id="r_ubicacion" class="form-group row">
		<label id="elh_ambulancias_ubicacion" for="x_ubicacion" class="<?php echo $ambulancias_edit->LeftColumnClass ?>"><?php echo $ambulancias_edit->ubicacion->caption() ?><?php echo $ambulancias_edit->ubicacion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ambulancias_edit->RightColumnClass ?>"><div <?php echo $ambulancias_edit->ubicacion->cellAttributes() ?>>
<span id="el_ambulancias_ubicacion">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ambulancias" data-field="x_ubicacion" data-value-separator="<?php echo $ambulancias_edit->ubicacion->displayValueSeparatorAttribute() ?>" id="x_ubicacion" name="x_ubicacion"<?php echo $ambulancias_edit->ubicacion->editAttributes() ?>>
			<?php echo $ambulancias_edit->ubicacion->selectOptionListHtml("x_ubicacion") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "base_ambulancia") && !$ambulancias_edit->ubicacion->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_ubicacion" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ambulancias_edit->ubicacion->caption() ?>" data-title="<?php echo $ambulancias_edit->ubicacion->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_ubicacion',url:'base_ambulanciaaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ambulancias_edit->ubicacion->Lookup->getParamTag($ambulancias_edit, "p_x_ubicacion") ?>
</span>
<?php echo $ambulancias_edit->ubicacion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_edit->disponible->Visible) { // disponible ?>
	<div id="r_disponible" class="form-group row">
		<label id="elh_ambulancias_disponible" for="x_disponible" class="<?php echo $ambulancias_edit->LeftColumnClass ?>"><?php echo $ambulancias_edit->disponible->caption() ?><?php echo $ambulancias_edit->disponible->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ambulancias_edit->RightColumnClass ?>"><div <?php echo $ambulancias_edit->disponible->cellAttributes() ?>>
<span id="el_ambulancias_disponible">
<input type="text" data-table="ambulancias" data-field="x_disponible" name="x_disponible" id="x_disponible" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($ambulancias_edit->disponible->getPlaceHolder()) ?>" value="<?php echo $ambulancias_edit->disponible->EditValue ?>"<?php echo $ambulancias_edit->disponible->editAttributes() ?>>
</span>
<?php echo $ambulancias_edit->disponible->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_edit->fecha_iniseguro->Visible) { // fecha_iniseguro ?>
	<div id="r_fecha_iniseguro" class="form-group row">
		<label id="elh_ambulancias_fecha_iniseguro" for="x_fecha_iniseguro" class="<?php echo $ambulancias_edit->LeftColumnClass ?>"><?php echo $ambulancias_edit->fecha_iniseguro->caption() ?><?php echo $ambulancias_edit->fecha_iniseguro->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ambulancias_edit->RightColumnClass ?>"><div <?php echo $ambulancias_edit->fecha_iniseguro->cellAttributes() ?>>
<span id="el_ambulancias_fecha_iniseguro">
<input type="text" data-table="ambulancias" data-field="x_fecha_iniseguro" data-format="5" name="x_fecha_iniseguro" id="x_fecha_iniseguro" maxlength="8" placeholder="<?php echo HtmlEncode($ambulancias_edit->fecha_iniseguro->getPlaceHolder()) ?>" value="<?php echo $ambulancias_edit->fecha_iniseguro->EditValue ?>"<?php echo $ambulancias_edit->fecha_iniseguro->editAttributes() ?>>
<?php if (!$ambulancias_edit->fecha_iniseguro->ReadOnly && !$ambulancias_edit->fecha_iniseguro->Disabled && !isset($ambulancias_edit->fecha_iniseguro->EditAttrs["readonly"]) && !isset($ambulancias_edit->fecha_iniseguro->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fambulanciasedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fambulanciasedit", "x_fecha_iniseguro", {"ignoreReadonly":true,"useCurrent":false,"format":5});
});
</script>
<?php } ?>
</span>
<?php echo $ambulancias_edit->fecha_iniseguro->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_edit->fecha_finseguro->Visible) { // fecha_finseguro ?>
	<div id="r_fecha_finseguro" class="form-group row">
		<label id="elh_ambulancias_fecha_finseguro" for="x_fecha_finseguro" class="<?php echo $ambulancias_edit->LeftColumnClass ?>"><?php echo $ambulancias_edit->fecha_finseguro->caption() ?><?php echo $ambulancias_edit->fecha_finseguro->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ambulancias_edit->RightColumnClass ?>"><div <?php echo $ambulancias_edit->fecha_finseguro->cellAttributes() ?>>
<span id="el_ambulancias_fecha_finseguro">
<input type="text" data-table="ambulancias" data-field="x_fecha_finseguro" data-format="5" name="x_fecha_finseguro" id="x_fecha_finseguro" maxlength="8" placeholder="<?php echo HtmlEncode($ambulancias_edit->fecha_finseguro->getPlaceHolder()) ?>" value="<?php echo $ambulancias_edit->fecha_finseguro->EditValue ?>"<?php echo $ambulancias_edit->fecha_finseguro->editAttributes() ?>>
<?php if (!$ambulancias_edit->fecha_finseguro->ReadOnly && !$ambulancias_edit->fecha_finseguro->Disabled && !isset($ambulancias_edit->fecha_finseguro->EditAttrs["readonly"]) && !isset($ambulancias_edit->fecha_finseguro->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fambulanciasedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fambulanciasedit", "x_fecha_finseguro", {"ignoreReadonly":true,"useCurrent":false,"format":5});
});
</script>
<?php } ?>
</span>
<?php echo $ambulancias_edit->fecha_finseguro->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_edit->entidad->Visible) { // entidad ?>
	<div id="r_entidad" class="form-group row">
		<label id="elh_ambulancias_entidad" class="<?php echo $ambulancias_edit->LeftColumnClass ?>"><?php echo $ambulancias_edit->entidad->caption() ?><?php echo $ambulancias_edit->entidad->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ambulancias_edit->RightColumnClass ?>"><div <?php echo $ambulancias_edit->entidad->cellAttributes() ?>>
<span id="el_ambulancias_entidad">
<?php
$onchange = $ambulancias_edit->entidad->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$ambulancias_edit->entidad->EditAttrs["onchange"] = "";
?>
<span id="as_x_entidad">
	<input type="text" class="form-control" name="sv_x_entidad" id="sv_x_entidad" value="<?php echo RemoveHtml($ambulancias_edit->entidad->EditValue) ?>" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($ambulancias_edit->entidad->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($ambulancias_edit->entidad->getPlaceHolder()) ?>"<?php echo $ambulancias_edit->entidad->editAttributes() ?>>
</span>
<input type="hidden" data-table="ambulancias" data-field="x_entidad" data-value-separator="<?php echo $ambulancias_edit->entidad->displayValueSeparatorAttribute() ?>" name="x_entidad" id="x_entidad" value="<?php echo HtmlEncode($ambulancias_edit->entidad->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fambulanciasedit"], function() {
	fambulanciasedit.createAutoSuggest({"id":"x_entidad","forceSelect":false});
});
</script>
<?php echo $ambulancias_edit->entidad->Lookup->getParamTag($ambulancias_edit, "p_x_entidad") ?>
</span>
<?php echo $ambulancias_edit->entidad->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_edit->observacion->Visible) { // observacion ?>
	<div id="r_observacion" class="form-group row">
		<label id="elh_ambulancias_observacion" for="x_observacion" class="<?php echo $ambulancias_edit->LeftColumnClass ?>"><?php echo $ambulancias_edit->observacion->caption() ?><?php echo $ambulancias_edit->observacion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ambulancias_edit->RightColumnClass ?>"><div <?php echo $ambulancias_edit->observacion->cellAttributes() ?>>
<span id="el_ambulancias_observacion">
<input type="text" data-table="ambulancias" data-field="x_observacion" name="x_observacion" id="x_observacion" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($ambulancias_edit->observacion->getPlaceHolder()) ?>" value="<?php echo $ambulancias_edit->observacion->EditValue ?>"<?php echo $ambulancias_edit->observacion->editAttributes() ?>>
</span>
<?php echo $ambulancias_edit->observacion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_edit->asiganda->Visible) { // asiganda ?>
	<div id="r_asiganda" class="form-group row">
		<label id="elh_ambulancias_asiganda" for="x_asiganda" class="<?php echo $ambulancias_edit->LeftColumnClass ?>"><?php echo $ambulancias_edit->asiganda->caption() ?><?php echo $ambulancias_edit->asiganda->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ambulancias_edit->RightColumnClass ?>"><div <?php echo $ambulancias_edit->asiganda->cellAttributes() ?>>
<span id="el_ambulancias_asiganda">
<input type="text" data-table="ambulancias" data-field="x_asiganda" name="x_asiganda" id="x_asiganda" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($ambulancias_edit->asiganda->getPlaceHolder()) ?>" value="<?php echo $ambulancias_edit->asiganda->EditValue ?>"<?php echo $ambulancias_edit->asiganda->editAttributes() ?>>
</span>
<?php echo $ambulancias_edit->asiganda->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_edit->config_manteni->Visible) { // config_manteni ?>
	<div id="r_config_manteni" class="form-group row">
		<label id="elh_ambulancias_config_manteni" for="x_config_manteni" class="<?php echo $ambulancias_edit->LeftColumnClass ?>"><?php echo $ambulancias_edit->config_manteni->caption() ?><?php echo $ambulancias_edit->config_manteni->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ambulancias_edit->RightColumnClass ?>"><div <?php echo $ambulancias_edit->config_manteni->cellAttributes() ?>>
<span id="el_ambulancias_config_manteni">
<input type="text" data-table="ambulancias" data-field="x_config_manteni" name="x_config_manteni" id="x_config_manteni" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($ambulancias_edit->config_manteni->getPlaceHolder()) ?>" value="<?php echo $ambulancias_edit->config_manteni->EditValue ?>"<?php echo $ambulancias_edit->config_manteni->editAttributes() ?>>
</span>
<?php echo $ambulancias_edit->config_manteni->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_edit->longitudambulancia->Visible) { // longitudambulancia ?>
	<div id="r_longitudambulancia" class="form-group row">
		<label id="elh_ambulancias_longitudambulancia" for="x_longitudambulancia" class="<?php echo $ambulancias_edit->LeftColumnClass ?>"><?php echo $ambulancias_edit->longitudambulancia->caption() ?><?php echo $ambulancias_edit->longitudambulancia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ambulancias_edit->RightColumnClass ?>"><div <?php echo $ambulancias_edit->longitudambulancia->cellAttributes() ?>>
<span id="el_ambulancias_longitudambulancia">
<input type="text" data-table="ambulancias" data-field="x_longitudambulancia" name="x_longitudambulancia" id="x_longitudambulancia" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($ambulancias_edit->longitudambulancia->getPlaceHolder()) ?>" value="<?php echo $ambulancias_edit->longitudambulancia->EditValue ?>"<?php echo $ambulancias_edit->longitudambulancia->editAttributes() ?>>
</span>
<?php echo $ambulancias_edit->longitudambulancia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_edit->latituambulancia->Visible) { // latituambulancia ?>
	<div id="r_latituambulancia" class="form-group row">
		<label id="elh_ambulancias_latituambulancia" for="x_latituambulancia" class="<?php echo $ambulancias_edit->LeftColumnClass ?>"><?php echo $ambulancias_edit->latituambulancia->caption() ?><?php echo $ambulancias_edit->latituambulancia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ambulancias_edit->RightColumnClass ?>"><div <?php echo $ambulancias_edit->latituambulancia->cellAttributes() ?>>
<span id="el_ambulancias_latituambulancia">
<input type="text" data-table="ambulancias" data-field="x_latituambulancia" name="x_latituambulancia" id="x_latituambulancia" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($ambulancias_edit->latituambulancia->getPlaceHolder()) ?>" value="<?php echo $ambulancias_edit->latituambulancia->EditValue ?>"<?php echo $ambulancias_edit->latituambulancia->editAttributes() ?>>
</span>
<?php echo $ambulancias_edit->latituambulancia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ambulancias_edit->especial->Visible) { // especial ?>
	<div id="r_especial" class="form-group row">
		<label id="elh_ambulancias_especial" for="x_especial" class="<?php echo $ambulancias_edit->LeftColumnClass ?>"><?php echo $ambulancias_edit->especial->caption() ?><?php echo $ambulancias_edit->especial->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ambulancias_edit->RightColumnClass ?>"><div <?php echo $ambulancias_edit->especial->cellAttributes() ?>>
<span id="el_ambulancias_especial">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ambulancias" data-field="x_especial" data-value-separator="<?php echo $ambulancias_edit->especial->displayValueSeparatorAttribute() ?>" id="x_especial" name="x_especial"<?php echo $ambulancias_edit->especial->editAttributes() ?>>
			<?php echo $ambulancias_edit->especial->selectOptionListHtml("x_especial") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "especial_ambulancia") && !$ambulancias_edit->especial->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_especial" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ambulancias_edit->especial->caption() ?>" data-title="<?php echo $ambulancias_edit->especial->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_especial',url:'especial_ambulanciaaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ambulancias_edit->especial->Lookup->getParamTag($ambulancias_edit, "p_x_especial") ?>
</span>
<?php echo $ambulancias_edit->especial->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("mante_amb", explode(",", $ambulancias->getCurrentDetailTable())) && $mante_amb->DetailEdit) {
?>
<?php if ($ambulancias->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("mante_amb", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "mante_ambgrid.php" ?>
<?php } ?>
<?php if (!$ambulancias_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ambulancias_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ambulancias_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$ambulancias_edit->showPageFooter();
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
$ambulancias_edit->terminate();
?>