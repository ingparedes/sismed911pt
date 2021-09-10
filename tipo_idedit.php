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
$tipo_id_edit = new tipo_id_edit();

// Run the page
$tipo_id_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tipo_id_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftipo_idedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ftipo_idedit = currentForm = new ew.Form("ftipo_idedit", "edit");

	// Validate form
	ftipo_idedit.validate = function() {
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
			<?php if ($tipo_id_edit->id_tipo->Required) { ?>
				elm = this.getElements("x" + infix + "_id_tipo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tipo_id_edit->id_tipo->caption(), $tipo_id_edit->id_tipo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tipo_id_edit->descripcion->Required) { ?>
				elm = this.getElements("x" + infix + "_descripcion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tipo_id_edit->descripcion->caption(), $tipo_id_edit->descripcion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tipo_id_edit->descripcion_en->Required) { ?>
				elm = this.getElements("x" + infix + "_descripcion_en");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tipo_id_edit->descripcion_en->caption(), $tipo_id_edit->descripcion_en->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tipo_id_edit->descripcion_pr->Required) { ?>
				elm = this.getElements("x" + infix + "_descripcion_pr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tipo_id_edit->descripcion_pr->caption(), $tipo_id_edit->descripcion_pr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($tipo_id_edit->descripcion_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_descripcion_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tipo_id_edit->descripcion_fr->caption(), $tipo_id_edit->descripcion_fr->RequiredErrorMessage)) ?>");
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
	ftipo_idedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ftipo_idedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ftipo_idedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $tipo_id_edit->showPageHeader(); ?>
<?php
$tipo_id_edit->showMessage();
?>
<form name="ftipo_idedit" id="ftipo_idedit" class="<?php echo $tipo_id_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tipo_id">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$tipo_id_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($tipo_id_edit->id_tipo->Visible) { // id_tipo ?>
	<div id="r_id_tipo" class="form-group row">
		<label id="elh_tipo_id_id_tipo" class="<?php echo $tipo_id_edit->LeftColumnClass ?>"><?php echo $tipo_id_edit->id_tipo->caption() ?><?php echo $tipo_id_edit->id_tipo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tipo_id_edit->RightColumnClass ?>"><div <?php echo $tipo_id_edit->id_tipo->cellAttributes() ?>>
<span id="el_tipo_id_id_tipo">
<span<?php echo $tipo_id_edit->id_tipo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($tipo_id_edit->id_tipo->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="tipo_id" data-field="x_id_tipo" name="x_id_tipo" id="x_id_tipo" value="<?php echo HtmlEncode($tipo_id_edit->id_tipo->CurrentValue) ?>">
<?php echo $tipo_id_edit->id_tipo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tipo_id_edit->descripcion->Visible) { // descripcion ?>
	<div id="r_descripcion" class="form-group row">
		<label id="elh_tipo_id_descripcion" for="x_descripcion" class="<?php echo $tipo_id_edit->LeftColumnClass ?>"><?php echo $tipo_id_edit->descripcion->caption() ?><?php echo $tipo_id_edit->descripcion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tipo_id_edit->RightColumnClass ?>"><div <?php echo $tipo_id_edit->descripcion->cellAttributes() ?>>
<span id="el_tipo_id_descripcion">
<input type="text" data-table="tipo_id" data-field="x_descripcion" name="x_descripcion" id="x_descripcion" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($tipo_id_edit->descripcion->getPlaceHolder()) ?>" value="<?php echo $tipo_id_edit->descripcion->EditValue ?>"<?php echo $tipo_id_edit->descripcion->editAttributes() ?>>
</span>
<?php echo $tipo_id_edit->descripcion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tipo_id_edit->descripcion_en->Visible) { // descripcion_en ?>
	<div id="r_descripcion_en" class="form-group row">
		<label id="elh_tipo_id_descripcion_en" for="x_descripcion_en" class="<?php echo $tipo_id_edit->LeftColumnClass ?>"><?php echo $tipo_id_edit->descripcion_en->caption() ?><?php echo $tipo_id_edit->descripcion_en->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tipo_id_edit->RightColumnClass ?>"><div <?php echo $tipo_id_edit->descripcion_en->cellAttributes() ?>>
<span id="el_tipo_id_descripcion_en">
<input type="text" data-table="tipo_id" data-field="x_descripcion_en" name="x_descripcion_en" id="x_descripcion_en" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($tipo_id_edit->descripcion_en->getPlaceHolder()) ?>" value="<?php echo $tipo_id_edit->descripcion_en->EditValue ?>"<?php echo $tipo_id_edit->descripcion_en->editAttributes() ?>>
</span>
<?php echo $tipo_id_edit->descripcion_en->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tipo_id_edit->descripcion_pr->Visible) { // descripcion_pr ?>
	<div id="r_descripcion_pr" class="form-group row">
		<label id="elh_tipo_id_descripcion_pr" for="x_descripcion_pr" class="<?php echo $tipo_id_edit->LeftColumnClass ?>"><?php echo $tipo_id_edit->descripcion_pr->caption() ?><?php echo $tipo_id_edit->descripcion_pr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tipo_id_edit->RightColumnClass ?>"><div <?php echo $tipo_id_edit->descripcion_pr->cellAttributes() ?>>
<span id="el_tipo_id_descripcion_pr">
<input type="text" data-table="tipo_id" data-field="x_descripcion_pr" name="x_descripcion_pr" id="x_descripcion_pr" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($tipo_id_edit->descripcion_pr->getPlaceHolder()) ?>" value="<?php echo $tipo_id_edit->descripcion_pr->EditValue ?>"<?php echo $tipo_id_edit->descripcion_pr->editAttributes() ?>>
</span>
<?php echo $tipo_id_edit->descripcion_pr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tipo_id_edit->descripcion_fr->Visible) { // descripcion_fr ?>
	<div id="r_descripcion_fr" class="form-group row">
		<label id="elh_tipo_id_descripcion_fr" for="x_descripcion_fr" class="<?php echo $tipo_id_edit->LeftColumnClass ?>"><?php echo $tipo_id_edit->descripcion_fr->caption() ?><?php echo $tipo_id_edit->descripcion_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tipo_id_edit->RightColumnClass ?>"><div <?php echo $tipo_id_edit->descripcion_fr->cellAttributes() ?>>
<span id="el_tipo_id_descripcion_fr">
<input type="text" data-table="tipo_id" data-field="x_descripcion_fr" name="x_descripcion_fr" id="x_descripcion_fr" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($tipo_id_edit->descripcion_fr->getPlaceHolder()) ?>" value="<?php echo $tipo_id_edit->descripcion_fr->EditValue ?>"<?php echo $tipo_id_edit->descripcion_fr->editAttributes() ?>>
</span>
<?php echo $tipo_id_edit->descripcion_fr->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$tipo_id_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tipo_id_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tipo_id_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tipo_id_edit->showPageFooter();
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
$tipo_id_edit->terminate();
?>