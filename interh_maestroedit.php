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
$interh_maestro_edit = new interh_maestro_edit();

// Run the page
$interh_maestro_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$interh_maestro_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var finterh_maestroedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	finterh_maestroedit = currentForm = new ew.Form("finterh_maestroedit", "edit");

	// Validate form
	finterh_maestroedit.validate = function() {
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
			<?php if ($interh_maestro_edit->hospital_origneinterh->Required) { ?>
				elm = this.getElements("x" + infix + "_hospital_origneinterh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_maestro_edit->hospital_origneinterh->caption(), $interh_maestro_edit->hospital_origneinterh->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_maestro_edit->motivo_atencioninteh->Required) { ?>
				elm = this.getElements("x" + infix + "_motivo_atencioninteh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_maestro_edit->motivo_atencioninteh->caption(), $interh_maestro_edit->motivo_atencioninteh->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_maestro_edit->hospital_destinointerh->Required) { ?>
				elm = this.getElements("x" + infix + "_hospital_destinointerh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_maestro_edit->hospital_destinointerh->caption(), $interh_maestro_edit->hospital_destinointerh->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($interh_maestro_edit->nombre_recibe->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_recibe");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $interh_maestro_edit->nombre_recibe->caption(), $interh_maestro_edit->nombre_recibe->RequiredErrorMessage)) ?>");
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
	finterh_maestroedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	finterh_maestroedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	finterh_maestroedit.lists["x_hospital_origneinterh"] = <?php echo $interh_maestro_edit->hospital_origneinterh->Lookup->toClientList($interh_maestro_edit) ?>;
	finterh_maestroedit.lists["x_hospital_origneinterh"].options = <?php echo JsonEncode($interh_maestro_edit->hospital_origneinterh->lookupOptions()) ?>;
	finterh_maestroedit.lists["x_motivo_atencioninteh"] = <?php echo $interh_maestro_edit->motivo_atencioninteh->Lookup->toClientList($interh_maestro_edit) ?>;
	finterh_maestroedit.lists["x_motivo_atencioninteh"].options = <?php echo JsonEncode($interh_maestro_edit->motivo_atencioninteh->lookupOptions()) ?>;
	finterh_maestroedit.lists["x_hospital_destinointerh"] = <?php echo $interh_maestro_edit->hospital_destinointerh->Lookup->toClientList($interh_maestro_edit) ?>;
	finterh_maestroedit.lists["x_hospital_destinointerh"].options = <?php echo JsonEncode($interh_maestro_edit->hospital_destinointerh->lookupOptions()) ?>;
	loadjs.done("finterh_maestroedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $interh_maestro_edit->showPageHeader(); ?>
<?php
$interh_maestro_edit->showMessage();
?>
<form name="finterh_maestroedit" id="finterh_maestroedit" class="<?php echo $interh_maestro_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="interh_maestro">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$interh_maestro_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($interh_maestro_edit->hospital_origneinterh->Visible) { // hospital_origneinterh ?>
	<div id="r_hospital_origneinterh" class="form-group row">
		<label id="elh_interh_maestro_hospital_origneinterh" for="x_hospital_origneinterh" class="<?php echo $interh_maestro_edit->LeftColumnClass ?>"><?php echo $interh_maestro_edit->hospital_origneinterh->caption() ?><?php echo $interh_maestro_edit->hospital_origneinterh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_maestro_edit->RightColumnClass ?>"><div <?php echo $interh_maestro_edit->hospital_origneinterh->cellAttributes() ?>>
<span id="el_interh_maestro_hospital_origneinterh">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_hospital_origneinterh"><?php echo EmptyValue(strval($interh_maestro_edit->hospital_origneinterh->ViewValue)) ? $Language->phrase("PleaseSelect") : $interh_maestro_edit->hospital_origneinterh->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($interh_maestro_edit->hospital_origneinterh->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($interh_maestro_edit->hospital_origneinterh->ReadOnly || $interh_maestro_edit->hospital_origneinterh->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_hospital_origneinterh',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "hospitalesgeneral") && !$interh_maestro_edit->hospital_origneinterh->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_hospital_origneinterh" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $interh_maestro_edit->hospital_origneinterh->caption() ?>" data-title="<?php echo $interh_maestro_edit->hospital_origneinterh->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_hospital_origneinterh',url:'hospitalesgeneraladdopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $interh_maestro_edit->hospital_origneinterh->Lookup->getParamTag($interh_maestro_edit, "p_x_hospital_origneinterh") ?>
<input type="hidden" data-table="interh_maestro" data-field="x_hospital_origneinterh" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $interh_maestro_edit->hospital_origneinterh->displayValueSeparatorAttribute() ?>" name="x_hospital_origneinterh" id="x_hospital_origneinterh" value="<?php echo $interh_maestro_edit->hospital_origneinterh->CurrentValue ?>"<?php echo $interh_maestro_edit->hospital_origneinterh->editAttributes() ?>>
</span>
<?php echo $interh_maestro_edit->hospital_origneinterh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_maestro_edit->motivo_atencioninteh->Visible) { // motivo_atencioninteh ?>
	<div id="r_motivo_atencioninteh" class="form-group row">
		<label id="elh_interh_maestro_motivo_atencioninteh" class="<?php echo $interh_maestro_edit->LeftColumnClass ?>"><?php echo $interh_maestro_edit->motivo_atencioninteh->caption() ?><?php echo $interh_maestro_edit->motivo_atencioninteh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_maestro_edit->RightColumnClass ?>"><div <?php echo $interh_maestro_edit->motivo_atencioninteh->cellAttributes() ?>>
<span id="el_interh_maestro_motivo_atencioninteh">
<div id="tp_x_motivo_atencioninteh" class="ew-template"><input type="radio" class="custom-control-input" data-table="interh_maestro" data-field="x_motivo_atencioninteh" data-value-separator="<?php echo $interh_maestro_edit->motivo_atencioninteh->displayValueSeparatorAttribute() ?>" name="x_motivo_atencioninteh" id="x_motivo_atencioninteh" value="{value}"<?php echo $interh_maestro_edit->motivo_atencioninteh->editAttributes() ?>></div>
<div id="dsl_x_motivo_atencioninteh" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $interh_maestro_edit->motivo_atencioninteh->radioButtonListHtml(FALSE, "x_motivo_atencioninteh") ?>
</div></div>
<?php echo $interh_maestro_edit->motivo_atencioninteh->Lookup->getParamTag($interh_maestro_edit, "p_x_motivo_atencioninteh") ?>
</span>
<?php echo $interh_maestro_edit->motivo_atencioninteh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_maestro_edit->hospital_destinointerh->Visible) { // hospital_destinointerh ?>
	<div id="r_hospital_destinointerh" class="form-group row">
		<label id="elh_interh_maestro_hospital_destinointerh" for="x_hospital_destinointerh" class="<?php echo $interh_maestro_edit->LeftColumnClass ?>"><?php echo $interh_maestro_edit->hospital_destinointerh->caption() ?><?php echo $interh_maestro_edit->hospital_destinointerh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_maestro_edit->RightColumnClass ?>"><div <?php echo $interh_maestro_edit->hospital_destinointerh->cellAttributes() ?>>
<span id="el_interh_maestro_hospital_destinointerh">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_hospital_destinointerh"><?php echo EmptyValue(strval($interh_maestro_edit->hospital_destinointerh->ViewValue)) ? $Language->phrase("PleaseSelect") : $interh_maestro_edit->hospital_destinointerh->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($interh_maestro_edit->hospital_destinointerh->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($interh_maestro_edit->hospital_destinointerh->ReadOnly || $interh_maestro_edit->hospital_destinointerh->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_hospital_destinointerh',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "hospitalesgeneral") && !$interh_maestro_edit->hospital_destinointerh->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_hospital_destinointerh" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $interh_maestro_edit->hospital_destinointerh->caption() ?>" data-title="<?php echo $interh_maestro_edit->hospital_destinointerh->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_hospital_destinointerh',url:'hospitalesgeneraladdopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $interh_maestro_edit->hospital_destinointerh->Lookup->getParamTag($interh_maestro_edit, "p_x_hospital_destinointerh") ?>
<input type="hidden" data-table="interh_maestro" data-field="x_hospital_destinointerh" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $interh_maestro_edit->hospital_destinointerh->displayValueSeparatorAttribute() ?>" name="x_hospital_destinointerh" id="x_hospital_destinointerh" value="<?php echo $interh_maestro_edit->hospital_destinointerh->CurrentValue ?>"<?php echo $interh_maestro_edit->hospital_destinointerh->editAttributes() ?>>
</span>
<?php echo $interh_maestro_edit->hospital_destinointerh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($interh_maestro_edit->nombre_recibe->Visible) { // nombre_recibe ?>
	<div id="r_nombre_recibe" class="form-group row">
		<label id="elh_interh_maestro_nombre_recibe" for="x_nombre_recibe" class="<?php echo $interh_maestro_edit->LeftColumnClass ?>"><?php echo $interh_maestro_edit->nombre_recibe->caption() ?><?php echo $interh_maestro_edit->nombre_recibe->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $interh_maestro_edit->RightColumnClass ?>"><div <?php echo $interh_maestro_edit->nombre_recibe->cellAttributes() ?>>
<span id="el_interh_maestro_nombre_recibe">
<input type="text" data-table="interh_maestro" data-field="x_nombre_recibe" name="x_nombre_recibe" id="x_nombre_recibe" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($interh_maestro_edit->nombre_recibe->getPlaceHolder()) ?>" value="<?php echo $interh_maestro_edit->nombre_recibe->EditValue ?>"<?php echo $interh_maestro_edit->nombre_recibe->editAttributes() ?>>
</span>
<?php echo $interh_maestro_edit->nombre_recibe->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="interh_maestro" data-field="x_cod_casointerh" name="x_cod_casointerh" id="x_cod_casointerh" value="<?php echo HtmlEncode($interh_maestro_edit->cod_casointerh->CurrentValue) ?>">
<?php if (!$interh_maestro_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $interh_maestro_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $interh_maestro_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$interh_maestro_edit->showPageFooter();
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
$interh_maestro_edit->terminate();
?>