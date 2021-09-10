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
$censo_camas_edit = new censo_camas_edit();

// Run the page
$censo_camas_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$censo_camas_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fcenso_camasedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fcenso_camasedit = currentForm = new ew.Form("fcenso_camasedit", "edit");

	// Validate form
	fcenso_camasedit.validate = function() {
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
			<?php if ($censo_camas_edit->id_cama->Required) { ?>
				elm = this.getElements("x" + infix + "_id_cama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $censo_camas_edit->id_cama->caption(), $censo_camas_edit->id_cama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($censo_camas_edit->id_hospital->Required) { ?>
				elm = this.getElements("x" + infix + "_id_hospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $censo_camas_edit->id_hospital->caption(), $censo_camas_edit->id_hospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($censo_camas_edit->fecha_reporte->Required) { ?>
				elm = this.getElements("x" + infix + "_fecha_reporte");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $censo_camas_edit->fecha_reporte->caption(), $censo_camas_edit->fecha_reporte->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($censo_camas_edit->nombre_reporta->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_reporta");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $censo_camas_edit->nombre_reporta->caption(), $censo_camas_edit->nombre_reporta->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($censo_camas_edit->tele_reporta->Required) { ?>
				elm = this.getElements("x" + infix + "_tele_reporta");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $censo_camas_edit->tele_reporta->caption(), $censo_camas_edit->tele_reporta->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($censo_camas_edit->id_bloque->Required) { ?>
				elm = this.getElements("x" + infix + "_id_bloque");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $censo_camas_edit->id_bloque->caption(), $censo_camas_edit->id_bloque->RequiredErrorMessage)) ?>");
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
	fcenso_camasedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fcenso_camasedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fcenso_camasedit.lists["x_id_hospital"] = <?php echo $censo_camas_edit->id_hospital->Lookup->toClientList($censo_camas_edit) ?>;
	fcenso_camasedit.lists["x_id_hospital"].options = <?php echo JsonEncode($censo_camas_edit->id_hospital->lookupOptions()) ?>;
	loadjs.done("fcenso_camasedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $censo_camas_edit->showPageHeader(); ?>
<?php
$censo_camas_edit->showMessage();
?>
<form name="fcenso_camasedit" id="fcenso_camasedit" class="<?php echo $censo_camas_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="censo_camas">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$censo_camas_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($censo_camas_edit->id_cama->Visible) { // id_cama ?>
	<div id="r_id_cama" class="form-group row">
		<label id="elh_censo_camas_id_cama" class="<?php echo $censo_camas_edit->LeftColumnClass ?>"><?php echo $censo_camas_edit->id_cama->caption() ?><?php echo $censo_camas_edit->id_cama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $censo_camas_edit->RightColumnClass ?>"><div <?php echo $censo_camas_edit->id_cama->cellAttributes() ?>>
<span id="el_censo_camas_id_cama">
<span<?php echo $censo_camas_edit->id_cama->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($censo_camas_edit->id_cama->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="censo_camas" data-field="x_id_cama" name="x_id_cama" id="x_id_cama" value="<?php echo HtmlEncode($censo_camas_edit->id_cama->CurrentValue) ?>">
<?php echo $censo_camas_edit->id_cama->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($censo_camas_edit->id_hospital->Visible) { // id_hospital ?>
	<div id="r_id_hospital" class="form-group row">
		<label id="elh_censo_camas_id_hospital" for="x_id_hospital" class="<?php echo $censo_camas_edit->LeftColumnClass ?>"><?php echo $censo_camas_edit->id_hospital->caption() ?><?php echo $censo_camas_edit->id_hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $censo_camas_edit->RightColumnClass ?>"><div <?php echo $censo_camas_edit->id_hospital->cellAttributes() ?>>
<span id="el_censo_camas_id_hospital">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_id_hospital"><?php echo EmptyValue(strval($censo_camas_edit->id_hospital->ViewValue)) ? $Language->phrase("PleaseSelect") : $censo_camas_edit->id_hospital->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($censo_camas_edit->id_hospital->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($censo_camas_edit->id_hospital->ReadOnly || $censo_camas_edit->id_hospital->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_id_hospital',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $censo_camas_edit->id_hospital->Lookup->getParamTag($censo_camas_edit, "p_x_id_hospital") ?>
<input type="hidden" data-table="censo_camas" data-field="x_id_hospital" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $censo_camas_edit->id_hospital->displayValueSeparatorAttribute() ?>" name="x_id_hospital" id="x_id_hospital" value="<?php echo $censo_camas_edit->id_hospital->CurrentValue ?>"<?php echo $censo_camas_edit->id_hospital->editAttributes() ?>>
</span>
<?php echo $censo_camas_edit->id_hospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($censo_camas_edit->nombre_reporta->Visible) { // nombre_reporta ?>
	<div id="r_nombre_reporta" class="form-group row">
		<label id="elh_censo_camas_nombre_reporta" for="x_nombre_reporta" class="<?php echo $censo_camas_edit->LeftColumnClass ?>"><?php echo $censo_camas_edit->nombre_reporta->caption() ?><?php echo $censo_camas_edit->nombre_reporta->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $censo_camas_edit->RightColumnClass ?>"><div <?php echo $censo_camas_edit->nombre_reporta->cellAttributes() ?>>
<span id="el_censo_camas_nombre_reporta">
<input type="text" data-table="censo_camas" data-field="x_nombre_reporta" name="x_nombre_reporta" id="x_nombre_reporta" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($censo_camas_edit->nombre_reporta->getPlaceHolder()) ?>" value="<?php echo $censo_camas_edit->nombre_reporta->EditValue ?>"<?php echo $censo_camas_edit->nombre_reporta->editAttributes() ?>>
</span>
<?php echo $censo_camas_edit->nombre_reporta->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($censo_camas_edit->tele_reporta->Visible) { // tele_reporta ?>
	<div id="r_tele_reporta" class="form-group row">
		<label id="elh_censo_camas_tele_reporta" for="x_tele_reporta" class="<?php echo $censo_camas_edit->LeftColumnClass ?>"><?php echo $censo_camas_edit->tele_reporta->caption() ?><?php echo $censo_camas_edit->tele_reporta->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $censo_camas_edit->RightColumnClass ?>"><div <?php echo $censo_camas_edit->tele_reporta->cellAttributes() ?>>
<span id="el_censo_camas_tele_reporta">
<input type="text" data-table="censo_camas" data-field="x_tele_reporta" name="x_tele_reporta" id="x_tele_reporta" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($censo_camas_edit->tele_reporta->getPlaceHolder()) ?>" value="<?php echo $censo_camas_edit->tele_reporta->EditValue ?>"<?php echo $censo_camas_edit->tele_reporta->editAttributes() ?>>
</span>
<?php echo $censo_camas_edit->tele_reporta->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<span id="el_censo_camas_id_bloque">
<input type="hidden" data-table="censo_camas" data-field="x_id_bloque" name="x_id_bloque" id="x_id_bloque" value="<?php echo HtmlEncode($censo_camas_edit->id_bloque->CurrentValue) ?>">
</span>
<?php if (!$censo_camas_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $censo_camas_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $censo_camas_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$censo_camas_edit->showPageFooter();
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
$censo_camas_edit->terminate();
?>