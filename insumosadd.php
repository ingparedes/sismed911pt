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
$insumos_add = new insumos_add();

// Run the page
$insumos_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$insumos_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var finsumosadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	finsumosadd = currentForm = new ew.Form("finsumosadd", "add");

	// Validate form
	finsumosadd.validate = function() {
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
			<?php if ($insumos_add->nombre_insumo->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_insumo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $insumos_add->nombre_insumo->caption(), $insumos_add->nombre_insumo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($insumos_add->valor->Required) { ?>
				elm = this.getElements("x" + infix + "_valor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $insumos_add->valor->caption(), $insumos_add->valor->RequiredErrorMessage)) ?>");
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
	finsumosadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	finsumosadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("finsumosadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $insumos_add->showPageHeader(); ?>
<?php
$insumos_add->showMessage();
?>
<form name="finsumosadd" id="finsumosadd" class="<?php echo $insumos_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="insumos">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$insumos_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($insumos_add->nombre_insumo->Visible) { // nombre_insumo ?>
	<div id="r_nombre_insumo" class="form-group row">
		<label id="elh_insumos_nombre_insumo" for="x_nombre_insumo" class="<?php echo $insumos_add->LeftColumnClass ?>"><?php echo $insumos_add->nombre_insumo->caption() ?><?php echo $insumos_add->nombre_insumo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $insumos_add->RightColumnClass ?>"><div <?php echo $insumos_add->nombre_insumo->cellAttributes() ?>>
<span id="el_insumos_nombre_insumo">
<input type="text" data-table="insumos" data-field="x_nombre_insumo" name="x_nombre_insumo" id="x_nombre_insumo" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($insumos_add->nombre_insumo->getPlaceHolder()) ?>" value="<?php echo $insumos_add->nombre_insumo->EditValue ?>"<?php echo $insumos_add->nombre_insumo->editAttributes() ?>>
</span>
<?php echo $insumos_add->nombre_insumo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($insumos_add->valor->Visible) { // valor ?>
	<div id="r_valor" class="form-group row">
		<label id="elh_insumos_valor" for="x_valor" class="<?php echo $insumos_add->LeftColumnClass ?>"><?php echo $insumos_add->valor->caption() ?><?php echo $insumos_add->valor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $insumos_add->RightColumnClass ?>"><div <?php echo $insumos_add->valor->cellAttributes() ?>>
<span id="el_insumos_valor">
<input type="text" data-table="insumos" data-field="x_valor" name="x_valor" id="x_valor" size="30" maxlength="12" placeholder="<?php echo HtmlEncode($insumos_add->valor->getPlaceHolder()) ?>" value="<?php echo $insumos_add->valor->EditValue ?>"<?php echo $insumos_add->valor->editAttributes() ?>>
</span>
<?php echo $insumos_add->valor->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$insumos_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $insumos_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $insumos_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$insumos_add->showPageFooter();
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
$insumos_add->terminate();
?>