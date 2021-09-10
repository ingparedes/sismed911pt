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
$modalidad_ambulancia_add = new modalidad_ambulancia_add();

// Run the page
$modalidad_ambulancia_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$modalidad_ambulancia_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmodalidad_ambulanciaadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fmodalidad_ambulanciaadd = currentForm = new ew.Form("fmodalidad_ambulanciaadd", "add");

	// Validate form
	fmodalidad_ambulanciaadd.validate = function() {
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
			<?php if ($modalidad_ambulancia_add->modalidadambu_es->Required) { ?>
				elm = this.getElements("x" + infix + "_modalidadambu_es");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $modalidad_ambulancia_add->modalidadambu_es->caption(), $modalidad_ambulancia_add->modalidadambu_es->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($modalidad_ambulancia_add->modalidadambu_en->Required) { ?>
				elm = this.getElements("x" + infix + "_modalidadambu_en");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $modalidad_ambulancia_add->modalidadambu_en->caption(), $modalidad_ambulancia_add->modalidadambu_en->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($modalidad_ambulancia_add->modalidadambu_pr->Required) { ?>
				elm = this.getElements("x" + infix + "_modalidadambu_pr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $modalidad_ambulancia_add->modalidadambu_pr->caption(), $modalidad_ambulancia_add->modalidadambu_pr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($modalidad_ambulancia_add->modalidadambu_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_modalidadambu_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $modalidad_ambulancia_add->modalidadambu_fr->caption(), $modalidad_ambulancia_add->modalidadambu_fr->RequiredErrorMessage)) ?>");
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
	fmodalidad_ambulanciaadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmodalidad_ambulanciaadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmodalidad_ambulanciaadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $modalidad_ambulancia_add->showPageHeader(); ?>
<?php
$modalidad_ambulancia_add->showMessage();
?>
<form name="fmodalidad_ambulanciaadd" id="fmodalidad_ambulanciaadd" class="<?php echo $modalidad_ambulancia_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="modalidad_ambulancia">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$modalidad_ambulancia_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($modalidad_ambulancia_add->modalidadambu_es->Visible) { // modalidadambu_es ?>
	<div id="r_modalidadambu_es" class="form-group row">
		<label id="elh_modalidad_ambulancia_modalidadambu_es" for="x_modalidadambu_es" class="<?php echo $modalidad_ambulancia_add->LeftColumnClass ?>"><?php echo $modalidad_ambulancia_add->modalidadambu_es->caption() ?><?php echo $modalidad_ambulancia_add->modalidadambu_es->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $modalidad_ambulancia_add->RightColumnClass ?>"><div <?php echo $modalidad_ambulancia_add->modalidadambu_es->cellAttributes() ?>>
<span id="el_modalidad_ambulancia_modalidadambu_es">
<input type="text" data-table="modalidad_ambulancia" data-field="x_modalidadambu_es" name="x_modalidadambu_es" id="x_modalidadambu_es" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($modalidad_ambulancia_add->modalidadambu_es->getPlaceHolder()) ?>" value="<?php echo $modalidad_ambulancia_add->modalidadambu_es->EditValue ?>"<?php echo $modalidad_ambulancia_add->modalidadambu_es->editAttributes() ?>>
</span>
<?php echo $modalidad_ambulancia_add->modalidadambu_es->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($modalidad_ambulancia_add->modalidadambu_en->Visible) { // modalidadambu_en ?>
	<div id="r_modalidadambu_en" class="form-group row">
		<label id="elh_modalidad_ambulancia_modalidadambu_en" for="x_modalidadambu_en" class="<?php echo $modalidad_ambulancia_add->LeftColumnClass ?>"><?php echo $modalidad_ambulancia_add->modalidadambu_en->caption() ?><?php echo $modalidad_ambulancia_add->modalidadambu_en->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $modalidad_ambulancia_add->RightColumnClass ?>"><div <?php echo $modalidad_ambulancia_add->modalidadambu_en->cellAttributes() ?>>
<span id="el_modalidad_ambulancia_modalidadambu_en">
<input type="text" data-table="modalidad_ambulancia" data-field="x_modalidadambu_en" name="x_modalidadambu_en" id="x_modalidadambu_en" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($modalidad_ambulancia_add->modalidadambu_en->getPlaceHolder()) ?>" value="<?php echo $modalidad_ambulancia_add->modalidadambu_en->EditValue ?>"<?php echo $modalidad_ambulancia_add->modalidadambu_en->editAttributes() ?>>
</span>
<?php echo $modalidad_ambulancia_add->modalidadambu_en->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($modalidad_ambulancia_add->modalidadambu_pr->Visible) { // modalidadambu_pr ?>
	<div id="r_modalidadambu_pr" class="form-group row">
		<label id="elh_modalidad_ambulancia_modalidadambu_pr" for="x_modalidadambu_pr" class="<?php echo $modalidad_ambulancia_add->LeftColumnClass ?>"><?php echo $modalidad_ambulancia_add->modalidadambu_pr->caption() ?><?php echo $modalidad_ambulancia_add->modalidadambu_pr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $modalidad_ambulancia_add->RightColumnClass ?>"><div <?php echo $modalidad_ambulancia_add->modalidadambu_pr->cellAttributes() ?>>
<span id="el_modalidad_ambulancia_modalidadambu_pr">
<input type="text" data-table="modalidad_ambulancia" data-field="x_modalidadambu_pr" name="x_modalidadambu_pr" id="x_modalidadambu_pr" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($modalidad_ambulancia_add->modalidadambu_pr->getPlaceHolder()) ?>" value="<?php echo $modalidad_ambulancia_add->modalidadambu_pr->EditValue ?>"<?php echo $modalidad_ambulancia_add->modalidadambu_pr->editAttributes() ?>>
</span>
<?php echo $modalidad_ambulancia_add->modalidadambu_pr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($modalidad_ambulancia_add->modalidadambu_fr->Visible) { // modalidadambu_fr ?>
	<div id="r_modalidadambu_fr" class="form-group row">
		<label id="elh_modalidad_ambulancia_modalidadambu_fr" for="x_modalidadambu_fr" class="<?php echo $modalidad_ambulancia_add->LeftColumnClass ?>"><?php echo $modalidad_ambulancia_add->modalidadambu_fr->caption() ?><?php echo $modalidad_ambulancia_add->modalidadambu_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $modalidad_ambulancia_add->RightColumnClass ?>"><div <?php echo $modalidad_ambulancia_add->modalidadambu_fr->cellAttributes() ?>>
<span id="el_modalidad_ambulancia_modalidadambu_fr">
<input type="text" data-table="modalidad_ambulancia" data-field="x_modalidadambu_fr" name="x_modalidadambu_fr" id="x_modalidadambu_fr" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($modalidad_ambulancia_add->modalidadambu_fr->getPlaceHolder()) ?>" value="<?php echo $modalidad_ambulancia_add->modalidadambu_fr->EditValue ?>"<?php echo $modalidad_ambulancia_add->modalidadambu_fr->editAttributes() ?>>
</span>
<?php echo $modalidad_ambulancia_add->modalidadambu_fr->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$modalidad_ambulancia_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $modalidad_ambulancia_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $modalidad_ambulancia_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$modalidad_ambulancia_add->showPageFooter();
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
$modalidad_ambulancia_add->terminate();
?>