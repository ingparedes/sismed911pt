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
$hospitalesgeneral_add = new hospitalesgeneral_add();

// Run the page
$hospitalesgeneral_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospitalesgeneral_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fhospitalesgeneraladd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fhospitalesgeneraladd = currentForm = new ew.Form("fhospitalesgeneraladd", "add");

	// Validate form
	fhospitalesgeneraladd.validate = function() {
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
			<?php if ($hospitalesgeneral_add->id_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_id_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_add->id_hospital->caption(), $hospitalesgeneral_add->id_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_add->nombre_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_add->nombre_hospital->caption(), $hospitalesgeneral_add->nombre_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_add->depto_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_depto_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_add->depto_hospital->caption(), $hospitalesgeneral_add->depto_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_add->provincia_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_provincia_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_add->provincia_hospital->caption(), $hospitalesgeneral_add->provincia_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_add->municipio_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_municipio_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_add->municipio_hospital->caption(), $hospitalesgeneral_add->municipio_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_add->nivel_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_nivel_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_add->nivel_hospital->caption(), $hospitalesgeneral_add->nivel_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_add->camashab_cali->Required) { ?>
				elm = this.getElements("x" + infix + "_camashab_cali");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_add->camashab_cali->caption(), $hospitalesgeneral_add->camashab_cali->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_add->especialidad->Required) { ?>
				elm = this.getElements("x" + infix + "_especialidad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_add->especialidad->caption(), $hospitalesgeneral_add->especialidad->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_add->latitud_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_latitud_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_add->latitud_hospital->caption(), $hospitalesgeneral_add->latitud_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_add->longitud_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_longitud_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_add->longitud_hospital->caption(), $hospitalesgeneral_add->longitud_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_add->icon_hospital->Required) { ?>
				felm = this.getElements("x" + infix + "_icon_hospital");
				elm = this.getElements("fn_x" + infix + "_icon_hospital");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_add->icon_hospital->caption(), $hospitalesgeneral_add->icon_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_add->codpolitico->Required) { ?>
				elm = this.getElements("x" + infix + "_codpolitico");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_add->codpolitico->caption(), $hospitalesgeneral_add->codpolitico->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_add->direccion->Required) { ?>
				elm = this.getElements("x" + infix + "_direccion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_add->direccion->caption(), $hospitalesgeneral_add->direccion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_add->telefono->Required) { ?>
				elm = this.getElements("x" + infix + "_telefono");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_add->telefono->caption(), $hospitalesgeneral_add->telefono->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_add->nombre_responsable->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_responsable");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_add->nombre_responsable->caption(), $hospitalesgeneral_add->nombre_responsable->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_add->estado->Required) { ?>
				elm = this.getElements("x" + infix + "_estado[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_add->estado->caption(), $hospitalesgeneral_add->estado->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_add->emt->Required) { ?>
				elm = this.getElements("x" + infix + "_emt[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_add->emt->caption(), $hospitalesgeneral_add->emt->RequiredErrorMessage)) ?>");
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
	fhospitalesgeneraladd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fhospitalesgeneraladd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fhospitalesgeneraladd.lists["x_depto_hospital"] = <?php echo $hospitalesgeneral_add->depto_hospital->Lookup->toClientList($hospitalesgeneral_add) ?>;
	fhospitalesgeneraladd.lists["x_depto_hospital"].options = <?php echo JsonEncode($hospitalesgeneral_add->depto_hospital->lookupOptions()) ?>;
	fhospitalesgeneraladd.lists["x_provincia_hospital"] = <?php echo $hospitalesgeneral_add->provincia_hospital->Lookup->toClientList($hospitalesgeneral_add) ?>;
	fhospitalesgeneraladd.lists["x_provincia_hospital"].options = <?php echo JsonEncode($hospitalesgeneral_add->provincia_hospital->lookupOptions()) ?>;
	fhospitalesgeneraladd.lists["x_municipio_hospital"] = <?php echo $hospitalesgeneral_add->municipio_hospital->Lookup->toClientList($hospitalesgeneral_add) ?>;
	fhospitalesgeneraladd.lists["x_municipio_hospital"].options = <?php echo JsonEncode($hospitalesgeneral_add->municipio_hospital->lookupOptions()) ?>;
	fhospitalesgeneraladd.lists["x_especialidad"] = <?php echo $hospitalesgeneral_add->especialidad->Lookup->toClientList($hospitalesgeneral_add) ?>;
	fhospitalesgeneraladd.lists["x_especialidad"].options = <?php echo JsonEncode($hospitalesgeneral_add->especialidad->lookupOptions()) ?>;
	fhospitalesgeneraladd.lists["x_estado[]"] = <?php echo $hospitalesgeneral_add->estado->Lookup->toClientList($hospitalesgeneral_add) ?>;
	fhospitalesgeneraladd.lists["x_estado[]"].options = <?php echo JsonEncode($hospitalesgeneral_add->estado->options(FALSE, TRUE)) ?>;
	fhospitalesgeneraladd.lists["x_emt[]"] = <?php echo $hospitalesgeneral_add->emt->Lookup->toClientList($hospitalesgeneral_add) ?>;
	fhospitalesgeneraladd.lists["x_emt[]"].options = <?php echo JsonEncode($hospitalesgeneral_add->emt->options(FALSE, TRUE)) ?>;
	loadjs.done("fhospitalesgeneraladd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $hospitalesgeneral_add->showPageHeader(); ?>
<?php
$hospitalesgeneral_add->showMessage();
?>
<form name="fhospitalesgeneraladd" id="fhospitalesgeneraladd" class="<?php echo $hospitalesgeneral_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospitalesgeneral">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$hospitalesgeneral_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($hospitalesgeneral_add->id_hospital->Visible) { // id_hospital ?>
	<div id="r_id_hospital" class="form-group row">
		<label id="elh_hospitalesgeneral_id_hospital" for="x_id_hospital" class="<?php echo $hospitalesgeneral_add->LeftColumnClass ?>"><?php echo $hospitalesgeneral_add->id_hospital->caption() ?><?php echo $hospitalesgeneral_add->id_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_add->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_add->id_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_id_hospital">
<input type="text" data-table="hospitalesgeneral" data-field="x_id_hospital" name="x_id_hospital" id="x_id_hospital" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($hospitalesgeneral_add->id_hospital->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_add->id_hospital->EditValue ?>"<?php echo $hospitalesgeneral_add->id_hospital->editAttributes() ?>>
</span>
<?php echo $hospitalesgeneral_add->id_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_add->nombre_hospital->Visible) { // nombre_hospital ?>
	<div id="r_nombre_hospital" class="form-group row">
		<label id="elh_hospitalesgeneral_nombre_hospital" for="x_nombre_hospital" class="<?php echo $hospitalesgeneral_add->LeftColumnClass ?>"><?php echo $hospitalesgeneral_add->nombre_hospital->caption() ?><?php echo $hospitalesgeneral_add->nombre_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_add->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_add->nombre_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_nombre_hospital">
<input type="text" data-table="hospitalesgeneral" data-field="x_nombre_hospital" name="x_nombre_hospital" id="x_nombre_hospital" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospitalesgeneral_add->nombre_hospital->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_add->nombre_hospital->EditValue ?>"<?php echo $hospitalesgeneral_add->nombre_hospital->editAttributes() ?>>
</span>
<?php echo $hospitalesgeneral_add->nombre_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_add->depto_hospital->Visible) { // depto_hospital ?>
	<div id="r_depto_hospital" class="form-group row">
		<label id="elh_hospitalesgeneral_depto_hospital" for="x_depto_hospital" class="<?php echo $hospitalesgeneral_add->LeftColumnClass ?>"><?php echo $hospitalesgeneral_add->depto_hospital->caption() ?><?php echo $hospitalesgeneral_add->depto_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_add->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_add->depto_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_depto_hospital">
<?php $hospitalesgeneral_add->depto_hospital->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="hospitalesgeneral" data-field="x_depto_hospital" data-value-separator="<?php echo $hospitalesgeneral_add->depto_hospital->displayValueSeparatorAttribute() ?>" id="x_depto_hospital" name="x_depto_hospital"<?php echo $hospitalesgeneral_add->depto_hospital->editAttributes() ?>>
			<?php echo $hospitalesgeneral_add->depto_hospital->selectOptionListHtml("x_depto_hospital") ?>
		</select>
</div>
<?php echo $hospitalesgeneral_add->depto_hospital->Lookup->getParamTag($hospitalesgeneral_add, "p_x_depto_hospital") ?>
</span>
<?php echo $hospitalesgeneral_add->depto_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_add->provincia_hospital->Visible) { // provincia_hospital ?>
	<div id="r_provincia_hospital" class="form-group row">
		<label id="elh_hospitalesgeneral_provincia_hospital" for="x_provincia_hospital" class="<?php echo $hospitalesgeneral_add->LeftColumnClass ?>"><?php echo $hospitalesgeneral_add->provincia_hospital->caption() ?><?php echo $hospitalesgeneral_add->provincia_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_add->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_add->provincia_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_provincia_hospital">
<?php $hospitalesgeneral_add->provincia_hospital->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="hospitalesgeneral" data-field="x_provincia_hospital" data-value-separator="<?php echo $hospitalesgeneral_add->provincia_hospital->displayValueSeparatorAttribute() ?>" id="x_provincia_hospital" name="x_provincia_hospital"<?php echo $hospitalesgeneral_add->provincia_hospital->editAttributes() ?>>
			<?php echo $hospitalesgeneral_add->provincia_hospital->selectOptionListHtml("x_provincia_hospital") ?>
		</select>
</div>
<?php echo $hospitalesgeneral_add->provincia_hospital->Lookup->getParamTag($hospitalesgeneral_add, "p_x_provincia_hospital") ?>
</span>
<?php echo $hospitalesgeneral_add->provincia_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_add->municipio_hospital->Visible) { // municipio_hospital ?>
	<div id="r_municipio_hospital" class="form-group row">
		<label id="elh_hospitalesgeneral_municipio_hospital" for="x_municipio_hospital" class="<?php echo $hospitalesgeneral_add->LeftColumnClass ?>"><?php echo $hospitalesgeneral_add->municipio_hospital->caption() ?><?php echo $hospitalesgeneral_add->municipio_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_add->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_add->municipio_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_municipio_hospital">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="hospitalesgeneral" data-field="x_municipio_hospital" data-value-separator="<?php echo $hospitalesgeneral_add->municipio_hospital->displayValueSeparatorAttribute() ?>" id="x_municipio_hospital" name="x_municipio_hospital"<?php echo $hospitalesgeneral_add->municipio_hospital->editAttributes() ?>>
			<?php echo $hospitalesgeneral_add->municipio_hospital->selectOptionListHtml("x_municipio_hospital") ?>
		</select>
</div>
<?php echo $hospitalesgeneral_add->municipio_hospital->Lookup->getParamTag($hospitalesgeneral_add, "p_x_municipio_hospital") ?>
</span>
<?php echo $hospitalesgeneral_add->municipio_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_add->nivel_hospital->Visible) { // nivel_hospital ?>
	<div id="r_nivel_hospital" class="form-group row">
		<label id="elh_hospitalesgeneral_nivel_hospital" for="x_nivel_hospital" class="<?php echo $hospitalesgeneral_add->LeftColumnClass ?>"><?php echo $hospitalesgeneral_add->nivel_hospital->caption() ?><?php echo $hospitalesgeneral_add->nivel_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_add->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_add->nivel_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_nivel_hospital">
<input type="text" data-table="hospitalesgeneral" data-field="x_nivel_hospital" name="x_nivel_hospital" id="x_nivel_hospital" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospitalesgeneral_add->nivel_hospital->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_add->nivel_hospital->EditValue ?>"<?php echo $hospitalesgeneral_add->nivel_hospital->editAttributes() ?>>
</span>
<?php echo $hospitalesgeneral_add->nivel_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_add->camashab_cali->Visible) { // camashab_cali ?>
	<div id="r_camashab_cali" class="form-group row">
		<label id="elh_hospitalesgeneral_camashab_cali" for="x_camashab_cali" class="<?php echo $hospitalesgeneral_add->LeftColumnClass ?>"><?php echo $hospitalesgeneral_add->camashab_cali->caption() ?><?php echo $hospitalesgeneral_add->camashab_cali->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_add->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_add->camashab_cali->cellAttributes() ?>>
<span id="el_hospitalesgeneral_camashab_cali">
<input type="text" data-table="hospitalesgeneral" data-field="x_camashab_cali" name="x_camashab_cali" id="x_camashab_cali" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($hospitalesgeneral_add->camashab_cali->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_add->camashab_cali->EditValue ?>"<?php echo $hospitalesgeneral_add->camashab_cali->editAttributes() ?>>
</span>
<?php echo $hospitalesgeneral_add->camashab_cali->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_add->especialidad->Visible) { // especialidad ?>
	<div id="r_especialidad" class="form-group row">
		<label id="elh_hospitalesgeneral_especialidad" for="x_especialidad" class="<?php echo $hospitalesgeneral_add->LeftColumnClass ?>"><?php echo $hospitalesgeneral_add->especialidad->caption() ?><?php echo $hospitalesgeneral_add->especialidad->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_add->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_add->especialidad->cellAttributes() ?>>
<span id="el_hospitalesgeneral_especialidad">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="hospitalesgeneral" data-field="x_especialidad" data-value-separator="<?php echo $hospitalesgeneral_add->especialidad->displayValueSeparatorAttribute() ?>" id="x_especialidad" name="x_especialidad"<?php echo $hospitalesgeneral_add->especialidad->editAttributes() ?>>
			<?php echo $hospitalesgeneral_add->especialidad->selectOptionListHtml("x_especialidad") ?>
		</select>
</div>
<?php echo $hospitalesgeneral_add->especialidad->Lookup->getParamTag($hospitalesgeneral_add, "p_x_especialidad") ?>
</span>
<?php echo $hospitalesgeneral_add->especialidad->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_add->latitud_hospital->Visible) { // latitud_hospital ?>
	<div id="r_latitud_hospital" class="form-group row">
		<label id="elh_hospitalesgeneral_latitud_hospital" for="x_latitud_hospital" class="<?php echo $hospitalesgeneral_add->LeftColumnClass ?>"><?php echo $hospitalesgeneral_add->latitud_hospital->caption() ?><?php echo $hospitalesgeneral_add->latitud_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_add->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_add->latitud_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_latitud_hospital">
<input type="text" data-table="hospitalesgeneral" data-field="x_latitud_hospital" name="x_latitud_hospital" id="x_latitud_hospital" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($hospitalesgeneral_add->latitud_hospital->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_add->latitud_hospital->EditValue ?>"<?php echo $hospitalesgeneral_add->latitud_hospital->editAttributes() ?>>
</span>
<?php echo $hospitalesgeneral_add->latitud_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_add->longitud_hospital->Visible) { // longitud_hospital ?>
	<div id="r_longitud_hospital" class="form-group row">
		<label id="elh_hospitalesgeneral_longitud_hospital" for="x_longitud_hospital" class="<?php echo $hospitalesgeneral_add->LeftColumnClass ?>"><?php echo $hospitalesgeneral_add->longitud_hospital->caption() ?><?php echo $hospitalesgeneral_add->longitud_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_add->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_add->longitud_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_longitud_hospital">
<input type="text" data-table="hospitalesgeneral" data-field="x_longitud_hospital" name="x_longitud_hospital" id="x_longitud_hospital" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($hospitalesgeneral_add->longitud_hospital->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_add->longitud_hospital->EditValue ?>"<?php echo $hospitalesgeneral_add->longitud_hospital->editAttributes() ?>>
</span>
<?php echo $hospitalesgeneral_add->longitud_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_add->icon_hospital->Visible) { // icon_hospital ?>
	<div id="r_icon_hospital" class="form-group row">
		<label id="elh_hospitalesgeneral_icon_hospital" class="<?php echo $hospitalesgeneral_add->LeftColumnClass ?>"><?php echo $hospitalesgeneral_add->icon_hospital->caption() ?><?php echo $hospitalesgeneral_add->icon_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_add->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_add->icon_hospital->cellAttributes() ?>>
<span id="el_hospitalesgeneral_icon_hospital">
<div id="fd_x_icon_hospital">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $hospitalesgeneral_add->icon_hospital->title() ?>" data-table="hospitalesgeneral" data-field="x_icon_hospital" name="x_icon_hospital" id="x_icon_hospital" lang="<?php echo CurrentLanguageID() ?>"<?php echo $hospitalesgeneral_add->icon_hospital->editAttributes() ?><?php if ($hospitalesgeneral_add->icon_hospital->ReadOnly || $hospitalesgeneral_add->icon_hospital->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_icon_hospital"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_icon_hospital" id= "fn_x_icon_hospital" value="<?php echo $hospitalesgeneral_add->icon_hospital->Upload->FileName ?>">
<input type="hidden" name="fa_x_icon_hospital" id= "fa_x_icon_hospital" value="0">
<input type="hidden" name="fs_x_icon_hospital" id= "fs_x_icon_hospital" value="20">
<input type="hidden" name="fx_x_icon_hospital" id= "fx_x_icon_hospital" value="<?php echo $hospitalesgeneral_add->icon_hospital->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_icon_hospital" id= "fm_x_icon_hospital" value="<?php echo $hospitalesgeneral_add->icon_hospital->UploadMaxFileSize ?>">
</div>
<table id="ft_x_icon_hospital" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $hospitalesgeneral_add->icon_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_add->codpolitico->Visible) { // codpolitico ?>
	<div id="r_codpolitico" class="form-group row">
		<label id="elh_hospitalesgeneral_codpolitico" for="x_codpolitico" class="<?php echo $hospitalesgeneral_add->LeftColumnClass ?>"><?php echo $hospitalesgeneral_add->codpolitico->caption() ?><?php echo $hospitalesgeneral_add->codpolitico->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_add->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_add->codpolitico->cellAttributes() ?>>
<span id="el_hospitalesgeneral_codpolitico">
<input type="text" data-table="hospitalesgeneral" data-field="x_codpolitico" name="x_codpolitico" id="x_codpolitico" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($hospitalesgeneral_add->codpolitico->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_add->codpolitico->EditValue ?>"<?php echo $hospitalesgeneral_add->codpolitico->editAttributes() ?>>
</span>
<?php echo $hospitalesgeneral_add->codpolitico->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_add->direccion->Visible) { // direccion ?>
	<div id="r_direccion" class="form-group row">
		<label id="elh_hospitalesgeneral_direccion" for="x_direccion" class="<?php echo $hospitalesgeneral_add->LeftColumnClass ?>"><?php echo $hospitalesgeneral_add->direccion->caption() ?><?php echo $hospitalesgeneral_add->direccion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_add->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_add->direccion->cellAttributes() ?>>
<span id="el_hospitalesgeneral_direccion">
<textarea data-table="hospitalesgeneral" data-field="x_direccion" name="x_direccion" id="x_direccion" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hospitalesgeneral_add->direccion->getPlaceHolder()) ?>"<?php echo $hospitalesgeneral_add->direccion->editAttributes() ?>><?php echo $hospitalesgeneral_add->direccion->EditValue ?></textarea>
</span>
<?php echo $hospitalesgeneral_add->direccion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_add->telefono->Visible) { // telefono ?>
	<div id="r_telefono" class="form-group row">
		<label id="elh_hospitalesgeneral_telefono" for="x_telefono" class="<?php echo $hospitalesgeneral_add->LeftColumnClass ?>"><?php echo $hospitalesgeneral_add->telefono->caption() ?><?php echo $hospitalesgeneral_add->telefono->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_add->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_add->telefono->cellAttributes() ?>>
<span id="el_hospitalesgeneral_telefono">
<input type="text" data-table="hospitalesgeneral" data-field="x_telefono" name="x_telefono" id="x_telefono" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($hospitalesgeneral_add->telefono->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_add->telefono->EditValue ?>"<?php echo $hospitalesgeneral_add->telefono->editAttributes() ?>>
</span>
<?php echo $hospitalesgeneral_add->telefono->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_add->nombre_responsable->Visible) { // nombre_responsable ?>
	<div id="r_nombre_responsable" class="form-group row">
		<label id="elh_hospitalesgeneral_nombre_responsable" for="x_nombre_responsable" class="<?php echo $hospitalesgeneral_add->LeftColumnClass ?>"><?php echo $hospitalesgeneral_add->nombre_responsable->caption() ?><?php echo $hospitalesgeneral_add->nombre_responsable->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_add->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_add->nombre_responsable->cellAttributes() ?>>
<span id="el_hospitalesgeneral_nombre_responsable">
<input type="text" data-table="hospitalesgeneral" data-field="x_nombre_responsable" name="x_nombre_responsable" id="x_nombre_responsable" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospitalesgeneral_add->nombre_responsable->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_add->nombre_responsable->EditValue ?>"<?php echo $hospitalesgeneral_add->nombre_responsable->editAttributes() ?>>
</span>
<?php echo $hospitalesgeneral_add->nombre_responsable->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_add->estado->Visible) { // estado ?>
	<div id="r_estado" class="form-group row">
		<label id="elh_hospitalesgeneral_estado" class="<?php echo $hospitalesgeneral_add->LeftColumnClass ?>"><?php echo $hospitalesgeneral_add->estado->caption() ?><?php echo $hospitalesgeneral_add->estado->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_add->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_add->estado->cellAttributes() ?>>
<span id="el_hospitalesgeneral_estado">
<?php
$selwrk = ConvertToBool($hospitalesgeneral_add->estado->CurrentValue) ? " checked" : "";
?>
<div class="custom-control custom-checkbox d-inline-block">
	<input type="checkbox" class="custom-control-input" data-table="hospitalesgeneral" data-field="x_estado" name="x_estado[]" id="x_estado[]_682016" value="1"<?php echo $selwrk ?><?php echo $hospitalesgeneral_add->estado->editAttributes() ?>>
	<label class="custom-control-label" for="x_estado[]_682016"></label>
</div>
</span>
<?php echo $hospitalesgeneral_add->estado->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_add->emt->Visible) { // emt ?>
	<div id="r_emt" class="form-group row">
		<label id="elh_hospitalesgeneral_emt" class="<?php echo $hospitalesgeneral_add->LeftColumnClass ?>"><?php echo $hospitalesgeneral_add->emt->caption() ?><?php echo $hospitalesgeneral_add->emt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $hospitalesgeneral_add->RightColumnClass ?>"><div <?php echo $hospitalesgeneral_add->emt->cellAttributes() ?>>
<span id="el_hospitalesgeneral_emt">
<?php
$selwrk = ConvertToBool($hospitalesgeneral_add->emt->CurrentValue) ? " checked" : "";
?>
<div class="custom-control custom-checkbox d-inline-block">
	<input type="checkbox" class="custom-control-input" data-table="hospitalesgeneral" data-field="x_emt" name="x_emt[]" id="x_emt[]_444634" value="1"<?php echo $selwrk ?><?php echo $hospitalesgeneral_add->emt->editAttributes() ?>>
	<label class="custom-control-label" for="x_emt[]_444634"></label>
</div>
</span>
<?php echo $hospitalesgeneral_add->emt->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("camas_hospital", explode(",", $hospitalesgeneral->getCurrentDetailTable())) && $camas_hospital->DetailAdd) {
?>
<?php if ($hospitalesgeneral->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("camas_hospital", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "camas_hospitalgrid.php" ?>
<?php } ?>
<?php if (!$hospitalesgeneral_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $hospitalesgeneral_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hospitalesgeneral_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$hospitalesgeneral_add->showPageFooter();
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
$hospitalesgeneral_add->terminate();
?>