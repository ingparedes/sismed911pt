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
$cie10_edit = new cie10_edit();

// Run the page
$cie10_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$cie10_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fcie10edit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fcie10edit = currentForm = new ew.Form("fcie10edit", "edit");

	// Validate form
	fcie10edit.validate = function() {
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
			<?php if ($cie10_edit->codigo_cie->Required) { ?>
				elm = this.getElements("x" + infix + "_codigo_cie");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cie10_edit->codigo_cie->caption(), $cie10_edit->codigo_cie->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($cie10_edit->diagnostico->Required) { ?>
				elm = this.getElements("x" + infix + "_diagnostico");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cie10_edit->diagnostico->caption(), $cie10_edit->diagnostico->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($cie10_edit->nivel->Required) { ?>
				elm = this.getElements("x" + infix + "_nivel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cie10_edit->nivel->caption(), $cie10_edit->nivel->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($cie10_edit->grupo->Required) { ?>
				elm = this.getElements("x" + infix + "_grupo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cie10_edit->grupo->caption(), $cie10_edit->grupo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($cie10_edit->sexo->Required) { ?>
				elm = this.getElements("x" + infix + "_sexo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cie10_edit->sexo->caption(), $cie10_edit->sexo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($cie10_edit->clasificacion->Required) { ?>
				elm = this.getElements("x" + infix + "_clasificacion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cie10_edit->clasificacion->caption(), $cie10_edit->clasificacion->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_clasificacion");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($cie10_edit->clasificacion->errorMessage()) ?>");
			<?php if ($cie10_edit->cod->Required) { ?>
				elm = this.getElements("x" + infix + "_cod");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cie10_edit->cod->caption(), $cie10_edit->cod->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($cie10_edit->notifica->Required) { ?>
				elm = this.getElements("x" + infix + "_notifica");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cie10_edit->notifica->caption(), $cie10_edit->notifica->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_notifica");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($cie10_edit->notifica->errorMessage()) ?>");
			<?php if ($cie10_edit->soat->Required) { ?>
				elm = this.getElements("x" + infix + "_soat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cie10_edit->soat->caption(), $cie10_edit->soat->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($cie10_edit->diagnostico_en->Required) { ?>
				elm = this.getElements("x" + infix + "_diagnostico_en");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cie10_edit->diagnostico_en->caption(), $cie10_edit->diagnostico_en->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($cie10_edit->diagnostico_pr->Required) { ?>
				elm = this.getElements("x" + infix + "_diagnostico_pr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cie10_edit->diagnostico_pr->caption(), $cie10_edit->diagnostico_pr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($cie10_edit->diagnostico_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_diagnostico_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $cie10_edit->diagnostico_fr->caption(), $cie10_edit->diagnostico_fr->RequiredErrorMessage)) ?>");
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
	fcie10edit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fcie10edit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fcie10edit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $cie10_edit->showPageHeader(); ?>
<?php
$cie10_edit->showMessage();
?>
<form name="fcie10edit" id="fcie10edit" class="<?php echo $cie10_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="cie10">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$cie10_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($cie10_edit->codigo_cie->Visible) { // codigo_cie ?>
	<div id="r_codigo_cie" class="form-group row">
		<label id="elh_cie10_codigo_cie" for="x_codigo_cie" class="<?php echo $cie10_edit->LeftColumnClass ?>"><?php echo $cie10_edit->codigo_cie->caption() ?><?php echo $cie10_edit->codigo_cie->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cie10_edit->RightColumnClass ?>"><div <?php echo $cie10_edit->codigo_cie->cellAttributes() ?>>
<input type="text" data-table="cie10" data-field="x_codigo_cie" name="x_codigo_cie" id="x_codigo_cie" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($cie10_edit->codigo_cie->getPlaceHolder()) ?>" value="<?php echo $cie10_edit->codigo_cie->EditValue ?>"<?php echo $cie10_edit->codigo_cie->editAttributes() ?>>
<input type="hidden" data-table="cie10" data-field="x_codigo_cie" name="o_codigo_cie" id="o_codigo_cie" value="<?php echo HtmlEncode($cie10_edit->codigo_cie->OldValue != null ? $cie10_edit->codigo_cie->OldValue : $cie10_edit->codigo_cie->CurrentValue) ?>">
<?php echo $cie10_edit->codigo_cie->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cie10_edit->diagnostico->Visible) { // diagnostico ?>
	<div id="r_diagnostico" class="form-group row">
		<label id="elh_cie10_diagnostico" for="x_diagnostico" class="<?php echo $cie10_edit->LeftColumnClass ?>"><?php echo $cie10_edit->diagnostico->caption() ?><?php echo $cie10_edit->diagnostico->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cie10_edit->RightColumnClass ?>"><div <?php echo $cie10_edit->diagnostico->cellAttributes() ?>>
<span id="el_cie10_diagnostico">
<input type="text" data-table="cie10" data-field="x_diagnostico" name="x_diagnostico" id="x_diagnostico" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($cie10_edit->diagnostico->getPlaceHolder()) ?>" value="<?php echo $cie10_edit->diagnostico->EditValue ?>"<?php echo $cie10_edit->diagnostico->editAttributes() ?>>
</span>
<?php echo $cie10_edit->diagnostico->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cie10_edit->nivel->Visible) { // nivel ?>
	<div id="r_nivel" class="form-group row">
		<label id="elh_cie10_nivel" for="x_nivel" class="<?php echo $cie10_edit->LeftColumnClass ?>"><?php echo $cie10_edit->nivel->caption() ?><?php echo $cie10_edit->nivel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cie10_edit->RightColumnClass ?>"><div <?php echo $cie10_edit->nivel->cellAttributes() ?>>
<span id="el_cie10_nivel">
<input type="text" data-table="cie10" data-field="x_nivel" name="x_nivel" id="x_nivel" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($cie10_edit->nivel->getPlaceHolder()) ?>" value="<?php echo $cie10_edit->nivel->EditValue ?>"<?php echo $cie10_edit->nivel->editAttributes() ?>>
</span>
<?php echo $cie10_edit->nivel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cie10_edit->grupo->Visible) { // grupo ?>
	<div id="r_grupo" class="form-group row">
		<label id="elh_cie10_grupo" for="x_grupo" class="<?php echo $cie10_edit->LeftColumnClass ?>"><?php echo $cie10_edit->grupo->caption() ?><?php echo $cie10_edit->grupo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cie10_edit->RightColumnClass ?>"><div <?php echo $cie10_edit->grupo->cellAttributes() ?>>
<span id="el_cie10_grupo">
<input type="text" data-table="cie10" data-field="x_grupo" name="x_grupo" id="x_grupo" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($cie10_edit->grupo->getPlaceHolder()) ?>" value="<?php echo $cie10_edit->grupo->EditValue ?>"<?php echo $cie10_edit->grupo->editAttributes() ?>>
</span>
<?php echo $cie10_edit->grupo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cie10_edit->sexo->Visible) { // sexo ?>
	<div id="r_sexo" class="form-group row">
		<label id="elh_cie10_sexo" for="x_sexo" class="<?php echo $cie10_edit->LeftColumnClass ?>"><?php echo $cie10_edit->sexo->caption() ?><?php echo $cie10_edit->sexo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cie10_edit->RightColumnClass ?>"><div <?php echo $cie10_edit->sexo->cellAttributes() ?>>
<span id="el_cie10_sexo">
<input type="text" data-table="cie10" data-field="x_sexo" name="x_sexo" id="x_sexo" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($cie10_edit->sexo->getPlaceHolder()) ?>" value="<?php echo $cie10_edit->sexo->EditValue ?>"<?php echo $cie10_edit->sexo->editAttributes() ?>>
</span>
<?php echo $cie10_edit->sexo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cie10_edit->clasificacion->Visible) { // clasificacion ?>
	<div id="r_clasificacion" class="form-group row">
		<label id="elh_cie10_clasificacion" for="x_clasificacion" class="<?php echo $cie10_edit->LeftColumnClass ?>"><?php echo $cie10_edit->clasificacion->caption() ?><?php echo $cie10_edit->clasificacion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cie10_edit->RightColumnClass ?>"><div <?php echo $cie10_edit->clasificacion->cellAttributes() ?>>
<span id="el_cie10_clasificacion">
<input type="text" data-table="cie10" data-field="x_clasificacion" name="x_clasificacion" id="x_clasificacion" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($cie10_edit->clasificacion->getPlaceHolder()) ?>" value="<?php echo $cie10_edit->clasificacion->EditValue ?>"<?php echo $cie10_edit->clasificacion->editAttributes() ?>>
</span>
<?php echo $cie10_edit->clasificacion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cie10_edit->cod->Visible) { // cod ?>
	<div id="r_cod" class="form-group row">
		<label id="elh_cie10_cod" for="x_cod" class="<?php echo $cie10_edit->LeftColumnClass ?>"><?php echo $cie10_edit->cod->caption() ?><?php echo $cie10_edit->cod->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cie10_edit->RightColumnClass ?>"><div <?php echo $cie10_edit->cod->cellAttributes() ?>>
<span id="el_cie10_cod">
<input type="text" data-table="cie10" data-field="x_cod" name="x_cod" id="x_cod" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($cie10_edit->cod->getPlaceHolder()) ?>" value="<?php echo $cie10_edit->cod->EditValue ?>"<?php echo $cie10_edit->cod->editAttributes() ?>>
</span>
<?php echo $cie10_edit->cod->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cie10_edit->notifica->Visible) { // notifica ?>
	<div id="r_notifica" class="form-group row">
		<label id="elh_cie10_notifica" for="x_notifica" class="<?php echo $cie10_edit->LeftColumnClass ?>"><?php echo $cie10_edit->notifica->caption() ?><?php echo $cie10_edit->notifica->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cie10_edit->RightColumnClass ?>"><div <?php echo $cie10_edit->notifica->cellAttributes() ?>>
<span id="el_cie10_notifica">
<input type="text" data-table="cie10" data-field="x_notifica" name="x_notifica" id="x_notifica" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($cie10_edit->notifica->getPlaceHolder()) ?>" value="<?php echo $cie10_edit->notifica->EditValue ?>"<?php echo $cie10_edit->notifica->editAttributes() ?>>
</span>
<?php echo $cie10_edit->notifica->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cie10_edit->soat->Visible) { // soat ?>
	<div id="r_soat" class="form-group row">
		<label id="elh_cie10_soat" for="x_soat" class="<?php echo $cie10_edit->LeftColumnClass ?>"><?php echo $cie10_edit->soat->caption() ?><?php echo $cie10_edit->soat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cie10_edit->RightColumnClass ?>"><div <?php echo $cie10_edit->soat->cellAttributes() ?>>
<span id="el_cie10_soat">
<input type="text" data-table="cie10" data-field="x_soat" name="x_soat" id="x_soat" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($cie10_edit->soat->getPlaceHolder()) ?>" value="<?php echo $cie10_edit->soat->EditValue ?>"<?php echo $cie10_edit->soat->editAttributes() ?>>
</span>
<?php echo $cie10_edit->soat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cie10_edit->diagnostico_en->Visible) { // diagnostico_en ?>
	<div id="r_diagnostico_en" class="form-group row">
		<label id="elh_cie10_diagnostico_en" for="x_diagnostico_en" class="<?php echo $cie10_edit->LeftColumnClass ?>"><?php echo $cie10_edit->diagnostico_en->caption() ?><?php echo $cie10_edit->diagnostico_en->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cie10_edit->RightColumnClass ?>"><div <?php echo $cie10_edit->diagnostico_en->cellAttributes() ?>>
<span id="el_cie10_diagnostico_en">
<textarea data-table="cie10" data-field="x_diagnostico_en" name="x_diagnostico_en" id="x_diagnostico_en" cols="35" rows="4" placeholder="<?php echo HtmlEncode($cie10_edit->diagnostico_en->getPlaceHolder()) ?>"<?php echo $cie10_edit->diagnostico_en->editAttributes() ?>><?php echo $cie10_edit->diagnostico_en->EditValue ?></textarea>
</span>
<?php echo $cie10_edit->diagnostico_en->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cie10_edit->diagnostico_pr->Visible) { // diagnostico_pr ?>
	<div id="r_diagnostico_pr" class="form-group row">
		<label id="elh_cie10_diagnostico_pr" for="x_diagnostico_pr" class="<?php echo $cie10_edit->LeftColumnClass ?>"><?php echo $cie10_edit->diagnostico_pr->caption() ?><?php echo $cie10_edit->diagnostico_pr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cie10_edit->RightColumnClass ?>"><div <?php echo $cie10_edit->diagnostico_pr->cellAttributes() ?>>
<span id="el_cie10_diagnostico_pr">
<textarea data-table="cie10" data-field="x_diagnostico_pr" name="x_diagnostico_pr" id="x_diagnostico_pr" cols="35" rows="4" placeholder="<?php echo HtmlEncode($cie10_edit->diagnostico_pr->getPlaceHolder()) ?>"<?php echo $cie10_edit->diagnostico_pr->editAttributes() ?>><?php echo $cie10_edit->diagnostico_pr->EditValue ?></textarea>
</span>
<?php echo $cie10_edit->diagnostico_pr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($cie10_edit->diagnostico_fr->Visible) { // diagnostico_fr ?>
	<div id="r_diagnostico_fr" class="form-group row">
		<label id="elh_cie10_diagnostico_fr" for="x_diagnostico_fr" class="<?php echo $cie10_edit->LeftColumnClass ?>"><?php echo $cie10_edit->diagnostico_fr->caption() ?><?php echo $cie10_edit->diagnostico_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $cie10_edit->RightColumnClass ?>"><div <?php echo $cie10_edit->diagnostico_fr->cellAttributes() ?>>
<span id="el_cie10_diagnostico_fr">
<textarea data-table="cie10" data-field="x_diagnostico_fr" name="x_diagnostico_fr" id="x_diagnostico_fr" cols="35" rows="4" placeholder="<?php echo HtmlEncode($cie10_edit->diagnostico_fr->getPlaceHolder()) ?>"<?php echo $cie10_edit->diagnostico_fr->editAttributes() ?>><?php echo $cie10_edit->diagnostico_fr->EditValue ?></textarea>
</span>
<?php echo $cie10_edit->diagnostico_fr->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$cie10_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $cie10_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $cie10_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$cie10_edit->showPageFooter();
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
$cie10_edit->terminate();
?>