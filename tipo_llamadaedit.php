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
$tipo_llamada_edit = new tipo_llamada_edit();

// Run the page
$tipo_llamada_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tipo_llamada_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftipo_llamadaedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ftipo_llamadaedit = currentForm = new ew.Form("ftipo_llamadaedit", "edit");

	// Validate form
	ftipo_llamadaedit.validate = function() {
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
			<?php if ($tipo_llamada_edit->id_llamda_f->Required) { ?>
				elm = this.getElements("x" + infix + "_id_llamda_f");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tipo_llamada_edit->id_llamda_f->caption(), $tipo_llamada_edit->id_llamda_f->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tipo_llamada_edit->llamada_fallida->Required) { ?>
				elm = this.getElements("x" + infix + "_llamada_fallida");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tipo_llamada_edit->llamada_fallida->caption(), $tipo_llamada_edit->llamada_fallida->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tipo_llamada_edit->llamada_fallida_en->Required) { ?>
				elm = this.getElements("x" + infix + "_llamada_fallida_en");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tipo_llamada_edit->llamada_fallida_en->caption(), $tipo_llamada_edit->llamada_fallida_en->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tipo_llamada_edit->llamada_fallida_pr->Required) { ?>
				elm = this.getElements("x" + infix + "_llamada_fallida_pr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tipo_llamada_edit->llamada_fallida_pr->caption(), $tipo_llamada_edit->llamada_fallida_pr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tipo_llamada_edit->llamada_fallida_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_llamada_fallida_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tipo_llamada_edit->llamada_fallida_fr->caption(), $tipo_llamada_edit->llamada_fallida_fr->RequiredErrorMessage)) ?>");
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
	ftipo_llamadaedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ftipo_llamadaedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ftipo_llamadaedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $tipo_llamada_edit->showPageHeader(); ?>
<?php
$tipo_llamada_edit->showMessage();
?>
<form name="ftipo_llamadaedit" id="ftipo_llamadaedit" class="<?php echo $tipo_llamada_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tipo_llamada">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$tipo_llamada_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($tipo_llamada_edit->id_llamda_f->Visible) { // id_llamda_f ?>
	<div id="r_id_llamda_f" class="form-group row">
		<label id="elh_tipo_llamada_id_llamda_f" class="<?php echo $tipo_llamada_edit->LeftColumnClass ?>"><?php echo $tipo_llamada_edit->id_llamda_f->caption() ?><?php echo $tipo_llamada_edit->id_llamda_f->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tipo_llamada_edit->RightColumnClass ?>"><div <?php echo $tipo_llamada_edit->id_llamda_f->cellAttributes() ?>>
<span id="el_tipo_llamada_id_llamda_f">
<span<?php echo $tipo_llamada_edit->id_llamda_f->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tipo_llamada_edit->id_llamda_f->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tipo_llamada" data-field="x_id_llamda_f" name="x_id_llamda_f" id="x_id_llamda_f" value="<?php echo HtmlEncode($tipo_llamada_edit->id_llamda_f->CurrentValue) ?>">
<?php echo $tipo_llamada_edit->id_llamda_f->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tipo_llamada_edit->llamada_fallida->Visible) { // llamada_fallida ?>
	<div id="r_llamada_fallida" class="form-group row">
		<label id="elh_tipo_llamada_llamada_fallida" for="x_llamada_fallida" class="<?php echo $tipo_llamada_edit->LeftColumnClass ?>"><?php echo $tipo_llamada_edit->llamada_fallida->caption() ?><?php echo $tipo_llamada_edit->llamada_fallida->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tipo_llamada_edit->RightColumnClass ?>"><div <?php echo $tipo_llamada_edit->llamada_fallida->cellAttributes() ?>>
<span id="el_tipo_llamada_llamada_fallida">
<input type="text" data-table="tipo_llamada" data-field="x_llamada_fallida" name="x_llamada_fallida" id="x_llamada_fallida" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($tipo_llamada_edit->llamada_fallida->getPlaceHolder()) ?>" value="<?php echo $tipo_llamada_edit->llamada_fallida->EditValue ?>"<?php echo $tipo_llamada_edit->llamada_fallida->editAttributes() ?>>
</span>
<?php echo $tipo_llamada_edit->llamada_fallida->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tipo_llamada_edit->llamada_fallida_en->Visible) { // llamada_fallida_en ?>
	<div id="r_llamada_fallida_en" class="form-group row">
		<label id="elh_tipo_llamada_llamada_fallida_en" for="x_llamada_fallida_en" class="<?php echo $tipo_llamada_edit->LeftColumnClass ?>"><?php echo $tipo_llamada_edit->llamada_fallida_en->caption() ?><?php echo $tipo_llamada_edit->llamada_fallida_en->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tipo_llamada_edit->RightColumnClass ?>"><div <?php echo $tipo_llamada_edit->llamada_fallida_en->cellAttributes() ?>>
<span id="el_tipo_llamada_llamada_fallida_en">
<input type="text" data-table="tipo_llamada" data-field="x_llamada_fallida_en" name="x_llamada_fallida_en" id="x_llamada_fallida_en" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($tipo_llamada_edit->llamada_fallida_en->getPlaceHolder()) ?>" value="<?php echo $tipo_llamada_edit->llamada_fallida_en->EditValue ?>"<?php echo $tipo_llamada_edit->llamada_fallida_en->editAttributes() ?>>
</span>
<?php echo $tipo_llamada_edit->llamada_fallida_en->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tipo_llamada_edit->llamada_fallida_pr->Visible) { // llamada_fallida_pr ?>
	<div id="r_llamada_fallida_pr" class="form-group row">
		<label id="elh_tipo_llamada_llamada_fallida_pr" for="x_llamada_fallida_pr" class="<?php echo $tipo_llamada_edit->LeftColumnClass ?>"><?php echo $tipo_llamada_edit->llamada_fallida_pr->caption() ?><?php echo $tipo_llamada_edit->llamada_fallida_pr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tipo_llamada_edit->RightColumnClass ?>"><div <?php echo $tipo_llamada_edit->llamada_fallida_pr->cellAttributes() ?>>
<span id="el_tipo_llamada_llamada_fallida_pr">
<input type="text" data-table="tipo_llamada" data-field="x_llamada_fallida_pr" name="x_llamada_fallida_pr" id="x_llamada_fallida_pr" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($tipo_llamada_edit->llamada_fallida_pr->getPlaceHolder()) ?>" value="<?php echo $tipo_llamada_edit->llamada_fallida_pr->EditValue ?>"<?php echo $tipo_llamada_edit->llamada_fallida_pr->editAttributes() ?>>
</span>
<?php echo $tipo_llamada_edit->llamada_fallida_pr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tipo_llamada_edit->llamada_fallida_fr->Visible) { // llamada_fallida_fr ?>
	<div id="r_llamada_fallida_fr" class="form-group row">
		<label id="elh_tipo_llamada_llamada_fallida_fr" for="x_llamada_fallida_fr" class="<?php echo $tipo_llamada_edit->LeftColumnClass ?>"><?php echo $tipo_llamada_edit->llamada_fallida_fr->caption() ?><?php echo $tipo_llamada_edit->llamada_fallida_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tipo_llamada_edit->RightColumnClass ?>"><div <?php echo $tipo_llamada_edit->llamada_fallida_fr->cellAttributes() ?>>
<span id="el_tipo_llamada_llamada_fallida_fr">
<input type="text" data-table="tipo_llamada" data-field="x_llamada_fallida_fr" name="x_llamada_fallida_fr" id="x_llamada_fallida_fr" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($tipo_llamada_edit->llamada_fallida_fr->getPlaceHolder()) ?>" value="<?php echo $tipo_llamada_edit->llamada_fallida_fr->EditValue ?>"<?php echo $tipo_llamada_edit->llamada_fallida_fr->editAttributes() ?>>
</span>
<?php echo $tipo_llamada_edit->llamada_fallida_fr->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$tipo_llamada_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tipo_llamada_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tipo_llamada_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tipo_llamada_edit->showPageFooter();
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
$tipo_llamada_edit->terminate();
?>