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
$hospitalesgeneral_edit = new hospitalesgeneral_edit();

// Run the page
$hospitalesgeneral_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospitalesgeneral_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fhospitalesgeneraledit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fhospitalesgeneraledit = currentForm = new ew.Form("fhospitalesgeneraledit", "edit");

	// Validate form
	fhospitalesgeneraledit.validate = function() {
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
			<?php if ($hospitalesgeneral_edit->id_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_id_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_edit->id_hospital->caption(), $hospitalesgeneral_edit->id_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_edit->nombre_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_edit->nombre_hospital->caption(), $hospitalesgeneral_edit->nombre_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_edit->depto_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_depto_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_edit->depto_hospital->caption(), $hospitalesgeneral_edit->depto_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_edit->provincia_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_provincia_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_edit->provincia_hospital->caption(), $hospitalesgeneral_edit->provincia_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_edit->municipio_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_municipio_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_edit->municipio_hospital->caption(), $hospitalesgeneral_edit->municipio_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_edit->nivel_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_nivel_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_edit->nivel_hospital->caption(), $hospitalesgeneral_edit->nivel_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_edit->redservicions_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_redservicions_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_edit->redservicions_hospital->caption(), $hospitalesgeneral_edit->redservicions_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_edit->sector_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_sector_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_edit->sector_hospital->caption(), $hospitalesgeneral_edit->sector_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_edit->tipo_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_tipo_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_edit->tipo_hospital->caption(), $hospitalesgeneral_edit->tipo_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_edit->camashab_cali->Required) { ?>
				elm = this.getElements("x" + infix + "_camashab_cali");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_edit->camashab_cali->caption(), $hospitalesgeneral_edit->camashab_cali->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_edit->especialidad->Required) { ?>
				elm = this.getElements("x" + infix + "_especialidad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_edit->especialidad->caption(), $hospitalesgeneral_edit->especialidad->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_edit->latitud_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_latitud_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_edit->latitud_hospital->caption(), $hospitalesgeneral_edit->latitud_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_edit->longitud_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_longitud_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_edit->longitud_hospital->caption(), $hospitalesgeneral_edit->longitud_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_edit->icon_hospital->Required) { ?>
				felm = this.getElements("x" + infix + "_icon_hospital");
				elm = this.getElements("fn_x" + infix + "_icon_hospital");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_edit->icon_hospital->caption(), $hospitalesgeneral_edit->icon_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_edit->codpolitico->Required) { ?>
				elm = this.getElements("x" + infix + "_codpolitico");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_edit->codpolitico->caption(), $hospitalesgeneral_edit->codpolitico->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_edit->direccion->Required) { ?>
				elm = this.getElements("x" + infix + "_direccion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_edit->direccion->caption(), $hospitalesgeneral_edit->direccion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_edit->telefono->Required) { ?>
				elm = this.getElements("x" + infix + "_telefono");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_edit->telefono->caption(), $hospitalesgeneral_edit->telefono->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_edit->nombre_responsable->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_responsable");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_edit->nombre_responsable->caption(), $hospitalesgeneral_edit->nombre_responsable->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_edit->estado->Required) { ?>
				elm = this.getElements("x" + infix + "_estado[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_edit->estado->caption(), $hospitalesgeneral_edit->estado->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_edit->emt->Required) { ?>
				elm = this.getElements("x" + infix + "_emt[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_edit->emt->caption(), $hospitalesgeneral_edit->emt->RequiredErrorMessage)) ?>");
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
	fhospitalesgeneraledit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fhospitalesgeneraledit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fhospitalesgeneraledit.lists["x_depto_hospital"] = <?php echo $hospitalesgeneral_edit->depto_hospital->Lookup->toClientList($hospitalesgeneral_edit) ?>;
	fhospitalesgeneraledit.lists["x_depto_hospital"].options = <?php echo JsonEncode($hospitalesgeneral_edit->depto_hospital->lookupOptions()) ?>;
	fhospitalesgeneraledit.lists["x_provincia_hospital"] = <?php echo $hospitalesgeneral_edit->provincia_hospital->Lookup->toClientList($hospitalesgeneral_edit) ?>;
	fhospitalesgeneraledit.lists["x_provincia_hospital"].options = <?php echo JsonEncode($hospitalesgeneral_edit->provincia_hospital->lookupOptions()) ?>;
	fhospitalesgeneraledit.lists["x_municipio_hospital"] = <?php echo $hospitalesgeneral_edit->municipio_hospital->Lookup->toClientList($hospitalesgeneral_edit) ?>;
	fhospitalesgeneraledit.lists["x_municipio_hospital"].options = <?php echo JsonEncode($hospitalesgeneral_edit->municipio_hospital->lookupOptions()) ?>;
	fhospitalesgeneraledit.lists["x_especialidad"] = <?php echo $hospitalesgeneral_edit->especialidad->Lookup->toClientList($hospitalesgeneral_edit) ?>;
	fhospitalesgeneraledit.lists["x_especialidad"].options = <?php echo JsonEncode($hospitalesgeneral_edit->especialidad->lookupOptions()) ?>;
	fhospitalesgeneraledit.lists["x_estado[]"] = <?php echo $hospitalesgeneral_edit->estado->Lookup->toClientList($hospitalesgeneral_edit) ?>;
	fhospitalesgeneraledit.lists["x_estado[]"].options = <?php echo JsonEncode($hospitalesgeneral_edit->estado->options(FALSE, TRUE)) ?>;
	fhospitalesgeneraledit.lists["x_emt[]"] = <?php echo $hospitalesgeneral_edit->emt->Lookup->toClientList($hospitalesgeneral_edit) ?>;
	fhospitalesgeneraledit.lists["x_emt[]"].options = <?php echo JsonEncode($hospitalesgeneral_edit->emt->options(FALSE, TRUE)) ?>;
	loadjs.done("fhospitalesgeneraledit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $hospitalesgeneral_edit->showPageHeader(); ?>
<?php
$hospitalesgeneral_edit->showMessage();
?>
<form name="fhospitalesgeneraledit" id="fhospitalesgeneraledit" class="<?php echo $hospitalesgeneral_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospitalesgeneral">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$hospitalesgeneral_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($hospitalesgeneral_edit->id_hospital->Visible) { // id_hospital ?>
	<div id="r_id_hospital" class="form-group row">
		<label id="elh_hospitalesgeneral_id_hospital" for="x_id_hospital" class="<?php echo $hospitalesgeneral_edit->LeftColumnClass ?>"><?php echo $hospitalesgeneral_edit->id_hospital->caption() ?><?php echo $hospitalesgeneral_edit->id_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_edit->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_edit->id_hospital->cellAttributes() ?>>
<input type="text" data-table="hospitalesgeneral" data-field="x_id_hospital" name="x_id_hospital" id="x_id_hospital" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($hospitalesgeneral_edit->id_hospital->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_edit->id_hospital->EditValue ?>"<?php echo $hospitalesgeneral_edit->id_hospital->editAttributes() ?>>
<input type="hidden" data-table="hospitalesgeneral" data-field="x_id_hospital" name="o_id_hospital" id="o_id_hospital" value="<?php echo HtmlEncode($hospitalesgeneral_edit->id_hospital->OldValue != null ? $hospitalesgeneral_edit->id_hospital->OldValue : $hospitalesgeneral_edit->id_hospital->CurrentValue) ?>">
<?php echo $hospitalesgeneral_edit->id_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_edit->nombre_hospital->Visible) { // nombre_hospital ?>
	<div id="r_nombre_hospital" class="form-group row">
		<label id="elh_hospitalesgeneral_nombre_hospital" for="x_nombre_hospital" class="<?php echo $hospitalesgeneral_edit->LeftColumnClass ?>"><?php echo $hospitalesgeneral_edit->nombre_hospital->caption() ?><?php echo $hospitalesgeneral_edit->nombre_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_edit->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_edit->nombre_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_nombre_hospital">
<input type="text" data-table="hospitalesgeneral" data-field="x_nombre_hospital" name="x_nombre_hospital" id="x_nombre_hospital" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospitalesgeneral_edit->nombre_hospital->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_edit->nombre_hospital->EditValue ?>"<?php echo $hospitalesgeneral_edit->nombre_hospital->editAttributes() ?>>
</span>
<?php echo $hospitalesgeneral_edit->nombre_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_edit->depto_hospital->Visible) { // depto_hospital ?>
	<div id="r_depto_hospital" class="form-group row">
		<label id="elh_hospitalesgeneral_depto_hospital" for="x_depto_hospital" class="<?php echo $hospitalesgeneral_edit->LeftColumnClass ?>"><?php echo $hospitalesgeneral_edit->depto_hospital->caption() ?><?php echo $hospitalesgeneral_edit->depto_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_edit->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_edit->depto_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_depto_hospital">
<?php $hospitalesgeneral_edit->depto_hospital->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="hospitalesgeneral" data-field="x_depto_hospital" data-value-separator="<?php echo $hospitalesgeneral_edit->depto_hospital->displayValueSeparatorAttribute() ?>" id="x_depto_hospital" name="x_depto_hospital"<?php echo $hospitalesgeneral_edit->depto_hospital->editAttributes() ?>>
			<?php echo $hospitalesgeneral_edit->depto_hospital->selectOptionListHtml("x_depto_hospital") ?>
		</select>
</div>
<?php echo $hospitalesgeneral_edit->depto_hospital->Lookup->getParamTag($hospitalesgeneral_edit, "p_x_depto_hospital") ?>
</span>
<?php echo $hospitalesgeneral_edit->depto_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_edit->provincia_hospital->Visible) { // provincia_hospital ?>
	<div id="r_provincia_hospital" class="form-group row">
		<label id="elh_hospitalesgeneral_provincia_hospital" for="x_provincia_hospital" class="<?php echo $hospitalesgeneral_edit->LeftColumnClass ?>"><?php echo $hospitalesgeneral_edit->provincia_hospital->caption() ?><?php echo $hospitalesgeneral_edit->provincia_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_edit->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_edit->provincia_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_provincia_hospital">
<?php $hospitalesgeneral_edit->provincia_hospital->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="hospitalesgeneral" data-field="x_provincia_hospital" data-value-separator="<?php echo $hospitalesgeneral_edit->provincia_hospital->displayValueSeparatorAttribute() ?>" id="x_provincia_hospital" name="x_provincia_hospital"<?php echo $hospitalesgeneral_edit->provincia_hospital->editAttributes() ?>>
			<?php echo $hospitalesgeneral_edit->provincia_hospital->selectOptionListHtml("x_provincia_hospital") ?>
		</select>
</div>
<?php echo $hospitalesgeneral_edit->provincia_hospital->Lookup->getParamTag($hospitalesgeneral_edit, "p_x_provincia_hospital") ?>
</span>
<?php echo $hospitalesgeneral_edit->provincia_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_edit->municipio_hospital->Visible) { // municipio_hospital ?>
	<div id="r_municipio_hospital" class="form-group row">
		<label id="elh_hospitalesgeneral_municipio_hospital" for="x_municipio_hospital" class="<?php echo $hospitalesgeneral_edit->LeftColumnClass ?>"><?php echo $hospitalesgeneral_edit->municipio_hospital->caption() ?><?php echo $hospitalesgeneral_edit->municipio_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_edit->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_edit->municipio_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_municipio_hospital">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="hospitalesgeneral" data-field="x_municipio_hospital" data-value-separator="<?php echo $hospitalesgeneral_edit->municipio_hospital->displayValueSeparatorAttribute() ?>" id="x_municipio_hospital" name="x_municipio_hospital"<?php echo $hospitalesgeneral_edit->municipio_hospital->editAttributes() ?>>
			<?php echo $hospitalesgeneral_edit->municipio_hospital->selectOptionListHtml("x_municipio_hospital") ?>
		</select>
</div>
<?php echo $hospitalesgeneral_edit->municipio_hospital->Lookup->getParamTag($hospitalesgeneral_edit, "p_x_municipio_hospital") ?>
</span>
<?php echo $hospitalesgeneral_edit->municipio_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_edit->nivel_hospital->Visible) { // nivel_hospital ?>
	<div id="r_nivel_hospital" class="form-group row">
		<label id="elh_hospitalesgeneral_nivel_hospital" for="x_nivel_hospital" class="<?php echo $hospitalesgeneral_edit->LeftColumnClass ?>"><?php echo $hospitalesgeneral_edit->nivel_hospital->caption() ?><?php echo $hospitalesgeneral_edit->nivel_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_edit->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_edit->nivel_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_nivel_hospital">
<input type="text" data-table="hospitalesgeneral" data-field="x_nivel_hospital" name="x_nivel_hospital" id="x_nivel_hospital" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospitalesgeneral_edit->nivel_hospital->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_edit->nivel_hospital->EditValue ?>"<?php echo $hospitalesgeneral_edit->nivel_hospital->editAttributes() ?>>
</span>
<?php echo $hospitalesgeneral_edit->nivel_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_edit->redservicions_hospital->Visible) { // redservicions_hospital ?>
	<div id="r_redservicions_hospital" class="form-group row">
		<label id="elh_hospitalesgeneral_redservicions_hospital" for="x_redservicions_hospital" class="<?php echo $hospitalesgeneral_edit->LeftColumnClass ?>"><?php echo $hospitalesgeneral_edit->redservicions_hospital->caption() ?><?php echo $hospitalesgeneral_edit->redservicions_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_edit->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_edit->redservicions_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_redservicions_hospital">
<input type="text" data-table="hospitalesgeneral" data-field="x_redservicions_hospital" name="x_redservicions_hospital" id="x_redservicions_hospital" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($hospitalesgeneral_edit->redservicions_hospital->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_edit->redservicions_hospital->EditValue ?>"<?php echo $hospitalesgeneral_edit->redservicions_hospital->editAttributes() ?>>
</span>
<?php echo $hospitalesgeneral_edit->redservicions_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_edit->sector_hospital->Visible) { // sector_hospital ?>
	<div id="r_sector_hospital" class="form-group row">
		<label id="elh_hospitalesgeneral_sector_hospital" for="x_sector_hospital" class="<?php echo $hospitalesgeneral_edit->LeftColumnClass ?>"><?php echo $hospitalesgeneral_edit->sector_hospital->caption() ?><?php echo $hospitalesgeneral_edit->sector_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_edit->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_edit->sector_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_sector_hospital">
<input type="text" data-table="hospitalesgeneral" data-field="x_sector_hospital" name="x_sector_hospital" id="x_sector_hospital" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($hospitalesgeneral_edit->sector_hospital->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_edit->sector_hospital->EditValue ?>"<?php echo $hospitalesgeneral_edit->sector_hospital->editAttributes() ?>>
</span>
<?php echo $hospitalesgeneral_edit->sector_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_edit->tipo_hospital->Visible) { // tipo_hospital ?>
	<div id="r_tipo_hospital" class="form-group row">
		<label id="elh_hospitalesgeneral_tipo_hospital" for="x_tipo_hospital" class="<?php echo $hospitalesgeneral_edit->LeftColumnClass ?>"><?php echo $hospitalesgeneral_edit->tipo_hospital->caption() ?><?php echo $hospitalesgeneral_edit->tipo_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_edit->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_edit->tipo_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_tipo_hospital">
<input type="text" data-table="hospitalesgeneral" data-field="x_tipo_hospital" name="x_tipo_hospital" id="x_tipo_hospital" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospitalesgeneral_edit->tipo_hospital->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_edit->tipo_hospital->EditValue ?>"<?php echo $hospitalesgeneral_edit->tipo_hospital->editAttributes() ?>>
</span>
<?php echo $hospitalesgeneral_edit->tipo_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_edit->camashab_cali->Visible) { // camashab_cali ?>
	<div id="r_camashab_cali" class="form-group row">
		<label id="elh_hospitalesgeneral_camashab_cali" for="x_camashab_cali" class="<?php echo $hospitalesgeneral_edit->LeftColumnClass ?>"><?php echo $hospitalesgeneral_edit->camashab_cali->caption() ?><?php echo $hospitalesgeneral_edit->camashab_cali->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_edit->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_edit->camashab_cali->cellAttributes() ?>>
<span id="el_hospitalesgeneral_camashab_cali">
<input type="text" data-table="hospitalesgeneral" data-field="x_camashab_cali" name="x_camashab_cali" id="x_camashab_cali" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($hospitalesgeneral_edit->camashab_cali->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_edit->camashab_cali->EditValue ?>"<?php echo $hospitalesgeneral_edit->camashab_cali->editAttributes() ?>>
</span>
<?php echo $hospitalesgeneral_edit->camashab_cali->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_edit->especialidad->Visible) { // especialidad ?>
	<div id="r_especialidad" class="form-group row">
		<label id="elh_hospitalesgeneral_especialidad" for="x_especialidad" class="<?php echo $hospitalesgeneral_edit->LeftColumnClass ?>"><?php echo $hospitalesgeneral_edit->especialidad->caption() ?><?php echo $hospitalesgeneral_edit->especialidad->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_edit->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_edit->especialidad->cellAttributes() ?>>
<span id="el_hospitalesgeneral_especialidad">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="hospitalesgeneral" data-field="x_especialidad" data-value-separator="<?php echo $hospitalesgeneral_edit->especialidad->displayValueSeparatorAttribute() ?>" id="x_especialidad" name="x_especialidad"<?php echo $hospitalesgeneral_edit->especialidad->editAttributes() ?>>
			<?php echo $hospitalesgeneral_edit->especialidad->selectOptionListHtml("x_especialidad") ?>
		</select>
</div>
<?php echo $hospitalesgeneral_edit->especialidad->Lookup->getParamTag($hospitalesgeneral_edit, "p_x_especialidad") ?>
</span>
<?php echo $hospitalesgeneral_edit->especialidad->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_edit->latitud_hospital->Visible) { // latitud_hospital ?>
	<div id="r_latitud_hospital" class="form-group row">
		<label id="elh_hospitalesgeneral_latitud_hospital" for="x_latitud_hospital" class="<?php echo $hospitalesgeneral_edit->LeftColumnClass ?>"><?php echo $hospitalesgeneral_edit->latitud_hospital->caption() ?><?php echo $hospitalesgeneral_edit->latitud_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_edit->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_edit->latitud_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_latitud_hospital">
<input type="text" data-table="hospitalesgeneral" data-field="x_latitud_hospital" name="x_latitud_hospital" id="x_latitud_hospital" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($hospitalesgeneral_edit->latitud_hospital->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_edit->latitud_hospital->EditValue ?>"<?php echo $hospitalesgeneral_edit->latitud_hospital->editAttributes() ?>>
</span>
<?php echo $hospitalesgeneral_edit->latitud_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_edit->longitud_hospital->Visible) { // longitud_hospital ?>
	<div id="r_longitud_hospital" class="form-group row">
		<label id="elh_hospitalesgeneral_longitud_hospital" for="x_longitud_hospital" class="<?php echo $hospitalesgeneral_edit->LeftColumnClass ?>"><?php echo $hospitalesgeneral_edit->longitud_hospital->caption() ?><?php echo $hospitalesgeneral_edit->longitud_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_edit->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_edit->longitud_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_longitud_hospital">
<input type="text" data-table="hospitalesgeneral" data-field="x_longitud_hospital" name="x_longitud_hospital" id="x_longitud_hospital" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($hospitalesgeneral_edit->longitud_hospital->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_edit->longitud_hospital->EditValue ?>"<?php echo $hospitalesgeneral_edit->longitud_hospital->editAttributes() ?>>
</span>
<?php echo $hospitalesgeneral_edit->longitud_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_edit->icon_hospital->Visible) { // icon_hospital ?>
	<div id="r_icon_hospital" class="form-group row">
		<label id="elh_hospitalesgeneral_icon_hospital" class="<?php echo $hospitalesgeneral_edit->LeftColumnClass ?>"><?php echo $hospitalesgeneral_edit->icon_hospital->caption() ?><?php echo $hospitalesgeneral_edit->icon_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_edit->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_edit->icon_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_icon_hospital">
<div id="fd_x_icon_hospital">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $hospitalesgeneral_edit->icon_hospital->title() ?>" data-table="hospitalesgeneral" data-field="x_icon_hospital" name="x_icon_hospital" id="x_icon_hospital" lang="<?php echo CurrentLanguageID() ?>"<?php echo $hospitalesgeneral_edit->icon_hospital->editAttributes() ?><?php if ($hospitalesgeneral_edit->icon_hospital->ReadOnly || $hospitalesgeneral_edit->icon_hospital->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_icon_hospital"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_icon_hospital" id= "fn_x_icon_hospital" value="<?php echo $hospitalesgeneral_edit->icon_hospital->Upload->FileName ?>">
<input type="hidden" name="fa_x_icon_hospital" id= "fa_x_icon_hospital" value="<?php echo (Post("fa_x_icon_hospital") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x_icon_hospital" id= "fs_x_icon_hospital" value="20">
<input type="hidden" name="fx_x_icon_hospital" id= "fx_x_icon_hospital" value="<?php echo $hospitalesgeneral_edit->icon_hospital->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_icon_hospital" id= "fm_x_icon_hospital" value="<?php echo $hospitalesgeneral_edit->icon_hospital->UploadMaxFileSize ?>">
</div>
<table id="ft_x_icon_hospital" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $hospitalesgeneral_edit->icon_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_edit->codpolitico->Visible) { // codpolitico ?>
	<div id="r_codpolitico" class="form-group row">
		<label id="elh_hospitalesgeneral_codpolitico" for="x_codpolitico" class="<?php echo $hospitalesgeneral_edit->LeftColumnClass ?>"><?php echo $hospitalesgeneral_edit->codpolitico->caption() ?><?php echo $hospitalesgeneral_edit->codpolitico->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_edit->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_edit->codpolitico->cellAttributes() ?>>
<span id="el_hospitalesgeneral_codpolitico">
<input type="text" data-table="hospitalesgeneral" data-field="x_codpolitico" name="x_codpolitico" id="x_codpolitico" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($hospitalesgeneral_edit->codpolitico->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_edit->codpolitico->EditValue ?>"<?php echo $hospitalesgeneral_edit->codpolitico->editAttributes() ?>>
</span>
<?php echo $hospitalesgeneral_edit->codpolitico->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_edit->direccion->Visible) { // direccion ?>
	<div id="r_direccion" class="form-group row">
		<label id="elh_hospitalesgeneral_direccion" for="x_direccion" class="<?php echo $hospitalesgeneral_edit->LeftColumnClass ?>"><?php echo $hospitalesgeneral_edit->direccion->caption() ?><?php echo $hospitalesgeneral_edit->direccion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_edit->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_edit->direccion->cellAttributes() ?>>
<span id="el_hospitalesgeneral_direccion">
<textarea data-table="hospitalesgeneral" data-field="x_direccion" name="x_direccion" id="x_direccion" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hospitalesgeneral_edit->direccion->getPlaceHolder()) ?>"<?php echo $hospitalesgeneral_edit->direccion->editAttributes() ?>><?php echo $hospitalesgeneral_edit->direccion->EditValue ?></textarea>
</span>
<?php echo $hospitalesgeneral_edit->direccion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_edit->telefono->Visible) { // telefono ?>
	<div id="r_telefono" class="form-group row">
		<label id="elh_hospitalesgeneral_telefono" for="x_telefono" class="<?php echo $hospitalesgeneral_edit->LeftColumnClass ?>"><?php echo $hospitalesgeneral_edit->telefono->caption() ?><?php echo $hospitalesgeneral_edit->telefono->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_edit->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_edit->telefono->cellAttributes() ?>>
<span id="el_hospitalesgeneral_telefono">
<input type="text" data-table="hospitalesgeneral" data-field="x_telefono" name="x_telefono" id="x_telefono" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($hospitalesgeneral_edit->telefono->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_edit->telefono->EditValue ?>"<?php echo $hospitalesgeneral_edit->telefono->editAttributes() ?>>
</span>
<?php echo $hospitalesgeneral_edit->telefono->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_edit->nombre_responsable->Visible) { // nombre_responsable ?>
	<div id="r_nombre_responsable" class="form-group row">
		<label id="elh_hospitalesgeneral_nombre_responsable" for="x_nombre_responsable" class="<?php echo $hospitalesgeneral_edit->LeftColumnClass ?>"><?php echo $hospitalesgeneral_edit->nombre_responsable->caption() ?><?php echo $hospitalesgeneral_edit->nombre_responsable->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_edit->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_edit->nombre_responsable->cellAttributes() ?>>
<span id="el_hospitalesgeneral_nombre_responsable">
<input type="text" data-table="hospitalesgeneral" data-field="x_nombre_responsable" name="x_nombre_responsable" id="x_nombre_responsable" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospitalesgeneral_edit->nombre_responsable->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_edit->nombre_responsable->EditValue ?>"<?php echo $hospitalesgeneral_edit->nombre_responsable->editAttributes() ?>>
</span>
<?php echo $hospitalesgeneral_edit->nombre_responsable->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_edit->estado->Visible) { // estado ?>
	<div id="r_estado" class="form-group row">
		<label id="elh_hospitalesgeneral_estado" class="<?php echo $hospitalesgeneral_edit->LeftColumnClass ?>"><?php echo $hospitalesgeneral_edit->estado->caption() ?><?php echo $hospitalesgeneral_edit->estado->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_edit->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_edit->estado->cellAttributes() ?>>
<span id="el_hospitalesgeneral_estado">
<?php
$selwrk = ConvertToBool($hospitalesgeneral_edit->estado->CurrentValue) ? " checked" : "";
?>
<div class="custom-control custom-checkbox d-inline-block">
	<input type="checkbox" class="custom-control-input" data-table="hospitalesgeneral" data-field="x_estado" name="x_estado[]" id="x_estado[]_271000" value="1"<?php echo $selwrk ?><?php echo $hospitalesgeneral_edit->estado->editAttributes() ?>>
	<label class="custom-control-label" for="x_estado[]_271000"></label>
</div>
</span>
<?php echo $hospitalesgeneral_edit->estado->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_edit->emt->Visible) { // emt ?>
	<div id="r_emt" class="form-group row">
		<label id="elh_hospitalesgeneral_emt" class="<?php echo $hospitalesgeneral_edit->LeftColumnClass ?>"><?php echo $hospitalesgeneral_edit->emt->caption() ?><?php echo $hospitalesgeneral_edit->emt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_edit->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_edit->emt->cellAttributes() ?>>
<span id="el_hospitalesgeneral_emt">
<?php
$selwrk = ConvertToBool($hospitalesgeneral_edit->emt->CurrentValue) ? " checked" : "";
?>
<div class="custom-control custom-checkbox d-inline-block">
	<input type="checkbox" class="custom-control-input" data-table="hospitalesgeneral" data-field="x_emt" name="x_emt[]" id="x_emt[]_677141" value="1"<?php echo $selwrk ?><?php echo $hospitalesgeneral_edit->emt->editAttributes() ?>>
	<label class="custom-control-label" for="x_emt[]_677141"></label>
</div>
</span>
<?php echo $hospitalesgeneral_edit->emt->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("camas_hospital", explode(",", $hospitalesgeneral->getCurrentDetailTable())) && $camas_hospital->DetailEdit) {
?>
<?php if ($hospitalesgeneral->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("camas_hospital", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "camas_hospitalgrid.php" ?>
<?php } ?>
<?php if (!$hospitalesgeneral_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hospitalesgeneral_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hospitalesgeneral_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hospitalesgeneral_edit->showPageFooter();
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
$hospitalesgeneral_edit->terminate();
?>