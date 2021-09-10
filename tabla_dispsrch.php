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
$tabla_disp_search = new tabla_disp_search();

// Run the page
$tabla_disp_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tabla_disp_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftabla_dispsearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($tabla_disp_search->IsModal) { ?>
	ftabla_dispsearch = currentAdvancedSearchForm = new ew.Form("ftabla_dispsearch", "search");
	<?php } else { ?>
	ftabla_dispsearch = currentForm = new ew.Form("ftabla_dispsearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	ftabla_dispsearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	ftabla_dispsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ftabla_dispsearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ftabla_dispsearch.lists["x_depto_hospital[]"] = <?php echo $tabla_disp_search->depto_hospital->Lookup->toClientList($tabla_disp_search) ?>;
	ftabla_dispsearch.lists["x_depto_hospital[]"].options = <?php echo JsonEncode($tabla_disp_search->depto_hospital->lookupOptions()) ?>;
	ftabla_dispsearch.lists["x_provincia_hospital[]"] = <?php echo $tabla_disp_search->provincia_hospital->Lookup->toClientList($tabla_disp_search) ?>;
	ftabla_dispsearch.lists["x_provincia_hospital[]"].options = <?php echo JsonEncode($tabla_disp_search->provincia_hospital->lookupOptions()) ?>;
	ftabla_dispsearch.lists["x_municipio_hospital"] = <?php echo $tabla_disp_search->municipio_hospital->Lookup->toClientList($tabla_disp_search) ?>;
	ftabla_dispsearch.lists["x_municipio_hospital"].options = <?php echo JsonEncode($tabla_disp_search->municipio_hospital->lookupOptions()) ?>;
	loadjs.done("ftabla_dispsearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $tabla_disp_search->showPageHeader(); ?>
<?php
$tabla_disp_search->showMessage();
?>
<form name="ftabla_dispsearch" id="ftabla_dispsearch" class="<?php echo $tabla_disp_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tabla_disp">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$tabla_disp_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($tabla_disp_search->depto_hospital->Visible) { // depto_hospital ?>
	<div id="r_depto_hospital" class="form-group row">
		<label for="x_depto_hospital" class="<?php echo $tabla_disp_search->LeftColumnClass ?>"><span id="elh_tabla_disp_depto_hospital"><?php echo $tabla_disp_search->depto_hospital->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_depto_hospital" id="z_depto_hospital" value="LIKE">
</span>
		</label>
		<div class="<?php echo $tabla_disp_search->RightColumnClass ?>"><div <?php echo $tabla_disp_search->depto_hospital->cellAttributes() ?>>
			<span id="el_tabla_disp_depto_hospital" class="ew-search-field">
<?php $tabla_disp_search->depto_hospital->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_depto_hospital"><?php echo EmptyValue(strval($tabla_disp_search->depto_hospital->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $tabla_disp_search->depto_hospital->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($tabla_disp_search->depto_hospital->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($tabla_disp_search->depto_hospital->ReadOnly || $tabla_disp_search->depto_hospital->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_depto_hospital[]',m:1,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $tabla_disp_search->depto_hospital->Lookup->getParamTag($tabla_disp_search, "p_x_depto_hospital") ?>
<input type="hidden" data-table="tabla_disp" data-field="x_depto_hospital" data-multiple="1" data-lookup="1" data-value-separator="<?php echo $tabla_disp_search->depto_hospital->displayValueSeparatorAttribute() ?>" name="x_depto_hospital[]" id="x_depto_hospital[]" value="<?php echo $tabla_disp_search->depto_hospital->AdvancedSearch->SearchValue ?>"<?php echo $tabla_disp_search->depto_hospital->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($tabla_disp_search->provincia_hospital->Visible) { // provincia_hospital ?>
	<div id="r_provincia_hospital" class="form-group row">
		<label for="x_provincia_hospital" class="<?php echo $tabla_disp_search->LeftColumnClass ?>"><span id="elh_tabla_disp_provincia_hospital"><?php echo $tabla_disp_search->provincia_hospital->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_provincia_hospital" id="z_provincia_hospital" value="LIKE">
</span>
		</label>
		<div class="<?php echo $tabla_disp_search->RightColumnClass ?>"><div <?php echo $tabla_disp_search->provincia_hospital->cellAttributes() ?>>
			<span id="el_tabla_disp_provincia_hospital" class="ew-search-field">
<?php $tabla_disp_search->provincia_hospital->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_provincia_hospital"><?php echo EmptyValue(strval($tabla_disp_search->provincia_hospital->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $tabla_disp_search->provincia_hospital->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($tabla_disp_search->provincia_hospital->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($tabla_disp_search->provincia_hospital->ReadOnly || $tabla_disp_search->provincia_hospital->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_provincia_hospital[]',m:1,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $tabla_disp_search->provincia_hospital->Lookup->getParamTag($tabla_disp_search, "p_x_provincia_hospital") ?>
<input type="hidden" data-table="tabla_disp" data-field="x_provincia_hospital" data-multiple="1" data-lookup="1" data-value-separator="<?php echo $tabla_disp_search->provincia_hospital->displayValueSeparatorAttribute() ?>" name="x_provincia_hospital[]" id="x_provincia_hospital[]" value="<?php echo $tabla_disp_search->provincia_hospital->AdvancedSearch->SearchValue ?>"<?php echo $tabla_disp_search->provincia_hospital->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($tabla_disp_search->municipio_hospital->Visible) { // municipio_hospital ?>
	<div id="r_municipio_hospital" class="form-group row">
		<label for="x_municipio_hospital" class="<?php echo $tabla_disp_search->LeftColumnClass ?>"><span id="elh_tabla_disp_municipio_hospital"><?php echo $tabla_disp_search->municipio_hospital->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_municipio_hospital" id="z_municipio_hospital" value="LIKE">
</span>
		</label>
		<div class="<?php echo $tabla_disp_search->RightColumnClass ?>"><div <?php echo $tabla_disp_search->municipio_hospital->cellAttributes() ?>>
			<span id="el_tabla_disp_municipio_hospital" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_municipio_hospital"><?php echo EmptyValue(strval($tabla_disp_search->municipio_hospital->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $tabla_disp_search->municipio_hospital->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($tabla_disp_search->municipio_hospital->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($tabla_disp_search->municipio_hospital->ReadOnly || $tabla_disp_search->municipio_hospital->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_municipio_hospital',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $tabla_disp_search->municipio_hospital->Lookup->getParamTag($tabla_disp_search, "p_x_municipio_hospital") ?>
<input type="hidden" data-table="tabla_disp" data-field="x_municipio_hospital" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $tabla_disp_search->municipio_hospital->displayValueSeparatorAttribute() ?>" name="x_municipio_hospital" id="x_municipio_hospital" value="<?php echo $tabla_disp_search->municipio_hospital->AdvancedSearch->SearchValue ?>"<?php echo $tabla_disp_search->municipio_hospital->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($tabla_disp_search->nivel_hospital->Visible) { // nivel_hospital ?>
	<div id="r_nivel_hospital" class="form-group row">
		<label for="x_nivel_hospital" class="<?php echo $tabla_disp_search->LeftColumnClass ?>"><span id="elh_tabla_disp_nivel_hospital"><?php echo $tabla_disp_search->nivel_hospital->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_nivel_hospital" id="z_nivel_hospital" value="LIKE">
</span>
		</label>
		<div class="<?php echo $tabla_disp_search->RightColumnClass ?>"><div <?php echo $tabla_disp_search->nivel_hospital->cellAttributes() ?>>
			<span id="el_tabla_disp_nivel_hospital" class="ew-search-field">
<input type="text" data-table="tabla_disp" data-field="x_nivel_hospital" name="x_nivel_hospital" id="x_nivel_hospital" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($tabla_disp_search->nivel_hospital->getPlaceHolder()) ?>" value="<?php echo $tabla_disp_search->nivel_hospital->EditValue ?>"<?php echo $tabla_disp_search->nivel_hospital->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$tabla_disp_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tabla_disp_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tabla_disp_search->showPageFooter();
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
$tabla_disp_search->terminate();
?>