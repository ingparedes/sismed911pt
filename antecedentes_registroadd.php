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
$antecedentes_registro_add = new antecedentes_registro_add();

// Run the page
$antecedentes_registro_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$antecedentes_registro_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fantecedentes_registroadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fantecedentes_registroadd = currentForm = new ew.Form("fantecedentes_registroadd", "add");

	// Validate form
	fantecedentes_registroadd.validate = function() {
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
			<?php if ($antecedentes_registro_add->cod_casopreh->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $antecedentes_registro_add->cod_casopreh->caption(), $antecedentes_registro_add->cod_casopreh->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($antecedentes_registro_add->cod_casopreh->errorMessage()) ?>");
			<?php if ($antecedentes_registro_add->diabetes->Required) { ?>
				elm = this.getElements("x" + infix + "_diabetes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $antecedentes_registro_add->diabetes->caption(), $antecedentes_registro_add->diabetes->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_diabetes");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($antecedentes_registro_add->diabetes->errorMessage()) ?>");
			<?php if ($antecedentes_registro_add->cardiopatia->Required) { ?>
				elm = this.getElements("x" + infix + "_cardiopatia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $antecedentes_registro_add->cardiopatia->caption(), $antecedentes_registro_add->cardiopatia->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cardiopatia");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($antecedentes_registro_add->cardiopatia->errorMessage()) ?>");
			<?php if ($antecedentes_registro_add->convulsiones->Required) { ?>
				elm = this.getElements("x" + infix + "_convulsiones");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $antecedentes_registro_add->convulsiones->caption(), $antecedentes_registro_add->convulsiones->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_convulsiones");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($antecedentes_registro_add->convulsiones->errorMessage()) ?>");
			<?php if ($antecedentes_registro_add->asmabronquitis->Required) { ?>
				elm = this.getElements("x" + infix + "_asmabronquitis");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $antecedentes_registro_add->asmabronquitis->caption(), $antecedentes_registro_add->asmabronquitis->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_asmabronquitis");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($antecedentes_registro_add->asmabronquitis->errorMessage()) ?>");
			<?php if ($antecedentes_registro_add->acv->Required) { ?>
				elm = this.getElements("x" + infix + "_acv");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $antecedentes_registro_add->acv->caption(), $antecedentes_registro_add->acv->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_acv");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($antecedentes_registro_add->acv->errorMessage()) ?>");
			<?php if ($antecedentes_registro_add->has->Required) { ?>
				elm = this.getElements("x" + infix + "_has");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $antecedentes_registro_add->has->caption(), $antecedentes_registro_add->has->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_has");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($antecedentes_registro_add->has->errorMessage()) ?>");
			<?php if ($antecedentes_registro_add->alergia->Required) { ?>
				elm = this.getElements("x" + infix + "_alergia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $antecedentes_registro_add->alergia->caption(), $antecedentes_registro_add->alergia->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_alergia");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($antecedentes_registro_add->alergia->errorMessage()) ?>");
			<?php if ($antecedentes_registro_add->medicamentos->Required) { ?>
				elm = this.getElements("x" + infix + "_medicamentos");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $antecedentes_registro_add->medicamentos->caption(), $antecedentes_registro_add->medicamentos->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($antecedentes_registro_add->otros->Required) { ?>
				elm = this.getElements("x" + infix + "_otros");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $antecedentes_registro_add->otros->caption(), $antecedentes_registro_add->otros->RequiredErrorMessage)) ?>");
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
	fantecedentes_registroadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fantecedentes_registroadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fantecedentes_registroadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $antecedentes_registro_add->showPageHeader(); ?>
<?php
$antecedentes_registro_add->showMessage();
?>
<form name="fantecedentes_registroadd" id="fantecedentes_registroadd" class="<?php echo $antecedentes_registro_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="antecedentes_registro">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$antecedentes_registro_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($antecedentes_registro_add->cod_casopreh->Visible) { // cod_casopreh ?>
	<div id="r_cod_casopreh" class="form-group row">
		<label id="elh_antecedentes_registro_cod_casopreh" for="x_cod_casopreh" class="<?php echo $antecedentes_registro_add->LeftColumnClass ?>"><?php echo $antecedentes_registro_add->cod_casopreh->caption() ?><?php echo $antecedentes_registro_add->cod_casopreh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $antecedentes_registro_add->RightColumnClass ?>"><div <?php echo $antecedentes_registro_add->cod_casopreh->cellAttributes() ?>>
<span id="el_antecedentes_registro_cod_casopreh">
<input type="text" data-table="antecedentes_registro" data-field="x_cod_casopreh" name="x_cod_casopreh" id="x_cod_casopreh" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($antecedentes_registro_add->cod_casopreh->getPlaceHolder()) ?>" value="<?php echo $antecedentes_registro_add->cod_casopreh->EditValue ?>"<?php echo $antecedentes_registro_add->cod_casopreh->editAttributes() ?>>
</span>
<?php echo $antecedentes_registro_add->cod_casopreh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($antecedentes_registro_add->diabetes->Visible) { // diabetes ?>
	<div id="r_diabetes" class="form-group row">
		<label id="elh_antecedentes_registro_diabetes" for="x_diabetes" class="<?php echo $antecedentes_registro_add->LeftColumnClass ?>"><?php echo $antecedentes_registro_add->diabetes->caption() ?><?php echo $antecedentes_registro_add->diabetes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $antecedentes_registro_add->RightColumnClass ?>"><div <?php echo $antecedentes_registro_add->diabetes->cellAttributes() ?>>
<span id="el_antecedentes_registro_diabetes">
<input type="text" data-table="antecedentes_registro" data-field="x_diabetes" name="x_diabetes" id="x_diabetes" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($antecedentes_registro_add->diabetes->getPlaceHolder()) ?>" value="<?php echo $antecedentes_registro_add->diabetes->EditValue ?>"<?php echo $antecedentes_registro_add->diabetes->editAttributes() ?>>
</span>
<?php echo $antecedentes_registro_add->diabetes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($antecedentes_registro_add->cardiopatia->Visible) { // cardiopatia ?>
	<div id="r_cardiopatia" class="form-group row">
		<label id="elh_antecedentes_registro_cardiopatia" for="x_cardiopatia" class="<?php echo $antecedentes_registro_add->LeftColumnClass ?>"><?php echo $antecedentes_registro_add->cardiopatia->caption() ?><?php echo $antecedentes_registro_add->cardiopatia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $antecedentes_registro_add->RightColumnClass ?>"><div <?php echo $antecedentes_registro_add->cardiopatia->cellAttributes() ?>>
<span id="el_antecedentes_registro_cardiopatia">
<input type="text" data-table="antecedentes_registro" data-field="x_cardiopatia" name="x_cardiopatia" id="x_cardiopatia" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($antecedentes_registro_add->cardiopatia->getPlaceHolder()) ?>" value="<?php echo $antecedentes_registro_add->cardiopatia->EditValue ?>"<?php echo $antecedentes_registro_add->cardiopatia->editAttributes() ?>>
</span>
<?php echo $antecedentes_registro_add->cardiopatia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($antecedentes_registro_add->convulsiones->Visible) { // convulsiones ?>
	<div id="r_convulsiones" class="form-group row">
		<label id="elh_antecedentes_registro_convulsiones" for="x_convulsiones" class="<?php echo $antecedentes_registro_add->LeftColumnClass ?>"><?php echo $antecedentes_registro_add->convulsiones->caption() ?><?php echo $antecedentes_registro_add->convulsiones->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $antecedentes_registro_add->RightColumnClass ?>"><div <?php echo $antecedentes_registro_add->convulsiones->cellAttributes() ?>>
<span id="el_antecedentes_registro_convulsiones">
<input type="text" data-table="antecedentes_registro" data-field="x_convulsiones" name="x_convulsiones" id="x_convulsiones" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($antecedentes_registro_add->convulsiones->getPlaceHolder()) ?>" value="<?php echo $antecedentes_registro_add->convulsiones->EditValue ?>"<?php echo $antecedentes_registro_add->convulsiones->editAttributes() ?>>
</span>
<?php echo $antecedentes_registro_add->convulsiones->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($antecedentes_registro_add->asmabronquitis->Visible) { // asmabronquitis ?>
	<div id="r_asmabronquitis" class="form-group row">
		<label id="elh_antecedentes_registro_asmabronquitis" for="x_asmabronquitis" class="<?php echo $antecedentes_registro_add->LeftColumnClass ?>"><?php echo $antecedentes_registro_add->asmabronquitis->caption() ?><?php echo $antecedentes_registro_add->asmabronquitis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $antecedentes_registro_add->RightColumnClass ?>"><div <?php echo $antecedentes_registro_add->asmabronquitis->cellAttributes() ?>>
<span id="el_antecedentes_registro_asmabronquitis">
<input type="text" data-table="antecedentes_registro" data-field="x_asmabronquitis" name="x_asmabronquitis" id="x_asmabronquitis" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($antecedentes_registro_add->asmabronquitis->getPlaceHolder()) ?>" value="<?php echo $antecedentes_registro_add->asmabronquitis->EditValue ?>"<?php echo $antecedentes_registro_add->asmabronquitis->editAttributes() ?>>
</span>
<?php echo $antecedentes_registro_add->asmabronquitis->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($antecedentes_registro_add->acv->Visible) { // acv ?>
	<div id="r_acv" class="form-group row">
		<label id="elh_antecedentes_registro_acv" for="x_acv" class="<?php echo $antecedentes_registro_add->LeftColumnClass ?>"><?php echo $antecedentes_registro_add->acv->caption() ?><?php echo $antecedentes_registro_add->acv->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $antecedentes_registro_add->RightColumnClass ?>"><div <?php echo $antecedentes_registro_add->acv->cellAttributes() ?>>
<span id="el_antecedentes_registro_acv">
<input type="text" data-table="antecedentes_registro" data-field="x_acv" name="x_acv" id="x_acv" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($antecedentes_registro_add->acv->getPlaceHolder()) ?>" value="<?php echo $antecedentes_registro_add->acv->EditValue ?>"<?php echo $antecedentes_registro_add->acv->editAttributes() ?>>
</span>
<?php echo $antecedentes_registro_add->acv->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($antecedentes_registro_add->has->Visible) { // has ?>
	<div id="r_has" class="form-group row">
		<label id="elh_antecedentes_registro_has" for="x_has" class="<?php echo $antecedentes_registro_add->LeftColumnClass ?>"><?php echo $antecedentes_registro_add->has->caption() ?><?php echo $antecedentes_registro_add->has->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $antecedentes_registro_add->RightColumnClass ?>"><div <?php echo $antecedentes_registro_add->has->cellAttributes() ?>>
<span id="el_antecedentes_registro_has">
<input type="text" data-table="antecedentes_registro" data-field="x_has" name="x_has" id="x_has" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($antecedentes_registro_add->has->getPlaceHolder()) ?>" value="<?php echo $antecedentes_registro_add->has->EditValue ?>"<?php echo $antecedentes_registro_add->has->editAttributes() ?>>
</span>
<?php echo $antecedentes_registro_add->has->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($antecedentes_registro_add->alergia->Visible) { // alergia ?>
	<div id="r_alergia" class="form-group row">
		<label id="elh_antecedentes_registro_alergia" for="x_alergia" class="<?php echo $antecedentes_registro_add->LeftColumnClass ?>"><?php echo $antecedentes_registro_add->alergia->caption() ?><?php echo $antecedentes_registro_add->alergia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $antecedentes_registro_add->RightColumnClass ?>"><div <?php echo $antecedentes_registro_add->alergia->cellAttributes() ?>>
<span id="el_antecedentes_registro_alergia">
<input type="text" data-table="antecedentes_registro" data-field="x_alergia" name="x_alergia" id="x_alergia" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($antecedentes_registro_add->alergia->getPlaceHolder()) ?>" value="<?php echo $antecedentes_registro_add->alergia->EditValue ?>"<?php echo $antecedentes_registro_add->alergia->editAttributes() ?>>
</span>
<?php echo $antecedentes_registro_add->alergia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($antecedentes_registro_add->medicamentos->Visible) { // medicamentos ?>
	<div id="r_medicamentos" class="form-group row">
		<label id="elh_antecedentes_registro_medicamentos" for="x_medicamentos" class="<?php echo $antecedentes_registro_add->LeftColumnClass ?>"><?php echo $antecedentes_registro_add->medicamentos->caption() ?><?php echo $antecedentes_registro_add->medicamentos->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $antecedentes_registro_add->RightColumnClass ?>"><div <?php echo $antecedentes_registro_add->medicamentos->cellAttributes() ?>>
<span id="el_antecedentes_registro_medicamentos">
<input type="text" data-table="antecedentes_registro" data-field="x_medicamentos" name="x_medicamentos" id="x_medicamentos" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($antecedentes_registro_add->medicamentos->getPlaceHolder()) ?>" value="<?php echo $antecedentes_registro_add->medicamentos->EditValue ?>"<?php echo $antecedentes_registro_add->medicamentos->editAttributes() ?>>
</span>
<?php echo $antecedentes_registro_add->medicamentos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($antecedentes_registro_add->otros->Visible) { // otros ?>
	<div id="r_otros" class="form-group row">
		<label id="elh_antecedentes_registro_otros" for="x_otros" class="<?php echo $antecedentes_registro_add->LeftColumnClass ?>"><?php echo $antecedentes_registro_add->otros->caption() ?><?php echo $antecedentes_registro_add->otros->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $antecedentes_registro_add->RightColumnClass ?>"><div <?php echo $antecedentes_registro_add->otros->cellAttributes() ?>>
<span id="el_antecedentes_registro_otros">
<input type="text" data-table="antecedentes_registro" data-field="x_otros" name="x_otros" id="x_otros" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($antecedentes_registro_add->otros->getPlaceHolder()) ?>" value="<?php echo $antecedentes_registro_add->otros->EditValue ?>"<?php echo $antecedentes_registro_add->otros->editAttributes() ?>>
</span>
<?php echo $antecedentes_registro_add->otros->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$antecedentes_registro_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $antecedentes_registro_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $antecedentes_registro_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$antecedentes_registro_add->showPageFooter();
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
$antecedentes_registro_add->terminate();
?>