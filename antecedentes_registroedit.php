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
$antecedentes_registro_edit = new antecedentes_registro_edit();

// Run the page
$antecedentes_registro_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$antecedentes_registro_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fantecedentes_registroedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fantecedentes_registroedit = currentForm = new ew.Form("fantecedentes_registroedit", "edit");

	// Validate form
	fantecedentes_registroedit.validate = function() {
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
			<?php if ($antecedentes_registro_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $antecedentes_registro_edit->id->caption(), $antecedentes_registro_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($antecedentes_registro_edit->cod_casopreh->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $antecedentes_registro_edit->cod_casopreh->caption(), $antecedentes_registro_edit->cod_casopreh->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($antecedentes_registro_edit->cod_casopreh->errorMessage()) ?>");
			<?php if ($antecedentes_registro_edit->diabetes->Required) { ?>
				elm = this.getElements("x" + infix + "_diabetes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $antecedentes_registro_edit->diabetes->caption(), $antecedentes_registro_edit->diabetes->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_diabetes");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($antecedentes_registro_edit->diabetes->errorMessage()) ?>");
			<?php if ($antecedentes_registro_edit->cardiopatia->Required) { ?>
				elm = this.getElements("x" + infix + "_cardiopatia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $antecedentes_registro_edit->cardiopatia->caption(), $antecedentes_registro_edit->cardiopatia->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cardiopatia");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($antecedentes_registro_edit->cardiopatia->errorMessage()) ?>");
			<?php if ($antecedentes_registro_edit->convulsiones->Required) { ?>
				elm = this.getElements("x" + infix + "_convulsiones");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $antecedentes_registro_edit->convulsiones->caption(), $antecedentes_registro_edit->convulsiones->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_convulsiones");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($antecedentes_registro_edit->convulsiones->errorMessage()) ?>");
			<?php if ($antecedentes_registro_edit->asmabronquitis->Required) { ?>
				elm = this.getElements("x" + infix + "_asmabronquitis");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $antecedentes_registro_edit->asmabronquitis->caption(), $antecedentes_registro_edit->asmabronquitis->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_asmabronquitis");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($antecedentes_registro_edit->asmabronquitis->errorMessage()) ?>");
			<?php if ($antecedentes_registro_edit->acv->Required) { ?>
				elm = this.getElements("x" + infix + "_acv");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $antecedentes_registro_edit->acv->caption(), $antecedentes_registro_edit->acv->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_acv");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($antecedentes_registro_edit->acv->errorMessage()) ?>");
			<?php if ($antecedentes_registro_edit->has->Required) { ?>
				elm = this.getElements("x" + infix + "_has");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $antecedentes_registro_edit->has->caption(), $antecedentes_registro_edit->has->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_has");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($antecedentes_registro_edit->has->errorMessage()) ?>");
			<?php if ($antecedentes_registro_edit->alergia->Required) { ?>
				elm = this.getElements("x" + infix + "_alergia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $antecedentes_registro_edit->alergia->caption(), $antecedentes_registro_edit->alergia->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_alergia");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($antecedentes_registro_edit->alergia->errorMessage()) ?>");
			<?php if ($antecedentes_registro_edit->medicamentos->Required) { ?>
				elm = this.getElements("x" + infix + "_medicamentos");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $antecedentes_registro_edit->medicamentos->caption(), $antecedentes_registro_edit->medicamentos->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($antecedentes_registro_edit->otros->Required) { ?>
				elm = this.getElements("x" + infix + "_otros");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $antecedentes_registro_edit->otros->caption(), $antecedentes_registro_edit->otros->RequiredErrorMessage)) ?>");
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
	fantecedentes_registroedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fantecedentes_registroedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fantecedentes_registroedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $antecedentes_registro_edit->showPageHeader(); ?>
<?php
$antecedentes_registro_edit->showMessage();
?>
<form name="fantecedentes_registroedit" id="fantecedentes_registroedit" class="<?php echo $antecedentes_registro_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="antecedentes_registro">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$antecedentes_registro_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($antecedentes_registro_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_antecedentes_registro_id" class="<?php echo $antecedentes_registro_edit->LeftColumnClass ?>"><?php echo $antecedentes_registro_edit->id->caption() ?><?php echo $antecedentes_registro_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $antecedentes_registro_edit->RightColumnClass ?>"><div <?php echo $antecedentes_registro_edit->id->cellAttributes() ?>>
<span id="el_antecedentes_registro_id">
<span<?php echo $antecedentes_registro_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($antecedentes_registro_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="antecedentes_registro" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($antecedentes_registro_edit->id->CurrentValue) ?>">
<?php echo $antecedentes_registro_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($antecedentes_registro_edit->cod_casopreh->Visible) { // cod_casopreh ?>
	<div id="r_cod_casopreh" class="form-group row">
		<label id="elh_antecedentes_registro_cod_casopreh" for="x_cod_casopreh" class="<?php echo $antecedentes_registro_edit->LeftColumnClass ?>"><?php echo $antecedentes_registro_edit->cod_casopreh->caption() ?><?php echo $antecedentes_registro_edit->cod_casopreh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $antecedentes_registro_edit->RightColumnClass ?>"><div <?php echo $antecedentes_registro_edit->cod_casopreh->cellAttributes() ?>>
<span id="el_antecedentes_registro_cod_casopreh">
<input type="text" data-table="antecedentes_registro" data-field="x_cod_casopreh" name="x_cod_casopreh" id="x_cod_casopreh" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($antecedentes_registro_edit->cod_casopreh->getPlaceHolder()) ?>" value="<?php echo $antecedentes_registro_edit->cod_casopreh->EditValue ?>"<?php echo $antecedentes_registro_edit->cod_casopreh->editAttributes() ?>>
</span>
<?php echo $antecedentes_registro_edit->cod_casopreh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($antecedentes_registro_edit->diabetes->Visible) { // diabetes ?>
	<div id="r_diabetes" class="form-group row">
		<label id="elh_antecedentes_registro_diabetes" for="x_diabetes" class="<?php echo $antecedentes_registro_edit->LeftColumnClass ?>"><?php echo $antecedentes_registro_edit->diabetes->caption() ?><?php echo $antecedentes_registro_edit->diabetes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $antecedentes_registro_edit->RightColumnClass ?>"><div <?php echo $antecedentes_registro_edit->diabetes->cellAttributes() ?>>
<span id="el_antecedentes_registro_diabetes">
<input type="text" data-table="antecedentes_registro" data-field="x_diabetes" name="x_diabetes" id="x_diabetes" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($antecedentes_registro_edit->diabetes->getPlaceHolder()) ?>" value="<?php echo $antecedentes_registro_edit->diabetes->EditValue ?>"<?php echo $antecedentes_registro_edit->diabetes->editAttributes() ?>>
</span>
<?php echo $antecedentes_registro_edit->diabetes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($antecedentes_registro_edit->cardiopatia->Visible) { // cardiopatia ?>
	<div id="r_cardiopatia" class="form-group row">
		<label id="elh_antecedentes_registro_cardiopatia" for="x_cardiopatia" class="<?php echo $antecedentes_registro_edit->LeftColumnClass ?>"><?php echo $antecedentes_registro_edit->cardiopatia->caption() ?><?php echo $antecedentes_registro_edit->cardiopatia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $antecedentes_registro_edit->RightColumnClass ?>"><div <?php echo $antecedentes_registro_edit->cardiopatia->cellAttributes() ?>>
<span id="el_antecedentes_registro_cardiopatia">
<input type="text" data-table="antecedentes_registro" data-field="x_cardiopatia" name="x_cardiopatia" id="x_cardiopatia" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($antecedentes_registro_edit->cardiopatia->getPlaceHolder()) ?>" value="<?php echo $antecedentes_registro_edit->cardiopatia->EditValue ?>"<?php echo $antecedentes_registro_edit->cardiopatia->editAttributes() ?>>
</span>
<?php echo $antecedentes_registro_edit->cardiopatia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($antecedentes_registro_edit->convulsiones->Visible) { // convulsiones ?>
	<div id="r_convulsiones" class="form-group row">
		<label id="elh_antecedentes_registro_convulsiones" for="x_convulsiones" class="<?php echo $antecedentes_registro_edit->LeftColumnClass ?>"><?php echo $antecedentes_registro_edit->convulsiones->caption() ?><?php echo $antecedentes_registro_edit->convulsiones->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $antecedentes_registro_edit->RightColumnClass ?>"><div <?php echo $antecedentes_registro_edit->convulsiones->cellAttributes() ?>>
<span id="el_antecedentes_registro_convulsiones">
<input type="text" data-table="antecedentes_registro" data-field="x_convulsiones" name="x_convulsiones" id="x_convulsiones" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($antecedentes_registro_edit->convulsiones->getPlaceHolder()) ?>" value="<?php echo $antecedentes_registro_edit->convulsiones->EditValue ?>"<?php echo $antecedentes_registro_edit->convulsiones->editAttributes() ?>>
</span>
<?php echo $antecedentes_registro_edit->convulsiones->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($antecedentes_registro_edit->asmabronquitis->Visible) { // asmabronquitis ?>
	<div id="r_asmabronquitis" class="form-group row">
		<label id="elh_antecedentes_registro_asmabronquitis" for="x_asmabronquitis" class="<?php echo $antecedentes_registro_edit->LeftColumnClass ?>"><?php echo $antecedentes_registro_edit->asmabronquitis->caption() ?><?php echo $antecedentes_registro_edit->asmabronquitis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $antecedentes_registro_edit->RightColumnClass ?>"><div <?php echo $antecedentes_registro_edit->asmabronquitis->cellAttributes() ?>>
<span id="el_antecedentes_registro_asmabronquitis">
<input type="text" data-table="antecedentes_registro" data-field="x_asmabronquitis" name="x_asmabronquitis" id="x_asmabronquitis" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($antecedentes_registro_edit->asmabronquitis->getPlaceHolder()) ?>" value="<?php echo $antecedentes_registro_edit->asmabronquitis->EditValue ?>"<?php echo $antecedentes_registro_edit->asmabronquitis->editAttributes() ?>>
</span>
<?php echo $antecedentes_registro_edit->asmabronquitis->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($antecedentes_registro_edit->acv->Visible) { // acv ?>
	<div id="r_acv" class="form-group row">
		<label id="elh_antecedentes_registro_acv" for="x_acv" class="<?php echo $antecedentes_registro_edit->LeftColumnClass ?>"><?php echo $antecedentes_registro_edit->acv->caption() ?><?php echo $antecedentes_registro_edit->acv->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $antecedentes_registro_edit->RightColumnClass ?>"><div <?php echo $antecedentes_registro_edit->acv->cellAttributes() ?>>
<span id="el_antecedentes_registro_acv">
<input type="text" data-table="antecedentes_registro" data-field="x_acv" name="x_acv" id="x_acv" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($antecedentes_registro_edit->acv->getPlaceHolder()) ?>" value="<?php echo $antecedentes_registro_edit->acv->EditValue ?>"<?php echo $antecedentes_registro_edit->acv->editAttributes() ?>>
</span>
<?php echo $antecedentes_registro_edit->acv->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($antecedentes_registro_edit->has->Visible) { // has ?>
	<div id="r_has" class="form-group row">
		<label id="elh_antecedentes_registro_has" for="x_has" class="<?php echo $antecedentes_registro_edit->LeftColumnClass ?>"><?php echo $antecedentes_registro_edit->has->caption() ?><?php echo $antecedentes_registro_edit->has->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $antecedentes_registro_edit->RightColumnClass ?>"><div <?php echo $antecedentes_registro_edit->has->cellAttributes() ?>>
<span id="el_antecedentes_registro_has">
<input type="text" data-table="antecedentes_registro" data-field="x_has" name="x_has" id="x_has" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($antecedentes_registro_edit->has->getPlaceHolder()) ?>" value="<?php echo $antecedentes_registro_edit->has->EditValue ?>"<?php echo $antecedentes_registro_edit->has->editAttributes() ?>>
</span>
<?php echo $antecedentes_registro_edit->has->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($antecedentes_registro_edit->alergia->Visible) { // alergia ?>
	<div id="r_alergia" class="form-group row">
		<label id="elh_antecedentes_registro_alergia" for="x_alergia" class="<?php echo $antecedentes_registro_edit->LeftColumnClass ?>"><?php echo $antecedentes_registro_edit->alergia->caption() ?><?php echo $antecedentes_registro_edit->alergia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $antecedentes_registro_edit->RightColumnClass ?>"><div <?php echo $antecedentes_registro_edit->alergia->cellAttributes() ?>>
<span id="el_antecedentes_registro_alergia">
<input type="text" data-table="antecedentes_registro" data-field="x_alergia" name="x_alergia" id="x_alergia" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($antecedentes_registro_edit->alergia->getPlaceHolder()) ?>" value="<?php echo $antecedentes_registro_edit->alergia->EditValue ?>"<?php echo $antecedentes_registro_edit->alergia->editAttributes() ?>>
</span>
<?php echo $antecedentes_registro_edit->alergia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($antecedentes_registro_edit->medicamentos->Visible) { // medicamentos ?>
	<div id="r_medicamentos" class="form-group row">
		<label id="elh_antecedentes_registro_medicamentos" for="x_medicamentos" class="<?php echo $antecedentes_registro_edit->LeftColumnClass ?>"><?php echo $antecedentes_registro_edit->medicamentos->caption() ?><?php echo $antecedentes_registro_edit->medicamentos->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $antecedentes_registro_edit->RightColumnClass ?>"><div <?php echo $antecedentes_registro_edit->medicamentos->cellAttributes() ?>>
<span id="el_antecedentes_registro_medicamentos">
<input type="text" data-table="antecedentes_registro" data-field="x_medicamentos" name="x_medicamentos" id="x_medicamentos" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($antecedentes_registro_edit->medicamentos->getPlaceHolder()) ?>" value="<?php echo $antecedentes_registro_edit->medicamentos->EditValue ?>"<?php echo $antecedentes_registro_edit->medicamentos->editAttributes() ?>>
</span>
<?php echo $antecedentes_registro_edit->medicamentos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($antecedentes_registro_edit->otros->Visible) { // otros ?>
	<div id="r_otros" class="form-group row">
		<label id="elh_antecedentes_registro_otros" for="x_otros" class="<?php echo $antecedentes_registro_edit->LeftColumnClass ?>"><?php echo $antecedentes_registro_edit->otros->caption() ?><?php echo $antecedentes_registro_edit->otros->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $antecedentes_registro_edit->RightColumnClass ?>"><div <?php echo $antecedentes_registro_edit->otros->cellAttributes() ?>>
<span id="el_antecedentes_registro_otros">
<input type="text" data-table="antecedentes_registro" data-field="x_otros" name="x_otros" id="x_otros" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($antecedentes_registro_edit->otros->getPlaceHolder()) ?>" value="<?php echo $antecedentes_registro_edit->otros->EditValue ?>"<?php echo $antecedentes_registro_edit->otros->editAttributes() ?>>
</span>
<?php echo $antecedentes_registro_edit->otros->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$antecedentes_registro_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $antecedentes_registro_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $antecedentes_registro_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$antecedentes_registro_edit->showPageFooter();
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
$antecedentes_registro_edit->terminate();
?>