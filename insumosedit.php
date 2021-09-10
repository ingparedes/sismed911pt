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
$insumos_edit = new insumos_edit();

// Run the page
$insumos_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$insumos_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var finsumosedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	finsumosedit = currentForm = new ew.Form("finsumosedit", "edit");

	// Validate form
	finsumosedit.validate = function() {
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
			<?php if ($insumos_edit->id_insumo->Required) { ?>
				elm = this.getElements("x" + infix + "_id_insumo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $insumos_edit->id_insumo->caption(), $insumos_edit->id_insumo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($insumos_edit->nombre_insumo->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_insumo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $insumos_edit->nombre_insumo->caption(), $insumos_edit->nombre_insumo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($insumos_edit->valor->Required) { ?>
				elm = this.getElements("x" + infix + "_valor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $insumos_edit->valor->caption(), $insumos_edit->valor->RequiredErrorMessage)) ?>");
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
	finsumosedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	finsumosedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("finsumosedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $insumos_edit->showPageHeader(); ?>
<?php
$insumos_edit->showMessage();
?>
<form name="finsumosedit" id="finsumosedit" class="<?php echo $insumos_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="insumos">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$insumos_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($insumos_edit->id_insumo->Visible) { // id_insumo ?>
	<div id="r_id_insumo" class="form-group row">
		<label id="elh_insumos_id_insumo" class="<?php echo $insumos_edit->LeftColumnClass ?>"><?php echo $insumos_edit->id_insumo->caption() ?><?php echo $insumos_edit->id_insumo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $insumos_edit->RightColumnClass ?>"><div <?php echo $insumos_edit->id_insumo->cellAttributes() ?>>
<span id="el_insumos_id_insumo">
<span<?php echo $insumos_edit->id_insumo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($insumos_edit->id_insumo->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="insumos" data-field="x_id_insumo" name="x_id_insumo" id="x_id_insumo" value="<?php echo HtmlEncode($insumos_edit->id_insumo->CurrentValue) ?>">
<?php echo $insumos_edit->id_insumo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($insumos_edit->nombre_insumo->Visible) { // nombre_insumo ?>
	<div id="r_nombre_insumo" class="form-group row">
		<label id="elh_insumos_nombre_insumo" for="x_nombre_insumo" class="<?php echo $insumos_edit->LeftColumnClass ?>"><?php echo $insumos_edit->nombre_insumo->caption() ?><?php echo $insumos_edit->nombre_insumo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $insumos_edit->RightColumnClass ?>"><div <?php echo $insumos_edit->nombre_insumo->cellAttributes() ?>>
<span id="el_insumos_nombre_insumo">
<input type="text" data-table="insumos" data-field="x_nombre_insumo" name="x_nombre_insumo" id="x_nombre_insumo" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($insumos_edit->nombre_insumo->getPlaceHolder()) ?>" value="<?php echo $insumos_edit->nombre_insumo->EditValue ?>"<?php echo $insumos_edit->nombre_insumo->editAttributes() ?>>
</span>
<?php echo $insumos_edit->nombre_insumo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($insumos_edit->valor->Visible) { // valor ?>
	<div id="r_valor" class="form-group row">
		<label id="elh_insumos_valor" for="x_valor" class="<?php echo $insumos_edit->LeftColumnClass ?>"><?php echo $insumos_edit->valor->caption() ?><?php echo $insumos_edit->valor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $insumos_edit->RightColumnClass ?>"><div <?php echo $insumos_edit->valor->cellAttributes() ?>>
<span id="el_insumos_valor">
<input type="text" data-table="insumos" data-field="x_valor" name="x_valor" id="x_valor" size="30" maxlength="12" placeholder="<?php echo HtmlEncode($insumos_edit->valor->getPlaceHolder()) ?>" value="<?php echo $insumos_edit->valor->EditValue ?>"<?php echo $insumos_edit->valor->editAttributes() ?>>
</span>
<?php echo $insumos_edit->valor->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$insumos_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $insumos_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $insumos_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$insumos_edit->showPageFooter();
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
$insumos_edit->terminate();
?>