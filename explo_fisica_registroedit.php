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
$explo_fisica_registro_edit = new explo_fisica_registro_edit();

// Run the page
$explo_fisica_registro_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$explo_fisica_registro_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fexplo_fisica_registroedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fexplo_fisica_registroedit = currentForm = new ew.Form("fexplo_fisica_registroedit", "edit");

	// Validate form
	fexplo_fisica_registroedit.validate = function() {
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
			<?php if ($explo_fisica_registro_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $explo_fisica_registro_edit->id->caption(), $explo_fisica_registro_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($explo_fisica_registro_edit->id_trauma_fisico->Required) { ?>
				elm = this.getElements("x" + infix + "_id_trauma_fisico");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $explo_fisica_registro_edit->id_trauma_fisico->caption(), $explo_fisica_registro_edit->id_trauma_fisico->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_id_trauma_fisico");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($explo_fisica_registro_edit->id_trauma_fisico->errorMessage()) ?>");
			<?php if ($explo_fisica_registro_edit->posx->Required) { ?>
				elm = this.getElements("x" + infix + "_posx");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $explo_fisica_registro_edit->posx->caption(), $explo_fisica_registro_edit->posx->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($explo_fisica_registro_edit->posy->Required) { ?>
				elm = this.getElements("x" + infix + "_posy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $explo_fisica_registro_edit->posy->caption(), $explo_fisica_registro_edit->posy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($explo_fisica_registro_edit->pos->Required) { ?>
				elm = this.getElements("x" + infix + "_pos");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $explo_fisica_registro_edit->pos->caption(), $explo_fisica_registro_edit->pos->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_pos");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($explo_fisica_registro_edit->pos->errorMessage()) ?>");
			<?php if ($explo_fisica_registro_edit->cod_casopreh->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $explo_fisica_registro_edit->cod_casopreh->caption(), $explo_fisica_registro_edit->cod_casopreh->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($explo_fisica_registro_edit->cod_casopreh->errorMessage()) ?>");

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
	fexplo_fisica_registroedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fexplo_fisica_registroedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fexplo_fisica_registroedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $explo_fisica_registro_edit->showPageHeader(); ?>
<?php
$explo_fisica_registro_edit->showMessage();
?>
<form name="fexplo_fisica_registroedit" id="fexplo_fisica_registroedit" class="<?php echo $explo_fisica_registro_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="explo_fisica_registro">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$explo_fisica_registro_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($explo_fisica_registro_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_explo_fisica_registro_id" class="<?php echo $explo_fisica_registro_edit->LeftColumnClass ?>"><?php echo $explo_fisica_registro_edit->id->caption() ?><?php echo $explo_fisica_registro_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $explo_fisica_registro_edit->RightColumnClass ?>"><div <?php echo $explo_fisica_registro_edit->id->cellAttributes() ?>>
<span id="el_explo_fisica_registro_id">
<span<?php echo $explo_fisica_registro_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($explo_fisica_registro_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="explo_fisica_registro" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($explo_fisica_registro_edit->id->CurrentValue) ?>">
<?php echo $explo_fisica_registro_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($explo_fisica_registro_edit->id_trauma_fisico->Visible) { // id_trauma_fisico ?>
	<div id="r_id_trauma_fisico" class="form-group row">
		<label id="elh_explo_fisica_registro_id_trauma_fisico" for="x_id_trauma_fisico" class="<?php echo $explo_fisica_registro_edit->LeftColumnClass ?>"><?php echo $explo_fisica_registro_edit->id_trauma_fisico->caption() ?><?php echo $explo_fisica_registro_edit->id_trauma_fisico->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $explo_fisica_registro_edit->RightColumnClass ?>"><div <?php echo $explo_fisica_registro_edit->id_trauma_fisico->cellAttributes() ?>>
<span id="el_explo_fisica_registro_id_trauma_fisico">
<input type="text" data-table="explo_fisica_registro" data-field="x_id_trauma_fisico" name="x_id_trauma_fisico" id="x_id_trauma_fisico" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($explo_fisica_registro_edit->id_trauma_fisico->getPlaceHolder()) ?>" value="<?php echo $explo_fisica_registro_edit->id_trauma_fisico->EditValue ?>"<?php echo $explo_fisica_registro_edit->id_trauma_fisico->editAttributes() ?>>
</span>
<?php echo $explo_fisica_registro_edit->id_trauma_fisico->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($explo_fisica_registro_edit->posx->Visible) { // posx ?>
	<div id="r_posx" class="form-group row">
		<label id="elh_explo_fisica_registro_posx" for="x_posx" class="<?php echo $explo_fisica_registro_edit->LeftColumnClass ?>"><?php echo $explo_fisica_registro_edit->posx->caption() ?><?php echo $explo_fisica_registro_edit->posx->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $explo_fisica_registro_edit->RightColumnClass ?>"><div <?php echo $explo_fisica_registro_edit->posx->cellAttributes() ?>>
<span id="el_explo_fisica_registro_posx">
<input type="text" data-table="explo_fisica_registro" data-field="x_posx" name="x_posx" id="x_posx" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($explo_fisica_registro_edit->posx->getPlaceHolder()) ?>" value="<?php echo $explo_fisica_registro_edit->posx->EditValue ?>"<?php echo $explo_fisica_registro_edit->posx->editAttributes() ?>>
</span>
<?php echo $explo_fisica_registro_edit->posx->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($explo_fisica_registro_edit->posy->Visible) { // posy ?>
	<div id="r_posy" class="form-group row">
		<label id="elh_explo_fisica_registro_posy" for="x_posy" class="<?php echo $explo_fisica_registro_edit->LeftColumnClass ?>"><?php echo $explo_fisica_registro_edit->posy->caption() ?><?php echo $explo_fisica_registro_edit->posy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $explo_fisica_registro_edit->RightColumnClass ?>"><div <?php echo $explo_fisica_registro_edit->posy->cellAttributes() ?>>
<span id="el_explo_fisica_registro_posy">
<input type="text" data-table="explo_fisica_registro" data-field="x_posy" name="x_posy" id="x_posy" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($explo_fisica_registro_edit->posy->getPlaceHolder()) ?>" value="<?php echo $explo_fisica_registro_edit->posy->EditValue ?>"<?php echo $explo_fisica_registro_edit->posy->editAttributes() ?>>
</span>
<?php echo $explo_fisica_registro_edit->posy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($explo_fisica_registro_edit->pos->Visible) { // pos ?>
	<div id="r_pos" class="form-group row">
		<label id="elh_explo_fisica_registro_pos" for="x_pos" class="<?php echo $explo_fisica_registro_edit->LeftColumnClass ?>"><?php echo $explo_fisica_registro_edit->pos->caption() ?><?php echo $explo_fisica_registro_edit->pos->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $explo_fisica_registro_edit->RightColumnClass ?>"><div <?php echo $explo_fisica_registro_edit->pos->cellAttributes() ?>>
<span id="el_explo_fisica_registro_pos">
<input type="text" data-table="explo_fisica_registro" data-field="x_pos" name="x_pos" id="x_pos" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($explo_fisica_registro_edit->pos->getPlaceHolder()) ?>" value="<?php echo $explo_fisica_registro_edit->pos->EditValue ?>"<?php echo $explo_fisica_registro_edit->pos->editAttributes() ?>>
</span>
<?php echo $explo_fisica_registro_edit->pos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($explo_fisica_registro_edit->cod_casopreh->Visible) { // cod_casopreh ?>
	<div id="r_cod_casopreh" class="form-group row">
		<label id="elh_explo_fisica_registro_cod_casopreh" for="x_cod_casopreh" class="<?php echo $explo_fisica_registro_edit->LeftColumnClass ?>"><?php echo $explo_fisica_registro_edit->cod_casopreh->caption() ?><?php echo $explo_fisica_registro_edit->cod_casopreh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $explo_fisica_registro_edit->RightColumnClass ?>"><div <?php echo $explo_fisica_registro_edit->cod_casopreh->cellAttributes() ?>>
<span id="el_explo_fisica_registro_cod_casopreh">
<input type="text" data-table="explo_fisica_registro" data-field="x_cod_casopreh" name="x_cod_casopreh" id="x_cod_casopreh" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($explo_fisica_registro_edit->cod_casopreh->getPlaceHolder()) ?>" value="<?php echo $explo_fisica_registro_edit->cod_casopreh->EditValue ?>"<?php echo $explo_fisica_registro_edit->cod_casopreh->editAttributes() ?>>
</span>
<?php echo $explo_fisica_registro_edit->cod_casopreh->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$explo_fisica_registro_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $explo_fisica_registro_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $explo_fisica_registro_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$explo_fisica_registro_edit->showPageFooter();
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
$explo_fisica_registro_edit->terminate();
?>