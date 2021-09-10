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
$especial_ambulancia_addopt = new especial_ambulancia_addopt();

// Run the page
$especial_ambulancia_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$especial_ambulancia_addopt->Page_Render();
?>
<script>
var fespecial_ambulanciaaddopt, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "addopt";
	fespecial_ambulanciaaddopt = currentForm = new ew.Form("fespecial_ambulanciaaddopt", "addopt");

	// Validate form
	fespecial_ambulanciaaddopt.validate = function() {
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
			<?php if ($especial_ambulancia_addopt->especial_es->Required) { ?>
				elm = this.getElements("x" + infix + "_especial_es");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $especial_ambulancia_addopt->especial_es->caption(), $especial_ambulancia_addopt->especial_es->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($especial_ambulancia_addopt->especial_en->Required) { ?>
				elm = this.getElements("x" + infix + "_especial_en");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $especial_ambulancia_addopt->especial_en->caption(), $especial_ambulancia_addopt->especial_en->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($especial_ambulancia_addopt->especial_pr->Required) { ?>
				elm = this.getElements("x" + infix + "_especial_pr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $especial_ambulancia_addopt->especial_pr->caption(), $especial_ambulancia_addopt->especial_pr->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($especial_ambulancia_addopt->especial_fr->Required) { ?>
				elm = this.getElements("x" + infix + "_especial_fr");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $especial_ambulancia_addopt->especial_fr->caption(), $especial_ambulancia_addopt->especial_fr->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fespecial_ambulanciaaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fespecial_ambulanciaaddopt.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fespecial_ambulanciaaddopt");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $especial_ambulancia_addopt->showPageHeader(); ?>
<?php
$especial_ambulancia_addopt->showMessage();
?>
<form name="fespecial_ambulanciaaddopt" id="fespecial_ambulanciaaddopt" class="ew-form ew-horizontal" action="<?php echo Config("API_URL") ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="<?php echo Config("API_ACTION_NAME") ?>" id="<?php echo Config("API_ACTION_NAME") ?>" value="<?php echo Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?php echo Config("API_OBJECT_NAME") ?>" id="<?php echo Config("API_OBJECT_NAME") ?>" value="<?php echo $especial_ambulancia_addopt->TableVar ?>">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($especial_ambulancia_addopt->especial_es->Visible) { // especial_es ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_especial_es"><?php echo $especial_ambulancia_addopt->especial_es->caption() ?><?php echo $especial_ambulancia_addopt->especial_es->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="especial_ambulancia" data-field="x_especial_es" name="x_especial_es" id="x_especial_es" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($especial_ambulancia_addopt->especial_es->getPlaceHolder()) ?>" value="<?php echo $especial_ambulancia_addopt->especial_es->EditValue ?>"<?php echo $especial_ambulancia_addopt->especial_es->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($especial_ambulancia_addopt->especial_en->Visible) { // especial_en ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_especial_en"><?php echo $especial_ambulancia_addopt->especial_en->caption() ?><?php echo $especial_ambulancia_addopt->especial_en->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="especial_ambulancia" data-field="x_especial_en" name="x_especial_en" id="x_especial_en" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($especial_ambulancia_addopt->especial_en->getPlaceHolder()) ?>" value="<?php echo $especial_ambulancia_addopt->especial_en->EditValue ?>"<?php echo $especial_ambulancia_addopt->especial_en->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($especial_ambulancia_addopt->especial_pr->Visible) { // especial_pr ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_especial_pr"><?php echo $especial_ambulancia_addopt->especial_pr->caption() ?><?php echo $especial_ambulancia_addopt->especial_pr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="especial_ambulancia" data-field="x_especial_pr" name="x_especial_pr" id="x_especial_pr" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($especial_ambulancia_addopt->especial_pr->getPlaceHolder()) ?>" value="<?php echo $especial_ambulancia_addopt->especial_pr->EditValue ?>"<?php echo $especial_ambulancia_addopt->especial_pr->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($especial_ambulancia_addopt->especial_fr->Visible) { // especial_fr ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_especial_fr"><?php echo $especial_ambulancia_addopt->especial_fr->caption() ?><?php echo $especial_ambulancia_addopt->especial_fr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="especial_ambulancia" data-field="x_especial_fr" name="x_especial_fr" id="x_especial_fr" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($especial_ambulancia_addopt->especial_fr->getPlaceHolder()) ?>" value="<?php echo $especial_ambulancia_addopt->especial_fr->EditValue ?>"<?php echo $especial_ambulancia_addopt->especial_fr->editAttributes() ?>>
</div>
	</div>
<?php } ?>
</form>
<?php
$especial_ambulancia_addopt->showPageFooter();
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
<?php
$especial_ambulancia_addopt->terminate();
?>