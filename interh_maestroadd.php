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
$interh_maestro_add = new interh_maestro_add();

// Run the page
$interh_maestro_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_maestro_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var finterh_maestroadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	finterh_maestroadd = currentForm = new ew.Form("finterh_maestroadd", "add");

	// Validate form
	finterh_maestroadd.validate = function() {
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
			<?php if ($interh_maestro_add->fechahorainterh->Required) { ?>
				elm = this.getElements("x" + infix + "_fechahorainterh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_maestro_add->fechahorainterh->caption(), $interh_maestro_add->fechahorainterh->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_maestro_add->tipo_serviciointerh->Required) { ?>
				elm = this.getElements("x" + infix + "_tipo_serviciointerh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_maestro_add->tipo_serviciointerh->caption(), $interh_maestro_add->tipo_serviciointerh->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_maestro_add->hospital_origneinterh->Required) { ?>
				elm = this.getElements("x" + infix + "_hospital_origneinterh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_maestro_add->hospital_origneinterh->caption(), $interh_maestro_add->hospital_origneinterh->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_maestro_add->nombrereportainterh->Required) { ?>
				elm = this.getElements("x" + infix + "_nombrereportainterh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_maestro_add->nombrereportainterh->caption(), $interh_maestro_add->nombrereportainterh->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_maestro_add->telefonointerh->Required) { ?>
				elm = this.getElements("x" + infix + "_telefonointerh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_maestro_add->telefonointerh->caption(), $interh_maestro_add->telefonointerh->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_maestro_add->motivo_atencioninteh->Required) { ?>
				elm = this.getElements("x" + infix + "_motivo_atencioninteh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_maestro_add->motivo_atencioninteh->caption(), $interh_maestro_add->motivo_atencioninteh->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_maestro_add->accioninterh->Required) { ?>
				elm = this.getElements("x" + infix + "_accioninterh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_maestro_add->accioninterh->caption(), $interh_maestro_add->accioninterh->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_maestro_add->prioridadinterh->Required) { ?>
				elm = this.getElements("x" + infix + "_prioridadinterh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_maestro_add->prioridadinterh->caption(), $interh_maestro_add->prioridadinterh->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_maestro_add->estadointerh->Required) { ?>
				elm = this.getElements("x" + infix + "_estadointerh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_maestro_add->estadointerh->caption(), $interh_maestro_add->estadointerh->RequiredErrorMessage)) ?>");
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
	finterh_maestroadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	finterh_maestroadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	finterh_maestroadd.lists["x_tipo_serviciointerh"] = <?php echo $interh_maestro_add->tipo_serviciointerh->Lookup->toClientList($interh_maestro_add) ?>;
	finterh_maestroadd.lists["x_tipo_serviciointerh"].options = <?php echo JsonEncode($interh_maestro_add->tipo_serviciointerh->lookupOptions()) ?>;
	finterh_maestroadd.lists["x_hospital_origneinterh"] = <?php echo $interh_maestro_add->hospital_origneinterh->Lookup->toClientList($interh_maestro_add) ?>;
	finterh_maestroadd.lists["x_hospital_origneinterh"].options = <?php echo JsonEncode($interh_maestro_add->hospital_origneinterh->lookupOptions()) ?>;
	finterh_maestroadd.lists["x_motivo_atencioninteh"] = <?php echo $interh_maestro_add->motivo_atencioninteh->Lookup->toClientList($interh_maestro_add) ?>;
	finterh_maestroadd.lists["x_motivo_atencioninteh"].options = <?php echo JsonEncode($interh_maestro_add->motivo_atencioninteh->lookupOptions()) ?>;
	finterh_maestroadd.lists["x_accioninterh"] = <?php echo $interh_maestro_add->accioninterh->Lookup->toClientList($interh_maestro_add) ?>;
	finterh_maestroadd.lists["x_accioninterh"].options = <?php echo JsonEncode($interh_maestro_add->accioninterh->lookupOptions()) ?>;
	finterh_maestroadd.lists["x_prioridadinterh"] = <?php echo $interh_maestro_add->prioridadinterh->Lookup->toClientList($interh_maestro_add) ?>;
	finterh_maestroadd.lists["x_prioridadinterh"].options = <?php echo JsonEncode($interh_maestro_add->prioridadinterh->lookupOptions()) ?>;
	finterh_maestroadd.lists["x_estadointerh"] = <?php echo $interh_maestro_add->estadointerh->Lookup->toClientList($interh_maestro_add) ?>;
	finterh_maestroadd.lists["x_estadointerh"].options = <?php echo JsonEncode($interh_maestro_add->estadointerh->lookupOptions()) ?>;
	finterh_maestroadd.autoSuggests["x_estadointerh"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("finterh_maestroadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $interh_maestro_add->showPageHeader(); ?>
<?php
$interh_maestro_add->showMessage();
?>
<form name="finterh_maestroadd" id="finterh_maestroadd" class="<?php echo $interh_maestro_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="interh_maestro">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$interh_maestro_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($interh_maestro_add->tipo_serviciointerh->Visible) { // tipo_serviciointerh ?>
	<div id="r_tipo_serviciointerh" class="form-group row">
		<label id="elh_interh_maestro_tipo_serviciointerh" for="x_tipo_serviciointerh" class="<?php echo $interh_maestro_add->LeftColumnClass ?>"><?php echo $interh_maestro_add->tipo_serviciointerh->caption() ?><?php echo $interh_maestro_add->tipo_serviciointerh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_maestro_add->RightColumnClass ?>"><div <?php echo $interh_maestro_add->tipo_serviciointerh->cellAttributes() ?>>
<span id="el_interh_maestro_tipo_serviciointerh">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="interh_maestro" data-field="x_tipo_serviciointerh" data-value-separator="<?php echo $interh_maestro_add->tipo_serviciointerh->displayValueSeparatorAttribute() ?>" id="x_tipo_serviciointerh" name="x_tipo_serviciointerh"<?php echo $interh_maestro_add->tipo_serviciointerh->editAttributes() ?>>
			<?php echo $interh_maestro_add->tipo_serviciointerh->selectOptionListHtml("x_tipo_serviciointerh") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "interh_tiposervicio") && !$interh_maestro_add->tipo_serviciointerh->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_tipo_serviciointerh" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $interh_maestro_add->tipo_serviciointerh->caption() ?>" data-title="<?php echo $interh_maestro_add->tipo_serviciointerh->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_tipo_serviciointerh',url:'interh_tiposervicioaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $interh_maestro_add->tipo_serviciointerh->Lookup->getParamTag($interh_maestro_add, "p_x_tipo_serviciointerh") ?>
</span>
<?php echo $interh_maestro_add->tipo_serviciointerh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_maestro_add->hospital_origneinterh->Visible) { // hospital_origneinterh ?>
	<div id="r_hospital_origneinterh" class="form-group row">
		<label id="elh_interh_maestro_hospital_origneinterh" for="x_hospital_origneinterh" class="<?php echo $interh_maestro_add->LeftColumnClass ?>"><?php echo $interh_maestro_add->hospital_origneinterh->caption() ?><?php echo $interh_maestro_add->hospital_origneinterh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_maestro_add->RightColumnClass ?>"><div <?php echo $interh_maestro_add->hospital_origneinterh->cellAttributes() ?>>
<span id="el_interh_maestro_hospital_origneinterh">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_hospital_origneinterh"><?php echo EmptyValue(strval($interh_maestro_add->hospital_origneinterh->ViewValue)) ? $Language->phrase("PleaseSelect") : $interh_maestro_add->hospital_origneinterh->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($interh_maestro_add->hospital_origneinterh->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($interh_maestro_add->hospital_origneinterh->ReadOnly || $interh_maestro_add->hospital_origneinterh->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_hospital_origneinterh',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "hospitalesgeneral") && !$interh_maestro_add->hospital_origneinterh->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_hospital_origneinterh" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $interh_maestro_add->hospital_origneinterh->caption() ?>" data-title="<?php echo $interh_maestro_add->hospital_origneinterh->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_hospital_origneinterh',url:'hospitalesgeneraladdopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $interh_maestro_add->hospital_origneinterh->Lookup->getParamTag($interh_maestro_add, "p_x_hospital_origneinterh") ?>
<input type="hidden" data-table="interh_maestro" data-field="x_hospital_origneinterh" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $interh_maestro_add->hospital_origneinterh->displayValueSeparatorAttribute() ?>" name="x_hospital_origneinterh" id="x_hospital_origneinterh" value="<?php echo $interh_maestro_add->hospital_origneinterh->CurrentValue ?>"<?php echo $interh_maestro_add->hospital_origneinterh->editAttributes() ?>>
</span>
<?php echo $interh_maestro_add->hospital_origneinterh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_maestro_add->nombrereportainterh->Visible) { // nombrereportainterh ?>
	<div id="r_nombrereportainterh" class="form-group row">
		<label id="elh_interh_maestro_nombrereportainterh" for="x_nombrereportainterh" class="<?php echo $interh_maestro_add->LeftColumnClass ?>"><?php echo $interh_maestro_add->nombrereportainterh->caption() ?><?php echo $interh_maestro_add->nombrereportainterh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_maestro_add->RightColumnClass ?>"><div <?php echo $interh_maestro_add->nombrereportainterh->cellAttributes() ?>>
<span id="el_interh_maestro_nombrereportainterh">
<input type="text" data-table="interh_maestro" data-field="x_nombrereportainterh" name="x_nombrereportainterh" id="x_nombrereportainterh" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($interh_maestro_add->nombrereportainterh->getPlaceHolder()) ?>" value="<?php echo $interh_maestro_add->nombrereportainterh->EditValue ?>"<?php echo $interh_maestro_add->nombrereportainterh->editAttributes() ?>>
</span>
<?php echo $interh_maestro_add->nombrereportainterh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_maestro_add->telefonointerh->Visible) { // telefonointerh ?>
	<div id="r_telefonointerh" class="form-group row">
		<label id="elh_interh_maestro_telefonointerh" for="x_telefonointerh" class="<?php echo $interh_maestro_add->LeftColumnClass ?>"><?php echo $interh_maestro_add->telefonointerh->caption() ?><?php echo $interh_maestro_add->telefonointerh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_maestro_add->RightColumnClass ?>"><div <?php echo $interh_maestro_add->telefonointerh->cellAttributes() ?>>
<span id="el_interh_maestro_telefonointerh">
<input type="text" data-table="interh_maestro" data-field="x_telefonointerh" name="x_telefonointerh" id="x_telefonointerh" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($interh_maestro_add->telefonointerh->getPlaceHolder()) ?>" value="<?php echo $interh_maestro_add->telefonointerh->EditValue ?>"<?php echo $interh_maestro_add->telefonointerh->editAttributes() ?>>
</span>
<?php echo $interh_maestro_add->telefonointerh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_maestro_add->motivo_atencioninteh->Visible) { // motivo_atencioninteh ?>
	<div id="r_motivo_atencioninteh" class="form-group row">
		<label id="elh_interh_maestro_motivo_atencioninteh" class="<?php echo $interh_maestro_add->LeftColumnClass ?>"><?php echo $interh_maestro_add->motivo_atencioninteh->caption() ?><?php echo $interh_maestro_add->motivo_atencioninteh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_maestro_add->RightColumnClass ?>"><div <?php echo $interh_maestro_add->motivo_atencioninteh->cellAttributes() ?>>
<span id="el_interh_maestro_motivo_atencioninteh">
<div id="tp_x_motivo_atencioninteh" class="ew-template"><input type="radio" class="custom-control-input" data-table="interh_maestro" data-field="x_motivo_atencioninteh" data-value-separator="<?php echo $interh_maestro_add->motivo_atencioninteh->displayValueSeparatorAttribute() ?>" name="x_motivo_atencioninteh" id="x_motivo_atencioninteh" value="{value}"<?php echo $interh_maestro_add->motivo_atencioninteh->editAttributes() ?>></div>
<div id="dsl_x_motivo_atencioninteh" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $interh_maestro_add->motivo_atencioninteh->radioButtonListHtml(FALSE, "x_motivo_atencioninteh") ?>
</div></div>
<?php echo $interh_maestro_add->motivo_atencioninteh->Lookup->getParamTag($interh_maestro_add, "p_x_motivo_atencioninteh") ?>
</span>
<?php echo $interh_maestro_add->motivo_atencioninteh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_maestro_add->accioninterh->Visible) { // accioninterh ?>
	<div id="r_accioninterh" class="form-group row">
		<label id="elh_interh_maestro_accioninterh" for="x_accioninterh" class="<?php echo $interh_maestro_add->LeftColumnClass ?>"><?php echo $interh_maestro_add->accioninterh->caption() ?><?php echo $interh_maestro_add->accioninterh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_maestro_add->RightColumnClass ?>"><div <?php echo $interh_maestro_add->accioninterh->cellAttributes() ?>>
<span id="el_interh_maestro_accioninterh">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="interh_maestro" data-field="x_accioninterh" data-value-separator="<?php echo $interh_maestro_add->accioninterh->displayValueSeparatorAttribute() ?>" id="x_accioninterh" name="x_accioninterh"<?php echo $interh_maestro_add->accioninterh->editAttributes() ?>>
			<?php echo $interh_maestro_add->accioninterh->selectOptionListHtml("x_accioninterh") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "interh_accion") && !$interh_maestro_add->accioninterh->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_accioninterh" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $interh_maestro_add->accioninterh->caption() ?>" data-title="<?php echo $interh_maestro_add->accioninterh->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_accioninterh',url:'interh_accionaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $interh_maestro_add->accioninterh->Lookup->getParamTag($interh_maestro_add, "p_x_accioninterh") ?>
</span>
<?php echo $interh_maestro_add->accioninterh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_maestro_add->prioridadinterh->Visible) { // prioridadinterh ?>
	<div id="r_prioridadinterh" class="form-group row">
		<label id="elh_interh_maestro_prioridadinterh" for="x_prioridadinterh" class="<?php echo $interh_maestro_add->LeftColumnClass ?>"><?php echo $interh_maestro_add->prioridadinterh->caption() ?><?php echo $interh_maestro_add->prioridadinterh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_maestro_add->RightColumnClass ?>"><div <?php echo $interh_maestro_add->prioridadinterh->cellAttributes() ?>>
<span id="el_interh_maestro_prioridadinterh">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="interh_maestro" data-field="x_prioridadinterh" data-value-separator="<?php echo $interh_maestro_add->prioridadinterh->displayValueSeparatorAttribute() ?>" id="x_prioridadinterh" name="x_prioridadinterh"<?php echo $interh_maestro_add->prioridadinterh->editAttributes() ?>>
			<?php echo $interh_maestro_add->prioridadinterh->selectOptionListHtml("x_prioridadinterh") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "interh_prioridad") && !$interh_maestro_add->prioridadinterh->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_prioridadinterh" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $interh_maestro_add->prioridadinterh->caption() ?>" data-title="<?php echo $interh_maestro_add->prioridadinterh->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_prioridadinterh',url:'interh_prioridadaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $interh_maestro_add->prioridadinterh->Lookup->getParamTag($interh_maestro_add, "p_x_prioridadinterh") ?>
</span>
<?php echo $interh_maestro_add->prioridadinterh->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$interh_maestro_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $interh_maestro_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $interh_maestro_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$interh_maestro_add->showPageFooter();
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
$interh_maestro_add->terminate();
?>