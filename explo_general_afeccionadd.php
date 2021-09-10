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
$explo_general_afeccion_add = new explo_general_afeccion_add();

// Run the page
$explo_general_afeccion_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$explo_general_afeccion_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fexplo_general_afeccionadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fexplo_general_afeccionadd = currentForm = new ew.Form("fexplo_general_afeccionadd", "add");

	// Validate form
	fexplo_general_afeccionadd.validate = function() {
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
			<?php if ($explo_general_afeccion_add->explo_general_cat->Required) { ?>
				elm = this.getElements("x" + infix + "_explo_general_cat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $explo_general_afeccion_add->explo_general_cat->caption(), $explo_general_afeccion_add->explo_general_cat->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_explo_general_cat");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($explo_general_afeccion_add->explo_general_cat->errorMessage()) ?>");
			<?php if ($explo_general_afeccion_add->descripcion->Required) { ?>
				elm = this.getElements("x" + infix + "_descripcion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $explo_general_afeccion_add->descripcion->caption(), $explo_general_afeccion_add->descripcion->RequiredErrorMessage)) ?>");
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
	fexplo_general_afeccionadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fexplo_general_afeccionadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fexplo_general_afeccionadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $explo_general_afeccion_add->showPageHeader(); ?>
<?php
$explo_general_afeccion_add->showMessage();
?>
<form name="fexplo_general_afeccionadd" id="fexplo_general_afeccionadd" class="<?php echo $explo_general_afeccion_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="explo_general_afeccion">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$explo_general_afeccion_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($explo_general_afeccion_add->explo_general_cat->Visible) { // explo_general_cat ?>
	<div id="r_explo_general_cat" class="form-group row">
		<label id="elh_explo_general_afeccion_explo_general_cat" for="x_explo_general_cat" class="<?php echo $explo_general_afeccion_add->LeftColumnClass ?>"><?php echo $explo_general_afeccion_add->explo_general_cat->caption() ?><?php echo $explo_general_afeccion_add->explo_general_cat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $explo_general_afeccion_add->RightColumnClass ?>"><div <?php echo $explo_general_afeccion_add->explo_general_cat->cellAttributes() ?>>
<span id="el_explo_general_afeccion_explo_general_cat">
<input type="text" data-table="explo_general_afeccion" data-field="x_explo_general_cat" name="x_explo_general_cat" id="x_explo_general_cat" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($explo_general_afeccion_add->explo_general_cat->getPlaceHolder()) ?>" value="<?php echo $explo_general_afeccion_add->explo_general_cat->EditValue ?>"<?php echo $explo_general_afeccion_add->explo_general_cat->editAttributes() ?>>
</span>
<?php echo $explo_general_afeccion_add->explo_general_cat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($explo_general_afeccion_add->descripcion->Visible) { // descripcion ?>
	<div id="r_descripcion" class="form-group row">
		<label id="elh_explo_general_afeccion_descripcion" for="x_descripcion" class="<?php echo $explo_general_afeccion_add->LeftColumnClass ?>"><?php echo $explo_general_afeccion_add->descripcion->caption() ?><?php echo $explo_general_afeccion_add->descripcion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $explo_general_afeccion_add->RightColumnClass ?>"><div <?php echo $explo_general_afeccion_add->descripcion->cellAttributes() ?>>
<span id="el_explo_general_afeccion_descripcion">
<input type="text" data-table="explo_general_afeccion" data-field="x_descripcion" name="x_descripcion" id="x_descripcion" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($explo_general_afeccion_add->descripcion->getPlaceHolder()) ?>" value="<?php echo $explo_general_afeccion_add->descripcion->EditValue ?>"<?php echo $explo_general_afeccion_add->descripcion->editAttributes() ?>>
</span>
<?php echo $explo_general_afeccion_add->descripcion->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$explo_general_afeccion_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $explo_general_afeccion_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $explo_general_afeccion_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$explo_general_afeccion_add->showPageFooter();
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
$explo_general_afeccion_add->terminate();
?>