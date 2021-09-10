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
$especial_ambulancia_add = new especial_ambulancia_add();

// Run the page
$especial_ambulancia_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$especial_ambulancia_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fespecial_ambulanciaadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fespecial_ambulanciaadd = currentForm = new ew.Form("fespecial_ambulanciaadd", "add");

	// Validate form
	fespecial_ambulanciaadd.validate = function() {
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
			<?php if ($especial_ambulancia_add->especial_es->Required) { ?>
				elm = this.getElements("x" + infix + "_especial_es");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $especial_ambulancia_add->especial_es->caption(), $especial_ambulancia_add->especial_es->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($especial_ambulancia_add->especial_en->Required) { ?>
				elm = this.getElements("x" + infix + "_especial_en");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $especial_ambulancia_add->especial_en->caption(), $especial_ambulancia_add->especial_en->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($especial_ambulancia_add->especial_pr->Required) { ?>
				elm = this.getElements("x" + infix + "_especial_pr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $especial_ambulancia_add->especial_pr->caption(), $especial_ambulancia_add->especial_pr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($especial_ambulancia_add->especial_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_especial_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $especial_ambulancia_add->especial_fr->caption(), $especial_ambulancia_add->especial_fr->RequiredErrorMessage)) ?>");
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
	fespecial_ambulanciaadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fespecial_ambulanciaadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fespecial_ambulanciaadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $especial_ambulancia_add->showPageHeader(); ?>
<?php
$especial_ambulancia_add->showMessage();
?>
<form name="fespecial_ambulanciaadd" id="fespecial_ambulanciaadd" class="<?php echo $especial_ambulancia_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="especial_ambulancia">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$especial_ambulancia_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($especial_ambulancia_add->especial_es->Visible) { // especial_es ?>
	<div id="r_especial_es" class="form-group row">
		<label id="elh_especial_ambulancia_especial_es" for="x_especial_es" class="<?php echo $especial_ambulancia_add->LeftColumnClass ?>"><?php echo $especial_ambulancia_add->especial_es->caption() ?><?php echo $especial_ambulancia_add->especial_es->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $especial_ambulancia_add->RightColumnClass ?>"><div <?php echo $especial_ambulancia_add->especial_es->cellAttributes() ?>>
<span id="el_especial_ambulancia_especial_es">
<input type="text" data-table="especial_ambulancia" data-field="x_especial_es" name="x_especial_es" id="x_especial_es" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($especial_ambulancia_add->especial_es->getPlaceHolder()) ?>" value="<?php echo $especial_ambulancia_add->especial_es->EditValue ?>"<?php echo $especial_ambulancia_add->especial_es->editAttributes() ?>>
</span>
<?php echo $especial_ambulancia_add->especial_es->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($especial_ambulancia_add->especial_en->Visible) { // especial_en ?>
	<div id="r_especial_en" class="form-group row">
		<label id="elh_especial_ambulancia_especial_en" for="x_especial_en" class="<?php echo $especial_ambulancia_add->LeftColumnClass ?>"><?php echo $especial_ambulancia_add->especial_en->caption() ?><?php echo $especial_ambulancia_add->especial_en->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $especial_ambulancia_add->RightColumnClass ?>"><div <?php echo $especial_ambulancia_add->especial_en->cellAttributes() ?>>
<span id="el_especial_ambulancia_especial_en">
<input type="text" data-table="especial_ambulancia" data-field="x_especial_en" name="x_especial_en" id="x_especial_en" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($especial_ambulancia_add->especial_en->getPlaceHolder()) ?>" value="<?php echo $especial_ambulancia_add->especial_en->EditValue ?>"<?php echo $especial_ambulancia_add->especial_en->editAttributes() ?>>
</span>
<?php echo $especial_ambulancia_add->especial_en->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($especial_ambulancia_add->especial_pr->Visible) { // especial_pr ?>
	<div id="r_especial_pr" class="form-group row">
		<label id="elh_especial_ambulancia_especial_pr" for="x_especial_pr" class="<?php echo $especial_ambulancia_add->LeftColumnClass ?>"><?php echo $especial_ambulancia_add->especial_pr->caption() ?><?php echo $especial_ambulancia_add->especial_pr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $especial_ambulancia_add->RightColumnClass ?>"><div <?php echo $especial_ambulancia_add->especial_pr->cellAttributes() ?>>
<span id="el_especial_ambulancia_especial_pr">
<input type="text" data-table="especial_ambulancia" data-field="x_especial_pr" name="x_especial_pr" id="x_especial_pr" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($especial_ambulancia_add->especial_pr->getPlaceHolder()) ?>" value="<?php echo $especial_ambulancia_add->especial_pr->EditValue ?>"<?php echo $especial_ambulancia_add->especial_pr->editAttributes() ?>>
</span>
<?php echo $especial_ambulancia_add->especial_pr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($especial_ambulancia_add->especial_fr->Visible) { // especial_fr ?>
	<div id="r_especial_fr" class="form-group row">
		<label id="elh_especial_ambulancia_especial_fr" for="x_especial_fr" class="<?php echo $especial_ambulancia_add->LeftColumnClass ?>"><?php echo $especial_ambulancia_add->especial_fr->caption() ?><?php echo $especial_ambulancia_add->especial_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $especial_ambulancia_add->RightColumnClass ?>"><div <?php echo $especial_ambulancia_add->especial_fr->cellAttributes() ?>>
<span id="el_especial_ambulancia_especial_fr">
<input type="text" data-table="especial_ambulancia" data-field="x_especial_fr" name="x_especial_fr" id="x_especial_fr" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($especial_ambulancia_add->especial_fr->getPlaceHolder()) ?>" value="<?php echo $especial_ambulancia_add->especial_fr->EditValue ?>"<?php echo $especial_ambulancia_add->especial_fr->editAttributes() ?>>
</span>
<?php echo $especial_ambulancia_add->especial_fr->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$especial_ambulancia_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $especial_ambulancia_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $especial_ambulancia_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$especial_ambulancia_add->showPageFooter();
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
$especial_ambulancia_add->terminate();
?>