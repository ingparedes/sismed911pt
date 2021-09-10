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
$insumos_registros_edit = new insumos_registros_edit();

// Run the page
$insumos_registros_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$insumos_registros_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var finsumos_registrosedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	finsumos_registrosedit = currentForm = new ew.Form("finsumos_registrosedit", "edit");

	// Validate form
	finsumos_registrosedit.validate = function() {
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
			<?php if ($insumos_registros_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $insumos_registros_edit->id->caption(), $insumos_registros_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($insumos_registros_edit->cod_casopreh->Required) { ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $insumos_registros_edit->cod_casopreh->caption(), $insumos_registros_edit->cod_casopreh->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_cod_casopreh");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($insumos_registros_edit->cod_casopreh->errorMessage()) ?>");
			<?php if ($insumos_registros_edit->insumos_id->Required) { ?>
				elm = this.getElements("x" + infix + "_insumos_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $insumos_registros_edit->insumos_id->caption(), $insumos_registros_edit->insumos_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_insumos_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($insumos_registros_edit->insumos_id->errorMessage()) ?>");
			<?php if ($insumos_registros_edit->cantidad->Required) { ?>
				elm = this.getElements("x" + infix + "_cantidad");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $insumos_registros_edit->cantidad->caption(), $insumos_registros_edit->cantidad->RequiredErrorMessage)) ?>");
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
	finsumos_registrosedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	finsumos_registrosedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("finsumos_registrosedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $insumos_registros_edit->showPageHeader(); ?>
<?php
$insumos_registros_edit->showMessage();
?>
<form name="finsumos_registrosedit" id="finsumos_registrosedit" class="<?php echo $insumos_registros_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="insumos_registros">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$insumos_registros_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($insumos_registros_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_insumos_registros_id" class="<?php echo $insumos_registros_edit->LeftColumnClass ?>"><?php echo $insumos_registros_edit->id->caption() ?><?php echo $insumos_registros_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $insumos_registros_edit->RightColumnClass ?>"><div <?php echo $insumos_registros_edit->id->cellAttributes() ?>>
<span id="el_insumos_registros_id">
<span<?php echo $insumos_registros_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($insumos_registros_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="insumos_registros" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($insumos_registros_edit->id->CurrentValue) ?>">
<?php echo $insumos_registros_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($insumos_registros_edit->cod_casopreh->Visible) { // cod_casopreh ?>
	<div id="r_cod_casopreh" class="form-group row">
		<label id="elh_insumos_registros_cod_casopreh" for="x_cod_casopreh" class="<?php echo $insumos_registros_edit->LeftColumnClass ?>"><?php echo $insumos_registros_edit->cod_casopreh->caption() ?><?php echo $insumos_registros_edit->cod_casopreh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $insumos_registros_edit->RightColumnClass ?>"><div <?php echo $insumos_registros_edit->cod_casopreh->cellAttributes() ?>>
<span id="el_insumos_registros_cod_casopreh">
<input type="text" data-table="insumos_registros" data-field="x_cod_casopreh" name="x_cod_casopreh" id="x_cod_casopreh" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($insumos_registros_edit->cod_casopreh->getPlaceHolder()) ?>" value="<?php echo $insumos_registros_edit->cod_casopreh->EditValue ?>"<?php echo $insumos_registros_edit->cod_casopreh->editAttributes() ?>>
</span>
<?php echo $insumos_registros_edit->cod_casopreh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($insumos_registros_edit->insumos_id->Visible) { // insumos_id ?>
	<div id="r_insumos_id" class="form-group row">
		<label id="elh_insumos_registros_insumos_id" for="x_insumos_id" class="<?php echo $insumos_registros_edit->LeftColumnClass ?>"><?php echo $insumos_registros_edit->insumos_id->caption() ?><?php echo $insumos_registros_edit->insumos_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $insumos_registros_edit->RightColumnClass ?>"><div <?php echo $insumos_registros_edit->insumos_id->cellAttributes() ?>>
<span id="el_insumos_registros_insumos_id">
<input type="text" data-table="insumos_registros" data-field="x_insumos_id" name="x_insumos_id" id="x_insumos_id" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($insumos_registros_edit->insumos_id->getPlaceHolder()) ?>" value="<?php echo $insumos_registros_edit->insumos_id->EditValue ?>"<?php echo $insumos_registros_edit->insumos_id->editAttributes() ?>>
</span>
<?php echo $insumos_registros_edit->insumos_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($insumos_registros_edit->cantidad->Visible) { // cantidad ?>
	<div id="r_cantidad" class="form-group row">
		<label id="elh_insumos_registros_cantidad" for="x_cantidad" class="<?php echo $insumos_registros_edit->LeftColumnClass ?>"><?php echo $insumos_registros_edit->cantidad->caption() ?><?php echo $insumos_registros_edit->cantidad->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $insumos_registros_edit->RightColumnClass ?>"><div <?php echo $insumos_registros_edit->cantidad->cellAttributes() ?>>
<span id="el_insumos_registros_cantidad">
<input type="text" data-table="insumos_registros" data-field="x_cantidad" name="x_cantidad" id="x_cantidad" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($insumos_registros_edit->cantidad->getPlaceHolder()) ?>" value="<?php echo $insumos_registros_edit->cantidad->EditValue ?>"<?php echo $insumos_registros_edit->cantidad->editAttributes() ?>>
</span>
<?php echo $insumos_registros_edit->cantidad->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$insumos_registros_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $insumos_registros_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $insumos_registros_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$insumos_registros_edit->showPageFooter();
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
$insumos_registros_edit->terminate();
?>