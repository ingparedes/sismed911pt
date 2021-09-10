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
$medicamentos_add = new medicamentos_add();

// Run the page
$medicamentos_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$medicamentos_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmedicamentosadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fmedicamentosadd = currentForm = new ew.Form("fmedicamentosadd", "add");

	// Validate form
	fmedicamentosadd.validate = function() {
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
			<?php if ($medicamentos_add->nombre_medicamento->Required) { ?>
				elm = this.getElements("x" + infix + "_nombre_medicamento");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $medicamentos_add->nombre_medicamento->caption(), $medicamentos_add->nombre_medicamento->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($medicamentos_add->valor->Required) { ?>
				elm = this.getElements("x" + infix + "_valor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $medicamentos_add->valor->caption(), $medicamentos_add->valor->RequiredErrorMessage)) ?>");
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
	fmedicamentosadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmedicamentosadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmedicamentosadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $medicamentos_add->showPageHeader(); ?>
<?php
$medicamentos_add->showMessage();
?>
<form name="fmedicamentosadd" id="fmedicamentosadd" class="<?php echo $medicamentos_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="medicamentos">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$medicamentos_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($medicamentos_add->nombre_medicamento->Visible) { // nombre_medicamento ?>
	<div id="r_nombre_medicamento" class="form-group row">
		<label id="elh_medicamentos_nombre_medicamento" for="x_nombre_medicamento" class="<?php echo $medicamentos_add->LeftColumnClass ?>"><?php echo $medicamentos_add->nombre_medicamento->caption() ?><?php echo $medicamentos_add->nombre_medicamento->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $medicamentos_add->RightColumnClass ?>"><div <?php echo $medicamentos_add->nombre_medicamento->cellAttributes() ?>>
<span id="el_medicamentos_nombre_medicamento">
<input type="text" data-table="medicamentos" data-field="x_nombre_medicamento" name="x_nombre_medicamento" id="x_nombre_medicamento" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($medicamentos_add->nombre_medicamento->getPlaceHolder()) ?>" value="<?php echo $medicamentos_add->nombre_medicamento->EditValue ?>"<?php echo $medicamentos_add->nombre_medicamento->editAttributes() ?>>
</span>
<?php echo $medicamentos_add->nombre_medicamento->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($medicamentos_add->valor->Visible) { // valor ?>
	<div id="r_valor" class="form-group row">
		<label id="elh_medicamentos_valor" for="x_valor" class="<?php echo $medicamentos_add->LeftColumnClass ?>"><?php echo $medicamentos_add->valor->caption() ?><?php echo $medicamentos_add->valor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $medicamentos_add->RightColumnClass ?>"><div <?php echo $medicamentos_add->valor->cellAttributes() ?>>
<span id="el_medicamentos_valor">
<input type="text" data-table="medicamentos" data-field="x_valor" name="x_valor" id="x_valor" size="30" maxlength="16" placeholder="<?php echo HtmlEncode($medicamentos_add->valor->getPlaceHolder()) ?>" value="<?php echo $medicamentos_add->valor->EditValue ?>"<?php echo $medicamentos_add->valor->editAttributes() ?>>
</span>
<?php echo $medicamentos_add->valor->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$medicamentos_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $medicamentos_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $medicamentos_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$medicamentos_add->showPageFooter();
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
$medicamentos_add->terminate();
?>