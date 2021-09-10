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
$hospitalesgeneral_addopt = new hospitalesgeneral_addopt();

// Run the page
$hospitalesgeneral_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospitalesgeneral_addopt->Page_Render();
?>
<script>
var fhospitalesgeneraladdopt, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "addopt";
	fhospitalesgeneraladdopt = currentForm = new ew.Form("fhospitalesgeneraladdopt", "addopt");

	// Validate form
	fhospitalesgeneraladdopt.validate = function() {
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
			<?php if ($hospitalesgeneral_addopt->id_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_id_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_addopt->id_hospital->caption(), $hospitalesgeneral_addopt->id_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_addopt->nombre_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_addopt->nombre_hospital->caption(), $hospitalesgeneral_addopt->nombre_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_addopt->depto_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_depto_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_addopt->depto_hospital->caption(), $hospitalesgeneral_addopt->depto_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_addopt->provincia_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_provincia_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_addopt->provincia_hospital->caption(), $hospitalesgeneral_addopt->provincia_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_addopt->municipio_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_municipio_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_addopt->municipio_hospital->caption(), $hospitalesgeneral_addopt->municipio_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_addopt->nivel_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_nivel_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_addopt->nivel_hospital->caption(), $hospitalesgeneral_addopt->nivel_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_addopt->redservicions_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_redservicions_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_addopt->redservicions_hospital->caption(), $hospitalesgeneral_addopt->redservicions_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_addopt->sector_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_sector_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_addopt->sector_hospital->caption(), $hospitalesgeneral_addopt->sector_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_addopt->tipo_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_tipo_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_addopt->tipo_hospital->caption(), $hospitalesgeneral_addopt->tipo_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_addopt->camashab_cali->Required) { ?>
				elm = this.getElements("x" + infix + "_camashab_cali");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_addopt->camashab_cali->caption(), $hospitalesgeneral_addopt->camashab_cali->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_addopt->especialidad->Required) { ?>
				elm = this.getElements("x" + infix + "_especialidad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_addopt->especialidad->caption(), $hospitalesgeneral_addopt->especialidad->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_addopt->latitud_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_latitud_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_addopt->latitud_hospital->caption(), $hospitalesgeneral_addopt->latitud_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_addopt->longitud_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_longitud_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_addopt->longitud_hospital->caption(), $hospitalesgeneral_addopt->longitud_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_addopt->icon_hospital->Required) { ?>
				felm = this.getElements("x" + infix + "_icon_hospital");
				elm = this.getElements("fn_x" + infix + "_icon_hospital");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_addopt->icon_hospital->caption(), $hospitalesgeneral_addopt->icon_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_addopt->codpolitico->Required) { ?>
				elm = this.getElements("x" + infix + "_codpolitico");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_addopt->codpolitico->caption(), $hospitalesgeneral_addopt->codpolitico->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_addopt->direccion->Required) { ?>
				elm = this.getElements("x" + infix + "_direccion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_addopt->direccion->caption(), $hospitalesgeneral_addopt->direccion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_addopt->telefono->Required) { ?>
				elm = this.getElements("x" + infix + "_telefono");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_addopt->telefono->caption(), $hospitalesgeneral_addopt->telefono->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_addopt->nombre_responsable->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_responsable");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_addopt->nombre_responsable->caption(), $hospitalesgeneral_addopt->nombre_responsable->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_addopt->estado->Required) { ?>
				elm = this.getElements("x" + infix + "_estado[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_addopt->estado->caption(), $hospitalesgeneral_addopt->estado->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($hospitalesgeneral_addopt->emt->Required) { ?>
				elm = this.getElements("x" + infix + "_emt[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $hospitalesgeneral_addopt->emt->caption(), $hospitalesgeneral_addopt->emt->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fhospitalesgeneraladdopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fhospitalesgeneraladdopt.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fhospitalesgeneraladdopt.lists["x_depto_hospital"] = <?php echo $hospitalesgeneral_addopt->depto_hospital->Lookup->toClientList($hospitalesgeneral_addopt) ?>;
	fhospitalesgeneraladdopt.lists["x_depto_hospital"].options = <?php echo JsonEncode($hospitalesgeneral_addopt->depto_hospital->lookupOptions()) ?>;
	fhospitalesgeneraladdopt.lists["x_provincia_hospital"] = <?php echo $hospitalesgeneral_addopt->provincia_hospital->Lookup->toClientList($hospitalesgeneral_addopt) ?>;
	fhospitalesgeneraladdopt.lists["x_provincia_hospital"].options = <?php echo JsonEncode($hospitalesgeneral_addopt->provincia_hospital->lookupOptions()) ?>;
	fhospitalesgeneraladdopt.lists["x_municipio_hospital"] = <?php echo $hospitalesgeneral_addopt->municipio_hospital->Lookup->toClientList($hospitalesgeneral_addopt) ?>;
	fhospitalesgeneraladdopt.lists["x_municipio_hospital"].options = <?php echo JsonEncode($hospitalesgeneral_addopt->municipio_hospital->lookupOptions()) ?>;
	fhospitalesgeneraladdopt.lists["x_especialidad"] = <?php echo $hospitalesgeneral_addopt->especialidad->Lookup->toClientList($hospitalesgeneral_addopt) ?>;
	fhospitalesgeneraladdopt.lists["x_especialidad"].options = <?php echo JsonEncode($hospitalesgeneral_addopt->especialidad->lookupOptions()) ?>;
	fhospitalesgeneraladdopt.lists["x_estado[]"] = <?php echo $hospitalesgeneral_addopt->estado->Lookup->toClientList($hospitalesgeneral_addopt) ?>;
	fhospitalesgeneraladdopt.lists["x_estado[]"].options = <?php echo JsonEncode($hospitalesgeneral_addopt->estado->options(FALSE, TRUE)) ?>;
	fhospitalesgeneraladdopt.lists["x_emt[]"] = <?php echo $hospitalesgeneral_addopt->emt->Lookup->toClientList($hospitalesgeneral_addopt) ?>;
	fhospitalesgeneraladdopt.lists["x_emt[]"].options = <?php echo JsonEncode($hospitalesgeneral_addopt->emt->options(FALSE, TRUE)) ?>;
	loadjs.done("fhospitalesgeneraladdopt");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $hospitalesgeneral_addopt->showPageHeader(); ?>
<?php
$hospitalesgeneral_addopt->showMessage();
?>
<form name="fhospitalesgeneraladdopt" id="fhospitalesgeneraladdopt" class="ew-form ew-horizontal" action="<?php echo Config("API_URL") ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="<?php echo Config("API_ACTION_NAME") ?>" id="<?php echo Config("API_ACTION_NAME") ?>" value="<?php echo Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?php echo Config("API_OBJECT_NAME") ?>" id="<?php echo Config("API_OBJECT_NAME") ?>" value="<?php echo $hospitalesgeneral_addopt->TableVar ?>">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($hospitalesgeneral_addopt->id_hospital->Visible) { // id_hospital ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_id_hospital"><?php echo $hospitalesgeneral_addopt->id_hospital->caption() ?><?php echo $hospitalesgeneral_addopt->id_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospitalesgeneral" data-field="x_id_hospital" name="x_id_hospital" id="x_id_hospital" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($hospitalesgeneral_addopt->id_hospital->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_addopt->id_hospital->EditValue ?>"<?php echo $hospitalesgeneral_addopt->id_hospital->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_addopt->nombre_hospital->Visible) { // nombre_hospital ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_nombre_hospital"><?php echo $hospitalesgeneral_addopt->nombre_hospital->caption() ?><?php echo $hospitalesgeneral_addopt->nombre_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospitalesgeneral" data-field="x_nombre_hospital" name="x_nombre_hospital" id="x_nombre_hospital" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospitalesgeneral_addopt->nombre_hospital->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_addopt->nombre_hospital->EditValue ?>"<?php echo $hospitalesgeneral_addopt->nombre_hospital->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_addopt->depto_hospital->Visible) { // depto_hospital ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_depto_hospital"><?php echo $hospitalesgeneral_addopt->depto_hospital->caption() ?><?php echo $hospitalesgeneral_addopt->depto_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<?php $hospitalesgeneral_addopt->depto_hospital->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="hospitalesgeneral" data-field="x_depto_hospital" data-value-separator="<?php echo $hospitalesgeneral_addopt->depto_hospital->displayValueSeparatorAttribute() ?>" id="x_depto_hospital" name="x_depto_hospital"<?php echo $hospitalesgeneral_addopt->depto_hospital->editAttributes() ?>>
			<?php echo $hospitalesgeneral_addopt->depto_hospital->selectOptionListHtml("x_depto_hospital") ?>
		</select>
</div>
<?php echo $hospitalesgeneral_addopt->depto_hospital->Lookup->getParamTag($hospitalesgeneral_addopt, "p_x_depto_hospital") ?>
</div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_addopt->provincia_hospital->Visible) { // provincia_hospital ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_provincia_hospital"><?php echo $hospitalesgeneral_addopt->provincia_hospital->caption() ?><?php echo $hospitalesgeneral_addopt->provincia_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<?php $hospitalesgeneral_addopt->provincia_hospital->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="hospitalesgeneral" data-field="x_provincia_hospital" data-value-separator="<?php echo $hospitalesgeneral_addopt->provincia_hospital->displayValueSeparatorAttribute() ?>" id="x_provincia_hospital" name="x_provincia_hospital"<?php echo $hospitalesgeneral_addopt->provincia_hospital->editAttributes() ?>>
			<?php echo $hospitalesgeneral_addopt->provincia_hospital->selectOptionListHtml("x_provincia_hospital") ?>
		</select>
</div>
<?php echo $hospitalesgeneral_addopt->provincia_hospital->Lookup->getParamTag($hospitalesgeneral_addopt, "p_x_provincia_hospital") ?>
</div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_addopt->municipio_hospital->Visible) { // municipio_hospital ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_municipio_hospital"><?php echo $hospitalesgeneral_addopt->municipio_hospital->caption() ?><?php echo $hospitalesgeneral_addopt->municipio_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="hospitalesgeneral" data-field="x_municipio_hospital" data-value-separator="<?php echo $hospitalesgeneral_addopt->municipio_hospital->displayValueSeparatorAttribute() ?>" id="x_municipio_hospital" name="x_municipio_hospital"<?php echo $hospitalesgeneral_addopt->municipio_hospital->editAttributes() ?>>
			<?php echo $hospitalesgeneral_addopt->municipio_hospital->selectOptionListHtml("x_municipio_hospital") ?>
		</select>
</div>
<?php echo $hospitalesgeneral_addopt->municipio_hospital->Lookup->getParamTag($hospitalesgeneral_addopt, "p_x_municipio_hospital") ?>
</div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_addopt->nivel_hospital->Visible) { // nivel_hospital ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_nivel_hospital"><?php echo $hospitalesgeneral_addopt->nivel_hospital->caption() ?><?php echo $hospitalesgeneral_addopt->nivel_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospitalesgeneral" data-field="x_nivel_hospital" name="x_nivel_hospital" id="x_nivel_hospital" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospitalesgeneral_addopt->nivel_hospital->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_addopt->nivel_hospital->EditValue ?>"<?php echo $hospitalesgeneral_addopt->nivel_hospital->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_addopt->redservicions_hospital->Visible) { // redservicions_hospital ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_redservicions_hospital"><?php echo $hospitalesgeneral_addopt->redservicions_hospital->caption() ?><?php echo $hospitalesgeneral_addopt->redservicions_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospitalesgeneral" data-field="x_redservicions_hospital" name="x_redservicions_hospital" id="x_redservicions_hospital" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($hospitalesgeneral_addopt->redservicions_hospital->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_addopt->redservicions_hospital->EditValue ?>"<?php echo $hospitalesgeneral_addopt->redservicions_hospital->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_addopt->sector_hospital->Visible) { // sector_hospital ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_sector_hospital"><?php echo $hospitalesgeneral_addopt->sector_hospital->caption() ?><?php echo $hospitalesgeneral_addopt->sector_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospitalesgeneral" data-field="x_sector_hospital" name="x_sector_hospital" id="x_sector_hospital" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($hospitalesgeneral_addopt->sector_hospital->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_addopt->sector_hospital->EditValue ?>"<?php echo $hospitalesgeneral_addopt->sector_hospital->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_addopt->tipo_hospital->Visible) { // tipo_hospital ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_tipo_hospital"><?php echo $hospitalesgeneral_addopt->tipo_hospital->caption() ?><?php echo $hospitalesgeneral_addopt->tipo_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospitalesgeneral" data-field="x_tipo_hospital" name="x_tipo_hospital" id="x_tipo_hospital" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospitalesgeneral_addopt->tipo_hospital->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_addopt->tipo_hospital->EditValue ?>"<?php echo $hospitalesgeneral_addopt->tipo_hospital->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_addopt->camashab_cali->Visible) { // camashab_cali ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_camashab_cali"><?php echo $hospitalesgeneral_addopt->camashab_cali->caption() ?><?php echo $hospitalesgeneral_addopt->camashab_cali->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospitalesgeneral" data-field="x_camashab_cali" name="x_camashab_cali" id="x_camashab_cali" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($hospitalesgeneral_addopt->camashab_cali->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_addopt->camashab_cali->EditValue ?>"<?php echo $hospitalesgeneral_addopt->camashab_cali->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_addopt->especialidad->Visible) { // especialidad ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_especialidad"><?php echo $hospitalesgeneral_addopt->especialidad->caption() ?><?php echo $hospitalesgeneral_addopt->especialidad->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="hospitalesgeneral" data-field="x_especialidad" data-value-separator="<?php echo $hospitalesgeneral_addopt->especialidad->displayValueSeparatorAttribute() ?>" id="x_especialidad" name="x_especialidad"<?php echo $hospitalesgeneral_addopt->especialidad->editAttributes() ?>>
			<?php echo $hospitalesgeneral_addopt->especialidad->selectOptionListHtml("x_especialidad") ?>
		</select>
</div>
<?php echo $hospitalesgeneral_addopt->especialidad->Lookup->getParamTag($hospitalesgeneral_addopt, "p_x_especialidad") ?>
</div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_addopt->latitud_hospital->Visible) { // latitud_hospital ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_latitud_hospital"><?php echo $hospitalesgeneral_addopt->latitud_hospital->caption() ?><?php echo $hospitalesgeneral_addopt->latitud_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospitalesgeneral" data-field="x_latitud_hospital" name="x_latitud_hospital" id="x_latitud_hospital" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($hospitalesgeneral_addopt->latitud_hospital->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_addopt->latitud_hospital->EditValue ?>"<?php echo $hospitalesgeneral_addopt->latitud_hospital->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_addopt->longitud_hospital->Visible) { // longitud_hospital ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_longitud_hospital"><?php echo $hospitalesgeneral_addopt->longitud_hospital->caption() ?><?php echo $hospitalesgeneral_addopt->longitud_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospitalesgeneral" data-field="x_longitud_hospital" name="x_longitud_hospital" id="x_longitud_hospital" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($hospitalesgeneral_addopt->longitud_hospital->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_addopt->longitud_hospital->EditValue ?>"<?php echo $hospitalesgeneral_addopt->longitud_hospital->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_addopt->icon_hospital->Visible) { // icon_hospital ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label"><?php echo $hospitalesgeneral_addopt->icon_hospital->caption() ?><?php echo $hospitalesgeneral_addopt->icon_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div id="fd_x_icon_hospital">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $hospitalesgeneral_addopt->icon_hospital->title() ?>" data-table="hospitalesgeneral" data-field="x_icon_hospital" name="x_icon_hospital" id="x_icon_hospital" lang="<?php echo CurrentLanguageID() ?>"<?php echo $hospitalesgeneral_addopt->icon_hospital->editAttributes() ?><?php if ($hospitalesgeneral_addopt->icon_hospital->ReadOnly || $hospitalesgeneral_addopt->icon_hospital->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_icon_hospital"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_icon_hospital" id= "fn_x_icon_hospital" value="<?php echo $hospitalesgeneral_addopt->icon_hospital->Upload->FileName ?>">
<input type="hidden" name="fa_x_icon_hospital" id= "fa_x_icon_hospital" value="0">
<input type="hidden" name="fs_x_icon_hospital" id= "fs_x_icon_hospital" value="20">
<input type="hidden" name="fx_x_icon_hospital" id= "fx_x_icon_hospital" value="<?php echo $hospitalesgeneral_addopt->icon_hospital->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_icon_hospital" id= "fm_x_icon_hospital" value="<?php echo $hospitalesgeneral_addopt->icon_hospital->UploadMaxFileSize ?>">
</div>
<table id="ft_x_icon_hospital" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_addopt->codpolitico->Visible) { // codpolitico ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_codpolitico"><?php echo $hospitalesgeneral_addopt->codpolitico->caption() ?><?php echo $hospitalesgeneral_addopt->codpolitico->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospitalesgeneral" data-field="x_codpolitico" name="x_codpolitico" id="x_codpolitico" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($hospitalesgeneral_addopt->codpolitico->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_addopt->codpolitico->EditValue ?>"<?php echo $hospitalesgeneral_addopt->codpolitico->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_addopt->direccion->Visible) { // direccion ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_direccion"><?php echo $hospitalesgeneral_addopt->direccion->caption() ?><?php echo $hospitalesgeneral_addopt->direccion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<textarea data-table="hospitalesgeneral" data-field="x_direccion" name="x_direccion" id="x_direccion" cols="35" rows="4" placeholder="<?php echo HtmlEncode($hospitalesgeneral_addopt->direccion->getPlaceHolder()) ?>"<?php echo $hospitalesgeneral_addopt->direccion->editAttributes() ?>><?php echo $hospitalesgeneral_addopt->direccion->EditValue ?></textarea>
</div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_addopt->telefono->Visible) { // telefono ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_telefono"><?php echo $hospitalesgeneral_addopt->telefono->caption() ?><?php echo $hospitalesgeneral_addopt->telefono->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospitalesgeneral" data-field="x_telefono" name="x_telefono" id="x_telefono" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($hospitalesgeneral_addopt->telefono->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_addopt->telefono->EditValue ?>"<?php echo $hospitalesgeneral_addopt->telefono->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_addopt->nombre_responsable->Visible) { // nombre_responsable ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_nombre_responsable"><?php echo $hospitalesgeneral_addopt->nombre_responsable->caption() ?><?php echo $hospitalesgeneral_addopt->nombre_responsable->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="hospitalesgeneral" data-field="x_nombre_responsable" name="x_nombre_responsable" id="x_nombre_responsable" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($hospitalesgeneral_addopt->nombre_responsable->getPlaceHolder()) ?>" value="<?php echo $hospitalesgeneral_addopt->nombre_responsable->EditValue ?>"<?php echo $hospitalesgeneral_addopt->nombre_responsable->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_addopt->estado->Visible) { // estado ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label"><?php echo $hospitalesgeneral_addopt->estado->caption() ?><?php echo $hospitalesgeneral_addopt->estado->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<?php
$selwrk = ConvertToBool($hospitalesgeneral_addopt->estado->CurrentValue) ? " checked" : "";
?>
<div class="custom-control custom-checkbox d-inline-block">
	<input type="checkbox" class="custom-control-input" data-table="hospitalesgeneral" data-field="x_estado" name="x_estado[]" id="x_estado[]_416336" value="1"<?php echo $selwrk ?><?php echo $hospitalesgeneral_addopt->estado->editAttributes() ?>>
	<label class="custom-control-label" for="x_estado[]_416336"></label>
</div>
</div>
	</div>
<?php } ?>
<?php if ($hospitalesgeneral_addopt->emt->Visible) { // emt ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label"><?php echo $hospitalesgeneral_addopt->emt->caption() ?><?php echo $hospitalesgeneral_addopt->emt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<?php
$selwrk = ConvertToBool($hospitalesgeneral_addopt->emt->CurrentValue) ? " checked" : "";
?>
<div class="custom-control custom-checkbox d-inline-block">
	<input type="checkbox" class="custom-control-input" data-table="hospitalesgeneral" data-field="x_emt" name="x_emt[]" id="x_emt[]_691624" value="1"<?php echo $selwrk ?><?php echo $hospitalesgeneral_addopt->emt->editAttributes() ?>>
	<label class="custom-control-label" for="x_emt[]_691624"></label>
</div>
</div>
	</div>
<?php } ?>
</form>
<?php
$hospitalesgeneral_addopt->showPageFooter();
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
<?php
$hospitalesgeneral_addopt->terminate();
?>