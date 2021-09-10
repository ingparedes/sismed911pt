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
$firmas_registro_edit = new firmas_registro_edit();

// Run the page
$firmas_registro_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$firmas_registro_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ffirmas_registroedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ffirmas_registroedit = currentForm = new ew.Form("ffirmas_registroedit", "edit");

	// Validate form
	ffirmas_registroedit.validate = function() {
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
			<?php if ($firmas_registro_edit->posx->Required) { ?>
				elm = this.getElements("x" + infix + "_posx");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $firmas_registro_edit->posx->caption(), $firmas_registro_edit->posx->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($firmas_registro_edit->posy->Required) { ?>
				elm = this.getElements("x" + infix + "_posy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $firmas_registro_edit->posy->caption(), $firmas_registro_edit->posy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($firmas_registro_edit->cod_casopreh->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $firmas_registro_edit->cod_casopreh->caption(), $firmas_registro_edit->cod_casopreh->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($firmas_registro_edit->cod_casopreh->errorMessage()) ?>");
			<?php if ($firmas_registro_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $firmas_registro_edit->id->caption(), $firmas_registro_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($firmas_registro_edit->ancho->Required) { ?>
				elm = this.getElements("x" + infix + "_ancho");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $firmas_registro_edit->ancho->caption(), $firmas_registro_edit->ancho->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ancho");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($firmas_registro_edit->ancho->errorMessage()) ?>");

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
	ffirmas_registroedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ffirmas_registroedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ffirmas_registroedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $firmas_registro_edit->showPageHeader(); ?>
<?php
$firmas_registro_edit->showMessage();
?>
<form name="ffirmas_registroedit" id="ffirmas_registroedit" class="<?php echo $firmas_registro_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="firmas_registro">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$firmas_registro_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($firmas_registro_edit->posx->Visible) { // posx ?>
	<div id="r_posx" class="form-group row">
		<label id="elh_firmas_registro_posx" for="x_posx" class="<?php echo $firmas_registro_edit->LeftColumnClass ?>"><?php echo $firmas_registro_edit->posx->caption() ?><?php echo $firmas_registro_edit->posx->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $firmas_registro_edit->RightColumnClass ?>"><div <?php echo $firmas_registro_edit->posx->cellAttributes() ?>>
<span id="el_firmas_registro_posx">
<textarea data-table="firmas_registro" data-field="x_posx" name="x_posx" id="x_posx" cols="35" rows="4" placeholder="<?php echo HtmlEncode($firmas_registro_edit->posx->getPlaceHolder()) ?>"<?php echo $firmas_registro_edit->posx->editAttributes() ?>><?php echo $firmas_registro_edit->posx->EditValue ?></textarea>
</span>
<?php echo $firmas_registro_edit->posx->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($firmas_registro_edit->posy->Visible) { // posy ?>
	<div id="r_posy" class="form-group row">
		<label id="elh_firmas_registro_posy" for="x_posy" class="<?php echo $firmas_registro_edit->LeftColumnClass ?>"><?php echo $firmas_registro_edit->posy->caption() ?><?php echo $firmas_registro_edit->posy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $firmas_registro_edit->RightColumnClass ?>"><div <?php echo $firmas_registro_edit->posy->cellAttributes() ?>>
<span id="el_firmas_registro_posy">
<textarea data-table="firmas_registro" data-field="x_posy" name="x_posy" id="x_posy" cols="35" rows="4" placeholder="<?php echo HtmlEncode($firmas_registro_edit->posy->getPlaceHolder()) ?>"<?php echo $firmas_registro_edit->posy->editAttributes() ?>><?php echo $firmas_registro_edit->posy->EditValue ?></textarea>
</span>
<?php echo $firmas_registro_edit->posy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($firmas_registro_edit->cod_casopreh->Visible) { // cod_casopreh ?>
	<div id="r_cod_casopreh" class="form-group row">
		<label id="elh_firmas_registro_cod_casopreh" for="x_cod_casopreh" class="<?php echo $firmas_registro_edit->LeftColumnClass ?>"><?php echo $firmas_registro_edit->cod_casopreh->caption() ?><?php echo $firmas_registro_edit->cod_casopreh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $firmas_registro_edit->RightColumnClass ?>"><div <?php echo $firmas_registro_edit->cod_casopreh->cellAttributes() ?>>
<span id="el_firmas_registro_cod_casopreh">
<input type="text" data-table="firmas_registro" data-field="x_cod_casopreh" name="x_cod_casopreh" id="x_cod_casopreh" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($firmas_registro_edit->cod_casopreh->getPlaceHolder()) ?>" value="<?php echo $firmas_registro_edit->cod_casopreh->EditValue ?>"<?php echo $firmas_registro_edit->cod_casopreh->editAttributes() ?>>
</span>
<?php echo $firmas_registro_edit->cod_casopreh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($firmas_registro_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_firmas_registro_id" class="<?php echo $firmas_registro_edit->LeftColumnClass ?>"><?php echo $firmas_registro_edit->id->caption() ?><?php echo $firmas_registro_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $firmas_registro_edit->RightColumnClass ?>"><div <?php echo $firmas_registro_edit->id->cellAttributes() ?>>
<span id="el_firmas_registro_id">
<span<?php echo $firmas_registro_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($firmas_registro_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="firmas_registro" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($firmas_registro_edit->id->CurrentValue) ?>">
<?php echo $firmas_registro_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($firmas_registro_edit->ancho->Visible) { // ancho ?>
	<div id="r_ancho" class="form-group row">
		<label id="elh_firmas_registro_ancho" for="x_ancho" class="<?php echo $firmas_registro_edit->LeftColumnClass ?>"><?php echo $firmas_registro_edit->ancho->caption() ?><?php echo $firmas_registro_edit->ancho->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $firmas_registro_edit->RightColumnClass ?>"><div <?php echo $firmas_registro_edit->ancho->cellAttributes() ?>>
<span id="el_firmas_registro_ancho">
<input type="text" data-table="firmas_registro" data-field="x_ancho" name="x_ancho" id="x_ancho" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($firmas_registro_edit->ancho->getPlaceHolder()) ?>" value="<?php echo $firmas_registro_edit->ancho->EditValue ?>"<?php echo $firmas_registro_edit->ancho->editAttributes() ?>>
</span>
<?php echo $firmas_registro_edit->ancho->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$firmas_registro_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $firmas_registro_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $firmas_registro_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$firmas_registro_edit->showPageFooter();
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
$firmas_registro_edit->terminate();
?>